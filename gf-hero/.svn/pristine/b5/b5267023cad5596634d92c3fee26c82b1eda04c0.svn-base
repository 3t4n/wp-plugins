<?php

/**
 * Plugin Name:       Hero for Gravity Forms
 * Description:       Gravity Forms superpowers.
 * Plugin URI:        https://toroguapo.com/gf-hero/
 * Version:           1.1.1
 * Author:            Toro Guapo
 * Author URI:        https://toroguapo.com/
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       gf-hero
 * Requires at least: 5.0.12
 * Requires PHP:      5.6.40
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__ . '/config.php';

if ( ! defined( 'DOING_AJAX' ) ) {
    require_once __DIR__ . '/common.php';

    function tggh_init() {
        if ( ! function_exists( 'rgget' ) && ! class_exists( 'GFForms' ) ) {
            require_once ABSPATH . '/wp-admin/includes/plugin.php';
            deactivate_plugins( 'gf-hero/gf-hero.php' );
        }

        for ( $level = 1; $level <= TGGH_MAX_LEVEL; ++$level ) {
            $path = __DIR__ . '/level-' . $level . '/init.php';
            if ( file_exists( $path ) ) {
                require_once $path;
                call_user_func( 'tggh_init_' . $level );
            }
        }

        if ( is_admin() ) {
            if ( rgget( 'page' ) === 'gf_edit_forms' && ! empty( $_GET['id'] ) ) {
                require_once __DIR__ . '/admin.php';
            }
        } else {
            require_once __DIR__ . '/site.php';
        }
    }

    add_action( 'plugins_loaded', 'tggh_init' );
}

// Activation Hooks
// ----------------

function tggh_activate() {
    if ( current_user_can( 'activate_plugins' ) ) {
        define( 'TGGH_ACTIVATE', 1 );
        require_once __DIR__ . '/activation.php';
    }
}

register_activation_hook( __FILE__, 'tggh_activate' );
