<?php
/**
 * Product Model for Stock Sync with Google Sheet for WooCommerce.
 *
 * @package StockSyncWithGoogleSheetForWooCommerce
 * @since 1.0.0
 */
// Namespace.
namespace StockSyncWithGoogleSheetForWooCommerce;

// Exit if accessed directly.
defined('ABSPATH') || exit;

if ( ! class_exists('\StockSyncWithGoogleSheetForWooCommerce\Product') ) {

	/**
	 * Product Model for Stock Sync with Google Sheet for WooCommerce.
	 *
	 * @package StockSyncWithGoogleSheetForWooCommerce
	 * @since 1.0.0
	 */
	class Product extends Base {

		/**
		 * Utilities Trait to use in all classes globally.
		 */
		use Utilities;

		/**
		 * Get raw data from database.
		 *
		 * @param array $ids Product ids.
		 * @return mixed
		 */
		public function get_raw_data( array $ids = null, $offset = 0, $batch_size = 0, array $product_type = [ 'product', 'product_variation' ], $status_active = true ) {
			global $wpdb;
			$quoted_product_types = array_map(function ( $type ) {
				return "'" . esc_sql($type) . "'";
			}, $product_type);

			$column = new Column();

			$fields = $column->get_queryable_fields();

			$main_table = $wpdb->prefix . 'posts';

			$query  = 'SELECT ';
			$query .= implode(', ', array_map(function ( $field ) use ( $main_table ) {
				return "$main_table.$field";
			}, $fields));

			/**
			 * From post meta table
			 */
			$post_meta_table = $wpdb->prefix . 'postmeta';
			$atum_table = $wpdb->prefix . 'atum_product_data';
			$meta_fields     = $column->get_queryable_metas();

			if ( $meta_fields && count($meta_fields) > 0 ) {
				$query .= ', ';

				$meta_query = [];

				foreach ( $meta_fields as $meta_field_key => $meta_field ) {
					$meta_field_key_name = str_replace([ '-', ' ', ',', '.', '?' ], '_', $meta_field_key);
					$escaped_meta_field_key = $wpdb->prepare('%s', $meta_field_key);
					$check_atum_exists = ssgsw_check_atum_key_exits($meta_field_key_name);
					if ( $check_atum_exists ) {
						if ( ssgsw_is_atum_plugin_active() ) {
							$new_atum_key = ssgsw_find_atum_key_from_table($meta_field_key_name);
							if ( $new_atum_key ) {
								$meta_query[] = "(SELECT {$atum_table}.{$new_atum_key} FROM $atum_table WHERE $atum_table.product_id = $main_table.ID LIMIT 1) as $meta_field_key_name";
							} else {
								$meta_query[] = "(SELECT {$post_meta_table}.meta_value FROM $post_meta_table WHERE $post_meta_table.post_id = $main_table.ID AND $post_meta_table.meta_key = $escaped_meta_field_key LIMIT 1) as $meta_field_key_name";
							}
						} else {
							$meta_query[] = "(SELECT {$post_meta_table}.meta_value FROM $post_meta_table WHERE $post_meta_table.post_id = $main_table.ID AND $post_meta_table.meta_key = $escaped_meta_field_key LIMIT 1) as $meta_field_key_name";
						}
					} else {
						if ( 'product_image' === $meta_field_key ) {
							$file_key = '_wp_attached_file';
							$thubnail_key = '_thumbnail_id';
							$meta_query[] = "(
								SELECT pms.meta_value
								FROM {$post_meta_table} ims
								LEFT JOIN {$post_meta_table} pms ON ims.meta_value = pms.post_id AND pms.meta_key = '{$file_key}'
								WHERE ims.post_id = {$main_table}.ID
								AND ims.meta_key = '{$thubnail_key}'
								LIMIT 1
							) AS {$meta_field_key_name}";
						} else {
							$meta_query[] = "(SELECT {$post_meta_table}.meta_value FROM $post_meta_table WHERE $post_meta_table.post_id = $main_table.ID AND $post_meta_table.meta_key = $escaped_meta_field_key LIMIT 1) as $meta_field_key_name";
						}
					}
				}
				$attribute_keys = ssgsw_get_product_attribute_keys();
				if(is_array($attribute_keys) && !empty($attribute_keys)) {
					foreach ($attribute_keys as $attribute_key) {
						$escaped_meta_key = $wpdb->prepare('%s', $attribute_key->meta_key);
						$meta_query[] = "(SELECT {$post_meta_table}.meta_value FROM {$post_meta_table} WHERE {$post_meta_table}.post_id = {$main_table}.ID AND {$post_meta_table}.meta_key = $escaped_meta_key LIMIT 1) AS $escaped_meta_key";
					}
				}
				
				$query .= implode(', ', $meta_query);
			}

			/**
			 * From taxonomy table
			 */

			$taxonomy_fields = $column->get_queryable_taxonomies();

			if ( $taxonomy_fields && count($taxonomy_fields) > 0 ) {
				$query .= ', ';
				$query .= implode(', ', array_map(function ( $field ) use ( $main_table, $wpdb ) {
					return "(SELECT GROUP_CONCAT(CONCAT_WS(':' , t.term_id, t.name)) FROM $wpdb->term_relationships tr INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN $wpdb->terms t ON t.term_id = tt.term_id WHERE tr.object_id = $main_table.ID AND tt.taxonomy = '$field' LIMIT 1)  as $field";
				}, $taxonomy_fields));

					// error_log( print_r( $taxonomy_fields, true ) );
			}

			$relations = $column->get_queryable_relations();

			// order lookup.
			$status = apply_filters( 'ssgswc_wc_order_product_lookup_status', [ 'wc-completed', 'wc-processing', 'wc-hold', 'wc-refunded' ] );

			$order_data_storage_option = get_option('woocommerce_custom_orders_table_enabled');
			if ( 'yes' === $order_data_storage_option ) {
				foreach ( $relations as $relation ) {
					switch ( $relation ) {
						case 'total_sales':
							$status = implode("','", $status);
							$query .= ", (SELECT SUM( order_item_meta__qty.meta_value ) FROM {$wpdb->prefix}woocommerce_order_itemmeta AS order_item_meta__qty
							INNER JOIN {$wpdb->prefix}woocommerce_order_items AS order_items ON order_items.order_item_id = order_item_meta__qty.order_item_id
							INNER JOIN {$wpdb->prefix}wc_orders AS posts ON posts.id = order_items.order_id
							WHERE posts.status IN ( '$status' ) AND posts.type = 'shop_order' AND order_item_meta__qty.meta_key = '_qty' AND order_item_meta__qty.order_item_id = order_items.order_item_id AND order_items.order_item_type = 'line_item' AND order_items.order_item_id IN ( SELECT order_item_id FROM {$wpdb->prefix}woocommerce_order_itemmeta AS order_item_meta__product_id WHERE order_item_meta__product_id.meta_key IN ( '_product_id', '_variation_id' ) AND order_item_meta__product_id.meta_value = $main_table.ID ) ) AS total_sales";

							break;

						default:
							break;
					}
				}
			} else {
				foreach ( $relations as $relation ) {
					switch ( $relation ) {
						case 'total_sales':
							$status = implode("','", $status);
							$query .= ", (SELECT SUM( order_item_meta__qty.meta_value ) FROM {$wpdb->prefix}woocommerce_order_itemmeta AS order_item_meta__qty
							INNER JOIN {$wpdb->prefix}woocommerce_order_items AS order_items ON order_items.order_item_id = order_item_meta__qty.order_item_id
							INNER JOIN {$wpdb->prefix}posts AS posts ON posts.ID = order_items.order_id
							WHERE posts.post_status IN ( '$status' ) AND posts.post_type = 'shop_order' AND order_item_meta__qty.meta_key = '_qty' AND order_item_meta__qty.order_item_id = order_items.order_item_id AND order_items.order_item_type = 'line_item' AND order_items.order_item_id IN ( SELECT order_item_id FROM {$wpdb->prefix}woocommerce_order_itemmeta AS order_item_meta__product_id WHERE order_item_meta__product_id.meta_key IN ( '_product_id', '_variation_id' ) AND order_item_meta__product_id.meta_value = $main_table.ID ) ) AS total_sales";

							break;

						default:
							break;
					}
				}
			}

				$query .= " From $main_table";

				// Includes variations.
				$query .= " WHERE $main_table.post_type IN (" . implode(',', $quoted_product_types) . ')';
			if ( $status_active ) {
				$statuses = ssgsw_status_formating_funcions();
				// Not deleted.
				if ( ! empty($statuses) ) {
					$status_placeholder = implode(',', array_fill(0, count($statuses), '%s'));
					$query .= $wpdb->prepare(
						" AND $main_table.post_status IN ($status_placeholder)",
						...$statuses
					);
				}
			}
				// Conditional by in ID.
			if ( $ids && count($ids) > 0 ) {
				$query .= " AND $main_table.ID IN (" . implode(',', $ids) . ')';
			}

				// Avoid duplicating IDs.
				$query .= " GROUP BY $main_table.ID ";

				// Order and Order By.
				$order    = esc_sql( apply_filters( 'ssgs_product_order', 'ASC' ) );
				$order_by = esc_sql( apply_filters( 'ssgs_product_order_by', 'post_date' ) );

				$query .= "ORDER BY $main_table.$order_by $order";

				/**
				 * Set limit
				 */
				$limit = apply_filters('ssgsw_product_limit', 100);
			if ( $limit ) {
				if ( $batch_size ) {
					$query .= $wpdb->prepare( ' LIMIT %d OFFSET %d', $batch_size, $offset );
				} else {
					$query .= $wpdb->prepare( ' LIMIT %d OFFSET %d', $limit, $offset );
				}
			} else {
				if ( $batch_size ) {
					$query .= $wpdb->prepare( ' LIMIT %d OFFSET %d', $batch_size, $offset );
				}
			}
			// phpcs:ignore
			$results = $wpdb->get_results( $query ); // db call ok; no-cache ok.
			if ( $wpdb->last_error ) {
				return $wpdb->last_error;
			}

			return $results;
		}


		/**
		 * Generate Product URL
		 */
		public function generate_product_url( $row ) {
			$p_id = $row['ID'];
			return get_permalink($p_id);
		}
		/**
		 * Get Formatted Data.
		 *
		 * @param array $ids Product IDs.
		 * @param array $sheets_info sheets_info sheets_info.
		 * @param mixed $formula formula info.
		 * @return mixed
		 */
		public function get_formatted_data( $ids = null, $sheets_info = [], $formula = false, $offset = 0, $batch_size = 0, array $product_type = [ 'product', 'product_variation' ], $status_active = true ) {
			$raw_data = $this->get_raw_data($ids, $offset, $batch_size, $product_type, $status_active);
			if ( ! $raw_data || count($raw_data) === 0 ) {
				return false;
			}
			$column = new Column();
			$keys   = $column->get_column_keys();
			foreach ( $keys as &$value ) {
				$value = str_replace([ '-', ' ', ',', '.', '?' ], '_', $value);
			}
			// error_log( print_r( $keys, true ) );

			$formatted_data = array_map(function ( $row ) use ( $keys ) {
				$formatted_row = [];
				foreach ( $keys as $key ) {

					$formatted_row[ $key ] = apply_filters('ssgs_get_column', $row->$key, $key, $row);
				}
				if ( '_stock_status' === $key ) {
					unset($formatted_row[ $key ]);
				}
				return $formatted_row;
			}, $raw_data);

			$formatted_data = apply_filters('ssgsw_format_columns_data', $formatted_data, $sheets_info, $formula );
			if ( is_array($formatted_data) && ! empty($formatted_data) && array_key_exists('ID',$formatted_data[0]) ) {
				$formatted_data = array_map(function ( $row ) { //phpcs:ignore
					if ( array_key_exists( 'product_image', $row) && ! empty($row['product_image']) ) {
						$image_url_convart = $row['product_image'];
						$base_url = wp_upload_dir()['baseurl'];
						$absolute_url = trailingslashit($base_url) . ltrim($image_url_convart, '/');
						$row['product_image'] = '=IMAGE("' . $absolute_url . '")';
						return array_values( (array) $row);
					} else {
						return array_values( (array) $row);
					}
				}, $formatted_data);
			}
			return $formatted_data;
		}

		/**
		 * Sync all products.
		 *
		 * @return mixed
		 */
		public function sync_batch_all( $offset, $batch_size, $new_index = 1 ) {
			$data_divided = $this->get_batch_products($offset, $batch_size, $new_index);
			$data = isset($data_divided[0]) ? $data_divided[0] : array();
			if ( ! ssgsw_is_license_valid() ) {
				$data = $this->get_first_100_elements($data);
			}
			$data_count = count($data);
			$google_sheet = new Sheet();
			$updated = $google_sheet->append_batch_product_to_sheet($data, $offset, $new_index );
			$update_value = wp_validate_boolean( $updated );
			if ( ! $update_value ) {
				$updated = $google_sheet->append_batch_product_to_sheet($data, $offset, $new_index );
				$update_value = wp_validate_boolean( $updated );
			}

			if (0 == $offset ) { //phpcs:ignore
				$data_count = $data_count - 1;
				$post_status       = true === wp_validate_boolean( get_option('ssgsw_show_product_status', false) );
				if ( $post_status && ssgsw_is_license_valid() ) {
					$google_colmun = new Column();
					$new_colmun = count($google_colmun->get_column_names());
					$dropdown = ssgsw_get_all_product_statuses();
					$status_count = count($dropdown);
					$sync = $google_sheet->update_google_sheet_dropdowns(false, $new_colmun - 1, $new_colmun, $dropdown );
					if ( ! $sync ) {
						$sync = $google_sheet->update_google_sheet_dropdowns(false, $new_colmun - 1, $new_colmun, $dropdown );
					}

					update_option('ssgsw_product_status_count', $status_count );
				}
			}
			return [
				'count' => $data_count,
				'success' => $update_value,
			];
		}
		/**
		 * Get the first 100 elements of an array.
		 *
		 * This function takes an array as input and returns a new array containing
		 * the first 100 elements. If the array has fewer than 100 elements, it
		 * returns all the available elements.
		 *
		 * @param array $array The input array from which the first 100 elements will be extracted.
		 *
		 * @return array A new array containing the first 100 elements of the input array.
		 */
		public function get_first_100_elements( $array ) {
			return array_slice($array, 0, 100);
		}

		/**
		 * Get All Products.
		 *
		 * @param array $ids List of ids.
		 * @param array $sheet  sheet info.
		 * @return array
		 */
		public function get_batch_products( $offset, $batch_size, $new_index = 1 ) {
			$sheets_info = [];
			$check_forumla_active = get_option('ssgsw_formula_active', false);
			if (0 == $offset) { //phpcs:ignore
				if ( $check_forumla_active ) {
					if ( empty($sheets_info) ) {
						$sheet = new Sheet();
						$sheets_info = $sheet->get_formula_value();
					}
					if ( empty($sheets_info) ) {
						$sheet = new Sheet();
						$sheets_info = $sheet->get_formula_value();
					}
				}
				ssgsw_save_sheet_data_to_transient($sheets_info);
			} else {
				$sheets_info = ssgsw_get_sheet_data_from_transient();
			}

			$formatted_data = $this->get_formatted_data(null, $sheets_info, false, $offset, $batch_size, [ 'product' ]);
			$new_format_store = [];
			if ( is_array($formatted_data) && ! empty($formatted_data) ) {
				foreach ( $formatted_data as $value ) {
					$new_format_store[] = $value;
					if ( isset($value['1']) && 'Variable' === $value['1'] ) {
						$child_ids = $this->get_children_id($value['0']);
						if ( ! empty($child_ids) ) {
							$formatted_data_variation = $this->get_formatted_data($child_ids, $sheets_info, false, 0, 0, [ 'product_variation' ]);
							if ( is_array($formatted_data_variation) && ! empty($formatted_data_variation) ) {
								foreach ( $formatted_data_variation as $variation ) {
									$new_format_store[] = $variation;
								}
							}
						}
					}
				}
			}
			if(0 == $offset) { //phpcs:ignore
				$columns = new Column();
				$headers = $columns->get_column_names();
				if ( $new_format_store && count($new_format_store) > 0 ) {
					array_unshift($new_format_store, $headers);
				}
			}
			return [ $new_format_store ];
		}


		/**
		 * Get All Products.
		 *
		 * @param array $ids List of ids.
		 * @param array $sheet  sheet info.
		 * @return array
		 */
		public function get_single_product( $ids = [], $sheet = [], $check_status = true ) {
			$formatted_data = $this->get_formatted_data($ids, $sheet, true, 0, 0, [ 'product', 'product_variation' ], $check_status);
			$columns = new Column();
			$headers = $columns->get_column_names();

			if ( $formatted_data && count($formatted_data) > 0 ) {
				array_unshift($formatted_data, $headers);
			}

			return $formatted_data;
		}
		/**
		 * Get All Products.
		 *
		 * @return array
		 */
		public function get_all_products() {

			$formatted_data = $this->get_formatted_data();

			$columns = new Column();
			$headers = $columns->get_column_names();

			if ( $formatted_data && count($formatted_data) > 0 ) {
				array_unshift($formatted_data, $headers);
			}

			return $formatted_data;
		}
		/**
		 * Get first sheets data and compare id exits and resturn range
		 *
		 * @param mixed $id product id.
		 * @param mixed $data first sheets data.
		 * @param mixed $sheet_ob object.
		 *
		 * @return mixed
		 */
		public function find_out_range( $id, $data, $sheet_ob ) {
			$matching_row_index = null;
			if ( is_array( $data ) && ! empty( $data ) ) {
				$matching_row_index = $this->find_out_range_row($data, $id );
			} else {
				$data = $sheet_ob->get_formula_value();
				if ( is_array( $data ) && ! empty( $data ) ) {
					$matching_row_index = $this->find_out_range_row( $data, $id );
				}
			}
			return $matching_row_index;
		}
		/**
		 * Get first sheets data and compare id exits and resturn range
		 *
		 * @param mixed $id product id.
		 * @param mixed $data first sheets data.
		 * @param mixed $sheet_ob object.
		 * @param mixed $product_name object.
		 *
		 * @return mixed
		 */
		public function find_out_range2( $id, $data, $sheet_ob, $product_name ) {
			$matching_row_index = [
				'range' => null,
				'name' => null,
			];
			if ( is_array( $data ) && ! empty( $data ) ) {
				$matching_row_index = $this->find_out_range_row2($data, $id, $product_name );
			} else {
				$data = $sheet_ob->get_formula_value();
				if ( is_array( $data ) && ! empty( $data ) ) {
					$matching_row_index = $this->find_out_range_row2( $data, $id, $product_name );
				}
			}
			return $matching_row_index;
		}
		/**
		 * Find out row key form google sheets info
		 *
		 * @param array $data sheet information.
		 * @param mixed $id product id.
		 *
		 * @return mixed
		 */
		public function find_out_range_row( $data, $id ) {
			$new_index = null;
			foreach ( $data as $row => $row_data ) {
				if ( is_array($row_data) && array_key_exists( 0, $row_data ) ) {
					if ( $row_data[0] == $id ) { //phpcs:ignore
						$new_index = $row + 1;
						break;
					}
				}
			}
			return $new_index;
		}
		/**
		 * Find out row key form google sheets info
		 *
		 * @param array $data sheet information.
		 * @param mixed $id product id.
		 * @param mixed $name product name.
		 *
		 * @return mixed
		 */
		public function find_out_range_row2( $data, $id, $name ) {
			$new_index = [
				'range' => null,
				'name'  => null,
			];
			foreach ( $data as $row => $row_data ) {
				if ( is_array($row_data) && array_key_exists( 0, $row_data ) ) {
					if ( $row_data[0] == $id ) { //phpcs:ignore
						$new_index['range'] = $row + 1;
						if ( $row_data[2] !== $name ) {
							$new_index['name'] = true;
						}
						break;
					}
				}
			}
			return $new_index;
		}
		/**
		 * Update delete and append product in google sheets check by id
		 *
		 * @param mixed  $product_id product id.
		 * @param string $type update type.
		 * @param string $type2 update type2.
		 * @param array  $sheets sheets value.
		 *
		 * @return boolean
		 */
		public function batch_update_delete_and_append( $product_id, $sheets = [] ) {
			if ( ! $this->app->is_plugin_ready() ) {
				return __('Plugin is not ready to use.', 'stock-sync-with-google-sheet-for-woocommerce');
			}
			$sheet = new Sheet();
			$check_forumla_active = get_option('ssgsw_formula_active', false);
			if ( $check_forumla_active ) {
				if ( empty($sheets) ) {
					$sheets = $sheet->get_formula_value();
				}
			} else {
				if ( empty($sheets ) ) {
					$sheets = $sheet->get_first_columns();
				}
			}
			if ( empty($sheets ) ) {
				$sheets = $sheet->get_first_columns();
			}
			$filter_status = ssgsw_status_formating_funcions();
			$sheets_info = ssgsw_format_index_number($sheets);
			$product_status = ssgsw_check_post_status($product_id);
			if ( ! in_array($product_status, $filter_status) ) {
				$index_number = ssgsw_get_index_number_option($product_id, $sheets_info);
				if ( $index_number ) {
					$sheet->delete_single_row($index_number);
				}
			} else {
				$get_product = $this->get_single_product([ $product_id ], $sheets, false);
				if ( is_array( $get_product ) && ! empty( $get_product) ) {
					$product_type = isset($get_product[1][1]) ? $get_product[1][1] : 'Simple';
					if ( 'Variation' === $product_type ) {
						$find_range = ssgsw_get_temp_index_number_in_options($product_id, false, $product_type, $sheets_info);
					} else {
						$find_range = ssgsw_get_temp_index_number_in_options($product_id, true, $product_type, $sheets_info);
					}
					$product_info = isset($get_product['1']) ? $get_product['1'] : [];

					$this->update_sheet_data_with_temp_index( $find_range, $product_info, $product_type, $sheets );

					$column = new Column();
					$keys   = $column->get_column_keys();
					foreach ( $keys as &$value ) {
						$value = str_replace([ '-', ' ', ',', '.', '?' ], '_', $value);
					}
					if ( is_array($keys) && is_array($product_info) ) {
						$new_combaine = array_combine($keys, $product_info);
						ssgsw_insert_update_product_information($product_id, $new_combaine, 'Wordpress' );
					}
				}
			}

			return true;
		}
		/**
		 * Find out row key form google sheets info
		 *
		 * @param array $data sheet information.
		 * @param mixed $id product id.
		 *
		 * @return mixed
		 */
		public function find_out_range_new_data( $start_index, $data, $id ) {
			$new_index = null;
			foreach ( $data as $row => $row_data ) {
				if ( is_array($row_data) && array_key_exists( 0, $row_data ) ) {
					if ( $row_data[0] == $id ) { //phpcs:ignore
						$new_index = $start_index;
						break;
					}
				}
				$start_index++;
			}
			return $new_index;
		}

		/**
		 * Update Sheet data with temp index
		 */
		public function update_sheet_data_with_temp_index( $find_range, $values, $product_type = 'parent', $sheets = [] ) {
			$sheet = new Sheet();
			$index_number = isset($find_range['index_number']) ? $find_range['index_number'] : false;
			

			$increment = isset($find_range['increment']) ? $find_range['increment'] : false;
		
			if ('Variation' == $product_type) { //phpcs:ignore
				$product_type = 'child';
			}
			if ( $index_number && $increment ) {
				$license_active = ssgsw_is_license_valid();
				$permission = true;
				if ( ! $license_active ) {
					if ( empty($sheets) ) {
						$sheets = $sheet->get_formula_value();
					}
					$sheet_count = $this->sheet_row_count( $sheet, $sheets );
					if ( $sheet_count < 101 && $sheet_count != 0 ) { //phpcs:ignore
						$permission = true;
					} else {
						$permission = false;
					}
				}
				if ( $permission ) {
					$shift_middile = $sheet->insert_data_into_google_sheet($index_number, [ $values ]);
					if ( ! $shift_middile ) {
						$shift_middile = $sheet->insert_data_into_google_sheet($index_number, [ $values ]);
					}
				}
			} else if ( $index_number ) {
				$update = $sheet->update_single_row_values($index_number, $values);
				if ( ! $update ) {
					$update = $sheet->update_single_row_values($index_number, $values);
				}
			} else {
				$license_active = ssgsw_is_license_valid();
				$permission = true;
				if ( ! $license_active ) {
					if ( empty($sheets) ) {
						$sheets = $sheet->get_formula_value();
					}
					$sheet_count = $this->sheet_row_count( $sheet, $sheets );
					if ( $sheet_count < 101 && $sheet_count != 0 ) { //phpcs:ignore
						$permission = true;
					} else {
						$permission = false;
					}
				}
				if ( $permission ) {
					$new_index = $sheet->append_new_row($values);
					if ( ! $new_index ) {
						$new_index = $sheet->append_new_row($values);
					}
				}
			}
		}
		/**
		 * Update delete and append product in google sheets check by id
		 *
		 * @param mixed  $product_id product id.
		 * @param string $type update type.
		 * @param string $type2 update type2.
		 * @param array  $sheets sheets value.
		 *
		 * @return boolean
		 */
		public function batch_update_delete_and_append_for_sheet( $product_id, $type = 'update', $type2 = 'test', $sheets = [] ) {
			if ( ! $this->app->is_plugin_ready() ) {
				return __('Plugin is not ready to use.', 'stock-sync-with-google-sheet-for-woocommerce');
			}
			$sheet = new Sheet();
			$get_product = $this->get_single_product([ $product_id ], $sheets, false);
			if ( is_array( $get_product ) && ! empty( $get_product) ) {
				$get_product_name = $get_product[1][2];
				$product_type = $get_product[1][1];
				$find_range = $this->find_out_range2($product_id, $sheets, $sheet, $get_product_name);
				$range_value = $find_range['range'];
				if ( 'Variable' === $product_type ) {
					$child_product_ids = $this->get_children_id($product_id);
					if ( is_array( $child_product_ids ) && ! empty( $child_product_ids ) ) {
						foreach ( $child_product_ids as $child_id ) {
							$get_products = $this->get_single_product([ $child_id ], $sheets, false);
							$find_ranges = $this->find_out_range($child_id, $sheets, $sheet);
							$this->variable_product_formating_sync_method($type, $type2, $find_ranges, $sheet, $sheets, $get_products );
						}
					}
				}
				$this->variable_product_formating_sync_method($type, $type2, $range_value, $sheet, $sheets, $get_product );
			} else {
				$find_range = $this->find_out_range($product_id, $sheets, $sheet);
				if ( $find_range !== null ) { //phpcs:ignore
					return $sheet->delete_single_row($find_range);
				}
			}
			return false;
		}
		/**
		 * Update delete and append product in google sheets check by id
		 *
		 * @param mixed  $product_id product id.
		 * @param string $type update type.
		 * @param string $type2 update type2.
		 * @param array  $sheets sheets value.
		 *
		 * @return boolean
		 */
		public function batch_update_delete_and_append2( $product_id, $sheets = [] ) {
			if ( ! $this->app->is_plugin_ready() ) {
				return __('Plugin is not ready to use.', 'stock-sync-with-google-sheet-for-woocommerce');
			}
			$sheet = new Sheet();
			$check_forumla_active = get_option('ssgsw_formula_active', false);
			if ( $check_forumla_active ) {
				if ( empty($sheets) ) {
					$sheets = $sheet->get_formula_value();
				}
			} else {
				if ( empty($sheets ) ) {
					$sheets = $sheet->get_first_columns();
				}
			}
			if ( empty($sheets ) ) {
				$sheets = $sheet->get_first_columns();
			}
			$sheets_info = ssgsw_format_index_number($sheets);
			$filter_status = ssgsw_status_formating_funcions();

			$product_status = ssgsw_check_post_status($product_id);
			$collection_index_number = [];

			$get_product = $this->get_single_product([ $product_id ], $sheets, false);

			if ( is_array( $get_product ) && ! empty( $get_product) ) {
				$product_type = isset($get_product[1][1]) ? $get_product[1][1] : '';
				$product_info = isset($get_product[1]) ? $get_product[1] : [];
				if ( ! in_array($product_status, $filter_status) ) {
					$index_number = ssgsw_get_index_number_option($product_id, $sheets_info);
					if ( $index_number ) {
						$collection_index_number[] = $index_number;
					}
				} else {
					if ( $product_type === 'Variation' ) {
						$find_range = ssgsw_get_temp_index_number_in_options($product_id, false, $product_type, $sheets_info);
					} else {
						$find_range = ssgsw_get_temp_index_number_in_options($product_id, true, $product_type, $sheets_info);
					}
					$this->update_sheet_data_with_temp_index($find_range, $product_info, $product_type, $sheets );
					$column = new Column();
					$keys   = $column->get_column_keys();
					foreach ( $keys as &$value ) {
						$value = str_replace([ '-', ' ', ',', '.', '?' ], '_', $value);
					}
					if ( is_array($keys) && is_array($product_info) ) {
						$new_combaine = array_combine($keys, $product_info);
						ssgsw_insert_update_product_information($product_id, $new_combaine, 'Wordpress' );
					}
				}
				if ( 'Variable' === $product_type ) {
					$child_product_ids = $this->get_children_id($product_id);
					if ( is_array( $child_product_ids ) && ! empty( $child_product_ids ) ) {
						foreach ( $child_product_ids as $child_id ) {
							$product_status = ssgsw_check_post_status($child_id);
							if ( ! in_array($product_status, $filter_status) ) {
								$index_number = ssgsw_get_index_number_option($child_id, $sheets_info);
								if ( $index_number ) {
									$collection_index_number[] = $index_number;
								}
							} else {
								$find_ranges = ssgsw_get_temp_index_number_in_options($child_id, false, 'child', $sheets_info);
								$get_products = $this->get_single_product([ $child_id ], $sheets, false);
								$product_info = isset($get_products['1']) ? $get_products['1'] : [];
								$this->update_sheet_data_with_temp_index($find_ranges, $product_info, 'child', $sheets );
								if ( is_array($keys) && is_array($product_info) ) {
									$new_combaine = array_combine($keys, $product_info);
									ssgsw_insert_update_product_information($product_id, $new_combaine, 'Wordpress' );
								}
							}
						}
					}
				}
				if ( ! empty($collection_index_number) ) {
					$sheet->delete_batch_rows($collection_index_number);
				}
			}
			return false;
		}
		/**
		 * Delete product from the sheet
		 *
		 * @return boolean
		 */
		public function delete_product_from_sheet( $post_id ) {
			$sheet = new Sheet();
			$sheets = $sheet->get_first_columns();
			if ( empty($sheets) ) {
				$sheets = $sheet->get_first_columns();
			}
			$sheets_info = ssgsw_format_index_number($sheets);
			$existing_number = ssgsw_get_temp_index_number_in_options($post_id, $sheets_info);
			$index_number = $existing_number['index_number'];
			if ( $index_number ) {
				$deleted = $sheet->delete_single_row($index_number);
				if ( ! $deleted ) {
					$deleted = $sheet->delete_single_row($index_number);
				}
			}
		}
		/**
		 * Retrieve children id for product
		 *
		 * @param int $product_id product id.
		 *
		 * @return array product IDs
		 */
		public function get_children_id( $product_id ) {
			global $wpdb;
			$child_product_ids = $wpdb->get_col(
				$wpdb->prepare(
					"
					SELECT ID
					FROM {$wpdb->posts}
					WHERE post_parent = %d
					AND (post_type = 'product' OR post_type = 'product_variation')
					",
					$product_id
				)
			);
			return $child_product_ids;
		}

		/**
		 * Variable product formating and sync method
		 *
		 *  @param mixed $type product type.
		 *  @param mixed $type2 product type.
		 *  @param mixed $find_range range of the product.
		 *  @param mixed $sheet google sheet.
		 *  @param mixed $sheets google sheet.
		 *  @param mixed $get_product get the products.
		 *
		 *  @return mixed different value
		 */
		public function variable_product_formating_sync_method( $type, $type2, $find_range, $sheet, $sheets, $get_product ) {
			if ( 'update' == $type && null == $find_range ) { //phpcs:ignore
				$license_active = ssgsw_is_license_valid();
				if ( ! $license_active ) {
					$sheet_count = $this->sheet_row_count( $sheet, $sheets );
					if ( $sheet_count < 101 && $sheet_count != 0 ) { //phpcs:ignore
						return $sheet->append_new_row( $get_product[1], $type2 );
					}
				} else {
					if ( is_array( $get_product ) && array_key_exists( '1', $get_product ) ) {
						return $sheet->append_new_row( $get_product[1], $type2 );
					}
				}
			} else {
				if ( $find_range != null ) { //phpcs:ignore
					if ( 'update' == $type ) { //phpcs:ignore
						return $sheet->update_single_row_values($find_range,$get_product[1]);
					} else {
						return $sheet->delete_single_row($find_range);
					}
				}
			}
		}
		/**
		 * Update product data from API without check index number
		 *
		 * @param mixed $find_range number of index.
		 * @param mixed $product_id product identifier.
		 * @param array $sheets sheets object.
		 * @return mixed
		 */
		public function update_single_product_data_to_sheet( $find_range, $product_id, $sheets = [] ) {
			$get_products = $this->get_single_product([ $product_id ], $sheets, false );
			$sheet = new Sheet();
			$sheet->update_single_row_values($find_range, $get_products[1] );
		}
		/**
		 * Check how many rows exits in sheet
		 *
		 * @param object $sheet_ob object.
		 * @param array  $sheets information.
		 *
		 * @return int number of rows
		 */
		public function sheet_row_count( $sheet_ob, $sheets ) {
			$sheet_count = 0;
			if ( is_array($sheets) && ! empty( $sheets ) ) {
				$sheet_count = count($sheets);
			}
			if ( 0 === $sheet_count ) {
				$sheets_info = $sheet_ob->get_formula_value();
				if ( is_array( $sheets_info ) && ! empty( $sheets_info ) ) {
					$sheet_count = count($sheets_info);
				}
			}
			return $sheet_count;
		}
		/**
		 * Sync all products.
		 *
		 * @return mixed
		 */
		public function sync_all() {

			if ( ! $this->app->is_plugin_ready() ) {
				return __('Plugin is not ready to use.', 'stock-sync-with-google-sheet-for-woocommerce');
			}

			$data = $this->get_all_products();

			if ( ! $data || count($data) === 0 ) {

				return sprintf(
					'%s <a style="text-decoration:none;" href="%s">%s <i class="ssgs-arrow-right"></i></a>',
					__('No products found!', 'stock-sync-with-google-sheet-for-woocommerce'),
					esc_url(admin_url('edit.php?post_type=product')),
					__('Add New Product', 'stock-sync-with-google-sheet-for-woocommerce')
				);
			}

			$google_sheet = new Sheet();

			$updated = $google_sheet->update_values('A1', $data);

			return wp_validate_boolean( $updated );
		}
		/**
		 * Prepare for batch update
		 */
		public function prepare_for_batch_update( $product_id, $value, $tag, $now_datetime, $wpdb ) {
			if ( is_object($value) ) {
				$value2 = (array) $value;
			}

			$product_informations = $value2;
			if ( isset($value2['ssgsw_extra_data_info']) ) {
				$product_informations = (array) $value2['ssgsw_extra_data_info'];
				unset($value2['ssgsw_extra_data_info']);
			}
			if ( is_array($product_informations) ) {
				$product_info = serialize($product_informations);
			}
			if ( is_array($value2) ) {
				$value = serialize($value2);
			}
			$query_values = '';
			$check_data = ssgsw_get_product_information_by_id($product_id);
			if ( ! empty($check_data) ) {
				$current_product_information = $check_data[0]['product_current_info'];
				$current_unserialized = unserialize($current_product_information);
				if ( $current_unserialized !== $value2 ) {
					$query_values = $wpdb->prepare(
						'(%d, %s, %s, %s, %s, %s, %s, %s, %s)',
						$product_id,
						$product_info,
						$value,
						$current_product_information,
						$check_data[0]['product_info_previous'],
						$tag,
						$check_data[0]['current_tag'],
						$check_data[0]['previous_tag'],
						$now_datetime
					);
				}
			} else {
				$query_values = $wpdb->prepare(
					"(%d, %s, %s, '', '', %s, '', '', %s)",
					$product_id,
					$product_info,
					$value,
					$tag,
					$now_datetime
				);
			}
			return $query_values;
		}
		/**
		 * Saves a batch of product information to the database with an "ON DUPLICATE KEY UPDATE" clause.
		 * This function allows for batch inserts or updates of product data in the database.
		 *
		 * @param array  $query_values An array of formatted query values for the SQL insert/update.
		 *                               Each value must be an array of values corresponding to the columns in the table.
		 * @param object $wpdb The global WordPress database object to interact with the database.
		 *
		 * @return bool Returns true if the query was successful, false otherwise.
		 */
		public function save_batch_informations( $query_values, $wpdb ) {
			// Ensure the query values are not empty.
			if ( empty( $query_values ) ) {
				return false;
			}
			$query_values = implode(', ', $query_values);
			// Prepare the SQL query for batch insert/update.
			$result = $wpdb->query("INSERT INTO {$wpdb->prefix}ssgsw_products 
			(product_id, product_information, product_current_info, product_info_previous, 
			 product_info_previous_2, current_tag, previous_tag, previous_tag_2, date)
			VALUES {$query_values}
			ON DUPLICATE KEY UPDATE 
				product_information = VALUES(product_information),
				product_current_info = VALUES(product_current_info),
				product_info_previous = VALUES(product_info_previous),
				product_info_previous_2 = VALUES(product_info_previous_2),
				current_tag = VALUES(current_tag),
				previous_tag = VALUES(previous_tag),
				previous_tag_2 = VALUES(previous_tag_2),
				date = VALUES(date);");
			// Execute the query and return the result (true if successful, false otherwise).
			return $result !== false;
		}

		/**
		 * Update bulk products from sheet.
		 *
		 * @param array $products Products.
		 * @param int   $sync_all_active sync_all_active.
		 * @param int   $product_length product_length.
		 * @param int   $custom_handle custom_handle.
		 * @return bool
		 **/
		public function chunk_product_update( array $products = [], $first_index = 2, $last_index = 2 ) {
			global $wpdb;
			$column  = new Column();
			// Checks if plugin is ready to use.
			$add_products_from_sheet = wp_validate_boolean(apply_filters('ssgsw_add_products_from_sheet', ssgsw_get_option('add_products_from_sheet')));
			$get_bulk_edit_option = wp_validate_boolean(ssgsw_get_option( 'bulk_edit_option'));
			$new_sheet = new Sheet();
			$sheets_info = $new_sheet->get_formula_value();
			if ( empty($sheets_info) ) {
				$sheets_info = $new_sheet->get_formula_value();
			}
			$filter_status = ssgsw_status_formating_funcions();
			$sheets_index = ssgsw_format_index_number($sheets_info);
			$collection_of_ids = [];
			$query_values = [];
			$collection_of_delete_row = [];
			$now_date = gmdate('Y-m-d H:i:s');
			foreach ( $products as $data ) {
				$data = (object) $data;
				$product_id = isset($data->ID) && $data->ID > 0 ? $data->ID : null;

				if ( $product_id ) {
					$product_exists = $wpdb->get_var($wpdb->prepare(
						"SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type IN (%s, %s) AND ID = %d",
						'product',
						'product_variation',
						$product_id
					));
					if ( ! $product_exists ) {
						continue;
					}
				}
				$product_data = [];
				if ( isset($data->name) ) {
					$product_data['post_title'] = isset($data->name) ? $data->name : '';
				}

				if ( $product_id ) {
					$collection_of_ids[] = $product_id;
					if ( isset($data->post_excerpt) ) {
						$product_data['post_excerpt'] = $data->post_excerpt;
					}
					if ( isset($data->post_content) ) {
						$product_data['post_content'] = $data->post_content;
					}

					if ( isset($data->Status) ) {
						$post_status_sheet = ! empty($data->Status) ? strtolower($data->Status) : 'publish';
						if ($post_status_sheet === 'pending review') {
							$post_status_sheet = 'pending';
						} elseif ($post_status_sheet === 'published') {
							$post_status_sheet = 'publish';
						}
						$product_data['post_status'] = $post_status_sheet;
						if ( ! in_array($post_status_sheet, $filter_status) ) {
							$collection_of_delete_row[] = isset($data->index_number) ? $data->index_number : null;
						}
					}
					if ( isset($data->Status) || isset($data->name) || isset($data->post_excerpt) || isset($data->post_content) ) {
						$wpdb->update($wpdb->posts, $product_data, array( 'ID' => $product_id ));
					}
				} else {
					if ( ! $add_products_from_sheet ) {
						return false;
					}
					$product_data['post_type'] = 'product';
					$product_data['post_status'] = 'publish';

					if ( isset($data->post_excerpt) && ! empty($data->post_excerpt) ) {
						$product_data['post_excerpt'] = $data->post_excerpt;
					} else {
						$product_data['post_excerpt'] = 'This is a simple product';
					}
					if ( isset($data->post_content) ) {
						$product_data['post_content'] = $data->post_content;
					}

					$product_id = ssgsw_wp_insert_post($product_data);
					if ( ! in_array('publish', $filter_status) ) {
						$collection_of_delete_row[] = isset($data->index_number) ? $data->index_number : null;
					}
					$collection_of_ids[] = $product_id;
					if ( ssgsw_is_atum_plugin_active() ) {
						ssgsw_insert_atum_table($product_id);
					}
					wp_set_object_terms($product_id, 'simple', 'product_type');
					$default_category = get_term_by('name', 'uncategorized', 'product_cat');
					if ( $default_category ) {
						wp_set_object_terms($product_id, $default_category->term_id, 'product_cat');
					}
					update_post_meta($product_id, '_visibility', 'visible');
					update_post_meta($product_id, '_stock_status', 'instock' );
				}

				if ( isset( $data->Image ) ) { //phpcs:ignore
					$this->process_google_sheets_image( $product_id, $data->Image ); //phpcs:ignore
				}
				if ( isset($data->regular_price) || isset($data->sale_price) ) {
					$this->update_product_prices($product_id, $data );
				}
				if(isset($data->category)) {
					$this->assign_existing_taxonomies_to_product($product_id, $data->category, 'product_cat');
				}
				if(isset($data->Tags)) {
					$this->assign_existing_taxonomies_to_product($product_id, $data->Tags, 'product_tag');
				}
				if ( isset( $data->sku ) ) {
					update_post_meta( $product_id, '_sku', $data->sku );
				}
				$variable_product = $this->is_variable_product($product_id);
				if(isset($data->attributes)) {
					$this->update_product_attributes($product_id, $data->attributes, $variable_product);
				}
				if ( isset($data->stock) ) {
					if ( is_numeric($data->stock) ) {
						update_post_meta($product_id, '_manage_stock', 'yes');
						if ( $data->stock > 0 ) {
							update_post_meta($product_id, '_stock_status', 'instock' );
							update_post_meta($product_id, '_stock', $data->stock);
							if ( $variable_product ) {
								$this->variation_product_stock_update_for_numaric_chank($product_id, $sheets_info, $sheets_index);
							}
						} else {
							update_post_meta($product_id, '_stock', $data->stock);
							$backorder_enable = get_post_meta($product_id, '_backorders', true);
							if ( 'yes' != $backorder_enable || ( isset($data->_backorders) && 'yes' != $data->_backorders ) ) { //phpcs:ignore
								update_post_meta($product_id, '_stock_status', 'outofstock');
							} else {
								update_post_meta($product_id, '_stock_status', 'onbackorder');
							}
							if ( $variable_product ) {
								$this->variation_product_stock_update_for_zero_chank($product_id, $data, $sheets_info, $sheets_index);
							}
						}
					} else {
						if ( $variable_product ) {
							update_post_meta($product_id, '_manage_stock', 'no');
							update_post_meta($product_id, '_stock', 0 );
							$stock_status = $column->get_stock_status($data->stock, true);
							if ( 'instock' === $stock_status || 'In Stock' === $stock_status ) {
								update_post_meta($product_id, '_stock_status', $stock_status );
								$this->variation_product_stock_update_for_numaric_chank($product_id, $sheets_info, $sheets_index);
							}
						} else {
							update_post_meta($product_id, '_manage_stock', 'no');
							update_post_meta($product_id, '_stock', 0 );
							$stock_status = $column->get_stock_status($data->stock, true);
							update_post_meta($product_id, '_stock_status', $stock_status );
						}
					}
				}

				$columns = $column->get_all_columns();
				foreach ( $data as $data_key => $data_value ) {
					foreach ( $columns as $key => $value ) {
						if ( $value['label'] === $data_key ) {
							if ( 'meta' === $value['type'] ) {
								if ( ! in_array($value['label'], $this->colleciton_of_meta_columns()) ) {
									if ( ssgsw_check_atum_key_exits($key) ) { //phpcs:ignore
										if ( ssgsw_is_atum_plugin_active() ) {
											ssgsw_update_atum_price($product_id, $key, $data_value);
										}
									} else {
										ssgsw_meta_field_value_save( $product_id, $key, $data_value );
									}
								}
							}
						}
					}
				}

				$this->clear_woocommerce_caches($product_id);
				$batch_table_info = $this->prepare_for_batch_update($product_id, $data, 'Sheet', $now_date, $wpdb);
				if ( $batch_table_info ) {
					$query_values[] = $batch_table_info;
				}

				if ( ! $get_bulk_edit_option ) {
					return false;
				}
			}
			$this->save_batch_informations($query_values, $wpdb);

			$delete_count = count($collection_of_delete_row);
			$id_count = count($collection_of_ids);
			if ( ! empty($collection_of_delete_row) && ( $delete_count === $id_count ) ) {
				$delete = $new_sheet->delete_single_row_batch($first_index, $last_index);
				if ( ! $delete ) {
					$new_sheet->delete_single_row_batch($first_index, $last_index);
				}
			} else if ( !empty($collection_of_delete_row) && ($delete_count != $id_count) ) { //phpcs:ignore
				if ( is_array($collection_of_ids) && ! empty($collection_of_ids) ) {
					$formatted_data = $this->get_formatted_data($collection_of_ids, $sheets_info, false, 0, 0, [ 'product','product_variation' ], false);
					$updated = $new_sheet->update_multiple_row_values($formatted_data, $first_index, $last_index );
					$update_value = wp_validate_boolean( $updated );
					if ( ! $update_value ) {
						$updated = $new_sheet->update_multiple_row_values($formatted_data, $first_index, $last_index );
						$update_value = wp_validate_boolean( $updated );
					}
				}
				$new_sheet->delete_batch_rows($collection_of_delete_row);
			} else {
				if ( is_array($collection_of_ids) && ! empty($collection_of_ids) ) {
					$formatted_data = $this->get_formatted_data($collection_of_ids, $sheets_info, false, 0, 0, [ 'product','product_variation' ], false);
					$updated = $new_sheet->update_multiple_row_values($formatted_data, $first_index, $last_index );
					$update_value = wp_validate_boolean( $updated );
					if ( ! $update_value ) {
						$updated = $new_sheet->update_multiple_row_values($formatted_data, $first_index, $last_index );
						$update_value = wp_validate_boolean( $updated );
					}
				}
			}

			$child_index = [];
			if ( is_array($collection_of_ids) && ! empty($collection_of_ids) ) {
				$last_product_id = end($collection_of_ids);
				$variable_product = $this->is_variable_product($last_product_id);
				if ( $variable_product ) {
					$parent_status = ssgsw_check_post_status($last_product_id);
					$child_product_ids = $this->get_children_id($last_product_id);
					if ( is_array( $child_product_ids ) && ! empty( $child_product_ids ) ) {
						$check_status = false;
						foreach ( $child_product_ids as $child_id ) {
							$child_status = ssgsw_check_post_status($child_id);

							if ( $parent_status !== $child_status ) {
								$check_status = true;
								$this->clear_woocommerce_caches($child_id);
							}
							$index_number_exits = ssgsw_get_index_number_option($child_id, $sheets_index);

							if ( $index_number_exits ) {
								if ( ! in_array($parent_status, $filter_status) ) {
									$child_index[] = $index_number_exits;
								} else {
									$get_products = $this->get_single_product([ $child_id ], $sheets_info, false);
									if ( is_array($get_products) && ! empty($get_products) ) {
										$this->variable_product_formating_sync_method('update', 'test', $index_number_exits, $new_sheet, $sheets_info, $get_products );
									}
								}
							}
						}
						if ( ! empty($child_index) ) {
							$new_sheet->delete_batch_rows($child_index);
						}
						if ( $check_status ) {
							ssgsw_batch_update_post_status($parent_status, $child_product_ids);
						}
					}
				}
			}
			unset($collection_of_delete_row);
			unset($products);
			unset($collection_of_ids);
			gc_collect_cycles();
			return true;
		}
		/**
		 * Updates product attributes in WooCommerce.
		 *
		 * This function processes API attribute data, formats it, and updates the product attributes
		 * in WooCommerce. It handles both simple and variable products.
		 *
		 * @param int    $product_id       The WooCommerce product ID.
		 * @param string $attributes       The raw API attribute string (e.g., "pa_a: f | l, amit: M | T |N").
		 * @param bool   $variable_product Whether the product is a variable product (true) or simple product (false).
		 *
		 * @return void
		 */
		public function update_product_attributes($product_id, $attributes, $variable_product) {
			$format_attr = $this->parse_api_attributes($attributes);
			
			
			if (!ssgsw_get_parent_id_by_child($product_id)) {
				$this->set_product_attributes_from_api($product_id, $format_attr, $variable_product);	
			} else {
				$get_parent_id = ssgsw_get_parent_id_by_child($product_id);
				
				$this->update_variation_attribute($product_id, $format_attr, $get_parent_id);
			}
		
		}
		/**
		 * Updates variation attributes and other meta data for a given variation.
		 *
		 * This function allows you to update both global (taxonomy-based) and custom product attributes
		 * for a given variation. It also allows updating other meta data related to the variation, such as price,
		 * stock status, and custom attributes. If a global attribute (taxonomy-based) is being updated, the function
		 * uses `wp_set_object_terms` to set the terms for the variation. For custom attributes, it uses `update_post_meta`.
		 *
		 * @param int $variation_id The ID of the variation to update.
		 * @param array $attribute_changes An associative array of attribute names and their new values.
		 *                                The array should be structured as follows:
		 *                                - Key: Attribute name (e.g., 'pa_color', 'pa_size', or a custom attribute like 'amit').
		 *                                - Value: The new value for the attribute (e.g., 'green', 'XL', 'T').
		 *                                Additional meta fields like 'price' and 'stock_status' can also be included.
		 *
		 * @example
		 * update_variation_data(456, [
		 *     'pa_color' => 'green',
		 *     'pa_size' => 'xl',
		 *     'amit' => 'T',
		 *     'pa_a' => 'f',
		 *     'price' => 20,
		 *     'stock_status' => 'instock',
		 * ]);
		 *
		 * @return void
		 */
		public function update_variation_attribute($variation_id, $attribute_changes, $parent_product_id) {
			if(is_array($attribute_changes) && !empty($attribute_changes)) {
				foreach ($attribute_changes as $attribute_name => $new_value) {
					
					if (strpos($attribute_name, 'pa_') === 0) {
						if (taxonomy_exists($attribute_name)) {
							// Get allowed terms from the parent product
							$parent_terms = wp_get_object_terms($parent_product_id, $attribute_name, ['fields' => 'slugs']);
						
							if (in_array($new_value, $parent_terms)) {
								$meta_key = 'attribute_' . $attribute_name;
								update_post_meta($variation_id, $meta_key, $new_value);
							}
						}
					} else {
						$meta_key = 'attribute_' . $attribute_name;
						$existing_value = get_post_meta($variation_id, $meta_key, true);
				
						if ($existing_value !== $new_value) {
							update_post_meta($variation_id, $meta_key, $new_value);
						}
					}
				}
			}
			
		}


		/**
		 * Parses attribute data from API format into an associative array.
		 *
		 * This function converts a raw API attribute string into a structured key-value array.
		 * It ensures attributes are properly formatted before processing.
		 *
		 * @param string $api_data The raw API attribute string (e.g., "pa_a: f | l, amit: M | T |N").
		 * @return void Prints the parsed attributes as an associative array.
		 */
		public function parse_api_attributes($api_data) {
			$attributes = [];
			$pairs = explode(',', $api_data);
			foreach ($pairs as $pair) {
				if (strpos($pair, ':') === false) {
					continue;
				}
				$parts = explode(':', $pair, 2);
				$key = trim($parts[0]);
				$value = trim($parts[1]);
				$attributes[$key] = $value;
			}
			return $attributes;
		}

		/**
		 * Sets product attributes from API data.
		 *
		 * This function processes attributes received from an API and assigns them to a WooCommerce product.
		 * It handles both global (taxonomy-based) and custom attributes.
		 *
		 * @param int   $product_id The WooCommerce product ID.
		 * @param array $attributes Associative array of attributes from the API. 
		 *                          Example: ['pa_a' => 'f | l', 'amit' => 'M | T | N']
		 *
		 * @return void
		 */
		public function set_product_attributes_from_api($product_id, $attributes, $is_variable = 0) {

			if (!$product_id) {
				return;
			}
			// $product_attributes = get_post_meta($product_id, '_product_attributes', true);
			// if (!is_array($product_attributes)) {
				$product_attributes = [];
			// }
			
			foreach ($attributes as $attribute_name => $values) {
				$values_array = array_map('trim', explode('|', $values));
				$is_global = strpos($attribute_name, 'pa_') === 0;
				if ($is_global) {
					if (taxonomy_exists($attribute_name)) {
						$exits_term = [];
						if (is_array($values_array) && !empty($values_array)) {
							foreach ($values_array as $term) {
								$term = trim($term);
								if (term_exists($term, $attribute_name)) {
									$exits_term[] = $term;
								}
							}
						}
						wp_set_object_terms($product_id, $exits_term, $attribute_name);
					}
				}
				if($is_global) {
					if (taxonomy_exists($attribute_name)) {
						$product_attributes[$attribute_name] = array(
							'name'         => $attribute_name, 
							'value'        => '',
							'position'     => 1,
							'is_visible'   => 1,
							'is_variation' => $is_variable,
							'is_taxonomy'  => $is_global ? 1 : 0,
						);
					}
				} else {
					
					$product_attributes[$attribute_name] = array(
						'name'         => $attribute_name, 
						'value'        => implode(' |', $values_array),
						'position'     => 1,
						'is_visible'   => 1,
						'is_variation' => $is_variable,
						'is_taxonomy'  => 0,
					);
					
				}
			}
			// Serialize the $product_attributes array before saving it
			update_post_meta($product_id, '_product_attributes', $product_attributes);

		}


		/**
		 * Assign existing WooCommerce product categories to a product based on API data.
		 *
		 * This function checks each category received from an API. If the category exists in the WooCommerce store,
		 * it assigns the category to the product. If the category doesn't exist, it is skipped. No new categories are created.
		 *
		 * @param int    $product_id    The ID of the WooCommerce product to which categories will be assigned.
		 * @param string $api_categories Comma-separated string of category names from the API.
		 */
		public function assign_existing_taxonomies_to_product($product_id, $taxonomies, $type) {
			$taxonomy = array_map('trim', explode(',', $taxonomies));
			$existing_taxonomy_ids = [];
			if ( is_array($taxonomy) && !empty($taxonomy)) {
				foreach ($taxonomy as $tax) {
					$term = get_term_by('name', $tax, $type);
					if ($term && !is_wp_error($term)) {
						$existing_taxonomy_ids[] = $term->term_id;
					}
				}
				if (!empty($existing_taxonomy_ids)) {
					wp_set_object_terms($product_id, $existing_taxonomy_ids, $type);
				}
			}
		}
			
		/**
		 * Update bulk products from sheet.
		 *
		 * @param array $products Products.
		 * @param int   $sync_all_active sync_all_active.
		 * @param int   $product_length product_length.
		 * @param int   $custom_handle custom_handle.
		 * @return bool
		 **/
		public function bulk_formula_update( array $products = [] ) {
			$GLOBALS['ssgs_sync_all_products'] = true;
			global $wpdb;
			$column  = new Column();
			$query_values = [];
			$now_date = gmdate('Y-m-d H:i:s');
			$new_sheet = new Sheet();
			$sheets_info = $new_sheet->get_formula_value();
			if ( empty($sheets_info) ) {
				$sheets_info = $new_sheet->get_formula_value();
			}
			$filter_status = ssgsw_status_formating_funcions();
			$sheets_index = ssgsw_format_index_number($sheets_info);
			$collection_of_delete_row = [];
			foreach ( $products as $data ) {
				$data = (object) $data;
				$product_id = isset($data->ID) && $data->ID > 0 ? $data->ID : null;
				if ( $product_id ) {
					$product_exists = $wpdb->get_var($wpdb->prepare(
						"SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type IN (%s, %s) AND ID = %d",
						'product',
						'product_variation',
						$product_id
					));
					if ( ! $product_exists ) {
						continue;
					}
				}
				$product_data = [];
				if ( $product_id ) {
					if ( isset($data->name) ) {
						$product_data['post_title'] = $data->name;
					}
					if ( isset($data->post_excerpt) ) {
						$product_data['post_excerpt'] = $data->post_excerpt;
					}
					if ( isset($data->post_content) ) {
						$product_data['post_content'] = $data->post_content;
					}
					if ( isset($data->Status) ) {

						$post_status_sheet = ! empty($data->Status) ? strtolower($data->Status) : 'publish';
						if ($post_status_sheet === 'pending review') {
							$post_status_sheet = 'pending';
						} elseif ($post_status_sheet === 'published') {
							$post_status_sheet = 'publish';
						}
						$product_data['post_status'] = $post_status_sheet;

						if ( ! in_array($post_status_sheet, $filter_status) ) {
							$index_number = ssgsw_get_index_number_option($product_id, $sheets_index );
							if ( $index_number ) {
								$collection_of_delete_row[] = $index_number;
							}
						}
					}
					if ( isset($data->Status) || isset($data->name) || isset($data->post_excerpt) || isset($data->post_content) ) {
						$wpdb->update($wpdb->posts, $product_data, array( 'ID' => $product_id ));
					}

					if ( isset( $data->Image ) ) { //phpcs:ignore
						$this->process_google_sheets_image( $product_id, $data->Image ); //phpcs:ignore
					}
					if(isset($data->category)) {
						$this->assign_existing_taxonomies_to_product($product_id, $data->category, 'product_cat');
					}
					if(isset($data->Tags)) {
						$this->assign_existing_taxonomies_to_product($product_id, $data->Tags, 'product_tag');
					}
					
					if ( isset($data->regular_price) || isset($data->sale_price) ) {
						$this->update_product_prices($product_id, $data );
					}
					if ( isset( $data->sku ) ) {
						update_post_meta( $product_id, '_sku', $data->sku );
					}
					$variable_product = $this->is_variable_product($product_id);
					if(isset($data->attributes)) {
						$this->update_product_attributes($product_id, $data->attributes, $variable_product);
					}
					if ( isset($data->stock) ) {
						if ( is_numeric($data->stock) ) {
							update_post_meta($product_id, '_manage_stock', 'yes');
							if ( $data->stock > 0 ) {
								update_post_meta($product_id, '_stock_status', 'instock' );
								update_post_meta($product_id, '_stock', $data->stock);
								if ( $variable_product ) {
									$this->variation_product_stock_update_for_numaric_formula($product_id, $sheets_info, $sheets_index );
								}
							} else {
								update_post_meta($product_id, '_stock', $data->stock);
								$backorder_enable = get_post_meta($product_id, '_backorders', true);
								if ( 'yes' != $backorder_enable || ( isset($data->_backorders) && 'yes' != $data->_backorders ) ) { //phpcs:ignore
									update_post_meta($product_id, '_stock_status', 'outofstock');
								} else {
									update_post_meta($product_id, '_stock_status', 'onbackorder');
								}
								if ( $variable_product ) {
									$this->variation_product_stock_update_for_zero_formula($product_id, $data, $sheets_info, $sheets_index);
								}
							}
						} else {
							if ( $variable_product ) {
								update_post_meta($product_id, '_manage_stock', 'no');
								update_post_meta($product_id, '_stock', 0 );
								$stock_status = $column->get_stock_status($data->stock, true);
								if ( 'instock' === $stock_status || 'In Stock' === $stock_status ) {
									update_post_meta($product_id, '_stock_status', $stock_status );
									$this->variation_product_stock_update_for_numaric_formula($product_id, $sheets_info, $sheets_index);
								}
							} else {
								update_post_meta($product_id, '_manage_stock', 'no');
								update_post_meta($product_id, '_stock', 0 );
								$stock_status = $column->get_stock_status($data->stock, true);
								update_post_meta($product_id, '_stock_status', $stock_status );
							}
						}
					}
					$columns = $column->get_all_columns();
					foreach ( $data as $data_key => $data_value ) {
						foreach ( $columns as $key => $value ) {
							if ( $value['label'] === $data_key ) {
								if ( 'meta' === $value['type'] ) {
									if ( ! in_array($value['label'], $this->colleciton_of_meta_columns()) ) {
										if ( ssgsw_check_atum_key_exits($key) ) { //phpcs:ignore
											if ( ssgsw_is_atum_plugin_active() ) {
												ssgsw_update_atum_price($product_id, $key, $data_value);
											}
										} else {
											ssgsw_meta_field_value_save( $product_id, $key, $data_value );
										}
									}
								}
							}
						}
					}
					$this->clear_woocommerce_caches($product_id);
					$batch_table_info = $this->prepare_for_batch_update($product_id, $data, 'Sheet', $now_date, $wpdb);
					if ( $batch_table_info ) {
						$query_values[] = $batch_table_info;
					}
				}
			}
			$new_sheet->delete_batch_rows($collection_of_delete_row);
			$this->save_batch_informations($query_values, $wpdb);
			return true;
		}
		/**
		 * Update bulk products from sheet.
		 *
		 * @param array $products Products.
		 * @param int   $sync_all_active sync_all_active.
		 * @param int   $product_length product_length.
		 * @param int   $custom_handle custom_handle.
		 * @return bool
		 **/
		public function bulk_update( array $products = [], $sync_all_active = false, $product_length = 1, $custom_handle = true ) {
			if ( $product_length > 70 ) {
				$sync_all_active = true;
			}
			$GLOBALS['ssgs_sync_all_products'] = true;
			$column                            = new Column();
			global $wpdb;
			$column  = new Column();
			// Checks if plugin is ready to use.
			$add_products_from_sheet = wp_validate_boolean(apply_filters('ssgsw_add_products_from_sheet', ssgsw_get_option('add_products_from_sheet')));
			$get_bulk_edit_option = wp_validate_boolean(ssgsw_get_option( 'bulk_edit_option'));
			$sheet = new Sheet();
			$sheets_info = [];
			$sheets_info2 = [];
			$sheets_info3 = [];
			if ( $custom_handle ) {
				if ( ! $sync_all_active ) {
					if ( is_array($products) && ! array_key_exists( 'index_number', $products['0'] ) ) {
						$sheets_info = $sheet->get_formula_value();
					}
					$check_forumla_active = get_option('ssgsw_formula_active', false);
					if ( $check_forumla_active && empty($sheets_info) ) {
						$sheets_info2 = $sheet->get_formula_value();
					}
					if ( is_array($sheets_info) && ! empty($sheets_info) ) {
						$sheets_info3 = $sheets_info;
					}
					if ( is_array($sheets_info2) && ! empty($sheets_info2) ) {
						$sheets_info3 = $sheets_info2;
					}
					if ( is_array($sheets_info3) && empty($sheets_info3) ) {
						$sheets_info3 = $sheet->get_formula_value();
					}
				}
			}

			foreach ( $products as $data ) {
				$data = (object) $data;
				$product_id = isset($data->ID) && $data->ID > 0 ? $data->ID : null;

				if ( $product_id ) {
					$product_exists = $wpdb->get_var($wpdb->prepare(
						"SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type IN (%s, %s) AND ID = %d",
						'product',
						'product_variation',
						$product_id
					));
					if ( ! $product_exists ) {
						continue;
					}
				}
				$product_data = array(
					'post_title' => isset($data->name) ? $data->name : '',
					'post_status' => 'publish',
				);
				if ( $product_id ) {
					if ( isset($data->post_excerpt) ) {
						$product_data['post_excerpt'] = $data->post_excerpt;
					}
					if ( isset($data->post_content) ) {
						$product_data['post_content'] = $data->post_content;
					}
					$wpdb->update($wpdb->posts, $product_data, array( 'ID' => $product_id ));
				} else {
					if ( ! $add_products_from_sheet ) {
						return false;
					}
					$product_data['post_type'] = 'product';
					if ( isset($data->post_excerpt) && ! empty($data->post_excerpt) ) {
						$product_data['post_excerpt'] = $data->post_excerpt;
					} else {
						$product_data['post_excerpt'] = 'This is a simple product';
					}
					if ( isset($data->post_content) ) {
						$product_data['post_content'] = $data->post_content;
					}

					$product_id = ssgsw_wp_insert_post($product_data);
					if ( ssgsw_is_atum_plugin_active() ) {
						ssgsw_insert_atum_table($product_id);
					}
					wp_set_object_terms($product_id, 'simple', 'product_type');
					$default_category = get_term_by('name', 'uncategorized', 'product_cat');
					if ( $default_category ) {
						wp_set_object_terms($product_id, $default_category->term_id, 'product_cat');
					}
					update_post_meta($product_id, '_visibility', 'visible');
					update_post_meta($product_id, '_stock_status', 'instock' );
				}
				if ( isset( $data->Image ) ) { //phpcs:ignore
					$this->process_google_sheets_image( $product_id, $data->Image ); //phpcs:ignore
				}
				$this->update_product_prices($product_id, $data );
				if ( isset( $data->sku ) ) {
					update_post_meta( $product_id, '_sku', $data->sku );
				}
				$variable_product = $this->is_variable_product($product_id);
				if ( isset($data->stock) ) {
					if ( is_numeric($data->stock) ) {
						update_post_meta($product_id, '_manage_stock', 'yes');
						if ( $data->stock > 0 ) {
							update_post_meta($product_id, '_stock_status', 'instock' );
							update_post_meta($product_id, '_stock', $data->stock);
							if ( $variable_product ) {
								$this->variation_product_stock_update_for_numaric($product_id, $sheets_info3, $sync_all_active, $custom_handle);
							}
						} else {
							update_post_meta($product_id, '_stock', $data->stock);
							$backorder_enable = get_post_meta($product_id, '_backorders', true);
							if ( 'yes' != $backorder_enable || ( isset($data->_backorders) && 'yes' != $data->_backorders ) ) { //phpcs:ignore
								update_post_meta($product_id, '_stock_status', 'outofstock');
							} else {
								update_post_meta($product_id, '_stock_status', 'onbackorder');
							}
							if ( $variable_product ) {
								$this->variation_product_stock_update_for_zero($product_id, $data, $sheets_info3, $sync_all_active, $custom_handle);
							}
						}
					} else {
						if ( $variable_product ) {
							update_post_meta($product_id, '_manage_stock', 'no');
							update_post_meta($product_id, '_stock', 0 );
							$stock_status = $column->get_stock_status($data->stock, true);
							if ( 'instock' === $stock_status || 'In Stock' === $stock_status ) {
								update_post_meta($product_id, '_stock_status', $stock_status );
								$this->variation_product_stock_update_for_numaric($product_id, $sheets_info3, $sync_all_active, $custom_handle);
							}
						} else {
							update_post_meta($product_id, '_manage_stock', 'no');
							update_post_meta($product_id, '_stock', 0 );
							$stock_status = $column->get_stock_status($data->stock, true);
							update_post_meta($product_id, '_stock_status', $stock_status );
						}
					}
				}
				$columns = $column->get_all_columns();
				foreach ( $data as $data_key => $data_value ) {
					foreach ( $columns as $key => $value ) {
						if ( $value['label'] === $data_key ) {
							if ( 'meta' === $value['type'] ) {
								if ( ! in_array($value['label'], $this->colleciton_of_meta_columns()) ) {
									if ( ssgsw_check_atum_key_exits($key) ) { //phpcs:ignore
										if ( ssgsw_is_atum_plugin_active() ) {
											ssgsw_update_atum_price($product_id, $key, $data_value);
										}
									} else {
										ssgsw_meta_field_value_save( $product_id, $key, $data_value );
									}
								}
							}
						}
					}
				}

				$this->clear_woocommerce_caches($product_id);
				ssgsw_insert_update_product_information($product_id, $data, 'Sheet');
				if ( ! $sync_all_active ) {
					if ( $custom_handle ) {
						if ( isset($data->ID) && ! empty($data->ID) ) {
							if ( ! empty($sheets_info) ) {
								$dta = $this->batch_update_delete_and_append_for_sheet($data->ID,'update','',$sheets_info);
							} else {
								$this->update_single_product_data_to_sheet($data->index_number, $data->ID, $sheets_info2 );
							}
						} else {
							if ( empty($sheets_info) ) {
								$this->update_single_product_data_to_sheet($data->index_number, $product_id, $sheets_info2 );
							}
						}
					}
					if ( ! $get_bulk_edit_option ) {
						return false;
					}
				}
			}
			if ( $sync_all_active ) {
				$this->sync_all();
			}
			return true;
		}
		/**
		 * Collection of meta columns information
		 */
		public function colleciton_of_meta_columns() {
			return [
				'Stock',
				'Stock Status',
				'Regular price',
				'Sale price',
				'Image',
				'SKU',
				'Attributes',
				'Product URL',
				'No of Sales',
			];
		}


		/**
		 * Check if a product is a variable product.
		 *
		 * @param int $product_id The ID of the product.
		 * @return void True if the product is a variable product, false otherwise.
		 */
		public function variation_product_stock_update_for_numaric_chank( $product_id, $sheets_info = [], $sheets_index = [] ) {
			$sheet = new Sheet();
			if ( is_array($sheets_info) && empty($sheets_info) ) {
				$sheets_info = $sheet->get_formula_value();
			}
			$child_product_ids = $this->get_children_id($product_id);
			if ( is_array( $child_product_ids ) && ! empty( $child_product_ids ) ) {
				foreach ( $child_product_ids as $child_id ) {
					$manage_stock = get_post_meta( $child_id, '_manage_stock', true );
					if ( 'yes' !== $manage_stock ) {
						update_post_meta($child_id, '_stock_status', 'instock');

					}
				}
			}
		}
		/**
		 * Check if a product is a variable product.
		 *
		 * @param int $product_id The ID of the product.
		 * @return void True if the product is a variable product, false otherwise.
		 */
		public function variation_product_stock_update_for_numaric_formula( $product_id, $sheets_info, $sheet_index ) {
			$child_product_ids = $this->get_children_id($product_id);
			$sheet = new Sheet();
			if ( is_array( $child_product_ids ) && ! empty( $child_product_ids ) ) {
				foreach ( $child_product_ids as $child_id ) {
					$manage_stock = get_post_meta( $child_id, '_manage_stock', true );
					if ( 'yes' !== $manage_stock ) {
						update_post_meta($child_id, '_stock_status', 'instock');
					}
					$new_range = ssgsw_get_index_number_option($child_id, $sheet_index);
					if ( $new_range ) {
						$get_products = $this->get_single_product([ $child_id ], $sheets_info, false);
						$type = 'update';
						$type2 = 'test';
						$this->variable_product_formating_sync_method($type, $type2, $new_range, $sheet, $sheets_info, $get_products );
					}
				}
			}
		}
		/**
		 * Check if a product is a variable product.
		 *
		 * @param int $product_id The ID of the product.
		 * @return void True if the product is a variable product, false otherwise.
		 */
		public function variation_product_stock_update_for_zero_formula( $product_id, $data, $sheets_info, $sheets_index ) {
			$sheet = new Sheet();
			$child_product_ids = $this->get_children_id($product_id);
			if ( is_array( $child_product_ids ) && ! empty( $child_product_ids ) ) {
				foreach ( $child_product_ids as $child_id ) {
					$manage_stock = get_post_meta( $child_id, '_manage_stock', true );
					if ( 'yes' !== $manage_stock ) {
						update_post_meta($child_id, '_stock', 0 );
						$backorder_enable = get_post_meta($product_id, '_backorders', true);
						if ( 'yes' != $backorder_enable || ( isset($data->_backorders) && 'yes' != $data->_backorders ) ) { //phpcs:ignore
							update_post_meta($child_id, '_stock_status', 'outofstock');
						} else {
							update_post_meta($child_id, '_stock_status', 'onbackorder');
						}
					}
					$new_range = ssgsw_get_index_number_option($child_id, $sheets_index);
					if ( $new_range ) {
						$get_products = $this->get_single_product([ $child_id ], $sheets_info, false);
						$type = 'update';
						$type2 = 'test';
						$this->variable_product_formating_sync_method($type, $type2, $new_range, $sheet, $sheets_info, $get_products );
					}
				}
			}
		}
		/**
		 * Check if a product is a variable product.
		 *
		 * @param int $product_id The ID of the product.
		 * @return void True if the product is a variable product, false otherwise.
		 */
		public function variation_product_stock_update_for_numaric( $product_id, $sheets_info = [], $sync_active = false, $custom_handle = true ) {
			$sheet = new Sheet();
			if ( is_array($sheets_info) && empty($sheets_info) ) {
				if ( $custom_handle ) {
					if ( ! $sync_active ) {
						$sheets_info = $sheet->get_formula_value();
					}
				}
			}
			$child_product_ids = $this->get_children_id($product_id);
			if ( is_array( $child_product_ids ) && ! empty( $child_product_ids ) ) {
				foreach ( $child_product_ids as $child_id ) {
					$manage_stock = get_post_meta( $child_id, '_manage_stock', true );
					if ( 'yes' !== $manage_stock ) {
						update_post_meta($child_id, '_stock_status', 'instock');
						if ( $custom_handle ) {
							if ( ! $sync_active ) {
								$get_products = $this->get_single_product([ $child_id ], $sheets_info, false);
								$find_ranges = $this->find_out_range($child_id, $sheets_info, $sheet);
								$type = 'update';
								$type2 = 'test';
								$this->variable_product_formating_sync_method($type, $type2, $find_ranges, $sheet, $sheets_info, $get_products );
							}
						}
					}
				}
			}
		}
		/**
		 * Check if a product is a variable product.
		 *
		 * @param int $product_id The ID of the product.
		 * @return void True if the product is a variable product, false otherwise.
		 */
		public function variation_product_stock_update_for_zero_chank( $product_id, $data, $sheets_info = [], $sheet_index = [] ) {
			$sheet = new Sheet();
			if ( is_array($sheets_info) && empty($sheets_info) ) {
				$sheets_info = $sheet->get_formula_value();
			}
			$child_product_ids = $this->get_children_id($product_id);
			if ( is_array( $child_product_ids ) && ! empty( $child_product_ids ) ) {
				foreach ( $child_product_ids as $child_id ) {
					$manage_stock = get_post_meta( $child_id, '_manage_stock', true );
					if ( 'yes' !== $manage_stock ) {
						update_post_meta($child_id, '_stock', 0 );
						$backorder_enable = get_post_meta($product_id, '_backorders', true);
						if ( 'yes' != $backorder_enable || ( isset($data->_backorders) && 'yes' != $data->_backorders ) ) { //phpcs:ignore
							update_post_meta($child_id, '_stock_status', 'outofstock');
						} else {
							update_post_meta($child_id, '_stock_status', 'onbackorder');
						}
					}
				}
			}
		}
		/**
		 * Check if a product is a variable product.
		 *
		 * @param int $product_id The ID of the product.
		 * @return void True if the product is a variable product, false otherwise.
		 */
		public function variation_product_stock_update_for_zero( $product_id, $data, $sheets_info = [], $sync_active = false, $custom_handle = true ) {
			$sheet = new Sheet();
			if ( is_array($sheets_info) && empty($sheets_info) ) {
				if ( $custom_handle ) {
					if ( ! $sync_active ) {
						$sheets_info = $sheet->get_formula_value();
					}
				}
			}
			$child_product_ids = $this->get_children_id($product_id);
			if ( is_array( $child_product_ids ) && ! empty( $child_product_ids ) ) {
				foreach ( $child_product_ids as $child_id ) {
					$manage_stock = get_post_meta( $child_id, '_manage_stock', true );
					if ( 'yes' !== $manage_stock ) {
						update_post_meta($child_id, '_stock', 0 );
						$backorder_enable = get_post_meta($product_id, '_backorders', true);
						if ( 'yes' != $backorder_enable || ( isset($data->_backorders) && 'yes' != $data->_backorders ) ) { //phpcs:ignore
							update_post_meta($child_id, '_stock_status', 'outofstock');
						} else {
							update_post_meta($child_id, '_stock_status', 'onbackorder');
						}
						if ( $custom_handle ) {
							if ( ! $sync_active ) {
								$get_products = $this->get_single_product([ $child_id ], $sheets_info, false);
								$find_ranges = $this->find_out_range($child_id, $sheets_info, $sheet);
								$type = 'update';
								$type2 = 'test';
								$this->variable_product_formating_sync_method($type, $type2, $find_ranges, $sheet, $sheets_info, $get_products );
							}
						}
					}
				}
			}
		}
		/**
		 * Check if a product is a variable product.
		 *
		 * @param int $product_id The ID of the product.
		 * @return bool True if the product is a variable product, false otherwise.
		 */
		public function is_variable_product( $product_id ) {
			$product = wc_get_product($product_id);

			// Check if the product is a variable product.
			return $product && $product->is_type('variable');
		}

		/**
		 * Clear transient for product view
		 *
		 * @param int $product_id product id.
		 */
		public function clear_woocommerce_caches( $product_id ) {
			global $wpdb;
			// Clear WooCommerce transients and specific product options in a single query.
			$wpdb->query("
				DELETE FROM {$wpdb->options}
				WHERE option_name LIKE '_transient_wc_%'
				OR option_name LIKE '_transient_timeout_wc_%'
				OR option_name = 'wc_low_stock_{$product_id}'
				OR option_name = 'wc_outofstock_{$product_id}'
			");
		}
		/**
		 * Update product price
		 *
		 * @param int    $product_id product identifier.
		 * @param object $data product data.
		 */
		public function update_product_prices( $product_id, $data ) {
			$regular_price = (isset($data->regular_price)) ? (is_numeric($data->regular_price) ? wc_format_decimal($data->regular_price) : '') : get_post_meta($product_id, '_regular_price', true);
			$sale_price = (isset($data->sale_price)) ? (is_numeric($data->sale_price) ? wc_format_decimal($data->sale_price) : '') : get_post_meta($product_id, '_sale_price', true);
		
			update_post_meta($product_id, '_regular_price', $regular_price);
			if ( $sale_price && $sale_price < $regular_price ) {
				update_post_meta($product_id, '_sale_price', $sale_price);
				update_post_meta($product_id, '_price', $sale_price);
			} else {
				update_post_meta($product_id, '_sale_price', '');
				update_post_meta($product_id, '_price', $regular_price);
			}
		}
		/**
		 * Save product image from google sheets.
		 *
		 * @param int    $product_id Product identifier.
		 * @param string $image_url product image url.
		 */
		public function set_product_image_from_url( $product_id, $image_url ) {
			$image_data = wp_remote_get($image_url);
			if ( is_wp_error( $image_data ) || 200 !== wp_remote_retrieve_response_code( $image_data ) ) {
				return false;
			}

			$file_extension = pathinfo($image_url, PATHINFO_EXTENSION);
			$allowed_extensions = array( 'jpg', 'jpeg', 'png', 'gif', 'svg' );

			// if (!in_array(strtolower($file_extension), $allowed_extensions)) {
			// return false;
			// }.
			$upload_dir = wp_upload_dir();
			$image_path = $upload_dir['path'] . '/' . basename($image_url);
			$result = wp_upload_bits( sanitize_file_name( basename( $image_url ) ), null, wp_remote_retrieve_body( $image_data ) );
			if ( $result['error'] ) {
				return false;
			}
			$attachment = array(
				'post_mime_type' => 'image/' . strtolower($file_extension),
				'post_title'     => sanitize_file_name(basename($image_url)),
				'post_content'   => '',
				'post_status'    => 'inherit',
			);
			$attachment_id = ssgsw_wp_insert_attachment($attachment, $image_path);
			if ( is_wp_error($attachment_id) ) {
				return false;
			}
			set_post_thumbnail($product_id, $attachment_id);
			update_post_meta($attachment_id, 'ssgsw_original_image_url', $image_url);
			return true;
		}
		/**
		 * Check this url already exists in wordpress shop.
		 *
		 * @param url $image_url image url.
		 */
		public function get_attachment_id_by_url( $image_url ) {
			$attachment_id = attachment_url_to_postid($image_url);
			return $attachment_id;
		}
		/**
		 * Save product attachments images
		 *
		 * @param int $product_id Product identifier.
		 * @param url $image_url Image URL.
		 */
		public function process_google_sheets_image( $product_id, $image_url ) {
			if ( ! ssgsw_is_license_valid() ) {
				return false;
			}
			if ( empty($image_url) || ! filter_var($image_url, FILTER_VALIDATE_URL) ) {
				return false;
			}

			$existing_attachment_id = $this->get_attachment_id_by_url($image_url);
			if ( $existing_attachment_id ) {
				set_post_thumbnail($product_id, $existing_attachment_id);
				return true;
			}
			$exits_url_id = $this->get_attachment_by_original_image_url($image_url);
			if ( $exits_url_id ) {
				set_post_thumbnail($product_id, $exits_url_id);
				return true;
			}

			return $this->set_product_image_from_url($product_id, $image_url);
		}
		/**
		 * Get product image id from orginal image url
		 *
		 * @param url $original_image_url image url.
		 */
		public function get_attachment_by_original_image_url( $original_image_url ) {
			$args = array(
				'post_type'      => 'attachment',
				'posts_per_page' => 1,
				'post_status'    => 'inherit',
				'meta_query'     => array(
					array(
						'key'   => 'ssgsw_original_image_url',
						'value' => $original_image_url,
					),
				),
			);

			$attachments = get_posts($args);
			if ( $attachments ) {
				return $attachments[0]->ID;
			}
			return false;
		}
	}
}
