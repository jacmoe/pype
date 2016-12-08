<?php
namespace Deployer;

require_once __DIR__ . '/deployer/recipe/yii-configure.php';
require_once __DIR__ . '/deployer/recipe/yii2-app-basic.php';
require_once __DIR__ . '/deployer/recipe/local-config.php';

if (!file_exists (__DIR__ . '/deployer/stage/servers.yml')) {
  die('Please create "' . __DIR__ . '/deployer/stage/servers.yml" before continuing.' . "\n");
}
serverList(__DIR__ . '/deployer/stage/servers.yml');
set('repository', '{{repository}}');

set('default_stage', 'production');

set('keep_releases', 2);

set('writable_use_sudo', false); // Using sudo in writable commands?

task('deploy:configure_composer', function () {
  $stage = get('app.stage');
  if($stage == 'dev') {
    set('composer_options', 'install --verbose --no-progress --no-interaction');
  }
})->desc('Configure composer');

// build assets
task('deploy:build_assets', function () {
   runLocally('gulp build --production');
   upload(__DIR__ . '/themes/bourbon/assets/dist/css', '{{release_path}}/themes/bourbon/assets/dist/css');
   upload(__DIR__ . '/themes/bourbon/assets/dist/js', '{{release_path}}/themes/bourbon/assets/dist/js');
   upload(__DIR__ . '/themes/bourbon/assets/dist/fonts', '{{release_path}}/themes/bourbon/assets/dist/fonts');
   upload(__DIR__ . '/themes/bourbon/assets/dist/img', '{{release_path}}/themes/bourbon/assets/dist/img');
})->desc('Build assets');

// update symlink to images dir
task('deploy:images_symlink', function () {
    run('php {{release_path}}/yii mdpages/pages/symlink');
})->desc('Update images symlink');

task('flush_cache', function () {
    run('php {{release_path}}/yii cache/flush-all');
})->desc('Flush the cache');

task('flush_templates', function() {
    $templatePath = "{{deploy_path}}/shared/runtime/Jade";
    run("if [ -d $(echo $templatePath) ]; then rm -rf $templatePath; fi");
})->desc('Flush the templates');

after('deploy:shared', 'deploy:configure');
before('deploy:vendors', 'deploy:configure_composer');
after('deploy:vendors', 'deploy:build_assets');
after('deploy:build_assets', 'deploy:images_symlink');
