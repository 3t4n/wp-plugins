<?php

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

final class Atlos_Payments_Blocks extends AbstractPaymentMethodType {

	private $gateway;
	protected $name = 'atlos-payments';

	/**
	 * Initializes the Atlos Payments Blocks.
	 *
	 * Sets up the gateway and retrieves the payment settings from WooCommerce options.
	 * Also hooks into the WooCommerce thank you action to modify the thank you page.
	 */
	public function initialize() {
		$this->settings = get_option( 'woocommerce_atlos_payments_settings', array() );
		$this->gateway  = new Atlos_Payments_Gateway();
		add_action( 'woocommerce_thankyou', array( $this, 'atlos_modify_thankyou' ), 99 );
	}

	/**
	 * Determines if the payment gateway is active.
	 *
	 * @return bool
	 */
	public function is_active() {
		return $this->gateway->is_available();
	}

	/**
	 * Gets the script handles for the payment method.
	 *
	 * @return array The script handles for the payment method.
	 */
	public function get_payment_method_script_handles() {
		wp_register_script(
			'atlos_payments-blocks-integration',
			plugin_dir_url( __FILE__ ) . 'checkout.js',
			array(
				'wc-blocks-registry',
				'wc-settings',
				'wp-element',
				'wp-html-entities',
				'wp-i18n',
			),
			null,
			true
		);
		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( 'atlos_payments-blocks-integration' );

		}
		return array( 'atlos_payments-blocks-integration' );
	}

	/**
	 * Returns an array of data for the payment method.
	 *
	 * @return array The data for the payment method. The array must contain the keys 'title' and 'description'.
	 */
	public function get_payment_method_data() {
		return array(
			'title'       => $this->gateway->title,
			'description' => $this->gateway->description,
		);
	}

	/**
	 * Modifies the thank you page
	 */
	public function atlos_modify_thankyou( $order_id ) {

		$order = wc_get_order( $order_id );

		if ( ! $order || $order->get_status() != 'pending' || $order->get_payment_method() != 'atlos-payments' ) {
			return;
		}

		$this->gateway->atlos_add_scripts( $order );

		echo '<button id="atlos_pay_button" class="wp-element-button">Pay with Crypto</button>';
	}
}
