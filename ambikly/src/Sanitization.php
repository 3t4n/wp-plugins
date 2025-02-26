<?php

namespace Ambikly;
class Sanitization {
	public static function sanitize( $raw_value = '', $input_type = 'text', $sanitize_callback = '' ) {
		$sanitized_value = '';

		switch ( $input_type ) {
			case 'text':
			case 'textarea':
			case 'select':
				$sanitized_value = sanitize_text_field( $raw_value );
				break;
			case 'multiselect':
				$sanitized_value = array_map( 'sanitize_text_field', $raw_value );
				break;
			case 'multicheckbox':
				$sanitized_value = array_map( 'sanitize_text_field', $raw_value );
				break;
			case "dropdown_pages":
				$sanitized_value = absint( $raw_value );
				break;
			case 'image':
				$sanitized_value = absint( $raw_value );
				break;
			case 'number':
				$sanitized_value = floatval( $raw_value );
				break;
			case 'checkbox':
				$sanitized_value = (boolean) $raw_value;
				break;
			default:
				$sanitized_value = sanitize_text_field( $raw_value );
				break;
		}

		if ( $sanitize_callback !== '' && is_callable( $sanitize_callback ) ) {
			$sanitized_value = $sanitize_callback( $raw_value );
		}

		return $sanitized_value;
	}
}