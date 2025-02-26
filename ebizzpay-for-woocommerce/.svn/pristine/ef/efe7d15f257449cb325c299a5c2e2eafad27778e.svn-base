<?php
if ( !defined( 'ABSPATH' ) ) exit;

// Settings form fields
function ebizzpay_wc_settings_form_fields() {

    return array(
        'enabled' => array(
            'title'       => __( 'Enable/Disable', 'ebizzpay-wc' ),
            'type'        => 'checkbox',
            'label'       => __( 'Enable EbizzPay', 'ebizzpay-wc' ),
            'default'     => 'no',
        ),
        'title' => array(
            'title'       => __( 'Title', 'ebizzpay-wc' ),
            'type'        => 'text',
            'description' => __( 'This controls the title which the user sees during checkout.', 'ebizzpay-wc' ),
            'desc_tip'    => true,
            'placeholder' => __( 'EbizzPay', 'ebizzpay-wc' ),
            'default'     => __( 'EbizzPay', 'ebizzpay-wc' ),
        ),
        'description' => array(
            'title'       => __( 'Description', 'ebizzpay-wc' ),
            'type'        => 'textarea',
            'description' => __( 'This controls the description which the user sees during checkout.', 'ebizzpay-wc' ),
            'desc_tip'    => true,
            'placeholder' => __( 'Pay with Online Banking', 'ebizzpay-wc' ),
            'default'     => __( 'Pay with Online Banking', 'ebizzpay-wc' ),
        ),
        'api' => array(
            'title'       => __( 'API Credentials', 'ebizzpay-wc' ),
            'type'        => 'title',
            'description' => sprintf( __( 'API credentials can be obtained from EbizzPay dashboard > Settings > <a href="%s" target="_blank">API</a>.', 'ebizzpay-wc' ), 'https://web.ebizzpay.com/settings/api' ),
        ),
        'access_token' => array(
            'title'       => __( 'Access Token', 'ebizzpay-wc' ),
            'type'        => 'text',
        ),
        'signature_key' => array(
            'title'       => __( 'Signature Key', 'ebizzpay-wc' ),
            'type'        => 'text',
        ),
        'collection' => array(
            'title'       => __( 'Collection', 'ebizzpay-wc' ),
            'type'        => 'title',
            'description' => sprintf( __( 'Collection information can be obtained from EbizzPay dashboard > <a href="%s" target="_blank">Collections &amp; Bills</a>.', 'ebizzpay-wc' ), 'https://web.ebizzpay.com/billing' ),
        ),
        'collection_code' => array(
            'title'       => __( 'Collection Code', 'ebizzpay-wc' ),
            'type'        => 'text',
        ),
        'admin_fee' => array(
            'title'       => __( 'Admin Fee', 'ebizzpay-wc' ),
            'type'        => 'title',
            'description' => __( 'Include any additional charge to your customer.', 'ebizzpay-wc' ),
        ),
        'admin_fee_enabled' => array(
            'title'       => __( 'Enable/Disable Admin Fee', 'ebizzpay-wc' ),
            'type'        => 'checkbox',
            'label'       => __( 'Enable admin fee', 'ebizzpay-wc' ),
            'default'     => 'no',
        ),
        'admin_fee_title' => array(
            'title'       => __( 'Fee Title', 'ebizzpay-wc' ),
            'type'        => 'text',
            'default'     => __( 'Processing Fee', 'ebizzpay-wc' ),
        ),
        'admin_fee_amount' => array(
            'title'       => __( 'Fee Amount', 'ebizzpay-wc' ),
            'type'        => 'price',
            'placeholder' => wc_format_localized_price( 0 ),
            'default'     => 0,
        ),
        'debugging' => array(
            'title'       => __( 'Debugging', 'ebizzpay-wc' ),
            'type'        => 'title',
        ),
        'sandbox' => array(
            'title'       => __( 'Sandbox', 'ebizzpay-wc' ),
            'type'        => 'checkbox',
            'label'       => __( 'Enable sandbox mode', 'ebizzpay-wc' ),
            'description' => __( 'If checked, it will send request to EbizzPay in sandbox mode.', 'ebizzpay-wc' ),
            'default'     => 'no',
        ),
        'debug' => array(
            'title'       => __( 'Debug Log', 'ebizzpay-wc' ),
            'type'        => 'checkbox',
            'label'       => __( 'Enable debug log', 'ebizzpay-wc' ),
            'description' => sprintf( __( 'Log EbizzPay events, eg: IPN requests. Logs can be viewed in WooCommerce > Status > <a href="%s">Logs</a>.', 'ebizzpay-wc' ), esc_url( admin_url( 'admin.php?page=wc-status&tab=logs' ) ) ),
            'default'     => 'no',
        ),
    );

}
