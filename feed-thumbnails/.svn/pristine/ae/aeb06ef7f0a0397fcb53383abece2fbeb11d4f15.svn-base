<?php
/*
Plugin Name:  Feed Thumbnails
Description:  Adds your post thumbnails to your feed as enclosures.
Plugin URI:   http://lud.icro.us/wordpress-plugin-feed-thumbnails/
Version:      1.2
Author:       John Blackbourn
Author URI:   http://johnblackbourn.com/

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

*/

function feed_thumbnails() {

	if ( function_exists( 'get_the_image' ) and ( $thumb = get_the_image('format=array&echo=0') ) ) {
		$thumb[0] = $thumb['url'];
	} else if ( function_exists( 'has_post_thumbnail' ) and has_post_thumbnail() ) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'post-thumbnail' );
	} else if ( function_exists( 'get_post_thumbnail_src' ) ) {
		$thumb = get_post_thumbnail_src();
		if ( preg_match( '|^<img src="([^"]+)"|', $thumb[0], $m ) )
			$thumb[0] = $m[1];
	} else {
		$thumb = false;
	}

	if ( !empty( $thumb ) ) {
		echo "\t" . '<enclosure url="' . $thumb[0] . '" />' . "\n";
	}

}

add_action( 'rss2_item', 'feed_thumbnails' );

?>