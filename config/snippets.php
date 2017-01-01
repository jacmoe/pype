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
//TODO: figure out how to move this snippet class to components..
use yii\helpers\Url;

/**
 * Custom snippets to extend the Markdown markup
 */
class Snippets extends \jacmoe\mdpages\components\snippets\Snippets
{
    public function clearfix($text=null)
    {
        return "<div class=\"clearfix\"></div>";
    }

    public function icondiv($icon, $clear=false)
    {
        if($clear) {
          return "<div class=\"ui horizontal clearing divider\">
            <i class=\"fi-".$icon."\"></i></div>";
        }
        return "<div class=\"ui horizontal divider\">
            <i class=\"fi-".$icon."\"></i></div>";
    }

    public function inimage($title, $source, $align ="left")
    {
        $image_url = Url::home(true) . "images/" . $source;
        $image_path = \Yii::getAlias('@app/web/images/') . $source;
        if(is_file($image_path)) {
            $image_info = array_values(getimagesize($image_path));
            list($width, $height, $type, $attr) = $image_info;
        }

        return "<span class=\"imagewrap\">"
            . "<img src=\""
            . $image_url
            . "\" alt=\"" . $title
            . "\" title=\"" . $title . "\""
            . (!isset($width) ? "" : " width=\"" . $width . "\" ")
            . (!isset($height) ? "" : " height=\"" . $height . "\" ")
            . "class=\"th gallery "
            . $align . "\">"
            . "</span>";
    }

    public function lightbox($title, $source, $target, $align ="left")
    {
        $target_url = Url::home(true) . "images/" . $target;
        $image_url = Url::home(true) . "images/" . $source;
        $image_path = \Yii::getAlias('@app/web/images/') . $source;
        if(is_file($image_path)) {
            $image_info = array_values(getimagesize($image_path));
            list($width, $height, $type, $attr) = $image_info;
        }

        return "<a href=\""
            . $target_url . "\""
            . " data-lightbox=\""
            . str_replace('.', '_', str_replace('/', '_', $target)) . "\""
            . " data-title=\"" . $title . "\""
            . " title=\"" . $title
            . "\" class=\"sb\"><span class=\"imagewrap\"><img src=\""
            . $image_url
            . "\" alt=\"" . $title . "\" title=\""
            . $title . "\" class=\"gallery th "
            . $align . " floated image\""
            . (!isset($width) ? "" : " width=\"" . $width . "\" ")
            . (!isset($height) ? "" : " height=\"" . $height . "\" ")
            . "/></span></a>";
    }

}

return [
    new Snippets(),
];
