<?php 
/***************************************************************************

Plugin Name:  Simple Dashboard
Plugin URI:   http://www.mikeleembruggen.com
Description:  Simplify your dashboard and cut the clutter. Simple Dashboard is useful tool for local website marketers or anyone who is building Wordpress sites for their clients. Quickly simplify your clients Wordpress Admin Dashboard. Add your own branding logo and link to your website. Easily save your settings and duplicate across all your sites.
Version:      2.0
Author:       Mike Leembruggen
Author URI:   http://mikeleembruggen.com/

**************************************************************************/

//
require_once WP_PLUGIN_DIR.'/simple-dashboard/post-widget.php';
require_once WP_PLUGIN_DIR.'/simple-dashboard/page-widget.php';
require_once WP_PLUGIN_DIR.'/simple-dashboard/banner-widget.php';
require_once WP_PLUGIN_DIR.'/simple-dashboard/options-page.php';


	
	
function DashboardExtended_Init() {
	$banner_otions = DashboardExtended_Options_banner();
	
	wp_add_dashboard_widget( 'DashboardExtended_banner', __( $banner_otions['title'] ), 'DashboardExtended_banner', 'DashboardExtended_Setup_banner');
	wp_add_dashboard_widget( 'DashboardExtended_post', __( 'Posts' ), 'DashboardExtended_post', 'DashboardExtended_Setup_post');
	wp_add_dashboard_widget( 'DashboardExtended_page', __( 'Pages' ), 'DashboardExtended_page', 'DashboardExtended_Setup_page');
	
	DashboardExtended_remove_dashboard_widgets();
	
}

function DashboardExtended_remove_dashboard_widgets() {	
	remove_meta_box( 'wp_welcome_panel', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
} 



/**
 * use hook, to integrate new widget
 */
add_action('wp_dashboard_setup', 'DashboardExtended_Init');