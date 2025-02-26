<?php
if (!defined('ABSPATH')) {
    exit;
}
return array(
    'enabled' => array(
        'title' => esc_html__('Enable/Disable', 'amwalpay-for-woocommerce'),
        'type' => 'checkbox',
        'label' => esc_html__('Enable Amwal PayForm Gateway', 'amwalpay-for-woocommerce'),
        'default' => 'no'
    ),
    'title'          => array(
		'title'             => esc_html__( 'Payment Method - Title', 'amwalpay-for-woocommerce' ),
		'type'              => 'text',
		'description'       => esc_html__( 'This controls the title which the user sees during checkout.', 'amwalpay-for-woocommerce' ),
		'default'           => esc_html__( 'Amwal pay', 'amwalpay-for-woocommerce' ),
		'custom_attributes' => array( 'required' => 'required' ),
	),
	'description'    => array(
		'title'             => esc_html__( 'Payment Method - Description', 'amwalpay-for-woocommerce' ),
		'type'              => 'textarea',
		'default'           => esc_html__( 'Amwal Payment Gateway for Oman  and supports all card and wallet payment', 'amwalpay-for-woocommerce' ),
		'description'       => esc_html__( 'This controls the description which the user sees during checkout.', 'amwalpay-for-woocommerce' ),
		'custom_attributes' => array( 'required' => 'required' ),
	),
    'logo'                  => array(
		'title'             => esc_html__( 'Payment Method - Logo URL', 'amwalpay-for-woocommerce' ),
		'default'           => plugins_url( AMPR_PLUGIN_NAME ) . '/assets/img/amwalpay.svg',
		'type'              => 'text',
		'description'       => esc_html__( 'Add a Logo URL for checkout icon.', 'amwalpay-for-woocommerce' ),
		'custom_attributes' => array( 'required' => 'required' ),
	),
    'live' => array(
        'title' => esc_html__('Environment', 'amwalpay-for-woocommerce'),
        'type' => 'select',
        'options' => array(
            'prod' => esc_html__('Production', 'amwalpay-for-woocommerce'),
            'sit' => esc_html__('SIT', 'amwalpay-for-woocommerce'),
            'uat' => esc_html__('UAT', 'amwalpay-for-woocommerce'),
        ),
        'description' => esc_html__('Select the environment for Amwal PayForm Gateway.', 'amwalpay-for-woocommerce'),
        'default' => 'uat',
    ),

    'merchant_id' => array(
        'title' => esc_html__('Merchant id', 'amwalpay-for-woocommerce'),
        'type' => 'text',
        'value' => '',
        'description' => esc_html__('Please enter the merchant ID', 'amwalpay-for-woocommerce'),
        'default' => '',
        'custom_attributes' => array('required' => 'required'),
    ),
    'terminal_id' => array(
        'title' => esc_html__('Terminal id', 'amwalpay-for-woocommerce'),
        'type' => 'text',
        'value' => '',
        'description' => esc_html__('Please enter Terminal ID of your amwal merchant', 'amwalpay-for-woocommerce'),
        'default' => '',
        'size' => '15',
        'custom_attributes' => array('required' => 'required'),
    ),
    'secret_key' => array(
        'title' => esc_html__('Secret key', 'amwalpay-for-woocommerce'),
        'type' => 'text',
        'value' => '',
        'description' => esc_html__('Please enter  Secret key', 'amwalpay-for-woocommerce'),
        'default' => '',
        'size' => '50',
        'custom_attributes' => array('required' => 'required'),
    ),
    'complete_paid_order' => array(
        'title' => esc_html__('Complete order after payment', 'amwalpay-for-woocommerce'),
        'type' => 'checkbox',
        'label' => esc_html__('set order status completed after payment instead of processing', 'amwalpay-for-woocommerce'),
        'default' => 'no'
    ),
    'debug' => array(
        'title' => esc_html__('Debug Log', 'amwalpay-for-woocommerce'),
        'label' => esc_html__('Enable debug log', 'amwalpay-for-woocommerce'),
        'type' => 'checkbox',
        'description' => esc_html__('Log file will be saved in ', 'amwalpay-for-woocommerce') . (defined('WC_LOG_DIR') ? WC_LOG_DIR . 'amwalpay.log' : WC()->plugin_path() . '/logs/amwalpay.log'),
        'default' => 'yes',
    ),
);