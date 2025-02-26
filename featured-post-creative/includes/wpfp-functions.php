<?php
/**
 * Plugin generic functions file
 *
 * @package WP Featured Post
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Update default settings
 * 
 * @since 1.0.0
 */
function wpfp_default_settings() {

	global $wpfp_options;

	$wpfp_options = array(
						'custom_css' => '',
					);

	$default_options = apply_filters('wpfp_options_default_values', $wpfp_options );

	// Update default options
	update_option( 'wpfp_options', $default_options );

	// Overwrite global variable when option is update
	$wpfp_options = wpfp_get_settings();
}

/**
 * Get Settings From Option Page
 * 
 * Handles to return all settings value
 * 
 * @since 1.0.0
 */
function wpfp_get_settings() {

	$options	= get_option( 'wpfp_options' );
	$settings	= is_array( $options )	? $options : array();

	return $settings;
}

/**
 * Get an option
 * Looks to see if the specified setting exists, returns default if not
 * 
 * @since 1.0.0
 */
function wpfp_get_option( $key = '', $default = false ) {
	global $wpfp_options;

	$value	= ! empty( $wpfp_options[ $key ] ) ? $wpfp_options[ $key ] : $default;
	$value	= apply_filters( 'wpfp_get_option', $value, $key, $default );
	return apply_filters( 'wpfp_get_option_' . $key, $value, $key, $default );
}

/**
 * Function to unique number value
 * 
 * @since 1.0.0
 */
function wpfp_get_unique() {
	static $unique = 0;
	$unique++;

	return $unique;
}

/**
 * Sanitize Multiple HTML class
 * 
 * @since 1.0
 */
function wpfp_sanitize_html_classes($classes, $sep = " ") {
	$return = "";

	if( $classes && ! is_array( $classes )) {
		$classes = explode( $sep, $classes );
	}

	if( ! empty( $classes ) ) {
		foreach( $classes as $class ) {
			$return .= sanitize_html_class( $class ) . " ";
		}
		$return = trim( $return );
	}

	return $return;
}

/**
 * Function to get Taxonomies list 
 * 
 * @since 2.3
 */
function wpfp_get_post_cats( $post_id = 0, $taxonomy = WPFP_CAT, $link_target = 'self', $join = ' ' ) {

	$output = array();

	if( empty( $taxonomy ) ) {
		return '';
	}

	$terms = get_the_terms( $post_id, $taxonomy );

	if( !is_wp_error($terms) && $terms ) {
		foreach ( $terms as $term ) {
			$term_link	= get_term_link( $term );
			$output[]	= '<a href="' . esc_url( $term_link ) . '" target="'.esc_attr( $link_target ).'">'.wp_kses_post( $term->name ).'</a>';
		}
	}

	$output = join( $join, $output );

	return $output;
}

/**
 * Function to add array after specific key
 * 
 * @since 1.0.0
 */
function wpfp_add_array(&$array, $value, $index) {

	if( is_array( $array ) && is_array( $value )) {
		$split_arr	= array_splice( $array, max( 0, $index ));
		$array		= array_merge( $array, $value, $split_arr );
	}

	return $array;
}

/**
 * Function to get post featured image
 * 
 * @since 1.0.0
 */
function wpfp_get_post_featured_image( $post_id = '', $size = 'full' ) {
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size );
	$image = isset( $image[0] ) ? $image[0] : '';

	return $image;
}

/**
 * Function to get 'featured_post' shortcode designs
 * 
 * @since 1.0.0
 */
function wpfp_featured_post_designs() {
	$design_arr = array(
			'design-1'	=> __( 'Design 1', 'featured-post-creative' ),
		);
	return apply_filters('wpfp_featured_post_designs', $design_arr );
}