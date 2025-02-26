<?php
/**
 * Plugin Name: Duplicate Copy Post
 * Description: A plugin to easily duplicate posts with advanced options and settings profiles.
 * Version: 1.0.1
 * Author: ExxonSoft
 * Author URI: https://exxonsoft.com
 * Text Domain: duplicate-copy-post
 * Domain Path: /languages
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Define constants.
define('DCPDUP_VERSION', '1.0');
define('DCPDUP_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('DCPDUP_PLUGIN_URL', plugin_dir_url(__FILE__));
define('DCPDUP_TEXT_DOMAIN', 'duplicate-copy-post');

// Load text domain for translations.
function DCPDUP_load_textdomain() {
    load_plugin_textdomain(DCPDUP_TEXT_DOMAIN, false, DCPDUP_PLUGIN_DIR . '/languages');
}
add_action('plugins_loaded', 'DCPDUP_load_textdomain');

// Include necessary files.
function DCPDUP_include_files() {
    // Includes folder files
    require_once DCPDUP_PLUGIN_DIR . 'includes/class-post-duplicate.php';
    require_once DCPDUP_PLUGIN_DIR . 'includes/class-duplicate-settings.php';
    require_once DCPDUP_PLUGIN_DIR . 'includes/class-custom-field-manager.php';
    require_once DCPDUP_PLUGIN_DIR . 'includes/class-seo-metadata-duplicate.php';
    require_once DCPDUP_PLUGIN_DIR . 'includes/class-profile-handler.php';
    require_once DCPDUP_PLUGIN_DIR . 'includes/class-conditional-duplication.php';
    require_once DCPDUP_PLUGIN_DIR . 'includes/class-content-variation.php';
    require_once DCPDUP_PLUGIN_DIR . 'includes/class-duplicate-history.php';
    require_once DCPDUP_PLUGIN_DIR . 'includes/class-multisite-duplication.php';

    // Admin folder files
    require_once DCPDUP_PLUGIN_DIR . 'admin/class-admin-menu.php';
    require_once DCPDUP_PLUGIN_DIR . 'admin/class-admin-enqueue.php';
}
add_action('plugins_loaded', 'DCPDUP_include_files');

// Enqueue admin assets (CSS, JS)
function DCPDUP_enqueue_admin_assets() {
    wp_enqueue_style('dcpddu-admin-style', DCPDUP_PLUGIN_URL . 'assets/css/admin-style.css', array(), DCPDUP_VERSION);
    wp_enqueue_script('dcpddu-admin-script', DCPDUP_PLUGIN_URL . 'assets/js/admin-script.js', array('jquery'), DCPDUP_VERSION, true);
}
add_action('admin_enqueue_scripts', 'DCPDUP_enqueue_admin_assets');

// Activation hook.
function DCPDUP_activate_plugin() {
    // Run necessary activation tasks, such as creating database tables.
}
register_activation_hook(__FILE__, 'DCPDUP_activate_plugin');

// Deactivation hook.
function DCPDUP_deactivate_plugin() {
    // Run necessary deactivation tasks.
}
register_deactivation_hook(__FILE__, 'DCPDUP_deactivate_plugin');
