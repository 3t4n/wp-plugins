<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              piclaunch.com
 * @since             1.0.0
 * @package           Ampnonampads
 *
 * @wordpress-plugin
 * Plugin Name:       AMP & Non-AMP Auto Ads
 * Plugin URI:        piclaunch.com/wp-plugin/
 * Description:       Extension made for AMP for WP to add a custom banner after the post content. Enable AMP Auto Add, non AMP Auto Ads and many more.
 * Version:           1.0.0
 * Author:            Piclaunch 
 * Author URI:        piclaunch.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ampnonampads
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'AMPNONAMPADS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ampnonampads-activator.php
 */
function activate_ampnonampads() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ampnonampads-activator.php';
	ampnonampads_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ampnonampads-deactivator.php
 */
function deactivate_ampnonampads() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ampnonampads-deactivator.php';
	ampnonampads_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ampnonampads' );
register_deactivation_hook( __FILE__, 'deactivate_ampnonampads' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ampnonampads.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ampnonampads() {

	$plugin = new ampnonampads();
	$plugin->run();

}
run_ampnonampads();
