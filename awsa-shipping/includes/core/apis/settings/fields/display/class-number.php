<?php

namespace AWSA_Core\APIs\Settings\Fields\Display;

class Number extends Base {

	/**
	 * Generate and Return HTML for Input Number
	 *
	 * @param array $atts
	 *
	 * @return string HTML
	 */
	public function generate_html( array $atts ): string {

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

		$atts = $this->parse_args( $atts, $defaults );

		$min  = !is_null( $atts['min'] ) ? ' min="' . esc_attr( $atts['min'] ) . '" ' : '';
		$max  = !is_null( $atts['max'] ) ? ' max="' . esc_attr( $atts['max'] ) . '" ' : '';
		$html = '<input type="number" id="' . esc_attr( $atts['id'] ) . '" name="' . esc_attr( $atts['name'] ) . '" class="' . esc_attr( $atts['classes'] ) . '" placeholder="' . esc_attr( $atts['placeholder'] ) . '" value="' . esc_attr( $atts['value'] ) . '" ' . $min . ' ' . $max . ' />';

		if ( !empty( $atts['description'] ) ) {

			$html .= $this->generate_description( $atts['description'] );
		}

		return $html;
	}

}