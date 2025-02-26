<?php
/**
 * Plugin Name: ConeBlog - Elementor Blog Widgets
 * Description: Beautiful Blog widgets for WordPress, Elementor, and Page Builders.
 * Plugin URI:  https://wpcone.com/plugins/coneblog-widgets/
 * Version:     1.5.3
 * Author:      WPCone.com
 * Author URI:  https://wpcone.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: coneblog-widgets
 * Requires Plugins: elementor
 * Elementor tested up to: 3.23.0
 * Elementor Pro tested up to: 3.23.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
if(!defined('CONEBLOG_WIDGETS')) {
    define( 'CONEBLOG_WIDGETS', __FILE__ );
}
if(!defined('CONEBLOG_PLUGIN_PATH')) {
    define( "CONEBLOG_PLUGIN_PATH", plugin_dir_path(__FILE__) );
}
if(!defined('CONEBLOG_ASSETS_PATH')) {
    define( "CONEBLOG_ASSETS_PATH", plugins_url( 'assets/', __FILE__ ) );
}
if(!defined('CONEBLOG_WIDGET_ASSETS_PATH')) {
    define( "CONEBLOG_WIDGET_ASSETS_PATH", plugins_url( 'widgets/', __FILE__ ) );
}

/**
 * Include helper functions class.
 */
require CONEBLOG_PLUGIN_PATH . 'inc/Helper.php';

/**
 * Include the plugin loader class.
 */
require CONEBLOG_PLUGIN_PATH . 'plugin-loader.php';

/**
 * Include the plugin settings page.
 */
require CONEBLOG_PLUGIN_PATH . 'plugin-settings.php';

/**
 * Register default settings
 */
require CONEBLOG_PLUGIN_PATH . 'inc/default-settings.php';
register_activation_hook( CONEBLOG_WIDGETS, 'coneblog_set_default_settings' );