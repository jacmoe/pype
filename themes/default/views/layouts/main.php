<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use jacmoe\mdpages\components\Nav;
use yii\widgets\Breadcrumbs;
use app\components\Pype;
$theme = $this->theme;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::cssFile($theme->getUrl('css/all.css')) ?>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">

    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header>
    <div class="top-bar">
        <div class="top-bar-left">
            <ul>
                <li class="logo">
                    <a href="<?= Yii::$app->homeUrl ?>"><img height="35px" width="80px" src="<?= $theme->getUrl('/pype.svg'); ?>" alt="Pype" /></a>
                </li>
            </ul>
        </div>
        <div class="top-bar-right">
            <?php
            $module = Yii::$app->controller->module ? Yii::$app->controller->module->id : null;
            echo Nav::widget([
                'options' => ['class' => 'menu'],
                'items' => [
                    ['label' => 'Home', 'url' => yii\helpers\Url::to(array('page/view', 'id' => 'index'))],
                    ['label' => 'Blog', 'url' => yii\helpers\Url::to(array('page/view', 'id' => 'blog'))],
                    ['label' => 'About', 'url' => yii\helpers\Url::to(array('page/view', 'id' => 'about'))],
                ],
            ]);
            ?>
        </div>
    </div>
</header>
<main>
    <?= $content ?>
    <hr/>
</main>
<footer>
    <div class="powered"><?= Pype::powered(true, 'black') ?></div>
    <div class="copyright">&copy; The Pype Team <?= date('Y') ?></div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
