<?php

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

final class WC_AmwalPay_Blocks extends AbstractPaymentMethodType {

	protected $name = 'amwal';

	public function initialize() {
		$this->settings = get_option( 'woocommerce_amwal_settings', array() );
	}
	public function is_active() {
		return ! empty( $this->settings['enabled'] ) && 'yes' === $this->settings['enabled'];
	}
	public function get_payment_method_script_handles() {
		wp_register_script(
			'amwal-blocks-integration',
			AMPR_PLUGIN_URL . 'assets/js/checkout_block.js',
			array(
				'wc-blocks-registry',
				'wc-settings',
				'wp-element',
				'wp-html-entities',
				'wp-i18n',
			),
			AMPR_VERSION,
			true
		);

		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( 'amwal-blocks-integration' );
		}

		return array( 'amwal-blocks-integration' );
	}

	public function get_payment_method_data() {
		return array(
			'title'       => isset( $this->settings['title'] ) ? $this->settings['title'] : esc_html__( 'Amwal Pay' ,'amwalpay-for-woocommerce'),
			'description' => isset( $this->settings['description'] ) ? $this->settings['description'] : esc_html__( 'Amwal Payment Gateway for Oman  and supports all card and wallet payment' ,'amwalpay-for-woocommerce'),
			'icon'        => isset( $this->settings['logo'] ) ? $this->settings['logo'] : plugins_url( AMPR_PLUGIN_NAME ) . '/assets/img/amwalpay.svg',
		);
	}
}
