<?php
/*
 * Plugin Name:          MúzaPay
 * Description:          Official MúzaPay plugin for WooCommerce.
 * Version:              1.0.1
 * Requires PHP:         8.0.0
 * Requires at least:    6.0.9
 * Requires Plugins:     woocommerce
 * WC requires at least: 7.0
 * WC tested up to:      9.0
 * Author:               Benefit Plus
 * Author URI:           https://www.benefit-plus.cz/
 * License:              GPL v2 or later
 * License URI:          https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:          muzapay
 * Domain Path:          /languages
*/

use Automattic\WooCommerce\Utilities\FeaturesUtil;
use MuzaPay\Plugin;
use MuzaPayDeps\DI\Container;
use MuzaPayDeps\DI\ContainerBuilder;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! defined( 'MUZAPAY_MIN_PHP_VERSION' ) ) {
	define( 'MUZAPAY_MIN_PHP_VERSION', '8.0.0' );
}

/**
 * @return Plugin
 * @throws Exception
 */
function muzapay(): Plugin {
	return muzapay_container()->get( Plugin::class );
}

/**
 * @return Container
 * @throws Exception
 */
function muzapay_container(): Container {
	static $container;

	if ( empty( $container ) ) {
		$is_production    = ! WP_DEBUG;
		$file_data        = get_file_data( __FILE__, array( 'version' => 'Version' ) );
		$definition       = require_once __DIR__ . '/config.php';
		$containerBuilder = new ContainerBuilder();
		$containerBuilder->addDefinitions( $definition );
		$container = $containerBuilder->build();
	}

	return $container;
}

function muzapay_activate( $network_wide ) {
	muzapay()->activate( $network_wide );
}

function muzapay_deactivate( $network_wide ) {
	muzapay()->deactivate( $network_wide );
}

function muzapay_uninstall() {
	muzapay()->uninstall();
}

function muzapay_php_upgrade_notice() {
	$info = get_plugin_data( __FILE__ );

	echo sprintf(
		/* translators: 1: Plugin Name, 2: Required PHP version, 3: Current PHP version */
		'<div class="error notice"><p>' . esc_html( __( 'Opps! %1$s requires a minimum PHP version of %2$s. Your current version is: %3$s. Please contact your host to upgrade.', 'muzapay' ) ) . '</p></div>',
		esc_html( $info['Name'] ),
		esc_html( MUZAPAY_MIN_PHP_VERSION ),
		esc_html( PHP_VERSION ),
	);
}

if ( version_compare( PHP_VERSION, MUZAPAY_MIN_PHP_VERSION ) < 0 ) {
	add_action( 'admin_notices', 'muzapay_php_upgrade_notice' );
} else {
	include_once __DIR__ . '/vendor/autoload.php';
	include_once __DIR__ . '/vendor/prefixed/scoper-autoload.php';

	add_action( 'plugins_loaded', 'muzapay', 5 );
	register_activation_hook( __FILE__, 'muzapay_activate' );
	register_deactivation_hook( __FILE__, 'muzapay_deactivate' );
	register_uninstall_hook( __FILE__, 'muzapay_uninstall' );
}

add_action( 'before_woocommerce_init', function() {
	if ( class_exists( FeaturesUtil::class ) ) {
		FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
	}
} );
