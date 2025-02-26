<?php
/**
* Plugin Name: Appointments Booking for WPForms
* Plugin URI: https://add-ons.org/plugin/appointment-booking-field-for-wpforms-pro/
* Description: Schedule appointments within WPForms.
* Author: add-ons.org
* Version: 1.0.3
* Domain Path: /languages/
* Text Domain: booknow
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Author URI: https://add-ons.org/
*/
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}
define( 'BOOKNOW_WPFORMS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
if ( ! defined( 'BOOKNOW_PLUGIN_FILE' ) ) {
    define( 'BOOKNOW_PLUGIN_FILE', __FILE__ );
}
if(!defined('BOOKNOW_PLUGIN_PATH')) {
    define( 'BOOKNOW_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}
if(!defined('BOOKNOW_PLUGIN_URL')) {
    define( 'BOOKNOW_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}
if ( ! defined( 'BOOKNOW_PLUGIN_FILE' ) ) {
    define( 'BOOKNOW_PLUGIN_FILE', __FILE__ );
}
add_action( 'wpforms_loaded', 'booknow_add_module_wpforms',99999 );
function booknow_add_module_wpforms() {
    if(!class_exists('Booknow_Autoload')) {
        require_once BOOKNOW_PLUGIN_PATH .'autoload.php';
    }
    $dir = new RecursiveDirectoryIterator(BOOKNOW_PLUGIN_PATH."modules/wpforms");
    $ite = new RecursiveIteratorIterator($dir);
    $files = new RegexIterator($ite, "/\.php/", RegexIterator::MATCH);
    foreach ($files as $file) {
        if (!$file->isDir()){
            require_once $file->getPathname();
        }
    }
}
if(!class_exists('Superaddons_List_Addons')) {  
    include BOOKNOW_WPFORMS_PLUGIN_PATH."add-ons.php"; 
}