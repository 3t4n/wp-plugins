<?php
/**
 * Plugin Name: Dynamic Custom Header Replacement
 * Plugin URI: https://www.enteractie.nl
 * Description: Allows the Custom Header Image to be replaced by the post/page Featured image.
 * Author: enteractie - online exposure
 * Author URI: https://www.enteractie.nl
 * Version: 1.2
 */

function dchr_header_image_markup($html, $header, $attr) {
    if ( has_post_thumbnail() ) {
        $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );
		$attr['src'] = $thumbnail[0];
        $attr['width'] = $thumbnail[1];
        $attr['height'] = $thumbnail[2];
    }
    return '<img src="'.$attr['src'].'" width="'.$attr['width'].'" height="'.$attr['height'].'" alt="'.$attr['alt'].'">';
}
add_filter('get_header_image_tag', 'dchr_header_image_markup', 20, 3);

?>