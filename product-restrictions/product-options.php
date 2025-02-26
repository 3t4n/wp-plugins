<?php
/**
 * Plugin Name: Product Visiblity by User Role - Hide Price and Add To Cart - Min Max Quantity Limit 
 * Description: Get your whole store ready with B2B functionalities!
 * Plugin URI: https://b2bextension.store/product/product-restrictions/
 * Version: 1.0.0
 * Author: b2bextension
 * Developed By: b2bextension
 * Author URI: https://b2bextension.store/
 * Support: https://b2bextension.store/
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 * Text Domain: product-restrictions
 * WC requires at least: 3.0.9
 * WC tested up to: 9.*.*
 *
 * @package b2bextension
 */

if (!defined('WPINC')) {
	die;
}


if (!class_exists('product_restriction_for_woocommerce')) {

	class product_restriction_for_woocommerce
	{

		public function __construct()
		{
			add_action('woocommerce_init', function () {

				if (is_user_logged_in() || is_admin()) {
					return;
				}

				if (isset(WC()->session)) {
					if (!WC()->session->has_session()) {
						WC()->session->set_customer_session_cookie(true);
					}
				}

			});



			$this->afreg_global_constents_vars();

			// Hook the function to the admin_menu action
			add_action('admin_menu', [$this, 'b2bking_add_submenu']);

			add_action('after_setup_theme', array($this, 'afreg_init'));
			add_action('init', array($this, 'afreg_custom_post_type'));

			//HOPS compatibility
			add_action('before_woocommerce_init', array($this, 'afcf__HOPS_Compatibility'));

			add_action('wp_enqueue_scripts', [$this, 'ct_rbpaqp_enqueue_scripts']);
			add_action('admin_enqueue_scripts', [$this, 'ct_rbpaqp_enqueue_scripts']);


			include_once CT_RBPAQP_PLUGIN_DIR . 'includes/class-ct-rbpaqp-hpaatcb-general-functions.php';
			include_once CT_RBPAQP_PLUGIN_DIR . 'includes/class-ct-rbpaqp-ajax.php';

			// including hide payment and shipping method.
			include_once CT_RBPAQP_PLUGIN_DIR . 'hide-payment-method-and-shipping/hide-payment-method-and-shipping.php';
			// product options.
			include_once CT_RBPAQP_PLUGIN_DIR . 'product-options/class-product-options.php';

			if (is_admin()) {

				include_once CT_RBPAQP_PLUGIN_DIR . 'includes/admin/class-ct-rbpaqp-admin.php';

			} else {

				include CT_RBPAQP_PLUGIN_DIR . 'includes/front/hide-price-product-and-add-to-cart-button/front.php';
				include CT_RBPAQP_PLUGIN_DIR . 'includes/front/hide-product-and-variation/front.php';
				include CT_RBPAQP_PLUGIN_DIR . 'includes/front/min-max-qty/front.php';
			}
		}
		public function b2bking_menu_callback()
		{

		}


		public function afcf__HOPS_Compatibility()
		{

			if (class_exists(\Automattic\WooCommerce\Utilities\FeaturesUtil::class)) {
				\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('custom_order_tables', __FILE__, true);
			}
		}

		public function afreg_global_constents_vars()
		{

			if (!defined('CT_RBPAQP_URL')) {
				define('CT_RBPAQP_URL', plugin_dir_url(__FILE__));
			}

			if (!defined('CT_RBPAQP_BASENAME')) {
				define('CT_RBPAQP_BASENAME', plugin_basename(__FILE__));
			}

			if (!defined('CT_RBPAQP_PLUGIN_DIR')) {
				define('CT_RBPAQP_PLUGIN_DIR', plugin_dir_path(__FILE__));
			}

			if (!defined('CT_RBPAQP_UPLOAD_DIR')) {

				$upload_dir = wp_upload_dir();

				define('CT_RBPAQP_UPLOAD_DIR', $upload_dir['basedir'] . '/addify-custom-fields/');

				if (!is_dir(CT_RBPAQP_UPLOAD_DIR)) {
					mkdir(CT_RBPAQP_UPLOAD_DIR);
				}
			}

			if (!defined('AF_CF_UPLOAD_URL')) {

				$upload_dir = wp_upload_dir();

				define('AF_CF_UPLOAD_URL', $upload_dir['baseurl'] . '/addify-custom-fields/');
			}
		} //end afreg_global_constents_vars()

		public function afreg_init()
		{

			if (function_exists('load_plugin_textdomain')) {

				load_plugin_textdomain('product-restrictions', false, dirname(plugin_basename(__FILE__)) . '/languages/');
			}
		} //end afreg_init()
		public function b2bking_add_submenu()
		{
			add_menu_page(
				'Product Restrictions',
				'Product Restrictions',
				'manage_options',
				'b2bking',
				[$this, 'b2bking_menu_callback'],
				'dashicons-admin-generic'
			);
		}

		public function afreg_custom_post_type()
		{

			// ----------------------------------------------

			$def_labels = array(
				'name' => esc_html__('Default Role Base Min Max Quantity', 'product-restrictions'),
				'singular_name' => esc_html__('Default Role Base Min Max Quantity', 'product-restrictions'),
				'edit_item' => esc_html__('Edit Role Base Min Max Quantity', 'product-restrictions'),
				'new_item' => esc_html__('New Role Base Min Max Quantity', 'product-restrictions'),
				'view_item' => esc_html__('View Role Base Min Max Quantity', 'product-restrictions'),
				'search_items' => esc_html__('Search Role Base Min Max Quantity', 'product-restrictions'),
				'exclude_from_search' => true,
				'not_found' => esc_html__('No Role Base Min Max Quantity', 'product-restrictions'),
				'not_found_in_trash' => esc_html__('No Role Base Min Max Quantity in trash', 'product-restrictions'),
				'parent_item_colon' => '',
				'all_items' => esc_html__('Min Max Quantity', 'product-restrictions'),
				'menu_name' => esc_html__('Default Role Base Min Max Quantity', 'product-restrictions'),
			);

			$args = array(
				'labels' => $def_labels,
				'public' => false,
				'publicly_queryable' => true,
				'show_ui' => true,
				'show_in_menu' => 'b2bking',
				'query_var' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => false,
				'rewrite' => array('slug' => 'ct_min_max_qty_role', 'with_front' => false),
				'supports' => array('title')
			);

			register_post_type('ct_min_max_qty_role', $args);


			// Hide Price  And Add To Cart Button.

			$labels = array(
				'name' => esc_html__('Hide Price And To Cart Button', 'product-restrictions'),
				'singular_name' => esc_html__('Hide Price And To Cart Button', 'product-restrictions'),
				'add_new' => esc_html__('Add New Field', 'product-restrictions'),
				'add_new_item' => esc_html__('Add New Field', 'product-restrictions'),
				'edit_item' => esc_html__('Edit Hide Price And To Cart Button', 'product-restrictions'),
				'new_item' => esc_html__('New Hide Price And To Cart Button', 'product-restrictions'),
				'view_item' => esc_html__('View Hide Price And To Cart Button', 'product-restrictions'),
				'search_items' => esc_html__('Search Hide Price And To Cart Button', 'product-restrictions'),
				'exclude_from_search' => true,
				'not_found' => esc_html__('No Hide Price And To Cart Button found', 'product-restrictions'),
				'not_found_in_trash' => esc_html__('No Hide Price And To Cart Button found in trash', 'product-restrictions'),
				'parent_item_colon' => '',
				'all_items' => esc_html__('Hide Price And To Cart Button', 'product-restrictions'),
				'menu_name' => esc_html__('Hide Price And To Cart Button', 'product-restrictions'),
			);

			$args = array(
				'labels' => $labels,
				'public' => false,
				'publicly_queryable' => true,
				'show_ui' => true,
				'show_in_menu' => 'b2bking',
				'query_var' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => false,
				'rewrite' => array('slug' => 'ct_hide_p_nd_a_t_c_b', 'with_front' => false),
				'supports' => array('title', 'page-attributes')
			);

			register_post_type('ct_hide_p_nd_a_t_c_b', $args);


			// Hide Price  And Add To Cart Button.

			$labels = array(
				'name' => esc_html__('Hide products and variation', 'product-restrictions'),
				'singular_name' => esc_html__('Hide products and variation', 'product-restrictions'),
				'add_new' => esc_html__('Add New Field', 'product-restrictions'),
				'add_new_item' => esc_html__('Add New Field', 'product-restrictions'),
				'edit_item' => esc_html__('Edit Hide products and variation', 'product-restrictions'),
				'new_item' => esc_html__('New Hide products and variation', 'product-restrictions'),
				'view_item' => esc_html__('View Hide products and variation', 'product-restrictions'),
				'search_items' => esc_html__('Search Hide products and variation', 'product-restrictions'),
				'exclude_from_search' => true,
				'not_found' => esc_html__('No Hide products and variation found', 'product-restrictions'),
				'not_found_in_trash' => esc_html__('No Hide products and variation found in trash', 'product-restrictions'),
				'parent_item_colon' => '',
				'all_items' => esc_html__('Hide Products and Variation', 'product-restrictions'),
				'menu_name' => esc_html__('Hide products and variation', 'product-restrictions'),
			);

			$args = array(
				'labels' => $labels,
				'public' => false,
				'publicly_queryable' => true,
				'show_ui' => true,
				'show_in_menu' => 'b2bking',
				'query_var' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => false,
				'rewrite' => array('slug' => 'ct_hide_prdct_nd_var', 'with_front' => false),
				'supports' => array('title', 'page-attributes')
			);
			register_post_type('ct_hide_prdct_nd_var', $args);

			// hide payment and shipping method 
			$labels = array(
				'name' => esc_html__('Hide Shipping and Payment Method', 'hide_payment_method'),
				'singular_name' => esc_html__('Hide Shipping and Payment Method', 'hide_payment_method'),
				'edit_item' => esc_html__('Edit Hide Shipping and Payment Method ', 'hide_payment_method'),
				'new_item' => esc_html__('Hide Shipping and Payment Method', 'hide_payment_method'),
				'view_item' => esc_html__('View Hide Shipping and Payment Method Cart', 'hide_payment_method'),
				'search_items' => esc_html__('Search Hide Shipping and Payment Method', 'hide_payment_method'),
				'not_found' => esc_html__('No Hide Shipping and Payment Method found', 'hide_payment_method'),
				'not_found_in_trash' => esc_html__('No bestprice found in trash', 'hide_payment_method'),
				'menu_name' => esc_html__('Hide Shipping and Payment Method', 'hide_payment_method'),
				'item_published' => esc_html__('Hide Shipping and Payment Method published', 'hide_payment_method'),
				'item_updated' => esc_html__('Hide Shipping and Payment Method updated', 'hide_payment_method'),
			);
			$supports = array(
				'title',
			);
			$options = array(
				'supports' => $supports,
				'labels' => $labels,
				'public' => true,
				'publicly_querable' => false,
				'query_var' => true,
				'capability_type' => 'post',
				'can_export' => true,
				'show_ui' => true,
				'show_in_admin_bar' => true,
				'exclude_from_search' => true,
				'show_in_menu' => 'b2bking',
				'has_archive' => true,
				'rewrite' => array(
					'slug',
					'mao_makeoffer',
					'with_front' => false,
				),
				'show_in_rest' => true,
			);
			register_post_type('city_hide', $options);

		} //end afdef_custom_post_type()

		public function ct_rbpaqp_enqueue_scripts()
		{

			if (is_admin()) {

				wp_enqueue_script('ct-rbpaqp', CT_RBPAQP_URL . 'assets/js/admin.js', array('jquery'), '1.0.0', false);
				wp_enqueue_style('admin-css', CT_RBPAQP_URL . 'assets/css/admin.css', array(), '1.0.0');

			} else {

				wp_enqueue_script('ct-rbpaqp', CT_RBPAQP_URL . 'assets/js/front.js', array('jquery'), '1.0.0', false);
				wp_enqueue_style('front-css', CT_RBPAQP_URL . 'assets/css/front.css', array(), '1.0.0');
			}

			wp_enqueue_style('font-awesome-lib', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', [], '4.7.0', false);

			wp_enqueue_script('jquery-ui-accordion');
			wp_enqueue_script('jquery-ui-sortable');

			wp_enqueue_style('wc-select2-css', plugins_url('assets/css/select2.css', WC_PLUGIN_FILE), array(), '5.7.2');
			wp_enqueue_script('wc-select2-js', plugins_url('assets/js/select2/select2.min.js', WC_PLUGIN_FILE), array('jquery'), '4.0.3', false);

			$af_c_f_data = array(
				'ajaxurl' => admin_url('admin-ajax.php'),
				'nonce' => wp_create_nonce('cloud-tech-rbpaqpfw-nonce'),
			);
			wp_localize_script('ct-rbpaqp', 'ct_rbpaqp_var', $af_c_f_data);

		}


	} //end class
	new product_restriction_for_woocommerce();
}

