<?php

namespace AWSA_Core\APIs\Settings\Fields\Display;

abstract class Base {

	/**
	 * @param $args
	 * @param $defaults
	 *
	 * @return array
	 */
	public function parse_args( $args, $defaults ): array {

		$args = wp_parse_args( $args, $defaults );

		return is_array( $args ) ? $args : array();
	}

	/**
	 * Generate and Return HTML description for Fields
	 *
	 * @param string $description
	 *
	 * @return string HTML
	 */
	public function generate_description( $description = '' ): ?string {

		if ( !empty( $description ) ) {

			$html = '<br/><span class="aw-field-description">' . $description . '</span>';
		}

		return $html ?? null;
	}

	/**
	 * Generate and Return HTML
	 *
	 * @param array $atts
	 *
	 * @return string HTML
	 */
	abstract public function generate_html( array $atts ): string;

}