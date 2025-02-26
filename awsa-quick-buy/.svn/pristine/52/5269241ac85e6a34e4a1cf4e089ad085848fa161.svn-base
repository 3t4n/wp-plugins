<?php
/**
 * Class AWSA_Settings_API
 *
 * @package           AWSA_Core
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @version           1.0.0
 */

/**
 * Class AWSA_Settings_API
 */
class AWSA_Settings_API {
	/**
	 * Genatate Checkbox or MultiCheckbox Field HTML
	 *
	 * @param array $atts
	 * @return string
	 */
	public static function generate_checkbox_html( $atts ) {
		$defaults = array(
			'type'          => '',
			'id'            => '',
			'name'          => '',
			'value'         => '',
			'classes'       => '',
			'label_classes' => '',
			'label'         => '',
			'checked'       => false,
			'description'   => '',
		);

		$atts = wp_parse_args(
			$atts,
			$defaults
		);

		if ( isset( $atts['value'] ) && is_array( $atts['value'] ) ) {
			return AWSA_Settings_Field::generate_multicheckbox_html( $atts );
		} else {
			return AWSA_Settings_Field::generate_checkbox_html( $atts );
		}
	}

	/**
	 * Genatate Input Field HTML
	 *
	 * @param array $atts
	 * @return string
	 */
	public static function generate_input_html( $atts ) {
		$defaults = array(
			'type'        => 'text',
			'id'          => '',
			'name'        => '',
			'value'       => '',
			'classes'     => '',
			'placeholder' => '',
			'description' => '',
		);

		$atts = wp_parse_args(
			$atts,
			$defaults
		);

		switch ( $atts['type'] ) {
			case 'number':
				$html = AWSA_Settings_Field::generate_number_html( $atts );
				break;
			case 'text':
			default:
				$html = AWSA_Settings_Field::generate_input_html( $atts );
				break;
		}

		return $html;

	}

	/**
	 * Genatate Input Field HTML
	 *
	 * @param array $atts
	 * @return string
	 */
	public static function generate_select_html( $atts ) {
		$defaults = array(
			'type'        => 'type',
			'id'          => '',
			'name'        => '',
			'value'       => '',
			'options'     => array(),
			// 'first_option_text' => '',
			'classes'     => '',
			'placeholder' => '',
			'description' => '',
		);

		$atts = wp_parse_args(
			$atts,
			$defaults
		);

		$html = AWSA_Settings_Field::generate_select_html( $atts );

		return $html;

	}



	/**
	 * Genatate Field HTML
	 *
	 * @param array $field_atts
	 * @return string
	 */
	public static function generate_field_html( $field_atts ) {
		$html = '';
		$type = isset( $field_atts['type'] ) ? $field_atts['type'] : 'text';
		switch ( $type ) {
			case 'checkbox':
			case 'multicheckbox':
				$html = self::generate_checkbox_html( $field_atts );
				break;
			case 'number':
			case 'text':
				$html = self::generate_input_html( $field_atts );
				break;
			case 'select':
				$html = self::generate_select_html( $field_atts );
				break;
		}

		return $html;
	}

	/**
	 * Sanitize Field
	 *
	 * @param array $field_atts
	 * @return string
	 */
	public static function sanitize_field( $field_atts ) {
		$html = '';
		$type = isset( $field_atts['type'] ) ? $field_atts['type'] : 'text';
		switch ( $type ) {
			case 'checkbox':
			case 'multicheckbox':
			case 'number':
			case 'text':
			case 'select':
				$html = AWSA_Settings_Sanitize_Field::sanitize_input( $field_atts );
				break;
		}

		return $html;
	}

}
