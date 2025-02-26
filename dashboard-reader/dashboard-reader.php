<?php
/**
 * Plugin Name: Dashboard Reader
 * Plugin URI: https://richwp.com/new-plugin-dashboard-reader-cutting-through-the-noise-its-free/
 * Description: Displays multiple RSS feeds in the WordPress admin dashboard, each in its own widget.
 * Version: 1.1
 * Requires at least: 5.8
 * Tested up to: 6.4
 * Requires PHP: 7.4
 * Author: Felix Krusch
 * Author URI: https://richwp.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: dashboard-reader
 * Domain Path: /languages
 */


// Prevent direct access to the file
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

register_activation_hook(__FILE__, 'dashboard_reader_activate');
register_deactivation_hook(__FILE__, 'dashboard_reader_deactivate');

function dashboard_reader_activate() {
    // Check if the 'dashboard_reader_settings' option already exists
    if (false === get_option('dashboard_reader_settings')) {
        // Default settings
        $default_settings = array(
            'dashboard_reader_textarea_field' => "https://wptavern.com/feed/\nhttps://richwp.com/feed/",
            'dashboard_reader_refresh_interval' => 12,
            'dashboard_reader_item_count' => 5,
        );

        // Save the default settings
        add_option('dashboard_reader_settings', $default_settings);
    }
}

function dashboard_reader_deactivate() {
    // Clean up upon deactivation. Delete transients.
    delete_transient('dashboard_reader_feed_titles');
}

add_action('plugins_loaded', 'dashboard_reader_load_textdomain');

function dashboard_reader_load_textdomain() {
    load_plugin_textdomain('dashboard-reader', false, basename(dirname(__FILE__)) . '/languages');
}

// Include the file for admin settings page
require_once plugin_dir_path(__FILE__) . 'includes/admin-settings.php';

// Include the file for dashboard widget functionality
require_once plugin_dir_path(__FILE__) . 'includes/dashboard-widgets.php';