<?php

namespace Profitblue\Controllers;

use ProfitBlue\Helpers\Helper;
use ProfitBlue\Models\ShopSettingCostsModel;
use ProfitBlue\Controllers\OverviewCcaiData;
use ProfitBlue\Controllers\OrdersController;

/**
 * NetprofitWeeksData
 */
class NetprofitWeeksData {
	
	/**
	 * order_data
	 *
	 * @var string
	 */
	private $order_data = false;
		
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
	 * start_month
	 *
	 * @var string
	 */
	private $start_month = false;
		
	/**
	 * end_month
	 *
	 * @var string
	 */
	private $end_month = false;
		
	/**
	 * start_year
	 *
	 * @var string
	 */
	private $start_year = false;
		
	/**
	 * end_year
	 *
	 * @var string
	 */
	private $end_year = false;
		
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
	 * ccai_data
	 *
	 * @var array
	 */
	private $ccai_data = null;
		
	/**
	 * months
	 *
	 * @var array
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
		$this->start_year = gmdate( 'Y', strtotime( $start_date ) );
		$this->end_year = gmdate( 'Y', strtotime( $end_date ) );
		$this->start_week = (int)gmdate( 'W', strtotime( $start_date ) );
		$this->end_week = (int)gmdate( 'W', strtotime( $end_date ) );
		$this->start_day = (int)gmdate( 'j', strtotime( $start_date ) );
		$this->end_day = (int)gmdate( 'j', strtotime( $end_date ) );
		$date = new \DateTime( $this->end_date );
		if ($date->format('w') != 0) {
			$date->modify('next sunday');
		}
		$last_day_of_week = (int)$date->format('j');
		if ( $this->start_day > 1 ) {
			$this->is_first_week_part = true;
		}
		if ( $this->end_day < $last_day_of_week ) {
			$this->is_last_week_part = true;
		}

		$this->mode = $mode;		

	}

	/**
	 * Get Months data
	 * $month_gross_margin = round( ( $products_total + $shipping_total ) - $cogs_total, 0 );
	 * $ebt = $margin_after_cogs_and_variable - $total_fixed_and_income;
	 * $total_tax = ( round( ( $ebt / 100 ) * $incomeTax, 0 ) * -1 );
	 * $net_profit	= round( $ebt + $total_tax, 0 );
	 * 
	 * @return string
	 */
	public function get_data() {

		$ShopSettingCostsModel = new ShopSettingCostsModel();
		$shopSetting = $ShopSettingCostsModel->get_data_by_year( $this->start_year );
		if ( empty( $shopSetting ) ) {
			$incomeTax_2 = 0;
		} else {
			$incomeTax_2 = $shopSetting[0]->tax_income;
		}

		$start_time = strtotime( $this->start_year );
		$past_time 	= strtotime( '-1 year', $start_time );		
		$last_year 		= gmdate( 'Y', $past_time  );

		$ShopSettingCostsModel = new ShopSettingCostsModel();
		$shopSetting = $ShopSettingCostsModel->get_data_by_year( $last_year );
		if ( empty( $shopSetting ) ) {
			$incomeTax_1 = 0;
		} else {
			$incomeTax_1 = $shopSetting[0]->tax_income;
		}

		$this->data = array(
			'actual' => $this->get_actual_week_data(),
			'past' => $this->get_past_week_data()
		);

		$this->order_data = $this->data;

		$string = '';

		foreach( $this->order_data['actual'] as $week => $item ) {
		
			$value_2 = $this->order_data['past'][$week]['net-profit'];
			if ( empty( $value_2 ) ) {
				$value_2 = 0;
			}
			$value_1 = $item['net-profit'];
			if ( empty( $value_1 ) ) {
				$value_1 = 0;
			}
			
			$value_2 = round( $value_2, 1 );
			$value_1 = round( $value_1, 1 );
			$string .= "['" . $week . "', " . $value_1 . ", " . $value_2 . "],";			
		}

		return $string;

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
	 * @return string
	 */
	public function get_actual_week_data() {

		global $wpdb;
		$start_date = strtotime( $this->start_date . '00:00:00' );
		$end_date = strtotime( $this->end_date . '23:59:59' );

		$year = gmdate( 'Y' );

		$result = $wpdb->get_results(
			$wpdb->prepare(
				"
				SELECT 
					CONCAT(WEEK(formated_date), '-', COUNT(*), '-', SUM(order_subtotal), '-', SUM(cogs), '-', SUM(order_shipping_subtotal), '-', SUM(order_fees_subtotal), '-', SUM(order_shipping_cost), '-', SUM(order_payment_cost)) AS weekly_order_summary
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
				$shipping_cost	= $exploded[6];
				$payment_cost	= $exploded[7];

				//$revenue = $orders_total + $fees;
				$revenue = $orders_total + $fees;
				$margin_amount = $revenue - $cogs;
				$margin_percent = round( $margin_amount / ( $revenue / 100 ), 1 );

				$week_data[$week]['revenue'] = $revenue;
				$week_data[$week]['cogs'] = $cogs;
				$week_data[$week]['margin-amount'] = $margin_amount;
				$week_data[$week]['margin-percent'] = $margin_percent;
				$week_data[$week]['number-orders'] = $orders_count;
				$week_data[$week]['net-profit'] = $orders_total - $cogs;
				$week_data[$week]['shipping-cost'] = $this->get_shipping_income($week, $year);
				$week_data[$week]['payment-cost'] = $this->get_payment_income($week, $year);
				
			}	
			
			//Check empty weeks
			foreach( $weeks as $week_item ) {

				$week_value = $week_item['w'];
				$year = $week_item['y'];
				$OverviewCcaiData = new OverviewCcaiData( $week_item['first_day'], $week_item['last_day'] );
				$ccai = $OverviewCcaiData->get_data();

				$ShopSettingCostsModel = new ShopSettingCostsModel();
				$shopSetting = $ShopSettingCostsModel->get_data_by_year( $year );
				if ( empty( $shopSetting ) ) {
					$incomeTax = 0;
				} else {
					$incomeTax = $shopSetting[0]->tax_income;
				}

				if ( empty( $week_data[$week_value] ) ) {
					$new_array[$week_value]['revenue'] = '0';
					$new_array[$week_value]['cogs'] = '0';
					$new_array[$week_value]['margin-amount'] = '0';
					$new_array[$week_value]['margin-percent'] = '0';
					$new_array[$week_value]['number-orders'] = '0';
					$new_array[$week_value]['net-profit'] = '0';
					$new_array[$week_value]['shipping-cost'] = '0';
					$new_array[$week_value]['payment-cost'] = '0';
					$variable = 0;
					$fixed = 0;
					$income = 0;
					$total_tax = 0;
					$net_income = 0;
				} else {
					$new_array[$week_value] = $week_data[$week_value];
					$variable = 0;
					if ( !empty( $ccai['variable'] ) ) {
						foreach( $ccai['variable'] as $v ) {
							$variable += $v;
						}
					}
					$fixed = 0;
					if ( !empty( $ccai['fixed'] ) ) {
						foreach( $ccai['fixed'] as $f ) {
							$fixed += $f;
						}
					}
					$income = 0;
					if ( !empty( $ccai['income'] ) ) {
						foreach( $ccai['income'] as $in ) {
							$income += $in;
						}
					}
					$total_variable = $variable + $week_data[$week_value]['shipping-cost'] + $week_data[$week_value]['payment-cost'];
					$ebt = $week_data[$week_value]['revenue'] - ( $week_data[$week_value]['cogs'] + $total_variable + $fixed ) + $income;
					$total_tax = ( round( ( $ebt / 100 ) * $incomeTax, 0 ) * -1 );
					if ( $ebt < 0 ) {
						$net_income	= round( $ebt + $total_tax, 0 );
					} else {
						$net_income	= round( $ebt - $total_tax, 0 );
					}
					$new_array[$week_value]['net-profit'] = $net_income;
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

		$year = gmdate('Y');
		$lastYear = $year - 1;

		$result = $wpdb->get_results(
			$wpdb->prepare(
				"
				SELECT 
				CONCAT(WEEK(formated_date), '-', COUNT(*), '-', SUM(order_subtotal), '-', SUM(cogs), '-', SUM(order_shipping_subtotal), '-', SUM(order_fees_subtotal), '-', SUM(order_shipping_cost), '-', SUM(order_payment_cost)) AS weekly_order_summary
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

			$weeks = $this->get_all_weeks( $start_date, $end_date );

			foreach( $result as $result_item ) {

				$exploded 		= explode( '-', $result_item->weekly_order_summary );
				$week 			= $exploded[0];
				$orders_count 	= $exploded[1];
				$orders_total	= $exploded[2];
				$cogs 			= $exploded[3];
				$shipping 		= $exploded[4];
				$fees 			= $exploded[5];
				$shipping_cost	= $exploded[6];
				$payment_cost	= $exploded[7];
				
				$revenue = $orders_total + $fees;
				$margin_amount = $revenue - $cogs;
				$margin_percent = round( $margin_amount / ( $revenue / 100 ), 1 );

				$week_data[$week]['revenue'] = $revenue;
				$week_data[$week]['cogs'] = $cogs;
				$week_data[$week]['margin-amount'] = $margin_amount;
				$week_data[$week]['margin-percent'] = $margin_percent;
				$week_data[$week]['number-orders'] = $orders_count;
				$week_data[$week]['net-profit'] = $orders_total - $cogs;
				$week_data[$week]['shipping-cost'] = $this->get_shipping_income($week, $year);
				$week_data[$week]['payment-cost'] = $this->get_payment_income($week, $year);
				
			}		
			
			//Check empty weeks
			foreach( $weeks as $week_item ) {

				$week_value = $week_item['w'];
				$year = $week_item['y'];
				$OverviewCcaiData = new OverviewCcaiData( $week_item['first_day'], $week_item['last_day'] );
				$ccai = $OverviewCcaiData->get_data();

				$ShopSettingCostsModel = new ShopSettingCostsModel();
				$shopSetting = $ShopSettingCostsModel->get_data_by_year( $year );
				if ( empty( $shopSetting ) ) {
					$incomeTax = 0;
				} else {
					$incomeTax = $shopSetting[0]->tax_income;
				}

				if ( empty( $week_data[$week_value] ) ) {
					$new_array[$week_value]['revenue'] = '0';
					$new_array[$week_value]['cogs'] = '0';
					$new_array[$week_value]['margin-amount'] = '0';
					$new_array[$week_value]['margin-percent'] = '0';
					$new_array[$week_value]['number-orders'] = '0';
					$new_array[$week_value]['net-profit'] = '0';
					$new_array[$week_value]['shipping-cost'] = '0';
					$new_array[$week_value]['payment-cost'] = '0';
				} else {
					$new_array[$week_value] = $week_data[$week_value];
					$variable = 0;
					if ( !empty( $ccai['variable'] ) ) {
						foreach( $ccai['variable'] as $v ) {
							$variable += $v;
						}
					}
					$fixed = 0;
					if ( !empty( $ccai['fixed'] ) ) {
						foreach( $ccai['fixed'] as $f ) {
							$fixed += $f;
						}
					}
					$income = 0;
					if ( !empty( $ccai['income'] ) ) {
						foreach( $ccai['income'] as $in ) {
							$income += $in;
						}
					}
					$total_variable = $variable + $week_data[$week_value]['shipping-cost'] + $week_data[$week_value]['payment-cost'];
					$ebt = $week_data[$week_value]['revenue'] - ( $week_data[$week_value]['cogs'] + $total_variable + $fixed ) + $income;
					$total_tax = ( round( ( $ebt / 100 ) * $incomeTax, 0 ) * -1 );
					if ( $ebt < 0 ) {
						$net_income	= round( $ebt + $total_tax, 0 );
					} else {
						$net_income	= round( $ebt - $total_tax, 0 );
					}
					$new_array[$week_value]['net-profit'] = $net_income;
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
			$ccai_data = array();
			foreach( $result as $item ) {
				
				if ( ( $start_date >= $item['date_start'] && $start_date <= $item['date_end'] ) || ( $end_date >= $item['date_start'] && $end_date <= $item['date_end'] ) ) {
					$ccai_data[] = $item;
				}
			}

			$this->ccai_data = $ccai_data;

			//Calculate variable data
			if ( !empty( $this->ccai_data ) ) {
				foreach( $this->ccai_data as $ccai_item ) {
					if ( 'variable' == $ccai_item['type'] ) {
						$variable_weeks_data = $this->get_week_ranges( $start_date, $end_date, $ccai_item['date_start'], $ccai_item['date_end'] );
						foreach( $variable_weeks_data as $data_item ) {
							$price = $this->get_variable_amount( $ccai_item, $data_item );
							$this->order_data[$year][$data_item['week']]['variable'] += $price;							
						}
					}
				
				}
			}
			
			//Calculate Fixed data
			if ( !empty( $this->ccai_data ) ) {
				foreach( $this->ccai_data as $ccai_item ) {
					if ( 'fixed' == $ccai_item['type'] ) {
						$fixed_weeks_data = $this->get_week_ranges( $start_date, $end_date, $ccai_item['date_start'], $ccai_item['date_end'] );
						$range_days = 0;
						foreach( $fixed_weeks_data as $data_item ) {
							$range_days += $data_item['count'];
						}
						foreach( $fixed_weeks_data as $data_item ) {
							$price = $this->get_fixed_or_income_amount( $ccai_item, $data_item, $range_days, 'fixed' );
							$this->order_data[$year][$data_item['week']]['fixed'] += $price;							
						}
					}
				}
			}

			//Calculate Income data
			if ( !empty( $this->ccai_data ) ) {
				foreach( $this->ccai_data as $ccai_item ) {
					if ( 'income' == $ccai_item['type'] ) {
						$fixed_weeks_data = $this->get_week_ranges( $start_date, $end_date, $ccai_item['date_start'], $ccai_item['date_end'] );
						$range_days = 0;
						foreach( $fixed_weeks_data as $data_item ) {
							$range_days += $data_item['count'];
						}
						foreach( $fixed_weeks_data as $data_item ) {
							$price = $this->get_fixed_or_income_amount( $ccai_item, $data_item, $range_days, 'income' );
							$this->order_data[$year][$data_item['week']]['income'] += $price;	
						}
					}
				}
			}

		}
		
	}
	
	/**
	 * Get variable amount
	 * 
	 * @return float
	 */
	public function get_variable_amount( $ccai_item, $item ) {

		global $wpdb;

		$week = $item['week'];
		
		if ( true == $item['is_full_week'] ) {				
			if ( 'amount' == $ccai_item['amount-type'] ) {
				$orders_count = $this->order_data['actual'][$item['week']]['number-orders'];
				$price = $orders_count * $ccai_item['amount'];					
			} else {
				$orders_total = $this->order_data['actual'][$item['week']]['revenue'];
				$price = ( $orders_total / 100 ) * $ccai_item['amount'];
			}
		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT COUNT(*) as count, SUM(order_subtotal) as total, SUM(order_fees_subtotal) as fee FROM %i WHERE order_date BETWEEN %s AND %s;",
					array(
						$wpdb->prefix . 'profitblue_orders',
						$item['range']['start'],
						$item['range']['end']
					)
				)
			);
			if ( !empty( $result ) ) {
				$orders_count	= $result[0]->count;
				$orders_total 	= $result[0]->total;
				$fee			= $result[0]->fee;	
				//$revenue = $orders_total + $fee;
				$revenue = $orders_total;
				if ( 'amount' == $ccai_item['amount-type'] ) {
					$price = $orders_count * $ccai_item['amount'];
				} else {
					$price = ( $revenue / 100 ) * $ccai_item['amount'];
				}
			}
		}

		return $price;

	}

	/**
	 * Get shipping and payment amount
	 * 
	 * @return void
	 */
	public function get_shipping_payment_amount( $start_date, $end_date, $year ) {

		global $wpdb;

		$weeks = $this->get_primary_week_ranges( $start_date, $end_date );

		if ( empty( $this->order_data[$year][$item['week']]['variable'] ) ) {
			$this->order_data[$year][$item['week']]['variable'] = 0;
		}
		if ( empty( $this->order_data[$year][$item['week']]['shipping-cost'] ) ) {
			$this->order_data[$year][$item['week']]['shipping-cost'] = 0;
		}
		if ( empty( $this->order_data[$year][$item['week']]['payment-cost'] ) ) {
			$this->order_data[$year][$item['week']]['payment-cost'] = 0;
		}

		foreach( $weeks as $item ) {
			$week = $item['week'];
			
			if ( true == $item['is_full_week'] ) {				
				$this->order_data[$year][$item['week']]['variable'] += $this->order_data[$year][$item['week']]['shipping-cost'];
				$this->order_data[$year][$item['week']]['variable'] += $this->order_data[$year][$item['week']]['payment-cost'];
			} else {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT SUM(order_shipping_cost) AS shipping_cost, '-', SUM(order_payment_cost) AS payment_cost FROM %i WHERE order_date BETWEEN %s AND %s;",
						array(
							$wpdb->prefix . 'profitblue_orders',
							$item['range']['start'],
							$item['range']['end']
						)
					)
				);
				if ( !empty( $result ) ) {
					$shipping_cost	= $result[0]->shipping_cost;
					$payment_cost 	= $result[0]->payment_cost;
					$this->order_data[$year][$item['week']]['variable'] += $shipping_cost;
					$this->order_data[$year][$item['week']]['variable'] += $payment_cost;
				}
			}
		}

	}

	/**
	 * Get fixed amount
	 * 
	 * @return float
	 */
	public function get_fixed_or_income_amount( $ccai_item, $item, $range_days, $type ) {

		$week = $item['week'];
		$days  = $item['count'];
		$full_week_days = $item['full_count'];
		
		if ( 'yes' == $ccai_item['manually'] ) {
			if ( true == $item['is_full_week'] ) {
				$price = $ccai_item['month-' . $month];
			} else {
				$price = ( $ccai_item['month-' . $month] / $full_week_days ) * $days;
			}
		} else {
			$price = ( $ccai_item['amount'] / 365 ) * $days;
		}
				
		return $price;		

	}

	/**
	 * Get week ranges
	 * 
	 * @return array
	 */
	public function get_week_ranges( $primary_start, $primary_end, $setting_start, $setting_end ) {

		$primary_start_date_time = new \DateTime($primary_start);
		$primary_end_date_time = new \DateTime($primary_end);
		$setting_start_date_time = new \DateTime($setting_start);
		$setting_end_date_time = new \DateTime($setting_end);

		$results = [];
		

		// Iterate over each week in the primary range
		while ($primary_start_date_time <= $primary_end_date_time) {
			// Determine the end of the week
			$end_of_week = clone $primary_start_date_time;
			$end_of_week->modify('next sunday')->setTime(23, 59, 59);

			// Adjust the end of the week to not exceed the primary end date
			if ($end_of_week > $primary_end_date_time) {
				$end_of_week = $primary_end_date_time;
			}

			// Check if the week overlaps with the setting range
			if ($end_of_week >= $setting_start_date_time && $primary_start_date_time <= $setting_end_date_time) {
				// Adjust the start and end dates based on the overlapping range
				$start = ($primary_start_date_time < $setting_start_date_time) ? $setting_start_date_time : $primary_start_date_time;
				$end = ($end_of_week > $setting_end_date_time) ? $setting_end_date_time : $end_of_week;
				$week = $start->format('W');
				
				// Calculate the number of days in the range
				$interval = $start->diff($end);
				$days_in_range = $interval->days + 1; // Adding 1 because the end date is inclusive

				// Total days in a week (usually 7)
				$total_days_in_week = 7;

				// Determine if it's a full week or part of the week
				$is_full_week = $days_in_range == 7;

				// Add to results
				$results[] = array(
					'week' => $week,
					'range' => array(
						'start' => $start->format('Y-m-d'),
						'end' => $end->format('Y-m-d')
					),
					'count' => $days_in_range,
					'full_count' => $total_days_in_week,
					'is_full_week' => $is_full_week
				);
			}

			// Move to the next week
			$primary_start_date_time->modify('next monday');
		}

		return $results;

	}

	/**
	 * Get past date
	 * 
	 * @return array
	 */
	public function get_primary_week_ranges($primary_start, $primary_end) {
		$primary_start_date_time = new \DateTime($primary_start);
		$primary_end_date_time = new \DateTime($primary_end);
	
		$results = [];
	
		// Iterate over each week in the primary range
		while ($primary_start_date_time < $primary_end_date_time) {
			// Get the end of the week (Sunday)
			$end_of_week = clone $primary_start_date_time;
			$end_of_week->modify('next sunday');
	
			// Make sure the end of the week doesn't exceed the primary range
			if ($end_of_week > $primary_end_date_time) {
				$end_of_week = $primary_end_date_time;
			}
	
			// Calculate the number of days in this week range
			$interval = $primary_start_date_time->diff($end_of_week);
			$days_in_range = $interval->days + 1; // +1 because end date is inclusive
	
			// Determine if it's a full week (7 days)
			$is_full_week = $days_in_range == 7;
	
			// Add to results
			$results[] = [
				'week' => $primary_start_date_time->format('W'),
				'range' => [
					'start' => $primary_start_date_time->format('Y-m-d'),
					'end' => $end_of_week->format('Y-m-d')
				],
				'days_in_range' => $days_in_range,
				'is_full_week' => $is_full_week
			];
	
			// Move to the start of the next week
			$primary_start_date_time = $end_of_week->modify('+1 day');
		}
	
		return $results;
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
			$data = array();
			$data['w'] = (int)gmdate( 'W', $current_time );
			$data['y'] = gmdate( 'Y', $current_time );
			$data['first_day'] = gmdate( 'Y-m-d', $current_time );
			$data['last_day'] = gmdate( 'Y-m-d', strtotime('+6 days', $current_time) );
			$weeks[] = $data;
			$current_time = strtotime('+1 week', $current_time);
		}
		
		return $weeks;

	}

	/**
	 * Get order shipping income
	 *
	 * @return float
	 */
	public function get_shipping_income($week, $year) {

		global $wpdb;
		$date = new \DateTime();
		$date->setISODate($year, $week);
		$start_date = $date->format('Y-m-d');
		$date->modify('+6 days');
		$end_date = $date->format('Y-m-d');

		$ordersController = new OrdersController();
		
		$shipping_cost_total = 0;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE order_date BETWEEN %s AND %s",
				array(
					$wpdb->prefix . 'profitblue_orders',
					strtotime( $start_date . '00:00:00' ),
					strtotime($end_date . '23:59:59' )
				)
			)
		);
		if ( !empty( $result ) ) {
			foreach( $result as $order ) {

				$shipping_income = $ordersController->get_order_shipping_income( $order );
				$shipping_cost_total += $shipping_income['shipping_cost'];

			}
		}

		return $shipping_cost_total;

	}

	/**
	 * Get order payment income
	 *
	 * @return float
	 */
	public function get_payment_income($week, $year) {

		global $wpdb;
		$date = new \DateTime();
		$date->setISODate($year, $week);
		$start_date = $date->format('Y-m-d');
		$date->modify('+6 days');
		$end_date = $date->format('Y-m-d');

		//Set data
		$ordersController = new OrdersController();
		
		$payment_cost_total = 0;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE order_date BETWEEN %s AND %s",
				array(
					$wpdb->prefix . 'profitblue_orders',
					strtotime( $start_date . '00:00:00' ),
					strtotime($end_date . '23:59:59' )
				)
			)
		);
		if ( !empty( $result ) ) {
			foreach( $result as $order_result ) {

				$value = $ordersController->get_order_payment_income( $order_result );
				$payment_cost_total += $value;
				
			}
		}

		return $payment_cost_total;
	}
	
}
