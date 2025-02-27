<?php
namespace WcGetnet\WooCommerce;

use CoffeeCode\WPEmerge\ServiceProviders\ServiceProviderInterface;
use Automattic\WooCommerce\Internal\DataStores\Orders\CustomOrdersTableController;
use Automattic\WooCommerce\Utilities\OrderUtil;

/**
 * Register Gateway.
 */
class WcGetnetLogsProvider implements ServiceProviderInterface {
	/**
	 * {@inheritDoc}
	 */
	public function register( $container ) {
		// Nothing to register.
	}

	/**
	 * {@inheritDoc}
	 */
	public function bootstrap( $container ) {
		add_action( 'add_meta_boxes', [ $this, 'admin_order_custom_metabox' ] );
	}

	public function getScreen() {
		return wc_get_container()->get( CustomOrdersTableController::class )->custom_orders_table_usage_is_enabled()
			? wc_get_page_screen_id( 'shop-order' )
			: 'shop_order';
	}

	public function admin_order_custom_metabox() {
		add_meta_box(
			'getnet_logs',
			__( 'Getnet: Logs da Transação', 'textdomain' ),
			[ $this, 'custom_gnt_logs_metabox' ],
			$this->getScreen(),
			'normal',
			'core'
		);
	}

	public function get_transaction_auth_request( $order ) {
		return $order->get_meta( '_getnet_transaction_auth_request', true );
	}

	public function get_transaction_auth_response( $order ) {
		return $order->get_meta( '_getnet_transaction_auth_response', true );
	}

	public function get_transaction_header( $order ) {
		return $order->get_meta( '_getnet_transaction_header', true );
	}

	public function get_transaction_endpoint( $order ) {
		return $order->get_meta( '_getnet_transaction_endpoint', true );
	}

	public function get_request_log( $order ) {
		return $order->get_meta( '_getnet_request', true );
	}

	public function get_response_log( $order ) {
		return $order->get_meta( '_getnet_response', true );
	}

	public function custom_gnt_logs_metabox( $post ) {
		$postId = OrderUtil::custom_orders_table_usage_is_enabled() ? $post->get_id() : $post->ID;
		$order  = wc_get_order( $postId );

		$auth_request  = $this->get_transaction_auth_request( $order );
		$auth_response = $this->get_transaction_auth_response( $order );
		$headers       = $this->get_transaction_header( $order );
		$endpoint      = $this->get_transaction_endpoint( $order );
		$request       = $this->get_request_log( $order );
		$response      = $this->get_response_log( $order );

		$auth_request_json  = ! empty( $auth_request ) ? htmlspecialchars(sanitize_textarea_field(json_encode($auth_request, JSON_PRETTY_PRINT), ENT_QUOTES, 'UTF-8')) : '';
		$auth_response_json = htmlspecialchars(sanitize_textarea_field(json_encode($auth_response, JSON_PRETTY_PRINT), ENT_QUOTES, 'UTF-8'));
		$headers_json       = ! empty( $headers ) ? htmlspecialchars(sanitize_textarea_field(json_encode($headers, JSON_PRETTY_PRINT)), ENT_QUOTES, 'UTF-8') : '';
		$endpoint_json      = htmlspecialchars(sanitize_textarea_field($endpoint), ENT_QUOTES, 'UTF-8');
		$request_json       = htmlspecialchars(sanitize_textarea_field(json_encode($request, JSON_PRETTY_PRINT)), ENT_QUOTES, 'UTF-8');
		$response_json      = htmlspecialchars(sanitize_textarea_field(json_encode($response, JSON_PRETTY_PRINT)), ENT_QUOTES, 'UTF-8');

		\WcGetnet::render('partials/orders/page-logs', compact( 'auth_request_json', 'auth_response_json','headers_json', 'endpoint_json', 'request_json', 'response_json' ));
	}
}






