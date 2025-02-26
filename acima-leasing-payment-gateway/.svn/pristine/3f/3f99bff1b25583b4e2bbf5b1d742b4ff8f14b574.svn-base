<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

/**
 * Acima Digital Payment Gateway Credit Block
 *
 * Registers the payment method type for block checkout
 *
 * @class   WC_Gateway_Acima_Credit_Block
 * @extends AbstractPaymentMethodType
 * @package WooCommerce/Classes/Payment
 * @author  Acima Digital, Inc
 */
final class WC_Gateway_Acima_Credit_Block extends AbstractPaymentMethodType {

	private $gateway;
	protected $name = 'acima_credit';

	public function initialize() {
		$this->settings = get_option( 'woocommerce_acima_credit_settings', array() );
		$this->gateway  = new WC_Gateway_Acima_Credit();

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_payment_method_scripts' ), 10 );
		add_action( 'rest_api_init', array( $this, 'register_rest_api' ) );
	}

	public function check_nonce_generation_permissions( $request ) {
		$order_id = $request->get_param( 'order_id' );
		$nonce    = $request->get_header( 'X-WP-Nonce' );

		// Log for debugging
		WC_Gateway_Acima_Credit_Logger::debug(
			sprintf(
				'Checking permissions - Order ID: %s, User ID: %d',
				$order_id,
				get_current_user_id()
			)
		);

		// Check if order exists
		$order = wc_get_order( $order_id );
		if ( ! $order ) {
			return new WP_Error(
				'rest_forbidden',
				__( 'Invalid order.', 'acima-leasing-payment-gateway' ),
				array( 'status' => 403 )
			);
		}

		// Verify nonce first
		if ( ! $nonce || ! wp_verify_nonce( $nonce, 'wp_rest' ) ) {
			WC_Gateway_Acima_Credit_Logger::debug( 'Invalid nonce provided' );
			return new WP_Error(
				'rest_forbidden',
				__( 'Invalid nonce.', 'acima-leasing-payment-gateway' ),
				array( 'status' => 403 )
			);
		}

		// For checkout, we only need to verify the order is valid and nonce is correct
		// Remove the user permission check since this is a public endpoint during checkout
		return true;
	}

	public function register_rest_api() {
		register_rest_route(
			'wc-acima-credit/v1',
			'/process-payment',
			array(
				'methods'             => 'POST',
				'callback'            => array( $this, 'process_payment_data' ),
				'permission_callback' => array( $this, 'check_permissions' ),
			)
		);

		register_rest_route(
			'wc-acima-credit/v1',
			'/generate-order-nonce',
			array(
				'methods'             => 'POST',
				'callback'            => array( $this, 'generate_order_nonce' ),
				'permission_callback' => array( $this, 'check_nonce_generation_permissions' ),
			)
		);
	}

	public function check_permissions( \WP_REST_Request $request ) {
		$nonce_check = $this->check_nonce( $request );
		if ( $nonce_check !== true ) {
			return $nonce_check; // This will be the WP_Error from check_nonce
		}

		// Add rate limiting using object cache
		$ip          = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';
		$cache_group = 'acima_api_rate_limit';
		$cache_key   = md5( $ip );
		$rate_count  = wp_cache_get( $cache_key, $cache_group );

		if ( false === $rate_count ) {
			wp_cache_set( $cache_key, 1, $cache_group, MINUTE_IN_SECONDS * 5 ); // 5 minutes window
		} elseif ( $rate_count >= 10 ) { // Allow 10 requests per 5 minutes
			return new WP_Error( 'too_many_requests', 'Rate limit exceeded', array( 'status' => 429 ) );
		} else {
			wp_cache_set( $cache_key, $rate_count + 1, $cache_group, MINUTE_IN_SECONDS * 5 );
		}

		return true;
	}

	protected function check_nonce( \WP_REST_Request $request ) {
		$nonce = $request->get_header( 'Nonce' ) ?: $request->get_header( 'X-WP-Nonce' );

		WC_Gateway_Acima_Credit_Logger::debug( 'Nonce received: ' . $nonce );

		if ( is_null( $nonce ) || ! wp_verify_nonce( $nonce, 'wp_rest' ) ) {
			WC_Gateway_Acima_Credit_Logger::debug( 'Invalid REST API nonce' );
			return new WP_Error(
				'woocommerce_rest_invalid_nonce',
				__( 'REST API nonce is invalid or missing.', 'acima-leasing-payment-gateway' ),
				array( 'status' => 403 )
			);
		}

		return true;
	}

	public function generate_order_nonce( $request ) {
		$order_id = $request->get_param( 'order_id' );
		WC_Gateway_Acima_Credit_Logger::debug( 'Attempting to generate nonce for order ID: ' . $order_id );

		if ( ! $order_id ) {
			WC_Gateway_Acima_Credit_Logger::debug( 'Error: Order ID is required for nonce generation' );
			return new WP_Error( 'invalid_order', 'Order ID is required', array( 'status' => 400 ) );
		}

		$order = wc_get_order( $order_id );
		if ( ! $order ) {
			WC_Gateway_Acima_Credit_Logger::debug( 'Error: Invalid order ID or order status' );
			return new WP_Error( 'invalid_order', 'Invalid order ID or order status', array( 'status' => 400 ) );
		}

		$nonce = WC_Gateway_Acima_Credit_Nonce_Handler::generate_nonce( $order_id );

		return rest_ensure_response( array( 'nonce' => $nonce ) );
	}

	public function process_payment_data( $request ) {
		try {
			$order_id = $request->get_param( 'order_id' );

			$order = wc_get_order( $order_id );
			if ( $order ) {
				$order->set_payment_method( WC_Gateway_Acima_Credit::PAYMENT_METHOD_CODE );
				$order->set_payment_method_title( $this->gateway->get_title() );
				$order->save();

				WC_Gateway_Acima_Credit_Logger::debug( 'Set payment method for order ' . $order_id . ' to ' . WC_Gateway_Acima_Credit::PAYMENT_METHOD_CODE );
			}

			// Reuse existing logic from WC_Gateway_Acima_Credit_Order_Parser
			$customer_data    = WC_Gateway_Acima_Credit_Order_Parser::parse_customer( $order_id );
			$transaction_data = WC_Gateway_Acima_Credit_Order_Parser::parse_order( $order_id );
			$thank_you_page   = $this->get_thank_you_page_url( $order_id );

			return rest_ensure_response(
				array(
					'customer_data'    => $customer_data,
					'transaction_data' => $transaction_data,
					'thank_you_page'   => $thank_you_page,
					'success'          => true,
					'message'          => 'success!',
				)
			);
		} catch ( Exception $e ) {
			WC_Gateway_Acima_Credit_Logger::error( 'Failed to process payment: ' . $e->getMessage() );
			return rest_ensure_response(
				array(
					'message' => $e->getMessage(),
					'success' => false,
				)
			);
		}
	}

	private function get_thank_you_page_url( $order_id ) {
		$order = wc_get_order( $order_id );
		if ( ! $order ) {
			return '';
		}
		return $order->get_checkout_order_received_url();
	}

	public function is_active() {
		return $this->gateway->is_available();
	}

	public function get_payment_method_script_handles(): array {
		$asset_file = include plugin_dir_path( __FILE__ ) . '../assets/js/frontend/blocks.asset.php';

		wp_register_script(
			'acima_credit_gateway-blocks-integration',
			plugin_dir_url( __FILE__ ) . '../assets/js/frontend/blocks.js',
			array_merge( $asset_file['dependencies'], array( 'wp-element', 'wp-components', 'wp-i18n', 'wp-blocks', 'wc-blocks-registry' ) ),
			$asset_file['version'],
			true
		);

		wp_localize_script(
			'acima_credit_gateway-blocks-integration',
			'acimaCreditSettings',
			$this->get_payment_method_data()
		);

		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( 'acima_credit_gateway-blocks-integration', 'acima-leasing-payment-gateway' );
		}

		return array( 'acima_credit_gateway-blocks-integration' );
	}

	public function get_payment_method_data() {
		$acimaSettings = $this->settings;

		return array(
			'title'         => $this->gateway->title,
			'description'   => $this->gateway->description,
			'merchant_id'   => isset( $acimaSettings['merchant_id'] ) ? $acimaSettings['merchant_id'] : '',
			'api_url'       => isset( $acimaSettings['api_url'] ) ? $acimaSettings['api_url'] : '',
			'supports'      => $this->get_supported_features(),
			'storeApiNonce' => wp_create_nonce( 'wc_store_api' ),
			'restApiNonce'  => wp_create_nonce( 'wp_rest' ),
			'ajaxUrl'       => admin_url( 'admin-ajax.php' ),
		);
	}

	public function enqueue_payment_method_scripts() {
		$scripts = $this->get_payment_method_script_handles();
		if ( ! empty( $scripts ) ) {
			foreach ( $scripts as $script ) {
				wp_enqueue_script( $script );
			}
		}
	}
}
