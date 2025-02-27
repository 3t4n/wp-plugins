<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.civicuk.com/
 * @since             1.0.0
 * @package           Civic_Cookie_Control_8
 *
 * @wordpress-plugin
 * Plugin Name:       Civic Cookie Control 8
 * Plugin URI:        https://www.civicuk.com/cookie-control
 * Description:       Cookie Control 8 is a mechanism for controlling user consent for the use of cookies on their computer.
 * Version:           1.52
 * Author:            Civic Uk
 * Author URI:        https://www.civicuk.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       civic-cookie-control-8
 * Domain Path:       /languages/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'CIVIC_COOKIE_CONTROL_VERSION', '1.52' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cookie-control-activator.php
 */

function ccc_activate_cookie_control() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cookie-control-activator.php';
    CCC_Cookie_Control_Activator::ccc_activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cookie-control-deactivator.php
 */
function ccc_deactivate_cookie_control() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cookie-control-deactivator.php';
    CCC_Cookie_Control_Deactivator::ccc_deactivate();
}

register_activation_hook( __FILE__, 'ccc_activate_cookie_control' );
register_deactivation_hook( __FILE__, 'ccc_deactivate_cookie_control' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cookie-control.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function ccc_run_cookie_control() {

	$plugin = new CCC_Cookie_Control();
	$plugin->run();

}
ccc_run_cookie_control();