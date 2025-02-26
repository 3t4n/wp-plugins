<?php
/**
 * Plugin Name: Advanced Mailto Links
 * Plugin URI: https://www.wponlinesupport.com/plugins
 * Text Domain: advanced-mailto-links
 * Domain Path: /languages/
 * Description: A simple way to enhance your mailto links with a convenient user interface.
 * Author: WP OnlineSupport
 * Version: 1.0.1
 * Author URI: https://www.wponlinesupport.com
 *
 * @package WordPress
 * @author WP OnlineSupport
 */

if( !defined('AMTOL_VERSION') ){
    define( 'AMTOL_VERSION', '1.0.1' ); // Plugin version
}
if( !defined( 'AMTOL_VERSION_DIR' ) ) {
    define( 'AMTOL_VERSION_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( !defined( 'AMTOL_URL' ) ) {
    define( 'AMTOL_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}

add_action('plugins_loaded', 'amtol_load_textdomain');
function amtol_load_textdomain() {
	load_plugin_textdomain( 'advanced-mailto-links', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
} 

// Admin Class
require_once( AMTOL_VERSION_DIR . '/includes/admin/class-amtol-admin.php' );

// Script
require_once( AMTOL_VERSION_DIR . '/includes/class-amtol-script.php' );

// Admin Class
require_once( AMTOL_VERSION_DIR . '/includes/amtol-shortcode.php' );
