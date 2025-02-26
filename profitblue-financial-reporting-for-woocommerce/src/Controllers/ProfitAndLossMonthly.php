<?php

namespace ProfitBlue\Controllers;

use ProfitBlue\Models\ShopSettingCostsModel;

/**
 * ProfitAndLossMonthly
 */
class ProfitAndLossMonthly {
	
	/**
	 * period
	 * 
	 * @since  1.0.0
	 * @access private
	 *
	 * @var string
	 */
	private $period = 'whole-period';
	
	/**
	 * start
	 * 
	 * @since  1.0.0
	 * @access private
	 *
	 * @var bool
	 */
	private $start = false;	

	/**
	 * end
	 * 
	 * @since  1.0.0
	 * @access private
	 *
	 * @var bool
	 */
	
	private $end = false;	
	
	/**
	 * start_date
	 * 
	 * @since  1.0.0
	 * @access private
	 *
	 * @var bool
	 */
	private $start_date = false;	
	
	/**
	 * end_date
	 * 
	 * @since  1.0.0
	 * @access private
	 *
	 * @var bool
	 */
	private $end_date = false;
	
	/**
	 * months_data
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var bool
	 */
	public $months_data = false;

	/**
	 * year_data
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var array
	 */
	public $year_data = array();

	/**
	 * ccai
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var array
	 */
	public $ccai = array();
		
	/**
	 * orders
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var bool
	 */
	public $orders = false;	

	/**
	 * year_orders
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var bool
	 */
	public $year_orders = false;

	/**
	 * revenue
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var bool
	 */
	public $revenue = false;

	/**
	 * year_revenue
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var bool
	 */
	public $year_revenue = false;	

	/**
	 * cogs
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var bool
	 */
	public $cogs = false;

	/**
	 * year_cogs
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var bool
	 */
	public $year_cogs = false;	

	/**
	 * margin
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var bool
	 */
	public $margin = false;	

	/**
	 * year_margin
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var bool
	 */
	public $year_margin = false;
	
	/**
	 * net_profit
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var bool
	 */
	public $net_profit = false;
		
	/**
	 * year_net_profit
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var bool
	 */
	public $year_net_profit = false;
	
	/**
	 * shipping_cost
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var bool
	 */
	public $shipping_cost = false;
		
	/**
	 * shipping_cost_data
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var bool
	 */
	public $shipping_cost_data = false;
	
	/**
	 * payments
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var bool
	 */
	public $payments = false;
		
	/**
	 * payment_periods
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var bool
	 */
	public $payment_periods = false;
	
	/**
	 * wpdb
	 * 
	 * @since  1.0.0
	 * @access private
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
		$this->wpdb = $wpdb;
		$this->set_shipping_data();
		$this->set_payment_data();
		$this->set_data();		
		$this->get_pnl_data();

	}

	/**
	 * Parse args from url
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return array
	 */
	public function get_pnl_data( $start_date, $end_date ) {

		$this->start_date = $start_date;
		$this->end_date = $end_date;
		
		$this->set_months();
		
		$months_result_data = array();
		$months_data = $this->months_data;

		$year = $this->year_data['year'];

		$ShopSettingCostsModel = new ShopSettingCostsModel();
		$shopSetting = $ShopSettingCostsModel->get_data_by_year( $year );
		$incomeTax = $shopSetting[0]->tax_income;

		if( !empty( $months_data ) ) {

			$all_orders_total = 0;
			$all_products_total = 0;
			$all_shipping_total = 0;
			$all_cogs_total = 0;
			$all_gross_margin = 0;
			$all_variable_totals = 0;
			$all_margin_after_cogs_and_variable = 0;
			$all_fixed = array();
			$all_variable = array();
			$all_income = array();
			$all_shipping_income = 0;
			$all_payment_income = 0;

			foreach( $months_data as $key => $month ) {
								
				if ( empty( $month['orders_total'] ) ) {
					$month['orders_total'] = 0;
				}
				if ( empty( $month['products_total'] ) ) {
					$month['products_total'] = 0;
				}
				if ( empty( $month['shipping_total'] ) ) {
					$month['shipping_total'] = 0;
				}
				if ( empty( $month['fees_total'] ) ) {
					$month['fees_total'] = 0;
				}
				if ( empty( $month['cogs_total'] ) ) {
					$month['cogs_total'] = 0;
				}
				$orders_total 					= round( $month['orders_total'], 0 );
				$all_orders_total				+= $orders_total;
				$products_total 				= round( $month['products_total'], 0 );
				$products_total 				+= $p_total;
				$shipping_total 				= round( $month['shipping_total'] + $month['fees_total'], 0 );
				$all_shipping_total				+= $shipping_total;
				$cogs_total 					= round( $month['cogs_total'], 0 );
				$month_gross_margin 			= round( ( $products_total + $shipping_total ) - $cogs_total, 0 );
				$v_total = $this->get_data_total( $this->get_variable_totals( $this, $month ), $month['month'] );
				$variable_totals 				= $v_total;
				$margin_after_cogs_and_variable = ( $products_total + $shipping_total ) - ( $cogs_total + $v_total );

				$i_total = $this->get_data_total( $this->get_income_totals( $this, $month ), $month['month'] );
				$income_totals 					= $i_total;
				
				$f_total = $this->get_data_total( $this->get_fixed_totals( $this, $month ), $month['month'] );
				$fixed_totals 					= $f_total;
				
				//If order total is 0, income total is 0 too
				if ( 0 == $orders_total ) {
					$i_total = 0;
				}
				$total_fixed_and_income 		= $f_total - $i_total;
				$ebt 							= $margin_after_cogs_and_variable - $total_fixed_and_income;
				$total_tax						= ( round( ( $ebt / 100 ) * $incomeTax, 0 ) * -1 );
				$net_income	= round( $ebt + $total_tax, 0 );
				
				//Revenue
				$months_result_data[$key]['revenue'] = $orders_total;
				//Sales of goods
				if ( 0 == $products_total || 0 == $orders_total ) {
					$months_result_data[$key]['sales_of_goods'] = 0;
				} else {
					$months_result_data[$key]['sales_of_goods'] = $products_total;
				}				
				//Shipping and fees					
				if ( 0 == $shipping_total || 0 == $orders_total ) {
					$months_result_data[$key]['shipping_and_fees'] = 0;
				} else {
					$months_result_data[$key]['shipping_and_fees'] = $shipping_total;
				}
				//Cogs
				if ( 0 == $cogs_total || 0 == $orders_total ) {
					$months_result_data[$key]['shipping_and_fees'] = 0;
				} else {
					$months_result_data[$key]['shipping_and_fees'] = $cogs_total;
				}
				//Gross margin
				if ( 0 == $month_gross_margin || 0 == $orders_total ) {
					$months_result_data[$key]['gross_margin'] = 0;
				} else {
					$months_result_data[$key]['gross_margin'] = $month_gross_margin;
				}

				$total_variable_number = 0;
				foreach( $this->ccai['variable'] as $caai_id => $ccai_item ) {							
					$value = $this->calculate_value( $month, $ccai_item );
					$total_variable_number += $value;
				}
				$value = round( $this->ccai['shipping_income'][$month['month']], 2 );
				$total_variable_number += $value;
				$value = $this->ccai['payment_income'][$month['month']];
				$total_variable_number += $value;
				$total_variable_number = round( $total_variable_number, 2 );
				
				if ( 0 == $ebt || 0 == $orders_total ) {
					$months_result_data[$key]['ebt'] = 0;
				} else {
					$months_result_data[$key]['ebt'] = $ebt;
				}

				if ( 0 == $total_tax || 0 == $orders_total ) {
					$months_result_data[$key]['total_tax'] = 0;
				} else {
					$months_result_data[$key]['total_tax'] = $total_tax;
				}

				if ( 0 == $net_income || 0 == $orders_total ) {
					$months_result_data[$key]['net_income'] = 0;
				} else {
					$months_result_data[$key]['net_income'] = $net_income;
				}				
			}																

		}

		return $months_result_data;
		
	}

	/**
	 * Parse args from url
	 * 
	 * @since  1.0.0
	 * @access public
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
	 * Set months
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return array
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
	 * Set payment data
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function set_payment_data() {

		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i",
				array(
					$wpdb->prefix . 'profitblue_payments'
				)
			)
		);
		if ( !empty( $result ) ) {
			$this->payments = $result;
		}
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i",
				array(
					$wpdb->prefix . 'profitblue_payment_periods'
				)
			)
		);
		if ( !empty( $result ) ) {
			$this->payment_periods = $result;
		}		
	
	}

	/**
	 * Set shipping data
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function set_shipping_data() {

		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i",
				array(
					$wpdb->prefix . 'profitblue_shiping_costs'
				)
			)
		);
		if ( !empty( $result ) ) {
			$this->shipping_cost = $result;
		}
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i",
				array(
					$wpdb->prefix . 'profitblue_shipping_costs_data'
				)
			)
		);
		if ( !empty( $result ) ) {
			$this->shipping_cost_data = $result;
		}		
	
	}

	/**
	 * Get order shipping income
	 * 
	 * @since  1.0.0
	 * @access public
	 *
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
	 * Get order payment income
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return float
	 */
	public function get_order_payment_income( $order ) {

		//payments
		//payment_periods
		$date = gmdate( 'Y-m-d', $order->order_date );
		$year = gmdate( 'Y', $order->order_date );

		foreach( $this->payment_periods as $payment_period ) {
			if ( $payment_period->type == 'custom' ) {
				if ( $date >= $payment_period->date_start && $date <= $payment_period->date_end ) {
					$payment_period_id = $payment_period->ID;
					break;
				}
			}			
		}
		if ( empty( $payment_period_id ) ) {
			foreach( $this->payment_periods as $payment_period ) {
				if ( $payment_period->year == $year ) {
					$payment_period_id = $payment_period->ID;
					break;
				}
			}
		}
		if ( empty( $payment_period_id ) ) {
			foreach( $this->payment_periods as $payment_period ) {
				if ( $payment_period->type == 'whole-period' ) {
					$payment_period_id = $payment_period->ID;
					break;
				}
			}
		}

		$payment_cost = 0;
		//Now we have payment cost_id - proccess price
		foreach( $this->payments as $payment ) {
			if ( $payment->payment_period_id == $payment_period_id && $payment->payment == $order->order_payment_id ) {

				$payment_cost_id_data = $payment;
				break;
			}
		}
		if ( !empty( $payment_cost_id_data ) ) {
			if ( !empty( $payment_cost_id_data->amount ) ) {
				$amount = (float)$payment_cost_id_data->amount;
				$payment_cost = $payment_cost + $amount;
			}

			if ( !empty( $payment_cost_id_data->percent && $payment_cost_id_data->percent > 0 ) ) {
				$percent = (float)$payment_cost_id_data->percent;
				$price = $order->order_subtotal;
				$payment_cost = $payment_cost + ( ( $order->order_subtotal / 100 ) * $percent );
			}
		}

		return $payment_cost;

	}

	/**
	 * Set orders by months
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 * 
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

		$args = array();
		$where = '';
		if ( false != $this->start_date && false != $this->end_date ) {
			$where .= " WHERE order_date BETWEEN '%s' AND '%s'";
			$args[] = strtotime( $this->start_date );
			$args[] = strtotime( $this->end_date );
		}
		$shipping_income = array();
		$payment_income = array();
		$get_use_this = get_option( 'profitblue-use-this-shop-setting-period' );
		if ( !empty( $get_use_this ) ) {
			$escaped = array();
			$statuses = apply_filters( 'profitblue_order_statuses', array( 'processing', 'pending', 'on-hold' ) );
			$statuses_result = implode("','", $statuses);
			$where .= " AND order_status NOT IN (" . $statuses_result . ")";
			//$args[] = $statuses_result;
			if ( false != $this->start_date && false != $this->end_date ) {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT * FROM %i WHERE order_date BETWEEN %s AND %s AND order_status NOT IN (%s)",
						array(
							$wpdb->prefix . 'profitblue_orders',
							strtotime( $this->start_date ),
							strtotime( $this->end_date ),
							"'".$statuses_result."'"
						)
					)
				);
			} else {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT * FROM %i WHERE order_status NOT IN (%s)",
						array(
							$this->wpdb->prefix . 'profitblue_orders',
							"'".$statuses_result."'"
						)
					)
				);
			}

		} else {

			if ( false != $this->start_date && false != $this->end_date ) {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT * FROM %i WHERE order_date BETWEEN %s AND %s",
						array(
							$this->wpdb->prefix . 'profitblue_orders',
							strtotime( $this->start_date ),
							strtotime( $this->end_date )
						)
					)
				);
			} else {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT * FROM %i",
						array(
							$this->wpdb->prefix . 'profitblue_orders'
						)
					)
				);
			}			
			
		}
		if ( !empty( $result ) ) {
			foreach( $result as $item ) {

				$orders_total 			+= (float)$item->order_subtotal + (float)$item->order_fees_subtotal;
				$shipping_total 		+= (float)$item->order_shipping_subtotal;
				$products_total 		+= ( (float)$item->order_subtotal - (float)$item->order_shipping_subtotal );
				$fees_total 			+= (float)$item->order_fees_subtotal;
				$payments_cost_total 	+= (float)$item->order_payment_cost;
				$shipping_cost_total 	+= (float)$item->order_shipping_cost;
				$pcs 					+= (float)$item->pcs;
				$cogs_total 			+= (float)$item->cogs;
				$gross_margin_total 	+= (float)$item->gross_margin;
				$orders_tax				+= (float)$item->order_tax;

				$month = gmdate( 'Y-m', $item->order_date );
				$sub_month = gmdate( 'm', $item->order_date );

				$month_product_total = (float)$item->order_subtotal - (float)$item->order_shipping_subtotal;

				$this->set_month_item_data( $month, 'orders_total', (float)$item->order_subtotal + (float)$item->order_fees_subtotal );
				$this->set_month_item_data( $month, 'products_total', $month_product_total );
				$this->set_month_item_data( $month, 'shipping_total', $item->order_shipping_subtotal );
				$this->set_month_item_data( $month, 'fees_total', $item->order_fees_subtotal );
				$this->set_month_item_data( $month, 'payments_cost_total', $item->order_payment_cost );
				$this->set_month_item_data( $month, 'shipping_cost_total', $item->order_shipping_cost );
				$this->set_month_item_data( $month, 'pcs', $item->pcs );
				$this->set_month_item_data( $month, 'cogs_total', $item->cogs );
				$this->set_month_item_data( $month, 'gross_margin_total', $item->gross_margin );
				$this->set_month_item_data( $month, 'orders_tax', $item->order_tax );
				$this->set_month_item_data( $month, 'orders_count', 1 );
				$shipping_value = 0;
				$shipping_value = $this->get_order_shipping_income( $item );
				$this->set_month_item_data( $month, 'shipping_income', $shipping_value );				
				$payment_value	 									= $this->get_order_payment_income( $item );
				$this->set_month_item_data( $month, 'payment_income', $payment_value );
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

		
		$year = $this->year_data['year'];
		
		if ( false != $this->start_date && false != $this->end_date ) {
			$result = $wpdb->get_results( 
				$wpdb->prepare(
					"SELECT * FROM %i WHERE date_start >=%s AND date_end <= %s",
					array(
						$wpdb->prefix . 'profitblue_ccai',
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
						$wpdb->prefix . 'profitblue_ccai'
					)
				),
			 	ARRAY_A 
			);
		}
		if ( !empty( $result ) ) {
		
			$ccai = array();

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

				$ccai[$item['type']][$item['ID']]['months']['1']  = $this->calculate_ccai_value( $year, '01', '1', $item );
				$ccai[$item['type']][$item['ID']]['months']['2']  = $this->calculate_ccai_value( $year, '02', '2', $item );
				$ccai[$item['type']][$item['ID']]['months']['3']  = $this->calculate_ccai_value( $year, '03', '3', $item );
				$ccai[$item['type']][$item['ID']]['months']['4']  = $this->calculate_ccai_value( $year, '04', '4', $item );
				$ccai[$item['type']][$item['ID']]['months']['5']  = $this->calculate_ccai_value( $year, '05', '5', $item );
				$ccai[$item['type']][$item['ID']]['months']['6']  = $this->calculate_ccai_value( $year, '06', '6', $item );
				$ccai[$item['type']][$item['ID']]['months']['7']  = $this->calculate_ccai_value( $year, '07', '7', $item );
				$ccai[$item['type']][$item['ID']]['months']['8']  = $this->calculate_ccai_value( $year, '08', '8', $item );
				$ccai[$item['type']][$item['ID']]['months']['9']  = $this->calculate_ccai_value( $year, '09', '9', $item );
				$ccai[$item['type']][$item['ID']]['months']['10'] = $this->calculate_ccai_value( $year, '10', '10', $item );
				$ccai[$item['type']][$item['ID']]['months']['11'] = $this->calculate_ccai_value( $year, '11', '11', $item );
				$ccai[$item['type']][$item['ID']]['months']['12'] = $this->calculate_ccai_value( $year, '12', '12', $item );
									
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

				$ccai[$item['type']][$item['ID']]['months']['1'] = $this->calculate_month_item( $item,'1', '01', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['2'] = $this->calculate_month_item( $item,'2', '02', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['3'] = $this->calculate_month_item( $item,'3', '03', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['4'] = $this->calculate_month_item( $item,'4', '04', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['5'] = $this->calculate_month_item( $item,'5', '05', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['6'] = $this->calculate_month_item( $item,'6', '06', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['7'] = $this->calculate_month_item( $item,'7', '07', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['8'] = $this->calculate_month_item( $item,'8', '08', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['9'] = $this->calculate_month_item( $item,'9', '09', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['10'] = $this->calculate_month_item( $item,'10', '10', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['11'] = $this->calculate_month_item( $item,'11', '11', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['12'] = $this->calculate_month_item( $item,'12', '12', $year, $price_for_day );				
						
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

				$ccai[$item['type']][$item['ID']]['months']['1'] = $this->calculate_month_item( $item,'1', '01', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['2'] = $this->calculate_month_item( $item,'2', '02', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['3'] = $this->calculate_month_item( $item,'3', '03', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['4'] = $this->calculate_month_item( $item,'4', '04', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['5'] = $this->calculate_month_item( $item,'5', '05', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['6'] = $this->calculate_month_item( $item,'6', '06', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['7'] = $this->calculate_month_item( $item,'7', '07', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['8'] = $this->calculate_month_item( $item,'8', '08', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['9'] = $this->calculate_month_item( $item,'9', '09', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['10'] = $this->calculate_month_item( $item,'10', '10', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['11'] = $this->calculate_month_item( $item,'11', '11', $year, $price_for_day );
				$ccai[$item['type']][$item['ID']]['months']['12'] = $this->calculate_month_item( $item,'12', '12', $year, $price_for_day );		
				
								
						
			}

			$ccai['shipping_income'] = $shipping_income;
			$ccai['payment_income'] = $payment_income;

			$this->ccai = $ccai;					

		}

	}

	/**
	 * Set orders
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function set_orders() {

		global $wpdb;
		if ( false != $this->start_date && false != $this->end_date ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT ID FROM %i WHERE post_type=%s  AND post_status=%s AND post_date BETWEEN %s AND %s",
					array(
						$wpdb->prefix . 'posts',
						'shop_order',
						'wc-completed',
						$this->start_date,
						$this->end_date
					)
				)
			);	
		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT ID FROM %i WHERE post_type=%s  AND post_status=%s",
					array(
						$wpdb->prefix . 'posts',
						'shop_order',
						'wc-completed'
					)
				)
			);
		}	
					
		$this->orders = $result;

	}	

	/**
	 * Variable totals cost
	 * 
	 * @since  1.0.0
	 * @access public
	 * 
	 * @param  object $profitAndLossController
	 * @param  string $month
	 * @return array
	 */
	public function get_variable_totals( $profitAndLossController, $month ) {

		$totals = array('01' => 0,'02' => 0,'03' => 0,'04' => 0,'05' => 0,'06' => 0,'07' => 0,'08' => 0,'09' => 0,'10' => 0,'11' => 0,'12' => 0);
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
	 * Variable total cost
	 * 
	 * @since  1.0.0
	 * @access public
	 * 
	 * @param  float $totals
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
	 * Fixed totals cost
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @param  object $profitAndLossController
	 * @param  string $month
	 * @return array
	 */
	public function get_fixed_totals( $profitAndLossController, $month ) {

		$totals = array('01' => 0,'02' => 0,'03' => 0,'04' => 0,'05' => 0,'06' => 0,'07' => 0,'08' => 0,'09' => 0,'10' => 0,'11' => 0,'12' => 0);
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
	 * Income totals cost
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @param  object $profitAndLossController
	 * @param  string $month
	 * @return array
	 */
	public function get_income_totals( $profitAndLossController, $month ) {

		$totals = array('01' => 0,'02' => 0,'03' => 0,'04' => 0,'05' => 0,'06' => 0,'07' => 0,'08' => 0,'09' => 0,'10' => 0,'11' => 0,'12' => 0);
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
	 * @since  1.0.0
	 * @access public
	 *
	 * @return int
	 */
	public function get_average_orders() {

		$orders = round( count( $this->year_orders ) / 365, 1 );

		return $orders;

	}

	/**
	 * Set revenue
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function set_revenue() {		
		global $wpdb;
		$args = array();
		if ( false != $this->start_date && false != $this->end_date ) {			
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT SUM(order_subtotal) as revenue FROM %i WHERE order_date BETWEEN %s AND %s",
					array(
						$wpdb->prefix . 'profitblue_orders',
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
						$wpdb->prefix . 'profitblue_orders'
					)
				)
			);	
		}

		$this->revenue = round( $result[0]->revenue, wc_get_price_decimals() );		
		
	}

	/**
	 * Set year revenue
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function set_year_revenue() {		
		global $wpdb;
		$today = gmdate( 'Y-m-d' );
		$year = strtotime( $today . ' -1 year');
		
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT SUM(order_subtotal) as revenue FROM %i WHERE order_date BETWEEN %s AND %s",
				array(
					$wpdb->prefix . 'profitblue_orders',
					$year,
					time()
				)
			)
		);
		$this->year_revenue = round( $result[0]->revenue / 365 , wc_get_price_decimals() );		

	}
	
	/**
	 * Set cogs
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function set_cogs() {
		global $wpdb;
		if ( false != $this->start_date && false != $this->end_date ) {			
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_cogs) AS cogs
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id 
					WHERE orders.order_date BETWEEN %s AND %s",
					array(
						$wpdb->prefix . 'profitblue_order_items',
						$wpdb->prefix . 'profitblue_orders',
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
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id 
					",
					array(
						$wpdb->prefix . 'profitblue_order_items',
						$wpdb->prefix . 'profitblue_orders'
					)
				)
			);	
		}

		$this->cogs = round( $result[0]->cogs, wc_get_price_decimals() );		

	}

	/**
	 * Set cogs
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function set_year_cogs() {
		global $wpdb;
		$today = gmdate( 'Y-m-d' );
		$year = strtotime( $today . ' -1 year');
		
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT
				SUM(items.item_cogs) AS cogs
				  FROM %i AS items
				  LEFT JOIN %i AS orders ON orders.order_id = items.order_id 
				WHERE orders.order_date BETWEEN %s AND %s",
				array(
					$wpdb->prefix . 'profitblue_order_items',
					$wpdb->prefix . 'profitblue_orders',
					$year,
					time()
				)
			)
		);
		$this->year_cogs = round( $result[0]->cogs / 365, wc_get_price_decimals() );		

	}

	/**
	 * Set margin
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function set_margin() {
		global $wpdb;
		if ( false != $this->start_date && false != $this->end_date ) {			
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_cogs) AS cogs
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id 
					WHERE orders.order_date BETWEEN %s AND %s AND items.item_type='line_item'",
					array(
						$wpdb->prefix . 'profitblue_order_items',
						$wpdb->prefix . 'profitblue_orders',
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
					WHERE orders.order_date BETWEEN %s AND %s AND items.item_type='line_item'",
					array(
						$wpdb->prefix . 'profitblue_order_items',
						$wpdb->prefix . 'profitblue_orders',
						strtotime( $this->start_date ),
						strtotime( $this->end_date )
					)
				)
			);
			$total = $result[0]->total;
		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT
        			SUM(items.item_cogs) AS cogs
      				FROM %i AS items
      				LEFT JOIN %i AS orders ON orders.order_id = items.order_id 
					WHERE items.item_type='line_item'",
					array(
						$wpdb->prefix . 'profitblue_order_items',
						$wpdb->prefix . 'profitblue_orders'
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
					WHERE items.item_type='line_item'",
					array(
						$wpdb->prefix . 'profitblue_order_items',
						$wpdb->prefix . 'profitblue_orders'
					)
				)
			);
			$total = $result[0]->total;
		}
		
		$margin = round( $total - $cogs, wc_get_price_decimals() );		
		$this->margin = $margin;

	}

	/**
	 * Set margin
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function set_year_margin() {
		global $wpdb;
		$today = gmdate( 'Y-m-d' );
		$year = strtotime( $today . ' -1 year');
		
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT
				SUM(items.item_cogs) AS cogs
				  FROM %i AS items
				  LEFT JOIN %i AS orders ON orders.order_id = items.order_id 
				WHERE orders.order_date BETWEEN %s AND %s AND items.item_type='line_item'",
				array(
					$wpdb->prefix . 'profitblue_order_items',
					$wpdb->prefix . 'profitblue_orders',
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
				WHERE orders.order_date BETWEEN %s AND %s AND items.item_type='line_item'",
				array(
					$wpdb->prefix . 'profitblue_order_items',
					$wpdb->prefix . 'profitblue_orders',
					$year,
					time()
				)
			)
		);
		$total = $result[0]->total;

		$margin = round( ( $total - $cogs ) / 365, wc_get_price_decimals() );		
		$this->year_margin = $margin;

	}

	/**
	 * Set margin
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function set_net_profit() {
		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT
				SUM(items.item_cogs) AS cogs
				  FROM %i AS items
				  LEFT JOIN %i AS orders ON orders.order_id = items.order_id 
				WHERE orders.order_date BETWEEN %s AND %s AND items.item_type='line_item'",
				array(
					$wpdb->prefix . 'profitblue_order_items',
					$wpdb->prefix . 'profitblue_orders',
					$this->start_date,
					$this->end_date
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
				WHERE orders.order_date BETWEEN %s AND %s AND items.item_type='line_item'",
				array(
					$wpdb->prefix . 'profitblue_order_items',
					$wpdb->prefix . 'profitblue_orders',
					$this->start_date,
					$this->end_date
				)
			)
		);
		$total = $result[0]->total;

		$margin = round( $total - $cogs, wc_get_price_decimals() );		
		$this->net_profit = $margin;

	}

	/**
	 * Set margin
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function set_year_net_profit() {
		global $wpdb;
		$today = gmdate( 'Y-m-d' );
		$year = strtotime( $today . ' -1 year');
		
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT
				SUM(items.item_cogs) AS cogs
				  FROM %i AS items
				  LEFT JOIN %i AS orders ON orders.order_id = items.order_id 
				WHERE orders.order_date BETWEEN %s AND %s AND items.item_type='line_item'",
				array(
					$wpdb->prefix . 'profitblue_order_items',
					$wpdb->prefix . 'profitblue_orders',
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
				WHERE orders.order_date BETWEEN %s AND %s AND items.item_type='line_item'",
				array(
					$wpdb->prefix . 'profitblue_order_items',
					$wpdb->prefix . 'profitblue_orders',
					$year,
					time()
				)
			)
		);
		$total = $result[0]->total;

		$margin = round( ( $total - $cogs ) / 365, wc_get_price_decimals() );		
		$this->year_net_profit = $margin;

	}

	/**
	 * Get best sellers
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function get_bestsellers() {	
		global $wpdb;
		$args = array();
		$where = '';
		if ( false != $this->start_date && false != $this->end_date ) {
			$where .= " WHERE orders.order_date BETWEEN '%s' AND '%s'";
			$args[] = strtotime( $this->start_date );
			$args[] = strtotime( $this->end_date );
		}

		if ( false != $this->start_date && false != $this->end_date ) {			
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT order_items.product_id, SUM(order_items.item_qty) as qty, SUM(order_items.profit) as profit, SUM(order_items.item_cogs) as cogs, SUM(order_items.item_total) as total
					FROM %i AS order_items
					JOIN %iprofitblue_orders AS orders ON orders.order_id = order_items.order_id
					WHERE orders.order_date BETWEEN %s AND %s AND order_items.product_id != '0' 
					GROUP BY order_items.product_id
					ORDER BY qty DESC LIMIT 12",
					array(
						$wpdb->prefix . 'profitblue_order_items',
						$wpdb->prefix . 'profitblue_orders',
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
						$wpdb->prefix . 'profitblue_order_items',
						$wpdb->prefix . 'profitblue_orders'
					)
				)
			);	
		}


		return $result;

	}

	/**
	 * Get most profitable
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function get_most_profitable() {	
		global $wpdb;
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
						$wpdb->prefix . 'profitblue_order_items',
						$wpdb->prefix . 'profitblue_orders',
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
						$wpdb->prefix . 'profitblue_order_items',
						$wpdb->prefix . 'profitblue_orders'
					)
				)
			);	
		}

		return $result;

	}

	/**
	 * Get least profitable
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function get_least_profitable() {	
		global $wpdb;
		$args = array();
		$where = '';
		if ( false != $this->start_date && false != $this->end_date ) {
			$where .= " WHERE orders.order_date BETWEEN '%s' AND '%s'";
			$args[] = strtotime( $this->start_date );
			$args[] = strtotime( $this->end_date );
		}

		if ( false != $this->start_date && false != $this->end_date ) {			
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT order_items.product_id, SUM(order_items.item_qty) as qty, SUM(order_items.profit) as profit, SUM(order_items.item_cogs) as cogs, SUM(order_items.item_total) as total
					FROM %i AS order_items
					JOIN %i AS orders ON orders.order_id = order_items.order_id
					WHERE orders.order_date BETWEEN %s AND %s AND order_items.product_id != '0' 
					GROUP BY order_items.product_id
					ORDER BY profit ASC LIMIT 12",
					array(
						$wpdb->prefix . 'profitblue_order_items',
						$wpdb->prefix . 'profitblue_orders',
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
						$wpdb->prefix . 'profitblue_order_items',
						$wpdb->prefix . 'profitblue_orders'
					)
				)
			);	
		}

		return $result;

	}

	/**
	 * Get orders count
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return int
	 */
	public function get_orders_count() {		

		return count( $this->orders );

	}

	/**
	 * Get products
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return array|false
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
	 * Get products
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return array|false
	 */
	public function get_custom_cost() {

		global $wpdb;

		$args = array();
		$year = gmdate( 'Y' );
		if ( !empty( $this->start_date ) ) {
			$sql_start_date = $this->start_date;
		} else {
			$this->start_date = $year . '-01-01';
			$sql_start_date = $year . '-01-01';
		}
		if ( !empty( $this->end_date ) ) {
			$sql_end_date = $this->end_date;
		} else {
			$sql_end_date = $year . '-12-31';
			$this->end_date = $year . '-12-31';
		}

		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE date_start >= %s AND date_end <= %s",
				array(
					$wpdb->prefix . 'profitblue_ccai',
					$sql_start_date,
					$sql_end_date
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
	 * Calculate value
	 * 
	 * @since  1.0.0
	 * @access public
	 * 
	 * @param string $month
	 * @param string $months_data
	 * 
	 * @return array
	 *
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
	 * Set month data
	 *
	 * @since  1.0.0
	 * @access public
	 * 
	 * @param string $month
	 * @param string $key
	 * @param string $value
	 * 
	 * @return void
	 * 
	 */
	public function set_month_item_data( $month, $key, $value ) {

		if ( empty( $this->months_data[$month][$key] ) ) {
			$this->months_data[$month][$key] = (float)$value;
		} else {
			$this->months_data[$month][$key] += (float)$value;
		}

	}	

	/**
	 * Set month data
	 *
	 * @since  1.0.0
	 * @access public
	 * 
	 * @param string $year
	 * @param string $month
	 * @param string $month_number
	 * @param array $item
	 * 
	 * @return string|float
	 */
	public function calculate_ccai_value( $year, $month, $month_number, $item ) {

		if ( null != $item['month-'.$month_number] && '0' !== $item['month-'.$month] ) {
			$value = $item['month-'.$month_number];
			$total_value = $this->months_data[$year . '-'.$month]['orders_count'] * $value;
			$result_value = $total_value;
		} else {
			$month_check = $year . '-'.$month.'-01';
			if ( $item['date_start'] <= $month_check && $item['date_end'] >= $month_check ) {
				if ( $item['amount-type'] == 'amount' ) {
					if ( !empty( $this->months_data[$year . '-'.$month]['orders_count'] ) ) {
						$total_value = (float)$this->months_data[$year . '-'.$month]['orders_count'] * (float)$item['amount'];
					} else {
						$total_value = '0';
					}
				} else {
					if ( !empty( $this->months_data[$year . '-'.$month]['orders_total'] ) ) {
						$total_value = ( $this->months_data[$year . '-'.$month]['orders_total'] / 100  ) * $item['amount'];
					} else {
						$total_value = '0';
					}
				}
				$result_value = round( $total_value, wc_get_price_decimals() );
			} else {
				$result_value = '0';
			}
		}
		return $result_value;
		
	}

	/**
	 * Set month data
	 *
	 * @since  1.0.0
	 * @access public
	 * 
	 * @param array $item
	 * @param string $month
	 * @param string $month_string
	 * @param string $year
	 * @param string $day_price
	 * 
	 * @return string
	 */
	public function calculate_month_item( $item, $month = '1', $month_string = '01', $year = null, $day_price = null ) {

		if ( null === $year ) {
			$year = gmdate( 'Y' );
		}

		if ( 'yes' == $item['manually'] ) {

			if ( null != $item['month-' . $month] && '0' !== $item['month-' . $month] ) {
				$price	= $item['month-' . $month];
			} else {
				$price = '0';
			}

		} else {

			$start_date 	= new \DateTime( $item['date_start'] );
			$end_date 	= new \DateTime( $item['date_end'] );

			// Define the start and end dates for February
			$month_start = new \DateTime($year . '-' . $month_string . '-01');
			$month_end = (clone $month_start)->modify('last day of this month');

			//If month is out of the range, return zero
			if ( $month_end < $start_date || $month_start > $end_date ) {

				$price = '0';

			} else {

				$month_days = min($end_date, $month_end)->diff(max($start_date, $month_start))->days;
				$month_days++;
				
				$price = round( $day_price * $month_days, 2 );
				$price = (string)$price;

			}

		}

		return $price;
		
	}

}
