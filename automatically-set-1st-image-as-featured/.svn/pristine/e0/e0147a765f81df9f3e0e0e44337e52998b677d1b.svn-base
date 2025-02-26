<?php
/*
Plugin Name: Automatically Set 1st Image as Featured
Plugin URI: http://www.rou3a.com/automatically-set-1st-image-as-featured/
Description: Great Plugin, You 'll feel better and shorten the time... Task simply set the first image was uploaded to the post as a featured image.
Author: Ramez Bdiwi
Version: 1.0
Author URI: http://www.facebook.com/r.bdiwi
*/

// don't play.
! defined( 'ABSPATH' ) and exit;
if ( ! function_exists( 'fb_set_featured_image' ) ) {
	add_action( 'save_post', 'fb_set_featured_image' );
	function fb_set_featured_image() {
	
			if ( ! isset( $GLOBALS['post']->ID ) )
				return NULL;
				
            if ( has_post_thumbnail( get_the_ID() ) )
                return NULL;
				
            $args = array(
                'numberposts' => 1,
                'order' => 'ASC', // DESC for the last image
                'post_mime_type' => 'image',
                'post_parent' => get_the_ID(),
                'post_status' => NULL,
                'post_type' => 'attachment'
			);
			
            $attached_image = get_children( $args );
            if ( $attached_image ) {
                foreach ( $attached_image as $attachment_id => $attachment )
					set_post_thumbnail( get_the_ID(), $attachment_id );
			}
			
	}
}
?>