<?php
/**
 * Handle admin setting.
 */
namespace Advanced_Login_Page_Customizer;

defined( 'ABSPATH' ) || exit;

class UI_Bilder_Iframe {

	/**
	 * Assets handle.
	 *
	 * @var string
	 */
	public static $handle = 'alpc-admin-ui-builder-iframe';

	/**
	 * Initiate class.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'register_assets' ) );
		add_action( 'login_footer', array( __CLASS__, 'enqueue_scripts' ) );
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
		$src               = sprintf( '%sbuild/non-blocks/admin/ui-builder-iframe/index.js', ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_URL );

		wp_register_script( self::$handle, $src, $deps, $ver, true );

		$src = sprintf( '%sbuild/non-blocks/admin/ui-builder-iframe/index.css', ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_URL );
		wp_register_style( self::$handle, $src, array(  ), $ver );

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
		if( empty( $_GET['alpc_preview'] ) || 'true' !==  $_GET['alpc_preview'] ) {
			return false;
		}
		wp_enqueue_script( self::$handle );
		// wp_enqueue_style( self::$handle );
		do_action( 'alpc_ui_builder_iframe' );
		echo "<div id='alpc-preview-scripts'></div>";
	}
}

UI_Bilder_Iframe::init();
