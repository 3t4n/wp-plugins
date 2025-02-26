<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.wpconcierges.com/plugins
 * @since             1.0.0
 * @package           autopopulate_checkout_woo
 *
 * @wordpress-plugin
 * Plugin Name:       AutoPopulate Checkout for WooCommerce
 * Plugin URI:        https://www.wpconcierges.com/plugins/autopopulate-checkout-woo/
 * Description:       Pass in values for shipping, billing, to any page of your site and the plugin will create a customer session that is used on the Woocommerce Checkout page. 
 * Version:           1.0.7
 * Author:            WpConcierges
 * Author URI:        https://www.wpconcierges.com/plugins/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       autopopulate-checkout-woo
 * Domain Path:       /languages
 * WC requires at least: 3.0
 * WC tested up to: 6.2.1
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
define( 'AUTOPOPULATE_CHECKOUT_WOO_VERSION', '1.0.7' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-autopopulate-checkout-woo-activator.php
 */
function activate_autopopulate_checkout_woo() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-autopopulate-checkout-woo-activator.php';
	autopopulate_checkout_woo_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-autopopulate-checkout-woo-deactivator.php
 */
function deactivate_autopopulate_checkout_woo() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-autopopulate-checkout-woo-deactivator.php';
	autopopulate_checkout_woo_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_autopopulate_checkout_woo' );
register_deactivation_hook( __FILE__, 'deactivate_autopopulate_checkout_woo' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-autopopulate-checkout-woo.php';


function autopopulate_checkout_woo_plugin_add_settings_link( $links ) {
	$settings_link = '<a href="tools.php?page=autopopulate-checkout-woo">' . __( 'Settings' ) . '</a>';
	$premium_link = '<a href="https://www.wpconcierges.com/plugins/autopopulate-checkout-woo/">' . __( 'Documentation' ) . '</a>';
	array_push( $links, $settings_link );
	array_push( $links, $premium_link );
  	return $links;
}

$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'autopopulate_checkout_woo_plugin_add_settings_link' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_autopopulate_checkout_woo() {

	$plugin = new autopopulate_checkout_woo();
	$plugin->run();

}
run_autopopulate_checkout_woo();
