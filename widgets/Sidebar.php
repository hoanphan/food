<?php
/**
 * Created by PhpStorm.
 * Author: Phuong
 * Email: notteen@gmail.com
 * Date: 17/12/2015
 * Time: 5:29 CH
 */
namespace app\widgets;



use app\components\Widget;
use Yii;

class Sidebar extends Widget {

	public function run() {
		return $this->render("sidebar");
	}
    /**
     * @param array|string      $controller
     * @param null|array|string $action
     * @param null|array|string $params
     *
     * @return string
     */
    public static function isActive($controller, $action = null, $params = null) {
        $string = '';
        if (!is_array($controller)) {
            $controller = [$controller];
        }
        if ($action !== null && !is_array($action)) {
            $action = [$action];
        }
        if ($params !== null && !is_array($params)) {
            $params = [$params];
        }
        if (in_array(Yii::$app->controller->id, $controller, true)) {
            if ($action === null || ($action != null && in_array(Yii::$app->controller->action->id, $action, true))) {
                if ($params === null || in_array($params, array_chunk(Yii::$app->controller->actionParams, 1, true))) {
                    $string = 'active';
                }
            }
        }
        return $string;

    }
}