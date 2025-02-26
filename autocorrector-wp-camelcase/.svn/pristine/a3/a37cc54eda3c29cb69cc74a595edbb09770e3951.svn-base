<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://vishalparit.com/
 * @since             1.0.0
 * @package           Autocorrector_Wp_Camelcase
 *
 * @wordpress-plugin
 * Plugin Name:       Autocorrector WP CamelCase
 * Plugin URI:        https://autocorrector.vishalparit.com/
 * Description:       Simple plugin to correct camelcase while writting WordPress.
 * Version:           1.0.0
 * Author:            Vishal Parit
 * Author URI:        https://vishalparit.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       autocorrector-wp-camelcase
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
define( 'AUTOCORRECTOR_WP_CAMELCASE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-autocorrector-wp-camelcase-activator.php
 */
function activate_autocorrector_wp_camelcase() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-autocorrector-wp-camelcase-activator.php';
	Autocorrector_Wp_Camelcase_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-autocorrector-wp-camelcase-deactivator.php
 */
function deactivate_autocorrector_wp_camelcase() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-autocorrector-wp-camelcase-deactivator.php';
	Autocorrector_Wp_Camelcase_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_autocorrector_wp_camelcase' );
register_deactivation_hook( __FILE__, 'deactivate_autocorrector_wp_camelcase' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-autocorrector-wp-camelcase.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_autocorrector_wp_camelcase() {

	$plugin = new Autocorrector_Wp_Camelcase();
	$plugin->run();

}
run_autocorrector_wp_camelcase();

/*Use this function to replace a single word*/
function autocorrector_wp_camelcase( $text ) {
	return str_replace( 'wordpress', 'WordPress ', $text );
}
add_filter( 'the_content', 'autocorrector_wp_camelcase' );

