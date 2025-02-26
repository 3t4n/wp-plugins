<?php
/**
 * Plugin Name: Super Ajax Search
 * Description: Super Ajax search results based on custom post types. Use the shortcode [super_ajax_search] to display the search form with live search results.
 * Version: 1.5.0
 * Author: Naveen Gaur
 * Author URI: https://techwithnavi.com/
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: super-ajax-search
 * Domain Path: /languages
 *
 * Super Ajax Search provides live search results as users type, allowing searches across various content types like posts, pages, custom post types, WooCommerce products, and custom fields.
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define constants for the plugin path and URL
define('SUPER_AJAX_SEARCH_PATH', plugin_dir_path(__FILE__));
define('SUPER_AJAX_SEARCH_URL', plugin_dir_url(__FILE__));
define('SUPER_AJAX_SEARCH_VERSION', '1.4.0');

// Autoload plugin files
require_once SUPER_AJAX_SEARCH_PATH . 'includes/class-super-ajax-search.php';
require_once SUPER_AJAX_SEARCH_PATH . 'includes/class-super-ajax-search-admin.php';

// Initialize the plugin classes
function ajax_searchwp_init() {
    if (is_admin()) {
        // Load the admin-specific functionality
        new Ajax_SearchWP_Admin();
    } else {
        // Load the frontend functionality
        new Ajax_SearchWP();
    }
}
add_action('plugins_loaded', 'ajax_searchwp_init');

/**
 * Load plugin text domain for translations.
 */
function ajax_searchwp_load_textdomain() {
    load_plugin_textdomain('super-ajax-search', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'ajax_searchwp_load_textdomain');
