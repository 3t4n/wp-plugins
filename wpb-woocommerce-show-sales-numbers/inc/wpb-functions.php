<?php

/*
    WPB WooCommerce Show Sales Numbers
    By WPBean
    
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Getting The Sales Count
 */

if( !function_exists('wpb_wssn_product_sold_count') ):
	function wpb_wssn_product_sold_count() {

		global $wp_query, $product;
		$id = $wp_query->post->ID;
		$units_sold = get_post_meta( $id, 'total_sales', true );
		$wpb_wssn_disable = get_post_meta( $id, '_wpb_wssn_disable', true );
		$wssn_type = wpb_wssn_get_option( 'wssn_type','general_settings','btn_style' );
		$wssn_disable_for_zero_sale = wpb_wssn_get_option( 'wssn_disable_for_zero_sale','general_settings','' );
		$before_sale_count = wpb_wssn_get_option( 'before_sale_count','general_settings',__( 'Item: ', WPB_WSSN_TEXTDOMAIN ) );
		$after_sale_count_singular = wpb_wssn_get_option( 'after_sale_count_singular','general_settings',__( ' Sale', WPB_WSSN_TEXTDOMAIN ) );
		$after_sale_count_plural = wpb_wssn_get_option( 'after_sale_count_plural','general_settings',__( ' Sales', WPB_WSSN_TEXTDOMAIN ) );
		if( $units_sold < 1 ){
			$after = $after_sale_count_singular;
		}else{
			$after = $after_sale_count_plural;
		}

		$output = '<div class="wpb-wssn-sale wpb-wssn-type-'.$wssn_type.'">' . $before_sale_count . $units_sold . $after .'</div>';
		
		/* Disable showing sale for zero sale */
		if(  $wssn_disable_for_zero_sale === 'on' && $units_sold === '0' ){
			$output = '';
		}

		/* Disable showing sale for specific product */
		if( $wpb_wssn_disable === 'yes' ){
			$output = '';
		}

		echo $output;

		wp_reset_query();
	}
endif;


/**
 * Meta Box
 */

/* Display Woo Custom Fields */


add_action( 'woocommerce_product_options_general_product_data', 'wpb_wssn_add_disable_show_sale_fields' );

if ( !function_exists('wpb_wssn_add_disable_show_sale_fields') ) {
	function wpb_wssn_add_disable_show_sale_fields() {
		woocommerce_wp_checkbox( 
		array( 
			'id'            => '_wpb_wssn_disable', 
			'wrapper_class' => 'wpb-wrps-disable-relative-products-slider', 
			'label'         => __('Disable Show Sales Count', WPB_WSSN_TEXTDOMAIN ), 
			'description'   => __( 'Check this to disable showing sales for this product', WPB_WSSN_TEXTDOMAIN ),
			)
		);
	}
}



/* Save Custom Woo meta */


add_action( 'woocommerce_process_product_meta', 'wpb_wssc_save_disable_show_sale', 10, 2 );

if( !function_exists('wpb_wssc_save_disable_show_sale') ){
	function wpb_wssc_save_disable_show_sale( $post_id, $post ) {
		$woocommerce_checkbox = isset( $_POST['_wpb_wssn_disable'] ) ? 'yes' : 'no';
		update_post_meta( $post_id, '_wpb_wssn_disable', $woocommerce_checkbox );
	}
}


/**
 * Getting ready the plugin settings 
 */

if( !function_exists('wpb_wssn_get_option') ){

	function wpb_wssn_get_option( $option, $section, $default = '' ) {
	 
	    $options = get_option( $section );
	 
	    if ( isset( $options[$option] ) ) {
	        return $options[$option];
	    }
	 
	    return $default;
	}

}