<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://plugin.nl/en/
 * @since             1.0.0
 * @package           Websitescanner_Custom_Schema
 *
 * @wordpress-plugin
 * Plugin Name:       Websitescanner Custom Schema
 * Plugin URI:        https://plugin.nl/en/websitescanner-custom-schema-plugin/
 * Description:       Adds a field to the editor for custom JSON-ld schema markup.
 * Version:           1.3.7
 * Author:            Plugin.nl
 * Author URI:        https://plugin.nl/en/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       websitescanner-custom-schema
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
define( 'WEBSITESCANNER_CUSTOM_SCHEMA_VERSION', '1.3.7' );
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-websitescanner-custom-schema.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_websitescanner_custom_schema() {

	$plugin = new Websitescanner_Custom_Schema();
	$plugin->run();

}
run_websitescanner_custom_schema();
