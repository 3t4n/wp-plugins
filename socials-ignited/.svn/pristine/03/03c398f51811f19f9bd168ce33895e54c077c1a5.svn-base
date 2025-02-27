<?php
if ( ! function_exists( 'cisiw_sanitize_hex_color' ) ) :
	/**
	 * Returns a sanitized hex color code.
	 *
	 * @param string $str The color string to be sanitized.
	 * @param bool   $return_hash Whether to return the color code prepended by a hash.
	 * @param string $return_fail The value to return on failure.
	 * @return string A valid hex color code on success, an empty string on failure.
	 */
	function cisiw_sanitize_hex_color( $str, $return_hash = true, $return_fail = '' ) {

		// Include the hash if not there.
		// The regex below depends on in.
		if ( substr( $str, 0, 1 ) !== '#' ) {
			$str = '#' . $str;
		}

		$matches = array();

		/*
		 * Example on success:
		 * $matches = array(
		 * 		[0] => #1a2b3c
		 * 		[1] => #
		 * 		[2] => 1a2b3c
		 * )
		 *
		 */
		preg_match( '/(#)([0-9a-fA-F]{6})/', $str, $matches );

		if ( count( $matches ) === 3 ) {
			if ( $return_hash ) {
				return $matches[1] . $matches[2];
			} else {
				return $matches[2];
			}
		} else {
			return $return_fail;
		}
	}
	endif;

if ( ! function_exists( 'cisiw_absint_or_empty' ) ) :
	/**
	 * Return a positive integer value, or an empty string instead of zero.
	 *
	 * @uses absint()
	 *
	 * @param mixed $value A value to convert to integer.
	 * @return mixed Empty string on zero, or a positive integer.
	 */
	function cisiw_absint_or_empty( $value ) {
		$value = absint( $value );
		if ( 0 === $value ) {
			return '';
		} else {
			return $value;
		}
	}
	endif;

if ( ! function_exists( 'cisiw_sanitize_checkbox' ) ) :
	/**
	 * Sanitizes a checkbox value, by comparing $input with $allowed_value
	 *
	 * @param string $input The checkbox value that was sent through the form.
	 * @param string $allowed_value The only value that the checkbox can have (default 'on').
	 * @return string The $allowed_value on success, or an empty string on failure.
	 */
	function cisiw_sanitize_checkbox( &$input, $allowed_value = 'on' ) {
		if ( isset( $input ) && $input === $allowed_value ) {
			return $allowed_value;
		} else {
			return '';
		}
	}
	endif;

	function cisiw_get_allowed_tags() {
		$attributes = array(
			'id'    => true,
			'class' => true,
		);

		$allowed = array(
			'a'       => array(
				'id'     => true,
				'class'  => true,
				'href'   => true,
				'title'  => true,
				'target' => true,
			),
			'div'     => $attributes,
			'span'    => $attributes,
			'strong'  => $attributes,
			'i'       => $attributes,
			'section' => $attributes,
			'aside'   => $attributes,
			'h1'      => $attributes,
			'h2'      => $attributes,
			'h3'      => $attributes,
			'h4'      => $attributes,
			'h5'      => $attributes,
			'h6'      => $attributes,
		);

		return apply_filters( 'cisiw_get_allowed_tags', $allowed );
	}
