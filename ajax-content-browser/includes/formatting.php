<?php
/**
 * Formatting Functions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Clean variables using sanitize_text_field. Arrays are cleaned recursively.
 * Non-scalar values are ignored.
 */
function acb_clean( $var ) {
	if ( is_array( $var ) ) {
		return array_map( 'acb_clean', $var );
	} else {
		return is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
	}
}

/**
 * Returns when a post has been made in nice way.
 */
function acb_posted_when() {
	$diff = time() - get_post_time( 'U', true );
	$now  = new \DateTime( '@0' );
	$date = new \DateTime( "@$diff" );
	$diff = $now->diff( $date );

	if ( $diff->y ) {
		return sprintf( __( '%dy', 'acb' ), $diff->y );
	}

	if ( $diff->m ) {
		return sprintf( __( '%dm', 'acb' ), $diff->d );
	}

	if ( $diff->d ) {
		return sprintf( __( '%dd', 'acb' ), $diff->d );
	}

	if ( $diff->h ) {
		return sprintf( __( '%dh', 'acb' ), $diff->h );
	}

	if ( $diff->i ) {
		return sprintf( __( '%dmin', 'acb' ), $diff->i );
	}

	return __( 'now', 'acb' );
}

/**
 * Facebook-style number formatting.
 */
function acb_number_format( $num ) {
	if ( $num > 1000 ) {
		$x = round( $num );
		$x_number_format = number_format( $x );
		$x_array = explode( ',', $x_number_format );
		$x_parts = array( 'k', 'm', 'b', 't' );
		$x_count_parts = count( $x_array ) - 1;
		$x_display = $x;
		$x_display = $x_array[0] . ( (int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '' );
		$x_display .= $x_parts[ $x_count_parts - 1 ];

        return $x_display;
	}
	return $num;
}

/**
 * Generates a random color.
 */
function acb_random_color() {
	$color = '#';
	$hex   = array( '9', 'A', 'B', 'C', 'D', 'E', 'F' );

	for( $x = 0; $x < 6; $x++ ) {
		$color .= $hex[ array_rand( $hex, 1 ) ];
	}

	return substr( $color, 0, 7 );
}

/**
 * Get currency symbol.
 */
function acb_get_currency( $post_type ) {
	// WooCommerce.
	if ( in_array( 'product', $post_type ) && function_exists( 'get_woocommerce_currency_symbol' ) ) {
		return get_woocommerce_currency_symbol();
	}
	// Easy Digital Downloads.
	if ( in_array( 'download', $post_type ) && function_exists( 'edd_currency_symbol' ) ) {
		return edd_currency_symbol();
	}
	return apply_filters( 'acb_get_currency', '$' );
}