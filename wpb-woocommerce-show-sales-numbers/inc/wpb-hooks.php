<?php

/*
    WPB WooCommerce Show Sales Numbers
    By WPBean
    
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/**
 * Setup The Sales
 */

add_action( 'init', 'wpb_wssn_setup_the_sales' );

if( !function_exists('wpb_wssn_setup_the_sales') ):
	function wpb_wssn_setup_the_sales(){

		$wssn_location = wpb_wssn_get_option( 'wssn_location','general_settings','woocommerce_single_product_summary' );
		$wssn_priority = wpb_wssn_get_option( 'wssn_priority','general_settings',30 );
		
		add_action( $wssn_location, 'wpb_wssn_product_sold_count', $wssn_priority );
	}
endif;

