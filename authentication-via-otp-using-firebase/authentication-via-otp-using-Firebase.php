<?php

/**
 * Plugin Name: Authentication via OTP using Firebase
 * Description: Add OTP authentication to your wordpress Site via Firebase
 * Version: 1.0.1
 * Author: appgenixinfotech
 * Author URI: https://appgenixinfotech.com/
 * Requires at least: 4.4
 * Tested up to: 5.9
 * Text Domain: authentication-via-otp-using-Firebase
 * Stable tag: 1.0.1
 * Requires PHP: 5.6.20
 **/

defined('ABSPATH') || exit;

# define the path
if (!defined('AAFA_PLUGIN_FILE')) {
    define('AAFA_PLUGIN_FILE', __FILE__);
}
if (!defined('AAFA_PLUGIN_URL')) {
    define('AAFA_PLUGIN_URL', plugin_dir_url(AAFA_PLUGIN_FILE));
}
if (!defined('AAFA_PLUGIN_PATH')) {
    define('AAFA_PLUGIN_PATH', dirname(__FILE__));
}
if (!defined('AAFA_PLUGIN_VER')) {
    define('AAFA_PLUGIN_VER', '1.0');
}

require AAFA_PLUGIN_PATH . "/inc/enqueue.php";
require AAFA_PLUGIN_PATH . "/inc/ajax.php";
require AAFA_PLUGIN_PATH . "/inc/activation.php";

add_action('init', 'aafa_plugin_initialize');
if (!function_exists('aafa_plugin_initialize')) {
    function aafa_plugin_initialize()
    {
        if (is_admin()) {
            # for admin side
            require AAFA_PLUGIN_PATH . "/admin/query.php";
            require AAFA_PLUGIN_PATH . "/admin/admin.php";
        } else {
            # for fronted side
            require AAFA_PLUGIN_PATH . "/inc/hooks.php";
        }
    }
}

// Link to settings page from plugins screen
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'aafa_add_action_links');
if (!function_exists('aafa_add_action_links')) {
    function aafa_add_action_links($links)
    {
        $mylinks = array(
            '<a href="' . esc_url(admin_url('admin.php?page=firebase-auth')) . '">Settings</a>',
        );
        return array_merge($mylinks, $links);
    }
}
