<?php
namespace Bayarcash\WooCommerce;

defined('ABSPATH') || exit;

class DynamicFpxGateway extends Gateway {
	private $gateway_number;

	public function __construct($number) {
		$this->gateway_number = $number;
		parent::__construct('bc-fpx-' . $number);
	}

	protected function get_payment_titles(): array {
		return [
			'title' => sprintf(__('Online Banking # Extra %d', 'bayarcash-dynamic-fpx'), $this->gateway_number),
			'method_title' => sprintf(__('Bayarcash FPX Extra %d', 'bayarcash-dynamic-fpx'), $this->gateway_number),
		];
	}

	protected function get_payment_descriptions(): array {
		return [
			'description' => sprintf(
				__('Pay with FPX online banking %d (Maybank2u, CIMB Clicks, Bank Islam, and more banks from Malaysia).', 'bayarcash-dynamic-fpx'),
				$this->gateway_number
			),
			'method_description' => sprintf(
				__('Allow customers to pay with FPX online banking for merchant #Extra %d.', 'bayarcash-dynamic-fpx'),
				$this->gateway_number
			),
		];
	}

	protected function set_icon(): void {
		$icon_url = $this->url . 'includes/admin/img/fpx/fpx-online-banking.png';
		$this->icon = apply_filters('woocommerce_' . $this->id . '_icon', $icon_url);
	}
}