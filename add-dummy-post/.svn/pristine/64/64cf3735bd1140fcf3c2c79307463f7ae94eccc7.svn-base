<?php
/*
Plugin Name:    Add dummy post
Plugin URI:     https://wordpress.org/plugins/add-dummy-post/
Description:    Add Dummy Post in WordPress
Version:        1.0.3
Author:         shubhamsedani
Author URI:     https://shubhamsedani.com
License:        GPLv2 or later
License URI:    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
Text Domain:    adp
Domain Path:    /languages
Requires at least: 4.9
Tested up to: 6.4.1
Requires PHP: 5.2.4
*/

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

if (!defined('ADP_DIR')) {
    define('ADP_DIR', dirname(__FILE__)); // plugin dir
}
if (!defined('ADP_URL')) {
    define('ADP_URL', plugin_dir_url(__FILE__)); // plugin url
}
if (!defined('ADP_BASENAME')) {
    define('ADP_BASENAME', 'ADP');  // plugin base name
}
if (!defined('ADP_ADMIN_DIR')) {
    define('ADP_ADMIN_DIR', ADP_DIR . '/backend'); // plugin admin dir
}
if (!defined('ADP_ADMIN_URL')) {
    define('ADP_ADMIN_URL', ADP_DIR . 'backend'); // plugin admin url
}
if (!defined('ADP_SETTINGS_TABLE')) {
    define('ADP_SETTINGS_TABLE', 'ADP_settings');  // define the table name - to store seleted options details
}

//include custom function file for backend
include ADP_ADMIN_DIR . '/includes/adp-back-end-custom-functions.php';

//get more knowledge on this
function adp_load_scripts()
{
    wp_enqueue_style('adp_custom_css', ADP_URL . 'backend/assets/public-style.css');
    wp_enqueue_script('adp_custom_js', ADP_URL . 'backend/assets/public-script.js');
}
add_action('admin_init', 'adp_load_scripts');

/**
 * Activation Hook
 *
 * Register plugin activation hook.
 */
register_activation_hook(__FILE__, 'adp_install');

/**
 * Deactivation Hook
 *
 * Register plugin deactivation hook.
 */
register_deactivation_hook(__FILE__, 'adp_deactivate');

/**
 * Uninstall Hook
 *
 * Register plugin deactivation hook.
 */
register_uninstall_hook(__FILE__, 'adp_uninstall');

/**
 * Plugin Setup (On Activation)
 *
 * Does the initial setup,
 * stest default values for the plugin options.
 */
function adp_install()
{
    //create custom table for plugin
    //Need to call this without fail when custom post type is being used in plugin
    flush_rewrite_rules();
}

/**
 * Plugin Setup (On Deactivation)
 *
 * Delete plugin options.
 */
function adp_deactivate()
{
    // Delete time process
}

/**
 * Plugin Setup (On Uninstall)
 *
 * Delete plugin options.
 */
function adp_uninstall()
{
    //drop custom table for plugin
}
