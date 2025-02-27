<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://callpage.io
 * @since             1.0.0
 * @package           Callpage_Widget
 *
 * @wordpress-plugin
 * Plugin Name:       Callpage - Callback for Wordpress
 * Plugin URI:        https://callpage.io
 * Description:       CallPage widget for Wordpress.
 * Version:           1.0.1.21
 *
 * Author:            Callpage
 * Author URI:        https://callpage.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       callpage-widget
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-callpage-widget-activator.php
 */
function activate_callpage_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-callpage-widget-activator.php';
	Callpage_Widget_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-callpage-widget-deactivator.php
 */
function deactivate_callpage_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-callpage-widget-deactivator.php';
	Callpage_Widget_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_callpage_widget' );
register_deactivation_hook( __FILE__, 'deactivate_callpage_widget' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-callpage-widget.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_callpage_widget() {

	$plugin = new Callpage_Widget();
	$plugin->run();

}
run_callpage_widget();
