<?php

namespace AWSA_Core\APIs\Settings\Fields\Display;

class Html extends Base {

	/**
	 * Generate and Return HTML for Input
	 *
	 * @param array $atts
	 *
	 * @return string
	 */
	public function generate_html( array $atts ): string {

		$defaults = array(
			'type'        => 'html',
			'id'          => '',
			'classes'     => '',
			'description' => '',
			'html'        => '',
		);

		$atts = $this->parse_args( $atts, $defaults );

		$html = '<div id="' . esc_attr( $atts['id'] ) . '" class="' . esc_attr( $atts['classes'] ) . '">'
		        . $atts['html'] .
		        '</div>';

		if ( !empty( $atts['description'] ) ) {

			$html .= $this->generate_description( $atts['description'] );
		}

		return $html;
	}

}