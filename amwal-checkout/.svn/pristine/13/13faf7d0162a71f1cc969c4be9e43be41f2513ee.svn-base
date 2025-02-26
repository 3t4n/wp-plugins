<?php

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

class Amwal_Gateway_Blocks extends AbstractPaymentMethodType {

	public $name;
	public function initialize() {
		$this->settings = get_option( 'woocommerce_' . $this->name . '_settings', array() );
	}
	public function is_active() {
		return ! empty( $this->settings['enabled'] ) && 'yes' === $this->settings['enabled'];
	}
	public function get_payment_method_script_handles() {
		wp_register_script(
					$this->name . '-blocks-integration',
					AMWALWC_URL . 'assets/src/amwal-block/' . $this->name . '_block.js',
					array(
						'wc-blocks-registry',
						'wc-settings',
						'wp-element',
						'wp-html-entities',
						'wp-i18n',
					),
					AMWALWC_VERSION,
					true
				);
		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( $this->name . '-blocks-integration' );
		}

		return array( $this->name . '-blocks-integration' );
	}

	public function get_payment_method_data() {
		return array(
			'title'       => isset( $this->settings['title'] ) ? ucwords( $this->settings['title'] ) : '',
			'description' => isset( $this->settings['description'] ) ? $this->settings['description'] : '',
			'icon'        => AMWALWC_URL  . 'assets/images/logo.png',
		);
	}
}
