<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'OPBW_Admin' ) ) :

	/**
	 * Main OPBW_Admin Class.
	 *
	 * @package		OPBW
	 * @subpackage	Classes/OPBW_Admin
	 * @since		1.0.0
	 * @author		WPOPAL
	 */
	final class OPBW_Admin {

		public $batch_size = 5;

		private $filter_hook = 'sanitize_text_field';

		private static $filter_var = [
			'product_title' => 'all',
			'product_title_val' => '',
			'product_sku' => 'all',
			'product_sku_val' => '',
			'product_description' => 'all',
			'product_description_val' => '',
			'product_short_description' => 'all',
			'product_short_description_val' => '',
			'product_price' => 'all',
			'product_price_val' => '',
			'product_price_val_min' => '',
			'product_price_val_max' => '',
			'product_weight' => 'all',
			'product_weight_val' => '',
			'product_weight_val_min' => '',
			'product_weight_val_max' => '',
			'product_types' => '',
			'product_categories' => '',
			'attr_relation' => '',
			'tax_attributes' => '',
			'show_exclude' => '',
			'exclude_products' => '',
		];

		public static $editor_var = [
			'title_change' => 'name',
			'sku_change' => 'sku',
			'description_change' => 'description',
			'short_description_change' => 'short_description',
			'featured_change' => 'featured',
			'thumbnail_change' => 'thumbnail', // custom
			'gallery_change' => 'images',
			'regular_price' => 'regular_price',
			'sale_price' => 'sale_price',
			'schedule_sale_price' => 'schedule_sale', // custom
			'stock_management' => 'stock_management', // custom
			'allow_backorders' => 'backorders',
			'sold_individually' => 'sold_individually',
			'stock_status' => 'stock_status',
			'stock_quantity' => 'stock',
			'product_weight' => 'weight',
			'product_length' => 'length',
			'product_width' => 'width',
			'product_height' => 'height',
			'attr_action' => 'attributes',
			'category_change' => 'category_ids',
			'tag_change' => 'tag_ids',
			'delete_action' => 'published', // custom
		];

        public function __construct($settings) {
			add_action( 'wp_ajax_opbw_load_rule_apply_ajax', [$this, 'load_filter_options_apply'] ); // wp_ajax_{action}
			add_action( 'wp_ajax_opbw_handle_filter_form', [$this, 'handle_form_filter'] ); // wp_ajax_{action}
			add_action( 'wp_ajax_opbw_handle_preview_confirm', [$this, 'handle_preview_confirm'] ); // wp_ajax_{action}
			add_action( 'wp_ajax_opbw_handle_editor_form', [$this, 'handle_editor_form'] ); // wp_ajax_{action}
			add_action( 'wp_ajax_opbw_handle_process_form', [$this, 'handle_process_form'] ); // wp_ajax_{action}
			add_action( 'wp_ajax_opbw_handle_run_edit', [$this, 'handle_run_edit'] ); // wp_ajax_{action}
        }

        /**
		 *  Call View Admin Template
		 */
		public static function view($view, $data = array()) {
			extract($data);
			$path_view = apply_filters('opbw_path_view_admin', OPBW_PLUGIN_DIR . 'views/backend/' . $view . '.php', $view, $data);
			include($path_view);
		}

		public function load_filter_options_apply() {
			if ( !check_ajax_referer( 'opbw-nonce-ajax', 'ajax_nonce_parameter' ) ) {
				wp_send_json_error( array(
					'message' => 'Permission denied.',
				) );
				exit();
			}

			if(empty($_GET['q'])) return false;
            if(empty($_GET['term'])) return false;

            $kw = wc_clean(wp_unslash($_GET['q']));
            $term = wc_clean(wp_unslash($_GET['term']));
            $func_search = 'get_'.$term.'_by_keyword';

            $return = $this->$func_search($kw);

            if (!$return) return false;
            echo wp_json_encode( $return );
            die;
		}

		private function get_product_by_keyword($kw) {
        	$return = false;

        	$search_results = new WP_Query( array( 
        	    's'=> wc_clean($kw), // the search query
        	    'post_status' => 'publish', // if you don't want drafts to be returned
        	    'post_type' => 'product',
        	    'posts_per_page' => -1 // how much to show at once
        	) );

        	if( $search_results->have_posts() ) {
        		$return = [];
        	    while( $search_results->have_posts() ) : $search_results->the_post();	
        	        // shorten the title a little
        	        $title = ( mb_strlen( $search_results->post->post_title ) > 50 ) ? mb_substr( $search_results->post->post_title, 0, 49 ) . '...' : $search_results->post->post_title;
        	        $return[] = array( $search_results->post->ID, $title );
        	    endwhile;
        	}
        	
        	return $return;
        }

        private function get_category_by_keyword($kw) {
        	global $wpdb;
        	$taxonomy = 'product_cat';
        	$return = false;

        	$results = $wpdb->get_results(
        	    $wpdb->prepare(
        	        "SELECT t.*, tt.*
        	        FROM $wpdb->terms AS t
        	        INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id
        	        WHERE tt.taxonomy = %s
        	        AND t.name LIKE %s",
        	        $taxonomy,
        	        '%' . $wpdb->esc_like($kw) . '%'
        	    )
        	); //db call ok; no-cache ok

        	// In kết quả
        	if ($results && !empty($results)) {
    			$return = [];
    		    foreach ($results as $term) {
    		        // shorten the title a little
    		        $title = ( mb_strlen( $term->name ) > 50 ) ? mb_substr( $term->name, 0, 49 ) . '...' : $term->name;
    		        $return[] = array( $term->term_id, $title );
    		    }
        	}
        	return $return;
        }

        private function get_tag_by_keyword($kw) {
        	global $wpdb;
        	$taxonomy = 'product_tag';
        	$return = false;

        	$results = $wpdb->get_results(
        	    $wpdb->prepare(
        	        "SELECT t.*, tt.*
        	        FROM $wpdb->terms AS t
        	        INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id
        	        WHERE tt.taxonomy = %s
        	        AND t.name LIKE %s",
        	        $taxonomy,
        	        '%' . $wpdb->esc_like($kw) . '%'
        	    )
        	); //db call ok; no-cache ok

        	// In kết quả
        	if ($results && !empty($results)) {
    			$return = [];
    		    foreach ($results as $term) {
    		        // shorten the title a little
    		        $title = ( mb_strlen( $term->name ) > 50 ) ? mb_substr( $term->name, 0, 49 ) . '...' : $term->name;
    		        $return[] = array( $term->term_id, $title );
    		    }
        	}
        	return $return;
        }

		public function handle_form_filter() {
			if ( !check_ajax_referer( 'opbw-nonce-ajax', 'ajax_nonce_parameter' ) ) {
				wp_die('Permission denied');
			}
	
			try {
				if (empty($_POST['params'])) {
					wp_send_json_error( array( 'message' => __('No params!', 'opal-bulkedit-for-woocommerce') ) );
				}
				
				add_filter($this->filter_hook, 'opbw_precheck_form_args', 99, 2);

				wp_parse_str( wp_unslash( sanitize_text_field( $_POST['params'] ) ), $params );
				$params = wc_clean($params); 

				remove_filter($this->filter_hook, 'opbw_precheck_form_args', 99, 2);

				$filter_data = self::handle_request_data($params);

				$kw = '';
				if (isset($_POST['kw'])) {
					$kw = sanitize_text_field(wp_unslash($_POST['kw']));
				}

				$products = OPBW_Product::filter_products($filter_data, $kw);
				$preview_obj = new OPBW_Preview();
				$preview_obj->set_items($products);

				if (isset($_POST['excluded_all']) && rest_sanitize_boolean($_POST['excluded_all'])) {
					wp_send_json_success($products);
					wp_die();
				}

				$selected_all = true;
				if (isset($_POST['selected_all']) && !rest_sanitize_boolean($_POST['selected_all'])) {
					$selected_all = false;
				}

				$total_items = count($products);
				$per_page = empty($_REQUEST['items']) ? 5 : absint( $_REQUEST['items'] );
				$paged = empty($_REQUEST['paged']) ? 1 : absint( $_REQUEST['paged'] );
				$start = ( $paged - 1 ) * $per_page;
				if ( $total_items > $per_page ) {
					$preview_obj->items = array_slice( $preview_obj->items, $start, $per_page, true );
				}

				$preview_obj->set_pagination_args(
					array(
						'total_items' => count($products),
						'per_page'    => $per_page,
					)
				);

				ob_start();
				self::view('preview', [
					'preview_obj' => $preview_obj,
					'per_page' => $per_page,
					'kw' => $kw,
					'selected_all' => $selected_all,
				]);
				$preview_html = ob_get_clean();

				wp_send_json_success($preview_html);
	
			} catch ( Exception $e ) {
				wp_send_json_error( array( 'message' => $e->getMessage() ) );
			}
		}

		public function handle_preview_confirm() {
			if ( !check_ajax_referer( 'opbw-nonce-ajax', 'ajax_nonce_parameter' ) ) {
				wp_die('Permission denied');
			}
	
			try {
				if (empty($_POST['params'])) {
					wp_send_json_error( array( 'message' => __('No params!', 'opal-bulkedit-for-woocommerce') ) );
				}

				add_filter($this->filter_hook, 'opbw_precheck_form_args', 99, 2);

				wp_parse_str( wp_unslash( sanitize_text_field( $_POST['params'] ) ), $params );
				$params = wc_clean($params); 

				remove_filter($this->filter_hook, 'opbw_precheck_form_args', 99, 2);
	
				$filter_data = self::handle_request_data($params);

				$kw = '';
				if (isset($_POST['kw'])) {
					$kw = sanitize_text_field(wp_unslash($_POST['kw']));
				}

				if (isset($filter_data['exclude_products'])) {
					if (!empty($_POST['exclude_products']) && is_array($_POST['exclude_products'])) {
						$filter_data['exclude_products'] = array_unique (array_merge ($filter_data['exclude_products'], wc_clean($_POST['exclude_products'])));
					}
				}
				else {
					if (!empty($_POST['exclude_products']) && is_array($_POST['exclude_products'])) {
						$filter_data['exclude_products'] = wc_clean($_POST['exclude_products']);
					}
				}

				$products = OPBW_Product::filter_products($filter_data, $kw);
				if (!$products || empty($products)) {
					wp_send_json_error([
						'message' => __('No products selected!', 'opal-bulkedit-for-woocommerce')
					]);
				}

				if (isset($_POST['history_id']) && rest_sanitize_boolean($_POST['history_id'])) {
					$history_id = absint($_POST['history_id']);
				} else {
					// Remove all draf history
					opbw_delete_history();

					$history_id = wp_insert_post(
						array(
							'post_title'   => __('Setupping bulk edit', 'opal-bulkedit-for-woocommerce') .' - ' . wp_date(get_option('date_format') . ' ' . get_option('time_format')),
							'post_status'  => 'draft',
							'post_type'    => 'opbw-history',
						)
					);
					if (!$history_id || is_wp_error($history_id)) {
						wp_send_json_error([
							'message' => __('Something is wrong. Please try again!', 'opal-bulkedit-for-woocommerce')
						]);
					}
				}
				update_post_meta($history_id, '_opbw_product_ids', $products);
				
				ob_start();
				self::view('edit', [
					'history_id' => $history_id,
					'count_products_selected' => count($products),
				]);
				$edit_html = ob_get_clean();

				wp_send_json_success([
					'history_id' => $history_id,
					'edit_html' => $edit_html,
					
				]);
	
			} catch ( Exception $e ) {
				wp_send_json_error( array( 'message' => $e->getMessage() ) );
			}
		}

		private static function handle_request_data($params) {
			$filter_data = [];
				foreach (self::$filter_var as $field => $skip_val) {
				if ($field == 'exclude_products' && empty($params['show_exclude'])) {
					continue;
				}
				if (isset($params[$field]) && $params[$field] != $skip_val) {
					$filter_data[$field] = wc_clean($params[$field]);
				}
			}

			return $filter_data;
		}

		public function handle_editor_form() {
			if ( !check_ajax_referer( 'opbw-nonce-ajax', 'ajax_nonce_parameter' ) ) {
				wp_die('Permission denied');
			}
	
			try {
				if (empty($_POST['params'])) {
					wp_send_json_error( array( 'message' => __('No params!', 'opal-bulkedit-for-woocommerce') ) );
				}

				add_filter($this->filter_hook, 'opbw_precheck_form_args', 99, 2);

				wp_parse_str( wp_unslash( sanitize_text_field( $_POST['params'] ) ), $params );
				$params = wc_clean($params); 

				remove_filter($this->filter_hook, 'opbw_precheck_form_args', 99, 2);
	
				if (empty($params['opbw_history'])) {
					wp_send_json_error( ['message' => 'No records are being edited!'] );
				}

				$history_id = absint($params['opbw_history']);
				if ('opbw-history' !== get_post_type( $history_id )) {
					wp_send_json_error([
						'message' => __('This edit record is not in the correct format!', 'opal-bulkedit-for-woocommerce')
					]);
				}

				$changed = self::handle_raw_editor($params);
				if (!$changed || empty($changed)) {
					wp_send_json_error([
						'message' => __('No changes specified!', 'opal-bulkedit-for-woocommerce')
					]);
				}

				update_post_meta($history_id, '_opbw_editor_data', $changed);
				
				ob_start();
				self::view('process', [
					'history_id' => $history_id,
				]);
				$process_html = ob_get_clean();

				wp_send_json_success([
					'history_id' => $history_id,
					'process_html' => $process_html,
				]);
				
			} catch ( Exception $e ) {
				wp_send_json_error( array( 'message' => $e->getMessage() ) );
			}
		}

		private static function handle_raw_editor($params) {
			$editor_var = self::$editor_var;
			$data_changed = [];
			$data_columns = [];

			foreach ($editor_var as $key => $col) {
				if (isset($params[$key]) && $params[$key] != 'none') {
					$action = wc_clean($params[$key]);
					$data = [];
					
					if ($key == 'delete_action') {
						$data_changed = [
							$key => $action
						];
						$data_columns = [];
						if ($action == 'move_to_trash') {
							$data_columns = [$editor_var[$key]];
						}
						break;
						
					} elseif (in_array($key, ['title_change', 'sku_change', 'description_change', 'short_description_change'])) {
						if (in_array($action, ['set_new', 'append', 'prepand'])) {
							if (!empty($params[$key.'_val'])) {
								$data_changed[$key] = [
									'action' => $action,
									'value' => wc_clean($params[$key.'_val']),
								];
							}
						}
						if ($action == 'replace') {
							if (!empty($params[$key.'_val_find']) && !empty($params[$key.'_val_replace'])) {
								$data_changed[$key] = [
									'action' => $action,
									'value_find' => wc_clean($params[$key.'_val_find']),
									'value_replace' => wc_clean($params[$key.'_val_replace']),
								];
							}
						}

					} elseif (in_array($key, ['stock_quantity', 'product_weight', 'product_length', 'product_width', 'product_height'])) {
						if (!empty($params[$key.'_val'])) {
							$data_changed[$key] = [
								'action' => $action,
								'value' => wc_clean($params[$key.'_val']),
							];
						}

					} elseif ($key == 'thumbnail_change') {
						if ($action == 'remove') {
							$data_changed[$key] = [
								'action' => $action,
							];
						} else {
							if (!empty($params['thumbnail_change_id'])) {
								$data_changed[$key] = [
									'action' => $action,
									'value' => absint($params['thumbnail_change_id']),
								];
							}
						}

					} elseif ($key == 'gallery_change') {
						if ($action != 'remove_all') {
							if (!empty($params['gallery_change_images'])) {
								$gallery = array_map('trim', explode(',', wc_clean($params['gallery_change_images'])));
								if (!empty($gallery)) {
									$data_changed[$key] = [
										'action' => $action,
										'value' => $gallery,
									];
								}
							}
						} else {
							$data_changed[$key] = [
								'action' => $action,
							];
						}
						
					} elseif ($key == 'regular_price') {
						if (isset($params[$key.'_val'])) {
							$round = isset($params[$key.'val_round']) ? wc_clean($params[$key.'val_round']) : 'none';
							$data_changed[$key] = [
								'action' => $action,
								'value' => wc_clean($params[$key.'_val']),
								'round' => $round,
							];
						}

					} elseif ($key == 'sale_price') {
						if (isset($params[$key.'_val'])) {
							$round = isset($params[$key.'val_round']) ? wc_clean($params[$key.'val_round']) : 'none';
							$data_changed[$key] = [
								'action' => $action,
								'value' => wc_clean($params[$key.'_val']),
								'round' => $round,
							];
						}

					} elseif ($key == 'schedule_sale_price') {
						if ($action == 'enable') {
							if (!empty($params['sale_start'])) {
								$data['sale_start'] = wc_clean($params['sale_start']);
							}
							if (!empty($params['sale_end'])) {
								$data['sale_end'] = wc_clean($params['sale_end']);
							}
							if (!empty($data)) {
								$data_changed[$key] = [
									'action' => $action,
									'data' => $data,
								];
							}
						} elseif ($action == 'disable') {
							$data_changed[$key] = [
								'action' => $action,
							];
						}

					} elseif ($key == 'attr_action') {
						if ($action == 'add' && isset($params['attrs_allow_new']) && $params['attrs_allow_new']) {
							if (!empty($params['attrs_add']) && !empty($params['attrs_tax_add'])) {
								$attrs_add = wc_clean($params['attrs_add']);
								$attrs_tax_add = array_map('trim', preg_split("/\\r\\n|\\r|\\n/", sanitize_textarea_field($params['attrs_tax_add'])));
								if (is_array($attrs_tax_add) && !empty($attrs_tax_add)) {
									$data['attrs_add'] = $attrs_add;
									$data['attrs_tax_add'] = array_unique($attrs_tax_add);
								}
							}
						}
						if (!empty($params['variants_change'])) {
							$data['variants_change'] = wc_clean($params['variants_change']);
						}
						if (!empty($data)) {
							$data_changed[$key] = [
								'action' => $action,
								'data' => $data,
							];
						}

					} elseif (in_array($key, ['category_change', 'tag_change'])) {
						if ($action == 'add' && isset($params[$key.'_add_new']) && $params[$key.'_add_new']) {
							if (!empty($params[$key.'_new_val'])) {
								$new_vals = array_map('trim', preg_split("/\\r\\n|\\r|\\n/", sanitize_textarea_field($params[$key.'_new_val'])));
								if (is_array($new_vals) && !empty($new_vals)) {
									$data['new_vals'] = array_unique($new_vals);
								}
							}
						}
						if (!empty($params[$key.'_ids'])) {
							$data['tax_ids'] = wc_clean($params[$key.'_ids']);
						}
						if (!empty($data)) {
							$data_changed[$key] = [
								'action' => $action,
								'data' => $data,
							];
						}
						
					} else {
						$data_changed[$key] = $action;
					}
				}
				if (isset($data_changed[$key])) {
					$data_columns[] = $editor_var[$key];
				}
			}

			if (!empty($data_columns)) {
				$data_columns[] = 'id';
				$data_columns[] = 'opbw_column';
			}
			$history_id = absint($params['opbw_history']);
			update_post_meta($history_id, '_opbw_backup_columns', $data_columns);

			return $data_changed;
		}

		public function handle_process_form() {
			if ( !check_ajax_referer( 'opbw-nonce-ajax', 'ajax_nonce_parameter' ) ) {
				wp_die('Permission denied');
			}
	
			try {
				if (empty($_POST['params'])) {
					wp_send_json_error( array( 'message' => __('No params!', 'opal-bulkedit-for-woocommerce') ) );
				}

				add_filter($this->filter_hook, 'opbw_precheck_form_args', 99, 2);

				wp_parse_str( wp_unslash( sanitize_text_field( $_POST['params'] ) ), $params );
				$params = wc_clean($params); 

				remove_filter($this->filter_hook, 'opbw_precheck_form_args', 99, 2);
	
				if (empty($params['opbw_history'])) {
					wp_send_json_error( ['message' => 'No records are being edited!'] );
				}

				$history_id = absint($params['opbw_history']);
				if ('opbw-history' !== get_post_type( $history_id )) {
					wp_send_json_error([
						'message' => __('This edit record is not in the correct format!', 'opal-bulkedit-for-woocommerce')
					]);
				}

				$process = [];
				$action_run = !empty($params['action_run']) ? 'now' : wc_clean($params['action_run']);
				
				$process['action'] = $action_run;
				if ($action_run == 'later') {
					if (empty($params['time_run'])) {
						wp_send_json_error([
							'message' => __('Please enter scheduling time!', 'opal-bulkedit-for-woocommerce')
						]);
					} else {
						$process['time_run'] = wc_clean($params['time_run']);
					}
				}
				$process['edit_name'] = wc_clean($params['edit_name']);
				
				update_post_meta($history_id, '_opbw_process_data', $process);
				
				$data = self::pre_handle_edit($history_id);

				if ($data && !isset($data['error'])) {
					ob_start();
					self::view('finish', [
						'history_id' => $history_id,
					]);
					$finish_html = ob_get_clean();

					wp_send_json_success([
						'history_id' => $history_id,
						'finish_html' => $finish_html,
					]);
				}

				wp_send_json_error([
					'message' => $data['error'] ?? __('Something is wrong!', 'opal-bulkedit-for-woocommerce'),
				]);
				
			} catch ( Exception $e ) {
				wp_send_json_error( array( 'message' => $e->getMessage() ) );
			}
		}

		private static function pre_handle_edit($history_id) {
			$ids = get_post_meta($history_id, '_opbw_product_ids', true);
			if (!$ids || empty($ids)) {
				return [
					'error' => __('No available products edited!', 'opal-bulkedit-for-woocommerce'),
				];
			}

			$backup = self::export_backup($ids, $history_id);
			update_post_meta($history_id, '_opbw_backup_file', $backup);
			
			return true;
		}

		public function handle_run_edit() {
			if ( !check_ajax_referer( 'opbw-nonce-ajax', 'ajax_nonce_parameter' ) ) {
				wp_die('Permission denied');
			}
	
			try {
				if (empty($_POST['id'])) {
					wp_send_json_error( ['message' => 'No records are being edited!'] );
				}

				$history_id = absint($_POST['id']);
				if ('opbw-history' !== get_post_type( $history_id )) {
					wp_send_json_error([
						'message' => __('This edit record is not in the correct format!', 'opal-bulkedit-for-woocommerce')
					]);
				}

				$edit_data = get_post_meta($history_id, '_opbw_editor_data', true);
				if (!$edit_data || empty($edit_data)) {
					return [
						'result' => false,
						'message' => __('No content needs editing!', 'opal-bulkedit-for-woocommerce'),
					];
				}

				$ids = get_post_meta($history_id, '_opbw_product_ids', true);
				if (!$ids || empty($ids)) {
					return [
						'result' => false,
						'message' => __('No available products edited!', 'opal-bulkedit-for-woocommerce'),
					];
				}

				$max_batch = (int) ceil(count($ids) / $this->batch_size);
				$batch = !empty($_POST['batch']) ? absint($_POST['batch']) : 1;
				if ($batch > $max_batch) {
					wp_send_json_error([
						/* translators: %d: Batch number */
						'message' => sprintf(__('Batch %d does not have any product ids!', 'opal-bulkedit-for-woocommerce'), $batch)
					]);
				}

				if ($batch == 1) {
					wp_update_post(array(
						'ID'    =>  $history_id,
						/* translators: %d: History ID */
						'post_title' => sprintf(__('Editing products (#%d)', 'opal-bulkedit-for-woocommerce'), $history_id),
						'post_status'   =>  'pending'
					));
				}


				$batch_ids = opbw_get_batch($ids, $batch, $this->batch_size);
				$data = self::handle_update_product($history_id, $edit_data, $batch_ids, $batch);
				$number_edited = ($batch - 1) * $this->batch_size + count($batch_ids);

				if ($batch == $max_batch) {
					/* translators: %d: History ID */
					$done_title = sprintf(__('Editing has been completed (#%d)', 'opal-bulkedit-for-woocommerce'), $history_id);
					$process_data = get_post_meta($history_id, '_opbw_process_data', true);
					if ($process_data && !empty($process_data['edit_name'])) {
						$done_title = sprintf('%s (#%d)', $process_data['edit_name'], $history_id);
					}
					wp_update_post(array(
						'ID'    =>  $history_id,
						'post_title' => $done_title,
						'post_status'   =>  'publish'
					));
				}

				$progress = sprintf('%1s/%2s', opbw_pad_number($number_edited), opbw_pad_number(count($ids)));
				update_post_meta($history_id, '_opbw_progress_edited', $progress);

				wp_send_json_success([
					'history_id' => $history_id,
					'logs' => is_array($data) ? $data : false,
					'next_batch' => $batch < $max_batch ? $batch + 1 : false,
					'number_edited' => $progress,
					'percentage' => opbw_cal_processed_percentage($ids, $batch, $this->batch_size)
				]);
				
			} catch ( Exception $e ) {
				wp_send_json_error( array( 'message' => $e->getMessage() ) );
			}
		}

		private static function handle_update_product($history_id, $edit_data, $ids) {
			// echo '<pre>'; print_r($edit_data); echo '</pre>'; die();
			$result = [];
			$logs = [];

			foreach ($ids as $i => $id) {
				$product = wc_get_product($id);
				if (!$product) {
					$logs[] = sprintf('ID %d does not match any products!', $id);
					continue;
				}
				$product_name = $product->get_title()." (#$id)";
				$product_type = $product->get_type();
				$product_datas = $product->get_data();
				$save = false;
				foreach ($edit_data as $action => $data_changed) {
					switch ($action) {
						case 'title_change':
							if ($product_type != 'variation') {
								$title = $product->get_title();
								$new_content = opbw_get_update_content($title, $data_changed);
								// var_dump($new_content); die();
								if ($new_content) {
									$product->set_name( $new_content );
									$save = true;
								} else {
									$logs[] = sprintf('Product %s can not update the title!', esc_html($product_name));
								}
							}
							break;
						case 'sku_change':
							$sku = $product->get_sku();
							$new_content = opbw_get_update_content($sku, $data_changed);
							if ($new_content) {
								$new_content = opbw_get_unique_sku_update($new_content);
								$product->set_sku( $new_content );
								$save = true;
							} else {
								$logs[] = sprintf('Product %s can not update the SKU!', esc_html($product_name));
							}
							break;
						case 'description_change':
							$description = $product_datas['description'];
							$new_content = opbw_get_update_content($description, $data_changed);
							if ($new_content) {
								$product->set_description( $new_content );
								$save = true;
							} else {
								$logs[] = sprintf('Product %s can not update the description!', esc_html($product_name));
							}
							break;
						case 'short_description_change':
							$short_description = $product_datas['short_description'];
							$new_content = opbw_get_update_content($short_description, $data_changed);
							if ($new_content) {
								$product->set_short_description( $new_content );
								$save = true;
							} else {
								$logs[] = sprintf('Product %s can not update the short description!', esc_html($product_name));
							}
							break;
						case 'featured_change':
							if ($product_type != 'variation') {
								$product->set_featured( $data_changed );
								$save = true;
							}
							break;
						case 'thumbnail_change':
							if (!empty($data_changed['action'])) {
								$action_change = $data_changed['action'];
								if ($action_change == 'update') {
									if ($product_type != 'variation') {
										$thumb = absint($product->get_image_id());
									} else {
										$thumb = absint(get_post_meta($id, '_thumbnail_id', true));
									}
									$value_change = absint($data_changed['value']);
									if ($thumb != $value_change) {
										$product->set_image_id( $value_change );
										$save = true;
									}
								} elseif ($action_change == 'remove') {
									$product->set_image_id(null);
									$save = true;
								}
							}
							break;
						case 'gallery_change':
							if ($product_type != 'variation') {
								if (!empty($data_changed['action'])) {
									$action_change = $data_changed['action'];
									$gallery_update = !empty($data_changed['value']) ? array_map('absint', $data_changed['value']) : [];
									$gallery_image_ids = array_map('absint', $product->get_gallery_image_ids());
									if ($action_change == 'add') {
										$gallery_update = array_unique(array_merge($gallery_image_ids, $gallery_update));
									} elseif ($action_change == 'remove') {
										$gallery_update = array_values(array_diff($gallery_image_ids, $gallery_update));
									} elseif ($action_change == 'remove_all') {
										$gallery_update = [];
									}
									if (isset($gallery_update)) {
										$product->set_gallery_image_ids( $gallery_update );
										$save = true;
									}
								}
							}
							break;
						case 'sale_price':
							if ($product_type != 'grouped') {
								$sale_price = (float) $product->get_sale_price();
								$new_price = opbw_get_update_price($sale_price, $data_changed);
								if ($new_price !== false) {
									$sale_price_check_later = $new_price;
								}
							}
							break;
						case 'regular_price':
							if ($product_type != 'grouped') {
								$regular_price = (float) $product->get_regular_price();
								$new_price = opbw_get_update_price($regular_price, $data_changed);
								if ($new_price !== false) {
									$regular_price_check_later = $new_price;
								}
							}
							break;
						case 'schedule_sale_price':
							if ($product_type != 'grouped') {
								if (!empty($data_changed['action'])) {
									$action_change = $data_changed['action'];
									if ($action_change == 'enable') {
										if (!empty($data_changed['data'])) {
											$data_action = $data_changed['data'];
											if (!empty($data_action['sale_start'])) {
												$date = new DateTime($data_action['sale_start']);
												$product->set_date_on_sale_from($date->getTimestamp());
												$save = true;
											}
											if (!empty($data_action['sale_end'])) {
												$date = new DateTime($data_action['sale_end']);
												$product->set_date_on_sale_to($date->getTimestamp());
												$save = true;
											}
										}
									} elseif ($action_change == 'disable') {
										$product->set_date_on_sale_from();
										$product->set_date_on_sale_to();
										$save = true;
									}
								}
							}
							break;
						case 'stock_management':
							if (!in_array($product_type, ['grouped', 'external'])) {
								$product->set_manage_stock( $data_changed );
								$save = true;
							}
							break;
						case 'allow_backorders':
							if ($product_type != 'grouped') {
								$product->set_backorders( $data_changed );
								$save = true;
							}
							break;
						case 'sold_individually':
							if (!in_array($product_type, ['grouped', 'external', 'variation'])) {
								$product->set_sold_individually( $data_changed );
								$save = true;
							}
							break;
						case 'stock_status':
							if ($product_type == 'simple') {
								$product->set_stock_status( $data_changed );
								$save = true;
							}
							break;
						case 'stock_quantity':
							$number = $product->get_stock_quantity();
							$new_val = opbw_get_update_number($number, $data_changed);
							if ($new_val !== false) {
								$product->set_stock_quantity($new_val);
								$save = true;
							}
							break;
						case 'product_weight':
							$number = $product->get_weight();
							$new_val = opbw_get_update_number($number, $data_changed);
							if ($new_val !== false) {
								$product->set_weight($new_val);
								$save = true;
							}
							break;
						case 'product_length':
							$number = $product->get_length();
							$new_val = opbw_get_update_number($number, $data_changed);
							if ($new_val !== false) {
								$product->set_length($new_val);
								$save = true;
							}
							break;
						case 'product_width':
							$number = $product->get_width();
							$new_val = opbw_get_update_number($number, $data_changed);
							if ($new_val !== false) {
								$product->set_width($new_val);
								$save = true;
							}
							break;
						case 'product_height':
							$number = $product->get_height();
							$new_val = opbw_get_update_number($number, $data_changed);
							if ($new_val !== false) {
								$product->set_height($new_val);
								$save = true;
							}
							break;
						case 'category_change':
							if ($product_type != 'variation') {
								$tax_ids = $product->get_category_ids();
								$new_taxs = opbw_get_update_tax($tax_ids, $data_changed, 'product_cat');
								if (is_array($new_taxs)) {
									$product->set_category_ids( $new_taxs );
									$save = true;
								}
							}
							break;
						case 'tag_change':
							if ($product_type != 'variation') {
								$tax_ids = $product->get_tag_ids();
								$new_taxs = opbw_get_update_tax($tax_ids, $data_changed, 'product_tag');
								if (is_array($new_taxs)) {
									$product->set_tag_ids( $new_taxs );
									$save = true;
								}
							}
							break;
						case 'attr_action':
							if ($product_type == 'variable') {
								$product_attributes = $product->get_attributes();
								$attributes_update = opbw_get_update_attributes($product_attributes, $data_changed);
								if ($attributes_update) {
									$product->set_attributes($attributes_update);
									$save = true;
								}
							}
							break;
						case 'delete_action':
							$delete = opbw_delete_product($product, true);
							if ($delete && is_string($delete)) {
								$logs[] = $delete;
							}
							break;
					}
				}

				// Check Price after loop
				if (isset($sale_price_check_later) && isset($regular_price_check_later)) {
					if ($sale_price_check_later < $regular_price_check_later) {
						$product->set_regular_price( $regular_price_check_later );
						$product->set_sale_price( $sale_price_check_later );
						$save = true;
					} else {
						$logs[] = sprintf('Product %s cannot have its price updated because the sale price is greater than the regular price after updating!', $product_name);
					}
				} elseif (isset($regular_price_check_later)) {
					$sale_price = (float) $product->get_sale_price();
					if ($sale_price < $regular_price_check_later) {
						$product->set_regular_price( $regular_price_check_later );
						$save = true;
					} else {
						$logs[] = sprintf('Product %s cannot have its price updated because the sale price is greater than the regular price after updating!', $product_name);
					}
				} elseif (isset($sale_price_check_later)) {
					$regular_price = (float) $product->get_regular_price();
					if ($sale_price_check_later < $regular_price) {
						$product->set_sale_price( $sale_price_check_later );
						$save = true;
					} else {
						$logs[] = sprintf('Product %s cannot have its price updated because the sale price is greater than the regular price after updating!', $product_name);
					}
				}

				if ($save) {
					$product->save();
					wc_delete_product_transients( $id );
				}
				
				// DEBUG SLEEP
				// sleep(10);
				// $logs[] = sprintf('Product %s cannot update somethings!', $product_name);
			}

			if (!empty($logs)) {
				return $logs;
			}
			return true;
		}

		private static function export_backup($ids, $history_id) {
			include_once dirname(WC_PLUGIN_FILE) . '/includes/export/class-wc-product-csv-exporter.php';
			$exporter = new WC_Product_CSV_Exporter();
			
			$columns = get_post_meta($history_id, '_opbw_backup_columns', true);
			if (!empty($columns)) {
				$exporter->set_columns_to_export( $columns );
			}

			add_filter( "woocommerce_product_export_product_query_args", function($args) use ($ids) {
				$args['include'] = $ids;
				return $args;
			} );

			add_filter( "woocommerce_product_export_rows", function($data_row, $ins) use ($ids) {
				return $ins->get_headers_row_file().$data_row;
			}, 10, 2);

			$exporter->set_filename("opbw-backup-$history_id.csv");
			$exporter->generate_file();
			// $exporter->export();

			$upload_dir = wp_upload_dir();
			$file_path = trailingslashit( $upload_dir['basedir'] ) . $exporter->get_filename();
			$file_header_path = trailingslashit( $upload_dir['basedir'] ) . $exporter->get_filename() . '.headers';
			require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php';
			require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php';

			if ( @file_exists( $file_header_path ) ) { // phpcs:ignore Generic.PHP.NoSilencedErrors.Discouraged
				wp_delete_file($file_header_path);
			}

			return @file_exists($file_path) ? $file_path : false;
		}
    }

endif;

