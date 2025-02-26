<?php

namespace Pinchoalex\SocialPatch\components\shortcodes;

use Pinchoalex\SocialPatch\components\InstanceLoader;

class YoutubeChannelShortcode
{
    public function code($attributes): string
    {
        wp_enqueue_style(
            AP_YOUTUBE_NAME . '_youtube_channel_shortcode-styles',
            AP_YOUTUBE_PLUGIN_URL . 'src/sp-youtube-channel/build/style-index.css'
        );
        wp_enqueue_script(
            AP_YOUTUBE_NAME . '_youtube_channel_shortcode-scripts',
            AP_YOUTUBE_PLUGIN_URL . 'src/sp-youtube-channel/build/public.js'
        );

        return InstanceLoader::getChannelVideosView($this->prepareAttributes($attributes))->draw();
    }

    protected function prepareAttributes($attributes)
    {
        $keys = array_map(function ($str) {
            $str = ucwords(str_replace('_', ' ', $str));
            return lcfirst(str_replace(' ', '', $str));
        }, array_keys($attributes));

        $values = array_map(function ($value) {
            $lowercaseValue = strtolower($value);
            if ($lowercaseValue === 'true' || $lowercaseValue === 'false') {
                return filter_var($lowercaseValue, FILTER_VALIDATE_BOOLEAN);
            }
            return $value;
        }, array_values($attributes));

        return array_combine($keys, $values);
    }
}