<?php
/**
 * Plugin Name: Appalify for Woocommerce
 * Version: 1.0.0
 * Description: An All-in-One Solution for Woocommerce.
 * Author: Appalify
 * Author URI: https://appalify.com/
 * Requires at least: 4.0
 * Tested up to: 6.6.2
 * Requires Plugins: woocommerce
 * Text Domain: Appalify-for-Woocommerce
 * Domain Path: /lang/
 * WC requires at least: 8.0
 * WC tested up to: 8.3
 *
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * @package WordPress
 * @author Appalify
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load plugin class files.
require_once 'includes/class-appalify.php';
require_once 'includes/class-appalify-settings.php';

// Load plugin libraries.
require_once 'includes/lib/class-appalify-admin-api.php';
require_once 'includes/lib/class-appalify-post-type.php';
require_once 'includes/lib/class-appalify-taxonomy.php';

add_action( 'plugins_loaded', 'appalify_woocommerce_init' );


add_action( 'before_woocommerce_init', function() {
	if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
	}
} );

function appalify_woocommerce_init() {
	load_plugin_textdomain( 'appalify', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );

	if ( ! class_exists( 'WooCommerce' ) ) {
		add_action( 'admin_notices', 'woocommerce_appalify_missing_wc_notice' );
		return;
	}


	appalify();
}


function woocommerce_appalify_missing_wc_notice() {
	$install_url = wp_nonce_url(
		add_query_arg(
			[
				'action' => 'install-plugin',
				'plugin' => 'woocommerce',
			],
			admin_url( 'update.php' )
		),
		'install-plugin_woocommerce'
	);

	$admin_notice_content = sprintf(
		// translators: 1$-2$: opening and closing <strong> tags, 3$-4$: link tags, takes to woocommerce plugin on wp.org, 5$-6$: opening and closing link tags, leads to plugins.php in admin
		esc_html__( '%1$sAppalify for Woocommerce is inactive.%2$s The %3$sWooCommerce plugin%4$s must be active for Appalify for Woocommerce to work. Please %5$sinstall & activate WooCommerce &raquo;%6$s', 'appalify' ),
		'<strong>',
		'</strong>',
		'<a href="http://wordpress.org/extend/plugins/woocommerce/">',
		'</a>',
		'<a href="' . esc_url( $install_url ) . '">',
		'</a>'
	);

	echo '<div class="error">';
	echo '<p>' . wp_kses_post( $admin_notice_content ) . '</p>';
	echo '</div>';
}

	


/**
 * Returns the main instance of appalify to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object appalify
 */
function appalify() {
	$instance = appalify::instance( __FILE__, '1.0.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = appalify_Settings::instance( $instance );
	}

	return $instance;
}
if (!defined('PLUGIN_URL')) {
    define('PLUGIN_URL', plugin_dir_url(__FILE__)); // URL to the root of the plugin
}

if (!defined('PLUGIN_DIR')) {
    define('PLUGIN_DIR', plugin_dir_path(__FILE__)); // Absolute path to the plugin directory
}

