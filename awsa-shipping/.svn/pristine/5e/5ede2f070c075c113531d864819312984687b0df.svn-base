<?php

namespace AWSA_Core\APIs\Settings\Fields\Validate;

class Number extends Base {

	/**
	 * @param       $value
	 * @param array $atts
	 *
	 * @return \AWSA_Error|int|string
	 */
	public function sanitize_and_validate( $value, array $atts ) {

		$require = $atts['require'] ?? false;
		if ( true !== $require && empty( $value ) ) {

			return $value;
		}

		if ( !is_numeric( $value ) ) {
			return new \AWSA_Error(
				'error_type', __( 'The value is not numeric', 'awsa-shipping' )
			);
		}

		$check_min = !isset( $atts['min'] ) || ( isset( $atts['min'] ) && $value > $atts['min'] );
		$check_max = !isset( $atts['max'] ) || ( isset( $atts['max'] ) && $value < $atts['max'] );

		if ( !$check_min || !$check_max ) {
			return new \AWSA_Error(
				'error_range', __( 'The value is not in the specified range', 'awsa-shipping' )
			);
		}

		return $value;
	}

}