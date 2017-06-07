<?php

namespace app\components;


use navatech\language\components\LanguageBehavior;
use navatech\language\db\ActiveRecord;
use navatech\language\Translate;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\UploadedFile;
use app\models\Setting;
/**
 * @method string getTranslateAttribute(string $attribute, string | null $language_code = null)
 * @method boolean hasTranslateAttribute(string $attribute_translation)
 * @method array getTranslateAttributes(string $attribute = null)
 */
class Model extends ActiveRecord {

	/**
	 * {@inheritDoc}
	 */
	public function behaviors($attributes = null) {
		if ($attributes != null) {
			return [
				'ml' => [
					'class'      => LanguageBehavior::className(),
					'attributes' => $attributes,
				],
			];
		}
		return parent::behaviors();
	}

	/**
	 * fetch stored image file name with complete path
	 *
	 * @param string $picture
	 *
	 * @return string
	 */
	public function getPictureFile($picture = '') {
		$dir = Yii::getAlias('@app/web') . '/uploads/' . $this->tableName() . '/';
		return isset($this->$picture) ? $dir . $this->$picture : null;
	}

	/**
	 * fetch stored image url
	 *
	 * @param string $picture
	 *
	 * @return string
	 */
	public function getPictureUrl($picture = '') {
		Yii::$app->params['uploadUrl'] = Url::home(true) . 'uploads/' . $this->tableName() . '/';
		$image                         = !empty($this->$picture) ? $this->$picture : Yii::$app->urlManager->baseUrl . '/uploads/no_image_thumb.gif';
		clearstatcache();

		if (is_file(Yii::getAlias("@app/web") . '/uploads/' . $this->tableName() . '/' . $image)) {
			return Yii::$app->params['uploadUrl'] . $image;
		} else {
			return Url::home(true) . 'uploads/no_image_thumb.gif';
		}
	}

	/**
	 * Process upload of image
	 *
	 * @param string $picture
	 *
	 * @return mixed the uploaded image instance
	 */
	public function uploadPicture($picture = '') {
		if ($picture == '') {
			$picture = 'image';
		}
		$img = UploadedFile::getInstance($this, 'img');
		if (empty($img)) {
			return false;
		}
		$dir = Yii::getAlias('@app/web') . '/uploads/' . $this->tableName() . '/';
		if (!is_dir($dir)) {
			@mkdir($dir, 0777, true);
		}
		$ext            = $img->getExtension();
		$this->$picture = $this->getPrimaryKey() . '_image' . ".{$ext}";
		return $img;
	}

	/**
	 * @param null $status
	 *
	 * @return array|string
	 */
	public static function getStatus($status = null) {
		if ($status !== null) {
			return $status == 1 ? '<span class="label label-round label-success">'.Translate::yes().'</span>' : '<span class="label label-round label-danger">'.Translate::no().'</span>';
		} else {
			return array(
				0 => Translate::no(),
				1 => Translate::yes(),
			);
		}
	}

	/**
	 * @param null $processing
	 *
	 * @return array|string
	 */
	public static function getProcessing($processing = null) {
		if ($processing !== null) {
			return $processing == 1 ? '<span class="label label-round label-success">Đã xử lý</span>' :  '<span class="label label-round label-danger">Chờ xử lý</span>';
		} else {
			return array(
				0 => 'Chờ xử lý',
				1 => 'Đã xử lý',
			);
		}
	}
	public static  function getSettingMeta($code_setting)
	{
		$setting=Setting::findOne(['code'=>$code_setting]);

		$arr=array();
		if($setting!=null) {
			/***@var SettingMeta[] $settings * */
			$settings = SettingMeta::find()->where(['setting_id' => $setting->id])->orderBy(['sort' => SORT_ASC])->all();
			for ($i = 0; $i < count($settings); $i ++) {
				$description = Json::decode($settings[$i]->description);
				$arr[]       =['id'=>$settings[$i]->value,'value'=> $description['vi']];
			}
		}
		return ArrayHelper::map($arr,'id','value');
	}
}