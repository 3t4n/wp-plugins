<?php
defined( 'ABSPATH' ) or die( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

//WooCommerce in admin
//=================================================================================================
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'woocommerce/woocommerce.php' )) {
    /**
	 * Add barcode type field to Inventory Product metabox (WooCommerce)
	 * 
	 * 
	 */
	function rankology_wc_barcode_type_field() {
		woocommerce_wp_select(
			array(
				'id'      => 'rkseo_wc_barcode_type_field',
				'label'   => __( 'Product Global Identifiers type', 'woocommerce' ),
				'options' => array(
					'none' => __( 'None', 'wp-rankology' ),
					'gtin8' => __( 'gtin8 (ean8)', 'wp-rankology' ),
					'gtin12' => __( 'gtin12 (ean12)', 'wp-rankology' ),
					'gtin13' => __( 'gtin13 (ean13)', 'wp-rankology' ),
					'gtin14' => __( 'gtin14 (ean14)', 'wp-rankology' ),
					'mpn' => __( 'mpn', 'wp-rankology' ),
					'isbn' => __( 'isbn', 'wp-rankology' )
					)
				)
		);
	}
	add_action( 'woocommerce_product_options_inventory_product_data', 'rankology_wc_barcode_type_field' );

	/**
	 * Save the barcode type custom field
	 * 
	 * 
	 */
	function rankology_save_wc_barcode_type_field( $post_id ) {
		$product = wc_get_product( $post_id );
		$barcode_type_field = isset( $_POST['rkseo_wc_barcode_type_field'] ) ? $_POST['rkseo_wc_barcode_type_field'] : '';
		$product->update_meta_data( 'rkseo_wc_barcode_type_field', esc_attr( $barcode_type_field ) );
		$product->save();
	}
	add_action( 'woocommerce_process_product_meta', 'rankology_save_wc_barcode_type_field' );

	/**
	 * Add barcode field to Inventory Product metabox (WooCommerce)
	 * 
	 * 
	 */
	function rankology_wc_barcode_field() {
		$args = array(
			'id'			=> 'rkseo_wc_barcode_field',
			'label'			=> __( 'Product Global Identifiers', 'wp-rankology' ),
			'class'			=> '',
			'desc_tip'		=> true,
			'data_type'		=> '',
			'description'	=> __( 'A valid product identifier to be used in the product schema (accepted types: gtin8 (ean8) | gtin12 (ean12) | gtin13 (ean13) | gtin14 (ean14) | mpn | isbn)', 'wp-rankology' ),
		);
		woocommerce_wp_text_input( $args );
	}
	add_action( 'woocommerce_product_options_inventory_product_data', 'rankology_wc_barcode_field' );

	/**
	 * Save the barcode custom field
	 * 
	 * 
	 */
	function rankology_save_wc_barcode_field( $post_id ) {
		$product = wc_get_product( $post_id );
		$barcode_field = isset( $_POST['rkseo_wc_barcode_field'] ) ? $_POST['rkseo_wc_barcode_field'] : '';
		$product->update_meta_data( 'rkseo_wc_barcode_field', sanitize_text_field( $barcode_field ) );
		$product->save();
	}
    add_action( 'woocommerce_process_product_meta', 'rankology_save_wc_barcode_field' );
}
