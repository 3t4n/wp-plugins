<?php

namespace WC_Gateway_ICount;

use Automattic\WooCommerce\Blocks\Assets\Api;
use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

class WC_ICount_PaymentMethodType extends AbstractPaymentMethodType
{
	private Api $assets_api;

	public function __construct(Api $asset_api)
	{
		$this->assets_api = $asset_api;
	}

	protected $name = '';

	public function initialize()
	{
		$this->name = PLUGIN_ID;
		$this->settings = get_option('woocommerce_'
			. PLUGIN_ID
			. '_settings', []);
	}

	public function get_payment_method_script_handles(): array
	{
		$this->assets_api->register_script(
			static::class,
			'assets/js/block_element.js'
		);
		return [static::class];
	}

	public function get_payment_method_data(): array
	{
		return [
			'title' => $this->settings['title'],
			'description' => $this->settings['description'],
			'icon' => $this->settings['hide_icon'] === 'no' ? ICOUNT_PAYMENT_PLUGIN_URL . '/assets/images/icount.png' : null,
		];
	}
}
