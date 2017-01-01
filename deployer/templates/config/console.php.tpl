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

return [
    'id' => 'pype-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'modules' => [
      'mdpages' => [
        'class' => 'jacmoe\mdpages\Module',
        'repository_url' => 'https://github.com/{{app.github.owner}}/{{app.github.repo}}.git',
        'github_token' => '{{app.github.token}}',
        'github_owner' => '{{app.github.owner}}',
        'github_repo' => '{{app.github.repo}}',
        'github_branch' => '{{app.github.branch}}',
        'absolute_wikilinks' => true,
        'generate_page_toc' => true,
        'snippets' => $snippets,
      ],
    ],
    'params' => $params,
];
