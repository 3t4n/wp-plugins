<?php

add_shortcode( 'surbma-cookie-popup-link', function( $atts ) {
	extract( shortcode_atts( array(
		'class' => '',
		'text' => 'Open Cookie Settings'
	), $atts ) );
	$class = esc_attr( $class );
	$text = wp_filter_nohtml_kses( $text );
	return '<a class="surbma-gpga-cookie-popup-link ' . $class . '" onclick="surbma_gpga_openModal();">' . $text . '</a>';
} );

add_shortcode( 'surbma-live-cookie-scan', function( $atts ) {
	extract( shortcode_atts( array(
		'cookievalue' => 'true'
	), $atts ) );
	if( $_COOKIE ) {
		$cookieScan = '<div class="surbma-gpga-cookie-list">';
		foreach ($_COOKIE as $key=>$val) {
			$cookieScan .= '<dl>';
			$cookieScan .= '<dt>' . __( 'Cookie name', 'surbma-gdpr-proof-google-analytics' ) . ':</dt>';
			$cookieScan .= '<dd>' . $key . '</dd>';
			if( $cookievalue === 'true' ) {
				$cookieScan .= '<dt>' . __( 'Cookie value', 'surbma-gdpr-proof-google-analytics' ) . ':</dt>';
				$cookieScan .= '<dd>' . $val . '</dd>';
			}
			$cookieScan .= '</dl>';
		}
		$cookieScan .= '</div>';
	}
	else {
		$cookieScan = '<p>' . __( 'COOKIE is not set on this website.', 'surbma-gdpr-proof-google-analytics' ) . '</p>';
	}
return $cookieScan;
} );

add_shortcode( 'surbma-social-buttons', function() {
	wp_enqueue_style( 'surbma-gpga-social-share' );
	return surbma_gpga_social_add_share_buttons();
} );
