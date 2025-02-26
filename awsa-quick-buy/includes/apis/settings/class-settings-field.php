<?php
/**
 * Class AWSA_Settings_Field
 *
 * @package           AWSA_Core
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @version           1.0.1
 */

/**
 * Class AWSA_Settings_Field
 */
class AWSA_Settings_Field {
	/**
	 * Generate and Return HTML for Input Number
	 *
	 * @param array $atts
	 * @return string HTML
	 */
	public static function generate_number_html( $atts ) {

		$defaults = array(
			'type'        => '',
			'id'          => '',
			'name'        => '',
			'value'       => '',
			'classes'     => '',
			'placeholder' => '',
			'description' => '',
			'min'         => null,
			'max'         => null,
		);

		$atts = wp_parse_args(
			$atts,
			$defaults
		);

		$min  = ! is_null( $atts['min'] ) ? ' min="' . esc_attr( $atts['min'] ) . '" ' : '';
		$max  = ! is_null( $atts['max'] ) ? ' max="' . esc_attr( $atts['max'] ) . '" ' : '';
		$html = '<input type="number" id="' . esc_attr( $atts['id'] ) . '" name="' . esc_attr( $atts['name'] ) . '" class="' . esc_attr( $atts['classes'] ) . '" placeholder="' . esc_attr( $atts['placeholder'] ) . '" value="' . esc_attr( $atts['value'] ) . '" ' . $min . ' ' . $max . ' />';

		if ( ! empty( $atts['description'] ) ) {
			$html .= self::field_description( $atts['description'] );
		}

		return $html;
	}

	/**
	 * Generate and Return HTML for Input
	 *
	 * @param array $atts
	 * @return string
	 */
	public static function generate_input_html( $atts ) {

		$defaults = array(
			'type'        => '',
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

		$html = '<input type="' . esc_attr( $atts['type'] ) . '" id="' . esc_attr( $atts['id'] ) . '" name="' . esc_attr( $atts['name'] ) . '" class="' . esc_attr( $atts['classes'] ) . '" placeholder="' . esc_attr( $atts['placeholder'] ) . '" value="' . esc_attr( $atts['value'] ) . '" />';

		if ( ! empty( $atts['description'] ) ) {
			$html .= self::field_description( $atts['description'] );
		}

		return $html;
	}

	/**
	 * Generate and Return HTML for MultiCheckbox
	 *
	 * @param array $atts
	 * @return string HTML
	 */
	public static function generate_multicheckbox_html( $atts ) {
		/**
		 * array(
		 *      'id' => '',
		 *      'name' => '',
		 *      'label' => '',
		 *      'value' => array(),
		 *      'description' => '',
		 *      'current_value' => '',
		 * )
		 */
		$html        = '';
		$description = $atts['description'];
		unset( $atts['description'] );

		if ( isset( $atts['value'] ) && is_array( $atts['value'] ) ) {
			$checkboxes = $atts['value'];
			unset( $atts['value'] );

			$ch_atts = $atts;
			foreach ( $checkboxes as $id => $checkbox ) {
				$ch_atts['value'] = $checkbox['value'];
				$ch_atts['label'] = $checkbox['label'];
				$ch_atts['class'] = isset( $checkbox['class'] ) ? $checkbox['class'] : $atts['class'];
				$ch_atts['id']    = $atts['id'] . '--' . $id;
				$ch_atts['name']  = $atts['name'] . '[' . $ch_atts['value'] . ']';

				$current_value  = $ch_atts['value'];
				$checked_values = isset( $atts['current_value'] ) && is_array( $atts['current_value'] ) ? $atts['current_value'] : array();
				if ( in_array( $current_value, $checked_values, false ) ) {
					$ch_atts['current_value'] = 'yes';
				} else {
					$ch_atts['current_value'] = 'no';
				}
				$html .= self::generate_checkbox_html( $ch_atts );
			}
		} else {
			$html .= self::generate_checkbox_html( $atts );
		}

		$html .= self::field_description( $description );

		return $html;
	}

	/**
	 * Generate and Return HTML for Checkbox
	 *
	 * @param array $atts
	 * @return string HTML
	 */
	public static function generate_checkbox_html( $atts ) {
		$checked = isset( $atts['current_value'] ) && 'yes' === $atts['current_value'] ? true : false;
		$checked = checked( true, $checked, false );
		$classes = isset( $atts['class'] ) && ! empty( $atts['class'] ) ? $atts['class'] : '';

		$html = '<label class="' . esc_attr( $atts['label_classes'] ) . '" for="' . esc_attr( $atts['id'] ) . '">
					<input type="checkbox" id="' . esc_attr( $atts['id'] ) . '" name="' . esc_attr( $atts['name'] ) . '" class="' . esc_attr( $classes ) . '" value="' . esc_attr( $atts['value'] ) . '" ' . $checked . ' />'
					. $atts['label']
				. '</label>';

		if ( ! empty( $atts['description'] ) ) {
			$html .= self::field_description( $atts['description'] );
		}

		return $html;
	}

	/**
	 * Generate Select html
	 *
	 * @param array $atts
	 * @return string
	 */
	public static function generate_select_html( $atts ) {

		$defaults = array(
			'type'              => '',
			'id'                => '',
			'name'              => '',
			'value'             => '',
			'options'           => array(),
			'first_option_text' => __( 'Choose an option', 'awsa' ),
			'classes'           => '',
			'description'       => '',
		);

		$atts = wp_parse_args(
			$atts,
			$defaults
		);

		$html  = '<select id="' . esc_attr( $atts['id'] ) . '" name="' . esc_attr( $atts['name'] ) . '" class="awsa-select2 ' . esc_attr( $atts['classes'] ) . '">';
		$html .= '<option value="">' . $atts['first_option_text'] . '</option>';
		foreach ( (array) $atts['options'] as $k => $v ) {
			$selected = selected( $atts['value'], $k, false );
			$html    .= '<option value="' . esc_attr( $k ) . '" ' . $selected . '>' . esc_html( $v ) . '</option>';
		}
		$html .= '</select>';

		if ( ! empty( $atts['description'] ) ) {
			$html .= self::field_description( $atts['description'] );
		}

		return $html;
	}

	/**
	 * Generate and Return HTML description for Fields
	 *
	 * @param string $description
	 * @return string HTML
	 */
	public static function field_description( $description = '' ) {
		if ( ! empty( $description ) ) {
			return '<br/><span class="aw-field-description">' . $description . '</span>';
		} else {
			return '';
		}
	}
}
