<?php
/**
 * Created by Navatech.
 * @project enesti-com-vn
 * @author  Phuong
 * @email   phuong17889[at]gmail.com
 * @date    12/03/2016
 * @time    2:07 SA
 */
namespace app\components;

use app\models\User;
use Yii;
use yii\helpers\Url;

class Controller extends \yii\web\Controller {

	/**@var User */
	public $identity;

	/**
	 * {@inheritDoc}
	 */
	public function init() {
		parent::init();
		$this->identity = Yii::$app->getUser()->getIdentity();
	}

	/**
	 * {@inheritDoc}
	 */
	public function beforeAction($action) {
		if (Yii::$app->user->isGuest) {
			$this->redirect(Url::to(['user/login']));
		}
		return parent::beforeAction($action);
	}
}