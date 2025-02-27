<?php
/**
 * Plugin Name:       Disable Admin Dashboard Notices
 * Description:       Use Disable Admin Dashboard Notices plugin and get distraction free WordPress Dashboard to enhance your productivity.
 * Version:           0.1
 * Author:            WPFraternity
 * Author URI:        https://profiles.wordpress.org/wpfraternity/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       disable-admin-dashboard-notices
 * Domain Path:       /languages
 */

defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Start plugin
 */
function wpfraternity_disable_admin_notices() {
	\WPFraternity\Disable_Admin_Dashboard\Plugin::get_instance();
}

wpfraternity_disable_admin_notices();
