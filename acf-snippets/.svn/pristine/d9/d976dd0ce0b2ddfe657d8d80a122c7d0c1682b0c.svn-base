<?php
function acf_snippet_the_repeater( $selector = '', $postId = false, $args = null ) {

	$defaults = array(
		'template' => '',
		'wrap_before'   => '',
		'wrap_after'    => '',
		'empty_html'    => ''
	);

	$args = wp_parse_args( $args, $defaults );


	if ( have_rows( $selector, $postId ) ) {
		echo $args['wrap_before'];
		while ( have_rows( $selector, $postId ) ) {
			the_row();
			if ( ! empty( $args['template'] ) ) {
				if ( is_array( $args['template'] ) ) {
					get_template_part( $args['template'][0], ( isset( $args['template'][1] ) ? $args['template'][1] : null ) );
				} else {
					get_template_part( $args['template'] );
				}
			}
		}
		echo $args['wrap_after'];
	} else {
		echo $args['empty_html'];
	}

}