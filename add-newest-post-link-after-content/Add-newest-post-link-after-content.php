<?php
/**
* Plugin Name: Add newest post link after content
* Plugin URI: https://www.nmisr.com/
* Description: This is the very first plugin I ever created.
* Version: 1.0
* Author: Abdelrahman Ellithy
* Author URI: https://www.klma.org/
**/

function newest_post_1link(){
    global $post;
    $placeholder = $post;
    $args = array(
        'numberposts'     => 1,
        'orderby'         => 'post_date',
        'order'           => 'DESC',
        'post_status'     => 'publish' );
    $sorted_posts = get_posts( $args );
    $permalink = get_permalink($sorted_posts[0]->ID);
    $title = $sorted_posts[0]->post_title;
    $post = $placeholder;
$latest_link_html = '<h3>Read also: </h3><br /><ul><li><b><a href="'.$permalink.'">'.$title.'</a></b></li></ul>';
    return $latest_link_html;
}
function link_newest_1post($content) {
    $latest_link = newest_post_1link;
   return $content .= $latest_link;
}
add_filter( 'the_content', 'link_newest_1post');
