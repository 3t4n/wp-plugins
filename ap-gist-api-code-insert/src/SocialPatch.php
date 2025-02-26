<?php

namespace Pinchoalex\SocialPatch;

use Pinchoalex\SocialPatch\components\AdminMenu;
use Pinchoalex\SocialPatch\components\HooksLoader;
use Pinchoalex\SocialPatch\components\InstanceLoader;
use Pinchoalex\SocialPatch\components\shortcodes\YoutubeChannelShortcode;
use Pinchoalex\SocialPatch\components\transformers\Settings;
use Pinchoalex\SocialPatch\components\youtube\InPostVideos;

class SocialPatch
{
    public function run()
    {
        $hooks = new HooksLoader();
        // TODO add shortcode class
        $hooks->addShortcode(AP_YOUTUBE_NAME . '_youtube_channel_shortcode', [new YoutubeChannelShortcode(), 'code']);
        $hooks->addAction('init', [$this, 'registerYoutubeChannelBlock']);
        $hooks->addAction('rest_api_init', function () {
            register_rest_route(AP_YOUTUBE_NAME, '/channel-load-more', [
                'methods' => 'POST',
                'callback' => [$this, 'youtubeChannelByPageAction'],
                'permission_callback' => function () {
                    return true;
                }
            ]);
            register_rest_route(AP_YOUTUBE_NAME, '/set-settings-data', [
                'methods' => 'POST',
                'callback' => [$this, 'setSettingsData'],
                'permission_callback' => function () {
                    return true;
                }
            ]);
            register_rest_route(AP_YOUTUBE_NAME, '/get-settings-data', [
                'methods' => 'GET',
                'callback' => [$this, 'getSettingsData'],
                'permission_callback' => function () {
                    return true;
                }
            ]);
        });

        $hooks->addAction('admin_menu', [new AdminMenu(), 'initSettings']);
        $hooks->addFilter('block_categories_all', [$this, 'registerBlockCategory']);
        //$hooks->addFilter('the_content', [new InPostVideos(), 'contentFilter']);
    }

    public function registerBlockCategory($categories)
    {
        $categories[] = array(
            'slug' => 'social-patch',
            'title' => 'Social patch'
        );

        return $categories;
    }

    public function registerYoutubeChannelBlock()
    {
        register_block_type(__DIR__ . '/sp-youtube-channel/build', [
            "attributes" => InstanceLoader::getBlockSettings('sp-youtube-channel')->getBlockAttributes(),
            'render_callback' => [$this, 'youtubeChannelBlockRenderCallback']
        ]);
    }

    public function youtubeChannelBlockRenderCallback($attributes, $content, $block_instance): string
    {
        return InstanceLoader::getChannelVideosView($attributes)->draw();
    }

    public function youtubeChannelByPageAction($data)
    {
        return InstanceLoader::getChannelVideosView(
            (array)json_decode($data->get_param('attributes')),
            json_decode($data->get_param('info'))
        )->drawLoadMore();
    }

    public function getSettingsData()
    {
        echo Settings::getData();
        exit;
    }

    public function setSettingsData($data)
    {
        Settings::setData($data->get_param('settings'));
        exit;
    }
}