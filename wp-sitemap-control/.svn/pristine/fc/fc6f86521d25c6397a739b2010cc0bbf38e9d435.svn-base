<?php
/**
 * WP Sitemap Control
 *
 * @package           wp-sitemap-control
 * @author            Marcin Pietrzak
 * @copyright         2020-2025 Marcin Pietrzak
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       WP Sitemap Control
 * Plugin URI:        https://github.com/iworks/wp-sitemap-control
 * Description:       More control over post types on WordPress sitemap.xml.
 * Version:           trunk
 * Requires at least: 6.0
 * Requires PHP:      8.0
 * Author:            Marcin Pietrzak
 * Author URI:        http://iworks.pl/
 * Text Domain:       wp-sitemap-control
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * static options
 */
define( 'WPSMC_VERSION', 'trunk' );
define( 'WPSMC_PREFIX', 'wpsmc_' );

$base     = dirname( __FILE__ );
$includes = $base . '/includes';

/**
 * require: Iworkssitemap Class
 */
if ( ! class_exists( 'sitemap_control' ) ) {
	require_once $includes . '/iworks/class-wp-sitemap-control.php';
}
/**
 * configuration
 */
require_once $base . '/etc/options.php';
/**
 * require: IworksOptions Class
 */
if ( ! class_exists( 'iworks_options' ) ) {
	require_once $includes . '/iworks/options/options.php';
}

/**
 * load options
 */

global $sitemap_control_options;
$sitemap_control_options = null;

function sitemap_control_get_options_object() {
	global $sitemap_control_options;
	if ( is_object( $sitemap_control_options ) ) {
		return $sitemap_control_options;
	}
	$sitemap_control_options = new iworks_options();
	$sitemap_control_options->set_option_function_name( 'sitemap_control_options' );
	$sitemap_control_options->set_option_prefix( WPSMC_PREFIX );
	if ( method_exists( $sitemap_control_options, 'set_plugin' ) ) {
		$sitemap_control_options->set_plugin( basename( __FILE__ ) );
	}
	return $sitemap_control_options;
}

function sitemap_control_options_init() {
	global $sitemap_control_options;
	$sitemap_control_options->options_init();
}

function sitemap_control_activate() {
	$sitemap_control_options = new iworks_options();
	$sitemap_control_options->set_option_function_name( 'sitemap_control_options' );
	$sitemap_control_options->set_option_prefix( WPSMC_PREFIX );
	$sitemap_control_options->activate();
	/**
	 * install tables
	 */
	$sitemap_control = new sitemap_control;
}

function sitemap_control_deactivate() {
	global $sitemap_control_options;
	$sitemap_control_options->deactivate();
}

global $sitemap_control;
$sitemap_control = new sitemap_control();

/**
 * install & uninstall
 */
register_activation_hook( __FILE__, 'sitemap_control_activate' );
register_deactivation_hook( __FILE__, 'sitemap_control_deactivate' );

