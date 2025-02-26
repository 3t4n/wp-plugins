<?php
/**
 * @package  WooSearch
 * @developer  name : Joy Shaha <joysaha7302@gmail.com>
 */
/*
Plugin Name: Ajax WooSearch
Plugin URI: https://wordpress.org/plugins/woo-search
Description: Awesome WooCommerce Dependency Ajax Search Plugin.
Version: 1.0.0
Author: Joy Shaha
Author URI: https://www.upwork.com/freelancers/~0109eba98d3423e68e
License: GPLv2
Text Domain: woosearch
*/

// If this file is called firectly, abort!!!
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

/**
* Constant
* Feature added by : Joy Shaha <joysaha7302@gmail.com>
* Date : 21.04.2020
*/
if (!defined("WOOS_VERSION"))
    define("WOOS_VERSION", '1.0.0');

if (!defined("WOOS_WP_VERSION"))
    define("WOOS_WP_VERSION", '4.9');

if (!defined("WOOS_PHP_VERSION"))
    define("WOOS_PHP_VERSION", '5.6.0');

if (!defined("WOOS_FILE"))
    define("WOOS_FILE", __FILE__);

if (!defined("WOOS_PLUGIN_BASE"))
    define("WOOS_PLUGIN_BASE", plugin_basename(WOOS_FILE));

if (!defined("WOOS_PLUGIN_DIR_PATH"))
    define("WOOS_PLUGIN_DIR_PATH", plugin_dir_path(WOOS_FILE));

if (!defined("WOOS_PLUGIN_DIR_URL"))
    define("WOOS_PLUGIN_DIR_URL", plugin_dir_url(WOOS_FILE));

if (!defined("WOOS_PLUGIN_IMAGE"))
    define("WOOS_PLUGIN_IMAGE", WOOS_PLUGIN_DIR_URL . 'images/');

// Require once the Composer Autoload
if ( version_compare( PHP_VERSION, WOOS_PHP_VERSION, '>=' ) ) {
    require_once ( WOOS_PLUGIN_DIR_PATH . '/vendor/autoload.php' );
}else{
    add_action( 'admin_notices',  'woos_php_version_error_warning');
}

function woos_php_version_error_warning( ) {
        $php_version = phpversion();
         ?>
        <div class="notice notice-warning mmwps-warning">
         <p><?php echo sprintf( __("Your current PHP version is <strong> $php_version </strong>. You need to upgrade your PHP version to <strong> ".WOOS_PHP_VERSION." or later</strong> to run woo-commerce searce plugin.", "woosearch" ) ); ?></p>
        </div>
    <?php
}

/**
 * The code that runs during plugin activation
 */
if ( version_compare( PHP_VERSION, WOOS_PHP_VERSION, '>=' ) ) {
    function woos_active_wpdesign() {
    	WOOS\Setup\WOOSActivate::woos_activatePluginFlush();
    }
    register_activation_hook( __FILE__, 'woos_active_wpdesign' );
}
/**
 * The code that runs during plugin deactivation
 */
if ( version_compare( PHP_VERSION, WOOS_PHP_VERSION, '>=' ) ) {
    function woos_deactivate_wpdesign() {
    	WOOS\Setup\WOOSDeactivate::woos_deactivatePluginFlash();
    }
    register_deactivation_hook( __FILE__, 'woos_deactivate_wpdesign' );
}
/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'WOOS\\WOOS' ) ) {
	WOOS\WOOS::woos_registerServices();
}