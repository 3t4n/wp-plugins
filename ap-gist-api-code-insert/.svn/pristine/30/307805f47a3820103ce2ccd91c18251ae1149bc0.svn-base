<?php

namespace Pinchoalex\SocialPatch\components\youtube;

class InPostVideos
{
    public function contentFilter($content)
    {
        if (is_singular()) {
            $data = do_shortcode('[social_patch_youtube_keyword_videos_shortcode keyword="' . get_the_title() . '"]');
            return $content . $data;
        }

        return $content;
    }

    public function getResponse()
    {

    }
}