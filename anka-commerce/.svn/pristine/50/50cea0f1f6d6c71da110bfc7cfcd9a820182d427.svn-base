<?php
	/**
	 * Anka Commerce WooCommerce integration to handle WooCommerce features.
	 *
	 * @package Anka_Commerce
	 * @since 1.0.0
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	class Anka_Commerce_Woocommerce {

		/**
		 * Enqueue scripts and styles.
		 */
		public static function anka_commerce_woocommerce_enqueue_scripts() {
			if ( is_checkout() ) {
				wp_enqueue_style(
					'ankapay-woocommerce-style',
					esc_url( ANKA_COMMERCE_PLUGIN_URL . 'assets/css/woocommerce-style.css' ),
					array(),
					ANKA_COMMERCE_VERSION
				);
			}
		}

		/**
		 * Plugin includes.
		 */
		public static function anka_commerce_woocommerce_includes() {
			if ( class_exists( 'WC_Payment_Gateway' ) ) {
				require_once ANKA_COMMERCE_PLUGIN_DIR . 'includes/woocommerce/class-anka-commerce-woocommerce-gateway-anka-pay.php';
			}
		}

		/**
		 * Add ANKA Pay gateway to the list of available gateways.
		 *
		 * @param array $gateways
		 * @return array
		 */
		public static function anka_commerce_woocommerce_add_gateway( $gateways ) {
			$gateways[] = 'Anka_Commerce_Woocommerce_Gateway_Anka_Pay';
			return $gateways;
		}

		/**
		 * Registers WooCommerce Blocks integration.
		 */
		public static function anka_commerce_woocommerce_gateway_block_support() {
			if ( class_exists( 'Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType' ) ) {
				require_once ANKA_COMMERCE_PLUGIN_DIR . 'includes/woocommerce/class-anka-commerce-woocommerce-gateway-anka-pay-blocks-support.php';
				add_action(
					'woocommerce_blocks_payment_method_type_registration',
					function( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
						$payment_method_registry->register( new Anka_Commerce_Woocommerce_Gateway_Anka_Pay_Blocks_Support() );
					}
				);
			}
		}

		/**
		 * Declare compatibility with WooCommerce Blocks.
		 */
		public static function anka_commerce_woocommerce_cart_checkout_blocks_compatibility() {
			if ( class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
				\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility(
					'cart_checkout_blocks',
					__FILE__,
					true
				);
			}
		}

		/**
		 * Handle direct checkout redirection.
		 */
		public static function anka_commerce_woocommerce_direct_checkout_redirection() {
			$settings = get_option('woocommerce_ankapay_settings', array());
			$direct_checkout_enabled = isset($settings['direct_checkout']) ? $settings['direct_checkout'] : 'no';

			if (is_checkout() && 'yes' === $direct_checkout_enabled) {
				if ( isset($_GET['wc-quick-buy-now']) ) {
					$product_id = (int) sanitize_text_field($_GET['wc-quick-buy-now']);
					$quantity = isset($_GET['quantity']) ? (int) sanitize_text_field($_GET['quantity']) : 1;

					WC()->cart->add_to_cart($product_id, $quantity);
				}

				if (WC()->cart->is_empty()) {
					wc_add_notice(__('Your cart is empty.', 'anka-commerce'), 'error');
					wp_redirect(wc_get_cart_url());
					exit;
				}

				$order_id = self::anka_commerce_woocommerce_create_wc_order();
				if (!$order_id) {
					wc_add_notice(__('Unable to create order.', 'anka-commerce'), 'error');
					wp_redirect(wc_get_cart_url());
					exit;
				}

				$response = self::anka_commerce_woocommerce_create_payment_link($order_id);

				if ($response['success'] == true && $response['redirect_url']) {
					wp_redirect( esc_url_raw( $response['redirect_url'] ) );
					exit;
				} else {
					wc_add_notice(__('Unable to create payment link with ANKA Pay.', 'anka-commerce'), 'error');

					$order = wc_get_order($order_id);
					$order->update_status('failed', __('ANKA Pay payment link creation failed', 'anka-commerce'));

					if ( isset( $response['errors'] ) && ! empty( $response['errors'] ) ) {
						$order->add_order_note(
							sprintf(
								/* translators: %s: error message */
								__( 'ANKA Pay API Error: %s', 'anka-commerce' ),
								$response['errors']
							)
						);

						$order->save();
					}

					wp_redirect(wc_get_cart_url());
					exit;
				}
			}
		}

		/**
		 * Create ANKA Pay payment link for WooCommerce order.
		 *
		 * @param int $order_id
		 * @return string
		 */
		public static function anka_commerce_woocommerce_create_payment_link($order_id) {
			$order = wc_get_order($order_id);
			$data = self::anka_commerce_woocommerce_build_payment_link_data($order);

			$ankapay_api = new Anka_Pay_API(get_option('woocommerce_ankapay_settings')['api_token']);
			$response = $ankapay_api->create_payment_link($data);

			if ( $response['success'] == true ) {
				$order->update_status('pending', __('Awaiting ANKA Pay payment', 'anka-commerce'));
				WC()->cart->empty_cart();
			}

			return $response;
		}

    /**
     * Register the REST API route to get payment method icon
     */
    public static function anka_commerce_woocommerce_register_rest_api_route() {
      register_rest_route(
        'anka-commerce/v1',
        '/woocommerce/get-icon-url',
        array(
          'methods' => WP_REST_Server::READABLE,
          'callback' => array('Anka_Commerce_Woocommerce', 'anka_commerce_woocommerce_get_icon_url'),
        	'permission_callback' => '__return_true'
        )
      );
    }

		/**
		 * Get icon URL based on the location of the user.
		 *
		 * @return string
		 */
		public static function anka_commerce_woocommerce_get_icon_url() {
			$ip_address = self::anka_commerce_woocommerce_get_user_ip();

			$country = self::anka_commerce_woocommerce_get_country_from_ip($ip_address);

			switch ($country) {
				case 'NG': // Nigeria
					return ANKA_COMMERCE_PLUGIN_URL . 'assets/img/anka-pay-ng.png';
				case 'CI': // Ivory Coast
					return ANKA_COMMERCE_PLUGIN_URL . 'assets/img/anka-pay-ci.png';
				case 'BF': // Burkina Faso
					return ANKA_COMMERCE_PLUGIN_URL . 'assets/img/anka-pay-bf.png';
				case 'CM': // Cameroon
					return ANKA_COMMERCE_PLUGIN_URL . 'assets/img/anka-pay-cm.png';
				case 'SN': // Senegal
					return ANKA_COMMERCE_PLUGIN_URL . 'assets/img/anka-pay-sn.png';
				case 'GH': // Ghana
					return ANKA_COMMERCE_PLUGIN_URL . 'assets/img/anka-pay-gh.png';
				default:
					return ANKA_COMMERCE_PLUGIN_URL . 'assets/img/anka-pay-global.png';
			}
		}

		/**
		 * Add settings link on plugin page.
		 *
		 * @param array $links
		 * @return array
		 */
		public static function anka_commerce_woocommerce_settings_link($links) {
			$settings_link = '<a href="' . esc_url(admin_url('admin.php?page=wc-settings&tab=checkout&section=ankapay')) . '">' . esc_html__('WooCommerce settings', 'anka-commerce') . '</a>';
			array_unshift($links, $settings_link);
			return $links;
		}

		/**
		 * Create WooCommerce order.
		 *
		 * @return int
		 */
		private static function anka_commerce_woocommerce_create_wc_order() {
			$order = wc_create_order();
			foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
				$product_id = $cart_item['product_id'];
				$quantity = $cart_item['quantity'];
				$order->add_product(wc_get_product($product_id), $quantity);
			}

			$order->calculate_totals();
			$order->set_status('pending');
			$order->save();

			return $order->get_id();
		}

		/**
		 * Build payment link data for ANKA Pay API.
		 *
		 * @param WC_Order $order
		 * @return array
		 */
		private static function anka_commerce_woocommerce_build_payment_link_data($order) {
			$products = $order->get_items();

			$shippable = self::anka_commerce_woocommerce_is_product_shippable($products);

			if ($shippable) {
				$buyer = array(
					'fullname' => sanitize_text_field($order->get_shipping_first_name()) . ' ' . sanitize_text_field($order->get_shipping_last_name()),
					'email' => sanitize_text_field($order->get_billing_email()),
					'phone_number' => sanitize_text_field($order->get_billing_phone()),
					'street_line_1' => sanitize_text_field($order->get_shipping_address_1()),
					'street_line_2' => sanitize_text_field($order->get_shipping_address_2()),
					'city' => sanitize_text_field($order->get_shipping_city()),
					'zip' => sanitize_text_field($order->get_shipping_postcode()),
					'country_id' => sanitize_text_field($order->get_shipping_country()),
					'state' => sanitize_text_field($order->get_shipping_state())
				);
			} else {
				$buyer = array(
					'fullname' => sanitize_text_field($order->get_billing_first_name()) . ' ' . sanitize_text_field($order->get_billing_last_name()),
					'email' => sanitize_text_field($order->get_billing_email()),
					'phone_number' => sanitize_text_field($order->get_billing_phone()),
					'street_line_1' => sanitize_text_field($order->get_billing_address_1()),
					'street_line_2' => sanitize_text_field($order->get_billing_address_2()),
					'city' => sanitize_text_field($order->get_billing_city()),
					'zip' => sanitize_text_field($order->get_billing_postcode()),
					'country_id' => sanitize_text_field($order->get_billing_country()),
					'state' => sanitize_text_field($order->get_billing_state())
				);
			}

			$payload = array(
				'type' => 'payment_links',
				'attributes' => array(
					'title' => 'Order #' . $order->get_id(),
					'description' => self::anka_commerce_woocommerce_payment_link_description($products),
					'amount_cents' => self::anka_commerce_woocommerce_amount_in_cents($order),
					'amount_currency' => get_woocommerce_currency(),
					'shippable' => $shippable,
					'reusable' => false,
					'callback_url' => esc_url($order->get_checkout_order_received_url()),
					'order_reference' => strval($order->get_id()),
					'source' => 'wordpress'
				)
			);

			if ($buyer['fullname'] !== '' && $buyer['email'] !== '' && $buyer['phone_number'] !== '' && $buyer['street_line_1'] !== '' && $buyer['city'] !== '' && $buyer['zip'] !== '' && $buyer['country_id'] !== '') {
				$payload['attributes']['buyer'] = array(
					'contact' => array(
						'fullname' => $buyer['fullname'],
						'email' => $buyer['email'],
						'phone_number' => $buyer['phone_number']
					),
					'address' => array(
						'street_line_1' => $buyer['street_line_1'],
						'street_line_2' => $buyer['street_line_2'],
						'city' => $buyer['city'],
						'state' => $buyer['state'],
						'zip' => $buyer['zip'],
						'country' => $buyer['country_id']
					)
				);
			}

			return $payload;
		}

		/**
		 * Get user IP address.
		 *
		 * @return string
		 */
		private static function anka_commerce_woocommerce_get_user_ip() {
			foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key)
			{
				if (array_key_exists($key, $_SERVER) === true)
				{
					foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip)
					{
						if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false)
						{
							return $ip;
						}
					}
				}
			}
		}

		/**
		 * Get country from IP address.
		 *
		 * @param string $ip_address
		 * @return string
		 */
		private static function anka_commerce_woocommerce_get_country_from_ip($ip_address) {
			$response = wp_remote_get("https://ipapi.co/{$ip_address}/json/");

			if (is_wp_error($response)) {
				return 'default';
			}

			$body = wp_remote_retrieve_body($response);
			$data = json_decode($body);

			return $data->country ?? 'default';
		}

		private static function anka_commerce_woocommerce_is_product_shippable( $products ) {
			foreach ( $products as $product ) {
				$product = wc_get_product( $product->get_product_id() );
				if ( !$product->is_virtual() && !$product->is_downloadable() ) {
					return true;
				}
			}

			return false;
		}

		/**
		 * Get payment link description from WooCommerce selected products.
		 *
		 * If the description is longer than 250 characters, it will be truncated.
		 *
		 * @param array $products
		 * @return string
		 */
		private static function anka_commerce_woocommerce_payment_link_description( $products ) {
			$product_details = array();
			foreach ( $products as $product ) {
				$product_name = sanitize_text_field( $product->get_name() );
				$product_quantity = (int) $product->get_quantity();
				$product_details[] = $product_name . ' x ' . $product_quantity;
			}

			$description = implode( ', ', $product_details );

			return substr($description, 0, 250);
		}

		/**
		 * Convert WooCommerce order total to cents.
		 *
		 * @param WC_Order $order
		 * @return int
		 */
		private static function anka_commerce_woocommerce_amount_in_cents( $order ) {
			$currency = get_woocommerce_currency();
			$cent_multiplier = in_array( $currency, Anka_Pay_API::CENTLESS_CURRENCIES ) ? 1 : 100;
			return intval( $order->get_total() * $cent_multiplier );
		}
	}
?>
