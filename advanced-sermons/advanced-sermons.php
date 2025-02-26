<?php

/*
Plugin Name: Advanced Sermons
Plugin URI: https://advancedsermons.com/
Description: Elevate your church's digital outreach with audio/video sermons, organized speakers, and series management.
Author: WP Codeus
Version: 3.6
Author URI: https://wpcodeus.com/
License: GPL2
Text Domain: advanced-sermons
Domain Path: /languages
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

define('ASPPATH',   plugin_dir_path(__FILE__));
define('ASPURL',    plugins_url('', __FILE__));


// Flush permalinks when the plugin is activated
function asp_flush_rewrites() {
	// Explicitly call the function to register the sermon post type and taxonomies
	asp_register_cpts_sermons();
	asp_register_taxes_series();
	asp_register_taxes_sermon_speaker();
	asp_register_taxes_topics();
	asp_register_taxes_book();
	// Now flush rewrite rules
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'asp_flush_rewrites' );


// The helpers functions for repeated functionalities
require( plugin_dir_path( __FILE__ ) . '/include/helpers.php');


// The core plugin file that is used to define internationalization, hooks and functions
require( plugin_dir_path( __FILE__ ) . '/include/plugin-functions.php');


// The file that manages admin views and functionality
require( plugin_dir_path( __FILE__ ) . '/admin/admin-functions.php');


// The file that manages stylesheets
require( plugin_dir_path( __FILE__ ) . '/styling/styling-functions.php');



// Get and broadcast the current version of Advanced Sermons
$asp_plugin_data = get_file_data(__FILE__, array('Version' => 'Version'), false);
$asp_plugin_version = $asp_plugin_data['Version'];
global $asp_plugin_version;


// Display additional action links for Advanced Sermons
function asp_plugin_add_settings_link( $links ) {
    $links = array_merge( array(
    	'<a href="' . esc_url( admin_url( 'edit.php?post_type=sermons&page=asp-settings' ) ) . '">' . __( 'Settings', 'advanced-sermons' ) . '</a>',
      '<a href="https://advancedsermons.com/docs/" target="_blank" >' . __( 'Documentation', 'advanced-sermons' ) . '</a>'
    ), $links );
    return $links;
}
add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'asp_plugin_add_settings_link' );


// Display additional ASP row meta links
add_filter( 'plugin_row_meta', 'asp_plugin_add_meta_link', 10, 2 );
function asp_plugin_add_meta_link( $links, $file ) {
    if ( strpos( $file, 'advanced-sermons.php' ) !== false ) {
        if ( !is_plugin_active('advanced-sermons-pro/advanced-sermons-pro.php') ) {
        		$asp_meta_links = array(
        				'upgrade' => '<a style="color:#cd9f58;" href="https://advancedsermons.com/pricing/" target="_blank">Get Advanced Sermons Pro</a>',
        		);
        		$links = array_merge( $links, $asp_meta_links );
        }
    }
    return $links;
}
