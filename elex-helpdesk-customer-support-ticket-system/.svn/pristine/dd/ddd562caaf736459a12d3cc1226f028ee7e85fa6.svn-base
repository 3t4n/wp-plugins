<?php

namespace WSDesk\Tickets;

use Illuminate\Support\Arr;
use WSDesk\Settings\SettingsItem;

class TicketField {

	const TYPE_CHECKBOX     = 'checkbox';
	const TYPE_SELECT       = 'select';
	const TYPE_RADIO        = 'radio';
	const TYPE_WOO_PRODUCT  = 'woo_product';
	const TYPE_WOO_CATEGORY = 'woo_category';
	const TYPE_WOO_TAGS     = 'woo_tags';
	const TYPE_FILE         = 'file';

	/* @var SettingsItem */
	protected $settings_item;

	/* @var string */
	protected $key;

	/* @var mixed */
	protected $value;

	/**
	 * Initiate field
	 *
	 * @param string $key
	 * @param mixed $value
	 */
	public function __construct( $key, $value ) {
		$this->key   = $key;
		$this->value = $value;
	}

	/**
	 * Set settings item
	 *
	 * @param SettingsItem $settings_item
	 */
	public function set_settings_item( $settings_item ) {
		$this->settings_item = $settings_item;
	}

	public function get_settings_item() {
		if ( is_null( $this->settings_item ) ) {
			$this->settings_item = SettingsItem::find_by_slug( $this->key );
		}

		return $this->settings_item;
	}

	public function get_type() {
		return Arr::get( $this->get_settings_item()->get_meta(), 'field_type' );
	}

	public function get_labels() {
		if ( 'woo_order_id' === $this->key ) {
			return $this->value;
		}

		if ( 'ticket_attachment' === $this->key ) {
			return  unserialize( $this->value );
		}

		$field_type   = $this->get_type();
		$field_values = Arr::get( $this->get_settings_item()->get_meta(), 'field_values', array() );

		if ( in_array( $field_type, array( self::TYPE_SELECT, self::TYPE_RADIO, self::TYPE_WOO_CATEGORY, self::TYPE_WOO_PRODUCT, self::TYPE_WOO_TAGS ), true ) ) {
			return Arr::get( $field_values, $this->value );
		}

		if ( in_array( $field_type, array( self::TYPE_CHECKBOX ), true ) && $this->value ) {
			return implode( ', ', Arr::only( $field_values, unserialize( $this->value ) ) );
		}

		return $this->value;
	}
}
