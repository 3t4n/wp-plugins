<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://#
 * @since             1.0.0
 * @package           Autocomplete_Woocommerce_Order_Status
 *
 * @wordpress-plugin
 * Plugin Name:       Autocomplete Order Status for WooCommerce
 * Plugin URI:        https://github.com/noruzzamanrubel/Autocomplete-Order-Status-for-WooCommerce
 * Description:       Autocomplete Order Status for WooCommerce is a plugin that allows you to automatically complete orders in WooCommerce and the customer has received their products. This can save you time and effort, and it can also help to improve your customer experience.
 * Version:           1.4.8
 * Author:            Noruzzaman
 * Author URI:        https://github.com/noruzzamans
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       autocomplete-woocommerce-order-status
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
define( 'AUTOCOMPLETE_WOOCOMMERCE_ORDER_STATUS_VERSION', '1.4.8' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-autocomplete-woocommerce-order-status-activator.php
 */
function activate_autocomplete_woocommerce_order_status() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-autocomplete-woocommerce-order-status-activator.php';
	Autocomplete_Woocommerce_Order_Status_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-autocomplete-woocommerce-order-status-deactivator.php
 */
function deactivate_autocomplete_woocommerce_order_status() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-autocomplete-woocommerce-order-status-deactivator.php';
	Autocomplete_Woocommerce_Order_Status_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_autocomplete_woocommerce_order_status' );
register_deactivation_hook( __FILE__, 'deactivate_autocomplete_woocommerce_order_status' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-autocomplete-woocommerce-order-status.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_autocomplete_woocommerce_order_status() {

	$plugin = new Autocomplete_Woocommerce_Order_Status();
	$plugin->run();

}
run_autocomplete_woocommerce_order_status();


