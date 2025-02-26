<?php
/**
 * Insights Basic functions
 *
 * @package momoacgwc
 * @author MoMo Themes
 * @since v1.2.5
 */
class MoMo_ACGWC_Insights_Functions {
	/**
	 * Retrieve sales data grouped by date.
	 *
	 * This function fetches the total sales from completed shop orders
	 * and groups them by the date of the order.
	 *
	 * @global wpdb $wpdb WordPress database abstraction object.
	 * @return array An array of objects containing the date and total sales.
	 */
	public function get_sales_data() {
		global $wpdb;
		$results = $wpdb->get_results("SELECT DATE(post_date) as date, SUM(meta_value) as total_sales 
									   FROM {$wpdb->prefix}posts 
									   JOIN {$wpdb->prefix}postmeta ON {$wpdb->prefix}posts.ID = {$wpdb->prefix}postmeta.post_id
									   WHERE post_type = 'shop_order' AND post_status = 'wc-completed' 
									   AND meta_key = '_order_total' 
									   GROUP BY DATE(post_date)", OBJECT);
		return $results;
	}
	/**
	 * Get the start and end dates based on a time filter.
	 *
	 * This function calculates the start and end dates for different
	 * time periods such as weekly, monthly, and yearly based on the
	 * provided time filter. If no valid filter is provided, it defaults
	 * to monthly.
	 *
	 * @param string $time_filter The time filter for which to get the
	 *                            date range. Accepts 'weekly', 'monthly',
	 *                            or 'yearly'.
	 * @return void
	 */
	public function momo_get_start_and_end_date( $time_filter ) {
		$current_date      = current_time( 'Y-m-d' );
		$start_of_week_day = get_option( 'start_of_week' );
		$date_format       = get_option( 'date_format' );

		$current_day_of_week = gmdate( 'w', strtotime( $current_date ) );

		$days_to_start_of_week = ( $current_day_of_week < $start_of_week_day )
			? 7 - ( $start_of_week_day - $current_day_of_week )
			: $current_day_of_week - $start_of_week_day;

		$start_of_week = gmdate( 'Y-m-d', strtotime( "-$days_to_start_of_week days", strtotime( $current_date ) ) );
		$end_of_week   = gmdate( 'Y-m-d', strtotime( '+6 days', strtotime( $start_of_week ) ) );

		$start_of_month = gmdate( 'Y-m-01', strtotime( $current_date ) );
		$end_of_month   = gmdate( 'Y-m-t', strtotime( $current_date ) );

		$start_of_year = gmdate( 'Y-01-01', strtotime( $current_date ) );
		$end_of_year   = gmdate( 'Y-12-31', strtotime( $current_date ) );

		switch ( $time_filter ) {
			case 'weekly':
				$start_date = $start_of_week;
				$end_date   = $end_of_week;
				break;

			case 'monthly':
				$start_date = $start_of_month;
				$end_date   = $end_of_month;
				break;

			case 'yearly':
				$start_date = $start_of_year;
				$end_date   = $end_of_year;
				break;

			default:
				$start_date = $start_of_month;
				$end_date   = $end_of_month;
				break;
		}
		return array(
			'start_date' => $start_date,
			'end_date'   => $end_date,
			'start'      => gmdate( $date_format, strtotime( $start_date ) ),
			'end'        => gmdate( $date_format, strtotime( $end_date ) ),
		);
	}
	/**
	 * Returns a string containing the start and end dates of the given time
	 * filter formatted according to the site's date format.
	 *
	 * @param string $time_filter The time filter for which to get the date
	 *                            range. Accepts 'weekly', 'monthly', or
	 *                            'yearly'.
	 *
	 * @return string A string containing the start and end dates of the given
	 *                time filter, separated by ' - '.
	 */
	public function momo_get_date_range_text( $time_filter ) {
		$dates = $this->momo_get_start_and_end_date( $time_filter );
		return $dates['start'] . ' - ' . $dates['end'];
	}
	/**
	 * Get the total revenue of completed orders between a date range.
	 *
	 * The date range is optional and defaults to the last 30 days.
	 *
	 * @param string $time_filter Optional start date of the range.
	 * @return string Formatted total revenue with WooCommerce currency.
	 */
	public function get_total_revenue( $time_filter = 'monthly' ) {
		$dates      = $this->momo_get_start_and_end_date( $time_filter );
		$start_date = $dates['start_date'];
		$end_date   = $dates['end_date'];
		$start_date = gmdate( 'Y-m-d H:i:s', strtotime( $start_date ) );
		$end_date   = gmdate( 'Y-m-d H:i:s', strtotime( $end_date ) );

		$args = array(
			'limit'        => -1,
			'status'       => 'completed',
			'date_created' => $start_date . '...' . $end_date,
		);

		$orders        = wc_get_orders( $args );
		$total_revenue = 0;

		foreach ( $orders as $order ) {
			$total_revenue += $order->get_total();
		}

		return $total_revenue;
	}
	/**
	 * Generates an array of data for the last 12 months containing the month name and total revenue.
	 *
	 * @return array An array of objects containing the month name and total revenue.
	 */
	public function generate_tweleve_monthly_total_revenue() {
		global $momoacgwc;
		$revenue_data = array();
		$current_date = new DateTime();

		for ( $i = 11; $i >= 0; $i-- ) {
			$date = clone $current_date;
			$date->modify( "-$i month" );

			$start_date = $date->format( 'Y-m-01' );
			$end_date   = $date->format( 'Y-m-t' );

			$total_revenue = $momoacgwc->instfn->get_total_revenue( $start_date, $end_date );

			$revenue_data[] = array(
				'month'   => $date->format( 'M Y' ),
				'revenue' => $total_revenue,
			);
		}

		return $revenue_data;
	}
	/**
	 * Calculates the total revenue for a given date range using WooCommerce functions.
	 *
	 * @param string $start_date The start date in 'Y-m-d' format.
	 * @param string $end_date   The end date in 'Y-m-d' format.
	 *
	 * @return float The total revenue for the specified date range.
	 */
	public function get_revenue_by_date_range( $start_date, $end_date ) {
		$orders = wc_get_orders(
			array(
				'status'       => array( 'completed', 'processing' ),
				'limit'        => -1,
				'date_created' => $start_date . '...' . $end_date,
				'return'       => 'ids',
			)
		);

		$total_revenue = 0;

		foreach ( $orders as $order_id ) {
			$order          = wc_get_order( $order_id );
			$total_revenue += $order->get_total(); // Add the total order amount.
		}

		return $total_revenue;
	}

	/**
	 * Generates revenue data based on the given time filter (weekly, monthly, yearly).
	 *
	 * @param string $time_filter The time filter for which to generate revenue data. Accepts 'weekly', 'monthly', or 'yearly'.
	 *
	 * @return array An array containing 'labels' and 'data' keys.
	 */
	public function generate_total_revenue_by_time_filter( $time_filter = 'monthly' ) {
		$revenue_data = array(
			'labels' => array(),
			'data'   => array(),
		);

		$current_date = new DateTime();

		if ( 'weekly' === $time_filter ) {
			$current_date->modify( 'last Sunday' );
			for ( $i = 0; $i < 7; $i++ ) {
				$start_date = $current_date->format( 'Y-m-d' );
				$end_date   = $current_date->format( 'Y-m-d' );

				$total_revenue = $this->get_revenue_by_date_range( $start_date, $end_date );

				$revenue_data['labels'][] = $current_date->format( 'D' ); // Sun, Mon, etc.
				$revenue_data['data'][]   = $total_revenue;

				$current_date->modify( '+1 day' ); // Move to the next day.
			}
		} elseif ( 'monthly' === $time_filter ) {
			// Monthly: Generate data for each day of the current month.
			$days_in_month = $current_date->format( 't' ); // Total days in the current month.
			for ( $i = 1; $i <= $days_in_month; $i++ ) {
				$start_date = $current_date->format( "Y-m-$i" );
				$end_date   = $start_date;

				$total_revenue = $this->get_revenue_by_date_range( $start_date, $end_date );

				$revenue_data['labels'][] = $current_date->format( 'M' ) . ', ' . $i;
				$revenue_data['data'][]   = $total_revenue;
			}
		} elseif ( 'yearly' === $time_filter ) {
			// Yearly: Generate data for each month of the last 12 months.
			for ( $i = 11; $i >= 0; $i-- ) {
				$date = clone $current_date;
				$date->modify( "-$i month" );

				$start_date = $date->format( 'Y-m-01' );
				$end_date   = $date->format( 'Y-m-t' );

				$total_revenue = $this->get_revenue_by_date_range( $start_date, $end_date );

				$revenue_data['labels'][] = $date->format( 'M' ); // Jan, Feb, etc.
				$revenue_data['data'][]   = $total_revenue;
			}
		}

		return $revenue_data;
	}
	/**
	 * Calculates the total revenue for a given date range using WooCommerce functions.
	 *
	 * @param string $start_date The start date in 'Y-m-d' format.
	 * @param string $end_date   The end date in 'Y-m-d' format.
	 *
	 * @return float The total revenue for the specified date range.
	 */
	public function get_order_by_date_range( $start_date, $end_date ) {
		$orders = wc_get_orders(
			array(
				'status'       => array( 'completed', 'processing' ),
				'limit'        => -1,
				'date_created' => $start_date . '...' . $end_date,
				'return'       => 'ids',
			)
		);

		return count( $orders );
	}
	/**
	 * Generates revenue data based on the given time filter (weekly, monthly, yearly).
	 *
	 * @param string $time_filter The time filter for which to generate revenue data. Accepts 'weekly', 'monthly', or 'yearly'.
	 *
	 * @return array An array containing 'labels' and 'data' keys.
	 */
	public function generate_total_order_by_time_filter( $time_filter = 'monthly' ) {
		$revenue_data = array(
			'labels' => array(),
			'data'   => array(),
		);

		$current_date = new DateTime();

		if ( 'weekly' === $time_filter ) {
			$current_date->modify( 'last Sunday' );
			for ( $i = 0; $i < 7; $i++ ) {
				$start_date = $current_date->format( 'Y-m-d' );
				$end_date   = $current_date->format( 'Y-m-d' );

				$total_revenue = $this->get_order_by_date_range( $start_date, $end_date );

				$revenue_data['labels'][] = $current_date->format( 'D' ); // Sun, Mon, etc.
				$revenue_data['data'][]   = $total_revenue;

				$current_date->modify( '+1 day' ); // Move to the next day.
			}
		} elseif ( 'monthly' === $time_filter ) {
			// Monthly: Generate data for each day of the current month.
			$days_in_month = $current_date->format( 't' ); // Total days in the current month.
			for ( $i = 1; $i <= $days_in_month; $i++ ) {
				$start_date = $current_date->format( "Y-m-$i" );
				$end_date   = $start_date;

				$total_revenue = $this->get_order_by_date_range( $start_date, $end_date );

				$revenue_data['labels'][] = $current_date->format( 'M' ) . ', ' . $i;
				$revenue_data['data'][]   = $total_revenue;
			}
		} elseif ( 'yearly' === $time_filter ) {
			// Yearly: Generate data for each month of the last 12 months.
			for ( $i = 11; $i >= 0; $i-- ) {
				$date = clone $current_date;
				$date->modify( "-$i month" );

				$start_date = $date->format( 'Y-m-01' );
				$end_date   = $date->format( 'Y-m-t' );

				$total_revenue = $this->get_order_by_date_range( $start_date, $end_date );

				$revenue_data['labels'][] = $date->format( 'M' ); // Jan, Feb, etc.
				$revenue_data['data'][]   = $total_revenue;
			}
		}

		return $revenue_data;
	}

	/**
	 * Get the total number of completed orders between a date range.
	 *
	 * The date range is optional and defaults to the last 30 days.
	 *
	 * @param string $time_filter Optional start date of the range.
	 * @return int Total number of orders.
	 */
	public function get_total_orders( $time_filter = 'monthly' ) {
		$dates      = $this->momo_get_start_and_end_date( $time_filter );
		$start_date = $dates['start_date'];
		$end_date   = $dates['end_date'];
		$start_date = gmdate( 'Y-m-d H:i:s', strtotime( $start_date ) );
		$end_date   = gmdate( 'Y-m-d H:i:s', strtotime( $end_date ) );

		$args = array(
			'limit'        => -1,
			'status'       => 'completed',
			'date_created' => $start_date . '...' . $end_date,
		);

		$orders       = wc_get_orders( $args );
		$total_orders = count( $orders );

		return $total_orders;
	}
	/**
	 * Generates average order count based on the given time filter (weekly, monthly, yearly).
	 *
	 * @param string $time_filter The time filter for which to generate average order data. Accepts 'weekly', 'monthly', or 'yearly'.
	 *
	 * @return array An array containing 'labels' and 'data' keys with the average order count.
	 */
	public function generate_average_order_by_time_filter( $time_filter = 'monthly' ) {
		$order_data = array(
			'labels' => array(),
			'data'   => array(),
		);

		$current_date = new DateTime();

		if ( 'weekly' === $time_filter ) {
			// Start with last Sunday, then loop through each day of the week.
			$current_date->modify( 'last Sunday' );
			$total_orders = 0;
			$days_count   = 7;

			for ( $i = 0; $i < $days_count; $i++ ) {
				$start_date = $current_date->format( 'Y-m-d' );
				$end_date   = $current_date->format( 'Y-m-d' );

				$orders_count  = $this->get_order_by_date_range( $start_date, $end_date );
				$total_orders += $orders_count;

				$order_data['labels'][] = $current_date->format( 'D' ); // Sun, Mon, etc.
				$order_data['data'][]   = $orders_count;

				$current_date->modify( '+1 day' ); // Move to the next day.
			}

			// Calculate the average orders for the week.
			$average_orders     = $total_orders / $days_count;
			$order_data['data'] = array_fill( 0, $days_count, $average_orders );

		} elseif ( 'monthly' === $time_filter ) {
			// Monthly: Calculate the average for each day of the current month.
			$days_in_month = $current_date->format( 't' ); // Total days in the current month.
			$total_orders  = 0;

			for ( $i = 1; $i <= $days_in_month; $i++ ) {
				$start_date = $current_date->format( "Y-m-$i" );
				$end_date   = $start_date;

				$orders_count  = $this->get_order_by_date_range( $start_date, $end_date );
				$total_orders += $orders_count;

				$order_data['labels'][] = $current_date->format( 'M' ) . ', ' . $i;
				$order_data['data'][]   = $orders_count;
			}

			// Calculate the average orders for the month.
			$average_orders     = $total_orders / $days_in_month;
			$order_data['data'] = array_fill( 0, $days_in_month, $average_orders );

		} elseif ( 'yearly' === $time_filter ) {
			// Yearly: Calculate the average for each month of the last 12 months.
			$total_orders = 0;
			$months_count = 12;

			for ( $i = 11; $i >= 0; $i-- ) {
				$date = clone $current_date;
				$date->modify( "-$i month" );

				$start_date = $date->format( 'Y-m-01' );
				$end_date   = $date->format( 'Y-m-t' );

				$orders_count = $this->get_order_by_date_range( $start_date, $end_date );
				$total_orders += $orders_count;

				$order_data['labels'][] = $date->format( 'M' ); // Jan, Feb, etc.
				$order_data['data'][]   = $orders_count;
			}

			// Calculate the average orders for the year.
			$average_orders = $total_orders / $months_count;
			$order_data['data'] = array_fill( 0, $months_count, $average_orders );
		}

		return $order_data;
	}

	/**
	 * Generate 12 months of total orders data for a chart.
	 *
	 * @return array Data for the chart, with month name and total order count.
	 */
	public function generate_tweleve_monthly_total_order() {
		global $momoacgwc;
		$order_data   = array();
		$current_date = new DateTime();

		for ( $i = 11; $i >= 0; $i-- ) {
			$date = clone $current_date;
			$date->modify( "-$i month" );

			$start_date = $date->format( 'Y-m-01' );
			$end_date   = $date->format( 'Y-m-t' );

			$total_order = $momoacgwc->instfn->get_total_orders( $start_date, $end_date );

			$order_data[] = array(
				'month' => $date->format( 'M Y' ),
				'order' => $total_order,
			);
		}

		return $order_data;
	}
	/**
	 * Calculates the average order value of completed orders within a specified date range.
	 *
	 * The date range is optional and defaults to the last 30 days.
	 *
	 * @param string $time_filter Optional start date of the range.
	 * @return string Formatted average order value with WooCommerce currency.
	 */
	public function get_average_order_value( $time_filter = 'monthly' ) {

		$total_revenue = $this->get_total_revenue( $time_filter );
		$total_orders  = $this->get_total_orders( $time_filter );

		if ( $total_orders > 0 ) {
			$average_order_value = (float) $total_revenue / (int) $total_orders;
		} else {
			$average_order_value = 0;
		}

		return $average_order_value;
	}
	/**
	 * Generates an array of data for the last 12 months containing the month name and average order value.
	 *
	 * This function calculates the average order value for each of the last 12 months
	 * and returns an array with the month name and the calculated average order value.
	 *
	 * @global object $momoacgwc Global instance of the MoMo_ACGWC_Insights_Functions class.
	 * @return array An array of arrays containing the month name and average order value.
	 */
	public function generate_tweleve_monthly_average_order() {
		global $momoacgwc;
		$avgorder_data = array();
		$current_date  = new DateTime();

		for ( $i = 11; $i >= 0; $i-- ) {
			$date = clone $current_date;
			$date->modify( "-$i month" );

			$start_date = $date->format( 'Y-m-01' );
			$end_date   = $date->format( 'Y-m-t' );

			$total_avgorder = $momoacgwc->instfn->get_average_order_value( $start_date, $end_date );

			$avgorder_data[] = array(
				'month'    => $date->format( 'M Y' ),
				'avgorder' => $total_avgorder,
			);
		}

		return $avgorder_data;
	}
	/**
	 * Retrieve recent sales data.
	 *
	 * @param int    $limit The number of sales to retrieve. Defaults to 5.
	 * @param string $time_filter The time filter for the sales data.
	 * @return array An array of sales data, each containing date, total and customer.
	 */
	public function get_recent_sales( $limit = 5, $time_filter = 'monthly' ) {
		$recent_orders = wc_get_orders(
			array(
				'limit'   => $limit,
				'orderby' => 'date',
				'order'   => 'DESC',
				'type'    => 'shop_order',
			)
		);

		$sales_data = array();
		foreach ( $recent_orders as $order ) {
			$data               = $order->get_data();
			$billing_first_name = $data['billing']['first_name'];
			$sales_data[]       = array(
				'date'     => $order->get_date_created()->date( 'Y-m-d' ),
				'total'    => $order->get_total(),
				'customer' => $billing_first_name,
			);
		}
		return $sales_data;
	}

	/**
	 * Collect monthly sales data with key sales drivers for API.
	 *
	 * @param string $start_date The start date for data collection (format: 'Y-m-d').
	 * @param string $end_date The end date for data collection (format: 'Y-m-d').
	 * @return array An array of sales data with monthly totals and key drivers.
	 */
	public function get_monthly_sales_data_with_drivers( $start_date, $end_date ) {
		global $wpdb;

		$orders = wc_get_orders(
			array(
				'limit'        => -1,
				'orderby'      => 'date',
				'order'        => 'ASC',
				'date_created' => $start_date . '...' . $end_date,
				'status'       => 'completed',
			)
		);

		$sales_data = array();

		foreach ( $orders as $order ) {
			$month = $order->get_date_created()->format( 'Y-m' );
			if ( ! isset( $sales_data[ $month ] ) ) {
				$sales_data[ $month ] = array(
					'sales_total'           => 0,
					'discount_total'        => 0,
					'bundles_sales'         => 0,
					'seasonal_indicator'    => $this->get_seasonal_indicator( $month ),
					'promotional_campaigns' => $this->count_promotions( $month ),
				);
			}

			$sales_data[ $month ]['sales_total'] += $order->get_total();

			$discount_total = 0;
			foreach ( $order->get_items( 'coupon' ) as $item ) {
				$discount_total += abs( $item->get_discount() );
			}
			$sales_data[ $month ]['discount_total'] += $discount_total;

			if ( $this->is_bundle_order( $order ) ) {
				$sales_data[ $month ]['bundles_sales'] += $order->get_total();
			}
		}

		return $sales_data;
	}

	/**
	 * Check if an order includes bundled products.
	 *
	 * @param WC_Order $order WooCommerce order object.
	 * @return bool True if the order includes bundles, false otherwise.
	 */
	private function is_bundle_order( $order ) {
		foreach ( $order->get_items() as $item ) {
			$product = $item->get_product();
			if ( $product && has_term( 'bundle', 'product_cat', $product->get_id() ) ) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Get seasonal indicator for a given month.
	 *
	 * @param string $month The month in 'Y-m' format.
	 * @return int A seasonal indicator (1 if seasonal event, 0 otherwise).
	 */
	private function get_seasonal_indicator( $month ) {
		$seasonal_months = array( '12', '11' );
		$month_num       = gmdate( 'm', strtotime( $month . '-01' ) );
		return in_array( $month_num, $seasonal_months, true ) ? 1 : 0;
	}

	/**
	 * Count promotional campaigns for a given month.
	 *
	 * @param string $month The month in 'Y-m' format.
	 * @return int The count of promotional campaigns.
	 */
	private function count_promotions( $month ) {
		return 2;
	}

	/**
	 * Retrieve top selling products.
	 *
	 * @param int    $limit The number of top selling products to retrieve. Defaults to 5.
	 * @param string $time_filter The time filter for the top selling products. Defaults to 'monthly'.
	 * @return array An array of product data, each containing name and price.
	 */
	public function get_top_selling_products( $limit = 5, $time_filter = 'monthly' ) {
		$dates      = $this->momo_get_start_and_end_date( $time_filter );
		$start_date = $dates['start_date'];
		$end_date   = $dates['end_date'];
		$start_date = gmdate( 'Y-m-d H:i:s', strtotime( $start_date ) );
		$end_date   = gmdate( 'Y-m-d H:i:s', strtotime( $end_date ) );

		$orders = wc_get_orders(
			array(
				'status'       => array( 'completed', 'processing' ),
				'date_created' => $start_date . '...' . $end_date,
				'return'       => 'ids',
			)
		);

		if ( empty( $orders ) ) {
			return array();
		}

		$product_sales = array();
		foreach ( $orders as $order_id ) {
			$order = wc_get_order( $order_id );

			foreach ( $order->get_items() as $item ) {
				$product_id = $item->get_product_id();
				$quantity   = $item->get_quantity();

				if ( ! isset( $product_sales[ $product_id ] ) ) {
					$product_sales[ $product_id ] = 0;
				}
				$product_sales[ $product_id ] += $quantity;
			}
		}

		arsort( $product_sales );

		$product_sales = array_slice( $product_sales, 0, $limit, true );

		$product_data = array();
		foreach ( $product_sales as $product_id => $sales ) {
			$product = wc_get_product( $product_id );

			if ( $product ) {
				$product_data[] = array(
					'name'        => $product->get_name(),
					'price'       => $product->get_price(),
					'total_sales' => $sales,
				);
			}
		}
		return $product_data;
	}


	/**
	 * Retrieve sales trends data for the specified period.
	 *
	 * @param string $period The period to retrieve data for ('weekly' or 'monthly').
	 * @return array An array containing 'labels' (days) and 'data' (sales totals).
	 */
	public function get_sales_trends_data( $period = 'monthly' ) {
		/* $labels = array();
		$data   = array();

		$days_to_retrieve = ( 'monthly' === $period ) ? 30 : 7;

		for ( $i = $days_to_retrieve - 1; $i >= 0; $i-- ) {
			$date = new DateTime();
			$date->modify( "-$i day" );

			$labels[] = ( 'monthly' === $period ) ? $date->format( 'd M' ) : $date->format( 'D' );

			$sales_total = $this->get_sales_total_for_date( $date->format( 'Y-m-d' ) );

			$data[] = $sales_total;
		}

		return array(
			'labels' => $labels,
			'data'   => $data
		); */
		$labels = array();
		$data   = array();

		// Get the start and end date based on the period
		$date_range = $this->momo_get_start_and_end_date( $period );

		$start_date = $date_range['start_date'];
		$end_date   = $date_range['end_date'];

		$current_date = new DateTime( $start_date );

		while ( $current_date <= new DateTime( $end_date ) ) {
			if ( 'monthly' === $period ) {
				$labels[] = $current_date->format( 'd M' );
			} elseif ( 'yearly' === $period ) {
				$labels[] = $current_date->format( 'M' );
			} else {
				$labels[] = $current_date->format( 'D' );
			}

			$sales_total = $this->get_sales_total_for_date( $current_date->format( 'Y-m-d' ) );

			$data[] = $sales_total;

			if ( 'monthly' === $period ) {
				$current_date->modify( '+1 day' );
			} elseif ( 'yearly' === $period ) {
				$current_date->modify( '+1 month' );
			} else {
				$current_date->modify( '+1 day' );
			}
		}

		return array(
			'labels' => $labels,
			'data'   => $data,
		);
	}

	/**
	 * Get total sales for a specific date.
	 *
	 * @param string $date The date in 'Y-m-d' format.
	 * @return float The total sales amount for the given date.
	 */
	private function get_sales_total_for_date( $date ) {
		$total  = 0;
		$orders = wc_get_orders(
			array(
				'limit'        => -1,
				'status'       => 'completed',
				'date_created' => $date,
			)
		);

		foreach ( $orders as $order ) {
			$total += $order->get_total();
		}

		return $total;
	}


	/**
	 * Retrieve top viewed products.
	 *
	 * @param int $limit The number of products to retrieve. Defaults to 5.
	 * @return array An array of products, each containing name, price and views.
	 */
	public function get_top_viewed_products( $limit = 5, $time_frame = 'monthly' ) {
		$date_range = $this->momo_get_start_and_end_date( $time_frame );
		$start_date = $date_range['start_date'];
		$end_date   = $date_range['end_date'];

		$args = array(
			'post_type'      => 'product',
			'posts_per_page' => $limit,
			'orderby'        => 'meta_value_num',
			'meta_key'       => 'momo_views_count',
			'order'          => 'DESC',
			'meta_query'     => array(
				array(
					'key'     => 'momo_view_date',
					'value'   => array( $start_date, $end_date ),
					'compare' => 'BETWEEN',
					'type'    => 'DATE',
				),
			),
		);

		$query = new WP_Query( $args );

		$products = array();
		while ( $query->have_posts() ) {
			$query->the_post();
			$product    = wc_get_product( get_the_ID() );
			$products[] = array(
				'name'      => $product->get_name(),
				'price'     => $product->get_price(),
				'views'     => get_post_meta( $product->get_id(), 'momo_views_count', true ),
				'view_date' => get_post_meta( $product->get_id(), 'momo_view_date', true ),
			);
		}

		wp_reset_postdata();

		return $products;
	}
	/**
	 * Retrieve low stock products.
	 *
	 * @param int $limit The number of products to retrieve. Defaults to 5.
	 * @return array An array of products, each containing name, price and stock.
	 */
	public function get_low_stock_products( $limit = 5 ) {
		$args  = array(
			'post_type'      => 'product',
			'posts_per_page' => $limit,
			'meta_key'       => '_stock',
			'meta_query'     => array(
				array(
					'key'     => '_stock',
					'value'   => '5',
					'compare' => '<=',
					'type'    => 'NUMERIC',
				),
			),
			'orderby'        => 'meta_value_num',
			'order'          => 'ASC',
		);
		$query = new WP_Query( $args );

		$products = array();
		while ( $query->have_posts() ) {
			$query->the_post();
			$product    = wc_get_product( get_the_ID() );
			$products[] = array(
				'name'  => $product->get_name(),
				'price' => $product->get_price(),
				'stock' => $product->get_stock_quantity(),
			);
		}
		wp_reset_postdata();
		return $products;
	}

	/**
	 * Retrieve top rated products.
	 *
	 * @param int $limit The number of products to retrieve. Defaults to 5.
	 * @return array An array of products, each containing name, price and rating.
	 */
	public function get_top_rated_products( $limit = 5 ) {
		$args  = array(
			'post_type'      => 'product',
			'posts_per_page' => $limit,
			'meta_key'       => '_wc_average_rating',
			'orderby'        => 'meta_value_num',
			'order'          => 'DESC',
		);
		$query = new WP_Query( $args );

		$products = array();
		while ( $query->have_posts() ) {
			$query->the_post();
			$product    = wc_get_product( get_the_ID() );
			$products[] = array(
				'name'   => $product->get_name(),
				'price'  => $product->get_price(),
				'rating' => $product->get_average_rating(),
			);
		}
		wp_reset_postdata();
		return $products;
	}
	/**
	 * Retrieve top customers by spending.
	 *
	 * @param int $limit The number of top customers to retrieve. Defaults to 5.
	 * @return array An array of customers, each containing name and total spent.
	 */
	public function get_top_customers_by_spending( $limit = 5 ) {
		$customers = array();

		$args = array(
			'status' => array( 'wc-completed', 'wc-processing' ),
			'limit'  => -1,
			'type'   => 'shop_order',
		);

		$orders = wc_get_orders( $args );

		$customer_spending = array();

		foreach ( $orders as $order ) {
			$data        = $order->get_data();
			$customer_id = $order->get_customer_id();
			$total_spent = $order->get_total();

			if ( ! isset( $customer_spending[ $customer_id ] ) ) {
				$customer_spending[ $customer_id ] = 0;
			}

			$customer_spending[ $customer_id ] += $total_spent;
		}

		arsort( $customer_spending );

		$counter = 0;
		foreach ( $customer_spending as $customer_id => $total_spent ) {
			if ( $counter >= $limit ) {
				break;
			}
			$user        = get_user_by( 'id', $customer_id );
			$customers[] = array(
				'name'        => $user ? $user->display_name : esc_html__( 'Guest', 'momoacgwc' ),
				'total_spent' => $total_spent,
			);
			$counter++;
		}

		return $customers;
	}

	/**
	 * Retrieve most frequent customers.
	 *
	 * @param int $limit The number of customers to retrieve. Defaults to 5.
	 *
	 * @return array An array of customer data, each containing name and order count.
	 */
	public function get_most_frequent_customers( $limit = 5 ) {
		$customers = array();

		$args = array(
			'status' => array( 'wc-completed', 'wc-processing' ),
			'limit'  => -1,
			'type'   => 'shop_order',
		);

		$orders = wc_get_orders( $args );

		$customer_orders = array();

		foreach ( $orders as $order ) {
			$customer_id = $order->get_customer_id();
			$data        = $order->get_data();

			if ( ! isset( $customer_orders[ $customer_id ] ) ) {
				$customer_orders[ $customer_id ] = 0;
			}

			$customer_orders[ $customer_id ] += 1;
		}

		arsort( $customer_orders );

		$counter = 0;
		foreach ( $customer_orders as $customer_id => $order_count ) {
			if ( $counter >= $limit ) {
				break;
			}
			$user        = get_user_by( 'id', $customer_id );
			$customers[] = array(
				'name'        => $user ? $user->display_name : esc_html__( 'Guest', 'momoacgwc' ),
				'order_count' => $order_count,
			);
			$counter++;
		}

		return $customers;
	}

	/**
	 * Retrieve recent customer activity.
	 *
	 * @param int $limit The number of recent activities to retrieve. Defaults to 5.
	 * @return array An array of recent customer activities, each containing name, order date, and total amount.
	 */
	public function get_recent_customer_activity( $limit = 5 ) {
		$args   = array(
			'limit'  => $limit,
			'status' => array( 'wc-completed', 'wc-processing' ),
		);
		$orders = wc_get_orders( $args );

		$activity = array();
		foreach ( $orders as $order ) {
			$customer   = $order->get_user();
			$activity[] = array(
				'name'       => $customer ? $customer->display_name : esc_html__( 'Guest', 'momoacgwc' ),
				'order_date' => $order->get_date_created()->date( 'Y-m-d H:i' ),
				'total'      => $order->get_total(),
			);
		}
		return $activity;
	}
	/**
	 * Get the total number of emails sent in the last X days.
	 *
	 * @param int $days Optional number of days to go back. Defaults to 30.
	 * @return int Total number of emails sent in the last X days.
	 */
	public function get_total_emails_sent( $days = 30 ) {
		return 120;
	}

	/**
	 * Retrieve recent email activity.
	 *
	 * @param int $limit The number of recent activities to retrieve. Defaults to 5.
	 * @return array An array of recent email activities, each containing subject, date sent, and status.
	 */
	public function get_recent_email_activity( $limit = 5 ) {
		return array(
			array( 'subject' => 'Weekly Sales Update', 'date_sent' => '2024-10-30', 'status' => 'Opened' ),
			array( 'subject' => 'New Arrivals for You', 'date_sent' => '2024-10-29', 'status' => 'Clicked' ),
			array( 'subject' => 'Your Cart is Waiting', 'date_sent' => '2024-10-28', 'status' => 'Opened' ),
			array( 'subject' => 'Special Offer Just for You!', 'date_sent' => '2024-10-27', 'status' => 'Not Opened' ),
			array( 'subject' => 'Product Recommendations', 'date_sent' => '2024-10-26', 'status' => 'Opened' ),
		);
	}


	/**
	 * Retrieve the email engagement rates.
	 *
	 * This function returns the mock email engagement rates including
	 * open rate and click-through rate as percentages.
	 *
	 * @return array An associative array containing:
	 *               - 'open_rate': int The percentage of emails opened.
	 *               - 'click_rate': int The percentage of emails clicked through.
	 */
	public function get_email_engagement_rates() {
		return array(
			'open_rate'  => 45,
			'click_rate' => 30,
		);
	}

	/**
	 * Retrieves an array of revenue and order data for the last 6 months.
	 *
	 * @param string $time_filter Optional start date of the range.
	 * 
	 * @return array An array of objects containing the month, total revenue, and total orders for each month.
	 */
	public function momo_get_revenue_vs_orders_data( $time_filter = 'monthly' ) {
		$date_range = $this->momo_get_start_and_end_date( $time_filter );
		$start_date = $date_range['start_date'];
		$end_date   = $date_range['end_date'];

		$current_date = new DateTime( $start_date );
		$labels       = array();
		$orders_data  = array();
		$revenue_data = array();
		while ( $current_date <= new DateTime( $end_date ) ) {
			if ( 'monthly' === $time_filter ) {
				$labels[] = $current_date->format( 'd M' );
			} elseif ( 'yearly' === $time_filter ) {
				$labels[] = $current_date->format( 'M Y' );
			} else {
				$labels[] = $current_date->format( 'D, d M' );
			}

			$current_start = $current_date->format( 'Y-m-d 00:00:00' );
			$current_end   = $current_date->format( 'Y-m-d 23:59:59' );

			if ( 'yearly' === $time_filter ) {
				$current_start = $current_date->format( 'Y-m-01 00:00:00' );
				$current_end   = $current_date->format( 'Y-m-t 23:59:59' );
			}

			$args = array(
				'limit'        => -1,
				'status'       => array( 'wc-completed', 'wc-processing' ),
				'date_created' => $current_start . '...' . $current_end,
			);

			$orders = wc_get_orders( $args );

			$total_revenue = 0;
			$total_orders  = count( $orders );

			foreach ( $orders as $order ) {
				$total_revenue += $order->get_total();
			}

			$orders_data[]  = $total_orders;
			$revenue_data[] = $total_revenue;

			if ( 'monthly' === $time_filter ) {
				$current_date->modify( '+1 day' );
			} elseif ( 'yearly' === $time_filter ) {
				$current_date->modify( '+1 month' );
			} else {
				$current_date->modify( '+1 day' );
			}
		}

		return array(
			'labels'  => $labels,
			'orders'  => $orders_data,
			'revenue' => $revenue_data,
		);
	}
	/**
	 * Retrieves an array of category performance data between a given date range.
	 *
	 * This function takes two date parameters in the format 'Y-m-d' and returns an
	 * array of category performance data. The array contains the category name,
	 * total revenue, and total orders for each category.
	 *
	 * @param string $time_filter The time filter for which to get the category
	 *                            performance data. Accepts 'weekly', 'monthly',or
	 *                            'yearly'.
	 *
	 * @return array An array of category performance data.
	 */
	public function momo_get_category_performance( $time_filter ) {
		$date_range = $this->momo_get_start_and_end_date( $time_filter );
		$start_date = $date_range['start_date'];
		$end_date   = $date_range['end_date'];

		$args = array(
			'status'     => array( 'completed', 'processing' ),
			'date_query' => array(
				'after'     => $start_date,
				'before'    => $end_date,
				'inclusive' => true,
			),
			'return'     => 'ids',
		);

		$orders = wc_get_orders( $args );

		$category_performance = array();

		foreach ( $orders as $order_id ) {
			$order = wc_get_order( $order_id );

			foreach ( $order->get_items() as $item_id => $item ) {
				$product = $item->get_product();
				if ( $product ) {
					$terms = get_the_terms( $product->get_id(), 'product_cat' );

					if ( $terms && ! is_wp_error( $terms ) ) {
						foreach ( $terms as $term ) {
							if ( ! isset( $category_performance[ $term->term_id ] ) ) {
								$category_performance[ $term->term_id ] = [
									'category_name' => $term->name,
									'total_revenue' => 0,
									'total_orders'  => 0,
								];
							}

							$total_price = $item->get_total();

							$category_performance[ $term->term_id ]['total_revenue'] += $total_price;
							$category_performance[ $term->term_id ]['total_orders']  += 1;
						}
					}
				}
			}
		}

		$performance_data = array();
		foreach ( $category_performance as $category_id => $performance ) {
			$performance_data[] = [
				'category_name' => $performance['category_name'],
				'total_revenue' => $performance['total_revenue'],
				'total_orders'  => $performance['total_orders'],
			];
		}

		return $performance_data;
	}
	/**
	 * Retrieves customer cohort data for charts with periods, revenue, and customer counts.
	 *
	 * @param string $time_filter The time filter for chart labels ('weekly', 'monthly', 'yearly').
	 * @return array An array of cohort data with periods, revenue, and customer counts.
	 */
	public function momo_get_customer_cohort_data_woocommerce( $time_filter = 'monthly' ) {
		$cohorts = array();

		$date_range   = $this->momo_get_start_and_end_date( $time_filter );
		$start_date   = new DateTime( $date_range['start_date'] );
		$end_date     = new DateTime( $date_range['end_date'] );
		$current_date = clone $start_date;

		while ( $current_date <= $end_date ) {
			if ( 'weekly' === $time_filter ) {
				$label = $current_date->format( 'D' );
				$current_date->modify( '+1 day' );
			} elseif ( 'monthly' === $time_filter ) {
				$label = $current_date->format( 'j' );
				$current_date->modify( '+1 day' );
			} elseif ( 'yearly' === $time_filter ) {
				$label = $current_date->format( 'M' );
				$current_date->modify( '+1 month' );
			}

			$cohorts[ $label ] = array(
				'period'         => $label,
				'revenue'        => 0,
				'customer_count' => 0,
			);
		}

		$args       = array(
			'role'    => 'customer',
			'fields'  => array( 'ID', 'user_registered' ),
			'orderby' => 'user_registered',
			'order'   => 'ASC',
		);
		$user_query = new WP_User_Query( $args );

		if ( $user_query->get_results() ) {
			foreach ( $user_query->get_results() as $user ) {
				$user_registered = new DateTime( $user->user_registered );

				if ( $user_registered < $start_date || $user_registered > $end_date ) {
					continue;
				}

				foreach ( $cohorts as $label => &$cohort ) {
					if ( 'weekly' === $time_filter && $user_registered->format( 'D' ) === $label ) {
						$matched_period = $label;
					} elseif ( 'monthly' === $time_filter && $user_registered->format( 'j' ) == $label ) {
						$matched_period = $label;
					} elseif ( 'yearly' === $time_filter && $user_registered->format( 'M' ) === $label ) {
						$matched_period = $label;
					} else {
						continue;
					}

					$orders = wc_get_orders(
						array(
							'customer' => $user->ID,
							'status'   => array( 'completed', 'processing' ),
							'return'   => 'ids',
						)
					);

					$total_revenue = 0;
					foreach ( $orders as $order_id ) {
						$order          = wc_get_order( $order_id );
						$total_revenue += $order->get_total();
					}

					$cohorts[ $matched_period ]['revenue']        += $total_revenue;
					$cohorts[ $matched_period ]['customer_count'] += 1;

					break;
				}
			}
		}

		$result = array(
			'period'         => array_column( $cohorts, 'period' ),
			'revenue'        => array_column( $cohorts, 'revenue' ),
			'customer_count' => array_column( $cohorts, 'customer_count' ),
		);
		return $result;
	}



	/**
	 * Retrieves the overall forecast and actual data for revenue, orders, and sales.
	 *
	 * This function fetches cached insights for predicted and actual revenue,
	 * orders, weekly sales, and monthly sales. It aggregates this data into an
	 * associative array, separating predicted and actual values.
	 *
	 * @param string $time_filter The time filter for chart labels ('weekly', 'monthly', 'yearly').
	 * @return array An associative array containing predicted and actual data for revenue, orders, weekly sales, and monthly sales.
	 *
	 */
	public function momo_get_overall_forecast_with_actual( $time_filter = 'monthly' ) {
		global $momoacgwc;
		$revenue_insights = $momoacgwc->instfn->momo_get_cached_insight(
			'momo_revenue_insights_' . $time_filter,
			array( $momoacgwc->instapi, 'get_revenue_insights_data' ),
			DAY_IN_SECONDS,
			$time_filter
		);

		$predicted_revenue = $revenue_insights['data'];
		$actual_revenue    = $revenue_insights['actual'];

		$order_insights = $momoacgwc->instfn->momo_get_cached_insight(
			'momo_order_insights_' . $time_filter,
			array( $momoacgwc->instapi, 'get_order_insights_data' ),
			DAY_IN_SECONDS,
			$time_filter
		);

		$predicted_orders = $order_insights['data'];
		$actual_orders    = $order_insights['actual'];

		$weekly_sale_insights = $momoacgwc->instfn->momo_get_cached_insight(
			'momo_weekly_sales_insights',
			array( $momoacgwc->instapi, 'get_sales_trends_data_insights' ),
			DAY_IN_SECONDS,
			'weekly'
		);

		$predicted_weekly_sales = $weekly_sale_insights['data'];
		$actual_weekly_sales    = $weekly_sale_insights['actual'];

		$monthly_sale_insights = $momoacgwc->instfn->momo_get_cached_insight(
			'momo_monthly_sales_insights',
			array( $momoacgwc->instapi, 'get_sales_trends_data_insights' ),
			DAY_IN_SECONDS,
			'monthly'
		);

		$predicted_monthly_sales = $monthly_sale_insights['data'];
		$actual_monthly_sales    = $monthly_sale_insights['actual'];

		$overall_forecast = array(
			'predicted' => array(
				'total_revenue'         => $predicted_revenue,
				'total_orders'          => $predicted_orders,
				'average_weekly_sales'  => $predicted_weekly_sales,
				'average_monthly_sales' => $predicted_monthly_sales,
			),
			'actual'    => array(
				'total_revenue'         => $actual_revenue,
				'total_orders'          => $actual_orders,
				'average_weekly_sales'  => $actual_weekly_sales,
				'average_monthly_sales' => $actual_monthly_sales,
			),
		);

		return $overall_forecast;
	}

	/**
	 * Retrieves an array of refund and return data for the current month.
	 *
	 * @param string $time_filter The time filter for which to get the
	 *                            refund and return data. Accepts 'weekly',
	 *                            'monthly', or 'yearly'.
	 *
	 * @return array An array of refund and return data.
	 */
	public function momo_get_refund_and_returns_data( $time_filter = 'monthly' ) {
		$refunded_data = array();

		$date_range = $this->momo_get_start_and_end_date( $time_filter );

		$start_date = $date_range['start_date'];
		$end_date   = $date_range['end_date'];

		$args = array(
			'status'       => 'refunded',
			'date_created' => $start_date . '...' . $end_date,
			'return'       => 'ids',
		);

		$orders = wc_get_orders( $args );
		foreach ( $orders as $order_id ) {
			$order   = wc_get_order( $order_id );
			$refunds = $order->get_refunds();

			foreach ( $refunds as $refund ) {
				$refund_reason = $refund->get_meta( 'refund_reason', true );
				$refund_amount = $refund->get_total();
				$order_date    = $order->get_date_created()->format( 'Y-m-d' );

				$refund_amount = abs( $refund->get_total() );
				$refund_date   = $refund->get_date_created()->format( 'Y-m-d' );

				$refunded_data[] = array(
					'order_id'      => $order_id,
					'refund_amount' => $refund_amount,
					'refund_reason' => $refund_reason ? $refund_reason : esc_html__( 'No reason provided', 'momoacgwc' ),
					/* 'order_date'    => $order_date, */
					'order_date'    => $refund_date,
					'refund_date'   => $refund_date,
				);
			}
		}

		return $refunded_data;
	}
	/**
	 * Retrieves the total refund amount for a given date range.
	 *
	 * @param array  $refund_data An array of refund data (containing order_date, refund_reason, and refund_amount).
	 * @param string $start_date The start date of the range.
	 * @param string $end_date The end date of the range.
	 *
	 * @return int The total refund amount for the given date range.
	 */
	private function get_refund_total_for_date_range( $refund_data, $start_date, $end_date ) {
		$total_refunds = 0;

		foreach ( $refund_data as $data ) {
			$refund_date = $data['order_date'];

			$refund_date_obj = new DateTime( $refund_date );
			$start_date_obj  = new DateTime( $start_date );
			$end_date_obj    = new DateTime( $end_date );

			if ( $refund_date_obj >= $start_date_obj && $refund_date_obj <= $end_date_obj ) {
				$total_refunds += $data['refund_amount'];
			}
		}

		return $total_refunds;
	}
	/**
	 * Aggregate refund data by month.
	 *
	 * The function takes an array of refund data (containing order_date, refund_reason, and refund_amount)
	 * and returns an array of objects containing the total refund amount and an associative array of refund reasons
	 * for each month.
	 *
	 * @param array  $refund_data An array of refund data.
	 * @param string $period The time filter to group the refunds by ('weekly', 'monthly', or 'yearly').
	 * @return array An array of objects containing the total refund amount and refund reasons for each month.
	 */
	public function momo_aggregate_refunds_by_timeframe( $refund_data, $period ) {
		$date_range   = $this->momo_get_start_and_end_date( $period );
		$start_date   = new DateTime( $date_range['start_date'] );
		$end_date     = new DateTime( $date_range['end_date'] );
		$current_date = clone $start_date;

		$aggregated_data = array(
			'labels' => array(),
			'data'   => array(),
		);
		while ( $current_date <= $end_date ) {
			$refund_total = 0;
			if ( 'weekly' === $period ) {
				$day_of_week = $current_date->format( 'D' );
				if ( ! in_array( $day_of_week, $aggregated_data['labels'], true ) ) {
					$aggregated_data['labels'][] = $day_of_week;
				}

				$refund_total = $this->get_refund_total_for_date_range(
					$refund_data,
					$current_date->format( 'Y-m-d' ),
					$current_date->format( 'Y-m-d' )
				);

				$current_date->modify( '+1 day' );
			} elseif ( 'monthly' === $period ) {
				$day_of_month = $current_date->format( 'M, j' );
				if ( ! in_array( $day_of_month, $aggregated_data['labels'], true ) ) {
					$aggregated_data['labels'][] = $day_of_month;
				}

				$refund_total = $this->get_refund_total_for_date_range(
					$refund_data,
					$current_date->format( 'Y-m-d' ),
					$current_date->format( 'Y-m-d' )
				);

				$current_date->modify( '+1 day' );
			} elseif ( 'yearly' === $period ) {
				$month = $current_date->format( 'M' );
				if ( ! in_array( $month, $aggregated_data['labels'], true ) ) {
					$aggregated_data['labels'][] = $month;
				}

				$month_start  = clone $current_date;
				$month_end    = ( clone $current_date )->modify( 'last day of this month' );
				$refund_total = $this->get_refund_total_for_date_range(
					$refund_data,
					$month_start->format( 'Y-m-d' ),
					$month_end->format( 'Y-m-d' )
				);

				$current_date->modify( 'first day of next month' );
			}

			$aggregated_data['data'][] = $refund_total;
		}

		return $aggregated_data;
	}

	/**
	 * Generic function to fetch API data and cache it with a transient.
	 *
	 * @param string   $transient_name The name of the transient.
	 * @param callable $api_callback The API function to call if the transient does not exist.
	 * @param int      $expiration The expiration time for the transient in seconds.
	 * @param mixed    ...$args Additional arguments to pass to the callback function.
	 * @return mixed The cached data or API response.
	 */
	public function momo_get_cached_insight( $transient_name, $api_callback, $expiration = DAY_IN_SECONDS, ...$args ) {
		$data = get_transient( $transient_name );

		if ( false === $data ) {
			$data = call_user_func_array( $api_callback, $args );

			set_transient( $transient_name, $data, $expiration );
		}

		return $data;
	}
	/**
	 * Displays a dismissible notice with a message.
	 *
	 * @param string $message The message to display in the notice.
	 */
	public function momo_display_pro_notice( $message ) {
		?>
		<div class="momo-insights-pro-notice">
			<p><?php echo wp_kses_post( $message ); ?></p>
			<span class="momo-pro-label"><?php esc_html_e( 'PRO', 'momoacgwc' ); ?></span>
		</div>
		<?php
	}
}
