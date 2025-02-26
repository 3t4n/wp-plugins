<?php
namespace Bayarcash\WooCommerce;

class DuitNowNETS extends Gateway {
	public function __construct() {
		parent::__construct('duitnownets');
		$this->supports = ['products'];
	}

	protected function get_payment_titles(): array {
		return [
			'title' => 'NETS Singapore',
			'method_title' => 'Bayarcash NETS Singapore'
		];
	}

    protected function get_payment_descriptions(): array {
        return [
            'description' => 'Seamlessly scan & pay using NETS supported DBS Bank, POSB, HSBC, Maybank, OCBC, Standard Chartered and UOB.',
            'method_description' => 'Allow customers to pay with NETS Singapore',
        ];
    }

	protected function set_icon(): void {
		$settings = get_option('woocommerce_duitnownets-wc_settings', []);
		$checkout_logo = $settings['checkout_logo'] ?? '1';

		if ($checkout_logo === '2') {
			$icon_filename = 'nets-all.png';
		} else {
			$icon_filename = 'nets.png';
		}

		$icon_url = $this->url . 'includes/admin/img/nets/' . $icon_filename;

		$this->icon = apply_filters('woocommerce_' . $this->id . '_icon', $icon_url);
	}
}