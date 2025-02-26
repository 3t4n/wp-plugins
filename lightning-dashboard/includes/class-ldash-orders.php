<?php

/**
 * Orders class file
 */

if( !defined( 'ABSPATH' ) ) {
	exit;
}

if( !class_exists( 'LDASH_Orders' ) ) {

	/**
	 * Orders
	 *
	 * Order data retrieval
	 *
	 * @package LightningDashboard/Classes
	 * @since   1.0.0
	 */

	class LDASH_Orders {

		/**
		 * Get an orders customer name
		 *
		 * @since 1.0.0
		 * @param int $order_id Order ID
		 * @param string $type Type of customer name to return
		 * @return string Customers name
		 */

		public function customer_name( $order_id, $type ) {

			if( $type == 'full' ) {

				$first_name = get_post_meta( $order_id, '_billing_first_name', true );
				$last_name = get_post_meta( $order_id, '_billing_last_name', true );
				$customer_name = $first_name . ' ' . $last_name;

			} elseif( $type = 'first' ) {

				$customer_name = get_post_meta( $order_id, '_billing_first_name', true );

			} elseif( $type = 'last' ) {

				$customer_name = get_post_meta( $order_id, '_billing_last_name', true );

			}

			return $customer_name;

		}

		/**
		 * Get order date
		 *
		 * @since 1.0.0
		 * @param int $order_id Order ID
		 * @return string Order date
		 */

		public function date( $order_id ) {

			if( !empty( get_option( 'ldash_general_date_time_date_format' ) ) ) {

				$date = get_the_date( get_option( 'ldash_general_date_time_date_format' ), $order_id );

			} else {

				$date = get_the_date( get_option( 'date_format' ), $order_id ); // Default date format from WordPress

			}

			return $date;

		}

		/**
		 * Get order date and time
		 *
		 * @since 1.0.0
		 * @param int $order_id Order ID
		 * @return string Order date and time
		 */

		public function date_time( $order_id ) {

			return LDASH_Orders::date( $order_id ) . ' ' . LDASH_Orders::time( $order_id );

		}

		/**
		 * Gets order ids
		 *
		 * @since 1.0.0
		 * @param string $option option to filter results
		 * @return array order ids
		 */

		public static function ids( $option ) {

			global $wpdb;

			$ids = array();

			$todays_date_end = date( 'Y-m-d' ) . ' 23:59:59';
			$seven_days_ago = date( 'Y-m-d', strtotime( '-7 days', strtotime( $todays_date_end ) ) ) . ' 00:00:00';
			$thirty_days_ago = date( 'Y-m-d', strtotime( '-30 days', strtotime( $todays_date_end ) ) ) . ' 00:00:00';

			$this_month_start = date( 'Y-m-01', strtotime( date('M') ) ) . ' 00:00:00';
			$this_month_end = date( 'Y-m-t', strtotime( date('M') ) ) . ' 23:59:59';

			$last_month_start = date( 'Y-m-01', strtotime( '-1 month', strtotime( date('M') ) ) ) . ' 00:00:00';
			$last_month_end = date( 'Y-m-t', strtotime( '-1 month', strtotime( date('M') ) ) ) . ' 23:59:59';

			$this_year_start = date( 'Y-01-01', strtotime( date('Y') ) ) . ' 00:00:00';
			$this_year_end = date( 'Y-12-31', strtotime( date('Y') ) ) . ' 23:59:59';

			$last_year_start = date( 'Y-01-01', strtotime( '-1 year', strtotime( date('Y') ) ) ) . ' 00:00:00';
			$last_year_end = date( 'Y-12-31', strtotime( '-1 year', strtotime( date('Y') ) ) ) . ' 23:59:59';

			$post_ids = array();

			if( $option == 'last-7-days' ) {

				$post_ids = $wpdb->get_results( "SELECT ID FROM {$wpdb->prefix}posts WHERE post_type = 'shop_order' AND post_status NOT IN( 'auto-draft', 'wc-auto-draft' ) AND post_date >= '{$seven_days_ago}' AND post_date <= '{$todays_date_end}'");

			} elseif( $option == 'last-30-days' ) {

				$post_ids = $wpdb->get_results( "SELECT ID FROM {$wpdb->prefix}posts WHERE post_type = 'shop_order' AND post_status NOT IN( 'auto-draft', 'wc-auto-draft' ) AND post_date >= '{$thirty_days_ago}' AND post_date <= '{$todays_date_end}'");

			} elseif( $option == 'this-month' ) {

				$post_ids = $wpdb->get_results( "SELECT ID FROM {$wpdb->prefix}posts WHERE post_type = 'shop_order' AND post_status NOT IN( 'auto-draft', 'wc-auto-draft' ) AND post_date >= '{$this_month_start}' AND post_date <= '{$this_month_end}'");

			} elseif( $option == 'last-month' ) {

				$post_ids = $wpdb->get_results( "SELECT ID FROM {$wpdb->prefix}posts WHERE post_type = 'shop_order' AND post_status NOT IN( 'auto-draft', 'wc-auto-draft' ) AND post_date >= '{$last_month_start}' AND post_date <= '{$last_month_end}'");

			} elseif( $option == 'this-year' ) {

				$post_ids = $wpdb->get_results( "SELECT ID FROM {$wpdb->prefix}posts WHERE post_type = 'shop_order' AND post_status NOT IN( 'auto-draft', 'wc-auto-draft' ) AND post_date >= '{$this_year_start}' AND post_date <= '{$this_year_end}'");

			} elseif( $option == 'last-year' ) {

				$post_ids = $wpdb->get_results( "SELECT ID FROM {$wpdb->prefix}posts WHERE post_type = 'shop_order' AND post_status NOT IN( 'auto-draft', 'wc-auto-draft' ) AND post_date >= '{$last_year_start}' AND post_date <= '{$last_year_end}'");

			} else {

				$post_ids = array();

			}

			if( !empty( $post_ids ) ) {

				foreach( $post_ids as $post_id ) {

					$ids[] = $post_id->ID;

				}

			}

			return $ids;

		}

		/**
		 * Gets order ids placed within a date range
		 *
		 * @since 1.0.0
		 * @param string $date_from Date from used to filter results
		 * @param string $date_to Date to used to filter results
		 * @return array order ids
		 */

		public static function ids_for_custom_date( $date_from, $date_to ) {

			global $wpdb;

			$custom_start = date( 'Y-m-d', strtotime( $date_from ) ) . ' 00:00:00';
			$custom_end = date( 'Y-m-d', strtotime( $date_to ) ) . ' 23:59:59';

			$post_ids = $wpdb->get_results( "SELECT ID FROM {$wpdb->prefix}posts WHERE post_type = 'shop_order' AND post_status NOT IN( 'auto-draft', 'wc-auto-draft' ) AND post_date >= '{$custom_start}' AND post_date <= '{$custom_end}'");

			$ids = array();

			if( !empty( $post_ids ) ) {

				foreach( $post_ids as $post_id ) {

					$ids[] = $post_id->ID;

				}

			}

			return $ids;

		}

		/**
		 * Gets order ids placed by a user id
		 *
		 * @since 1.0.0
		 * @param int $user_id The user ID to filter results by
		 * @return array order ids
		 */

		public static function ids_for_user( $user_id ) {

			global $wpdb;

			$post_ids = $wpdb->get_results( "
				SELECT ID
				FROM {$wpdb->prefix}posts
				RIGHT JOIN {$wpdb->prefix}postmeta ON {$wpdb->prefix}posts.ID = {$wpdb->prefix}postmeta.post_id
				WHERE {$wpdb->prefix}postmeta.meta_key = '_customer_user'
				AND {$wpdb->prefix}posts.post_status NOT IN( 'auto-draft', 'wc-auto-draft' )
				AND {$wpdb->prefix}postmeta.meta_value = {$user_id}
			" );

			$ids = array();

			if( !empty( $post_ids ) ) {

				foreach( $post_ids as $post_id ) {

					$ids[] = $post_id->ID;

				}

			}

			return $ids;

		}

		/**
		 * Get order status by order id
		 *
		 * @since 1.0.0
		 * @param int $order_id Order ID
		 * @return string order status minus wc- prefix
		 */

		public static function status( $order_id ) {

			$prefixed_order_status = get_post_status( $order_id );
			return str_replace( 'wc-', '', $prefixed_order_status );

		}

		/**
		 * Get all order statuses available registered in WooCommerce
		 *
		 * @since 1.0.0
		 * @param int $add_trash Adds the trash option to order statuses
		 * @return array Order statuses array with id minus wc- prefix and label
		 */

		public static function statuses( $add_trash ) {

			$order_statuses = array();
			$prefixed_order_statuses = wc_get_order_statuses();

			if( !empty( $prefixed_order_statuses ) ) {

				foreach( $prefixed_order_statuses as $prefixed_order_status => $prefixed_order_status_label ) {

					$order_statuses[ str_replace( 'wc-', '', $prefixed_order_status ) ] = $prefixed_order_status_label;

				}

			}

			if( $add_trash == true ) {

				$order_statuses['trash'] = 'Trash';

			}

			return $order_statuses;

		}

		/**
		 * Get order time
		 *
		 * @since 1.0.0
		 * @param int $order_id Order ID
		 * @return string Order time
		 */

		public function time( $order_id ) {

			if( !empty( get_option( 'ldash_general_date_time_time_format' ) ) ) {

				$time = get_the_time( get_option( 'ldash_general_date_time_time_format' ), $order_id );

			} else {

				$time = get_the_time( get_option( 'time_format' ), $order_id ); // Default time format from WordPress

			}

			return $time;

		}

		/**
		 * Get order total
		 *
		 * @since 1.0.0
		 * @param int $order_id Order ID
		 * @param bool $currency_symbol Enable currency symbol on the total
		 * @return string Order total
		 */

		public function total( $order_id, $currency_symbol ) {

			$order_total = get_post_meta( $order_id, '_order_total', true );
			$order_currency = get_post_meta( $order_id, '_order_currency', true );

			if( $currency_symbol == true ) {

				return get_woocommerce_currency_symbol( $order_currency ) . $order_total;

			} else {

				return $order_total;

			}

		}

	}

	new LDASH_Orders();

}