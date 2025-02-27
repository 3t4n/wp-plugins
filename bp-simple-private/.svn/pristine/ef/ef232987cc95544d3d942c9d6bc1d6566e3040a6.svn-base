<?php

/*
Plugin Name: BP Simple Private
Description: Select whether posts, pages and BuddyPress or BuddyBoss sections can be viewed by non-logged-in users. See Settings > BP Simple Private
Version: 2.3
Author: PhiloPress
Author URI: https://philopress.com/
Text Domain: bp-simple-private
Domain Path: /languages
License: GPLv2 or later
*/

if ( !defined( 'ABSPATH' ) ) exit;


function pp_private_bp_check() {
	if ( !class_exists('BuddyPress') ) {
		add_action( 'admin_notices', 'pp_private_install_buddypress_notice' );
	}
}
add_action('plugins_loaded', 'pp_private_bp_check', 999);

function pp_private_install_buddypress_notice() {
	echo '<div id="message" class="error fade"><p style="line-height: 150%">';
	_e('BuddyPress Simple Private requires the BuddyPress plugin. Please install BuddyPress first, or deactivate BuddyPress Simple Private.', 'bp-simple-private');
	echo '</p></div>';
}


function pp_private_load_admin() {

	if ( is_admin() ) {

		load_plugin_textdomain( 'bp-simple-private', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

		require( dirname( __FILE__ ) . '/inc/pp-private-admin-meta-box.php' );
		require( dirname( __FILE__ ) . '/inc/pp-private-admin-settings.php' );

	} else {

		if( function_exists('bp_classic_includes') ) {
			require( dirname( __FILE__ ) . '/inc/pp-private-front-bp-classic.php' );
		} else {
			require( dirname( __FILE__ ) . '/inc/pp-private-front.php' );
		}
	}
}
add_action( 'bp_include', 'pp_private_load_admin' );


function pp_private_add_settings_link( $links ) {
	$link = array( '<a href="' . admin_url( 'options-general.php?page=bp-simple-private' ) . '">Settings</a>', );
	return array_merge( $links, $link );
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'pp_private_add_settings_link' );


function pp_private_activation() {

	if( !function_exists('is_plugin_active') ) {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}

	if ( is_plugin_active( 'bp-simple-private-pro/bp-simple-private-pro.php' ) ) {
		deactivate_plugins( '/bp-simple-private-pro/bp-simple-private-pro.php' );
	}

}
register_activation_hook(__FILE__, 'pp_private_activation');
