<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              automob.co.za
 * @since             1.0.0
 * @package           Automob
 *
 * @wordpress-plugin
 * Plugin Name:       Automob
 * Plugin URI:        automob.co.za
 * Description:       The easiest way to manage, list and sell your cars online using WordPress.
 * Version:           1.0.0
 * Author:            Luke Madzedze
 * Author URI:        automob.co.za
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       automob
 * Domain Path:       /languages
 */



// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'AUTOMOB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'AUTOMOB_CPT_CAR', 'vehicles-for-sale');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-automob-activator.php
 */
function activate_automob() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-automob-activator.php';
	Automob_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-automob-deactivator.php
 */
function deactivate_automob() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-automob-deactivator.php';
	Automob_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_automob' );
register_deactivation_hook( __FILE__, 'deactivate_automob' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-automob.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_automob() {

	$plugin = new Automob();
	$plugin->run();

}
run_automob();
