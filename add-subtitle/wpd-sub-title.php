<?php
/*
Plugin Name: Add Subtitle
Plugin URI: https://viitorcloud.com/blog/
Description: Add subtitle plugin is useful to add subtitle to pages/posts which automatically displays in front.
Version: 1.1.0
Author:Viitorcloud, Mitali
Author URI: https://viitorcloud.com/ 
*/    

/**
 * Basic plugin definitions 
 * 
 * @package Subtitle
 * @since 1.1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

global $wpdb;

if( !defined( 'WPD_SUB_TITLE_DIR' ) ) {
	define( 'WPD_SUB_TITLE_DIR', dirname( __FILE__ ) ); // plugin dir
}
if( !defined( 'WPD_SUB_TITLE_URL' ) ) {
	define( 'WPD_SUB_TITLE_URL', plugin_dir_url( __FILE__ ) ); // plugin url
}
if( !defined( 'WPD_SUB_TITLE_DOMAIN' )) {
	define( 'WPD_SUB_TITLE_DOMAIN', 'wpdsubtitle' ); // text domain for languages
}
if( !defined( 'WPD_SUB_TITLE_PLUGIN_URL' ) ) {
	define( 'WPD_SUB_TITLE_PLUGIN_URL', plugin_dir_url( __FILE__ ) ); // plugin url
}
if( !defined( 'WPD_SUB_TITLE_ADMIN_DIR' ) ) {
	define( 'WPD_SUB_TITLE_ADMIN_DIR', WPD_SUB_TITLE_DIR . '/includes/admin' ); // plugin admin dir
}
if( !defined( 'WPD_SUB_TITLE_BASENAME') ) {
	define( 'WPD_SUB_TITLE_BASENAME', 'wpd-sub-title' );
}
//subtitle prefix
if( !defined( 'WPD_SUB_TITLE_META_PREFIX' )) {
	define( 'WPD_SUB_TITLE_META_PREFIX', '_wpd_sub_title_' );
}

/**
 * Load Text Domain
 * 
 * This gets the plugin ready for translation.
 * 
 * @package Subtitle
 * @since 1.1.0
 */
load_plugin_textdomain( 'wpdsubtitle', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/**
 * Activation hook
 * 
 * Register plugin activation hook.
 * 
 * @package Subtitle
 * @since 1.1.0
 */
register_activation_hook( __FILE__, 'wpd_sub_title_install' );

/**
 * Deactivation hook
 *
 * Register plugin deactivation hook.
 * 
 * @package Subtitle
 * @since 1.1.0
 */
register_deactivation_hook( __FILE__, 'wpd_sub_title_uninstall' );

/**
 * Plugin Setup Activation hook call back 
 *
 * Initial setup of the plugin setting default options 
 * and database tables creations.
 * 
 * @package Subtitle
 * @since 1.1.0
 */
function wpd_sub_title_install() {
	
	global $wpdb;
		
}

/**
 * Plugin Setup (On Deactivation)
 *
 * Does the drop tables in the database and
 * delete  plugin options.
 *
 * @package Subtitle
 * @since 1.1.0
 */
function wpd_sub_title_uninstall() {
	
	global $wpdb;
			
}

/**
 * Initialize all global variables
 * 
 * @package Subtitle
 * @since 1.1.0
 */
global $wpd_sub_title_model, $wpd_sub_title_admin;

/**
 * Includes
 *
 * Includes all the needed files for our plugin
 *
 * @package Subtitle
 * @since 1.1.0
 */ 

//includes model class file

require_once( WPD_SUB_TITLE_DIR . '/includes/class-wpd-sub-title-scripts.php');
$wpd_sub_title_scripts = new wpd_sub_title_Scripts(); 
$wpd_sub_title_scripts->add_hooks();

require_once ( WPD_SUB_TITLE_DIR . '/includes/class-wpd-sub-title-model.php');
$wpd_sub_title_model = new Wpd_sub_title_Model();

require_once ( WPD_SUB_TITLE_ADMIN_DIR . '/class-wpd-sub-title-admin.php');
$wpd_sub_title_admin = new Wpd_sub_title_Admin_Pages(); 
$wpd_sub_title_admin->add_hooks();

require_once ( WPD_SUB_TITLE_DIR . '/includes/class-wpd-sub-title-main.php');
$wpd_sub_title_main = new wpd_sub_title_main();
$wpd_sub_title_main->add_hooks();
