<?php
/**
 * Security check
 * Prevent direct access to the file.
 *
 * @since 1.2
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/**
 * amCharts shortcode
 * Register shortcode handler.
 *
 * usage: [amcharts id="" width="" height=""]
 *
 * @since 1.2
 */
function amcharts_shortcode( $atts ) {

	// Set default attributes
	$atts = shortcode_atts(
		array(
			'id'     => '',
			'width'  => 600,
			'height' => 400
		), $atts
	);

	// Embed code
	$embed_code = sprintf(
		'<iframe src="%1$s" width="%2$s" height="%3$s" frameborder="0"></iframe>',
		esc_url( 'https://live.amcharts.com/' . $atts['id'] . '/embed/' ),
		esc_attr( $atts['width'] ),
		esc_attr( $atts['height'] )
	);

	// Return embed code
	return $embed_code;

}
add_shortcode( 'amcharts', 'amcharts_shortcode' );
