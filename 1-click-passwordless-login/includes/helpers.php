<?php
/**
 * Common functions.
 *
 * @package  Xclickpw
 */

if ( ! function_exists( 'xclickpw_sanitize_settings' ) ) {
	/**
	 * Sanitizes the plugin settings dynamically.
	 *
	 * @param array $input  Array of plugin settings.
	 *
	 * @return  array
	 */
	function xclickpw_sanitize_settings( array $input ): array {
		$sanitized = array();

		foreach ( Xclickpw_Settings::SETTINGS_SCHEMA as $key => $type ) {
			if ( isset( $input[ $key ] ) ) {
				switch ( $type ) {
					case 'int':
						$sanitized[ $key ] = absint( $input[ $key ] );
						break;
					case 'bool':
						$sanitized[ $key ] = filter_var( $input[ $key ], FILTER_VALIDATE_BOOLEAN );
						break;
					case 'string':
						$sanitized[ $key ] = sanitize_text_field( $input[ $key ] );
						break;
					case 'select':
						if ( is_array( $input[ $key ] ) ) {
							$sanitized[ $key ] = array_map( 'sanitize_text_field', $input[ $key ] );
						} else {
							$sanitized[ $key ] = array();
						}
						break;
					default:
						$sanitized[ $key ] = $input[ $key ];
						break;
				}
			} else {
				$sanitized[ $key ] = Xclickpw_Settings::DEFAULT_OPTIONS[ $key ];
			}
		}

		return $sanitized;
	}
}
