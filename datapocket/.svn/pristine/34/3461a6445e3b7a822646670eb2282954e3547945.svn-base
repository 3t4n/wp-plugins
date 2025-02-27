<?php

/**
 * Plugin Name:       DataPocket
 * Plugin URI:        https://datapocket.app/
 * Description:       Design in Canva, Figma & Adobe using your Woo & WordPress data
 * Version:           1.3.6
 * Requires at least: 4.6
 * Requires PHP:      7.0
 * Author:            OVIXIA
 * Author URI:        https://ovixia.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       datapocket
 * Domain Path:       /i18n/languages/
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'DATAPOCKET_PLUGIN_FILE' ) ) {
	define( 'DATAPOCKET_PLUGIN_FILE', __FILE__ );
}

// Include the main Datapocket class.
if ( ! class_exists( 'Datapocket', false ) ) {
	include_once dirname( DATAPOCKET_PLUGIN_FILE ) . '/includes/class-datapocket.php';
}

if ( ! function_exists( 'datapocket' ) ) {
    /**
     * Returns the main instance of Datapocket.
     *
     * @since  1.0.0
     *
     * @return Datapocket
     */
    function datapocket() {
        return Datapocket::instance();
    }
}

Datapocket::instance();
