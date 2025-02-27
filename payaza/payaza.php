<?php
/**
 * Plugin Name: Payaza
 * Plugin URI: https://payaza.africa
 * Description: WooCommerce checkout 
 * Version: 0.3.8
 * Author: Okenwa Kevin Ikwan
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 ** Requires Plugins: woocommerce
 * Requires at least: 6.2
 * Requires PHP: 7.4
 * WC requires at least: 8.0
 * WC tested up to: 9.1
 * Text Domain: woo-payaza
 * Domain Path: /languages

 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WC_PAYAZA_MAIN_FILE', __FILE__ );
define( 'WC_PAYAZA_URL', untrailingslashit( plugins_url( '/', __FILE__ ) ) );

define( 'WC_PAYAZA_VERSION', '0.3.8' );

/**
 * Initialize payaza gateway.
 */
function paz_wc_payaza_init() {

	load_plugin_textdomain( 'woo-payaza', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );

	if ( ! class_exists( 'WC_Payment_Gateway' ) ) {
		add_action( 'admin_notices', 'paz_wc_payaza_wc_missing_notice' );
		return;
	}

	add_action( 'admin_notices', 'paz_wc_payaza_testmode_notice' );

	require_once dirname( __FILE__ ) . '/includes/class-wc-gateway-payaza.php';


	add_filter( 'woocommerce_payment_gateways', 'paz_wc_add_payaza_gateway', 99 );

	add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'paz_woo_payaza_plugin_action_links' );

}
add_action( 'plugins_loaded', 'paz_wc_payaza_init', 99 );

/**
 * Add Settings link to the plugin entry in the plugins menu.
 *
 * @param array $links Plugin action links.
 *
 * @return array
 **/
function paz_woo_payaza_plugin_action_links( $links ) {

	$settings_link = array(
		'settings' => '<a href="' . admin_url( 'admin.php?page=wc-settings&tab=checkout&section=payaza' ) . '" title="' . __( 'View Payaza WooCommerce Settings', 'woo-payaza' ) . '">' . __( 'Settings', 'woo-payaza' ) . '</a>',
	);

	return array_merge( $settings_link, $links );

}

/**
 * Add payaza Gateway to WooCommerce.
 *
 * @param array $methods WooCommerce payment gateways methods.
 *
 * @return array
 */
function paz_wc_add_payaza_gateway( $methods ) {

	if ( class_exists( 'WC_Payment_Gateway_CC' ) ) {
		$methods[] = 'WC_Gateway_Payaza';
	}

	if ( 'NGN' === get_woocommerce_currency() ) {

		$settings        = get_option( 'woocommerce_payaza_settings', '' );
		$custom_gateways = isset( $settings['custom_gateways'] ) ? $settings['custom_gateways'] : '';

	}

	return $methods;

}

/**
 * Display a notice if WooCommerce is not installed
 */
//function paz_wc_payaza_wc_missing_notice() {
 //   echo '<div class="error"><p><strong>'. sprintf( esc_html__( 'Payaza requires WooCommerce to be installed and active. Click %s to install WooCommerce.', 'woo-payaza' ), '<a href="'. esc_url( wp_nonce_url( admin_url( 'plugin-install.php?tab=plugin-information&plugin=woocommerce&TB_iframe=true&width=772&height=539' ) ) ). '" class="thickbox open-plugin-details-modal">here</a>' ). '</strong></p></div>';
//}
function paz_wc_payaza_wc_missing_notice() {
    $message = sprintf(
        esc_html__( 'Payaza requires WooCommerce to be installed and active. Click %s to install WooCommerce.', 'woo-payaza' ),
        '<a href="'. esc_url( wp_nonce_url( admin_url( 'plugin-install.php?tab=plugin-information&plugin=woocommerce&TB_iframe=true&width=772&height=539' ) ) ). '" class="thickbox open-plugin-details-modal">here</a>'
    );
    $error_html = '<div class="error"><p><strong>'. $message. '</strong></p></div>';
	echo wp_kses_post( $error_html ); 
   // echo $error_html;
}




/**
 * Display the test mode notice.
 **/
function paz_wc_payaza_testmode_notice() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    $payaza_settings = get_option( 'woocommerce_payaza_settings' );
    $test_mode = isset( $payaza_settings['testmode'] ) ? $payaza_settings['testmode'] : '';

    //if ( 'yes' === $test_mode ) {
    //    $payaza_settings_url = esc_url( wp_nonce_url( admin_url( 'admin.php?page=wc-settings&tab=checkout&section=payaza' ) ) );
     //   $notice = 
	//	sprintf(
            /* translators: 1. payaza settings page URL link. */
        //    wp_kses_post ( 'Payaza test mode is still enabled. Click <strong><a href="%s">here</a></strong> to disable it when you want to start accepting live payments on your site.', 'woo-payaza' ),
        //    $payaza_settings_url
       // );
       // echo '<div class="error"><p>' . htmlspecialchars($notice, ENT_QUOTES, 'UTF-8') . '</p></div>';

    //}

	if ('yes' === $test_mode) {
		$payaza_settings_url = esc_url(wp_nonce_url(admin_url('admin.php?page=wc-settings&tab=checkout&section=payaza')));
		$notice = sprintf(
			/* translators: 1. payaza settings page URL link. */
			__('Payaza test mode is still enabled. Click <strong><a href="%s">here</a></strong> to disable it when you want to start accepting live payments on your site.', 'woo-payaza'),
			$payaza_settings_url
		);
		echo '<div class="error"><p>' . wp_kses_post($notice) . '</p></div>';
	}
	
}
add_action(
	'before_woocommerce_init',
	function () {
		if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
		}
	}
);

/**
 * Registers WooCommerce Blocks integration.
 */
function paz_wc_payaza_woocommerce_block_support() {
	if ( class_exists( 'Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType' ) ) {
		require_once __DIR__ . '/includes/class-wc-gateway-payaza-blocks-support.php';

		add_action(
			'woocommerce_blocks_payment_method_type_registration',
			static function( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
				$payment_method_registry->register( new WC_Gateway_Payaza_Blocks_Support() );
			}
		);
	}
}
add_action( 'woocommerce_blocks_loaded', 'paz_wc_payaza_woocommerce_block_support' );

add_action('wp_ajax_update_order_status', 'update_order_status');
add_action('wp_ajax_nopriv_update_order_status', 'update_order_status');

function update_order_status()
{
	if (!isset($_POST['order_id']) || !isset($_POST['transaction_reference'])) {
		wp_send_json_error(['message' => 'Invalid request']);
	}

	$order_id = intval($_POST['order_id']);
	$transaction_reference = sanitize_text_field($_POST['transaction_reference']);
	$status = sanitize_text_field($_POST['status']);

	$order = wc_get_order($order_id);
	if (!$order) {
		wp_send_json_error(['message' => 'Order not found']);
	}

	// Verify transaction with Payaza API if necessary

	// Update WooCommerce order status
	$order->update_status($status, 'Payment received via Payaza. Transaction Ref: ' . $transaction_reference);

	wp_send_json_success(['message' => 'Order updated successfully']);
}


function enqueue_payaza_scripts()
{
	wp_enqueue_script('payaza-script', plugin_dir_url(__FILE__) . 'payaza.js', array('jquery'), null, true);

	// Get order details
	if (is_checkout() && !is_order_received_page()) {
		global $wp;
		$order_id = isset($wp->query_vars['order-pay']) ? intval($wp->query_vars['order-pay']) : null;
		$order = wc_get_order($order_id);
		$payaza_settings = get_option('woocommerce_payaza_settings');
		$testmode = isset($payaza_settings['testmode']) ? $payaza_settings['testmode'] : '';
		$test_mode = $testmode === 'yes' ? true : false;

		if ($order) {
			$params = array(
			
				'key' => $test_mode ? $payaza_settings['test_public_key'] : $payaza_settings['live_public_key'],
				'amount' => $order->get_total() * 100, // Convert to cents
				'currency' => get_woocommerce_currency(),
				'email' => $order->get_billing_email(),
				'first_name' => $order->get_billing_first_name(),
				'last_name' => $order->get_billing_last_name(),
				'phone_number' => $order->get_billing_phone(),
				'txnref' => uniqid('payaza_'), // Generate unique transaction reference
				'order_id' => $order_id, // Pass order ID
				'connection_mode' => $test_mode ? 'Test' : 'Live', // Check if test or live mode
				'update_order_url' => admin_url('admin-ajax.php?action=update_order_status'), // Correct AJAX URL
				'thank_you_url' => $order->get_checkout_order_received_url() // Redirect after payment
			);

			wp_localize_script('payaza-script', 'wc_payaza_params', $params);
		}
	}
}
add_action('wp_enqueue_scripts', 'enqueue_payaza_scripts');