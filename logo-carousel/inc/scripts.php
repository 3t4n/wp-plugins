<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/*** Plugin Scripts and CSS ***/
if ( ! function_exists( 'sp_logo_carousel_scripts_style' ) ) {
	function sp_logo_carousel_scripts_style() {
		// CSS Files
		wp_enqueue_style( 'owl-carousel-two-css', SP_LOGO_CAROUSEL_URL . 'assets/css/owl.carousel.css', array(), null );
		wp_enqueue_style( 'logo-carousel-style', SP_LOGO_CAROUSEL_URL . 'assets/css/style.css' );

		//JS Files
		wp_enqueue_script( 'owl-carousel-min-two-js', SP_LOGO_CAROUSEL_URL . 'assets/js/owl.carousel.min.js', array( 'jquery' ), null, true );
	}

	add_action( 'wp_enqueue_scripts', 'sp_logo_carousel_scripts_style' );
}
