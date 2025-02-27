<?php
/**
 * Plugin generic functions file
 *
 * @package Preloader for Website - WPOS
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
function plwao_default_settings() {

	global $plwao_options;

	$plwao_options = array(

		// Genaral
		'is_preloader'		=> 1,
		'preloader_type'	=> 'default',
		'plwao_spinner'		=> 'spinner-1',
		'content_font_size'	=> '',
		'content_font_clr'	=> '#333333',
		'plwao_bgcolor'		=> '#ffffff',
		'custom_content'	=> '',
	);

	$default_options = apply_filters('plwao_options_default_values', $plwao_options );

	// Update default options
	update_option( 'plwao_options', $default_options );

	// Overwrite global variable when option is update
	$plwao_options = plwao_get_settings();
}

/**
 * Get an option
 * Looks to see if the specified setting exists, returns default if not
 * 
 * @since 1.0.0
 */
function plwao_get_option( $key = '', $default = false ) {

	global $plwao_options;

	$value = ! empty( $plwao_options[ $key ] ) ? $plwao_options[ $key ] : $default;
	$value = apply_filters( 'plwao_get_option', $value, $key, $default );

	return apply_filters( 'plwao_get_option_' . $key, $value, $key, $default );
}

/**
 * Get Settings From Option Page
 * 
 * Handles to return all settings value
 * 
 * @since 1.0.0
 */
function plwao_get_settings() {

	$options	= get_option('plwao_options');
	$settings	= is_array( $options ) ? $options : array();

	return $settings;
}

/**
 * Clean variables using sanitize_text_field. Arrays are cleaned recursively.
 * Non-scalar values are ignored.
 * 
 * @since 1.2
 */
function plwao_clean( $var ) {
	if ( is_array( $var ) ) {
		return array_map( 'plwao_clean', $var );
	} else {
		$data = is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
		return wp_unslash( $data );
	}
}

/**
 * Sanitize color value and return fallback value if it is blank
 * 
 * @since 1.2
 */
function plwao_clean_color( $color, $fallback = null ) {

	if ( false === strpos( $color, 'rgba' ) ) {
		
		$data = sanitize_hex_color( $color );

	} else {

		$red	= 0;
		$green	= 0;
		$blue	= 0;
		$alpha	= 0.5;

		// By now we know the string is formatted as an rgba color so we need to further sanitize it.
		$color = str_replace( ' ', '', $color );
		sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
		$data = 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';
	}

	return ( empty( $data ) && $fallback ) ? $fallback : $data;
}

/**
 * Sanitize number value and return fallback value if it is blank
 * 
 * @since 1.2
 */
function plwao_clean_number( $var, $fallback = null, $type = 'int' ) {

	if ( $type == 'number' ) {
		$data = intval( $var );
	} else if ( $type == 'abs' ) {
		$data = abs( $var );
	} else {
		$data = absint( $var );
	}

	return ( empty( $data ) && isset( $fallback ) ) ? $fallback : $data;
}

/**
 * Strip Slashes From Array
 *
 * @since 1.2
 */
function plwao_clean_html($data = array(), $flag = false) {

	if( $flag != true ) {
		$data = plwao_nohtml_kses( $data );
	}

	$data = stripslashes_deep( $data );
	
	return $data;
}

/**
 * Strip Html Tags
 * It will sanitize text input (strip html tags, and escape characters)
 * 
 * @since 1.2
 */
function plwao_nohtml_kses( $data = array() ) {

	if ( is_array( $data ) ) {

	$data = array_map('plwao_nohtml_kses', $data);

	} elseif ( is_string( $data ) ) {
		$data = trim( $data );
		$data = wp_filter_nohtml_kses( $data );
	}

	return $data;
}

/**
 * Function to get upgrade to pro link
 * 
 * @since 1.0
 */
function paoc_upgrade_pro_link() {

	$updrade_link = "<a href=".esc_url(PAOC_UPGRADE_LINK)." target='_blank' class='paoc-pro-link'>". esc_html__('Upgrade to Premium', 'preloader-for-website') ."</a>";

	return $updrade_link;
}

/**
 * Function to get Preloader data
 * 
 * @since 1.2
 */
function plwao_get_preloader_opts() {

	$preloader_opts = array(
						'spinner-1'	=> __('Spinner 1', 'preloader-for-website'),
						'spinner-2'	=> __('Spinner 2', 'preloader-for-website'),
					);

	return apply_filters('plwao_get_preloader_opts', $preloader_opts );
}

/**
 * Function get image size options
 * 
 * @since 1.2
 */
function plwao_img_size_opts() {

	$img_size_opts = array(
						'auto'		=> esc_html__('Auto', 'preloader-for-website'),
						'cover'		=> esc_html__('Cover', 'preloader-for-website'),
						'contain'	=> esc_html__('Contain', 'preloader-for-website'),
					);

	return apply_filters('plwao_img_size_opts', $img_size_opts );
}

/**
 * Function get image repeat options
 * 
 * @since 1.2
 */
function plwao_img_repeat_opts() {

	$img_repeat_opts = array(
							'no-repeat'	=> esc_html__('No Repeat', 'preloader-for-website'),
							'repeat'	=> esc_html__('Repeat', 'preloader-for-website'),
							'repeat-x'	=> esc_html__('Repeat X', 'preloader-for-website'),
							'repeat-y'	=> esc_html__('Repeat Y', 'preloader-for-website'),
						);

	return apply_filters('plwao_img_repeat_opts', $img_repeat_opts );
}