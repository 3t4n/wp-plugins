<?php
defined( 'ABSPATH' ) or exit;

/**
 * Remove Yoast SEO metabox
 */
add_action( 'add_meta_boxes', 'cvmh_slideshow_3rd_remove_yoast_seo_meta_box', 100000 );
function cvmh_slideshow_3rd_remove_yoast_seo_meta_box() {
    remove_meta_box( 'wpseo_meta', CVMH_SLIDESHOW_SLUG, 'normal' );
}
    
/**
 * Hide Yoast SEO filter box
 * 
 * @global type $post
 */
add_action('admin_head-edit.php', 'cvmh_slideshow_3rd_hide_yoast_seo_filter_box' );
function cvmh_slideshow_3rd_hide_yoast_seo_filter_box() {
    global $post;
    if ( $post->post_type == CVMH_SLIDESHOW_SLUG ) :
        echo '
            <style type="text/css">
               #posts-filter .tablenav select[name=seo_filter] {
                    display:none;
                }
            </style>
        ';
    endif;
}
    
/**
 * Hide Yoast SEO score
 * 
 * @global type $post
 */
add_action( 'post_submitbox_start', 'cvmh_slideshow_3rd_hide_yoast_seo_score', 100000 );
function cvmh_slideshow_3rd_hide_yoast_seo_score() {
    global $post;
    if ( $post->post_type == CVMH_SLIDESHOW_SLUG ) :
        echo '
            <style type="text/css">
               #wpseo-score {
                    display:none;
                }
            </style>
        ';
    endif;
}