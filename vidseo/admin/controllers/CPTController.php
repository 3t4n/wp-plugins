<?php
namespace Pagup\Vidseo\Controllers;

class CPTController 
{    
    public function vidseo_post() {

        $labels = array(
            'name'                  => _x( 'Video SEO', 'Post Type General Name', 'vidseo' ),
            'singular_name'         => _x( 'Video SEO', 'Post Type Singular Name', 'vidseo' ),
            'menu_name'             => __( 'Video SEO', 'vidseo' ),
            'name_admin_bar'        => __( 'Video SEO', 'vidseo' ),
            'parent_item_colon'     => __( 'Parent Item:', 'vidseo' ),
            'all_items'             => __( 'All Items', 'vidseo' ),
            'add_new_item'          => __( 'Add New Item', 'vidseo' ),
            'add_new'               => __( 'Add New', 'vidseo' ),
            'new_item'              => __( 'New Item', 'vidseo' ),
            'edit_item'             => __( 'Edit Item', 'vidseo' ),
            'update_item'           => __( 'Update Item', 'vidseo' ),
            'not_found'             => __( 'Not found', 'vidseo' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'vidseo' ),
            'featured_image'        => __( 'Featured Image', 'vidseo' ),
            'set_featured_image'    => __( 'Set featured image', 'vidseo' ),
            'remove_featured_image' => __( 'Remove featured image', 'vidseo' ),
            'use_featured_image'    => __( 'Use as featured image', 'vidseo' ),
            'insert_into_item'      => __( 'Insert into item', 'vidseo' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'vidseo' ),
            'items_list'            => __( 'Items list', 'vidseo' ),
            'items_list_navigation' => __( 'Items list navigation', 'vidseo' ),
            'filter_items_list'     => __( 'Filter items list', 'vidseo' ),
        );
        $args = array(
            'label'                 => __( 'Video SEO Transcription Embedder', 'vidseo' ),
            'description'           => __( 'Video SEO Transcription Embedder Post Type', 'vidseo' ),
            'labels'                => $labels,
            'supports'              => array( 'title' ),
            'hierarchical'          => false,
            'public'                => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 10,
            'menu_icon'             => 'dashicons-video-alt',
            'show_in_admin_bar'     => false,
            'show_in_nav_menus'     => false,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => false,
            'capability_type'       => 'page',
        );
        register_post_type( 'vidseo', $args );
    
    }

}
$cpt = new CPTController;