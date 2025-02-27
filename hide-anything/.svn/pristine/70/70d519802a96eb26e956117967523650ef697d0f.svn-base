<?php

defined( 'ABSPATH' ) || exit();

class Hide_Anything_Hooks {
	/** @var null */
	private static $instance = null;

	/**
	 * Hide_Anything_Hooks constructor.
	 */
	public function __construct() {
		add_action( 'wp_head', [ $this, 'render_css' ] );
		add_action( 'admin_head', [ $this, 'render_css' ] );
		add_action( 'login_head', [ $this, 'render_css' ] );

		add_action( 'admin_bar_menu', [ $this, 'render_admin_menu' ] );

	}

	public function render_admin_menu( $admin_bar ) {
		$enable_frontend = hide_anything_get_settings( 'enableFrontend', true );
		$enable_backend  = hide_anything_get_settings( 'enableBackend', false );
		
		if ( ! hide_anything_can_show() ) {
			return;
		}

		if ( is_admin() && ! $enable_backend ) {
			return;
		} else if ( ! is_admin() && ! $enable_frontend ) {
			return;
		}

		$admin_bar->add_menu( array(
			'id'     => 'hide-anything',
			'parent' => 'top-secondary',
			'title'  => __( 'Hide Anything', 'hide-anything' ),
			'href'   => '#',
			'meta'   => array(
				'title' => __( 'Hide Anything', 'hide-anything' ),
				'class' => 'hide-anything-menu hide-anything-ignore',
			),
		) );

	}

	public function render_css() {

		printf( '<style id="hide_anything_css">%s</style>', hide_anything_get_css() );

	}

	/**
	 * @return Hide_Anything_Hooks|null
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}

Hide_Anything_Hooks::instance();