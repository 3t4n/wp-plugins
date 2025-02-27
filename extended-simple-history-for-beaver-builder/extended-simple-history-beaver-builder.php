<?php
/**
 * Plugin Name:       Simple History Beaver Builder Add-On
 * Description:       A Simple History extension to log additional data from Beaver Builder.
 * Version:           1.2.1
 * Requires at least: 4.1.0
 * Tested up to:      6.2.2
 * Requires PHP:      7.2
 * Stable tag:        1.2.1
 * Author:            WEBDOGS
 * Author URI:        https://webdogs.com
 * Text Domain:       extended-simple-history-beaver-builder
 * Domain Path:       /languages
 *
 * @since             1.0.0
 * @package           extended-simple-history-beaver-builder
 *
 * Requires PHP 7.2 for object type hinting.
 * Requires WordPress 4.1.0 for the wp_json_encode function.
 * Tested to PHP 8.0.
 */

namespace WEBDOGS\Extended_Simple_History_Beaver_Builder;

if ( ! defined( 'WPINC' ) ) {
	exit;
}

spl_autoload_register(
	// Autoload classes in the WEBDOGS\Extended_Simple_History_Beaver_Builder namespace.
	function ( string $class_name ): void {
		$prefix         = __NAMESPACE__ . '\\Classes\\';
		$base_directory = trailingslashit( __DIR__ ) . 'includes/classes/';
		$prefix_length  = strlen( $prefix );

		if ( 0 !== strncmp( $prefix, $class_name, $prefix_length ) ) {
			return;
		}

		$relative_class = substr( $class_name, $prefix_length );

		foreach ( array(
			'class',
			'abstract',
			'interface',
			'trait',
		) as $file_prefix ) {
			$file = $base_directory . str_replace( array( '\\', '_' ), array( '/', '-' ), preg_replace( '/([^\\\]+$)/', $file_prefix . '-$1', strtolower( $relative_class ) ) ) . '.php';

			if ( file_exists( $file ) ) {
				require_once $file;
				break;
			}
		}
	}
);

/**
 * Plugin version.
 *
 * @since 1.0.0
 * @var string WEBDOGS\Extended_Simple_History_Beaver_Builder\VERSION The plugin version.
 */
define( __NAMESPACE__ . '\VERSION', get_file_data( __FILE__, array( 'Version' => 'Version' ) )['Version'] );

/**
 * Plugin root file.
 *
 * @since 1.0.0
 * @var string WEBDOGS\Extended_Simple_History_Beaver_Builder\ROOT_FILE The plugin root file.
 */
define( __NAMESPACE__ . '\ROOT_FILE', __FILE__ );

/**
 * Plugin root namespace.
 *
 * @since 1.0.0
 * @var string WEBDOGS\Extended_Simple_History_Beaver_Builder\ROOT_NAMESPACE The plugin root namespace.
 */
define( __NAMESPACE__ . '\ROOT_NAMESPACE', __NAMESPACE__ );

/**
 * Plugin root file path.
 *
 * @since 1.0.0
 * @var string WEBDOGS\Extended_Simple_History_Beaver_Builder\PATH The plugin root file path.
 */
define( __NAMESPACE__ . '\PATH', plugin_dir_path( ROOT_FILE ) );

/**
 * Plugin root file basename without the file extension.
 *
 * @since 1.0.0
 * @var string WEBDOGS\Extended_Simple_History_Beaver_Builder\BASENAME The plugin basename.
 */
define( __NAMESPACE__ . '\BASENAME', basename( ROOT_FILE, '.php' ) );

/**
 * Plugin root namespace basename.
 *
 * @since 1.0.0
 * @var string WEBDOGS\Extended_Simple_History_Beaver_Builder\ROOT_NAMESPACE_BASENAME The plugin root namespace basename.
 */
define( __NAMESPACE__ . '\ROOT_NAMESPACE_BASENAME', substr( __NAMESPACE__, strrpos( __NAMESPACE__, '\\' ) + 1 ) );

require_once PATH . 'includes/simple-history.php';
require_once PATH . 'includes/scripts-styles.php';
