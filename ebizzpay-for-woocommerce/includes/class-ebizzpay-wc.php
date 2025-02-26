<?php
if ( !defined( 'ABSPATH' ) ) exit;

class EbizzPay_WC {

    // Constructor
    public function __construct() {

        // Functions
        require_once( EBIZZPAY_WC_PATH . 'includes/functions.php' );

        // API
        require_once( EBIZZPAY_WC_PATH . 'includes/abstracts/abstract-ebizzpay-wc-client.php' );
        require_once( EBIZZPAY_WC_PATH . 'includes/class-ebizzpay-wc-api.php' );

        // Admin
        require_once( EBIZZPAY_WC_PATH . 'admin/class-ebizzpay-wc-admin.php' );

        // Initialize payment gateway
        require_once( EBIZZPAY_WC_PATH . 'includes/class-ebizzpay-wc-init.php' );

    }

}
new EbizzPay_WC();
