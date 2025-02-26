<?php
namespace Bayarcash\WooCommerce\Blocks;

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

final class WC_Gateway_DuitNowNETS_Blocks_Support extends AbstractPaymentMethodType {
	private $gateway;
	protected $name = 'duitnownets-wc';

	public function initialize() {
		$this->settings = get_option('woocommerce_duitnownets-wc_settings', []);
		$this->gateway = new \Bayarcash\WooCommerce\DuitNowNETS();
	}

	public function is_active() {
		return $this->gateway->is_available();
	}

	public function get_payment_method_script_handles(): array {
		wp_register_script(
			'duitnownets-blocks-integration',
			BAYARCASH_WC['URL'] . 'includes/admin/js/blocks/duitnownets.js',
			[
				'wc-blocks-registry',
				'wc-settings',
				'wp-element',
				'wp-html-entities',
				'wp-i18n',
			],
			null,
			true
		);

		if (function_exists('wp_set_script_translations')) {
			wp_set_script_translations('duitnownets-blocks-integration');
		}

		return ['duitnownets-blocks-integration'];
	}

	public function get_payment_method_data(): array {
		return [
			'title' => $this->gateway->get_title(),
			'description' => $this->gateway->get_description(),
			'supports' => $this->gateway->supports,
			'method_name' => $this->name,
			'icon'        => $this->gateway->icon,
		];
	}
}