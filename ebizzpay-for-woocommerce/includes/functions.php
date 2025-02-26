<?php
if ( !defined( 'ABSPATH' ) ) exit;

// Display notice
function ebizzpay_wc_notice( $message, $type = 'success' ) {

    $plugin = esc_html__( 'EbizzPay for WooCommerce', 'ebizzpay-wc' );

    printf( '<div class="notice notice-%1$s"><p><strong>%2$s:</strong> %3$s</p></div>', esc_attr( $type ), $plugin, $message );

}

// Get plugin setting by key
function ebizzpay_wc_get_setting( $key, $default = null ) {

    $settings = get_option( 'woocommerce_ebizzpay_settings' );

    if ( isset( $settings[ $key ] ) && !empty( $settings[ $key ] ) ) {
        return $settings[ $key ];
    }

    return $default;

}

// Log the error message in the WooCommerce log
function ebizzpay_wc_logger( $message ) {

    if ( !function_exists( 'wc_get_logger' ) ) {
        return false;
    }

    return wc_get_logger()->add( 'ebizzpay-wc', $message );

}

// Format phone number
function ebizzpay_wc_format_phone_number( $phone_number ) {

    // Get numbers only
    $phone_number = preg_replace( '/[^0-9]/', '', $phone_number );

    // Add country code in the front of phone number if the phone number starts with zero (0)
    if ( strpos( $phone_number, '0' ) === 0 ) {
        $phone_number = '6' . $phone_number;
    }

    return $phone_number;

}
