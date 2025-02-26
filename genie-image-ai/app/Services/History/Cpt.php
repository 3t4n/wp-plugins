<?php

namespace GenieImageAi\App\Services\History;

defined( 'ABSPATH' ) || exit;

class Cpt
{

    public $prefix = '';
    public $param = '';
    public $request = null;

    public function __construct() {
        add_action( 'init', [$this, 'post_type'], 0 );
    }

    // Register Custom Post Type
    public function post_type() {

        $labels = array(
            'name'                  => _x( 'genieimage histories', 'Post Type General Name', 'genie-image-ai' ),
            'singular_name'         => _x( 'genieimage history', 'Post Type Singular Name', 'genie-image-ai' ),
            'menu_name'             => __( 'Post Types', 'genie-image-ai' ),
            'name_admin_bar'        => __( 'Post Type', 'genie-image-ai' ),
            'archives'              => __( 'Item Archives', 'genie-image-ai' ),
            'attributes'            => __( 'Item Attributes', 'genie-image-ai' ),
            'parent_item_colon'     => __( 'Parent Item:', 'genie-image-ai' ),
            'all_items'             => __( 'All Items', 'genie-image-ai' ),
            'add_new_item'          => __( 'Add New Item', 'genie-image-ai' ),
            'add_new'               => __( 'Add New', 'genie-image-ai' ),
            'new_item'              => __( 'New Item', 'genie-image-ai' ),
            'edit_item'             => __( 'Edit Item', 'genie-image-ai' ),
            'update_item'           => __( 'Update Item', 'genie-image-ai' ),
            'view_item'             => __( 'View Item', 'genie-image-ai' ),
            'view_items'            => __( 'View Items', 'genie-image-ai' ),
            'search_items'          => __( 'Search Item', 'genie-image-ai' ),
            'not_found'             => __( 'Not found', 'genie-image-ai' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'genie-image-ai' ),
            'featured_image'        => __( 'Featured Image', 'genie-image-ai' ),
            'set_featured_image'    => __( 'Set featured image', 'genie-image-ai' ),
            'remove_featured_image' => __( 'Remove featured image', 'genie-image-ai' ),
            'use_featured_image'    => __( 'Use as featured image', 'genie-image-ai' ),
            'insert_into_item'      => __( 'Insert into item', 'genie-image-ai' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'genie-image-ai' ),
            'items_list'            => __( 'Items list', 'genie-image-ai' ),
            'items_list_navigation' => __( 'Items list navigation', 'genie-image-ai' ),
            'filter_items_list'     => __( 'Filter items list', 'genie-image-ai' ),
        );
        $args = array(
            'label'                 => __( 'genieimage history', 'genie-image-ai' ),
            'description'           => __( 'genieimage histories', 'genie-image-ai' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'custom-fields' ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => false,
            'show_in_menu'          => false,
            'menu_position'         => 5,
            'show_in_admin_bar'     => false,
            'show_in_nav_menus'     => false,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => false,
            'rewrite'               => false,
            'capability_type'       => 'page',
            'show_in_rest'          => false,
        );
        register_post_type( 'genieimage_history', $args );
    }
}