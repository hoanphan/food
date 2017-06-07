<?php
$params  = require(__DIR__ . '/params.php');
$baseUrl = str_replace('/web', '', (new \yii\web\Request)->getBaseUrl());
$config  = [
    'id'         => 'basic',
    'basePath'   => dirname(__DIR__),
    'bootstrap'  => [
        'log',
        'multiLanguage',
    ],
    'timeZone'   => 'Asia/Ho_Chi_Minh',
    'language'   => 'vi',
    'components' => [
        'setting' => [
            'class' => 'navatech\setting\Setting',
        ],
        'multiLanguage' => [
            'class' => '\navatech\language\Component',
        ],
        'request'      => [
            'cookieValidationKey' => 'ioOQN-Wa1IdN6iOKWWmb1JxqsfawWQ-h',
            'baseUrl'             => $baseUrl,
        ],
        'cache'        => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['site/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer'       => [
            'class'            => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => [
                        'error',
                        'warning',
                    ],
                ],
            ],
        ],
        'view'         => [
            'class' => 'app\components\View',
            'theme' => [
                'pathMap'  => [
                    '@dektrium/user/views' => '@app/views/user',
                ],
                'basePath' => '@app',
                'baseUrl'  => '@web',
            ],
        ],
        'db'           => require(__DIR__ . '/db.php'),
        'urlManager'   => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules'           => [],
        ],
    ],
    'modules'    => [
        'roxymce'     => [
            'class'       => 'navatech\roxymce\Module',
            'defaultView' => 'list',
        ],
        'gridview'    => [
            'class' => '\kartik\grid\Module',
        ],
        'api'      => [
			'class' => '\app\modules\api\Module',
		],
        'datecontrol' => [
            'class'           => 'kartik\datecontrol\Module',
            'displaySettings' => [
                'date'     => 'php:d-m-Y',
                'time'     => 'H:i:s A',
                'datetime' => 'd-m-Y H:i:s A',
            ],
            'saveSettings'    => [
                'date'     => 'php:Y-m-d',
                'time'     => 'H:i:s',
                'datetime' => 'Y-m-d H:i:s',
            ],
            'autoWidget'      => true,
        ],
        'language' => [
            'class'    => '\navatech\language\Module',
            /*TODO uncommented if you want to custom view*/
            //'viewPath' => '@app/vendor/navatech/yii2-multi-language/src/views',
            /*TODO uncommented if you want to change suffix of translated table / model.
            should be one word, lowercase only.*/
            //'suffix' => 'translate',
        ],
        'setting'  => [
            'class'               => 'navatech\setting\Module',
            'controllerNamespace' => 'navatech\setting\controllers',
            'enableMultiLanguage' => true,//set true if navatech/yii2-multi-language installed and want to translate setting
        ],
    ],
    'params'     => $params,
];
if (YII_ENV_DEV) {
    //	 configuration adjustments for 'dev' environment
    $config['bootstrap'][]      = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];
    $config['bootstrap'][]      = 'gii';
    $config['modules']['gii']['class'] = 'yii\gii\Module';
    $config['modules']['gii']['generators'] = [
        'kartikgii-crud' => ['class' => 'warrence\kartikgii\crud\Generator'],
    ];
}
return $config;
