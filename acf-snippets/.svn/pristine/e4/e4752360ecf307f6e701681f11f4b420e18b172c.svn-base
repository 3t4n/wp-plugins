<?php
function acf_snippet_the_flexible_content( $selector = '', $postId = false, $args = null ) {

	$defaults = array(
		'templates'     => array()
	);

	$args = wp_parse_args( $args, $defaults );

	while ( the_flexible_field( $selector, $postId ) ) {
		$layout = get_row_layout();
		if ( is_array( $args['templates'][$layout] ) ) {
			get_template_part( $args['templates'][$layout][0], ( isset( $args['templates'][$layout][1] ) ? $args['templates'][$layout][1] : null ) );
		} else {
			get_template_part( $args['templates'][$layout] );
		}
	}

}