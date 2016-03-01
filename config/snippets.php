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

    public function inimage($title, $source, $align ="left", $width=320, $height=240, $size="large")
    {
        return "<img src=\""
            .Url::home(true)
            ."images/".$source."\" alt=\"".$title
            ."\" title=\"".$title."\" class=\"th gallery "
            .$size." ".$align."\">";
    }

    public function lightbox($title, $source, $target, $align ="left", $width=320, $height=240, $size="large")
    {
        return "<a href=\""
            .Url::home(true)
            ."images/".$target."\" data-lightbox=\""
            .$target."\" title=\"".$title
            ."\" class=\"sb\"><img src=\""
            .Url::home(true)
            ."images/"
            .$source."\" alt=\"".$title."\" title=\""
            .$title."\" class=\"gallery th ".$size." "
            .$align." floated image\"></a>";
    }

}

return [
    new Snippets(),
];
