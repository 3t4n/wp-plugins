<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.cutowl.com/
 * @since             1.0.0
 * @package           Lights_Off
 *
 * @wordpress-plugin
 * Plugin Name:       Cut The Lights
 * Plugin URI:        https://github.com/cutowl/lights-off
 * Description:       This is a simple plugin that enables dark mode in your wordpress admin area.
 * Version:           1.2.2
 * Author:            Cutowl
 * Author URI:        https://www.cutowl.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       lights-off
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
define( 'LIGHTS_OFF_VERSION', '1.2.2' );

!defined('LIGHTS_OFF_PATH') && define('LIGHTS_OFF_PATH', plugin_dir_path( __FILE__ ));


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-lights-off-activator.php
 */
function activate_lights_off() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lights-off-activator.php';
	Lights_Off_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-lights-off-deactivator.php
 */
function deactivate_lights_off() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lights-off-deactivator.php';
	Lights_Off_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_lights_off' );
register_deactivation_hook( __FILE__, 'deactivate_lights_off' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-lights-off.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_lights_off() {

	$plugin = new Lights_Off();
	$plugin->run();

}
run_lights_off();
