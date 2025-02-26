<?php

/**
 * Deny direct access
 */
if ( ! defined( 'ABSPATH' ) ) die( A_RCP_ALERT_MSG );

/**
 * Registers ADL Recent Post Slider post type.
 */

function adl_rpost_init() {
    $post_type = 'adl_rec_post';
    $singular_name = 'Recent Post Slider';
    $plural_name = 'Recent Post Sliders';
    $slug = 'adl_rec_post';
    $labels = array(
        'name'               => _x( $plural_name, 'post type general name', A_RCP_TEXTDOMAIN ),
        'singular_name'      => _x( $singular_name, 'post type singular name', A_RCP_TEXTDOMAIN ),
        'menu_name'          => _x( $singular_name, 'admin menu name', A_RCP_TEXTDOMAIN ),
        'name_admin_bar'     => _x( $singular_name, 'add new name on admin bar', A_RCP_TEXTDOMAIN ),
        'add_new'            => _x( 'Add New', 'add new text', A_RCP_TEXTDOMAIN ),
        'add_new_item'       => __( 'Add New '.$singular_name, A_RCP_TEXTDOMAIN ),
        'new_item'           => __( 'New '.$singular_name, A_RCP_TEXTDOMAIN ),
        'edit_item'          => __( 'Edit '.$singular_name, A_RCP_TEXTDOMAIN ),
        'view_item'          => __( 'View '.$singular_name, A_RCP_TEXTDOMAIN ),
        'all_items'          => __( 'All '.$plural_name, A_RCP_TEXTDOMAIN ),
        'search_items'       => __( 'Search '.$plural_name, A_RCP_TEXTDOMAIN ),
        'parent_item_colon'  => __( 'Parent '.$plural_name.':', A_RCP_TEXTDOMAIN ),
        'not_found'          => __( 'No sliders found.', A_RCP_TEXTDOMAIN ),
        'not_found_in_trash' => __( 'No books found in Trash.', A_RCP_TEXTDOMAIN )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', A_RCP_TEXTDOMAIN ),
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => $slug ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title' ),
        'menu_icon'           => 'dashicons-images-alt2'


    );

    register_post_type( $post_type, $args );
}

add_action( 'init', 'adl_rpost_init');



/**
 * Change the placeholder of title input box
 * @param string $title Name of the book
 *
 * @return string
 */
function adl_rec_post_change_title_text( $title ){
    $screen = get_current_screen();
    if  ( 'adl_rec_post' == $screen->post_type ) {
        $title = 'Enter a slider title';
    }
    return $title;
}

add_filter( 'enter_title_here', 'adl_rec_post_change_title_text' );