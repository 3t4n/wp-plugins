<?php

namespace AWSA_Core\APIs\Settings\Fields\Display;

class Title extends Base {

	/**
	 * Generate and Return HTML for Input
	 *
	 * @param array $atts
	 *
	 * @return string
	 */
	public function generate_html( array $atts ): string {

		$defaults = array(
			'title'       => '',
			'id'          => '',
			'classes'     => '',
			'description' => '',
			'tag'         => 'h3',
		);

		$atts = $this->parse_args( $atts, $defaults );

		$tag  = esc_attr( $atts['tag'] );
		$html = '<' . $tag . ' id="' . esc_attr( $atts['id'] ) . '" class="' . esc_attr( $atts['classes'] ) . '" >'
		        . esc_attr( $atts['title'] ) .
		        '</' . $tag . '>';

		if ( !empty( $atts['description'] ) ) {

			$html .= $this->generate_description( $atts['description'] );
		}

		return $html;
	}

}