<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	function addonp_load_visual_composer() {
    // Title
	    vc_map(
	        array(
	            'name' => __( 'AddonPayments' ),
	            'base' => 'addonpayments',
	            'description' => 'Add a product ',
	            'icon' => ADDONP_PLUGIN_URL . 'assets/img/addonp-ico.png',
	            'category' => __( 'Gateways' ),
	            'params' => array(
	                array(
	                    'type' => 'textfield',
	                    'heading' => __( 'ID' ),
	                    'param_name' => 'id',
	                    'value' => '',
	                    'description' => __( 'Add an ID for this product block. This is mandatory if you add more than one product and has to be unique on this page', 'addonpayments' ),
	                    'admin_label' => true,
	                ),
	                array(
	                    'type' => 'textfield',
	                    'heading' => __( 'Price' ),
	                    'param_name' => 'price',
	                    'value' => '',
	                    'description' => __( 'The product price without currency sign, for example, 30.5', 'addonpayments' ),
	                    'admin_label' => true,
	                ),
	                array(
	                    'type' => 'textfield',
	                    'heading' => __( 'Product SKU' ),
	                    'param_name' => 'product',
	                    'value' => '',
	                    'description' => __( 'Add the SKU Product, example SKU0123. This is a reference for this product so has to be unique', 'addonpayments' ),
	                    'admin_label' => true,
	                ),
	            )
	        )
	    );
	}
	add_action( 'vc_before_init', 'addonp_load_visual_composer' );

