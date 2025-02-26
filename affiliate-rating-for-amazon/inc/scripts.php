<?php 
//kein zugriff bei direktem Aufruf
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

//Hinzufügen der Skripte und Styles für das Backend
add_action( 'admin_enqueue_scripts', 'aa_load_admin_scripts' );
if ( ! function_exists( 'aa_load_admin_scripts' ) ) {
	function aa_load_admin_scripts() {

		$min = defined( 'SCIRPT_DEBUG' ) ? '' : '.min';

		//Einbinden der Admin Styles
		wp_register_style( 'custom_admin_css', plugins_url( '../assets/css/admin.css', __FILE__), array(), WPRATINGVERSION );
		wp_enqueue_style( 'custom_admin_css' );

		wp_enqueue_media();
		wp_register_script( 'custom_admin_js', plugins_url( '../assets/js/admin.js', __FILE__ ), array( 'jquery' ) );
		wp_enqueue_script( 'custom_admin_js' );

		wp_enqueue_style( 'wp-color-picker' );
		wp_register_script( 'color_picker_js', plugins_url( '../assets/js/color-picker.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ) );
		wp_enqueue_script( 'color_picker_js' );
	}
}

//Hinzufügen der Scripte und Styles für das Frontend))
add_action( 'wp_enqueue_scripts', 'aa_load_front_scripts' );
if ( ! function_exists( 'aa_load_front_scripts' ) ) {
	function aa_load_front_scripts() {

		wp_enqueue_style( 'dashicons' );

		wp_register_style( 'custom_front_css', plugins_url( '../assets/css/front.css', __FILE__) );
		wp_enqueue_style( 'custom_front_css' );

		wp_register_script( 'custom_front_js', plugins_url( '../assets/js/front.js', __FILE__), array( 'jquery') );
		wp_enqueue_script( 'custom_front_js' );
	}
}