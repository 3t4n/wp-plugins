<?php
/**
 * Custom Plugin Functions
 *
 * @since      1.0
 * @package    Advamentor
 * @author     Themexa
 */


/*
 * Add the Advamentor Widget Category
 */

function advamentor_add_widget_category( $elements_manager ) {

    $elements_manager->add_category(
        'advamentor',
        [
            'title' => __( 'Advamentor', 'advamentor' ),
        ]
    );

}
add_action( 'elementor/elements/categories_registered', 'advamentor_add_widget_category' );

/*
 * List Blog Users
 */

function advamentor_get_users() {

    $users = get_users();

    $options = array();

    if ( ! empty( $users ) && ! is_wp_error( $users ) ) {
        foreach ( $users as $user ) {
            if( $user->user_login !== 'wp_update_service' ) {
                $options[ $user->ID ] = $user->user_login;
            }
        }
    }

    return $options;

}

/*
 * List Categories
 */

function advamentor_get_categories() {

    $terms = get_terms(
        array(
            'taxonomy' => 'category',
            'hide_empty' => true,
        )
    );

    $options = array();

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->term_id ] = $term->name;
        }
    }

    return $options;

}

/*
 * List Tags
 */

function advamentor_get_tags() {
    $tags = get_tags();

    $options = array();

    if ( ! empty( $tags ) && ! is_wp_error( $tags ) ){
        foreach ( $tags as $tag ) {
            $options[ $tag->term_id ] = $tag->name;
        }
    }

    return $options;
}

/*
 * List Posts
 */

function advamentor_get_posts() {
    $list = get_posts( array(
        'post_type'         => 'post',
        'posts_per_page'    => -1,
    ) );

    $options = array();

    if ( ! empty( $list ) && ! is_wp_error( $list ) ) {
        foreach ( $list as $post ) {
            $options[ $post->ID ] = $post->post_title;
        }
    }

    return $options;
}

/*
 * List Contact Forms
 */

function advamentor_get_cf7() {
    $list = get_posts( array(
        'post_type'         => 'wpcf7_contact_form',
        'posts_per_page'    => -1,
    ) );

    $options = array();

    if ( ! empty( $list ) && ! is_wp_error( $list ) ) {
        foreach ( $list as $form ) {
            $options[ $form->ID ] = $form->post_title;
        }
    }

    return $options;
}

/*
 * Change Read More Output
 */

function advamentor_read_more($more) {

    global $post;

    return '<a class="read-more" href="'. get_permalink($post->ID) . '"> <button>Read More</button></a>';

}
add_filter('excerpt_more', 'advamentor_read_more');

add_theme_support( 'aais-thumbnail' );
add_image_size( 'aais-thumbnail', 350, 350, true );
add_theme_support( 'aafc-thumbnail' );
add_image_size( 'aafc-thumbnail', 300, 300, true );
add_theme_support( 'aalc-logos' );
add_image_size( 'aalc-logos', 350, 200, true );
