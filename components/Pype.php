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
    public static function powered($image = true, $color = 'black', $small = false)
    {
        if($image === true)
        {
            if($small) {
                return '<a href="https://pype.jacmoe.dk/" rel="external"><img width="36" height="16" title="Powered by Pype" alt="Powered by Pype" src="' . Pype::logo($color, $small) . '"></a>';
            } else {
                return '<a href="https://pype.jacmoe.dk/" rel="external"><img width="54" height="24" title="Powered by Pype" alt="Powered by Pype" src="' . Pype::logo($color) . '"></a>';
            }
        }

        return 'Powered by <a href="https://pype.jacmoe.dk/" rel="external">Pype</a>';
    }

    /**
    * Returns Pype logo ready to use in `<img src="`
    *
    * @return string base64 representation of the image
    */
    public static function logo($color = 'black', $small = false)
    {
        if($color === 'white')
        {
            if($small) {
                return 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAQCAYAAAB+690jAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAApgAAAKYB3X3/OAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAONSURBVEiJvZRNiBxVFIXPvVXdPVbPVFd1T3dmRlCJIMxEcTbjQhDjb8DEn2A2gRBc6taVqKjEVVYSRTciLlzFRYSAEbLQYCbBgCvRQYMQgjOdYX7q3dc1PSPVXe+66YYi9ESFJGdV79xz3/vq3aKAEbLW1q21C6Nqd1o8yqzVaolzbvZuwwC7AAEAEe25myBD+aNMa+0xAD/eZRYAI4CstQvOuXIcx1dGNVhrX1DVIwD+IKKWc+5SHMdn7gidqrIx5sS/5URkeZD3ReS8MWb/7WLwAWB1dbUaBMF8p9OZZ2Y2xjxZLpevVqvVG7dqJqK+tfYSEd1rjPmAiB7K8/x1ADXf9z/J8/xdZj4OwBCRB+CAc+77OI7fb7fbQRAE7xDRPQD2Oudei+NY2BhzfGxs7A1VzVX1HDMvM/NKr9ebNca8YozZLyIP3gxjjJk3xrysqrPdbvcbVf1IVR+t1+vdUqm0raq/1+v1X1V1UVUPZVl2KgzDZ4jocJqmrSAITqjq17Va7U1VvTwAh09Ec1EUvTU8aH19/ayqdlqt1p9FgG63O128sTzP1yuVSjY+Pn40iiIFABG5KCIHmfmBPM+/AgBVVWZeZGba2NiYrFQqP/X7/X3MfBDA39baI865nud53w5Hdp+IvM3MFwBcDcOwraqUpmkzy7JWqVSKer3e9SzLXgVwagg0OTm5AmClCO2c+4yZT6rqtUaj8fHW1taefr8/DSAmImo2m20RcTs7O1eCIFhm5nNhGF4eXMSEqpKvqj9HUfR5mqaPqOoBEamKSEZEf3medy0Mw98GI0oBIEmSJwBMGGOeiuP4hyJQvV7/xVo77pxrJ0nycL/fX3HO3WDmBSL6UEQ8IrowMzOz3el03nPOfWmt/U5Ve6r6KRGlSNN0zhjz0q0+3sE4nh++iYjESZLUivU0TZvW2sdE5PTa2tr40E+S5EUROWmMibrd7nSxZ3V1tZqm6ZyqekPPn5iYWBKRwwDO7gaTJEktz/MlAGg2m2mxtrm5uY+I6nmeTwOIAJxvtVpbN+8Rx7EAkKI3NTXVBbBU9BgAPM87Y609uhuQ7/t+o9FYHq5VdUxEnhaRZ8vl8jqA66p6iIi2oij6opDzmXkawKYx5v7d9i+Khg+DkcRRFJ0eFRz8BB/3PC90zm3XarWLRNT7L4f8H1FxISJ7ATynqjtEtFPI5M65jJkXoygytxuiqH8AkPLmOnMn0PgAAAAASUVORK5CYII=';
            } else {
                return 'data:image/png;base64,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';
            }
        }
        if($small) {
            return 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAQCAYAAAB+690jAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAApgAAAKYB3X3/OAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAIRSURBVEiJxdVbaI9xGAfwz7Z/wsycZi0KI2Vzuhma5BBTzsqNklzJFTeSEOKGcicSyYWS3exCSU2hNkW5WlGkJKcLOeSc0Vz8ntf++7f/tgubb/163/d5n8P3+T7P///SO8ahoci7QUVpEft7zBpKIhmKEYLqIWMxAGzDwv9RONeLrQHDcL9IzBpswWNMxF20DAo7aYTHBuD3Mq45tGLZvyKQKVSO+XFKsRRP8Kaf+F+SQpNwFDOxC5U4jUPYjg8ow2rcwhGMxEGMQC124KMI2ItFmBYJZ2AFNkndTy8g8jLIb8TVSF6Jh1F4PE6E74YgXSGtQoc06lOYFz77sDtTqA7784pdwyc8LSBRo6dib/ETW9EVtjasxVRcDlsX2lGCCbiH+vD7Ie1jJ65nia/gABojQARXReBiTMaeAoV6w1zcwNl4rsZOnJcUhHOSojejZoYKlOTwABcwR5pxeXT+As+kMcDnuC6J4OW4XUCoA6PwGrPxSlK1Acelcd7BNxzGpWigE2eyGnXSnPtDU14nY/M6zlCFBWgOUhnW4yTGSGPPR3nUL8sMOTzCZml3iqEy/OhWKkO99O2riaKt+NJLjo9x8vE1Ly+6Px0t0nIWQ07PvRku/QpXSsv9HOuCyMWCuBq8w5Q+8v9FSd59kzSK5j5INWK0tANt0uz/KUoKnmuxCt/jZD6/pUVvl/7kBg1/AP/QZMKlJsRsAAAAAElFTkSuQmCC';
        } else {
            return 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADYAAAAYCAYAAACx4w6bAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAA+QAAAPkBHYYEgQAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAN2SURBVFiF1dd7iFVVFAbw30x3HJqrpZk1OEpJQTkmBYEVBGGlUPSQguwBBj2IqAQjI5ogyAKjpEKjPyowE4pg0qiszIoeJJRYkVMpFJkQSRHE9GAyoz/WPszpzLlz7x3vpH1w4Oy919577bPW962zqY/ZmNeA3SGF9gZsvsR5mDTOvrQUhzVodwSm45tx9KWlaCRi0IufxtORg4Fj8PLBdqLV6MArImL/K1TqjD+Cp/FFA2udjLNwHKbhL3yHjfj6AHxsORbjgSbsz8Qa7MEUnIQ78Ctuabl3Y0QFr2pcNTPcid2FvqUYEsr6n6GWKs7FZuxvwR5bMQFduB1v4kH0pPF5WI/HMBMrMCB+DBbgE6HI96Mtt+4UPIlP8W3JOJiD1YIPz4lobcVTqf8h3IOLjV6oyyK2HNvSexs+x8qCzYc4Mb0fjX1Yl+wm49rUd2Wy6cJ2LEztbnyPG/KL3ohnBfnzWIFqrl1JNouxCKeMcrDzcYGIzMc4IWdzM/aiM7V78VZhnUGsKvStx4b0vhzPF8bXYVO+4/USB+FwXFJjrBayg/XgIiEoxXSfhF9wTWo/bDgSGQZxaa7dKYRoB2bgPZGuG9OzAf24Or/IAM5u8gAZ+nBsrl2WimVYgw8E9wYMRy/DIG4TWTFblJDL8Foaf1twsogOkVntlbTBTVgmoveZqD8/JOMJmCpyv0fUqB+xUxB4BGEbwBOCa31pzyER2VPTfu1p/x25OUsNp992EfE+UU4ydItyo4Itgoz9OFdEb2bqkybuFsqzU6jl32lsX3oyVMVX6yj0FzGAd4UgzRe3hz+FyPyR1l8luLlNpPQcwS1CzJbgHTwqInyF4NmebJOJRhKxUeQL+EKhYitxt0ifWmjDfSJqc0vGBwXv7jJcHiYWbGbgcbyPteKHYATW4qhRj1CO65q0rwpRWCS+7uU17Iri0TQyxVqNW5ucW8WuBm1n4SpRAt7AbyLNXmxyzzHhGRHeRnGa+sIxH9fjHHGQXfhIcGx6jTmnCzG5F0c24c+/kHesW/zNLzE68QnRmaz88jlV1L9OIctZVI8Xkv0zXsDvJXOruDDX3itq1gHjDHFN6apjV4xUZ3JomZDhevPHHWWp1CvqQz9eUvtHeJooD7PE19+Mr8bBxzGhFkfaBdEXiJoyJC6OUnu/SJMtDrFLZIZ/ANausmfM5ruJAAAAAElFTkSuQmCC';
        }
    }

}
