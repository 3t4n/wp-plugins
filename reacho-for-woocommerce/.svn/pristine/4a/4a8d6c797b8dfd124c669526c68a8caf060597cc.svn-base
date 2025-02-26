<?php

/**
 * The order specifics of the plugin.
 *
 * @package    ReachoWooCommerce
 * @subpackage ReachoWooCommerce/public
 * @author     Reacho <support@reacho.com>
 */
class Reacho_WooCommerce_Order {

	/**
	 * @var Reacho_WooCommerce_API_Wrapper $reacho_api
	 */
	private $reacho_api;

	public function __construct() {
		$this->reacho_api = new Reacho_WooCommerce_API_Wrapper();
	}

	/**
	 * Execute when order is created in WooCommerce
	 *
	 * @param array $order WooCommerce Order.
	 *
	 * @return void
	 */
	public function reachowc_on_order_created( $order ) {
		$this->reacho_api->trigger_event( 'order.created', [
			'order' => $order
		] );
	}

	/**
	 * Execute when user creates updates account in WooCommerce
	 *
	 * @param $order_id
	 * @param $previous_status
	 * @param $current_status
	 *
	 * @return void
	 */
	public function reachowc_on_order_status_changed( $order_id, $previous_status, $current_status ) {

		$this->reacho_api->trigger_event( 'order_status.updated', [
			'order_id'        => $order_id,
			'previous_status' => $previous_status,
			'current_status'  => $current_status
		] );
	}
}