<?php

namespace ProfitBlue\Controllers;

use ProfitBlue\Models\ShopSettingCostsModel;

/**
 * OverviewCcaiData
 */
class OverviewCcaiData {
	
	/**
	 * order_data
	 *
	 * @var bool
	 */
	private $order_data = false;
		
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
	 * start_month
	 *
	 * @var bool
	 */
	private $start_month = false;
		
	/**
	 * end_month
	 *
	 * @var bool
	 */
	private $end_month = false;
		
	/**
	 * start_year
	 *
	 * @var bool
	 */
	private $start_year = false;
		
	/**
	 * end_year
	 *
	 * @var bool
	 */
	private $end_year = false;
		
	/**
	 * wpdb
	 *
	 * @var undefined
	 */
	private $wpdb = null;
		
	/**
	 * ccai_data
	 *
	 * @var undefined
	 */
	private $ccai_data = null;
		
	/**
	 * months
	 *
	 * @var undefined
	 */
	private $months = null;
		
	/**
	 * is_first_month_part
	 *
	 * @var bool
	 */
	private $is_first_month_part = false;
		
	/**
	 * is_last_month_part
	 *
	 * @var bool
	 */
	private $is_last_month_part = false;
	
	/**
	 * __construct
	 *
	 * @param  string $start_date
	 * @param  string $end_date
	 * @return void
	 */
	public function __construct( $start_date, $end_date ) {

		global $wpdb;
		$this->wpdb = $wpdb;

		$this->start_date = $start_date;
		$this->end_date = $end_date;
		$this->start_year = gmdate( 'Y', strtotime( $start_date ) );
		$this->end_year = gmdate( 'Y', strtotime( $end_date ) );
		$this->start_month = (int)gmdate( 'n', strtotime( $start_date ) );
		$this->end_month = (int)gmdate( 'n', strtotime( $end_date ) );
		$this->start_day = (int)gmdate( 'j', strtotime( $start_date ) );
		$this->end_day = (int)gmdate( 'j', strtotime( $end_date ) );
		$date = new \DateTime( $this->end_date );
		$date->modify('last day of this month');
		$last_day_of_month = (int)$date->format('j');
		if ( $this->start_day > 1 ) {
			$this->is_first_month_part = true;
		}
		if ( $this->end_day < $last_day_of_month ) {
			$this->is_last_month_part = true;
		}		
	}

	/**
	 * Get Days data
	 * $month_gross_margin = round( ( $products_total + $shipping_total ) - $cogs_total, 0 );
	 * $ebt = $margin_after_cogs_and_variable - $total_fixed_and_income;
	 * $total_tax = ( round( ( $ebt / 100 ) * $incomeTax, 0 ) * -1 );
	 * $net_profit	= round( $ebt + $total_tax, 0 );
	 * 
	 * @return array
	 */
	public function get_data() {

		$data = $this->get_actual_data();
		$this->order_data = $data;
		
		$this->get_period_data( $this->start_date, $this->end_date );
		
		return $this->ccai_data;

	}

	/**
	 * Get actual year data
	 * $month_gross_margin = round( ( $revenue ) - $cogs_total, 0 );
	 * $margin_after_cogs_and_variable = ( $revenue ) - ( $cogs_total + $variable_total );
	 * $total_fixed_and_income 		= $fixed_total - $income_total;
	 * $ebt = $margin_after_cogs_and_variable - $total_fixed_and_income;
	 * $total_tax = ( round( ( $ebt / 100 ) * $incomeTax, 0 ) * -1 );
	 * $net_profit	= round( $ebt + $total_tax, 0 );
	 * 
	 * @return array
	 */
	public function get_actual_data() {

		global $wpdb;

		$start_date = strtotime( $this->start_date . '00:00:00' );
		$end_date = strtotime( $this->end_date . '23:59:59' );
		$result = $wpdb->get_results( 
			$wpdb->prepare(
				"SELECT 
				CONCAT(DATE_FORMAT(formated_date, %s), '-', COUNT(*), '-', SUM(order_subtotal), '-', SUM(cogs), '-', SUM(order_shipping_subtotal), '-', SUM(order_fees_subtotal), '-', SUM(order_shipping_cost), '-', SUM(order_payment_cost)) AS daily_order_summary
			FROM 
				%i
			WHERE 
				order_date BETWEEN %s AND %s
			GROUP BY 
				DATE(formated_date)
			ORDER BY 
				DATE(formated_date);",
				array(
					'%Y-%m-%d',
					$wpdb->prefix . 'profitblue_orders',
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

				$exploded 		= explode( '-', $result_item->daily_order_summary );
				$_year 			= $exploded[0];
				$_month 		= $exploded[1];
				$_day 			= $exploded[2];
				$day = $_year . '-' . $_month . '-' . $_day;
				$orders_count 	= $exploded[3];
				$orders_total	= $exploded[4];
				$cogs 			= $exploded[5];
				$shipping 		= $exploded[6];
				$fees 			= $exploded[7];
				$shipping_cost	= $exploded[8];
				$payment_cost	= $exploded[9];

				$revenue = $orders_total;
				$margin_amount = $revenue - $cogs;
				
				$day_data[$day]['revenue'] = $revenue;
				$day_data[$day]['cogs'] = $cogs;
				$day_data[$day]['margin-amount'] = $margin_amount;
				$day_data[$day]['number-orders'] = $orders_count;
				$day_data[$day]['net-profit'] = $orders_total - $cogs;
				$day_data[$day]['shipping-cost'] = $shipping_cost;
				$day_data[$day]['payment-cost'] = $payment_cost;				
				
			}

			//Check empty days
			foreach( $days as $day_value ) {

				if ( empty( $day_data[$day_value] ) ) {
					$new_array[$day_value]['revenue'] = '0';
					$new_array[$day_value]['cogs'] = '0';
					$new_array[$day_value]['margin-amount'] = '0';
					$new_array[$day_value]['number-orders'] = '0';
					$new_array[$day_value]['net-profit'] = '0';
					$new_array[$day_value]['shipping-cost'] = '0';
					$new_array[$day_value]['payment-cost'] = '0';
				} else {
					$new_array[$day_value] = $day_data[$day_value];
				}

			}

		}
	
		return $new_array;

	}

	/**
	 * Get Period data
	 * 
	 * @return void
	 */
	public function get_period_data( $start_date = null, $end_date = null, $year = 'actual' ) {

		global $wpdb;
		if ( null === $start_date ) {
			$start_date = $this->start_date;
		}
		if ( null === $end_date ) {
			$end_date = $this->end_date;
		}

		$days = $this->get_days( $start_date, $end_date );
		
		$result = $wpdb->get_results( 
			$wpdb->prepare(
				"SELECT * FROM %i",
				array(
					$wpdb->prefix . 'profitblue_ccai'
				)
			),
			ARRAY_A 
		);
		if ( !empty( $result ) ) {
			$ccai_data_values = array();
			foreach( $result as $item ) {
				if ( ( $start_date >= $item['date_start'] && $start_date <= $item['date_end'] ) || ( $end_date >= $item['date_start'] && $end_date <= $item['date_end'] ) ) {
					$ccai_data_values[] = $item;
				} else {
					if ( ( $start_date <= $item['date_start'] && $end_date >= $item['date_end'] ) ) {
						$ccai_data_values[] = $item;
					}
				}
			}

			//$this->ccai_data = $ccai_data;

			//Calculate variable data
			if ( !empty( $ccai_data_values ) ) {
				foreach( $ccai_data_values as $ccai_item ) {					
					if ( 'variable' == $ccai_item['type'] ) {
						$vp = 0;
						foreach( $days as $day ) {
							if ( empty( $this->order_data[$day] ) ) {
								$orders = 0;
								$orders_total = 0;
							} else {
								$orders = $this->order_data[$day]['number-orders'];
								$orders_total = $this->order_data[$day]['revenue'];
							}
							if( $day < $ccai_item['date_start'] || $day > $ccai_item['date_end'] ) {
								$price = 0;
							} else {
								$price = $this->get_variable_amount( $ccai_item, $orders, $orders_total );
							}
							if ( empty( $this->ccai_data['variable'][$ccai_item['label']] ) ) {
								$this->ccai_data['variable'][$ccai_item['label']] = $price;
							} else {
								$this->ccai_data['variable'][$ccai_item['label']] += $price;
							}
							$vp += $price;						
						}						
					}
				
				}
			}
			
			//Calculate Fixed data
			
			$f = 0;
			if ( !empty( $ccai_data_values ) ) {
				foreach( $ccai_data_values as $ccai_item ) {
					if ( 'fixed' == $ccai_item['type'] ) {	
						$vp = 0;											
						foreach( $days as $day ) {
							if( $day < $ccai_item['date_start'] || $day > $ccai_item['date_end'] ) {
								$price = 0;
							} else {
								$price = $this->get_fixed_or_income_amount( $ccai_item, $day );
							}
							if ( empty( $this->ccai_data['fixed'][$ccai_item['label']] ) ) {
								$this->ccai_data['fixed'][$ccai_item['label']] = $price;
							} else {
								$this->ccai_data['fixed'][$ccai_item['label']] += $price;
							}
							$f += $price;
							$vp += $price;
						}						
					}
				}
			}
			
			//Calculate Income data
			if ( !empty( $ccai_data_values ) ) {
				foreach( $ccai_data_values as $ccai_item ) {
					if ( 'income' == $ccai_item['type'] ) {												
						foreach( $days as $day ) {
							if( $day < $ccai_item['date_start'] || $day > $ccai_item['date_end'] ) {
								$price = 0;
							} else {
								$price = $this->get_fixed_or_income_amount( $ccai_item, $day );
							}							
							if ( empty( $this->ccai_data['income'][$ccai_item['label']] ) ) {
								$this->ccai_data['income'][$ccai_item['label']] = $price;
							} else {
								$this->ccai_data['income'][$ccai_item['label']] += $price;
							}					
						}
					}
				}
			}
			
		}
		
	}
	
	/**
	 * Get variable amount
	 * 
	 * @return flaot
	 */
	public function get_variable_amount( $ccai_item, $orders_count, $orders_total ) {
					
		if ( 'amount' == $ccai_item['amount-type'] ) {
			$price = $orders_count * $ccai_item['amount'];					
		} else {
			
			$price = ( $orders_total / 100 ) * $ccai_item['amount'];
		}
		return $price;

	}

	/**
	 * Get fixed amount
	 * 
	 * @return float
	 */
	public function get_fixed_or_income_amount( $ccai_item, $day ) {

		$day_time = strtotime($day);
		$date = new \DateTime($day);
		$month_days = $date->format('t');
		$month = $date->format('n');
		
		if ( 'yes' == $ccai_item['manually'] ) {
			$price = $ccai_item['month-' . $month] / $month_days;
		} else {

			$date_start_time = strtotime($ccai_item['date_start']);
			$date_end_time = strtotime($ccai_item['date_end']);
			$date_start_month = gmdate( 'n', $date_start_time);
			$date_end_month = gmdate( 'n', $date_end_time);
			//Calculate period price for day
			$days_in_origin_period = $this->get_days_in_period( $ccai_item['date_start'], $ccai_item['date_end'] );
			

			if ( $day >= $ccai_item['date_start'] && $day <= $ccai_item['date_end'] ) {
				$price = (float)$ccai_item['amount'] / $days_in_origin_period;
			} else {
				$price = 0;
			}
			
		}
		
		return $price;		

	}

	/**
	 * Get days in selected period
	 * 
	 * @return int
	 */
	public function get_days_in_period( $start_date, $end_date ) {
		$start_date = new \DateTime($start_date);
		$end_date = new \DateTime($end_date);
		$interval = $start_date->diff($end_date);
		$days = $interval->days + 1;
		return $days;
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
			$day = gmdate( 'Y-m-d', $current_time );
			$days[] = $day;
			$current_time = $current_time + 86400;
		}

		return $days;
		
	}
	
}
