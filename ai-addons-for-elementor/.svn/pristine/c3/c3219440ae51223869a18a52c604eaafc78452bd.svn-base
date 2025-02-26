<?php

class AIEA_Megamenu_CPT {

	public function __construct() {
		$this->post_type();
		register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
		register_activation_hook( __FILE__, array( $this, 'flush_rewrites' ) );
	}

	public function post_type() {
		
		$labels  = array(
			'name'                  => _x( 'AI items', 'Post Type General Name', 'ai-addon' ),
			'singular_name'         => _x( 'AI item', 'Post Type Singular Name', 'ai-addon' ),
			'menu_name'             => esc_html__( 'AI item', 'ai-addon' ),
			'name_admin_bar'        => esc_html__( 'AI item', 'ai-addon' ),
			'archives'              => esc_html__( 'Item Archives', 'ai-addon' ),
			'attributes'            => esc_html__( 'Item Attributes', 'ai-addon' ),
			'parent_item_colon'     => esc_html__( 'Parent Item:', 'ai-addon' ),
			'all_items'             => esc_html__( 'All Items', 'ai-addon' ),
			'add_new_item'          => esc_html__( 'Add New Item', 'ai-addon' ),
			'add_new'               => esc_html__( 'Add New', 'ai-addon' ),
			'new_item'              => esc_html__( 'New Item', 'ai-addon' ),
			'edit_item'             => esc_html__( 'Edit Item', 'ai-addon' ),
			'update_item'           => esc_html__( 'Update Item', 'ai-addon' ),
			'view_item'             => esc_html__( 'View Item', 'ai-addon' ),
			'view_items'            => esc_html__( 'View Items', 'ai-addon' ),
			'search_items'          => esc_html__( 'Search Item', 'ai-addon' ),
			'not_found'             => esc_html__( 'Not found', 'ai-addon' ),
			'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'ai-addon' ),
			'featured_image'        => esc_html__( 'Featured Image', 'ai-addon' ),
			'set_featured_image'    => esc_html__( 'Set featured image', 'ai-addon' ),
			'remove_featured_image' => esc_html__( 'Remove featured image', 'ai-addon' ),
			'use_featured_image'    => esc_html__( 'Use as featured image', 'ai-addon' ),
			'insert_into_item'      => esc_html__( 'Insert into item', 'ai-addon' ),
			'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'ai-addon' ),
			'items_list'            => esc_html__( 'Items list', 'ai-addon' ),
			'items_list_navigation' => esc_html__( 'Items list navigation', 'ai-addon' ),
			'filter_items_list'     => esc_html__( 'Filter items list', 'ai-addon' ),
		);
		$rewrite = array(
			'slug'       => 'ai-content',
			'with_front' => true,
			'pages'      => false,
			'feeds'      => false,
		);
		$args    = array(
			'label'               => esc_html__( 'AI item', 'ai-addon' ),
			'description'         => esc_html__( 'aiea_content', 'ai-addon' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'elementor', 'permalink' ),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => false,
			'show_in_menu'        => false,
			'menu_position'       => 5,
			'show_in_admin_bar'   => false,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'query_var'           => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'show_in_rest'        => true,
			'rest_base'           => 'ai-content',
		);
		register_post_type( 'aiea_content', $args );
	}

	public function flush_rewrites() {
		$this->post_type();
		flush_rewrite_rules();
	}
	
} new AIEA_Megamenu_CPT();
