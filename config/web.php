<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'pype',
    'basePath' => dirname(__DIR__),
    'defaultRoute' => '/mdpages/default/index',
    'layout' => '@jacmoe/mdpages/views/layouts/main.php',
    'bootstrap' => ['log'],
    'components' => [
            'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'PaldaMQ2zFEsAhv2SPRlp2it_XNnSuJz',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => '\yii\web\IdentityInterface',
        ],
        'errorHandler' => [
            'errorAction' => '/mdpages/default/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'modules' => [
        'mdpages' => [
            'class' => 'jacmoe\mdpages\Module',
        ],
    ],
    'params' => $params,
];

return $config;
