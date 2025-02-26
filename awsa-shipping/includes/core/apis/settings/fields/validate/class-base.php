<?php

namespace AWSA_Core\APIs\Settings\Fields\Validate;

abstract class Base {

	/**
	 * Generate and Return HTML
	 *
	 * @param       $value
	 * @param array $atts
	 *
	 * @return array|string|int|float|\AWSA_Error
	 */
	abstract public function sanitize_and_validate( $value, array $atts );

}