<?php
namespace app\components;
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

/**
 *
 */
class Pype {

    /**
     * [powered description]
     * @param  [type] $image [description]
     * @param  string $color [description]
     * @return [type]        [description]
     */
    public static function powered($image = true, $color = 'black')
    {
        if($image === true)
        {
            return '<a href="https://pype.jacmoe.dk/" rel="external"><img width="90" height="40" title="Powered by Pype" alt="Powered by Pype" src="' . Pype::logo($color) . '"></a>';
        }

        return 'Powered by <a href="https://pype.jacmoe.dk/" rel="external">Pype</a>';
    }

    /**
    * Returns Pype logo ready to use in `<img src="`
    *
    * @return string base64 representation of the image
    */
    public static function logo($color = 'black')
    {
        if($color === 'white')
        {
            return 'data:image/png;base64,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';
        }
        return 'data:image/png;base64,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';
    }

}
