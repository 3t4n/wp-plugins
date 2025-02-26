<?php
/*
Plugin Name: AMP Img Shortcode
Plugin URI: https://wpza.net/how-to-convert-img-to-amp-img-tags-in-wordpress/
Description: WPZA AMP Img Shortcode provides your website with a shortcode to display AMP images in WordPress.
Version: 1.0.1
Author: WPZA
Author URI: https://www.wpza.net/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
defined( 'ABSPATH' ) or die();

/* Register Shortcode */
if( ! function_exists( 'wpza_ais_shortcode_init' ) ) {
	function wpza_ais_shortcode_init() {
		function wpza_ais_shortcode( $atts ) {
			$sizes = explode( ' ', getimagesize( $atts['image'] )[3] );
			if ( $atts['alt'] ) {
				$alt = 'alt="' . $atts['alt'] . '"';
			}
			if ( $atts['image'] ) {
				$output = '<amp-img src="' . $atts['image'] . '"' . $alt . ' ' . $sizes[0] . ' ' . $sizes[1] . ' layout="responsive"></amp-img>';
			}
			return $output;
		}
		add_shortcode( 'amp-img', 'wpza_ais_shortcode' );
	}
	add_action( 'init', 'wpza_ais_shortcode_init' );
}