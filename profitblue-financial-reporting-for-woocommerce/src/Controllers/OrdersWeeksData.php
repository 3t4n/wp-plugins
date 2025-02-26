<?php

namespace Profitblue\Controllers;

/**
 * OrdersWeeksData
 */
class OrdersWeeksData {
	
	/**
	 * start_date
	 *
	 * @var bool
	 */
	private $start_date = false;
		
	/**
	 * end_date
	 *
	 * @var bool
	 */
	private $end_date = false;
		
	/**
	 * wpdb
	 *
	 * @var undefined
	 */
	private $wpdb = null;
		
	/**
	 * mode
	 *
	 * @var undefined
	 */
	private $mode = null;
		
	/**
	 * data
	 *
	 * @var undefined
	 */
	public $data = null;
	
	/**
	 * __construct
	 *
	 * @param  mixed $start_date
	 * @param  mixed $end_date
	 * @param  mixed $mode
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
	 * Get data
	 * 
	 * @return string
	 */
	public function get_data() {

		$this->data = array(
			'actual' => $this->get_actual_week_data(),
			'past' => $this->get_past_week_data()
		);

		$string = '';

		$weeks_array = array();
		foreach( $this->data['actual'] as $week => $item ) {
			if ( !in_array( $week, $weeks_array ) ) {
				$weeks_array[] = $week;
			}
		}
		foreach( $this->data['past'] as $week => $item ) {
			if ( !in_array( $week, $weeks_array ) ) {
				$weeks_array[] = $week;
			}
		}
		sort( $weeks_array );

		foreach( $weeks_array as $week ) {
			$value_1 = round( $item[$this->mode], 1 );
			if ( empty( $this->data['actual'][$week][$this->mode] ) ) {
				$value_1 = 0;
			} else {
				$value_1 = round( $this->data['actual'][$week][$this->mode] , 1 );
			}
			if ( empty( $this->data['past'][$week][$this->mode] ) ) {
				$value_2 = 0;
			} else {
				$value_2 = round( $this->data['past'][$week][$this->mode] , 1 );
			}
			$string .= "['Week " . $week . "', " . $value_2 . ", " . $value_1 . "],";
		}
		
		return $string;

	}

	/**
	 * get_product_data
	 *
	 * @param  int $product_id
	 * @return string
	 */
	public function get_product_data( $product_id ) {

		$data = array(
			'actual' => $this->get_product_actual_week_data( $product_id ),
			'past' => $this->get_product_past_week_data( $product_id )
		);
		$this->data = $data;

		$string = '';

		foreach( $data['actual'] as $week => $item ) {
			$value_2 = round( $item[$this->mode], 1 );
			if ( empty( $data['past'][$week] ) ) {
				$value_1 = 0;
			} else {
				$value_1 = round( $data['past'][$week][$this->mode], 1 );
			}
			$string .= "['Week " . $week . "', " . $value_1 . ", " . $value_2 . "],";
		}

		return $string;

	}

	/**
	 * Get actual week data
	 * 
	 * @return array
	 */
	public function get_actual_week_data() {

		global $wpdb;
		$start_date = strtotime( $this->start_date . '00:00:00' );
		$end_date = strtotime( $this->end_date . '23:59:59' );
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"
				SELECT 
					CONCAT(WEEK(formated_date), '-', COUNT(order_id), '-', SUM(order_subtotal), '-', SUM(cogs), '-', SUM(order_shipping_subtotal), '-', SUM(order_fees_subtotal)) AS weekly_order_summary
				FROM 
					%i
				WHERE 
					order_date BETWEEN %s AND %s
				GROUP BY 
					WEEK(formated_date)
				ORDER BY 
					WEEK(formated_date);",
				array(
					$wpdb->prefix . 'profitblue_orders',
					$start_date,
					$end_date
				)
			)
		);
		$week_data = array();
		$new_array = array();
		if ( !empty( $result ) ) {

			$weeks = $this->get_all_weeks( $this->start_date, $this->end_date );
			
			foreach( $result as $result_item ) {

				$exploded 		= explode( '-', $result_item->weekly_order_summary );
				$week 			= $exploded[0];
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

				$week_data[$week]['revenue'] = $revenue;
				$week_data[$week]['cogs'] = $cogs;
				$week_data[$week]['margin-amount'] = $margin_amount;
				$week_data[$week]['margin-percent'] = $margin_percent;
				$week_data[$week]['number-orders'] = $orders_count;
				$week_data[$week]['net-profit'] = $orders_total - $cogs;
				
			}
			
			//Check empty weeks
			foreach( $weeks as $week_value ) {

				if ( empty( $week_data[$week_value] ) ) {
					$new_array[$week_value]['revenue'] = '0';
					$new_array[$week_value]['cogs'] = '0';
					$new_array[$week_value]['margin-amount'] = '0';
					$new_array[$week_value]['margin-percent'] = '0';
					$new_array[$week_value]['number-orders'] = '0';
					$new_array[$week_value]['net-profit'] = '0';
				} else {
					$new_array[$week_value] = $week_data[$week_value];
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
	public function get_past_week_data() {

		global $wpdb;
		$start_date = strtotime( $this->get_past_date( $this->start_date ) . '00:00:00' );
		$end_date   = strtotime( $this->get_past_date( $this->end_date ) . '23:59:59' );
		
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"
				SELECT 
					CONCAT(WEEK(formated_date), '-', COUNT(order_id), '-', SUM(order_subtotal), '-', SUM(cogs), '-', SUM(order_shipping_subtotal), '-', SUM(order_fees_subtotal)) AS weekly_order_summary
				FROM 
					%i
				WHERE 
					order_date BETWEEN %s AND %s
				GROUP BY 
					WEEK(formated_date)
				ORDER BY 
					WEEK(formated_date);",
				array(
					$wpdb->prefix . 'profitblue_orders',
					$start_date,
					$end_date
				)
			)
		);

		$week_data = array();
		$new_array = array();
		if ( !empty( $result ) ) {

			$weeks = $this->get_all_past_weeks( $start_date, $end_date );

			foreach( $result as $result_item ) {

				$exploded 		= explode( '-', $result_item->weekly_order_summary );
				$week 			= $exploded[0];
				$orders_count 	= $exploded[1];
				$orders_total	= $exploded[2];
				$cogs 			= $exploded[3];
				$shipping 		= $exploded[4];
				$fees 			= $exploded[5];

				$revenue = $orders_total;
				$margin_amount = $orders_total - $cogs;
				$margin_percent = round( $margin_amount / ( $revenue / 100 ), 1 );

				$week_data[$week]['revenue'] = $revenue;
				$week_data[$week]['cogs'] = $cogs;
				$week_data[$week]['margin-amount'] = $margin_amount;
				$week_data[$week]['margin-percent'] = $margin_percent;
				$week_data[$week]['number-orders'] = $orders_count;
				$week_data[$week]['net-profit'] = $orders_total - $cogs;
				
			}	
			
			//Check empty weeks			
			foreach( $weeks as $week_value ) {

				if ( empty( $week_data[$week_value] ) ) {
					$new_array[$week_value]['revenue'] = '0';
					$new_array[$week_value]['cogs'] = '0';
					$new_array[$week_value]['margin-amount'] = '0';
					$new_array[$week_value]['margin-percent'] = '0';
					$new_array[$week_value]['number-orders'] = '0';
					$new_array[$week_value]['net-profit'] = '0';
				} else {
					$new_array[$week_value] = $week_data[$week_value];
				}

			}

		}
	
		return $new_array;

	}

	/**
	 * Get product actual week data
	 * 
	 * @return array
	 */
	public function get_product_actual_week_data( $product_id ) {

		global $wpdb;
		$start_date = strtotime( $this->start_date . '00:00:00' );
		$end_date = strtotime( $this->end_date . '23:59:59' );
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"
				SELECT 
					CONCAT(WEEK(o.formated_date), '-', COUNT(o.order_id), '-', SUM(i.item_subtotal), '-', SUM(i.item_cogs)) AS monthly_order_summary
				FROM 
					%i o
				INNER JOIN 
					%i i ON o.order_id = i.order_id
				WHERE 
					o.order_date BETWEEN %s AND %s
					AND i.product_id = %d
				GROUP BY 
					WEEK(o.formated_date)
				ORDER BY 
					WEEK(o.formated_date);",
				array(
					$wpdb->prefix . 'profitblue_orders',
					$wpdb->prefix . 'profitblue_order_items',
					$start_date,
					$end_date,
					$product_id
				)
			)
		);
		$week_data = array();
		$new_array = array();
		if ( !empty( $result ) ) {

			$weeks = $this->get_all_weeks( $this->start_date, $this->end_date );

			foreach( $result as $result_item ) {

				$exploded 		= explode( '-', $result_item->monthly_order_summary );
				$month 			= $exploded[0];
				$orders_count	= $exploded[1];
				$orders_total	= $exploded[2];
				$cogs 			= $exploded[3];
				
				$revenue = $orders_total;
				$margin_amount = $orders_total - $cogs;
				$margin_percent = round( $margin_amount / ( $revenue / 100 ), 1 );

				$week_data[$month]['revenue'] = $revenue;
				$week_data[$month]['cogs'] = $cogs;
				$week_data[$month]['margin-amount'] = $margin_amount;
				$week_data[$month]['margin-percent'] = $margin_percent;
				$week_data[$month]['number-orders'] = $orders_count;
				$week_data[$month]['net-profit'] = $orders_total - $cogs;
				
			}
			
			//Check empty weeks
			foreach( $weeks as $week_value ) {

				if ( empty( $week_data[$week_value] ) ) {
					$new_array[$week_value]['revenue'] = '0';
					$new_array[$week_value]['cogs'] = '0';
					$new_array[$week_value]['margin-amount'] = '0';
					$new_array[$week_value]['margin-percent'] = '0';
					$new_array[$week_value]['number-orders'] = '0';
					$new_array[$week_value]['net-profit'] = '0';
				} else {
					$new_array[$week_value] = $week_data[$week_value];
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
	public function get_product_past_week_data( $product_id ) {

		global $wpdb;
		$start_date = strtotime( $this->get_past_date( $this->start_date ) . '00:00:00' );
		$end_date   = strtotime( $this->get_past_date( $this->end_date ) . '23:59:59' );
		
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"
				SELECT 
					CONCAT(WEEK(o.formated_date), '-', COUNT(*), '-', SUM(i.item_subtotal), '-', SUM(i.item_cogs)) AS monthly_order_summary
				FROM 
					%i o
				INNER JOIN 
					%i i ON o.order_id = i.order_id
				WHERE 
					o.order_date BETWEEN %s AND %s
					AND i.product_id = %d
				GROUP BY 
					WEEK(o.formated_date)
				ORDER BY 
					WEEK(o.formated_date);",
				array(
					$wpdb->prefix . 'profitblue_orders',
					$wpdb->prefix . 'profitblue_order_items',
					$start_date,
					$end_date,
					$product_id
				)
			)
		);
		$week_data = array();
		$new_array = array();
		if ( !empty( $result ) ) {

			$weeks = $this->get_all_past_weeks( $start_date, $end_date );

			foreach( $result as $result_item ) {

				$exploded 		= explode( '-', $result_item->monthly_order_summary );
				$month 			= $exploded[0];
				$orders_count	= $exploded[1];
				$orders_total	= $exploded[2];
				$cogs 			= $exploded[3];
				
				$revenue = $orders_total;
				$margin_amount = $orders_total - $cogs;
				$margin_percent = round( $margin_amount / ( $revenue / 100 ), 1 );

				$week_data[$month]['revenue'] = $revenue;
				$week_data[$month]['cogs'] = $cogs;
				$week_data[$month]['margin-amount'] = $margin_amount;
				$week_data[$month]['margin-percent'] = $margin_percent;
				$week_data[$month]['number-orders'] = $orders_count;
				$week_data[$month]['net-profit'] = $orders_total - $cogs;
				
			}
			
			//Check empty weeks
			foreach( $weeks as $week_value ) {

				if ( empty( $week_data[$week_value] ) ) {
					$new_array[$week_value]['revenue'] = '0';
					$new_array[$week_value]['cogs'] = '0';
					$new_array[$week_value]['margin-amount'] = '0';
					$new_array[$week_value]['margin-percent'] = '0';
					$new_array[$week_value]['number-orders'] = '0';
					$new_array[$week_value]['net-profit'] = '0';
				} else {
					$new_array[$week_value] = $week_data[$week_value];
				}

			}

		}		
	
		return $new_array;

	}

	/**
	 * Get past date
	 * 
	 * @return array
	 */
	public function get_past_date( $origin_date ) {

		$start_time = strtotime( $origin_date );
		$past_time 	= strtotime( '-1 year', $start_time );		
		$date 		= gmdate( 'Y-m-d', $past_time  );
	
		return $date;

	}

	/**
	 * Get all weeks
	 * 
	 * @return array
	 */
	public function get_all_weeks( $start_date, $end_date ) {

		$start_time = strtotime( (string)$start_date );
		$end_time = strtotime( (string)$end_date );

		if ( '1' == gmdate( 'n', $start_time ) && gmdate( 'W', $start_time ) == '52' ) {
			$start_time = $start_time + 86400;
			$end_time = $end_time + 86400;
		}
		
		$weeks = [];
		$current_time = $start_time;
		while ($current_time <= $end_time) {
			$week = gmdate( 'W', $current_time );
			$weeks[] = (int)$week;
			$current_time = strtotime('+1 week', $current_time);
		}
		
		return $weeks;

	}

	/**
	 * Get all weeks
	 * 
	 * @return array
	 */
	public function get_all_past_weeks( $start_time, $end_time ) {

		if ( '1' == gmdate( 'n', $start_time ) && gmdate( 'W', $start_time ) == '52' ) {
			$start_time = $start_time + 86400;
			$end_time = $end_time + 86400;
		}
		
		$weeks = [];
		$current_time = $start_time;
		while ($current_time <= $end_time) {
			$week = gmdate( 'W', $current_time );
			$weeks[] = (int)$week;
			$current_time = strtotime('+1 week', $current_time);
		}
		
		return $weeks;

	}

}
