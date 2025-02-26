<?php
/**
 * Class for handling the JSON API related mapping.
 *
 * @package     easy-digital-downloads-putler-connector/classes/
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Putler_EDD_Connector_JSON' ) ) {

	/**
	 * Class Putler_EDD_Connector_JSON
	 */
	class Putler_EDD_Connector_JSON {
		/**
		 * Save request param for future use
		 *
		 * @var array $params stores request params.
		 */
		private $params;

		/**
		 * To avoid duplication of subscription created meta. save those processed ids in class object.
		 *
		 * @var array $processed_created_subscriptions ids of subscriptions.
		 */
		private static $processed_created_subscriptions = array();

		/**
		 * To avoid duplication of subscription meta. save those processed ids in class object.
		 *
		 * @var array $processed_meta_subscriptions ids of subscriptions.
		 */
		private static $processed_meta_subscriptions = array();

		/**
		 * In EDD_Payment class, it does not contain modified_date. So to solve this, we are saving the modified date
		 *
		 * @var array
		 */
		private static $order_modified_dates = array();

		/**
		 * Class Putler_EDD_Connector_JSON constructor
		 */
		public function __construct() {
			$this->init_hooks();
		}

		/**
		 * Set params constructor
		 *
		 * @param array $params params required to fetch data.
		 */
		public function set_params( $params = array() ) {
			$this->params = $params;
		}

		/**
		 * Init all the hooks to handle delete of orders and subscriptions
		 *
		 * @return void
		 */
		public function init_hooks() {
			if ( is_admin() ) {
				add_action( 'edd_pre_destroy_order', array( $this, 'delete_order' ) ); // EDD 3.X.
				add_action( 'edd_payment_delete', array( $this, 'delete_order' ) ); // EDD 2.X.
				add_action( 'edd_subscription_post_add_note', array( $this, 'subscription_post_add_note' ), 10, 3 );
				// For subscription delete, there is no useful hooks to handle delete.
				add_action( 'admin_init', array( $this, 'delete_subscription' ), 1 );
				add_action( 'admin_init', array( $this, 'do_database_update' ) );
			}
		}

		/**
		 * Save modified time of the subscription.
		 *
		 * @param string $notes All notes.
		 * @param string $new_note New note.
		 * @param int    $id subscription id.
		 *
		 * @return void
		 */
		public function subscription_post_add_note( $notes = '', $new_note = '', $id = 0 ) {
			global $wpdb;
			if ( empty( $id ) ) {
				return;
			}
			$current_time = time();
			$wpdb->query( $wpdb->prepare( "INSERT INTO {$wpdb->prefix}eddpc_subscription (subscription_id, modified_time) VALUES(%d, %d) ON DUPLICATE KEY UPDATE modified_time=%d", intval( $id ), $current_time, $current_time ) ); // WPCS: cache ok, db call ok.
		}

		/**
		 * Do db update
		 *
		 * @return void
		 */
		public function do_database_update() {
			if ( 'no' === get_option( '_eddpc_subscription_table_created', 'no' ) ) {
				$db_handler = new Putler_EDD_Connector_DB();
				$db_handler->do_db_update();
			}
		}

		/**
		 * Store the deleted subscriptions into the transient
		 *
		 * @return void
		 */
		public function delete_subscription() {
			if ( ! wp_verify_nonce( ! empty( $_POST['edd-recurring-update-nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['edd-recurring-update-nonce'] ) ) : '', 'edd-recurring-update' ) ) {
				return;
			}
			if ( empty( $_POST['sub_id'] ) || empty( $_POST['edd_delete_subscription'] ) || ! current_user_can( 'edit_shop_payments' ) ) {
				return;
			}
			$sub_id = absint( sanitize_text_field( wp_unslash( $_POST['sub_id'] ) ) );
			if ( empty( $sub_id ) ) {
				return;
			}
			$subscription = $this->get_subscription_order_by_id( $sub_id );
			if ( ! $this->is_subscription_order( $subscription ) ) {
				return;
			}
			$subscription->status  = 'delete';
			$modified_subscription = $this->format_subscription_meta_info( $subscription, true );
			if ( ! empty( $modified_subscription ) ) {
				set_transient( 'eddpc_json_deleted_' . time(), array( $modified_subscription ), ( DAY_IN_SECONDS * 180 ) );
			}
		}

		/**
		 * Delete payment
		 *
		 * @param int $payment_id Payment ID.
		 *
		 * @return void
		 */
		public function delete_order( $payment_id = 0 ) {
			$payment_id = absint( $payment_id );
			if ( empty( $payment_id ) ) {
				return;
			}

			$order = $this->get_order_by_id( $payment_id );
			if ( ! $this->is_payment_order( $order ) ) {
				return;
			}
			$order->status = 'delete';
			$order_details = $this->format_order( $order, true );
			if ( ! empty( $order_details ) ) {
				set_transient( 'eddpc_json_deleted_' . time(), $order_details, ( DAY_IN_SECONDS * 180 ) );
			}

		}


		/**
		 * Get all orders in given time limit.
		 *
		 * @return EDD_Payment[]
		 */
		public function get_orders() {
			try {
				global $wpdb;
				// If no EDD, then return empty.
				if ( ! defined( 'EDD_VERSION' ) ) {
					return array();
				}
				$start_date_time = ! empty( $this->params['start_date'] ) ? strtotime( $this->params['start_date'] ) : '';
				$end_date_time   = ! empty( $this->params['end_date'] ) ? strtotime( $this->params['end_date'] ) : '';
				$request_type    = ! empty( $this->params['type'] ) ? strtolower( $this->params['type'] ) : 'history';
				// If start time or end time is not found, then no need to proceed further.
				if ( empty( $start_date_time ) || empty( $end_date_time ) ) {
					return array();
				}
				$all_orders = array();
				$start_date = $this->params['start_date'];
				$end_date   = $this->params['end_date'];
				$offset     = intval( $this->params['offset'] );
				$limit      = intval( $this->params['limit'] );
				// If there is no limit set, then set limit to 100.
				if ( 0 >= $limit ) {
					$limit = 100;
				}
				// Reason for using raw query: In EDD there are some limitations
				// 1. edd_get_payments function return orders only based on created date. It does not return based on modified date. Also there is no option to do that. In our case we need only modified date.
				$payments = array();
				if ( version_compare( '3.0', EDD_VERSION, '<' ) ) {
					if ( 'history' === $request_type ) {
						// For historical import, don't check in the notes.
						$payments = $wpdb->get_results(
							$wpdb->prepare(
								"SELECT order_tbl.id as order_id,order_tbl.date_modified as order_modified,order_tbl.date_modified as note_modified FROM `{$wpdb->prefix}edd_orders` as order_tbl WHERE order_tbl.date_modified BETWEEN %s AND %s LIMIT %d OFFSET %d;",
								array(
									$start_date,
									$end_date,
									$limit,
									$offset,
								)
							),
							OBJECT
						); // WPCS: cache ok, db call ok.
					} else {
						// For refresh import, do check in the notes tables also.
						$payments = $wpdb->get_results(
							$wpdb->prepare(
								"SELECT order_tbl.id as order_id,order_tbl.date_modified as order_modified,MAX(notes_tbl.date_modified) as note_modified FROM `{$wpdb->prefix}edd_orders` as order_tbl INNER JOIN `{$wpdb->prefix}edd_notes` notes_tbl on order_tbl.id = notes_tbl.object_id AND (order_tbl.date_modified BETWEEN %s AND %s OR notes_tbl.date_modified BETWEEN %s AND %s) GROUP BY order_id LIMIT %d OFFSET %d;",
								array(
									$start_date,
									$end_date,
									$start_date,
									$end_date,
									$limit,
									$offset,
								)
							),
							OBJECT
						); // WPCS: cache ok, db call ok.
					}
				} else {
					if ( 'history' === $request_type ) {
						// For historical import, don't check in the comments table.
						$payments = $wpdb->get_results(
							$wpdb->prepare(
								"SELECT order_tbl.id as order_id,order_tbl.post_modified_gmt as order_modified,order_tbl.post_modified_gmt as note_modified FROM `{$wpdb->prefix}posts` as order_tbl WHERE order_tbl.post_type='edd_payment' AND order_tbl.post_modified_gmt BETWEEN %s AND %s LIMIT %d OFFSET %d;",
								array(
									$start_date,
									$end_date,
									$limit,
									$offset,
								)
							),
							OBJECT
						); // WPCS: cache ok, db call ok.
					} else {
						// For refresh import, do check in the comments tables also.
						$payments = $wpdb->get_results(
							$wpdb->prepare(
								"SELECT order_tbl.ID as order_id,order_tbl.post_modified_gmt as order_modified,MAX(notes_tbl.comment_date_gmt) as note_modified FROM `{$wpdb->prefix}posts` as order_tbl INNER JOIN `{$wpdb->prefix}comments` notes_tbl on order_tbl.ID = notes_tbl.comment_post_ID AND order_tbl.post_type='edd_payment' AND (order_tbl.post_modified_gmt BETWEEN %s AND %s OR notes_tbl.comment_date_gmt BETWEEN %s AND %s) GROUP BY order_id LIMIT %d OFFSET %d;",
								array(
									$start_date,
									$end_date,
									$start_date,
									$end_date,
									$limit,
									$offset,
								)
							),
							OBJECT
						); // WPCS: cache ok, db call ok.
					}
				}
				if ( ! empty( $payments ) && is_array( $payments ) ) {
					foreach ( $payments as $payment ) {
						$payment_id = ! empty( $payment->order_id ) ? intval( $payment->order_id ) : 0;
						// If no payment is found or invalid Id, then we don't need to process that payment.
						if ( 0 >= $payment_id ) {
							continue;
						}

						$payment_modified = ! empty( $payment->order_modified ) ? strtotime( $payment->order_modified ) : '';
						$notes_modified   = ! empty( $payment->note_modified ) ? strtotime( $payment->note_modified ) : '';
						if ( empty( $payment_modified ) && empty( $notes_modified ) ) {
							continue;
						}
						if ( empty( $payment_modified ) ) {
							// If there is no payment modified date, then set notes modified date as payment date.
							self::$order_modified_dates[ $payment_id ] = $notes_modified;
						} elseif ( empty( $notes_modified ) ) {
							// If there is no notes modified date, then set payment modified date as payment date.
							self::$order_modified_dates[ $payment_id ] = $payment_modified;
						} else {
							// If both date has value, then compare and set the latest date as payment modified date.
							self::$order_modified_dates[ $payment_id ] = max( $payment_modified, $notes_modified );
						}

						$new_payment = $this->get_order_by_id( $payment_id );
						if ( $this->is_payment_order( $new_payment ) ) {
							$all_orders[] = $new_payment;
						}
					}
				}

				return $all_orders;
			} catch ( Exception $exception ) {
				return array();
			}
		}

		/**
		 * Get payment by ID
		 *
		 * @param numeric $payment_id order id.
		 *
		 * @return EDD_Payment
		 */
		public function get_order_by_id( $payment_id = 0 ) {
			$payment_id = intval( $payment_id );
			if ( 0 >= $payment_id ) {
				return null;
			}
			if ( function_exists( 'edd_get_payment' ) ) {
				$payment = edd_get_payment( $payment_id );
			} elseif ( class_exists( 'EDD_Payment' ) ) {
				$payment = new EDD_Payment( $payment_id );
			} else {
				return null;
			}

			if ( ! $this->is_payment_order( $payment ) ) {
				return null;
			}

			if ( empty( $payment->ID ) ) {
				return null;
			}
			if ( edd_get_option( 'enable_sequential', false ) ) {
				// Backwards Compatibility, needs to set `payment_number` attribute.
				$payment->payment_number = ! empty( $payment->number ) ? $payment->number : 0;
			}

			return $payment;
		}

		/**
		 * Get subscription order by ID
		 *
		 * @param numeric $subscription_id order id.
		 *
		 * @return EDD_Subscription
		 */
		public function get_subscription_order_by_id( $subscription_id = 0 ) {
			$subscription_id = intval( $subscription_id );
			if ( 0 >= $subscription_id ) {
				return null;
			}
			if ( ! class_exists( 'EDD_Subscription' ) ) {
				return null;
			}
			$subscription_payment = new EDD_Subscription( $subscription_id );
			if ( ! $this->is_subscription_order( $subscription_payment ) ) {
				return null;
			}
			if ( empty( $subscription_payment->id ) ) {
				return null;
			}

			return $subscription_payment;
		}

		/**
		 * Convert the order into the Putler's JSON format
		 *
		 * @return array
		 */
		public function get_json_orders() {

			try {
				$orders     = $this->get_orders();
				$all_orders = array();
				if ( ! empty( $orders ) && is_array( $orders ) ) {
					foreach ( $orders as $order ) {
						$formatted_orders = $this->format_order( $order );
						if ( ! empty( $formatted_orders ) && is_array( $formatted_orders ) ) {
							$all_orders = array_merge( $all_orders, $formatted_orders );
						}
					}
				} else {
					$orders = array();
				}

				$modified_subscription = $this->get_modified_subscriptions();
				if ( ! empty( $modified_subscription ) && is_array( $modified_subscription ) ) {
					foreach ( $modified_subscription as $subscription ) {
						$modified_subscription = $this->format_subscription_meta_info( $subscription );
						if ( ! empty( $modified_subscription ) && is_array( $modified_subscription ) ) {
							$all_orders[] = $modified_subscription;
						}
					}
				}

				$deleted_orders = $this->get_deleted_orders_and_subscriptions();
				if ( ! empty( $deleted_orders ) && is_array( $deleted_orders ) ) {
					foreach ( $deleted_orders as $deleted_order ) {
						if ( ! empty( $deleted_order ) && is_array( $deleted_order ) ) {
							$all_orders[] = $deleted_order;
						}
					}
				}

				return array(
					'orders' => $all_orders,
					'count'  => count( $orders ),
					'offset' => ! empty( $this->params['offset'] ) ? intval( $this->params['offset'] ) : 0,
				);
			} catch ( Exception $exception ) {
				return array(
					'orders' => array(),
					'count'  => 0,
					'offset' => ! empty( $this->params['offset'] ) ? intval( $this->params['offset'] ) : 0,
				);
			}
		}

		/**
		 * Get deleted transaction
		 *
		 * @return array
		 */
		public function get_deleted_orders_and_subscriptions() {
			global $wpdb;
			$start_date_time = ! empty( $this->params['start_date'] ) ? strtotime( $this->params['start_date'] ) : '';
			$end_date_time   = ! empty( $this->params['end_date'] ) ? strtotime( $this->params['end_date'] ) : '';
			// If start time or end time is not found, then no need to proceed further.
			if ( empty( $start_date_time ) || empty( $end_date_time ) ) {
				return array();
			}
			$request_type = ! empty( $this->params['type'] ) ? strtolower( $this->params['type'] ) : 'history';
			$transactions = array();
			if ( 'refresh' === $request_type ) {

				$results = $wpdb->get_col(
					$wpdb->prepare(
						"SELECT option_value FROM `{$wpdb->prefix}options` WHERE option_name LIKE %s AND SUBSTRING_INDEX( option_name, '_transient_eddpc_json_deleted_', -1 ) between %d and %d;",
						array(
							$wpdb->esc_like( '_transient_eddpc_json_deleted_' ) . '%',
							$start_date_time,
							$end_date_time,
						)
					)
				); // WPCS: cache ok, db call ok.

				if ( ! empty( $results ) ) {
					foreach ( $results as $result ) {
						$deleted_trans = maybe_unserialize( $result );
						if ( empty( $deleted_trans ) || ! is_array( $deleted_trans ) ) {
							continue;
						}
						foreach ( $deleted_trans as $trans ) {
							$transactions[] = $trans;
						}
					}
				}
			}

			return $transactions;
		}

		/**
		 * Subscription created meta
		 *
		 * @param EDD_Subscription $subscription_order subscription order.
		 *
		 * @return array
		 */
		public function format_subscription_created_meta_info( $subscription_order = null ) {
			if ( ! $this->is_subscription_order( $subscription_order ) ) {
				return array();
			}
			$subscription_id = ! empty( $subscription_order->id ) ? intval( $subscription_order->id ) : 0;
			if ( 0 >= $subscription_id ) {
				return array();
			}
			if ( in_array( $subscription_id, self::$processed_created_subscriptions, true ) ) {
				return array();
			}
			self::$processed_created_subscriptions[] = $subscription_id;
			if ( ! is_callable( array( $subscription_order, 'get_original_payment_id' ) ) ) {
				return array();
			}
			$order = $this->get_order_by_id( $subscription_order->get_original_payment_id() );
			if ( ! $this->is_payment_order( $order ) ) {
				return array();
			}
			$ordered_at = $this->format_date( ! empty( $subscription_order->created ) ? $subscription_order->created : '', null );

			$order_notes   = $this->get_order_notes( $subscription_order );
			$modified_date = $this->get_order_updated_time( $order_notes, $ordered_at );
			if ( empty( $modified_date ) ) {
				$modified_date = $ordered_at;
			}
			$customer_details = $this->get_customer_details( $order );
			$amount_in_cents  = $this->get_amount_in_cents( $order );
			$billing_address  = $this->get_order_billing_address( $order );

			return array(
				'createdAt'       => $ordered_at,
				'orderedAt'       => $ordered_at,
				'updatedAt'       => $modified_date,
				'sourceId'        => strval( $subscription_id ),
				'sourceParentId'  => null,
				'type'            => 'META',
				'status'          => 'CREATED',
				'gateway'         => PUTLER_GATEWAY,
				'isRecurring'     => true,
				'subscriptionId'  => strval( $subscription_id ),
				'paymentSource'   => $this->get_payment_method( $order ),
				'externalId'      => $this->get_transaction_id( $order ),
				'ip'              => ! empty( $order->ip ) ? $order->ip : null,
				'userAgent'       => null,
				'tags'            => array(),
				'notes'           => $order_notes,
				'meta'            => wp_json_encode( array() ),
				'amountInCents'   => ! empty( $amount_in_cents ) ? $amount_in_cents : null,
				'billingAddress'  => ! empty( $billing_address ) ? $billing_address : null,
				'shippingAddress' => null,
				'contact'         => ! empty( $customer_details ) ? $customer_details : null,
				'coupons'         => $this->get_used_coupons( $order ),
				'product'         => $this->get_line_items( $order, array( $subscription_order ), 'meta' ),
			);
		}

		/**
		 * Subscription meta
		 *
		 * @param EDD_Subscription $subscription_order subscription order.
		 * @param bool             $override_modified_time need to override modified at time.
		 *
		 * @return array
		 */
		public function format_subscription_meta_info( $subscription_order = null, $override_modified_time = false ) {
			if ( ! $this->is_subscription_order( $subscription_order ) ) {
				return array();
			}
			$subscription_id = ! empty( $subscription_order->id ) ? intval( $subscription_order->id ) : 0;
			if ( 0 >= $subscription_id ) {
				return array();
			}
			if ( in_array( $subscription_id, self::$processed_meta_subscriptions, true ) ) {
				return array();
			}
			self::$processed_meta_subscriptions[] = $subscription_id;

			$order = $this->get_order_by_id( $subscription_order->get_original_payment_id() );
			if ( ! $this->is_payment_order( $order ) ) {
				return array();
			}
			$order_notes   = $this->get_order_notes( $subscription_order );
			$ordered_at    = $this->format_date( ! empty( $subscription_order->created ) ? $subscription_order->created : '', null );
			$modified_date = $this->get_order_updated_time( $order_notes, $ordered_at );
			if ( empty( $modified_date ) ) {
				$modified_date = $ordered_at;
			}

			if ( $override_modified_time ) {
				$modified_date = current_time( 'mysql', true );
			}

			$source_id = strval( $subscription_id );
			// For Meta, append "_%D_TIMESTAMP" after "source_id" and also change the "created at" time to "suspended at" time.
			// But WooCommerce does not save the "suspended at" time, so we can take the "updated at" time as "suspended at" time.
			if ( 'SUSPENDED' === $this->get_order_status( $subscription_order ) ) {
				$source_id .= '_S_' . strtotime( $ordered_at );
			}

			if ( 'PENDING' === $this->get_order_status( $subscription_order ) ) {
				$source_id .= '_P_' . strtotime( $ordered_at );
			}

			if ( 'EXPIRED' === $this->get_order_status( $subscription_order ) ) {
				$source_id .= '_E_' . strtotime( $ordered_at );
			}

			if ( 'CANCELLED' === $this->get_order_status( $subscription_order ) ) {
				$source_id .= '_C_' . strtotime( $ordered_at );
			}

			if ( 'ACTIVE' === $this->get_order_status( $subscription_order ) ) {
				$source_id .= '_A_' . strtotime( $ordered_at );
			}

			if ( 'DELETE' === $this->get_order_status( $subscription_order ) ) {
				$source_id .= '_D_' . strtotime( $ordered_at );
			}

			if ( 'ACTIVE' !== $this->get_order_status( $subscription_order ) ) {
				$customer_details = $this->get_customer_details( $order );
				$amount_in_cents  = $this->get_amount_in_cents( $order );
				$billing_address  = $this->get_order_billing_address( $order );

				return array(
					'createdAt'       => $ordered_at,
					'orderedAt'       => $ordered_at,
					'updatedAt'       => $modified_date,
					'sourceId'        => strval( $source_id ),
					'sourceParentId'  => null,
					'type'            => 'META',
					'status'          => $this->get_order_status( $subscription_order ),
					'gateway'         => PUTLER_GATEWAY,
					'isRecurring'     => true,
					'subscriptionId'  => strval( $subscription_id ),
					'paymentSource'   => $this->get_payment_method( $order ),
					'externalId'      => $this->get_transaction_id( $order ),
					'ip'              => ! empty( $order->ip ) ? $order->ip : null,
					'userAgent'       => null,
					'tags'            => array(),
					'notes'           => $order_notes,
					'meta'            => wp_json_encode( array() ),
					'amountInCents'   => ! empty( $amount_in_cents ) ? $amount_in_cents : null,
					'billingAddress'  => ! empty( $billing_address ) ? $billing_address : null,
					'shippingAddress' => null,
					'contact'         => ! empty( $customer_details ) ? $customer_details : null,
					'coupons'         => $this->get_used_coupons( $order ),
					'product'         => $this->get_line_items( $order, array( $subscription_order ), 'meta' ),
				);
			}

			return array();
		}

		/**
		 * Check the given order
		 *
		 * @param EDD_Download $product order object.
		 *
		 * @return bool
		 */
		private function is_download_product( $product = null ) {
			if ( empty( $product ) ) {
				return false;
			}

			return is_a( $product, 'EDD_Download' );
		}

		/**
		 * Check the given order
		 *
		 * @param EDD_Payment | EDD_Subscription $order order object.
		 *
		 * @return bool
		 */
		private function is_subscription_order( $order = null ) {
			if ( empty( $order ) ) {
				return false;
			}

			return is_a( $order, 'EDD_Subscription' );
		}

		/**
		 * Check the given order is EDD_Payment or not
		 *
		 * @param EDD_Payment | EDD_Subscription $order order object.
		 *
		 * @return bool
		 */
		private function is_payment_order( $order = null ) {
			if ( empty( $order ) ) {
				return false;
			}

			return is_a( $order, 'EDD_Payment' );
		}

		/**
		 * Get the source ID, If it is refunded order then append the refund id
		 *
		 * @param EDD_Payment $order order object.
		 *
		 * @return string
		 */
		public function get_order_source_id( $order = null ) {

			if ( ! $this->is_payment_order( $order ) && ! $this->is_subscription_order( $order ) ) {
				return null;
			}
			$source_id = ! empty( $order->ID ) ? intval( $order->ID ) : 0;
			if ( 0 >= $source_id ) {
				return null;
			}
			if ( 'refund' === $this->get_order_type( $order ) ) {
				$parent_id = ! empty( $order->parent_payment ) ? intval( $order->parent_payment ) : 0;
				$source_id = $parent_id . '_R_' . $source_id;
			}

			return strval( $source_id );
		}

		/**
		 * Get order type
		 *
		 * @param EDD_Payment $order order object.
		 *
		 * @return string
		 */
		private function get_order_type( $order = null ) {

			if ( ! $this->is_payment_order( $order ) && ! $this->is_subscription_order( $order ) ) {
				return null;
			}
			if ( ! empty( $order->order ) ) {
				$order_details = $order->order;
				if ( $order_details->type ) {
					return strtolower( $order_details->type );
				}
			}

			return 'sale';
		}

		/**
		 * Get the latest date from different available date
		 *
		 * @param numeric $order_id order id.
		 * @param string  $order_note_date datetime of order note added.
		 * @param string  $order_created_date order created date.
		 *
		 * @return string
		 */
		public function get_order_modified_date( $order_id = 0, $order_note_date = '', $order_created_date = '' ) {

			$original_modified_time = null;
			if ( ! empty( self::$order_modified_dates[ $order_id ] ) ) {
				$original_modified_time = self::$order_modified_dates[ $order_id ];
			}
			$order_note_time    = ! empty( $order_note_date ) ? strtotime( $order_note_date ) : 0;
			$order_created_time = ! empty( $order_created_date ) ? strtotime( $order_created_date ) : 0;
			$latest_time        = max( $original_modified_time, $order_note_time, $order_created_time );

			return $this->format_date( $latest_time );
		}

		/**
		 * Format order int Putler structure
		 *
		 * @param EDD_Payment $order order object.
		 * @param bool        $override_modified_time need to override modified at time.
		 */
		private function format_order( $order = null, $override_modified_time = false ) {

			if ( ! $this->is_payment_order( $order ) ) {
				return array();
			}
			$subscription_orders = $this->get_order_subscriptions( $order );
			$subscription_order  = null;
			if ( ! empty( $subscription_orders ) && is_array( $subscription_orders ) ) {
				$subscription_order = end( $subscription_orders );
			}

			$is_subscription_order = $this->is_subscription_order( $subscription_order );
			$parent_id             = ! empty( $order->parent_payment ) ? intval( $order->parent_payment ) : 0;
			$order_notes           = $this->get_order_notes( $order );
			$order_created_time    = $this->format_date( ! empty( $order->date ) ? $order->date : '', null );
			$ordered_time          = $this->format_date( ! empty( $order->completed_date ) ? $order->completed_date : '', null );
			if ( empty( $ordered_time ) ) {
				$ordered_time = $order_created_time;
			}
			if ( 'refund' === $this->get_order_type( $order ) ) {
				$parent_order_id = ! empty( $parent_id ) ? intval( $parent_id ) : 0;
				$parent_order    = $this->get_order_by_id( $parent_order_id );
				if ( $this->is_payment_order( $parent_order ) ) {
					$parent_order_created_time = $this->format_date( ! empty( $parent_order->date ) ? $parent_order->date : '', null );
					if ( ! empty( $parent_order_created_time ) ) {
						$ordered_time = $parent_order_created_time;
					}
				}
			}
			$updated_at_time = $this->get_order_updated_time( $order_notes, $ordered_time );
			if ( empty( $updated_at_time ) ) {
				$updated_at_time = $ordered_time;
			}
			$source_id = $this->get_order_source_id( $order );
			if ( empty( $source_id ) ) {
				return array();
			}

			$customer_details = $this->get_customer_details( $order );
			$amount_in_cents  = $this->get_amount_in_cents( $order );
			$billing_address  = $this->get_order_billing_address( $order );
			$modified_date    = $this->get_order_modified_date( ! empty( $order->ID ) ? intval( $order->ID ) : 0, $updated_at_time, ! empty( $order->completed_date ) ? $order->completed_date : '' );

			if ( $override_modified_time ) {
				$modified_date = current_time( 'mysql', true );
			}

			$orders = array(
				array(
					'createdAt'       => $order_created_time,
					'orderedAt'       => $ordered_time,
					'updatedAt'       => $modified_date,
					'sourceId'        => $source_id,
					'sourceParentId'  => ! empty( $parent_id ) ? strval( $parent_id ) : null,
					'type'            => 'refund' === $this->get_order_type( $order ) ? 'SALEREFUND' : 'SALE',
					'status'          => $this->get_order_status( $order ),
					'gateway'         => PUTLER_GATEWAY,
					'isRecurring'     => $is_subscription_order,
					'subscriptionId'  => $is_subscription_order ? ! empty( $subscription_order->id ) ? strval( $subscription_order->id ) : null : null,
					'paymentSource'   => $this->get_payment_method( $order ),
					'externalId'      => $this->get_transaction_id( $order ),
					'ip'              => ! empty( $order->ip ) ? $order->ip : null,
					'userAgent'       => null,
					'tags'            => array(),
					'notes'           => $order_notes,
					'meta'            => wp_json_encode( array() ),
					'amountInCents'   => ! empty( $amount_in_cents ) ? $amount_in_cents : null,
					'billingAddress'  => ! empty( $billing_address ) ? $billing_address : null,
					'shippingAddress' => null,
					'contact'         => ! empty( $customer_details ) ? $customer_details : null,
					'coupons'         => $this->get_used_coupons( $order ),
					'product'         => $this->get_line_items( $order, $subscription_orders ),
				),
			);

			if ( $is_subscription_order && 'DELETE' !== $this->get_order_status( $order ) ) {
				foreach ( $subscription_orders as $subscription ) {
					$created_subscription = $this->format_subscription_created_meta_info( $subscription );
					if ( ! empty( $created_subscription ) && is_array( $created_subscription ) ) {
						$orders[] = $created_subscription;
					}
					$modified_subscription = $this->format_subscription_meta_info( $subscription );
					if ( ! empty( $modified_subscription ) && is_array( $modified_subscription ) ) {
						$orders[] = $modified_subscription;
					}
				}
			}

			return $orders;
		}

		/**
		 * Get the subscription id of the order
		 *
		 * @param EDD_Payment $order order object.
		 *
		 * @return EDD_Subscription[]
		 */
		public function get_order_subscriptions( $order = null ) {

			if ( class_exists( 'EDD_Subscriptions_DB' ) && $this->is_payment_order( $order ) ) {
				$subs_db   = new EDD_Subscriptions_DB();
				$order_id  = ! empty( $order->ID ) ? intval( $order->ID ) : 0;
				$parent_id = ! empty( $order->parent_payment ) ? intval( $order->parent_payment ) : 0;

				$parent_payment_ids = array( $order_id );
				if ( $parent_id > 0 ) {
					$parent_payment_ids[] = $parent_id;
				}

				return $subs_db->get_subscriptions(
					array(
						'parent_payment_id' => $parent_payment_ids,
						'order'             => 'ASC',
						'number'            => - 1,
					)
				);
			}

			return array();
		}

		/**
		 * Get the subscription id of the order
		 *
		 * @return EDD_Subscription[]
		 */
		public function get_modified_subscriptions() {

			global $wpdb;
			// As per suggestion from EDD customer support on 30th AUG, 2022
			// We've logged an issue to store the date modified which should be available in our Recurring Payments 2.12 release. This will also contain the date_cancelled column.
			// Currently, the only way to get this would to be parse the notes column for a date, which would be a best guess, and challenging.

			// At the time of writing this function, there is no other way to achieve. so we have created our own table and do entries in to the table.
			if ( class_exists( 'EDD_Subscriptions_DB' ) ) {
				if ( ! defined( 'EDD_VERSION' ) ) {
					return array();
				}
				$request_type = ! empty( $this->params['type'] ) ? strtolower( $this->params['type'] ) : 'history';
				if ( 'refresh' === $request_type ) {
					try {
						$subscriptions   = array();
						$start_date_time = ! empty( $this->params['start_date'] ) ? strtotime( $this->params['start_date'] ) : '';
						$end_date_time   = ! empty( $this->params['end_date'] ) ? strtotime( $this->params['end_date'] ) : '';
						if ( empty( $end_date_time ) || empty( $start_date_time ) ) {
							return array();
						}
						$modified_subscriptions = $wpdb->get_results( $wpdb->prepare( "SELECT subscription_id FROM {$wpdb->prefix}eddpc_subscription WHERE modified_time >= %d && modified_time <= %d", $start_date_time, $end_date_time ), ARRAY_A ); // WPCS: cache ok, db call ok.
						if ( empty( $modified_subscriptions ) ) {
							return array();
						}
						foreach ( $modified_subscriptions as $subscription ) {
							if ( ! empty( $subscription['subscription_id'] ) ) {
								$subscription_order_object = $this->get_subscription_order_by_id( $subscription['subscription_id'] );
								if ( ! empty( $subscription_order_object ) ) {
									$subscriptions[] = $subscription_order_object;
								}
							}
						}

						return $subscriptions;
					} catch ( Exception $exception ) {
						return array();
					}
				}
			}

			return array();
		}

		/**
		 * Get the used coupons
		 *
		 * @param EDD_Payment $order order object.
		 *
		 * @return array
		 */
		public function get_used_coupons( $order = null ) {

			if ( ! $this->is_payment_order( $order ) && ! $this->is_subscription_order( $order ) ) {
				return array();
			}
			$used_coupons = array();
			if ( ! empty( $order->discounts ) && ! empty( $order->discounts ) && 'none' !== $order->discounts ) {
				$discount = $this->calculate_order_discounts( $order );
				// NOTE: EDD does not provide amount of each discount code and if more than
				// one discount code in cart then it will be string Eg. OFF10, FLAT20.
				$new_used_coupon = array(
					'code'   => $order->discounts,
					'amount' => $this->format_price( $discount, 0 ),
				);
				$used_coupons[]  = $new_used_coupon;
			}

			return $used_coupons;
		}

		/**
		 * Calculate discounts for the order
		 *
		 * @param EDD_Payment $order order object.
		 *
		 * @return float
		 */
		public function calculate_order_discounts( $order = null ) {

			if ( ! $this->is_payment_order( $order ) && ! $this->is_subscription_order( $order ) ) {
				return 0;
			}
			$discount = 0;
			if ( ! empty( $order->discounts ) && 'none' !== $order->discounts ) {
				$cart_details = ( ! empty( $order->payment_meta['cart_details'] ) ) ? $order->payment_meta['cart_details'] : array();
				if ( is_array( $cart_details ) ) {
					foreach ( $cart_details as $cart_item ) {
						$discount += ! empty( $cart_item['discount'] ) ? floatval( $cart_item['discount'] ) : 0;
					}
				}
			}

			return round( $discount, 2 );
		}

		/**
		 * Get the external transaction id method
		 *
		 * @param EDD_Payment | EDD_Subscription $order order object.
		 */
		public function get_transaction_id( $order = null ) {

			if ( ! $this->is_payment_order( $order ) && ! $this->is_subscription_order( $order ) ) {
				return null;
			}

			return esc_html( ! empty( $order->transaction_id ) ? esc_attr( $order->transaction_id ) : null );
		}

		/**
		 * Get the payment method
		 *
		 * @param EDD_Payment $order order object.
		 */
		public function get_payment_method( $order = null ) {

			if ( ! $this->is_payment_order( $order ) && ! $this->is_subscription_order( $order ) ) {
				return null;
			}

			return ! empty( $order->gateway ) ? $order->gateway : null;
		}

		/**
		 * Get the type of the product
		 *
		 * @param EDD_Download $product product object.
		 *
		 * @return string
		 */
		public function get_product_type( $product = null ) {

			if ( ! $this->is_download_product( $product ) ) {
				return 'UNKNOWN';
			}
			if ( ! is_callable( array( $product, 'get_type' ) ) ) {
				return 'UNKNOWN';
			}
			$status = $product->get_type();
			switch ( $status ) {
				case 'default':
					return 'SIMPLE';
				case 'bundle':
					return 'BUNDLE';
				default:
					return 'UNKNOWN';
			}
		}

		/**
		 * Get the status of the product
		 *
		 * @param EDD_Download $product product object.
		 *
		 * @return string
		 */
		public function get_product_status( $product = null ) {

			if ( ! $this->is_download_product( $product ) ) {
				return 'DELETED';
			}
			$status = ! empty( $product->post_status ) ? $product->post_status : '';
			switch ( $status ) {
				case 'draft':
					return 'INACTIVE';
				default:
				case 'trash':
					return 'DELETED';
				case 'publish':
					return 'ACTIVE';
			}
		}

		/**
		 * Get the product sku
		 *
		 * @param EDD_Download $product product object.
		 * @param string       $default default value if no sku found.
		 *
		 * @return string
		 */
		public function get_sku( $product = null, $default = '' ) {

			if ( ! $this->is_download_product( $product ) ) {
				return $default;
			}
			if ( is_callable( array( $product, 'get_sku' ) ) ) {
				$sku = $product->get_sku();
				if ( empty( $sku ) ) {
					return $default;
				}

				if ( '-' === $sku ) {
					return $default;
				}

				return $sku;
			}

			return null;
		}

		/**
		 * Get payment by ID
		 *
		 * @param numeric $product_id order id.
		 *
		 * @return EDD_Download
		 */
		public function get_product_by_id( $product_id = 0 ) {
			$product_id = intval( $product_id );
			if ( 0 >= $product_id ) {
				return null;
			}
			if ( function_exists( 'edd_get_download' ) ) {
				$product = edd_get_download( $product_id );
			} elseif ( class_exists( 'EDD_Download' ) ) {
				$product = new EDD_Download( $product_id );
			} else {
				return null;
			}
			if ( empty( $product->ID ) ) {
				return null;
			}

			return $product;
		}

		/**
		 * Get the variation id.
		 *
		 * @param array       $line_item line item details.
		 * @param EDD_Payment $order order.
		 *
		 * @return string|null
		 */
		public function get_variation_id( $line_item = array(), $order = null ) {
			if ( ! $this->is_payment_order( $order ) && ! $this->is_subscription_order( $order ) ) {
				return null;
			}
			$variation_id = null;
			if ( ! empty( $line_item['item_number'] ) ) {
				$line_item_details = $line_item['item_number'];
				if ( empty( $line_item_details['id'] ) ) {
					return null;
				}
				if ( empty( $line_item_details['options'] ) || empty( $line_item_details['options']['price_id'] ) ) {
					return null;
				}
				if ( function_exists( 'edd_get_price_option_name' ) && function_exists( 'edd_get_price_option_amount' ) ) {
					$product_id   = $line_item_details['id'];
					$price_id     = $line_item_details['options']['price_id'];
					$option_name  = edd_get_price_option_name( $product_id, $price_id, ! empty( $order->ID ) ? $order->ID : 0 );
					$option_price = edd_get_price_option_amount( $product_id, $price_id );
					$option_hash  = md5( "{$product_id}_{$option_name}_{$option_price}" );
					$variation_id = "{$product_id}_$option_hash";
				}
			}

			return $variation_id;
		}

		/**
		 * Get the line items
		 *
		 * @param EDD_Payment               $order order object.
		 * @param EDD_Subscription[] | null $subscription_orders array of subscription orders.
		 * @param string                    $type order type.
		 *
		 * @return array
		 */
		public function get_line_items( $order = null, $subscription_orders = array(), $type = 'order' ) {

			if ( ! $this->is_payment_order( $order ) && ! $this->is_subscription_order( $order ) ) {
				return array();
			}
			$line_items           = array();
			$purchased_line_items = ! empty( $order->payment_meta['cart_details'] ) ? $order->payment_meta['cart_details'] : array();
			if ( ! empty( $purchased_line_items ) && is_array( $purchased_line_items ) ) {
				$all_subscription_product_ids = array();
				foreach ( $subscription_orders as $subscription_order ) {
					if ( $this->is_subscription_order( $subscription_order ) ) {
						$all_subscription_product_ids[] = ! empty( $subscription_order->product_id ) ? intval( $subscription_order->product_id ) : 0;
					}
				}
				foreach ( $purchased_line_items as $line_item ) {
					$product_id = ! empty( $line_item['id'] ) ? intval( $line_item['id'] ) : 0;
					if ( empty( $product_id ) ) {
						continue;
					}
					$product = $this->get_product_by_id( $product_id );
					if ( ! $this->is_download_product( $product ) ) {
						continue;
					}
					if ( ! empty( $subscription_orders ) ) {
						if ( ! in_array( $product_id, $all_subscription_product_ids, true ) && 'meta' === $type ) {
							continue;
						}
					}
					$avatar       = null;
					$thumbnail_id = get_post_thumbnail_id( $product_id );
					if ( ! empty( $thumbnail_id ) ) {
						$avatar_url = wp_get_attachment_url( intval( $thumbnail_id ) );
						if ( ! empty( $avatar_url ) ) {
							$avatar = $avatar_url;
						}
					}
					$name = ! empty( $line_item['name'] ) ? $line_item['name'] : null;
					if ( method_exists( $product, 'get_name' ) ) {
						$name = $product->get_name();
					}
					$subscription_order  = $this->get_line_item_subscription_order( $line_item, $subscription_orders );
					$product_tags        = $this->get_product_tags( $product );
					$product_categories  = $this->get_product_categories( $product );
					$subscription_meta   = $this->get_subscription_meta( $subscription_order );
					$product_options     = $this->get_product_options( $line_item, $order );
					$variation_source_id = $this->get_variation_id( $line_item, $order );
					if ( ! empty( $variation_source_id ) ) {
						$source_id        = $variation_source_id;
						$source_parent_id = strval( $product_id );
					} else {
						$source_id        = strval( $product_id );
						$source_parent_id = null;
					}
					$new_line_item = array(
						'sourceId'         => $source_id,
						'sourceParentId'   => $source_parent_id,
						'name'             => $name,
						'createdAt'        => $this->format_date( $product->post_date_gmt, null ),
						'updatedAt'        => $this->format_date( $product->post_modified_gmt, null ),
						'sku'              => null,
						'options'          => $product_options,
						'price'            => $this->format_price( ! empty( $line_item['item_price'] ) ? floatval( $line_item['item_price'] ) : null, null ),
						'total'            => $this->format_price( ! empty( $line_item['subtotal'] ) ? floatval( $line_item['subtotal'] ) : 0, 0 ),
						'tax'              => $this->format_price( ! empty( $line_item['tax'] ) ? floatval( $line_item['tax'] ) : 0, 0 ),
						'categories'       => ! empty( $product_categories ) ? $product_categories : null,
						'type'             => $this->get_product_type( $product ),
						'avatar'           => $avatar,
						'handle'           => ! empty( $product->post_name ) ? $product->post_name : null,
						'status'           => $this->get_product_status( $product ),
						'description'      => null,
						'quantity'         => abs( ! empty( $line_item['quantity'] ) ? intval( $line_item['quantity'] ) : 0 ),
						'discount'         => $this->format_price( ! empty( $line_item['discount'] ) ? floatval( $line_item['discount'] ) : 0, 0 ),
						'shipping'         => 0,
						'cost'             => 0,
						'notes'            => null,
						'tags'             => ! empty( $product_tags ) ? $product_tags : null,
						'refund'           => null,
						'vendor'           => null,
						'isRecurring'      => $this->is_subscription_order( $subscription_order ),
						'subscriptionId'   => $this->is_subscription_order( $subscription_order ) ? strval( $subscription_order->id ) : null,
						'subscriptionMeta' => ! empty( $subscription_meta ) ? $subscription_meta : null,
						'meta'             => null,
					);
					$line_items[]  = $new_line_item;
				}
			}

			return $line_items;
		}

		/**
		 * Filters the subscription order for the line item
		 *
		 * @param array              $line_item line item details.
		 * @param EDD_Subscription[] $subscription_orders array of subscription orders.
		 *
		 * @return EDD_Subscription|null
		 */
		public function get_line_item_subscription_order( $line_item = array(), $subscription_orders = array() ) {

			if ( empty( $subscription_orders ) || empty( $line_item ) ) {
				return null;
			}
			foreach ( $subscription_orders as $subscription_order ) {
				if ( $this->is_subscription_order( $subscription_order ) ) {
					if ( empty( $line_item['id'] ) || empty( $subscription_order->product_id ) ) {
						continue;
					}
					if ( intval( $line_item['id'] ) === intval( $subscription_order->product_id ) ) {
						return $subscription_order;
					}
				}
			}

			return null;
		}

		/**
		 * Get the subscription meta for the order
		 *
		 * @param EDD_Subscription $subscription_order order object.
		 *
		 * @return array
		 */
		public function get_subscription_meta( $subscription_order = null ) {

			if ( $this->is_subscription_order( $subscription_order ) ) {
				$period           = ! empty( $subscription_order->period ) ? $subscription_order->period : null;
				$start_date       = $this->format_date( ! empty( $subscription_order->created ) ? $subscription_order->created : '', null );
				$end_date         = $this->format_date( ! empty( $subscription_order->expiration ) ? $subscription_order->expiration : '', null );
				$trial_period     = ! empty( $subscription_order->trial_period ) ? $subscription_order->trial_period : '';
				$trial_end_date   = null;
				$trial_start_date = null;
				if ( ! empty( $trial_period ) ) {
					$trial_start_date = $start_date;
					$trial_end_date   = $this->format_date( $start_date . ' + ' . $trial_period, null );
				}
				switch ( $period ) {
					case 'semi-year':
						$interval = 6;
						$period   = 'month';
						break;
					default:
						$interval = 1;
						break;
				}

				return array(
					'interval'     => $interval,
					'period'       => strtoupper( $period ),
					'startAt'      => $start_date,
					'endAt'        => $end_date,
					'trialStartAt' => ! empty( $trial_end_date ) ? $trial_start_date : null,
					'trialEndAt'   => $trial_end_date,
					'isTrial'      => ! empty( $trial_end_date ),
				);
			}

			return array();
		}

		/**
		 * Get product categories
		 *
		 * @param EDD_Download $product product object.
		 *
		 * @return array
		 */
		public function get_product_categories( $product = null ) {

			if ( ! $this->is_download_product( $product ) ) {
				return array();
			}
			$categories     = get_the_terms( ! empty( $product->ID ) ? intval( $product->ID ) : 0, 'download_category' );
			$all_categories = array();
			if ( ! empty( $categories ) ) {
				foreach ( $categories as $category ) {
					$all_categories[] = ! empty( $category->name ) ? $category->name : '';
				}
			}
			if ( ! empty( $all_categories ) ) {
				return $all_categories;
			}

			return array();
		}

		/**
		 * Get product categories
		 *
		 * @param EDD_Download $product product object.
		 *
		 * @return array
		 */
		public function get_product_tags( $product = null ) {

			if ( ! $this->is_download_product( $product ) ) {
				return array();
			}
			$tags     = get_the_terms( ! empty( $product->ID ) ? intval( $product->ID ) : 0, 'download_tag' );
			$all_tags = array();
			if ( ! empty( $tags ) ) {
				foreach ( $tags as $tag ) {
					$all_tags[] = ! empty( $tag->name ) ? $tag->name : '';
				}
			}
			if ( ! empty( $all_tags ) ) {
				return $all_tags;
			}

			return array();
		}

		/**
		 * Get product options
		 *
		 * @param array       $line_item line item details.
		 * @param EDD_Payment $order order object.
		 *
		 * @return array
		 */
		public function get_product_options( $line_item = array(), $order = null ) {
			if ( empty( $line_item ) ) {
				return array();
			}
			if ( ! $this->is_payment_order( $order ) && ! $this->is_subscription_order( $order ) ) {
				return array();
			}
			$options = array();
			if ( ! empty( $line_item['item_number']['options'] ) ) {
				$item_id  = ! empty( $line_item['id'] ) ? intval( $line_item['id'] ) : 0;
				$price_id = ! empty( $line_item['item_number']['options']['price_id'] ) ? intval( $line_item['item_number']['options']['price_id'] ) : null;
				if ( function_exists( 'edd_has_variable_prices' ) && function_exists( 'edd_get_price_option_name' ) ) {
					if ( edd_has_variable_prices( $item_id ) && ! empty( $price_id ) ) {
						$new_option = array(
							'name'           => 'Option Name',
							'value'          => edd_get_price_option_name( $item_id, $price_id, ! empty( $order->ID ) ? $order->ID : 0 ),
							'possibleValues' => null,
						);
						$options[]  = $new_option;
					}
				}
			}

			return $options;
		}

		/**
		 * Get customer details
		 *
		 * @param EDD_Payment $order order object.
		 *
		 * @return array
		 */
		public function get_customer_details( $order = null ) {
			global $wpdb;
			if ( ! $this->is_payment_order( $order ) && ! $this->is_subscription_order( $order ) ) {
				return array();
			}
			$customer_id = ! empty( $order->customer_id ) ? intval( $order->customer_id ) : 0;
			if ( 0 >= $customer_id ) {
				return array();
			}
			$user_info = ! empty( $order->user_info ) ? $order->user_info : array();
			if ( class_exists( 'EDD_Customer' ) ) {
				$customer = new EDD_Customer( $customer_id );
				if ( ! is_a( $customer, 'EDD_Customer' ) ) {
					return array();
				}
			} else {
				$customer               = new stdClass();
				$customer->user_id      = ! empty( $user_info['id'] ) ? intval( $user_info['id'] ) : 0;
				$customer->id           = ! empty( $user_info['id'] ) ? intval( $user_info['id'] ) : 0;
				$customer->email        = ! empty( $user_info['email'] ) ? $user_info['email'] : null;
				$customer->name         = ! empty( $user_info['first_name'] ) ? $user_info['first_name'] : null;
				$customer->date_created = ! empty( $order->date ) ? $order->date : null;
			}
			if ( empty( $customer->id ) ) {
				return array();
			}

			$modified_date = null;
			if ( version_compare( '3.0', EDD_VERSION, '<' ) ) {
				$customer_details = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}edd_customers WHERE id = %d ", $customer->id ) ); // WPCS: cache ok, db call ok.
				if ( ! empty( $customer_details->date_modified ) ) {
					$modified_date = $this->format_date( $customer_details->date_modified, null );
				}
			}

			if ( empty( $modified_date ) ) {
				$modified_date = $this->format_date( ! empty( $customer->date_created ) ? $customer->date_created : '', null );
			}

			$address_details = ! empty( $user_info['address'] ) ? $user_info['address'] : array();
			$address_lines   = array();
			$country_code    = null;
			$zip             = null;
			$state_code      = null;
			$city            = null;

			if ( ! empty( $address_details['line1'] ) ) {
				$address_lines[] = $address_details['line1'];
			}

			if ( ! empty( $address_details['line2'] ) ) {
				$address_lines[] = $address_details['line2'];
			}

			if ( ! empty( $address_details['country'] ) ) {
				$country_code = $address_details['country'];
			}

			if ( ! empty( $address_details['city'] ) ) {
				$city = $address_details['city'];
			}

			if ( ! empty( $address_details['zip'] ) ) {
				$zip = $address_details['zip'];
			}

			if ( ! empty( $address_details['state'] ) ) {
				$state_code = $address_details['state'];
			}

			$avatar_url = get_avatar_url( ! empty( $customer->user_id ) ? intval( $customer->user_id ) : 0 );
			if ( empty( $avatar_url ) ) {
				$avatar_url = null;
			} else {
				// Check the given URL is from gravatar
				// If it is gravatar, then pass avatar url as null otherwise pass url.
				preg_match( '/^(?=.*?\bgravatar.com\b).*$/', $avatar_url, $matches );
				if ( ! empty( $matches ) ) {
					$avatar_url = null;
				}
			}

			$first_name = ! empty( $user_info['first_name'] ) ? $user_info['first_name'] : null;
			$last_name  = ! empty( $user_info['last_name'] ) ? $user_info['last_name'] : null;

			return array(
				'sourceId'         => strval( $customer->id ),
				'createdAt'        => $this->format_date( ! empty( $customer->date_created ) ? $customer->date_created : '', null ),
				'updatedAt'        => $modified_date,
				'name'             => array(
					'firstName' => $first_name,
					'fullName'  => ! empty( $customer->name ) ? $customer->name : null,
				),
				'emailAddresses'   => array( array( 'email' => ! empty( $customer->email ) ? $customer->email : null ) ),
				'phones'           => null,
				'address'          => array(
					'name'        => array(
						'firstName' => $first_name,
						'fullName'  => $first_name . ' ' . $last_name,
					),
					'company'     => null,
					'address'     => ! empty( $address_lines ) ? implode( ', ', $address_lines ) : null,
					'city'        => $city,
					'postalCode'  => $zip,
					'state'       => $this->get_state_name( $country_code, $state_code, null ),
					'country'     => $this->get_country_name( $country_code, null ),
					'countryCode' => $country_code,
					'geohash'     => null,
					'lineage'     => null,
					'latitude'    => null,
					'longitude'   => null,
					'placetype'   => null,
				),
				'tags'             => null,
				'notes'            => null,
				'avatar'           => $avatar_url,
				'socialProfiles'   => null,
				'acceptsMarketing' => null,
				'company'          => null,
				'leadScore'        => null,
				'isFavorite'       => null,
				'designation'      => null,
				'websiteDomain'    => null,
				'meta'             => null,
			);
		}

		/**
		 * Extract billing address from the order
		 *
		 * @param EDD_Payment $order order object.
		 *
		 * @return array
		 */
		public function get_order_billing_address( $order = null ) {

			if ( ! $this->is_payment_order( $order ) && ! $this->is_subscription_order( $order ) ) {
				return array();
			}
			$address_details = ! empty( $order->address ) ? $order->address : array();
			$address_lines   = array();
			$country_code    = null;
			$zip             = null;
			$state_code      = null;
			$city            = null;
			if ( ! empty( $address_details['line1'] ) ) {
				$address_lines[] = $address_details['line1'];
			}

			if ( ! empty( $address_details['line2'] ) ) {
				$address_lines[] = $address_details['line2'];
			}

			if ( ! empty( $address_details['country'] ) ) {
				$country_code = $address_details['country'];
			}

			if ( ! empty( $address_details['city'] ) ) {
				$city = $address_details['city'];
			}

			if ( ! empty( $address_details['zip'] ) ) {
				$zip = $address_details['zip'];
			}

			if ( ! empty( $address_details['state'] ) ) {
				$state_code = $address_details['state'];
			}
			$first_name = ! empty( $order->first_name ) ? $order->first_name : null;
			$last_name  = ! empty( $order->last_name ) ? $order->last_name : null;

			return array(
				'name'        => array(
					'fullName' => $first_name . ' ' . $last_name,
				),
				'company'     => null,
				'address'     => ! empty( $address_lines ) ? implode( ', ', $address_lines ) : null,
				'city'        => $city,
				'postalCode'  => $zip,
				'state'       => $this->get_state_name( $country_code, $state_code, null ),
				'country'     => $this->get_country_name( $country_code, null ),
				'countryCode' => $country_code,
				'geohash'     => null,
				'lineage'     => null,
				'latitude'    => null,
				'longitude'   => null,
				'placetype'   => null,
			);
		}

		/**
		 * Get the country name.
		 *
		 * @param string $country_code country code.
		 * @param string $default default value.
		 *
		 * @return string
		 */
		public function get_country_name( $country_code = '', $default = '' ) {
			if ( empty( $country_code ) ) {
				return $default;
			}
			if ( function_exists( 'edd_get_country_name' ) ) {
				$country_name = edd_get_country_name( $country_code );
				if ( ! empty( $country_name ) ) {
					return $country_name;
				}
			} elseif ( function_exists( 'edd_get_country_list' ) ) {
				$country_list = edd_get_country_list();

				return ! empty( $country_list[ $country_code ] ) ? $country_list[ $country_code ] : $country_code;
			}

			return $default;
		}

		/**
		 * Get the state name.
		 *
		 * @param string $country_code country code.
		 * @param string $state_code state code.
		 * @param string $default default value.
		 *
		 * @return string
		 */
		public function get_state_name( $country_code = '', $state_code = '', $default = '' ) {
			if ( empty( $country_code ) || empty( $state_code ) ) {
				return $default;
			}
			if ( function_exists( 'edd_get_state_name' ) ) {
				$state_name = edd_get_state_name( $country_code, $state_code );
				if ( ! empty( $state_name ) ) {
					return $state_name;
				}
			} elseif ( function_exists( 'edd_get_shop_states' ) ) {
				$states_list = edd_get_shop_states( $country_code );

				return ! empty( $states_list[ $state_code ] ) ? $states_list[ $state_code ] : $state_code;
			}

			return $default;
		}

		/**
		 * Convert the amount to cents
		 *
		 * @param EDD_Payment $order order object.
		 *
		 * @return array
		 */
		public function get_amount_in_cents( $order = null ) {

			if ( ! $this->is_payment_order( $order ) && ! $this->is_subscription_order( $order ) ) {
				return array();
			}
			$discount = $this->calculate_order_discounts( $order );

			return array(
				'currency'   => ! empty( $order->currency ) ? $order->currency : null,
				'cost'       => 0,
				'total'      => $this->format_price( ! empty( $order->total ) ? $order->total : 0, 0.00 ),
				'fee'        => $this->format_price( ! empty( $order->fees_total ) ? $order->fees_total : 0, 0.00 ),
				'tax'        => $this->format_price( ! empty( $order->tax ) ? $order->tax : 0, 0.00 ),
				'discount'   => $this->format_price( $discount, 0.00 ),
				'shipping'   => 0,
				'commission' => 0,
			);
		}

		/**
		 * Format price to cent
		 *
		 * @param string    $price price.
		 * @param float|int $default default price or fallback price.
		 *
		 * @return float|int
		 */
		public function format_price( $price = 0, $default = 0 ) {

			if ( empty( $price ) ) {
				return $default;
			}
			$price = floatval( $price );

			return intval( $price * 100 );
		}

		/**
		 * Arrange notes in asscending orders
		 *
		 * @param array $note_1 note to compare.
		 * @param array $note_2 note to compare with.
		 *
		 * @return int
		 */
		public function arrange_notes( $note_1 = array(), $note_2 = array() ) {

			if ( empty( $note_1 ) || empty( $note_2 ) || empty( $note_1['createdAt'] ) || empty( $note_2['createdAt'] ) ) {
				return 0;
			}
			$date_1 = $note_1['createdAt'];
			$date_2 = $note_2['createdAt'];
			if ( strtotime( $date_1 ) > strtotime( $date_2 ) ) {
				return 1;
			} elseif ( strtotime( $date_1 ) < strtotime( $date_2 ) ) {
				return - 1;
			} else {
				return 0;
			}
		}

		/**
		 * Get subscription notes
		 *
		 * @param string $note order note.
		 *
		 * @return array
		 */
		public function get_subscription_note( $note = '' ) {

			if ( empty( $note ) ) {
				return array();
			}
			$exploded_notes = explode( ' - ', $note );
			if ( ! empty( $exploded_notes ) && is_array( $exploded_notes ) && 2 <= count( $exploded_notes ) ) {
				$date        = $exploded_notes[0];
				$actual_note = $exploded_notes[1];

				return array(
					'creatorType' => 'INTEGRATION',
					'createdAt'   => $this->format_date( $date, null, true ),
					'note'        => esc_html( $actual_note ),
				);
			}

			return array();
		}

		/**
		 * Get all notes of the order
		 *
		 * @param EDD_Payment | EDD_Subscription $order order object.
		 *
		 * @return array
		 */
		public function get_order_notes( $order = null ) {

			if ( ! $this->is_payment_order( $order ) && ! $this->is_subscription_order( $order ) ) {
				return array();
			}
			$all_notes = array();
			if ( $this->is_subscription_order( $order ) ) {
				/**
				 * Variable setup.
				 *
				 * @var EDD_Subscription $order Subscription order details.
				 */
				if ( is_callable( array( $order, 'get_notes' ) ) ) {
					$subscription_notes = $order->get_notes( 20 );
					if ( ! empty( $subscription_notes ) && is_array( $subscription_notes ) ) {
						foreach ( $subscription_notes as $note ) {
							$note_details = $this->get_subscription_note( $note );
							if ( ! empty( $note_details ) && is_array( $note_details ) ) {
								$all_notes[] = $note_details;
							}
						}
					}
				}
			} else {
				if ( function_exists( 'edd_get_payment_notes' ) ) {
					$order_notes = edd_get_payment_notes( ! empty( $order->ID ) ? $order->ID : 0 );
					if ( ! empty( $order_notes ) && is_array( $order_notes ) ) {
						foreach ( $order_notes as $note ) {
							/**
							 * Variable setup
							 *
							 * @var WP_Comment $note note object.
							 */
							if ( property_exists( $note, 'comment_date_gmt' ) && property_exists( $note, 'comment_content' ) ) {
								$new_note    = array(
									'creatorType' => 'INTEGRATION',
									'createdAt'   => $this->format_date( $note->comment_date_gmt, null ),
									'note'        => esc_html( $note->comment_content ),
								);
								$all_notes[] = $new_note;
							}
						}
					}
				}
			}
			// Arrange notes by ascending order.
			usort( $all_notes, array( $this, 'arrange_notes' ) );

			return $all_notes;
		}

		/**
		 * Get the order status
		 *
		 * @param EDD_Payment | EDD_Subscription $order order object.
		 *
		 * @return string
		 */
		public function get_order_status( $order = null ) {
			if ( ! $this->is_payment_order( $order ) && ! $this->is_subscription_order( $order ) ) {
				return 'OTHER';
			}
			$order_status        = ! empty( $order->status ) ? $order->status : '';
			$order_status        = strtolower( $order_status );
			$paid_order_statuses = array();
			switch ( $order_status ) {
				case 'trash':
				case 'delete':
					$new_order_status = 'delete';
					break;
				case 'pending':
				case 'on-hold':
					$new_order_status = 'pending';
					break;
				case 'publish':
				case 'processing':
				case 'completed':
				case 'edd_subscription':
				case 'partially_refunded':
				case 'complete':
					$new_order_status = 'completed';
					break;
				case 'refunded':
					$new_order_status = 'refunded';
					break;
				case 'failed':
					$new_order_status = 'failed';
					break;
				case 'abandoned':
				case 'revoked':
				case 'cancelled':
					$new_order_status = 'cancelled';
					break;
				case 'expired':
					$new_order_status = 'expired';
					break;
				case 'trialling':
				case 'active':
					$new_order_status = 'active';
					break;
				case 'suspended':
					$new_order_status = 'suspended';
					break;
				default:
					if ( in_array( $order_status, $paid_order_statuses, true ) ) {
						$new_order_status = 'completed';
					} else {
						$new_order_status = 'OTHER';
					}
					break;
			}

			return strtoupper( $new_order_status );
		}

		/**
		 * Format date
		 *
		 * @param string $date date.
		 * @param string $default default value.
		 * @param bool   $convert_to_utc flag to determine whether convert time to GMT or not.
		 * @param string $format In which format do we need to convert.
		 *
		 * @return string
		 */
		public function format_date( $date = 'now', $default = '', $convert_to_utc = false, $format = 'Y-m-d H:i:s' ) {
			if ( empty( $date ) ) {
				return $default;
			}
			if ( $convert_to_utc ) {
				return get_gmt_from_date( $date );
			}
			if ( is_numeric( $date ) ) {
				return date( $format, $date ); // phpcs:ignore
			}

			return date( $format, strtotime( $date ) ); // phpcs:ignore
		}

		/**
		 * Get the order updated at time
		 *
		 * @param array $order_notes order notes.
		 * @param mixed $default default value.
		 *
		 * @return string
		 */
		public function get_order_updated_time( $order_notes = array(), $default = '' ) {
			if ( empty( $order_notes ) ) {
				return $default;
			}
			$last_updated_note = end( $order_notes );
			if ( ! empty( $last_updated_note['createdAt'] ) ) {
				return $last_updated_note['createdAt'];
			}

			return $default;
		}
	}

}
