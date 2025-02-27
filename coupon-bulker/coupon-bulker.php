<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ilook.co.il/coupon-bulker
 * @since             1.0.0
 * @package           Coupon_Bulker
 *
 * @wordpress-plugin
 * Plugin Name:       Coupon Bulker
 * Plugin URI:        https://ilook.co.il/coupon_bulker
 * Description:       Coupon generator : None fancy/Get the job done type. Duplicating a single source coupon multiple times & generate multiple codes. Download all codes in CSV format too. job done.
 * Version:           1.6
 * Author:            Nir Louk
 * Author URI:        https://ilook.co.il
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       coupon-bulker
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
define( 'COUPON_BULKER_VERSION', '1.6' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-coupon-bulker-activator.php
 */
function activate_coupon_bulker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-coupon-bulker-activator.php';
	Coupon_Bulker_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-coupon-bulker-deactivator.php
 */
function deactivate_coupon_bulker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-coupon-bulker-deactivator.php';
	Coupon_Bulker_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_coupon_bulker' );
register_deactivation_hook( __FILE__, 'deactivate_coupon_bulker' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-coupon-bulker.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_coupon_bulker() {

	$plugin = new Coupon_Bulker();
	$plugin->run();

}
run_coupon_bulker();
