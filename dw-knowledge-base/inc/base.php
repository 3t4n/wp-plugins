<?php
class DWKB_Article_Base{
	private $slug ;
	private $labels ;
	public function __construct( ) {
		$this->slug = 'dwkb';
		$this->labels = 'Knowledgebase';
		add_action( 'init', array( $this, 'register' ) );
		// Do any init by it self
		add_action( 'init', array( $this, 'init' ) );
	}

	public function init() {
		$this->register_taxonomy();
		$this->register();
		$this->dwkb_tax_image_size();
	}

	public function get_slug() {
		return $this->slug;
	}

	public function get_name_labels() {
		return wp_parse_args( $this->labels, array(
			'plural' => __( 'Articles', 'dwkb' ),
			'singular' => __( 'Article', 'dwkb' ),
			'menu' => __( DWKB_MENU_NAME, 'dwkb' ),
			) );
	}

	public function register() {
		$names = $this->get_name_labels();
		$labels = array(
			'name'                => $names['plural'],
			'singular_name'       => $names['singular'],
			'add_new'             => _x( 'Add New', 'dwkb', 'dwkb' ),
			'add_new_item'        => __( 'Add New', 'dwkb' ) . ' ' . $names['singular'],
			'all_items'           => __( 'All', 'dwkb' ) . ' ' . $names['plural'],
			'edit_item'           => __( 'Edit', 'dwkb' ) . ' ' . $names['singular'],
			'new_item'            => __( 'New', 'dwkb' ) . ' ' . $names['singular'],
			'view_item'           => __( 'View', 'dwkb' ) . ' ' . $names['singular'],
			'search_items'        => __( 'Search ', 'dwkb' ) . $names['plural'],
			'not_found'           => $names['plural'] . ' ' . __( 'not found', 'dwkb' ),
			'not_found_in_trash'  => $names['plural'] . ' ' . __( 'not found in Trash', 'dwkb' ),
			'parent_item_colon'   => __( 'Parent:', 'dwkb' ) . ' ' . $names['singular'],
			'menu_name'           => isset( $names['menu'] ) ? $names['menu'] : $names['plural'],
			);
		$args = array(
			'labels'              => $labels,
			'hierarchical'        => true,
			'description'         => 'description',
			'taxonomies'          => array(),
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => null,
			'menu_icon'           => 'dashicons-book',
			'show_in_nav_menus'   => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'has_archive'         => true,
			'query_var'           => true,
			'can_export'          => true,
			'rewrite'             => true,
			'capability_type'     => 'post',
			'supports'            => array(
				'title', 'editor','comments',
				'excerpt','page-attributes',
				)
			);

		register_post_type( 'dwkb', $args );
	}

	public function register_taxonomy() {
		$labels = array(
			'name'              => _x( 'DWKB Category', 'taxonomy general name', 'dwkb' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name', 'dwkb' ),
			'search_items'      => __( 'Search Knowledgebase Categories', 'dwkb' ),
			'all_items'         => __( 'All Categories', 'dwkb' ),
			'parent_item'       => __( 'Parent Knowledgebase Category', 'dwkb' ),
			'parent_item_colon' => __( 'Parent Knowledgebase Category:', 'dwkb' ),
			'edit_item'         => __( 'Edit Knowledgebase Category', 'dwkb' ),
			'update_item'       => __( 'Update Knowledgebase Category', 'dwkb' ),
			'add_new_item'      => __( 'Add New Knowledgebase Category', 'dwkb' ),
			'new_item_name'     => __( 'New Knowledgebase Category Name', 'dwkb' ),
			'menu_name'         => __( 'Categories', 'dwkb' ),
			);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_admin_column' => false,
			'hierarchical'      => true,
			'show_tagcloud'     => true,
			'show_ui'           => true,
			'query_var'         => true,
			'rewrite'           => array(
				'slug' => DWKB_SLUG.'-category'
				),
			'query_var'         => true,
			'capabilities'      => array(),
			);
		register_taxonomy( $this->get_slug() . '_category', array( $this->get_slug() ), $args );

		$labels = array(
			'name'                       => _x( 'DWKB Tags', 'taxonomy general name', 'dwkb' ),
			'singular_name'              => _x( 'Tag', 'taxonomy singular name', 'dwkb' ),
			'search_items'               => __( 'Search Knowledgebase Tags', 'dwkb' ),
			'popular_items'              => __( 'Popular Knowledgebase Tags', 'dwkb' ),
			'all_items'                  => __( 'All Tags', 'dwkb' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Knowledgebase Tag', 'dwkb' ),
			'update_item'                => __( 'Update Knowledgebase Tag', 'dwkb' ),
			'add_new_item'               => __( 'Add New Knowledgebase Tag', 'dwkb' ),
			'new_item_name'              => __( 'New Knowledgebase Tag Name', 'dwkb' ),
			'separate_items_with_commas' => __( 'Separate Knowledgebase tags with commas', 'dwkb' ),
			'add_or_remove_items'        => __( 'Add or remove Knowledgebase tags', 'dwkb' ),
			'choose_from_most_used'      => __( 'Choose from the most used Knowledgebase tags', 'dwkb' ),
			'not_found'                  => __( 'No Knowledgebase tags found.', 'dwkb' ),
			'menu_name'                  => __( 'Tags', 'dwkb' ),
			);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_admin_column' => false,
			'hierarchical'      => false,
			'show_tagcloud'     => true,
			'show_ui'           => true,
			'query_var'         => true,
			'rewrite'           => array(
				'slug' => DWKB_SLUG.'-tag'
				),
			'query_var'         => true,
			'capabilities'      => array(),
			);
		register_taxonomy( $this->get_slug() . '_tag', array( $this->get_slug() ), $args );

		// Create default category for dwkb Knowledgebase type when dwkb plugin is actived
		$cats = get_categories( array(
			'type'                     => $this->get_slug(),
			'hide_empty'               => 0,
			'taxonomy'                 => $this->get_slug() . '_category',
			) );

		if ( empty( $cats ) ) {
			wp_insert_term( __( 'knowledgebases', 'dwkb' ), $this->get_slug() . '_category' );
		}

	}

	public function dwkb_tax_image_size() {
		add_image_size( 'dwkb_tax', 300, 300, true );
	}

}