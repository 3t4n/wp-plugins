<?php if ( ! defined( 'ABSPATH' ) ) { die; }

if ( ! function_exists( 'avan_sanitize_replace_a_to_b' ) ) {
  function avan_sanitize_replace_a_to_b( $value ) {
    return str_replace( 'a', 'b', $value );
  }
}

if ( ! function_exists( 'avan_sanitize_title' ) ) {
  function avan_sanitize_title( $value ) {
    return sanitize_title( $value );
  }
}
