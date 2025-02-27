<?php

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

/*
* Plugin Name: Revi.io - Customer and Product Reviews
* Plugin URI: https://revi.io
* Description: Product ratings and Customer Reviews for WooCommerce ecommerce
* Version: 6.0.18
* Author: <a href="https://revi.io">Revi</a>
* Text Domain: revi-io-customer-and-product-reviews
* License: GPLv2 or later
*/

// Include required files
define('REVI_DIR', WP_PLUGIN_DIR . '/' . plugin_basename(dirname(__FILE__)) . '/');
define('REVI_PLUGIN_URL', plugin_dir_url(__FILE__));

require_once(plugin_dir_path(__FILE__) . 'includes/constants.php');
require_once(plugin_dir_path(__FILE__) . 'includes/functions.php');
require_once(plugin_dir_path(__FILE__) . 'includes/languages.php');
require_once(plugin_dir_path(__FILE__) . 'classes/reviGeneralModel.php');
require_once(plugin_dir_path(__FILE__) . 'classes/reviOrdersModel.php');
require_once(plugin_dir_path(__FILE__) . 'classes/reviProductsModel.php');
require_once(plugin_dir_path(__FILE__) . 'classes/reviWidgetsClass.php');
require_once(plugin_dir_path(__FILE__) . 'classes/reviProductsModel.php');

require_once(plugin_dir_path(__FILE__) .  'widgets/class-revi-widget.php');

require_once(plugin_dir_path(__FILE__) . 'includes/admin.php');
require_once(plugin_dir_path(__FILE__) . 'includes/frontend.php');
require_once(plugin_dir_path(__FILE__) . 'includes/database.php');
require_once(plugin_dir_path(__FILE__) . 'includes/widgets.php');
require_once(plugin_dir_path(__FILE__) . 'includes/shortcodes.php');
require_once(plugin_dir_path(__FILE__) . 'includes/schema.php');
require_once(plugin_dir_path(__FILE__) . 'includes/woocommerce.php');


// Hooks
register_activation_hook(__FILE__, 'revi_install');
register_deactivation_hook(__FILE__, 'revi_uninstall');
add_action('plugins_loaded', 'revi_load_plugin_textdomain');

// Enqueue Frontend Styles and Scripts
add_action('wp_print_styles', 'revi_styles');
add_action('wp_enqueue_scripts', 'revi_scripts'); // Frontend

// Enqueue Admin Styles and Scripts
add_action('admin_enqueue_scripts', 'revi_admin_styles');

// Admin notice
add_action('admin_notices', 'my_theme_notice');

// Register widgets
add_action('widgets_init', 'revi_register_widgets');

// Admin menu
add_action('admin_menu', 'revi_plugin_admin_add_page');

// Query Vars
add_filter('query_vars', 'revi_register_query_var');

// Load Controllers
add_filter('template_include', 'revi_template_include');

// Widgets
$REVI_DISPLAY_WIDGET_FLOATING = get_option('REVI_DISPLAY_WIDGET_FLOATING');
if (isset($REVI_DISPLAY_WIDGET_FLOATING) && $REVI_DISPLAY_WIDGET_FLOATING == 1) {
    add_action('wp_footer', 'revi_load_widget_floating', 100);
}
