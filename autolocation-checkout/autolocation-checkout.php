<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://besyn.digital/
 * @since             1.0.0
 * @package           Autolocation_Checkout
 *
 * @wordpress-plugin
 * Plugin Name:       Autolocation Checkout
 * Plugin URI:        https://besyn.digital/
 * Description:       With Autolocation plugin you can geolocate your customers on woocommerce  checkout page, by adding their coordinates on the checkout form.You will be sure that your delivery service will know exactly where to deliver the goods
 * Version:           1.0.0
 * Author:            Besyn
 * Author URI:        https://besyn.digital/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       autolocation-checkout
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
define( 'AUTOLOCATION_CHECKOUT_VERSION', '1.0.0' );



/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-autolocation-checkout.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_autolocation_checkout() {

	$plugin = new Autolocation_Checkout();
	$plugin->run();

}
run_autolocation_checkout();
