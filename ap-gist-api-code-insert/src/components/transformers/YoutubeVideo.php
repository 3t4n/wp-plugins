<?php

namespace Pinchoalex\SocialPatch\components\transformers;

use Pinchoalex\SocialPatch\components\helpers\YoutubeHelper;

class YoutubeVideo extends Transformer
{
    public function getVideoID()
    {
        return YoutubeHelper::getID($this->data);
    }

    public function getVideoThumbUrl($quality = null)
    {
        return YoutubeHelper::getThumbnailUrl($this->data, $quality);
    }

    public function getTitle()
    {
        return $this->data->snippet->title;
    }

    public function getVideoDuration()
    {
        return $this->data->contentDetails->humanDuration;
    }

    public function getViewsCount()
    {
        $views = (int)$this->data->statistics->viewCount;

        $n = (0+str_replace(",","",$views));

        if(!is_numeric($n)) return $views;

        if($n>1000000000000) return round(($n/1000000000000),1) . __('T', AP_YOUTUBE_NAME);
        else if($n>1000000000) return round(($n/1000000000),1) . __('B', AP_YOUTUBE_NAME);
        else if($n>1000000) return round(($n/1000000),1) . __('M', AP_YOUTUBE_NAME);
        else if($n>1000) return round(($n/1000),1) . __('K', AP_YOUTUBE_NAME);

        return number_format($n);
    }
}