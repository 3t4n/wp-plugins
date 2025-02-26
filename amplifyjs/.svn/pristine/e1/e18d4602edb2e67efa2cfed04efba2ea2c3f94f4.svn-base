<?
/*
Plugin Name: AmplifyJS
Plugin URI: http://www.ramoonus.nl/wordpress/amplifyjs/
Description: AmplifyJS is a set of components designed to solve common web application problems with a simplistic API. 
Version: 1.1.2
Author: Ramoonus
Author URI: http://www.ramoonus.nl/
License: GPL2
*/

/**
 * Plugin
 *
 * @todo include non minified option
 */
function rw_amplifyjs() {
		wp_deregister_script('amplify');
		wp_enqueue_script('amplify', plugins_url('/js/amplify.min.js',__FILE__), false, '1.1.2'); 
}    
add_action('wp_enqueue_scripts', 'rw_amplifyjs');
?>