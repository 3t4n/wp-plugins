<?php

function fh_dr_get_posts( $type = 'post' ) {
    $args = array(
        'post_type' => $type,
        'posts_per_page' => -1,
        'post_status' => 'publish'
    );
    $posts = new WP_Query( $args );
    $postsArr = array();
    if($posts->have_posts()) {
        while($posts->have_posts()) {
            $posts->the_post();
            $key = get_the_ID();
            $postsArr[$key] = get_the_title();
        }
        wp_reset_query();
    }
    return $postsArr;
}