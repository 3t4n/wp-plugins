<?php
namespace GSS\Shipping;

defined( 'ABSPATH' ) || exit;

function init_gss_shiping_method() {

    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

        function gss_shipping_method_init() {
            require_once GSS_PLUGIN_PATH . 'includes/shipping/class-gss-shipping-method.php';
        }

        \add_action( 'woocommerce_shipping_init', __NAMESPACE__ . "\gss_shipping_method_init" );

        function add_gss_shipping_method( $methods ) {
            $methods['gss_shipping_method'] = 'GSS_Shipping_Method';
            return $methods;
        }

        \add_filter( 'woocommerce_shipping_methods', __NAMESPACE__ . "\add_gss_shipping_method" );
    }

}
