<?php

function ci_sc_function( $atts ) {
	$atts = shortcode_atts( array(
		'show' => '',
	), $atts );
	if( empty($atts['show'])){
		return;
	}

	

	return Contact_Info_Widget::contact_icon($atts['show']) . ' ' . html_entity_decode(esc_html(stripslashes(get_option( $atts['show'] . '_default' ))));
}

function contact_info_text_domain(){
	load_plugin_textdomain('contact-info', FALSE, basename( dirname( __FILE__ ) ) .'/languages');
}

function ci( $key ){
	return do_shortcode( '[ci show="'.$key.'"]' );
}