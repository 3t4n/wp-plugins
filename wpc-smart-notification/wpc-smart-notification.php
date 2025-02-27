<?php
/**
 * Plugin Name: WPC Smart Notifications for WooCommerce
 * Plugin URI: https://wpclever.net/
 * Description: Increase trust, credibility, and sales with smart notifications.
 * Version: 2.4.2
 * Author: WPClever
 * Author URI: https://wpclever.net
 * Text Domain: wpc-smart-notification
 * Domain Path: /languages/
 * Requires Plugins: woocommerce
 * Requires at least: 4.0
 * Tested up to: 6.7
 * WC requires at least: 3.0
 * WC tested up to: 9.6
 */

use WPCSN\initialization;

defined( 'ABSPATH' ) || exit;

! defined( 'WPCSN_VERSION' ) && define( 'WPCSN_VERSION', '2.4.2' );
! defined( 'WPCSN_LITE' ) && define( 'WPCSN_LITE', __FILE__ );
! defined( 'WPCSN_FILE' ) && define( 'WPCSN_FILE', __FILE__ );
! defined( 'WPCSN_URI' ) && define( 'WPCSN_URI', plugin_dir_url( __FILE__ ) );
! defined( 'WPCSN_DIR' ) && define( 'WPCSN_DIR', plugin_dir_path( __FILE__ ) );
! defined( 'WPCSN_SUPPORT' ) && define( 'WPCSN_SUPPORT', 'https://wpclever.net/support?utm_source=support&utm_medium=wpcsn&utm_campaign=wporg' );
! defined( 'WPCSN_REVIEWS' ) && define( 'WPCSN_REVIEWS', 'https://wordpress.org/support/plugin/wpc-smart-notification/reviews/?filter=5' );
! defined( 'WPCSN_CHANGELOG' ) && define( 'WPCSN_CHANGELOG', 'https://wordpress.org/plugins/wpc-smart-notification/#developers' );
! defined( 'WPCSN_DISCUSSION' ) && define( 'WPCSN_DISCUSSION', 'https://wordpress.org/support/plugin/wpc-smart-notification' );
! defined( 'WPC_URI' ) && define( 'WPC_URI', WPCSN_URI );

include 'includes/dashboard/wpc-dashboard.php';
include 'includes/kit/wpc-kit.php';
include 'includes/hpos.php';

global $wpcsn;

if ( empty( $wpcsn ) ) {
	include 'core/helper.php';
	include 'core/initialization.php';
	initialization::get_instance();
}
