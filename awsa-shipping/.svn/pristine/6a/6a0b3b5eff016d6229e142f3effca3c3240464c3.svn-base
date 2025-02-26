<?php
/**
 * Iran States and Cities
 *
 * @version 1.0.0
 * @author  Sajjad Aslani <sajjad.aslani74@gmail.com>
 * @package SajjadAslani
 */

/**
 * Iran States and Cities
 */
class AWSA_Iran_States_Cities {

	/**
	 * Return Iran States
	 *
	 * @param integer|string $state_id
	 * @param null|string    $key      key|id
	 * @param null|string    $language fa|en
	 *
	 * @return array|string
	 */
	public static function get_states( $state_id = 0, $key = null, $language = null ) {

		return AWSA_Iran_States::get_states( $state_id, $key, $language );
	}

	/**
	 * Get State Title
	 *
	 * @param string|int  $state_id
	 * @param string|null $language
	 *
	 * @return string
	 */
	public static function get_state_title( $state_id, $language = null ) {

		$title = AWSA_Iran_States::get_state_title( $state_id, $language );

		return $title;
	}

	/**
	 * Get p_state_id by state_title or state_key
	 *
	 * @param string|int  $state
	 * @param string|null $language
	 *
	 * @return int
	 */
	public static function get_state_id_by_title_or_state_key( $state, $language = null ) {

		$state = AWSA_Iran_States::get_state_id_by_title_or_state_key( $state, $language );

		return $state;
	}

	/**
	 * Get p_state_id by state_title or state_key
	 *
	 * @param string|int  $state
	 * @param string|null $language
	 *
	 * @return string
	 */
	public static function get_state_key_by_title_or_state_id( $state, $language = null ) {

		$state = AWSA_Iran_States::get_state_key_by_title_or_state_id( $state, $language );

		return $state;
	}

	/**
	 * Check is Beside 2 states
	 *
	 * @param string $state_id
	 * @param string $d_state_id
	 *
	 * @return boolean
	 */
	public static function is_beside( $state_id, $d_state_id ) {

		return AWSA_Iran_States::is_beside( $state_id, $d_state_id );
	}

	/**
	 * Get Cities group by p_state_id
	 *
	 * @param string|null $language
	 *
	 * @return array
	 */
	public static function get_cities_group_by_states( $language = null ) {

		return AWSA_Iran_Cities::get_cities_group_by_states( $language );
	}

	/**
	 * Get Cities group by p_state_id
	 *
	 * @param int|string  $state_id
	 * @param string|null $language
	 *
	 * @return array
	 */
	public static function get_cities( $state_id = null, $language = null ) {

		return AWSA_Iran_Cities::get_cities( $state_id, $language );
	}

	/**
	 * Check The City is Center Of State
	 *
	 * @param int|string $city
	 * @param int|string $state_id
	 *
	 * @return boolean|int
	 */
	public static function is_center_of_state( $city, $state_id ) {

		$city_id = self::get_city_id_by_title( $city, $state_id );

		return AWSA_Iran_Cities::is_center_of_state( $city_id );
	}

	/**
	 * Get city_id by Title
	 *
	 * @param string|int  $city
	 * @param string|int  $state_id
	 * @param string|null $language
	 *
	 * @return int
	 */
	public static function get_city_id_by_title( $city, $state_id, $language = null ) {

		return AWSA_Iran_Cities::get_city_id_by_title( $city, $state_id, $language );
	}

	/**
	 * Get City Title by Id
	 *
	 * @param int|string  $city_id
	 * @param string      $state_id
	 * @param string|null $language
	 *
	 * @return int
	 */
	public static function get_city_title_by_id( $city_id, $state_id, $language = null ) {

		return AWSA_Iran_Cities::get_city_title_by_id( $city_id, $state_id, $language );
	}

}
