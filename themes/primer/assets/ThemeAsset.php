<?php
namespace app\themes\primer\assets;
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

use yii\web\AssetBundle;

class ThemeAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/primer/assets/dist';
    public $css = [
        YII_ENV_DEV ? 'css/all.css' : 'css/all.min.css'
    ];
    public $js = [
        YII_ENV_DEV ? 'js/all.js' : 'js/all.min.js'
    ];
}
