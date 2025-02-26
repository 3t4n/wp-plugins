<?php
/*
Plugin Name: Full Page Load
Plugin URI: http://wp.sk/
Description: Hide website content while loading and show it again after complete load.
Version: 1.0
Author: Webikon (Ján Bočínec)
Author URI: http://johnnypea.wp.sk/
License: GPL2
*/

function fpl_scripts() {
	wp_enqueue_script('jquery');	
	wp_enqueue_script(
		'spin',
		plugins_url( '/spin.min.js' , __FILE__ )
	);
	wp_enqueue_script(
		'fpl',
		plugins_url( '/script.js' , __FILE__ ),
		array('jquery','spin')
	);	

	wp_localize_script('fpl', 'pluginpath', plugins_url('/',__FILE__));
}
add_action( 'wp_enqueue_scripts', 'fpl_scripts' );