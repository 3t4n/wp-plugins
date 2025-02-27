<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.zeninvader.com/
 * @since             1.0.0
 * @package           Zi_Woo_Hide_Price_Cart
 *
 * @wordpress-plugin
 * Plugin Name:       ZI Hide price and add to cart for WooCommerce
 * Plugin URI:        https://www.zeninvader.com/hide-price-add-to-cart-woocommerce/
 * Description:       Hide WooCommerce product price and Add to cart button for certain product categories.
 * Version:           1.5.0
 * Author:            Zen Invader
 * Author URI:        https://www.zeninvader.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       zi-woo-hide-price-cart
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ZI_WOO_HIDE_PRICE_CART_VERSION', '1.5.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-zi-woo-hide-price-cart-activator.php
 */
function activate_zi_woo_hide_price_cart() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-zi-woo-hide-price-cart-activator.php';
	Zi_Woo_Hide_Price_Cart_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-zi-woo-hide-price-cart-deactivator.php
 */
function deactivate_zi_woo_hide_price_cart() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-zi-woo-hide-price-cart-deactivator.php';
	Zi_Woo_Hide_Price_Cart_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_zi_woo_hide_price_cart' );
register_deactivation_hook( __FILE__, 'deactivate_zi_woo_hide_price_cart' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-zi-woo-hide-price-cart.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_zi_woo_hide_price_cart() {

	$plugin = new Zi_Woo_Hide_Price_Cart();
	$plugin->run();

}
run_zi_woo_hide_price_cart();
