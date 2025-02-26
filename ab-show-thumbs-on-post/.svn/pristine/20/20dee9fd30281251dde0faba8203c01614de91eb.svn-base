<?php
   /*
   Plugin Name: AB Show Thumbs On Post
   Plugin URI: http://aleksandar.bjelosevic.info/abstop
   Description: Plugin that show featured image on post list
   Version: 1.00
   Author: Aleksandar Bjelosevic
   Author URI: http://aleksandar.bjelosevic.info
   License: GPL2
   */

function ab_show_thumb_add_pic_column($columns) {
    $columns['img'] = 'Featured Image';
    return $columns;
}

function ab_show_thumb_manage_pic_column($column_name, $post_id) {
    if( $column_name == 'img' ) {
        echo get_the_post_thumbnail($post_id, 'thumbnail');
    }
    return $column_name;
}

add_filter('manage_posts_columns', 'ab_show_thumb_add_pic_column');
add_filter('manage_posts_custom_column', 'ab_show_thumb_manage_pic_column', 10, 2);
?>