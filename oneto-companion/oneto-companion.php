<?php
/**
* Plugin Name:       	Oneto Companion
* Description:       	Oneto Companion Enhances Nayra Themes with additional functionality.
* Version:           	1.1
* Author: 				Nayra Themes
* Author URI: 			https://www.nayrathemes.com/
* Tested up to: 		6.1.1
* Requires: 			4.6 or higher
* License: 				GPLv3 or later
* License URI: 			http://www.gnu.org/licenses/gpl-3.0.html
* Requires PHP: 		5.6
* Text Domain: 			oneto-companion
* Domain Path: 			/languages
*/

define( 'oneto_companion_plugin_url', plugin_dir_url( __FILE__ ) );
define( 'oneto_companion_plugin_dir', plugin_dir_path( __FILE__ ) );



if( !function_exists('oneto_companion_init') ){
	function oneto_companion_init(){
		$activate_theme_data = wp_get_theme(); // getting current theme data
		$activate_theme = $activate_theme_data->name;
	  if( 'Oneto' == $activate_theme) {
			require("inc/oneto/oneto.php");
		}
	}
	add_action( 'init', 'oneto_companion_init' );
}


/**
 * Define plugin textdomain.
 */
function oneto_companion_textdomain() {
  load_plugin_textdomain( 'oneto-companion', false, plugin_dir_url(__FILE__). 'languages' ); 
}
add_action( 'init', 'oneto_companion_textdomain' );

/**
 * The code during plugin activation.
 */
function activate_oneto_companion() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/oneto-companion-activator.php';
	Oneto_Companion_Activator::activate();
}
register_activation_hook( __FILE__, 'activate_oneto_companion' );