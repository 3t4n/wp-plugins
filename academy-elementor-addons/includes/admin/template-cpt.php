<?php
namespace AcademyEA\Admin;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class TemplateCpt {

	public static function init() {
		$self = new self();
		add_action( 'init', array( $self, 'register_custom_post_type' ) );
	}

	public function register_custom_post_type() {

		$labels = array(
			'name'                  => esc_html_x( 'Template Builder', 'Post Type General Name', 'academy-elementor-addons' ),
			'singular_name'         => esc_html_x( 'Template Builder', 'Post Type Singular Name', 'academy-elementor-addons' ),
			'menu_name'             => esc_html__( 'Template', 'academy-elementor-addons' ),
			'name_admin_bar'        => esc_html__( 'Template', 'academy-elementor-addons' ),
			'archives'              => esc_html__( 'Template Archives', 'academy-elementor-addons' ),
			'attributes'            => esc_html__( 'Template Attributes', 'academy-elementor-addons' ),
			'parent_item_colon'     => esc_html__( 'Parent Item:', 'academy-elementor-addons' ),
			'all_items'             => esc_html__( 'Templates', 'academy-elementor-addons' ),
			'add_new_item'          => esc_html__( 'Add New Template', 'academy-elementor-addons' ),
			'add_new'               => esc_html__( 'Add New', 'academy-elementor-addons' ),
			'new_item'              => esc_html__( 'New Template', 'academy-elementor-addons' ),
			'edit_item'             => esc_html__( 'Edit Template', 'academy-elementor-addons' ),
			'update_item'           => esc_html__( 'Update Template', 'academy-elementor-addons' ),
			'view_item'             => esc_html__( 'View Template', 'academy-elementor-addons' ),
			'view_items'            => esc_html__( 'View Templates', 'academy-elementor-addons' ),
			'search_items'          => esc_html__( 'Search Templates', 'academy-elementor-addons' ),
			'not_found'             => esc_html__( 'Not found', 'academy-elementor-addons' ),
			'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'academy-elementor-addons' ),
			'featured_image'        => esc_html__( 'Featured Image', 'academy-elementor-addons' ),
			'set_featured_image'    => esc_html__( 'Set featured image', 'academy-elementor-addons' ),
			'remove_featured_image' => esc_html__( 'Remove featured image', 'academy-elementor-addons' ),
			'use_featured_image'    => esc_html__( 'Use as featured image', 'academy-elementor-addons' ),
			'insert_into_item'      => esc_html__( 'Insert into Template', 'academy-elementor-addons' ),
			'uploaded_to_this_item' => esc_html__( 'Uploaded to this Template', 'academy-elementor-addons' ),
			'items_list'            => esc_html__( 'Templates list', 'academy-elementor-addons' ),
			'items_list_navigation' => esc_html__( 'Templates list navigation', 'academy-elementor-addons' ),
			'filter_items_list'     => esc_html__( 'Filter from list', 'academy-elementor-addons' ),
		);

		$args = array(
			'label'               => esc_html__( 'Template Builder', 'academy-elementor-addons' ),
			'description'         => esc_html__( 'Academy Elementor Template', 'academy-elementor-addons' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'elementor', 'author', 'permalink' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => false,
			'show_in_admin_bar'   => false,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => false,
			'query_var'           => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'show_in_rest'        => false,
		);

		register_post_type( 'academyea-template', $args );

	}

}
