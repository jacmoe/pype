<?php

$params = require(__DIR__ . '/params.php');
$snippets = require(__DIR__ . '/snippets.php');

$theme = 'default';

$config = [
    'id' => 'pype',
    'basePath' => dirname(__DIR__),
    'defaultRoute' => '/wiki/page',
    'layout' => '@app/themes/' . $theme . '/views/layouts/main.php',
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => '\yii\web\IdentityInterface',
        ],
        'errorHandler' => [
            'errorAction' => '/wiki/page/error',
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
                [
                    'pattern' => '/rss',
                    'route' => '/wiki/page/rss',
                ],
                [
                    'pattern' => '<id:[\w_\/-]+>',
                    'route' => '/wiki/page/view',
                    'encodeParams' => false
                ],
                [
                    'pattern' => '<module:\w+>/<controller:\w+>/<action:\w+>/<id:[\w_\/-]+>',
                    'route' => '<module>/<controller>/<action>',
                    'encodeParams' => false
                ],
                '<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
            ],
        ],
        'view' => [
            'theme' => [
                'basePath' => '@app/themes/' . $theme,
                'baseUrl' => '@web/themes/' . $theme,
                'pathMap' => [
                    '@app/views' => '@app/themes/' . $theme . '/views',
                    '@jacmoe/mdpages/views' => '@app/themes/' . $theme . '/views',
                ],
            ],
        ],
    ],
    'modules' => [
        'wiki' => [
            'class' => 'jacmoe\mdpages\Module',
            'repository_url' => 'https://github.com/{{app.github.owner}}/{{app.github.repo}}.git',
            'github_token' => '{{app.github.token}}',
            'github_owner' => '{{app.github.owner}}',
            'github_repo' => '{{app.github.repo}}',
            'absolute_wikilinks' => true,
            'generate_page_toc' => true,
            'snippets' => $snippets,
        ],
    ],
    'params' => $params,
];

return $config;
