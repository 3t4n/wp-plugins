<?php

namespace MuzaPay\Api;

use MuzaPay\Features\Woocommerce;
use MuzaPayDeps\BenefitPlusGatewaySdk\ApiException;
use MuzaPayDeps\BenefitPlusGatewaySdk\Model\PaymentStateResponse;
use WP_REST_Controller;
use WP_REST_Request;
use WP_REST_Server;
use MuzaPay\Managers\ApiManager;
use MuzaPay\Models\OrderModel;
use MuzaPay\Repositories\OrderRepository;
use MuzaPayDeps\Wpify\Log\RotatingFileLog;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class MuzaPayApi extends WP_REST_Controller {

	public function __construct(
		private OrderRepository $order_repository,
		private RotatingFileLog $log,
		private Woocommerce $woocommerce
	) {
		add_action( 'rest_api_init', [ $this, 'register_routes' ] );
	}


	/**
	 * Register the routes for the objects of the controller.
	 */
	public function register_routes() {
		register_rest_route(
			ApiManager::PATH,
			'validate-order/(?P<id>\d+)',
			array(
				array(
					'methods'             => WP_REST_Server::READABLE,
					'callback'            => array( $this, 'validate_order' ),
					'permission_callback' => '__return_true',
				),
			)
		);
	}

	/**
	 * Add box to cart
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 */
	public function validate_order( WP_REST_Request $request ) {
		$payment_id = $request->get_param( 'paymentId' );
		$order_id   = $request->get_param( 'id' );
		$this->log->info( 'Validate order request received', [ 'order_id' => $order_id ] );
		/** @var OrderModel $order */
		$order = $this->order_repository->get( $order_id );

		if ( ! $order ) {
			$this->log->error( 'Order not found', [ 'order_id' => $order_id ] );
			wp_safe_redirect( site_url() );
			exit();
		}
		$wc_order = $order->wc_order;

		$result = $this->woocommerce->verify_payment_status( $order_id, $payment_id );

		if ( is_wp_error( $result ) ) {
			wp_safe_redirect( $wc_order->get_checkout_order_received_url() );
			exit();
		}

		wp_safe_redirect( $wc_order->get_checkout_order_received_url() );
		exit();
	}


	/**
	 * Check if a given request has access to create items
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 *
	 * @return bool
	 */
	public function create_item_permissions_check( $request ) {
		return true;
	}


	/**
	 * Prepare the item for the REST response
	 *
	 * @param mixed           $item    WordPress representation of the item.
	 * @param WP_REST_Request $request Request object.
	 *
	 * @return mixed
	 */
	public function prepare_item_for_response( $item, $request ) {
		return array();
	}
}
