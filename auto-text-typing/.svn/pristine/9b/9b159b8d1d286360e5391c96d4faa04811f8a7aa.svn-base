<?php
/*
  Plugin Name: Melabu WP Auto Text Typing
  Plugin URI:  https://www.tnado.com/wordpress-plugins-by-tnado/
  Description: To view your customers or users with an automatically typed text to describe in more detail and need attention, then this plugin is exactly right. Rate this plugin <a href="https://wordpress.org/support/view/plugin-reviews/auto-text-typing">Melabu WP Auto Text Typing</a> we welcome any support. Your Melibu Team
  Version:     1.0.1
  Author:      Samet Tarim aka prod3v3loper
  Author URI:  https://www.tnado.com/author/prod3v3loper/
  Text Domain: auto-text-typing
  Domain Path: /lang/
  License:     GPLv2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html

  Melabu WP Auto Text Typing is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 2 of the License, or
  any later version.
 
  Melabu WP Auto Text Typing is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.
 
  You should have received a copy of the GNU General Public License
  along with Melabu WP Auto Text Typing. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */

// SECURE SCRIPT ///////////////////////////////////////////////////////////////

define('MAA_PLUGIN_07_DEV', 'Samet Tarim');
define('MAA_PLUGIN_07_DEV_URL', 'https://www.tnado.com/author/prod3v3loper/');
define('MAA_PLUGIN_07_MB_URL', 'https://profiles.wordpress.org/prodeveloper/');
define('MAA_PLUGIN_07_WP_URL', 'https://wordpress.org/plugins/auto-text-typing/');

if (!defined('ABSPATH')) {
    exit;
}

// DEFINE FULLPATH /////////////////////////////////////////////////////////////

if (!defined('MELIBU_PLUGIN_PATH_07')) {
    define('MELIBU_PLUGIN_PATH_07', plugin_dir_path(__FILE__));
}

// DEFINE GLOBALS //////////////////////////////////////////////////////////////

global $MELIBU_PLUGIN_BACKEND_07, $MELIBU_PLUGIN_FRONTEND_07;

// LOAD BACKEND ////////////////////////////////////////////////////////////////

if (is_admin()) {

    // Require Backend Class
    require_once MELIBU_PLUGIN_PATH_07 . 'classes/class.MelibuBackend.php';

    // Check if class
    if (class_exists('MELIBU_PLUGIN_BACKEND_07')) {

        // instantiate the plugin class
        $MELIBU_PLUGIN_BACKEND_07 = new MELIBU_PLUGIN_BACKEND_07();

        // Installation and uninstallation hooks
        register_activation_hook(__FILE__, array('MELIBU_PLUGIN_BACKEND_07', 'activate'));
        register_deactivation_hook(__FILE__, array('MELIBU_PLUGIN_BACKEND_07', 'deactivate'));
        register_uninstall_hook(__FILE__, array('MELIBU_PLUGIN_BACKEND_07', 'uninstall'));
    }

    // Add a link to the settings page onto the plugin page
    if (isset($MELIBU_PLUGIN_BACKEND_07)) {

        // Add the settings link to the plugins page
        function melibu_plugin_settings_07_link($links) {

            $settings_link = '<a href="admin.php?page=melibu-plugin-typing-admin-control-menu-1">' . __('Options', 'auto-text-typing') . '</a>';
            array_unshift($links, $settings_link);
            return $links;
        }

        $plugin = plugin_basename(__FILE__);
        add_filter("plugin_action_links_$plugin", 'melibu_plugin_settings_07_link');
    }
}

// LOAD FRONTEND ///////////////////////////////////////////////////////////////
// Require Frontend Class
require_once MELIBU_PLUGIN_PATH_07 . 'classes/class.MelibuFrontend.php';

// Check if class
if (class_exists('MELIBU_PLUGIN_FRONTEND_07')) {

    // instantiate the plugin class
    $MELIBU_PLUGIN_FRONTEND_07 = new MELIBU_PLUGIN_FRONTEND_07();
}