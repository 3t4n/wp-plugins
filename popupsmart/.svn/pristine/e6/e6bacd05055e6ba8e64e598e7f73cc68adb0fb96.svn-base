<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://popupsmart.com
 * @since             1.0.0
 * @package           Pop
 *
 * @wordpress-plugin
 * Plugin Name:       Popupsmart
 * Plugin URI:        https://app.popupsmart.com
 * Description:       Improve your conversion rates without a dedicated designer or coder. How? With our simple popup builder, Popupsmart. 
 * Version:           2.0.0
 * Author:            Popupsmart
 * Author URI:        https://popupsmart.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pop
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
define( 'POP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pop-activator.php
 */
function activate_pop() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pop-activator.php';
	Pop_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pop-deactivator.php
 */
function deactivate_pop() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pop-deactivator.php';
	Pop_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_pop' );
register_deactivation_hook( __FILE__, 'deactivate_pop' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-pop.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_pop() {

	$plugin = new Pop();
	$plugin->run();

}
run_pop();
