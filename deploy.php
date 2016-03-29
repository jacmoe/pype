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
if (!file_exists (__DIR__ . '/gulpfile.js')) {
    $command = end(explode(DIRECTORY_SEPARATOR, $argv[0]));
    if(isset($argv[2])) {
        if(($argv[1] . ' ' . $argv[2] != 'local-config local')) {
            die('You need to run "' . $command . ' local-config local" to create the initial configuration files before continuing.' . "\n");
        }
    } else {
        die('You need to run "' . $command . ' local-config local" to create the initial configuration files before continuing.' . "\n");
    }
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
   runLocally('gulp build --production');
   $theme = env('app.theme');
   upload(__DIR__ . '/themes/' . $theme . '/assets/dist/css', '{{release_path}}/themes/' . $theme . '/assets/dist/css');
   upload(__DIR__ . '/themes/' . $theme . '/assets/dist/js', '{{release_path}}/themes/' . $theme . '/assets/dist/js');
   upload(__DIR__ . '/themes/' . $theme . '/assets/dist/fonts', '{{release_path}}/themes/' . $theme . '/assets/dist/fonts');
   upload(__DIR__ . '/themes/' . $theme . '/assets/dist/img', '{{release_path}}/themes/' . $theme . '/assets/dist/img');
})->desc('Build assets');

// update symlink to images dir
task('deploy:images_symlink', function () {
    run('php {{release_path}}/yii mdpages/pages/symlink');
})->desc('Update images symlink');

// flush the cache
task('flush_cache', function () {
    run('php {{release_path}}/yii cache/flush-all');
})->desc('Flush the cache');

// flush the templates
task('flush_templates', function() {
    $templatePath = "{{deploy_path}}/shared/runtime/Jade";
    run("if [ -d $(echo $templatePath) ]; then rm -rf $templatePath; fi");
})->desc('Flush the templates');

after('deploy:shared', 'deploy:configure');
before('deploy:vendors', 'deploy:configure_composer');
after('deploy:vendors', 'deploy:build_assets');
after('deploy:build_assets', 'deploy:images_symlink');
