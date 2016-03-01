<?php
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

        return "<img src=\""
            . $image_url
            . "\" alt=\"" . $title
            . "\" title=\"" . $title . "\""
            . (!isset($width) ? "" : " width=\"" . $width . "\" ")
            . (!isset($height) ? "" : " height=\"" . $height . "\" ")
            . "class=\"th gallery "
            . $align . "\">";
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
            . $target_url
            . "\" data-lightbox=\""
            . $target . "\" title=\"" . $title
            . "\" class=\"sb\"><img src=\""
            . $image_url
            . "\" alt=\"" . $title . "\" title=\""
            . $title . "\" class=\"gallery th "
            . $align . " floated image\""
            . (!isset($width) ? "" : " width=\"" . $width . "\" ")
            . (!isset($height) ? "" : " height=\"" . $height . "\" ")
            . "></a>";
    }

}

return [
    new Snippets(),
];
