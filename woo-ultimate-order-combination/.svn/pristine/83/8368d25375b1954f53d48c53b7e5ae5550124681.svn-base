<?php if ( ! defined( 'ABSPATH' ) ) exit;

use \Automattic\WooCommerce\Admin\API\Reports\Cache as ReportsCache;



	include_once(realpath(WUOC_PLUGIN_DIR.'/inc/wuoc-emails.php'));
	// if(WUOC_PLUGIN_DIR.'/inc/functions-inner.php')
	// include_once(WUOC_PLUGIN_DIR.'/inc/functions-inner.php');

	if(!function_exists('wuoc_add_prefix')){
		function wuoc_add_prefix($str, $prefix=''){
			return $prefix.str_replace($prefix, '', $str);
		}
	}
	if(!function_exists('wuoc_remove_str')){
		function wuoc_remove_str($str, $prefix){
			return str_replace($prefix, '', $str);
		}
	}	
		
	if(!function_exists('wuoc_add_combined_link')){
		function wuoc_add_combined_link()
		{
			global $typenow;
		
			if ($typenow=='shop_order') {
				$total_combined = get_option('wuoc_combined_orders_count', 0);
			?>
				<script type="text/javascript" language="javascript">
					jQuery(document).ready(function($) {
						$('.subsubsub').append('| <a href="<?php echo admin_url('admin.php?page=wuoc-settings&t=2'); ?>" target="_blank"><?php _e('Combined', 'woo-uoc'); ?> (<?php echo $total_combined; ?>)</a>');
					});
				</script>
		
		<?php
			}
		}
	}
	
	function wuoc_settings_update(){
		
		
		
		if(!empty($_POST)){
		
			global $wuoc_currency, $wuoc_settings, $wuoc_orderslist_page_cron;
		
			if(!empty($_POST) && isset($_POST['wuoc_settings'])){
				 
				
				$wuoc_currency = get_woocommerce_currency_symbol();
	
				wuoc_settings_refresh();
						
				
				if ( 
					! isset( $_POST['wuoc_settings_field'] ) 
					|| ! wp_verify_nonce( $_POST['wuoc_settings_field'], 'wuoc_settings_action' ) 
				) {
				
				   _e('Sorry, your nonce did not verify.', 'woo-uoc');
				   exit;
				
				} else {
				
						$wuoc_additional = (isset($_POST['wuoc_settings']['wuoc_additional']));			   
						
						$wuoc_settings_updated = wuoc_sanitize_data($_POST['wuoc_settings'] );
						
						$wuoc_settings_updated['wuoc_additional'] = (isset($wuoc_settings_updated['wuoc_additional']) && is_array($wuoc_settings_updated['wuoc_additional']))?$wuoc_settings_updated['wuoc_additional']:(isset($wuoc_settings['wuoc_additional'])?$wuoc_settings['wuoc_additional']:'');
						
						// $wuoc_products_existing = $wuoc_settings['wuoc_products'];

						update_option('wuoc_settings', wuoc_sanitize_data($wuoc_settings_updated));

						$wuoc_order_combine_email = (isset($_POST['wuoc_order_combine_email'])?wuoc_sanitize_data($_POST['wuoc_order_combine_email']):($wuoc_additional?0:get_option('wuoc_order_combine_email', 0)));
						update_option( 'wuoc_order_combine_email', $wuoc_order_combine_email );


						$wuoc_show_retained_meta = (isset($_POST['wuoc_show_retained_meta'])?wuoc_sanitize_data($_POST['wuoc_show_retained_meta']):($wuoc_additional?0:get_option('wuoc_show_retained_meta', 0)));
						update_option( 'wuoc_show_retained_meta', $wuoc_show_retained_meta );
						
						
						
						$wuoc_maintain_uniqueness = (isset($_POST['wuoc_maintain_uniqueness'])?wuoc_sanitize_data($_POST['wuoc_maintain_uniqueness']):($wuoc_additional?0:get_option('wuoc_maintain_uniqueness', 0)));
						update_option( 'wuoc_maintain_uniqueness', $wuoc_maintain_uniqueness );
						
						$wuoc_shipping_status = (isset($_POST['wuoc_shipping_status'])?wuoc_sanitize_data($_POST['wuoc_shipping_status']):($wuoc_additional?0:get_option('wuoc_shipping_status', '')));
						update_option( 'wuoc_shipping_status', $wuoc_shipping_status );
						
						$wuoc_combined_order_status = (isset($_POST['wuoc_combined_order_status'])?wuoc_sanitize_data($_POST['wuoc_combined_order_status']):($wuoc_additional?0:get_option('wuoc_combined_order_status', '')));
						update_option( 'wuoc_combined_order_status', $wuoc_combined_order_status );						
						
						$wuoc_thankyou_page_cron = (isset($_POST['wuoc_thankyou_page_cron'])?wuoc_sanitize_data($_POST['wuoc_thankyou_page_cron']):($wuoc_additional?0:get_option('wuoc_thankyou_page_cron', 0)));
						update_option( 'wuoc_thankyou_page_cron', $wuoc_thankyou_page_cron );
						
						$wuoc_orderslist_page_cron = (isset($_POST['wuoc_orderslist_page_cron'])?wuoc_sanitize_data($_POST['wuoc_orderslist_page_cron']):($wuoc_additional?0:$wuoc_orderslist_page_cron));
						update_option( 'wuoc_orderslist_page_cron', $wuoc_orderslist_page_cron );
						
						
						$wuoc_move_to_trash = (isset($_POST['wuoc_move_to_trash'])?wuoc_sanitize_data($_POST['wuoc_move_to_trash']):($wuoc_additional?0:get_option('wuoc_move_to_trash', 0)));
						update_option( 'wuoc_move_to_trash', $wuoc_move_to_trash );
						
						$wuoc_filter_by_meta_key = (isset($_POST['wuoc_filter_by_meta_key'])?wuoc_sanitize_data($_POST['wuoc_filter_by_meta_key']):($wuoc_additional?0:get_option('wuoc_filter_by_meta_key', 0)));
						update_option( 'wuoc_filter_by_meta_key', $wuoc_filter_by_meta_key );
						
						$wuoc_custom_meta_key_column = (isset($_POST['wuoc_custom_meta_key_column'])?wuoc_sanitize_data($_POST['wuoc_custom_meta_key_column']):($wuoc_additional?0:get_option('wuoc_custom_meta_key_column', 0)));
						update_option( 'wuoc_custom_meta_key_column', $wuoc_custom_meta_key_column );
						
						$wuoc_view_order_button = (isset($_POST['wuoc_view_order_button'])?wuoc_sanitize_data($_POST['wuoc_view_order_button']):($wuoc_additional?0:get_option('wuoc_view_order_button', 0)));
						update_option( 'wuoc_view_order_button', $wuoc_view_order_button );
						

						$wuoc_custom_meta_key_column_csv = (isset($_POST['wuoc_custom_meta_key_column_csv'])?wuoc_sanitize_data($_POST['wuoc_custom_meta_key_column_csv']):($wuoc_additional?0:get_option('wuoc_custom_meta_key_column_csv', 0)));
						update_option( 'wuoc_custom_meta_key_column_csv', $wuoc_custom_meta_key_column_csv );
						
						
						
						$wuoc_show_order_items_meta = (isset($_POST['wuoc_show_order_items_meta'])?wuoc_sanitize_data($_POST['wuoc_show_order_items_meta']):($wuoc_additional?0:get_option('wuoc_show_order_items_meta', 0)));
						update_option( 'wuoc_show_order_items_meta', $wuoc_show_order_items_meta );
						
						$wuoc_sort_order_items_by_category = (isset($_POST['wuoc_sort_order_items_by_category'])?wuoc_sanitize_data($_POST['wuoc_sort_order_items_by_category']):($wuoc_additional?0:get_option('wuoc_sort_order_items_by_category', 0)));
						update_option( 'wuoc_sort_order_items_by_category', $wuoc_sort_order_items_by_category );						
						
						$wuoc_clone_order_notes = (isset($_POST['wuoc_clone_order_notes'])?wuoc_sanitize_data($_POST['wuoc_clone_order_notes']):($wuoc_additional?0:get_option('wuoc_clone_order_notes', 0)));
						update_option( 'wuoc_clone_order_notes', $wuoc_clone_order_notes );
						
						$wuoc_clone_customer_notes = (isset($_POST['wuoc_clone_customer_notes'])?wuoc_sanitize_data($_POST['wuoc_clone_customer_notes']):($wuoc_additional?0:get_option('wuoc_clone_customer_notes', 0)));
						update_option( 'wuoc_clone_customer_notes', $wuoc_clone_customer_notes );
						
						$wuoc_clone_shipping = (isset($_POST['wuoc_clone_shipping'])?wuoc_sanitize_data($_POST['wuoc_clone_shipping']):($wuoc_additional?0:get_option('wuoc_clone_shipping', 0)));
						update_option( 'wuoc_clone_shipping', $wuoc_clone_shipping );
						

						$wuoc_stock_short_email = (isset($_POST['wuoc_stock_short_email'])?wuoc_sanitize_data($_POST['wuoc_stock_short_email']):($wuoc_additional?0:get_option('wuoc_stock_short_email', 0)));
						update_option( 'wuoc_stock_short_email', $wuoc_stock_short_email );

						$wuoc_product_backorder_email = (isset($_POST['wuoc_product_backorder_email'])?wuoc_sanitize_data($_POST['wuoc_product_backorder_email']):($wuoc_additional?0:get_option('wuoc_product_backorder_email', 0)));
						update_option( 'wuoc_product_backorder_email', $wuoc_product_backorder_email );						

						$wuoc_new_order_email = (isset($_POST['wuoc_new_order_email'])?wuoc_sanitize_data($_POST['wuoc_new_order_email']):($wuoc_additional?0:get_option('wuoc_new_order_email', 0)));
						update_option( 'wuoc_new_order_email', $wuoc_new_order_email );
						
						
						$wuoc_bootstrap = (isset($_POST['wuoc_bootstrap'])?wuoc_sanitize_data($_POST['wuoc_bootstrap']):($wuoc_additional?0:get_option('wuoc_bootstrap', 0)));
						update_option( 'wuoc_bootstrap', $wuoc_bootstrap );
						
						
						
						wuoc_settings_refresh();
				   
				}
				
				
			}
	
			
	
		}
	}
	
	
	class wuoc_order_splitter {
		
		/** @var original order ID. */
		public $original_order_id;
		public $auto_split;
		public $exclude_items;
		public $include_items;
		public $include_items_qty;
		public $general_array;
		public $unique_array;
		public $clone_in_progress;
	
		/**
		 * Fire clone_order function on clone request.
		 */
		
		function __construct() {
			
			$this->exclude_items = array();
			$this->include_items = array();
			$this->include_items_qty = array();
			$this->general_array = array();
			$this->unique_array = array();
			$this->clone_in_progress = false;
			
			
		}
		
		
		

		
		public function cloned_order_data($order_id, $originalorderid = array(), $clone_order=true, $reduce_stock=false, $clone_shipping=true){
			
			
			global $yith_pre_order, $wuoc_debug;
			$order = new WC_Order($order_id);

            add_filter('woocommerce_update_product_stock_query', function ($sql, $product_id_with_stock, $new_stock, $operation) {
		
				$product = wc_get_product($product_id_with_stock);
			
				if ($product && $product->managing_stock()) {
					if ($operation === '+') {
						$product->increase_stock($new_stock);
					} elseif ($operation === '-') {
						$product->decrease_stock($new_stock);
					} else {
						$product->set_stock_quantity($new_stock);
					}
					$product->save();
				}
			
				return ''; // No need for SQL since we're using WooCommerce functions
			}, 10, 4);

		
			$originalorderids = (is_array($originalorderid)?$originalorderid:array($originalorderid));

			
			
			foreach( $originalorderids as $originalorderid ) {
			
				$this->original_order_id = 0;
				
				if ($originalorderid != null) {
					$this->original_order_id = $originalorderid;
				} elseif(array_key_exists('order_id', $_GET)) {
					$this->original_order_id = wuoc_sanitize_data($_GET['order_id']);
				}
				
				if(!$this->original_order_id){ continue; }
				
			
				
				$original_order = wc_get_order($this->original_order_id);
				
				$original_order->add_order_note(__('Child Order').' #'.$order_id.'');

				
				
				$order_status = $original_order->get_status();
				
				// Check if Sequential Numbering is installed
				
				if ( class_exists( 'WC_Seq_Order_Number_Pro' ) ) {
					
					// Set sequential order number 
					
					$setnumber = new WC_Seq_Order_Number_Pro;
					$setnumber->set_sequential_order_number($order_id);
					
				}
				
				if(!$wuoc_debug){
				
					$this->clone_order_header($order_id);
					$this->clone_order_billing($order_id);
					
					if($clone_shipping)
					$this->clone_order_shipping($order_id);
					
					
					$this->clone_order_shipping_items($order_id, $original_order);
					$this->clone_order_fees($order, $original_order);
					
					$this->clone_order_coupons($order, $original_order);
				
				}
				
				add_filter( 'woocommerce_can_reduce_order_stock', 'wuoc_filter_woocommerce_can_reduce_order_stock', 10, 2 );
				
				if($clone_order){

					$this->clone_order_items($order, $original_order);
					$this->meta_keys_clone_from_to($order_id, $this->original_order_id);//exit;

					
				}elseif(method_exists($this, 'add_order_items')){

					// $this->merge_order_items($order);
					
				}
				
				if(!$wuoc_debug){

					$order->set_payment_method($original_order->get_payment_method());
					$order->set_payment_method_title($original_order->get_payment_method_title());

				}
				
				if(!$wuoc_debug){
					//$order->update_status($order_status); //('on-hold');
					
				}
				
				$order->add_order_note(__('Parent Order').' #'.$this->original_order_id.'');
				
				$order->save();
			}

		}	
		
		public function meta_keys_clone_from_to($order_id_to = 0, $order_id_from = 0) {
			if ($order_id_from && $order_id_to) {
		
				// Get meta keys from both orders
				$order_id_to_meta = wuoc_get_post_meta($order_id_to);
				$order_id_to_keys = array_keys($order_id_to_meta);
		
				$order_id_from_meta = wuoc_get_post_meta($order_id_from);
				$order_id_from_keys = array_keys($order_id_from_meta);
		
				// Find keys that exist in `from` order but not in `to` order
				$arr_diff = array_diff($order_id_from_keys, $order_id_to_keys);
		
				if (!empty($arr_diff)) {
					foreach ($arr_diff as $diff_key) {
						if (array_key_exists($diff_key, $order_id_from_meta)) {
							$diff_value = $order_id_from_meta[$diff_key];
							if (!in_array($diff_key, ['wuoc_order_splitter_cron', 'wuoc_update_status'])) {
								wuoc_update_order_meta($order_id_to, $diff_key, $diff_value);
							}
						}
					}
				}
		
				// Get WooCommerce order objects
				$original_order = wc_get_order($order_id_from);
				$new_order = wc_get_order($order_id_to);
		
				$old_order_items = [];
		
				// Clone order item meta
				foreach ($original_order->get_items() as $item_id => $item_data) {
					$item_meta = $this->wuoc_get_order_item_meta($item_id);
					$item_meta['item_id'] = $item_id;
		
					$pid = $item_data->get_product_id();
					$vid = $item_data->get_variation_id();
		
					$old_order_items[$pid][$vid] = $item_meta;
				}
		
				if (true) {
					$items_traces = wuoc_get_post_meta($order_id_to, '_items_traces', true);
					$items_traces = maybe_unserialize($items_traces);
		
					foreach ($new_order->get_items() as $item_id => $item_data) {
						if (array_key_exists($item_id, $items_traces)) {
							$pid = $item_data->get_product_id();
							$vid = $item_data->get_variation_id();
		
							if (!empty($old_order_items) && isset($old_order_items[$pid][$vid])) {
								$item_meta = $old_order_items[$pid][$vid];
								$old_item_id = $item_meta['item_id'] ?? 0;
		
								if (!empty($item_meta) && $old_item_id && $items_traces[$item_id] == $old_item_id) {
									foreach ($item_meta as $key => $value) {
										$value = is_array($value) ? current($value) : $value;
										$existing_value = wc_get_order_item_meta($item_id, $key, true);
		
										$consider_update = (
											(is_array($existing_value) && empty($existing_value)) ||
											(!is_array($existing_value) && $existing_value == '') &&
											((is_array($value) && !empty($value)) || (!is_array($value) && $value != ''))
										);
		
										if ($consider_update) {
											wc_update_order_item_meta($item_id, $key, $value);
										}
									}
								}
							}
						}
					}
				}
			}
		}

		function wuoc_get_order_item_meta($item_id) {
			$obj = [];
		
			if ($item_id) {
				$order_item = new WC_Order_Item_Product($item_id);
				$meta_data = $order_item->get_meta_data();
		
				if (!empty($meta_data)) {
					foreach ($meta_data as $meta) {
						$obj[$meta->key] = [$meta->value];
					}
				}
			}
		
			return $obj;
		}

		public function clone_order_header($order_id, $_order_total = false) {
			$original_order = wc_get_order($this->original_order_id);
			$new_order = wc_get_order($order_id);
		
			if (!$original_order || !$new_order) {
				return;
			}
		
			if (!$_order_total) {
				$_order_total = $original_order->get_total();
			}
		
			// ✅ Use WooCommerce's dedicated methods instead of update_meta_data
			$new_order->set_shipping_total($original_order->get_shipping_total());
			$new_order->set_discount_total($original_order->get_discount_total());
			$new_order->set_total($_order_total);
			$new_order->set_currency($original_order->get_currency());
			$new_order->set_customer_id($original_order->get_customer_id());
			$new_order->set_prices_include_tax($original_order->get_prices_include_tax());
			$new_order->set_customer_ip_address($original_order->get_customer_ip_address());
			$new_order->set_customer_user_agent($original_order->get_customer_user_agent());
		
			// ✅ Set a new order key properly
			$new_order->set_order_key(wc_generate_order_key());
		
			// ✅ Handle Tribe Tickets meta if applicable
			$_tribe_tickets_meta = $original_order->get_meta('_tribe_tickets_meta', true);
			if ($_tribe_tickets_meta) {
				$new_order->update_meta_data('_tribe_tickets_meta', $_tribe_tickets_meta);
			}
		
			$new_order->save(); // ✅ Always save the order after making changes
		}


		
		/**
		 * Duplicate Order Billing meta
		 */
		
		public function clone_order_billing($order_id) {
			$original_order = wc_get_order($this->original_order_id);
			$new_order = wc_get_order($order_id);
		
			if (!$original_order || !$new_order) {
				return;
			}
		
			// Clone billing details using WooCommerce setter methods
			$new_order->set_billing_city($original_order->get_billing_city());
			$new_order->set_billing_state($original_order->get_billing_state());
			$new_order->set_billing_postcode($original_order->get_billing_postcode());
			$new_order->set_billing_email($original_order->get_billing_email());
			$new_order->set_billing_phone($original_order->get_billing_phone());
			$new_order->set_billing_address_1($original_order->get_billing_address_1());
			$new_order->set_billing_address_2($original_order->get_billing_address_2());
			$new_order->set_billing_country($original_order->get_billing_country());
			$new_order->set_billing_first_name($original_order->get_billing_first_name());
			$new_order->set_billing_last_name($original_order->get_billing_last_name());
			$new_order->set_billing_company($original_order->get_billing_company());
		
			$new_order->save();
		
			do_action('clone_extra_billing_fields_hook', $order_id, $this->original_order_id);
		}

		
		/**
		 * Duplicate Order Shipping meta
		 */
		
		public function clone_order_shipping($order_id) {
			$original_order = wc_get_order($this->original_order_id);
			$new_order = wc_get_order($order_id);
		
			if (!$original_order || !$new_order) {
				return;
			}
		
			// Clone shipping details using WooCommerce setter methods
			$new_order->set_shipping_country($original_order->get_shipping_country());
			$new_order->set_shipping_first_name($original_order->get_shipping_first_name());
			$new_order->set_shipping_last_name($original_order->get_shipping_last_name());
			$new_order->set_shipping_company($original_order->get_shipping_company());
			$new_order->set_shipping_address_1($original_order->get_shipping_address_1());
			$new_order->set_shipping_address_2($original_order->get_shipping_address_2());
			$new_order->set_shipping_city($original_order->get_shipping_city());
			$new_order->set_shipping_state($original_order->get_shipping_state());
			$new_order->set_shipping_postcode($original_order->get_shipping_postcode());
		
			$new_order->save();
		
			do_action('clone_extra_shipping_fields_hook', $order_id, $this->original_order_id);
		}

		
		
		/**
		 * Duplicate Order Fees
		 */
		
		public function clone_order_fees($order, $original_order) {
			$fee_items = $original_order->get_items('fee');
		
			if (!empty($fee_items)) {
				foreach ($fee_items as $fee_key => $fee_value) {
					$fee_item = new WC_Order_Item_Fee();
		
					$fee_item->set_props(array(
						'name'        => $fee_value->get_name(),
						'tax_class'   => $fee_value->get_tax_class(),
						'tax_status'  => $fee_value->get_tax_status(),
						'total'       => $fee_value->get_total(),
						'total_tax'   => $fee_value->get_total_tax(),
						'taxes'       => $fee_value->get_taxes(),
					));
		
					$order->add_item($fee_item);
				}
			}
		
			$order->save();
		}

		
		/**
		 * Duplicate Order Coupon
		 */
		
		public function clone_order_coupons($order, $original_order) {
			$coupon_items = method_exists($original_order, 'get_coupon_codes') ? $original_order->get_coupon_codes() : [];
		
			if (!empty($coupon_items)) {
				foreach ($original_order->get_items('coupon') as $coupon_key => $coupon_values) {
					$coupon_item = new WC_Order_Item_Coupon();
		
					$coupon_item->set_props(array(
						'name'         => $coupon_values->get_name(),
						'code'         => $coupon_values->get_code(),
						'discount'     => $coupon_values->get_discount(),
						'discount_tax' => $coupon_values->get_discount_tax(),
					));
		
					$order->add_item($coupon_item);
				}
			}
		
			$order->save();
		}

		

		
		/**
		 * Clone Items - v 1.3
		 */
		
		public function clone_order_items($order, $original_order) {
			global $wuoc_pro, $yith_pre_order;
		
			$order_id = $order->get_id();
			$order_status = $original_order->get_status();
		
			foreach ($original_order->get_items() as $order_key => $values) {
				if (!empty($this->exclude_items) && in_array($values->get_product_id(), $this->exclude_items)) {
					continue;
				}
		
				if (!empty($this->include_items) && !in_array($values->get_product_id(), $this->include_items)) {
					continue;
				}
		
				if ($wuoc_pro) {
					$wuoc_rules = get_option('wuoc_rules', []);
					$meta_kv = get_post_meta($values->get_product_id());
					$meta_kv = is_array($meta_kv) ? $meta_kv : [];
		
					$cross_match = array_intersect_key($wuoc_rules, $meta_kv);
		
					if (!empty($cross_match)) {
						$wuoc_order_statuses = wc_get_order_statuses();
						$wuoc_order_statuses_keys = array_keys($wuoc_order_statuses);
		
						foreach ($cross_match as $mk => $rd) {
							if (!empty($rd)) {
								foreach ($rd as $rv) {
									if (in_array($rv, $wuoc_order_statuses_keys)) {
										$order_status = $rv;
									}
								}
							}
						}
		
						if ($yith_pre_order && array_key_exists('_ywpo_preorder', $meta_kv)) {
							$order_status = 'wc-on-hold';
							$order->update_meta_data('_order_has_preorder', $meta_kv['_ywpo_preorder'][0]);
						}
					}
				}
		
				$product_id = $values->get_product_id();
				$variation_id = $values->get_variation_id();
		
				$product = wc_get_product($variation_id ? $variation_id : $product_id);
		
				$unit_price = $product ? $product->get_price() : 0;
		
				$item = new WC_Order_Item_Product();
		
				$product_qty = isset($this->include_items_qty[$product_id]) ? $this->include_items_qty[$product_id] : $values->get_quantity();
		
				$line_price = $values->get_quantity() >= 1 ? ($values->get_total() / $values->get_quantity()) : $values->get_total();
		
				$set_props = [
					'order_key'    => $order_key,
					'quantity'     => ($product_qty <= $values->get_quantity() ? $product_qty : $values->get_quantity()),
					'variation'    => $values->get_variation(),
					'subtotal_tax' => $values->get_subtotal_tax(),
					'total_tax'    => $values->get_total_tax(),
					'taxes'        => $values->get_taxes(),
				];
		
				$total = ($line_price != $unit_price) ? ($line_price * $set_props['quantity']) : false;
		
				$set_props['subtotal'] = $total ? $total : $unit_price * $set_props['quantity'];
				$set_props['total'] = $total ? $total : $unit_price * $set_props['quantity'];
		
				$item->set_props($set_props);
		
				if ($product) {
					$item->set_props([
						'name'         => $product->get_name(),
						'tax_class'    => $product->get_tax_class(),
						'product_id'   => $product_id,
						'variation_id' => $variation_id,
					]);
				}
		
				$item->set_backorder_meta();
		
				if ($product_qty) {
					$order->add_item($item);
					$order->save();
				}
			}
		}

		
		
	
		
		function clone__success() {
			?>
			<div class="notice notice-success is-dismissible">
				<p><?php echo esc_html__('Order Cloned.', 'woo-uoc'); ?></p>
			</div>
			<?php
		}

				
			
		function clone__error() {
			?>
			<div class="notice notice-error is-dismissible">
				<p><?php echo esc_html__('Duplication failed, an error has occurred.', 'woo-uoc'); ?></p>
			</div>
			<?php
		}

		
		
		
		
		public function clone_order_shipping_items($order_id, $original_order, $qty = false) {
			$wuoc_shipping_status_option = get_option('wuoc_shipping_status', '');
		
			if (!$wuoc_shipping_status_option || $wuoc_shipping_status_option == 'no_shipping') {
				return; // Exit early if no shipping should be cloned
			}
		
			$order = wc_get_order($order_id);
			$new_order_shipping_items = $order->get_items('shipping');
			$original_order_shipping_items = $original_order->get_items('shipping');
		
			$new_order_shipping_methods = [];
		
			foreach ($new_order_shipping_items as $item_id => $new_order_shipping_item) {
				$method_id = $new_order_shipping_item->get_method_id();
				if ($method_id) {
					$cost = wc_format_decimal($new_order_shipping_item->get_total());
					$cost = $cost ? (float)$cost : 0;
					$new_order_shipping_methods[$method_id] = ['cost' => $cost, 'item_id' => $item_id];
				}
			}
		
			$cost_total = 0;
		
			foreach ($original_order_shipping_items as $original_order_shipping_item) {
				$cost = wc_format_decimal($original_order_shipping_item->get_total());
		
				if ($cost && $qty) {
					$qty_total = wuoc_order_total_qty($original_order);
					$per_item_cost = ($cost / $qty_total);
					$cost = ($qty * $per_item_cost);
				}
		
				$cost_total += (float)$cost;
				$method_id = $original_order_shipping_item->get_method_id();
				if (!$method_id) {
					continue;
				}
		
				// Retrieve existing item ID for this method if it exists
				$item_id = $order->get_meta('_wuoc_' . $method_id, true);
		
				switch ($wuoc_shipping_status_option) {
					case 'combine_shipping':
						if (!$item_id) {
							$shipping_item = new WC_Order_Item_Shipping();
							$shipping_item->set_method_id($method_id);
							$shipping_item->set_name($original_order_shipping_item->get_name());
							$shipping_item->set_total($cost);
							$item_id = $order->add_item($shipping_item);
							$order->update_meta_data('_wuoc_' . $method_id, $item_id); // ✅ Store method ID reference
						} else {
							$cost += (float) $order->get_meta('_wuoc_' . $method_id . '_shipping', true);
							$shipping_item = $order->get_item($item_id);
							$shipping_item->set_total($cost);
						}
		
						$order->update_meta_data('_wuoc_' . $method_id . '_shipping', $cost);
						break;
		
					case 'separate_shipping':
						if ($cost > 0) {
							$shipping_item = new WC_Order_Item_Shipping();
							$shipping_item->set_method_id($method_id);
							$shipping_item->set_name($original_order_shipping_item->get_name());
							$shipping_item->set_total($cost);
							$item_id = $order->add_item($shipping_item);
							$order->update_meta_data('_wuoc_' . $method_id, $item_id); // ✅ Store method ID reference
						}
						break;
		
					case 'highest_shipping':
						if (!$item_id) {
							$shipping_item = new WC_Order_Item_Shipping();
							$shipping_item->set_method_id($method_id);
							$shipping_item->set_name($original_order_shipping_item->get_name());
							$shipping_item->set_total($cost);
							$item_id = $order->add_item($shipping_item);
							$order->update_meta_data('_wuoc_' . $method_id, $item_id); // ✅ Store method ID reference
						} else {
							$cost = max($cost_total, (float) $order->get_meta('_wuoc_' . $method_id . '_shipping', true));
							$shipping_item = $order->get_item($item_id);
							$shipping_item->set_total($cost);
						}
		
						$order->update_meta_data('_wuoc_' . $method_id . '_shipping', $cost);
						break;
				}
			}
		
			$order->save();
		}

		   
	}
	
	new wuoc_order_splitter;


	
	function wuoc_settings() {
		if (!current_user_can('manage_woocommerce')) {
			wp_die(esc_html__('You do not have sufficient permissions to access this page.', 'woo-uoc'));
		}
	
		global $wpdb;
	
		$css_arr = [];
	
		// Ensure the settings file exists before including it
		$settings_file = realpath(WUOC_PLUGIN_DIR . '/inc/wuoc_settings.php');
		if ($settings_file && file_exists($settings_file)) {
			include_once $settings_file;
		} else {
			wp_die(esc_html__('Settings file not found.', 'woo-uoc'));
		}
	}

	function wuoc_settings_refresh() {
		global $wuoc_settings;
	
		$wuoc_settings = get_option('wuoc_settings', []);
	
		// Ensure 'wuoc_additional' is always an array
		$wuoc_settings['wuoc_additional'] = isset($wuoc_settings['wuoc_additional']) && is_array($wuoc_settings['wuoc_additional']) 
			? $wuoc_settings['wuoc_additional'] 
			: [];
	}
	
	function wuoc_array_unique_recursive(array $array) {
		$array = array_map('unserialize', array_unique(array_map('serialize', $array)));
	
		foreach ($array as $key => $elem) {
			if (is_array($elem)) {
				$array[$key] = wuoc_array_unique_recursive($elem);
			}
		}
	
		return $array;
	}
		

	
	
	
	
	
	function wuoc_init(){
		
		global $wuoc_currency, $wuoc_activated;
		
		
		
		if(!$wuoc_activated)
		return;
		
		
		$wuoc_currency = get_woocommerce_currency_symbol();
		wuoc_settings_refresh();
		
		register_post_status('wc-wuoc-custom', array(
			'label'                     => 'WUOC Custom Order',
			'public'                    => true,
			'show_in_admin_status_list' => true,
			'show_in_admin_all_list'    => true,
			'exclude_from_search'       => false,
			'label_count'               => _n_noop(
				'WUOC Custom Order <span class="count">(%s)</span>',
				'WUOC Custom Orders <span class="count">(%s)</span>'
			)
		));
		
		
	}
	
		
	
	

	function wuoc_front_scripts() {	
		/*wp_enqueue_script(
			'wuoc_scripts',
			plugins_url('js/front-scripts.js', dirname(__FILE__)),
			array('jquery'),
			time()
		);	*/
	}

    function wuoc_admin_scripts_wos_dependent() {


	    global $typenow;

        if($typenow == 'shop_order'){

            wp_enqueue_script(
                'wuoc_wos_dependent_scripts',
                plugins_url('js/wos-dependent-scripts.js', dirname(__FILE__)),
                array('jquery'),
                time()
            );

            wp_register_style('wuoc_wos_dependent-styles', plugins_url('css/wos-dependent-styles.css?t='.time(), dirname(__FILE__)));
            wp_enqueue_style( 'wuoc_wos_dependent-styles' );


        }



    }
		
	function wuoc_admin_scripts() {

        global $typenow, $wuoc_crons_options, $pagenow, $wuoc_pro, $post, $wuoc_is_wc_orders_page, $is_wuoc_edit_order_page, $is_wuoc_settings_page, $_wuoc_order_id;
		
		$current_screen = get_current_screen();

		
		wp_register_style('wuos-bootstrap', plugins_url('css/bootstrap.min.css?t='.time(), dirname(__FILE__)));
		/*wp_register_script('wuoc_bootstrap_script', 
			plugins_url('js/bootstrap.min.js', dirname(__FILE__)),
			array ('jquery', 'jquery-ui'),                  //depends on these, however, they are registered by core already, so no need to enqueue them.
			time()
		);*/
		
		$is_orders_list = ($current_screen->post_type=='shop_order' || $wuoc_is_wc_orders_page);

		
				
		$crons_button_display = (array_key_exists('button_display', $wuoc_crons_options)?$wuoc_crons_options['button_display']:array());
		$crons_clock_settings = (array_key_exists('clock', $wuoc_crons_options)?$wuoc_crons_options['clock']:array());
		//wuoc_pree($crons_clock_settings);
		$translation_array = array(
										'is_pro' => $wuoc_pro,
										
										'combined_info' => '',
										
										'wuoc_filter_by_meta_key' => get_option('wuoc_filter_by_meta_key', 0),
										
										'wuoc_sort_order_items_by_category' => get_option('wuoc_sort_order_items_by_category', 0),
										
										'is_orders_list' => $is_orders_list,
										
										'crons' => array(
															'button_display'=>$crons_button_display, 
															'url'=>(in_array('controls', $crons_button_display)?admin_url():home_url()).'?wuoc_crons', 
															'button_text'=>__('Combine Orders Cron Job', 'woo-uoc'), 
															'button_title'=>__('Click here to execute combine orders cron job', 'woo-uoc'),
															
													),
													
										
										
										'meta_filters' => array(
										
															'key_title' => __('Order meta keys - custom fields section', 'woo-uoc'),
															'key_placeholder' => __('Enter order meta key', 'woo-uoc'),
															'key_name' => '_meta_key',
															'key_value' => (isset($_GET['_meta_key'])?wuoc_sanitize_data($_GET['_meta_key']):''),

															'val_title' => __('Order meta keys value - custom fields section', 'woo-uoc'),
															'val_placeholder' => __('Enter order meta value', 'woo-uoc'),
															'val_name' => '_meta_value',
															'val_value' => (isset($_GET['_meta_value'])?wuoc_sanitize_data($_GET['_meta_value']):''),
															
														),	
										'products_terms_order' => array(),		
								);
								
		if ($is_wuoc_edit_order_page) {
			

			$order = wc_get_order($_wuoc_order_id);
		
			if ($order) {
				$po_number = $order->get_meta('po_number', true);
				$po_number = is_array($po_number) ? $po_number : ($po_number ? [$po_number] : []);
		
				if (!empty($po_number)) {
					$translation_array['combined_info'] .= '<li><b>' . esc_html__('Ordered by / PO#', 'woo-uoc') . ':</b> ' . esc_html(implode(', ', $po_number)) . '</li>';
				}
		
				$_wuoc_merged_orders = $order->get_meta('_wuoc_merged_orders', true);
				$_wuoc_merged_orders = is_array($_wuoc_merged_orders) ? $_wuoc_merged_orders : [];
		
				if (!empty($_wuoc_merged_orders)) {
					$translation_array['combined_info'] .= '<li><b>' . esc_html__('This invoice is a combination of', 'woo-uoc') . ':</b> ' . esc_html(implode(', ', $_wuoc_merged_orders)) . '</li>';
				}
			}
		}

		
        if($typenow == 'shop_order'){
			
			global $post;
			
			$order_id = (is_object($post) ? $post->ID : 0);
			$products_terms_order = [];
			
			if ($order_id > 0 && is_numeric($order_id)) {
				$order_obj = wc_get_order($order_id);
			
				if ($order_obj instanceof WC_Order) {
					foreach ($order_obj->get_items() as $item_key => $item_val) {
						$product_id = $item_val->get_product_id();
						$terms = get_the_terms($product_id, 'product_cat');
			
						if (!empty($terms) && is_array($terms)) {
							$product_cats = wp_list_pluck($terms, 'name'); // Extract category names
							$products_terms_order[$item_key] = implode(', ', $product_cats);
						}
					}
			
					if (!empty($products_terms_order)) {
						$translation_array['products_terms_order'] = $products_terms_order;
					}
				}
			}

			
			//wuoc_pree($products_terms_order);exit;

            wp_enqueue_script(
                'wuoc_order_shop_scripts',
                plugins_url('js/shop-order-script.js', dirname(__FILE__)),
                array('jquery'),
                time()
            );
			
			
			wp_localize_script( 'wuoc_order_shop_scripts', 'wuoc_obj', $translation_array );
			

            wp_register_style('wuoc_order_shop-styles', plugins_url('css/shop-order-style.css?t='.time(), dirname(__FILE__)));
            wp_enqueue_style( 'wuoc_order_shop-styles' );
			
			if(get_option('wuoc_bootstrap', 0) && false){
				wp_enqueue_style( 'wuos-bootstrap' );
				
				//wp_enqueue_script('wuoc_bootstrap_script');
				
				wp_enqueue_script(
					'wuoc_bootstrap_script',
					plugins_url('js/bootstrap.min.js', dirname(__FILE__)),
					array('jquery'),
					time()
				);	
				
				
			}

        }
		
		

	    if($is_wuoc_settings_page){

            
            
			
            wp_enqueue_script('wuos_slim', plugins_url('js/slimselect.js', dirname(__FILE__)), array('jquery'));
            wp_enqueue_style('wuos-slim', plugins_url('css/slimselect.css', dirname(__FILE__)));
			wp_enqueue_style('wuos-timepicker', plugins_url('css/jquery.timepicker.min.css', dirname(__FILE__)));


            wp_enqueue_style( 'wuos-bootstrap' );
			
			wp_enqueue_script('wuos-fontawesome-js', plugin_dir_url(dirname(__FILE__)) . 'js/fontawesome.min.js', array('jquery'));

            //wp_enqueue_script('wuoc_bootstrap_script');

            wp_enqueue_script(
                'wuoc_jquery_ui',
                plugins_url('js/jquery-ui-blockui.min.js', dirname(__FILE__)),
                array('jquery'),
                time()
            );

            wp_enqueue_script(
                'wuoc_scripts',
                plugins_url('js/admin-scripts.js', dirname(__FILE__)),
                array('jquery', 'jquery-effects-core', 'jquery-ui-core'),
                time()
            );
			wp_enqueue_script(
                'wuoc_bootstrap_script',
                plugins_url('js/bootstrap.min.js', dirname(__FILE__)),
                array('jquery'),
                time()
            );
			
			wp_enqueue_script(
                'wuoc_timepicker',
                plugins_url('js/jquery.timepicker.min.js', dirname(__FILE__)),
                array('jquery'),
                time()
            );



            $translation_array = array(
				
                'this_url' => admin_url( 'admin.php?page=wuoc-settings' ),
                'delete_confirmation' => __('Are you sure, you want to delete the merged orders permanently which belong to the selected orders?', 'woo-uoc'),
                'wuoc_tab' => (isset($_GET['t'])?wuoc_sanitize_data($_GET['t']):'0'),
                'analyze_orders' => isset($_POST['wuoc_analyze_orders'])?'true':'false',
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'nonce'   => wp_create_nonce( 'wuoc_nonce' ),
				'no_results'   => __('No results found.', 'woo-uoc'),
				'crons' => array(
									'clock'=>$crons_clock_settings,
						),

            );

			

            wp_localize_script( 'wuoc_scripts', 'wuoc_obj', $translation_array );


        }
		
		if(
				$is_wuoc_settings_page
			||
				($typenow == 'shop_order')
		){
			wp_enqueue_style('wuos-admin', plugins_url('css/admin-style.css?t='.time(), dirname(__FILE__)));
			wp_enqueue_style('wuos-fontawesome', plugins_url('css/fontawesome.min.css', dirname(__FILE__)));
		}
		
		/*	

		if(isset($_GET['action']) && $_GET['action']=='edit'){
			$current_screen = get_current_screen();
			if($current_screen['post_type']=='shop_order'){
				wp_enqueue_style( 'wuos-bootstrap' );
			}
		}
		
		*/
		
		
	}		
	
	
	function wuoc_header_scripts(){
		//global $post;
?>
	<style type="text/css">

	</style>
<?php		
	}
	
			
	
	function wuoc_order_cloning(){
		wuoc_settings_refresh();
		global $wuoc_settings;
		
		$cloning = (in_array('cloning', $wuoc_settings['wuoc_additional']));		
		
		return $cloning;
	}
	
	function wuoc_order_qty_split(){
		wuoc_settings_refresh();
		global $wuoc_settings;
		
		$qty_split = (in_array('qty_split', $wuoc_settings['wuoc_additional']));
		
		return $qty_split;		
	}	
	
	function wuoc_links($actions, $post){
		

	
	
	
		return $actions;
				
	}
	
	add_filter( 'post_row_actions', 'wuoc_links', 10, 2 );
	

	
	//add_action( 'woocommerce_order_action_wc_custom_order_action', 'sv_wc_process_order_meta_box_action' );
	function wuoc_order_total_qty($order){
		$qty = 0;		
		foreach($order->get_items() as $item_id=>$item_data){
		
			$qty += $item_data->get_quantity();
			
		}
		
		return $qty;
	}
	
	
	
	function wuoc_admin_head(){
		
		global $wuoc_url, $post, $pagenow;
		
		$order_received = '';
		$wuoc_view_order_button = get_option('wuoc_view_order_button', 0);
		
		if ($wuoc_view_order_button) {
			$order_id = 0;
		
			// Detect order ID from both legacy and HPOS order pages
			if ($pagenow === 'post.php' && is_object($post) && $post->post_type === 'shop_order') {
				$order_id = $post->ID; // Legacy order ID
			} elseif ($pagenow === 'admin.php' && isset($_GET['page'], $_GET['id']) && $_GET['page'] === 'wc-orders') {
				$order_id = intval($_GET['id']); // HPOS order ID
			}
		
			if ($order_id > 0) {
				$wc_order = wc_get_order($order_id);
		
				if ($wc_order instanceof WC_Order) {
					$order_received = $wc_order->get_checkout_order_received_url();
				}
			}
		}


		
		
		
?>

	<style type="text/css">
	
		
		li.current a[href="admin.php?page=wuoc-settings"], 
		li.current a[href="admin.php?page=wuoc-settings"]:hover {
			background-color: #fff !important;
			color: #32373c !important;
			background-image:url("<?php echo $wuoc_url; ?>img/woo.png") !important;
			background-size: 18px !important;
			background-repeat: no-repeat !important;
			background-position: 4px 10px !important;
			text-indent: 14px !important;
			font-size: 12px !important;
		}
				
		li.current a[href="admin.php?page=wuoc-settings"]:hover {
			background-color: #EFEFEF !important;
			color: #1B1B1B !important;
		}
		
		@media only screen and (max-device-width: 480px) {
			
			
		}			
		
		/* ipad */
		@media only screen 
		and (min-device-width : 768px) 
		and (max-device-width : 1024px)  {
		}
		
		@media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {

		}
		@supports (-ms-accelerator:true) {
		  /* IE Edge 12+ CSS styles go here */ 
		}				
	</style>
    <script type="text/javascript" language="javascript">
		jQuery(document).ready(function($){
			<?php if(isset($_GET['mt']) && isset($_GET['post'])): ?>
			if($('.woocommerce-order-data__heading').length>0){
				$('.woocommerce-order-data__heading').html('Order #<?php echo esc_attr($_GET['mt']); ?>');
			}
			<?php endif; ?>
			
			<?php if($order_received): ?>
			setTimeout(function(){
				$('<a href="<?php echo $order_received; ?>" class="page-title-action" target="_blank"><?php echo _e('View order', 'woocommerce'); ?></a>').insertAfter($('a.page-title-action').last());
			}, 1000);
			<?php endif; ?>
		});
	</script>
<?php		
		
	}
	
	
	function wuoc_update_lookup_tables($order_id, $table_name_without_prefix) {
		global $wpdb;
	
		$order = wc_get_order($order_id);
	
		if ($order instanceof WC_Order) {
			$wuoc_cloned_order = $order->get_meta('_wuoc_cloned_order', true);
			$force_sync = $order->get_meta('_wuoc_force_sync', true);
	
			if ($wuoc_cloned_order && !$force_sync) {
				$product_lookup_table = $wpdb->prefix . $table_name_without_prefix;
	
				// Use a prepared statement for security
				$wpdb->query(
					$wpdb->prepare("DELETE FROM $product_lookup_table WHERE order_id = %d", $order_id)
				);
			}
		}
	}


	function wuoc_update_order_lookup_tables($order_id) {
		global $wpdb;
	
		$order = wc_get_order($order_id);
	
		if ($order instanceof WC_Order) {
			$wuoc_cloned_order = $order->get_meta('_wuoc_cloned_order', true);
			$force_sync = $order->get_meta('_wuoc_force_sync', true);
	
			if ($wuoc_cloned_order && !$force_sync) {
				$order_stats_table = $wpdb->prefix . 'wc_order_stats';
	
				// Use a prepared statement for security
				$wpdb->query(
					$wpdb->prepare("DELETE FROM $order_stats_table WHERE order_id = %d", $order_id)
				);
			}
		}
	
		if (class_exists('ReportsCache')) {
			ReportsCache::invalidate();
		}
	}


    function wuoc_update_product_lookup_tables($order_item_id, $order_id) {
		if ($order = wc_get_order($order_id)) {
			wuoc_update_lookup_tables($order_id, 'wc_order_product_lookup');
			if (class_exists('ReportsCache')) {
				ReportsCache::invalidate();
			}
		}
	}
	
	function wuoc_update_coupon_lookup_tables($coupon_id, $order_id) {
		if ($order = wc_get_order($order_id)) {
			wuoc_update_lookup_tables($order_id, 'wc_order_coupon_lookup');
			if (class_exists('ReportsCache')) {
				ReportsCache::invalidate();
			}
		}
	}
	
	function wuoc_update_tax_lookup_tables($tax_item_rate_id, $order_id) {
		if ($order = wc_get_order($order_id)) {
			wuoc_update_lookup_tables($order_id, 'wc_order_tax_lookup');
			if (class_exists('ReportsCache')) {
				ReportsCache::invalidate();
			}
		}
	}

	
	
	
	/**
	 * Modify WooCommerce Analytics Orders Query (HPOS-Compatible)
	 */
	function wuoc_analytics_orders_query_args($query_args) {
		$query_args['meta_query'][] = [
			'relation' => 'OR',
			[
				'key'     => '_wuoc_report_included',
				'value'   => 'yes',
				'compare' => '='
			],
			[
				'key'     => '_wuoc_report_included',
				'compare' => 'NOT EXISTS'
			]
		];
		return $query_args;
	}
	
	/**
	 * Modify WooCommerce Legacy Reports Query (For Older WooCommerce Versions)
	 */
	function wuoc_reports_get_order_report_query($query) {
		global $wpdb;
	
		$query['join'] .= " LEFT JOIN $wpdb->postmeta AS wuoc_postmeta ON (posts.ID = wuoc_postmeta.post_id AND wuoc_postmeta.meta_key = '_wuoc_report_included') ";
		$query['where'] .= " AND ((wuoc_postmeta.meta_key = '_wuoc_report_included' AND wuoc_postmeta.meta_value = 'yes') OR wuoc_postmeta.post_id IS NULL) ";
	
		return $query;
	}

	

	add_action('wp_ajax_wuoc_logger_clear_log', 'wuoc_logger_clear_log');
	
	if (!function_exists('wuoc_logger_clear_log')) {
		function wuoc_logger_clear_log() {
			// Check if the request is valid
			if (
				!isset($_POST['wuoc_logger_clear_log_field']) ||
				!wp_verify_nonce($_POST['wuoc_logger_clear_log_field'], 'wuoc_nonce')
			) {
				wp_send_json_error(['message' => esc_html__('Sorry, your nonce did not verify.', 'woo-uoc')]);
				wp_die();
			}
	
			// Clear the log
			update_option('wuoc_logger', []);
	
			wp_send_json_success(['message' => esc_html__('Log cleared successfully.', 'woo-uoc')]);
			wp_die();
		}
	}

	add_action('wp_ajax_wuoc_clear_meta_data', 'wuoc_clear_meta_data');

	if (!function_exists('wuoc_clear_meta_data')) {
		function wuoc_clear_meta_data() {
			// Verify nonce for security
			if (
				!isset($_POST['nonce_field']) ||
				!wp_verify_nonce($_POST['nonce_field'], 'wuoc_nonce')
			) {
				wp_send_json_error(['message' => esc_html__('Sorry, your nonce did not verify.', 'woo-uoc')]);
				wp_die();
			}
	
			// Sanitize and validate order IDs
			if (!isset($_POST['order_ids']) || empty($_POST['order_ids'])) {
				wp_send_json_error(['message' => esc_html__('No order IDs provided.', 'woo-uoc')]);
				wp_die();
			}
	
			$order_ids = array_filter(array_map('intval', explode(',', sanitize_text_field($_POST['order_ids']))));
	
			if (empty($order_ids)) {
				wp_send_json_error(['message' => esc_html__('Invalid order IDs.', 'woo-uoc')]);
				wp_die();
			}
	
			// Loop through each order and remove meta keys containing 'wuoc'
			foreach ($order_ids as $order_id) {
				$order = wc_get_order($order_id);
				if ($order instanceof WC_Order) {
					$order_meta = $order->get_meta_data();
					foreach ($order_meta as $meta) {
						if (strpos($meta->key, 'wuoc') !== false) {
							$order->delete_meta_data($meta->key);
						}
					}
					$order->save(); // Save after removing meta data
				}
			}
	
			wp_send_json_success(['message' => esc_html__('Order metadata cleared successfully.', 'woo-uoc')]);
			wp_die();
		}
	}

	
	add_action('wp_ajax_wuoc_update_rules_layers', 'wuoc_update_rules_layers');
	
	if (!function_exists('wuoc_update_rules_layers')) {
		function wuoc_update_rules_layers() {
			// Verify nonce for security
			if (
				!isset($_POST['nonce_field']) ||
				!wp_verify_nonce($_POST['nonce_field'], 'wuoc_nonce')
			) {
				wp_send_json_error(['message' => esc_html__('Sorry, your nonce did not verify.', 'woo-uoc')]);
				wp_die();
			}
	
			// Check if 'wuoc_rules_layers' is set and valid
			if (!isset($_POST['wuoc_rules_layers']) || !is_numeric($_POST['wuoc_rules_layers']) || $_POST['wuoc_rules_layers'] <= 0) {
				wp_send_json_error(['message' => esc_html__('Invalid rule layers value.', 'woo-uoc')]);
				wp_die();
			}
	
			$wuoc_auto_combined_settings = get_option('wuoc_auto_combined_settings', []);
	
			$wuoc_rules_layers = intval($_POST['wuoc_rules_layers']); // Ensure it's a valid integer
	
			for ($layer = 1; $layer <= $wuoc_rules_layers; $layer++) {
				if (!array_key_exists($layer, $wuoc_auto_combined_settings)) {
					$wuoc_auto_combined_settings[$layer] = [
						'auto_combine' => 0,
						'statuses' => [],
						'status_combined' => '',
						'remove_original' => 'none',
						'original_order_status' => '',
						'rules' => [],
						'consider_paid_within' => '',
					];
				}
			}
	
			update_option('wuoc_auto_combined_settings', $wuoc_auto_combined_settings);
			update_option('wuoc_rule_layers', sanitize_text_field($wuoc_rules_layers));
	
			wp_send_json_success(['message' => esc_html__('Rule layers updated successfully.', 'woo-uoc')]);
			wp_die();
		}
	}

	
	add_action('wp_ajax_wuoc_load_combined_orders', 'wuoc_load_combined_orders');
	
	if (!function_exists('wuoc_load_combined_orders')) {
		function wuoc_load_combined_orders() {
			// Verify nonce for security
			if (
				!isset($_POST['nonce_field']) ||
				!wp_verify_nonce($_POST['nonce_field'], 'wuoc_nonce')
			) {
				wp_send_json_error(['message' => esc_html__('Sorry, your nonce did not verify.', 'woo-uoc')]);
				wp_die();
			}
	
			// Ensure function exists before calling it
			if (function_exists('wuoc_get_combined_orders_html')) {
				ob_start();
				wuoc_get_combined_orders_html(); // Outputs the HTML
				$html_output = ob_get_clean();
				wp_send_json_success(['html' => $html_output]);
			} else {
				wp_send_json_error(['message' => esc_html__('Function not found.', 'woo-uoc')]);
			}
	
			wp_die();
		}
	}

	
	add_action('transition_post_status', 'wuoc_status_transition', 99, 3);
	
	function wuoc_status_transition($new_status, $old_status, $post) {
		global $wuoc_auto_combined_settings;
	
		if (!is_object($post) || $post->post_type !== 'shop_order') {
			return;
		}
	
		$order_id = $post->ID;
		$order = wc_get_order($order_id);
	
		if (!$order instanceof WC_Order) {
			return;
		}
	
		$_wuoc_original_order_status = $order->get_meta('_wuoc_original_order_status', true);
		$_wuoc_layer = $order->get_meta('_wuoc_layer', true);
	
		if (!$_wuoc_original_order_status && $_wuoc_layer && array_key_exists($_wuoc_layer, $wuoc_auto_combined_settings)) {
			$_wuoc_original_order_status = $wuoc_auto_combined_settings[$_wuoc_layer]['original_order_status'];
		}
	
		// Determine the final status to apply
		$status = $_wuoc_original_order_status ? $_wuoc_original_order_status : $new_status;
	
		if ($_wuoc_original_order_status && $_wuoc_original_order_status !== $new_status) {
			// Convert status to WooCommerce format
			$status = wuoc_add_prefix($status, 'wc-');
	
			// Update order status using WooCommerce methods
			$order->set_status($status);
			$order->save();
	
			// Remove the temporary order status metadata
			$order->delete_meta_data('_wuoc_original_order_status');
			$order->save();
		}
	}

	
	add_filter('wuoc_update_post_meta_value', 'wuoc_update_post_meta_value_callback', 9, 4);
	
	function wuoc_update_post_meta_value_callback($order_id = 0, $meta_key = '', $meta_val = '', $force = false) {
		global $is_automation_combine;
	
		if ($is_automation_combine && $force) {
			if ($order_id > 0 && !empty($meta_key)) {
				$order = wc_get_order($order_id);
	
				if ($order instanceof WC_Order) {
					if (substr($meta_key, 0, 1) !== '_') {
						$meta_vals = $order->get_meta('__' . $meta_key, true);
						$meta_vals = is_array($meta_vals) ? $meta_vals : [];
						$meta_vals[] = is_array($meta_val) ? $meta_val : [$order_id => $meta_val];
	
						if (!empty($meta_vals)) {
							foreach ($meta_vals as $meta_val_key => $meta_val_arr) {
								if (is_array($meta_val_arr)) {
									unset($meta_vals[$meta_val_key]);
									$meta_vals = array_merge($meta_vals, $meta_val_arr);
								}
							}
						}
	
						$meta_vals = array_unique($meta_vals);
						$meta_key_ = ltrim($meta_key, '_');
						$meta_key_ = str_replace(['___', '__'], '', $meta_key_);
	
						// Update order meta using WooCommerce CRUD
						$order->update_meta_data('__' . $meta_key_, $meta_vals);
						$order->save();
					}
				}
			}
		}
	
		return $meta_val;
	}

		
	function wuoc_get_post_meta($order_id, $key = '', $single = false) {
		global $wpdb;
		
		$order = (is_object($order_id)?$order_id:wc_get_order($order_id));
		
		switch($key){
			case '_customer_user':
				$order_meta = $order->get_customer_id();	
				return $order_meta;
			break;
		}
	
		// Check if the order ID is valid
		if (!$order_id) {
			return $single ? '' : [];
		}
	
		// Query the WooCommerce HPOS order meta table
		$meta_data = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT meta_key, meta_value FROM {$wpdb->prefix}wc_orders_meta WHERE order_id = %d",
				$order_id
			),
			ARRAY_A
		);
	
		// Convert results into an associative array
		$order_meta = [];
		foreach ($meta_data as $meta) {
			$order_meta[$meta['meta_key']] = maybe_unserialize($meta['meta_value']);
		}
	
		// Return specific meta key if requested
		if (!empty($key)) {
			return $single ? ($order_meta[$key] ?? '') : ($order_meta[$key] ?? []);
		}
	
		// Return all meta data if no key is specified
		return $order_meta;
	}
	function wuoc_update_order_meta($order_id, $key, $val) {
		$order = wc_get_order($order_id);
		if ($order instanceof WC_Order) {
			$order->update_meta_data($key, $val);
			$order->save();
		}
	}