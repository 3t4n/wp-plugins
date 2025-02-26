<?php
/**
 * Advanced Footer - Dynamic CSS
 *
 * @package Divi AiO
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'daio_dynamic_css', 'daio_adv_footer_dynamic_css' );

/**
 * Footer Advanced Dynamic css
 */
function daio_adv_footer_dynamic_css( $dynamic_css ) {

	$sticky_footer = daio_get_option( 'daio-sticky-footer' );
	$hide_footer_widgets = daio_get_option( 'daio-hide-footer-widgets' );
	$hide_footer_bar = daio_get_option( 'daio-hide-footer-bottom-bar' );
	$hide_footer_widget_bullets = daio_get_option( 'daio-hide-footer-widget-bullets' );

	$footer_adv = array();

	$adv_footer_css_output = daio_parse_css( $footer_adv );

	if ( '1' == $sticky_footer  ) {
		$sticky_footer_css = array(
			'body.daio-footer-sticky-enabled #main-footer' => array(
				'width' => '100%',
				'position' => 'fixed',
				'bottom' => '0',
				'left' => '0',
				'z-index' => '99999'
			)
		);

		$adv_footer_css_output .= daio_parse_css( $sticky_footer_css );
	}

	if ( '1' == $hide_footer_widgets  ) {
		$hide_footer_widgets_css = array(
			'#footer-widgets' => array(
				'display' => 'none'
			)
		);

		$adv_footer_css_output .= daio_parse_css( $hide_footer_widgets_css );
	}

	if ( '1' == $hide_footer_bar  ) {
		$hide_footer_bar_css = array(
			'#footer-bottom' => array(
				'display' => 'none'
			)
		);

		$adv_footer_css_output .= daio_parse_css( $hide_footer_bar_css );
	}

	if ( '1' == $hide_footer_widget_bullets  ) {
		$hide_footer_widget_bullets_css = array(
			'#footer-widgets .footer-widget li' => array(
				'padding-left' => '0'
			),
			'#footer-widgets .footer-widget li:before' => array(
				'border' => 'none'
			)
		);

		$adv_footer_css_output .= daio_parse_css( $hide_footer_widget_bullets_css );
	}

	return $dynamic_css . $adv_footer_css_output;

}