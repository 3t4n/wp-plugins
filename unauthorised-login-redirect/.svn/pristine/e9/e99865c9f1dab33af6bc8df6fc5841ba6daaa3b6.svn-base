<?php
/*
Plugin Name: Unauthorised Login Redirect
Description: This plugin allows you to effectively hide your wp-login.php and wp-admin by requiring that you access it via a custom URL of your specification, with every other request being redirected to a different URL of your specification.
Version: 0.3.9.1
Author: RS
Author URI: https://rs.scot
Author Email: wordpress.plugins@rs.scot
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

	Copyright 2015-2022 RS (wordpress.plugins@rs.scot)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 3, as
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA

*/

if( !defined( 'ABSPATH' ) ) { exit; }

define( 'RS_ULR__ADMIN_FUNC', 'rs_ulr_admin_init' );
define( 'RS_ULR__ADMIN_PAGE', 'rs-ulr' );
define( 'RS_ULR__ADMIN_REQCAP', 'add_users' );
define( 'RS_ULR__BASE', 'ulr/' );
define( 'RS_ULR__OPTION', 'rs_ulr_settings' );
define( 'RS_ULR__PLUGIN_ADMIN_URL', admin_url( 'admin.php?page='.RS_ULR__ADMIN_PAGE ) );
define( 'RS_ULR__PLUGIN_DIR', plugin_dir_path( __FILE__ ).RS_ULR__BASE );
define( 'RS_ULR__PLUGIN_DIR_NAME', end( explode( '/', dirname( __FILE__ ) ) ) );
define( 'RS_ULR__PLUGIN_FILE', __FILE__ );
define( 'RS_ULR__PLUGIN_ICON', 'dashicons-external' );
define( 'RS_ULR__PLUGIN_MENU_POS', '80.00000000000002' );
define( 'RS_ULR__PLUGIN_NAME', 'Unauthorised Login Redirect' );
define( 'RS_ULR__PLUGIN_SHORT_NAME', 'Login Redirect' );
define( 'RS_ULR__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'RS_ULR__PLUGIN_VERSION', '0.3.9.1' );

foreach( glob( RS_ULR__PLUGIN_DIR.'*.php' ) as $file ) { require_once( $file ); }

add_action( 'admin_enqueue_scripts', 'rs_ulr_css' );
add_action( 'admin_menu', 'rs_ulr_setup_menu' );
add_action( 'init', 'rs_ulr_activate' );
add_action( 'init', 'rs_ulr_redirect_out' );
add_action( 'template_redirect', 'rs_ulr_redirect_login' );

add_filter( 'plugin_action_links', 'rs_ulr_plugin_links', 10, 2 );

register_activation_hook( RS_ULR__PLUGIN_FILE, 'rs_ulr_on_activation' );
register_deactivation_hook( RS_ULR__PLUGIN_FILE, 'rs_ulr_on_deactivation' );

function rs_ulr_on_activation() { rs_ulr_activate(); }
function rs_ulr_on_deactivation() { rs_ulr_deactivate(); }