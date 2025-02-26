<?php
/**
 * Advanced Headers - Dynamic CSS
 *
 * @package Divi AiO
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'daio_dynamic_css', 'daio_adv_headers_dynamic_css' );

/**
 * Headers Advanced Dynamic css
 */
function daio_adv_headers_dynamic_css( $dynamic_css ) {

	$remove_mh_underline = daio_get_option( 'daio-remove-mh-underline' );

	$headers_adv = array();

	$adv_header_css_output = daio_parse_css( $headers_adv );

	if ( '1' == $remove_mh_underline  ) {
		$mh_underline_css = array(
			'#main-header' => array(
				'box-shadow' => 'none !important'
			)
		);

		$adv_header_css_output .= daio_parse_css( $mh_underline_css );
	}

	return $dynamic_css . $adv_header_css_output;

}