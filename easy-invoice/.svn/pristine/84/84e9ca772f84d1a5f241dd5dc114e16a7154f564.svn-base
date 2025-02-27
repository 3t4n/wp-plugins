<?php

namespace MatrixAddons\EasyInvoice\Admin\Fields\Invoices;

use MatrixAddons\EasyInvoice\Admin\Fields\Base;

class TermsConditionsFields extends Base
{
	public function get_settings()
	{
		return [
			'terms_and_conditions' => [
				'type' => 'textarea',
				'title' => __('Terms & Conditions', 'easy-invoice'),
				'default' => get_option('easy_invoice_terms_conditions', 'Payment is due within 30 days from date of invoice')
			],

		];
	}

	public function render()
	{
		$this->output();
	}

	public function nonce_id()
	{
		return 'easy_invoice_terms_conditions_fields';
	}

}
