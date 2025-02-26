<?php
/*

Plugin Name:  Add Facebook Share Thumbnail + Meta
Plugin URI:   http://www.mindgears.de/2011/02/wordpress-plugin-add-facebook-share-thumbnail-meta/
Description:  Adds a perfect sized post thumbnail for Facebook sharing purposes as well as image_src and og:image meta tags.
Version:      1.2
Author:       Bernd Zolchhofer
Author URI:   http://www.mindgears.de
License:      GPL 2

	Copyright 2011  Bernd Zolchhofer  (email : burnt@mindgears.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
	
*/



if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'fbshare-thumb', 90, 90, true );
}

add_action('wp_head', 'fbsharethumbnail');

function fbsharethumbnail() {
	
	global $post;
	
	if (is_single() || is_page()) {
		if (function_exists("has_post_thumbnail") && has_post_thumbnail($post->ID)) {
			$thumb_id = get_post_thumbnail_id($post->ID);
			$image = wp_get_attachment_image_src($thumb_id, 'fbshare-thumb');
			$image = $image[0];

		}
	}
	
	if ($image) {
		if (strpos($image, '../') === 0) $image = substr($image,3);
		if (strpos($image, '/') === 0)   $image = substr($image,1);
		if (strpos($image,'http://') !== 0 && strpos($image, get_bloginfo('url')) !== 0)
			$image = (get_bloginfo('url')) . '/' . $image;
		echo '<link rel="image_src" href="' . esc_attr($image) . '" />';
		echo "\n";
		echo '<meta property="og:image" content="' . esc_attr($image) . '" />';
		echo "\n";
	}
	
}

?>