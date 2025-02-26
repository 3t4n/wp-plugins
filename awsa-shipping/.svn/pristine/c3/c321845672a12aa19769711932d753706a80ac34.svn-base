<?php
/**
 * States and Cities
 *
 * @version 1.0.0
 * @author  Sajjad Aslani <sajjad.aslani74@gmail.com>
 * @package SajjadAslani
 */

/**
 * Iran States and Cities
 */
class AWSA_States_Cities {

	/**
	 * Return Iran States
	 *
	 * @param integer|string $state_id
	 * @param string         $country_id
	 * @param null|string    $language
	 * @param null|string    $key
	 *
	 * @return array|string
	 */
	public static function get_states( $state_id = 0, $country_id = 'IR', $language = null, $key = null ) {

		$states = '';
		if ( is_null( $language ) ) {
			$language = awsa_get_lang_locale();
		}

		switch ( $country_id ) {
			case 'IR':
				$states = AWSA_Iran_States::get_states( $state_id, $key, $language );
				break;
		}

		return apply_filters( 'awsa_get_country_states', $states, $state_id, $country_id, $language );
	}

	/**
	 * Get State Title
	 *
	 * @param string|int  $state_id
	 * @param string      $country_id
	 * @param null|string $language
	 *
	 * @return string
	 */
	public static function get_state_title( $state_id, $country_id = 'IR', $language = null ) {

		switch ( $country_id ) {
			case 'IR':
				$title = AWSA_Iran_States::get_state_title( $state_id, $language );
				break;
		}

		return $title ?? $state_id;
	}

	/**
	 * Get p_state_id by state_title or state_key
	 *
	 * @param string|int  $state
	 * @param string      $country_id
	 * @param null|string $language
	 *
	 * @return int
	 */
	public static function get_state_id_by_title_or_state_key( $state, $country_id = 'IR', $language = null ) {

		switch ( $country_id ) {
			case 'IR':
				$state = AWSA_Iran_States::get_state_id_by_title_or_state_key( $state, $language );
				break;
		}

		return $state;
	}

	/**
	 * Get p_state_id by state_title or state_key
	 *
	 * @param string|int  $state
	 * @param string      $country_id
	 * @param null|string $language
	 *
	 * @return string
	 */
	public static function get_state_key_by_title_or_state_id( $state, $country_id, $language = null ) {

		switch ( $country_id ) {
			case 'IR':
				$state = AWSA_Iran_States::get_state_key_by_title_or_state_id( $state, $language );
				break;
		}

		return $state;
	}

	/**
	 * Check is Beside 2 states
	 *
	 * @param string $state_id
	 * @param string $d_state_id
	 * @param string $country_id
	 *
	 * @return boolean
	 */
	public static function is_beside( $state_id, $d_state_id, $country_id = 'IR' ) {

		$is_beside = false;
		switch ( $country_id ) {
			case 'IR':
				$is_beside = AWSA_Iran_States::is_beside( $state_id, $d_state_id );
				break;
		}

		return $is_beside;
	}

	/**
	 * Get Cities group by p_state_id
	 *
	 * @param string      $country_id
	 * @param null|string $language
	 *
	 * @return array
	 */
	public static function get_cities_group_by_states( $country_id = 'IR', $language = null ) {

		$cities_group_by_states = array();
		switch ( $country_id ) {
			case 'IR':
				$cities_group_by_states = AWSA_Iran_States_Cities::get_cities_group_by_states( $language );
				break;
		}

		return apply_filters(
			'awsa_get_country_states_cities_group_by_states',
			$cities_group_by_states,
			$country_id,
			$language
		);
	}

	/**
	 * Get Cities group by p_state_id
	 *
	 * @param int|string  $state_id
	 * @param string      $country_id
	 * @param null|string $language
	 *
	 * @return array
	 */
	public static function get_cities( $state_id = null, $country_id = 'IR', $language = null ) {

		$cities = array();
		switch ( $country_id ) {
			case 'IR':
				$cities = AWSA_Iran_States_Cities::get_cities( $state_id, $language );
				break;
		}

		return apply_filters( 'awsa_get_country_states_cities', $cities, $country_id, $language );
	}

	/**
	 * Check The City is Center Of State
	 *
	 * @param int|string $city
	 * @param int|string $state_id
	 * @param string     $country_id
	 *
	 * @return boolean|int
	 */
	public static function is_center_of_state( $city, $state_id, $country_id = 'IR' ) {

		$is_center_of_state = false;
		$city_id = self::get_city_id_by_title( $city, $state_id, $country_id );
		switch ( $country_id ) {
			case 'IR':
				$is_center_of_state = AWSA_Iran_Cities::is_center_of_state( $city_id );
				break;
		}

		return $is_center_of_state;
	}

	/**
	 * Get city_id by Title
	 *
	 * @param string|int  $city
	 * @param string|int  $state_id
	 * @param string      $country_id
	 * @param null|string $language
	 *
	 * @return int
	 */
	public static function get_city_id_by_title( $city, $state_id, $country_id = 'IR', $language = null ) {

		$city_id = $city;
		switch ( $country_id ) {
			case 'IR':
				$city_id = AWSA_Iran_Cities::get_city_id_by_title( $city, $state_id, $language );
				break;
		}

		return $city_id;
	}


	/**
	 * Get City Title by Id
	 *
	 * @param int|string  $city_id
	 * @param string      $state_id
	 * @param string      $country_id
	 * @param null|string $language
	 *
	 * @return int
	 */
	public static function get_city_title_by_id( $city_id, $state_id, $country_id = 'IR', $language = null ) {

		switch ( $country_id ) {
			case 'IR':
				$title = AWSA_Iran_Cities::get_city_title_by_id( $city_id, $state_id, $language );
				break;
		}

		return isset( $title ) ? $title : $city_id;
	}


	/**
	 * Get All Cities for Country group by $state_title--$state_key
	 *
	 * @param string      $country_id
	 * @param null|string $language
	 *
	 * @return array
	 */
	public static function get_cities_group_by_state_title( $country_id = 'IR', $language = null ): array {

		global $awsa_country_cities;

		$language = is_null( $language ) ? awsa_get_lang_locale() : $language;
		if ( !isset( $awsa_country_cities[ $country_id ][ $language ] ) ) {

			$states     = self::get_states( 0, $country_id, $language );
			$all_cities = self::get_cities_group_by_states( $country_id, $language );
			$c          = array();
			foreach ( $states as $state_key => $state ) {
				$state_id        = $state['key'];
				$state_title     = $state[ $language ];
				$group_key       = "{$state_title}--{$state_key}";
				$c[ $group_key ] = array();
				$cities          = $all_cities[ $state_id ] ?? array();
				foreach ( $cities as $city_id => $city ) {

					$c[ $group_key ][ $city_id ] = $city;
				}
			}
			$awsa_country_cities[ $country_id ][ $language ] = $c;
		}

		return (array) ( $awsa_country_cities[ $country_id ][ $language ] ?? array() );
	}

}
