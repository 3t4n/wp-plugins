<?php

namespace DavidWenner\ATestimonialBuilder;

class ATBS_YoutubeImageResolver {

    /**
     * resolveYoutubeImage
     * @param array $item
     * @return array
     */
    public static function resolveYoutubeImage($item)
    {
        if (!empty($item['url']) && empty($item['picture_path'])) {
            if (($youtubeId = static::getId($item['url'])) !== null) {
                $item['picture_path'] = 'https://img.youtube.com/vi/' . $youtubeId . '/hqdefault.jpg';
            }
        }
        return $item;
    }

    /**
     * resolveYoutubeImages
     * @param array $items
     * @return array
     */
    public static function resolveYoutubeImages($items)
    {
        foreach ($items as $i => $item) {
            $items[$i] = static::resolveYoutubeImage($item);
        }
        return $items;
    }

    /**
     * getId
     * @return mixed
     */
    public static function getId($url)
    {
        $youtubeId = null;
        $pattern = '/(?<=v(\=|\/))([-a-zA-Z0-9_]+)|(?<=youtu\.be\/)([-a-zA-Z0-9_]+)/';
        preg_match($pattern, $url, $matches);
        if (isset($matches[0]) && !empty($matches[0])) {
            $youtubeId = $matches[0];
        }
        return $youtubeId;
    }
}
