<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
if ( ! function_exists( 'avan_getoption' ) ) {
	/**
	 * Returns the value of the option with given name, if option doesn't exists function returns the default value (from second variable)
	 *
	 * @param string $option
	 * @param null $default
	 *
	 * @return mixed|null
	 */
	function avan_getoption( $option = '', $default = null ) {
		$avan_options = get_option( 'avanutilities_option' );
		return ( isset( $avan_options[ $option ] ) ) ? $avan_options[ $option ] : $default;
	}
}