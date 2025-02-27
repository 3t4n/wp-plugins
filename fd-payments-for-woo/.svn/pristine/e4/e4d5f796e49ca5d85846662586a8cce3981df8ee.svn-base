<?php
/**
 * Class WC_Payeezy_API file.
 *
 * @package First Data Payeezy for WooCommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * WC_Payeezy_API
 */
class WC_Payeezy_API {

	/**
	 * Stores the gateway base url.
	 *
	 * @var string
	 */
	private $base_url;

	/**
	 * Stores the gateway url.
	 *
	 * @var string
	 */
	private $url;

	/**
	 * Stores the merchant token.
	 *
	 * @var string
	 */
	private $merchant_token;

	/**
	 * Determines if the WC version is less than 3.0.0.
	 *
	 * @var bool
	 */
	public $wc_pre_30;

	// Developer API Keys.
	const API_KEY    = '0pPvo5hAUTbOepUNvpEP4IVNQKHASUpA';
	const API_SECRET = 'c63c44c7c30c0a9d9b915e672d55ad363ffab4bdb36b5c65fefd72b634529084';

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->wc_pre_30 = version_compare( WC_VERSION, '3.0.0', '<' );
	}

	/**
	 * Authorize function
	 *
	 * @param WC_Payeezy_Gateway $gateway Gateway object.
	 * @param WC_Order           $order Order object.
	 * @param float              $amount Order amount.
	 * @param array              $card Card array.
	 *
	 * @return mixed
	 */
	public function authorize( $gateway, $order, $amount, $card ) {
		$payload      = $this->get_payload( $gateway, $order, $amount, 'authorize', $card );
		$header_array = $this->hmac_authorization_token( $payload );
		$response     = $this->post_transaction( $payload, $header_array );
		return $response;
	}

	/**
	 * Purchase function
	 *
	 * @param WC_Payeezy_Gateway $gateway Gateway object.
	 * @param WC_Order           $order Order object.
	 * @param float              $amount Order amount.
	 * @param array              $card Card array.
	 *
	 * @return mixed
	 */
	public function purchase( $gateway, $order, $amount, $card ) {
		$payload      = $this->get_payload( $gateway, $order, $amount, 'purchase', $card );
		$header_array = $this->hmac_authorization_token( $payload );
		$response     = $this->post_transaction( $payload, $header_array );
		return $response;
	}

	/**
	 * Capture function
	 *
	 * @param WC_Payeezy_Gateway $gateway Gateway object.
	 * @param WC_Order           $order Order object.
	 * @param float              $amount Order amount.
	 *
	 * @return mixed
	 */
	public function capture( $gateway, $order, $amount ) {
		$payload      = $this->get_payload( $gateway, $order, $amount, 'capture' );
		$header_array = $this->hmac_authorization_token( $payload );
		$response     = $this->post_transaction( $payload, $header_array );
		return $response;
	}

	/**
	 * Refund function
	 *
	 * @param WC_Payeezy_Gateway $gateway Gateway object.
	 * @param WC_Order           $order Order object.
	 * @param float              $amount Order amount.
	 *
	 * @return mixed
	 */
	public function refund( $gateway, $order, $amount ) {
		$payload      = $this->get_payload( $gateway, $order, $amount, 'refund' );
		$header_array = $this->hmac_authorization_token( $payload );
		$response     = $this->post_transaction( $payload, $header_array );
		return $response;
	}

	/**
	 * Void function
	 *
	 * @param WC_Payeezy_Gateway $gateway Gateway object.
	 * @param WC_Order           $order Order object.
	 * @param float              $amount Order amount.
	 *
	 * @return mixed
	 */
	public function void( $gateway, $order, $amount ) {
		$payload      = $this->get_payload( $gateway, $order, $amount, 'void' );
		$header_array = $this->hmac_authorization_token( $payload );
		$response     = $this->post_transaction( $payload, $header_array );
		return $response;
	}

	/**
	 * Verify function
	 *
	 * @param WC_Payeezy_Gateway $gateway Gateway object.
	 *
	 * @return mixed
	 */
	public function verify( $gateway ) {
		$payload      = $this->get_token_payload( $gateway );
		$header_array = $this->hmac_authorization_token( $payload );
		$response     = $this->post_transaction( $payload, $header_array );
		return $response;
	}

	/**
	 * Get payload function
	 *
	 * @param WC_Payeezy_Gateway $gateway Gateway object.
	 * @param WC_Order           $order Order object.
	 * @param float              $amount Order amount.
	 * @param string             $transaction_type Transaction type.
	 * @param array              $card Card array.
	 *
	 * @return string
	 */
	public function get_payload( $gateway, $order, $amount, $transaction_type, $card = '' ) {
		$order_number       = $this->wc_pre_30 ? $order->id : $order->get_id();
		$amount_in_cents    = $amount * 100;
		$billing_first_name = $this->wc_pre_30 ? $order->billing_first_name : $order->get_billing_first_name();
		$billing_last_name  = $this->wc_pre_30 ? $order->billing_last_name : $order->get_billing_last_name();
		$billing_address    = $this->wc_pre_30 ? $order->billing_address_1 : $order->get_billing_address_1();
		$billing_postcode   = $this->wc_pre_30 ? $order->billing_postcode : $order->get_billing_postcode();
		$tax_amount         = $this->wc_pre_30 ? $order->order_tax : $order->get_total_tax();
		$cardholder_name    = $billing_first_name . ' ' . $billing_last_name;

		if ( 'yes' === $gateway->sandbox ) {
			$this->base_url       = 'https://api-cert.payeezy.com/v1/transactions';
			$this->merchant_token = 'fdoa-a480ce8951daa73262734cf102641994c1e55e7cdf4c02b6';
		} else {
			$this->base_url       = 'https://api.payeezy.com/v1/transactions';
			$this->merchant_token = $gateway->merchant_token;
		}

		if ( 'authorize' === $transaction_type || 'purchase' === $transaction_type ) {
			if ( ! empty( $card ) ) {
				$data = array(
					'merchant_ref'     => wc_clean( $order_number ),
					'transaction_type' => wc_clean( $transaction_type ),
					'method'           => 'token',
					'amount'           => wc_clean( $amount_in_cents ),
					'currency_code'    => wc_clean( strtoupper( get_woocommerce_currency() ) ),
					'token'            => array(
						'token_type' => 'FDToken',
						'token_data' => array(
							'type'            => wc_clean( $card->get_card_type() ),
							'value'           => wc_clean( $card->get_token() ),
							'cardholder_name' => wc_clean( $cardholder_name ),
							'exp_date'        => wc_clean( $card->get_expiry_month() . substr( $card->get_expiry_year(), -2 ) ),
						),
					),
					'billing_address'  => array(
						'street'          => wc_clean( substr( $billing_address, 0, 30 ) ),
						'zip_postal_code' => wc_clean( substr( $billing_postcode, 0, 10 ) ),
					),
					'level2'           => array(
						'tax1_amount'  => number_format( $tax_amount, '2', '.', '' ),
						'customer_ref' => wc_clean( $order_number ),
					),
				);
			} else {
				$card_raw       = isset( $_POST['payeezy-card-number'] ) ? sanitize_text_field( wp_unslash( $_POST['payeezy-card-number'] ) ) : '';
				$card_number    = str_replace( ' ', '', $card_raw );
				$exp_raw        = isset( $_POST['payeezy-card-expiry'] ) ? sanitize_text_field( wp_unslash( $_POST['payeezy-card-expiry'] ) ) : '';
				$exp_date_array = explode( '/', $exp_raw );
				$exp_month      = trim( $exp_date_array[0] );
				$exp_year       = trim( $exp_date_array[1] );
				$exp_date       = $exp_month . substr( $exp_year, -2 );
				$cvc            = isset( $_POST['payeezy-card-cvc'] ) ? sanitize_text_field( wp_unslash( $_POST['payeezy-card-cvc'] ) ) : '';
				$data           = array(
					'merchant_ref'     => wc_clean( $order_number ),
					'transaction_type' => wc_clean( $transaction_type ),
					'method'           => 'credit_card',
					'amount'           => wc_clean( $amount_in_cents ),
					'currency_code'    => wc_clean( strtoupper( get_woocommerce_currency() ) ),
					'credit_card'      => array(
						'type'            => wc_clean( $this->get_card_type( $card_number ) ),
						'cardholder_name' => wc_clean( $cardholder_name ),
						'card_number'     => wc_clean( $card_number ),
						'exp_date'        => wc_clean( $exp_date ),
						'cvv'             => wc_clean( $cvc ),
					),
					'billing_address'  => array(
						'street'          => wc_clean( substr( $billing_address, 0, 30 ) ),
						'zip_postal_code' => wc_clean( substr( $billing_postcode, 0, 10 ) ),
					),
					'level2'           => array(
						'tax1_amount'  => number_format( $tax_amount, '2', '.', '' ),
						'customer_ref' => wc_clean( $order_number ),
					),
				);
			}
			$this->url = $this->base_url;
		} else {
			$tran_meta = $order->get_meta( '_payeezy_transaction', true );
			$this->url = $this->base_url . '/' . $tran_meta['transaction_id'];
			$data      = array(
				'merchant_ref'     => wc_clean( $order_number ),
				'transaction_type' => wc_clean( $transaction_type ),
				'method'           => 'credit_card',
				'amount'           => wc_clean( $amount_in_cents ),
				'currency_code'    => wc_clean( strtoupper( get_woocommerce_currency() ) ),
				'transaction_tag'  => wc_clean( $tran_meta['transaction_tag'] ),
			);
		}
		return wp_json_encode( $data );
	}

	/**
	 * Get_token_payload function
	 *
	 * @param WC_Payeezy_Gateway $gateway Gateway object.
	 *
	 * @return string
	 */
	public function get_token_payload( $gateway ) {
		if ( 'yes' === $gateway->sandbox ) {
			$this->url            = 'https://api-cert.payeezy.com/v1/transactions';
			$this->merchant_token = 'fdoa-a480ce8951daa73262734cf102641994c1e55e7cdf4c02b6';
		} else {
			$this->url            = 'https://api.payeezy.com/v1/transactions';
			$this->merchant_token = $gateway->merchant_token;
		}
		$customer_id     = get_current_user_id();
		$amount_in_cents = 0;
		$card_raw        = isset( $_POST['payeezy-card-number'] ) ? sanitize_text_field( wp_unslash( $_POST['payeezy-card-number'] ) ) : '';
		$card_number     = str_replace( ' ', '', $card_raw );
		$exp_raw         = isset( $_POST['payeezy-card-expiry'] ) ? sanitize_text_field( wp_unslash( $_POST['payeezy-card-expiry'] ) ) : '';
		$exp_date_array  = explode( '/', $exp_raw );
		$exp_month       = trim( $exp_date_array[0] );
		$exp_year        = trim( $exp_date_array[1] );
		$exp_date        = $exp_month . substr( $exp_year, -2 );
		$cvc             = isset( $_POST['payeezy-card-cvc'] ) ? sanitize_text_field( wp_unslash( $_POST['payeezy-card-cvc'] ) ) : '';
		$data            = array(
			'merchant_ref'     => wc_clean( $customer_id ),
			'transaction_type' => 'authorize',
			'method'           => 'credit_card',
			'amount'           => wc_clean( $amount_in_cents ),
			'currency_code'    => wc_clean( strtoupper( get_woocommerce_currency() ) ),
			'credit_card'      => array(
				'type'            => wc_clean( $this->get_card_type( $card_number ) ),
				'cardholder_name' => wc_clean( get_user_meta( $customer_id, 'billing_first_name', true ) . ' ' . get_user_meta( $customer_id, 'billing_last_name', true ) ),
				'card_number'     => wc_clean( $card_number ),
				'exp_date'        => wc_clean( $exp_date ),
				'cvv'             => wc_clean( $cvc ),
			),
		);
		return wp_json_encode( $data );
	}

	/**
	 * Hmac_authorization_token function
	 *
	 * @param string $payload Payload json.
	 *
	 * @return array
	 */
	public function hmac_authorization_token( $payload ) {
		$nonce          = strval( hexdec( bin2hex( openssl_random_pseudo_bytes( 4, $cstrong ) ) ) );
		$timestamp      = strval( time() * 1000 ); // time stamp in milli seconds.
		$data           = self::API_KEY . $nonce . $timestamp . $this->merchant_token . $payload;
		$hash_algorithm = 'sha256';
		$hmac           = hash_hmac( $hash_algorithm, $data, self::API_SECRET, false ); // HMAC Hash in hex.
		$authorization  = base64_encode( $hmac );
		return array(
			'authorization' => $authorization,
			'nonce'         => $nonce,
			'timestamp'     => $timestamp,
		);
	}

	/**
	 * Post_transaction function
	 *
	 * @param string $payload Payload json.
	 * @param array  $headers Headers array.
	 *
	 * @return string|false
	 */
	public function post_transaction( $payload, $headers ) {
		$args     = array(
			'headers' => array(
				'Content-Type'  => 'application/json',
				'apikey'        => strval( self::API_KEY ),
				'token'         => strval( $this->merchant_token ),
				'Authorization' => $headers['authorization'],
				'nonce'         => $headers['nonce'],
				'timestamp'     => $headers['timestamp'],
			),
			'body'    => $payload,
			'method'  => 'POST',
			'timeout' => 70,
		);
		$response = wp_remote_post( $this->url, $args );

		if ( is_wp_error( $response ) || empty( $response['body'] ) ) {
			return new WP_Error( 'payeezy_error', __( 'There was a problem connecting to the payment gateway.', 'woocommerce-payeezy' ) );
		}

		$parsed_response = json_decode( $response['body'] );

		if ( ! empty( $parsed_response->Error ) ) {
			if ( 'Access denied' === $parsed_response->Error->messages[0]->description ) {
				$error_msg = __( 'Invalid Merchant Token: Call merchant support at (866) 913-3220 to obtain a new token', 'woocommerce-payeezy' );
			} else {
				$error_msg = __( 'Payment error: ', 'woocommerce-payeezy' ) . $parsed_response->Error->messages[0]->description;
			}
			return new WP_Error( 'payeezy_error', $error_msg );
		} else {
			return $parsed_response;
		}
	}

	/**
	 * Get_card_type function
	 *
	 * @param string $number Card number.
	 *
	 * @return string
	 */
	private function get_card_type( $number ) {
		if ( preg_match( '/^4\d{12}(\d{3})?(\d{3})?$/', $number ) ) {
			return 'Visa';
		} elseif ( preg_match( '/^3[47]\d{13}$/', $number ) ) {
			return 'American Express';
		} elseif ( preg_match( '/^(5[1-5]\d{4}|677189|222[1-9]\d{2}|22[3-9]\d{3}|2[3-6]\d{4}|27[01]\d{3}|2720\d{2})\d{10}$/', $number ) ) {
			return 'MasterCard';
		} elseif ( preg_match( '/^(6011|65\d{2}|64[4-9]\d)\d{12}|(62\d{14})$/', $number ) ) {
			return 'Discover';
		} elseif ( preg_match( '/^35(28|29|[3-8]\d)\d{12}$/', $number ) ) {
			return 'JCB';
		} elseif ( preg_match( '/^3(0[0-5]|[68]\d)\d{11}$/', $number ) ) {
			return 'Diners Club';
		}
	}
}
