<?php
/**
 * Hosts code for filtering and generating reports on server side
 * used by DataTables to prevent browser rendering issues
 *
 * @package     EDD_Enhanced_Sales_Reports
 * @since       1.1.14
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'EDD_Enhanced_Sales_Reports_Filtering' ) ) {
	/**
	 * EDD_Enhanced_Sales_Reports_Filtering class
	 *
	 * @since       1.0.0
	 */
	class EDD_Enhanced_Sales_Reports_Filtering {
		/**
		 * Returns filtered rows from cache file for Products.
		 *
		 * @param string $cache_file Full path to cache file.
		 * @return string|null
		 */
		public static function by_products( $cache_file ) {

			if ( ! file_exists( $cache_file ) ) {
				$all_rows = array();
			} else {
				$all_rows = unserialize( file_get_contents( $cache_file ) );
			}

			$totals_row = array();
			$totals     = $cache_file . '-totals';
			if ( file_exists( $totals ) ) {
				$totals_row = unserialize( file_get_contents( $totals ) );
			}

			$output = array(
				'draw'         => ( isset( $_GET['draw'] ) ? intval( wp_unslash( $_GET['draw'] ) ) : 50 ),
				'recordsTotal' => count( $all_rows ),
				'data'         => array(),
			);

			$output['recordsFiltered'] = count( $all_rows );
			$all_rows                  = self::filter_array_rows( $all_rows );
			$currency                  = edd_currency_symbol();

			foreach ( $all_rows as $product_id => $report_row ) {

				$countries           = array_unique( $report_row['countries'] );
				$customers           = array_unique( $report_row['customers'] );
				$average_order_value = 0;
				$net_earnings        = $report_row['total_amount'] - $report_row['tax'] - $report_row['discount'];
				if ( $net_earnings > 0 ) {
					$average_order_value = $net_earnings / count( $report_row['paid_orders'] );
				}

				$vendor = '';
				if ( ! empty( $report_row['vendor'] ) ) {
					$vendor .= '<a href="' . admin_url( 'user-edit.php?user_id=' . $report_row['vendor'] ) . '" target="_blank">';
				}

				$vendor .= $report_row['vendor_name'];

				if ( ! empty( $report_row['vendor'] ) ) {
					$vendor .= '</a>';
				}

				$total_orders = count( array_unique( $report_row['order_ids'] ) );

				$this_row = array(
					'<a href="' . admin_url( 'post.php?post=' . $product_id . '&action=edit' ) . '" target="_blank">' . $product_id . '</a>',
					'<a href="' . admin_url( 'post.php?post=' . $product_id . '&action=edit' ) . '" target="_blank">' . $report_row['product_name'] . '</a>',
					$vendor,
					$total_orders,
					count( $customers ),
					count( $countries ),
					$report_row['total_amount'],
					$report_row['discount'],
					$report_row['tax'],
					$report_row['total_amount'] - $report_row['tax'] - $report_row['discount'],
				);

				if ( EDD_ENHANCED_SALES_REPORTS_COMMISSIONS_ACTIVE ) :
					$this_row[] = $report_row['commissions'];
				endif;

				$this_row[] = $average_order_value;

				$output['data'][] = $this_row;
			}

			$GLOBALS['edd_enhanced_sales_reports_numeric_columns'] = array(
				0,
				3,
				4,
				5,
				6,
				7,
				8,
				9,
				10,
			);
			if ( EDD_ENHANCED_SALES_REPORTS_COMMISSIONS_ACTIVE ) {
				$GLOBALS['edd_enhanced_sales_reports_numeric_columns'][] = 11;
			}

			$output = self::apply_pagination_sorting( $output );

			if ( ! empty( $totals_row ) ) {

				if ( isset( $GLOBALS['__edd_esr_has_more_data'] ) ) {
					$this_row = array(
						'',
						'...',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
					);
					if ( EDD_ENHANCED_SALES_REPORTS_COMMISSIONS_ACTIVE ) :
						$this_row[] = '';
					endif;

					$output['data'][] = $this_row;
				}

				$this_row = array(
					'',
					'<strong>' . __( 'Totals', 'edd-enhanced-sales-reports' ) . '</strong>',
					'',
					$totals_row['orders'],
					$totals_row['customers'],
					$totals_row['countries'],
					$totals_row['gross_earnings'],
					$totals_row['discount'],
					$totals_row['tax'],
					$totals_row['net_earnings'],
				);

				if ( EDD_ENHANCED_SALES_REPORTS_COMMISSIONS_ACTIVE ) :
					$this_row[] = $totals_row['commissions'];
				endif;

				$average_order_value = 0;

				if ( $totals_row['net_earnings'] > 0 ) {
					$average_order_value = $totals_row['net_earnings'] / $totals_row['paid_orders'];
				}

				$this_row[] = $average_order_value;

				$output['data'][] = $this_row;
			}

			foreach ( $output['data'] as $report_row_index => &$report_row ) {
				// Add Currency Symbol to Amount Columns.
				$total_items = count( $report_row );
				for ( $index = 6; $index < $total_items; $index ++ ) {
					if ( '' === $output['data'][ $report_row_index ][ $index ] ) {
						continue;
					}
					$output['data'][ $report_row_index ][ $index ] = $currency . number_format( floatval( $report_row[ $index ] ), 2 );
				}

				$output['data'][ $report_row_index ][3] = number_format( floatval( $report_row[3] ), 0 );
				$output['data'][ $report_row_index ][4] = number_format( floatval( $report_row[4] ), 0 );
				$output['data'][ $report_row_index ][5] = number_format( floatval( $report_row[5] ), 0 );
			}

			return $output;
		}

		/**
		 * Returns filtered rows from cache file for Ordered Products.
		 *
		 * @param string $cache_file Full path to cache file.
		 * @return string|null
		 */
		public static function by_ordered_products( $cache_file ) {

			if ( ! file_exists( $cache_file ) ) {
				$all_rows = array();
			} else {
				$all_rows = unserialize( file_get_contents( $cache_file ) );
			}

			$totals_row = array();
			$totals     = $cache_file . '-totals';
			if ( file_exists( $totals ) ) {
				$totals_row = unserialize( file_get_contents( $totals ) );
			}

			$output = array(
				'draw'         => ( isset( $_GET['draw'] ) ? intval( wp_unslash( $_GET['draw'] ) ) : 50 ),
				'recordsTotal' => count( $all_rows ),
				'data'         => array(),
			);

			$output['recordsFiltered'] = count( $all_rows );
			$all_rows                  = self::filter_array_rows( $all_rows );
			$currency                  = edd_currency_symbol();

			foreach ( $all_rows as $product_id => $report_row ) {

				$countries    = array_unique( $report_row['countries'] );
				$customers    = array_unique( $report_row['customers'] );
				$product_name = $report_row['product_name'];

				$net_earnings        = $report_row['total_amount'] - $report_row['tax'] - $report_row['discount'];
				$average_order_value = 0;
				if ( $net_earnings > 0 ) {
					$average_order_value = $net_earnings / $report_row['quantity'];
				}

				$vendor = '';
				if ( ! empty( $report_row['vendor'] ) ) {
					$vendor .= '<a href="' . admin_url( 'user-edit.php?user_id=' . $report_row['vendor'] ) . '" target="_blank">';
				}

				$vendor .= $report_row['vendor_name'];

				if ( ! empty( $report_row['vendor'] ) ) {
					$vendor .= '</a>';
				}

				$this_row = array(
					'<a href="' . admin_url( 'edit.php?post_type=download&page=edd-payment-history&view=view-order-details&id=' . $report_row['order_id'] ) . '">' . $report_row['order_id'] . '</a>',
					$report_row['order_date'],
					'<a href="' . admin_url( 'post.php?post=' . $report_row['product_id'] . '&action=edit' ) . '">' . $product_name . '</a>',
					$vendor,
				);

				$customer_data = '';
				if ( ! empty( $report_row['customer_id'] ) ) {
					$customer_name = $report_row['customer_name'];
					$customer      = $report_row['customer'];
					$user          = $report_row['user'];

					$customer_data = '<a href="#" class="edd-enhanced-sales-reports-view-details">' . $customer_name . '</a>';

					$customer_data .=
						'<div class="edd-enhanced-sales-reports-details" style="display:none;">
							<h3>' . __( 'Customer/User Details for Order#', 'edd-enhanced-sales-reports' ) . $report_row['order_id'] . '</h3>
							<ul>
								<li>
									<strong>' . __( 'Customer ID:', 'edd-enhanced-sales-reports' ) . '</strong>
									<span>' . $report_row['order_id'] . '</span>
								</li>
								<li>
									<strong>' . __( 'Customer Name:', 'edd-enhanced-sales-reports' ) . '</strong>
									<span>' . $customer_name . ' <a href="' . admin_url( 'edit.php?post_type=download&page=edd-customers&view=overview&id=' . $report_row['customer_id'] ) . '" target="_blank">' . __( 'View Customer Profile', 'edd-enhanced-sales-reports' ) . '</a></span>
								</li>
								<li>
									<strong>' . __( 'Customer Email:', 'edd-enhanced-sales-reports' ) . '</strong>
									<span>' . ( false !== $customer ? $customer->email : 'n/a' ) . '</span>
								</li>
								<li>
									<strong>' . __( 'Customer Country:', 'edd-enhanced-sales-reports' ) . '</strong>
									<span>' . $report_row['country'] . '</span>
								</li>
								<li>
									<strong>' . __( 'User ID:', 'edd-enhanced-sales-reports' ) . '</strong>
									<span>' . ( false !== $user ? $user->ID : 'n/a' ) . '</span>
								</li>';

					if ( false !== $user ) {
						$customer_data .=
							'<li>
											<strong>' . __( 'Display Name:', 'edd-enhanced-sales-reports' ) . '</strong>
											<span>' . $user->display_name . '</span>
										</li>
										<li>
											<span><a href="' . admin_url( 'user-edit.php?user_id=' . $user->ID ) . '" target="_blank">' . __( 'View User Profile', 'edd-enhanced-sales-reports' ) . '</a></span>
										</li>';
					}
					$customer_data .=
						'</ul>
						</div>';

				}

				$this_row[] = $customer_data;
				$this_row[] = $report_row['gateway'];
				$this_row[] = $report_row['new_existing'];

				$this_row[] = $report_row['quantity'];

				$this_row[] = $report_row['total_amount'];
				$this_row[] = $report_row['tax'];
				$this_row[] = $report_row['discount'];
				$this_row[] = $report_row['total_amount'] - $report_row['tax'] - $report_row['discount'];

				if ( EDD_ENHANCED_SALES_REPORTS_COMMISSIONS_ACTIVE ) :
					$this_row[] = $report_row['commissions'];
				endif;

				$this_row[] = $average_order_value;

				$output['data'][] = $this_row;
			}

			$GLOBALS['edd_enhanced_sales_reports_numeric_columns'] = array(
				7,
				8,
				9,
				10,
				11,
				12,
			);
			if ( EDD_ENHANCED_SALES_REPORTS_COMMISSIONS_ACTIVE ) {
				$GLOBALS['edd_enhanced_sales_reports_numeric_columns'][] = 13;
			}

			$output = self::apply_pagination_sorting( $output );

			if ( ! empty( $totals_row ) ) {

				if ( isset( $GLOBALS['__edd_esr_has_more_data'] ) ) {
					$this_row = array(
						'',
						'...',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
					);
					if ( EDD_ENHANCED_SALES_REPORTS_COMMISSIONS_ACTIVE ) :
						$this_row[] = '';
					endif;

					$output['data'][] = $this_row;
				}

				$this_row = array(
					'',
					'<strong>' . __( 'Totals', 'edd-enhanced-sales-reports' ) . '</strong>',
					'',
					'',
					'',
					'',
					'',
					$totals_row['total_quantity'],
					$totals_row['gross_earnings'],
					$totals_row['tax'],
					$totals_row['discount'],
					$totals_row['net_earnings'],
				);

				if ( EDD_ENHANCED_SALES_REPORTS_COMMISSIONS_ACTIVE ) :
					$this_row[] = $totals_row['commissions'];
				endif;

				$average_order_value = 0;

				if ( $totals_row['net_earnings'] > 0 ) {
					$average_order_value = $totals_row['net_earnings'] / $totals_row['paid_orders'];
				}

				$this_row[] = $average_order_value;

				$output['data'][] = $this_row;
			}

			foreach ( $output['data'] as $report_row_index => &$report_row ) {
				// Add Currency Symbol to Amount Columns.
				$total_items = count( $report_row );
				for ( $index = 8; $index < $total_items; $index ++ ) {
					if ( '' === $output['data'][ $report_row_index ][ $index ] ) {
						continue;
					}
					$output['data'][ $report_row_index ][ $index ] = $currency . number_format( floatval( $report_row[ $index ] ), 2 );
				}

				$output['data'][ $report_row_index ][7] = number_format( floatval( $report_row[7] ), 0 );
			}

			return $output;
		}

		/**
		 * Returns filtered rows from cache file for Customers.
		 *
		 * @param string $cache_file Full path to cache file.
		 * @return string|null
		 */
		public static function by_customer( $cache_file ) {

			if ( ! file_exists( $cache_file ) ) {
				$all_rows = array();
			} else {
				$all_rows = unserialize( file_get_contents( $cache_file ) );
			}

			$totals_row = array();
			$totals     = $cache_file . '-totals';
			if ( file_exists( $totals ) ) {
				$totals_row = unserialize( file_get_contents( $totals ) );
			}

			$output = array(
				'draw'         => ( isset( $_GET['draw'] ) ? intval( wp_unslash( $_GET['draw'] ) ) : 50 ),
				'recordsTotal' => count( $all_rows ),
				'data'         => array(),
			);

			$output['recordsFiltered'] = count( $all_rows );
			$all_rows                  = self::filter_array_rows( $all_rows );
			$currency                  = edd_currency_symbol();

			foreach ( $all_rows as $customer_id => $report_row ) {

				$this_row = array(
					'<a href="' . $report_row['customer_url'] . '">' . $report_row['customer_name'] . '<br>' . $report_row['customer_email'] . '</a>',
					$report_row['country_name'],
					$report_row['registration_date'],
					$report_row['new_existing'],
					count( $report_row['products'] ),
					$report_row['total_orders'],
					count( $report_row['vendors'] ),

					$report_row['total_amount'],
					$report_row['tax'],
					$report_row['discount'],
					$report_row['total_amount'] - $report_row['tax'] - $report_row['discount'],
				);

				if ( EDD_ENHANCED_SALES_REPORTS_COMMISSIONS_ACTIVE ) :
					$this_row[] = $report_row['commissions'];
				endif;

				$this_row[] = $report_row['average_order_value'];

				$output['data'][] = $this_row;
			}

			$GLOBALS['edd_enhanced_sales_reports_numeric_columns'] = array(
				4,
				5,
				6,
				7,
				8,
				9,
				10,
				11,
			);
			if ( EDD_ENHANCED_SALES_REPORTS_COMMISSIONS_ACTIVE ) {
				$GLOBALS['edd_enhanced_sales_reports_numeric_columns'][] = 12;
			}

			$output = self::apply_pagination_sorting( $output );

			if ( ! empty( $totals_row ) ) {

				if ( isset( $GLOBALS['__edd_esr_has_more_data'] ) ) {
					$this_row = array(
						'...',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
					);
					if ( EDD_ENHANCED_SALES_REPORTS_COMMISSIONS_ACTIVE ) :
						$this_row[] = '';
					endif;

					$output['data'][] = $this_row;
				}

				$this_row = array(
					'<strong>' . __( 'Totals', 'edd-enhanced-sales-reports' ) . '</strong>',
					'',
					'',
					'',
					$totals_row['total_products'],
					$totals_row['orders'],
					$totals_row['total_vendors'],
					$totals_row['gross_earnings'],
					$totals_row['discount'],
					$totals_row['tax'],
					$totals_row['net_earnings'],
				);

				if ( EDD_ENHANCED_SALES_REPORTS_COMMISSIONS_ACTIVE ) :
					$this_row[] = $totals_row['commissions'];
				endif;

				$average_order_value = 0;

				if ( $totals_row['net_earnings'] > 0 ) {
					$average_order_value = $totals_row['net_earnings'] / $totals_row['paid_orders'];
				}

				$this_row[] = $average_order_value;

				$output['data'][] = $this_row;
			}

			foreach ( $output['data'] as $report_row_index => &$report_row ) {
				$total_items = count( $report_row );
				for ( $index = 7; $index < $total_items; $index ++ ) {
					if ( '' === $output['data'][ $report_row_index ][ $index ] ) {
						continue;
					}
					$output['data'][ $report_row_index ][ $index ] = $currency . number_format( floatval( $report_row[ $index ] ), 2 );
				}

				$output['data'][ $report_row_index ][4] = number_format( floatval( $report_row[4] ), 0 );
				$output['data'][ $report_row_index ][5] = number_format( floatval( $report_row[5] ), 0 );
				$output['data'][ $report_row_index ][6] = number_format( floatval( $report_row[6] ), 0 );
			}

			return $output;
		}

		/**
		 * Creates the cache directory if not already present.
		 */
		public static function find_or_create_cache_directory() {
			if ( ! is_dir( EDD_ENHANCED_SALES_REPORTS_CACHE ) ) {
				mkdir( EDD_ENHANCED_SALES_REPORTS_CACHE );
			}
		}

		/**
		 * Filters rows by searching for provided search value.
		 *
		 * @param array $rows Rows which are to be searched.
		 * @return array Filtered rows.
		 */
		public static function filter_array_rows( $rows ) {

			if ( isset( $_GET['search'] ) && isset( $_GET['search']['value'] ) && ! empty( $_GET['search']['value'] ) ) {
				$search_term = str_replace( '$', '', sanitize_title( wp_unslash( $_GET['search']['value'] ) ) );
				$search_term = str_replace( ',', '', $search_term );

				foreach ( $rows as $index => &$row ) {
					$found = false;

					foreach ( $row as $row_index => $row_value ) {
						if ( is_numeric( $row_value ) || is_string( $row_value ) ) {
							if ( stristr( $row_value, $search_term ) ) {
								$found = true;
								break; // a match has been found.
							}
						}
					}
					if ( ! $found ) {
						// no match found for $search_term, unset row.
						unset( $rows[ $index ] );
					}
				}
			}

			return $rows;
		}

		/**
		 * Returns Sorted and Paginated Response for Data Tables
		 *
		 * @param string $output Unsorted and Not Paginated Results.
		 * @return array Sorted and Paginated Results.
		 */
		public static function apply_pagination_sorting( $output ) {
			// sort the data.
			if ( isset( $_GET['order'] ) ) {
				$order = map_deep( wp_unslash( $_GET['order'] ), 'sanitize_text_field' );
			}

			if ( isset( $order ) && isset( $order['0'] ) && isset( $order['0']['column'] ) ) {
				$GLOBALS['edd_enhanced_sales_reports_sort_by']    = $order[0]['column'];
				$GLOBALS['edd_enhanced_sales_reports_sort_order'] = $order[0]['dir'];

				if ( ! isset( $GLOBALS['edd_enhanced_sales_reports_numeric_columns'] ) ) {
					$GLOBALS['edd_enhanced_sales_reports_numeric_columns'] = array();
				}

				if ( 'asc' === $GLOBALS['edd_enhanced_sales_reports_sort_order'] ) {
					// ascending sort.
					usort(
						$output['data'],
						function ( $a, $b ) {

							// numeric values should be handles separately.
							if ( in_array( $GLOBALS['edd_enhanced_sales_reports_sort_by'], $GLOBALS['edd_enhanced_sales_reports_numeric_columns'] ) ) {
								return floatval( strip_tags( $a[ $GLOBALS['edd_enhanced_sales_reports_sort_by'] ] ) ) <=> floatval( strip_tags( $b[ $GLOBALS['edd_enhanced_sales_reports_sort_by'] ] ) );
							}

							// string comparison.
							$result = strcmp( strtolower( trim( strip_tags( $a[ $GLOBALS['edd_enhanced_sales_reports_sort_by'] ] ) ) ), strtolower( trim( strip_tags( $b[ $GLOBALS['edd_enhanced_sales_reports_sort_by'] ] ) ) ) );
							if ( 0 == $result ) {
								return 0;
							}

							return $result < 0 ? - 1 : 1;
						}
					);
				} else {
					// descending sort.
					usort(
						$output['data'],
						function ( $a, $b ) {

							// numeric values should be handles separately.
							if ( in_array( $GLOBALS['edd_enhanced_sales_reports_sort_by'], $GLOBALS['edd_enhanced_sales_reports_numeric_columns'] ) ) {
								return floatval( strip_tags( $b[ $GLOBALS['edd_enhanced_sales_reports_sort_by'] ] ) ) <=> floatval( strip_tags( $a[ $GLOBALS['edd_enhanced_sales_reports_sort_by'] ] ) );
							}

							// string comparison.
							$result = strcmp( strtolower( trim( strip_tags( $a[ $GLOBALS['edd_enhanced_sales_reports_sort_by'] ] ) ) ), strtolower( trim( strip_tags( $b[ $GLOBALS['edd_enhanced_sales_reports_sort_by'] ] ) ) ) );
							if ( 0 == $result ) {
								return 0;
							}

							return $result > 0 ? - 1 : 1;
						}
					);
				}
			}

			$per_page = 100;
			if ( isset( $_GET['length'] ) ) {
				$per_page = intval( $_GET['length'] );
			}

			if ( $per_page < 1 ) {
				$per_page = 100;
			}

			$page = 0;
			if ( isset( $_GET['start'] ) && ! empty( $_GET['start'] ) ) {
				$page = intval( ceil( sanitize_text_field( wp_unslash( $_GET['start'] ) ) / $per_page ) );
			}

			if ( count( $output['data'] ) > 0 ) {
				$output['data'] = array_chunk( $output['data'], $per_page );
				if ( isset( $output['data'][ $page + 1 ] ) ) {
					$GLOBALS['__edd_esr_has_more_data'] = true;
				}
				$output['data'] = $output['data'][ $page ];
			}

			return $output;
		}
	}
}
