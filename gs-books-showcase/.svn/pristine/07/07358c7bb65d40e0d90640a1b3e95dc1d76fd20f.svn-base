<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

/**
 * Registers a new post type
 *
 * @since 1.2.11
 */
class CPT {

	/**
	 * Class constructor.
	 *
	 * @since 1.2.11
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'registerPostType' ) );
		add_action( 'after_setup_theme', array( $this, 'themeSupports' ) );
		add_filter( 'gsbook_cpt_slug', [ $this, 'cpt_bookshowcase' ] );
	}

	/**
	 * Register post type.
	 *
	 * @since 1.2.11
	 */
	public function registerPostType() {
		$labels = array(
			'name'                  => _x( 'Books Showcase', 'gsbookshowcase' ),
			'singular_name'         => _x( 'Book', 'gsbookshowcase' ),
			'menu_name'             => _x( 'GS Book Showcase', 'admin menu', 'gsbookshowcase' ),
			'name_admin_bar'        => _x( 'GS Book Showcase', 'add new on admin bar', 'gsbookshowcase' ),
			'add_new'               => _x( 'Add New', 'book', 'gsbookshowcase' ),
			'add_new_item'          => __( 'Add New', 'gsbookshowcase' ),
			'new_item'              => __( 'New Book', 'gsbookshowcase' ),
			'edit_item'             => __( 'Edit Book', 'gsbookshowcase' ),
			'view_item'             => __( 'View Book', 'gsbookshowcase' ),
			'all_items'             => __( 'Books', 'gsbookshowcase' ),
			'search_items'          => __( 'Search Books', 'gsbookshowcase' ),
			'parent_item_colon'     => __( 'Parent Book:', 'gsbookshowcase' ),
			'not_found'             => __( 'No Book found.', 'gsbookshowcase' ),
			'not_found_in_trash'    => __( 'No Book found in Trash.', 'gsbookshowcase' ),
			'featured_image'        => __( 'Book Cover', 'gsbookshowcase' ),
			'set_featured_image'    => __( 'Set Book Cover', 'gsbookshowcase' ),
			'remove_featured_image' => __( 'Remove Book Cover', 'gsbookshowcase' ),
		);

		$slug = apply_filters( 'gsbook_cpt_slug', 'books' );

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => $slug ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 41,
			'menu_icon'          => GS_BOOKS_PLUGIN_URI . '/assets/img/icon.png',
			'supports'           => array( 'title', 'editor', 'thumbnail', 'comments' ),
		);

		if ( false ) {
			$args['register_meta_box_cb'] = array( 'Metabox_Gallery', 'gsbookshowcase_video_gal_metaboxes' );
		}

		register_post_type( 'gs_bookshowcase', $args );
	}

	/**
	 * Add theme support for Bookshowcase featured images.
	 *
	 * @since 1.2.11
	 */
	public function themeSupports() {
		add_theme_support( 'post-thumbnails', array( 'gs_bookshowcase' ) );
		add_theme_support( 'post-thumbnails', array( 'post' ) );
		add_theme_support( 'post-thumbnails', array( 'page' ) );
		add_theme_support( 'post-thumbnails', array( 'product' ) );
		add_theme_support( 'post-thumbnails' );
		// add_filter( 'widget_text', 'do_shortcode' );
	}

	public function cpt_bookshowcase( $slug ) {
		return Helpers::get_option( 'gs_bookshowcase_slug', 'books' );
	}
}
