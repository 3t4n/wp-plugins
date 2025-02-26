<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://profiles.wordpress.org/istvan_r9
 * @since             1.0.0
 * @package           Archive_Akkordion
 *
 * @wordpress-plugin
 * Plugin Name:       Archive Akkordion
 * Plugin URI:        https://profiles.wordpress.org/istvan_r9
 * Description:       A simple archive widget with a custom layout and accordion style.
 * Version:           1.0.0
 * Author:            istvan_r9, mlehelsz
 * Author URI:        https://profiles.wordpress.org/istvan_r9
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       archive-akkordion
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-archive-akkordion-activator.php
 */
function activate_archive_akkordion() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-archive-akkordion-activator.php';
	Archive_Akkordion_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-archive-akkordion-deactivator.php
 */
function deactivate_archive_akkordion() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-archive-akkordion-deactivator.php';
	Archive_Akkordion_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_archive_akkordion' );
register_deactivation_hook( __FILE__, 'deactivate_archive_akkordion' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-archive-akkordion.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_archive_akkordion() {

	$plugin = new Archive_Akkordion();
	$plugin->run();

}
run_archive_akkordion();
