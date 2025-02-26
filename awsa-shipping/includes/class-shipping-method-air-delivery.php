<?php
/**
 * Class Shipping Method Air Delivery
 *
 * @version           1.0.0
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @package           AWSA_Shipping
 */

/**
 * Class WC Shipping Method Air Delivery
 *
 * @since   1.0.0
 * @version 1.0.0
 */
class AWSA_Shipping_Method_Air_Delivery extends WC_Shipping_Method {

	/**
	 * Constructor
	 *
	 * @param int $instance_id
	 */
	public function __construct( $instance_id = 0 ) {

		parent::__construct( $instance_id );

		$this->instance_id        = $instance_id;
		$this->id                 = 'awsa-air-delivery';
		$this->method_title       = __( 'Air Delivery', 'awsa-shipping' );
		$this->method_description = __(
			'Provides the possibility of sending the parcel by air post. This service is activated only if the destination city is the same as the city of origin (store or vendors), you can add authorized cities through the settings',
			'awsa-shipping'
		);

		$this->enabled = !empty( $this->get_option( 'enabled' ) ) ? $this->get_option( 'enabled' ) : 'yes';
		$this->title   = !empty( $this->get_option( 'title' ) ) ? $this->get_option( 'title' ) : $this->method_title;

		$this->init();
	}

	/**
	 * Init
	 *
	 * @return void
	 */
	public function init() {

		$this->init_form_fields();
		$this->init_settings();
		add_action( "woocommerce_update_options_shipping_{$this->id}", array( $this, 'process_admin_options' ) );
	}

	/**
	 * Init Settings Form Fields
	 *
	 * @return void
	 */
	public function init_form_fields() {

		$need_load       = ( is_admin() && ( isset( $_GET['page'] ) && 'wc-settings' === $_GET['page'] ) && ( isset( $_GET['tab'] ) && 'shipping' === $_GET['tab'] ) ) ? true : false;
		$cities          = $need_load ? $this->get_cities( 'IR' ) : array();
		$payment_methods = $need_load ? $this->get_payment_methods() : array();

		$form_fields = array(
			'enabled' => array(
				'title'       => __( 'Enable/Disable', 'awsa-shipping' ),
				'label'       => __( 'Enable', 'awsa-shipping' ),
				'type'        => 'checkbox',
				'description' => __(
					'If this option is enabled, the method of sending the shipment to the user is displayed',
					'awsa-shipping'
				),
				'default'     => 'yes',
			),

			'title' => array(
				'title'       => __( 'Title', 'awsa-shipping' ),
				'type'        => 'text',
				'placeholder' => __( 'Example: Air  Post', 'awsa-shipping' ),
				'description' => __(
					'You can specify an alternative title for the submission method',
					'awsa-shipping'
				),
				'default'     => $this->title,
				'desc_tip'    => true,
			),

			'shipping_icon'           => array(
				'title'       => __( 'Icon', 'awsa-shipping' ),
				'type'        => 'text',
				'placeholder' => __( 'Enter the image address', 'awsa-shipping' ),
				'description' => __(
					'The specified image will be displayed on the checkout and cart page if the settings are enabled',
					'awsa-shipping'
				),
				'default'     => '',
				'desc_tip'    => true,
			),

			/**
			 * Settings Enable/Disabled Cities
			 */
			'enable_conditions_title' => array(
				'title'       => __( 'Enable/Disable settings', 'awsa-shipping' ),
				'type'        => 'title',
				'description' => '',
				'desc_tip'    => true,
			),

			'default_conditions' => array(
				'title'       => __( 'Enable/Disable', 'awsa-shipping' ),
				'label'       => __( 'Enable default conditions', 'awsa-shipping' ),
				'type'        => 'checkbox',
				'description' => __(
					'If this option is enabled, this shipping method will be activated only if the customer buys from a store in his own city. Otherwise it is active for all cities.',
					'awsa-shipping'
				),
				'default'     => 'yes',
				'desc_tip'    => true,
			),

			'disabled_to_cities' => array(
				'title'       => __( 'Disable for cities', 'awsa-shipping' ),
				'type'        => 'multiselect',
				'description' => __(
					'Select the cities you want to disable. (Default condition applies if disabled)',
					'awsa-shipping'
				),
				'class'       => 'wc-enhanced-select',
				'options'     => $cities,
				'desc_tip'    => true,

			),
			'enabled_to_cities'  => array(
				'title'       => __( 'Enable for cities', 'awsa-shipping' ),
				'type'        => 'multiselect',
				'description' => __(
					'Select active cities. (If the default condition is disabled, you do not need to select cities)',
					'awsa-shipping'
				),
				'class'       => 'wc-enhanced-select',
				'options'     => $cities,
				'desc_tip'    => true,
			),

			'max_weight' => array(
				'title'             => __( 'Maximum weight', 'awsa-shipping' ),
				'type'              => 'number',
				'description'       => __( 'Maximum weight for sending shipments (optional)', 'awsa-shipping' ),
				'placeholder'       => __( 'Total shipment weight in grams', 'awsa-shipping' ),
				'custom_attributes' => array(
					'min' => 0,
				),
				'desc_tip'          => true,
			),

			/**
			 *  Shipping Cost
			 */
			'cost_title' => array(
				'title'       => __( 'Shipping cost', 'awsa-shipping' ),
				'type'        => 'title',
				'description' => __( 'From this section you can set shipping costs', 'awsa-shipping' ),
				'desc_tip'    => true,
			),

			'default_cost' => array(
				'title'       => __( 'Default cost', 'awsa-shipping' ),
				'type'        => 'number',
				'description' => __( 'This amount is considered the default shipping cost', 'awsa-shipping' ),
				'placeholder' => __( 'Shipping cost', 'awsa-shipping' ),
				'desc_tip'    => true,
			),

			'extra_cost_if_not_invalid_postal_code' => array(
				'title'       => __(
					'If the postal code is incorrect, an additional fee will be charged',
					'awsa-shipping'
				),
				'type'        => 'text',
				'placeholder' => __( 'Example: 10% OR 100000', 'awsa-shipping' ),
				'description' => __(
					'If the postal code is incorrect, the above amount will be added to the postage as a percentage or fixed',
					'awsa-shipping'
				),
				'desc_tip'    => true,
			),

			'extra_cost'      => array(
				'title'       => __( 'Extra cost', 'awsa-shipping' ),
				'type'        => 'text',
				'placeholder' => __( 'Example: 10% OR 100000', 'awsa-shipping' ),
				'description' => __(
					'Increase shipping cost for packaging or ... as a percentage or fixed amount',
					'awsa-shipping'
				),
				'desc_tip'    => true,
			),

			/**
			 *  Send Free Conditions
			 */
			'send_free_title' => array(
				'title'       => __( 'Free Shipping', 'awsa-shipping' ),
				'type'        => 'title',
				'description' => __( 'From this section you can specify the terms of free shipping', 'awsa-shipping' ),
				'desc_tip'    => true,
			),

			'min_price_for_send_free' => array(
				'title'       => __( 'Minimum purchase amount for free shipping', 'awsa-shipping' ),
				'type'        => 'number',
				'description' => __(
					'If you have several stores on the site, this feature will be checked and implemented for each store separately)',
					'awsa-shipping'
				),
				'placeholder' => __( 'Total purchases', 'awsa-shipping' ),
				'desc_tip'    => true,
			),

			'send_free_payment_method_in'          => array(
				'title'       => __( 'Free shipping for payment methods', 'awsa-shipping' ),
				'type'        => 'multiselect',
				'description' => __(
					'Free shipping if payment method was one of the selected method',
					'awsa-shipping'
				),
				'class'       => 'wc-enhanced-select',
				'options'     => $payment_methods,
				'desc_tip'    => true,
			),

			'send_free_if_is_first_order_for_user' => array(
				'title'       => __( 'Enable/Disable', 'awsa-shipping' ),
				'label'       => __( 'Free shipping if the user\'s first order', 'awsa-shipping' ),
				'type'        => 'checkbox',
				'description' => __( 'If this option is enabled, If the user is logged in and has not registered an order in the past, shipping is free.', 'awsa-shipping' ),
				'default'     => 'no',
				'desc_tip'    => true,
			),
		);

		$this->form_fields = apply_filters(
			'awsa_shipping_method_' . $this->id . '_form_fields',
			$form_fields,
			$this->id
		);
	}

	/**
	 * Check Is Enabled Shipping Method For this Destination Package
	 *
	 * @param boolean $available
	 * @param array   $package_info
	 * @param array   $settings
	 *
	 * @return boolean
	 */
	public function is_enabled_shipping_method_for_destination( $available, &$package_info, &$settings ) {

		$enabled_default_conditions = ( !isset( $settings['default_conditions'] ) || 'no' !== $settings['default_conditions'] ) ? true : false;
		if ( $enabled_default_conditions && 'current_city' !== $package_info['destination_type'] ) {
			$available = false;
		}

		$disabled_cities = isset( $settings['disabled_to_cities'] ) && is_array(
			$settings['disabled_to_cities']
		) ? $settings['disabled_to_cities'] : false;
		if ( $disabled_cities && in_array( $package_info['destination']['city_id'], $disabled_cities, false ) ) {
			$available = false;
		} else {
			/**
			 * Enable Shipping Method for Cities if not in disabled_cities
			 */
			$enabled_cities = isset( $settings['enabled_to_cities'] ) && is_array(
				$settings['enabled_to_cities']
			) ? $settings['enabled_to_cities'] : false;
			if ( $enabled_cities && in_array( $package_info['destination']['city_id'], $enabled_cities, false ) ) {
				$available = $available;
			}
		}

		return $available;
	}

	/**
	 * Check Max Weight Allowed
	 *
	 * @param float $weight
	 * @param array $settings
	 *
	 * @return boolean
	 */
	public function is_weight_allowed( $weight, &$settings ) {

		$available  = true;
		$max_weight = ( isset( $settings['max_weight'] ) && !empty( $settings['max_weight'] ) ) ? (float) $settings['max_weight'] : false;
		if ( $max_weight && $max_weight < $weight ) {
			$available = false;
		}

		return $available;
	}

	/**
	 * Check Available Shipping Method For Current Package
	 *
	 * @param bool  $available
	 * @param array $package_info
	 * @param array $settings
	 *
	 * @return boolean
	 */
	public function is_available_method( $available, &$package_info, &$settings ) {

		$is_enabled_for_destination = $this->is_enabled_shipping_method_for_destination(
			$available,
			$package_info,
			$settings
		);
		if ( $is_enabled_for_destination ) {
			/**
			 * Check Max Weight
			 */
			$available = $available && $this->is_weight_allowed( $package_info['weight'], $settings );
		} else {
			$available = false;
		}

		return $available;
	}

	/**
	 * Check Available Shipping Method For Current Package
	 *
	 * @param array $package
	 *
	 * @return boolean
	 */
	public function is_available( $package = array() ) {

		$available = $this->is_enabled();

		if ( !$this->instance_id && $available ) {
			$countries = is_array( $this->countries ) ? $this->countries : array();

			switch ( $this->availability ) {
				case 'specific':
				case 'including':
					$available = in_array(
						$package['destination']['country'],
						array_intersect( $countries, array_keys( WC()->countries->get_shipping_countries() ) )
					);
					break;
				case 'excluding':
					$available = in_array(
						$package['destination']['country'],
						array_diff( array_keys( WC()->countries->get_shipping_countries() ), $countries )
					);
					break;
				default:
					$available = in_array(
						$package['destination']['country'],
						array_keys( WC()->countries->get_shipping_countries() )
					);
					break;
			}

			if ( $available ) {
				$settings     = get_option( 'woocommerce_' . $this->id . '_settings' );
				$package_info = AWSA_Package_Info::get_info( $package ); // must cache
				$available    = $this->is_available_method( $available, $package_info, $settings );
			}
		}

		return apply_filters( 'woocommerce_shipping_' . $this->id . '_is_available', $available, $package, $this );
	}

	/**
	 * Calculate Shipping
	 *
	 * @param array $package
	 *
	 * @return void
	 */
	public function calculate_shipping( $package = array() ) {

		if ( !empty( $package ) ) {
			$shipping_method = $this->id;
			$cost            = AWSA_Calculate_Shipping_Cost::get_cost( 0, $package, $shipping_method );

			$rate = array(
				'id'       => $this->id,
				'label'    => ( 0 !== $cost ) ? $this->title : $this->title . ' ' . __( '( Free )', 'awsa-shipping' ),
				'cost'     => $cost,
				'calc_tax' => 'per_order',
			);

			$this->add_rate( $rate );
		}
	}


	/**
	 * Get WC Payment Methods
	 *
	 * @return array key => title
	 */
	public function get_payment_methods() {

		return awsa_get_payment_methods();
	}

	/**
	 * Get All Cities for Country group by $state_title--$state_key
	 *
	 * @param string      $country_id
	 * @param null|string $language
	 *
	 * @return array
	 */
	public function get_cities( $country_id = 'IR', $language = null ) {

		return AWSA_States_Cities::get_cities_group_by_state_title( $country_id, $language );
	}

}
