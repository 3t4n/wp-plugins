<?php
/**
 * Plugin Name: Food Online for WooCommerce
 * Plugin URI: https://foodonlineplugin.com
 * Description: A restaurant ordering system for WooCommerce.
 * Version: 5.1
 * Author: Arosoft.se
 * Author URI: https://arosoft.se
 * Developer: Arosoft.se
 * Developer URI: https://arosoft.se
 * Text Domain: food-online-for-woocommerce
 * Domain Path: /languages
 * WC requires at least: 4.0
 * WC tested up to: 5.4
 * Copyright: Arosoft.se 2021
 * License: GPL v2 or later
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */
define('FOOD_ONLINE_VERSION', '5.1');
define('FDOE_PLUGINDIRPATH', plugin_dir_path(__FILE__));
define('FDOE_PLUGINDIRURL', plugin_dir_url(__FILE__));
if (!defined('ABSPATH')) {
	exit;
}

register_activation_hook(__FILE__, array(
	'Food_Online',
	'activate'
));
register_uninstall_hook(__FILE__, array(
	'Food_Online',
	'uninstall'
));
if (!class_exists('Food_Online')) {
	/**
	 * Main Class Food_Online
	 *
	 * @since 1.0
	 */
	class Food_Online {


		protected static $_instance = null;
		public $product;
		public $loop;
		public $notices;
		protected $settings;

		private $is_menu;
		private $is_prem;
		public static $categories_raw;
		public static $is_shortcode;
		public static $is_shortcode_delivery;
		public static $is_shortcode_foodonline;
		public static $fdoe_category_order;
		public static $schedules;

		public static $product_popup;


		// The Constructor
		public function __construct() {

			add_action('admin_init', array(
				$this,
				'check_environment'
			));
			add_action('admin_notices', array(
				$this,
				'admin_notices'
			) , 15);
			add_action('plugins_loaded', array(
				$this,
				'init'
			) , 10);
			add_action('init', array(
				$this,
				'load_text_domain'
			));

			add_action('woocommerce_after_checkout_validation', array($this, 'disabled_shipping_after_checkout_validation'));

			add_action('wp_ajax_nopriv_fdoe_set_cookie', array($this, 'fdoe_set_cookie'));

            add_action('wp_ajax_fdoe_set_cookie', array($this, 'fdoe_set_cookie'));
		}

		function fdoe_set_cookie(){

				$has_current_session = isset(WC()->session) && WC()->session->has_session();
			 if (isset(WC()->session) && !WC()->session->has_session() ) {

					  WC()->session->set_customer_session_cookie(true);
			 }
			 $args = array(
						   'isset' => isset(WC()->session) && WC()->session->has_session(),
						   'had_session' => $has_current_session,
						   );
			 wp_send_json($args);

		}


		public static function setSavedCatOrder() {
			if (is_string(get_option('fdoe_category_order'))) {
				$cats_raw = json_decode(get_option('fdoe_category_order') , true);


				$cats_ids = array_column($cats_raw, 'ID');
				// Fix for PHP 7.0.32-33 where array_column is broken
				if (empty($cats_ids)):
					$cats_ids = array_map(function ($each) {
						return $each['ID'];
					}
					, $cats_raw);
				endif;
				$categories = array();

				 foreach ( $cats_ids as $id ) {
					$categories[] = apply_filters( 'wpml_object_id', $id, 'product_cat', TRUE  );

				 }


				 self::$fdoe_category_order = $categories;
			}
			elseif (is_array(get_option('fdoe_category_order')) || is_object(get_option('fdoe_category_order'))) {
				$cats_raw = get_option('fdoe_category_order');
				self::$fdoe_category_order_raw = $cats_raw;

				$cats_ids = array_column($cats_raw, 'ID');
					$categories = array();

				 foreach ( $cats_ids as $id ) {
					$categories[] = apply_filters( 'wpml_object_id', $id, 'product_cat', TRUE  );

				 }


				 self::$fdoe_category_order = $categories;
			}
			else {
				self::$fdoe_category_order = null;
			}
		}
		public static function getSavedCatOrder($mode = 'fallback') {

			if ( get_option('fdoe_is_prem', 'no') == 'yes' && (is_array(self::$fdoe_category_order) || is_object(self::$fdoe_category_order)) && !empty(self::$fdoe_category_order)) {

				return self::$fdoe_category_order;
			}
			else {

				return $mode == 'fallback' ? Food_Online::get_all_categories('ids',1) : array() ;
			}
		}

		public static function set_category_objects() {
			if (!isset(self::$categories_raw)) {

				self::setSavedCatOrder();
				$taxonomy       = 'product_cat';
				$orderby        = 'include';//'name';
				$show_count     = 0; // 1 for yes, 0 for no
				$pad_counts     = 0; // 1 for yes, 0 for no
				$hierarchical   = 1; // 1 for yes, 0 for no
				$title          = '';
				$empty          = 0;
				$fields         = 'all';
				$includes 		= self::getSavedCatOrder();
				$args           = array(
					'taxonomy'                => $taxonomy,
					'orderby'                => $orderby,
					'show_count'                => $show_count,
					'pad_counts'                => $pad_counts,
					'hierarchical'                => $hierarchical,
					'title_li'                => $title,
					'hide_empty'                => $empty,
					'fields'                => $fields,
					'include' => $includes,
				);
				self::$categories_raw = get_categories($args);


				$do_image = (get_option('fdoe_is_prem', 'no') == 'yes' && get_option('fdoe_cat_image', 'no') == 'yes') ? true : false;
					foreach (self::$categories_raw as $fdoe_cat) {
						$term_children  = get_term_children(filter_var($fdoe_cat->term_id, FILTER_VALIDATE_INT) , filter_var('product_cat', FILTER_SANITIZE_STRING));
						$parent_count       = 0;
						$fdoe_cat->image    = false;

						$has_sub        = true;
						if (empty($term_children) || is_wp_error($term_children)) {
							$has_sub        = false;

						}else{
							foreach ($term_children as $child_cat) {
								$child = get_term($child_cat, 'product_cat');
							$parent_count       = $parent_count + $child ->count;

						}

						}
						$fdoe_cat->category_count_not_children = $fdoe_cat->category_count - $parent_count ;
						$fdoe_cat->has_sub         = $has_sub;

						if ($do_image){
							$thumbnail_id   = get_term_meta($fdoe_cat->term_id, 'thumbnail_id', true);
						$image          = wp_get_attachment_url($thumbnail_id);
						$fdoe_cat->image           = $image;
						}
					}

			}
			return;
		}
		// Return product categories from settings
		public static function get_category_objects() {
			if (!isset(self::$categories_raw)) {
				self::set_category_objects();
			}
			return self::$categories_raw;
		}
		public static function get_all_categories($fields_ = 'all',$empty_ = 0) {

				$taxonomy       = 'product_cat';

				$show_count     = 0; // 1 for yes, 0 for no
				$pad_counts     = 0; // 1 for yes, 0 for no
				$hierarchical   = 1; // 1 for yes, 0 for no
				$title          = '';
				$empty          = $empty_;
				$fields         = $fields_;

				$args           = array(
					'taxonomy'                => $taxonomy,

					'show_count'                => $show_count,
					'pad_counts'                => $pad_counts,
					'hierarchical'                => $hierarchical,
					'title_li'                => $title,
					'hide_empty'                => $empty,
					'fields'                => $fields,

				);
				return get_categories($args);


			}
		public static function set_is_shortcode() {
			self::$is_shortcode = wc_post_content_has_shortcode('foodonline') || wc_post_content_has_shortcode('foodonline2') ||  wc_post_content_has_shortcode('foodonline_topbar') ||  wc_post_content_has_shortcode('foodonline_menu')  ;
			return;
		}

		public static function get_is_shortcode() {
			if(!isset(self::$is_shortcode)){
			self::$is_shortcode = wc_post_content_has_shortcode('foodonline') || wc_post_content_has_shortcode('foodonline2') ||  wc_post_content_has_shortcode('foodonline_topbar') ||  wc_post_content_has_shortcode('foodonline_menu') ;

			}
			return self::$is_shortcode;
		}
		public static function get_is_shortcode_foodonline() {
			if(!isset(self::$is_shortcode_foodonline)){
			self::$is_shortcode_foodonline = wc_post_content_has_shortcode('foodonline') || wc_post_content_has_shortcode('foodonline2') ;

			}
			return self::$is_shortcode_foodonline;
		}
			public static function get_is_shortcode_delivery() {
			if(!isset(self::$is_shortcode_delivery)){
			self::$is_shortcode_delivery =   wc_post_content_has_shortcode('foodonline_address_validator') || wc_post_content_has_shortcode('foodonline_postcode_validator') || wc_post_content_has_shortcode('foodonline_topbar') ;


			}


			return self::$is_shortcode_delivery;
		}

		// Enqueues admin scripts and styles
		public function enqueue_scripts_back_end() {

			wp_enqueue_style('fdoep-admin-notice-style', $this->get_plugin_url('assets/css/notice.css') , array() , FOOD_ONLINE_VERSION);

			if (isset($_GET['tab']) && $_GET['tab'] === 'fdoe') {

				wp_enqueue_style('wp-color-picker');

				 if (WP_DEBUG === true) {
					wp_enqueue_script('fdoe-admin-script-handle', FDOE_PLUGINDIRURL.'assets/js/fdoe-order-admin.js' , array(
					'wp-color-picker',
					'jquery'
				) , FOOD_ONLINE_VERSION, true);
			 if (isset($_GET['section']) && $_GET['section'] == 'ava_schedule') {

                    wp_enqueue_script('fdoe-admin-availability-script', FDOE_PLUGINDIRURL . 'assets/js/fdoe-admin-availability.js', array('jquery','backbone'), FOOD_ONLINE_VERSION, true);

                }else if (isset($_GET['section']) && $_GET['section'] == 'order_time') {

                    wp_enqueue_script('fdoe-admin-ordertime-script', FDOE_PLUGINDIRURL . 'assets/js/fdoe-admin-ordertime.js', array('jquery','backbone'), FOOD_ONLINE_VERSION, true);

                }
			 }else{
					wp_enqueue_script('fdoe-admin-script-handle', FDOE_PLUGINDIRURL.'assets/js/fdoe-order-admin.min.js' , array(
					'wp-color-picker',
					'jquery'
				) , FOOD_ONLINE_VERSION, true);
				 if (isset($_GET['section']) && $_GET['section'] == 'ava_schedule') {

                    wp_enqueue_script('fdoe-admin-availability-script', FDOE_PLUGINDIRURL . 'assets/js/fdoe-admin-availability.min.js', array('jquery','backbone'), FOOD_ONLINE_VERSION, true);

                }else if (isset($_GET['section']) && $_GET['section'] == 'order_time') {

                    wp_enqueue_script('fdoe-admin-ordertime-script', FDOE_PLUGINDIRURL . 'assets/js/fdoe-admin-ordertime.min.js', array('jquery','backbone'), FOOD_ONLINE_VERSION, true);

                }
			 }

				$args = array(
							  'bundle_active' => is_plugin_active('woocommerce-product-bundles/woocommerce-product-bundles.php') ? 1 : 0,
							  'composite_active' => class_exists('WC_Composite_Products') ? 1 : 0,
							  );
				wp_localize_script('fdoe-admin-script-handle', 'fdoe_admin', $args);
				wp_enqueue_style('fdoe-admin-style', FDOE_PLUGINDIRURL.'assets/css/admin-style.css' , array() , FOOD_ONLINE_VERSION);
				wp_enqueue_style('fdoe-order-font-2', FDOE_PLUGINDIRURL.'assets/fontawesome/css/fontawesome.min.css' , array() , FOOD_ONLINE_VERSION);
				wp_enqueue_style('fdoe-order-font-3', FDOE_PLUGINDIRURL.'assets/fontawesome/css/solid.min.css' , array() , FOOD_ONLINE_VERSION);
				wp_enqueue_style('fdoe-order-font-4', FDOE_PLUGINDIRURL.'assets/fontawesome/css/regular.min.css' , array() , FOOD_ONLINE_VERSION);
			}
		}
		// Includes plugin files
		public function includes() {
			include_once (ABSPATH . 'wp-admin/includes/plugin.php');
			// For support of WooCommerce Add-On
			if (is_plugin_active('woocommerce-product-addons/woocommerce-product-addons.php')) {
				include_once (ABSPATH . 'wp-content/plugins/woocommerce-product-addons/includes/class-wc-product-addons-display.php');
			}
			require_once ('classes/class-fdoe-product.php');
			require_once ('classes/class-fdoe-product-2.php');
			require_once ('classes/class-fdoe-loop.php');
			require_once ('classes/class-fdoe-ajax.php');
			require_once ('classes/class-fdoe-shortcode.php');
			require_once ('classes/class-fdoe-shortcode-2.php');
			require_once ('includes/fdoe-template-functions.php');

			require_once ('classes/class-fdoe-orders.php');

			require_once ('classes/class-fdoe-shortcodes.php');
			// Check if to run the premium version


			if (file_exists(plugin_dir_path(__FILE__) . 'prem')) {
				update_option('fdoe_is_prem', 'yes');
				$this->is_prem = true;
				require_once ('prem/classes/class-fdoe-del.php');
				require_once ('prem/classes/class-fdoe-timepick.php');
				require_once ('prem/classes/class-fdoe-settings-prem.php');

			}
			else {
				update_option('fdoe_is_prem', 'no');
				$this->is_prem = false;
				require_once ('classes/class-fdoe-settings.php');
			}
		}
		// Returns new class instance
		public static function instance() {
			if (!isset(self::$_instance)) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}
		// Plugin initiation
		public function init() {
			// For support of WooCommerce Add-On
			add_action('wp_loaded', function () {
				if (is_plugin_active('woocommerce-product-addons/woocommerce-product-addons.php')) {
					remove_all_actions('woocommerce_before_variations_form', 10);
				}
			});
			// check if environment is ok
			if (self::get_environment_warning()) {
				return;
			}
			if (is_admin() && get_option('Food_Online_Activated_Plugin') == 'Food_Online') {
				delete_option('Food_Online_Activated_Plugin');
			}
			$this->includes();

			add_action('wp_enqueue_scripts', array(
				$this,
				'load_bootstrap_and_fontawesome'
			) , 10);
			add_action('wp_enqueue_scripts', array(
				$this,
				'enqueue_scripts'
			) , 99);
			add_filter('style_loader_tag', array(
				$this,
				'add_font_awesome_attributes'
			) , 100, 2);
			add_action('woocommerce_init', array(
				$this,
				'woocommerce_init'
			));
			add_action('woocommerce_product_query', array(
				$this,
				'fdoe_main_query'
			) , 99999);
			add_filter( 'loop_shop_per_page', array($this,'set_new_shop_loop'), 99999 );

			add_action('template_redirect', array(
				$this,
				'check_for_404'
			));
			add_action('wp', array(
				$this,
				'wp'
			) , 99);
			add_action('admin_enqueue_scripts', array(
				$this,
				'enqueue_scripts_back_end'
			));
			add_filter('plugin_action_links_' . plugin_basename(__FILE__) , array(
				$this,
				'add_action_links'
			));
			add_action('fdoe_woocommerce_widget_shopping_cart_buttons', array(
				$this,
				'fdoe_custom_widget_shopping_cart_proceed_to_checkout'
			) , 20);
			add_filter('woocommerce_add_to_cart_fragments', array(
				$this,
				'fdoe_woocommerce_header_add_to_cart_fragment'
			));

		}

		// Checks if environment is ok
		public function check_environment() {
			if (is_admin() && get_option('Food_Online_Activated_Plugin') == 'Food_Online') {
				delete_option('Food_Online_Activated_Plugin');
			}
			$environment_warning = self::get_environment_warning();
			if ($environment_warning && is_plugin_active(plugin_basename(__FILE__))) {
				$this->add_admin_notice('bad_environment', 'error', $environment_warning);
				deactivate_plugins(plugin_basename(__FILE__));
			}
		}
		// Checks if WooCommerce is active and if not returns error message
		static function get_environment_warning() {
			include_once (ABSPATH . 'wp-admin/includes/plugin.php');
			if (!defined('WC_VERSION')) {
				return __('Food Online requires WooCommerce to be activated to work.', 'food-online-for-woocommerce');
				die();
			}
			//if this is Premium
			/*
			elseif (is_plugin_active('food-online-for-woocommerce/fdoe-order.php')) {
				return __('Food Online Premium can not be activated when the free version is active.', 'food-online-for-woocommerce');
				die();
			}*/
			// If this is free version

			elseif ( is_plugin_active( 'food-online-premium/fdoe-order.php') ) {
			             return __( 'Food Online can not be activated when the premuim version is active.', 'food-online-for-woocommerce' );
			             die();
			         }
			return false;
		}
		public function add_admin_notice($slug, $class, $message) {
			$this->notices[$slug] = array(
				'class' => $class,
				'message' => $message
			);
		}
		public function admin_notices() {
			foreach ((array)$this->notices as $notice_key => $notice) {
				echo "<div class='" . esc_attr($notice['class']) . "'><p>";
				echo wp_kses($notice['message'], array(
					'a' => array(
						'href' => array()
					)
				));
				echo '</p></div>';
			}
			unset($notice_key);
		}
		public function wp() {
			self::set_is_shortcode();
			add_action('fdoe_before_product_modal', array(
				$this,
				'set_products_modal_hook'
			) , 99);
			$override_shop = is_shop() && get_option('fdoe_override_shop','no') == "yes";
			if (!is_admin() && !is_ajax() && (($override_shop) || self::get_is_shortcode() )) {
				$this->is_menu = true;






				add_action('wp_footer', array(
					$this,
					'load_templates'
				));
				add_action('woocommerce_before_shop_loop', array(
					$this,
					'set_products_modal_hook'
				) , 99);
				add_action('woocommerce_shortcode_before_products_loop', array(
					$this,
					'set_products_modal_hook'
				) , 99);
				add_action('fdoe_before_foodonline2_loop', array(
					$this,
					'set_products_modal_hook'
				) , 99);
				add_action('wp_footer', array(
					$this,
					'output_product_aromodals_backbone'
				));
				add_action('wp_footer', array(
					$this,
					'fdoe_output_stock_warning'
				));
				add_action('wp_footer', array(
					$this,
					'fdoe_output_cart_aromodal'
				));
				add_action('fdoe_output_rightbar','fdoe_output_rightbar');
				if (get_option('fdoe_top_bar', 'no') == 'yes') {
					add_action('fdoe_loop_start_2', array($this,

						'output_top_bar_shop_page'
						)
					);
				}
				if($override_shop){
				update_option( 'woocommerce_shop_page_display', '' );
				}
				remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering');
				remove_action('woocommerce_after_shop_loop', 'woocommerce_catalog_ordering');
				remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count');
				remove_action('woocommerce_after_shop_loop', 'woocommerce_result_count');
				add_filter('woocommerce_show_page_title', '__return_false');
				self::fdoe_storefront_sorting_remove();

			}
			else {
				$this->is_menu = false;
				$this->override_off();
			}
			$theme = wp_get_theme(); // gets the current theme
			$bottom_bar = get_option('fdoe_bottom_bar', 'yes');
			if (!('Storefront' == $theme->name || 'Storefront' == $theme->parent_theme)) {
		if ($bottom_bar == 'yes' || ($bottom_bar == 'woocommerce' && (is_woocommerce() || is_cart() || is_checkout() || $this->is_menu  )) || ($bottom_bar == 'menu' && $this->is_menu ) ) {

					add_action('wp_footer', array(
						$this,
						'fdoe_handheld_footer_bar'
					) , 999);
				}
			}
			else {
				if ($bottom_bar == 'yes' || ($bottom_bar == 'woocommerce' && (is_woocommerce() || is_cart() || is_checkout() || $this->is_menu  )) || ($bottom_bar == 'menu' && $this->is_menu ) ) {
					add_filter('storefront_handheld_footer_bar_links', array(
						$this,
						'fdoe_add_checkout_link_storefront'
					));
					add_filter('storefront_handheld_footer_bar_links', array(
						$this,
						'fdoe_add_shop_link_storefront'
					));
					add_filter('storefront_handheld_footer_bar_links', array(
						$this,
						'fdoe_add_cart_link_storefront'
					));
					add_filter('storefront_handheld_footer_bar_links', array(
						$this,
						'fdoe_remove_handheld_footer_links'
					));
				}
				set_theme_mod('storefront_product_pagination', false);
			}
		}
		public function output_top_bar_shop_page(){
			 $delivery_mode = $this->is_prem  ?  get_option('fdoe_enable_delivery_switcher','no') : false;
		  $default_delivery_mode = $this->is_prem  ? get_option('fdoe_default_for_switch','delivery' ): false;
		   $selection_mandatory = $this->is_prem ? get_option('fdoe_3way','no') : false;
		   $validation = $this->is_prem ? get_option('fdoe_skip_address_validation','no') : false;
		echo fdoe_output_top_bar(false,$delivery_mode , $default_delivery_mode,  $selection_mandatory, $validation);

		}
		// Add setting link to Plugins page
		public function add_action_links($links) {
			if (get_option('fdoe_is_prem') == 'no') {
				$links_add = array(
					'<a href="' . admin_url('admin.php?page=wc-settings&tab=fdoe&section') . '">Settings</a>',
					'<a target="_blank" href="https://foodonlineplugin.com">Go Premium</a>',
				);
			}
			else {
				$links_add = array(
					'<a href="' . admin_url('admin.php?page=wc-settings&tab=fdoep&section') . '">Settings</a>'
				);
			}
			return array_merge($links, $links_add);
		}
		// Loads the templates
		public function load_templates() {
			include ('templates/product.php');


			include ('templates/categories.php');
			include ('templates/search.php');
			include ('templates/top_menu.php');
			include ('templates/side_menu.php');
			if(get_option('fdoe_fallback_modal','no') == 'yes' || get_option('fdoe_product_popup_content', 'custom') == 'theme'){
			include ('templates/product-modal-fallback.php');
			}else{
				include ('templates/product-modal.php');
			}


		}

		// Enqueues scripts and styles front end
		public function enqueue_scripts() {
			if (WP_DEBUG === true) {
				wp_enqueue_style('fdoe-order-style-broad', $this->get_plugin_url('assets/css/site-broad.css') , array() , FOOD_ONLINE_VERSION);
			}
			else {
				wp_enqueue_style('fdoe-order-style-broad', $this->get_plugin_url('assets/css/site-broad.min.css') , array() , FOOD_ONLINE_VERSION);
			}
			if ($this->is_menu || is_checkout() ) {
				$deps        = array(
					'jquery',
					'backbone',
					//'wc-add-to-cart-variation',
					);
				if(get_option('fdoe_fallback_modal','no') == 'no'){
					array_push($deps, 'wc-add-to-cart-variation');
				}
				if (WP_DEBUG === true && $this->is_menu ) {
					wp_enqueue_style('fdoe-order-style', $this->get_plugin_url('assets/css/style.css') , array() , FOOD_ONLINE_VERSION);
					if (get_option('fdoe_product_popup_content', 'custom') == 'style-1') {
						wp_enqueue_style('fdoe-product-modal-style', $this->get_plugin_url('assets/css/product-modal-style-1.css') , array() , FOOD_ONLINE_VERSION);
					}
					elseif (get_option('fdoe_product_popup_content', 'custom') == 'custom') {
						wp_enqueue_style('fdoe-product-modal-style', $this->get_plugin_url('assets/css/cutom-style.css') , array() , FOOD_ONLINE_VERSION);
					}
					if (get_option('fdoe_layout') == 'fdoe_twentytwenty') {
						wp_enqueue_style('fdoe-layout-twentytwenty', $this->get_plugin_url('assets/css/layout-twentytwenty.css') , array() , FOOD_ONLINE_VERSION);
					}
						array_push($deps, 'fdoe-order-boot-js');
				}
				elseif($this->is_menu) {
					wp_enqueue_style('fdoe-order-style', $this->get_plugin_url('assets/css/style.min.css') , array() , FOOD_ONLINE_VERSION);
					if (get_option('fdoe_product_popup_content', 'custom') == 'style-1') {
						wp_enqueue_style('fdoe-product-modal-style', $this->get_plugin_url('assets/css/product-modal-style-1.min.css') , array() , FOOD_ONLINE_VERSION);
					}
					elseif (get_option('fdoe_product_popup_content', 'custom') == 'custom') {
						wp_enqueue_style('fdoe-product-modal-style', $this->get_plugin_url('assets/css/cutom-style.min.css') , array() , FOOD_ONLINE_VERSION);
					}
					if (get_option('fdoe_layout') == 'fdoe_twentytwenty') {
						wp_enqueue_style('fdoe-layout-twentytwenty', $this->get_plugin_url('assets/css/layout-twentytwenty.min.css') , array() , FOOD_ONLINE_VERSION);
					}
						array_push($deps, 'fdoe-order-boot-js');
				}
				if (wp_script_is('jquery-tiptip') == false) {
					wp_enqueue_script('jquery-tiptip', content_url('/plugins/woocommerce/assets/js/jquery-tiptip/jquery.tipTip.min.js') , array(
						'jquery',
					) , FOOD_ONLINE_VERSION, true);
				}
				self::set_category_objects();
				$theme       = wp_get_theme();

				// Check the version of WooCommerce Prodduct Addons installed
				if (defined('WC_PRODUCT_ADDONS_VERSION') && version_compare(WC_PRODUCT_ADDONS_VERSION, '3.0.0', '>=') ) {
					$addonabove3 = true;
					if ($this->is_menu) {


						if( isset($GLOBALS['Product_Addon_Display']) && is_object($GLOBALS['Product_Addon_Display']))	{

						$GLOBALS['Product_Addon_Display'] -> addon_scripts();
						}
						array_push($deps, 'woocommerce-addons');

					}
				}
				else {
					$addonabove3 = false;
				}
				// Check if Yith Points is installed
				if (defined('YITH_YWPAR_VERSION')) {
					$points      = true;
					if ($this->is_menu) {
						array_push($deps, 'ywpar_frontend');
					}
				}
				if (WP_DEBUG === true) {
					wp_register_script('fdoe-order', $this->get_plugin_url('assets/js/fdoe-order.js') , $deps, FOOD_ONLINE_VERSION, true);
				}
				else {
					wp_register_script('fdoe-order', $this->get_plugin_url('assets/js/fdoe-order.min.js') , $deps, FOOD_ONLINE_VERSION, true);
				}
				$menu_color = WC_Admin_Settings::get_option('fdoe_color');

				$args = array(
					'fdoe_item_separator' => get_option('fdoe_item_separator') ,
					'is_checkout' => is_checkout() ,
					'menu_color' => $menu_color,
					'fdoe_show_images' => WC_Admin_Settings::get_option('fdoe_show_images', 'no') ,
					'fdoe_menu_shortdesc' => WC_Admin_Settings::get_option('fdoe_menu_shortdesc', 'yes') ,

					'top_bar_info' => esc_html(get_option('fdoe_top_bar_info','') ),
					'cats' => self::get_category_objects() ,
					'base_path' => get_option('siteurl') ,
					'cart_remove_url' => wc_get_cart_remove_url('fdoe_item_key') ,
					'wc_ajax_url' => WC_AJAX::get_endpoint('%%endpoint%%') ,
					'layout' => WC_Admin_Settings::get_option('fdoe_layout','fdoe_onecol') ,
					'hide_minicart' => WC_Admin_Settings::get_option('fdoe_hide_minicart') ,
					'ajax_url' => admin_url('admin-ajax.php') ,
					'theme' => $theme->name,
					'theme_parent' => $theme->parent_theme,
					'is_shop' => is_shop() ,
					'is_product_category' => is_product_category() ,
					'js_frontend' => $this->is_menu ? 1 : 0,
					'popup_simple' => get_option('fdoe_popup_simple', 'yes') ,
					'popup_variable' => get_option('fdoe_popup_variable', 'yes') ,
					'popup_bundle' => get_option('fdoe_popup_bundle', 'redirect') ,
					'show_left_menu' => get_option('fdoe_left_menu', 'no') == 'no' ? 1 : 0,
					'addonabove3' => $addonabove3,
					'sticky_bar' => get_option('fdoe_sticky_bar', 'no') ,
					'minicart_style' => get_option('fdoe_minicart_style', 'popover') ,
					'smooth_scrolling' => get_option('fdoe_smooth_scrolling', 'no') ,

					'close_text' => __('Close', 'food-online-for-woocommerce') ,
					'menu_text' => __('Menu', 'food-online-for-woocommerce') ,
					'is_user_logged_in' => is_user_logged_in() ? 1 : 0,
					'is_prem' => get_option('fdoe_is_prem', 'no') == 'yes' ? 1 : 0,
					'cat_order' => self::getSavedCatOrder() ,
					'cat_icon' => get_option('fdoe_menu_titles_icon', '') ,
					'show_conf' => get_option('fdoe_show_confirmation', 'no') ,
					'added_to_cart_string' => __('Added to cart', 'food-online-for-woocommerce') ,
					'make_a_selection' => __( 'Please select some product options before adding this product to your cart.', 'woocommerce' ),
					'show_error_messages' => get_option('fdoe_show_error_messages', 'no') == 'yes' ? 1 : 0,
					'sticky_mobile' => get_option('fdoe_sticky_mobile', 'no') ,
					'product_modal_template' => get_option('fdoe_product_popup_content', 'custom') == 'style-1' ? 1 : 0,
					'product_modal_template_' => get_option('fdoe_product_popup_content', 'custom'),
					'top_bar' => get_option('fdoe_top_bar', 'no') == 'yes' ? 1 : 0,
					'top_bar_menu' => get_option('fdoe_cat_top_menu', 'no') == 'yes' ? 1 : 0,
					'top_bar_mobile' => get_option('fdoe_cat_top_menu_mobile','yes') == 'yes' || get_option('fdoe_cat_top_menu_mobile','yes') == 'collapsed' ? 1 : 0,
					'top_bar_mobile_dropdown' =>  get_option('fdoe_cat_top_menu_mobile','yes') == 'collapsed' ? 1 : 0,
					'addon_required' => __('Please make a choice', 'food-online-for-woocommerce') ,
					'yith_points' => isset($points) && $points ? 1 : 0,
					'is_accordian' => get_option('fdoe_accordian', 'no') == 'yes' ? 1 : 0,
					'subcat_with_parent' => get_option('fdoe_subcat_with_parent', 'no') == 'yes' ? 1 : 0,
					'image_in_modal' => in_array('image', WC_Admin_Settings::get_option('fdoe_product_popup_content_spec', array())) ? 1 : 0,
					'meta_in_modal' => in_array('meta', WC_Admin_Settings::get_option('fdoe_product_popup_content_spec', array())) ? 1 : 0,
					'desc_in_modal' => $this->is_prem && in_array('desc', WC_Admin_Settings::get_option('fdoe_product_popup_content_spec', array())) ? 1 : 0,
					'rating_in_modal' => $this->is_prem && in_array('rating', WC_Admin_Settings::get_option('fdoe_product_popup_content_spec', array())) ? 1 : 0,
					'can_not_add_message' => __('We apologize! You can not add another one of this product to the cart.', 'food-online-for-woocommerce'),
					'not_avalible_message' => __('Not Available', 'food-online-for-woocommerce'),
					'lazy_load' => get_option('fdoe_lazy_load_menu','no') == 'yes' ? 1 : 0,
					'fallback_popup' => get_option('fdoe_fallback_modal','no') == 'yes' ? 1 : 0,
					'fdoe_deactivate_plus_minus_js_buttons' => get_option('fdoe_deactivate_plus_minus_js_buttons','no') == 'yes' ? 1 : 0,
					'fdoe_product_quantity_buttons_class' => get_option('fdoe_product_quantity_buttons','no') == 'yes' ? 'fdoe-modal-quantity' : '',
					'early_set_cookie' => get_option('fdoe_early_set_cookie','no') == 'yes' ? 1 : 0,
					'dynamic_times' => get_option('fdoe_preperation_time_mode','fixed') == 'dynamic' ? 1 :0,
					'ava_msg1_first' => __( "It is not possible to order", 'food-online-for-woocommerce' ),
					'ava_msg1_last' => __( "at this time.", 'food-online-for-woocommerce' ),
					'or' => __('or','food-online-for-woocommerce'),
					'for' => __('for','food-online-for-woocommerce'),


					'when_eating_at_the_restaurant' => __('when eating at the restaurant','food-online-for-woocommerce'),
					'pickup' => __('pickup','food-online-for-woocommerce'),
					'delivery' => __('delivery','food-online-for-woocommerce'),
					'no_search_result' => __('No matching results found.','food-online-for-woocommerce'),
					'search_placeholder' => __('Search','food-online-for-woocommerce'),
					'show_search' => get_option('fdoe_show_search','no') == 'yes' ? 1 : 0,

				);
				wp_localize_script('fdoe-order', 'fdoe', $args);
				wp_enqueue_script('fdoe-order');
			}
		}


		function add_font_awesome_attributes($html, $handle) {
			if ('fdoe-order-font-2' === $handle || 'fdoe-order-font-1' === $handle || 'fdoe-order-font-3' === $handle) {
				return str_replace("media='all'", 'rel="preload" media="all"', $html);
			}
			return $html;
		}
		public function load_bootstrap_and_fontawesome() {
			if ($this->is_menu) {
				wp_enqueue_style('fdoe-order-boot-css', $this->get_plugin_url('assets/bootstrap/css/bootstrap.min.css') ,array(), FOOD_ONLINE_VERSION);
				wp_enqueue_script('fdoe-order-boot-js', $this->get_plugin_url('assets/bootstrap/js/bootstrap.min.js') , array(
					'jquery',

				) , FOOD_ONLINE_VERSION, true);
			}
		wp_enqueue_style('fdoe-order-font-1', $this->get_plugin_url('assets/fontawesome/css/fontawesome.min.css'),array(),FOOD_ONLINE_VERSION);
	   wp_enqueue_style('fdoe-order-font-2', $this->get_plugin_url('assets/fontawesome/css/solid.min.css'),array(),FOOD_ONLINE_VERSION);
		wp_enqueue_style('fdoe-order-font-4', $this->get_plugin_url('assets/fontawesome/css/regular.min.css'),array(),FOOD_ONLINE_VERSION);
		}
		function set_new_shop_loop( $num ) {

				if (  get_option('fdoe_override_shop') == "yes"  ) {

		$num = 999;
				}
		return $num;
		}
		function fdoe_main_query($query) {


			if (!is_ajax() && !is_admin()) {
				if ($query->get_queried_object() == null) {
					return;
				}

				if (( is_shop() && get_option('fdoe_override_shop') == "yes" && $query -> is_main_query()) ) {



				$num = 999;
					$query->set('posts_per_page', $num);
					if (get_option('fdoe_product_sorting_title', 'no') == 'yes') {
						$query->set('orderby', 'title');


					}

				if (get_option('fdoe_is_prem', 'no') == 'yes') {


				self::setSavedCatOrder();
			$cats_order   = self::getSavedCatOrder('only_saved');
			if (is_array($cats_order) && count($cats_order) > 0) {

				self::set_category_objects();

			$products_is = array();
			foreach(self::get_category_objects() as $cat){

				$products_is[] = apply_filters('fdoe_filter_product_query',wc_get_products(array('limit'=> -1, 'return' => 'ids', 'category'=> array(($cat->slug)))));

			}

			$query->set('post__in' ,self::array_flatten($products_is));

			}
				}
				}
			}
		}

		 function array_flatten($items)
{
    if (! is_array($items)) {
        return [$items];
    }

    return array_reduce($items, function ($carry, $item) {
        return array_merge($carry, self::array_flatten($item));
    }, []);
}
		public function woocommerce_init() {
			$this->product   = new Food_Online_Product();
			$this->ajax      = new Food_Online_Ajax();
			$this->orders    = new Food_Online_Orders();
			$this->loop      = new Food_Online_Loop($this->product);
			$this->shortcode = Food_Online_Shortcode::instance();
			$this->shortcode2 = Food_Online_Shortcode2::instance();
				$this->shortcode_address = Food_Online_Shortcode_Address::instance();
			$this->override_on();
		}
		public function load_text_domain() {
			load_plugin_textdomain('food-online-for-woocommerce', false, dirname(plugin_basename(__FILE__)) . '/languages/');
		}
		// Disables the template override if 404 eror
		public function check_for_404() {
			if (is_404()) {
				$this->override_off();
			}
		}
		// Turns on template overriding
		public function override_on() {
			self::$product_popup = get_option('fdoe_product_popup_content');
			add_filter('woocommerce_locate_template', array(
				$this,
				'override_templates'
			) , 999, 3);
			add_filter('wc_get_template_part', array(
				$this,
				'override_template_part'
			) , 999, 3);
			add_filter('wc_get_template', array(
				$this,
				'override_cart_template'
			) , 999, 5);
		}
		// add the filter
		public function override_cart_template($located, $template_name, $args, $template_path, $default_path) {
			if ('cart/mini-cart.php' == $template_name && WC_Admin_Settings::get_option('fdoe_minicart_style', 'popover') == 'increment') {
				$located = FDOE_PLUGINDIRPATH . 'templates/cart/mini-cart-incre.php';
			}
			elseif ('cart/mini-cart.php' == $template_name && WC_Admin_Settings::get_option('fdoe_minicart_style', 'popover') !== 'theme') {
				$located = FDOE_PLUGINDIRPATH . 'templates/cart/mini-cart.php';
			}
			elseif (isset($this->is_menu) && $this->is_menu || is_ajax()) {
				if ('single-product/add-to-cart/simple.php' == $template_name) {
					$located = FDOE_PLUGINDIRPATH . 'templates/woocommerce/single-product/add-to-cart/simple.php';
				}
				elseif ('single-product/related.php' == $template_name) {
					$located = FDOE_PLUGINDIRPATH . 'templates/woocommerce/related/related.php';
				}
				elseif ('single-product/product-image.php' == $template_name) {
					$located = FDOE_PLUGINDIRPATH . 'templates/woocommerce/single-product/image/product-image.php';
				}
				//Ratings
				elseif ($this->is_prem) {
					if ('single-product/review-rating.php' == $template_name) {
						$located = FDOE_PLUGINDIRPATH . 'prem/templates/woocommerce/single-product/review-rating.php';
					}
					elseif ('single-product/rating.php' == $template_name) {
						$located = FDOE_PLUGINDIRPATH . 'prem/templates/woocommerce/single-product/rating.php';
					}
					elseif ('single-product/review.php' == $template_name) {
						$located = FDOE_PLUGINDIRPATH . 'prem/templates/woocommerce/single-product/review.php';
					}
				}
			}
			return $located;
		}
		// Turns off template overriding
		public function override_off() {
			// Do not remove  overriding when Ajax
			if (!is_ajax()) {
				remove_filter('wc_get_template', array(
					$this,
					'override_cart_template'
				) , 999);
				remove_filter('woocommerce_locate_template', array(
					$this,
					'override_templates'
				) , 999);
				remove_filter('wc_get_template_part', array(
					$this,
					'override_template_part'
				) , 999);
			}
		}
		// Gets path to templates
		public function get_template_path($relativePath = '') {
			return $this->base_path('/templates/' . WC()
				->template_path() . $relativePath);
		}
		// Gets the base path
		protected function base_path($relativePath = '') {
			$rc           = new \ReflectionClass(get_class($this));
			return dirname($rc->getFileName()) . $relativePath;
		}
		// Performs the template overriding
		function override_templates($template, $template_name, $template_path) {
			//
			if (isset($this->is_menu) && $this->is_menu || is_ajax()) {
				global $woocommerce;
				$_template     = $template;
				if (!$template_path) {
					$template_path = $woocommerce->template_url;
				}
				$plugin_path   = $this->get_template_path();
				$plugin_path   = FDOE_PLUGINDIRPATH . 'templates/woocommerce/';
				if (file_exists($plugin_path . $template_name)) {
					$template      = $plugin_path . $template_name;
				}
				if (!$template) {
					$template      = locate_template(array(
						$template_path . $template_name,
						$template_name
					));
				}
				if (!$template) {
					$template      = $_template;
				}
				return $template;
			}
			else {
				return $template;
			}
		}
		// Gets the url to the plugin
		protected function get_plugin_url($relativePath = '') {
			return untrailingslashit(plugins_url($relativePath, $this->base_path_file()));
		}
		// Gets the class filenamne
		protected function base_path_file() {
			$rc           = new \ReflectionClass(get_class($this));
			return $rc->getFileName();
		}
		public function override_template_part($template, $slug, $name) {


			$template_directory = FDOE_PLUGINDIRPATH . 'templates/woocommerce/';
			if ($name) {

				if(self::$product_popup == 'theme' && "content-single-product.php" == "{$slug}-{$name}.php" ){
					return $template;
				}
					$path               = $template_directory . "{$slug}-{$name}.php";
			}
			else {
				$path               = $template_directory . "{$slug}.php";
			}
			return file_exists($path) ? $path : $template;
		}
		// Adds new checkout button
		public function fdoe_custom_widget_shopping_cart_proceed_to_checkout() {
			$original_link = wc_get_checkout_url();
			echo '<a href="' . esc_url($original_link) . '" class="button checkout from_menu" id="checkout_button_1">' . esc_html__('Go to Checkout', 'food-online-for-woocommerce') . '</a>';
		}
		// Adds checkout button in the handheld footer bar for Storefront Theme
		public function fdoe_add_checkout_link_storefront($links) {

			$new_links = array(
				'fdoe_checkout_2'           => array(
					'priority'           => 8,
					'callback'           => array($this,'fdoe_checkout_link_storefront')
				)
			);
			$links     = array_merge($new_links, $links);
			return $links;
		}
		function fdoe_checkout_link_storefront() {

				if ((is_shop() && get_option('fdoe_override_shop') == 'yes') || Food_Online::get_is_shortcode() ) {
					echo '<a class="checkout from_menu" id="checkout_button_11" href="' . esc_url(wc_get_checkout_url()) . '" >';
					echo ' <span class="fdoe_checkout_22">' . esc_html__('Checkout', 'food-online-for-woocommerce') . '</span> ';
					echo '</a>';
				}
			}
		public function fdoe_add_shop_link_storefront($links) {
			$new_links = array(
				'shop'           => array(
					'priority'           => 10,
					'callback'           => array(
						$this,
						'fdoe_shop_link'
					)
				)
			);
			$links     = array_merge($new_links, $links);
			return $links;
		}
		public function fdoe_add_cart_link_storefront($links) {
			// Creates cart links for handheld devices in Storefront footer bar

			$new_links = array(
				'minicart'           => array(
					'priority'           => 10,
					'callback'           => array($this,'fdoe_cart_link_storefront')
				)
			);
			$links     = array_merge($new_links, $links);
			return $links;
		}
		function fdoe_cart_link_storefront() {
				if ((is_shop() && get_option('fdoe_override_shop') == "yes") || Food_Online::get_is_shortcode() ) {
					$count = WC()
						->cart->cart_contents_count;
					echo '<a  id="cart_aromodal_link" data-toggle="aromodal" data-target="#cart_aromodal" href="" title="">';
					echo '<span class="fdoe_count">' . esc_html($count) . '</span> ';
					echo '</a>';
				}
				else {
					$count = WC()
						->cart->cart_contents_count;
					echo '<a href="' . esc_url(get_permalink(wc_get_page_id('cart'))) . '">';
					echo '<span class="fdoe_count">' . esc_html($count) . '</span>';
					echo '</a>';
				}
			}
		public function fdoe_shop_link() {
			if ($this->is_menu) {
				echo '<a href="#the_menu" ></a>';

			}
			elseif (get_option('fdoe_override_shop') == "yes") {
				echo '<a href="' . esc_url(get_permalink(wc_get_page_id('shop'))) . '"></a>';
			}
			else {

				$pages   = get_pages();
				foreach ($pages as $page) {
					$content = $page->post_content;


					if (has_shortcode($content, 'foodonline') || has_shortcode($content, 'foodonline2') ) {
						echo '<a href="' . esc_url(get_permalink($page->ID)) . '"></a>';
						break;
					}
				}
			}
			return;
		}
		/**
		 * Display a menu intended for use on handheld devices, inspired of Storefront
		 *
		 *
		 */
		public function fdoe_handheld_footer_bar() {

			$links = array(
				'minicart' => array(
					'priority' => 8,
					'callback' => array($this,'fdoe_cart_link_2'),
				) ,
				'shop' => array(
					'priority' => 10,
					'callback' => array(
						$this,
						'fdoe_shop_link'
					) ,
				) ,
				'fdoe_checkout_2' => array(
					'priority' => 12,
					'callback' => array($this,'fdoe_checkout_link_22'),
				) ,
			);
?>
<div class="fdoe-handheld-footer-bar">
	<ul class="columns-<?php echo esc_attr(count($links)); ?>">
		<?php foreach ($links as $key => $link): ?>
		<li class="<?php echo esc_attr($key); ?>">
			<?php
				if ($link['callback']) {
					call_user_func($link['callback'], $key, $link);
				}
?> </li>
		<?php
			endforeach; ?> </ul>
</div>
<?php
		}
		function fdoe_checkout_link_22() {
				if ((is_shop() && get_option('fdoe_override_shop') == "yes") || Food_Online::get_is_shortcode() ) {
					echo '<a class="checkout from_menu" id="checkout_button_11" href="' . esc_url(wc_get_checkout_url()) . '" >';
					echo '<span class="fdoe_checkout_22">' . esc_html__('Checkout', 'food-online-for-woocommerce') . '</span> ';
					echo '</a>';
				}
			}
			function fdoe_cart_link_2() {
				if ((is_shop() && get_option('fdoe_override_shop') == "yes") || Food_Online::get_is_shortcode() ) {
					$count = WC()
						->cart->cart_contents_count;
					echo '<a id="cart_aromodal_link" data-toggle="aromodal" data-target="#cart_aromodal" href="" title="">';
					echo ' <span class="fdoe_count">' . esc_html($count) . '</span></a>';

				}
				else {
					$count = WC()
						->cart->cart_contents_count;
					echo '<a href="' . esc_url(get_permalink(wc_get_page_id('cart'))) . '">';
					echo '<span class="fdoe_count">' . esc_html($count) . '</span></a>';

				}
			}
		// Updates the items count in Storefront footer bar
		public function fdoe_woocommerce_header_add_to_cart_fragment($fragments) {
			global $woocommerce;
			ob_start();
?> <span class="fdoe_count"><?php echo $woocommerce
				->cart->cart_contents_count; ?>
 </span>
<?php
			$fragments['span.fdoe_count'] = ob_get_clean();
			return $fragments;
		}
		//Removes links from Storefront handheld footer bar
		public function fdoe_remove_handheld_footer_links($links) {
			unset($links['my-account']);
			unset($links['search']);
			unset($links['cart']);
			return $links;
		}
		//Removes Storefront sorting option
		public function fdoe_storefront_sorting_remove() {
			remove_action('woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10);
			remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10);
			remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
			remove_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20);
			remove_action('woocommerce_before_shop_loop', 'storefront_woocommerce_pagination', 30);
		}
		// Output the mini cart in an aromodal for handheld devices
		public function fdoe_output_cart_aromodal() {
			ob_start();
 echo '
<div class="fdoe-element">
	<div class="aromodal cart-aromodal fdoe-aromodal fade-aro" id="cart_aromodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none">
		<div class="aromodal-dialog" role="document">
			<div class="aromodal-content">
				<div class="aromodal-header"> <button type="button" class="modal-close" data-dismiss="aromodal" aria-label="close">
       <i class="far fa-times-circle fa-2x"></i>
        </button>
					<div class="aromodal-title" id="exampleModalLabel_cart">' . esc_html__('Your Order', 'food-online-for-woocommerce') . ' </div>
				</div>
				<div class="aromodal-body">
					<div class="arorow">
						<div class="arocol-xs-10 fdoe-minicart-main-column ">
							<div class="fdoe_mini_cart_2 " id="fdoe_mini_cart_id_2" style="display:inline"><div class="widget_shopping_cart_content"> '; woocommerce_mini_cart(); echo ' </div></div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

';
			$output = ob_get_clean();
			echo $output;
		}
		public function fdoe_output_stock_warning() {
			ob_start();
 echo '
<div class="fdoe-element">
	<div class="aromodal stock-aromodal fdoe-aromodal fade-aro" id="stock_aromodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none">
		<div class="aromodal-dialog" role="document">
			<div class="aromodal-content">
				<div class="aromodal-header"> <button type="button" class="modal-close" data-dismiss="aromodal" aria-label="close">
			 <i class="far fa-times-circle fa-2x"></i>
			</button>
					<div class="aromodal-title" id="exampleModalLabel_cart">' . esc_html__('Stock is low!', 'food-online-for-woocommerce') . ' </div>
				</div>
				<div class="aromodal-body">' . esc_html__('We apologize! Your desired amount is not available in stock.', 'food-online-for-woocommerce') . '</div>
			</div>
		</div>
	</div>
	<div class="aromodal stock-aromodal fdoe-aromodal fade-aro" id="stock_indi_aromodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none">
		<div class="aromodal-dialog" role="document">
			<div class="aromodal-content">
				<div class="aromodal-header"> <button type="button" class="modal-close" data-dismiss="aromodal" aria-label="close">
			 <i class="far fa-times-circle fa-2x"></i>
			</button>
					<div class="aromodal-title" id="exampleModalLabel_cart">' . esc_html__('Product not added to cart!', 'food-online-for-woocommerce') . ' </div>
				</div>
				<div class="aromodal-body">' . esc_html__('We apologize! You can not add another one of this product to the cart.', 'food-online-for-woocommerce') . '</div>
			</div>
		</div>
	</div>

</div>
';
			$output = ob_get_clean();
			echo $output;
		}
		// Output element wrapper and set hooks for product modals
		public function output_product_aromodals_backbone() {
			echo '<div class="fdoe-element" id="fdoe-product-modals"><div  id="fdoe-product-modals-inner"></div></div>';
		}
		function quantity_minus_sign() {
			echo '<button type="button" class="fdoe-minus" >-</button>';
			}
		function quantity_plus_sign() {
			echo '<button type="button" class="fdoe-plus" >+</button>';
		}
		public function set_products_modal_hook() {
			if(get_option('fdoe_product_quantity_buttons','no') == 'yes'){
				add_action( 'woocommerce_after_add_to_cart_quantity', array($this,'quantity_plus_sign') );
				add_action( 'woocommerce_before_add_to_cart_quantity', array($this,'quantity_minus_sign') );
			}
			$old_image_option = get_option('fdoe_popup_image') == 'yes' ? 'image' : '';
			$old_meta_option  = get_option('fdoe_popup_meta') == 'yes' ? 'meta' : '';
			$popup_content    = WC_Admin_Settings::get_option('fdoe_product_popup_content_spec', array(
				$old_image_option,
				$old_meta_option
			));
			// Food Online product modal template
			if (get_option('fdoe_product_popup_content', 'custom') == 'style-1') {
				add_action('fdoe-content-single-product-clean', 'woocommerce_template_single_add_to_cart');
				if (in_array('rating', $popup_content) !== false && get_option('fdoe_is_prem', 'no') == 'yes') {
					add_action('fdoe-content-single-product-clean', 'woocommerce_template_single_rating', -10);
					add_action('woocommerce_review_before', 'woocommerce_review_display_gravatar', 10);
					add_filter('comments_template', 'fdoe_comments_template', 999, 1);
					add_action('fdoe-content-single-product-summary', 'comments_template');
				}
				if (in_array('meta', $popup_content) !== false) {
					add_action('fdoe-content-single-product-summary', 'woocommerce_template_single_meta', -40);
				}
			}
			elseif (get_option('fdoe_product_popup_content', 'custom') == 'custom') {
				remove_all_actions('woocommerce_before_single_product');
				remove_all_actions('woocommerce_before_single_product_summary');
				remove_all_actions('woocommerce_single_product_summary');
				remove_all_actions('woocommerce_after_single_product_summary');
				remove_all_actions('woocommerce_after_single_product');
				add_action('woocommerce_single_product_summary_price_fdoe', 'woocommerce_template_single_price', 1);
				add_action('woocommerce_single_product_summary_add_fdoe', 'woocommerce_template_single_add_to_cart', 30);
				add_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
				add_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
				add_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end');
				add_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
				add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
				if (in_array('image', $popup_content) !== false) {
					add_action('woocommerce_single_product_summary_image_fdoe', 'woocommerce_show_product_images', 7);
				}
				if (in_array('meta', $popup_content) !== false) {
					add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
				}
				if (in_array('rating', $popup_content) !== false && get_option('fdoe_is_prem', 'no') == 'yes') {
					add_action('woocommerce_single_product_summary_add_fdoe', 'woocommerce_template_single_rating', 100);
					add_action('woocommerce_review_before', 'woocommerce_review_display_gravatar', 10);
					add_filter('comments_template', 'fdoe_comments_template', 999, 1);
					add_action('woocommerce_single_product_summary', 'comments_template');
				}
				if (in_array('desc', $popup_content) !== false && get_option('fdoe_is_prem', 'no') == 'yes') {
					add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
				}
			}
			else {
				// This is for the Theme option
				// Keep theese action removals for compatibility with versions prior to 2.3.8
				remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
				remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
				remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
				remove_action('woocommerce_review_before', 'woocommerce_review_display_gravatar', 10);
				remove_action('woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10);
				remove_action('woocommerce_review_comment_text', 'woocommerce_review_display_comment_text', 10);
				remove_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20);
				remove_action('woocommerce_after_single_product_summary', 'storefront_upsell_display', 15);
				remove_action('woocommerce_after_single_product_summary', 'storefront_single_product_pagination', 40);
			}
		}
		public static function get_max_purchace($product_id, $cart_item) {
			$product             = wc_get_product($product_id);
			$type                = $product->get_type();
			if ($type == 'variation') {
				$variation_product   = $product;
				$product             = wc_get_product($variation_product->get_parent_id());
				if ($variation_product->managing_stock() === true) {
					$avalible            = $variation_product->get_max_purchase_quantity();
				}
				elseif ($variation_product->managing_stock() == 'parent') {
					$product_qty_in_cart = WC()
						->cart
						->get_cart_item_quantities();
					$max_to              = $variation_product->get_max_purchase_quantity();
					if (array_key_exists($variation_product->get_stock_managed_by_id() , $product_qty_in_cart)) {
						$in_cart_total       = $product_qty_in_cart[$variation_product->get_stock_managed_by_id() ];
					}
					else {
						$in_cart_total       = 0;
					}
					$avalible            = ($max_to - ($in_cart_total - $cart_item['quantity']));
				}
				else {
					$avalible            = '';
				}
			}
			else {
				if ($product->managing_stock()) {
					$avalible            = $product->get_max_purchase_quantity();
				}
			}
			return isset($avalible) ? $avalible : '';
		}
		public static function get_product_subs( $product, $quantity ) {
        $price = $product->get_price();

        if ( $product->is_taxable() ) {

            if ( WC()->cart->display_prices_including_tax() ) {
                $row_price        = wc_get_price_including_tax( $product, array( 'qty' => $quantity ) );
                $product_subtotal =  $row_price ;


            } else {
                $row_price        = wc_get_price_excluding_tax( $product, array( 'qty' => $quantity ) );
                $product_subtotal =  $row_price ;


            }
        } else {
            $row_price        = $price * $quantity;
            $product_subtotal = $row_price;
        }

        return $product_subtotal;
    }


	static function activate() {
			update_option('Food_Online_Activated_Plugin', 'Food_Online');

			add_option('fdoe_override_shop', 'yes');
			add_option('fdoe_left_menu', 'no');
			add_option('fdoe_menu_titles_icon', 'fas fa-ellipsis-h');
			add_option('fdoe_color', '#bf5bb6');
			add_option('fdoe_item_icon', 'fas fa-plus-circle');
			add_option('fdoe_show_images', 'rec');
			add_option('fdoe_layout', 'fdoe_onecol');
			add_option('fdoe_hide_minicart', 'no');
			update_option('fdoe_is_prem', 'no');


		}
		// to be run on plugin uninstallation
		public static function uninstall() {
			if (get_option('fdoe_clean_settings', 'no') == 'yes') {

		foreach ( wp_load_alloptions() as $option => $value ) {
					if ( strpos( $option, 'fdoe_' ) === 0 ) {
						delete_option( $option );
					}
					}
			}
		}

	function disabled_shipping_after_checkout_validation( $posted ) {

	$shipping_mode = get_option('fdoe_is_prem', 'no') !== 'no' && get_option('fdoe_enable_delivery_switcher','no') !== 'no' && isset(WC()->session) ? WC()->session->get('fdoe_shipping','default') : 'default';
	$shipping_mode = $shipping_mode == 'flat_rate' || $shipping_mode == 'free_shipping' || $shipping_mode == 'szbd-shipping-method' ? 'delivery' :$shipping_mode;
	$shipping_mode = $shipping_mode == 'local_pickup'  ? 'pickup' : $shipping_mode;

	$to_disable = self::get_disabled_modes_from_availability('placeorder');


 foreach($to_disable as $disable => $value){


                   $to_return = array();

                if(is_null(key($value)) || empty(key($value)) || $shipping_mode != key($value)){
                    continue;
                }

                switch ( key($value) )
                    {

                case 'default':
					$default_message = __( "It is not possible to place an order right now.", 'food-online-for-woocommerce' );

					$items = isset($value[key($value)]) ? $value[key($value)] :null;
					$message2 = __('from the restaurant','food-online-for-woocommerce');
					self::add_checkout_error_message($items, $default_message, $message2);


			break 2;



                    }

             }



	}
		public static function add_checkout_error_message($modes_items , $default_message, $item_message2){
		 if(isset($modes_items) && !empty($modes_items)){
						$i = 0;
						$size = is_countable($modes_items) ? count($modes_items) : 0;
						$item_message = '';

							foreach($modes_items as $one_title){

								$item_message .= $i == 0 ? $one_title : ( ( $i == 1 && $i != $size - 1  ) ? (', ' . $one_title ) : (' '. __('or','food-online-for-woocommerce') .' ' . $one_title )   );
								$i++;
							}
					 }

			if(isset($item_message) ){
				$message = __( "It is not possible to order", 'food-online-for-woocommerce' ).' ' .'<i>'. esc_html( $item_message ) .'</i>' .' ' .  $item_message2  . ' '.  __( "at this time.", 'food-online-for-woocommerce' );
			}else{

			$message = $default_message;
			}
			 wc_add_notice( $message, 'error' );
	}

		public static function get_disabled_modes_from_availability($appli = 'placeorder' )
      {


      self::$schedules = isset(self::$schedules) ? self::$schedules : (json_decode(get_option('fdoe_ava_schedule') , true) !== null ? json_decode(get_option('fdoe_ava_schedule') , true) : array() );
		$schedules = self::$schedules;


	  $to_disable = array();
	  $to_enable = array();
	   $to_approve = array();


      if(is_array($schedules)){
		$format = 'Y-m-d';
         $datetime_today_imm = current_datetime();
		 $date = $datetime_today_imm;
		 $weekday = $datetime_today_imm->format('w');

	// Collect applications that have single date schedule so weekday schedules doesn't override them
    $single_day_schedules = array();
	 foreach ($schedules as $schedule)
        {

			$schedule_date = isset($schedule['date']) && $schedule['date'] != '' ? DateTimeImmutable::createFromFormat($format, $schedule['date'],new DateTimeZone(wp_timezone_string())) : false;
			$is_single_date_today = $schedule_date instanceof DateTimeImmutable && $schedule_date->setTime(00,00,00,00) == $datetime_today_imm ->setTime(00,00,00,00);

			if($is_single_date_today){
				$single_day_schedules[] = $schedule['application'];

			}
		}

	$approved_cart_items = array();
	  foreach ($schedules as $schedule)
        {
		 $is_weekday_today = is_array($schedule['weekday']) && in_array($weekday, $schedule['weekday']);
		$schedule_date = isset($schedule['date']) ? DateTimeImmutable::createFromFormat($format, $schedule['date'],new DateTimeZone(wp_timezone_string())) : false;
		$is_single_date_today = $schedule_date instanceof DateTimeImmutable  && $schedule_date->setTime(00,00,00,00) == $datetime_today_imm ->setTime(00,00,00,00);
        if (is_string($schedule['application']) && $appli == $schedule['application'] )
		 {
			if(empty($to_disable)){
				 $to_disable = $appli == 'timepicker' ? array('pickup','delivery') : array('pickup','delivery','eathere','default');

			}
			if(	( $is_weekday_today && !in_array($schedule['application'] ,$single_day_schedules)) ||
			( $is_single_date_today ) ||
			$appli == 'timepicker'
			){
				if($appli == 'placeorder' || $appli == 'timepicker' ){
				foreach($schedule['mode'] as $mode){
					$mode = $mode == 'del' ? 'delivery' : $mode;
					if(!array_key_exists ( $mode , $approved_cart_items) ){
					$approved_cart_items[$mode] = array();
					}
				}
				}

				}else{
				continue;
				}


				$open = (new DateTime($schedule['time_from'],new DateTimeZone(wp_timezone_string())))->setDate($date->format('Y'),$date->format('n'),$date->format('j'));
				$close =(new DateTime($schedule['time_to'],new DateTimeZone(wp_timezone_string())))->setDate($date->format('Y'),$date->format('n'),$date->format('j'));


			if( ($appli != 'timepicker' && $open <= $datetime_today_imm && $datetime_today_imm <= $close) || $appli == 'timepicker'){

				foreach( $schedule['mode'] as $mode){
					$mode = $mode == 'del' ? 'delivery' : $mode;
					if($appli == 'dropdownselector'){
						$to_enable[] = $mode;
						continue;
					}
					if($appli == 'placeorder' || $appli == 'timepicker'){
				$approved_cart_items[$mode] = array_merge(self::get_approved_cart_items($schedule['cats'],$schedule['tags']), $approved_cart_items[$mode]);


					}

				}

			}




          }
        }
      }

	 if($appli == 'dropdownselector'){
						return array_fill_keys(array_values(array_diff($to_disable,$to_enable)),array());

					}



$to_disable_array = array_map(function($el) use ($approved_cart_items){

	if(WC()->cart->is_empty() ){

		if( isset($approved_cart_items[$el] ) && in_array('empty_cart', $approved_cart_items[$el] ) ){
			return null;
		}else{

			return array($el => []);
		}
	}
	$not_approved = isset($approved_cart_items[$el] ) ? self::is_whole_cart_approved($approved_cart_items[$el] ) : null;
	return  isset($not_approved[0]) && $not_approved[0] == false ? array( $el => $not_approved[1] ) : ( !isset($approved_cart_items[$el] ) ? array($el => []) : null );


	},$to_disable);

$to_disable_array  = array_filter($to_disable_array );




      return $to_disable_array ;


      }

	     static function is_whole_cart_approved($el){

		$not_approved_cart_items = array();

		foreach (WC()
        ->cart
        ->get_cart_contents() as $cart_item)
        {

			if( !in_array($cart_item['product_id'], $el ) ){

				 $product = wc_get_product($cart_item['product_id']);
				 $product_title = $product->get_title();
				$not_approved_cart_items[] = $product_title;

			}
		}
		return empty($not_approved_cart_items ) ? array(true,null) : array(false, $not_approved_cart_items);

	   }

	   static function get_approved_cart_items($cats,$tags){
		$approved = array();

		if(WC()->cart->is_empty()){
			$approved[] = 'empty_cart';
		}
		foreach (WC()
        ->cart
        ->get_cart_contents() as $cart_item)
        {
			if(in_array('fdoeallcategories', $cats)){
				$approved[] = $cart_item['product_id'];
				continue;
			}
        $product = wc_get_product($cart_item['product_id']);
        if ($product !== null)
          {
		if(	!empty(array_intersect($product->get_category_ids(), $cats))){

			$approved[] = $cart_item['product_id'];
		}else if( !empty(array_intersect($product->get_tag_ids(), $tags) )){

			$approved[] = $cart_item['product_id'];
		}


          }
        }
		return array_values(array_unique($approved));
	  }

	} // End of main class

}
$GLOBALS['wc_list_items']  = Food_Online::instance();

// Temp update notice about version 5.0
function fdoe_general_admin_notice(){
    global $pagenow;
    if ( $pagenow == 'plugins.php' || isset($_GET['page']) && $_GET['page'] === 'wc-settings' ) {
       echo' <div class="notice fdoep-notice is-dismissible fdoep-notice--extended">
					<div class="fdoep-notice__aside">
				<div class="fdoep-notice-icon-wrapper"><i class="fdoep-notice-icon" aria-hidden="true"></i></div>			</div>
			<div class="fdoep-notice__content">
							<h3>FOOD ONLINE UPDATE HEADS UP!</h3>

							<p>Food Online 5.0 is a major update and your settings may be re-saved. <a href="https://arosoft.se/food-online-5-update/" target="_blank">Learn more.</a></p>


		</div></div>';
    }
}
//add_action('admin_notices', 'fdoe_general_admin_notice');