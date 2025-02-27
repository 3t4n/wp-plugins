<?php

/*
    WPB WooCommerce Show Sales Numbers
    By WPBean
    
*/


/**
 * Include css files
 */

function wpb_wssn_adding_style() {
	wp_enqueue_style('wpb-wssn-main', plugins_url('../assets/css/main.css', __FILE__),'','1.0');
}
add_action( 'wp_enqueue_scripts', 'wpb_wssn_adding_style', 11 );



/**
 * Setup custom styling  
 */

if( !function_exists('wpb_wssn_custom_styles') ){

	function wpb_wssn_custom_styles() {
		$custom_css = '';
        $wssn_color = wpb_wssn_get_option( 'wssn_color','style_settings','' );
        $wssn_font_size = wpb_wssn_get_option( 'wssn_font_size','style_settings','' );
        $wssn_custom_css = wpb_wssn_get_option( 'wssn_custom_css','style_settings','' );

        if ( $wssn_color ) {
        	$custom_css .= ".wpb-wssn-sale { color: {$wssn_color}; }";
        }
        if ( $wssn_font_size ) {
        	$custom_css .= ".wpb-wssn-sale { font-size: {$wssn_font_size}px; }";
        }
        if ( $wssn_custom_css ) {
        	$custom_css .= $wssn_custom_css;
        }


        if( $custom_css ){
        	wp_add_inline_style( 'wpb-wssn-main', $custom_css );
        }

	}

}
add_action( 'wp_enqueue_scripts', 'wpb_wssn_custom_styles', 20 );