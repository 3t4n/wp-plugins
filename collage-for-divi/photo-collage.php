<?php
/*
Plugin Name: Divi Collage
Plugin URI:  http://demo.cakewp.com/divi-collage/
Description: The Easiest Collage Maker For Divi. Just pick a layout and fill your images.
Version:     1.0.1
Author:      munirkamal
Author URI:  http://www.cakewp.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: collage-for-divi
Domain Path: /languages

Photo Collage is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Photo Collage is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Photo Collage. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'cfd_fs' ) ) {
    // Create a helper function for easy SDK access.
    function cfd_fs() {
        global $cfd_fs;

        if ( ! isset( $cfd_fs ) ) {
            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/freemius/start.php';

            $cfd_fs = fs_dynamic_init( array(
                'id'                  => '3744',
                'slug'                => 'collage-for-divi',
                'type'                => 'plugin',
                'public_key'          => 'pk_75d510f7d3a7c6988a1ab2e0c42c0',
                'is_premium'          => false,
                'has_addons'          => false,
                'has_paid_plans'      => false,
                'menu'                => array(
                    'first-path'     => 'plugins.php',
                    'account'        => false,
                    'support'        => false,
                ),
            ) );
        }

        return $cfd_fs;
    }

    // Init Freemius.
    cfd_fs();
    // Signal that SDK was initiated.
    do_action( 'cfd_fs_loaded' );
}


if ( ! function_exists( 'cwpdc_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function cwpdc_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/PhotoCollage.php';
}
add_action( 'divi_extensions_init', 'cwpdc_initialize_extension' );
endif;
