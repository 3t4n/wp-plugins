<?php
/**
 * Handle admin setting.
 */
namespace OLS_Dashboard;

defined( 'ABSPATH' ) || exit;

class Utils {
	public static $handle = 'ols-dashboard-utils';
	/**
	 * Initiate class.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'register_assets' ) );
	}

	/**
	 * Register assets.
	 *
	 * @return void
	 */
	public static function register_assets() {
		$asset_file = OLS_DASHBOARD_BASE_DIR . 'build/non-blocks/utils/index.asset.php';
		if ( ! file_exists( $asset_file ) ) {
			return;
		}

		$asset_file_values = include $asset_file;
		$deps              = isset( $asset_file_values['dependencies'] ) ? $asset_file_values['dependencies'] : array();

		$ver               = isset( $asset_file_values['version'] ) ? $asset_file_values['version'] : false;

		$src = sprintf( '%sbuild/non-blocks/utils/index.js', OLS_DASHBOARD_BASE_URL );
		wp_register_script( self::$handle, $src, $deps, $ver, true );

		$src = sprintf( '%sbuild/non-blocks/utils/index.css', OLS_DASHBOARD_BASE_URL );
		wp_register_style( self::$handle, $src, array( ), $ver );
	}
}

Utils::init();
