<?php

namespace Profitblue\Controllers;

use ProfitBlue\Models\ShopSettingCostsModel;
use ProfitBlue\Controllers\OverviewCcaiData;
use ProfitBlue\Controllers\OrdersController;

/**
 * OverviewController
 */
class OverviewController {
	
	/**
	 * Period
	 *
	 * @var string
	 */
	private $period = 'whole-period';
	
	/**
	 * Start
	 *
	 * @var bool
	 */
	private $start = false;	
	
	/**
	 * End
	 *
	 * @var bool
	 */
	private $end = false;	
	
	/**
	 * Start_date
	 *
	 * @var bool
	 */
	public $start_date = false;	
	
	/**
	 * End_date
	 *
	 * @var bool
	 */
	public $end_date = false;

	/**
	 * Year of period
	 * 
	 */
	public $year = false;

	/**
	 * Main graph display mode
	 * - revenue
	 * - cogs
	 * - margin-amount
	 * - margin-percent
	 * - number-orders
	 * - net-profit
	 */
	public $mode = false;
	
	/**
	 * Orders
	 *
	 * @var bool
	 */
	public $orders = false;	

	/**
	 * Year_orders
	 *
	 * @var bool
	 */
	public $year_orders = false;

	/**
	 * Orders count in defined period
	 * 
	 */
	public $orders_count = false;

	/**
	 * Orders count in last year
	 * 
	 */
	public $year_orders_count = false;

	/**
	 * Products count from all orders in defined period
	 * 
	 */
	public $orders_number_of_products = false;

	/**
	 * Products count from all orders in last year
	 * 
	 */
	public $year_orders_number_of_products = false;
	
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
	 * shipping
	 *
	 * @var bool
	 */
	public $shipping = false;
		
	/**
	 * shipping_subtotal
	 *
	 * @var bool
	 */
	public $shipping_subtotal = false;
		
	/**
	 * fees
	 *
	 * @var bool
	 */
	public $fees = false;
		
	/**
	 * variable
	 *
	 * @var bool
	 */
	public $variable = false;
		
	/**
	 * fixed
	 *
	 * @var bool
	 */
	public $fixed = false;
		
	/**
	 * income
	 *
	 * @var bool
	 */
	public $income = false;
		
	/**
	 * taxes
	 *
	 * @var bool
	 */
	public $taxes = false;
		
	/**
	 * total_tax
	 *
	 * @var bool
	 */
	public $total_tax = false;
		
	/**
	 * year_variable
	 *
	 * @var bool
	 */
	public $year_variable = false;
		
	/**
	 * year_fixed
	 *
	 * @var bool
	 */
	public $year_fixed = false;
		
	/**
	 * year_taxes
	 *
	 * @var bool
	 */
	public $year_taxes = false;
		
	/**
	 * ccai
	 *
	 * @var bool
	 */
	public $ccai = false;
		
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
	 * shop_settings
	 *
	 * @var bool
	 */
	public $shop_settings = false;
		
	/**
	 * shop_settings_periods
	 *
	 * @var bool
	 */
	public $shop_settings_periods = false;
	
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
	 * payment_fee
	 *
	 * @var bool
	 */
	public $payment_fee = false;
	
	/**
	 * exclude
	 *
	 * @var bool
	 */
	public $exclude = false;
		
	/**
	 * statuses
	 *
	 * @var undefined
	 */
	public $statuses = null;

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
	 * @param  string $start_date
	 * @param  string $end_date
	 * @return void
	 */
	public function __construct( $start_date = null, $end_date = null ) {

		global $wpdb;
		$this->wpdb = $wpdb;
		$this->ordersControler = new OrdersController();
		$this->parse_args( $start_date, $end_date );
		$this->set_shop_setting_data();
		$this->set_exclude();

		global $wpdb;
   		$statuses = apply_filters( 'profitblue_order_statuses', array( 'processing', 'pending', 'on-hold' ) );
    	$this->statuses = implode("','", $statuses);
		$this->set_shipping_data();
		$this->set_data();		
		$this->set_margin();
		$this->set_analysis();
		$this->set_net_profit();		
		$this->set_year_data();
		$this->set_year_margin();
		$this->set_year_net_profit();		

	}

	/**
	 * parse_args
	 *
	 * @param  string $start_date
	 * @param  string $end_date
	 * @return void
	 */
	public function parse_args( $start_date = null, $end_date = null ) {

		if ( null != $start_date && null != $end_date ) {
			$this->start_date = $start_date;
			$this->end_date = $end_date;
		} else {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( !empty( $_GET['period'] ) ) {
				$this->period = 'dates';
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				$dates = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
				$parts = explode( ' - ', $dates );
				$this->start_date = $parts[0];
				$this->end_date = $parts[1];
				$this->year = gmdate( 'Y', strtotime( $parts[0] ) );
			} else {
				$this->year = gmdate( 'Y' );
				$this->start_date = gmdate( 'Y-m-01' );
				$this->end_date = gmdate( 'Y-m-t' );
			}
		}

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['mode'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$this->mode = isset( $_GET['mode'] ) ? wp_unslash( sanitize_text_field( $_GET['mode'] ) ) : '';
		} else {
			$this->mode = 'revenue';
		}

	}

	/**
	 * Set data
	 *
	 * @return void
	 */
	public function set_data() {

		global $wpdb;
		//Set data
		if ( false != $this->start_date && false != $this->end_date ) {

			if ( true === $this->exclude ) {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT 
						SUM(pcs) as qty, 
						COUNT(ID) as count, 
						SUM(order_subtotal) as revenue, 
						SUM(cogs) AS cogs, 
						SUM(order_shipping_subtotal) AS shipping_subtotal, 
						SUM(order_shipping_cost) AS shipping, 
						SUM(order_payment_cost) AS payment, 
						SUM(order_fees_subtotal) AS fees
						FROM %i  WHERE order_date BETWEEN %s AND %s AND order_status NOT IN (%s)",
						array(
							$this->wpdb->prefix . 'profitblue_orders',
							strtotime( $this->start_date . '00:00:01' ),
							strtotime( $this->end_date . '23:59:59' ),
							"'".$this->statuses."'"
						)
					)
				);			
			} else {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT 
						SUM(pcs) as qty, 
						COUNT(ID) as count, 
						SUM(order_subtotal) as revenue, 
						SUM(cogs) AS cogs, 
						SUM(order_shipping_subtotal) AS shipping_subtotal, 
						SUM(order_shipping_cost) AS shipping, 
						SUM(order_payment_cost) AS payment, 
						SUM(order_fees_subtotal) AS fees
						FROM %i  WHERE order_date BETWEEN %s AND %s",
						array(
							$this->wpdb->prefix . 'profitblue_orders',
							strtotime( $this->start_date . '00:00:01' ),
							strtotime( $this->end_date . '23:59:59' )
						)
					)
				);
			}

		} else {
			if ( true === $this->exclude ) {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT 
						SUM(pcs) as qty, 
						COUNT(ID) as count, 
						SUM(order_subtotal) as revenue, 
						SUM(cogs) AS cogs, 
						SUM(order_shipping_subtotal) AS shipping_subtotal, 
						SUM(order_shipping_cost) AS shipping, 
						SUM(order_payment_cost) AS payment, 
						SUM(order_fees_subtotal) AS fees
						FROM %i  WHERE order_status NOT IN (%s)",
						array(
							$this->wpdb->prefix . 'profitblue_orders',
							"'".$this->statuses."'"							
						)
					)
				);			
			} else {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT 
						SUM(pcs) as qty, 
						COUNT(ID) as count, 
						SUM(order_subtotal) as revenue, 
						SUM(cogs) AS cogs, 
						SUM(order_shipping_subtotal) AS shipping_subtotal, 
						SUM(order_shipping_cost) AS shipping, 
						SUM(order_payment_cost) AS payment, 
						SUM(order_fees_subtotal) AS fees
						FROM %i",
						array(
							$this->wpdb->prefix . 'profitblue_orders',
						)
					)
				);
			}
		}
				
		if ( !empty( $result ) ) {
			$this->orders_number_of_products 	= $result[0]->qty;
			$this->orders_count 				= $result[0]->count;
			$this->revenue 						= $result[0]->revenue;
			$this->cogs 						= $result[0]->cogs;
			$this->shipping_subtotal			= $result[0]->shipping_subtotal;
			$this->shipping						= $result[0]->shipping;
			$this->payment_fee 					= $result[0]->payment;
			$this->fees 						= $result[0]->fees;
		} else {
			$this->orders_number_of_products 	= 0;
			$this->orders_count 				= 0;
			$this->revenue 						= 0;
			$this->cogs 						= 0;
			$this->shipping 					= 0;
			$this->shipping_subtotal			= 0;
			$this->payment_fee 					= 0;
			$this->fees 						= 0;
		}

	}

	/**
	 * Set data
	 *
	 * @return
	 */
	public function set_year_data() {
		
		//Set data
		$today  = gmdate( 'Y-m-d' );
		$year   = strtotime( $today . ' -1 year');
		global $wpdb;
		//Set data
		if ( false != $this->start_date && false != $this->end_date ) {

			if ( true === $this->exclude ) {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT 
						SUM(pcs) as qty, 
						COUNT(ID) as count, 
						SUM(order_subtotal) as revenue, 
						SUM(cogs) AS cogs, 
						SUM(order_shipping_subtotal) AS shipping_subtotal, 
						SUM(order_shipping_cost) AS shipping, 
						SUM(order_payment_cost) AS payment, 
						SUM(order_fees_subtotal) AS fees
						FROM %i  WHERE order_date BETWEEN %s AND %s AND order_status NOT IN (%s)",
						array(
							$this->wpdb->prefix . 'profitblue_orders',
							$year,
							time(),
							"'".$this->statuses."'"
						)
					)
				);			
			} else {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT 
						SUM(pcs) as qty, 
						COUNT(ID) as count, 
						SUM(order_subtotal) as revenue, 
						SUM(cogs) AS cogs, 
						SUM(order_shipping_subtotal) AS shipping_subtotal, 
						SUM(order_shipping_cost) AS shipping, 
						SUM(order_payment_cost) AS payment, 
						SUM(order_fees_subtotal) AS fees
						FROM %i  WHERE order_date BETWEEN %s AND %s",
						array(
							$this->wpdb->prefix . 'profitblue_orders',
							$year,
							time()
						)
					)
				);
			}

		} else {
			if ( true === $this->exclude ) {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT 
						SUM(pcs) as qty, 
						COUNT(ID) as count, 
						SUM(order_subtotal) as revenue, 
						SUM(cogs) AS cogs, 
						SUM(order_shipping_subtotal) AS shipping_subtotal, 
						SUM(order_shipping_cost) AS shipping, 
						SUM(order_payment_cost) AS payment, 
						SUM(order_fees_subtotal) AS fees
						FROM %i  WHERE order_status NOT IN (%s)",
						array(
							$this->wpdb->prefix . 'profitblue_orders',
							"'".$this->statuses."'"							
						)
					)
				);			
			} else {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT 
						SUM(pcs) as qty, 
						COUNT(ID) as count, 
						SUM(order_subtotal) as revenue, 
						SUM(cogs) AS cogs, 
						SUM(order_shipping_subtotal) AS shipping_subtotal, 
						SUM(order_shipping_cost) AS shipping, 
						SUM(order_payment_cost) AS payment, 
						SUM(order_fees_subtotal) AS fees
						FROM %i",
						array(
							$this->wpdb->prefix . 'profitblue_orders',
						)
					)
				);
			}
		}
		
		if ( !empty( $result ) ) {
			$this->year_orders_number_of_products 	= $result[0]->qty;
			$this->year_orders_count 				= $result[0]->count;
			$this->year_revenue						= $result[0]->revenue;
			$this->year_cogs 						= $result[0]->cogs;
			$this->year_shipping_subtotal			= $result[0]->shipping_subtotal;
			$this->year_shipping					= $result[0]->shipping;
			$this->year_payment_fee 				= $result[0]->payment;
			$this->year_fees 						= $result[0]->fees;
		} else {
			$this->year_orders_number_of_products 	= 0;
			$this->year_orders_count 				= 0;
			$this->year_revenue						= 0;
			$this->year_cogs 						= 0;
			$this->year_shipping 					= 0;
			$this->year_shipping_subtotal			= 0;
			$this->year_payment_fee 				= 0;
			$this->year_fees 						= 0;
		}

	}
	
	/**
	 * Get orders numbers of products
	 *
	 * @return array/false
	 */
	public function orders_numbers_of_products() {

		return $this->orders_number_of_products;

	}

	/**
	 * Get average orders
	 *
	 * @return float
	 */
	public function get_average_orders() {

		$orders = round( $this->year_orders_count / 365, 1 );

		return $orders;

	}

	/**
	 * Set revenue
	 *
	 * @return void
	 */
	public function get_revenue() {		

		return $this->revenue;
		
	}

	/**
	 * Set year revenue
	 *
	 * @return float
	 */
	public function get_year_revenue() {		

		return round( $this->year_revenue / 365, 1 );

	}
	
	/**
	 * Set cogs
	 *
	 * @return void
	 */
	public function get_cogs() {
		
		return $this->cogs;

	}

	/**
	 * Set cogs
	 *
	 * @return void
	 */
	public function get_shipping() {
		
		return $this->shipping;

	}

	/**
	 * Set cogs
	 *
	 * @return void
	 */
	public function get_fees() {
		
		return $this->fees;

	}

	/**
	 * Set cogs
	 *
	 * @return float
	 */
	public function get_year_cogs() {
		
		return round( $this->year_cogs / 365, 1 );

	}

	/**
	 * Set margin
	 *
	 * @return void
	 */
	public function set_margin() {
		
		$margin = $this->revenue - $this->cogs;
		$this->margin = $margin;

	}

	/**
	 * get margin
	 *
	 * @return void
	 */
	public function get_margin() {
		
		return $this->margin;

	}

	/**
	 * Set margin
	 *
	 * @return void
	 */
	public function set_year_margin() {
	
		$margin = $this->year_revenue - $this->year_cogs;
		$this->year_margin =  round( $margin / 365, 1 );

	}

	/**
	 * Get margin
	 *
	 * @return void
	 */
	public function get_year_margin() {
		
		return $this->year_margin;

	}

	/**
	 * Get fixed
	 *
	 * @return void
	 */
	public function get_fixed() {
		
		return $this->fixed;

	}

	/**
	 * Get income
	 *
	 * @return void
	 */
	public function get_income() {
		
		return $this->income;

	}

	/**
	 * Get variable
	 *
	 * @return void
	 */
	public function get_variable() {
		
		return $this->variable;

	}

	/**
	 * Get taxes
	 *
	 * @return void
	 */
	public function get_taxes() {
		
		return $this->total_tax;

	}

	/**
	 * Set margin
	 *
	 * @return void
	 */
	public function set_net_profit() {

		//Income
		$revenue 	= round( $this->revenue, 0 );
		$cogs 		= round( $this->cogs, 0 );
		$fixed 		= round( $this->fixed, 2 );
		$variable 	= round( $this->variable, 2 );
		$shipping 	= round( $this->get_shipping_income(), 2 );
		$payment 	= round( $this->get_payment_income(), 2 );
		$income 	= round( $this->income, 2 );
		$ebt 		= round( ( $revenue - ( $cogs + $fixed + $variable + $shipping + $payment ) ) + $income, 2 );
		$total_tax	= ( round( ( $ebt / 100 ) * $this->taxes, 0 ) );
		$this->total_tax = $total_tax;
		$net_profit = round( $ebt - $total_tax, 0 );

		$this->net_profit = $net_profit;
	
	}

	/**
	 * Get margin
	 *
	 * @return void
	 */
	public function get_net_profit() {
		
		return $this->net_profit;

	}

	/**
	 * Set margin
	 *
	 * @return void
	 */
	public function set_year_net_profit() {
		
		$net_profit = round( ( $this->year_revenue - ( $this->year_cogs + $this->year_fixed + $this->year_variable ) ) / 365, wc_get_price_decimals() );		
		$this->year_net_profit = $net_profit;
		

	}

	/**
	 * Get margin
	 *
	 * @return void
	 */
	public function get_year_net_profit() {
		
		return $this->year_net_profit;
		

	}

	/**
	 * Get best sellers
	 *
	 * @return array
	 */
	public function get_bestsellers() {
		
		global $wpdb;
		if ( false != $this->start_date && false != $this->end_date ) {
			$start_date = strtotime( $this->start_date . ' 00:00:00' );
			$end_date = strtotime( $this->end_date . ' 23:59:59' );		
			$transient_name = $this->get_transient_name( 'profitblue_bestsellers', $start_date, $end_date );
		} else {
			$transient_name = $this->get_transient_name( 'profitblue_bestsellers' );
		}

		$result = $this->get_cached_data( $transient_name );
		
		if ( !empty( $result ) ) {

			return $result;

		} else {

			if ( false != $this->start_date && false != $this->end_date ) {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT order_items.product_id, SUM(order_items.item_qty) as qty, SUM(order_items.profit) as profit, SUM(order_items.item_cogs) as cogs, SUM(order_items.item_total) as total
						FROM %i AS order_items
						JOIN %i AS orders ON orders.order_id = order_items.order_id
						WHERE orders.order_date BETWEEN %s AND %s AND order_items.product_id != '0' 
						GROUP BY order_items.product_id
						ORDER BY qty DESC LIMIT 8",
						array(
							$wpdb->prefix . 'profitblue_order_items',
							$wpdb->prefix . 'profitblue_orders',
							strtotime( $this->start_date . ' 00:00:00' ),
							strtotime( $this->end_date . ' 23:59:59' )
						)
					)
				);
			} else {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT order_items.product_id, SUM(order_items.item_qty) as qty, SUM(order_items.profit) as profit, SUM(order_items.item_cogs) as cogs, SUM(order_items.item_total) as total
						FROM %i AS order_items
						JOIN %i AS orders ON orders.order_id = order_items.order_id
						WHERE AND order_items.product_id != '0' 
						GROUP BY order_items.product_id
						ORDER BY qty DESC LIMIT 8",
						array(
							$wpdb->prefix . 'profitblue_order_items',
							$wpdb->prefix . 'profitblue_orders'
						)
					)
				);
			}

			set_transient( $transient_name , $result, 7 * HOUR_IN_SECONDS);
			
			return $result;

		}

	}

	/**
	 * Get most profitable
	 *
	 * @return array
	 */
	public function get_most_profitable() {	

		global $wpdb;
		if ( false != $this->start_date && false != $this->end_date ) {
			$start_date = strtotime( $this->start_date . ' 00:00:00' );
			$end_date = strtotime( $this->end_date . ' 23:59:59' );			
			$transient_name = $this->get_transient_name( 'profitblue_most_profitable', $start_date, $end_date );
		} else {
			$transient_name = $this->get_transient_name( 'profitblue_most_profitable' );
		}

		$result = $this->get_cached_data( $transient_name );
		
		if ( !empty( $result ) ) {

			return $result;

		} else {

			if ( false != $this->start_date && false != $this->end_date ) {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT order_items.product_id, SUM(order_items.item_qty) as qty, SUM(order_items.profit) as profit, SUM(order_items.item_cogs) as cogs, SUM(order_items.item_total) as total
						FROM %i AS order_items
						JOIN %i AS orders ON orders.order_id = order_items.order_id
						WHERE orders.order_date BETWEEN %s AND %s AND order_items.product_id != '0' 
						GROUP BY order_items.product_id
						ORDER BY profit DESC LIMIT 8",
						array(
							$wpdb->prefix . 'profitblue_order_items',
							$wpdb->prefix . 'profitblue_orders',
							strtotime( $this->start_date . ' 00:00:00' ),
							strtotime( $this->end_date . ' 23:59:59' )
						)
					)
				);
			} else {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT order_items.product_id, SUM(order_items.item_qty) as qty, SUM(order_items.profit) as profit, SUM(order_items.item_cogs) as cogs, SUM(order_items.item_total) as total
						FROM %i AS order_items
						JOIN %i AS orders ON orders.order_id = order_items.order_id
						WHERE AND order_items.product_id != '0' 
						GROUP BY order_items.product_id
						ORDER BY profit DESC LIMIT 8",
						array(
							$wpdb->prefix . 'profitblue_order_items',
							$wpdb->prefix . 'profitblue_orders'
						)
					)
				);
			}

			set_transient( $transient_name , $result, 7 * HOUR_IN_SECONDS);
			
			return $result;

		}

	}

	/**
	 * Get least profitable
	 *
	 * @return array
	 */
	public function get_least_profitable() {	

		global $wpdb;
		if ( false != $this->start_date && false != $this->end_date ) {
			$start_date = strtotime( $this->start_date . ' 00:00:00' );
			$end_date = strtotime( $this->end_date . ' 23:59:59' );
			$transient_name = $this->get_transient_name( 'profitblue_least_profitable', $start_date, $end_date );
		} else {
			$transient_name = $this->get_transient_name( 'profitblue_least_profitable' );
		}

		$result = $this->get_cached_data( $transient_name );
		
		if ( !empty( $result ) ) {

			return $result;

		} else {

			if ( false != $this->start_date && false != $this->end_date ) {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT order_items.product_id, SUM(order_items.item_qty) as qty, SUM(order_items.profit) as profit, SUM(order_items.item_cogs) as cogs, SUM(order_items.item_total) as total
						FROM %i AS order_items
						JOIN %i AS orders ON orders.order_id = order_items.order_id
						WHERE orders.order_date BETWEEN %s AND %s AND order_items.product_id != '0' 
						GROUP BY order_items.product_id
						ORDER BY profit ASC LIMIT 8",
						array(
							$wpdb->prefix . 'profitblue_order_items',
							$wpdb->prefix . 'profitblue_orders',
							strtotime( $this->start_date . ' 00:00:00' ),
							strtotime( $this->end_date . ' 23:59:59' )
						)
					)
				);
			} else {
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT order_items.product_id, SUM(order_items.item_qty) as qty, SUM(order_items.profit) as profit, SUM(order_items.item_cogs) as cogs, SUM(order_items.item_total) as total
						FROM %i AS order_items
						JOIN %i AS orders ON orders.order_id = order_items.order_id
						WHERE AND order_items.product_id != '0' 
						GROUP BY order_items.product_id
						ORDER BY profit ASC LIMIT 8",
						array(
							$wpdb->prefix . 'profitblue_order_items',
							$wpdb->prefix . 'profitblue_orders'
						)
					)
				);
			}

		
			set_transient( $transient_name , $result, 7 * HOUR_IN_SECONDS);
			
			return $result;

		}

	}

	/**
	 * Get cached result
	 *
	 * @return float
	 */
	public function get_cached_data( $transient_name ) {
		
		$cached_data = get_transient( $transient_name );

    	if ( false === $cached_data ) {

			return false;

		} else {

			return $cached_data;

		}

	}

	/**
	 * Get cached result
	 *
	 * @return float
	 */
	public function get_transient_name( $type = 'profitblue_bestsellers', $start_date = null, $end_date = null ) {		

		$transient_name_array = array( $type );
		if ( null !== $start_date ) {
			$transient_name_array[] = $start_date;
		}
		if ( null !== $end_date ) {
			$transient_name_array[] = $end_date;
		}

		$transient_name = implode( '_', $transient_name_array );

		return $transient_name;

	}

	/**
	 * Get orders count
	 *
	 * @return float
	 */
	public function get_orders_count() {		

		return $this->orders_count;

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

		if ( false != $this->start_date && false != $this->end_date ) {

			$args['date_query'] = array(
				'after' 	=> $this->start_date,
				'before' 	=> $this->end_date,
				'inclusive' => true
			);			
		}		
		

		$args['posts_per_page'] = 3;
		$orders = new \WP_Query( $args );
		
		if ( !empty( $orders ) ) {
			return $orders;
		} else {
			return false;
		}

	}

	/**
	 * Get Custom cost
	 *
	 * @return array|false
	 */
	public function get_custom_cost() {

		global $wpdb;
		$args = array();
		$year = gmdate( 'Y' );
		if ( !empty( $this->start_date ) ) {
			$start_date = $this->start_date;
		} else {
			$this->start_date = $year . '-01-01';
			$start_date = $year . '-01-01';
		}
		if ( !empty( $this->end_date ) ) {
			$end_date = $this->end_date;
		} else {
			$end_date = $year . '-12-31';
			$this->end_date = $year . '-12-31';
		}
		$args[] = $start_date;
		$args[] = $end_date;
		$args[] = $start_date;
		$args[] = $end_date;
		$args[] = $start_date;
		$args[] = $end_date;

		$result = $wpdb->get_results(
			$wpdb->prepare( 
				"SELECT * FROM %i  
				WHERE (date_start BETWEEN %s AND %s)
				OR (date_end BETWEEN %s AND %s)
				OR (date_start <= %s AND date_end >= %s) ",
				array(
					$wpdb->prefix . 'profitblue_ccai',
					$start_date,
					$end_date,
					$start_date,
					$end_date,
					$start_date,
					$end_date
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
	 * Set analysis
	 *
	 * @return void
	 */
	public function set_analysis() {

		global $wpdb;
			$OverviewCcaiData = new OverviewCcaiData( $this->start_date, $this->end_date );
			$this->ccai = $OverviewCcaiData->get_data();
			
			$variable = 0;
			$fixed = 0;
			$income = 0;
			$taxes = 0;

			/**
			 * Variable type calculate
			 * 
			 */
			if ( !empty( $this->ccai['variable'] ) ) {
				foreach( $this->ccai['variable'] as $label => $value ) {
					$variable += $value;
				}
			}
			if ( !empty( $this->ccai['fixed'] ) ) {
				foreach( $this->ccai['fixed'] as $label => $value ) {
					$fixed += $value;
				}
			}
			if ( !empty( $this->ccai['income'] ) ) {
				foreach( $this->ccai['income'] as $label => $value ) {
					$income += $value;
				}
			}
			
			$this->variable = $variable;
			$this->fixed = $fixed;
			$this->income = $income;
			$year_parts = explode( '-', $this->start_date );
			$year = $year_parts[0];
			$args = array();
			if ( false != $this->start_date ) {
				$result = $wpdb->get_results(
					$wpdb->prepare( 
						"SELECT * FROM %i WHERE year=%s",
						array(
							$wpdb->prefix . 'profitblue_shop_setting',
							$year
						)
					)
				);
			} else {
				$result = $wpdb->get_results(
					$wpdb->prepare( 
						"SELECT * FROM %i",
						array(
							$wpdb->prefix . 'profitblue_shop_setting'
						)
					)
				);
			}
			if ( !empty( $result ) ) {
				$this->taxes = $result[0]->tax_income;
			} else {
				$this->taxes = 0;
			}

	}


	
	/**
	 * Set year analysis
	 *
	 * @return void
	 */
	public function set_year_analysis() {

		global $wpdb;
		if ( false != $this->start_date && false != $this->end_date ) {
			$today  = gmdate( 'Y-m-d' );
			$year   = strtotime( $today . ' -1 year');
			$result = $wpdb->get_results(
				$wpdb->prepare( 
					"SELECT * FROM %i WHERE date_start >=%s AND date_end <= %s",
					array(
						$wpdb->prefix . 'profitblue_ccai',
						gmdate( 'Y-m-d', $year ),
						$today
					)
				), ARRAY_A
			);
		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare( 
					"SELECT * FROM %i",
					array(
						$wpdb->prefix . 'profitblue_ccai'
					)
				), ARRAY_A
			);
		}
		if ( !empty( $result ) ) {
		
			$variable = 0;
			$fixed = 0;
			$taxes = 0;

			/**
			 * Variable type calculate
			 * 
			 */
			foreach( $result as $item ) {

				if ( 'variable' == $item['type'] ) {
					$variable += $item['amount'];				
				}
						
			}

			
			foreach( $result as $item ) {
				
				if ( 'fixed' == $item['type'] ) {
					$fixed += $item['amount'];				 
				}

			}

			$this->year_variable = $variable * $this->orders_count;
			$this->year_fixed = $fixed;
			$year_parts = explode( '-', $this->start_date );
			$year = $year_parts[0];
			if ( false != $this->start_date ) {
				$result = $wpdb->get_results(
					$wpdb->prepare( 
						"SELECT * FROM %i WHERE year=%s",
						array(
							$wpdb->prefix . 'profitblue_shop_setting',
							$year
						)
					)
				);
			} else {
				$result = $wpdb->get_results(
					$wpdb->prepare( 
						"SELECT * FROM %i",
						array(
							$wpdb->prefix . 'profitblue_shop_setting'
						)
					)
				);
			}
			if ( !empty( $result ) ) {
				$this->year_taxes = $result[0]->tax_income;
			} else {
				$this->year_taxes = 0;
			}

		}

	}

	/**
	 * get_days_in_months
	 *
	 * @param  string $start_date_string
	 * @param  string $end_date_string
	 * @return float
	 */
	public function get_days_in_months( $start_date_string, $end_date_string ) {

		// Create DateTime objects from the date strings
		$startDate = new \DateTime( $start_date_string );
		$endDate = new \DateTime( $end_date_string );

		// Initialize an array to store the number of days for each month
		$daysInMonths = [];

		// Calculate the number of days for the first and last months
		$firstMonthDays = (int) $startDate->format('t') - $startDate->format('j') + 1;
		$lastMonthDays = $endDate->format('j');

		// If the interval is within the same month
		if ($startDate->format('Y-m') === $endDate->format('Y-m')) {
			$daysInMonths[$startDate->format('n')] = $endDate->diff($startDate)->days + 1;
		} else {
			// Add days for the first month
			$daysInMonths[$startDate->format('n')] = $firstMonthDays;

			// Iterate through each month between the start and end
			$currentMonth = clone $startDate;
			$currentMonth->modify('first day of next month');
			while ($currentMonth <= $endDate) {
				$yearMonthKey = $currentMonth->format('n');
				$daysInMonth = (int) $currentMonth->format('t');
				$daysInMonths[$yearMonthKey] = $daysInMonth;
				$currentMonth->modify('first day of next month');
			}

			// Add days for the last month
			$daysInMonths[$endDate->format('n')] = $lastMonthDays;
		}

		return $daysInMonths;

	}

	/**
	 * Get order shipping income
	 *
	 * @return float
	 */
	public function get_shipping_income() {

		global $wpdb;
		//Set data
		$where = "";
		if ( false != $this->start_date && false != $this->end_date ) {
			$result = $wpdb->get_results(
				$wpdb->prepare( 
					"SELECT * FROM %i WHERE order_date BETWEEN %s AND %s",
					array(
						$wpdb->prefix . 'profitblue_orders',
						strtotime( $this->start_date . ' 00:00:00' ),
						strtotime($this->end_date . '23:59:59' )
					)
				)
			);
		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare( 
					"SELECT * FROM %i",
					array(
						$wpdb->prefix . 'profitblue_orders'
					)
				)
			);
		}
		$shipping_cost_total = 0;
		if ( !empty( $result ) ) {
			foreach( $result as $order ) {

				$shipping_income = $this->ordersControler->get_order_shipping_income( $order );
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
	public function get_payment_income() {

		global $wpdb;
		//Set data
		$where = "";
		if ( false != $this->start_date && false != $this->end_date ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE order_date BETWEEN %s AND %s",
					array(
						$wpdb->prefix . 'profitblue_orders',
						strtotime( $this->start_date . '00:00:00' ),
						strtotime( $this->end_date . '23:59:59' )
					)
				)
			);
		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i",
					array(
						$wpdb->prefix . 'profitblue_orders'
					)
				)
			);
		}
		$payment_cost_total = 0;
		if ( !empty( $result ) ) {
			foreach( $result as $order_result ) {

				$value = $this->ordersControler->get_order_payment_income( $order_result );
				$payment_cost_total += $value;
				
			}
		}

		return $payment_cost_total;

	}

	/**
	 * Get order payment income
	 *
	 * @return float
	 */
	public function set_payment_income( $order ) {
		
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
			if ( $payment->payment_period_id == $payment_period_id && $payment->payment == $order->get_payment_method() ) {

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
	 * Get order shipping income
	 *
	 * @return array
	 */
	public function get_order_shipping_income( $order ) {
		$date = gmdate( 'Y-m-d', $order->order_date );
		$year = gmdate( 'Y', $order->order_date );

		$shipping_cost_id = null;

		$shipping_cost_data_array 	= $this->get_shipping_cost_data( $date );
		$shipping_cost_id 			= $shipping_cost_data_array['shipping_cost_id'];
		$shipping_cost_id_data 		= $shipping_cost_data_array['shipping_cost_id_data'];

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
					$price = $order->order_shipping_subtotal;
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
			$shipping_cost = (float)$shipping_prices->shipping_price;
		} elseif ( 'no-costs' == $shipping_cost_id_data->type ) {
			$shipping_cost = 0;
		}

		$array = array(
			'shipping_cost' => $shipping_cost
		);
		if ( !empty( $shipping_cost_data_array['shipping_cost_id_data']->cod_id ) ) {
			$array['cod_id'] = $shipping_cost_data_array['shipping_cost_id_data']->cod_id;
		}
		if ( !empty( $shipping_prices->shipping_cod ) ) {
			$array['cod_price'] = $shipping_prices->shipping_cod;
		}
		return $array;

	}

	/**
	 * Get shipping cost id and shipping cost data for selected period
	 * 
	 * @return array
	 */
	public function get_shipping_cost_data ( $date ) {

		$year = gmdate( 'Y', strtotime( $date ) );

		$shipping_cost_id = null;
		$shipping_cost_id_data = null;
		
		$use_this = get_option( 'profitblue-use-this-shipping-period' );
		if ( !empty( $use_this ) ) {
			foreach( $this->shipping_cost as $shipping_cost ) {
				if ( $shipping_cost->period_type == 'whole-period' ) {
					$shipping_cost_id = $shipping_cost->ID;
					$shipping_cost_id_data = $shipping_cost;
					break;
				}
			}
		} else {

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

		}

		return array( 'shipping_cost_id' => $shipping_cost_id, 'shipping_cost_id_data' => $shipping_cost_id_data );

	}

	/**
	 * Set shipping data
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
	 * Set shop setting data
	 *
	 * @return void
	 */
	public function set_shop_setting_data() {

		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i",
				array(
					$wpdb->prefix . 'profitblue_shop_setting'
				)
			)
		);
		if ( !empty( $result ) ) {
			$this->shop_settings = $result;
		}
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i",
				array(
					$wpdb->prefix . 'profitblue_shop_setting_periods'
				)
			)
		);
		if ( !empty( $result ) ) {
			$this->shop_settings_periods = $result;
		}

		if ( !empty( $this->shop_settings ) ) {
			foreach( $this->shop_settings as $settings_data ) {
				if ( $settings_data->year == 'whole-period' ) {
					$shop_setting_id = $settings_data->ID;
					$shop_setting_id_data = $settings_data;
					break;
				}
			}
		}
		
	}

	/**
	 * Set exclude
	 *
	 * @return void
	 */
	public function set_exclude() {

		global $wpdb;

		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE year = 'whole-period'",
				array(
					$wpdb->prefix . 'profitblue_shop_setting'
				)
			)
		);
		if ( !empty( $result ) ) {
			if ( 'yes' == $result[0]->exclude ) {
				$this->exclude = true;
			}
		}	
		
	}	

}
