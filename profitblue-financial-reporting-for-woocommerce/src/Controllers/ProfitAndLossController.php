<?php

namespace ProfitBlue\Controllers;

use ProfitBlue\Controllers\OrdersController;

class ProfitAndLossController {
	
	/**
	 * period
	 *
	 * @var string
	 */
	private $period = 'whole-period';
	
	/**
	 * start
	 *
	 * @var bool
	 */
	private $start = false;
	
	/**
	 * end
	 *
	 * @var bool
	 */
	private $end = false;
	
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
	 * months_data
	 *
	 * @var bool
	 */
	public $months_data = false;
		
	/**
	 * year_data
	 *
	 * @var array
	 */
	public $year_data = array();
		
	/**
	 * ccai
	 *
	 * @var array
	 */
	public $ccai = array();
		
	/**
	 * orders
	 *
	 * @var bool
	 */
	public $orders = false;
		
	/**
	 * year_orders
	 *
	 * @var bool
	 */
	public $year_orders = false;
		
	/**
	 * revenue
	 *
	 * @var bool
	 */
	public $revenue = false;
		
	/**
	 * year_revenue
	 *
	 * @var bool
	 */
	public $year_revenue = false;
		
	/**
	 * cogs
	 *
	 * @var bool
	 */
	public $cogs = false;
		
	/**
	 * year_cogs
	 *
	 * @var bool
	 */
	public $year_cogs = false;
		
	/**
	 * margin
	 *
	 * @var bool
	 */
	public $margin = false;
		
	/**
	 * year_margin
	 *
	 * @var bool
	 */
	public $year_margin = false;
		
	/**
	 * net_profit
	 *
	 * @var bool
	 */
	public $net_profit = false;
		
	/**
	 * year_net_profit
	 *
	 * @var bool
	 */
	public $year_net_profit = false;
	
	/**
	 * exclude
	 *
	 * @var bool
	 */
	public $exclude = false;
	
	/**
	 * shipping_cost
	 *
	 * @var bool
	 */
	public $shipping_cost = false;
		
	/**
	 * shipping_cost_data
	 *
	 * @var bool
	 */
	public $shipping_cost_data = false;
	
	/**
	 * payments
	 *
	 * @var bool
	 */
	public $payments = false;
		
	/**
	 * payment_periods
	 *
	 * @var bool
	 */
	public $payment_periods = false;
	
	/**
	 * ordersControler
	 *
	 * @var bool
	 */
	public $ordersControler = false;
		
	/**
	 * wpdb
	 *
	 * @var bool
	 */
	private $wpdb = false;
	
	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {

		global $wpdb;
		$wpdb = $wpdb;

		$this->ordersControler = new OrdersController();

		$this->set_exclude();

		$this->parse_args();
		$this->set_months();
		$this->set_shipping_data();
		$this->set_payment_data();
		$this->set_data();

	}
		
	/**
	 * set_exclude
	 *
	 * @return void
	 */
	public function set_exclude() {

		global $wpdb;
		$table_name = $wpdb->prefix . 'profitblue_shop_setting';
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE year = 'whole-period'",
				array(
					$table_name
				)
			)
		);
		if ( !empty( $result ) ) {
			if ( 'yes' == $result[0]->exclude ) {
				$this->exclude = true;
			}
		}
				
	}
	
	/**
	 * parse_args
	 *
	 * @return void
	 */
	public function parse_args() {

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['period'] ) ) {
			$this->period = 'dates';
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$dates = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
			$parts = explode( ' - ', $dates );
			$this->start_date = $parts[0];
			$this->end_date = $parts[1];
		} else {
			$year = gmdate( 'Y' );
			$this->start_date = $year . '-01-01';
			$this->end_date = $year . '-12-31';
		}

	}

	/**
	 * set_months
	 *
	 * @return void
	 */
	public function set_months() {

		$array = array();

		$start    = ( new \DateTime( $this->start_date ) )->modify( 'first day of this month' );
		$end      = ( new \DateTime( $this->end_date ) )->modify( 'last day of this month' );
		$interval = \DateInterval::createFromDateString( '1 month' );
		$period   = new \DatePeriod( $start, $interval, $end );

		foreach ( $period as $dt ) {
			$this->year_data['year'] = $dt->format('Y');
    		$month = $dt->format('Y-m');
			$array[$month]['year'] = $dt->format('Y');
			$array[$month]['month'] = $dt->format('m');
			$array[$month]['month-label'] = $dt->format('F');
			$array[$month]['month-short-label'] = $dt->format('M');
			$start_day    = ( new \DateTime( $month ) )->modify( 'first day of this month' );
			$end_day      = ( new \DateTime( $month ) )->modify( 'last day of this month' );
			$array[$month]['first-day'] = $start_day->format( 'Y-m-d' );
			$array[$month]['last-day'] = $end_day->format( 'Y-m-d' );
		}

		$this->months_data = $array;

	}
	
	/**
	 * set_payment_data
	 *
	 * @return void
	 */
	public function set_payment_data() {

		global $wpdb;

		$table_name = $wpdb->prefix . 'profitblue_payments';
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i",
				array(
					$table_name
				)
			)
		);
		if ( !empty( $result ) ) {
			$this->payments = $result;
		}
		$table_name = $wpdb->prefix . 'profitblue_payment_periods';
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i",
				array(
					$table_name
				)
			)
		);
		if ( !empty( $result ) ) {
			$this->payment_periods = $result;
		}		
	
	}
	
	/**
	 * set_shipping_data
	 *
	 * @return void
	 */
	public function set_shipping_data() {

		global $wpdb;
		$table_name = $wpdb->prefix . 'profitblue_shiping_costs';
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i",
				array(
					$table_name
				)
			)
		 );
		if ( !empty( $result ) ) {
			$this->shipping_cost = $result;
		}
		$table_name = $wpdb->prefix . 'profitblue_shipping_costs_data';
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i",
				array(
					$table_name
				)
			)
		);
		if ( !empty( $result ) ) {
			$this->shipping_cost_data = $result;
		}		
	
	}
	
	/**
	 * get_order_shipping_income
	 *
	 * @param  object $order
	 * @return float
	 */
	public function get_order_shipping_income( $order ) {
		
		$date = gmdate( 'Y-m-d', $order->order_date );
		$year = gmdate( 'Y', $order->order_date );

		$shipping_cost_id = null;

		foreach( $this->shipping_cost as $shipping_cost ) {
			if ( $shipping_cost->period_type == 'custom-range' ) {
				if ( $date >= $shipping_cost->period_start && $date <= $shipping_cost->period_end ) {
					$shipping_cost_id = $shipping_cost->ID;
					$shipping_cost_id_data = $shipping_cost;
					break;
				}
			}			
		}
		if ( empty( $shipping_cost_id ) ) {
			foreach( $this->shipping_cost as $shipping_cost ) {
				if ( $shipping_cost->period_type == $year ) {
					$shipping_cost_id = $shipping_cost->ID;
					$shipping_cost_id_data = $shipping_cost;
					break;
				}
			}
		}
		if ( empty( $shipping_cost_id ) ) {
			foreach( $this->shipping_cost as $shipping_cost ) {
				if ( $shipping_cost->period_type == 'whole-period' ) {
					$shipping_cost_id = $shipping_cost->ID;
					$shipping_cost_id_data = $shipping_cost;
					break;
				}
			}
		}

		$shipping_cost = 0;
		//Now we have shipping cost_id - proccess price
		foreach( $this->shipping_cost_data as $shipping_cost_data ) {
			if ( $shipping_cost_data->shipping_costs_id == $shipping_cost_id && $shipping_cost_data->shipping_id == $order->order_shipping_id ) {
				$shipping_prices = $shipping_cost_data;
				break;
			}
		}

		

		if ( 'variable-costs' == $shipping_cost_id_data->type ) {

			if ( 'pecentage' == $shipping_cost_id_data->amount_type ) {
				if ( $shipping_cost_id_data->amount > 0 ) {
					$price = $order->order_subtotal;
					$shipping_cost = ( $price / 100 ) * $shipping_cost_id_data->amount;
				}
			} else {
				if ( $shipping_cost_id_data->amount > 0 ) {
					$shipping_cost = $shipping_cost_id_data->amount;
				}
			}
			

		} elseif ( 'same-costs' == $shipping_cost_id_data->type ) {
			$shipping_cost = $order->order_shipping_subtotal;
		} elseif ( 'custom-costs' == $shipping_cost_id_data->type ) {
			$shipping_cost = $shipping_prices->shipping_price;
		} elseif ( 'no-costs' == $shipping_cost_id_data->type ) {
			$shipping_cost = 0;
		}

		return $shipping_cost;

	}

	/**
	 * Set orders by months
	 *
	 * @return void
	 */
	public function set_data() {

		global $wpdb;

		$orders_total 			= 0;
		$products_total 		= 0;
		$shipping_total 		= 0;
		$fees_total 			= 0;
		$payments_cost_total 	= 0;
		$shipping_cost_total 	= 0;
		$pcs 					= 0;
		$cogs_total 			= 0;
		$gross_margin_total 	= 0;
		$orders_tax 	 		= 0;
		$shipping_income 		= array();
		$payment_income 		= array();
		$get_use_this 			= get_option( 'profitblue-use-this-shop-setting-period' );
		$table_name 			= $wpdb->prefix . 'profitblue_orders';

		if ( false != $this->start_date && false != $this->end_date ) {
			if ( true === $this->exclude ) {
				$result = $wpdb->get_results(
					$wpdb->prepare( 
						"SELECT * FROM %i WHERE order_date BETWEEN %s AND %s AND order_status NOT IN (%s)",
						array(
							$table_name,
							strtotime( $this->start_date ),
							strtotime( $this->end_date ),
							"'".$this->statuses."'"
						)
					)
				);
			} else {		
				$result = $wpdb->get_results(
					$wpdb->prepare( 
						"SELECT * FROM %i WHERE order_date BETWEEN %s AND %s",
						array(
							$table_name,
							strtotime( $this->start_date ),
							strtotime( $this->end_date )
						)
					)
				);
			}

		} else {
			if ( true === $this->exclude ) {
				$result = $wpdb->get_results(
					$wpdb->prepare( 
						"SELECT * FROM %i WHERE order_status NOT IN (%s)",
						array(
							$table_name,
							"'".$this->statuses."'"
						)
					)
				);
			} else {		
				$result = $wpdb->get_results(
					$wpdb->prepare( 
						"SELECT * FROM %i",
						array(
							$table_name
						)
					)
				);
			}
		}		

		$current_month = gmdate( 'Y-m' );

		if ( !empty( $result ) ) {
			foreach( $result as $item ) {

				$month = gmdate( 'Y-m', $item->order_date );
				$sub_month = gmdate( 'm', $item->order_date );

				if ( $month != $current_month ) {
					continue;
				}

				$orders_total 			+= (float)$item->order_subtotal;
				$shipping_total 		+= (float)$item->order_shipping_subtotal;
				$products_total 		+= (float)$item->order_products_subtotal;
				$fees_total 			+= (float)$item->order_fees_subtotal;
				$payments_cost_total 	+= (float)$item->order_payment_cost;
				$shipping_cost_total 	+= (float)$item->order_shipping_cost;
				$pcs 					+= (float)$item->pcs;
				$cogs_total 			+= (float)$item->cogs;
				$gross_margin_total 	+= (float)$item->gross_margin;
				$orders_tax				+= (float)$item->order_tax;				

				$month_product_total = $products_total;
				
				$shipping_value = 0;
				$shipping_value = $this->set_shipping_item_data( $item );
				$payment_value	= $this->set_payment_item_data( $item, $item->order_payment_id );
				
				$this->set_month_item_data( $month, 'shipping_income', $shipping_value );	
				$this->set_month_item_data( $month, 'payment_income', $payment_value );
				$this->set_month_item_data( $month, 'orders_total', (float)$item->order_subtotal );
				$this->set_month_item_data( $month, 'products_total', (float)$item->order_products_subtotal );
				$this->set_month_item_data( $month, 'shipping_total', (float)$item->order_shipping_subtotal );
				$this->set_month_item_data( $month, 'fees_total', (float)$item->order_fees_subtotal );
				$this->set_month_item_data( $month, 'payments_cost_total', $item->order_payment_cost );	
				$this->set_month_item_data( $month, 'shipping_cost_total', $item->order_shipping_cost );				
				$this->set_month_item_data( $month, 'pcs', $item->pcs );
				$this->set_month_item_data( $month, 'cogs_total', $item->cogs );
				$this->set_month_item_data( $month, 'gross_margin_total', $item->gross_margin );
				$this->set_month_item_data( $month, 'orders_tax', $item->order_tax );
				$this->set_month_item_data( $month, 'orders_count', 1 );
				
				if ( !empty( $shipping_income[$sub_month] ) ) {
					$shipping_income[$sub_month] += $shipping_value;
				} else {
					$shipping_income[$sub_month] = $shipping_value;
				}
				if ( !empty( $payment_income[$sub_month] ) ) {
					$payment_income[$sub_month] += $payment_value;
				} else {
					$payment_income[$sub_month] = $payment_value;
				}

			}
		}

		$table_name = $wpdb->prefix . 'profitblue_ccai';
		if ( false != $this->start_date && false != $this->end_date ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE date_start >=%s AND date_end <= %s",
					array(
						$table_name,
						$this->start_date,
						$this->end_date
					)
				),
				ARRAY_A
			);
		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i",
					array(
						$table_name
					)
				),
				ARRAY_A
			);
		}
		
		$year = $this->year_data['year'];
		if ( !empty( $result ) ) {
		
			$ccai = array();
			$current_ccai_month = gmdate( 'm' );

			/**
			 * Variable type calculate separatelly
			 * 
			 */
			foreach( $result as $item ) {

				if ( 'variable' != $item['type'] ) {

					continue;

				}
				
				$ccai[$item['type']][$item['ID']]['label'] 			= $item['label'];
				if ( !empty( $item['name'] ) ) {
					$ccai[$item['type']][$item['ID']]['name'] 		= $item['name'];
				}
				$ccai[$item['type']][$item['ID']]['amount'] 		= $item['amount'];
				
				$part = $item['amount'];
				$rest_money = array();

				if ( '01' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['1']  = $this->calculate_ccai_value( $year, '01', '1', $item );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['1'] = 0;
				}
				if ( '02' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['2']  = $this->calculate_ccai_value( $year, '02', '2', $item );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['2'] = 0;
				}
				if ( '03' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['3']  = $this->calculate_ccai_value( $year, '03', '3', $item );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['3'] = 0;
				}
				if ( '04' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['4']  = $this->calculate_ccai_value( $year, '04', '4', $item );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['4'] = 0;
				}
				if ( '05' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['5']  = $this->calculate_ccai_value( $year, '05', '5', $item );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['5'] = 0;
				}
				if ( '06' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['6']  = $this->calculate_ccai_value( $year, '06', '6', $item );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['6'] = 0;
				}
				if ( '07' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['7']  = $this->calculate_ccai_value( $year, '07', '7', $item );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['7'] = 0;
				}
				if ( '08' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['8']  = $this->calculate_ccai_value( $year, '08', '8', $item );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['8'] = 0;
				}
				if ( '09' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['9']  = $this->calculate_ccai_value( $year, '09', '9', $item );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['9'] = 0;
				}
				if ( '10' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['10'] = $this->calculate_ccai_value( $year, '10', '10', $item );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['10'] = 0;
				}
				if ( '11' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['11'] = $this->calculate_ccai_value( $year, '11', '11', $item );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['11'] = 0;
				}
				if ( '12' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['12'] = $this->calculate_ccai_value( $year, '12', '12', $item );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['12'] = 0;
				}
									
			}

			//Fixed
			foreach( $result as $item ) {

				if ( 'fixed' != $item['type'] ) {
					continue;
				}
				
				$start_date = new \DateTime( $item['date_start'] );
				$end_date = new \DateTime( $item['date_end'] );
				$days_interval = $start_date->diff( $end_date );
				$number_of_days = $days_interval->days;
				$number_of_days++;

				$ccai[$item['type']][$item['ID']]['label'] 			= $item['label'];
				if ( !empty( $item['name'] ) ) {
					$ccai[$item['type']][$item['ID']]['name'] 		= $item['name'];
				}
				$ccai[$item['type']][$item['ID']]['amount'] 		= $item['amount'];


				$part = $item['amount'];
				$rest_money = array();

			
				if ( '01' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['1'] = $this->calculate_month_item( $item,'1', '01', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['1'] = 0;
				}
				if ( '02' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['2'] = $this->calculate_month_item( $item,'2', '02', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['2'] = 0;
				}
				if ( '03' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['3'] = $this->calculate_month_item( $item,'3', '03', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['3'] = 0;
				}
				if ( '04' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['4'] = $this->calculate_month_item( $item,'4', '04', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['4'] = 0;
				}
				if ( '05' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['5'] = $this->calculate_month_item( $item,'5', '05', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['5'] = 0;
				}
				if ( '06' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['6'] = $this->calculate_month_item( $item,'6', '06', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['6'] = 0;
				}
				if ( '07' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['7'] = $this->calculate_month_item( $item,'7', '07', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['7'] = 0;
				}
				if ( '08' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['8'] = $this->calculate_month_item( $item,'8', '08', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['8'] = 0;
				}
				if ( '09' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['9'] = $this->calculate_month_item( $item,'9', '09', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['9'] = 0;
				}
				if ( '10' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['10'] = $this->calculate_month_item( $item,'10', '10', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['10'] = 0;
				}
				if ( '11' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['11'] = $this->calculate_month_item( $item,'11', '11', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['11'] = 0;
				}
				if ( '12' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['12'] = $this->calculate_month_item( $item,'12', '12', $year, $number_of_days );								
				} else {
					$ccai[$item['type']][$item['ID']]['months']['12'] = 0;
				}
						
			}

			//Income
			foreach( $result as $item ) {

				if ( 'income' != $item['type'] ) {

					continue;

				}

				$start_date = new \DateTime( $item['date_start'] );
				$end_date = new \DateTime( $item['date_end'] );
				$days_interval = $start_date->diff( $end_date );
				$number_of_days = $days_interval->days;
				$number_of_days++;
				$price_for_day = 0;
				if ( $number_of_days > 0 ) {
					$price_for_day = (float)$item['amount'] / $number_of_days;
				}
				$ccai[$item['type']][$item['ID']]['label'] 			= $item['label'];
				if ( !empty( $item['name'] ) ) {
					$ccai[$item['type']][$item['ID']]['name'] 		= $item['name'];
				}
				$ccai[$item['type']][$item['ID']]['amount'] 		= $item['amount'];


				$part = $item['amount'];
				$rest_money = array();

			
				if ( '01' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['1'] = $this->calculate_month_item( $item,'1', '01', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['1'] = 0;
				}
				if ( '02' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['2'] = $this->calculate_month_item( $item,'2', '02', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['2'] = 0;
				}
				if ( '03' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['3'] = $this->calculate_month_item( $item,'3', '03', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['3'] = 0;
				}
				if ( '04' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['4'] = $this->calculate_month_item( $item,'4', '04', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['4'] = 0;
				}
				if ( '05' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['5'] = $this->calculate_month_item( $item,'5', '05', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['5'] = 0;
				}
				if ( '06' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['6'] = $this->calculate_month_item( $item,'6', '06', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['6'] = 0;
				}
				if ( '07' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['7'] = $this->calculate_month_item( $item,'7', '07', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['7'] = 0;
				}
				if ( '08' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['8'] = $this->calculate_month_item( $item,'8', '08', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['8'] = 0;
				}
				if ( '09' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['9'] = $this->calculate_month_item( $item,'9', '09', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['9'] = 0;
				}
				if ( '10' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['10'] = $this->calculate_month_item( $item,'10', '10', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['10'] = 0;
				}
				if ( '11' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['11'] = $this->calculate_month_item( $item,'11', '11', $year, $number_of_days );
				} else {
					$ccai[$item['type']][$item['ID']]['months']['11'] = 0;
				}
				if ( '12' == $current_ccai_month ) {
					$ccai[$item['type']][$item['ID']]['months']['12'] = $this->calculate_month_item( $item,'12', '12', $year, $number_of_days );		
				} else {
					$ccai[$item['type']][$item['ID']]['months']['12'] = 0;
				}
				
								
						
			}

			$ccai['shipping_income'] = $shipping_income;
			$ccai['payment_income'] = $payment_income;

			$this->ccai = $ccai;			

		}

	}

	/**
	 * Set orders
	 *
	 * @return void
	 */	
	public function set_orders() {

		global $wpdb;

		$table_name = $wpdb->prefix . 'posts';

		if ( false != $this->start_date && false != $this->end_date ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE post_type='shop_order' AND post_status='wc-completed' AND post_date BETWEEN %s AND %s",
					array(
						$table_name,
						$this->start_date,
						$this->end_date
					)
				)
			);
		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE post_type='shop_order' AND post_status='wc-completed'",
					array(
						$table_name
					)
				)
			);
		}
		
		$this->orders = $result;

	}	

	/**
	 * get_variable_totals
	 *
	 * @param  object $profitAndLossController
	 * @param  string $month
	 * @return array
	 */
	public function get_variable_totals( $profitAndLossController, $month ) {

		$totals = array('01' => 0,'02' => 0,'03' => 0,'04' => 0,'05' => 0,'06' => 0,'07' => 0,'08' => 0,'09' => 0,'10' => 0,'11' => 0,'12' => 0);
		if ( empty( $profitAndLossController->ccai['variable'] ) ) {
			return $totals;
		}
		foreach( $profitAndLossController->ccai['variable'] as $caai_id => $ccai_item ) {
			if ( '01' == $month['month'] ) {
				if ( null !== $ccai_item['months']['1'] ) {
					$totals['01'] += $ccai_item['months']['1'];
				}
			} elseif ( '02' == $month['month'] ) {
				if ( null !== $ccai_item['months']['2'] ) {
					$totals['02'] += $ccai_item['months']['2'];
				}
			} elseif ( '03' == $month['month'] ) {
				if ( null !== $ccai_item['months']['3'] ) {
					$totals['03'] += $ccai_item['months']['3'];
				} 
			} elseif ( '04' == $month['month'] ) {
				if ( null !== $ccai_item['months']['4'] ) {
					$totals['04'] += $ccai_item['months']['4'];
				}
			} elseif ( '05' == $month['month'] ) {
				if ( null !== $ccai_item['months']['5'] ) {
					$totals['05'] += $ccai_item['months']['5'];
				}
			} elseif ( '06' == $month['month'] ) {
				if ( null !== $ccai_item['months']['6'] ) {
					$totals['06'] += $ccai_item['months']['6'];
				}
			} elseif ( '07' == $month['month'] ) {
				if ( null !== $ccai_item['months']['7'] ) {
					$totals['07'] += $ccai_item['months']['7'];
				}
			} elseif ( '08' == $month['month'] ) {
				if ( null !== $ccai_item['months']['8'] ) {
					$totals['08'] += $ccai_item['months']['8'];
				}
			} elseif ( '09' == $month['month'] ) {
				if ( null !== $ccai_item['months']['9'] ) {
					$totals['09'] += $ccai_item['months']['9'];
				}
			} elseif ( '10' == $month['month'] ) {
				if ( null !== $ccai_item['months']['10'] ) {
					$totals['10'] += $ccai_item['months']['10'];
				}
			} elseif ( '11' == $month['month'] ) {
				if ( null !== $ccai_item['months']['11'] ) {
					$totals['11'] += $ccai_item['months']['11'];
				}
			} elseif ( '12' == $month['month'] ) {
				if ( null !== $ccai_item['months']['12'] ) {
					$totals['12'] += $ccai_item['months']['12'];
				}
			}							
		}

		return $totals;

	}

	/**
	 * get_data_total
	 *
	 * @param  array $totals
	 * @param  string $month
	 * @return float
	 */
	public function get_data_total( $totals, $month ) {
		if ( !empty( $totals[$month] ) ) {
			return (float)$totals[$month];
		} else {
			return 0;
		}
	}

	/**
	 * get_fixed_totals
	 *
	 * @param  object $profitAndLossController
	 * @param  string $month
	 * @return array
	 */
	public function get_fixed_totals( $profitAndLossController, $month ) {

		$totals = array('01' => 0,'02' => 0,'03' => 0,'04' => 0,'05' => 0,'06' => 0,'07' => 0,'08' => 0,'09' => 0,'10' => 0,'11' => 0,'12' => 0);
		if ( empty( $profitAndLossController->ccai['fixed'] ) ) {
			return $totals;
		}
		foreach( $profitAndLossController->ccai['fixed'] as $caai_id => $ccai_item ) {
			if ( '01' == $month['month'] ) {
				if ( null !== $ccai_item['months']['1'] ) {
					$totals['01'] += $ccai_item['months']['1'];
				}
			} elseif ( '02' == $month['month'] ) {
				if ( null !== $ccai_item['months']['2'] ) {
					$totals['02'] += $ccai_item['months']['2'];
				}
			} elseif ( '03' == $month['month'] ) {
				if ( null !== $ccai_item['months']['3'] ) {
					$totals['03'] += $ccai_item['months']['3'];
				} 
			} elseif ( '04' == $month['month'] ) {
				if ( null !== $ccai_item['months']['4'] ) {
					$totals['04'] += $ccai_item['months']['4'];
				}
			} elseif ( '05' == $month['month'] ) {
				if ( null !== $ccai_item['months']['5'] ) {
					$totals['05'] += $ccai_item['months']['5'];
				}
			} elseif ( '06' == $month['month'] ) {
				if ( null !== $ccai_item['months']['6'] ) {
					$totals['06'] += $ccai_item['months']['6'];
				}
			} elseif ( '07' == $month['month'] ) {
				if ( null !== $ccai_item['months']['7'] ) {
					$totals['07'] += $ccai_item['months']['7'];
				}
			} elseif ( '08' == $month['month'] ) {
				if ( null !== $ccai_item['months']['8'] ) {
					$totals['08'] += $ccai_item['months']['8'];
				}
			} elseif ( '09' == $month['month'] ) {
				if ( null !== $ccai_item['months']['9'] ) {
					$totals['09'] += $ccai_item['months']['9'];
				}
			} elseif ( '10' == $month['month'] ) {
				if ( null !== $ccai_item['months']['10'] ) {
					$totals['10'] += $ccai_item['months']['10'];
				}
			} elseif ( '11' == $month['month'] ) {
				if ( null !== $ccai_item['months']['11'] ) {
					$totals['11'] += $ccai_item['months']['11'];
				}
			} elseif ( '12' == $month['month'] ) {
				if ( null !== $ccai_item['months']['12'] ) {
					$totals['12'] += $ccai_item['months']['12'];
				}
			}							
		}

		return $totals;

	}

	/**
	 * get_income_totals
	 *
	 * @param  object $profitAndLossController
	 * @param  string $month
	 * @return array
	 */
	public function get_income_totals( $profitAndLossController, $month ) {

		$totals = array('01' => 0,'02' => 0,'03' => 0,'04' => 0,'05' => 0,'06' => 0,'07' => 0,'08' => 0,'09' => 0,'10' => 0,'11' => 0,'12' => 0);
		if ( empty( $profitAndLossController->ccai['income'] ) ) {
			return $totals;
		}
		foreach( $profitAndLossController->ccai['income'] as $caai_id => $ccai_item ) {
			if ( '01' == $month['month'] ) {
				if ( null !== $ccai_item['months']['1'] ) {
					$totals['01'] += $ccai_item['months']['1'];
				}
			} elseif ( '02' == $month['month'] ) {
				if ( null !== $ccai_item['months']['2'] ) {
					$totals['02'] += $ccai_item['months']['2'];
				}
			} elseif ( '03' == $month['month'] ) {
				if ( null !== $ccai_item['months']['3'] ) {
					$totals['03'] += $ccai_item['months']['3'];
				} 
			} elseif ( '04' == $month['month'] ) {
				if ( null !== $ccai_item['months']['4'] ) {
					$totals['04'] += $ccai_item['months']['4'];
				}
			} elseif ( '05' == $month['month'] ) {
				if ( null !== $ccai_item['months']['5'] ) {
					$totals['05'] += $ccai_item['months']['5'];
				}
			} elseif ( '06' == $month['month'] ) {
				if ( null !== $ccai_item['months']['6'] ) {
					$totals['06'] += $ccai_item['months']['6'];
				}
			} elseif ( '07' == $month['month'] ) {
				if ( null !== $ccai_item['months']['7'] ) {
					$totals['07'] += $ccai_item['months']['7'];
				}
			} elseif ( '08' == $month['month'] ) {
				if ( null !== $ccai_item['months']['8'] ) {
					$totals['08'] += $ccai_item['months']['8'];
				}
			} elseif ( '09' == $month['month'] ) {
				if ( null !== $ccai_item['months']['9'] ) {
					$totals['09'] += $ccai_item['months']['9'];
				}
			} elseif ( '10' == $month['month'] ) {
				if ( null !== $ccai_item['months']['10'] ) {
					$totals['10'] += $ccai_item['months']['10'];
				}
			} elseif ( '11' == $month['month'] ) {
				if ( null !== $ccai_item['months']['11'] ) {
					$totals['11'] += $ccai_item['months']['11'];
				}
			} elseif ( '12' == $month['month'] ) {
				if ( null !== $ccai_item['months']['12'] ) {
					$totals['12'] += $ccai_item['months']['12'];
				}
			}							
		}

		return $totals;

	}

	/**
	 * get_average_orders
	 *
	 * @return float
	 */
	public function get_average_orders() {

		$orders = round( count( $this->year_orders ) / 365, 1 );

		return $orders;

	}

	/**
	 * set_revenue
	 *
	 * @return void
	 */
	public function set_revenue() {	
		
		global $wpdb;

		$table_name = $wpdb->prefix . 'profitblue_orders';
		if ( false != $this->start_date && false != $this->end_date ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT SUM(order_subtotal) as revenue FROM %i WHERE order_date BETWEEN %s AND %s",
					array(
						$table_name,
						strtotime( $this->start_date ),
						strtotime( $this->end_date )
					)
				)
			);
		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT SUM(order_subtotal) as revenue FROM %i",
					array(
						$table_name
					)
				)
			);
		}

		$this->revenue = round( $result[0]->revenue, wc_get_price_decimals() );		
		
	}

	/**
	 * set_year_revenue
	 *
	 * @return void
	 */
	public function set_year_revenue() {
		
		global $wpdb;

		$today = gmdate( 'Y-m-d' );
		$year = strtotime( $today . ' -1 year');
		
		$table_name = $wpdb->prefix . 'profitblue_orders';
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT SUM(order_subtotal) as revenue FROM %i WHERE order_date BETWEEN %s AND %s",
				array(
					$table_name,
					$year,
					time()
				)
			)
		);

		$this->year_revenue = round( $result[0]->revenue / 365 , wc_get_price_decimals() );		

	}
	
	/**
	 * set_cogs
	 *
	 * @return void
	 */
	public function set_cogs() {

		global $wpdb;
		
		$items_table_name = $wpdb->prefix . 'profitblue_order_items';
		$order_table_name = $wpdb->prefix . 'profitblue_orders';
		if ( false != $this->start_date && false != $this->end_date ) {		
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_cogs) AS cogs
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id 
					WHERE orders.order_date BETWEEN %s AND %s",
					array(
						$items_table_name,
						$order_table_name,
						strtotime( $this->start_date ),
						strtotime( $this->end_date )
					)
				)
			);
		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_cogs) AS cogs
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id",
					array(
						$items_table_name,
						$order_table_name
					)
				)
			);
		}

		$this->cogs = round( $result[0]->cogs, wc_get_price_decimals() );		

	}

	/**
	 * set_year_cogs
	 *
	 * @return void
	 */
	public function set_year_cogs() {

		global $wpdb;
		
		$today = gmdate( 'Y-m-d' );
		$year = strtotime( $today . ' -1 year');
		
		$items_table_name = $wpdb->prefix . 'profitblue_order_items';
		$order_table_name = $wpdb->prefix . 'profitblue_orders';
		if ( false != $this->start_date && false != $this->end_date ) {		
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_cogs) AS cogs
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id 
					WHERE orders.order_date BETWEEN %s AND %s",
					array(
						$items_table_name,
						$order_table_name,
						$year,
						time()
					)
				)
			);
		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_cogs) AS cogs
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id",
					array(
						$items_table_name,
						$order_table_name
					)
				)
			);
		}


		$this->year_cogs = round( $result[0]->cogs / 365, wc_get_price_decimals() );		

	}

	/**
	 * set_margin
	 *
	 * @return void
	 */
	public function set_margin() {

		global $wpdb;
		
		$items_table_name = $wpdb->prefix . 'profitblue_order_items';
		$order_table_name = $wpdb->prefix . 'profitblue_orders';
		
		if ( false != $this->start_date && false != $this->end_date ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_cogs) AS cogs
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id
					WHERE orders.order_date BETWEEN %s AND %s",
					array(
						$items_table_name,
						$order_table_name,
						strtotime( $this->start_date ),
						strtotime( $this->end_date )
					)
				)
			);
			$cogs = $result[0]->cogs;

			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_total) AS total
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id
					WHERE orders.order_date BETWEEN %s AND %s",
					array(
						$items_table_name,
						$order_table_name,
						strtotime( $this->start_date ),
						strtotime( $this->end_date )
					)
				)
			);
			$total = $result[0]->total;
			$margin = round( $total - $cogs, wc_get_price_decimals() );		
			$this->margin = $margin;

		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_cogs) AS cogs
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id",
					array(
						$items_table_name,
						$order_table_name
					)
				)
			);
			$cogs = $result[0]->cogs;

			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_total) AS total
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id",
					array(
						$items_table_name,
						$order_table_name
					)
				)
			);
			$total = $result[0]->total;
			$margin = round( $total - $cogs, wc_get_price_decimals() );		
			$this->margin = $margin;
		}		

	}

	/**
	 * set_year_margin
	 *
	 * @return void
	 */
	public function set_year_margin() {

		global $wpdb;
		
		$today = gmdate( 'Y-m-d' );
		$year = strtotime( $today . ' -1 year');	
		$items_table_name = $wpdb->prefix . 'profitblue_order_items';
		$order_table_name = $wpdb->prefix . 'profitblue_orders';
		
		if ( false != $this->start_date && false != $this->end_date ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_cogs) AS cogs
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id
					WHERE orders.order_date BETWEEN %s AND %s",
					array(
						$items_table_name,
						$order_table_name,
						$year,
						time()
					)
				)
			);
			$cogs = $result[0]->cogs;

			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_total) AS total
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id
					WHERE orders.order_date BETWEEN %s AND %s",
					array(
						$items_table_name,
						$order_table_name,
						$year,
						time()
					)
				)
			);
			$total = $result[0]->total;
			$margin = round( $total - $cogs, wc_get_price_decimals() );		
			$this->margin = $margin;

		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_cogs) AS cogs
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id",
					array(
						$items_table_name,
						$order_table_name
					)
				)
			);
			$cogs = $result[0]->cogs;

			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_total) AS total
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id",
					array(
						$items_table_name,
						$order_table_name
					)
				)
			);
			$total = $result[0]->total;
			$margin = round( $total - $cogs, wc_get_price_decimals() );		
			$this->margin = $margin;
		}		
		
	}

	/**
	 * set_net_profit
	 *
	 * @return void
	 */
	public function set_net_profit() {

		global $wpdb;
		
		$items_table_name = $wpdb->prefix . 'profitblue_order_items';
		$order_table_name = $wpdb->prefix . 'profitblue_orders';
		
		if ( false != $this->start_date && false != $this->end_date ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_cogs) AS cogs
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id
					WHERE orders.order_date BETWEEN %s AND %s",
					array(
						$items_table_name,
						$order_table_name,
						strtotime( $this->start_date ),
						strtotime( $this->end_date )
					)
				)
			);
			$cogs = $result[0]->cogs;

			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_total) AS total
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id
					WHERE orders.order_date BETWEEN %s AND %s",
					array(
						$items_table_name,
						$order_table_name,
						strtotime( $this->start_date ),
						strtotime( $this->end_date )
					)
				)
			);

			$total = $result[0]->total;
			$margin = round( $total - $cogs, wc_get_price_decimals() );		
			$this->net_profit = $margin;

		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_cogs) AS cogs
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id",
					array(
						$items_table_name,
						$order_table_name
					)
				)
			);
			$cogs = $result[0]->cogs;

			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_total) AS total
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id",
					array(
						$items_table_name,
						$order_table_name
					)
				)
			);
			$total = $result[0]->total;
			$margin = round( $total - $cogs, wc_get_price_decimals() );		
			$this->net_profit = $margin;
		}		

	}

	/**
	 * set_year_net_profit
	 *
	 * @return void
	 */
	public function set_year_net_profit() {

		global $wpdb;
		
		$today = gmdate( 'Y-m-d' );
		$year = strtotime( $today . ' -1 year');
		$items_table_name = $wpdb->prefix . 'profitblue_order_items';
		$order_table_name = $wpdb->prefix . 'profitblue_orders';
		
		if ( false != $this->start_date && false != $this->end_date ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_cogs) AS cogs
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id
					WHERE orders.order_date BETWEEN %s AND %s",
					array(
						$items_table_name,
						$order_table_name,
						$year,
						time()
					)
				)
			);
			$cogs = $result[0]->cogs;

			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_total) AS total
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id
					WHERE orders.order_date BETWEEN %s AND %s",
					array(
						$items_table_name,
						$order_table_name,
						$year,
						time()
					)
				)
			);
			$total = $result[0]->total;
			$margin = round( $total - $cogs, wc_get_price_decimals() );		
			$this->year_net_profit = $margin;

		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_cogs) AS cogs
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id",
					array(
						$items_table_name,
						$order_table_name
					)
				)
			);
			$cogs = $result[0]->cogs;

			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_total) AS total
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id",
					array(
						$items_table_name,
						$order_table_name
					)
				)
			);
			$total = $result[0]->total;
			$margin = round( $total - $cogs, wc_get_price_decimals() );		
			$this->year_net_profit = $margin;
		}		
		
	}

	/**
	 * get_bestsellers
	 *
	 * @return array
	 */
	public function get_bestsellers() {	

		global $wpdb;

		$items_table_name = $wpdb->prefix . 'profitblue_order_items';
		$order_table_name = $wpdb->prefix . 'profitblue_orders';

		if ( false != $this->start_date && false != $this->end_date ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT order_items.product_id, SUM(order_items.item_qty) as qty, SUM(order_items.profit) as profit, SUM(order_items.item_cogs) as cogs, SUM(order_items.item_total) as total
					FROM %i AS order_items
					JOIN %i AS orders ON orders.order_id = order_items.order_id
					WHERE orders.order_date BETWEEN %s AND %s AND order_items.product_id != '0' 
					GROUP BY order_items.product_id
					ORDER BY qty DESC LIMIT 12", 
					array(
						$items_table_name,
						$order_table_name,
						strtotime( $this->start_date ),
						strtotime( $this->end_date )
					)
				)
			);

		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT order_items.product_id, SUM(order_items.item_qty) as qty, SUM(order_items.profit) as profit, SUM(order_items.item_cogs) as cogs, SUM(order_items.item_total) as total
					FROM %i AS order_items
					JOIN %i AS orders ON orders.order_id = order_items.order_id
					WHERE order_items.product_id != '0' 
					GROUP BY order_items.product_id
					ORDER BY qty DESC LIMIT 12", 
					array(
						$items_table_name,
						$order_table_name
					)
				)
			);
		}		
		
		return $result;

	}

	/**
	 * get_most_profitable
	 *
	 * @return array
	 */
	public function get_most_profitable() {	

		global $wpdb;

		$items_table_name = $wpdb->prefix . 'profitblue_order_items';
		$order_table_name = $wpdb->prefix . 'profitblue_orders';

		if ( false != $this->start_date && false != $this->end_date ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT order_items.product_id, SUM(order_items.item_qty) as qty, SUM(order_items.profit) as profit, SUM(order_items.item_cogs) as cogs, SUM(order_items.item_total) as total
					FROM %i AS order_items
					JOIN %i AS orders ON orders.order_id = order_items.order_id
					WHERE orders.order_date BETWEEN %s AND %s AND order_items.product_id != '0' 
					GROUP BY order_items.product_id
					ORDER BY profit DESC LIMIT 12", 
					array(
						$items_table_name,
						$order_table_name,
						strtotime( $this->start_date ),
						strtotime( $this->end_date )
					)
				)
			);

		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT order_items.product_id, SUM(order_items.item_qty) as qty, SUM(order_items.profit) as profit, SUM(order_items.item_cogs) as cogs, SUM(order_items.item_total) as total
					FROM %i AS order_items
					JOIN %i AS orders ON orders.order_id = order_items.order_id
					WHERE order_items.product_id != '0' 
					GROUP BY order_items.product_id
					ORDER BY profit DESC LIMIT 12", 
					array(
						$items_table_name,
						$order_table_name
					)
				)
			);
		}	
		
		return $result;

	}

	/**
	 * get_least_profitable
	 *
	 * @return array
	 */
	public function get_least_profitable() {
		
		global $wpdb;

		$items_table_name = $wpdb->prefix . 'profitblue_order_items';
		$order_table_name = $wpdb->prefix . 'profitblue_orders';

		if ( false != $this->start_date && false != $this->end_date ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT order_items.product_id, SUM(order_items.item_qty) as qty, SUM(order_items.profit) as profit, SUM(order_items.item_cogs) as cogs, SUM(order_items.item_total) as total
					FROM %i AS order_items
					JOIN %i AS orders ON orders.order_id = order_items.order_id
					WHERE orders.order_date BETWEEN %s AND %s AND order_items.product_id != '0' 
					GROUP BY order_items.product_id
					ORDER BY profit DESC LIMIT 12", 
					array(
						$items_table_name,
						$order_table_name,
						strtotime( $this->start_date ),
						strtotime( $this->end_date )
					)
				)
			);

		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT order_items.product_id, SUM(order_items.item_qty) as qty, SUM(order_items.profit) as profit, SUM(order_items.item_cogs) as cogs, SUM(order_items.item_total) as total
					FROM %i AS order_items
					JOIN %i AS orders ON orders.order_id = order_items.order_id
					WHERE order_items.product_id != '0' 
					GROUP BY order_items.product_id
					ORDER BY profit ASC LIMIT 12", 
					array(
						$items_table_name,
						$order_table_name
					)
				)
			);
		}	
		
		return $result;

	}

	/**
	 * get_orders_count
	 *
	 * @return float
	 */
	public function get_orders_count() {		

		return count( $this->orders );

	}

	/**
	 * get_orders_main_reviews
	 *
	 * @return object|false
	 */
	public function get_orders_main_reviews() {

		$args = array(
			'post_type' => 'shop_order',
			'post_status' => 'all'
		);
		$args['posts_per_page'] = 3;
		$orders = new \WP_Query( $args );
		
		if ( !empty( $orders ) ) {
			return $orders;
		} else {
			return false;
		}

	}

	/**
	 * Get custom cost
	 *
	 * @return array|false
	 */	
	public function get_custom_cost() {

		global $wpdb;

		$args = array();
		$year = gmdate( 'Y' );
		if ( !empty( $this->start_date ) ) {
			$args[] = $this->start_date;
		} else {
			$this->start_date = $year . '-01-01';
			$args[] = $year . '-01-01';
		}
		if ( !empty( $this->end_date ) ) {
			$args[] = $this->end_date;
		} else {
			$args[] = $year . '-12-31';
			$this->end_date = $year . '-12-31';
		}
		
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i date_start >= %s AND date_end <= %s",
				array(
					$wpdb->prefix . 'profitblue_ccai',
					$args[0],
					$args[1]
				)
			)
		);
		if ( !empty( $result ) ) {
			return array(
				'result' => $result,
				'start'  => $this->start_date,
				'end'    => $this->end_date
			);
		} else {
			return false;
		}
		
	}

	/**
	 * calculate_value
	 *
	 * @param  string $month
	 * @param  array $months_data
	 * @return string
	 */
	public function calculate_value( $month, $months_data ) {

		$mode = 'normal';
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['mode'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$mode = isset( $_GET['mode'] ) ? wp_unslash( sanitize_text_field( $_GET['mode'] ) ) : '';
		}

		if ( 'ytd' == $mode ) {
			if ( '01' == $month['month'] ) {
				if ( null === $months_data['months']['1'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['1'];
				}
			} elseif ( '02' == $month['month'] ) {
				if ( null === $months_data['months']['2'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['2'];
					if ( null !== $months_data['months']['1'] ) {
						$value += $months_data['months']['1'];
					}
				}
			} elseif ( '03' == $month['month'] ) {
				if ( null === $months_data['months']['3'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['3'];
					if ( null !== $months_data['months']['1'] ) {
						$value += $months_data['months']['1'];
					}
					if ( null !== $months_data['months']['2'] ) {
						$value += $months_data['months']['2'];
					}
				}
			} elseif ( '04' == $month['month'] ) {
				if ( null === $months_data['months']['4'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['4'];
					if ( null !== $months_data['months']['1'] ) {
						$value += $months_data['months']['1'];
					}
					if ( null !== $months_data['months']['2'] ) {
						$value += $months_data['months']['2'];
					}
					if ( null !== $months_data['months']['3'] ) {
						$value += $months_data['months']['3'];
					}
				}
			} elseif ( '05' == $month['month'] ) {
				if ( null === $months_data['months']['5'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['5'];
					if ( null !== $months_data['months']['1'] ) {
						$value += $months_data['months']['1'];
					}
					if ( null !== $months_data['months']['2'] ) {
						$value += $months_data['months']['2'];
					}
					if ( null !== $months_data['months']['3'] ) {
						$value += $months_data['months']['3'];
					}
					if ( null !== $months_data['months']['4'] ) {
						$value += $months_data['months']['4'];
					}
				}
			} elseif ( '06' == $month['month'] ) {
				if ( null === $months_data['months']['6'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['6'];
					if ( null !== $months_data['months']['1'] ) {
						$value += $months_data['months']['1'];
					}
					if ( null !== $months_data['months']['2'] ) {
						$value += $months_data['months']['2'];
					}
					if ( null !== $months_data['months']['3'] ) {
						$value += $months_data['months']['3'];
					}
					if ( null !== $months_data['months']['4'] ) {
						$value += $months_data['months']['4'];
					}
					if ( null !== $months_data['months']['5'] ) {
						$value += $months_data['months']['5'];
					}
				}
			} elseif ( '07' == $month['month'] ) {
				if ( null === $months_data['months']['7'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['7'];
					if ( null !== $months_data['months']['1'] ) {
						$value += $months_data['months']['1'];
					}
					if ( null !== $months_data['months']['2'] ) {
						$value += $months_data['months']['2'];
					}
					if ( null !== $months_data['months']['3'] ) {
						$value += $months_data['months']['3'];
					}
					if ( null !== $months_data['months']['4'] ) {
						$value += $months_data['months']['4'];
					}
					if ( null !== $months_data['months']['5'] ) {
						$value += $months_data['months']['5'];
					}
					if ( null !== $months_data['months']['6'] ) {
						$value += $months_data['months']['6'];
					}
				}
			} elseif ( '08' == $month['month'] ) {
				if ( null === $months_data['months']['8'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['8'];
					if ( null !== $months_data['months']['1'] ) {
						$value += $months_data['months']['1'];
					}
					if ( null !== $months_data['months']['2'] ) {
						$value += $months_data['months']['2'];
					}
					if ( null !== $months_data['months']['3'] ) {
						$value += $months_data['months']['3'];
					}
					if ( null !== $months_data['months']['4'] ) {
						$value += $months_data['months']['4'];
					}
					if ( null !== $months_data['months']['5'] ) {
						$value += $months_data['months']['5'];
					}
					if ( null !== $months_data['months']['6'] ) {
						$value += $months_data['months']['6'];
					}
					if ( null !== $months_data['months']['7'] ) {
						$value += $months_data['months']['7'];
					}
				}
			} elseif ( '09' == $month['month'] ) {
				if ( null === $months_data['months']['9'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['9'];
					if ( null !== $months_data['months']['1'] ) {
						$value += $months_data['months']['1'];
					}
					if ( null !== $months_data['months']['2'] ) {
						$value += $months_data['months']['2'];
					}
					if ( null !== $months_data['months']['3'] ) {
						$value += $months_data['months']['3'];
					}
					if ( null !== $months_data['months']['4'] ) {
						$value += $months_data['months']['4'];
					}
					if ( null !== $months_data['months']['5'] ) {
						$value += $months_data['months']['5'];
					}
					if ( null !== $months_data['months']['6'] ) {
						$value += $months_data['months']['6'];
					}
					if ( null !== $months_data['months']['7'] ) {
						$value += $months_data['months']['7'];
					}
					if ( null !== $months_data['months']['8'] ) {
						$value += $months_data['months']['8'];
					}
				}
			} elseif ( '10' == $month['month'] ) {
				if ( null === $months_data['months']['10'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['10'];
					if ( null !== $months_data['months']['1'] ) {
						$value += $months_data['months']['1'];
					}
					if ( null !== $months_data['months']['2'] ) {
						$value += $months_data['months']['2'];
					}
					if ( null !== $months_data['months']['3'] ) {
						$value += $months_data['months']['3'];
					}
					if ( null !== $months_data['months']['4'] ) {
						$value += $months_data['months']['4'];
					}
					if ( null !== $months_data['months']['5'] ) {
						$value += $months_data['months']['5'];
					}
					if ( null !== $months_data['months']['6'] ) {
						$value += $months_data['months']['6'];
					}
					if ( null !== $months_data['months']['7'] ) {
						$value += $months_data['months']['7'];
					}
					if ( null !== $months_data['months']['8'] ) {
						$value += $months_data['months']['8'];
					}
					if ( null !== $months_data['months']['9'] ) {
						$value += $months_data['months']['9'];
					}
				}
			} elseif ( '11' == $month['month'] ) {
				if ( null === $months_data['months']['11'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['11'];
					if ( null !== $months_data['months']['1'] ) {
						$value += $months_data['months']['1'];
					}
					if ( null !== $months_data['months']['2'] ) {
						$value += $months_data['months']['2'];
					}
					if ( null !== $months_data['months']['3'] ) {
						$value += $months_data['months']['3'];
					}
					if ( null !== $months_data['months']['4'] ) {
						$value += $months_data['months']['4'];
					}
					if ( null !== $months_data['months']['5'] ) {
						$value += $months_data['months']['5'];
					}
					if ( null !== $months_data['months']['6'] ) {
						$value += $months_data['months']['6'];
					}
					if ( null !== $months_data['months']['7'] ) {
						$value += $months_data['months']['7'];
					}
					if ( null !== $months_data['months']['8'] ) {
						$value += $months_data['months']['8'];
					}
					if ( null !== $months_data['months']['9'] ) {
						$value += $months_data['months']['9'];
					}
					if ( null !== $months_data['months']['10'] ) {
						$value += $months_data['months']['10'];
					}
				}
			} elseif ( '12' == $month['month'] ) {
				if ( null === $months_data['months']['12'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['12'];
					if ( null !== $months_data['months']['1'] ) {
						$value += $months_data['months']['1'];
					}
					if ( null !== $months_data['months']['2'] ) {
						$value += $months_data['months']['2'];
					}
					if ( null !== $months_data['months']['3'] ) {
						$value += $months_data['months']['3'];
					}
					if ( null !== $months_data['months']['4'] ) {
						$value += $months_data['months']['4'];
					}
					if ( null !== $months_data['months']['5'] ) {
						$value += $months_data['months']['5'];
					}
					if ( null !== $months_data['months']['6'] ) {
						$value += $months_data['months']['6'];
					}
					if ( null !== $months_data['months']['7'] ) {
						$value += $months_data['months']['7'];
					}
					if ( null !== $months_data['months']['8'] ) {
						$value += $months_data['months']['8'];
					}
					if ( null !== $months_data['months']['9'] ) {
						$value += $months_data['months']['9'];
					}
					if ( null !== $months_data['months']['10'] ) {
						$value += $months_data['months']['10'];
					}
					if ( null !== $months_data['months']['11'] ) {
						$value += $months_data['months']['11'];
					}
				}
			}							
	
		} else {
			if ( '01' == $month['month'] ) {
				if ( null === $months_data['months']['1'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['1'];
				}
			} elseif ( '02' == $month['month'] ) {
				if ( null === $months_data['months']['2'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['2'];
				}
			} elseif ( '03' == $month['month'] ) {
				if ( null === $months_data['months']['3'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['3'];
				}
			} elseif ( '04' == $month['month'] ) {
				if ( null === $months_data['months']['4'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['4'];
				}
			} elseif ( '05' == $month['month'] ) {
				if ( null === $months_data['months']['5'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['5'];
				}
			} elseif ( '06' == $month['month'] ) {
				if ( null === $months_data['months']['6'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['6'];
				}
			} elseif ( '07' == $month['month'] ) {
				if ( null === $months_data['months']['7'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['7'];
				}
			} elseif ( '08' == $month['month'] ) {
				if ( null === $months_data['months']['8'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['8'];
				}
			} elseif ( '09' == $month['month'] ) {
				if ( null === $months_data['months']['9'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['9'];
				}
			} elseif ( '10' == $month['month'] ) {
				if ( null === $months_data['months']['10'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['10'];
				}
			} elseif ( '11' == $month['month'] ) {
				if ( null === $months_data['months']['11'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['11'];
				}
			} elseif ( '12' == $month['month'] ) {
				if ( null === $months_data['months']['12'] ) {
					$value =  '0';
				} else {
					$value = $months_data['months']['12'];
				}
			}							
		
		}

		return $value;

	}

	/**
	 * set_month_item_data
	 *
	 * @param  string $month
	 * @param  string $key
	 * @param  string $value
	 * @return void
	 */
	public function set_month_item_data( $month, $key, $value ) {

		if ( empty( $this->months_data[$month][$key] ) ) {
			$this->months_data[$month][$key] = (float)$value;
		} else {
			$this->months_data[$month][$key] += (float)$value;
		}

	}

	/**
	 * set_shipping_item_data
	 *
	 * @param  object $item
	 * @return float
	 */
	public function set_shipping_item_data( $item ) {

		$shipping_income = $this->ordersControler->get_order_shipping_income( $item );
		return $shipping_income['shipping_cost'];		

	}

	/**
	 * set_payment_item_data
	 *
	 * @param  array $item
	 * @return float
	 */
	public function set_payment_item_data( $item, $payment_id ) {

		$value = $this->ordersControler->get_order_payment_income( $item );
				
		return $value;		

	}

	/**
	 * calculate_ccai_value
	 *
	 * @param  string $year
	 * @param  string $month
	 * @param  string $month_number
	 * @param  array $item
	 * @return float
	 */
	public function calculate_ccai_value( $year, $month, $month_number, $item ) {

		global $wpdb;

		$startDateTime = \DateTime::createFromFormat('Y-m-d', $item['date_start']);
    	$endDateTime = \DateTime::createFromFormat('Y-m-d', $item['date_end']);
    	$specifiedMonthStart = \DateTime::createFromFormat('Y-m-d', $startDateTime->format('Y') . '-' . $month_number . '-01' );
		$specifiedMonthEnd = clone $specifiedMonthStart;
    	$specifiedMonthEnd->modify('last day of this month');
		
		if (($startDateTime <= $specifiedMonthEnd) && ($endDateTime >= $specifiedMonthStart)) {
			$periodStart = $startDateTime < $specifiedMonthStart ? $specifiedMonthStart : $startDateTime;
			$periodEnd = $endDateTime > $specifiedMonthEnd ? $specifiedMonthEnd : $endDateTime;
			
			$start_date = $periodStart->format('Y-m-d');
			$end_date = $periodEnd->format('Y-m-d');
								
			$args = array();
			$args[] = strtotime( $start_date . ' 00:00:00' );
			$args[] = strtotime( $end_date . ' 23:59:59' );	
			
			if ( $item['amount-type'] != 'amount' ) {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT SUM(order_subtotal) AS total FROM %i WHERE order_date BETWEEN %s AND %s",
						array(
							$wpdb->prefix . 'profitblue_orders',
							strtotime( $start_date . ' 00:00:00' ),
							strtotime( $end_date . ' 23:59:59' )
						)
					)
				);
				if ( $result[0]->total != 0 ) {
					$total_value = ( (float)$result[0]->total ) * ( (float)$item['amount'] / 100 );
				} else {
					$total_value = 0;
				}
			} else {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT COUNT(*) AS count FROM %i WHERE order_date BETWEEN %s AND %s",
						array(
							$wpdb->prefix . 'profitblue_orders',
							strtotime( $start_date . ' 00:00:00' ),
							strtotime( $end_date . ' 23:59:59' )
						)
					)
				);
				if ( $result[0]->count != 0 ) {
					$total_value = $result[0]->count * $item['amount'];
				} else {
					$total_value = 0;
				}
			}
			$result_value = round( $total_value, wc_get_price_decimals() );
			
		} else {
			$result_value = '0';
		}

		return $result_value;
		
	}

	/**
	 * calculate_month_item
	 *
	 * @param  array $item
	 * @param  string $month
	 * @param  string $month_string
	 * @param  string $year
	 * @param  float $number_of_days
	 * @return float
	 */
	public function calculate_month_item( $item, $month = '1', $month_string = '01', $year = null, $number_of_days = null ) {

		if ( null === $year ) {
			$year = gmdate( 'Y' );
		}

		$day = $year . '-' . $month_string . '-' . '01';
		$day_time = strtotime($day);
		$date = new \DateTime($day);
		$month_days = $date->format('t');
		$month = $date->format('n');
		$first_day_of_month = $date->modify('first day of this month')->format('Y-m-d');
		$last_day_of_month = $date->modify('last day of this month')->format('Y-m-d');
		if ( 'yes' == $item['manually'] ) {
			//Manually is available only for all year period
			$day_price = $item['month-' . $month] / $month_days;
		} else {

			$year_start = $year . '-01-01';
			$year_end = $year . '-12-31';
			if ( $year_start != $item['date_start'] || $year_end != $item['date_end'] ) {

				//Not full year
				$date_start_time = strtotime($item['date_start']);
				$date_end_time = strtotime($item['date_end']);
				$date_start_month = gmdate( 'n', $date_start_time);
				$date_end_month = gmdate( 'n', $date_end_time);
				//Calculate period price for day
				$days_in_origin_period = $this->get_days_in_period( $item['date_start'], $item['date_end'] );
				$price_per_day = (float)$item['amount'] / $days_in_origin_period;
				
				if ( $month < $date_start_month ) {
					//Month is outside period, return 0
					return 0;
				} elseif ( $month > $date_end_month ) {
					//Month is outside period, return 0
					return 0;
				} elseif ( $first_day_of_month >= $item['date_start'] ) {
					//First day is in period
					if ( $last_day_of_month <= $item['date_end'] ) {
						//Period is whole month
						$price = round( $price_per_day * $month_days, 2 );
						return $price;
					} else {
						//Get nubers of day in part of month
						$days_in_period = $this->get_days_in_period( $first_day_of_month, $item['date_end'] );
						$price = round( $price_per_day * $days_in_period, 2 );
						return $price;
					}
				} elseif ( $last_day_of_month <= $item['date_end'] ) {
					//Last day is in period
					if ( $first_day_of_month >= $item['date_start'] ) {
						//Period is whole month
						$price = round( $price_per_day * $month_days, 2 );
						return $price;
					} else {
						//Get nubers of day in part of month
						$days_in_period = $this->get_days_in_period( $item['date_start'], $last_day_of_month );
						$price = round( $price_per_day * $days_in_period, 2 );
						return $price;
					}

				}



			} else {
				//Calculate by days in year
				$day_price = $item['amount'] / $number_of_days;
			}
		}

		$price = round( $day_price * $month_days, 2 );
		
		return $price;
		
	}
	
	/**
	 * get_days_in_period
	 *
	 * @param  string $start_date
	 * @param  string $end_date
	 * @return int
	 */
	public function get_days_in_period( $start_date, $end_date ) {
		$start_date = new \DateTime($start_date);
		$end_date = new \DateTime($end_date);
		$interval = $start_date->diff($end_date);
		$days = $interval->days + 1;
		return $days;
	}
	
}
