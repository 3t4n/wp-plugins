<?php // Flipdish Ordering - Validate Settings

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {

	die;

}

/**
 * validate plugin setting
 * @since 1.4.1 Mobile full screen fix added
 */
function flipdish_ordering_callback_validate_options( $input ) {

	// Flipdish portal id
	if ( isset( $input['fd_portal_id'] ) ) {

		$input['fd_portal_id'] = sanitize_text_field( $input['fd_portal_id'] );

	}

	// Theme type
	$theme_options = array(
		'light' => 'Light theme',
		'dark'  => 'Dark theme',
	);

	if ( ! isset( $input['fd_theme_type'] ) || ! array_key_exists( $input['fd_theme_type'], $theme_options ) ) {

		$input['fd_theme_type'] = null;

	}

	// Data offset
	if ( isset( $input['fd_data_offset_value'] ) ) {

		$input['fd_data_offset_value'] = filter_var( $input['fd_data_offset_value'], FILTER_SANITIZE_NUMBER_INT );

	}

	// Mobile Fullscreen
	if ( ! isset( $input['fd_mobile_full_screen'] ) ) {

		$input['fd_mobile_full_screen'] = null;

	}

	$input['fd_mobile_full_screen'] = ( '1' === $input['fd_mobile_full_screen'] ? 1 : 0 );

	// Transparent background
	if ( ! isset( $input['fd_transparent_background'] ) ) {

		$input['fd_transparent_background'] = null;

	}

	$input['fd_transparent_background'] = ( '1' === $input['fd_transparent_background'] ? 1 : 0 );

	// Apple Pay
	if ( ! isset( $input['fd_apple_pay'] ) ) {

		$input['fd_apple_pay'] = null;

	}

	$input['fd_apple_pay'] = ( '1' === $input['fd_apple_pay'] ? 1 : 0 );

	return $input;

}
