<?php
/**
 * Handle admin setting.
 */
namespace Advanced_Login_Page_Customizer;

defined( 'ABSPATH' ) || exit;

class UI_Bilder {

	/**
	 * Assets handle.
	 *
	 * @var string
	 */
	public static $handle = 'alpc-admin-ui-builder';

	/**
	 * Initiate class.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'register_assets' ) );
		add_action( 'admin_menu', array( __CLASS__, 'admin_menu' ), 12 );
	}

	/**
	 * Register assets.
	 *
	 * @return void
	 */
	public static function register_assets() {

		$asset_file_values = include_once 'index.asset.php';
		$deps              = $asset_file_values['dependencies'];
		$ver               = $asset_file_values['version'];
		$src               = sprintf( '%sbuild/non-blocks/admin/ui-builder/index.js', ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_URL );

		wp_register_script( self::$handle, $src, $deps, $ver, true );

		$src = sprintf( '%sbuild/non-blocks/admin/ui-builder/index.css', ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_URL );
		wp_register_style( self::$handle, $src, array( 'wp-components',  'wp-edit-blocks'  ), $ver );

		$site_logo = get_option( 'site_logo' );
		$data = array(
			'site_url'  => site_url(),
			'admin_url'  => admin_url(),
			'site_title' => get_bloginfo( 'name' ),
			'site_logo' => wp_get_attachment_url( $site_logo ),
			'plugin_url' => ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_URL,

		);
		$data = apply_filters( 'alpc_plugin_vars', $data );
		wp_localize_script(
			self::$handle,
			'alpc_vars',
			$data
		);
	}

	/**
	 * Enqueue scripts.
	 *
	 * @return void
	 */
	public static function enqueue_scripts() {
		wp_enqueue_script( self::$handle );
		wp_enqueue_style( self::$handle );
		wp_enqueue_media();

		wp_enqueue_script( 'wp-format-library' );
		wp_enqueue_style( 'wp-format-library' );
	}

	/**
	 * Register a custom menu page.
	 *
	 * @return void
	 */
	public static function admin_menu() {
		add_submenu_page(
			'themes.php',
			__( 'Advanced Login Page Customizer', 'textdomain' ),
			__( 'Login Customizer', 'textdomain' ),
			'manage_options',
			'alpc-login-builder',
			array( __CLASS__, 'login_ui_builder_page_cb' ),
		);

		add_submenu_page(
			'ols-settings',
			__( 'Advanced Login Page Customizer', 'textdomain' ),
			__( 'Login Customizer', 'textdomain' ),
			'manage_options',
			'alpc-login-builder',
			array( __CLASS__, 'login_ui_builder_page_cb' ),
		);
	}

	/**
	 * Custom menu page callback.
	 *
	 * @return void
	 */
	public static function login_ui_builder_page_cb() {
			self::enqueue_scripts();
			do_action( 'alpc_login_ui_builder_page_cb' );
			echo "<div id='alpc-app'></div>";
	}
}

UI_Bilder::init();
