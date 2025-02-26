<?php
/**
 * Shipping Functions
 *
 * @version           1.1.0
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @package           AWSA_Shipping
 */

/**
 * Get Store Address by seller_id
 *
 * @param integer $seller_id
 *
 * @return array
 */
function awsa_get_store_address( $seller_id = 0 ) {

	$store_address          = array();
	$only_from_site_address = false;
	if ( function_exists( 'awsa_shipping_get_settings' ) ) {
		$settings = awsa_shipping_get_settings();
		if ( isset( $settings['calculate-from-vendor-address'] ) && 'no' !== $settings['calculate-from-vendor-address'] ) {
			$only_from_site_address = true;
		}
	}

	if ( $only_from_site_address && $seller_id && !empty( $seller_id ) ) {
		if ( class_exists( 'Dokan_Pro' ) ) {
			$store_info = awsa_get_seller_info( $seller_id );
			if ( !empty( $store_info ) ) {
				$store_address = array(
					'country'   => !empty( $store_info['address']['country'] ) ? $store_info['address']['country'] : '',
					'state'     => !empty( $store_info['address']['state'] ) ? $store_info['address']['state'] : '',
					'city'      => !empty( $store_info['address']['city'] ) ? $store_info['address']['city'] : '',
					'seller_id' => (int) $seller_id,
				);
			}
		}
	} else {
		$d             = get_option( 'woocommerce_default_country' );
		$d             = explode( ':', $d );
		$store_address = array(
			'country'   => $d[0],
			'state'     => $d[1],
			'city'      => get_option( 'woocommerce_store_city' ),
			'seller_id' => 0,
		);
	}

	return apply_filters( 'awsa_get_store_address', $store_address, $seller_id );
}

/**
 * Convert State and City to Country_States_Cities Shipping Address
 *
 * @param array $address
 * @param null  $language
 *
 * @return array
 */
function awsa_shipping_get_address( array $address, $language = null ) {

	if ( !empty( $address['country'] ) ) {
		$country_id = $address['country'];
		$state      = $address['state'];
		$city       = $address['city'];

		/**
		 * Get state_id
		 */
		if ( is_numeric( $state ) ) {
			$state_key = awsa_get_state_key_by_title_or_state_id( $state, $country_id, $language );
			$state_id  = $state;
		} else {
			$state_id  = awsa_get_state_id_by_title_or_state_key( $state, $country_id, $language );
			$state_key = awsa_get_state_key_by_title_or_state_id( $state, $country_id, $language );
		}

		$address['state_id'] = $state_id;
		$address['state']    = $state_key;

		/**
		 * Get City_id
		 */
		if ( is_numeric( $city ) ) {
			$city_key = awsa_get_city_title_by_city_id( $city, $state_id, $country_id, $language );
			$city_id  = $city;
		} else {
			$city_id  = awsa_get_city_id_by_title( $city, $state_id, $country_id, $language );
			$city_key = awsa_get_city_title_by_city_id( $city, $state_id, $country_id, $language );
		}

		$address['city_id'] = $city_id;
		$address['city']    = $city_key;

	}

	return $address;
}

/* shippings functions start */
if ( !function_exists( 'awsa_is_beside' ) ) {
	/**
	 * Check is beside 2 state
	 *
	 * @param string|int $state_id
	 * @param string|int $d_state_id
	 *
	 * @return bool
	 */
	function awsa_is_beside( $state_id, $d_state_id ) {

		return AWSA_Iran_States_Cities::is_beside( $state_id, $d_state_id );
	}
}

if ( !function_exists( 'awsa_get_iran_states' ) ) {
	/**
	 * Get Iran States
	 *
	 * @param integer $state_id
	 * @param boolean $return_mix
	 *
	 * @return array|string
	 */
	function awsa_get_iran_states( $state_id = 0, $return_mix = true ) {

		return AWSA_Iran_States_Cities::get_states( $state_id, $return_mix );
	}
}

if ( !function_exists( 'awsa_get_country_cities' ) ) {
	/**
	 * Get Cities of The Country | The State
	 *
	 * @param string|int  $state_id
	 * @param string      $country_id
	 * @param string|null $language
	 *
	 * @return array
	 */
	function awsa_get_country_cities( $state_id = null, $country_id = 'IR', $language = null ) {

		return AWSA_States_Cities::get_cities( $state_id, $country_id, $language );
	}
}

if ( !function_exists( 'awsa_get_state_title' ) ) {
	/**
	 * Get State Title
	 *
	 * @param int         $state_id
	 * @param string      $country_id
	 * @param string|null $language
	 *
	 * @return string
	 */
	function awsa_get_state_title( $state_id, $country_id = 'IR', $language = null ) {

		return AWSA_States_Cities::get_state_title( $state_id, $country_id, $language );
	}
}

if ( !function_exists( 'awsa_get_state_id_by_title_or_state_key' ) ) {
	/**
	 * Get p_state_id by state_title or state_key
	 *
	 * @param string      $state
	 * @param string      $country_id
	 * @param string|null $language
	 *
	 * @return int
	 */
	function awsa_get_state_id_by_title_or_state_key( $state, $country_id = 'IR', $language = null ) {

		return AWSA_States_Cities::get_state_id_by_title_or_state_key( $state, $country_id, $language );
	}
}

if ( !function_exists( 'awsa_get_state_key_by_title_or_state_id' ) ) {
	/**
	 * Get state_key by state_title or state_key p_state_id
	 *
	 * @param string      $state
	 * @param string      $country
	 * @param string|null $language
	 *
	 * @return int
	 */
	function awsa_get_state_key_by_title_or_state_id( $state, $country_id = 'IR', $language = null ) {

		return AWSA_States_Cities::get_state_key_by_title_or_state_id( $state, $country_id, $language );
	}
}

if ( !function_exists( 'awsa_get_city_id_by_title' ) ) {
	/**
	 * Get city_id by title
	 *
	 * @param string $city
	 * @param int    $state_id
	 * @param string $country_id
	 * @param string $language
	 *
	 * @return int
	 */
	function awsa_get_city_id_by_title( $city, $state_id, $country_id = 'IR', $language = null ) {

		return AWSA_States_Cities::get_city_id_by_title( $city, $state_id, $country_id, $language );
	}
}

if ( !function_exists( 'awsa_get_city_title_by_city_id' ) ) {
	/**
	 * Get title by city_id
	 *
	 * @param string      $city
	 * @param int         $state_id
	 * @param string      $country_id
	 * @param null|string $language
	 *
	 * @return int
	 */
	function awsa_get_city_title_by_city_id( $city, $state_id, $country_id = 'IR', $language = null ) {

		return AWSA_States_Cities::get_city_title_by_id( $city, $state_id, $country_id, $language );
	}
}

if ( !function_exists( 'awsa_is_center_of_state' ) ) {
	/**
	 * Check The City is Center Of State
	 *
	 * @param int|string $city
	 * @param int|string $state
	 * @param string     $country_id
	 *
	 * @return bool
	 */
	function awsa_is_center_of_state( $city, $state, $country_id = 'IR' ) {

		return AWSA_States_Cities::is_center_of_state( $city, $state, $country_id );
	}
}


/* shippings functions end */
