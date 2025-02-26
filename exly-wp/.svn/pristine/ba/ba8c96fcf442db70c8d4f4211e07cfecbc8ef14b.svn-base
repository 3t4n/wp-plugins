<?php
/**
 *
 *
 * @link
 * @since             1.0.1
 * @package           Exly_WP 
 *
 * @wordpress-plugin
 * Plugin Name:       Exly WP
 * Plugin URI:        https://exlyapp.com/
 * Description:       Launch, Manage and Grow Your Business Online Thoughtfully Designed for Professionals and Artists
 * Version:           1.0.1
 * Author:            Powered by Exly
 * Author URI:        https://exlyapp.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       exly-wp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.1 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WP_EXLY_VERSION', '1.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-exly-wp-plugin-activator.php
 */
function activate_wp_exly() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-exly-wp-activator.php';
	Exly_WP_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-exly-wp-plugin-deactivator.php
 */
function deactivate_wp_exly() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-exly-wp-deactivator.php';
	Exly_WP_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_exly' );
register_deactivation_hook( __FILE__, 'deactivate_wp_exly' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-exly-wp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.1
 */
function run_wp_exly() {
	$plugin = new Exly_WP();
	$plugin->run();

}
if(function_exists('run_wp_exly')){
run_wp_exly();
}
