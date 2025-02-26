<?php
/*
  Plugin Name: Gateway AqayePardakht for Woocommerce
  Version: 1.6
  Description: این افزونه درگاه آقای پرداخت برای فروشگاه ساز ووکامرس میباشد.
  Author: Aqaye Pardakht
  Author URI: https://aqayepardakht.ir
*/

if(!defined('ABSPATH'))exit;

define('WOO_GAPIRDIR', plugin_dir_path( __FILE__ ));
define('WOO_GAPIRDU', plugin_dir_url( __FILE__ ));

function load_aqayepardakht_woo_gateway(){

	add_filter('woocommerce_payment_gateways', 'Woocommerce_Add_aqayepardakht_Gateway');
	function Woocommerce_Add_aqayepardakht_Gateway($methods){
		$methods[] = 'WC_aqayepardakht';
		return $methods;
	}
	require_once( WOO_GAPIRDIR . 'class-wc-gateway-aqayepardakht.php' );

}
add_action('plugins_loaded', 'load_aqayepardakht_woo_gateway', 0);

function declare_aqayepardakht_cart_checkout_blocks_compatibility() {

    if (class_exists('\Automattic\WooCommerce\Utilities\FeaturesUtil')) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('cart_checkout_blocks', __FILE__, true);
    }
}

add_action('before_woocommerce_init', 'declare_aqayepardakht_cart_checkout_blocks_compatibility');
add_action( 'woocommerce_blocks_loaded', 'aqayepardakht_register_order_approval_payment_method_type' );

function aqayepardakht_register_order_approval_payment_method_type() {
    
    if ( ! class_exists( 'Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType' ) ) {
        return;
    }

    require_once plugin_dir_path(__FILE__) . 'class-block.php';

    add_action(
        'woocommerce_blocks_payment_method_type_registration',
        function( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
            $payment_method_registry->register( new Aqayepardakht_Gateway_Blocks );
        }
    );
}
