<?php
/**
 * Faire Orders.
 *
 * @package  FAIRE
 */

namespace Faire\Wc\Faire;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Faire Orders.
 */
class Order {

	/**
	 * Faire order data
	 *
	 * @var object
	 */
	protected object $order_data;

	/**
	 * Class constructor.
	 *
	 * @param object $order_data Faire order data.
	 */
	public function __construct( object $order_data ) {
		$this->order_data = $order_data;
	}

	/**
	 * Retrieves the Faire order ID.
	 *
	 * @return string The Faire order ID.
	 */
	public function get_id(): string {
		return $this->order_data->id;
	}

	/**
	 * Retrieves the Faire order status.
	 *
	 * @return string The Faire order status.
	 */
	public function get_state(): string {
		return $this->order_data->state;
	}

	/**
	 * Retrieves the Faire order items.
	 *
	 * @return array The Faire order items.
	 */
	public function get_items(): array {
		return $this->order_data->items;
	}

	/**
	 * Retrieves the Faire order address.
	 *
	 * @return object The Faire order address.
	 */
	public function get_address(): object {
		return $this->order_data->address;
	}

	/**
	 * Checks if an order was already synced.
	 *
	 * @param array $synced_orders List of synced orders.
	 *
	 * @return bool True if the order was synced.
	 */
	public function check_was_synced( array $synced_orders ): bool {
		return isset( array_flip( $synced_orders )[ $this->order_data->id ] );
	}

}
