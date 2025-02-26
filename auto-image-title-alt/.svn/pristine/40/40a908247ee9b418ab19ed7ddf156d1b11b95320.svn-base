<?php
/*
Plugin Name: Auto Image Title & Alt
Plugin URI: https://wordpress.org/plugins/auto-image-title-alt
Description: Automatically add title and alt tags to any new image uploaded to you the media library. This will improve your SEO and save you time while following the accsessibility guidelines. This plugin will not affect your site performance at all.
Author: Diego de Guindos
Author URI: https://diegoguindos.com
Version: 1.1.0
*/

declare(strict_types=1);

// Automatically set the image Title, Alt-Text, Caption & Description upon upload
add_action( 'add_attachment', 'aita_image_meta_title_alt' );
function aita_image_meta_title_alt( $post_ID ) {

	// Check if attachment is an image
	if ( wp_attachment_is_image( $post_ID ) ) {

		// Get file name and clean it from non-alphanumerical characters
		$my_image_title = get_post( $post_ID )->post_title;
		$my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );

		// Convert to capital letter the first letter of each word
		$my_image_title = ucwords( strtolower( $my_image_title ) );

		// Create an awway with the image meta tags
		$my_image_meta = array(
			'ID'				=> $post_ID,
			'post_title'		=> $my_image_title,
			//'post_excerpt'	=> $my_image_title,
			//'post_content'	=> $my_image_title,
		);

		// Set the Alt Text tag
		update_post_meta( $post_ID, '_wp_attachment_image_alt', $my_image_title );

		// Set the title of the image
		wp_update_post( $my_image_meta );
	}
	
}