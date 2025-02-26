<?php
namespace AP360V;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class PostType{
    private $plugin_name;
    private $version;
    public function __construct($plugin_name, $version){
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        
    }

    public function register(){
        $this->register_advanced_panorama_360_viewer_post_type();
    }

    function register_advanced_panorama_360_viewer_post_type() {
        
        $labels = array(
            'name'                  => _x( 'Advanced Panorama 360 Viewers', 'Post type general name', 'advanced-panorama-360-viewer' ),
            'singular_name'         => _x( 'Advanced Panorama 360 Viewer', 'Post type singular name', 'advanced-panorama-360-viewer' ),
            'menu_name'             => _x( 'Panorama 360 Viewers', 'Admin Menu text', 'advanced-panorama-360-viewer' ),
            'name_admin_bar'        => _x( 'Advanced Panorama 360 Viewer', 'Add New on Toolbar', 'advanced-panorama-360-viewer' ),
            'add_new'               => __( 'Add New', 'advanced-panorama-360-viewer' ),
            'add_new_item'          => __( 'Add New Advanced Panorama 360 Viewer', 'advanced-panorama-360-viewer' ),
            'new_item'              => __( 'New Advanced Panorama 360 Viewer', 'advanced-panorama-360-viewer' ),
            'edit_item'             => __( 'Edit Advanced Panorama 360 Viewer', 'advanced-panorama-360-viewer' ),
            'view_item'             => __( 'View Advanced Panorama 360 Viewer', 'advanced-panorama-360-viewer' ),
            'all_items'             => __( 'All', 'advanced-panorama-360-viewer' ),
            'search_items'          => __( 'Search Advanced Panorama 360 Viewers', 'advanced-panorama-360-viewer' ),
            'parent_item_colon'     => __( 'Parent Advanced Panorama 360 Viewers:', 'advanced-panorama-360-viewer' ),
            'not_found'             => __( 'No Advanced Panorama 360 Viewers found.', 'advanced-panorama-360-viewer' ),
            'not_found_in_trash'    => __( 'No Advanced Panorama 360 Viewers found in Trash.', 'advanced-panorama-360-viewer' ),
            'featured_image'        => _x( 'Advanced Panorama 360 Viewer Cover Image', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'advanced-panorama-360-viewer' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'advanced-panorama-360-viewer' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'advanced-panorama-360-viewer' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'advanced-panorama-360-viewer' ),
            'archives'              => _x( 'Advanced Panorama 360 Viewer archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'advanced-panorama-360-viewer' ),
            'insert_into_item'      => _x( 'Insert into Advanced Panorama 360 Viewer', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'advanced-panorama-360-viewer' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this Advanced Panorama 360 Viewer', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'advanced-panorama-360-viewer' ),
            'filter_items_list'     => _x( 'Filter Advanced Panorama 360 Viewers list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'advanced-panorama-360-viewer' ),
            'items_list_navigation' => _x( 'Advanced Panorama 360 Viewers list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'advanced-panorama-360-viewer' ),
            'items_list'            => _x( 'Advanced Panorama 360 Viewers list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'advanced-panorama-360-viewer' ),
        );

        $args = array(
            'labels'                => $labels,
            'public'                => false,
            'show_ui'               => true, 		
            'show_in_rest'          => true,							
            'publicly_queryable'    => false,
            'exclude_from_search'   => true,
            'menu_position'         => 18,
            'menu_icon'             => 'dashicons-visibility',		
            'has_archive'           => false,
            'hierarchical'          => false,
            'capability_type'       => 'page',
            'rewrite'               => array( 'slug' => "advanced-panorama-360-viewer" ),
            'supports'              => array( 'title', 'editor' ),
            'template'              => [
                ['ap360v/panorama-viewer']
            ],
            'template_lock'         => 'all'
        );

        register_post_type( 'ap360v-viewer', $args );
    }
}