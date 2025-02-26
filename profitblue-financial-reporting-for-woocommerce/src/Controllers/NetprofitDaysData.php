<?php

namespace Profitblue\Controllers;

use ProfitBlue\Helpers\Helper;
use ProfitBlue\Models\ShopSettingCostsModel;
use ProfitBlue\Controllers\OverviewCcaiData;
use ProfitBlue\Controllers\OrdersController;

/**
 * NetprofitDaysData
 */
class NetprofitDaysData {
	
	/**
	 * order_data
	 *
	 * @var array
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
	 * @var undestringfined
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

		$this->mode = $mode;		

	}

	/**
	 * Get Days data
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
			'actual' => $this->get_actual_year_data(),
			'past' => $this->get_past_year_data()
		);

		$this->order_data = $this->data;
		
		$string = '';

		foreach( $this->order_data['actual'] as $day => $item ) {
			
			//Define values
			$revenue 	= Helper::get_value_from_array( $item, 'revenue' );
			$cogs 		= Helper::get_value_from_array( $item, 'cogs' );
			$variable 	= Helper::get_value_from_array( $item, 'variable' );
			$fixed 	    = Helper::get_value_from_array( $item, 'fixed' );
			$income 	= Helper::get_value_from_array( $item, 'income' );
			$net_income = Helper::get_value_from_array( $item, 'net-profit' );

			$margin_after_cogs_and_variable_2 = $revenue - ( $cogs + $variable );
			$total_fixed_and_income_2 		= $fixed - $income;
			$ebt_2 							= $margin_after_cogs_and_variable_2 - $total_fixed_and_income_2;
			$total_tax_2					= ( round( ( $ebt_2 / 100 ) * $incomeTax_2, 0 ) * -1 );
			
			if ( !empty( $this->data['past'][$day] ) ) {
				$margin_after_cogs_and_variable_1 = $this->data['past'][$day]['revenue'] - ( $this->data['past'][$day]['cogs'] + $this->data['past'][$day]['variable'] );
				$total_fixed_and_income_1 		= $this->data['past'][$day]['fixed'] - $this->data['past'][$day]['income'];
				$ebt_1 							= $margin_after_cogs_and_variable_1 - $total_fixed_and_income_1;
				$total_tax_1					= ( round( ( $ebt_1 / 100 ) * $incomeTax_1, 0 ) * -1 );
				$net_income_1	= $this->data['past'][$day]['net-profit'];
			} else {
				$net_income_1 = 0;
			}

			$value_2 = round( $net_income, 1 );
			$value_1 = round( $net_income_1, 1 );
			$date_string = gmdate( 'd.m. Y', strtotime( $day ) );
			$string .= "['" . $date_string . "', " . $value_1 . ", " . $value_2 . "],";
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

				//$revenue = $orders_total + $fees;
				$revenue = $orders_total;
				$margin_amount = $revenue - $cogs;

				$day_data[$day]['year'] = $_year;
				$day_data[$day]['revenue'] = $revenue;
				$day_data[$day]['cogs'] = $cogs;
				$day_data[$day]['margin-amount'] = $margin_amount;
				$day_data[$day]['number-orders'] = $orders_count;
				$day_data[$day]['net-profit'] = $orders_total - $cogs - $shipping_cost - $payment_cost;
				$day_data[$day]['shipping-cost'] = $this->get_shipping_income( $day );
				$day_data[$day]['payment-cost'] = $this->get_payment_income( $day );								
				
			}

			$total_revenue = 0;
			$total_cogs = 0;
			$total_variable = 0;
			$total_fixed = 0;
			$total_income = 0;
			$total_shipping = 0;
			$total_payment = 0;
			$total_total_tax = 0;
			$total_net_income = 0;

			//Check empty days
			foreach( $days as $day_value ) {

				$OverviewCcaiData = new OverviewCcaiData( $day_value, $day_value );
				$ccai = $OverviewCcaiData->get_data();
				$year = gmdate( 'Y', strtotime( $day ) );

				$ShopSettingCostsModel = new ShopSettingCostsModel();
				$shopSetting = $ShopSettingCostsModel->get_data_by_year( $year );
				if ( empty( $shopSetting ) ) {
					$incomeTax = 0;
				} else {
					$incomeTax = $shopSetting[0]->tax_income;
				}

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
					$total_variable = $variable + $day_data[$day_value]['shipping-cost'] + $day_data[$day_value]['payment-cost'];
					$ebt = $day_data[$day_value]['revenue'] - ( $day_data[$day_value]['cogs'] + $total_variable + $fixed ) + $income;
					$total_tax = ( round( ( $ebt / 100 ) * $incomeTax, 0 ) );
					$net_income	= round( $ebt - $total_tax, 0 );					
					$new_array[$day_value]['net-profit'] = $net_income;											
					
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

			$days = $this->get_days( $start_date, $end_date );

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
				
				$revenue = $orders_total + $fees;
				$margin_amount = $revenue - $cogs;
				
				$day_data[$day]['revenue'] = $revenue;
				$day_data[$day]['cogs'] = $cogs;
				$day_data[$day]['margin-amount'] = $margin_amount;
				$day_data[$day]['number-orders'] = $orders_count;
				$day_data[$day]['net-profit'] = $orders_total - $cogs;
				$day_data[$day]['shipping-cost'] = $this->get_shipping_income( $day );
				$day_data[$day]['payment-cost'] = $this->get_payment_income( $day );
				
			}			
			
			//Check empty months
			foreach( $days as $day_value ) {

				$OverviewCcaiData = new OverviewCcaiData( $day_value, $day_value );
				$ccai = $OverviewCcaiData->get_data();
				$year = gmdate( 'Y', strtotime( $day ) );

				$ShopSettingCostsModel = new ShopSettingCostsModel();
				$shopSetting = $ShopSettingCostsModel->get_data_by_year( $year );				
				if ( empty( $shopSetting ) ) {
					$incomeTax = 0;
				} else {
					$incomeTax = $shopSetting[0]->tax_income;
				}

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
					$total_variable = $variable + $day_data[$day_value]['shipping-cost'] + $day_data[$day_value]['payment-cost'];
					$ebt = $day_data[$day_value]['revenue'] - ( $day_data[$day_value]['cogs'] + $total_variable + $fixed ) + $income;
					$total_tax = ( round( ( $ebt / 100 ) * $incomeTax, 0 ) * -1 );
					if ( $ebt < 0 ) {
						$net_income	= round( $ebt + $total_tax, 0 );
					} else {
						$net_income	= round( $ebt - $total_tax, 0 );
					}
					$new_array[$day_value]['net-profit'] = $net_income;
				}

			}

		}		
	
		return $new_array;

	}

	/**
	 * get_period_data
	 *
	 * @param  string $start_date
	 * @param  string $end_date
	 * @param  string $year
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
						foreach( $days as $day ) {
							$orders = $this->order_data[$year][$day]['number-orders'];
							$orders_total = $this->order_data[$year][$day]['revenue'];
							$price = $this->get_variable_amount( $ccai_item, $orders, $orders_total );
							$this->order_data[$year][$day]['variable'] += $price;						
						}
					}
				
				}
			}
			
			//Calculate Fixed data
			if ( !empty( $this->ccai_data ) ) {
				foreach( $this->ccai_data as $ccai_item ) {
					if ( 'fixed' == $ccai_item['type'] ) {												
						foreach( $days as $day ) {
							$price = $this->get_fixed_or_income_amount( $ccai_item, $day );
							$this->order_data[$year][$day]['fixed'] += $price;						
						}
					}
				}
			}

			//Calculate Income data
			if ( !empty( $this->ccai_data ) ) {
				foreach( $this->ccai_data as $ccai_item ) {
					if ( 'income' == $ccai_item['type'] ) {
						foreach( $days as $day ) {
							$price = $this->get_fixed_or_income_amount( $ccai_item, $day );
							$this->order_data[$year][$day]['fixed'] += $price;						
						}
					}
				}
			}

		}
		
	}
	
	/**
	 * get_variable_amount
	 *
	 * @param  array $ccai_item
	 * @param  array $orders
	 * @param  float $orders_total
	 * @return float
	 */
	public function get_variable_amount( $ccai_item, $orders, $orders_total ) {
					
		if ( 'amount' == $ccai_item['amount-type'] ) {
			$price = $orders_count * $ccai_item['amount'];					
		} else {
			
			$price = ( $orders_total / 100 ) * $ccai_item['amount'];
		}
		return $price;

	}

	/**
	 * get_shipping_payment_amount
	 *
	 * @param  string $start_date
	 * @param  string $end_date
	 * @param  string $year
	 * @return void
	 */
	public function get_shipping_payment_amount( $start_date, $end_date, $year ) {

		$days = $this->get_days( $start_date, $end_date );

		if ( empty( $this->order_data[$year][$item['month']]['variable'] ) ) {
			$this->order_data[$year][$item['month']]['variable'] = 0;
		}
		if ( empty( $this->order_data[$year][$item['month']]['shipping-cost'] ) ) {
			$this->order_data[$year][$item['month']]['shipping-cost'] = 0;
		}
		if ( empty( $this->order_data[$year][$item['month']]['payment-cost'] ) ) {
			$this->order_data[$year][$item['month']]['payment-cost'] = 0;
		}

		foreach( $days as $day ) {			
			$this->order_data[$year][$item['month']]['variable'] += $this->order_data[$year][$day]['shipping-cost'];
			$this->order_data[$year][$item['month']]['variable'] += $this->order_data[$year][$day]['payment-cost'];			
		}

	}

	/**
	 * get_fixed_or_income_amount
	 *
	 * @param  array $ccai_item
	 * @param  string $day
	 * @return float
	 */
	public function get_fixed_or_income_amount( $ccai_item, $day ) {

		$day_time = strtotime($day);
		$date = new \DateTime($day);
		$month_days = $date->format('t');

		if ( 'yes' == $ccai_item['manually'] ) {
			$price = $ccai_item['month-' . $month] / $month_days;
		} else {
			$price = $ccai_item['amount'] / 365;
		}
				
		return $price;		

	}
	
	/**
	 * get_past_date
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

	/**
	 * Get order shipping income
	 *
	 * @return float
	 */
	public function get_shipping_income( $day_date ) {

		global $wpdb;

		//Set data
		$ordersController = new OrdersController();
		
		$shipping_cost_total = 0;
		$result = $wpdb->get_results(
			$wpdb->prepare( 
				"SELECT * FROM %i WHERE order_date BETWEEN %s AND %s",
				array(
					$wpdb->prefix . 'profitblue_orders',
					strtotime( $day_date . '00:00:00' ),
					strtotime($day_date . '23:59:59' )
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
	public function get_payment_income( $day_date ) {

		global $wpdb;
		$ordersController = new OrdersController();
		
		$payment_cost_total = 0;
		$result = $wpdb->get_results(
			$wpdb->prepare( 
				"SELECT * FROM %i WHERE order_date BETWEEN %s AND %s",
				array(
					$wpdb->prefix . 'profitblue_orders',
					strtotime( $day_date . '00:00:00' ),
					strtotime($day_date . '23:59:59' )
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
