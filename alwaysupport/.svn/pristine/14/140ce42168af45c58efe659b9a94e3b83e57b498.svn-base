<?php
/*
 * Plugin Name: Alwaysupport
 * Version: 1.0.0
 * Plugin URI: #
 * Description: Simple plugin that adds Alwaysupport features in your WordPress site.
 * Author: Yoav Meyer
 * Author URI: #
 * License: GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

define('PLUGIN_NAME', 'Alwaysupport');
define('PLUGIN_VERSION', '1.0.0');

// Create custom settings menu
add_action('admin_menu', 'chat_create_menu');


function chat_create_menu() {

    add_options_page( __( 'Alwaysupport' ), __( 'Alwaysupport' ), 'manage_options', basename(__FILE__), 'chat_settings_page' );
}

// Register settings
add_action( 'admin_init', 'register_plugin_settings' );

function register_plugin_settings() {

   global $chat_options, $option_group, $option_name;
   
   register_setting( $option_group, $option_name);
}


$dir = plugin_dir_path( __FILE__ );

require_once($dir.'options.php');


function chat_support_activate() {

	do_action( 'chat_script_init' );

}

register_activation_hook( __FILE__, 'chat_support_activate' );


add_action( 'wp_footer', 'chat_script_init');

function chat_script_init() {

	global $options, $option_name;

	$options 		= 	get_option($option_name);		

	$alwaysupport 	=	$options['alwaysupport_script'];

	if( !empty( $alwaysupport ) ) {

		echo $alwaysupport;

	} else {

		_e('Please add script you obtained from alwaysupport at plugin option page.','alwaysupport'); 

	}

}		
