<?php
/**
* Plugin Name: 5sterrenspecialist – wc invites
* Plugin URI: https://wordpress.org/plugins/5sterrenspecialist-wc-invites
* Description: This plugin is made by 5sterrenspecialist.nl to automatically invite WooCommerce clients to leave a review.
* Version: 1.1
* Author: 5-sterrenspecialist
* Author URI: https://www.5sterrengroeipromotor.nl/
* License: GPL2
* Tested up to: 6.6.2
* Text Domain: _fivester_invite_
* Domain Path: /languages
*/
/*
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define( 'FIVESTER_INVITE_NAME__', '5sterrenspecialist Invite' );
define( 'FIVESTER_INVITE_SLUG__', '_fivester_invite' );
define( 'FIVESTER_INVITE_VERSION__', 1.0 );
define( 'FIVESTER_INVITE_DIR__', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'FIVESTER_INVITE_URL__', plugin_dir_url( __FILE__ ) );
define( 'FIVESTER_INVITE_ROOT__', trailingslashit( plugins_url( '', __FILE__ ) ) );
define( 'FIVESTER_INVITE_RESOURCES__', FIVESTER_INVITE_ROOT__ . 'resources/' );
define( 'FIVESTER_INVITE_API__', 'https://www.5sterrenspecialist.nl/reviewInvite.php?hash=' );

/**
 * Abort loading if WordPress is upgrading
 */
if ( defined( 'WP_INSTALLING' ) && WP_INSTALLING ) {
    return;
}

function fivester_invite_init() {
	require_once FIVESTER_INVITE_DIR__ . '/classes/FiveSter/Autoloader.php';
	FiveSter_Autoloader::register();
	FiveSter_Plugin::get_instance()->load();
}

// hook to load plugin
add_action( 'plugins_loaded', 'fivester_invite_init', 0 );

register_activation_hook( __FILE__ , 'fivester_invite_activate' );
register_deactivation_hook( __FILE__ , 'fivester_invite_deactivate' );

function fivester_invite_activate() {
	require_once FIVESTER_INVITE_DIR__ . '/classes/FiveSter/Autoloader.php';
	FiveSter_Autoloader::register();
	FiveSter_Plugin::get_instance()->activate();
}

function fivester_invite_deactivate() {
	require_once FIVESTER_INVITE_DIR__ . '/classes/FiveSter/Autoloader.php';
	FiveSter_Autoloader::register();
	FiveSter_Plugin::get_instance()->deactivate();
}