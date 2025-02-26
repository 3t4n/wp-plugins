<?php

namespace ProfitBlue\Controllers;

use ProfitBlue\Controllers\ProductsPeriodsController;
use ProfitBlue\Helpers\ProductControlerHelper;

/**
 * ProductsController
 */
class ProductsController {
	
	/**
	 * limit
	 *
	 * @var int
	 */
	private $limit = 20;
	
	/**
	 * offset
	 *
	 * @var undefined
	 */
	private $offset = null;
	
	/**
	 * wpdb
	 *
	 * @var undefined
	 */
	private $wpdb = null;
	
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
	 * Search
	 *
	 * @var string
	 */
	private $search = null;
		
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
	public $start_date = false;
		
	/**
	 * end_date
	 *
	 * @var bool
	 */
	public $end_date = false;
		
	/**
	 * product_id
	 *
	 * @var bool
	 */
	public $product_id = false;
		
	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {

		global $wpdb;
		$wpdb = $wpdb;
		$this->parse_args();

	}

	/**
	 * Set limit
	 * 
	 * @param int $limit
	 *
	 * @return void
	 */
	public function set_limit( $limit ) {
	
		$this->limit = $limit;

	}

	/**
	 * Set offset
	 * 
	 * @param int $offset
	 *
	 * @return void
	 */
	public function set_offset( $offset ) {
	
		$this->offset = $offset;

	}

	/**
	 * Set search
	 * 
	 * @param string $search
	 *
	 * @return void
	 */
	public function set_search( $search ) {
	
		$this->search = $search;

	}

	/**
	 * Set start_date
	 * 
	 * @param string $start_date
	 *
	 * @return void
	 */
	public function set_start_date( $start_date ) {
	
		$this->start_date = $start_date;

	}

	/**
	 * Set end_date
	 * 
	 * @param string $end_date
	 *
	 * @return void
	 */
	public function set_end_date( $end_date ) {
	
		$this->end_date = $end_date;

	}

	/**
	 * Set product_id
	 * 
	 * @param int $product_id
	 *
	 * @return void
	 */
	public function set_product_id( $product_id ) {
	
		$this->product_id = $product_id;

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
			if ( $_GET['offset'] > 1 ) {
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				$this->offset = isset( $_GET['offset'] ) ? (int) wp_unslash( sanitize_text_field( $_GET['offset'] ) ) - 1 : 0;
			}
		}
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['period'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$parts = isset( $_GET['period'] ) ? explode( ' - ', wp_unslash( sanitize_text_field( $_GET['period'] ) ) ) : [];
			if ( count( $parts ) > 1 ) {
				$this->set_start_date( $parts[0] );
				$this->set_end_date( $parts[1] );
			}
		} else {
			$this->set_start_date( gmdate( 'Y' ) . '-01-01' );
			$this->set_end_date( gmdate( 'Y' ) . '-12-31' );
		}
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['product_detail'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended			
			$this->product_id = isset( $_GET['product_detail'] ) ? wp_unslash( sanitize_text_field( $_GET['product_detail'] ) ) : '';
		}
		

	}

	/**
	 * Get not imported products
	 *
	 * @return array|false
	 */
	public function get_not_imported_products() {

		$args = array(
			'post_type' =>'product',
			'post_status' => 'publish',
			'posts_per_page' => 100,
			'meta_query' => array(
				array(
					'key' => 'cogs_imported',
					'compare' => 'NOT EXISTS'
				)
			)
		);

		$products = new \WP_Query( $args );

		if ( !empty( $products->posts ) ) {
			return $products->posts;
		} else {
			return false;
		}

	}

	/**
	 * Get products
	 *
	 * @return array|false
	 */
	public function get_products() {

		global $wpdb;
		$products = null;

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['product-search'] ) && null === $this->search ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$this->search = isset( $_GET['product-search'] ) ? wp_unslash( sanitize_text_field( $_GET['product-search'] ) ) : '';
		}

		if ( null !== $this->search ) {
			if ( null !== $this->offset ) {

				$products = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT * FROM %i  WHERE sku LIKE %s LIMIT %d OFFSET %d",
						array(
							$wpdb->prefix . 'profitblue_products',
							'%' . $this->search . '%',
							$this->limit,
							$this->offset * $this->limit
						)
					)
				);

			} else {
				$products = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT * FROM %i  WHERE sku LIKE %s LIMIT %d",
						array(
							$wpdb->prefix . 'profitblue_products',
							'%' . $this->search . '%',
							$this->limit
						)
					)
				);
			}
			
		}	

		if ( !empty( $products ) ) {
			return $products;
		} else {
			if ( null !== $this->search ) {
			
				if ( null !== $this->offset ) {
	
					$products = $wpdb->get_results(
						$wpdb->prepare(
							"SELECT * FROM %i  WHERE name LIKE %s LIMIT %d OFFSET %d",
							array(
								$wpdb->prefix . 'profitblue_products',
								'%' . $this->search . '%',
								$this->limit,
								$this->offset * $this->limit								
							)
						)
					);
	
				} else {
					$products = $wpdb->get_results(
						$wpdb->prepare(
							"SELECT * FROM %i  WHERE name LIKE %s LIMIT %d",
							array(
								$wpdb->prefix . 'profitblue_products',
								'%' . $this->search . '%',
								$this->limit
							)
						)
					);
				}
				
			} else {
				if ( null !== $this->offset ) {
	
					$products = $wpdb->get_results(
						$wpdb->prepare(
							"SELECT * FROM %i LIMIT %d OFFSET %d",
							array(
								$wpdb->prefix . 'profitblue_products',								
								$this->limit,
								$this->offset * $this->limit
							)
						)
					);
	
				} else {
					$products = $wpdb->get_results(
						$wpdb->prepare(
							"SELECT * FROM %i LIMIT %d",
							array(
								$wpdb->prefix . 'profitblue_products',
								$this->limit
							)
						)
					);
				}
			}

			if ( !empty( $products ) ) {
				return $products;
			} else {
				return false;
			}

		}

		return false;

	}

	/**
	 * Get products
	 *
	 * @return array|false
	 */
	public function get_products_count() {

		global $wpdb;
		$products = null;

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['product-search'] ) && null === $this->search ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$this->search = isset( $_GET['product-search'] ) ? wp_unslash( sanitize_text_field( $_GET['product-search'] ) ) : '';
		}

		if ( null !== $this->search ) {

			if ( null !== $this->offset ) {

				$products = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT COUNT(*) as products_count FROM %i  WHERE sku LIKE %s LIMIT %d OFFSET %d",
						array(
							$wpdb->prefix . 'profitblue_products',
							'%' . $this->search . '%',							
							$this->limit,
							$this->offset * $this->limit
						)
					)
				);

			} else {

				$products = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT COUNT(*) as products_count FROM %i  WHERE sku LIKE %s LIMIT %d",
						array(
							$wpdb->prefix . 'profitblue_products',
							'%' . $this->search . '%',
							$this->limit
						)
					)
				);
			}
			
		}	

		if ( empty( $products ) ) {

			if ( null !== $this->search ) {

				if ( null !== $this->offset ) {

					$products = $wpdb->get_results(
						$wpdb->prepare(
							"SELECT COUNT(*) as products_count FROM %i  WHERE name LIKE %s LIMIT %d OFFSET %d",
							array(
								$wpdb->prefix . 'profitblue_products',
								'%' . $this->search . '%',								
								$this->limit,
								$this->offset * $this->limit
							)
						)
					);
	
				} else {

					$products = $wpdb->get_results(
						$wpdb->prepare(
							"SELECT COUNT(*) as products_count FROM %i  WHERE name LIKE %s LIMIT %d",
							array(
								$wpdb->prefix . 'profitblue_products',
								'%' . $this->search . '%',
								$this->limit
							)
						)
					);
				}
				
			} else {

				if ( null !== $this->offset ) {
	
					$products = $wpdb->get_results(
						$wpdb->prepare(
							"SELECT COUNT(*) as products_count FROM %i",
							array(
								$wpdb->prefix . 'profitblue_products'
							)
						)
					);
				} else {
					$products = $wpdb->get_results(
						$wpdb->prepare(
							"SELECT COUNT(*) as products_count FROM %i LIMIT %d",
							array(
								$wpdb->prefix . 'profitblue_products',
								$this->limit
							)
						)
					);
				}
			}

			if ( !empty( $products ) ) {
				return $products;
			} else {
				return false;
			}

		}

		if ( '0' !== $products[0]->products_count ) {
			return $products;
		} else {
			if ( null !== $this->search ) {

				if ( null !== $this->offset ) {

					$products = $wpdb->get_results(
						$wpdb->prepare(
							"SELECT COUNT(*) as products_count FROM %i  WHERE name LIKE %s LIMIT %d OFFSET %d",
							array(
								$wpdb->prefix . 'profitblue_products',
								'%' . $this->search . '%',								
								$this->limit,
								$this->offset * $this->limit
							)
						)
					);
	
				} else {

					$products = $wpdb->get_results(
						$wpdb->prepare(
							"SELECT COUNT(*) as products_count FROM %i  WHERE name LIKE %s LIMIT %d",
							array(
								$wpdb->prefix . 'profitblue_products',
								'%' . $this->search . '%',
								$this->limit
							)
						)
					);
				}
				
			} else {

				if ( null !== $this->offset ) {
	
					$products = $wpdb->get_results(
						$wpdb->prepare(
							"SELECT COUNT(*) as products_count FROM %i",
							array(
								$wpdb->prefix . 'profitblue_products'
							)
						)
					);
				} else {
					$products = $wpdb->get_results(
						$wpdb->prepare(
							"SELECT COUNT(*) as products_count FROM %i LIMIT %d",
							array(
								$wpdb->prefix . 'profitblue_products',
								$this->limit
							)
						)
					);
				}
			}

			if ( !empty( $products ) ) {
				return $products;
			} else {
				return false;
			}

		}

		return false;

	}

	/**
	 * Get product
	 *
	 * @return array|false
	 */
	public function get_product() {

		global $wpdb;

		$products = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM %i WHERE product_id = %d",
				array(
					$wpdb->prefix . 'profitblue_products',
					$this->product_id
				)
			) 
		);

		if ( !empty( $products ) ) {
			return $products[0];
		}

		return false;

	}

	/**
	 * get_product_data
	 *
	 * @param  mixed $product_id
	 * @return array|false
	 */
	public function get_product_data( $product_id ) {

		global $wpdb;
		
		$items_table_name = $wpdb->prefix . 'profitblue_order_items';
		$orders_table_name = $wpdb->prefix . 'profitblue_orders';
		if ( false != $this->start_date && false != $this->end_date ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT order_items.product_id, SUM(order_items.item_qty) as qty, SUM(order_items.profit) as profit, SUM(order_items.item_cogs) as cogs, SUM(order_items.item_total) as total
					FROM %i AS order_items
					JOIN %i AS orders ON orders.order_id = order_items.order_id
					WHERE order_items.product_id = %d AND orders.order_date BETWEEN %s AND %s AND order_items.product_id != '0' 
					GROUP BY order_items.product_id DESC",
					array(
						$items_table_name,
						$orders_table_name,
						$product_id,
						strtotime( $this->start_date . '00:00:01' ),
						strtotime( $this->end_date . '23:59:59' )
					)
				)
			);	
		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT order_items.product_id, SUM(order_items.item_qty) as qty, SUM(order_items.profit) as profit, SUM(order_items.item_cogs) as cogs, SUM(order_items.item_total) as total
					FROM %i AS order_items
					JOIN %i AS orders ON orders.order_id = order_items.order_id
					WHERE order_items.product_id = %d AND order_items.product_id != '0' 
					GROUP BY order_items.product_id DESC",
					array(
						$items_table_name,
						$orders_table_name,
						$product_id
					)
				)
			);		
		}

		if ( empty( $result ) ) {
			return false;
		}

		return $result;

	}

	/**
	 * get_last_year_product_data
	 *
	 * @param  int $product_id
	 * @param  string $start_date
	 * @param  string $end_date
	 * @return array|false
	 */
	public function get_last_year_product_data( $product_id, $start_date, $end_date ) {	

		global $wpdb;

		$items_table_name = $wpdb->prefix . 'profitblue_order_items';
		$orders_table_name = $wpdb->prefix . 'profitblue_orders';
		if ( false != $start_date && false != $end_date ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT order_items.product_id, SUM(order_items.item_qty) as qty, SUM(order_items.profit) as profit, SUM(order_items.item_cogs) as cogs, SUM(order_items.item_total) as total
					FROM %i AS order_items
					JOIN %i AS orders ON orders.order_id = order_items.order_id
					WHERE order_items.product_id = %d AND orders.order_date BETWEEN %s AND %s AND order_items.product_id != '0' 
					GROUP BY order_items.product_id DESC",
					array(
						$items_table_name,
						$orders_table_name,
						$product_id,
						strtotime( $start_date . '00:00:01' ),
						strtotime( $end_date . '23:59:59' )
					)
				)
			);	
		}
		
		if ( empty( $result ) ) {
			return false;
		}

		return $result;

	}

	/**
	 * get_product_orders_count
	 *
	 * @param  int $product_id
	 * @return float
	 */
	public function get_product_orders_count( $product_id ) {	

		global $wpdb;

		$args = array();
		$orders_table_name = $wpdb->prefix . 'profitblue_orders';
		$items_table_name = $wpdb->prefix . 'profitblue_order_items';
		
		if ( false != $this->start_date && false != $this->end_date ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT orders.*
					FROM %i AS orders
					JOIN %i AS order_items ON orders.order_id = order_items.order_id
					WHERE order_items.product_id = %d  AND orders.order_date BETWEEN %s AND %s",
					array(
						$orders_table_name,
						$items_table_name,
						$product_id,
						strtotime( $this->start_date . '00:00:01' ),
						strtotime( $this->end_date . '23:59:59' )
					)
				)
			);			
		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT orders.*
					FROM %i AS orders
					JOIN %i AS order_items ON orders.order_id = order_items.order_id
					WHERE order_items.product_id = %d",
					array(
						$orders_table_name,
						$items_table_name,
						$product_id
					)
				)
			);		
		}
				
		if ( empty( $result ) ) {
			return 0;
		} else {
			return count( $result );
		}		

	}

	/**
	 * get_product_orders
	 *
	 * @param  int $product_id
	 * @param  int $limit
	 * @return array
	 */
	public function get_product_orders( $product_id, $limit = 30 ) {	

		global $wpdb;
		$orders_table_name = $wpdb->prefix . 'profitblue_orders';
		$items_table_name = $wpdb->prefix . 'profitblue_order_items';

		if ( false != $this->start_date && false != $this->end_date ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT orders.*
					FROM %i AS orders
					JOIN %i AS order_items ON orders.order_id = order_items.order_id
					WHERE order_items.product_id = %d  AND orders.order_date BETWEEN %s AND %s ORDER BY order_date DESC LIMIT %d",
					array(
						$orders_table_name,
						$items_table_name,
						$product_id,
						strtotime( $this->start_date . '00:00:01' ),
						strtotime( $this->end_date . '23:59:59' ),
						$limit
					)
				)
			);			
		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT orders.*
					FROM %i AS orders
					JOIN %i AS order_items ON orders.order_id = order_items.order_id
					WHERE order_items.product_id = %d ORDER BY order_date DESC LIMIT %d",
					array(
						$orders_table_name,
						$items_table_name,
						$product_id,
						$limit
					)
				)
			);	
		}
				
		return $result;

	}

	/**
	 * get_last_year_product_orders
	 *
	 * @param  int $product_id
	 * @param  string $start_date
	 * @param  string $end_date
	 * @return array
	 */
	public function get_last_year_product_orders( $product_id, $start_date, $end_date ) {	

		global $wpdb;

		$orders_table_name = $wpdb->prefix . 'profitblue_orders';
		$items_table_name = $wpdb->prefix . 'profitblue_order_items';

		if ( false != $start_date && false != $end_date ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT order_items.order_id
					FROM %i AS order_items
					JOIN %i AS orders ON orders.order_id = order_items.order_id
					WHERE order_items.product_id = %d  AND orders.order_date BETWEEN %s AND %s ORDER BY order_date DESC LIMIT %d",
					array(
						$items_table_name,
						$orders_table_name,
						$product_id,
						strtotime( $start_date . '00:00:01' ),
						strtotime( $end_date . '23:59:59' ),
						$limit
					)
				)
			);			
		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT orders.*
					FROM %i AS orders
					JOIN %i AS order_items ON orders.order_id = order_items.order_id
					WHERE order_items.product_id = %d ORDER BY order_date DESC LIMIT %d",
					array(
						$orders_table_name,
						$items_table_name,
						$product_id,
						$limit
					)
				)
			);	
		}

		return $result;

	}

	/**
	 * get_orders
	 *
	 * @param  array $ids
	 * @return array|false
	 */
	public function get_orders( $ids ) {

		global $wpdb;

		$args = array(
			'post_type' => 'shop_order',
			'post_status' => 'wc-completed',
			'post__in ' => $ids
		);
		$args['posts_per_page'] = count( $ids ) + 1;
		$orders = new \WP_Query( $args );
		
		if ( !empty( $orders ) ) {
			return $orders;
		} else {
			return false;
		}

	}

	/**
	 * get_period_data
	 *
	 * @return array
	 */
	public function get_period_data() {

		global $wpdb;

		$data = array();

		$periodControler = new ProductsPeriodsController();
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended		
		if ( !empty( $_GET['period'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$period = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
			if ( 'custom' == $period ) {

				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				$date_start = isset( $_GET['date_start'] ) ? wp_unslash( sanitize_text_field( $_GET['date_start'] ) ) : '';
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				$date_end = isset( $_GET['date_end'] ) ? wp_unslash( sanitize_text_field( $_GET['date_end'] ) ) : '';
				$period_data = $periodControler->get_period( 'custom', $date_start, $date_end );
				if ( !empty( $period_data ) ) {				
					$data['period_id'] = $period_data[0]->ID;
					$data['period_type'] = 'id';				
				}

			} elseif ( 'whole-period' == $period ) {

				$period_data = $periodControler->get_period( 'whole-period' );
				if ( !empty( $period_data ) ) {
					$data['period_id'] = $period_data[0]->ID;
					$data['period_type'] = 'id';
				}

			} else {
				$period_data = $periodControler->get_period( $period );
				if ( !empty( $period_data ) ) {
					$data['period_id'] = $period_data[0]->ID;
					$data['period_type'] = 'year';
					$data['period_year'] = $period;
				}
			}
		} else {
			$period_data = $periodControler->get_period( 'whole-period' );
			if ( !empty( $period_data ) ) {
				$data['period_id'] = $period_data[0]->ID;
				$data['period_type'] = 'id';
			}
		}

		return $data;

	}

	/**
	 * get_products_cogs_data
	 *
	 * @param  string $period_data
	 * @param  string $empty_cogs
	 * @return array|false
	 */
	public function get_products_cogs_data( $period_data = false, $empty_cogs = false ) {

		global $wpdb;

		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';
		$products_data = array();

		$show_empty_cogs = '';
		if ( false !== $empty_cogs ) {
			$show_empty_cogs = " AND c.cogs = '0'";
		}

		if ( null !== $this->offset ) {
			$sql_offset = $this->offset * $this->limit;
		}
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['product-search'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$text = isset( $_GET['product-search'] ) ? wp_unslash( sanitize_text_field( $_GET['product-search'] ) ) : '';
			
			if ( !empty( $period_data['period_id'] ) ) {
				if ( false !== $empty_cogs ) {										
					if ( null !== $this->offset ) {
						//Search - period_id - empty cogs - offset
						$result_cogs = ProductControlerHelper::sql_1( $period_data['period_id'], $text, $sql_offset, $this->limit );
					} else {
						//Search - period_id - empty cogs
						$result_cogs = ProductControlerHelper::sql_2( $period_data['period_id'], $text, $this->limit );						
					}					
					//Count - Search - period_id - empty cogs
					$result_cogs_count = ProductControlerHelper::count_sql_1( $period_data['period_id'], $text );					
				} else {
					if ( null !== $this->offset ) {
						//Search - period_id - offset
						$result_cogs = ProductControlerHelper::sql_3( $period_data['period_id'], $text, $sql_offset, $this->limit );
					} else {
						//Search - period_id
						$result_cogs = ProductControlerHelper::sql_4( $period_data['period_id'], $text, $this->limit );						
					}
					//Count - Search - period_id
					$result_cogs_count = ProductControlerHelper::count_sql_3( $period_data['period_id'], $text );					
				}
			} else {
				if ( false !== $empty_cogs ) {										
					if ( null !== $this->offset ) {
						//Search - period_year - empty cogs - offset
						$result_cogs = ProductControlerHelper::sql_5( $period_data['period_year'], $text, $sql_offset, $this->limit );
					} else {
						//Search - period_year - empty cogs
						$result_cogs = ProductControlerHelper::sql_6( $period_data['period_year'], $text, $this->limit );						
					}					
					//Count - Search - period_year - empty cogs
					$result_cogs_count = ProductControlerHelper::count_sql_5( $period_data['period_year'], $text );					
				} else {
					if ( null !== $this->offset ) {
						//Search - period_year - offset
						$result_cogs = ProductControlerHelper::sql_7( $period_data['period_year'], $text, $sql_offset, $this->limit );
					} else {
						//Search - period_year
						$result_cogs = ProductControlerHelper::sql_8( $period_data['period_year'], $text, $this->limit );						
					}
					//Count - Search - period_year
					$result_cogs_count = ProductControlerHelper::count_sql_7( $period_data['period_year'], $text );					
				}
			}

		} else {

			if ( !empty( $period_data['period_id'] ) ) {
				if ( false !== $empty_cogs ) {										
					if ( null !== $this->offset ) {
						//period_id - empty cogs - offset
						$result_cogs = ProductControlerHelper::sql_9( $period_data['period_id'], $sql_offset, $this->limit );
					} else {
						//period_id - empty cogs
						$result_cogs = ProductControlerHelper::sql_10( $period_data['period_id'], $this->limit );						
					}					
					//Count - period_id - empty cogs
					$result_cogs_count = ProductControlerHelper::count_sql_9( $period_data['period_id'] );					
				} else {
					if ( null !== $this->offset ) {
						//period_id - offset
						$result_cogs = ProductControlerHelper::sql_11( $period_data['period_id'], $sql_offset, $this->limit );
					} else {
						//period_id
						$result_cogs = ProductControlerHelper::sql_12( $period_data['period_id'], $this->limit );						
					}
					//Count - period_id
					$result_cogs_count = ProductControlerHelper::count_sql_11( $period_data['period_id'] );					
				}
			} else {
				if ( false !== $empty_cogs ) {										
					if ( null !== $this->offset ) {
						//period_year - empty cogs - offset
						$result_cogs = ProductControlerHelper::sql_13( $period_data['period_year'], $sql_offset, $this->limit );
					} else {
						//period_year - empty cogs
						$result_cogs = ProductControlerHelper::sql_14( $period_data['period_year'], $this->limit );						
					}					
					//Count - period_year - empty cogs
					$result_cogs_count = ProductControlerHelper::count_sql_13( $period_data['period_year'] );					
				} else {
					if ( null !== $this->offset ) {
						//Period_year - offset
						$result_cogs = ProductControlerHelper::sql_15( $period_data['period_year'], $sql_offset, $this->limit );
					} else {
						//Period_year
						$result_cogs = ProductControlerHelper::sql_16( $period_data['period_year'], $this->limit );						
					}
					//Count - period_year
					$result_cogs_count = ProductControlerHelper::count_sql_15( $period_data['period_year'] );					
				}
			}

		}
		
		if ( !empty( $result_cogs ) ) {

			$products_data['query'] = $result_cogs_count;

			foreach( $result_cogs as $item ) {

				$this->set_product_id( $item->product_id );
				$product = $this->get_product();

				if( is_object( $product ) ) {
					$item_data = array(
						'id' => $product->product_id,
						'image' => $product->image,
						'sku' => $product->sku,
						'name' => $product->name,
						'price' => wc_price( $product->price )
					);

					$cogs_data = $this->get_product_cogs_by_id( $product->product_id );
					if ( false != $cogs_data ) {

						$item_data['cogs'] = $cogs_data->cogs;

					}
					$products_data[] = $item_data;
				} else {
					die();
				}
			}

		}

		if ( !empty( $products_data ) ) {
			return $products_data;
		} else {
			return false;
		}

	}

	/**
	 * get_product_cogs_by_id
	 *
	 * @param  int $product_id
	 * @return array|false
	 */
	public function get_product_cogs_by_id( $product_id ) {

		global $wpdb;

		$periodControler = new ProductsPeriodsController();

		$result = $wpdb->get_results(
			$wpdb->prepare( 
				"SELECT * FROM %i WHERE product_id=%d",
				array(
					$wpdb->prefix . 'profitblue_cogs',
					$product_id
				) 
			)
		);
		if ( empty( $result ) ) {
			return false;
		}
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['period'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$period = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';

			if ( 'custom' == $period ) {

				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				$date_start = isset( $_GET['date_start'] ) ? wp_unslash( sanitize_text_field( $_GET['date_start'] ) ) : '';
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				$date_end = isset( $_GET['date_end'] ) ? wp_unslash( sanitize_text_field( $_GET['date_end'] ) ) : '';
				$period_data = $periodControler->get_period( 'custom', $date_start, $date_end );
				if ( !empty( $period_data ) ) {				
					$period_id = $period_data[0]->ID;
					foreach ( $result as $item ) {
						if ( $item->period == $period_id ) {
							return $item;
						}
					}				
				} else {
					return false;
				}

			} elseif ( 'whole-period' == $period ) {

				$period_data = $periodControler->get_period( 'whole-period' );
				if ( !empty( $period_data ) ) {
					$period_id = $period_data[0]->ID;
					foreach ( $result as $item ) {
						if ( $item->period == $period_id ) {
							return $item;
						}
					}
				} else {
					return false;
				}

			} else {
				foreach ( $result as $item ) {
					if ( $item->year == $period ) {
						return $item;
					}
				}
			}

		} else {
			$period_data = $periodControler->get_period( 'whole-period' );
			if ( !empty( $period_data ) ) {
				$period_id = $period_data[0]->ID;
				foreach ( $result as $item ) {
					if ( $item->period == $period_id ) {
						return $item;
					}
				}
			} else {
				return false;
			}
		}

		return false;
	}

	/**
	 * get_product_cogs_by_id_and_period
	 *
	 * @param  int $product_id
	 * @param  string $period
	 * @param  string $date_start
	 * @param  string $date_end
	 * @return object|false
	 */
	public function get_product_cogs_by_id_and_period( $product_id, $period, $date_start = false, $date_end = false ) {

		global $wpdb;

		$periodControler = new ProductsPeriodsController();

		$result = $wpdb->get_results(
			$wpdb->prepare( 
				"SELECT * FROM %i WHERE product_id=%d",
				array(
					$wpdb->prefix . 'profitblue_cogs',
					$product_id
				) 
			)
		);
		if ( empty( $result ) ) {
			return false;
		}
		
		if ( 'custom' == $period ) {

			$period_data = $periodControler->get_period( 'custom', $date_start, $date_end );
			if ( !empty( $period_data ) ) {				
				$period_id = $period_data[0]->ID;
				foreach ( $result as $item ) {
					if ( $item->period == $period_id ) {
						return $item;
					}
				}				
			} else {
				return false;
			}

		} elseif ( 'whole-period' == $period ) {

			$period_data = $periodControler->get_period( 'whole-period' );
			if ( !empty( $period_data ) ) {
				$period_id = $period_data[0]->ID;
				foreach ( $result as $item ) {
					if ( $item->period == $period_id ) {
						return $item;
					}
				}
			} else {
				return false;
			}

		} else {
			foreach ( $result as $item ) {
				if ( $item->year == $period ) {
					return $item;
				}
			}
		}

		return false;

	}

	/**
	 * save_product_cogs
	 *
	 * @param  object $product
	 * @param  float $cogs_value
	 * @param  int $period_id
	 * @param  string $year
	 * @param  string $period_type
	 * @return void
	 */
	public function save_product_cogs( $product, $cogs_value, $period_id, $year, $period_type ) {

		global $wpdb;

		if ( 'whole-period' == $period_type ) {

			$periods = $wpdb->get_results(
				$wpdb->prepare( 
					"SELECT * FROM %i",
					array(
						$wpdb->prefix . 'profitblue_products_periods'
					) 
				)
			);
			if ( !empty( $periods ) ) {
				foreach( $periods as $period ) {
					$result = $wpdb->get_results(
						$wpdb->prepare( 
							"SELECT * FROM %i WHERE product_id=%d AND period=%d",
							array(
								$wpdb->prefix . 'profitblue_cogs',
								$product->product_id,
								$period->ID
							) 
						)
					);
					if ( empty( $result ) ) {
						if ( 'whole-period' == $period->type ) {
							$data = array(
								'sku' 			=> $product->sku,
								'product_id' 	=> $product->product_id,
								'product_name' 	=> $product->name,
								'cogs' 			=> $cogs_value,
								'period' 		=> $period->ID,
								'year' 			=> 'whole-period'
							);
						} else {
							$data = array(
								'sku' 			=> $product->sku,
								'product_id' 	=> $product->product_id,
								'product_name' 	=> $product->name,
								'cogs' 			=> $cogs_value,
								'period' 		=> $period->ID,
								'year' 			=> $period->year
							);
						}
						$wpdb->insert( $wpdb->prefix . 'profitblue_cogs', $data );
					} else {
						$data = array( 'cogs' => $cogs_value );
						$wpdb->update( $wpdb->prefix . 'profitblue_cogs', $data, array( 'ID' => $result[0]->ID ) );
					}
				}
			}

		} else {

			if ( 'custom' == $period_type ) {
				$result = $wpdb->get_results(
					$wpdb->prepare( 
						"SELECT * FROM %i WHERE product_id=%d AND period=%s AND year=%s",
						array(
							$wpdb->prefix . 'profitblue_cogs',
							$product->product_id,
							$period_id,
							$year
						) 
					)
				);
			} else {
				$result = $wpdb->get_results(
					$wpdb->prepare( 
						"SELECT * FROM %i WHERE product_id=%d AND period=%s",
						array(
							$wpdb->prefix . 'profitblue_cogs',
							$product->product_id,
							$period_id
						) 
					)
				);
			}
			if ( empty( $result ) ) {
				$data = array(
					'sku' 			=> $product->sku,
					'product_id' 	=> $product->product_id,
					'product_name' 	=> $product->name,
					'cogs' 			=> $cogs_value,
					'period' 		=> $period_id,
					'year' 			=> $year
				);
				$wpdb->insert( $wpdb->prefix . 'profitblue_cogs', $data );
			} else {
				$data = array( 'cogs' => $cogs_value );
				$wpdb->update( $wpdb->prefix . 'profitblue_cogs', $data, array( 'ID' => $result[0]->ID ) );
			}

		}

	}

	/**
	 * get_not_saved_products
	 *
	 * @return void
	 */
	public function get_not_saved_products() {

		global $wpdb;

		$date_period = 'whole-period';

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['period'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$date_period = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
		}

		//Get period 
		$periodsController = new ProductsPeriodsController();			
		if ( 'custom' == $date_period ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$date_start = isset( $_GET['date_start'] ) ? wp_unslash( sanitize_text_field( $_GET['date_start'] ) ) : '';
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$date_end   = isset( $_GET['date_end'] ) ? wp_unslash( sanitize_text_field( $_GET['date_end'] ) ) : '';
			$period_data = $periodsController->get_period( $date_period, $date_start, $date_end );	
			$period_id 	 = $period_data[0]->ID;
			$year 		 = 'custom';			
		} elseif ( 'custom' == $date_period ) {
			$period_data = $periodsController->get_period( 'whole-period', $date_start, $date_end );	
			$period_id 	 = $period_data[0]->ID;
			$year 		 = 'whole-period';
		} else {
			$period_data = $periodsController->get_period( $date_period );
			$period_id 	 = $period_data[0]->ID;
			$year 		 = $date_period;
		}

		if ( 'custom' == $date_period ) {	
			
			$result = $wpdb->get_results(
				$wpdb->prepare( 
					"SELECT ID
					FROM %i as p
					WHERE post_type = 'product'
					AND post_status = 'publish'
					AND NOT EXISTS (
					SELECT *
					FROM %i as c
					WHERE c.product_id = p.ID AND c.period=%s AND c.year=%s)",
					array(
						$wpdb->prefix . 'posts',
						$wpdb->prefix . 'profitblue_cogs',
						$period_id,
						$year
					) 
				)
			);

			if ( !empty( $result ) ) {

				foreach( $result as $item ) {

					$this->set_product_id( $item->ID );
					$product = $this->get_product();
					$this->save_product_cogs( $product, '0', $period_id, $year, $date_period );

				}
			
			}

		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare( 
					"SELECT ID
					FROM %i as p
					WHERE post_type = 'product'
					AND post_status = 'publish'
					AND NOT EXISTS (
						SELECT *
						FROM %i as c
						WHERE c.product_id = p.ID AND c.period=%s)",
						array(
							$wpdb->prefix . 'posts',
							$wpdb->prefix . 'profitblue_cogs',
							$period_id
						) 
				)
			);

			if ( !empty( $result ) ) {

				foreach( $result as $item ) {

					$this->set_product_id( $item->ID );
					$product = $this->get_product();
					$this->save_product_cogs( $product, '0', $period_id, $year, $date_period );

				}
			
			}

		}
		
	}

	/**
	 * get_not_exists_products
	 *
	 * @return void
	 */
	public function get_not_exists_products() {

		global $wpdb;

		$result = $wpdb->get_results(
			$wpdb->prepare( 
				"SELECT COUNT(ap.ID) AS count_of_items
				FROM %i ap
				LEFT JOIN %i app ON ap.ID = app.product_id
				WHERE (ap.post_type = 'product' OR ap.post_type = 'product_variation')
				AND app.product_id IS NULL;",
				array(
					$wpdb->prefix . 'posts',
					$wpdb->prefix . 'profitblue_products'
				) 
			)
		);

		if ( !empty( $result ) ) {
			return $result[0]->count_of_items;
		} else {
			return 0;
		}
		

	}

}
