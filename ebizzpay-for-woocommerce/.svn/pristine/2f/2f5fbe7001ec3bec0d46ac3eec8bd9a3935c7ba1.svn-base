<?php
if ( !defined( 'ABSPATH' ) ) exit;

class EbizzPay_WC_Init {

    private $gateway_class = 'EbizzPay_WC_Gateway';

    // Constructor
    public function __construct() {

        add_action( 'woocommerce_payment_gateways', array( $this, 'register_gateway' ) );
        add_action( 'init', array( $this, 'load_dependencies' ) );

    }

    // Register EbizzPay as WooCommerce payment method
    public function register_gateway( $methods ) {

        $methods[] = $this->gateway_class;
        return $methods;

    }

    // Load required files
    public function load_dependencies() {

        if ( !class_exists( 'WC_Payment_Gateway' ) ) {
            return;
        }

        require_once( EBIZZPAY_WC_PATH . 'admin/settings.php' );
        require_once( EBIZZPAY_WC_PATH . 'includes/class-ebizzpay-wc-gateway.php' );

    }

}
new EbizzPay_WC_Init();
