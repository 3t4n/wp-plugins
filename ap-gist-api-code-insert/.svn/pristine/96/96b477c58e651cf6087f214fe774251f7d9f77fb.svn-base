<?php

namespace Pinchoalex\SocialPatch\components;

use Jenssegers\Blade\Blade;
use Pinchoalex\SocialPatch\components\requests\ChannelVideos;
use Pinchoalex\SocialPatch\components\requests\RequestBuilder;
use Pinchoalex\SocialPatch\components\transformers\BlockSettings;
use Pinchoalex\SocialPatch\components\transformers\Settings;
use Pinchoalex\SocialPatch\components\youtube\ChannelVideos as ChannelVideosView;

class InstanceLoader
{
    public static function getBlade(): Blade
    {
        $uploads = wp_upload_dir();
        return new Blade(
            AP_YOUTUBE_PLUGIN_PATH . '/src/templates',
            $uploads['basedir'] . '/' . AP_YOUTUBE_NAME .'/blade/cache'
        );
    }

    public static function getRequestBuilder(): RequestBuilder
    {
        return new RequestBuilder();
    }

    public static function getChannelVideosRequestBuilder(): ChannelVideos
    {
        return new ChannelVideos();
    }

    public static function getChannelVideosView(array $attributes, $info = null): ChannelVideosView
    {
        return new ChannelVideosView($attributes, $info);
    }

    public static function getSettings(): Settings
    {
        return new Settings();
    }

    public static function getBlockSettings($fileName): BlockSettings
    {
        return new BlockSettings($fileName);
    }
}