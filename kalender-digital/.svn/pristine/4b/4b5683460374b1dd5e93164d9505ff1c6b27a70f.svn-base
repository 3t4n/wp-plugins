<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://calendar.online
 * @since             1.0.0
 * @package           Kalender_Digital
 *
 * @wordpress-plugin
 * Plugin Name:       Calendar.online
 * Plugin URI:        https://calendar.online/c/on-your-website
 * Description:       Plugin for Calendar.online
 * Version:           1.0.10
 * Author:            Calendar.online
 * Author URI:        https://calendar.online
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       kalender-digital
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
define( 'KALENDER_DIGITAL_VERSION', '1.0.10' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-kalender-digital-activator.php
 */
function activate_kalender_digital() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-kalender-digital-activator.php';
	Kalender_Digital_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-kalender-digital-deactivator.php
 */
function deactivate_kalender_digital() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-kalender-digital-deactivator.php';
	Kalender_Digital_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_kalender_digital' );
register_deactivation_hook( __FILE__, 'deactivate_kalender_digital' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-kalender-digital.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_kalender_digital() {

	$plugin = new Kalender_Digital();
	$plugin->run();

}
run_kalender_digital();
