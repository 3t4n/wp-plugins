<?php
/**
 * Main file to handle files.
 */
defined( 'ABSPATH' ) || exit;


/**
 * Required files for plugin.
 */
$required_files = array(
	'inc/helpers.php',
	'inc/api/class-login-ui-api.php',
	'inc/class-menu-pointer.php',
	// 'inc/class-admin-menu.php',

	'build/non-blocks/utils/index.php',
	'build/non-blocks/admin/ui-builder/index.php',
	'build/non-blocks/admin/ui-builder-iframe/index.php',
	'build/non-blocks/login-ui/index.php',
	'build/non-blocks/admin/settings/index.php',

	// Blocks.
	'build/blocks/login-form/index.php',
);

function advanced_login_page_customizer_load_files( $files, $base_dir = ADVANCED_LOGIN_PAGE_CUSTOMIZER_BASE_DIR ) {
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

advanced_login_page_customizer_load_files( $required_files );
