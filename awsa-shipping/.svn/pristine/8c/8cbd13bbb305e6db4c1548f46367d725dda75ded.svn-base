<?php

namespace AWSA_Core\APIs\Settings\Fields\Validate;

class MultiSelect extends Base {

	/**
	 * @param       $value
	 * @param array $atts
	 *
	 * @return array
	 */
	public function sanitize_and_validate( $value, array $atts ): array {

		$values = array();
		if ( is_array( $value ) ) {

			foreach ( $value as $k => $v ) {

				if ( !empty( $v ) ) {

					$values[ $v ] = sanitize_textarea_field( $v );
				}
			}
		}

		return $values;
	}

}