<?php
/**
 * Payex Gateway
 *
 * @package     payex-payment-gateway-for-woocommerce
 *
 * @wordpress-plugin
 * Plugin Name:       Payex Payment Gateway for Woocommerce
 * Plugin URI:        https://payex.io
 * Description:       Accept Online Banking, Cards, EWallets, Instalments, and Subscription payments using Payex
 * Version:           1.2.10
 * Requires at least: 4.7
 * Requires PHP:      7.0
 * Author:            Payex Ventures Sdn Bhd
 * Author URI:        https://payex.io
 * Developer:         Payex Ventures Sdn Bhd
 * Developer URI:     https://payex.io
 * Text Domain:       payex-woocommerce-gateway
 *
 * License:           The MIT License (MIT)
 * License URI:       https://opensource.org/licenses/MIT
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const PAYEX_VERSION              = '1.2.10';
const PAYEX_AUTH_CODE_SUCCESS    = '00';
const PAYEX_AUTH_CODE_PENDING    = '09';
const PAYEX_AUTH_CODE_PENDING_2  = '99';
const DIRECT_DEBIT               = 'Direct Debit';
const AUTO_DEBIT                 = 'Auto Debit';
const DIRECT_DEBIT_AUTHORIZATION = 'Mandate - Authorization';
const DIRECT_DEBIT_APPROVAL      = 'Mandate - Approval';
const AUTO_DEBIT_AUTHORIZATION   = 'Auto Debit - Authorization';

/**
 * Main plugin class.
 */
class WC_Payex_Payments {
	/**
	 * Plugin bootstrapping.
	 */
	public static function init() {

		// Payex Payments gateway class.
		add_action( 'plugins_loaded', array( __CLASS__, 'includes' ), 0 );

		// Make the Payex Payments gateway available to WC.
		add_filter( 'woocommerce_payment_gateways', array( __CLASS__, 'add_gateway' ) );

		// Registers WooCommerce Blocks integration.
		add_action( 'woocommerce_blocks_loaded', array( __CLASS__, 'woocommerce_gateway_payex_woocommerce_block_support' ) );

		if ( ! has_action( 'woocommerce_query_payex_payment_status' ) ) {
			add_action( 'woocommerce_query_payex_payment_status', array( __CLASS__, 'query_payex_payment_status' ), 10, 2 );
		}
	}

	/**
	 * Add the Payex Payment gateway to the list of available gateways.
	 *
	 * @param array $gateways List of available gateways.
	 */
	public static function add_gateway( $gateways ) {
		$gateways[] = 'WC_Payex_Gateway';
		return $gateways;
	}

	/**
	 * Add all includes here.
	 */
	public static function includes() {
		if ( class_exists( 'WC_Payment_Gateway' ) ) {
			require_once 'includes/class-wc-payex-gateway.php';
		}
	}

	/**
	 * Plugin url for script inblock support.
	 *
	 * @return string
	 */
	public static function plugin_url() {
		return untrailingslashit( plugins_url( '/', __FILE__ ) );
	}

	/**
	 * Plugin absolute path for script inblock support.
	 *
	 * @return string
	 */
	public static function plugin_abspath() {
		return trailingslashit( plugin_dir_path( __FILE__ ) );
	}

	/**
	 * Registers WooCommerce Blocks integration.
	 */
	public static function woocommerce_gateway_payex_woocommerce_block_support() {
		if ( class_exists( 'Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType' ) ) {
			require_once 'includes/class-wc-payex-block-support.php';
			add_action(
				'woocommerce_blocks_payment_method_type_registration',
				function ( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
					$payment_method_registry->register( new WC_Payex_Block_Support() );
				}
			);
		}
	}

	/**
	 * Check Payment Status if status still pending
	 *
	 * @param string $order_id Customer order id.
	 * @param int    $attempts Number of attempts.
	 */
	public static function query_payex_payment_status( $order_id, $attempts = 0 ) {
		if ( $attempts <= 10 ) {
			$gateway = new WC_Payex_Gateway();
			$updated = $gateway->query_payex_payment_status( $order_id );
			if ( ! $updated ) {
				wp_schedule_single_event( time() + ( 30 * MINUTE_IN_SECONDS ), 'woocommerce_query_payex_payment_status', array( $order_id, ++$attempts ) );
			}
		}
	}
}

WC_Payex_Payments::init();
