<?php
/**
 * Created by Navatech.
 * @project sgl
 * @author  Phuong
 * @email   phuong17889[at]gmail.com
 * @date    6/22/2016
 * @time    5:35 PM
 */

namespace app\modules\api\components;

use Yii;
use yii\base\Exception;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Controller;

class ApiController extends Controller {

	/**@var array */
	public $body;

	/**@var array */
	public $header;

	/**
	 * {@inheritDoc}
	 */
	public function init() {
		parent::init();
		$this->header = apache_request_headers();
		$this->body   = $_REQUEST;
		if ($this->body == null) {
			$this->body = json_decode(file_get_contents('php://input'), true);
		}
		if (YII_ENV_DEV) {
			$header  = Json::encode($this->header);
			$body1   = Json::encode($_REQUEST);
			$body2   = file_get_contents('php://input');
			$content = '
----------' . date('Y-m-d H:i:s') . '------------
Method:
' . Yii::$app->request->method . '
URL:
' . Yii::$app->request->url . '
Header:
' . $header . '
Body1:
' . $body1 . '
Body2:
' . $body2;
			file_put_contents(Yii::getAlias('@runtime/logs/api.log'), $content, FILE_APPEND | LOCK_EX);
		}
		if (isset($this->header['time']) && isset($this->header['token']) && $this->header['time'] != '' && $this->header['token'] != '') {
			if (strlen($this->header['time']) == 14 && strlen($this->header['token']) == 32 && ($datetime = date_create($this->header['time'])) !== false) {
				if ($datetime->getTimestamp() > (time() - 300) && $datetime->getTimestamp() < (time() + 300)) {
					if (md5(Yii::$app->setting->get('general_api_code', '3a3b7a003bbf6962a7a1353550edccb6') . $this->header['time']) == $this->header['token']) {
						if (isset($this->header['language']) && $this->header['language'] != '') {
							Yii::$app->language = $this->header['language'];
						} else {
							Yii::$app->language       = Yii::$app->setting->get('general_language');
							$this->header['language'] = Yii::$app->language;
						}
					} else {
						$this->response(400, [
							'code'    => 1,
							'message' => 'Token not match',
						]);
					}
				} else {
					$this->response(400, [
						'code'    => 1,
						'message' => 'Request timeout (' . ($datetime->getTimestamp() - time()) . 's)',
					]);
				}
			} else {
				$this->response(400, [
					'code'    => 1,
					'message' => 'Format Time & Token not match',
				]);
			}
		} else if (isset($this->header['Referer']) && strpos($this->header['Referer'], Url::base(true)) !== false) {
			if (isset($this->header['language']) && $this->header['language'] != '') {
				Yii::$app->language = $this->header['language'];
			} else {
				Yii::$app->language       = Yii::$app->setting->get('general_language');
				$this->header['language'] = Yii::$app->language;
			}
		} else if (Yii::$app->requestedRoute != 'api/site/test-auth') {
			throw new ApiException(403, 'You can not access');
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function beforeAction($action) {
		return true;
	}

	/**
	 * @param       $response_status
	 * @param array $response_data
	 *
	 * @return string
	 * @throws ApiException
	 */
	public function response($response_status, array $response_data) {
		try {
			$body          = [];
			$status_code   = $this->httpStatusCode();
			$response_code = static::responseCode();
			if ($response_code == null) {
				throw new ApiException(500, "Ask the administrator define responseCode function.");
			}
			if (!isset($response_code[0])) {
				$response_code[0] = 'OK';
			}
			$body['code']    = $response_data['code'];
			$body['message'] = isset($response_data['message']) ? $response_data['message'] : $response_code[$body['code']];
			$body['data']    = (isset($response_data['data']) && $response_data['data'] != null) ? $response_data['data'] : [];
			header('HTTP/1.1 ' . $response_status . ' ' . $status_code[$response_status]);
			header('Content-type: application/json');
			$response = Json::encode($body);
			echo $response;
			$response = '
Response:
' . $response;
			file_put_contents(Yii::getAlias('@runtime/logs/api.log'), $response, FILE_APPEND | LOCK_EX);
			exit();
		} catch (Exception $e) {
			throw new ApiException(400, "Unknown error");
		}
	}

	/**
	 * @param        $attribute
	 * @param bool   $required
	 * @param string $default
	 *
	 * @return string
	 */
	public function getBodyValue($attribute, $required = false, $default = '') {
		if (isset($this->body[$attribute]) && strlen($this->body[$attribute]) > 0) {
			return trim($this->body[$attribute]);
		} else {
			if ($required) {
				return $this->response(400, [
					'code'    => - 1,
					'message' => 'Missing parameter',
					'data'    => [$attribute],
				]);
			} else {
				return trim($default);
			}
		}
	}

	/**
	 * @return array Defined response code
	 * return [
	 *      0 => 'OK',
	 *      1 => 'Data empty',
	 *      2 => 'Missing parameter',
	 * ];
	 */
	public static function responseCode() {
		return null;
	}

	/**
	 *
	 * @return array Return http status code
	 */
	protected function httpStatusCode() {
		return [
			200 => 'OK',
			300 => 'Multiple choices. Look like you have infinite loop',
			400 => 'Bad request. API doesn\'t exist OR request failed due to some reason.',
			401 => 'Unauthorized',
			403 => 'Forbidden',
			404 => 'API doesn\'t exist OR request failed due to some reason.',
			500 => 'Internal Server Error',
		];
	}
}