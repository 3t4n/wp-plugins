<?php
defined( 'ABSPATH' ) or die( 'No direct access, please!' );

/*
 * Plugin Name:	Ample Themes Demo Importer
 * Description:	Import demo website of theme developed by Ample Themes.
 * Version:		2.4.0 * Author:		amplethemes
 * Tested up to:   5.7
 * Author URI:	https://amplethemes.com
 * License:		GPLv2 or later
 * License URI:	http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: atdi
 * Domain Path: /languages
 *
 */




/**
 * Amplesplay admin error message if PHP version is older than 5.3.2.
 * Otherwise execute the main plugin class.
 */
if ( version_compare( phpversion(), '5.3.2', '<' ) ) {

	/**
	 * Amplesplay an admin error notice when PHP is older the version 5.3.2.
	 * Hook it to the 'admin_notices' action.
	 */
	function atdsi_old_php_admin_error_notice() {
		$message = sprintf( esc_html__( 'The %2$s Ample Themes Demo Importer %3$s plugin requires %2$sPHP 5.3.2+%3$s to run properly. Please contact your hosting company and ask them to update the PHP version of your site to at least PHP 5.3.2.%4$s Your current version of PHP: %2$s%1$s%3$s', 'atdi' ), phpversion(), '<strong>', '</strong>', '<br>' );

		printf( '<div class="notice notice-error"><p>%1$s</p></div>', wp_kses_post( $message ) );
	}
	add_action( 'admin_notices', 'atdi_old_php_admin_error_notice' );
} else {

	define( 'ATDI_VERSION' , '2.4.0' ); // Return version of this plugin.
	define( 'ATDI_FILE', __FILE__ ); // Return 'path of this file'.
	define( 'ATDI_PATH', wp_normalize_path( plugin_dir_path( ATDI_FILE ) ) ); // Return 'path of this directory'.
	define( 'ATDI_URL', plugin_dir_url( ATDI_FILE ) ); // Return 'URL of this directory'.
	define( 'ATDI_BASENAME', plugin_basename( ATDI_FILE ) ); // Return base name like 'plugin-name/plugin-name.php'
	define( 'ATDI_DIR_NAME', dirname( ATDI_BASENAME ) ); // Return name of directory like 'plugin-name'
	define( 'ATDI_TEMPLATE_URL', ATDI_URL.'/inc/amplethemes/' ); // Return name of directory like 'plugin-name'
    define( 'ATDI_DEMO_URL', ATDI_URL.'/inc/a2zthemes/' ); // Return name of directory like 'plugin-name'

	// Require main plugin file.
	require ATDI_PATH . 'inc/class-atdi-main.php';
}
