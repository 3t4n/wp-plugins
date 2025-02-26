<?php

if ( ! defined( 'ABSPATH' ) ) exit;

add_shortcode( 'AFFLCLink', 'afflc_shortcode' );

function afflc_shortcode( $atts ){
	
	$atts = shortcode_atts( [
		'id'  => 0,
	], $atts );
	
	if(intval($atts['id']) > 0)
	{
		$action = esc_url(get_rest_url(0, '/afflc/v1').'/do');
		$meta = get_post_meta( intval($atts['id']) );
		if(!$meta) return '';
		
		@$button_text = esc_html($meta['button_text'][0]);
		@$class = esc_attr($meta['css_class'][0]);
		
		
		return "<form action='{$action}' method='post' target='_blank'>".
		           "<input type='hidden' name='id' value='{$atts['id']}'>".
		           "<input type='submit' value='{$button_text}' class='pb-button pb-button-{$atts['id']} {$class}' />".
		       "</form>";
	}
	else
	{
     return '';  	
	}
}
