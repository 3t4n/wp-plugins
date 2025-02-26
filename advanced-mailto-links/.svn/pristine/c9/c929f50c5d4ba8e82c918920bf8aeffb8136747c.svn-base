<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package Advanced Mailto Links
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Amtol_Script {
	
	function __construct() {			
		
		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array($this, 'amtol_front_script') );	
		
	}

	
	/**
	 * Function to add script at front side
	 * 
	 * @package WP Slick Slider and Image Carousel
	 * @since 1.0.0
	 */
	function amtol_front_script() {
		
		// Registring Advanced Mailto Links script		
		wp_register_script( 'amtol-mailtoui-jquery', AMTOL_URL.'assets/js/mailtoui-min.js', array('jquery'), AMTOL_VERSION, true );	
		wp_enqueue_script( 'amtol-mailtoui-jquery' );		
		
	}	

}

$amtol_script = new Amtol_Script();
