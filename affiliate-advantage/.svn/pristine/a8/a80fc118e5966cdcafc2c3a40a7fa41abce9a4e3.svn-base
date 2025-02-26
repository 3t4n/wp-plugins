<?php


namespace Level_Wp\Affiliate_Advantage\Providers;

use Level_Wp\Affiliate_Advantage\Controllers\Affiliate_Links_Controller;
use Level_Wp\Affiliate_Advantage\Plugin;

class CPT_Service_Provider extends Base_Service_Provider {

	private $links_Controller;

	public function __construct() {
		$this->links_Controller = new Affiliate_Links_Controller();
	}

	/**
	 * Registers WordPress action hooks and filters.
	 *
	 * @return mixed|void
	 *
	 * @since 1.0.0
	 */
	public function register() {
		add_action( 'init', array( $this, 'run' ) );
		add_action( 'wp', array( $this->links_Controller, 'redirect' ) );
		add_action(
			'manage_' . Plugin::get_instance()->cpt . '_posts_columns',
			array(
				$this->links_Controller,
				'display_columns',
			)
		);
		add_action(
			'manage_' . Plugin::get_instance()->cpt . '_posts_custom_column',
			array(
				$this->links_Controller,
				'displayColumnsData',
			),
			10,
			2
		);
		add_filter(
			'manage_edit-' . Plugin::get_instance()->cpt . '_sortable_columns',
			array(
				$this->links_Controller,
				'sortColumns',
			)
		);

		if ( Plugin::get_instance()->has_valid_licence() ) {
			add_filter( 'the_content', array( $this->links_Controller, 'auto_link__premium_only' ), 1 );
			// add_filter( 'the_content', [ $this->affiliate_advantage_controller, 'add_sponsors' ], 1 );
		}
//		add_filter( 'post_type_link', array( $this->links_Controller, 'remove_slug' ), 10, 3 );
//		add_action( 'pre_get_posts', array( $this->links_Controller, 'parse_request' ) );
	}

	public function run() {
		$prefix = get_option( Plugin::get_instance()->prefix . 'link_prefix', true );

		// Main CPT labels
		$labels = array(
			'name'                  => _x( 'Affiliate Links', 'Post type general name', 'affiliate-advantage' ),
			'singular_name'         => _x( 'Affiliate Link', 'Post type singular name', 'affiliate-advantage' ),
			'menu_name'             => _x( 'Affiliate Advantage', 'Admin Menu text', 'affiliate-advantage' ),
			'name_admin_bar'        => _x( 'Affiliate Link', 'Add New on Toolbar', 'affiliate-advantage' ),
			'add_new'               => __( 'New Affiliate Link', 'affiliate-advantage' ),
			'add_new_item'          => __( 'Add Affiliate New Link', 'affiliate-advantage' ),
			'new_item'              => __( 'New Affiliate Link', 'affiliate-advantage' ),
			'edit_item'             => __( 'Edit Affiliate Link', 'affiliate-advantage' ),
			'view_item'             => __( 'View Affiliate Link', 'affiliate-advantage' ),
			'all_items'             => __( 'Affiliate Links', 'affiliate-advantage' ),
			'search_items'          => __( 'Search Affiliate Links', 'affiliate-advantage' ),
			'parent_item_colon'     => __( 'Parent Affiliate Links:', 'affiliate-advantage' ),
			'not_found'             => __( 'No Affiliate Links found.', 'affiliate-advantage' ),
			'not_found_in_trash'    => __( 'No Affiliate Links found in Trash.', 'affiliate-advantage' ),
			'archives'              => _x( 'Affiliate Links archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'affiliate-advantage' ),
			'filter_items_list'     => _x( 'Affiliate Filter Links list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'affiliate-advantage' ),
			'items_list_navigation' => _x( 'Affiliate Links list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'affiliate-advantage' ),
			'items_list'            => _x( 'Affiliate Links list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'affiliate-advantage' ),
		);

		// Main CPT args
		$args = array(
			'labels'              => $labels,
			'description'         => 'Affiliate Link custom post type.',
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_json'        => true,
			'show_in_nav_menus'   => false,
			'query_var'           => true,
			'rewrite'             => array(
				 'slug'       => $prefix,
//				'slug'       => 'affiliate_advantage',
//				'with_front' => false,
//				'pages'      => false,
			),
			'capability_type'     => 'post',
			'has_archive'         => false,
			'hierarchical'        => true,
			'menu_position'       => 20,
			'menu_icon'           => 'dashicons-admin-links',
			'supports'            => array( 'title' ),
			'taxonomies'          => array(),
			'show_in_rest'        => true,
			'can_export'          => true,
			'exclude_from_search' => true,
		);

		register_post_type( Plugin::get_instance()->cpt, $args );

		// TODO : remove view from link group and rename not found
		if ( Plugin::get_instance()->has_valid_licence() ) {

			// Link groups taxonomy labels
			$labels = array(
				'name'               => _x( 'Link Groups', 'taxonomy general name', 'affiliate-advantage' ),
				'singular_name'      => _x( 'Link Group', 'taxonomy singular name', 'affiliate-advantage' ),
				'search_items'       => __( 'Search Link Groups', 'affiliate-advantage' ),
				'all_items'          => __( 'All Link Groups', 'affiliate-advantage' ),
				'parent_item'        => __( 'Parent Group', 'affiliate-advantage' ),
				'parent_item_colon'  => __( 'Parent Group:', 'affiliate-advantage' ),
				'edit_item'          => __( 'Edit Link Group', 'affiliate-advantage' ),
				'update_item'        => __( 'Update Group', 'affiliate-advantage' ),
				'add_new_item'       => __( 'Add New Group', 'affiliate-advantage' ),
				'new_item_name'      => __( 'New Link Group Name', 'affiliate-advantage' ),
				'menu_name'          => __( 'Link Groups', 'affiliate-advantage' ),
				'not_found'          => __( 'No Link Groups found.', 'affiliate-advantage' ),
				'not_found_in_trash' => __( 'No Link Groups found in Trash.', 'affiliate-advantage' ),
			);

			// Link groups taxonomy args
			$args = array(
				'hierarchical'      => true, // make it hierarchical (like categories).
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'groups' ),
			);

			register_taxonomy( Plugin::get_instance()->cpt . '_group', array( Plugin::get_instance()->cpt ), $args );
		}

		register_post_type(
			Plugin::get_instance()->click_cpt,
			array(
				'public' => false,
			)
		);

	}

}
