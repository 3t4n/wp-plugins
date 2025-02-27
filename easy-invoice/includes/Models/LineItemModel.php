<?php

namespace MatrixAddons\EasyInvoice\Models;

class LineItemModel
{
	private $quantity;

	private $item_title;

	private $adjust;

	private $rate;

	private $description;

	private $taxable;


	private static function get_instance()
	{
		return new self;
	}

	public static function map($line_items = array())
	{

		$line_items_obj = array();

		foreach ($line_items as $line_item) {

			$self = self::get_instance();

			$self->quantity = $line_item['quantity'] ?? '';
			$self->item_title = $line_item['item_title'] ?? '';
			$self->adjust = easy_invoice_show_hide_adjust() && $line_item['adjust'] ? floatval($line_item['adjust']) : 0;
			$self->rate = $line_item['rate'] ? floatval($line_item['rate']) : 0;
			$self->description = $line_item['description'] ?? '';
			$self->taxable = isset($line_item['taxable']) && (boolean)$line_item['taxable'];

			$line_items_obj[] = $self;


		}

		return $line_items_obj;

	}

	public function get_quantity()
	{
		return $this->quantity;
	}

	public function get_item_title()
	{
		return $this->item_title;
	}

	public function get_adjust()
	{
		return $this->adjust;

	}

	public function get_rate()
	{
		return $this->rate;
	}

	public function get_amount()
	{
		$amount = floatval($this->rate) * absint($this->quantity);

		return floatval($this->adjust) > 0 && $amount > 0 ? (($this->adjust * $amount / 100) + $amount) : $amount;

	}

	public function get_description()
	{
		return $this->description;

	}

	public function is_taxable()
	{
		return $this->taxable;

	}
}
