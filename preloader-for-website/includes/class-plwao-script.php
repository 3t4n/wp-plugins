<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package Preloader for Website - WPOS
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Plwao_Script {

	function __construct() {

		// Action to add style & script in backend
		add_action( 'admin_enqueue_scripts', array($this, 'plwao_admin_style_script') );

		// Action to add style & script in front
		add_action( 'wp_enqueue_scripts', array( $this, 'plwao_front_style_script') );
	}

	/**
	 * Enqueue admin styles
	 * 
	 * @since 1.2
	 */
	function plwao_admin_style_script( $hook ) {

		// Pages array
		$pages_array = array( 'toplevel_page_plwao-settings' );

		// If page is plugin setting page then enqueue script
		if( in_array( $hook, $pages_array ) ) {

			// Registring admin style
			wp_register_style( 'plwao-admin-css', PLWAO_URL.'assets/css/plwao-admin.css', array(), PLWAO_VERSION );

			// Registring admin script
			wp_register_script( 'plwao-admin-script', PLWAO_URL.'assets/js/plwao-admin.js', array('jquery'), PLWAO_VERSION, true );
			wp_localize_script( 'plwao-admin-script', 'PlwaoAdmin', array(
																'reset_msg'	=> esc_html__( 'Click OK to reset all options. All settings will be lost!', 'preloader-for-website' ),
															));

			// Enquque Styles
			wp_enqueue_style( 'wp-color-picker' );	// ColorPicker Style
			wp_enqueue_style( 'plwao-admin-css' );	// Admin Style

			// Enquque Scripts
			wp_enqueue_script( 'wp-color-picker' );		// ColorPicker Script
			wp_enqueue_script( 'plwao-admin-script' );	// Admin Script
		}
	}

	/**
	 * Function to add style at front side
	 * 
 	 * @since 1.0.0
	 */
	function plwao_front_style_script() {

		// Registring public style
		wp_register_style( 'plwao-front-style', PLWAO_URL.'assets/css/plwao-front.css', array(), PLWAO_VERSION );
		wp_enqueue_style('plwao-front-style');

		// Registring public script
		wp_register_script( 'plwao-public-script', PLWAO_URL."assets/js/plwao-public.js", array('jquery'), PLWAO_VERSION, true );
	}
}

$plwao_script = new Plwao_Script();