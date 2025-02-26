<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

if ( ! function_exists( 'avan_validate_email' ) ) {
  function avan_validate_email( $value ) {

    if ( ! filter_var( $value, FILTER_VALIDATE_EMAIL ) ) {
      return esc_html__( 'Please enter a valid email address.', 'avutilang' );
    }

  }
}

if ( ! function_exists( 'avan_validate_numeric' ) ) {
  function avan_validate_numeric( $value ) {

    if ( ! is_numeric( $value ) ) {
      return esc_html__( 'Please enter a valid number.', 'avutilang' );
    }

  }
}

if ( ! function_exists( 'avan_validate_required' ) ) {
  function avan_validate_required( $value ) {

    if ( empty( $value ) ) {
      return esc_html__( 'This field is required.', 'avutilang' );
    }

  }
}

if ( ! function_exists( 'avan_validate_url' ) ) {
  function avan_validate_url( $value ) {

    if ( ! filter_var( $value, FILTER_VALIDATE_URL ) ) {
      return esc_html__( 'Please enter a valid URL.', 'avutilang' );
    }

  }
}

if ( ! function_exists( 'avan_customize_validate_email' ) ) {
  function avan_customize_validate_email( $validity, $value, $wp_customize ) {

    if ( ! sanitize_email( $value ) ) {
      $validity->add( 'required', esc_html__( 'Please enter a valid email address.', 'avutilang' ) );
    }

    return $validity;

  }
}

if ( ! function_exists( 'avan_customize_validate_numeric' ) ) {
  function avan_customize_validate_numeric( $validity, $value, $wp_customize ) {

    if ( ! is_numeric( $value ) ) {
      $validity->add( 'required', esc_html__( 'Please enter a valid number.', 'avutilang' ) );
    }

    return $validity;

  }
}

if ( ! function_exists( 'avan_customize_validate_required' ) ) {
  function avan_customize_validate_required( $validity, $value, $wp_customize ) {

    if ( empty( $value ) ) {
      $validity->add( 'required', esc_html__( 'This field is required.', 'avutilang' ) );
    }

    return $validity;

  }
}

if ( ! function_exists( 'avan_customize_validate_url' ) ) {
  function avan_customize_validate_url( $validity, $value, $wp_customize ) {

    if ( ! filter_var( $value, FILTER_VALIDATE_URL ) ) {
      $validity->add( 'required', esc_html__( 'Please enter a valid URL.', 'avutilang' ) );
    }

    return $validity;

  }
}
