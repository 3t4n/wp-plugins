<?php
/**
 * Class WC States Cities
 *
 * Replace States and convert input city to select in Checkout
 *
 * @version           1.0.0
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @package           AWSA_Shipping
 */

/**
 * Class WC States Cities
 */
class AWSA_WC_States_Cities {

	/**
	 * Add Actions and Filters for Replace Woocommerce States and Cities
	 *
	 * @return void
	 */
	public static function init(): void {

		/**
		 * Filter States
		 */
		add_filter( 'woocommerce_states', __CLASS__ . '::states', 99 );

		/**
		 * Customize Checkout Fields
		 */
		add_filter( 'woocommerce_checkout_fields', __CLASS__ . '::checkout_fields', 99 );

		/**
		 * Display City Field in Checkout
		 */
		add_filter( 'woocommerce_form_field_city', __CLASS__ . '::form_field_city', 99, 4 );

		/**
		 * Replace City_id and State_id by title in Address
		 */
		add_filter( 'woocommerce_formatted_address_replacements', __CLASS__ . '::formatted_address_replacements', 9999, 2 );

		/**
		 * Refresh Shipping Methods
		 */
		add_action( 'woocommerce_checkout_update_order_review', __CLASS__ . '::refresh_shipping_methods', 999, 1 );
		add_action( 'woocommerce_review_order_before_payment', __CLASS__ . '::refresh_checkout_on_payment_methods_change' );

		/**
		 * Add City JS Scripts
		 */
		add_action( 'wp_enqueue_scripts', __CLASS__ . '::load_scripts', 99 );
	}

	/**
	 * Replace States
	 *
	 * @param array $s
	 *
	 * @return array
	 */
	public static function states( $s = array() ) {

		$language = awsa_get_lang_locale();
		if ( !empty( $s['IR'] ) && 'fa' === $language ) {
			return $s;
		}

		$states = AWSA_States_Cities::get_states();
		/**
		 * key is string example THR
		 * id is number example 1
		 */
		$states = array_column( $states, $language, 'key' );
		asort( $states );
		$s['IR'] = $states;

		return $s;
	}

	/**
	 * Replace Address ids by Title
	 *
	 * @param array $d_args
	 * @param array $args
	 *
	 * @return mixed
	 */
	public static function formatted_address_replacements( $d_args, $args ) {

		$d_args['{state}'] = awsa_get_state_title( $args['state'], $args['country'] );
		$d_args['{city}']  = awsa_get_city_title_by_city_id( $args['city'], $args['state'], $args['country'] );

		// $d_args['{state_code}'] = awsa_get_state_id_by_title_or_state_key( $args['state'], $args['country'] );
		// $d_args['{state}'] = awsa_get_state_title( $args['state'], $args['country'] );
		// $d_args['{city}']  = awsa_get_city_title_by_city_id( $args['city'], $args['state'], $args['country'] );

		return $d_args;
	}

	/**
	 * Customize Checkout Field
	 *
	 * @param array $fields
	 *
	 * @return array
	 */
	public static function checkout_fields( $fields ) {

		foreach ( array( 'billing', 'shipping' ) as $type ) {
			$fields[ $type ][ $type . '_city' ]['type']    = 'city';
			$fields[ $type ][ $type . '_city' ]['label']   = __( 'City', 'awsa-shipping' );
			$fields[ $type ][ $type . '_city' ]['options'] = array();

			$fields[ $type ][ $type . '_state' ]['class'][] = 'form-row-first';
			$fields[ $type ][ $type . '_city' ]['class'][]  = 'form-row-last';

			$fields[ $type ][ $type . '_state' ]['class'][] = 'address-field';
			$fields[ $type ][ $type . '_city' ]['class'][]  = 'address-field';
		}

		$fields['billing']['billing_phone']['label']    = __( 'Mobile', 'awsa-shipping' );
		$fields['billing']['billing_phone']['validate'] = array( 'mobile' );

		return $fields;
	}

	/**
	 * Get Country Cities
	 *
	 * @param string $country_id
	 *
	 * @return array
	 */
	public static function get_country_cities( $country_id ) {

		$cities = awsa_get_country_cities( null, $country_id );

		return $cities;
	}

	/**
	 * Build HTML Field City
	 *
	 * @param string     $field
	 * @param string     $key
	 * @param array      $args
	 * @param int|string $value
	 *
	 * @return string
	 */
	public static function form_field_city( $field, $key, $args, $value ): string {

		/* Do we need a clear div? */
		if ( ( !empty( $args['clear'] ) ) ) {
			$after = '<div class="clear"></div>';
		} else {
			$after = '';
		}

		/* Required markup */
		if ( $args['required'] ) {
			$args['class'][] = 'validate-required';
			$required        = ' <abbr class="required" title="' . esc_attr__( 'required', 'woocommerce' ) . '">*</abbr>';
		} else {
			$required = '';
		}

		/* Custom attribute handling */
		$custom_attributes = array();

		if ( !empty( $args['custom_attributes'] ) && is_array( $args['custom_attributes'] ) ) {
			foreach ( $args['custom_attributes'] as $attribute => $attribute_value ) {
				$custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $attribute_value ) . '"';
			}
		}

		/* Validate classes */
		if ( !empty( $args['validate'] ) ) {
			foreach ( $args['validate'] as $validate ) {
				$args['class'][] = 'validate-' . $validate;
			}
		}

		/* field p and label */
		$field = '<p class="form-row ' . esc_attr( implode( ' ', $args['class'] ) ) . '" id="' . esc_attr( $args['id'] ) . '_field">';
		if ( $args['label'] ) {
			$field .= '<label for="' . esc_attr( $args['id'] ) . '" class="' . esc_attr( implode( ' ', $args['label_class'] ) ) . '">' . $args['label'] . $required . '</label>';
		}

		/* Get Country */
		$country_key          = ( $key === 'billing_city' ) ? 'billing_country' : 'shipping_country';
		$current_country_code = WC()->checkout->get_value( $country_key );

		$state_key  = ( $key === 'billing_city' ) ? 'billing_state' : 'shipping_state';
		$current_sc = WC()->checkout->get_value( $state_key );
		$current_sc = awsa_get_state_key_by_title_or_state_id( $current_sc, $current_country_code );

		$city_key     = ( $key === 'billing_city' ) ? 'billing_city' : 'shipping_city';
		$current_city = WC()->checkout->get_value( $city_key );
		$current_city = awsa_get_city_id_by_title( $current_city, $current_sc, $current_country_code );

		/* Get country cities */
		$cities = self::get_country_cities( $current_country_code );

		if ( is_array( $cities ) ) {
			$field .= '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="city_select state_select' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . ' placeholder="' . esc_attr( $args['placeholder'] ) . '">
			    <option value="">' . __( 'Select an option&hellip;', 'woocommerce' ) . '</option>';

			$primary_key = self::get_cities_primary_key();
			if ( isset( $cities[ $current_sc ] ) ) {
				foreach ( (array) $cities[ $current_sc ] as $id => $city_name ) {
					$c_id  = ( 'id' === $primary_key ) ? $id : $city_name;
					$field .= '<option value="' . esc_attr( $c_id ) . '" ' . selected(
									$current_city,
									$id,
									false
							) . '>' . $city_name . '</option>';
				}
			}
			$field .= '</select>';
		} else {

			$field .= '<input type="text" class="input-text ' . esc_attr(
							implode(
									' ',
									$args['input_class']
							)
					) . '" value="' . esc_attr( $current_city ) . '"  placeholder="' . esc_attr(
							  $args['placeholder']
					  ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" ' . implode(
							  ' ',
							  $custom_attributes
					  ) . ' />';
		}

		/* field description and close wrapper */
		if ( $args['description'] ) {
			$field .= '<span class="description">' . esc_attr( $args['description'] ) . '</span>';
		}

		$field .= '</p>' . $after;

		return $field;
	}

	/**
	 * Refresh Shipping Methods
	 *
	 * @param array $post_data
	 *
	 * @return void
	 */
	public static function refresh_shipping_methods( $post_data ): void {

		$bool = true;
		if ( WC()->session->get( 'chosen_payment_method' ) ) {
			$bool = false;
		}

		// Mandatory to make it work with shipping methods
		foreach ( WC()->cart->get_shipping_packages() as $package_key => $package ) {
			WC()->session->set( 'shipping_for_package_' . $package_key, $bool );
		}
		WC()->cart->calculate_shipping();
	}

	/**
	 * Refresh Shipping Methods by Change Payment_Method
	 *
	 * @return void
	 */
	public static function refresh_checkout_on_payment_methods_change(): void {

		?>
		<script type="text/javascript">
			(function ($) {
				$('form.checkout').on('change', 'input[name^="payment_method"]', function () {
					$('body').trigger('update_checkout');
					setTimeout(function () {
						$('body').trigger('update_checkout');
					}, 1500);
				});
			})(jQuery);
		</script>
		<?php
	}

	/**
	 * Get Primary key for Cities
	 *
	 * @return string
	 */
	public static function get_cities_primary_key(): string {

		return 'id'; // id || 'value'
	}

	/**
	 * Add Style and Scripts
	 *
	 * @return void
	 */
	public static function load_scripts(): void {

		if ( is_cart() || is_checkout() || is_wc_endpoint_url( 'edit-address' ) ) {
			wp_enqueue_script(
					'awsa-shipping-city-select',
					AWSA_SHIPPING_PU_JS . 'city-select.js',
					array(
							'jquery',
							'woocommerce',
					),
					'1.0.0',
					true
			);

			$cities = json_encode(
					array(
							'IR' => self::get_country_cities( 'IR' ),
					)
			);
			wp_localize_script(
					'awsa-shipping-city-select',
					'awsa_wc_city_select_params',
					array(
							'cities'                => $cities,
							'i18n_select_city_text' => esc_attr__( 'Select an option&hellip;', 'woocommerce' ),
							'id'                    => self::get_cities_primary_key(),
					)
			);
		}

		if ( function_exists( 'awsa_dokan_is_paged' ) && awsa_dokan_is_paged( 'dashboard' ) ) {
			wp_enqueue_script(
					'awsa-shipping-city-select-dokan',
					AWSA_SHIPPING_PU_JS . 'city-select-dokan.js',
					array(
							'jquery',
							'woocommerce',
					),
					'1.0.0',
					true
			);

			$cities = json_encode(
					array(
							'IR' => self::get_country_cities( 'IR' ),
					)
			);

			wp_localize_script(
					'awsa-shipping-city-select-dokan',
					'awsa_dokan_city_select_params',
					array(
							'cities'                => $cities,
							'i18n_select_city_text' => esc_attr__( 'Select an option&hellip;', 'woocommerce' ),
							'id'                    => self::get_cities_primary_key(),
					)
			);
		}
	}

}
