<?php
/**
 * Contains the stock reservation class.
 *
 * @package GetPaid
 * @subpackage Item Inventory
 * @version 1.0.0
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Stock Reservation class.
 *
 * @package GetPaid
 * @subpackage Item Inventory
 * @version 1.0.0
 * @since   1.0.0
 */
class GetPaid_Item_Inventory_Helper {

	/**
	 * Query for any existing holds on stock for this item.
	 *
	 * @param int        $item_id Item to get reserved stock for.
	 * @param integer    $exclude_invoice_id Optional invoice to exclude from the results.
	 *
	 * @return integer Amount of stock already reserved.
	 */
	public function get_reserved_stock( $item_id, $exclude_invoice_id = 0 ) {
		global $wpdb;

		return (int) $wpdb->get_var( $this->get_query_for_reserved_stock( $item_id, $exclude_invoice_id ) );
	}

	/**
	 * Put a temporary hold on stock for an invoice if enough is available.
	 *
	 * @throws Exception If stock cannot be reserved.
	 *
	 * @param WPInv_Invoice $invoice Invoice object.
	 * @param int       $minutes How long to reserve stock in minutes. Defaults to wpinv_get_option( 'hold_stock_minutes' ).
	 */
	public function reserve_stock_for_invoice( $invoice, $minutes = 0 ) {
		$minutes = $minutes ? $minutes : (int) wpinv_get_option( 'hold_stock_minutes', 24 * MINUTE_IN_SECONDS );

		if ( empty( $minutes ) ) {
			return;
		}

		try {

			$this->release_stock_for_invoice( $invoice );

			foreach ( $invoice->get_items() as $item ) {

				// If stock management is off, no need to reserve any stock here.
				if ( ! $this->manage_stock( $item->get_id() ) || $this->backorders_allowed( $item->get_id() ) ) {
					continue;
				}

				if ( ! $this->is_in_stock( $item->get_id() ) ) {

					throw new Exception(
						sprintf(
							/* translators: %s: item name */
							__( '&quot;%s&quot; is out of stock and cannot be purchased.', 'getpaid-item-inventory' ),
							sanitize_text_field( $item->get_raw_name() )
						)
					);

				}

				$this->reserve_stock_for_item(
					$item->get_id(),
					$item->get_quantity(),
					$invoice,
					$minutes
				);

			}

		} catch ( Exception $e ) {
			$this->release_stock_for_invoice( $invoice );
			throw $e;
		}

	}

	/**
	 * Release a temporary hold on stock for an invoice.
	 *
	 * @param WPInv_Invoice|int $invoice Invoice ID or object.
	 */
	public function release_stock_for_invoice( $invoice ) {
		global $wpdb;

		$invoice = $invoice instanceof WPInv_Invoice ? $invoice->get_id() : $invoice;
		$wpdb->delete(
			$wpdb->prefix . 'getpaid_reserved_stock',
			array(
				'invoice_id' => (int) $invoice,
			)
		);

	}

	/**
	 * Reserve stock for an item by inserting rows into the DB.
	 *
	 * @throws Exception If a row cannot be inserted.
	 *
	 * @param int           $item_id Item ID which is having stock reserved.
	 * @param int           $stock_quantity Stock amount to reserve.
	 * @param WPInv_Invoice $invoice Invoice object which contains the item.
	 * @param int           $minutes How long to reserve stock in minutes.
	 */
	private function reserve_stock_for_item( $item_id, $stock_quantity, $invoice, $minutes ) {
		global $wpdb;

		$query_for_stock          = $this->get_query_for_stock( $item_id );
		$query_for_reserved_stock = $this->get_query_for_reserved_stock( $item_id, $invoice->get_id() );
		$table                    = $wpdb->prefix . 'getpaid_reserved_stock';

		$result = $wpdb->query(
			$wpdb->prepare(
				"
				INSERT INTO $table ( `invoice_id`, `item_id`, `stock_quantity`, `timestamp`, `expires` )
				SELECT %d, %d, %d, NOW(), ( NOW() + INTERVAL %d MINUTE ) FROM DUAL
				WHERE ( $query_for_stock FOR UPDATE ) - ( $query_for_reserved_stock FOR UPDATE ) >= %d
				ON DUPLICATE KEY UPDATE `expires` = VALUES( `expires` ), `stock_quantity` = VALUES( `stock_quantity` )
				",
				$invoice->get_id(),
				$item_id,
				$stock_quantity,
				$minutes,
				$stock_quantity
			)
		);

		if ( ! $result ) {

			$item = new WPInv_Item( $item_id );
			throw new Exception(
				sprintf(
					/* translators: %s: item name */
					__( 'Not enough units of %s are available in stock to fulfil this order.', 'getpaid-item-inventory' ),
					$item->exists() ? sanitize_text_field( $item->get_name() ) : '#' . (int) $item_id
				)
			);

		}

	}

	/**
	 * Returns query statement for getting reserved stock of an item.
	 *
	 * @param int     $item_id Item ID.
	 * @param integer $exclude_invoice_id Optional invoice to exclude from the results.
	 * @return string|void Query statement.
	 */
	private function get_query_for_reserved_stock( $item_id, $exclude_invoice_id = 0 ) {
		global $wpdb;

		$table = $wpdb->prefix . 'getpaid_reserved_stock';
		return $wpdb->prepare(
			"
			SELECT COALESCE( SUM( stock_table.`stock_quantity` ), 0 ) FROM $table stock_table
			LEFT JOIN $wpdb->posts posts ON stock_table.`invoice_id` = posts.ID
			WHERE posts.post_status = 'wpi-pending'
			AND stock_table.`expires` > NOW()
			AND stock_table.`item_id` = %d
			AND stock_table.`invoice_id` != %d
			",
			$item_id,
			$exclude_invoice_id
		);

	}

	/**
	 * Returns query statement for getting current `_stock` of an item.
	 *
	 * @internal MAX function below is used to make sure result is a scalar.
	 * @param int $item_id Item ID.
	 * @return string|void — Sanitized query string.
	 */
	public function get_query_for_stock( $item_id ) {
		global $wpdb;

		return $wpdb->prepare(
			"
			SELECT COALESCE ( MAX( meta_value ), 0 ) FROM $wpdb->postmeta as meta_table
			WHERE meta_table.meta_key = '_stock'
			AND meta_table.post_id = %d
			",
			$item_id
		);

	}

	/**
	 * Return the stock status.
	 *
	 * @since  1.0.0
	 * @param  int $item_id Item id.
	 * @return string
	 */
	public function get_stock_status( $item_id ) {

		$threshold = (int) wpinv_get_option( 'no_threshold', 0 );
		if ( ! $this->manage_stock( $item_id ) || $threshold < $this->available_stock( $item_id ) ) {
			return 'instock';
		}

		if ( $this->backorders_allowed( $item_id ) ) {
			return 'onbackorder';
		}

		return 'outofstock';
	}

	/**
	 * Returns whether or not the item can be purchased.
	 * This returns true for 'instock' and 'onbackorder' stock statuses.
	 *
	 * @param  int $item_id Item id.
	 * @return bool
	 */
	public function is_in_stock( $item_id ) {
		return apply_filters( 'getpaid_item_is_in_stock', 'outofstock' !== $this->get_stock_status( $item_id ), $item_id );
	}

	/**
	 * Checks whether backorders are allowed.
	 *
	 * @param  int $item_id Item id.
	 * @since  1.0.0
	 * @return bool
	 */
	public function backorders_allowed( $item_id ) {

		$backorders_allowed = wpinv_get_option( 'allow_backorders', 0 );
		return apply_filters( 'getpaid_item_backorders_allowed', ! empty( $backorders_allowed ), $item_id );

	}

	/**
	 * Retrieves the backorders threshold.
	 *
	 * @param  int $item_id Item id.
	 * @since  1.0.0
	 * @return int|false
	 */
	public function backorder_threshold( $item_id ) {

		$backorder_threshold = wpinv_get_option( 'backorder_threshold', 0 );
		$backorder_threshold = apply_filters( 'getpaid_item_backorder_threshold', (int) $backorder_threshold, $item_id );
		return empty( $backorder_threshold ) ? false : $backorder_threshold;

	}

	/**
	 * Get low stock amount.
	 *
	 * @param  int $item_id Item id.
	 * @since  1.0.0
	 * @return int
	 */
	public function get_low_stock_amount( $item_id ) {
		$low_stock_amount = (int) wpinv_get_option( 'low_threshold', 5 );
		return apply_filters( 'getpaid_item_low_stock_amount', $low_stock_amount, $item_id );
	}

	/**
	 * Checks if an item is low on stock.
	 *
	 * @param  int $item_id Item id.
	 * @since  1.0.0
	 * @return bool
	 */
	public function has_low_stock( $item_id ) {
		$has_low_stock = $this->manage_stock( $item_id ) && ! ( $this->get_stock_quantity( $item_id ) > $this->get_low_stock_amount( $item_id ) );
		return apply_filters( 'getpaid_item_has_low_stock', $has_low_stock, $item_id );
	}

	/**
	 * Checks if an item's stock should be managed.
	 *
	 * @param  int $item_id Item id.
	 * @since  1.0.0
	 * @return bool
	 */
	public function manage_stock( $item_id ) {
		$stock_quantity = $this->get_stock_quantity( $item_id );
		$manage_stock   = ! is_null( $stock_quantity ) && GetPaid_Item_Inventory::is_enabled();
		return apply_filters( 'getpaid_item_manage_stock', $manage_stock, $item_id );
	}

	/**
	 * Retrieves the available items in stock.
	 *
	 * @param  int $item_id Item id.
	 * @since  1.0.0
	 * @return null|int
	 */
	public function get_stock_quantity( $item_id ) {
		$quantity = get_post_meta( $item_id, '_stock', true );

		if ( false === $quantity || '' === $quantity ) {
			$quantity = null;
		} else {
			$quantity = (int) $quantity;
		}

		return apply_filters( 'getpaid_item_stock_quantity', $quantity, $item_id );

	}

	/**
	 * Returns the available stock minus the held stock.
	 *
	 * @param int $item_id
	 * @param int $exclude_invoice
	 * @return int|null
	 */
	public function available_stock( $item_id, $exclude_invoice = 0 ) {

		// Abort early if we're not managing stock or backorders are allowed.
		if ( ! $this->manage_stock( $item_id ) ) {
			return null;
		}

		$reserved_stock = $this->get_reserved_stock( $item_id, $exclude_invoice );
		$availble_stock = $this->get_stock_quantity( $item_id ) - $reserved_stock;

		return max( $availble_stock, 0 );

	}

}
