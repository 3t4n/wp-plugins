<?php
/*
Plugin Name: Buddypress Activity Plus Styling
Plugin URI: https://github.com/Maxim-us/buddypress-activity-plus-styling
Description: Add to the Buddypress Activity Plus plugin. This plugin adds CSS styles to images, videos and links. Also styling a THICKBOX.
Author: Marko Maksym
Version: 1.1.2
Author URI: https://github.com/Maxim-us
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*
* Define BAPSA_PLUGIN_PATH
*/
if ( ! defined( 'BAPSA_PLUGIN_PATH' ) ) {

	define( 'BAPSA_PLUGIN_PATH', __FILE__ );

}

/*
* Define BAPSA_PLUGIN_URL
*/
if ( ! defined( 'BAPSA_PLUGIN_URL' ) ) {

	// Return http://my-domain.com/wp-content/plugins/buddypress-activity-plus-styling/
	define( 'BAPSA_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

}

/*
* Define BAPSA__FILE__
*/
if ( ! defined( 'BAPSA__FILE__' ) ) {

	define( 'BAPSA__FILE__', __FILE__ );

}

/*
* Include the main BAPSActivityPlusStyling class
*/
if ( ! class_exists( 'BAPSActivityPlusStyling' ) ) {

	require_once plugin_dir_path( __FILE__ ) . '/includes/class-bapsabuddypressactivityplusstyling.php';

	// Create new instance
	new BAPSActivityPlusStyling();

	/*
	* Registration hooks
	*/
	// Activation
	register_activation_hook( __FILE__, array( 'BAPSABasisPluginClass', 'activate' ) );

	// Deactivation
	register_deactivation_hook( __FILE__, array( 'BAPSABasisPluginClass', 'deactivate' ) );

	// Uninstall
	register_uninstall_hook( __FILE__, array( 'BAPSABasisPluginClass', 'uninstall' ) );

}