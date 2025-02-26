<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since             1.0.0
 * @package           Woocommerce_NZ_Shipping_Zones
 *
 * Plugin Name: New Zealand Shipping Zones for WooCommerce
 * Plugin URI: https://wordpress.org/plugins/new-zealand-shipping-zones-for-woocommerce/
 * Description: Sets up New Zealand standard and rural shipping zones for WooCommerce.
 * Version: 1.0.2
 * Author: Daniel Shaw
 * Author URI: https://danielshaw.co.nz/
 * Contributors: chthnc
 * Tags: Shipping, New Zealand, Aotearoa, Rural delivery, WooCommerce
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: shipping-zones-nz
 * Domain Path: /languages
 * WC requires at least: 2.6.0
 * WC tested up to: 9.4
 */

// Abort if called directly.
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 * The current plugin version.
 */
define( 'WOOCOMMERCE_NZ_SHIPPING_ZONES_VERSION', '1.0.2' );

/**
 * Declares compatibility with High Performance Order Storage data structure.
 * 
 * @link https://github.com/woocommerce/woocommerce/wiki/High-Performance-Order-Storage-Upgrade-Recipe-Book#declaring-extension-incompatibility
 * @since 1.0.2
 */
add_action( 'before_woocommerce_init', function() {
	if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
	}
} );

/**
 * The core plugin class used to define internationalization and hooks.
 *
 * @since 1.0.0
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-nz-shipping-zones.php';

/**
 * Begins execution of the plugin.
 *
 * @since 1.0.0
 */
function run_woocommerce_nz_shipping_zones() {
	$plugin = new Woocommerce_NZ_Shipping_Zones();
	$plugin->run();
}

run_woocommerce_nz_shipping_zones();
