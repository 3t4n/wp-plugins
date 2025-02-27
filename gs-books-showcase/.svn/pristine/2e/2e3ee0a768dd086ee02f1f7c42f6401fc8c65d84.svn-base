<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

class Taxonomy {

	public function __construct() {
		add_action( 'init', array( $this, 'register_taxonomies' ) );
	}

	// Register Custom Taxonomy For Bookshowcase
	public function register_taxonomies() {
		$this->gsb_categories();
		$this->gsb_books_tag();
		do_action( 'gsb_after_register_taxonomy' );
	}

	public function gsb_categories() {

		if ( plugin()->builder->get_tax_option( 'enable_group_tax' ) !== 'on' ) {
			return;
		}

		$plural   = plugin()->builder->get_tax_option( 'group_tax_plural_label' );
		$singular = plugin()->builder->get_tax_option( 'group_tax_label' );

		$labels = array(
			'name'                       => $plural,
			'singular_name'              => $singular,
			'all_items'                  => sprintf( __( 'All %s' ), $plural ),
			'parent_item'                => sprintf( __( 'Parent %s' ), $singular ),
			'parent_item_colon'          => sprintf( __( 'Parent %s' ), $singular ),
			'new_item_name'              => sprintf( __( 'New %s' ), $singular ),
			'add_new_item'               => sprintf( __( 'Add New %s' ), $singular ),
			'edit_item'                  => sprintf( __( 'Edit %s' ), $singular ),
			'update_item'                => sprintf( __( 'Update %s' ), $singular ),
			'separate_items_with_commas' => sprintf( __( 'Separate %s with commas' ), $plural ),
			'search_items'               => sprintf( __( 'Search %s' ), $plural ),
			'add_or_remove_items'        => sprintf( __( 'Add or remove %s' ), $plural ),
			'choose_from_most_used'      => sprintf( __( 'Choose from the most used %s' ), $plural ),
			'not_found'                  => __( 'Not Found', 'gsbookshowcase' ),
		);

		$rewrite = array(
			'slug'         => plugin()->builder->get_tax_option( 'group_tax_archive_slug', 'bookshowcase_group' ),
			'with_front'   => true,
			'hierarchical' => false,
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => false,
			'show_tagcloud'     => false,
			'rewrite'           => $rewrite,
		);

		register_taxonomy( 'bookshowcase_group', array( 'gs_bookshowcase' ), $args );
	}

	public function gsb_books_tag() {

		if ( plugin()->builder->get_tax_option( 'enable_tag_tax' ) !== 'on' ) {
			return;
		}

		$plural   = plugin()->builder->get_tax_option( 'tag_tax_plural_label' );
		$singular = plugin()->builder->get_tax_option( 'tag_tax_label' );

		register_taxonomy(
			'gsb_tag',
			'gs_bookshowcase',
			array(
				'hierarchical'      => true,
				'labels'            => array(
					'name'                       => $plural,
					'singular_name'              => $singular,
					'all_items'                  => sprintf( __( 'All %s' ), $plural ),
					'parent_item'                => sprintf( __( 'Parent %s' ), $singular ),
					'parent_item_colon'          => sprintf( __( 'Parent %s' ), $singular ),
					'new_item_name'              => sprintf( __( 'New %s' ), $singular ),
					'add_new_item'               => sprintf( __( 'Add New %s' ), $singular ),
					'edit_item'                  => sprintf( __( 'Edit %s' ), $singular ),
					'update_item'                => sprintf( __( 'Update %s' ), $singular ),
					'separate_items_with_commas' => sprintf( __( 'Separate %s with commas' ), $plural ),
					'search_items'               => sprintf( __( 'Search %s' ), $plural ),
					'add_or_remove_items'        => sprintf( __( 'Add or remove %s' ), $plural ),
					'choose_from_most_used'      => sprintf( __( 'Choose from the most used %s' ), $plural ),
					'not_found'                  => __( 'Not Found', 'gsbookshowcase' ),
				),
				'show_ui'           => true,
				'show_admin_column' => true,
				'rewrite'           => false,
			)
		);
	}
}