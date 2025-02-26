<?php
/**
 * Plugin Name: Advanced Email Filter for Elementor Forms
 * Plugin URI: https://www.mukto.info/project/advanced-email-filter-for-elementor-forms/
 * Description: Adds advanced email filtering capabilities to Elementor Forms.
 * Version: 1.1.0
 * Author: Mahidul Islam Mukto
 * Author URI: https://mukto.info
 * Text Domain: advanced-email-filter-for-elementor-forms
 * Domain Path: /languages
 * License: GPL2+
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('AEFE_PLUGIN_VERSION', '1.1.0');
define('AEFE_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('AEFE_PLUGIN_URL', plugin_dir_url(__FILE__));
define('AEFE_PLUGIN_BASENAME', plugin_basename(__FILE__));

// Verify directory structure exists
if (!file_exists(AEFE_PLUGIN_PATH . 'includes/class-main.php')) {
    wp_die('Plugin installation corrupted - missing required files!');
}

// Autoload all PHP files from includes directory
function aefe_autoload_files() {
    $includes_dir = AEFE_PLUGIN_PATH . 'includes/';
    $admin_dir = $includes_dir . 'admin/';
    $traits_dir = $admin_dir . 'traits/';
    $settings_dir = $admin_dir . 'settings/';
    
    // Scan includes directory
    foreach (glob($includes_dir . '*.php') as $filename) {
        require_once $filename;
    }
    
    // Scan admin directory
    if (is_dir($admin_dir)) {
        foreach (glob($admin_dir . '*.php') as $filename) {
            require_once $filename;
        }
    }
    
    // Scan traits directory
    if (is_dir($traits_dir)) {
        foreach (glob($traits_dir . '*.php') as $filename) {
            require_once $filename;
        }
    }

    // Scan settings directory
    if (is_dir($settings_dir)) {
        foreach (glob($settings_dir . '*.php') as $filename) {
            require_once $filename;
        }
    }
}
aefe_autoload_files();

// Initialize the plugin
AEFE\Main::instance();