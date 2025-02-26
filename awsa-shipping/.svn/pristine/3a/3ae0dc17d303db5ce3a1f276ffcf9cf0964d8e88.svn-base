<?php

namespace AWSA_Core\APIs\Settings;

/**
 * Class Settings_API
 *
 * @since   1.0.0
 * @version 1.0.0
 * @package AWSA_Core\APIs\Settings
 */
class Settings_API {

	/**
	 * Generate and Return HTML
	 *
	 * @param $atts
	 *
	 * @return string|null
	 */
	public static function generate_field_html( $atts ): ?string {

		$type = $atts['type'] ?? false;
		if ( $type && $fg = Settings_Field::factory( $type ) ) {

			$html = $fg->generate_html( $atts );
		}

		return $html ?? null;
	}

	/**
	 * Sanitize Field
	 *
	 * @param array $field_atts
	 *
	 * @return array|string|int|float|\AWSA_Error
	 */
	public static function sanitize_field( array $field_atts ) {

		$type  = $field_atts['type'] ?? 'text';
		$name  = $field_atts['name'] ?? null;
		$value = $field_atts['value'] ?? '';
		if ( $type && $fv = Validate_Field::factory( $type ) ) {

			$v = $fv->sanitize_and_validate( $value, $field_atts );
		}

		return $v ?? $value;
	}

}
