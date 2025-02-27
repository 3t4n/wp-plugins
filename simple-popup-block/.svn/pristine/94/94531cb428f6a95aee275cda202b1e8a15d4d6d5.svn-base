<?php

namespace Codemanas\SimplePopupBlock;

class Blocks {
	public static ?Blocks $instance = null;

	public static function get_instance(): ?Blocks {
		return is_null( self::$instance ) ? self::$instance = new self() : self::$instance;
	}

	protected function __construct() {
		//registering block
		add_action( 'init', [ $this, 'register_blocks' ] );

		add_action( 'admin_enqueue_scripts', [ $this, 'localize_scripts_admin' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'localize_scripts_frontend' ] );

		//registering block category
		add_filter( 'block_categories_all', [ $this, 'register_block_category' ] );
	}

	public function register_blocks() {

		register_block_type( SIMPLE_POPUP_BLOCK_DIR_PATH . '/build', array(
			'keywords' => array(
				'popup',
				'modal',
				'overlay',
				'popup-block',
				'codemanas',
				'simple-popup-block',
				'block'
			),
		) );

	}


	public function register_block_category( $categories ) {

		// Adding a new category.
		$categories[] = array(
			'slug'  => 'codemanas-blocks',
			'title' => __( 'Codemanas Blocks', 'simple-popup-block' )
		);

		return $categories;
	}

	public function localize_scripts_admin() {
		global $wp_roles;
		$roles = $wp_roles->roles;


		wp_localize_script( 'codemanas-simple-popup-block-editor-script',
			'cmSimplePopup',
			[
				'assetsURL' => SIMPLE_POPUP_BLOCK_ASSETS_URL,
				'roles'     => $roles,

			]
		);
	}

	public function localize_scripts_frontend() {

		$user              = wp_get_current_user();
		$current_user_role = $user->roles;
		wp_localize_script( 'codemanas-simple-popup-block-view-script',
			'cmSimplePopup',
			[
				'userLoggedIn'  => is_user_logged_in(),
				'current_roles' => $current_user_role
			]
		);
	}
}
