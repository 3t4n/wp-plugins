<?php
/**
 * Plugin Name: Add Multiple Marker
 * Plugin URI: http://addmultiplemarker.com
 * Description: Display Custom Multiple Markers of your company locations on Google Maps with title, icon, and show the area of your business. A feature-rich functionality without any programming that saves your 15+ hours.
 * Author:      KrishaWeb
 * Author URI:  https://www.krishaweb.com
 * Version:     1.2
 * Text Domain: addmultiplemarker
 * Domain Path: /languages
 *
 * @package Addmultiplemarker
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// Define plugin requires constant.
define( 'ADDMULTIPLEMARKER_VERSION', '1.2' );
define( 'ADDMULTIPLEMARKER_IN_REQUIRED_WP_VERSION', '4.4' );
define( 'ADDMULTIPLEMARKER_FILE', __FILE__ );
define( 'ADDMULTIPLEMARKER_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'ADDMULTIPLEMARKER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * register_activation_hook().
 * 
 * When a plugin is activated, this action is called.
 */
function addmultiplemarker_install() {
	// Enter your code here.
}
register_activation_hook( ADDMULTIPLEMARKER_FILE, 'addmultiplemarker_install' );

/**
 * register_deactivation_hook().
 *
 * When a plugin is deactivated, this action is called.
 */
function addmultiplemarker_uninstall() {
	// Enter your code here.
}
register_deactivation_hook( ADDMULTIPLEMARKER_FILE, 'addmultiplemarker_uninstall' );

/**
 * Initialize plugin.
 */
function addmultiplemarker_plugin_initialize() {
	require_once( ADDMULTIPLEMARKER_PLUGIN_DIR . '/functions.php' );
	// Class calling.
	$multiplemarker_obj = new Addmultiplemarker();

}
add_action( 'init', 'addmultiplemarker_plugin_initialize');
