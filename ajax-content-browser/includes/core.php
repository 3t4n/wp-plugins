<?php
/**
 * Core Functions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get the date added options for date filter.
 */
function acb_get_date_options( $options = null ) {
	$array = array(
		'today'	  => esc_html__( 'In the last 24 hours', 'acb' ),
		'week'    => esc_html__( 'In the last week', 'acb' ),
		'month'   => esc_html__( 'In the last month', 'acb' ),
		'year'    => esc_html__( 'In the last year', 'acb' ),
	);

	return apply_filters( 'acb_get_date_options', $array );
}

/**
 * Get the sort options for a given wall.
 */
function acb_get_sort_options( $post_type, $options = null ) {
	$array = array(
		'newest'	=> esc_html__( 'Newest', 'acb' ),
		'abc_asc'   => esc_html__( 'Alphabetically (A to Z)', 'acb' ),
		'abc_desc'  => esc_html__( 'Alphabetically (Z to A)', 'acb' ),
		'views'	 	=> esc_html__( 'Most viewed', 'acb' ),
		'comments'	=> esc_html__( 'Most discussed', 'acb' ),
		'likes'	 	=> esc_html__( 'Most liked', 'acb' ),
	);

	// For product items only.
	if ( in_array( 'product', $post_type ) || in_array( 'download', $post_type ) ) {
		$array[ 'price_low' ] 	= esc_html__( 'Price (low to high)', 'acb' );
		$array[ 'price_high' ] 	= esc_html__( 'Price (high to low)', 'acb' );
		$array[ 'sales' ] 		= esc_html__( 'Top selling', 'acb' );
	}

	return apply_filters( 'acb_get_sort_options', $array );
}

/**
 * Get all post terms from all taxonomies for a given post.
 */
function acb_get_terms() {
	global $post;
	if ( ! isset( $post->ID ) ) {
		return;
	}
	$terms = array();
	$tax = get_post_taxonomies( $post->ID );
	foreach( $tax as $taxonomy ) {
		$tax_terms = get_the_terms( $post->ID , $taxonomy );
		if ( $tax_terms ) {
			foreach( $tax_terms as $term ) {
				$terms[] = $term;
			}
		}
	}
	return $terms;
}