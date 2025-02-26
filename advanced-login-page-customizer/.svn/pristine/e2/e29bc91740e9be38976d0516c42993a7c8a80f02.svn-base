<?php
namespace Ols\OlsDashboard;

/**
 * Main file to handle files.
 */
defined( 'ABSPATH' ) || exit;

define( 'OLS_DASHBOARD_PLUGIN_VERSION', '1.0.0' );
define( 'OLS_DASHBOARD_BASE_FILE', __FILE__ );
define( 'OLS_DASHBOARD_BASE_DIR', plugin_dir_path(  dirname( OLS_DASHBOARD_BASE_FILE ) ) );
define( 'OLS_DASHBOARD_BASE_URL', trailingslashit( plugin_dir_url( dirname( OLS_DASHBOARD_BASE_FILE ) ) ) );

class Ols_Dashboard {
	function __construct() {
		/**
		 * Required files for plugin.
		 */
		$required_files = array(
			'inc/helpers.php',

			// Blocks.
			'build/non-blocks/utils/index.php',
			'build/non-blocks/admin-ui/index.php',
			'build/non-blocks/admin/components/index.php',
			'build/non-blocks/admin/settings/index.php',
		);
		$this->load_files( $required_files, OLS_DASHBOARD_BASE_DIR );
	}

	public function load_files( $files, $base_dir = '' ) {
		/**
		 * check and include files.
		 */
		foreach ( $files as $file ) {
			$file = sprintf( '%s%s', $base_dir, $file );
			if ( file_exists( $file ) ) {
				require_once $file;
			}
		}
	}
}
