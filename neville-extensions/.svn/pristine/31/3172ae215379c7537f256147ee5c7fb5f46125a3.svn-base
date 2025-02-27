<?php
/**
 * --------------------------------------
 * Initializes all sections and templates.
 *
 * @package Neville_Extensions
 * --------------------------------------
 */

add_action( 'widgets_init', 'nevillex_sections', 30 );
add_filter( 'neville_customizer_js_settings', 'nevillex_sections___new', 15 );

if( ! function_exists( 'nevillex_sections' ) ) {
	/**
	 * Register some custom sections
	 *
	 * @return void
	 */
	function nevillex_sections() {
		// Do nothing if not Neville
		if( ! nevillex_theme_check() ) return;

		// Category
		require_once( NEVILLEX_SECTIONS_DIR . 'category/category.php' );
		require_once( NEVILLEX_SECTIONS_DIR . 'category/category-tmpl.php' );

		// Ads
		require_once( NEVILLEX_SECTIONS_DIR . 'ads/ads.php' );
		require_once( NEVILLEX_SECTIONS_DIR . 'ads/ads-tmpl.php' );

		// Instagram
		require_once( NEVILLEX_SECTIONS_DIR . 'instagram/instagram.php' );
		require_once( NEVILLEX_SECTIONS_DIR . 'instagram/instagram-tmpl.php' );
	}
}

if( ! function_exists( 'nevillex_sections___new' ) ) {
	/**
	 * Add new sections in the Customizer list
	 *
	 * @since  1.0.0
	 * @param  array $sections Current sections
	 * @return array           Updated sections list
	 */
	function nevillex_sections___new( $sections ) {
		$sections[ 'sections' ][] = 'das';
		$sections[ 'sections' ][] = 'instagram';
		return apply_filters( 'nevillex_sections___new', $sections );
	}
}
