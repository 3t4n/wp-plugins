<?php
/**
 * Handle admin setting.
 */
namespace Advanced_Login_Page_Customizer;

defined( 'ABSPATH' ) || exit;

class Admin_Settings {

	/**
	 * Assets handle.
	 *
	 * @var string
	 */
	public static $handle = 'alpc-admin-settings';

	/**
	 * Initiate class.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'register_assets' ) );
		add_action( 'admin_menu', array( __CLASS__, 'admin_menu' ), 11 );
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
		$src               = sprintf( '%sbuild/non-blocks/admin/settings/index.js', ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_URL );
		$deps[] = 'ols-dashboard-utils';
		wp_register_script( self::$handle, $src, $deps, $ver, true );

		$src = sprintf( '%sbuild/non-blocks/admin/settings/index.css', ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_URL );
		wp_register_style( self::$handle, $src, array( 'ols-dashboard-admin-ui', 'ols-dashboard-admin-components',  'ols-dashboard-admin-settings' ), $ver );

		$site_logo = get_option( 'site_logo' );
		$data      = array(
			'admin_url'  => admin_url(),
			'site_title' => get_bloginfo( 'name' ),
			'site_logo'  => wp_get_attachment_url( $site_logo ),
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
			'ols-settings',
			__( 'Advanced Login Page Customizer', 'textdomain' ),
			__( 'Login Settings', 'textdomain' ),
			'manage_options',
			'alpc-settings',
			array( __CLASS__, 'settings_menu_cb' ),
		);

		// global $submenu;
		// var_dump( $submenu );
		// $submenu['ols-settings'][0][0] = 'Dashboard';
	}

	/**
	 * Custom menu page callback.
	 *
	 * @return void
	 */
	public static function settings_menu_cb() {
		self::enqueue_scripts();
		echo "<div id='alpc-app' class='ols-ui ols-app'></div>";
	}
}

Admin_Settings::init();
