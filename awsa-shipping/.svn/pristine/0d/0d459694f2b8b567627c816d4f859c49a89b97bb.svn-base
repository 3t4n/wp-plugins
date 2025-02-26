<?php

namespace AWSA_Core\APIs\Settings\Fields\Validate;

class Checkbox extends Base {

	/**
	 * @param array|string $value
	 * @param array        $atts
	 *
	 * @return \AWSA_Error|int|string
	 */
	public function sanitize_and_validate( $value, array $atts ) {

		$checkboxes = $atts['checkboxes'] ?? false;
		if ( is_array( $value ) ) {
			foreach ( $value as $k => $v ) {

				if ( !empty( $v ) ) {

					$value[ $k ] = $k;
				}
			}
		} elseif ( is_array( $checkboxes ) ) {

			$value = array();
		} else {

			$value = !empty( $value ) ? 'yes' : 'no';
		}

		return $value;
	}

}