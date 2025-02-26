<?php

namespace Profitblue\Controllers;

use ProfitBlue\Helpers\Helper;
use ProfitBlue\Models\ShopSettingCostsModel;
use ProfitBlue\Controllers\OverviewCcaiData;
use ProfitBlue\Controllers\OrdersController;

/**
 * NetprofitMonthsData
 */
class NetprofitMonthsData {
	
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
			'actual' => $this->get_actual_year_data(),
			'past' => $this->get_past_year_data()
		);

		$this->order_data = $this->data;
		
		$this->get_period_data( $this->start_date, $this->end_date, 'actual' );
		$this->get_shipping_payment_amount( $this->start_date, $this->end_date, 'actual' );
		$past_start_date = $this->get_past_date( $this->start_date );
		$past_end_date   = $this->get_past_date( $this->end_date );
		$this->get_period_data( $past_start_date, $past_end_date, 'past' );
		$this->get_shipping_payment_amount( $past_start_date, $past_end_date, 'past' );
		

		$string = '';

		foreach( $this->order_data['actual'] as $month => $item ) {

			if ( empty( $this->order_data['past'][$month]['net-profit'] ) ) {
				$this->order_data['past'][$month]['net-profit'] = 0;
			}

			$value_2 = $this->order_data['past'][$month]['net-profit'];
			if ( empty( $value_2 ) ) {
				$value_2 = 0;
			}
			$value_1 = $item['net-profit'];
			if ( empty( $value_1 ) ) {
				$value_1 = 0;
			}
			$string .= "['" . $month . "', " . $value_2 . ", " . $value_1 . "],";
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
	public function get_actual_year_data() {

		global $wpdb;

		$start_date = strtotime( $this->start_date . '00:00:00' );
		$end_date = strtotime( $this->end_date . '23:59:59' );
		$year = gmdate( 'Y' );

		$result = $wpdb->get_results(
			$wpdb->prepare(
				"
			SELECT 
				CONCAT(MONTH(formated_date), '-', COUNT(*), '-', SUM(order_subtotal), '-', SUM(cogs), '-', SUM(order_shipping_subtotal), '-', SUM(order_fees_subtotal), '-', SUM(order_shipping_cost), '-', SUM(order_payment_cost)) AS monthly_order_summary
			FROM 
				%i
			WHERE 
				order_date BETWEEN %s AND %s
			GROUP BY 
				MONTH(formated_date)
			ORDER BY 
				MONTH(formated_date);",
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
				$shipping_cost	= $exploded[6];
				$payment_cost	= $exploded[7];

				//$revenue = $orders_total + $fees;
				$revenue = $orders_total;
				$margin_amount = $revenue - $cogs;
				$margin_percent = round( $margin_amount / ( $revenue / 100 ), 1 );

				$year_data[$month]['revenue'] = $revenue;
				$year_data[$month]['cogs'] = $cogs;
				$year_data[$month]['margin-amount'] = $margin_amount;
				$year_data[$month]['margin-percent'] = $margin_percent;
				$year_data[$month]['number-orders'] = $orders_count;
				$year_data[$month]['net-profit'] = $orders_total - $cogs;
				$year_data[$month]['shipping-cost'] = $this->get_shipping_income($month, $year);
				$year_data[$month]['payment-cost'] = $this->get_payment_income($month, $year);
				
			}	
			
			//Check empty months
			foreach( $months as $month_item ) {

				$month_value = $month_item['m'];
				$year = $month_item['y'];
				$OverviewCcaiData = new OverviewCcaiData( $month_item['first_day'], $month_item['last_day'] );
				$ccai = $OverviewCcaiData->get_data();

				$ShopSettingCostsModel = new ShopSettingCostsModel();
				$shopSetting = $ShopSettingCostsModel->get_data_by_year( $year );
				if ( empty( $shopSetting ) ) {
					$incomeTax = 0;
				} else {
					$incomeTax = $shopSetting[0]->tax_income;
				}
				
				if ( empty( $year_data[$month_value] ) ) {
					$new_array[$month_value]['revenue'] = '0';
					$new_array[$month_value]['cogs'] = '0';
					$new_array[$month_value]['margin-amount'] = '0';
					$new_array[$month_value]['margin-percent'] = '0';
					$new_array[$month_value]['number-orders'] = '0';
					$new_array[$month_value]['net-profit'] = '0';
					$new_array[$month_value]['shipping-cost'] = '0';
					$new_array[$month_value]['payment-cost'] = '0';
				} else {
					$new_array[$month_value] = $year_data[$month_value];
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
					$total_variable = $variable + $year_data[$month_value]['shipping-cost'] + $year_data[$month_value]['payment-cost'];
					$ebt = $year_data[$month_value]['revenue'] - ( $year_data[$month_value]['cogs'] + $total_variable + $fixed ) + $income;
					$total_tax = ( round( ( $ebt / 100 ) * $incomeTax, 0 ) );
					$net_income	= round( $ebt - $total_tax, 0 );
					
					$new_array[$month_value]['net-profit'] = $net_income;					

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
		$year = gmdate('Y');
		$lastYear = $year - 1;

		$result = $wpdb->get_results(
			$wpdb->prepare(
				"
			SELECT 
				CONCAT(MONTH(formated_date), '-', COUNT(*), '-', SUM(order_subtotal), '-', SUM(cogs), '-', SUM(order_shipping_subtotal), '-', SUM(order_fees_subtotal), '-', SUM(order_shipping_cost), '-', SUM(order_payment_cost)) AS monthly_order_summary
			FROM 
				%i
			WHERE 
				order_date BETWEEN %s AND %s
			GROUP BY 
				MONTH(formated_date)
			ORDER BY 
				MONTH(formated_date);",
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
				$shipping_cost	= $exploded[6];
				$payment_cost	= $exploded[7];
				
				$revenue = $orders_total;
				$margin_amount = $revenue - $cogs;
				$margin_percent = round( $margin_amount / ( $revenue / 100 ), 1 );

				$year_data[$month]['revenue'] = $revenue;
				$year_data[$month]['cogs'] = $cogs;
				$year_data[$month]['margin-amount'] = $margin_amount;
				$year_data[$month]['margin-percent'] = $margin_percent;
				$year_data[$month]['number-orders'] = $orders_count;
				$year_data[$month]['net-profit'] = $orders_total - $cogs;
				$year_data[$month]['shipping-cost'] = $this->get_shipping_income($month, $lastYear);
				$year_data[$month]['payment-cost'] = $this->get_payment_income($month, $lastYear);
				
			}		
			
			//Check empty months
			foreach( $months as $month_item ) {

				$month_value = $month_item['m'];
				$year = $month_item['y'];
				$OverviewCcaiData = new OverviewCcaiData( $month_item['first_day'], $month_item['last_day'] );
				$ccai = $OverviewCcaiData->get_data();

				$ShopSettingCostsModel = new ShopSettingCostsModel();
				$shopSetting = $ShopSettingCostsModel->get_data_by_year( $year );
				if ( empty( $shopSetting ) ) {
					$incomeTax = 0;
				} else {
					$incomeTax = $shopSetting[0]->tax_income;
				}

				if ( empty( $year_data[$month_value] ) ) {
					$new_array[$month_value]['revenue'] = '0';
					$new_array[$month_value]['cogs'] = '0';
					$new_array[$month_value]['margin-amount'] = '0';
					$new_array[$month_value]['margin-percent'] = '0';
					$new_array[$month_value]['number-orders'] = '0';
					$new_array[$month_value]['net-profit'] = '0';
					$new_array[$month_value]['shipping-cost'] = '0';
					$new_array[$month_value]['payment-cost'] = '0';
				} else {
					$new_array[$month_value] = $year_data[$month_value];
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
					$total_variable = $variable + $year_data[$month_value]['shipping-cost'] + $year_data[$month_value]['payment-cost'];
					$ebt = $year_data[$month_value]['revenue'] - ( $year_data[$month_value]['cogs'] + $total_variable + $fixed ) + $income;
					$total_tax = ( round( ( $ebt / 100 ) * $incomeTax, 0 ) * -1 );
					if ( $ebt < 0 ) {
						$net_income	= round( $ebt + $total_tax, 0 );
					} else {
						$net_income	= round( $ebt - $total_tax, 0 );
					}
					$new_array[$month_value]['net-profit'] = $net_income;
					
				}

			}

		}		
	
		return $new_array;

	}

	/**
	 * Get Period data
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
						$variable_months_data = $this->get_month_ranges( $start_date, $end_date, $ccai_item['date_start'], $ccai_item['date_end'] );
						foreach( $variable_months_data as $data_item ) {
							$price = $this->get_variable_amount( $ccai_item, $data_item );
							if ( empty( $this->order_data[$year][$data_item['month']]['variable'] ) ) {
								$this->order_data[$year][$data_item['month']]['variable'] = $price;
							} else {
								$this->order_data[$year][$data_item['month']]['variable'] += $price;
							}
						}
					}
				
				}
			}
			
			//Calculate Fixed data
			if ( !empty( $this->ccai_data ) ) {
				foreach( $this->ccai_data as $ccai_item ) {
					if ( 'fixed' == $ccai_item['type'] ) {
						$fixed_months_data = $this->get_month_ranges( $start_date, $end_date, $ccai_item['date_start'], $ccai_item['date_end'] );
						$range_days = 0;
						foreach( $fixed_months_data as $data_item ) {
							$range_days += $data_item['count'];
						}
						foreach( $fixed_months_data as $data_item ) {
							$price = $this->get_fixed_or_income_amount( $ccai_item, $data_item, $range_days, 'fixed' );
							if ( empty( $this->order_data[$year][$data_item['month']]['fixed'] ) ) {
								$this->order_data[$year][$data_item['month']]['fixed'] = $price;
							} else {
								$this->order_data[$year][$data_item['month']]['fixed'] += $price;
							}
						}
					}
				}
			}

			//Calculate Income data
			if ( !empty( $this->ccai_data ) ) {
				foreach( $this->ccai_data as $ccai_item ) {
					if ( 'income' == $ccai_item['type'] ) {
						$fixed_months_data = $this->get_month_ranges( $start_date, $end_date, $ccai_item['date_start'], $ccai_item['date_end'] );
						$range_days = 0;
						foreach( $fixed_months_data as $data_item ) {
							$range_days += $data_item['count'];
						}
						foreach( $fixed_months_data as $data_item ) {
							$price = $this->get_fixed_or_income_amount( $ccai_item, $data_item, $range_days, 'income' );
							if ( empty( $this->order_data[$year][$data_item['month']]['income'] ) ) {
								$this->order_data[$year][$data_item['month']]['income'] = $price;
							} else {
								$this->order_data[$year][$data_item['month']]['income'] += $price;
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
	 * @param  string $ccai_item
	 * @param  array $item
	 * @return float
	 */
	public function get_variable_amount( $ccai_item, $item ) {

		global $wpdb;

		if ( empty( $item ) ) {
			return $price;
		}

		$month = $item['month'];
		
		if ( true == $item['is_full_month'] ) {				
			if ( 'amount' == $ccai_item['amount-type'] ) {
				$orders_count = $this->order_data['actual'][$item['month']]['number-orders'];
				$price = $orders_count * $ccai_item['amount'];					
			} else {
				$orders_total = $this->order_data['actual'][$item['month']]['revenue'];
				$price = ( $orders_total / 100 ) * $ccai_item['amount'];
			}
		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"
				SELECT 
					COUNT(*) as count, SUM(order_subtotal) as total, SUM(order_fees_subtotal) as fee
				FROM 
					%i
				WHERE 
					order_date BETWEEN %s AND %s
				GROUP BY 
					MONTH(formated_date)
				ORDER BY 
					MONTH(formated_date);",
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
	 * @param  string $start_date
	 * @param  string $end_date
	 * @param  string $year
	 * @return void
	 */
	public function get_shipping_payment_amount( $start_date, $end_date, $year ) {

		global $wpdb;

		$months = $this->get_primary_month_ranges( $start_date, $end_date );

		foreach( $months as $item ) {
			
			$month = $item['month'];
			if ( empty( $this->order_data[$year][$item['month']]['variable'] ) ) {
				$this->order_data[$year][$item['month']]['variable'] = 0;
			}
			if ( empty( $this->order_data[$year][$item['month']]['shipping-cost'] ) ) {
				$this->order_data[$year][$item['month']]['shipping-cost'] = 0;
			}
			if ( empty( $this->order_data[$year][$item['month']]['payment-cost'] ) ) {
				$this->order_data[$year][$item['month']]['payment-cost'] = 0;
			}
			
			if ( true == $item['is_full_month'] ) {				
				$this->order_data[$year][$item['month']]['variable'] += $this->order_data[$year][$item['month']]['shipping-cost'];
				$this->order_data[$year][$item['month']]['variable'] += $this->order_data[$year][$item['month']]['payment-cost'];
			} else {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"
					SELECT 
						SELECT SUM(order_shipping_cost)) AS shipping_cost, '-', SUM(order_payment_cost)) AS payment_cost
					FROM 
						%i
					WHERE 
						order_date BETWEEN %s AND %s
					GROUP BY 
						MONTH(formated_date)
					ORDER BY 
						MONTH(formated_date);",
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
					$this->order_data[$year][$item['month']]['variable'] += $shipping_cost;
					$this->order_data[$year][$item['month']]['variable'] += $payment_cost;
				}
			}
		}

	}

	/**
	 * Get fixed amount
	 * 
	 * @param  array $ccai_item
	 * @param  array $item
	 * @param  array $range_days
	 * @param  string $type
	 * @return float
	 */
	public function get_fixed_or_income_amount( $ccai_item, $item, $range_days, $type ) {

		$month = $item['month'];
		$days  = $item['count'];
		$full_month_days = $item['full_count'];
		
		if ( 'yes' == $ccai_item['manually'] ) {
			if ( true == $item['is_full_month'] ) {
				$price = $ccai_item['month-' . $month];
			} else {
				$price = ( $ccai_item['month-' . $month] / $full_month_days ) * $days;
			}
		} else {
			$price = ( $ccai_item['amount'] / 365 ) * $days;
		}
				
		return $price;		

	}

	/**
	 * Get month ranges
	 * 
	 * @param  string $primary_start
	 * @param  string $primary_end
	 * @param  string $setting_start
	 * @param  string $setting_end
	 * @return array
	 */
	public function get_month_ranges( $primary_start, $primary_end, $setting_start, $setting_end ) {

		$primary_start_date_time = new \DateTime($primary_start);
		$primary_end_date_time = new \DateTime($primary_end);
		$setting_start_date_time = new \DateTime($setting_start);
		$setting_end_date_time = new \DateTime($setting_end);

		$results = [];

		// Iterate over each month in the primary range
		for ($month = $primary_start_date_time->format('n'); $month <= $primary_end_date_time->format('n'); $month++) {
			$year = $primary_start_date_time->format('Y');
			$first_day_of_month = new \DateTime("$year-$month-01");
			$last_day_of_month = new \DateTime($first_day_of_month->format('Y-m-t'));

			$total_days_in_month = $first_day_of_month->format('t');

			// Check if the month overlaps with the setting range
			if ($last_day_of_month >= $setting_start_date_time && $first_day_of_month <= $setting_end_date_time) {
				// Adjust the start and end dates based on the overlapping range
				$start = ($first_day_of_month < $setting_start_date_time) ? $setting_start_date_time : $first_day_of_month;
				$end = ($last_day_of_month > $setting_end_date_time) ? $setting_end_date_time : $last_day_of_month;

				// Further adjust the start and end dates based on the primary range
				if ($start < $primary_start_date_time) {
					$start = $primary_start_date_time;
				}
				if ($end > $primary_end_date_time) {
					$end = $primary_end_date_time;
				}

				// Calculate the number of days in the range
				$interval = $start->diff($end);
				$days = $interval->days + 1; // Adding 1 because the end date is inclusive
				
				// Determine if it's a full month or part of the month
				$is_full_month = $start == $first_day_of_month && $end == $last_day_of_month;

				// Add to results
				$results[] = array(
					'month' => $month,
					'range' => array(
						'start' => $start->format('Y-m-d'),
						'end' => $end->format('Y-m-d')
					),
					'count' => $days,
					'full_count' => $total_days_in_month,
					'is_full_month' => $is_full_month
				);
			}
		}

		return $results;

	}

	/**
	 * get_primary_month_ranges
	 *
	 * @param  string $primary_start
	 * @param  string $primary_end
	 * @return array
	 */
	public function get_primary_month_ranges($primary_start, $primary_end) {
		$primary_start_date_time = new \DateTime($primary_start);
		$primary_end_date_time = new \DateTime($primary_end);
	
		$results = [];
	
		// Iterate over each month in the primary range
		for ($month = $primary_start_date_time->format('n'); $month <= $primary_end_date_time->format('n'); $month++) {
			$year = $primary_start_date_time->format('Y');
			$first_day_of_month = new \DateTime("$year-$month-01");
			$last_day_of_month = new \DateTime($first_day_of_month->format('Y-m-t'));
	
			// Total days in this month
			$total_days_in_month = $first_day_of_month->format('t');
	
			// Adjust the start and end dates based on the primary range
			$start = ($first_day_of_month < $primary_start_date_time) ? $primary_start_date_time : $first_day_of_month;
			$end = ($last_day_of_month > $primary_end_date_time) ? $primary_end_date_time : $last_day_of_month;
	
			// Calculate the number of days in the range
			$interval = $start->diff($end);
			$days_in_range = $interval->days + 1; // Adding 1 because the end date is inclusive
	
			// Determine if it's a full month or part of the month
			$is_full_month = $start == $first_day_of_month && $end == $last_day_of_month;
	
			// Add to results
			$results[] = [
				'month' => $month,
				'range' => [
					'start' => $start->format('Y-m-d'),
					'end' => $end->format('Y-m-d')
				],
				'days_in_range' => $days_in_range,
				'total_days_in_month' => (int)$total_days_in_month,
				'is_full_month' => $is_full_month
			];
		}
	
		return $results;
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
			$data = array();
			$data['m'] = $dt->format('n');
			$data['y'] = $dt->format('Y');
			$data['first_day'] = $dt->modify('first day of this month')->format('Y-m-d');
			$data['last_day'] = $dt->modify('last day of this month')->format('Y-m-d');
			$months[] = $data;
		}

		return $months;

	}

	/**
	 * Get order shipping income
	 *
	 * @return float
	 */
	public function get_shipping_income($month, $year) {

		global $wpdb;

		if ( '10' == $month || '11' == $month || '12' == $month ) {
			$start_date = $year . '-' . $month . '-01';
		} else {
			$start_date = $year . '-0' . $month . '-01';
		}
		
		$date = new \DateTime($start_date);
    	$date->modify('last day of this month');
    	$end_date = $date->format('Y-m-d');

		//Set data
		$where = "";
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
	public function get_payment_income($month, $year) {

		global $wpdb;

		if ( '10' == $month || '11' == $month || '12' == $month ) {
			$start_date = $year . '-' . $month . '-01';
		} else {
			$start_date = $year . '-0' . $month . '-01';
		}
		

		$date = new \DateTime($start_date);
    	$date->modify('last day of this month');
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
