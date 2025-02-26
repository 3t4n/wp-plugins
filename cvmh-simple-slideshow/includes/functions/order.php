<?php
defined( 'ABSPATH' ) or exit;          
            
add_filter( 'get_previous_post_where', 'cvmh_slideshow_order_previous_post_where' );
function cvmh_slideshow_order_previous_post_where( $where ) {
    global $post;

    if ( isset( $post->post_type ) and $post->post_type == CVMH_SLIDESHOW_SLUG ) :
        $current_menu_order = $post->menu_order;
        $where = "WHERE p.menu_order > '".$current_menu_order."' AND p.post_type = '". $post->post_type ."' AND p.post_status = 'publish'";
    endif;
    return $where;
}

add_filter( 'get_previous_post_sort', 'cvmh_slideshow_order_previous_post_sort' );
function cvmh_slideshow_order_previous_post_sort( $orderby ) {
    global $post;

    if ( isset( $post->post_type ) and $post->post_type == CVMH_SLIDESHOW_SLUG ) :
        $orderby = 'ORDER BY p.menu_order ASC LIMIT 1';
    endif;
    return $orderby;
}

add_filter( 'get_next_post_where', 'cvmh_slideshow_order_next_post_where' );
function cvmh_slideshow_order_next_post_where( $where ) {
    global $post;

    if ( isset( $post->post_type ) and $post->post_type == CVMH_SLIDESHOW_SLUG ) :
        $current_menu_order = $post->menu_order;
        $where = "WHERE p.menu_order < '".$current_menu_order."' AND p.post_type = '". $post->post_type ."' AND p.post_status = 'publish'";
    endif;
    return $where;
}

add_filter( 'get_next_post_sort', 'cvmh_slideshow_order_next_post_sort' );
function cvmh_slideshow_order_next_post_sort( $orderby ) {
    global $post;

    if ( isset( $post->post_type ) and $post->post_type == CVMH_SLIDESHOW_SLUG ) :
        $orderby = 'ORDER BY p.menu_order DESC LIMIT 1';
    endif;
    return $orderby;
}

add_action( 'pre_get_posts', 'cvmh_slideshow_order_pre_get_posts' );
function cvmh_slideshow_order_pre_get_posts( $wp_query ) {

    if ( is_admin() ) :

        if ( isset( $wp_query->query['post_type'] ) and !isset( $_GET['orderby'] ) and $wp_query->query['post_type'] == CVMH_SLIDESHOW_SLUG ) :
            $wp_query->set( 'orderby', 'menu_order' );
            $wp_query->set( 'order', 'ASC' );
        endif;

    else :

        $active = false;

        // page or custom post types
        if ( isset( $wp_query->query['post_type'] ) and !is_array( $wp_query->query['post_type'] ) and $wp_query->query['post_type'] == CVMH_SLIDESHOW_SLUG ) :
            $active = true;
        endif;

        if ( !$active ) return false;

        // get_posts()
        if ( isset( $wp_query->query['suppress_filters'] ) ) :
            if ( $wp_query->get( 'orderby' ) == 'date' ) :
                $wp_query->set( 'orderby', 'menu_order' );
            endif;
            if ( $wp_query->get( 'order' ) == 'DESC' ) :
                $wp_query->set( 'order', 'ASC' );
            endif;
        // WP_Query( contain main_query )
        else :
            if ( !$wp_query->get( 'orderby' ) ) :
                $wp_query->set( 'orderby', 'menu_order' );
            endif;
            if ( !$wp_query->get( 'order' ) ) :
                $wp_query->set( 'order', 'ASC' );
            endif;
        endif;

    endif;
}