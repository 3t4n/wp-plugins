<?php
/**
 * Divi AiO Common Functions
 *
 * @package     Divi AiO
 * @author      DiviPeople
 * @copyright   Copyright (c) 2019, Brainmade Labs
 * @link        https://aio.divipeople.com
 * @since       Divi AiO 1.0.0
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'divi_aio_get_theme_name' ) ) :

	/**
	 * Get theme name
	 */
	function daio_get_theme_name() {
		$theme_name = __( 'Divi', 'daio' );
		return apply_filters( 'daio_theme_name', $theme_name );
	}

endif;

if ( ! function_exists( 'daio_parse_css' ) ) :

	/**
	 * Parse css
	 *
	 * @package Divi AiO
	 */
	function daio_parse_css( $css_output = array(), $min_media = '', $max_media = '' ) {

		$parse_css = '';

		if ( is_array( $css_output ) && count( $css_output ) > 0 ) {

			foreach ( $css_output as $selector => $properties ) {

				if ( ! count( $properties ) ) {
					continue; }

				$temp_parse_css   = $selector . '{';
				$properties_added = 0;

				foreach ( $properties as $property => $value ) {

					if ( '' === $value ) {
						continue; }

					$properties_added++;
					$temp_parse_css .= $property . ':' . $value . ';';
				}

				$temp_parse_css .= '}';

				if ( $properties_added > 0 ) {
					$parse_css .= $temp_parse_css;
				}
			}

			if ( '' != $parse_css && ( '' !== $min_media || '' !== $max_media ) ) {

				$media_css       = '@media ';
				$min_media_css   = '';
				$max_media_css   = '';
				$media_separator = '';

				if ( '' !== $min_media ) {
					$min_media_css = '(min-width:' . $min_media . 'px)';
				}
				if ( '' !== $max_media ) {
					$max_media_css = '(max-width:' . $max_media . 'px)';
				}
				if ( '' !== $min_media && '' !== $max_media ) {
					$media_separator = ' and ';
				}

				$media_css .= $min_media_css . $media_separator . $max_media_css . '{' . $parse_css . '}';

				return $media_css;
			}
		}

		return $parse_css;
	}

endif;

if ( ! function_exists( 'divi_trim_css' ) ) :
	
	// Trim white space for faster page loading.
	function divi_trim_css( $css = '' ) {
		if ( ! empty( $css ) ) {
			$css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
			$css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );
			$css = str_replace( ', ', ',', $css );
		}
		return $css;
	}

endif;

if ( ! function_exists( 'daio_get_option' ) ) :

/**
 * Get Option
 *
 * @package Divi AiO
 */
function daio_get_option( $option, $default = '' ) {

  $options = get_option( DIVI_AIO_PLUGIN_SETTINGS );

  if ( isset( $options[$option] ) ) {
    return $options[$option];
  }

  return $default;
  
}

endif;