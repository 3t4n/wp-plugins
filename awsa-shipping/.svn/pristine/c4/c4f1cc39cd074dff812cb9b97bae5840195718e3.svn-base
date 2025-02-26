<?php

namespace AWSA_Core\APIs\Settings\Fields\Display;

class MultiSelect extends Select {

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

		$atts = $this->parse_args( $atts, $defaults );

		$placeholder = $atts['first_option_text'];
		$html = '<select id="' . esc_attr( $atts['id'] ) . '" name="' . esc_attr( $atts['name'] ) . '[]" class="awsa-multiselect2 ' . esc_attr( $atts['classes'] ) . '" multiple="multiple" data-placeholder="'.$placeholder.'">';
		$html .= $this->create_options( $atts['options'], $atts );
		$html .= '</select>';

		return $html;
	}

}