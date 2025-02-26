<?php
/*
Plugin Name: 1stPayGateway for WooCommerce
Plugin URI: http://www.1stpaygateway.net
Description: Plugin for processing WooCommerce transactions through the 1stPayGateway.
Version: 1.3.0
Author: Kevin DeMoura
Author URI: http://www.1stpaygateway.net
*/

// don't call the file directly
defined( 'ABSPATH' ) or die();

/**
 * WooCommerce - 1stPayGateway integration
 *
 * @author Kevin DeMoura
 */
class FirstPayGateway_Plugin {

    private $gatewayClassPath = '/includes/class-wc-gateway-1stpay.php';
    private $gatewayName = 'WC_Gateway_1stpay';

    /**
     * Start plugin
     */
    public function __construct() {
        add_action( 'plugins_loaded', array($this, 'init') );
        add_filter( 'woocommerce_payment_gateways', array($this, 'register_gateway') ); // add as WC gateway

        register_activation_hook( __FILE__, array($this, 'install') );
    }

    /**
     * Start once all plugins are loaded
     *
     * @return void
     */
    function init() {
        if ( ! class_exists( 'WC_Payment_Gateway' ) ) {
            return;
        }

        require_once dirname( __FILE__ ) . $this->gatewayClassPath;
    }

    /**
     * Register WooCommerce Gateway
     *
     * @param  array  $gateways
     *
     * @return array
     */
    function register_gateway( $gateways ) {
        $gateways[] = $this->gatewayName;

        return $gateways;
    }

    /**
     * @return void
     */
    function install() {
        global $wpdb;
    }
}

new FirstPayGateway_Plugin();