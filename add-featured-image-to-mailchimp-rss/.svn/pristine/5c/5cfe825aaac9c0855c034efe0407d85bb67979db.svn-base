<?php /** 
* Plugin Name: Add Featured Image to MailChimp RSS
* Description: Automatically adds 600px featured images to your RSS feed for RSS-driven MailChimp templates
* Author: Worcester Web Studio
* Version: 0.2.1 */ 

add_theme_support( 'post-thumbnails' );
add_image_size( 'rss-thumb', 600, 400 ); // Soft Crop Mode

function wws_include_feat_img_in_rss( $content ) {
    global $post;
    if( has_post_thumbnail( $post->ID ) ) {
        $content = '<figure>' . get_the_post_thumbnail( $post->ID, 'rss-thumb' ) . '</figure>' . $content;
    }
    return $content;
}
add_filter( 'the_excerpt_rss', 'wws_include_feat_img_in_rss' );
add_filter( 'the_content_feed', 'wws_include_feat_img_in_rss' );

?>