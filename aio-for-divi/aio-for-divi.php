<?php
/*
Plugin Name: Divi AiO
Plugin URI:  https://divipeople.com/
Description: Build professional & functional websites faster with a range of custom and creative module and extension for Divi.
Version:     1.0.1
Author:      DiviPeople
Author URI:  https://divipeople.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: daio
Domain Path: /languages

Divi AiO is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Divi AiO is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Divi AiO. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if ( 'Divi' !== get_template() ) {
	return;
}

/**
 * Set constants.
 */
define( 'DIVI_AIO_FILE', __FILE__ );
define( 'DIVI_AIO_BASE', plugin_basename( DIVI_AIO_FILE ) );
define( 'DIVI_AIO_DIR',  plugin_dir_path( DIVI_AIO_FILE ) );
define( 'DIVI_AIO_URI',  plugins_url( '/', DIVI_AIO_FILE ) );
define( 'DIVI_AIO_PLUGIN_SETTINGS', 'daio_settings' );
define( 'DIVI_AIO_VER', '1.0.1' );
define( 'DIVI_AIO_ASSETS_URI', DIVI_AIO_URI . 'assets/' );

if ( ! function_exists( 'daio_initialize_extension' ) ):
	
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function daio_initialize_extension() {
	require_once DIVI_AIO_DIR . 'includes/DaioExtension.php';
}

add_action( 'divi_extensions_init', 'daio_initialize_extension' );
endif;