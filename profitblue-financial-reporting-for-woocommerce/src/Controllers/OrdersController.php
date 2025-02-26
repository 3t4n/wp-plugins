<?php

namespace Profitblue\Controllers;

use ProfitBlue\Controllers\ProductsPeriodsController;
use ProfitBlue\Controllers\ProductsController;
use ProfitBlue\Controllers\OrdersDaysData;
use ProfitBlue\Controllers\OrdersWeeksData;
use ProfitBlue\Controllers\OrdersMonthsData;
use ProfitBlue\Controllers\NetprofitDaysData;
use ProfitBlue\Controllers\NetprofitWeeksData;
use ProfitBlue\Controllers\NetprofitMonthsData;
use ProfitBlue\Models\ShopSettingCostsModel;
use ProfitBlue\Models\OrderShippingModel;

/**
 * OrdersController
 */
class OrdersController {
	
	/**
	 * period
	 *
	 * @var string
	 */
	private $period = 'whole-period';
	
	/**
	 * period_id
	 *
	 * @var int
	 */
	private $period_id = null;
	
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
	 * limit
	 *
	 * @var int
	 */
	private $limit = 20;
		
	/**
	 * offset
	 *
	 * @var int
	 */
	private $offset = null;
		
	/**
	 * wpdb
	 *
	 * @var object
	 */
	private $wpdb = null;
	
	/**
	 * count
	 *
	 * @var int
	 */
	public $count = null;
	
	/**
	 * shipping_cost
	 *
	 * @var float
	 */
	public $shipping_cost = false;
		
	/**
	 * shipping_cost_data
	 *
	 * @var array
	 */
	public $shipping_cost_data = false;
	
	/**
	 * payments
	 *
	 * @var array
	 */
	public $payments = false;
		
	/**
	 * payment_periods
	 *
	 * @var array
	 */
	public $payment_periods = false;
	
	/**
	 * shop_settings
	 *
	 * @var array
	 */
	public $shop_settings = false;
		
	/**
	 * shop_settings_periods
	 *
	 * @var array
	 */
	public $shop_settings_periods = false;
	
	/**
	 * exclude
	 *
	 * @var bool
	 */
	public $exclude = false;
		
	/**
	 * statuses
	 *
	 * @var array
	 */
	public $statuses = null;
	
	/**
	 * all_data
	 *
	 * @var array
	 */
	public $all_data = null;
			
	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {

		global $wpdb;
		$this->wpdb = $wpdb;
		$this->parse_args();
		$this->set_shipping_data();
		$this->set_payment_data();
		$this->set_shop_setting_data();

		$this->set_exclude();

		global $wpdb;
   		$escaped = array();
		$statuses = apply_filters( 'profitblue_order_statuses', array( 'processing', 'pending', 'on-hold' ) );
    	foreach($statuses as $k => $v){
        	if(is_numeric($v)) {
            	$escaped[] = $wpdb->prepare('%d', $v);
			} else {
            	$escaped[] = $wpdb->prepare('%s', $v);
			}
    	}
		$this->statuses = implode(',', $escaped);

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

	/**
	 * Set limit
	 *
	 * @return void
	 */
	public function set_limit( $limit ) {
	
		$this->limit = $limit;

	}

	/**
	 * Parse args from url
	 *
	 * @return void
	 */
	public function parse_args() {

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['offset'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$this->offset = isset( $_GET['offset'] ) ? wp_unslash( sanitize_text_field( $_GET['offset'] ) ) : '';
		}

	}

	/**
	 * Get orders
	 *
	 * @return array|false
	 */
	public function get_orders( $start_date = false, $end_date = false ) {

		global $wpdb;
	
		$search = '';
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['order-search'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$search = isset( $_GET['order-search'] ) ? wp_unslash( sanitize_text_field( $_GET['order-search'] ) ) : '';
		}
	
		$args = [];
		$where = '';
	
		if ( false !== $start_date && false !== $end_date ) {
			$where .= " WHERE order_date >= %s AND order_date <= %s";
			$args[] = strtotime( $start_date . ' 00:00:00' );
			$args[] = strtotime( $end_date . ' 23:59:59' );
	
			if ( true === $this->exclude ) {
				$where .= " AND order_status NOT IN (" . implode(",", array_map('esc_sql', $this->statuses)) . ")";
			}
		} else {
			if ( true === $this->exclude ) {
				$where .= " WHERE order_status NOT IN (" . implode(",", array_map('esc_sql', $this->statuses)) . ")";
			}
		}
	
		if ( !empty( $search ) ) {
			$where .= empty($where) ? " WHERE " : " AND ";
			$where .= "(customer_name LIKE %s OR order_id LIKE %s)";
			$args[] = '%' . $wpdb->esc_like( $search ) . '%';
			$args[] = '%' . $wpdb->esc_like( $search ) . '%';
		}
	
		$offset = '';
		if ( null !== $this->offset ) {
			$offset_value = ( ( $this->offset - 1 ) * $this->limit );
			$offset = " OFFSET " . intval( $offset_value );
		}
	
		$order_by = 'order_date';
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['sortby'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$sortby = isset( $_GET['sortby'] ) ? wp_unslash( sanitize_text_field( $_GET['sortby'] ) ) : '';
			if ( 'date' === $sortby ) {
				$order_by = 'order_date';
			} elseif ( 'pcs' === $sortby ) {
				$order_by = 'pcs';
			} elseif ( 'revenue' === $sortby ) {
				$order_by = 'order_subtotal';
			}
		}
	
		$order_sort = 'DESC';
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['sort'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$order_sortby = isset( $_GET['sort'] ) ? wp_unslash( sanitize_text_field( $_GET['sort'] ) ) : '';
			if ( 'asc' === $order_sortby ) {
				$order_sort = 'ASC';
			}
		}
	
		// Get order count
		$sql_count = "SELECT COUNT(*) as count FROM {$wpdb->prefix}profitblue_orders $where";
		$sql_count .= " ORDER BY " . esc_sql( $order_by ) . " " . esc_sql( $order_sort );
		$orders_count = $wpdb->get_results( $wpdb->prepare( $sql_count, $args ) );
		$this->count = $orders_count[0]->count;
	
		// Get actual orders
		$sql_orders = "SELECT * FROM {$wpdb->prefix}profitblue_orders $where";
		$sql_orders .= " ORDER BY " . esc_sql( $order_by ) . " " . esc_sql( $order_sort );
		$sql_orders .= " LIMIT " . intval( $this->limit ) . $offset;
		$orders = $wpdb->get_results( $wpdb->prepare( $sql_orders, $args ) );
	
		if ( !empty( $orders ) ) {
			return $orders;
		} else {
			return false;
		}
	}
	

	/**
	 * Get products
	 *
	 * @return array|false
	 */
	public function get_ajax_orders( $offset = false, $url_string = false, $start_date = false, $end_date = false ) {

		global $wpdb;
		$args = array();
	
		$where = '';
		if ( false !== $start_date && false !== $end_date ) {
			$where .= " WHERE order_date >= %s AND order_date <= %s";
			$args[] = strtotime( $start_date );
			$args[] = strtotime( $end_date );
	
			if ( true === $this->exclude ) {
				$where .= " AND order_status NOT IN (" . implode( ',', array_map( 'esc_sql', $this->statuses ) ) . ")"; 
			}
		} else {
			if ( true === $this->exclude ) {
				$where .= " WHERE order_status NOT IN (" . implode( ',', array_map( 'esc_sql', $this->statuses ) ) . ")"; 
			}
		}
	
		$order_by = 'order_date';
		$order_sort = 'DESC';
	
		if ( false !== $url_string ) {
			$arguments = explode( ';', $url_string );
	
			if ( is_array( $arguments ) ) {
				foreach ( $arguments as $argument ) {
					$parts = explode( ',', $argument );
	
					if ( 'sortby' === $parts[0] ) {
						if ( 'date' === $parts[1] ) {
							$order_by = 'order_date';
						} elseif ( 'pcs' === $parts[1] ) {						
							$order_by = 'pcs';
						} elseif ( 'revenue' === $parts[1] ) {			
							$order_by = 'order_subtotal';
						}
					}
					if ( 'sort' === $parts[0] ) {
						$order_sort = strtoupper( sanitize_text_field( $parts[1] ) );
					}
				}
			}			
		}
	
		if ( null !== $offset ) {
			$offset_result = intval( $offset ) * intval( $this->limit );
			$offset_string = " OFFSET " . $offset_result;
		} else {
			$offset_string = "";
		}
	
		// Get the orders
		$sql = "SELECT * FROM {$wpdb->prefix}profitblue_orders $where ORDER BY " . esc_sql( $order_by ) . " " . esc_sql( $order_sort ) . " LIMIT " . intval( $this->limit ) . $offset_string;
		$orders = $wpdb->get_results( $wpdb->prepare( $sql, $args ) );
	
		// Get the order count
		$sql_count = "SELECT COUNT(*) as count FROM {$wpdb->prefix}profitblue_orders $where ORDER BY " . esc_sql( $order_by ) . " " . esc_sql( $order_sort );
		$orders_count = $wpdb->get_results( $wpdb->prepare( $sql_count, $args ) );
	
		$this->count = $orders_count[0]->count;
	
		if ( !empty( $orders ) ) {
			return $orders;
		} else {
			return false;
		}
	}	

	/**
	 * Get Orders
	 *
	 * @return array|false
	 */
	public function get_orders_main_reviews() {

		$args = array(
			'post_type' => 'shop_order',
			'post_status' => array( 'wc-on-hold', 'wc-processing', 'wc-completed' )
		);

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['period'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$period = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
			$parts = explode( ' - ', $period );
			
			$args['date_query'] = array(
				array(
					'column' => 'post_date_gmt',
					'before' => $parts[1] . ' 23:59:59',
				),
				array(
					'column' => 'post_date_gmt',
					'after'  => $parts[0] . ' 00:00:00',
				),
			);
		} else {
			$year = gmdate( 'Y' );
			$args['date_query'] = array(
				array(
					'column' => 'post_date_gmt',
					'before' => $year . '-12-31 23:59:59',
				),
				array(
					'column' => 'post_date_gmt',
					'after'  => $year . '-01-01 00:00:00',
				),
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
	 * Calculate order data
	 * 
	 * @return void
	 */
	public function calculate_order_data( $order_id ) {

		global $wpdb;

		$periodsController = new ProductsPeriodsController();

		$order_subtotal 		= 0;
		$order_tax 				= 0;
		$order_product_total 	= 0;
		$order_product_tax 		= 0;
		$order_shipping_total 	= 0;
		$order_shipping_tax 	= 0;
		$order_fees_total 		= 0;
		$order_fees_tax 		= 0;
		$order_cogs				= 0;
		$order_qty				= 0;
		$order_profit			= 0;

		//Get order
		$order = wc_get_order( $order_id );
		if ( empty( $order ) ) {
			$this->delete_order( $order_id );
			return;
		}
		//get order created
		$order_created = $order->get_date_created();
		$order_date = $order_created->date_i18n('Y-m-d');
		$order_year = $order_created->date_i18n('Y');
		$order_month = $order_created->date_i18n('m');	
		$current_month = gmdate( 'm' );
		if ( $current_month != $order_month ) {
			return;
		}
		//Save order into database
		
		$this->create_order( $order_id, $order );
		
		$order_period = $periodsController->get_order_period( $order_date );
		//Not custom period
		if ( false == $order_period ) {
			$this->period = 'year';
			$this->period_id = $order_year;
		} else {
			$this->period = 'custom';
			$this->period_id = $order_period;
		}

		/**
		 * Get whole shop period id
		 * we need this for product without cogs in period but with cogs in whole shope period
		 */
		$wholeshop_period = $periodsController->get_period( 'whole-period' );
		
		//Calculate per product
		$items = $order->get_items();
		foreach( $items as $item ) {

			$item_args = array(
				'order_id' 			=> $order_id,
				'order_item_id'		=> $item->get_id(),
				'item_type' 		=> $item->get_type(),
				'item_name' 		=> $item->get_name(),
				'item_qty' 			=> $item->get_quantity(),
				'item_tax_class' 	=> $item->get_tax_class(),
				'item_subtotal' 	=> $item->get_subtotal(),
				'item_subtotal_tax'	=> $item->get_subtotal_tax(),
				'item_total' 		=> $item->get_total(),
				'item_total_tax' 	=> $item->get_total_tax()
			);

			//Get Product id
			$product_id = $item->get_product_id();
			if ( !empty( $item->get_variation_id() ) ) {
				$product_id = $item->get_variation_id();
			}
			$item_args['product_id'] = $product_id;
			$ProductsController = new ProductsController();
			$ProductsController->set_product_id( $product_id );
			$product = $ProductsController->get_product();
			if ( !empty( $product ) ) {
				$sku = $product->sku;
			}
			if ( !empty( $sku ) ) {
				$item_args['sku'] = $sku;
			}

			//Get order item cogs
			$cogs = $this->get_order_item_cogs( $product_id, $order_date, $item, $this->period_id );
			if ( false == $cogs ) {
				$cogs = $this->get_order_item_cogs( $product_id, $order_date, $item, $wholeshop_period[0]->ID );
				if ( false == $cogs ) {
					$cogs = $item->get_subtotal();
				}
			}
			$item_args['item_cogs'] = $cogs;
			
			$item_profit = $item->get_subtotal() - $cogs;
			if ( 0 === $item_profit ) {
				$item_args['profit'] = '0';
			} else {
				$item_args['profit'] = $item_profit;
			}


			
			$this->create_order_item( $item_args, $item );

			$order_subtotal 		+= $item->get_total();
			$order_tax 				+= $item->get_total_tax();
			$order_product_total 	+= $item->get_total();
			$order_product_tax 		+= $item->get_total_tax();	
			$order_cogs				+= $cogs;
			$order_profit 			+= $item_profit;
			$order_qty				+= $item->get_quantity();

		}

		//Calculate per shipping
		$items = $order->get_items( 'shipping' );
		foreach( $items as $item ) {
			$item_args = array(
				'order_id' 			=> $order_id,
				'order_item_id'		=> $item->get_id(),
				'item_type' 		=> $item->get_type(),
				'item_name' 		=> $item->get_name(),
				'item_qty' 			=> $item->get_quantity(),
				'item_tax_class' 	=> $item->get_tax_class(),
				'item_subtotal' 	=> $item->get_total(),
				'item_subtotal_tax'	=> $item->get_total_tax(),
				'item_total' 		=> $item->get_total(),
				'item_total_tax' 	=> $item->get_total_tax()
			);

			$order_shipping_label = $item->get_method_title();
			$order_shipping_id = $item->get_method_id() . ':' . $item->get_instance_id();

			$this->create_order_item( $item_args, $item );
			
			$order_subtotal 		+= $item->get_total();
			$order_tax 				+= $item->get_total_tax();
			$order_shipping_total 	+= $item->get_total();
			$order_shipping_tax 	+= $item->get_total_tax();			
			
		}

		//Calculate per fee
		$items = $order->get_items( 'fee' );
		foreach( $items as $item ) {
			$item_args = array(
				'order_id' 			=> $order_id,
				'order_item_id'		=> $item->get_id(),
				'item_type' 		=> $item->get_type(),
				'item_name' 		=> $item->get_name(),
				'item_qty' 			=> $item->get_quantity(),
				'item_tax_class' 	=> $item->get_tax_class(),
				'item_subtotal' 	=> $item->get_total(),
				'item_subtotal_tax'	=> $item->get_total_tax(),
				'item_total' 		=> $item->get_total(),
				'item_total_tax' 	=> $item->get_total_tax()
			);
			
			$this->create_order_item( $item_args, $item );

			$order_subtotal 	+= $item->get_total();
			$order_tax 			+= $item->get_total_tax();
			$order_fees_total 	+= $item->get_total();
			$order_fees_tax 	+= $item->get_total_tax();

		}

		$order_data = array();
		//Get payment
		$order_data['order_payment_id'] 		= $order->get_payment_method();
		$order_data['order_payment_label'] 		= $order->get_payment_method_title();
		$order_payment_cost = $this->get_order_payment_cost( $order, $order_date, $order->get_payment_method(), $order_product_total );
		$order_data['order_payment_cost'] 		= $order_payment_cost;
		//Get shipping
		$order_data['order_shipping_label'] 	= $order_shipping_label;
		$order_data['order_shipping_id'] 		= $order_shipping_id;
		$order_shipping_cost 					= $this->get_order_shipping_cost( $order, $order_date, $order_shipping_id );
		$order_data['order_shipping_cost'] 		= $order_shipping_cost;
		//Get totals
		$order_data['order_subtotal'] 			= $order_subtotal;
		$order_data['order_tax'] 				= $order_tax;
		$order_data['order_products_subtotal'] 	= $order_product_total;
		$order_data['order_products_tax'] 		= $order_product_tax;
		$order_data['order_shipping_subtotal'] 	= $order_shipping_total;
		$order_data['order_shipping_tax'] 		= $order_shipping_tax;
		$order_data['order_fees_subtotal'] 		= $order_fees_total;
		$order_data['order_fees_tax'] 			= $order_fees_tax;
		$order_data['pcs'] 						= $order_qty;
		$order_data['cogs'] 					= $order_cogs;
		$margin = $order_product_total - ( $order_cogs + $order_data['order_shipping_cost'] + $order_data['order_payment_cost'] );
		$order_data['gross_margin']				= $margin;
		if ( 0 === $margin ) {
			$order_data['percent']				= 0;
		} else {
			$order_data['percent'] 				= ( $margin / $order_product_total ) * 100;
		}

		$order_created->date_i18n('U');
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE date_start >= %s AND date_end <= %s AND type='variable'",
				array(
					$wpdb->prefix . 'profitblue_ccai',
					$order_date,
					$order_date
				)
			)
		);
		$variable = 0;
		if ( !empty( $result ) ) {
			foreach( $result as $variable_item ) {
				if ( 'amount' == $variable_item->amount_type ) {
					$variable += $variable_item->amount;
				} else {
					$percent_variable = $order_subtotal * ( $variable_item->amount / 100 );
					$variable += $percent_variable;
				}
			}
		}
		$order_data['variable'] = $variable;

		//Calculate variable for order
		
		//Update order
		$this->update_order( $order_id, $order_data );
		
	}

	/**
	 * Get not caluclated order id
	 * 
	 * @return int|false
	 */
	public function get_not_saved_oder_id() {

		
		$current_month = gmdate( 'Y-m' );
		$current_monthdays = gmdate( 't' );
		$start_date = $current_month . '-01' . ' 00:00:00';
		$end_date = $current_month . '-' . $current_monthdays . ' 23:59:59';

		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT
				p.ID AS id,
				po.order_id
				FROM %i AS p
				LEFT JOIN %i AS po ON p.ID = po.order_id
				WHERE p.post_type='shop_order' 
				AND p.post_status IN ('wc-completed','wc-on-hold','wc-processing','wc-nova-objednavka') 
				AND post_date_gmt BETWEEN %s AND %s
				AND po.order_id IS NULL 
				LIMIT 1",
				array(
					$this->wpdb->prefix . 'posts',
					$this->wpdb->prefix . 'profitblue_orders',
					$start_date,
					$end_date
				)
			)
		);
		if ( !empty( $result ) ) {
			return $result[0]->id;
		} else {
			return false;
		}
		
	}

	/**
	 * Get not caluclated order id
	 * 
	 * @retrun array|false
	 */
	public function get_not_saved_order_id_batch() {

		global $wpdb;
		$current_month = gmdate( 'Y-m' );
		$current_monthdays = gmdate( 't' );
		$start_date = $current_month . '-01' . ' 00:00:00';
		$end_date = $current_month . '-' . $current_monthdays . ' 23:59:59';

		$order_statuses_array = array(
			'wc-completed',
			'wc-on-hold',
			'wc-processing',
			'wc-nova-objednavka'
		);
		$order_statuses = apply_filters('profitblue_missing_order_statuses', $order_statuses_array);
		$placeholders = implode("','", $order_statuses);
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT
        		p.ID AS id
      			FROM %i AS p
      			LEFT JOIN %i AS po ON p.ID = po.order_id
      			WHERE p.post_type = 'shop_order' AND p.post_status IN ('wc-completed','wc-on-hold','wc-processing','wc-nova-objednavka') 
				AND post_date_gmt BETWEEN %s AND %s
				AND po.order_id IS NULL LIMIT 10",
				array(
					$wpdb->prefix . 'posts',
					$wpdb->prefix . 'profitblue_orders',
					$start_date,
					$end_date,					
				)
			)
		);

		if ( !empty( $result ) ) {
			return $result;
		} else {
			return false;
		}
		
	}

	/**
	 * Get not caluclated order id
	 * 
	 * @retrun array|false
	 */
	public function get_not_exists_orders_ids() {

		global $wpdb;
		$current_month = gmdate( 'Y-m' );
		$current_monthdays = gmdate( 't' );
		$start_date = $current_month . '-01' . ' 00:00:00';
		$end_date = $current_month . '-' . $current_monthdays . ' 23:59:59';

		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT
        		po.order_id
    			FROM %i AS po
    			LEFT JOIN %i AS p ON po.order_id = p.ID
    			WHERE p.ID IS NULL
				AND post_date_gmt BETWEEN %s AND %s",
				array(
					$wpdb->prefix . 'profitblue_orders',
					$wpdb->prefix . 'posts',
					$start_date,
					$end_date				
				)
			)
		);
		if ( !empty( $result ) ) {
			return $result;
		} else {
			return false;
		}
		
	}


	/**
	 * Get not caluclated order id
	 * 
	 * @retrun int|false
	 */
	public function get_not_saved_oder_id_count() {

		global $wpdb;
		$current_month = gmdate( 'Y-m' );
		$current_monthdays = gmdate( 't' );
		$start_date = $current_month . '-01' . ' 00:00:00';
		$end_date = $current_month . '-' . $current_monthdays . ' 23:59:59';
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT
        		COUNT('*') AS count,
        		po.order_id
      			FROM %i AS p
      			LEFT JOIN %i AS po ON p.ID = po.order_id
      			WHERE p.post_type='shop_order' 
				AND p.post_status IN ('wc-completed','wc-on-hold','wc-processing')
				AND post_date_gmt BETWEEN %s AND %s 
				AND po.order_id IS NULL",
				array(
					$wpdb->prefix . 'posts',
					$wpdb->prefix . 'profitblue_orders',
					$start_date,
					$end_date	
				)
			)
		);	
		if ( !empty( $result ) ) {
			return $result[0]->count;
		} else {
			return false;
		}
		
	}

	/**
	 * Create order when not exist in profitblue_orders
	 * 
	 * @retrun void
	 */
	public function create_order( $order_id, $order ) {

		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE order_id=%d",
				array(
					$wpdb->prefix . 'profitblue_orders',
					$order_id
				)
			)
		);
		if ( empty( $result ) ) {

			$order_created = $order->get_date_created();	
			$data = array();
			$data['order_id'] 		= $order_id;
			$data['order_date'] 	= $order_created->date_i18n('U');
			$data['formated_date'] 	= $order_created->date_i18n('Y-m-d');
			$data['customer_name'] 	= $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();
			$data['order_status'] 	= $order->get_status();
			$data['country'] 		= $order->get_billing_country();
	
			$this->wpdb->insert( $this->wpdb->prefix . 'profitblue_orders', $data );

		} else {

			$order_created = $order->get_date_created();	
			$data = array();
			$data['order_id'] 		= $order_id;
			$data['order_date'] 	= $order_created->date_i18n('U');
			$data['formated_date'] 	= $order_created->date_i18n('Y-m-d');
			$data['customer_name'] 	= $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();
			$data['order_status'] 	= $order->get_status();
			$data['country'] 		= $order->get_billing_country();
	
			$this->wpdb->update( $this->wpdb->prefix . 'profitblue_orders', $data, array( 'ID' => $result[0]->ID ) );

		}
	
	}

	/**
	 * Create order when not exist in profitblue_orders
	 * 
	 * @return void
	 */
	public function update_order( $order_id, $data ) {

		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE order_id=%d",
				array(
					$wpdb->prefix . 'profitblue_orders',
					$order_id
				)
			)
		);
		if ( !empty( $result ) ) {

			$this->wpdb->update( $this->wpdb->prefix . 'profitblue_orders', $data, array( 'ID' => $result[0]->ID ) );	
			
		}
		
	}

	/**
	 * Create order item when not exist in profitblue_orders
	 * 
	 * @return void
	 */
	public function create_order_item( $data, $item ) {
		
		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE order_item_id=%d",
				array(
					$wpdb->prefix . 'profitblue_order_items',
					$item->get_id()
				)
			)
		);
		if ( empty( $result ) ) {

			$this->wpdb->insert( $this->wpdb->prefix . 'profitblue_order_items', $data );

		} else {

			$this->wpdb->update( $this->wpdb->prefix . 'profitblue_order_items', $data, array( 'order_item_id' => $item->get_id() ) );

		}
	
	}

	/**
	 * Get order items data
	 * 
	 * @retrun array|false
	 */
	public function get_order_items( $order_id ) {
		
		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE order_id=%d",
				array(
					$wpdb->prefix . 'profitblue_order_items',
					$order_id
				)
			)
		);
		if ( !empty( $result ) ) {

			return $result;

		} else {

			return false;

		}
	
	}

	/**
	 * Delete order
	 * Delete order and all items in Profitblue tables
	 * 
	 * @return void
	 */
	public function delete_order( $order_id ) {

		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE order_id=%d",
				array(
					$wpdb->prefix . 'profitblue_order_items',
					$order_id
				)
			)
		);
		if ( empty( $result ) ) {

			foreach( $result as $item )	{
				$wpdb->delete( $this->wpdb->prefix . 'profitblue_order_items', array( 'ID' => $item->ID	) );
			}

		}
		$this->wpdb->delete( $this->wpdb->prefix . 'profitblue_orders', array( 'order_id' => $order_id	) );
	
	}

	/**
	 * Get order data
	 * 
	 * @retrun array|false
	 */
	public function get_order_data( $order_id ) {

		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE order_id=%d",
				array(
					$wpdb->prefix . 'profitblue_orders',
					$order_id
				)
			)
		);
		if ( !empty( $result ) ) {
	
			return $result;

		} else {
			
			return false;

		}
	
	}

	/**
	 * Get order data
	 * 
	 * @return int
	 */
	public function get_saved_orders_count() {

		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT ID FROM %i",
				array(
					$wpdb->prefix . 'profitblue_orders'
				)
			)
		);
		if ( empty( $result ) ) {
	
			return 0;

		} else {
			
			return count( $result );

		}
	
	}

	/**
	 * Get order item cogs data 
	 * 
	 * @retrun array|false
	 */
	public function get_order_item_cogs( $product_id, $order_date, $item, $period_id ) {

		global $wpdb;
		$cogs_save = false;

		if ( 'custom' == $this->period ) {
			
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE product_id=%d AND period=%s",
					array(
						$wpdb->prefix . 'profitblue_cogs',
						$product_id,
						$period_id
					)
				)
			);
			if ( !empty( $result ) ) {
				$cogs = $item->get_quantity() * $result[0]->cogs;
				return $cogs;
			}

		} elseif ( 'year' == $this->period ) {

			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE product_id=%d AND year=%s",
					array(
						$wpdb->prefix . 'profitblue_cogs',
						$product_id,
						$period_id
					)
				)
			);
			if ( !empty( $result ) ) {
				$cogs = $item->get_quantity() * $result[0]->cogs;
				return $cogs;
			}

		}

		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE product_id=%d AND year=%s",
				array(
					$wpdb->prefix . 'profitblue_cogs',
					$product_id,
					'whole-period'
				)
			)
		);
		if ( !empty( $result ) ) {
			$cogs = $item->get_quantity() * $result[0]->cogs;
			return $cogs;
		} else {
			return false;
		}
				
	}

	
	/**
	 * Get order item shipping cost data 
	 * 
	 * @retrun float|string
	 */
	public function get_order_shipping_cost( $order, $order_date, $shipping_id ) {

		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE period_start >= %s AND period_end <= %s",
				array(
					$wpdb->prefix . 'profitblue_shiping_costs',
					$order_date,
					$order_date
				)
			)
		);
		if ( !empty( $result ) ) {
			$period_id = $result[0]->ID;			
		} else {
			$order_year = gmdate( 'Y', strtotime( $order_date ) );
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE period_type = %s",
					array(
						$wpdb->prefix . 'profitblue_shiping_costs',
						$order_year
					)
				)
			);
			if ( !empty( $result ) ) {
				$period_id = $result[0]->ID;			
			} else {
				$period = 'whole-period';
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT * FROM %i WHERE period_type = %s",
						array(
							$wpdb->prefix . 'profitblue_shiping_costs',
							$period
						)
					)
				);
				if ( !empty( $result ) ) {
					$period_id = $result[0]->ID;			
				} else {					
					return '0';				
				}
				
			}

		}

		if ( empty( $period_id ) ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE shipping_costs_id = %d AND shipping_id = %s",
					array(
						$wpdb->prefix . 'profitblue_shipping_costs_data',
						$period_id,
						$shipping_id
					)
				)
			);
			if ( !empty( $result ) ) {
				$shipping_price = 0;
				if ( !empty( $result[0]->shipping_price ) ) {
					$shipping_price += $result[0]->shipping_price;
				}
				if ( !empty( $result[0]->shipping_price ) ) {
					$shipping_price += $result[0]->shipping_cod;
				}
				return $shipping_price;

			}
		}

		
		return '0';

	}

	/**
	 * Get order item payment cost data 
	 * 
	 * @retrun float|string
	 */
	public function get_order_payment_cost( $order, $order_date, $payment_id, $order_product_total ) {

		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE date_start >= %s AND date_end <= %s",
				array(
					$wpdb->prefix . 'profitblue_payment_periods',
					$order_date,
					$order_date
				)
			)
		);
		if ( !empty( $result ) ) {
			$period_id = $result[0]->ID;			
		} else {
			$order_year = gmdate( 'Y', strtotime( $order_date ) );
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE year = %s",
					array(
						$wpdb->prefix . 'profitblue_payment_periods',
						$order_year
					)
				)
			);
			if ( !empty( $result ) ) {
				$period_id = $result[0]->ID;			
			} else {
				$period = 'whole-period';
				$result = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT * FROM %i WHERE type = %s",
						array(
							$wpdb->prefix . 'profitblue_payment_periods',
							$period
						)
					)
				);
				if ( !empty( $result ) ) {
					$period_id = $result[0]->ID;			
				} else {					
					return '0';				
				}
				
			}

		}

		if ( empty( $period_id ) ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i WHERE payment_period_id = %d AND payment = %s",
					array(
						$wpdb->prefix . 'profitblue_payments',
						$period_id,
						$payment_id
					)
				)
			);
			
			if ( !empty( $result ) ) {

				$payment_price = 0;
				if ( !empty( $result[0]->percent ) ) {
					$payment_price = $order_product_total * ( $result[0]->percent/100 );
				} elseif ( !empty( $result[0]->amount ) ) {
					$payment_price += $result[0]->amoun;
				}
				return $payment_price;

			}
			
		}

		return '0';

	}

	/**
	 * Get orders by date for graph
	 * 
	 * @return array
	 */
	public function get_orders_by_date( $start_date, $end_date = false, $mode = 'revenue' ) {

		$check_start_date = new \DateTime( $start_date );
		$check_end_date = new \DateTime( $end_date );
		$days_interval = $check_start_date->diff( $check_end_date );
		$number_of_days = $days_interval->days;
		$number_of_days++;
		$interval = array( $start_date, $end_date );

		if ( 'net-profit' != $mode ) {

			if ( $number_of_days < 32 ) {
				//Display days
				$this->display = 'days';
				$days_data = new OrdersDaysData( $start_date, $end_date, $mode );
				$return = $days_data->get_data();
				$this->all_data = $days_data->data;
				return $return;
			} elseif ( $number_of_days > 31 && $number_of_days < 210 ) {			
				//Display weeks
				$this->display = 'weeks';			
				$weeks_data = new OrdersWeeksData( $start_date, $end_date, $mode );
				$return = $weeks_data->get_data();
				$this->all_data = $weeks_data->data;
				return $return;		
			} elseif ( $number_of_days > 209 ) {
				//Display monts
				$this->display = 'months';
				$months_data = new OrdersMonthsData( $start_date, $end_date, $mode );
				$return = $months_data->get_data();
				$this->all_data = $months_data->data;
				return $return;
			}	

		} else {

			if ( $number_of_days < 32 ) {
				//Display days
				$this->display = 'days';
				$days_data = new NetprofitDaysData( $start_date, $end_date, $mode );
				$return = $days_data->get_data();
				$this->all_data = $days_data->data;
				return $return;
			} elseif ( $number_of_days > 31 && $number_of_days < 210 ) {			
				//Display weeks
				$this->display = 'weeks';
				$weeks_data = new NetprofitWeeksData( $start_date, $end_date, $mode );						
				$return = $weeks_data->get_data();
				$this->all_data = $weeks_data->data;
				return $return;	
			} elseif ( $number_of_days > 209 ) {
				//Display monts
				$this->display = 'months';
				$months_data = new NetprofitMonthsData( $start_date, $end_date, $mode );
				$return = $months_data->get_data();
				$this->all_data = $months_data->data;
				return $return;
			}

		}

		
	}

	/**
	 * Get orders by date for graph and one product
	 * 
	 * @return array
	 */
	public function get_orders_by_date_for_product( $product_id, $start_date, $end_date = false, $mode = 'revenue' ) {

		$check_start_date = new \DateTime( $start_date );
		$check_end_date = new \DateTime( $end_date );
		$days_interval = $check_start_date->diff( $check_end_date );
		$number_of_days = $days_interval->days;
		$number_of_days++;
		$interval = array( $start_date, $end_date );

		if ( $number_of_days < 32 ) {
			//Display days
			$this->display = 'days';			
			$days_data = new OrdersDaysData( $start_date, $end_date, $mode );
			return $days_data->get_product_data( $product_id );
		} elseif ( $number_of_days > 31 && $number_of_days < 210 ) {			
			//Display weeks
			$this->display = 'weeks';
			$weeks_data = new OrdersWeeksData( $start_date, $end_date, $mode );			
			return $weeks_data->get_product_data( $product_id );			
		} elseif ( $number_of_days > 209 ) {
			//Display monts
			$this->display = 'months';
			$months_data = new OrdersMonthsData( $start_date, $end_date, $mode );
			return $months_data->get_product_data( $product_id );
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
	 * Set payment data
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
	 * @return array
	 */
	public function get_order_shipping_income( $order ) {
		
		$orderShippingModel = new OrderShippingModel( $order );
		$shippingIncome = $orderShippingModel->get_order_shipping_income();
		return $shippingIncome;

	}

	/**
	 * Get shop setting data
	 * 
	 * @return array
	 */
	public function get_shop_setting_data () {

		$shop_setting_id = null;
		$shop_setting_id_data = null;
		
		$use_this = get_option( 'profitblue-use-this-shop-setting-period' );
		if ( !empty( $use_this ) ) {
			foreach( $this->shop_settings as $settings_data ) {
				if ( $settings_data->period_type == 'whole-period' ) {
					$shop_setting_id = $settings_data->ID;
					$shop_setting_id_data = $settings_data;
					break;
				}
			}
		} else {

			foreach( $this->shop_settings as $settings_data ) {
				if ( $settings_data->period_type == 'custom-range' ) {
					if ( $date >= $settings_data->period_start && $date <= $settings_data->period_end ) {
						$shop_setting_id = $settings_data->ID;
						$shop_setting_id_data = $settings_data;
						break;
					}
				}			
			}
			if ( empty( $shop_setting_id ) ) {
				foreach( $this->shop_settings as $settings_data ) {
					if ( $settings_data->period_type == $year ) {
						$shop_setting_id = $settings_data->ID;
						$shop_setting_id_data = $settings_data;
						break;
					}
				}
			}
			if ( empty( $shop_setting_id ) ) {
				foreach( $this->shop_settings as $settings_data ) {
					if ( $settings_data->period_type == 'whole-period' ) {
						$shop_setting_id = $settings_data->ID;
						$shop_setting_id_data = $settings_data;
						break;
					}
				}
			}

		}

		return array( 'shop_setting_id' => $shop_setting_id, 'shop_setting_id_data' => $shop_setting_id_data );

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
	 * Get order payment income
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
		if ( !empty( $this->payments ) ) {
			foreach( $this->payments as $payment ) {
				if ( $payment->payment_period_id == $payment_period_id && $payment->payment == $order->order_payment_id ) {
					$payment_cost_id_data = $payment;
					break;
				}
			}
		}
		if ( !empty( $payment_cost_id_data ) ) {
			if ( !empty( $payment_cost_id_data->amount ) ) {
				$amount = (float)$payment_cost_id_data->amount;
				$payment_cost = $payment_cost + $amount;
			}

			if ( !empty( $payment_cost_id_data->percent && $payment_cost_id_data->percent > 0 ) ) {
				$percent = (float)$payment_cost_id_data->percent;
				$price = (float)$order->order_subtotal;
				$payment_cost = $payment_cost + ( ( $price / 100 ) * $percent );
			}
		}

		$shipping_income = $this->get_order_shipping_income( $order );

		if ( !empty( $shipping_income['cod_id'] ) ) {
			if ( $order->order_payment_id == $shipping_income['cod_id'] ) {
				if ( 'custom-costs' == $shipping_income['cost_type'] && !empty( $shipping_income['cod_price'] ) ) {				
						$payment_cost  = $shipping_income['cod_price'];			
				} elseif ( 'same-costs' == $shipping_income['cost_type'] ) {
					$payment_cost = $order->order_fees_subtotal;
				}
			}
		}

		return $payment_cost;

	}


}
