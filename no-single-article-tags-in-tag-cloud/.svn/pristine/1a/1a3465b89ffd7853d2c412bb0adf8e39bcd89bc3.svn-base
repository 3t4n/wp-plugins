<?php
/*
Plugin Name: No Single Article Tags in Tag Cloud
Description: Removes tags with only one article from the tag cloud widget.
Version: 1.0.1
Author: Merten Peetz
License: GPLv2
*/

function nsatitg_tag_cloud_sort( $tags ) {
	$new_tags = array();
	foreach ( $tags as $tag ) {
		if ( $tag->count > 1 ) {
			$new_tags[] = $tag;
		}
	}
	return $new_tags;
}
add_filter( 'tag_cloud_sort', 'nsatitg_tag_cloud_sort' );
