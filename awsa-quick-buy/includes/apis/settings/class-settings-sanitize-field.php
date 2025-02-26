<?php
/**
 * Class AWSA_Settings_Sanitize_Field
 *
 * @package           AWSA_Core
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @version           1.0.1
 */

/**
 * Class AWSA_Settings_Sanitize_Field
 */
class AWSA_Settings_Sanitize_Field {
	/**
	 * Sanitize Input Fields
	 *
	 * @param array] $atts
	 * @return string|int|AWSA_Error
	 */
	public static function sanitize_input( $atts ) {
		$type  = $atts['type'];
		$name  = $atts['name'];
		$value = isset( $atts['value'] ) ? $atts['value'] : '';
		switch ( $type ) {
			case 'number':
				if ( is_numeric( $value ) ) {
					$check_min = ! isset( $atts['min'] ) || ( isset( $atts['min'] ) && $value > $atts['min'] ) ? true : false;
					$check_max = ! isset( $atts['max'] ) || ( isset( $atts['max'] ) && $value < $atts['max'] ) ? true : false;

					if ( ! $check_min || ! $check_max ) {
						$value = new AWSA_Error( 'error_range', __( 'The value is not in the specified range', 'awsa' ) );
					}
				}
				break;
			case 'select':
			case 'text':
				if ( ! empty( $value ) ) {
					$value = sanitize_textarea_field( $value );
				}
				break;
			case 'checkbox':
				$value = ! empty( $value ) ? 'yes' : 'no';
				break;
			case 'multicheckbox':
				if ( is_array( $value ) ) {
					foreach ( (array) $value as $k => $v ) {
						if ( ! empty( $v ) ) {
							$value[ $k ] = $k;
						}
					}
				} else {
					$value = '';
				}
				break;
		}

		return $value;
	}
}
