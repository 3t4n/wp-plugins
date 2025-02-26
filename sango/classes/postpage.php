<?php

/**
 * PostPage
 */
function add_tag_to_page_sangoplus() {
	$options = get_option( 'tagcloud_options' );
	if ( $options['tagcloudCheckbox1'] ) {
		register_taxonomy_for_object_type( 'post_tag', 'page' );
	}
}
add_action( 'init', 'add_tag_to_page_sangoplus' );

/**
 * $Wp_query = class
 */
function tags_archives_sangoplus( $wp_query ) {
	$options = get_option( 'tagcloud_options' );
	if ( $options['tagcloudCheckbox1'] ) {
		if ( $wp_query->get( 'tag' ) ) {
			$wp_query->set( 'post_type', 'any' );
		}
	}
}
add_action( 'pre_get_posts', 'tags_archives_sangoplus' );


/* class付与 */
$options = get_option( 'pagecss_options' );
if ( $options['pagecssCheckbox1'] ) {
	add_filter( 'body_class', 'sangoplus_imgfull' );
	function sangoplus_imgfull( $classes ) {
		$classes[] = 'sangoplus_imgfull';
		return $classes;
	}
}

$options = get_option( 'pagecss_options' );
if ( $options['pagecssCheckbox2'] ) {
	add_filter( 'body_class', 'sangoplus_fadein' );
	function sangoplus_fadein( $classes ) {
		$classes[] = 'sangoplus_fadein';
		return $classes;
	}
}
