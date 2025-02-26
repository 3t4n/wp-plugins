<?php
/*
Plugin Name:  Free WhatsApp Share Button
Plugin URI:   http://dhirajsharma.com/wp/plugins/free-whatsapp-share-button/
Description:  Adds a share button for WhatsApp into posts, custom post types or pages. Also includes a shortcode.
Version:      1.0.4
Author: Dhiraj Sharma
Author URI: http://dhirajsharma.com/


*/
if ( is_admin() && ( !defined( 'DOING_AJAX' ) || !DOING_AJAX ) )
	require 'class-admin.php';
else
	require 'class-frontend.php';

// Add settings link on plugin page
function dh_free_whatsapp_share_button_link( $links ) {
	$settings_link = '<a href="options-general.php?page=dh_free_whatsapp_share_button">Settings</a>';
	array_unshift( $links, $settings_link );
	return $links;
}

$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'dh_free_whatsapp_share_button_link' );
?>
