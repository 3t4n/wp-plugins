<?php
/*
Plugin Name: Rentenrechner
Plugin URI: 
Description: This plugin will caclulate when you should retired. Use shortcode [rentenrechner] to display on frontend.
Author: Geldhelden
Author URI: https://geldhelden.org
Version: 1.0
*/

if (!function_exists('renten_calculator_resources')) {
	function renten_calculator_resources() {
		wp_enqueue_style( 'saving-calculator-style',  plugin_dir_url( __FILE__ ).'css/calculator_saving.css');
		wp_enqueue_script( 'auto-numeric-js', plugin_dir_url( __FILE__ ).'js/autoNumeric-minde.js', array('jquery'),'',true);
		wp_enqueue_script( 'saving-calculator-js', plugin_dir_url( __FILE__ ).'js/saving_calculator.js', array('jquery', 'auto-numeric-js'),'',true);
		
	
	}
add_action( 'wp_enqueue_scripts', 'renten_calculator_resources' );
}
if (!function_exists('renten_calculator_shortcode')) {
	function renten_calculator_shortcode(){
		ob_start();
			include('renten_calculator_layout.php');
		return ob_get_clean();
	}
	add_shortcode('rentenrechner','renten_calculator_shortcode');
}