<?php
/**
 * Register Portfolio Custom Post Type.
 *
 * @package     portfolio-cpt
 * @copyright   Copyright (c) 2018, Danny Cooper
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Register Custom Post Type.
 */
function portfolio_cpt_register() {

	$portfolio_cpt_slug = get_option( 'portfolio_cpt_slug', 'portfolio' );

	$labels = array(
		'name'               => esc_html_x( 'Portfolio', 'Post Type General Name', 'portfolio-cpt' ),
		'singular_name'      => esc_html_x( 'Portfolio Item', 'Post Type Singular Name', 'portfolio-cpt' ),
		'menu_name'          => esc_html__( 'Portfolio', 'portfolio-cpt' ),
		'parent_item_colon'  => esc_html__( 'Parent Item:', 'portfolio-cpt' ),
		'all_items'          => esc_html__( 'All Items', 'portfolio-cpt' ),
		'view_item'          => esc_html__( 'View Item', 'portfolio-cpt' ),
		'add_new_item'       => esc_html__( 'Add New Item', 'portfolio-cpt' ),
		'add_new'            => esc_html__( 'Add New', 'portfolio-cpt' ),
		'edit_item'          => esc_html__( 'Edit Item', 'portfolio-cpt' ),
		'update_item'        => esc_html__( 'Update Item', 'portfolio-cpt' ),
		'search_items'       => esc_html__( 'Search Item', 'portfolio-cpt' ),
		'not_found'          => esc_html__( 'Not found', 'portfolio-cpt' ),
		'not_found_in_trash' => esc_html__( 'Not found in Trash', 'portfolio-cpt' ),
	);

	$args = array(
		'label'               => esc_html__( 'portfolio', 'portfolio-cpt' ),
		'description'         => esc_html__( 'Portfolio', 'portfolio-cpt' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions' ),
		'taxonomies'          => array( 'portfolio_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-portfolio',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite'             => array( 'slug' => $portfolio_cpt_slug ),
	);

	register_post_type( 'portfolio', $args );

}

add_action( 'init', 'portfolio_cpt_register', 0 );
