<?php
/*
Plugin Name: Post Content Sharing
Plugin URI: http://support.ihomefinder.com/post-content-sharing-plugin/
Description: Provides contents of posts or pages inside of other Wordpress posts or pages
Version: 0.1
Author: iHomefinder, Inc.
Author URI: http://www.ihomefinder.com/
License: GPL2
*/

/*  Copyright 2011  iHomefinder, Inc.  (email : support@ihomefinder.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

add_shortcode( 'post-content-sharing', 'pcs_insert_content' );

function pcs_insert_content($atts, $content=null, $code="") {
	// if post_id shortcode argument is numeric
	if (is_numeric($atts['post_id'])) {
		// get the post object
		$post = get_post($atts['post_id']);
		// if post object retrieved
		if (isset($post)) {
			$content = $post->post_content;											// grab content
		  $content = wpautop( $content, '<br />');						// replace newline characters with HTML line breaks
		  $content = apply_filters('the_content', $content);	// needed to replace shortcode used by other plugins
		  return $content;																		// return post content for display
		} else {
			return '';
		}
	// otherwise display error
	} else {
		return "Cannot insert post: post_id must be numeric<br>\n";
	}
}

?>
