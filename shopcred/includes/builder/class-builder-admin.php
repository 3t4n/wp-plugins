<?php
/**
 * Functions used for Block Data
 *
 * @package ShopCred WooBuilder
 */

class BuilderSubmenu {


	/**
	 * Member Variable
	 *
	 * @since 0.0.1
	 * @var instance
	 */
	private static $instance;

	/**
	 *  Initiator
	 *
	 * @since 0.0.1
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

    private function __construct() {
        add_action( 'init', [ $this, 'woo_builder_posttype' ] );
		add_action( 'admin_menu', [ $this, 'register_admin_menu' ], 50 );

	}

    /**
	 * Register Post type for Single Product blocks templates
	 */
	public function woo_builder_posttype() {
		$labels = [
			'name'               => __( 'Woo Builder Template', 'shop-cred-pro' ),
			'singular_name'      => __( 'Woo Builder Template', 'shop-cred-pro' ),
			'menu_name'          => __( 'Woo Builder Template', 'shop-cred-pro' ),
			'name_admin_bar'     => __( 'Woo Builder Template', 'shop-cred-pro' ),
			'add_new'            => __( 'Add New', 'shop-cred-pro' ),
			'add_new_item'       => __( 'Add New Template, Template or Block', 'shop-cred-pro' ),
			'new_item'           => __( 'New Template', 'shop-cred-pro' ),
			'edit_item'          => __( 'Edit Template', 'shop-cred-pro' ),
			'view_item'          => __( '', 'shop-cred-pro' ),
			'all_items'          => __( 'All Woo Builder Template', 'shop-cred-pro' ),
			'search_items'       => __( 'Search Template', 'shop-cred-pro' ),
			'parent_item_colon'  => __( 'Parent Template', 'shop-cred-pro' ),
			'not_found'          => __( 'No Template found.', 'shop-cred-pro' ),
			'not_found_in_trash' => __( 'No Template found in Trash.', 'shop-cred-pro' )
		];

		$args = [
			'labels'              => $labels,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => false,
			'show_in_nav_menus'   => false,
			'exclude_from_search' => true,
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'menu_icon'           => 'dashicons-editor-kitchensink',
			'supports'            => [ 'title', 'thumbnail', 'elementor', 'editor' ],
			'has_archive'         => true,
			'show_in_rest'        => true,
		];

		register_post_type( 'spc-pro-woo-builder', $args );
	}

    /**
	 * Register the admin menu for Builder
	 * Moved the menu under ShopCred WooBuilder -> Builder
	 */
	public function register_admin_menu() {
		add_submenu_page(
			\ShopCred\Dashboard::get_instance()->dashboard_slug,
			__( 'Woo Builder Template', 'shop-cred-pro' ),
			__( 'Woo Builder Template', 'shop-cred-pro' ),
			'edit_pages',
			'edit.php?post_type=spc-pro-woo-builder'
		);

	}
    
}

BuilderSubmenu::get_instance();