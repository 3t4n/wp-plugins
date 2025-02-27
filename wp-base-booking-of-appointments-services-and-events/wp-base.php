<?php
/*
 * Plugin Name: WP BASE Booking of Appointments, Services and Events
 * Description: A complete e-commerce solution for appointment, service and event bookings.
 * Plugin URI: https://wp-base.com
 * Version: 4.9.2
 * Author: Hakan Ozevin <hakan@wp-base.com>
 * Author URI: https://wp-base.com
 * Text Domain: wp-base
 * Domain Path: /languages
 *
 * WP BASE Booking of Appointments, Services and Events is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * WP BASE Booking of Appointments, Services and Events is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with WP BASE Booking of Appointments, Services and Events. If not, see <http://www.gnu.org/licenses/>.
 *
 * Copyright © 2018 Hakan Ozevin
 * @package WP BASE
 * @author Hakan Ozevin
 */

if ( ! defined( 'WPBASE_PLUGIN_DIR' ) ) {
	define( 'WPBASE_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
}

if ( ! defined( 'WPBASE_PLUGIN_FILENAME' ) ) {
	define( 'WPBASE_PLUGIN_FILENAME', __FILE__  );
}

include_once WPBASE_PLUGIN_DIR . '/includes/pre-load.php';

/**
 ** Initial arrangements and includes ****
 */
if ( defined( 'WPB_VERSION' ) || defined( 'APP_VERSION' ) || function_exists( 'BASE' ) ) {
	add_action( 'admin_notices', '_wpb_plugin_conflict_own' );
} else if ( version_compare( PHP_VERSION, '5.5.0' ) < 0 ) {
	add_action( 'admin_notices', '_wpb_plugin_php_version' );
} else {
	define( 'WPB_VERSION', '4.9.2' );
	define( 'WPB_LATEST_DB_VERSION', '3060' );
	define( 'WPBASE_URL', 'https://wp-base.com/' );
	define( 'WPB_PLUGIN_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
	define( 'WPB_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

	if ( ! defined( 'WPB_DEV' ) ) {
		define( 'WPB_DEV', strpos( WPB_PLUGIN_BASENAME, 'wp-base-dev' ) !== false );
	}

	if ( ! defined( 'WPB_CLIENT_CAP' ) ) {
		define( 'WPB_CLIENT_CAP', 'view_bookings' ); // Add default client caps as comma separated
	}

	if ( ! defined( 'WPB_WORKER_CAP' ) ) {
		define( 'WPB_WORKER_CAP', 'view_bookings' ); // Add default worker caps as comma separated
	}

	register_uninstall_hook(  __FILE__ , 'wpb_uninstall' );
	require_once( WPBASE_PLUGIN_DIR . '/includes/install.php' );
	register_activation_hook( __FILE__, array('WpBInstall', 'install') );

	// Call main class
	require_once WPBASE_PLUGIN_DIR . '/includes/core.php';

}
