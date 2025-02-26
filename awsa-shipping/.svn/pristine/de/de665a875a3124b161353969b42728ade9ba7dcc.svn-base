<?php

namespace AWSA_Core\APIs\Settings\Fields\Display;

class Input extends Base {

	/**
	 * Generate and Return HTML for Input
	 *
	 * @param array $atts
	 *
	 * @return string
	 */
	public function generate_html( array $atts ): string {

		$defaults = array(
			'type'        => 'text',
			'id'          => '',
			'name'        => '',
			'value'       => '',
			'classes'     => '',
			'placeholder' => '',
			'description' => '',
		);

		$atts = $this->parse_args( $atts, $defaults );

		$html = '<input type="' . esc_attr( $atts['type'] ) . '" id="' . esc_attr( $atts['id'] ) . '" name="' . esc_attr( $atts['name'] ) . '" class="' . esc_attr( $atts['classes'] ) . '" placeholder="' . esc_attr( $atts['placeholder'] ) . '" value="' . esc_attr( $atts['value'] ) . '" />';

		if ( !empty( $atts['description'] ) ) {

			$html .= $this->generate_description( $atts['description'] );
		}

		return $html;
	}

}