<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.indianic.com/enquiry
 * @since             1.0.0
 * @package           Nic_Addon_Custom_Fee_Cart
 *
 * @wordpress-plugin
 * Plugin Name:       Addon Custom Fee in cart WC
 * Plugin URI:        https://www.indianic.com
 * Description:       This plugin use to add additional fees in to the cart woo-commerce add-on. You can add your custom amount.
 * Version:           1.0.0
 * Author:            MageINIC
 * Author URI:        https://www.indianic.com/enquiry
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       nic-addon-custom-fee-cart
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
define( 'NIC_ADDON_CUSTOM_FEE_CART_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-nic-addon-custom-fee-cart-activator.php
 */
function activate_nic_addon_custom_fee_cart() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nic-addon-custom-fee-cart-activator.php';
	Nic_Addon_Custom_Fee_Cart_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-nic-addon-custom-fee-cart-deactivator.php
 */
function deactivate_nic_addon_custom_fee_cart() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nic-addon-custom-fee-cart-deactivator.php';
	Nic_Addon_Custom_Fee_Cart_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_nic_addon_custom_fee_cart' );
register_deactivation_hook( __FILE__, 'deactivate_nic_addon_custom_fee_cart' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-nic-addon-custom-fee-cart.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_nic_addon_custom_fee_cart() {

	$plugin = new Nic_Addon_Custom_Fee_Cart();
	$plugin->run();

}
run_nic_addon_custom_fee_cart();
