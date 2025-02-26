<?php

namespace TRS\AR;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Action Runner class.
 * Currently a shortcode, plans to expand into a block.
 * Believe the blocks would allow more for arguments and flexible usage.
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

class Action_Runner {

	public function shortcode( $atts, $content = null ) {
		if ( ! is_admin() && ! ( defined( 'DOING_AJAX' ) && ! DOING_AJAX ) && ! ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
			$args = wp_parse_args( $atts, array( 'name' => '' ) );
			$actionable = sanitize_text_field( $args['name'] );
			$actionable = empty( $actionable ) && isset( $args['action'] ) ? sanitize_text_field( $args['action'] ) : $actionable;
			if ( ! empty( $actionable ) ) {
				do_action( $actionable );
				return;
			}
		}
		return '';
	}
}