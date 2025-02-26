<?php

/**
 * The customer specifics of the plugin.
 *
 * @package    ReachoWooCommerce
 * @subpackage ReachoWooCommerce/public
 * @author     Reacho <support@reacho.com>
 */
class Reacho_WooCommerce_Customer {

	/**
	 * @var Reacho_WooCommerce_API_Wrapper $reacho_api
	 */
	private $reacho_api;

	public function __construct() {
		$this->reacho_api = new Reacho_WooCommerce_API_Wrapper();
	}

	/**
	 * Execute when user creates account in WooCommerce
	 *
	 * @param int $customer_id WooCommerce UserId.
	 * @param array $properties Customer properties
	 *
	 * @return void
	 */
	public function reachowc_on_customer_created( $customer_id, $properties ) {
		$this->reacho_api->trigger_event( 'customer.created', [
			'customer_id' => $customer_id,
			'properties'  => $properties
		] );
	}

	/**
	 * Execute when user creates updates account in WooCommerce
	 *
	 * @param int $customer WooCommerce Customer.
	 * @param array $updatedProps Updated properties
	 *
	 * @return void
	 */
	public function reachowc_on_customer_updated( $customer, $updatedProps ) {
		$this->reacho_api->trigger_event( 'customer.updated', [
			'customer'     => $customer,
			'updatedProps' => $updatedProps
		] );
	}
}