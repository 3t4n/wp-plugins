<?php

/**
 * The plugin bootstrap file
 *
 * @link              ar-ty.com
 * @since             1.0.0
 * @package           Arplay
 *
 * @wordpress-plugin
 * Plugin Name:       AR Play
 * Plugin URI:        arplay.app/widgets
 * Description:       Show your 3D Models in augmented reality (AR), anywhere, anytime...
 * Version:           1.0.0
 * Author:            Arty
 * Author URI:        ar-ty.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */


define("ARPLAY_APP_URL","https://arplay.app");
define("ARPLAY_API_URL","https://arplay.app/api");
define("ARPLAY_WOO", array(
    'position' => 'woocommerce_single_product_summary',
    'code_size' => '150',
    'button_text' => 'View in AR',
    'qr_text' => 'Scan QR code to see in AR')
);

defined( 'ABSPATH' ) or die();

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_arplay_plugin() {
    IncArplay\Base\Activator::activate();
}
register_activation_hook( __FILE__, 'activate_arplay_plugin' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_arplay_plugin() {
    IncArplay\Base\Deactivator::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_arplay_plugin' );

/**
 * The code that runs during plugin installation
 * Adds basic options
 */
function addAppUrl(){
    add_option( 'arplay_app_url', ARPLAY_APP_URL, '', 'yes' );
}
addAppUrl();

function addApiUrl(){
    add_option( 'arplay_api_url', ARPLAY_API_URL, '', 'yes' );
}
addApiUrl();
function addWoocommercePosition(){
    add_option( 'arplay_woocommerce', ARPLAY_WOO, '', 'yes' );
}
addWoocommercePosition();

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'IncArplay\\Init' ) ) {
    IncArplay\Init::registerServices();
};
