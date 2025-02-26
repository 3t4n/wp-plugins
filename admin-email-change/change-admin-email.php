<?php
/**
 * Plugin Name: Admin email change
 * Plugin URI: #
 * Description: Change admin email without send confirmation mail.
 * Version: 1.0.0
 * Author: MageINIC
 * Author URI: https://profiles.wordpress.org/wpteamindianic/#content-plugins
 * Text Domain: change-admin-email
 * Domain Path: languages/
 * Requires at least: 5.8
 * Requires PHP: 7.2
 *
 * @package change-admin-email
 */

defined( 'ABSPATH' ) || exit;
define('CAE_URL', plugin_dir_url(__FILE__));
define('CAE_PUBLIC_URL', CAE_URL . 'public/');

/**
 * Init Hook for plugin
 * @since 1.0
 * */
add_action( 'init', 'cae_init' );
function cae_init() {
    include_once plugin_dir_path( __FILE__ ).'admin/admin-settings.php';
}
/**
 * Activation Hook
 * @since 1.0
 * */
register_activation_hook( __FILE__, 'cae_flush_rewrites' );
function cae_flush_rewrites() {
        //activate_cae();
}
/**
 * Uninstall Hook
 * @since 1.0
 * */
register_uninstall_hook( __FILE__, 'cae_uninstall' );
function cae_uninstall() {
  // Uninstallation stuff here
}