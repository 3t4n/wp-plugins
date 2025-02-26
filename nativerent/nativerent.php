<?php
/**
 * Plugin Name:       Рекламная платформа Native Rent
 * Plugin URI:        https://wordpress.org/plugins/nativerent/
 * Description:       Релевантная реклама для ваших читателей. Рекламодатели сервиса платят в 2-3 раза больше за 1 тыс. показов страниц, чем привычные рекламные сетки. Страница выкупается полностью, на ней размещается максимум четыре рекламных блока, которые выглядят нативно в стиле сайта.
 * Version:           2.1.2
 * Requires at least: 4.9
 * Tested up to:      6.7
 * Requires PHP:      5.6.20
 * Author:            Native Rent
 * Author URI:        https://nativerent.ru/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       cyr2lat
 * Domain Path:       /languages/
 *
 * @package           NativeRent
 * @author            Native Rent
 * @license           GPL-2.0-or-later
 * @wordpress-plugin
 */

use NativeRent\Plugin;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Plugin version.
if ( ! defined( 'NATIVERENT_PLUGIN_VERSION' ) ) {
	define( 'NATIVERENT_PLUGIN_VERSION', '2.1.2' );
}
// Plugin Folder Path.
if ( ! defined( 'NATIVERENT_PLUGIN_DIR' ) ) {
	define( 'NATIVERENT_PLUGIN_DIR', rtrim( __DIR__, '/\\' ) );
}
// Plugin Root File.
if ( ! defined( 'NATIVERENT_PLUGIN_FILE' ) ) {
	define( 'NATIVERENT_PLUGIN_FILE', NATIVERENT_PLUGIN_DIR . '/nativerent.php' );
}
// Templates directory path.
if ( ! defined( 'NATIVERENT_TEMPLATES_DIR' ) ) {
	define( 'NATIVERENT_TEMPLATES_DIR', NATIVERENT_PLUGIN_DIR . '/resources/templates' );
}
// Value for minimal priority argument.
if ( ! defined( 'NATIVERENT_PLUGIN_MIN_PRIORITY' ) ) {
	define( 'NATIVERENT_PLUGIN_MIN_PRIORITY', ~PHP_INT_MAX );
}
// Value for maximal priority argument.
if ( ! defined( 'NATIVERENT_PLUGIN_MAX_PRIORITY' ) ) {
	define( 'NATIVERENT_PLUGIN_MAX_PRIORITY', PHP_INT_MAX );
}
// API param names.
if ( ! defined( 'NATIVERENT_API_PARAM' ) ) {
	define( 'NATIVERENT_API_PARAM', 'nativerent-api' );
}
// Interval in seconds for running auto-update monetizations.
if ( ! defined( 'NATIVERENT_UPDATE_MONETIZATIONS_INTERVAL' ) ) {
	$_nsci_sec = getenv( 'NATIVERENT_UPDATE_MONETIZATIONS_INTERVAL' );
	define( 'NATIVERENT_UPDATE_MONETIZATIONS_INTERVAL', is_numeric( $_nsci_sec ) ? $_nsci_sec : ( 12 * 60 * 60 ) );
	unset( $_nsci_sec );
}
// URL to admin form components.
if ( ! defined( 'NATIVERENT_FORM_COMPONENTS_URL' ) ) {
	$_nrentFormComponentsURL = getenv( 'NATIVERENT_FORM_COMPONENTS_URL' );
	define(
		'NATIVERENT_FORM_COMPONENTS_URL',
		! empty( $_nrentFormComponentsURL )
			? $_nrentFormComponentsURL
			: 'https://assets.nativerent.ru/web-components/wp/v1.0.iife.js'
	);
}

require_once NATIVERENT_PLUGIN_DIR . '/vendor/autoload.php';

Plugin::instance()->init();
