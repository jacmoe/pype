<?php
/*
* This file is part of
*  _ __  _   _ _ __   ___
* | '_ \| | | | '_ \ / _ \
* | |_) | |_| | |_) |  __/
* | .__/ \__, | .__/ \___|
* |_|    |___/|_|
*                 Personal Yii Page Engine
*
*	Copyright (c) 2016 - 2017 Jacob Moen
*	Licensed under the MIT license
*/

$params = require(__DIR__ . '/params.php');
$snippets = require(__DIR__ . '/snippets.php');

$theme = '{{app.theme}}';

$config = [
    'id' => 'pype',
    'basePath' => dirname(__DIR__),
    'defaultRoute' => '/wiki/page',
    'layout' => '@app/themes/' . $theme . '/views/layouts/main.jade',
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
        'assetManager' => [
            'linkAssets' => true,
            'appendTimestamp' => true,
        ],
        'view' => [
            'class' => 'jacmoe\mdpages\components\View',
            'defaultExtension' => 'jade',
            'renderers' => [
                'jade' => [
                    'class' => 'jacmoe\talejade\JadeViewRenderer',
                    'cachePath' => '@runtime/Jade/cache',
                    'options' => [
                        'pretty' => true,
                        'lifeTime' => {{app.template_engine.lifetime}},//3600 -> 1 hour
                    ],
                ],
            ],
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
            'github_branch' => '{{app.github.branch}}',
            'absolute_wikilinks' => true,
            'generate_page_toc' => true,
            'feed_title' => 'Pages',
            'feed_description' => 'Pype Rss Feed',
            'feed_author_email' => 'noreply@pype.jacmoe.dk',
            'feed_author_name' => 'Pype Team',
            'feed_filtering' => false,
            'feed_filter' => ['published', '==', true],
            'snippets' => $snippets,
        ],
    ],
    'params' => $params,
];

return $config;
