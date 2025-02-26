<?php
function acf_snippet_get_link( $selector = '', $postId = false, $args = null ) {

	$defaults = array(
		'class' => '',
		'id' => '',
		'title' => ''
	);
	$args = wp_parse_args( $args, $defaults );

	if ( $postId === true ) {
		$link = get_sub_field( $selector );
	} else {
		$link = get_field( $selector, $postId );
	}

	if ( empty( $link ) or !is_array( $link ) ) {
		return false;
	}

	$output = '<a 
					href="'.$link['url'].'"'.
	          ( !empty( $link['target'] ) ? ' target="'.$link['target'].'"' : '' ) .
	          ( !empty( $args['class'] ) ? ' class="'.$args['class'].'"' : '' ) .
	          ( !empty( $args['id'] ) ? ' id="'.$args['id'].'"' : '' ) .
	          ( !empty( $args['title'] ) ? ' title="'.$args['title'].'"' : '' ) .
	          '>'.$link['title'].'</a>';

	$output = apply_filters( 'acf_snippet_get_link', $output );

	return $output;

}

function acf_snippet_the_link( $selector = '', $postId = false, $args = null ) {

	echo acf_snippet_get_link( $selector, $postId, $args );

}