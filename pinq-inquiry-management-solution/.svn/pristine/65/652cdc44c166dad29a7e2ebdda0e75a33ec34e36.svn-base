<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              piclaunch.com/pinq
 * @since             1.0.0
 * @package           Picalunchpinq
 *
 * @wordpress-plugin
 * Plugin Name:       PINQ - Inquiry Management solution
 * Plugin URI:        piclaunch.com/pinq
 * Description:       Pinq is an Inquiry Management solution, with Inquiry reporting, Multi site support of Inquiry, along with email branding options.
 * Version:           1.0.0
 * Author:            Piclaunch 
 * Author URI:        piclaunch.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       picalunchpinq
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-picalunchpinq-activator.php
 */
function activate_picalunchpinq() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-picalunchpinq-activator.php';
	Picalunchpinq_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-picalunchpinq-deactivator.php
 */
function deactivate_picalunchpinq() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-picalunchpinq-deactivator.php';
	Picalunchpinq_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_picalunchpinq' );
register_deactivation_hook( __FILE__, 'deactivate_picalunchpinq' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-picalunchpinq.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_picalunchpinq() {

	$plugin = new Picalunchpinq();
	$plugin->run();

}
run_picalunchpinq();
