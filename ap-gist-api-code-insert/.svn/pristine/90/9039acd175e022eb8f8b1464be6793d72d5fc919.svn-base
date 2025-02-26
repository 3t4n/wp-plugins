<?php

namespace Pinchoalex\SocialPatch\components;

class AdminMenu
{
    public function initSettings()
    {
        add_menu_page(
            AP_YOUTUBE_NAME,
            AP_YOUTUBE_NAME . ' Options',
            'manage_options',
            AP_YOUTUBE_NAME,
            [$this, 'render']
        );
    }

    public function render()
    {
        if (!current_user_can('manage_options')) {
            return;
        }

        $manifest = file_get_contents(AP_YOUTUBE_PLUGIN_PATH . '/dist/manifest.json');
        $manifestData = json_decode($manifest, true);

        wp_enqueue_style(AP_YOUTUBE_NAME . '-settings-page-font', "https://fonts.googleapis.com/css?family=Roboto:300,300i,400,500,500i&display=swap&subset=cyrillic");

        if (isset($manifestData['src/main.css']['file'])) {
            wp_enqueue_style(AP_YOUTUBE_NAME . '-settings-page-style', AP_YOUTUBE_PLUGIN_URL . 'dist/' . $manifestData['src/main.css']['file']);
        }

        if (isset($manifestData['src/main.jsx']['file'])) {
            wp_enqueue_script(AP_YOUTUBE_NAME . '-settings-page-script', AP_YOUTUBE_PLUGIN_URL . 'dist/' . $manifestData['src/main.jsx']['file']);
            wp_localize_script(AP_YOUTUBE_NAME . '-settings-page-script', AP_YOUTUBE_NAME . '_script_vars', [
                'restUrl' => esc_url_raw(rest_url()),
            ]);
        }

        echo '<div id="' . AP_YOUTUBE_NAME . '_root">Loading settings app</div>';
    }
}