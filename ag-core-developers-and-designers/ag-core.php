<?php
/**
 * @package AG Design Studio
 * @version 1.0.0
 */
/*
Plugin Name: AG Design Studio Core
Plugin URI: http://www.agdesignstudio.co.uk
Description: our plugin for clients websites
Author: Aaron Bowie
Version: 1.0.0

*/

/*	
Warns the user when entering in a sensible area of the Dashboard.
 */

function my_admin_notice(){
	global $current_screen;
	if ( $current_screen->parent_base == 'options-general' ) {
		echo '<div id="notice" class="updated" style="font-size: 16px;"><p><b>Warning</b> - Changing settings in this section can affect the behavior of the CMS and consequently the whole website.</div>';
	}
	if ( $current_screen->parent_base == 'themes' || $current_screen->parent_base == 'plugins' ) {
		echo '<div id="notice" class="error" style="font-size: 16px;"><p><b>Warning</b> - Changing settings in this section can affect the behavior of the CMS and consequently the whole website.<br /></p></div>';
	}
} // END my_admin_notice();
if (is_admin()) {
	add_action( 'admin_notices', 'my_admin_notice' );
}
 
 add_action('wp_dashboard_setup', 'remove_dashboard_widgets');
function remove_dashboard_widgets() {
     global $wp_meta_boxes;
     // remove unnecessary widgets

     // var_dump( $wp_meta_boxes['dashboard'] ); // use to get all the widget IDs

     unset(
          $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'],
          $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'],
          $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']
     );
     

 
}

function my_fix_admin_notice(){
    echo '<div class="updated">
       <p><strong>Welcome to your WordPress Dashboard</strong>,if you have any problems let us know. <</p>
	   
	   	   
    </div>';
}
add_action('admin_notices', 'my_fix_admin_notice');






/* disable moving wordpress logo and bits */
function wps_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
	$wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    $wp_admin_bar->remove_menu('view-site');
	$wp_admin_bar->remove_menu('themes');
	$wp_admin_bar->remove_menu('customize');
	$wp_admin_bar->remove_menu('widgets');
	$wp_admin_bar->remove_menu('menus');
	$wp_admin_bar->remove_menu('background');
	$wp_admin_bar->remove_menu('header');
	$wp_admin_bar->remove_menu('dashboard');
	$wp_admin_bar->remove_menu('profile');
}
add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );


/* change login notification */
function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', 'Logged in as', $my_account->title );            
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );

/* remove help */
function hide_help() {
    echo '<style type="text/css">
            #contextual-help-link-wrap { display: none !important; }
          </style>';
}
add_action('admin_head', 'hide_help');



/* remove updates from nav bar */
  
function disable_bar_updates() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('updates');  
}  
add_action( 'wp_before_admin_bar_render', 'disable_bar_updates' );  

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}



