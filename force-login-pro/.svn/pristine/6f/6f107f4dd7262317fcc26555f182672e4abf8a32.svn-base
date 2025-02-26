<?php
/**
 * Plugin Name: Force Login Pro
 * Plugin URI: https://github.com/accessnetworks/force-login-pro
 * Description: Force users to login before viewing your WordPress site. Activate to turn on.
 * Version: 0.0.4
 * Author: Access Networks
 * Author URI: https://www.accessca.com
 *
 * Text Domain: force-login-pro
 * Domain Path: /languages
 *
 * License: GPL3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package force-login-pro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Flush on Activation and Deactivation.
register_activation_hook( __FILE__, 'flush_rewrite_rules' );
register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );

/**
 * Quick Defines.
 *
 * @access public
 */
function force_login_pro_init() {
	define( 'FORCE_LOGIN_PRO_URL', plugin_dir_url( __FILE__ ) );
	define( 'FORCE_LOGIN_PRO_DIR', plugin_dir_path( __FILE__ ) );
	define( 'FORCE_LOGIN_PRO_VERSION', '0.0.3' );
	define( 'FORCE_LOGIN_PRO_DB_VERSION', '0.0.1' );
}

/**
 * Force Login.
 *
 * @access public
 */
function force_login() {

	// Exceptions for AJAX, Cron, or WP-CLI requests.
	if ( ( defined( 'DOING_AJAX' ) && DOING_AJAX ) || ( defined( 'DOING_CRON' ) && DOING_CRON ) || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
		return;
	}

	// Redirect unauthorized visitors.
	if ( ! is_user_logged_in() ) {
		// Get visited URL.
		$url  = isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http';
		$url .= '://' . $_SERVER['HTTP_HOST'];
		// Port is prepopulated here sometimes.
		if ( strpos( $_SERVER['HTTP_HOST'], ':' ) === false ) {
			$url .= in_array( $_SERVER['SERVER_PORT'], array( '80', '443' ), true ) ? '' : ':' . $_SERVER['SERVER_PORT'];
		}
		$url .= $_SERVER['REQUEST_URI'];

		/**
		 * Bypass filters.
		 *
		 * @since 3.0.0 The `$whitelist` filter was added.
		 * @since 4.0.0 The `$bypass` filter was added.
		 * @since 5.2.0 The `$url` parameter was added.
		 */
		$bypass    = apply_filters( 'force_login_bypass', false, $url );
		$whitelist = apply_filters( 'force_login_whitelist', array() );

		if ( preg_replace( '/\?.*/', '', $url ) !== preg_replace( '/\?.*/', '', wp_login_url() ) && ! $bypass && ! in_array( $url, $whitelist, true ) ) {
			// Determine redirect URL.
			$redirect_url = apply_filters( 'force_login_redirect', $url );
			// Set the headers to prevent caching.
			nocache_headers();
			// Redirect.
			wp_safe_redirect( wp_login_url( $redirect_url ), 302 );
			exit;
		}
	} elseif ( function_exists( 'is_multisite' ) && is_multisite() ) {
		// Only allow Multisite users access to their assigned sites.
		if ( ! is_user_member_of_blog() && ! current_user_can( 'setup_network' ) ) {
			wp_die( esc_html( "You're not authorized to access this site.", 'force-login-pro' ), esc_html( get_option( 'blogname' ) ) . ' &rsaquo; ' . esc_html( 'Error', 'force-login-pro' ) );
		}
	}
}
add_action( 'template_redirect', 'force_login' );


/**
 * Restrict REST API for authorized users only.
 *
 * @access public
 * @param mixed $result Results.
 */
function force_login_rest_access( $result ) {
	if ( null === $result && ! is_user_logged_in() ) {
		return new WP_Error( 'rest_unauthorized', __( 'Only authenticated users can access the REST API.', 'force-login-pro' ), array( 'status' => rest_authorization_required_code() ) );
	}
	return $result;
}
// add_filter( 'rest_authentication_errors', 'force_login_rest_access', 99 );

/**
 * Localization.
 */
function force_login_load_textdomain() {
	load_plugin_textdomain( 'force-login-pro', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'force_login_load_textdomain' );
