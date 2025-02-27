<?php
/**
 * This small utility class imports data from EDD Database tables to
 * a custom lookup table for fast reporting
 *
 * @package     EDD_Enhanced_Sales_Reports\EDD_Enhanced_Sales_Reports_Migration
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'EDD_Enhanced_Sales_Reports_Migration' ) ) {

	/**
	 * EDD_Enhanced_Sales_Reports_Migration class to help migrate existing
	 * order data in lookup table
	 *
	 * @since       1.0.0
	 */
	class EDD_Enhanced_Sales_Reports_Migration {
		/**
		 * Constructor for Class, does nothing at the moment
		 *
		 * @return void
		 */
		public function __construct() {

		}

		/**
		 * Creates required database tables if they are not already present.
		 *
		 * @param array[] $order_ids Ids of the orders which are to be populated in lookup table.
		 */
		public function migrate_edd_orders_to_lookup( $order_ids = array() ) {
			global $wpdb;

			$lookup_table        = $wpdb->prefix . 'enhanced_sales_report';
			$edd_orders_table    = $wpdb->prefix . 'edd_orders';
			$edd_orders_items    = $wpdb->prefix . 'edd_order_items';
			$edd_addresses_table = $wpdb->prefix . 'edd_order_addresses';

			$query = "SELECT *
				FROM {$edd_orders_table}
				WHERE id NOT IN (SELECT order_id FROM {$lookup_table}) AND status <> 'refunded' AND type <> 'refund'";

			if ( ! empty( $order_ids ) ) {

				foreach ( $order_ids as &$order_id ) {
					$order_id  = intval( $order_id );
				}

				$query .= ' AND id IN (' . implode( ',', $order_ids ) . ')';
			}

			// $order_ids are typecasted to integers above.
			$orders_to_migrate = $wpdb->get_results( $query ); // phpcs:ignore

			if ( empty( $orders_to_migrate ) ) {
				return false;
			}

			$order_ids = array();
			foreach ( $orders_to_migrate as $order_row ) {
				$order_ids[] = intval( $order_row->id );
			}

			$items_query = "SELECT * FROM {$edd_orders_items} WHERE order_id IN ( " . implode( ',', $order_ids ) . ' )';

			// $order_ids are typecasted to integers above.
			$items_data  = $wpdb->get_results( $items_query ); // phpcs:ignore
			$order_items = array();

			$product_ids = array();

			foreach ( $items_data as $order_item_row ) {
				if ( ! isset( $order_items[ $order_item_row->order_id ] ) ) {
					$order_items[ $order_item_row->order_id ] = array();
				}
				$order_items[ $order_item_row->order_id ][] = $order_item_row;

				$product_ids[] = intval( $order_item_row->product_id );
			}

			$product_ids   = array_unique( $product_ids );
			$authors_query = "SELECT ID, post_author FROM {$wpdb->posts} WHERE ID IN (" . implode( ',', $product_ids ) . ')';

			// $product_ids are typecasted to integers above.
			$authors_data  = $wpdb->get_results( $authors_query ); // phpcs:ignore

			$author_ids = array();

			foreach ( $authors_data as $author_row ) {
				$author_ids[ $author_row->ID ] = $author_row->post_author;
			}

			$commissions = array();

			if ( EDD_ENHANCED_SALES_REPORTS_COMMISSIONS_ACTIVE ) {
				$commissions_query = "SELECT amount, payment_id, download_id, price_id FROM {$wpdb->prefix}edd_commissions WHERE payment_id IN (" . implode( ',', $order_ids ) . ')';

				// $order_ids is already typecasted to integers.
				$commissions_data  = $wpdb->get_results( $commissions_query ); // phpcs:ignore

				foreach ( $commissions_data as $commission_row ) {
					$commissions[ $commission_row->payment_id . '.' . $commission_row->download_id . '.' . intval( $commission_row->price_id ) ] = $commission_row->amount;
				}
			}

			// prepare addresses.
			$order_addresses_query = "SELECT * FROM {$edd_addresses_table} WHERE order_id IN (" . implode( ',', $order_ids ) . ' )';

			// $order_ids is already typecasted to integers.
			$addresses_data        = $wpdb->get_results( $order_addresses_query ); // phpcs:ignore
			$order_addresses       = array();

			foreach ( $addresses_data as $address_row ) {
				if ( ! isset( $order_addresses[ $address_row->order_id ] ) ) {
					$order_addresses[ $address_row->order_id ] = array();
				}
				$order_addresses[ $address_row->order_id ][] = $address_row;
			}

			$insert_query_col_names = array(
				'order_id',
				'order_number',
				'subscription_id',
				'user_id',
				'customer_id',
				'type',
				'email',
				'order_date',
				'gateway',
				'transaction_id',
				'sub_total',
				'discount',
				'tax',
				'total',
				'author_id',
				'is_existing_customer',
				'order_item_id',
				'product_id',
				'product_name',
				'product_quantity',
				'product_amount',
				'product_sub_total',
				'product_discount',
				'product_tax',
				'product_total',
				'billing_country',
				'billing_state',
				'commission',
			);

			$insert_query = '';
			$insertions   = 0;
			foreach ( $orders_to_migrate as $order_row ) {

				// Only allow complete orders to be saved.
				if ( 'complete' !== $order_row->status && 'edd_subscription' !== $order_row->status ) {
					continue;
				}

				$is_existing_customer = 1;

				$billing_address = array(
					'billing_country' => '',
					'billing_state '  => '',
				);

				$shipping_address = array();
				$first_name       = '';
				$last_name        = '';
				$country          = '';

				if ( isset( $order_addresses[ $order_row->id ] ) ) {
					foreach ( $order_addresses[ $order_row->id ] as $address ) {
						if ( 'billing' == $address->type ) {
							$billing_address['billing_state']   = $address->region;
							$billing_address['billing_country'] = $address->country;

						}

						if ( empty( $first_name ) ) {
							$name_parts = explode( ' ', $address->name );
							$first_name = array_shift( $name_parts );
							if ( ! empty( $name_parts ) ) {
								$last_name = implode( ' ', $name_parts );
							}
						}
						if ( empty( $country ) ) {
							$country = $address->country;
						}
					} // end foreach, addresses.
				}

				// If shipping address was not prsesent, then use same values as billing.
				if ( empty( $shipping_address ) && ! empty( $billing_address ) ) {
					foreach ( $billing_address as $address_key => $address_value ) {
						$shipping_address[ str_replace( 'billing', 'shipping', $address_key ) ] = $address_value;
					}
				}

				foreach ( $order_items[ $order_row->id ] as $order_item ) {

					$subscription_id = ( 'edd_subscription' == $order_row->status ? $order_row->parent : 0 );

					$commission_amount = 0;

					if ( isset( $commissions[ $order_row->id . '.' . $order_item->product_id . '.' . intval( $order_item->price_id ) ] ) ) {
						$commission_amount = $commissions[ $order_row->id . '.' . $order_item->product_id . '.' . intval( $order_item->price_id ) ];
					}

					if ( ! isset( $billing_address['billing_country'] ) ) {
						$billing_address['billing_country'] = '';
					}

					if ( ! isset( $billing_address['billing_state'] ) ) {
						$billing_address['billing_state'] = '';
					}

					$row = array(
						(int) $order_row->id,
						"'" . esc_sql( str_replace( "'", "\'", $order_row->order_number ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $subscription_id ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $order_row->user_id ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $order_row->customer_id ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $order_row->type ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $order_row->email ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $order_row->date_created ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $order_row->gateway ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", '' ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $order_row->subtotal ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $order_row->discount ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $order_row->tax ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $order_row->total ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $author_ids[ $order_item->product_id ] ) ) . "'",
						'1',
						"'" . esc_sql( str_replace( "'", "\'", $order_item->id ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $order_item->product_id ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $order_item->product_name ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $order_item->quantity ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $order_item->amount ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $order_item->subtotal ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $order_item->discount ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $order_item->tax ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $order_item->total ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $billing_address['billing_country'] ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $billing_address['billing_state'] ) ) . "'",
						"'" . esc_sql( str_replace( "'", "\'", $commission_amount ) ) . "'",
					);

					$insert_query .= '(' . implode( ',', $row ) . '),';

					$insertions ++;

					// Insert chunks of 50 rows.
					if ( 0 === $insertions % 50 && ! empty( $insert_query ) ) {
						$insert_query = "INSERT INTO {$lookup_table}(" . implode( ',', $insert_query_col_names ) . ') VALUES ' . $insert_query;
						$insert_query = rtrim( $insert_query, ',' );

						// all fields are individually sanitized above.
						$wpdb->query( $insert_query ); // phpcs:ignore

						$insert_query = '';
					}
				}
			} // end foreach, orders.
			if ( ! empty( $insert_query ) ) {
				$insert_query = rtrim( $insert_query, ',' );
				$insert_query = "INSERT INTO {$lookup_table}(" . implode( ',', $insert_query_col_names ) . ') VALUES ' . $insert_query;

				// All Fields are individuall sanitized.
				$wpdb->query( $insert_query ); // phpcs:ignore
			}

			// Make first order of every customer a new_customer one.
			$wpdb->query( "UPDATE {$wpdb->prefix}enhanced_sales_report SET is_existing_customer=0 WHERE order_id IN (SELECT MIN(order_id) FROM {$wpdb->prefix}enhanced_sales_report GROUP BY user_id)" );
		}

	}
}
