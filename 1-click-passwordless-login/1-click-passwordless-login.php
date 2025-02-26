<?php
/**
 * Plugin Name: 1-Click PasswordLess Login
 * Description: Enable secure password less login with a 1-click magic link.
 * Version: 1.0.0
 * Author: Xplodman
 * Author URI: https://github.com/xplodman/
 * License: GPL2
 * Text Domain: 1-click-passwordless-login
 *
 * @package 1-click-passwordless-login
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'XCLICKPW_PLUGIN_URL', plugins_url( '', __FILE__ ) . '/' );
define( 'XCLICKPW_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'XCLICKPW_PLUGIN_BASEDIR', plugin_basename( __FILE__ ) . '/' );
define( 'XCLICKPW_PLUGIN_REL_PATH', dirname( XCLICKPW_PLUGIN_BASEDIR ) . '/' );
define( 'XCLICKPW_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

// Autoload classes.
require_once XCLICKPW_PLUGIN_PATH . 'includes/class-xclickpw-handler.php';
require_once XCLICKPW_PLUGIN_PATH . 'includes/class-xclickpw-email.php';
require_once XCLICKPW_PLUGIN_PATH . 'includes/class-xclickpw-token.php';
require_once XCLICKPW_PLUGIN_PATH . 'includes/class-xclickpw-settings.php';
require_once XCLICKPW_PLUGIN_PATH . 'includes/class-xclickpw-frontend.php';
require_once XCLICKPW_PLUGIN_PATH . 'includes/class-xclickpw-core.php';
require_once XCLICKPW_PLUGIN_PATH . 'includes/helpers.php';

/**
 * Initialize Xclickpw_Core plugin.
 *
 * @return Xclickpw_Core The PasswordLess plugin instance.
 */
function xclickpw_core() {
	static $instance;

	// The first call to instance() initializes the plugin.
	if ( ! ( $instance instanceof Xclickpw_Core ) ) {
		$instance = Xclickpw_Core::instance();
	}

	return $instance;
}

// Create an instance of the PasswordLess plugin.
xclickpw_core();
