<?php
/**
 * Plugin Name: AR Menu Icons
 * Description: Make attractive your site menus with modern icons or svg by using AR Menu Icons.
 * Author:      ARsyntax
 * Author URI:  https://arsyntax.com
 * Version:     1.0.5
 * Requires at least: 6.0
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: ar-menu-icons
 * Domain Path: /languages
*/
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

    if(!class_exists('ARMICN_PRO')) {

        define( 'ARMICN_VERSION', '1.0.5' );
        define( 'ARMICN_PL_ROOT', __FILE__ );
        define( 'ARMICN_PLUGIN_BASE', plugin_basename( ARMICN_PL_ROOT ) );
        define( 'ARMICN_DIR_PATH', plugin_dir_path( ARMICN_PL_ROOT ) );
        define( 'ARMICN_DIR_URL', plugin_dir_url( ARMICN_PL_ROOT ) );

        require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

        include 'admin/inc/settings.php';
        include 'admin/inc/metaboxes.php';
        include 'admin/inc/scripts.php';
        include 'admin/inc/ajax-handler.php';
        include 'public/init.php';
        include 'class.ar-menu-icons.php';

        ARMICN::instance();
    }   