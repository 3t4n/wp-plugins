<?php

namespace MuzaPay\Features;

use Automattic\WooCommerce\StoreApi\Schemas\V1\CartSchema;
use MuzaPay\Repositories\ProductRepository;
use MuzaPayDeps\BenefitPlusGatewaySdk\Configuration;
use MuzaPayDeps\BenefitPlusGatewaySdk\Model\InitPaymentResponse;
use Exception;
use WC_Order;
use WC_Payment_Gateway;
use MuzaPay\Managers\ApiManager;
use MuzaPay\Models\OrderModel;
use MuzaPay\Repositories\OrderRepository;
use MuzaPayDeps\BenefitPlusGatewaySdk\Api\MerchantEShopAuthenticationApi;
use MuzaPayDeps\BenefitPlusGatewaySdk\Api\MerchantPaymentApi;
use MuzaPayDeps\BenefitPlusGatewaySdk\ApiException;
use MuzaPayDeps\BenefitPlusGatewaySdk\Model\AuthenticationRequest;
use MuzaPayDeps\BenefitPlusGatewaySdk\Model\InitPaymentRequest;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class Gateway extends WC_Payment_Gateway {
	const NAME = 'muzapay';
	public $request_url;
	public $eshop_id;
	public $password;
	public $country;
	public $private_key_path;

	public $status_successful_payment;
	public $environment;
	public $language;
	public $rest_url;
	public $mixed_categories_notice;

	private $order_id;
	/**
	 * @var $order WC_Order
	 */
	private $order;

	/**
	 * Constructor for the gateway.
	 */
	public function __construct() {
		$this->id                 = self::NAME;
		$this->icon               = apply_filters( 'woocommerce_offline_icon', '' );
		$this->has_fields         = false;
		$this->method_title       = __( 'MúzaPay', 'muzapay' );
		$this->method_description = __( 'MúzaPay payment gateway', 'muzapay' );

		// Load the settings.
		$this->init_form_fields();
		$this->init_settings();
		$this->title                     = $this->get_option( 'title' );
		$this->description               = $this->get_option( 'description' );
		$this->eshop_id                  = $this->get_option( 'eshop_id' );
		$this->password                  = $this->get_option( 'password' );
		$this->private_key_path          = $this->get_option( 'private_key_path' );
		$this->country                   = $this->get_option( 'country' );
		$this->status_successful_payment = $this->get_option( 'status_successful_payment' );
		$this->environment               = $this->get_option( 'environment' );
		$this->language                  = $this->get_option( 'language' );
		$this->mixed_categories_notice   = $this->get_option( 'mixed_categories_notice' );
		$this->rest_url                  = rest_url( ApiManager::PATH . '/validate-order' );

		add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array(
			$this,
			'process_admin_options',
		) );
		add_action( 'woocommerce_receipt_' . $this->id, array( $this, 'receipt_page' ) );
		add_action( 'wp', array( $this, 'mixed_categories_notice' ) );
	}


	/**
	 * Initialize Gateway Settings Form Fields
	 */
	public function init_form_fields() {
		$wc_order_statuses = array_merge( [ '' => __( 'Select status', 'muzapay' ) ], wc_get_order_statuses() );

		$this->form_fields = apply_filters(
			'wc_offline_form_fields',
			array(
				'enabled'                   => array(
					'title'   => __( 'Enable/Disable', 'muzapay' ),
					'type'    => 'checkbox',
					'label'   => __( 'Enable MúzaPay  Payment', 'muzapay' ),
					'default' => 'yes',
				),
				'environment'               => array(
					'title'       => __( 'Environment', 'muzapay' ),
					'type'        => 'select',
					'description' => __( 'Select the environment', 'muzapay' ),
					'desc_tip'    => true,
					'options'     => array(
						'test' => __( 'Test', 'muzapay' ),
						'live' => __( 'Live', 'muzapay' ),
					),
				),
				'eshop_id'                  => array(
					'title'       => __( 'Eshop ID', 'muzapay' ),
					'type'        => 'text',
					'description' => __( 'Enter the Eshop ID', 'muzapay' ),
					'desc_tip'    => true,
				),
				'password'                  => array(
					'title'       => __( 'Password', 'muzapay' ),
					'type'        => 'text',
					'description' => __( 'Enter the password', 'muzapay' ),
					'desc_tip'    => true,
				),
				'private_key_path'          => array(
					'title'       => __( 'Private key path', 'muzapay' ),
					'type'        => 'text',
					'description' => __( 'Enter the private key path', 'muzapay' ),
					'desc_tip'    => true,
				),
				'country'                   => array(
					'title'       => __( 'Country', 'muzapay' ),
					'type'        => 'select',
					'description' => __( 'Select the country', 'muzapay' ),
					'desc_tip'    => true,
					'options'     => array(
						AuthenticationRequest::COUNTRY_CZ => __( 'CZ', 'muzapay' ),
						AuthenticationRequest::COUNTRY_SK => __( 'SK', 'muzapay' ),
					),
				),
				'title'                     => array(
					'title'       => __( 'Title', 'muzapay' ),
					'type'        => 'text',
					'description' => __( 'This controls the title for the payment method the customer sees during checkout.', 'muzapay' ),
					'default'     => __( 'MúzaPay', 'muzapay' ),
					'desc_tip'    => true,
				),
				'language'                  => array(
					'title'       => __( 'Language', 'muzapay' ),
					'type'        => 'select',
					'description' => __( 'Select the language', 'muzapay' ),
					'desc_tip'    => true,
					'options'     => array(
						'cs' => __( 'CS', 'muzapay' ),
						'sk' => __( 'SK', 'muzapay' ),
					),
				),
				'description'               => array(
					'title'       => __( 'Description', 'muzapay' ),
					'type'        => 'textarea',
					'description' => __( 'Payment method description that the customer will see on your checkout.', 'muzapay' ),
					'default'     => __( 'MúzaPay.', 'muzapay' ),
					'desc_tip'    => true,
				),
				'mixed_categories_notice'   => array(
					'title'       => __( 'Mixed categories notice', 'muzapay' ),
					'type'        => 'textarea',
					'description' => __( 'Notice to show if the cart contains Benefit products, but with mixed categories, so the gateway is not available.', 'muzapay' ),
					'default'     => '',
					'desc_tip'    => true,
				),
				'status_successful_payment' => array(
					'title'       => __( 'Successful payment status', 'muzapay' ),
					'description' => __( 'Set the status to update the order to when the payment was successful.', 'muzapay' ),
					'default'     => 'wc-processing',
					'type'        => 'select',
					'desc_tip'    => true,
					'options'     => $wc_order_statuses,
				),
			)
		);
	}


	/**
	 * Process the payment and return the result
	 *
	 * @param int $order_id Order ID.
	 *
	 * @return array
	 * @throws ApiException
	 */
	public function process_payment( $order_id ) {
		$repo = muzapay_container()->get( OrderRepository::class );
		/** @var OrderModel $order */
		$order = $repo->get( $order_id );
		try {
			$token = $this->get_token();
		} catch ( ApiException $e ) {
			return array(
				'result'  => 'error',
				'message' => $e->getMessage(),
			);
		}

		$payment_api = $this->get_payment_api( $token );
		$total       = (int) $order->wc_order->get_total() * 100;

		$body             = new InitPaymentRequest();
		$redirect_url     = sprintf( '%s/%s', $this->rest_url, $order_id );
		$signature_params = [
			$order->wc_order->get_order_key(),
			$total,
			$this->get_category(),
			$order->wc_order->get_order_number(),
			$redirect_url,
			$this->language,
		];

		$signature_string = implode( '|', $signature_params );

		$signature = $this->sign_string( $signature_string );
		$body->setAmount( $total )
		     ->setProductCode( $this->get_category() )
		     ->setOrderReferenceCode( $order->wc_order->get_order_number(), )
		     ->setReturnUrl( $redirect_url )
		     ->setLanguage( $this->language );


		/** @var InitPaymentResponse $result */
		$result = $payment_api->initPayment( $signature, $body, $order->wc_order->get_order_key() );

		try {
			$order->muzapay_payment_id = $result->getPaymentId();
			$repo->save( $order );

			return array(
				'result'   => 'success',
				'redirect' => $result->getGatewayUrl(),
			);
		} catch ( Exception $e ) {
			return array(
				'result'  => 'error',
				'message' => 'Something went wrong. Please try again later.',
			);
		}
	}

	public function sign_string( $signature_string ) {
		$key = file_get_contents( $this->private_key_path );
		$key = openssl_get_privatekey( $key );
		openssl_sign( $signature_string, $encrypted, $key, OPENSSL_ALGO_SHA256 );

		return base64_encode( $encrypted );
	}

	public function is_available() {
		if ( empty( WC()->cart ) ) {
			return false;
		}
		$repo = muzapay_container()->get( ProductRepository::class );

		foreach ( WC()->cart->get_cart_contents() as $item ) {
			if ( ! $item['product_id'] ) {
				continue;
			}
			$p = $repo->get( $item['product_id'] );
			if ( ! $p->muzapay_category ) {
				return false;
			}
		}
		if ( $this->has_mixed_categories() ) {
			return false;
		}

		return parent::is_available();
	}

	public function get_category() {
		$repo       = muzapay_container()->get( ProductRepository::class );
		$categories = [];
		foreach ( WC()->cart->get_cart_contents() as $item ) {
			if ( ! $item['product_id'] ) {
				continue;
			}
			$p            = $repo->get( $item['product_id'] );
			$categories[] = $p->muzapay_category;
		}

		return array_unique( $categories )[0];
	}

	public function has_mixed_categories() {
		$repo       = muzapay_container()->get( ProductRepository::class );
		$categories = [];
		foreach ( WC()->cart->get_cart_contents() as $item ) {
			if ( ! $item['product_id'] ) {
				continue;
			}
			$p            = $repo->get( $item['product_id'] );
			$categories[] = $p->muzapay_category;
		}

		return count( array_unique( $categories ) ) > 1;
	}


	/**
	 * @return mixed
	 * @throws ApiException
	 */
	public function get_token() {
		$auth_api     = $this->get_auth_api();
		$auth_request = new AuthenticationRequest();
		$auth_request->setCountry( $this->country )->setTokenScope( AuthenticationRequest::TOKEN_SCOPE_SINGLE_PAYMENT );
		$result = $auth_api->authenticate( $auth_request );

		return $result->getAccessToken();
	}

	public function get_auth_api() {
		$config = new Configuration();
		$config->setUsername( $this->eshop_id )->setPassword( $this->password )->setHost( 'https://api.gate.muzapay.cz/' );

		return new MerchantEShopAuthenticationApi( null, $config );
	}

	public function get_payment_api( string $token ) {
		$config = new Configuration();
		$config->setAccessToken( $token )->setHost( 'https://api.gate.muzapay.cz' );

		return new MerchantPaymentApi( null, $config );
	}

	public function mixed_categories_notice() {
		if ( is_checkout() && $this->has_mixed_categories() && $this->mixed_categories_notice ) {
			wc_add_notice( $this->mixed_categories_notice, 'notice', 'mixed-categories-notice' );
		}
	}
}
