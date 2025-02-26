<?php

namespace TRS\AR;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Filter Runner class.
 * Separates the logic from the Action Runner, even though most of the code
 * is the same as Action Runner.
 *
 * Future expansions would include having a relatively extensive list
 * of actions and associated parameters for sanitization.
 * 
 * Inevitably, we could use a 'call_user_func' and its own apply_filters
 * much like we did in Net Profit to allow users to have their own
 * sanitization and adding their own unique number of arguments.
 * 
 * @since   1.0.0
 * @package TRS\AR
 */

class Filter_Runner {

	/**
	 * Filter running shortcode.
	 * At this point, we do not support allowing filters with aditional parameters.
	 * We are looking in to adding parameters in a block.
	 * 
	 * @since 1.0.0
	 */
	public function shortcode( $atts, $content = null ) {
		if ( ! is_admin() && ! ( defined( 'DOING_AJAX' ) && ! DOING_AJAX ) && ! ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
			$args = wp_parse_args( $atts, array( 'name' => '', 'content' => '' ) );
			$filterable = sanitize_text_field( $args['name'] );
			$filterable = empty( $filterable ) && isset( $args['filter'] ) ? sanitize_text_field( $args['filter'] ) : $filterable;
			if ( ! empty( $filterable ) ) {
				$content = wp_filter_post_kses( $args['content'] );
				return apply_filters( $filterable, $content );
			}
		}
		return '';
	}

}