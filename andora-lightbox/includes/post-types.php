<?php
/**
 * Custom post types setup
*/
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {exit;}

function abcfal_setup_post_types() {

    //-----------------------------------------------------------------
    $lblsGalleryL = array(
            'name'               => __( 'Andora Lightbox - Gallery Light', 'abcfal-td' ),
            'add_new'            => __( 'Add New' ),
            'add_new_item'       => __( 'Andora Lightbox - Gallery Light', 'abcfal-td' ),
            'edit_item'          => __( 'Andora Lightbox - Gallery Light', 'abcfal-td' ),
            'new_item'           => __( 'New'),
            'all_items'          => __( 'Gallery Light', 'abcfal-td' ),
            'search_items'       => __( 'Search', 'abcfal-td' ),
            'not_found'          => __( 'No records found', 'abcfal-td' ),
            'not_found_in_trash' => __( 'No records found in the Trash', 'abcfal-td' )
    );
    $argsGalleryL = array(
            'labels'        => $lblsGalleryL,
            'description'   => '',
            'public'        => true,
            'hierarchical'  => false,
            'supports'      => array( 'title' ),
            'has_archive'   => false,
            'menu_position' => 100,
            'show_ui'       => true,
            'show_in_menu'  => ABCFAL_MENU_SLUG
    );

    register_post_type( ABCFAL_POST_GALLERYL, $argsGalleryL );

}

add_action( 'init', 'abcfal_setup_post_types', 100 );

