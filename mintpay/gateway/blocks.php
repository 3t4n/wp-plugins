<?php

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

/**
 * mintpay Payments Blocks integration
 *
 * @since 1.0.3
 */
final class WC_Mintpay_Blocks extends AbstractPaymentMethodType {

	/**
	 * The gateway instance.
	 *
	 * @var WC_Mintpay_Gateway
	 */
	private $gateway;

	/**
	 * Payment method name/id/slug.
	 *
	 * @var string
	 */
	protected $name = 'mintpay';

	/**
	 * Initializes the payment method type.
	 */
	public function initialize() {
		$this->settings = get_option( 'woocommerce_mintpay_settings', [] );
		// $gateways       = WC()->payment_gateways->payment_gateways();
		$this->gateway  = new Mintpay_Gateway();
	}

	/**
	 * Returns if this payment method should be active. If false, the scripts will not be enqueued.
	 *
	 * @return boolean
	 */
	public function is_active() {
		return $this->gateway->is_available();
	}

	/**
	 * Returns an array of scripts/handles to be registered for this payment method.
	 *
	 * @return array
	 */
	public function get_payment_method_script_handles() {
		wp_register_script(
			'wc-mintpay-payments-blocks',
			plugins_url( 'gateway/assets/js/frontend/blocks.js' ,__DIR__),
			array(
				'react',
            	'wp-blocks',
            	'wp-element',
            	'wp-components',
            	'wc-blocks-registry',
            	'wc-settings',
            	'wp-html-entities',
            	'wp-i18n',
			),
			'2.0.0',
			true
		);

		return array( 'wc-mintpay-payments-blocks' );
	}

	/**
	 * Returns an array of key=>value pairs of data made available to the payment methods script.
	 *
	 * @return array
	 */
	public function get_payment_method_data() {
		return [
			'title'       => 'Pay Better with Mintpay',
			'description' => "Pay Now for Instant Cashback | Pay Later in 3 Interest-Free Instalments",
			'icon'        => "https://mintpay-static-files.s3.ap-south-1.amazonaws.com/static/base/logo/mintpay_new_payment_logo.webp",
			'supports'    => array_filter( $this->gateway->supports, [ $this->gateway, 'supports' ] )
		];
	}
}
