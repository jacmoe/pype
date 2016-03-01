<?php

return [
    'clearfix' => function($text=null) {
      return "<div class=\"clearfix\"></div>";
    },
    'icondiv' => function($icon, $clear=false) {
      if($clear)
      {
        return "<div class=\"ui horizontal clearing divider\"><i class=\"fi-".$icon."\"></i></div>";
      }
      return "<div class=\"ui horizontal divider\"><i class=\"fi-".$icon."\"></i></div>";
    },
];
