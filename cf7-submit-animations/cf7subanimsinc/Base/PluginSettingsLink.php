<?php

/**
 * @package CF7SubmitAnimations
 */

namespace Cf7subanimsinc\Base;

use Cf7subanimsinc\Base\BaseController;

class PluginSettingsLink extends BaseController
{
    function register()
    {
        add_filter("plugin_action_links_$this->plugin", array($this, 'my_plugin_settings_link'));
    }

    function my_plugin_settings_link($links)
    {
        $settings_link = '<a href="admin.php?page=cf7_submit_animations">Settings</a>';
        array_unshift($links, $settings_link);
        return $links;
    }
}
