<?php
/**
 * --------------------------------------
 * Initializes all widgets and templates.
 *
 * @package Neville_Extensions
 * --------------------------------------
 */

add_action( 'widgets_init', 'nevillex_widgets', 40 );

if( ! function_exists( 'nevillex_widgets' ) ) {
	/**
	 * Register some custom widgets
	 *
	 * @return void
	 */
	function nevillex_widgets() {
		// Ads
		require_once( NEVILLEX_WIDGETS_DIR . 'ads/ads.php' );
		require_once( NEVILLEX_WIDGETS_DIR . 'ads/ads-tmpl.php' );

		// Instagram
		require_once( NEVILLEX_WIDGETS_DIR . 'instagram/instagram.php' );
		require_once( NEVILLEX_WIDGETS_DIR . 'instagram/instagram-tmpl.php' );
	}
}

// Instagram API Class
require_once( NEVILLEX_WIDGETS_DIR . 'instagram/instagram-class.php' );
