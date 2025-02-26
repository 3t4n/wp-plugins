<?php

namespace AWSA_Core\APIs\Settings\Fields\Display;

class Select extends Base {

	/**
	 * Create select options
	 * @param $options
	 * @param $atts
	 *
	 * @return string
	 */
	public function create_options( $options, $atts ): string {

		$html = '';
		foreach ( (array) $options as $k => $v ) {

			if ( is_array( $v ) ) {

				$html .= '<optgroup label="' . $k . '">';
				$html .= $this->create_options( $v, $atts );
				$html .= '</optgroup>';

			} else {
				if ( is_array( $atts['value'] ) ) {

					$in_selected = in_array( $k, $atts['value'], false );
					$selected    = selected( true, $in_selected, false );
				} else {

					$selected = selected( $atts['value'], $k, false );
				}
				$html .= '<option value="' . esc_attr( $k ) . '" ' . $selected . '>' . esc_html( $v ) . '</option>';
			}

		}

		return $html;
	}

	/**
	 * Generate Select html
	 *
	 * @param array $atts
	 *
	 * @return string
	 */
	public function generate_html( array $atts ): string {

		$defaults = array(
			'type'              => 'select',
			'id'                => '',
			'name'              => '',
			'value'             => '',
			'options'           => array(),
			'first_option_text' => __( 'Choose an option', 'awsa-shipping' ),
			'classes'           => '',
			'description'       => '',
		);

		$atts        = $this->parse_args( $atts, $defaults );
		$placeholder = $atts['first_option_text'];
		$html        = '<select id="' . esc_attr( $atts['id'] ) . '" name="' . esc_attr( $atts['name'] ) . '" class="awsa-select2 ' . esc_attr( $atts['classes'] ) . '" data-placeholder="' . $placeholder . '">';
		$html        .= $this->create_options( $atts['options'], $atts );
		$html        .= '</select>';

		return $html;
	}

}