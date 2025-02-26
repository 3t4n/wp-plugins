<?php

namespace CoffeCode\ExtraShippingMethods;

class Exclusive_Shipping_Methods {
	private static $instance = null;

	/**
	 * Initializes the Exclusive_Shipping_Methods class.
	 *
	 * @access private
	 * @return void
	 */
	private function __construct() {
		add_action( 'woocommerce_init', [ $this, 'add_shipping_method_fields' ] );
		add_filter( 'woocommerce_package_rates', [ $this, 'filter_shipping_methods' ], 10, 2);
	}

	/**
	 * Returns an instance of the Exclusive_Shipping_Methods class.
	 *
	 * @return Exclusive_Shipping_Methods|null The instance of the class, or null if it hasn't been instantiated yet.
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Adds a filter to add an exclusive checkbox to each shipping method's settings form.
	 *
	 * @return void
	 */
	public function add_shipping_method_fields() {
		foreach ( WC()->shipping()->get_shipping_methods() as $shipping_method ) {
			add_filter( 'woocommerce_shipping_instance_form_fields_' . $shipping_method->id, [ $this, 'add_exclusive_checkbox' ] );
		}
	}

	/**
	* Add unique method checkbox to shipping method settings.
	*
	* @param array $fields Existing configuration form fields.
	* @return array Modified configuration form fields.
	*/
	public function add_exclusive_checkbox($fields) {
		$fields['exclusive_method'] = [
			'title'       => __('Exclusive Method', 'extra-shipping-methods'),
			'type'        => 'checkbox',
			'label'       => __('Apply only if no other method is available', 'extra-shipping-methods'),
			'default'     => 'no',
			'description' => __('If enabled, this shipping method will only be applied if no other methods are available.', 'extra-shipping-methods'),
		];

		return $fields;
	}

	/**
	 * Filter shipping methods to apply exclusivity logic.
	 *
	 * @param array $rates   Array of shipping rates.
	 * @param array $package Shipping package.
	 * @return array Modified shipping rates.
	 */
	public function filter_shipping_methods($rates, $package) {
		// Early return if no rates or less than 2 rates.
		if ( empty( $rates ) || count( $rates ) < 2 ) {
			return $rates;
		}

		$active_methods = [];

		foreach ( $rates as $rate_id => $rate ) {
			$active_methods[ $rate->get_id() ] = [
				'type'     => $rate->get_method_id(),
				'settings' => get_option( 'woocommerce_' . $rate->get_method_id() . '_' . $rate->get_instance_id() . '_settings' ),
			];
		}

		$exclusive_methods = array_filter( $active_methods, function( $method ) {
			return isset( $method['settings']['exclusive_method'] ) && $method['settings']['exclusive_method'] === 'yes';
		} );

		$non_exclusive_methods = array_diff_key( $active_methods, $exclusive_methods );

		if ( empty( $exclusive_methods ) ) {
			return $rates;
		}

		if ( count( $exclusive_methods ) > 1 && empty( $non_exclusive_methods ) ) {
			array_pop( $exclusive_methods );
		}

		foreach ( $rates as $rate_id => $rate ) {
			if ( in_array( $rate->get_method_id(), array_column( $exclusive_methods, 'type' ) ) ) {
				unset( $rates[ $rate_id ] );
			}
		}

		return $rates;
	}
}
