<?php
/**
 * Plugin Name: e-youbica
 * Plugin URI: https://e-youbica.com/
 * Description: El plugin ideal para regalar: permite que los usuarios y clientes de tu tienda conviertan sus compras en un regalo sorpresa al momento de pagar. Con e-youbica, lleva tu ecommerce al siguiente nivel.
 * Version: 1.2.3
 * Author: VAGAPP
 * Author URI: https://vagapp.mx/
 * License: GPLv3 or later
 * Text Domain: e-youbica
 * Domain Path: /i18n/languages/
 * Requires at least: 5.6
 * Tested up to: 6.4.2
 * Requires PHP: 7.0
 *
 * @package Youbica
 */

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2016 VAGAPP Soluciones.
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo esc_attr('Hi there!  I\'m just a plugin, not much I can do when called directly.');
	exit;
}

if ( ! defined( 'YOUBICA_PLUGIN_FILE' ) ) {
	define( 'YOUBICA_PLUGIN_FILE', __FILE__ );
}

// Include the main Youbica class.
if ( ! class_exists( 'Youbica', false ) ) {
	require_once dirname( YOUBICA_PLUGIN_FILE ) . '/.env.php';
	include_once dirname( YOUBICA_PLUGIN_FILE ) . '/includes/class-user-youbica.php';
	include_once dirname( YOUBICA_PLUGIN_FILE ) . '/includes/class-api-user-youbica.php';
	include_once dirname( YOUBICA_PLUGIN_FILE ) . '/includes/class-youbica.php';
}

/**
 * Returns the main instance of YB.
 *
 * @since  1.0
 * @return Youbica
 */
function YOUBICA() { // phpcs:ignore WordPress.NamingConventions.ValidFunctionName.FunctionNameInvalid
	return Youbica::instance();
}

// Global for backwards compatibility.
$GLOBALS['youbica'] = YOUBICA(); 
