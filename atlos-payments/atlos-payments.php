<?php
/**
@wordpress-plugin
 * Plugin Name:       ATLOS Crypto Payments for WooCommerce
 * Plugin URI:        https://atlos.io/accept-crypto-woocommerce
 * Description:       Accept crypto payments with recurring payments/subscription billing support. No KYC or paperwork required. Receive funds directly to your wallet.
 * Version:           2.0.0
 * WC requires at least: 6.0
 * WC tested up to:   6.6.2
 * Author:            ATLOS
 * Author URI:        https://atlos.io/
 * Text Domain:       atlos-payments
 * Domain Path:       /languages
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Requires Plugins: woocommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

define( 'ATLOS_APP', 'https://atlos.io/packages/app/atlos.js' );
define( 'ATLOS_API', 'https://atlos.io/api/' );
/**
 * Atlos Privacy Policy & Terms page.
 * https://atlos.io/terms
 * https://atlos.io/privacy
 */


/*
 * Called when the plugin is added
 */
register_activation_hook( __FILE__, 'atlos_activate' );
function atlos_activate() {
	// Nothing to activate
}

/*
 * Called when the plugin is deactivated
 */
register_deactivation_hook( __FILE__, 'atlos_deactivate' );
function atlos_deactivate() {
	// Nothing to deactivate
}

/*
 * Called when the plugin is removed
 */
register_uninstall_hook( __FILE__, 'atlos_remove' );
function atlos_remove() {
	// Remove settings
	delete_option( 'woocommerce_atlos-payments_settings' );
}

/*
 * Adds the Settings link to the Plugins List screen
 */
add_filter( 'plugin_action_links_atlos-payments/atlos-payments.php', 'atlos_settings_link' );
function atlos_settings_link( $links ) {
	$url           = esc_url( add_query_arg( 'page', 'wc-settings&tab=checkout&section=atlos-payments', get_admin_url() . 'admin.php' ) );
	$settings_link = "<a href='$url'>" . esc_html__( 'Settings', 'atlos-payments' ) . '</a>';
	array_push( $links, $settings_link );
	return $links;
}

/*
 * Declare compability with woocommerce HPOS.
 */
add_action(
	'before_woocommerce_init',
	function () {
		if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
		}
	}
);


/*
 * Register Atlos as WooCommerce payment gateway
 */
add_filter( 'woocommerce_payment_gateways', 'atlos_gateway_class' );
function atlos_gateway_class( $gateways ) {
	$gateways[] = 'Atlos_Payments_Gateway';
	return $gateways;
}

/*
 * Creates Atlos gateway
 */
add_action( 'plugins_loaded', 'atlos_init_gateway_class' );
function atlos_init_gateway_class() {

	// Declare Atlos_Payments_Gateway class
	class Atlos_Payments_Gateway extends WC_Payment_Gateway {
		/**
		 * Constructor
		 */
		public function __construct() {
			$this->id           = 'atlos-payments'; // payment gateway plugin ID
			$this->has_fields   = false; // used for custom payment fields on the checkout page
			$this->method_title = esc_html__( 'ATLOS Crypto Payments', 'atlos-payments' );
			// This will be displayed on the options page
			$this->method_description = esc_html__( 'Accept crypto payments with recurring payments/subscription billing support. No KYC or paperwork required. Receive funds directly to your wallet.', 'atlos-payments' );

			// Support products and subscriptions
			$this->supports = array(
				'products',
				'subscriptions',
				'yith_subscription',
				'yith_subscriptions',
				'yith_subscription_pause',
				'yith_subscription_pay_method_customer',
				'yith_subscriptions_multiple',
				'yith_subscriptions_scheduling',
				'yith_subscriptions_pause',
				'yith_subscriptions_payment_date',
				'yith_subscriptions_recurring_amount',
				'ywsbs_subscription',
				'_ywsbs_subscription',
			);

			// Initialize gateway settigns
			$this->init_form_fields();

			// Load gateway settigns
			$this->init_settings();
			$this->title       = esc_html__( 'Pay with Crypto (ATLOS)', 'atlos-payments' );
			$this->description = esc_html__( 'Pay with BTC, ETH, BNB, MATIC, USDC, USDT, DAI, and other popular cryptocurrencies', 'atlos-payments' );
			$this->enabled     = $this->get_option( 'enabled' );    // need this
			$this->merchant_id = $this->get_option( 'merchant_id' );
			$this->api_secret  = $this->get_option( 'api_secret' );
			$this->theme       = $this->get_option( 'theme' );

			// Create action hooks and filters
			add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );

			add_filter( 'woocommerce_endpoint_order-received_title', array( $this, 'atlos_change_thankyou_title' ) );
			add_filter( 'woocommerce_thankyou_order_received_text', array( $this, 'atlos_change_thankyou_subtitle' ), 20, 2 );
			add_action( 'woocommerce_api_atlos-payments', array( $this, 'atlos_webhook' ) );
		}

		/**
		 * Defines gateway options
		 */
		public function init_form_fields() {
			$this->form_fields = array(
				'enabled'     => array(
					'title'   => esc_html__( 'Enable/disable', 'atlos-payments' ),
					'label'   => esc_html__( 'Enable ATLOS Crypto Payment Gateway', 'atlos-payments' ),
					'type'    => 'checkbox',
					'default' => 'no',
				),
				'merchant_id' => array(
					'title'       => esc_html__( 'Merchant ID', 'atlos-payments' ),
					'type'        => 'text',
					/* translators: %s: Merchants sign up link. */
					'description' => sprintf( esc_html__( 'Your ATLOS merchant ID from %s', 'atlos-payments' ), '<a href="https://merchants.atlos.io/signup" target="_blank">merchants.atlos.io</a>' ),
				),
				'api_secret'  => array(
					'title'       => esc_html__( 'API secret', 'atlos-payments' ),
					'type'        => 'text',
					'description' => esc_html__( 'ATLOS.io > Merchant Login > Settings > API Secret', 'atlos-payments' ),
				),
				'theme'       => array(
					'title'       => esc_html__( 'Color theme', 'atlos-payments' ),
					'type'        => 'select',
					'options'     => array(
						'light' => 'Light',
						'dark'  => 'Dark',
					),
					'description' => esc_html__( 'Choose one', 'atlos-payments' ),
				),
			);
		}

		/**
		 * Validates gateway options
		 */
		public function validate_api_secret_field( $key, $value ) {
			$post_data   = $this->get_post_data();
			$merchant_id = strval( sanitize_text_field( $post_data['woocommerce_atlos-payments_merchant_id'] ) );
			$api_secret  = $value;

			$validation_error = $this->atlos_check_merchant_id_api_secret( $merchant_id, $api_secret );
			if ( $validation_error != null ) {
				WC_Admin_Settings::add_error( $validation_error );
			}

			return $value;
		}

		/**
		 * Called when the Submit button on the checkout page is clicked
		 */
		public function process_payment( $order_id ) {
			global $woocommerce;

			if ( empty( $this->merchant_id ) ) {
				wc_add_notice( esc_html__( 'ATLOS Payment Gateway has not been set up yet.', 'atlos-payments' ), 'error' );
				return;
			}

			$order = wc_get_order( $order_id );
			if ( ! $order ) {
				return;
			}

			$woocommerce->cart->empty_cart();

			return array(
				'result'   => 'success',
				'redirect' => $this->get_return_url( $order ),
			);
		}

		/**
		 * Modifies the thank you page title
		 */
		function atlos_change_thankyou_title( $old_title ) {
			if ( isset( $_GET['key'] ) && ! empty( $_GET['key'] ) ) {
				$order_id = wc_get_order_id_by_order_key( sanitize_text_field( wp_unslash( $_GET['key'] ) ) );
				$order    = wc_get_order( $order_id );
				if ( ! $order || $order->get_status() != 'pending' || $order->get_payment_method() != 'atlos-payments' ) {
					return $old_title;
				}
			}

			return esc_html__( 'Complete Payment', 'atlos-payments' );
		}

		/**
		 * Modifies the thank you page subtitle
		 */
		function atlos_change_thankyou_subtitle( $old_subtitle, $order ) {
			if ( ! $order || $order->get_status() != 'pending' || $order->get_payment_method() != 'atlos-payments' ) {
				return $old_subtitle;
			}

			return esc_html__( 'Your order is pending payment', 'atlos-payments' );
		}

		/**
		 * Adds the thank you page scripts
		 */
		function atlos_add_scripts( $order ) {
			$recurrence   = $this->atlos_get_recurrence( $order );
			$first_name   = $order->get_billing_first_name();
			$last_name    = $order->get_billing_last_name();
			$user_name    = $first_name . ' ' . $last_name;
			$user_email   = $order->get_billing_email();
			$postback_url = get_home_url( null, '/index.php/wc-api/atlos-payments/' );
			$order_id     = $order->get_id();
			$total        = $order->get_total();
			$currency     = $order->get_currency();

			wp_enqueue_script( 'atlos_widget', ATLOS_APP, null, null, true );
			wp_register_script( 'atlos_payments', plugins_url( 'atlos-payments.js', __FILE__ ) );
			wp_enqueue_script( 'atlos_payments', null, array( 'atlos_widget' ), null, true );
			$atlos_payments_vars = array(
				'atlosOrderId'     => $order_id,
				'atlosMerchantId'  => $this->merchant_id,
				'atlosTheme'       => $this->theme,
				'atlosAmount'      => $total,
				'atlosCurrency'    => $currency,
				'atlosRecurrence'  => $recurrence,
				'atlosUserName'    => $user_name,
				'atlosUserEmail'   => $user_email,
				'atlosPostbackUrl' => $postback_url,
			);
			wp_localize_script( 'atlos_payments', 'atlos_payments_vars', $atlos_payments_vars );
		}

		/**
		 * Determines order recurrence
		 *
		 * For now, only supports subscriptions by YITH WooCommerce Subscription.
		 * Also, for now, only allow all products in the cart with the same recurrence. If mixed recurrence, then default to a single payment.
		 */
		function atlos_get_recurrence( $order ) {
			$order_items = $order->get_items();

			$recurrence = -1; // not set

			foreach ( $order_items as $key => $order_item ) {
				$product       = $order_item->get_product();
				$item_subtotal = $order_item->get_subtotal();

				$subscription_info = wc_get_order_item_meta( $key, '_subscription_info', true );

				if ( empty( $subscription_info ) ) {
					// If at least one product has no recurrence make it a one-time payment
					$recurrence = 0;
				} else {
					$price_is_per      = $product->get_meta( '_ywsbs_price_is_per' );
					$price_time_option = $product->get_meta( '_ywsbs_price_time_option' );
					$max_length        = $product->get_meta( '_ywsbs_max_length' );

					// Supported intervals are daily, weekly, monthly, annually
					$rec_curr = 0;
					if ( $price_is_per == 1 && $price_time_option == 'days' ) {
						$rec_curr = 1;
					} elseif ( $price_is_per == 7 && $price_time_option == 'days' ) {
						$rec_curr = 2;
					} elseif ( $price_is_per == 1 && $price_time_option == 'months' ) {
						$rec_curr = 3;
					} elseif ( $price_is_per == 12 && $price_time_option == 'months' ) {
						$rec_curr = 4;
					} else {
						$recurrence = 0;
					}

					// If the same recurrence or not set, then keep it
					if ( $recurrence == -1 || $recurrence == $rec_curr ) {
						$recurrence = $rec_curr;
					}
				}
			}

			return $recurrence;
		}

		/**
		 * Called by Atlos on successful payment
		 */
		public function atlos_webhook() {
			$post = $this->recursive_sanitize_text_field( $_POST ); // post array recursive sanitized. This is required for us to log the post data.
			update_option( 'atlos_webhook_debug', $post );

			$contents  = file_get_contents( 'php://input' );
			$contents  = $this->recursive_sanitize_text_field( $contents ); // contents array/string recursive sanitized. This is required for us to check payload.
			$signature = '';
			if ( isset( $_SERVER['HTTP_SIGNATURE'] ) && ! empty( $_SERVER['HTTP_SIGNATURE'] ) ) {
				$signature = wp_unslash( sanitize_text_field( $_SERVER['HTTP_SIGNATURE'] ) );
			}
			$api_secret = $this->api_secret;

			// Check payload signature

			$signature_is_valid = $this->atlos_check_signature( $contents, $signature, $api_secret );
			if ( ! $signature_is_valid ) {
				return;
			}

			$data = json_decode( $contents, true );

			$status = sanitize_text_field( $data['Status'] );
			if ( $status != 100 ) {
				return;   // it's always 100
			}

			$order_id = intval( sanitize_text_field( $data['OrderId'] ) );
			$order    = wc_get_order( $order_id );
			if ( ! $order ) {
				return;
			}

			// Mark the payment as completed and decrement stock
			$order->payment_complete();
			$order->reduce_order_stock();
			$return = array(
				'message' => 'Payment successful',
				'ID'      => $order_id,
			);
			wp_send_json( $return );
			die;
		}

		/**
		 * Check Atlos postback signature
		 *
		 * @param string $payload The payload to check.
		 * @param string $signature The signature to validate.
		 * @param string $secret The secret key for validation.
		 */
		public function atlos_check_signature( $payload, $signature, $secret ) {
			if ( empty( $payload ) || empty( $signature ) || empty( $secret ) ) {
				return false;
			}
			$computed_hash = $this->atlos_compute_hash( $secret, $payload );
			return hash_equals( $signature, $computed_hash );
		}

		/**
		 * Compute base64 hash with secret
		 *
		 * @param string $secret The secret key for validation.
		 * @param string $payload The payload to hash.
		 */
		public function atlos_compute_hash( $secret, $payload ) {
			$secret     = mb_convert_encoding( $secret, 'UTF-8' );
			$hexHash    = hash_hmac( 'sha256', $payload, $secret );
			$base64Hash = base64_encode( hex2bin( $hexHash ) );
			return $base64Hash;
		}

		/**
		 * Checks that the merchant ID/API secret combo is correct
		 */
		public function atlos_check_merchant_id_api_secret( $merchant_id, $api_secret ) {
			if ( strlen( $merchant_id ) != 10 ) {
				return esc_html__( 'Merchant ID must be 10 characters long', 'atlos-payments' );
			}
			if ( strlen( $api_secret ) != 32 ) {
				return esc_html__( 'API secret must be 32 characters long', 'atlos-payments' );
			}

			// Check if a valid merchantID/apiSecret combo
			$data['MerchantId'] = $merchant_id;
			$content            = wp_json_encode( $data );

			$args = array(
				'body'        => $content,
				'headers'     => array(
					'Content-Type' => 'application/json',
					'ApiSecret'    => $api_secret,
				),
				'timeout'     => 60,
				'redirection' => 5,
				'blocking'    => true,

			);
			$response = wp_remote_post( ATLOS_API . 'merchant/CheckMerchantId', $args );

			if ( is_wp_error( $response ) ) {
				$error_message = $response->get_error_message();
				return sprintf( esc_html__( 'Could not connect to ATLOS %s', 'atlos-payments' ), esc_html( $error_message ) );
			}

			$result = json_decode( wp_remote_retrieve_body( $response ), true );
			if ( ! $result['MerchantIdExists'] ) {
				return esc_html__( 'Invalid merchant ID/API secret combo. Get it at https://atlos.io.', 'atlos-payments' );
			}

			return null;
		}

		/**
		 * Recursive sanitation for an array
		 *
		 * @param $array
		 *
		 * @return mixed
		 */
		public function recursive_sanitize_text_field( $array ) {
			foreach ( $array as $key => &$value ) {
				if ( is_array( $value ) ) {
					$value = recursive_sanitize_text_field( $value );
				} else {
					$value = sanitize_text_field( $value );
				}
			}

			return $array;
		}
	}
}

/**
 * Custom function to declare compatibility with cart_checkout_blocks feature
 */
function atlos_declare_cart_checkout_blocks_compatibility() {
	// Check if the required class exists
	if ( class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
		// Declare compatibility for 'cart_checkout_blocks'
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'cart_checkout_blocks', __FILE__, true );
	}
}

// Hook the custom function to the 'before_woocommerce_init' action
add_action( 'before_woocommerce_init', 'atlos_declare_cart_checkout_blocks_compatibility' );

// Hook the custom function to the 'woocommerce_blocks_loaded' action
add_action( 'woocommerce_blocks_loaded', 'atlos_register_order_approval_payment_method_type' );

/**
 * Custom function to register a payment method type
 */
function atlos_register_order_approval_payment_method_type() {
	// Check if the required class exists
	if ( ! class_exists( 'Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType' ) ) {
		return;
	}

	global $pagenow, $typenow;

	if ( $pagenow == 'admin.php' ) {
		return;
	}

	// Include the custom Blocks Checkout class
	require_once plugin_dir_path( __FILE__ ) . 'class-atlos-payment-block.php';
	// Hook the registration function to the 'woocommerce_blocks_payment_method_type_registration' action
	add_action(
		'woocommerce_blocks_payment_method_type_registration',
		function ( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
			// Register an instance of My_Custom_Gateway_Blocks
			$payment_method_registry->register( new Atlos_Payments_Blocks() );
		}
	);
}
