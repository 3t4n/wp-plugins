<?php
/**
 * Template Functions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load the default item template and pass custom content type.
 */
function acb_load_template( $args = array() ) {
	$post_type = get_post_type();

	switch( $post_type ) :
		case 'product' :
			if ( function_exists( 'wc_clean' ) ) {
				$template = 'wooproduct';
			}
		break;
		case 'download' :
			if ( function_exists( 'edd_install' ) ) {
				$template = 'eddproduct';
			}
		break;
	endswitch;

	// Default template.
	if ( empty( $template ) ) {
		$template = 'post';
	}

	// Display the template.
	acb_get_template( "item.php", array( 'post_type' => $post_type, 'template' => $template ) + $args );
}

/**
 * Print the grid data attributes.
 */
function acb_print_grid_data( $args ) {
	if ( empty( $args ) ) {
		return;
	}
	$output = '';
	foreach( $args as $key => $value ) {
		if ( is_array( $value ) ) {
			$output .= ' data-' . esc_attr( $key ) . '="' . implode( '::', acb_clean( $value ) ) . '"';
		} else {
			$output .= ' data-' . esc_attr( $key ) . '="' . esc_attr( $value ) . '"';
		}
	}
	echo $output;
}

/**
 * Display a SVG icon from the sprite.
 */
function acb_svg( $icon = '' ) {
	$html = '<svg class="acb-svg"><use xlink:href="'. esc_url( acb()->plugin_url() ) . '/assets/svg/icons.svg#' . esc_attr( $icon ) . '" /></svg>';

	// can be used for custom icon output.
	return apply_filters( 'acb_svg_html', $html, $icon );
}

/**
 * Get the state of a toggle in custom filters.
 */
function acb_toggle_state( $args, $specific = null ) {
	extract( $args );

	if ( isset( $toggle_all ) && $toggle_all === 'yes' ) {
		return 'minimized';
	}

	if ( isset( $args[ 'toggle_' . $specific ] ) && $args[ 'toggle_' . $specific ] === 'yes' ) {
		return 'minimized';
	}

	return 'expanded';
}