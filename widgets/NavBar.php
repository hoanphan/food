<?php
/**
 * Created by Navatech.
 * @project jav2u-org
 * @author  Phuong
 * @email   phuong17889[at]gmail.com
 * @date    11/04/2016
 * @time    11:46 CH
 */
namespace app\widgets;

use yii\bootstrap\Widget;

class NavBar extends Widget {

	public $assets;

	public function run() {
		return $this->render('navBar', ['assets' => $this->assets]);
	}
}