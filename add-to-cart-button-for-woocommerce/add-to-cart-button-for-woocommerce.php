<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wpforhad.com/
 * @since             1.0.0
 * @package           Add_To_Cart_Button_For_Woocommerce
 *
 * @wordpress-plugin
 * Plugin Name:       Add to Cart Button for WooCommerce
 * Plugin URI:        https://wordpress.org/plugins/add-to-cart-button-for-woocommerce/
 * Description:       Modify your Add to Cart buttons text and styles as you want. Set a Sticky button for Customers comfort.
 * Version:           1.1.0
 * Author:            Forhad
 * Author URI:        https://wpforhad.com//
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       add-to-cart-button-for-woocommerce
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
define( 'ADD_TO_CART_BUTTON_FOR_WOOCOMMERCE_VERSION', '1.1.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-add-to-cart-button-for-woocommerce-activator.php
 */
function activate_add_to_cart_button_for_woocommerce() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-add-to-cart-button-for-woocommerce-activator.php';
	Add_To_Cart_Button_For_Woocommerce_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-add-to-cart-button-for-woocommerce-deactivator.php
 */
function deactivate_add_to_cart_button_for_woocommerce() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-add-to-cart-button-for-woocommerce-deactivator.php';
	Add_To_Cart_Button_For_Woocommerce_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_add_to_cart_button_for_woocommerce' );
register_deactivation_hook( __FILE__, 'deactivate_add_to_cart_button_for_woocommerce' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-add-to-cart-button-for-woocommerce.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/partials/custom-fields/classes/setup.class.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/partials/custom-fields/options/admin-options.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_add_to_cart_button_for_woocommerce() {

	$plugin = new Add_To_Cart_Button_For_Woocommerce();
	$plugin->run();

}
run_add_to_cart_button_for_woocommerce();
