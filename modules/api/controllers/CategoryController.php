<?php
/**
 * Created by Navatech
 * @project sgl-com-vn
 * @author  Le Phuong
 * @email phuong17889@gmail.com
 * @time    4/22/2017 10:32 AM
 */
namespace app\modules\api\controllers;

use app\models\Category;
use app\models\Setting;
use app\modules\api\components\ApiController;
use navatech\language\Translate;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;
use yii\helpers\Url;

class CategoryController extends ApiController {

	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [
			'verbs' => [
				'class'   => VerbFilter::className(),
				'actions' => [],
			],
		];
	}

	/**
	 * {@inheritDoc}
	 */
	public static function responseCode() {
		return [
			- 1 => 'MISSING PARAMETER',
			0   => 'OK',
			1   => 'NOT FOUND',
			2   => 'CAN NOT SAVE',
		];
	}

	/**
	 * @api              {get} /category/list 1. Lấy ra danh sách danh mục
	 * @apiGroup         Category
	 * @apiVersion       1.0.1
	 *
	 * @apiSampleRequest /api/category/list
	 *
	 * @apiHeader {string=vi,en} [language=vi] Ngôn ngữ
	 *
	 * @apiSuccess {number} code Mã kết quả trả về
	 * @apiSuccess {string} message Nội dung kết quả trả về
	 * @apiSuccess {Object[]} data Mảng đối tượng giá trị cần lấy
	 * @apiSuccess {string} data.id Mã loại danh mục
	 * @apiSuccess {string} data.name Tên loại danh mục
	 *
	 * @apiError (400) {number} code Mã kết quả trả về
	 * @apiError (400) {string} message Nội dung kết quả trả về
	 * @apiError (400) {String[]} data Danh sách các tham số bị thiếu
	 */
	public function actionList() {
		try {
			$list = Category::find()->where(['status' => Category::PUBLISH])->all();
			if ($list !== null) {
				/**@var Category[] $list */
				$response['code'] = 0;
				foreach ($list as $item) {
					$response['data'][] = [
						'id'   => $item->id,
						'name' => $item->name,
					];
				}
				$this->response(200, $response);
			} else {
				$this->response(200, [
					'code'    => 1,
					'message' => Translate::configure_not_found(),
				]);
			}
		} catch (\Exception $e) {
			$this->response(200, [
				'code'    => 1,
				'message' => Translate::configure_not_found(),
			]);
		}
	}

}