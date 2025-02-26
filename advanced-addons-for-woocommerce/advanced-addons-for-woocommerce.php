<?php
/**
 * Plugin Name: Advanced Addons for WooCommerce
 * Description: Add advanced addons to WooCommerce products, supporting nested structures and dynamic types.
 * Version: 1.0.0
 * Author: Amr Elarabi
 * Author URI: https://amrelarabi.com
 * License: GPL-2.0+
 * Text Domain: advanced-addons-for-woocommerce
 *
 * @package advanced-addons-for-woocommerce
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define constants.
define( 'AAFW_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'AAFW_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Include core files.
require_once AAFW_PLUGIN_PATH . 'inc/class-aafw-addon-admin.php';
require_once AAFW_PLUGIN_PATH . 'inc/class-aafw-addon-frontend.php';
require_once AAFW_PLUGIN_PATH . 'inc/ajax.php';

// Initialize.
add_action(
	'plugins_loaded',
	function() {
		new AAFW_Addon_Admin();
		new AAFW_Addon_Frontend();
	}
);
