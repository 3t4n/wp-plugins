<?php

namespace GenieImageAi\App\Providers;

defined('ABSPATH') || exit;

class SettingLinkProvider
{

    public function __construct()
    {
        add_filter('plugin_action_links_' . GENIEIMAGE_BASENAME, array($this, 'setting_links'));
    }

    public function setting_links($links)
    {
        $plugin_path = 'getgenie/getgenie.php';

        // Check if the plugin is active
        if (is_plugin_active($plugin_path)) {
            $settings_link = '<a href="' . admin_url('admin.php?page=getgenie#license') . '">Settings</a>';
        } else {
            $settings_link = '<a href="' . admin_url('admin.php?page=genieimage#image-license') . '">Settings</a>';
        }

        array_unshift($links, $settings_link);
        return $links;
    }
}
