<?php
/**
 * Plugin Name: WP PHP Version Display
 * Plugin URI:  https://wordpress.org/plugins/wp-php-version-display/
 * Description: Displays the current running PHP version inside "At a Glance" admin dashboard widget.
 * Author:      Arul Prasad J
 * Author URI:  https://profiles.wordpress.org/arulprasadj/
 * Version:     2.0
 * Text Domain: wp-php-version-display
 * Domain Path: /languages
 * License:     GPLv2 or later (license.txt)
 
Copyright (C)  2020-2021 arulprasadj

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
*/
/**
 * WP PHP Version Display
 *
 *
 * @package WP PHP Version Display
 * @version 2.0
 * @since 1.0
 */

// Quit, if now WP environment.
defined( 'ABSPATH' ) || exit;

add_action( 'rightnow_end', function() {
		$apjconnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); //For getting mysql version
		echo PHP_EOL, \wpautop( \sprintf( \__( 'PHP version <b>%1$s</b> & MySQL version <b>%2$s</b> is running.', 'wp-php-version-display' ), phpversion(), mysqli_get_server_info($apjconnection) ) );
});
