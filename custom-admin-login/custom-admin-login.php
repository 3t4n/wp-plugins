<?php

/**
 * Plugin Name:         Custom Admin Login
 * Plugin URI:          https://github.com/jprieton/custom-admin-login
 * Description:         Allows you to customize the background, logo, url and caption on the WordPress login page.
 * Tags:                admin, login, custom, background, logo, custom admin login, login page
 * Version:             1.0.8
 * Requires at least:   5.2
 * Tested up to:        6.0
 * Author:              Javier Prieto
 * Author URI:          https://github.com/jprieton
 * Text Domain:         custom-admin-login
 * Domain Path:         /languages/
 *
 * Custom Admin Login is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * Custom Admin Login is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Custom Admin Login. If not, see http://www.gnu.org/licenses/gpl-3.0.txt.
 *
 * @package CustomAdminLogin
 */

// If this file is called directly, abort.
defined( 'ABSPATH' ) || exit;

/**
 * Define plugin constants
 * @since 1.0.0
 */
define( 'CustomAdminLogin\FILENAME', __FILE__ );
define( 'CustomAdminLogin\BASENAME', plugin_basename( __FILE__ ) );
define( 'CustomAdminLogin\INCLUDES', plugin_dir_path( CustomAdminLogin\FILENAME ) . 'includes' );

// Load texdomain
require_once CustomAdminLogin\INCLUDES . '/class-textdomain.php';
CustomAdminLogin\Textdomain::init();

// Initialize customizer
require_once CustomAdminLogin\INCLUDES . '/class-theme-customizer.php';
CustomAdminLogin\Theme_Customizer::init();

