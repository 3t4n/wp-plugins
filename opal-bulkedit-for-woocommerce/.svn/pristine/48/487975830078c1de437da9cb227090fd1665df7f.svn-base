<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'OPBW_Product' ) ) :

    /**
     * Main OPBW_Start_Instance_Admin Class.
     *
     * @package		OPBW
     * @subpackage	Classes/OPBW_Product
     * @since		1.0.0
     * @author		WPOPAL
     */
    Class OPBW_Product {
		
        private static $_instance = null;

        public function __construct() {
            add_filter( 'woocommerce_product_export_product_column_thumbnail', [$this, 'custom_export_column_value'], 10, 3 );
			add_filter( 'woocommerce_product_export_product_column_schedule_sale', [$this, 'custom_export_column_value'], 10, 3 );
			add_filter( 'woocommerce_product_export_product_column_stock_management', [$this, 'custom_export_column_value'], 10, 3 );
			add_filter( 'woocommerce_product_export_product_column_delete_action', [$this, 'custom_export_column_value'], 10, 3 );

			add_filter( 'woocommerce_product_export_column_names', [$this, 'add_column_to_importer_exporter'], 10, 2 );
        }

        public static function instance($file = '', $version = '1.0.0') {
            if (is_null(self::$_instance)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

		public function custom_export_column_value($value, $product, $column_id) {
			switch ($column_id) {
				case 'thumbnail':
					$thumb = $product->get_image_id( 'edit' );
					if (!empty($thumb)) {
						$value = wp_get_attachment_image_src( absint($thumb), 'full' );
						$value = ($value) ? $value[0] : '';
					}
					break;
				case 'schedule_sale':
					$value = 'test';
					break;
				case 'stock_management':
					$value = 'test';
					break;
			}

			return $value;
		}

		public function add_column_to_importer_exporter($column_names, $ins) {
			$columns_setup = $ins->get_columns_to_export();
			if (!empty($columns_setup) && in_array('opbw_column', $columns_setup)) {
				$column_names['thumbnail'] = 'thumbnail';
				$column_names['schedule_sale'] = 'schedule_sale';
				$column_names['stock_management'] = 'stock_management';
			}
			return $column_names;
		}

		public static function filter_products($data_to_filter, $kw = '') {
			global $wpdb;
		
			$query = "SELECT posts.ID, posts.post_title
					  FROM {$wpdb->posts} AS posts
					  LEFT JOIN {$wpdb->term_relationships} AS term_relationships ON term_relationships.object_id = posts.ID
					  LEFT JOIN {$wpdb->term_taxonomy} AS term_taxonomy ON term_taxonomy.term_taxonomy_id = term_relationships.term_taxonomy_id
					  LEFT JOIN {$wpdb->terms} AS terms ON terms.term_id = term_taxonomy.term_id
					  LEFT JOIN {$wpdb->postmeta} AS postmeta ON postmeta.post_id = posts.ID
					  WHERE posts.post_type IN ('product', 'product_variation')
					  AND posts.post_status = 'publish'";
		
			$params = [];
		
			if (!empty($kw)) {
				$query .= " AND posts.post_title LIKE %s";
				$params[] = '%' . $wpdb->esc_like($kw) . '%';
			}
		
			if (!empty($data_to_filter['product_title']) && !empty($data_to_filter['product_title_val'])) {
				$value = $wpdb->esc_like($data_to_filter['product_title_val']);
				switch ($data_to_filter['product_title']) {
					case 'start_with':
						$query .= " AND posts.post_title LIKE %s";
						$params[] = $value . '%';
						break;
					case 'end_with':
						$query .= " AND posts.post_title LIKE %s";
						$params[] = '%' . $value;
						break;
					case 'contains':
						$query .= " AND posts.post_title LIKE %s";
						$params[] = '%' . $value . '%';
						break;
					case 'not_contains':
						$query .= " AND posts.post_title NOT LIKE %s";
						$params[] = '%' . $value . '%';
						break;
				}
			}
		
			if (!empty($data_to_filter['product_description']) && !empty($data_to_filter['product_description_val'])) {
				$value = $wpdb->esc_like($data_to_filter['product_description_val']);
				switch ($data_to_filter['product_description']) {
					case 'start_with':
						$query .= " AND posts.post_content LIKE %s";
						$params[] = $value . '%';
						break;
					case 'end_with':
						$query .= " AND posts.post_content LIKE %s";
						$params[] = '%' . $value;
						break;
					case 'contains':
						$query .= " AND posts.post_content LIKE %s";
						$params[] = '%' . $value . '%';
						break;
					case 'not_contains':
						$query .= " AND posts.post_content NOT LIKE %s";
						$params[] = '%' . $value . '%';
						break;
				}
			}

			if (!empty($data_to_filter['product_short_description']) && !empty($data_to_filter['product_short_description_val'])) {
				$value = $wpdb->esc_like($data_to_filter['product_short_description_val']);
				switch ($data_to_filter['product_short_description']) {
					case 'start_with':
						$query .= " AND posts.post_excerpt LIKE %s";
						$params[] = $value . '%';
						break;
					case 'end_with':
						$query .= " AND posts.post_excerpt LIKE %s";
						$params[] = '%' . $value;
						break;
					case 'contains':
						$query .= " AND posts.post_excerpt LIKE %s";
						$params[] = '%' . $value . '%';
						break;
					case 'not_contains':
						$query .= " AND posts.post_excerpt NOT LIKE %s";
						$params[] = '%' . $value . '%';
						break;
				}
			}

			if (!empty($data_to_filter['product_short_description']) && !empty($data_to_filter['product_short_description_val'])) {
				$value = $wpdb->esc_like($data_to_filter['product_short_description_val']);
				switch ($data_to_filter['product_short_description']) {
					case 'start_with':
						$query .= " AND posts.post_excerpt LIKE %s";
						$params[] = $value . '%';
						break;
					case 'end_with':
						$query .= " AND posts.post_excerpt LIKE %s";
						$params[] = '%' . $value;
						break;
					case 'contains':
						$query .= " AND posts.post_excerpt LIKE %s";
						$params[] = '%' . $value . '%';
						break;
					case 'not_contains':
						$query .= " AND posts.post_excerpt NOT LIKE %s";
						$params[] = '%' . $value . '%';
						break;
				}
			}

			if (!empty($data_to_filter['product_sku']) && !empty($data_to_filter['product_sku_val'])) {
				$query .= " AND postmeta.meta_key = '_sku'";
				$value = $wpdb->esc_like($data_to_filter['product_sku_val']);
				switch ($data_to_filter['product_sku']) {
					case 'start_with':
						$query .= " AND postmeta.meta_value LIKE %s";
						$params[] = $value . '%';
						break;
					case 'end_with':
						$query .= " AND postmeta.meta_value LIKE %s";
						$params[] = '%' . $value;
						break;
					case 'contains':
						$query .= " AND postmeta.meta_value LIKE %s";
						$params[] = '%' . $value . '%';
						break;
					case 'not_contains':
						$query .= " AND postmeta.meta_value NOT LIKE %s";
						$params[] = '%' . $value . '%';
						break;
				}
			}
		
			if (!empty($data_to_filter['product_price']) && !empty($data_to_filter['product_price_val'])) {
				$query .= " AND postmeta.meta_key = '_price'";
				$price = floatval($data_to_filter['product_price_val']);
				switch ($data_to_filter['product_price']) {
					case '>':
						$query .= " AND CAST(postmeta.meta_value AS DECIMAL) > %f";
						$params[] = $price;
						break;
					case '<':
						$query .= " AND CAST(postmeta.meta_value AS DECIMAL) < %f";
						$params[] = $price;
						break;
					case '>=':
						$query .= " AND CAST(postmeta.meta_value AS DECIMAL) >= %f";
						$params[] = $price;
						break;
					case '<=':
						$query .= " AND CAST(postmeta.meta_value AS DECIMAL) <= %f";
						$params[] = $price;
						break;
					case '==':
						$query .= " AND CAST(postmeta.meta_value AS DECIMAL) = %f";
						$params[] = $price;
						break;
					case '!=':
						$query .= " AND CAST(postmeta.meta_value AS DECIMAL) != %f";
						$params[] = $price;
						break;
				}
			}
		
			if (!empty($data_to_filter['exclude_products'])) {
				$ids = implode(',', array_map('intval', $data_to_filter['exclude_products']));
				$query .= " AND posts.ID NOT IN (%s)";
				$params[] = $ids;
			}
		
			$query .= " GROUP BY posts.ID";
		
			$prepared_query = $wpdb->prepare($query, $params);
			$results = $wpdb->get_results($prepared_query);
		
			$ids = [];
			if ($results) {
				$ids = wp_list_pluck($results, 'ID');
			}
		
			return $ids;
		}
		
        
    }  

endif; // End if class_exists check.