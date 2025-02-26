<?php
/*
* Plugin Name: autometa's CATAG
* Description: It reproduces post categories and tags in posts and it generates a cloud mixing categories and tags of posts simply via: [cats] and [tags] and [catag].
* Version: 2.2
* Author: JorgeAmVF
* Author URI: https://profiles.wordpress.org/jorgeamvf/
* License: GPL2
 
autometa's CATAG is developed by JorgeAmVF in order to improve the quality of Quaestio.org
and it is freely provided with the intent to help other developers to fulfill
their needs.
 
autometa's CATAG is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
autometa's CATAG is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with autometa's CATAG. If not, see http://www.gnu.org/licenses/old-licenses/gpl-2.0.html.
*/

// [cats] = (post) categories
function autometa_post_categories( $atts, $content = null ) {
	global $post;
	$am_cats = '<span id="cats" class="autometa">' .get_the_category_list( $separator = ' ', $post->ID ) . '</span>';
	return $am_cats;
}
add_shortcode( "cats", "autometa_post_categories" );

// [tags] = (post) tags
function autometa_post_tags( $atts, $content = null ) {
	global $post;
	$am_tags = '<span id="tags" class="autometa">' . get_the_term_list( $post->ID, 'post_tag', $separator = ' ' ) . '</span>';
	return $am_tags;
}
add_shortcode( "tags", "autometa_post_tags" );

// [catag] = (post) categories & tags
function autometa_post_taxonomies( $echo = false ) {
	if ( function_exists( 'wp_tag_cloud') )
		$am_catag  = '<span id="catag" class="autometa">' . wp_tag_cloud( array(
			'number' => 0,
			'orderby' => 'count',
			'order' => 'RAND',
			'taxonomy' => array(
				'post_tag',
				'category'
			),
		) ) . '</span>';
	return $am_catag;
}
add_shortcode( "catag", "autometa_post_taxonomies" );
?>
