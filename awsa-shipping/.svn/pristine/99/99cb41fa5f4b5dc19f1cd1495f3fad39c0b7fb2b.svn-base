<?php

namespace AWSA_Core\APIs\Settings\Fields\Validate;

class Input extends Base {

	/**
	 * @param       $value
	 * @param array $atts
	 *
	 * @return \AWSA_Error|int|string
	 */
	public function sanitize_and_validate( $value, array $atts ) {

		if ( !empty( $value ) ) {

			$value = sanitize_textarea_field( $value );
		}

		return $value;
	}

}