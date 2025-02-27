<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Check if Session is not started. If not, start the session.
//if ( ! session_id() ) {
//	session_start( [
//		'read_and_close' => true,
//	] );
//}

class Mintpay_Gateway extends WC_Payment_Gateway {
	public $id = 'mintpay';
	public string $domain = 'mintpay';
	public string $merchant_id;
	protected string $merchant_secret;
	public bool $test_mode;

	/**
	 *
	 * Constructor for the gateway.
	 */
	public function __construct() {
		$this->title              = __( 'Pay Better with Mintpay', $this->domain );
		$this->description        = __( 'Pay Now for Cashback | Pay Later in 3 Interest-Free Instalments', $this->domain );
		$this->icon               = plugin_dir_url( __FILE__ ) . 'assets/img/mintpay2.png';
		$this->has_fields         = true;
		$this->method_title       = __( 'Mintpay', $this->domain );
		$this->method_description = __( 'Mintpay Payment Gateway', $this->domain );
		$this->supports           = array( 'products', 'refunds' );

		// Load the settings.
		$this->init_form_fields();
		$this->init_settings();

		// Define user set variables.
		$this->enabled         = $this->get_option( 'enabled' );
		$this->test_mode       = 'yes' === $this->get_option( 'test_mode' );
		$this->merchant_id     = $this->get_option( 'merchant_id' );
		$this->merchant_secret = $this->get_option( 'merchant_secret' );

		add_action( 'init', array( &$this, 'mintpay_plugin_update' ) );
		add_action( 'init', array( &$this, 'check_mintpay_response' ) );
		add_action( 'woocommerce_api_' . strtolower( get_class( $this ) ), array(
			$this,
			'check_mintpay_response'
		) ); //update for woocommerce >2.0
//		add_action( 'woocommerce_gateway_icon', array( $this, 'modify_gateway_icon_css' ), 10, 2 );

		add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array(
			&$this,
			'process_admin_options'
		) );
		add_action( 'woocommerce_receipt_mintpay', array( &$this, 'receipt_page' ) );
	}

	/**
	 * Initialize Gateway Settings Form Fields.
	 */
	public function init_form_fields(): void {
		$this->form_fields = include dirname( __FILE__ ) . '/settings.php';
	}

	public function admin_options() {
		_e( '<h3> Mintpay </h3>', 'mintpay' );
		_e( '<p> WooCommerce payment plugin of Mintpay payment gateway. Sri Lanka\'s first buy now pay later platform, that allows consumers to split their payment into 3 interst-free installments </p>', 'mintpay' );
		_e( '<table class="form-table">', 'mintpay' );
		// Generate the HTML For the settings form.
		$this->generate_settings_html();
		_e( '</table>', 'mintpay' );
	} //END-admin_options

	/**
	 *  There are no payment fields, but we want to show the description if set.
	 **/
	function payment_fields() {
		if ( $this->description ) {
			_e( $this->description );
		}
	} //END-payment_fields

	public function process_admin_options() {
		// Call the parent method to save the settings
		$result = parent::process_admin_options();

		// Calculate and save the cashback value
		$this->calculate_cashback();

		return $result;
	}

	function mintpay_plugin_update() {
		$inst_type = get_option( 'mintpay_inst_type' );
		if ( empty( $inst_type ) ) {
			$this->calculate_cashback();
		}
	}

	public function calculate_cashback() {
		$merchant_id     = $this->get_option( 'merchant_id' );
		$merchant_secret = $this->get_option( 'merchant_secret' );

		// Check if the merchant ID and secret are set
		if ( empty( $merchant_id ) || empty( $merchant_secret ) ) {
			update_option( 'mintpay_cashback_value', 0 );
			update_option( 'mintpay_inst_type', 'LTR' );

			return;
		}

		$test_mode = $this->get_option( 'test_mode' ) === 'yes';

		if ( $test_mode ) {
			$base_url = "https://dev.mintpay.lk/api/v2/merchant-portal/merchant-cashback";
		} else {
			$base_url = "https://app.mintpay.lk/api/v2/merchant-portal/merchant-cashback";
		}

		$host = parse_url( $base_url, PHP_URL_HOST );
		$curl = curl_init();

		curl_setopt_array( $curl, array(
			CURLOPT_URL            => $base_url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => '',
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => 'GET',
			CURLOPT_HTTPHEADER     => array(
				'Client-Meta: customer-web/browser, v2.0.0',
				'Client-Version: 2.0.0',
				"Authorization: Token $merchant_secret",
				'Accept: */*',
				"Host: $host",
				'Connection: keep-alive'
			),
		) );

		$response = curl_exec( $curl );

		curl_close( $curl );
		$data = json_decode( $response, true );

		if ( isset( $data['data']['cashback_percentage'] ) && isset( $data['data']['inst_type'] ) ) {
			$cashback  = $data['data']['cashback_percentage'] * 100; // Convert to percentage
			$inst_type = $data['data']['inst_type'];

			update_option( 'mintpay_cashback_value', $cashback );
			update_option( 'mintpay_inst_type', $inst_type ); // LTR, BTH, NOW

		} else {

			error_log( "Data: " . print_r( $data, true ) );

			error_log( "Cashback percentage or inst_type not found in API response" );
			update_option( 'mintpay_cashback_value', 0 );
			update_option( 'mintpay_inst_type', 'LTR' );

		}
	}

	/**
	 * Receipt Page
	 **/
	function receipt_page( $order ) {
		_e( '<p><strong>' . esc_html__( 'Thank you for your order' ) . '.<br/>' . esc_html__( 'The payment page will open soon.' ) . '</strong></p>', 'mintpay' );
		_e( $this->generate_mintpay_form( $order ) );
	} //END-receipt_page

	/**
	 * Generate button link
	 **/
	function generate_mintpay_form( $order_id ) {
		global $woocommerce;

		$order = wc_get_order( $order_id );

		$merchant_id     = $this->merchant_id;
		$merchant_secret = $this->merchant_secret;
		$amount          = $order->get_total();

		$success_hash = hash_hmac( 'sha256', $merchant_id . sprintf( "%.02f", round( $amount, 2 ) ) . $order_id, $merchant_secret );
		$fail_hash    = hash_hmac( 'sha256', $order_id, $merchant_secret );


		$_SESSION['order_id'] = $order_id;

		$redirect_url = $order->get_checkout_order_received_url();

		$notify_url = "";
		// Redirect URL : For WooCoomerce 2.0
		$notify_url = add_query_arg( 'wc-api', get_class( $this ), $redirect_url );

		$success_url = $notify_url . '&orderId=' . $order_id . '&hash=' . base64_encode( $success_hash );
		$fail_url    = $notify_url . '&orderId=' . $order_id . '&hash=' . base64_encode( $fail_hash );


		if ( $this->test_mode ) {
			$api_url  = "https://dev.mintpay.lk/user-order/api/";
			$form_url = "https://dev.mintpay.lk/user-order/login/";
		} else {
			$api_url  = "https://app.mintpay.lk/user-order/api/";
			$form_url = "https://app.mintpay.lk/user-order/login/";
		}

		foreach ( $order->get_items() as $item_id => $item ) {

			$order_items[] = array(
				'name'         => $item->get_name(),
				'product_id'   => $item->get_product_id(),
				'sku'          => $item->get_type(),
				'quantity'     => $item->get_quantity(),
				'unit_price'   => $item->get_total(),
				'created_date' => "2001-10-01 01:10:01",
				'updated_date' => "2001-10-01 01:10:01",
				'discount'     => "0.00"
			);
		}

		// request body sent to mintpay api
		$postData = [
			'merchant_id'        => $merchant_id,
			'order_id'           => $order_id,
			'total_price'        => $amount,
			'discount'           => $order->get_total_discount(),
			'customer_id'        => $order->get_customer_id(),
			'customer_email'     => $order->get_billing_email(),
			'customer_telephone' => $order->get_billing_phone(),
			'ip'                 => $order->get_customer_ip_address(),
			'x_forwarded_for'    => $order->get_customer_ip_address(),
			'delivery_street'    => $order->get_billing_address_1() . $order->get_billing_address_2(),
			'delivery_region'    => $order->get_billing_city(),
			'delivery_postcode'  => $order->get_billing_postcode(),
			'cart_created_date'  => date_format( $order->get_date_created(), "Y-m-d H:i:s" ),
			'cart_updated_date'  => date_format( $order->get_date_modified(), "Y-m-d H:i:s" ),
			'success_url'        => $success_url,
			'fail_url'           => $fail_url,
			'products'           => $order_items,
			'currency_code'      => $order->get_currency(),
			'currency_symbol'    => get_woocommerce_currency_symbol( $order->get_currency() )
		];

		// headers sent with the request
		$headers = [
			'Authorization' => 'Token ' . $merchant_secret,
			'Content-Type'  => 'application/json',
		];

		// create arguments for the post request
		$args = array(
			'body'        => json_encode( $postData ),
			'headers'     => $headers,
			'timeout'     => '15',
			'redirection' => '5',
			'httpversion' => '1.0',
			'blocking'    => true,
		);

		// receive the response and retreive the body and decode json
		$response           = wp_remote_post( $api_url, $args );
		$response_body      = wp_remote_retrieve_body( $response );
		$mintpayRequestData = json_decode( $response_body, true );

		/**
		 * when debugging API issues use logs (i.e: file_put_contents)
		 */

		if ( isset( $mintpayRequestData['message'] ) && $mintpayRequestData['message'] == 'Success' ) {

			return '<form action="' . $form_url . '"method="post" id="mintpay_payment_form">
				<input type="hidden" name="purchase_id" value="' . $mintpayRequestData['data'] . '" >
				<input type="submit" class="button-alt" id="submit_mintpay_payment_form" value="' . __( 'Pay via Mintpay', 'mintpay' ) . '" /> <a class="button cancel" href="' . $order->get_cancel_order_url() . '">' . __( 'Cancel order &amp; restore cart', 'mintpay' ) . '</a>
					<script type="text/javascript">
					jQuery(function(){
					jQuery("body").block({
						message: "' . __( 'Thanks for your order! We are now redirecting you to Mintpay payment gateway to make the payment.', 'mintpay' ) . '",
						overlayCSS: {
							background		: "#fff",
							opacity			: 0.8
						},
						css: {
							padding			: 20,
							textAlign		: "center",
							color			: "#333",
							border			: "1px solid #eee",
							backgroundColor	: "#fff",
							cursor			: "wait",
							lineHeight		: "32px"
						}
					});
					jQuery("#submit_mintpay_payment_form").click();});
					</script>
				</form>';
		} else {
			return wp_redirect( wc_get_cart_url() );
		}
	} //END-generate_mintpay_form


	function check_mintpay_response() {
		global $woocommerce;

		if ( isset( $_GET['key'] ) && isset( $_GET['hash'] ) ) {

			if ( isset( $_GET['orderId'] ) ) {
				$order = wc_get_order( $_GET['orderId'] );

				$post_success_hash = hash_hmac( 'sha256', $this->merchant_id . sprintf( "%.02f", round( $order->get_total(), 2 ) ) . $_GET['orderId'], $this->merchant_secret );

				$post_failed_hash = hash_hmac( 'sha256', $_GET['orderId'], $this->merchant_secret );

				if ( base64_decode( $_GET['hash'] ) == $post_success_hash ) {
					$order->payment_complete();
					$order->add_order_note( __( 'Mintpay payment completed', 'mintpay' ) );
					$woocommerce->cart->empty_cart();
					wp_redirect( $order->get_checkout_order_received_url() );
				} else if ( base64_decode( $_GET['hash'] ) == $post_failed_hash ) {
					$cancelled_text = "Payment failed.";
					wc_add_notice( $cancelled_text, 'error' );
					$order->update_status( 'failed', $cancelled_text );
					wp_redirect( $order->get_checkout_payment_url() );
				} else {
					$cancelled_text = "Suspicious response.";
					$order->update_status( 'cancelled', $cancelled_text );
					wc_add_notice( __( 'Payment error:', 'woothemes' ) . $cancelled_text, 'error' );
					wp_redirect( $order->get_checkout_payment_url() );
				}
			}
		}
	}

	/**
	 * Process the payment and return the result
	 **/
	function process_payment( $order_id ) {
		global $woocommerce;
		$order = new WC_Order( $order_id );

		$checkout_payment_url = $order->get_checkout_payment_url( true );

		return array(
			'result'   => 'success',
			'redirect' => add_query_arg(
				'order',
				$order->get_id(),
				add_query_arg(
					'key',
					$order->get_order_key(),
					$checkout_payment_url
				)
			)
		);
	} //END-process_payment


	/**
	 * Get Page list from WordPress
	 **/
	function mintpay_get_pages( $title = false, $indent = true ) {
		$wp_pages  = get_pages( 'sort_column=menu_order' );
		$page_list = array();
		if ( $title ) {
			$page_list[] = $title;
		}
		foreach ( $wp_pages as $page ) {
			$prefix = '';
			// show indented child pages?
			if ( $indent ) {
				$has_parent = $page->post_parent;
				while ( $has_parent ) {
					$prefix     .= ' - ';
					$next_page  = get_post( $has_parent );
					$has_parent = $next_page->post_parent;
				}
			}
			// add to page list array array
			$page_list[ $page->ID ] = $prefix . $page->post_title;
		}

		return $page_list;
	} //END-mintpay_get_pages

} //END-class

