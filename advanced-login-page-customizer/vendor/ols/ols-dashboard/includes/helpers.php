<?php
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'ols_dashboard_recursive_parse_args' ) ) {
	/**
	 * function to parse recursive args.
	 *
	 * @param array $args
	 * @param array $defaults
	 * @return array
	 */
	function ols_dashboard_recursive_parse_args( $args = array(), $defaults = array() ) {
		$new_args = (array) $defaults;

		foreach ( $args as $key => $value ) {
			if ( is_array( $value ) && isset( $new_args[ $key ] ) ) {
				$new_args[ $key ] = ols_dashboard_recursive_parse_args( $value, $new_args[ $key ] );
			} else {
				$new_args[ $key ] = $value;
			}
		}
		return $new_args;
	}
}
