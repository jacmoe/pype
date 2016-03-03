<?php
require_once __DIR__ . '/deployer/recipe/yii-configure.php';
require_once __DIR__ . '/deployer/recipe/yii2-app-basic.php';
require_once __DIR__ . '/deployer/recipe/local-config.php';
/*
* This file is part of
*  _ __  _   _ _ __   ___
* | '_ \| | | | '_ \ / _ \
* | |_) | |_| | |_) |  __/
* | .__/ \__, | .__/ \___|
* |_|    |___/|_|
*                 Personal Yii Page Engine
*
*	Copyright (c) 2016 Jacob Moen
*	Licensed under the MIT license
*/

if (!file_exists (__DIR__ . '/deployer/stage/servers.yml')) {
  die('Please create "' . __DIR__ . '/deployer/stage/servers.yml" before continuing.' . "\n");
}
serverList(__DIR__ . '/deployer/stage/servers.yml');
set('repository', '{{repository}}');

set('default_stage', 'production');

set('keep_releases', 2);

set('writable_use_sudo', false); // Using sudo in writable commands?

task('deploy:configure_composer', function () {
  $stage = env('app.stage');
  if($stage == 'dev') {
    env('composer_options', 'install --verbose --no-progress --no-interaction');
  }
})->desc('Configure composer');

// build assets
task('deploy:build_assets', function () {
   runLocally('gulp build');
   upload(__DIR__ . '/themes/primer/dist/css', '{{release_path}}/themes/primer/dist/css');
   upload(__DIR__ . '/themes/primer/dist/js', '{{release_path}}/themes/primer/dist/js');
   upload(__DIR__ . '/themes/primer/dist/fonts', '{{release_path}}/themes/primer/dist/fonts');
})->desc('Build assets');

// update symlink to images dir
task('deploy:images_symlink', function () {
    run('php {{release_path}}/yii mdpages/pages/symlink');
})->desc('Update images symlink');

after('deploy:shared', 'deploy:configure');
before('deploy:vendors', 'deploy:configure_composer');
after('deploy:vendors', 'deploy:build_assets');
after('deploy:build_assets', 'deploy:images_symlink');
