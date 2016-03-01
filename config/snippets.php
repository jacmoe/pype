<?php

class Snippets extends \jacmoe\mdpages\components\snippets\Snippets
{
    public function clearfix($text=null) {
        return "<div class=\"clearfix\"></div>";
    }

    public function icondiv($icon, $clear=false) {
        if($clear)
        {
          return "<div class=\"ui horizontal clearing divider\"><i class=\"fi-".$icon."\"></i></div>";
        }
        return "<div class=\"ui horizontal divider\"><i class=\"fi-".$icon."\"></i></div>";
    }
}

return [
    new Snippets(),
];
