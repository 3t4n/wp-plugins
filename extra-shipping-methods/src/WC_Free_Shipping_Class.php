<?php

declare(strict_types=1);

namespace CoffeCode\ExtraShippingMethods;

if ( ! function_exists( 'add_action' ) ) {
	exit( 0 );
}

use \WC_Shipping_Method;

class WC_Free_Shipping_Class extends WC_Shipping_Method {

	/**
	 * Shipping
	 *
	 * @var Shipping
	 */
	protected $shipping;

	/**
	 * Constructor. The instance ID is passed to this.
	 *
	 * @param integer $instance_id Defaul 0.
	 */
	public function __construct( $instance_id = 0 ) {
		$this->id                 = 'coffee-code_free_shipping_class';
		$this->instance_id        = absint( $instance_id );
		$this->method_title       = __( 'Coffee Code - Free shipping with delivery class', 'extra-shipping-methods' );
		$this->method_description = __( 'Free shipping with shipping class is a special method that can be triggered with Woocommerce shipping classes.', 'extra-shipping-methods' );
		$this->supports           = [
			'shipping-zones',
			'instance-settings',
			'instance-settings-modal',
		];

		$this->init();
	}

	/**
	 * Function init.
	 *
	 * @return void
	 */
	public function init() {
		// Load the settings.
		$this->init_form_fields();
		$this->init_settings();

		// Define user set variables.
		$this->title             = $this->get_option( 'title' );
		$this->requires          = $this->get_option( 'requires' );
		$this->shipping_class_id = (int) $this->get_option( 'shipping_class_id', '-1' );

		// Actions.
		add_action( 'woocommerce_update_options_shipping_' . $this->id, [ $this, 'process_admin_options' ] );
	}

	/**
	 * Init form.
	 *
	 * @return void
	 */
	public function init_form_fields() {
		$this->instance_form_fields = [
			'title'             => [
				// phpcs:ignore
				'title'       => __( 'Title', 'extra-shipping-methods' ),
				'type'        => 'text',
				// phpcs:ignore
				'description' => __( 'This controls the title which the user sees during checkout.', 'extra-shipping-methods' ),
				// phpcs:ignore
				'default'     => __( 'Free Shipping', 'extra-shipping-methods' ),
				'desc_tip'    => true,
			],
			'requires'          => [
				// phpcs:ignore
				'title'   => __( 'Free shipping requires...', 'extra-shipping-methods' ),
				'type'    => 'select',
				'class'   => 'wc-enhanced-select',
				'default' => '',
				'options' => [
					// phpcs:ignore
					''           => __( 'N/A', 'extra-shipping-methods' ),
					// phpcs:ignore
					'coupon'     => __( 'A valid free shipping coupon', 'extra-shipping-methods' ),
					// phpcs:ignore
					'min_amount' => __( 'A minimum order amount', 'extra-shipping-methods' ),
					// phpcs:ignore
					'either'     => __( 'A minimum order amount OR a coupon', 'extra-shipping-methods' ),
					// phpcs:ignore
					'both'       => __( 'A minimum order amount AND a coupon', 'extra-shipping-methods' ),
				],
			],
			'shipping_class_id' => [
				// phpcs:ignore
				'title'       => __( 'Shipping Class', 'extra-shipping-methods' ),
				'type'        => 'select',
				// phpcs:ignore
				'description' => __( 'If necessary, select a shipping class to apply this method.', 'extra-shipping-methods' ),
				'desc_tip'    => true,
				'default'     => '',
				'class'       => 'wc-enhanced-select',
				'options'     => $this->get_shipping_classes_options(),
			],
		];
	}

	/**
	 * Get setting form fields for instances of this shipping method within zones.
	 *
	 * @return array
	 */
	public function get_instance_form_fields() {
		return parent::get_instance_form_fields();
	}

	/**
	 * Calculate shipping.
	 *
	 * @param array $package Package.
	 * @return void
	 */
	public function calculate_shipping( $package = [] ) {
		// Check for shipping classes.
		if ( ! $this->has_only_selected_shipping_class( $package ) ) {
			return;
		}

		$label = '';

		$label .= sprintf(
			'%s',
			$this->title
		);

		$rate = [
			'label'   => $label,
			'cost'    => 0,
			'taxes'   => false,
			'package' => $package,
		];

		// Register the rate.
		$this->add_rate( $rate );
	}

	/**
	 * Get base postcode.
	 *
	 * @since  3.5.1
	 * @return string
	 */
	protected function get_base_postcode() {
		// WooCommerce 3.1.1+.
		if ( method_exists( WC()->countries, 'get_base_postcode' ) ) {
			return WC()->countries->get_base_postcode();
		}

		return '';
	}

	/**
	 * Get shipping classes options.
	 *
	 * @return array
	 */
	protected function get_shipping_classes_options() {
		$shipping_classes = WC()->shipping->get_shipping_classes();
		$options          = [
			// phpcs:ignore
			'-1' => __( 'Any Shipping Class', 'extra-shipping-methods' ),
			// phpcs:ignore
			'0'  => __( 'No Shipping Class', 'extra-shipping-methods' ),
		];

		if ( ! empty( $shipping_classes ) ) {
			$options += wp_list_pluck( $shipping_classes, 'name', 'term_id' );
		}

		return $options;
	}

	/**
	 * Check if package uses only the selected shipping class.
	 *
	 * @param  array $package Cart package.
	 * @return bool
	 */
	protected function has_only_selected_shipping_class( $package ) {
		$only_selected = true;

		if ( -1 === $this->shipping_class_id ) {
			return $only_selected;
		}

		foreach ( $package['contents'] as $item_id => $values ) {
			$product = $values['data'];
			$qty     = $values['quantity'];

			if ( $qty > 0 && $product->needs_shipping() ) {
				if ( $this->shipping_class_id !== $product->get_shipping_class_id() ) {
					$only_selected = false;
					break;
				}
			}
		}

		return $only_selected;
	}

}
