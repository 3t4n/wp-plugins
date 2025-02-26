<?php
/*
Plugin Name:  FeexPay
Plugin URI:   https://github.com/La-Vedette-Media/feexpay-woocommerce
Description:  A secure plugin to accept Mobile Money and Credit Card payments.
Version:      1.0.8
Author:       FeexPay
Author URI:   https://www.feexpay.me
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:
Domain Path:  /languages
*/

// Make sure WooCommerce is active
if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) return;

// include feexpay
require_once(plugin_dir_path(__DIR__) . 'feexpay/vendor/autoload.php');

/*
 * The class itself, please note that it is inside plugins_loaded action hook
 */
function feexpay_init_gateway_class() {
    if ( ! class_exists( 'WC_Payment_Gateway' ) ) return;
    require_once(plugin_dir_path(__FILE__) . 'includes/class-wc-feexpay-gateway.php');

    add_filter( 'woocommerce_payment_gateways', 'feexpay_add_gateway_class' );

    /*
    * This action hook registers our PHP class as a WooCommerce payment gateway
    */
    function feexpay_add_gateway_class( $gateways ) {
        $gateways[] = 'WC_FeexPay_Gateway';
        return $gateways;
    }
}
add_action( 'plugins_loaded', 'feexpay_init_gateway_class' );

function feexpay_action_links($links) {

    $links[] = 	'<a href="admin.php?page=wc-settings&tab=checkout&section=feexpay_woocommerce_plugin">' . __('Settings', 'feexpay') . '</a>';
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'feexpay_action_links');


/**
 * Declare the HPOS compatibility
 */
add_action(
    'before_woocommerce_init',
    function () {
        if (class_exists(\Automattic\WooCommerce\Utilities\FeaturesUtil::class)) {
            \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('custom_order_tables', __FILE__, true);
        }
        if (class_exists('\Automattic\WooCommerce\Utilities\FeaturesUtil')) {
            \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility(
                'cart_checkout_blocks',
                __FILE__,
                true
            );
        }
    }
);
