<?php

namespace Profitblue\Controllers;

use ProfitBlue\Controllers\OverviewCcaiData;

class OrdersMonthsData {
	
	/**
	 * start_date
	 *
	 * @var string
	 */
	private $start_date = false;
		
	/**
	 * end_date
	 *
	 * @var string
	 */
	private $end_date = false;
		
	/**
	 * wpdb
	 *
	 * @var object
	 */
	private $wpdb = null;
		
	/**
	 * mode
	 *
	 * @var string
	 */
	private $mode = null;
		
	/**
	 * data
	 *
	 * @var array
	 */
	public $data = array();
	
	/**
	 * __construct
	 *
	 * @param  string $start_date
	 * @param  string $end_date
	 * @param  string $mode
	 * @return void
	 */
	public function __construct( $start_date, $end_date, $mode ) {

		global $wpdb;
		$this->wpdb = $wpdb;
		$this->start_date = $start_date;
		$this->end_date = $end_date;
		$this->mode = $mode;		

	}

	/**
	 * Get Months data
	 * 
	 * @return string
	 */
	public function get_data() {

		$data = array(
			'actual' => $this->get_actual_year_data(),
			'past' => $this->get_past_year_data()
		);

		$this->data = $data;

		$string = '';

		foreach( $data['actual'] as $month => $item ) {
			$value_2 = round( $item[$this->mode], 1 );
			if ( empty( $data['past'][$month] ) ) {
				$value_1 = 0;
			} else {
				$value_1 = round( $data['past'][$month][$this->mode], 1 );
			}
			$string .= "['" . $month . "', " . $value_1 . ", " . $value_2 . "],";
		}

		return $string;

	}

	/**
	 * Get Months data
	 * 
	 * @param  int $product_id
	 * @return string
	 */
	public function get_product_data( $product_id ) {

		$data = array(
			'actual' => $this->get_product_actual_year_data( $product_id ),
			'past' => $this->get_product_past_year_data( $product_id )
		);

		$string = '';

		foreach( $data['actual'] as $month => $item ) {
			$value_2 = round( $item[$this->mode], 1 );
			if ( empty( $data['past'][$month] ) ) {
				$value_1 = 0;
			} else {
				$value_1 = round( $data['past'][$month][$this->mode], 1 );
			}
			$string .= "['" . $month . "', " . $value_1 . ", " . $value_2 . "],";
		}

		return $string;

	}

	/**
	 * Get actual year data
	 * 
	 * @return array
	 */
	public function get_actual_year_data() {

		global $wpdb;
		$start_date = strtotime( $this->start_date . '00:00:00' );
		$end_date = strtotime( $this->end_date . '23:59:59' );
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT 
				CONCAT(MONTH(formated_date), '-', COUNT(order_id), '-', SUM(order_subtotal), '-', SUM(cogs), '-', SUM(order_shipping_subtotal), '-', SUM(order_fees_subtotal)) AS monthly_order_summary
				FROM %i
				WHERE order_date BETWEEN %s AND %s
				GROUP BY MONTH(formated_date) ORDER BY MONTH(formated_date);",
				array(
					$wpdb->prefix . 'profitblue_orders',
					$start_date,
					$end_date
				)
			)
		);
		$year_data = array();
		$new_array = array();
		if ( !empty( $result ) ) {

			$months = $this->get_all_months( $this->start_date, $this->end_date );

			foreach( $result as $result_item ) {

				$exploded 		= explode( '-', $result_item->monthly_order_summary );
				$month 			= $exploded[0];
				$orders_count 	= $exploded[1];
				$orders_total	= $exploded[2];
				$cogs 			= $exploded[3];
				$shipping 		= $exploded[4];
				$fees 			= $exploded[5];

				$revenue = (float)$orders_total;
				if ( 0 == $revenue ) {
					$margin_amount = 0;
					$margin_percent = 0;
				} else {
					$margin_amount = $revenue - $cogs;
					$margin_percent = round( $margin_amount / ( $revenue / 100 ), 1 );
				}

				$year_data[$month]['revenue'] = $revenue;
				$year_data[$month]['cogs'] = $cogs;
				$year_data[$month]['margin-amount'] = $margin_amount;
				$year_data[$month]['margin-percent'] = $margin_percent;
				$year_data[$month]['number-orders'] = $orders_count;
				$year_data[$month]['net-profit'] = $orders_total - $cogs;
				
			}	
			
			//Check empty months
			foreach( $months as $month_value ) {

				if ( empty( $year_data[$month_value] ) ) {
					$new_array[$month_value]['revenue'] = '0';
					$new_array[$month_value]['cogs'] = '0';
					$new_array[$month_value]['margin-amount'] = '0';
					$new_array[$month_value]['margin-percent'] = '0';
					$new_array[$month_value]['number-orders'] = '0';
					$new_array[$month_value]['net-profit'] = '0';
				} else {
					$new_array[$month_value] = $year_data[$month_value];
				}

			}

		}
	
		return $new_array;

	}

	/**
	 * Get past year data
	 * 
	 * @return array
	 */
	public function get_past_year_data() {

		global $wpdb;
		$start_date = strtotime( $this->get_past_date( $this->start_date ) . '00:00:00' );
		$end_date   = strtotime( $this->get_past_date( $this->end_date ) . '23:59:59' );
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT CONCAT(MONTH(formated_date), '-', COUNT(order_id), '-', SUM(order_subtotal), '-', SUM(cogs), '-', SUM(order_shipping_subtotal), '-', SUM(order_fees_subtotal)) AS monthly_order_summary
				FROM %i
				WHERE order_date BETWEEN %s AND %s
				GROUP BY MONTH(formated_date) ORDER BY MONTH(formated_date);",
				array(
					$wpdb->prefix . 'profitblue_orders',
					$start_date,
					$end_date
				)
			)
		);
		$year_data = array();
		$new_array = array();
		if ( !empty( $result ) ) {

			$months = $this->get_all_months( $this->get_past_date( $this->start_date ), $this->get_past_date( $this->end_date ) );

			foreach( $result as $result_item ) {

				$exploded 		= explode( '-', $result_item->monthly_order_summary );
				$month 			= $exploded[0];
				$orders_count 	= $exploded[1];
				$orders_total	= $exploded[2];
				$cogs 			= $exploded[3];
				$shipping 		= $exploded[4];
				$fees 			= $exploded[5];

				$revenue = $orders_total;
				if ( 0 == $revenue ) {
					$margin_amount = 0;
					$margin_percent = 0;
				} else {
					$margin_amount = $revenue - $cogs;
					$margin_percent = round( $margin_amount / ( $revenue / 100 ), 1 );
				}

				$year_data[$month]['revenue'] = $revenue;
				$year_data[$month]['cogs'] = $cogs;
				$year_data[$month]['margin-amount'] = $margin_amount;
				$year_data[$month]['margin-percent'] = $margin_percent;
				$year_data[$month]['number-orders'] = $orders_count;
				$year_data[$month]['net-profit'] = $orders_total - $cogs;
				
			}		
			
			//Check empty months
			foreach( $months as $month_value ) {

				if ( empty( $year_data[$month_value] ) ) {
					$new_array[$month_value]['revenue'] = '0';
					$new_array[$month_value]['cogs'] = '0';
					$new_array[$month_value]['margin-amount'] = '0';
					$new_array[$month_value]['margin-percent'] = '0';
					$new_array[$month_value]['number-orders'] = '0';
					$new_array[$month_value]['net-profit'] = '0';
				} else {
					$new_array[$month_value] = $year_data[$month_value];
				}

			}

		}
	
		return $new_array;

	}

	/**
	 * Get actual year data
	 * 
	 * @param  int $product_id
	 * @return array
	 */
	public function get_product_actual_year_data( $product_id  ) {

		global $wpdb;

		$start_date = strtotime( $this->start_date . '00:00:00' );
		$end_date = strtotime( $this->end_date . '23:59:59' );
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT CONCAT(MONTH(o.formated_date), '-', COUNT(o.order_id), '-', SUM(i.item_subtotal), '-', SUM(i.item_cogs)) AS monthly_order_summary
				FROM 
				%i o
			INNER JOIN 
				%i i ON o.order_id = i.order_id
			WHERE 
				o.order_date BETWEEN %s AND %s
				AND i.product_id = %d
			GROUP BY 
				MONTH(o.formated_date)
			ORDER BY 
				MONTH(o.formated_date);",
				array(
					$wpdb->prefix . 'profitblue_orders',
					$wpdb->prefix . 'profitblue_order_items',
					$start_date,
					$end_date,
					$product_id
				)
			)
		);
		$year_data = array();
		$new_array = array();
		if ( !empty( $result ) ) {

			$months = $this->get_all_months( $this->start_date, $this->end_date );
			
			foreach( $result as $result_item ) {

				$exploded 		= explode( '-', $result_item->monthly_order_summary );
				$month 			= $exploded[0];
				$orders_count	= $exploded[1];
				$orders_total	= $exploded[2];
				$cogs 			= $exploded[3];
				
				$revenue = $orders_total;
				$margin_amount = $orders_total - $cogs;
				$margin_percent = round( $margin_amount / ( $revenue / 100 ), 1 );

				$year_data[$month]['revenue'] = $revenue;
				$year_data[$month]['cogs'] = $cogs;
				$year_data[$month]['margin-amount'] = $margin_amount;
				$year_data[$month]['margin-percent'] = $margin_percent;
				$year_data[$month]['number-orders'] = $orders_count;
				$year_data[$month]['net-profit'] = $orders_total - $cogs;
				
			}	
			
			//Check empty months
			foreach( $months as $month_value ) {

				if ( empty( $year_data[$month_value] ) ) {
					$new_array[$month_value]['revenue'] = '0';
					$new_array[$month_value]['cogs'] = '0';
					$new_array[$month_value]['margin-amount'] = '0';
					$new_array[$month_value]['margin-percent'] = '0';
					$new_array[$month_value]['number-orders'] = '0';
					$new_array[$month_value]['net-profit'] = '0';
				} else {
					$new_array[$month_value] = $year_data[$month_value];
				}

			}
		}
	
		return $new_array;

	}

	/**
	 * Get past year data
	 * 
	 * @param  int $product_id
	 * @return array
	 */
	public function get_product_past_year_data( $product_id ) {

		global $wpdb;

		$start_date = strtotime( $this->get_past_date( $this->start_date ) . '00:00:00' );
		$end_date   = strtotime( $this->get_past_date( $this->end_date ) . '23:59:59' );

		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT CONCAT(MONTH(o.formated_date), '-', COUNT(o.order_id), '-', SUM(i.item_subtotal), '-', SUM(i.item_cogs)) AS monthly_order_summary
				FROM 
				%i o
			INNER JOIN 
				%i i ON o.order_id = i.order_id
			WHERE 
				o.order_date BETWEEN %s AND %s
				AND i.product_id = %d
			GROUP BY 
				MONTH(o.formated_date)
			ORDER BY 
				MONTH(o.formated_date);",
				array(
					$wpdb->prefix . 'profitblue_orders',
					$wpdb->prefix . 'profitblue_order_items',
					$start_date,
					$end_date,
					$product_id
				)
			)
		);
		$year_data = array();
		$new_array = array();
		if ( !empty( $result ) ) {

			$months = $this->get_all_months( $this->get_past_date( $this->start_date ), $this->get_past_date( $this->end_date ) );
			
			foreach( $result as $result_item ) {

				$exploded 		= explode( '-', $result_item->monthly_order_summary );
				$month 			= $exploded[0];
				$orders_count	= $exploded[1];
				$orders_total	= $exploded[2];
				$cogs 			= $exploded[3];
				
				$revenue = $orders_total;
				$margin_amount = $revenue - $cogs;
				$margin_percent = round( $margin_amount / ( $revenue / 100 ), 1 );

				$year_data[$month]['revenue'] = $revenue;
				$year_data[$month]['cogs'] = $cogs;
				$year_data[$month]['margin-amount'] = $margin_amount;
				$year_data[$month]['margin-percent'] = $margin_percent;
				$year_data[$month]['number-orders'] = $orders_count;
				$year_data[$month]['net-profit'] = $revenue - $cogs;
				
			}
			
			//Check empty months
			foreach( $months as $month_value ) {

				if ( empty( $year_data[$month_value] ) ) {
					$new_array[$month_value]['revenue'] = '0';
					$new_array[$month_value]['cogs'] = '0';
					$new_array[$month_value]['margin-amount'] = '0';
					$new_array[$month_value]['margin-percent'] = '0';
					$new_array[$month_value]['number-orders'] = '0';
					$new_array[$month_value]['net-profit'] = '0';
				} else {
					$new_array[$month_value] = $year_data[$month_value];
				}

			}

		}
	
		return $new_array;

	}

	/**
	 * Get past date
	 * 
	 * @param  string $origin_date
	 * @return string
	 */
	public function get_past_date( $origin_date ) {

		$start_time = strtotime( $origin_date );
		$past_time 	= strtotime( '-1 year', $start_time );		
		$date 		= gmdate( 'Y-m-d', $past_time  );
	
		return $date;

	}

	/**
	 * get_all_months
	 *
	 * @param  string $start_date
	 * @param  string $end_date
	 * @return array
	 */
	public function get_all_months( $start_date, $end_date ) {

		//Get all months
		$start    = new \DateTime($start_date);
		$start->modify('first day of this month');
		$end      = new \DateTime($end_date);
		$end->modify('first day of next month');
		$interval = new \DateInterval('P1M');
		$period   = new \DatePeriod($start, $interval, $end);

		$months = [];
		foreach ($period as $dt) {
			$months[] = $dt->format('n');
		}

		return $months;

	}
	
}
