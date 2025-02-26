<?php
/**
 * Functions
 */

/**
 * Update Shipping Settings
 *
 * @param array $settings
 *
 * @return bool
 */
function awsa_shipping_update_settings( array $settings ): bool {

	return update_option( 'awsa_shipping_settings', $settings );
}

/**
 * Get Shipping Settings
 *
 * @param array $default
 *
 * @return array
 */
function awsa_shipping_get_settings( $default = array() ): array {

	if ( empty( $default ) ) {

		$default = array(
			'calculate-from-vendor-address' => 'no',
			'validate-postal-code'          => 'yes',
			'validate-mobile'               => 'yes',
			'product-min-weight'            => '',
			'shipping-icon'                 => '',
			'add-order-statuses'            => array(),
			'parcel-details-display'        => array(
				'thank-you',
				'view-order',
			),
			'hide-parcel-details'      => array(
				'not-require-shipping'
			)
		);
	}

	$settings = (array) get_option( 'awsa_shipping_settings', $default );

	return wp_parse_args($settings,$default);
}

/**
 * Add Weight if hasn't Weight
 *
 * @param float|int                $weight
 * @param WC_Order_Item|WC_Product $item
 *
 * @return float to gram
 */
function awsa_add_default_weight_for_products( $weight, $item ): float {

	if ( $weight <= 0 ) {

		$settings = awsa_shipping_get_settings();
		if ( !empty( $settings['product-min-weight'] ) ) {

			$weight = $settings['product-min-weight'];
		}
	}

	return (float) $weight;
}

/**
 * Filter for Add Shipping Icon to Cart and Checkout
 *
 * @param string           $label
 * @param WC_Shipping_Rate $method
 *
 * @since 1.0.0
 * @return string
 */
function awsa_shipping_filter_woocommerce_cart_shipping_method_full_label( $label, $method ) {

	$shipping_settings = awsa_shipping_get_settings();

	if ( isset( $shipping_settings['shipping-icon'] ) && 'yes' === $shipping_settings['shipping-icon'] ) {

		switch ( $method->id ) {
			case 'awsa-pishtaz':
			case 'awsa-sefareshi':
			case 'awsa-express':
			case 'awsa-air-delivery':
				$settings = get_option( 'woocommerce_' . $method->id . '_settings' );
				if ( isset( $settings['shipping_icon'] ) && !empty( $settings['shipping_icon'] ) ) {

					$img_url = esc_url( $settings['shipping_icon'] );
					$label   = '<img class="shipping_method_image" style="height:50px" src="' . $img_url . '">' . $label;
				}
				break;
		}
	}

	return $label;
}


/**
 * Update Parcel Code
 *
 * @param int             $order_id
 * @param int|string      $parcel_code
 * @param null|int|string $old_parcel_code
 *
 * @since 1.0.0
 * @return void
 */
function awsa_shipping_update_parcel_code( int $order_id, $parcel_code, $old_parcel_code = null ) {

	update_post_meta( $order_id, '_awsa_parcel_code', $parcel_code );

	do_action( 'awsa_shipping_changed_parcel_code', $order_id, $parcel_code, $old_parcel_code );
}

/**
 * Get Parcel Code
 *
 * @param int $order_id
 *
 * @since 1.0.0
 * @return int|string
 */
function awsa_shipping_get_parcel_code( $order_id ) {

	return get_post_meta( $order_id, '_awsa_parcel_code', true );
}

/**
 * Update WC Store City Setting
 *
 * @used  in install plugin
 * @since 1.1.0
 * @return void
 */
function awsa_shipping_update_store_city() {

	$store_city            = get_option( 'woocommerce_store_city' );
	$default_country_state = get_option( 'woocommerce_default_country' );
	$default_country_state = explode( ':', $default_country_state );
	$country_id            = $default_country_state[0] ?? null;
	$state_id              = $default_country_state[1] ?? null;
	$store_city_id         = awsa_get_city_id_by_title( $store_city, $state_id, $country_id );

	update_option( 'woocommerce_store_city', $store_city_id );
}

function awsa_shipping_update_parcel_codes_from_excel( $filename ) {

	$allowed_columns = array(
		'order_id',
		'parcel_code',
	);

	$rows = awsa_excel_reader( $filename, $allowed_columns );

	$i = 0;
	if ( is_array( $rows ) ) {

		foreach ( $rows as $row ) {

			$order_id    = $row['order_id'] ?? false;
			$parcel_code = $row['parcel_code'] ?? false;
			if ( false === $order_id || false === $parcel_code ) {

				return new AWSA_Error( 'columns', __('No forced columns found','awsa-shipping') );
			}

			if ( 'shop_order' !== get_post_type( $order_id ) ) {

				continue;
			}
			$i++;
			$parcel_code = trim( number_format( $parcel_code, 0, '', '' ) );
			awsa_shipping_update_parcel_code( $order_id, $parcel_code );
		}
	} else {

		return new AWSA_Error( 'empty_rows', __('No row found','awsa-shipping') );
	}

	return $i;
}