<?php
namespace app\modules\api;
/**
 * api module definition class
 */
class Module extends \yii\base\Module {

	/**
	 * @inheritdoc
	 */
	public $controllerNamespace = 'app\modules\api\controllers';

	public $layout              = false;

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
	}
}
