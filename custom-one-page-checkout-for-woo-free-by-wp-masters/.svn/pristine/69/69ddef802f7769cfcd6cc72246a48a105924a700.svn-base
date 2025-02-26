<?php
/*
 * Plugin Name: Custom & One-Page Checkout for Woo - Free by WP Masters
 * Plugin URI: https://wp-masters.com/products/wpm-modern-checkout
 * Description: Change your default Checkout to Modern process Checkout
 * Author: WP-Masters
 * Text Domain: wpm-modern-checkout
 * Author URI: https://wp-masters.com/
 * Version: 1.0.1
 *
 * @author      WP-Masters
 * @version     v.1.0.1 (12/08/22)
 * @copyright   Copyright (c) 2022
*/

define('WPM_MODERN_CHECKOUT_NAME', 'wpm_modern_checkout');
define('MODERN_CHECKOUT_DIR', plugin_dir_path(__FILE__));
define('PLUGIN_MODERN_CHECKOUT_PATH', plugins_url('', __FILE__));

class WPM_ModernCheckout
{
	private $settings;

	/**
	 * Initialize functions
	 */
	public function __construct()
	{
		// Init Functions
		add_action('init', [$this, 'save_settings']);
		add_action('init', [$this, 'load_settings']);
		add_action('wp_loaded', [$this, 'save_checkout_fields']);

		// Include Styles and Scripts
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts_and_styles' ] );

		// Check if WooCommerce is Activated
		if ( class_exists( 'WooCommerce' ) ) {
			// Frontend Functions
			add_action( 'template_include', [ $this, 'change_main_templates' ] );
			add_action( 'wp_head', [ $this, 'add_viewport_meta_tag' ] );

			// Checkout Forms
			add_filter( 'woocommerce_checkout_fields', [ $this, 'change_input_fields' ], 99 );
			add_filter( 'woocommerce_default_address_fields', [ $this, 'change_address_fields' ], 99 );

			// Include Styles and Scripts
			add_action( 'wp_enqueue_scripts', [ $this, 'include_scripts_and_styles' ], 99 );

			// Checkout Templates override
			add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );
			add_filter( 'woocommerce_locate_template', [ $this, 'change_default_templates_woocommerce' ], 99, 3 );
			add_filter( 'woocommerce_update_order_review_fragments', [ $this, 'refresh_checkout_fragments' ] );
		}

		// Admin menu
		add_action('admin_menu', [$this, 'register_menu']);
	}

	/**
	 * Save cart content
	 */
	public function save_checkout_fields()
	{
		if(isset($_POST['post_data'])) {

			// Get Form data from Checkout
			$form_data = explode('&', sanitize_text_field($_POST['post_data']));
			$filtered_data = [];

			// Prepare Array
			foreach($form_data as $value) {
				$sliced = explode('=', $value);
				$filtered_data[$sliced[0]] = $sliced[1];
			}

			if(is_user_logged_in()) {
				if(isset($filtered_data['billing-same-as-shipping'])) {
					update_user_meta(get_current_user_id(), 'billing-same-as-shipping', 'true');
				} else {
					update_user_meta(get_current_user_id(), 'billing-same-as-shipping', 'false');
				}
			}

			// Set Customer Billing Data
			WC()->customer->set_billing_first_name(isset($filtered_data['billing_first_name']) ? $filtered_data['billing_first_name'] : '');
			WC()->customer->set_billing_last_name(isset($filtered_data['billing_last_name']) ? $filtered_data['billing_last_name'] : '');
			WC()->customer->set_billing_company(isset($filtered_data['billing_company']) ? $filtered_data['billing_company'] : '');
			WC()->customer->set_billing_address_1(isset($filtered_data['billing_address_1']) ? $filtered_data['billing_address_1'] : '');
			WC()->customer->set_billing_address_2(isset($filtered_data['billing_address_2']) ? $filtered_data['billing_address_2'] : '');
			WC()->customer->set_billing_city(isset($filtered_data['billing_city']) ? $filtered_data['billing_city'] : '');
			WC()->customer->set_billing_postcode(isset($filtered_data['billing_postcode']) ? $filtered_data['billing_postcode'] : '');
			WC()->customer->set_billing_country(isset($filtered_data['billing_country']) ? $filtered_data['billing_country'] : '');
			WC()->customer->set_billing_state(isset($filtered_data['billing_state']) ? $filtered_data['billing_state'] : '');
			WC()->customer->set_billing_phone(isset($filtered_data['billing_phone']) ? $filtered_data['billing_phone'] : '');

			// Set Customer Shipping Data
			WC()->customer->set_shipping_first_name(isset($filtered_data['shipping_first_name']) ? $filtered_data['shipping_first_name'] : '');
			WC()->customer->set_shipping_last_name(isset($filtered_data['shipping_last_name']) ? $filtered_data['shipping_last_name'] : '');
			WC()->customer->set_shipping_company(isset($filtered_data['shipping_company']) ? $filtered_data['shipping_company'] : '');
			WC()->customer->set_shipping_address_1(isset($filtered_data['shipping_address_1']) ? $filtered_data['shipping_address_1'] : '');
			WC()->customer->set_shipping_address_2(isset($filtered_data['shipping_address_2']) ? $filtered_data['shipping_address_2'] : '');
			WC()->customer->set_shipping_city(isset($filtered_data['shipping_city']) ? $filtered_data['shipping_city'] : '');
			WC()->customer->set_shipping_postcode(isset($filtered_data['shipping_postcode']) ? $filtered_data['shipping_postcode'] : '');
			WC()->customer->set_shipping_country(isset($filtered_data['shipping_country']) ? $filtered_data['shipping_country'] : '');
			WC()->customer->set_shipping_state(isset($filtered_data['shipping_state']) ? $filtered_data['shipping_state'] : '');
		}
	}

	/**
	 * Save Core Settings to Option
	 */
	public function save_settings()
	{
		if(isset($_POST['wpm_modern_checkout']) && is_array($_POST['wpm_modern_checkout'])) {
			$data = $this->sanitize_array($_POST['wpm_modern_checkout']);

			update_option('wpm_modern_checkout', serialize($data));
		}
	}

	/**
	 * Sanitize Array Data
	 */
	public function sanitize_array($data)
	{
		$filtered = [];
		foreach($data as $key => $value) {
			if(is_array($value)) {
				foreach($value as $sub_key => $sub_value) {
					$filtered[$key][$sub_key] = sanitize_text_field($sub_value);
				}
			} else {
				$filtered[$key] = sanitize_text_field($value);
			}
		}

		return $filtered;
	}

	/**
	 * Load Saved Settings
	 */
	public function load_settings()
	{
		load_plugin_textdomain( 'wpm_modern_checkout', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

		$this->settings = unserialize(get_option('wpm_modern_checkout'));
	}

	/**
	 * Add Settings to Admin Menu
	 */
	public function register_menu()
	{
		add_menu_page('Checkout Settings', 'Checkout Settings', 'edit_others_posts', 'wpm_checkout_settings');
		add_submenu_page('wpm_checkout_settings', 'Checkout Settings', 'Checkout Settings', 'manage_options', 'wpm_checkout_settings', function ()
		{
			global $wp_version, $wpdb;

			// Get Saved Settings
			$settings = $this->settings;

			include 'templates/admin/settings.php';
		});
	}

	/**
	 * Add Viewport for adaptation Checkout
	 */
	public function add_viewport_meta_tag()
	{ ?>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php
	}

	/**
	 * Add to fragments new Content
	 */
	public function refresh_checkout_fragments($array)
	{
		ob_start();
		include(MODERN_CHECKOUT_DIR.'/templates/frontend/fragments/total_checkout.php');
		$template = ob_get_clean();

		$array['.total-checkout-data'] = $template;

		ob_start();
		include(MODERN_CHECKOUT_DIR.'/templates/frontend/fragments/select_shipping.php');
		$template = ob_get_clean();

		$array['#select-method-shipping'] = $template;

		return $array;
	}

	/**
	 * Change WooCommerce Templates
	 */
	public function change_default_templates_woocommerce($template, $template_name, $template_path)
	{
		global $woocommerce;

		$_template = $template;

		if(!$template_path)
			$template_path = $woocommerce->template_url;

		$plugin_path = MODERN_CHECKOUT_DIR .'/templates/woocommerce/';

		// Look within passed path within the theme - this is priority
		$template = locate_template(
			array(
				$template_path . $template_name,
				$template_name
			)
		);

		if(file_exists($plugin_path . $template_name))
			$template = $plugin_path . $template_name;

		if (!$template)
			$template = $_template;

		return $template;
	}

	/**
	 * Change Address Placeholders
	 */
	public function change_address_fields($fields)
	{
		$fields['address_1']['placeholder'] = 'Address';
		$fields['address_2']['placeholder'] = 'Apartment, suite, etc. (optional)';

		// Sort Priority
		$fields['first_name']['priority'] = 5;
		$fields['last_name']['priority'] = 10;
		$fields['address_1']['priority'] = 15;
		$fields['address_2']['priority'] = 20;
		$fields['city']['priority'] = 25;
		$fields['country']['priority'] = 30;
		$fields['state']['priority'] = 35;
		$fields['postcode']['priority'] = 40;
		$fields['phone']['priority'] = 45;

		return $fields;
	}

	/**
	 * Change Default Inputs
	 */
	public function change_input_fields($fields)
	{
		// Placeholders
		$fields['billing']['billing_first_name']['placeholder'] = 'First name';
		$fields['billing']['billing_last_name']['placeholder'] = 'Last name';
		$fields['billing']['billing_phone']['placeholder'] = 'Phone';
		$fields['billing']['billing_city']['placeholder'] = 'City';
		$fields['billing']['billing_state']['placeholder'] = 'State';
		$fields['billing']['billing_postcode']['placeholder'] = 'ZIP code';
		$fields['billing']['billing_address_1']['placeholder'] = 'Address';
		$fields['billing']['billing_address_2']['placeholder'] = 'Apartment, suite, etc. (optional)';

		$fields['shipping']['shipping_first_name']['placeholder'] = 'First name';
		$fields['shipping']['shipping_last_name']['placeholder'] = 'Last name';
		$fields['shipping']['shipping_phone']['placeholder'] = 'Phone';
		$fields['shipping']['shipping_city']['placeholder'] = 'City';
		$fields['shipping']['shipping_state']['placeholder'] = 'State';
		$fields['shipping']['shipping_postcode']['placeholder'] = 'ZIP code';
		$fields['shipping']['shipping_address_1']['placeholder'] = 'Address';
		$fields['shipping']['shipping_address_2']['placeholder'] = 'Apartment, suite, etc. (optional)';

		// Sort Priority
		$fields['billing']['billing_first_name']['priority'] = 5;
		$fields['billing']['billing_last_name']['priority'] = 10;
		$fields['billing']['billing_address_1']['priority'] = 15;
		$fields['billing']['billing_address_2']['priority'] = 20;
		$fields['billing']['billing_city']['priority'] = 25;
		$fields['billing']['billing_country']['priority'] = 30;
		$fields['billing']['billing_state']['priority'] = 35;
		$fields['billing']['billing_postcode']['priority'] = 40;
		$fields['billing']['billing_phone']['priority'] = 45;

		$fields['shipping']['shipping_first_name']['priority'] = 5;
		$fields['shipping']['shipping_last_name']['priority'] = 10;
		$fields['shipping']['shipping_address_1']['priority'] = 15;
		$fields['shipping']['shipping_address_2']['priority'] = 20;
		$fields['shipping']['shipping_city']['priority'] = 25;
		$fields['shipping']['shipping_country']['priority'] = 30;
		$fields['shipping']['shipping_state']['priority'] = 35;
		$fields['shipping']['shipping_postcode']['priority'] = 40;
		$fields['shipping']['shipping_phone']['priority'] = 45;

		return $fields;
	}

	/**
	 * Change Default Template on Manual
	 */
	public function change_main_templates($template)
	{
		if(home_url($_SERVER['REQUEST_URI']) == wc_get_checkout_url()) {
			$template = MODERN_CHECKOUT_DIR . '/templates/frontend/checkout.php';
		}

		return $template;
	}

	/**
	 * Include Scripts And Styles on Admin Pages
	 */
	public function admin_scripts_and_styles()
	{
		wp_enqueue_media();

		// Register styles
		wp_enqueue_style(WPM_MODERN_CHECKOUT_NAME.'-font-awesome', plugins_url('templates/libs/font-awesome/scripts/all.min.css', __FILE__));
		wp_enqueue_style(WPM_MODERN_CHECKOUT_NAME.'core-tips', plugins_url('templates/libs/tips/tips.css', __FILE__));
		wp_enqueue_style(WPM_MODERN_CHECKOUT_NAME.'-color-spectrum', plugins_url('templates/libs/color-spectrum/spectrum.css', __FILE__));
		wp_enqueue_style(WPM_MODERN_CHECKOUT_NAME.'-admin', plugins_url('templates/assets/css/admin.css', __FILE__));

		// Register Scripts
		wp_enqueue_script(WPM_MODERN_CHECKOUT_NAME.'-font-awesome', plugins_url('templates/libs/font-awesome/scripts/all.min.js', __FILE__));
		wp_enqueue_script(WPM_MODERN_CHECKOUT_NAME.'-tips', plugins_url('templates/libs/tips/tips.js', __FILE__));
		wp_enqueue_script(WPM_MODERN_CHECKOUT_NAME.'-color-spectrum', plugins_url('templates/libs/color-spectrum/spectrum.js', __FILE__));
		wp_enqueue_script(WPM_MODERN_CHECKOUT_NAME.'-admin', plugins_url('templates/assets/js/admin.js', __FILE__));
	}

	/**
	 * Include Scripts And Styles on FrontEnd
	 */
	public function include_scripts_and_styles()
	{
		wp_enqueue_style(WPM_MODERN_CHECKOUT_NAME.'-frontend', plugins_url('templates/assets/css/frontend.css', __FILE__) , false, '1.0.24', 'all');

		if(home_url($_SERVER['REQUEST_URI']) == wc_get_checkout_url()) {
			// Register styles
			wp_enqueue_style(WPM_MODERN_CHECKOUT_NAME.'-font-awesome', plugins_url('templates/libs/font-awesome/scripts/all.min.css', __FILE__));
			wp_enqueue_style(WPM_MODERN_CHECKOUT_NAME.'-style', plugins_url('templates/assets/css/checkout.css', __FILE__) , false, '1.0.24', 'all');

			// Register scripts
			wp_enqueue_script(WPM_MODERN_CHECKOUT_NAME.'-font-awesome', plugins_url('templates/libs/font-awesome/scripts/all.min.js', __FILE__) , array('jquery') , '1.0.10', 'all');
			wp_enqueue_script(WPM_MODERN_CHECKOUT_NAME.'-frontend', plugins_url('templates/assets/js/frontend.js', __FILE__) , array('jquery') , '1.0.24', 'all');
		}
	}
}

new WPM_ModernCheckout();