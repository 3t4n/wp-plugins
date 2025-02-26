<?php

class DyDo_Woocommerce
{

	public function __construct()
	{
		$this->features();
		if (dydo_is_woocommerce_activated()) {
			$this->define_hooks();
			$this->enqueues();
			$this->load();
		}
	}

	public function features()
	{
		// Activate and Deactivate
		add_action('dydo_activate', array($this, 'activate'));
		add_action('dydo_deactivate', array($this, 'deactivate'));
	}

	public function define_hooks()
	{
		add_action('init', array($this, 'wc_register_endpoint'));
		add_filter('query_vars', array($this, 'wc_add_query_vars'), 0);
		add_filter('woocommerce_account_menu_items', array($this, 'wc_my_account_link'));
		add_action('woocommerce_account_your-donations_endpoint', array($this, 'wc_my_account_endpoint_content'));
		$payment_gateway = isset(dydo_get_options_array()['payment']['payment_gateway'])?dydo_get_options_array()['payment']['payment_gateway']:'stripe';
		if ( $payment_gateway === 'woocommerce') {
			add_action('woocommerce_before_calculate_totals', array($this, 'wc_before_calculate_totals'));
			add_action('woocommerce_cart_item_removed', array($this, 'wc_remove_cart_item'), 10, 2);
			add_filter('woocommerce_cart_item_permalink', array($this, 'wc_cart_item_permalink'), 10, 3);
			add_action('woocommerce_order_status_completed', array($this, 'wc_save_donation_payment_from_order'));
			add_action('woocommerce_checkout_order_processed', array($this, 'wc_save_donation_payment_from_order'));

			add_filter('dydo_send_global_settings_to_app', array($this, 'add_global_settings_to_app'));

			// Ajax
			add_action('wp_ajax_nopriv_wc_add_donation', array($this, 'wc_add_donation_by_ajax'));
			add_action('wp_ajax_wc_add_donation', array($this, 'wc_add_donation_by_ajax'));
		}
	}

	public function enqueues()
	{
		wp_enqueue_script('dydo-public-wc', DYDO_INCLUDES_URI . '/woocommerce/static/js/wc.js', array('jquery'));
		wp_localize_script(
			'dydo-public-wc',
			'dydo_wc_ajax',
			array(
				'ajax_url' => admin_url('admin-ajax.php'),
			)
		);
	}

	public function load()
	{
		require_once DYDO_INCLUDES_PATH . '/woocommerce/functions.php';
	}

	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function add_global_settings_to_app($data)
	{
		$data['product_id'] = (int) dydo_get_options_array()['donations']['product_id'];

		return $data;
	}

	/**
	 * Add Your Donation Tab to My Account page
	 *
	 * @param $menu_links
	 *
	 * @return array|string[]
	 */
	public function wc_my_account_link($menu_links)
	{
		$menu_links = array_slice($menu_links, 0, 5, true)
			+ array('your-donations' => 'Your Donations')
			+ array_slice($menu_links, 5, null, true);

		return $menu_links;
	}

	/**
	 * @param $vars
	 *
	 * @return mixed
	 */
	function wc_add_query_vars($vars)
	{
		$vars[] = 'your-donations';

		return $vars;
	}

	public function wc_register_endpoint()
	{
		add_rewrite_endpoint('your-donations', EP_ROOT | EP_PAGES);
	}

	public function wc_my_account_endpoint_content()
	{
		echo do_shortcode('[dydo_your_donations]');
	}

	/**
	 * Save donation payment from order
	 *
	 * @param $order_id
	 */
	public function wc_save_donation_payment_from_order($order_id)
	{
		$order      = wc_get_order($order_id);
		$product_id = dydo_get_options_array()['donations']['product_id'];
		$item       = $order->get_item($product_id);

		$donation = dydo_get_donation(
			DYDO_ONETIME_DONATION_TABLENAME,
			array(
				'key'   => 'transaction_id',
				'value' => $order->get_id(),
			)
		);

		if (!$donation) {
			if (($item && !empty($order->get_data()['transaction_id'])) || ($item && $order->get_status() === 'completed')) {
				dydo_save_donation(
					DYDO_ONETIME_DONATION_TABLENAME,
					array(
						'user_id'          => $order->get_customer_id(),
						'customer_id'      => $order->get_customer_id(),
						'transaction_id'   => $order->get_id(),
						'dydo_gateways_id' => 1,
						'amount'           => (float) $item->get_data()['total'],
						'currency'         => strtoupper(trim($order->get_currency())),
						'created_at'       => wp_date('Y-m-d H:i:s'),
						'updated_at'       => wp_date('Y-m-d H:i:s'),
					)
				);
			}
		}
	}

	/**
	 * WC Cart
	 *
	 * @param $cart_obj
	 */
	public function wc_before_calculate_totals($cart_obj)
	{
		$donation_product_id = dydo_get_options_array()['donations']['product_id'];

		if (is_admin() && !defined('DOING_AJAX')) {
			return;
		}

		foreach ($cart_obj->get_cart() as $key => $value) {
			if (isset($_COOKIE['dydo_donation_amount']) && $value['data']->get_id() == $donation_product_id) {
				$value['data']->set_price(sanitize_text_field($_COOKIE['dydo_donation_amount']));
			}
		}
	}

	/**
	 * @param $cart_item_key
	 * @param $cart
	 */
	public function wc_remove_cart_item($cart_item_key, $cart)
	{
		$line_item           = $cart->removed_cart_contents[$cart_item_key];
		$product_id          = $line_item['product_id'];
		$donation_product_id = dydo_get_options_array()['donations']['product_id'];

		if ($product_id == $donation_product_id) {
			unset($_COOKIE['dydo_donation_amount']);
			setcookie('dydo_donation_amount', null, time() - 3600, '/');
		}
	}

	/**
	 * @param $product_get_permalink_cart_item
	 * @param $cart_item
	 *
	 * @return mixed|string
	 */
	public function wc_cart_item_permalink($product_get_permalink_cart_item, $cart_item)
	{
		if ($cart_item['product_id'] == dydo_get_options_array()['donations']['product_id']) {
			return '';
		} else {
			return $product_get_permalink_cart_item;
		}
	}

	/**
	 * Ajax
	 *
	 * @throws Exception
	 */
	public function wc_add_donation_by_ajax()
	{
		$response  = array();
		$amount     = sanitize_text_field($_POST['amount']);
		$product_id =  sanitize_text_field($_POST['pid']);

		if (!empty($amount) && $amount >= 1) {
			$this->wc_add_donation_product_to_cart($product_id);
			$response['url_woo_cart'] = wc_get_cart_url();
			$response['amount']       = $amount;
			$response['redirect']     = true;
		} else {
			$response['msg']      = 'Please enter a valid value !!';
			$response['redirect'] = false;
		}

		wp_send_json_success($response);
		die();
	}

	/**
	 * Add donation product to cart
	 *
	 * @param $id
	 *
	 * @throws Exception
	 */
	private function wc_add_donation_product_to_cart($id)
	{
		$found = false;

		if (sizeof(WC()->cart->get_cart()) > 0) {

			foreach (WC()->cart->get_cart() as $cart_item_key => $values) {
				$_product = $values['data'];

				if ($_product->get_id() == $id) {
					$found = true;
					WC()->cart->remove_cart_item($cart_item_key);
					WC()->cart->add_to_cart($id);
				}
			}

			if (!$found) {
				WC()->cart->add_to_cart($id);
			}
		} else {
			WC()->cart->add_to_cart($id);
		}
	}

	/**
	 * Activate and Deactivate
	 */
	public function activate()
	{
		$this->add_product_dontion();

		add_rewrite_endpoint('your-donations', EP_ROOT | EP_PAGES);
		flush_rewrite_rules();
	}

	/**
	 *
	 */
	public function deactivate()
	{
		flush_rewrite_rules();
	}

	/**
	 *
	 */
	private function add_product_dontion()
	{
		$product = get_page_by_path('donation', OBJECT, 'product');

		if (empty($product)) {
			$post_id = wp_insert_post(
				array(
					'post_title'  => 'Donation',
					'post_status' => 'publish',
					'post_type'   => 'product',
				)
			);

			wp_set_object_terms($post_id, 'simple', 'product_type');
			update_post_meta($post_id, '_visibility', 'visible');
			update_post_meta($post_id, '_stock_status', 'instock');
			update_post_meta($post_id, '_stock_status', 'instock');
			update_post_meta($post_id, '_sold_individually', 'yes');
			update_post_meta($post_id, '_price', '0');
			dydo_save_options_array($post_id, 'donations', 'product_id');
		}
	}
}
