<?php
/**
 * Created by Navatech
 * @project sgl-com-vn
 * @author  Le Phuong
 * @email phuong17889@gmail.com
 * @time    3/30/2017 10:58 AM
 */

namespace app\components;

use app\models\User;

class View extends \yii\web\View {

	/**@var User */
	public $user;

	/**
	 * {@inheritDoc}
	 */
	public function init() {
		parent::init();
		if (\Yii::$app->user->isGuest) {
			$this->user = \Yii::$app->user->identity;
		}
	}
}