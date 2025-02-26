<?php


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


/*
Plugin Name: OXSN Breadcrumbs
Plugin URI: https://wordpress.org/plugins/oxsn-breadcrumbs/
Description: This plugin adds breadcrumbs!
Author: oxsn
Author URI: https://oxsn.com/
Version: 0.0.3
*/


define( 'oxsn_breadcrumbs_plugin_basename', plugin_basename( __FILE__ ) );
define( 'oxsn_breadcrumbs_plugin_dir_path', plugin_dir_path( __FILE__ ) );
define( 'oxsn_breadcrumbs_plugin_dir_url', plugin_dir_url( __FILE__ ) );

if ( ! function_exists ( 'oxsn_breadcrumbs_settings_link' ) ) {

	add_filter( 'plugin_action_links', 'oxsn_breadcrumbs_settings_link', 10, 2 );
	function oxsn_breadcrumbs_settings_link( $links, $file ) {

		if ( $file != oxsn_breadcrumbs_plugin_basename )
		return $links;
		$settings_page = '<a href="' . menu_page_url( 'oxsn-breadcrumbs', false ) . '">' . esc_html( __( 'Settings', 'oxsn-breadcrumbs' ) ) . '</a>';
		array_unshift( $links, $settings_page );
		return $links;

	}

}

require_once( oxsn_breadcrumbs_plugin_dir_path . 'main-tab/etc.php' );
require_once( oxsn_breadcrumbs_plugin_dir_path . 'plugin-tab/etc.php' );
require_once( oxsn_breadcrumbs_plugin_dir_path . 'inc/etc.php' );
require_once( oxsn_breadcrumbs_plugin_dir_path . 'quicktags/etc.php' );
require_once( oxsn_breadcrumbs_plugin_dir_path . 'shortcodes/etc.php' );


?>