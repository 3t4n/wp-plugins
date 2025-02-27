<?php

namespace MatrixAddons\EasyInvoice\Admin\Fields\Quotes;

use MatrixAddons\EasyInvoice\Admin\Fields\Base;

class LineItemFields extends Base
{
	public function get_settings()
	{
		$adjust_enable = easy_invoice_quote_show_hide_adjust();

		$adjust_type = $adjust_enable ? 'text' : 'hidden';

		$pre_defined_line_items = easy_invoice_get_predefined_line_items();

		return [

			'easy_invoice_quote_line_items' => [
				'type' => 'group',
				'button_title' => __('Add New Line Item', 'easy-invoice'),
				'repeatable' => true,
				'fields' => [
					'line_item_1_start' => [
						'type' => 'wrap',
						'class' => 'easy-invoice-line-item-1-wrap',
					],
					'quantity' => [
						'type' => 'text',
						'title' => __('Quantity', 'easy-invoice'),
						'class' => 'easy-invoice-line-item-quantity',
						'default' => '',
					],
					'item_title' => [
						'type' => 'text',
						'title' => __('Item Title', 'easy-invoice'),
						'class' => 'easy-invoice-line-item-title',
						'default' => '',
					],
					'adjust' => [
						'type' => $adjust_type,
						'title' => __('Adjust (%)', 'easy-invoice'),
						'class' => 'easy-invoice-line-item-adjust',
						'default' => '',
					],
					'rate' => [
						'type' => 'text',
						'title' => __('Rate', 'easy-invoice'),
						'class' => 'easy-invoice-line-item-rate',
						'default' => '',
					],
					'amount' => [
						'title' => __('Amount', 'easy-invoice'),
						'type' => 'content',
						'content' => '<div class="amount-content"></div>',
						'class' => 'easy-invoice-line-item-amount',
						'allowed_html' => array('div' => array('class' => array()))
					],
					'line_item_1_end' => [
						'type' => 'wrap_end',
						'class' => 'easy-invoice-line-item-1-wrap-end',
					],

					'line_item_2_start' => [
						'type' => 'wrap',
						'class' => 'easy-invoice-line-item-2-wrap',
					],
					'description' => [
						'title' => __('Description', 'easy-invoice'),
						'type' => 'textarea',
						'class' => 'easy-invoice-line-item-description',
					],
					'taxable' => [
						'type' => 'checkbox',
						'title' => __('Taxable', 'easy-invoice'),
						'class' => 'easy-invoice-line-item-taxable',
						'desc' => __("Make this line item taxable.", 'easy-invoice')

					],
					'line_item_2_end' => [
						'type' => 'wrap_end',
						'class' => 'easy-invoice-line-item-3-wrap-end',
					],
					'pre_defined_line_items' => [
						'title' => __('Predefine Line Items', 'easy-invoice'),
						'type' => 'select',
						'options' => $pre_defined_line_items,
						'class' => 'easy-invoice-predefined-line-items',
						'name' => '',
					],


				],
			],


		];
	}

	public function render()
	{
		$this->output();
	}

	public function nonce_id()
	{
		return 'easy_invoice_line_item_fields';
	}

}
