<?php

/**
 * Calculate Shipping Cost for pishtaz|sefareshi|express
 */
class AWSA_Calculate_Shipping_Cost {

	/**
	 * Get Shipping Cost For AWSA Shipping Methods
	 *
	 * @param int    $cost
	 * @param mixed  $package
	 * @param string $shipping_method
	 *
	 * @return int
	 */
	public static function get_cost( $cost, &$package, $shipping_method ) {

		/**
		 * Check Is Allowed
		 */
		$is_allowed = self::is_allowed_shipping_method( $shipping_method );
		if ( !$is_allowed ) {
			return $cost;
		}

		$settings     = self::get_settings( $shipping_method );
		$package_info = self::get_package_info( $package );

		/**
		 * Check Is Free
		 */
		$is_free_shipping = self::is_free_shipping( $shipping_method, $package_info, $settings );
		if ( $is_free_shipping ) {
			return 0;
		}

		switch ( $shipping_method ) {
			case 'awsa-pishtaz':
			case 'awsa-sefareshi':
				$cost = apply_filters(
					'awsa_get_online_shipping_cost',
					false,
					$shipping_method,
					$package_info,
					$settings
				);
				if ( false === $cost ) {
					$cost = self::ir_post_calculate_cost( $shipping_method, $package_info, $settings );
				}
				break;
			case 'awsa-express':
				$cost = self::express_calculate_cost( $package_info, $settings );
				break;
			case 'awsa-air-delivery':
				$cost = self::air_delivery_calculate_cost( $package_info, $settings );
				break;
		}

		/**
		 * Add Extra Costs
		 */
		$cost = self::add_extra_costs( $cost, $shipping_method, $package_info, $settings );

		return (float) apply_filters(
			'awsa_get_calculated_shipping_cost',
			$cost,
			$shipping_method,
			$package_info,
			$settings
		);
	}

	/**
	 * Get Allowed Shipping Method
	 *
	 * @return array
	 */
	public static function get_allowed_shipping_methods() {

		return array(
			'awsa-pishtaz',
			'awsa-sefareshi',
			'awsa-express',
			'awsa-air-delivery',
		);
	}

	/**
	 * Check Is Shipping_method in allowed
	 *
	 * @param string $shipping_method
	 *
	 * @return boolean
	 */
	public static function is_allowed_shipping_method( $shipping_method ) {

		$allowed_shipping_methods = self::get_allowed_shipping_methods();
		/**
		 * Check shipping_method
		 */
		if ( in_array( $shipping_method, $allowed_shipping_methods, true ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Get Settings Shipping Method
	 *
	 * @param string $shipping_method
	 *
	 * @return array
	 */
	private static function get_settings( $shipping_method ) {

		return get_option( 'woocommerce_' . $shipping_method . '_settings' );
	}

	/**
	 * Get Package Info from $package
	 *
	 * @param mixed $package
	 *
	 * @return array
	 */
	private static function get_package_info( &$package ) {

		return AWSA_Package_Info::get_info( $package );
	}

	/**
	 * Check Is  Free Shipping
	 *
	 * @param string $shipping_method
	 * @param array  $package_info
	 * @param array  $settings
	 *
	 * @return boolean
	 */
	public static function is_free_shipping( $shipping_method, &$package_info, &$settings ) {

		/**
		 * Send Free If is Peyment Method is in Free List
		 */
		$payment_method_id      = isset( $package_info['payment_method_id'] ) ? $package_info['payment_method_id'] : false;
		$is_free_payment_method = self::is_payment_method_in_free_methods( $payment_method_id, $settings );
		if ( $is_free_payment_method ) {
			return true;
		}

		/**
		 * Send Free If is More than The Minimum Price for Send Free
		 */
		$is_upper_than_min_price_for_send_free = self::is_upper_than_min_price_for_send_free(
			$package_info['price'],
			$settings
		);
		if ( $is_upper_than_min_price_for_send_free ) {
			return true;
		}

		$is_first_order_for_current_user = self::is_first_order_for_current_user($settings);
		if($is_first_order_for_current_user){

			return true;
		}

		return false;
	}

	/**
	 * @param array $settings
	 *
	 * @return bool
	 */
	public static function is_first_order_for_current_user(&$settings){

		if(!is_user_logged_in()){

			return false;
		}

		$is_enable = $settings['send_free_if_is_first_order_for_user'] ?? '';

		if( 'yes' !== $is_enable){

			return false;
		}

		$customer_orders = get_posts( array(
			'numberposts' => 1,
			'meta_key'    => '_customer_user',
			'meta_value'  => get_current_user_id(),
			'post_type'   => wc_get_order_types(),
			'post_status' => array_keys( wc_get_order_statuses() ),
		) );

		if(empty($customer_orders)){

			return true;
		}

		return false;
	}

	/**
	 * Check is Payment_Method in Free Payment Methods
	 *
	 * @param string $payment_method_id
	 * @param array  $ettings
	 *
	 * @return boolean
	 */
	public static function is_payment_method_in_free_methods( $payment_method_id, &$settings ) {

		if ( $payment_method_id ) {
			$free_send_for_payment_methods = isset( $settings['send_free_payment_method_in'] ) && is_array(
				$settings['send_free_payment_method_in']
			) ? $settings['send_free_payment_method_in'] : false;

			if ( $free_send_for_payment_methods && in_array(
					$payment_method_id,
					$free_send_for_payment_methods,
					true
				) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Is Price Upper Than Min Price For Send Free
	 *
	 * @param int|float $price
	 * @param array     $settings
	 *
	 * @return boolean
	 */
	public static function is_upper_than_min_price_for_send_free( $price, &$settings ) {

		$min_price = isset( $settings['min_price_for_send_free'] ) && !empty( $settings['min_price_for_send_free'] ) ? $settings['min_price_for_send_free'] : false;
		if ( false !== $min_price && $min_price <= $price ) {
			return true;
		}

		return false;
	}

	/**
	 * Add Extra Costs
	 *
	 * @param float|int $cost
	 * @param string    $shipping_method
	 * @param array     $package_info
	 * @param array     $settings
	 *
	 * @return int|float
	 */
	public static function add_extra_costs( $cost, $shipping_method, &$package_info, &$settings ) {

		if ( !$package_info['is_valid_postal_code'] && isset( $settings['extra_cost_if_not_invalid_postal_code'] ) ) {
			$amount_or_percent = $settings['extra_cost_if_not_invalid_postal_code'];
			$cost              = self::add_extra_cost( $cost, $amount_or_percent );
		}

		if ( isset( $settings['extra_cost'] ) ) {
			$amount_or_percent = $settings['extra_cost'];
			$cost              = self::add_extra_cost( $cost, $amount_or_percent );
		}

		return $cost;
	}

	/**
	 *  Add Extra Cost
	 *
	 * @param int        $cost
	 * @param int|string $amount_or_percent
	 *
	 * @return int
	 */
	public static function add_extra_cost( $cost, $amount_or_percent ) {

		if ( !empty( $amount_or_percent ) ) {
			if ( false !== strpos( $amount_or_percent, '%' ) ) {
				$percent = str_replace( '%', '', $amount_or_percent );
				if ( is_numeric( $percent ) ) {
					$cost += ( $cost / 100 ) * $percent;
				}
			} else {
				$amount = $amount_or_percent;
				if ( is_numeric( $amount ) ) {
					$cost += $amount;
				}
			}
		}

		return $cost;
	}

	/**
	 * Get Shipping Cost of pishtaz | sefareshi
	 *
	 * @param string $shipping_method
	 * @param mixed  $package_info
	 * @param array  $settings
	 *
	 * @return int Converted to Rial
	 */
	public static function ir_post_calculate_cost( $shipping_method, &$package_info, &$settings ) {

		$store_city_is_center_of_state = isset( $package_info['store_address']['is_center_of_state'] ) && $package_info['store_address']['is_center_of_state'] ? true : false;
		$costs                         = self::ir_post_get_prices( $shipping_method, $store_city_is_center_of_state );
		$w_type = 5;
		if ( $package_info['weight'] >= 0 && $package_info['weight'] <= 500 ) {
			$w_type = 1;
		} elseif ( $package_info['weight'] > 500 && $package_info['weight'] <= 1000 ) {
			$w_type = 2;
		} elseif ( $package_info['weight'] > 1000 && $package_info['weight'] <= 2000 ) {
			$w_type = 3;
		} elseif ( $package_info['weight'] > 2000 && $package_info['weight'] <= 3000 ) {
			$w_type = 4;
		} elseif ( $package_info['weight'] > 3000 ) {
			$w_type = 5;
		}

		// if ( 'current_city' === $package_info['destination_type'] ) {
		// $package_info['destination_type'] = 'in_state';
		// }

		if ( in_array( $package_info['destination_type'], array( 'out_state', 'beside_state', 'in_state' ), true ) ) {
			$in_out_beside = str_replace( '_state', '', $package_info['destination_type'] );
			if ( in_array( $w_type, array( 1, 2, 3, 4 ), true ) ) {
				$cost = $costs[ $in_out_beside ][ $w_type ];
			} elseif ( $w_type === 5 ) {
				$cost = $costs[ $in_out_beside ][4];
				$cost += ceil( ( $package_info['weight'] - 3000 ) / 1000 ) * $costs[ $in_out_beside ][ $w_type ];
			}

			$bimeh         = 8000;
			$registeration = 5000 + 11000;
			$tax_percent   = 9;
			$wage_percent  = 3; // 1.5 is for current_city - 3 is for out_state and in_state

			$cost += ( $bimeh + $registeration );
			$cost += ( $cost * ( $tax_percent + $wage_percent ) / 100 );
			$cost = ( ceil( $cost / 1000 ) ) * 1000;
			$cost = awsa_convert_rial_to( $cost );

		} else {
			$cost = $settings['default_cost'];
			$cost = awsa_fa_to_en_number( $cost );
		}

		return (float) $cost;
	}

	/**
	 * Get Variables for Calculate Shipping Cost for pishtaz|sefareshi
	 *
	 * @param string $shipping_method
	 *
	 * @return array
	 */
	private static function ir_post_get_prices( $shipping_method, $center_of_state ) {

		$costs = array(
			'awsa-pishtaz'   => array(
				'center_of_state' => array(
					'in'     => array(
						1 => 63250,  // 500
						2 => 74000,  // 1000
						3 => 107800, // 2000
						4 => 135300, // 3000
						5 => 10000,  // each 1000 after 3000
					),
					'beside' => array(
						1 => 85800,  // 500
						2 => 110000, // 1000
						3 => 139700, // 2000
						4 => 139700, // 3000
						5 => 10000,  // each 1000 after 3000
					),
					'out'    => array(
						1 => 92400,  // 500
						2 => 123200, // 1000
						3 => 154000, // 2000
						4 => 154000, // 3000
						5 => 10000,  // each 1000 after 3000
					),
				),
				'other_cities'    => array(
					'in'     => array(
						1 => 57000,  // 500
						2 => 74000,  // 1000
						3 => 98000,  // 2000
						4 => 123000, // 3000
						5 => 25000,  // each 1000 after 3000

					),
					'beside' => array(
						1 => 78000,  // 500
						2 => 100000, // 1000
						3 => 127000, // 2000
						4 => 127000, // 3000
						5 => 25000,  // each 1000 after 3000
					),
					'out'    => array(
						1 => 84000,  // 500
						2 => 112000, // 1000
						3 => 140000, // 2000
						4 => 140000, // 3000
						5 => 25000,  // each 1000 after 3000
					),
				),
			),
			'awsa-sefareshi' => array(
				'center_of_state' => array(
					'in'     => array(
						1 => 40480, // 500
						2 => 53130, // 1000
						3 => 75900, // 2000
						4 => 73370, // 3000
						5 => 0,     // each 1000 after 3000 to 5000
					),
					'beside' => array(
						1 => 53900,  // 500
						2 => 74360,  // 1000
						3 => 96800,  // 2000
						4 => 118800, // 3000
						5 => 10000,  // each 1000 after 3000 to 5000
					),
					'out'    => array(
						1 => 58300,  // 500
						2 => 80080,  // 1000
						3 => 104500, // 2000
						4 => 127600, // 3000
						5 => 10000,  // each 1000 after 3000 to 5000
					),
				),
				'other_cities'    => array(
					'in'     => array(
						1 => 36800, // 500
						2 => 48300, // 1000
						3 => 69000, // 2000
						4 => 66700, // 3000
						5 => 0,     // each 1000 after 3000 to 5000

					),
					'beside' => array(
						1 => 49000,  // 500
						2 => 67600,  // 1000
						3 => 88000,  // 2000
						4 => 108000, // 3000
						5 => 10000,  // each 1000 after 3000 to 5000
					),
					'out'    => array(
						1 => 53000,  // 500
						2 => 72800,  // 1000
						3 => 95000,  // 2000
						4 => 116000, // 3000
						5 => 10000,  // each 1000 after 3000 to 5000
					),
				),
			),
		);

		return $center_of_state ? $costs[ $shipping_method ]['center_of_state'] : $costs[ $shipping_method ]['other_cities'];
	}

	/**
	 * Get Shipping Cost of Express Shipping Method
	 *
	 * @param array $package_info
	 * @param array $settings
	 *
	 * @return int
	 */
	public static function express_calculate_cost( &$package_info, &$settings ) {

		$default_cost = isset($settings['default_cost']) ? $settings['default_cost'] : false;
		$cost = apply_filters( 'awsa_express_get_custom_shipping_cost_city', false, $package_info, $settings );
		$cost = ( false !== $cost ) ? $cost : $default_cost;

		$cost = awsa_fa_to_en_number( $cost );

		return $cost;
	}

	/**
	 * Get Shipping Cost of Air Delivery Shipping Method
	 *
	 * @param array $package_info
	 * @param array $settings
	 *
	 * @return int
	 */
	public static function air_delivery_calculate_cost( &$package_info, &$settings ) {

		$default_cost = isset($settings['default_cost']) ? $settings['default_cost'] : false;
		$cost = apply_filters( 'awsa_air_delivery_get_custom_shipping_cost_city', false, $package_info, $settings );
		$cost = ( false !== $cost ) ? $cost : $default_cost;

		$cost = awsa_fa_to_en_number( $cost );

		return $cost;
	}

}
