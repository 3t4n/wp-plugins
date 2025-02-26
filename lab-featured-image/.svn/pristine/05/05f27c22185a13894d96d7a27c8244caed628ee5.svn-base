<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/* Require Featured Image */

$options = get_option( 'chec_settings' );
if ( $options['chec_checkbox_field_0'] == '1' ) {

function labfi_check_thumb($post_id) {
    // change to any custom post type
    if(get_post_type($post_id) != 'post')
        return;
    if ( !has_post_thumbnail( $post_id ) ) {
        // set a transient to show the users an admin message
        set_transient( "has_post_thumbnail", "no" );
        // unhook this function so it doesn't loop infinitely
        remove_action('save_post', 'labfi_check_thumb');
        // update the post set it to draft
        wp_update_post(array('ID' => $post_id, 'post_status' => 'draft'));
        add_action('save_post', 'labfi_check_thumb');
    } else {
        delete_transient( "has_post_thumbnail" );
    }
}
add_action('save_post', 'labfi_check_thumb');


function labfi_thumb_error()
{
    // check if the transient is set, and display the error message
    if (( get_transient( "has_post_thumbnail" ) == "no" ) || ( get_post_status ( $ID ) == "draft" )) {

?>
 <div class="notice notice-error is-dismissible">
  <p> <strong>
   <?php _e( 'Please set a Featured Image. This post cannot be published without one.','lab-fimage'); ?>
</strong> </p>
</div>

 <?php 
    delete_transient( "has_post_thumbnail" );
    }
}	
add_action('admin_notices', 'labfi_thumb_error');

}

/* Add Thumbnails in Manage Posts/Pages List */

$options = get_option( 'chec_settings' );
if ( $options['chec_checkbox_field_1'] == '1' ) {

if ( !function_exists('labfi_add_thumb_column') && function_exists('add_theme_support') ) {

    // for post and page
   add_theme_support('post-thumbnails', array( 'post', 'page' ) );

    function labfi_add_thumb_column($cols) {

        $cols['thumbnail'] = __('Featured Image');

        return $cols;
    }

    function labfi_add_thumb_value($column_name, $post_id) {

            $width = (int) 50;
            $height = (int) 50;

            if ( 'thumbnail' == $column_name ) {
                // thumbnail 
                $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
                // image from gallery
                $attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
                if ($thumbnail_id)
                    $thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
                elseif ($attachments) {
                    foreach ( $attachments as $attachment_id => $attachment ) {
                        $thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
                    }
                }
                    if ( isset($thumb) && $thumb ) {
                        echo $thumb;
                    } else {
                        echo __('None');
                    }
            }
    }

    // for posts
    add_filter( 'manage_posts_columns', 'labfi_add_thumb_column' );
    add_action( 'manage_posts_custom_column', 'labfi_add_thumb_value', 10, 2 );

    // for pages
    // add_filter( 'manage_pages_columns', 'labfi_add_thumb_column' );
    // add_action( 'manage_pages_custom_column', 'labfi_add_thumb_value', 10, 2 );
}
}
