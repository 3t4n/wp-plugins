<?php

namespace AWSA_Core\APIs\Settings\Fields\Display;

class Checkbox extends Base {

	/**
	 * Generate and Return HTML for MultiCheckbox or Checkbox
	 *
	 * @param array $atts
	 *
	 * @return string HTML
	 */
	public function generate_html( array $atts ): string {

		$defaults = array(
			'type'          => '',
			'id'            => '',
			'name'          => '',
			'value'         => '',
			//'checkboxes'         => '',
			'classes'       => '',
			'label_classes' => '',
			'label'         => '',
			'checked'       => false,
			'description'   => '',
		);

		$atts = $this->parse_args( $atts, $defaults );

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

		if ( isset( $atts['checkboxes'] ) && is_array( $atts['checkboxes'] ) ) {

			$checkboxes = $atts['checkboxes'];
			unset( $atts['checkboxes'] );
			$current_values = $atts['value'];

			$ch_atts = $atts;
			foreach ( $checkboxes as $id => $checkbox ) {

				$ch_atts['value'] = $checkbox['value'];
				$ch_atts['label'] = $checkbox['label'];
				$ch_atts['class'] = $checkbox['class'] ?? $atts['class'];
				$ch_atts['id']    = $atts['id'] . '--' . $id;
				$ch_atts['name']  = $atts['name'] . '[' . $ch_atts['value'] . ']';

				$current_value  = $ch_atts['value'];
				$current_values = is_array( $current_values ) && !empty( $current_values ) ? $current_values : array();
				if ( in_array( $current_value, $current_values, false ) ) {

					$ch_atts['current_value'] = 'yes';
				} else {

					$ch_atts['current_value'] = 'no';
				}
				$html .= $this->generate_checkbox_html( $ch_atts );
			}
		} else {

			$atts['current_value'] = $atts['value'];
			$html                  .= $this->generate_checkbox_html( $atts );
		}

		$html .= $this->generate_description( $description );


		return $html;
	}

	/**
	 * Generate and Return HTML for Checkbox
	 *
	 * @param array $atts
	 *
	 * @return string HTML
	 */
	public function generate_checkbox_html( array $atts ): string {

		$checked = isset( $atts['current_value'] ) && 'yes' === $atts['current_value'];
		$checked = checked( true, $checked, false );
		$classes = isset( $atts['class'] ) && !empty( $atts['class'] ) ? $atts['class'] : '';

		return '<label class="' . esc_attr( $atts['label_classes'] ) . '" for="' . esc_attr( $atts['id'] ) . '">
					<input type="checkbox" id="' . esc_attr( $atts['id'] ) . '" name="' . esc_attr( $atts['name'] ) . '" class="' . esc_attr( $classes ) . '" value="' . esc_attr( $atts['value'] ) . '" ' . $checked . ' />'
		            . $atts['label'] .
		       '</label>';

	}

}