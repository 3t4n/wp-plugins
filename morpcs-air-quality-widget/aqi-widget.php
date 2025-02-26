<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.morpc.org/program-service/air-quality-program/
 * @since             1.0.0
 * @package           Aqi_Widget
 *
 * @wordpress-plugin
 * Plugin Name:       MORPC's Air Quality Widget
 * Description:       Based on a zip code for a reporting area, displays the current air quality.
 * Version:           1.2.0
 * Author:            Mid-Ohio Regional Planning Commission
 * Author URI:        http://www.morpc.org/program-service/air-quality-program/
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'AQI_WIDGET_VERSION', '1.1.0' );
define( 'AQI_WIDGET_NAME', 'aqi-widget' );

/**
 * The core plugin class that is used to define admin-specific
 * hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-aqi-widget.php';

/**
 * The code that runs during plugin activation.
 */
function activate_aqi_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-aqi-widget-activator.php';

	Aqi_Widget_Activator::activate();
}
register_activation_hook( __FILE__, 'activate_aqi_widget' );

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_aqi_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-aqi-widget-deactivator.php';

	Aqi_Widget_Deactivator::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_aqi_widget' );

/**
 * Begins execution of the plugin.
 *
 *
 * @since    1.0.0
 */
function run_aqi_widget() {
	$plugin = new Aqi_Widget();

	$plugin->run();
}
run_aqi_widget();
