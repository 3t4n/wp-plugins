<?php

namespace MuzaPay\Features;

use Automattic\WooCommerce\StoreApi\Schemas\V1\CartSchema;
use MuzaPay\Repositories\OrderRepository;
use MuzaPayDeps\BenefitPlusGatewaySdk\ApiException;
use MuzaPayDeps\BenefitPlusGatewaySdk\Model\PaymentStateResponse;
use MuzaPayDeps\Wpify\Asset\AssetFactory;
use MuzaPayDeps\Wpify\Log\RotatingFileLog;
use MuzaPayDeps\Wpify\PluginUtils\PluginUtils;
use WC_Order;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class Woocommerce {

	public function __construct(
		private AssetFactory $asset_factory,
		private PluginUtils $utils,
		private OrderRepository $order_repository,
		private RotatingFileLog $log
	) {
		add_filter( 'woocommerce_payment_gateways', array( $this, 'add_gateway' ) );
		add_filter( 'woocommerce_before_thankyou', array( $this, 'payment_status_info' ), 10, 2 );
		add_action( 'woocommerce_blocks_loaded', array( $this, 'block_support' ) );
		add_action( 'woocommerce_blocks_loaded', [ $this, 'add_custom_cart_api_data' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		add_action( 'init', [ $this, 'schedule_payment_status_hook' ] );
		add_action( 'check_muzapay_payment_status', [ $this, 'check_muzapay_payment_status' ] );
	}


	/**
	 * Add gateway
	 *
	 * @param array $gateways Array of available gateways.
	 *
	 * @return array
	 */
	public function add_gateway( array $gateways ): array {
		$gateways[] = Gateway::class;

		return $gateways;
	}

	/**
	 * Add payment status info to thankyou page
	 *
	 * @param int|WC_Order $order
	 */
	function payment_status_info( $order ) {
		if ( is_numeric( $order ) ) {
			$order = wc_get_order( $order );
		}

		if ( $order->get_payment_method() !== 'muzapay' ) {
			return;
		}

		echo '<h3 class="wpify-woo-muzapay-status">'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		esc_html_e( 'Payment status', 'muzapay' ) . ': '; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		if ( $order->is_paid() ) {
			esc_html_e( 'Received', 'muzapay' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else {
			esc_html_e( 'Waiting for payment', 'muzapay' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
		echo '</h3>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Add block checkout support
	 *
	 * @return void
	 */
	public function block_support(): void {
		if ( class_exists( 'Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType' ) ) {
			add_action(
				'woocommerce_blocks_payment_method_type_registration',
				function ( \Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
					$payment_method_registry->register( new CheckoutIntegration() );
				}
			);
		}
	}

	public function add_custom_cart_api_data() {
		woocommerce_store_api_register_endpoint_data(
			array(
				'endpoint'        => CartSchema::IDENTIFIER,
				'namespace'       => 'muzapay',
				'data_callback'   => [ $this, 'custom_cart_api_data' ],
				'schema_callback' => [ $this, 'custom_cart_api_data_callback' ],
				'schema_type'     => ARRAY_A,
			)
		);
	}

	public function custom_cart_api_data() {
		$key = array_search( Gateway::NAME, WC()->payment_gateways()->get_payment_gateway_ids() );
		if ( ! $key ) {
			return [];
		}

		$gateway = WC()->payment_gateways()->payment_gateways()[ Gateway::NAME ];


		return [
			'has_mixed_categories'    => $gateway->has_mixed_categories(),
			'mixed_categories_notice' => $gateway->mixed_categories_notice,
		];
	}

	public function custom_cart_api_data_callback() {
		return [
			'has_mixed_categories'    => [
				'description' => __( 'Has mixed MúzaPay categories', 'muzapay' ),
				'type'        => 'bool',
				'readonly'    => true,
			],
			'mixed_categories_notice' => [
				'description' => __( 'Mixed MúzaPay categories notice', 'muzapay' ),
				'type'        => 'string',
				'readonly'    => true,
			],
		];
	}

	public function enqueue_scripts() {
		$this->asset_factory->wp_script(
			$this->utils->get_plugin_path( 'build/checkout.js' ),
			[
				'handle'       => 'muzapay-gateway-checkout',
				'in_footer'    => true,
				'dependencies' => [ 'wc-cart-block-frontend' ],
			]
		);
	}

	public function schedule_payment_status_hook() {
		if ( ! function_exists( 'as_schedule_recurring_action' ) ) {
			return;
		}

		if ( as_next_scheduled_action( 'check_muzapay_payment_status' ) ) {
			return;
		}

		as_schedule_recurring_action( time(), HOUR_IN_SECONDS, 'check_muzapay_payment_status' );
	}

	public function check_muzapay_payment_status() {
		$args = [
			'payment_method' => Gateway::NAME,
			'status'         => [ 'pending', 'on-hold' ],
			'limit'          => - 1,
			'date_created'   => '<=' . wp_date( 'Y-m-d H:i:s', strtotime( '-7 days' ) ),
		];

		$orders = wc_get_orders( $args );
		foreach ( $orders as $order ) {
			$this->verify_payment_status( $order->get_id() );
		}
	}

	public function verify_payment_status( int $order_id ) {
		$order = $this->order_repository->get( $order_id );

		$wc_order = $order->wc_order;
		$gateways = WC()->payment_gateways()->payment_gateways();
		/** @var Gateway $gateway */
		$gateway = ! empty( $gateways['muzapay'] ) ? $gateways['muzapay'] : null;

		if ( ! $gateway ) { // Gateway not active
			$this->log->error( 'Gateway not active', [ 'order_id' => $order_id ] );

			return new \WP_Error( 'gateway_not_active', __( 'Gateway not active', 'muzapay' ) );
		}

		try {
			$token = $gateway->get_token();
		} catch ( ApiException $e ) {
			$this->log->error( 'Auth error', [ 'order_id' => $order_id, 'error' => $e->getMessage() ] );

			return new \WP_Error( 'auth_error', __( 'Auth error', 'muzapay' ) );
		}

		$signature     = $gateway->sign_string( $order->muzapay_payment_id );
		$payment_state = $gateway->get_payment_api( $token )->getPaymentState( $order->muzapay_payment_id, $signature );
		if ( $payment_state->getOrderReferenceCode() !== $wc_order->get_order_number() ) {
			return new \WP_Error( 'order_reference_code_mismatch', __( 'Order reference code mismatch', 'muzapay' ) );
		}

		$payment_state = $payment_state->getPaymentState();

		if ( PaymentStateResponse::PAYMENT_STATE_PAID === $payment_state ) {
			if ( $gateway->status_successful_payment ) {
				$wc_order->update_status( $gateway->status_successful_payment, __( 'Order status changed by MúzaPay payment hook', 'muzapay' ) );
				$this->log->info( 'Order status switched', [ 'order_id' => $order_id, 'payment_status' => $payment_state, 'new_order_status' => $gateway->status_successful_payment ] );
			}
		} elseif ( PaymentStateResponse::PAYMENT_STATE_CANCELED === $payment_state || PaymentStateResponse::PAYMENT_STATE_DECLINED === $payment_state || PaymentStateResponse::PAYMENT_STATE_EXPIRED === $payment_state ) {
			$wc_order->update_status( 'failed', __( 'Order status changed by MúzaPay payment hook', 'muzapay' ) );
			$this->log->info( 'Order status switched', [ 'order_id' => $order_id, 'payment_status' => $payment_state, 'new_order_status' => 'failed' ] );
		} else {
			$wc_order->add_order_note( __( 'MúzaPay payment status:', 'muzapay' ) . ' ' . $payment_state );
			$wc_order->update_status( 'pending', __( 'Order status changed by MúzaPay payment hook', 'muzapay' ) );
			$this->log->notice( 'Order payment failed', [ 'order_id' => $order_id, 'payment_status' => $payment_state ] );
		}

		return $payment_state;
	}
}
