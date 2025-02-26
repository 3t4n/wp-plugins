<?php
/*
Plugin Name: OPI Security Boost
Text Domain: opi-security-boost
Plugin URI: https://opi.org.pl/
Description: OPI Security Boost plugin adds basic hardness to your site.
Version: trunk
Author: Marcin Pietrzak
Author URI: http://iworks.pl/
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Copyright 2023-2025 Marcin Pietrzak (marcin@iworks.pl)

this program is free software; you can redistribute it and/or modify
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

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

/**
 * static options
 */
$base   = dirname( __FILE__ );
$vendor = $base . '/includes';
/**
 * configuration
 */
require_once $base . '/etc/options.php';
/**
 * require: IworksOptions Class
 */
if ( ! class_exists( 'iworks_options' ) ) {
	require_once $vendor . '/iworks/options/options.php';
}
/**
 * load options
 */
global $opi_security_boost_options;
$opi_security_boost_options = null;

function opi_security_boost_get_options() {
	global $opi_security_boost_options;
	if ( is_object( $opi_security_boost_options ) ) {
		return $opi_security_boost_options;
	}
	$opi_security_boost_options = new iworks_options();
	$opi_security_boost_options->set_option_function_name( 'opi_security_boost_options' );
	$opi_security_boost_options->set_option_prefix( 'opi_sb_' );
	if ( method_exists( $opi_security_boost_options, 'set_plugin' ) ) {
		$opi_security_boost_options->set_plugin( basename( __FILE__ ) );
	}
	$opi_security_boost_options->init();
	return $opi_security_boost_options;
}
/**
 * Commons
 */

if ( ! class_exists( 'OPI_Security_Boost_WordPress' ) ) {
	require_once $vendor . '/opi/class-opi-security-boost-wordpress.php';
}
new OPI_Security_Boost_WordPress;
/**
 * security.txt
 */
if ( ! class_exists( 'OPI_Security_Boost_Security_Txt' ) ) {
	require_once $vendor . '/opi/class-opi-security-boost-security-txt.php';
}
new OPI_Security_Boost_Security_Txt;
/**
 * security.txt
 */
if ( ! class_exists( 'OPI_Security_Boost_PGP_Key_Txt' ) ) {
	require_once $vendor . '/opi/class-opi-security-boost-pgp-key-txt.php';
}
new OPI_Security_Boost_PGP_Key_Txt;
/**
 * EndPoints
 */
if ( ! class_exists( 'OPI_Security_Boost_REST_API' ) ) {
	require_once $vendor . '/opi/class-opi-security-boost-rest-api.php';
}
new OPI_Security_Boost_REST_API;

/**
 * users
 */
if ( ! class_exists( 'OPI_Security_Boost_Users' ) ) {
	require_once $vendor . '/opi/class-opi-security-boost-users.php';
}
new OPI_Security_Boost_Users;

function opi_security_boost_options_init() {
	global $opi_security_boost_options;
	$opi_security_boost_options->options_init();
}

function opi_security_boost_activate() {
}

function opi_security_boost_deactivate() {
}


/**
 * install & uninstall
 */
register_activation_hook( __FILE__, 'opi_security_boost_activate' );
register_deactivation_hook( __FILE__, 'opi_security_boost_deactivate' );
