<?php

/*
Plugin Name: Add featured image Column to the Posts Screen
Plugin URI: 
Description: This plugin is used for add a custom column field to post screen like post title,post category etc.This plugin is create a new column named "Featured Image" and the content is the particular post's feature image which is uploaded by the wp-admin Post page.When this plugin activated you will see the Featured Image box at bottom right side of Add New Post page and also you'll see the new "Featured Image" column on the manage Posts screen.
Version: 1.0
Author: Md. Sajed Ahmed
Author URI: 
License: GPLv2 or later
Text Domain: Add featured image Column to the Posts Screen
*/ 


  
// Add Custom Column to the Posts Screen

add_theme_support('post-thumbnails');
add_image_size('featured_preview', 55, 0, true);

// GET FEATURED IMAGE
function get_featured_image_by_post_id($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');
        return $post_thumbnail_img[0];
    }
}

// ADD NEW COLUMN
function columns_head_option($defaults) {
    $defaults['featured_image'] = 'Featured Image';
    return $defaults;
}
 
// SHOW THE FEATURED IMAGE
function columns_contents($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_featured_image = get_featured_image_by_post_id($post_ID);
        if ($post_featured_image) {
            echo '<img src="' . $post_featured_image . '" />';
        }
    }
}

add_filter('manage_posts_columns', 'columns_head_option');
add_action('manage_posts_custom_column', 'columns_contents', 10, 2);


//
// End of Custom Column to the Posts Screen


?>