<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

if ( ! function_exists( 'avan_array_search' ) ) {
  function avan_array_search( $array, $key, $value ) {

    $results = array();

    if ( is_array( $array ) ) {
      if ( isset( $array[$key] ) && $array[$key] == $value ) {
        $results[] = $array;
      }

      foreach ( $array as $sub_array ) {
        $results = array_merge( $results, avan_array_search( $sub_array, $key, $value ) );
      }

    }

    return $results;

  }
}

if ( ! function_exists( 'avan_timeout' ) ) {
  function avan_timeout( $timenow, $starttime, $timeout = 30 ) {
    return ( ( $timenow - $starttime ) < $timeout ) ? true : false;
  }
}

if ( ! function_exists( 'avan_wp_editor_api' ) ) {
  function avan_wp_editor_api() {
    global $wp_version;
    return version_compare( $wp_version, '4.8', '>=' );
  }
}
