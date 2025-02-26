<?php
/**
 * Plugin Name:       Advanced Custom Widget
 * Plugin URI:        http://longvietweb.com/plugins/advanced-custom-widget
 * Description:       Aggregate and customize all widgets.
 * Version:           1.0.1
 * Author:            LongViet
 * Author URI:        http://longvietweb.com
 * Text Domain:       advanced-custom-widget
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-advanced-custom-widget.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_Advanced_Custom_Widget() {

	$plugin = new Advanced_Custom_Widget();
	$plugin->run();

}
run_Advanced_Custom_Widget();
