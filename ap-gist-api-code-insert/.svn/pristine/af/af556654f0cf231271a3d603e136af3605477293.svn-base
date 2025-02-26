<?php

namespace Pinchoalex\SocialPatch\components\helpers;

class YoutubeHelper
{
    public static function getID($item)
    {
        $vid = $item->snippet->resourceId->videoId ?? null;
        $vid = $vid ? $vid : ($item->id->videoId ?? null);
        return $vid ? $vid : ($item->id ?? null);
    }

    public static function getThumbnailUrl($item, $quality = '', $privacyStatus = '')
    {
        if ($privacyStatus == 'private') {
            $url = 'images/youtube/private.png';
        } elseif (isset($item->snippet->thumbnails->{$quality}->url)) {
            $url = $item->snippet->thumbnails->{$quality}->url;
        } elseif (isset($item->snippet->thumbnails->high->url)) {
            $url = $item->snippet->thumbnails->high->url;
        } elseif (isset($item->snippet->thumbnails->default->url)) {
            $url = $item->snippet->thumbnails->default->url;
        } elseif (isset($item->snippet->thumbnails->medium->url)) {
            $url = $item->snippet->thumbnails->medium->url;
        } else {
            $url = 'images/youtube/deleted-video-thumb.png';
        }
        return $url;
    }
}