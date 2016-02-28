<?php
defined('YII_DEBUG') or define('YII_DEBUG', {{app.debug}});
defined('YII_ENV') or define('YII_ENV', '{{app.stage}}');

require('{{release_path}}/vendor/autoload.php');
require('{{release_path}}/vendor/yiisoft/yii2/Yii.php');

$config = require('{{release_path}}/config/web.php');

(new yii\web\Application($config))->run();
