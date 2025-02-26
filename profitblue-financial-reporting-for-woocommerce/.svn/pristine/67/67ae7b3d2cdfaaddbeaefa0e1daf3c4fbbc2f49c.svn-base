<?php

namespace Profitblue\Controllers;

/**
 * OrdersDaysData
 */
class OrdersDaysData {
	
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
	public $data = null;
	
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
	 * Get Days data
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

		foreach( $this->data['actual'] as $day => $item ) {

			if ( empty( $this->data['actual'][$day][$this->mode] ) ) {
				$value_1 = 0;
			} else {
				$value_1 = round( $this->data['actual'][$day][$this->mode], 1 );
			}
			$past_date = \DateTime::createFromFormat('d. m. Y', $day);
			$past_date->modify('-1 year');
			$past_day = $past_date->format('d. m. Y');
			$display_day = $past_date->format('d. m.');
			if ( empty( $this->data['past'][$past_day][$this->mode] ) ) {
				$value_2 = 0;
			} else {
				$value_2 = round( $this->data['past'][$past_day][$this->mode], 1 );
			}
			$string .= "['" . $display_day . "', " . $value_2 . ", " . $value_1 . "],";
		}

		return $string;

	}

	/**
	 * Get Days data
	 * 
	 * @return string
	 */
	public function get_product_data( $product_id ) {

		$data = array(
			'actual' => $this->get_product_actual_year_data( $product_id ),
			'past' => $this->get_product_past_year_data( $product_id )
		);

		$string = '';

		foreach( $data['actual'] as $day => $item ) {
			$value_1 = round( $item[$this->mode], 1 );
			if ( empty( $data['past'][$day] ) ) {
				$value_2 = 0;
			} else {
				$value_2 = round( $data['past'][$day][$this->mode], 1 );
			}
			$string .= "['" . $day . "', " . $value_2 . ", " . $value_1 . "],";
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
				"
				SELECT 
				CONCAT(DATE_FORMAT(formated_date, %s), '-', COUNT(*), '-', SUM(order_subtotal), '-', SUM(cogs), '-', SUM(order_shipping_subtotal), '-', SUM(order_fees_subtotal)) AS monthly_order_summary
			FROM 
				%i
			WHERE 
				order_date BETWEEN %s AND %s
			GROUP BY 
				DATE(formated_date)
			ORDER BY 
				DATE(formated_date)",
				array(
					'%Y-%m-%d',
					$this->wpdb->prefix . 'profitblue_orders',
					$start_date,
					$end_date
				)
			)
		);
		$day_data = array();
		$new_array = array();
		if ( !empty( $result ) ) {

			$days = $this->get_days( $this->start_date, $this->end_date );

			foreach( $result as $result_item ) {

				$exploded 		= explode( '-', $result_item->monthly_order_summary );
				$day 			= $exploded[2] .'. '.$exploded[1].'. '.$exploded[0];
				$orders_count 	= $exploded[3];
				$orders_total	= $exploded[4];
				$cogs 			= $exploded[5];
				$shipping 		= $exploded[6];
				$fees 			= $exploded[7];

				$revenue = $orders_total;
				if ( 0 == $revenue ) {
					$margin_amount = 0;
					$margin_percent = 0;
				} else {
					$margin_amount = $revenue - $cogs;
					$margin_percent = round( $margin_amount / ( $revenue / 100 ), 1 );
				}

				$day_data[$day]['revenue'] = $revenue;
				$day_data[$day]['cogs'] = $cogs;
				$day_data[$day]['margin-amount'] = $margin_amount;
				$day_data[$day]['margin-percent'] = $margin_percent;
				$day_data[$day]['number-orders'] = $orders_count;
				$day_data[$day]['net-profit'] = $orders_total - $cogs;
				
			}
			
			//Check empty days
			foreach( $days as $day_value ) {

				if ( empty( $day_data[$day_value] ) ) {
					$new_array[$day_value]['revenue'] = '0';
					$new_array[$day_value]['cogs'] = '0';
					$new_array[$day_value]['margin-amount'] = '0';
					$new_array[$day_value]['margin-percent'] = '0';
					$new_array[$day_value]['number-orders'] = '0';
					$new_array[$day_value]['net-profit'] = '0';
				} else {
					$new_array[$day_value] = $day_data[$day_value];
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
				"
				SELECT 
				CONCAT(DATE_FORMAT(formated_date, %s), '-', COUNT(*), '-', SUM(order_subtotal), '-', SUM(cogs), '-', SUM(order_shipping_subtotal), '-', SUM(order_fees_subtotal)) AS monthly_order_summary
				FROM 
					%i
				WHERE 
					order_date BETWEEN %s AND %s
				GROUP BY 
					DATE(formated_date)
				ORDER BY 
					DATE(formated_date)",
				array(
					'%Y-%m-%d',
					$this->wpdb->prefix . 'profitblue_orders',
					$start_date,
					$end_date
				)
			)
		);
		$day_data = array();
		$new_array = array();
		if ( !empty( $result ) ) {

			$days = $this->get_pas_days( $start_date, $end_date );
			
			foreach( $result as $result_item ) {

				$exploded 		= explode( '-', $result_item->monthly_order_summary );
				$day 			= $exploded[2] .'. '.$exploded[1].'. '.$exploded[0];
				$orders_count 	= $exploded[3];
				$orders_total	= $exploded[4];
				$cogs 			= $exploded[5];
				$shipping 		= $exploded[6];
				$fees 			= $exploded[7];

				$revenue = $orders_total;
				$margin_amount = $orders_total - $cogs;
				$margin_percent = round( $margin_amount / ( $revenue / 100 ), 1 );

				$day_data[$day]['revenue'] = $revenue;
				$day_data[$day]['cogs'] = $cogs;
				$day_data[$day]['margin-amount'] = $margin_amount;
				$day_data[$day]['margin-percent'] = $margin_percent;
				$day_data[$day]['number-orders'] = $orders_count;
				$day_data[$day]['net-profit'] = $orders_total - $cogs;
				
			}
			
			//Check empty wedayseks			
			foreach( $days as $day_value ) {

				if ( empty( $day_data[$day_value] ) ) {
					$new_array[$day_value]['revenue'] = '0';
					$new_array[$day_value]['cogs'] = '0';
					$new_array[$day_value]['margin-amount'] = '0';
					$new_array[$day_value]['margin-percent'] = '0';
					$new_array[$day_value]['number-orders'] = '0';
					$new_array[$day_value]['net-profit'] = '0';
				} else {
					$new_array[$day_value] = $day_data[$day_value];
				}

			}

		}

		return $new_array;

	}

	/**
	 * Get product actual year data
	 * 
	 * @return array
	 */
	public function get_product_actual_year_data( $product_id ) {

		global $wpdb;
		
		$start_date = strtotime( $this->start_date . '00:00:00' );
		$end_date = strtotime( $this->end_date . '23:59:59' );
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"
				SELECT 
				CONCAT(DATE_FORMAT(o.formated_date, %s), '-', COUNT(DISTINCT o.order_id), '-', SUM(i.item_subtotal), '-', SUM(i.item_cogs)) AS daily_order_summary
				FROM 
					%i o
				INNER JOIN 
					%i i ON o.order_id = i.order_id
				WHERE 
					o.order_date BETWEEN %s AND %s
					AND i.product_id = %d
				GROUP BY 
					DATE(o.formated_date)
				ORDER BY 
					DATE(o.formated_date);",
				array(
					'%Y-%m-%d',
					$this->wpdb->prefix . 'profitblue_orders',
					$this->wpdb->prefix . 'profitblue_order_items',
					$start_date,
					$end_date,
					$product_id
				)
			)
		);
		$day_data = array();
		$new_array = array();
		if ( !empty( $result ) ) {

			$days = $this->get_days( $this->start_date, $this->end_date );

			foreach( $result as $result_item ) {

				$exploded 		= explode( '-', $result_item->daily_order_summary );
				$day 			= $exploded[2] .'. '.$exploded[1].'. '.$exploded[0];
				$orders_count 	= $exploded[3];
				$orders_total	= $exploded[4];
				$cogs 			= $exploded[5];
				
				$revenue = (float)$orders_total;
				if ( 0 == $revenue ) {
					$margin_amount = 0;
					$margin_percent = 0;
				} else {
					$margin_amount = $orders_total - $cogs;
					$margin_percent = round( $margin_amount / ( $revenue / 100 ), 1 );
				}

				$day_data[$day]['revenue'] = $revenue;
				$day_data[$day]['cogs'] = $cogs;
				$day_data[$day]['margin-amount'] = $margin_amount;
				$day_data[$day]['margin-percent'] = $margin_percent;
				$day_data[$day]['number-orders'] = $orders_count;
				$day_data[$day]['net-profit'] = $orders_total - $cogs;
				
			}		
			
			//Check empty wedayseks
			foreach( $days as $day_value ) {

				if ( empty( $day_data[$day_value] ) ) {
					$new_array[$day_value]['revenue'] = '0';
					$new_array[$day_value]['cogs'] = '0';
					$new_array[$day_value]['margin-amount'] = '0';
					$new_array[$day_value]['margin-percent'] = '0';
					$new_array[$day_value]['number-orders'] = '0';
					$new_array[$day_value]['net-profit'] = '0';
				} else {
					$new_array[$day_value] = $day_data[$day_value];
				}

			}

		}
	
		return $new_array;

	}

	/**
	 * Get product_past year data
	 * 
	 * @return array
	 */
	public function get_product_past_year_data( $product_id ) {

		global $wpdb;

		$start_date = strtotime( $this->get_past_date( $this->start_date ) . '00:00:00' );
		$end_date   = strtotime( $this->get_past_date( $this->end_date ) . '23:59:59' );
		$new_array = array();
		
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"
				SELECT 
					CONCAT(DATE_FORMAT(o.formated_date, %s), '-', COUNT(DISTINCT o.order_id), '-', SUM(i.item_subtotal), '-', SUM(i.item_cogs)) AS daily_order_summary
				FROM 
					%i o
				INNER JOIN 
					%i i ON o.order_id = i.order_id
				WHERE 
					o.order_date BETWEEN %s' AND %s
					AND i.product_id = %d
				GROUP BY 
					DATE(o.formated_date)
				ORDER BY 
					DATE(o.formated_date);",
				array(
					'%Y-%m-%d',
					$this->wpdb->prefix . 'profitblue_orders',
					$this->wpdb->prefix . 'profitblue_order_items',
					$start_date,
					$end_date,
					$product_id
				)
			)
		);
		$day_data = array();
		if ( !empty( $result ) ) {

			$days = $this->get_pas_days( $date_start, $date_end );

			foreach( $result as $result_item ) {

				$exploded 		= explode( '-', $result_item->daily_order_summary );
				$day 			= $exploded[2] .'. '.$exploded[1].'. '.$exploded[0];
				$orders_count 	= $exploded[3];
				$orders_total	= $exploded[4];
				$cogs 			= $exploded[5];
				
				$revenue = $orders_total;
				$margin_amount = $orders_total - $cogs;
				$margin_percent = round( $margin_amount / ( $revenue / 100 ), 1 );

				$day_data[$day]['revenue'] = $revenue;
				$day_data[$day]['cogs'] = $cogs;
				$day_data[$day]['margin-amount'] = $margin_amount;
				$day_data[$day]['margin-percent'] = $margin_percent;
				$day_data[$day]['number-orders'] = $orders_count;
				$day_data[$day]['net-profit'] = $orders_total - $cogs;
				
			}
			
			//Check empty wedayseks
			foreach( $days as $day_value ) {

				if ( empty( $year_data[$day_value] ) ) {
					$new_array[$day_value]['revenue'] = '0';
					$new_array[$day_value]['cogs'] = '0';
					$new_array[$day_value]['margin-amount'] = '0';
					$new_array[$day_value]['margin-percent'] = '0';
					$new_array[$day_value]['number-orders'] = '0';
					$new_array[$day_value]['net-profit'] = '0';
				} else {
					$new_array[$day_value] = $day_data[$day_value];
				}

			}

		}
	
		return $new_array;

	}

	/**
	 * Get past date
	 * 
	 * @return string
	 */
	public function get_past_date( $origin_date ) {

		$start_time = strtotime( $origin_date );
		$past_time 	= strtotime( '-1 year', $start_time );		
		$date 		= gmdate( 'Y-m-d', $past_time  );
	
		return $date;

	}

	/**
	 * Get days
	 * 
	 * @return array
	 */
	public function get_days( $start_date, $end_date ) {

		$start_time = strtotime( (string)$start_date );
		$end_time = strtotime( (string)$end_date );	
		
		$days = [];
		$current_time = $start_time;
		while ($current_time <= $end_time) {
			$day = gmdate( 'd. m. Y', $current_time );
			$days[] = $day;
			$current_time = $current_time + 86400;
		}

		return $days;
		
	}

	/**
	 * Get days
	 * 
	 * @return array
	 */
	public function get_pas_days( $start_time, $end_time ) {

		$days = [];
		$current_time = $start_time;
		while ($current_time <= $end_time) {
			$day = gmdate( 'd. m. Y', $current_time );
			$days[] = $day;
			$current_time = $current_time + 86400;
		}

		return $days;
		
	}


	
}
