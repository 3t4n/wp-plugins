<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://development.brstdev.com/wptest/
 * @since             1.0.0
 * @package           Services
 *
 * @wordpress-plugin
 * Plugin Name:       Get Your Quote
 * Plugin URI:        https://development.brstdev.com/wptest/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Tbi
 * Author URI:        https://development.brstdev.com/wptest/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       services
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
define( 'GYQ_SERVICES_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-services-activator.php
 */
function gyq_activate_services() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-services-activator.php';
	Gyq_Services_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-services-deactivator.php
 */
function gyq_deactivate_services() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-services-deactivator.php';
	Gyq_Services_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'gyq_activate_services' );
register_deactivation_hook( __FILE__, 'gyq_deactivate_services' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-services.php';
require plugin_dir_path( __FILE__ ) . 'includes/installer.php';
require plugin_dir_path( __FILE__ ) . 'services-front.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function gyq_run_services() {

	$plugin = new Gyq_Services();
	$plugin->run();

}
gyq_run_services();
