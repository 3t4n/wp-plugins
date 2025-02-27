<?php

/*
Plugin Name: Overlay Image Divi Module
Plugin URI:  http://learnhowwp.com/divi-overlay-images
Description: This plugins adds a new module in the Divi Builder. The module allows you add text when you hover over an image. There are two effects that you can choose for the overlay, Fade and Slide.
Version:     1.5.1
Author:      learnhowwp.com
Author URI:  http://learnhowwp.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: lwp-overlay-images
Domain Path: /languages

LWP Overlay Images is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

LWP Overlay Images is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with LWP Overlay Images. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
if ( function_exists( 'lwp_oidm_fs' ) ) {
    lwp_oidm_fs()->set_basename( false, __FILE__ );
} else {
    if ( !function_exists( 'lwp_oidm_fs' ) ) {
        // Create a helper function for easy SDK access.
        function lwp_oidm_fs() {
            global $lwp_oidm_fs;
            if ( !isset( $lwp_oidm_fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/freemius/start.php';
                $lwp_oidm_fs = fs_dynamic_init( array(
                    'id'             => '8358',
                    'slug'           => 'overlay-image-divi-module',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_f607d882d3ad34f82ebe58c3ec41a',
                    'is_premium'     => false,
                    'premium_suffix' => 'Pro',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'navigation'     => 'tabs',
                    'anonymous_mode' => true,
                    'trial'          => array(
                        'days'               => 7,
                        'is_require_payment' => false,
                    ),
                    'menu'           => array(
                        'slug' => 'lwp_overlay_image',
                    ),
                    'is_live'        => true,
                ) );
            }
            return $lwp_oidm_fs;
        }

        // Init Freemius.
        lwp_oidm_fs();
        // Signal that SDK was initiated.
        do_action( 'lwp_oidm_fs_loaded' );
    }
    //------------------------------------------------------------------------//
    if ( !function_exists( 'lwp_initialize_overlay_image_extension' ) ) {
        /**
         * Creates the extension's main class instance.
         *
         * @since 1.0.0
         */
        function lwp_initialize_overlay_image_extension() {
            require_once plugin_dir_path( __FILE__ ) . 'includes/LwpOverlayImages.php';
            require_once plugin_dir_path( __FILE__ ) . 'includes/LwpFunctions.php';
            require_once plugin_dir_path( __FILE__ ) . 'includes/functions-admin.php';
        }

        add_action( 'divi_extensions_init', 'lwp_initialize_overlay_image_extension' );
    }
}
// Display annual pricing instead of monthly pricing on Freemius Pricing page.
lwp_oidm_fs()->add_filter( 'pricing/show_annual_in_monthly', function () {
    return false;
} );
//========================================================================//
//========================ET Marketplace==================================//
//========================================================================//
if ( !function_exists( 'lwp_overlay_images_add_icons' ) ) {
    add_filter( 'et_global_assets_list', 'lwp_overlay_images_add_icons', 10 );
    function lwp_overlay_images_add_icons(  $assets  ) {
        if ( isset( $assets['et_icons_all'] ) && isset( $assets['et_icons_fa'] ) ) {
            return $assets;
        }
        $assets_prefix = et_get_dynamic_assets_path();
        $assets['et_icons_all'] = array(
            'css' => "{$assets_prefix}/css/icons_all.css",
        );
        $assets['et_icons_fa'] = array(
            'css' => "{$assets_prefix}/css/icons_fa_all.css",
        );
        return $assets;
    }

}
//========================================================================//
//========================ET Marketplace==================================//
//========================================================================//