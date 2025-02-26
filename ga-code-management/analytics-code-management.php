<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://viitorcloud.com/
 * @since             3.0.0
 * @package           Analytics_Code_Management
 *
 * @wordpress-plugin
 * Plugin Name:    Google Analytics Code Management
 * Plugin URI:     https://wordpress.org/plugins/ga-code-management/
 * Description:    This plugin provides a functionality to add Google Analytics Tracking code from WordPress admin area.
 * Version:        3.0.0
 * Author:         ViitorCloud
 * Author URI:     https://viitorcloud.com/
 * License:        GPL-2.0+
 * License URI:    http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:    analytics-code-management
 * Domain Path:    /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-analytics-code-management-activator.php
 */
function activate_analytics_code_management() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-analytics-code-management-activator.php';
	Analytics_Code_Management_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-analytics-code-management-deactivator.php
 */
function deactivate_analytics_code_management() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-analytics-code-management-deactivator.php';
	Analytics_Code_Management_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_analytics_code_management' );
register_deactivation_hook( __FILE__, 'deactivate_analytics_code_management' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-analytics-code-management.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/constant.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    3.0.0
 */
function run_analytics_code_management() {

	$plugin = new Analytics_Code_Management();
	$plugin->run();
}
run_analytics_code_management();
