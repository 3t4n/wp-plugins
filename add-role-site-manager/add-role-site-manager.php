<?php

/*
Plugin Name: Add Role Site Manager
Plugin URI: https://www.wpgetty.com/
Description: Add a 'Site Manager' role, whose capabilities are more than 'shop_manager' or 'editor' and less than 'administrator', which is meant to be assigned to the client's manager as the top management role with less capabilities (than 'administrator') to avoid accidental destroy of website if the clients are not WP techies.
Text Domain: add-role-site-manager
Domain Path: /languages
Author: Steve Wei
Version: 1.1.0
License: GPL-2.0+
*/

if ( ! defined( 'ABSPATH' ) ) exit;

// Load plugin textdomain.
function add_role_site_manager_load_textdomain() {
	load_plugin_textdomain( 'add-role-site-manager', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
}
add_action( 'plugins_loaded', 'add_role_site_manager_load_textdomain' );


function add_role_site_manager_initiate_plugin()
{
	// gets the role object
    $clone_from = get_role('shop_manager');
	if ( !$clone_from ) $clone_from = get_role('editor');
	
    $site_manager = get_role('site_manager');
	load_plugin_textdomain( 'add-role-site-manager', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
	if ( class_exists( 'BugFu' ) ) BugFu::log( 'new role = ' . __( 'Site Manager', 'add-role-site-manager' ) );
	
	if ( !$site_manager && $clone_from ) {
		
	 	add_role(
        	'site_manager',
        	__( 'Site Manager', 'add-role-site-manager' ),
			$clone_from->capabilities
		);
		
		$site_manager = get_role('site_manager');
		
		// additional core capabilities
    	$site_manager->add_cap('create_users', true);
    	$site_manager->add_cap('delete_users', true);
    	$site_manager->add_cap('edit_users', true);
    	$site_manager->add_cap('remove_users', true);
		
	} else if ( $site_manager && $clone_from ) {
		
		$clone_from_cap = array_keys( $clone_from->capabilities );	// get shop_manager capabilities
		foreach ( $clone_from_cap as $cap ) {
			$site_manager->add_cap( $cap );		// clone shop_manager capabilities to site_manager
		}
		
		// additional core capabilities
    	$site_manager->add_cap('create_users', true);
    	$site_manager->add_cap('delete_users', true);
    	$site_manager->add_cap('edit_users', true);
    	$site_manager->add_cap('remove_users', true);
		
	}
}
// add_action( 'init', 'add_role_site_manager_initiate_plugin' );
register_activation_hook( __FILE__, 'add_role_site_manager_initiate_plugin' );


// https://nazmulahsan.me/rename-user-roles-wordpress/
/* for renmae
function add_role_site_manager_rename_role() {
    global $wp_roles;
    if ( ! isset( $wp_roles ) )
        $wp_roles = new WP_Roles();
    //You can use any of the roles "administrator" "editor", "author", "contributor" or "subscriber"...
    $wp_roles->roles['site_manager']['name'] = 'Site Manager';
}
add_action('init', 'add_role_site_manager_rename_role');
*/


function add_role_site_manager_remove_plugin() {
    if ( get_role('site_manager') ) remove_role( 'site_manager' );
	if ( class_exists( 'BugFu' ) ) BugFu::log( 'site_manager removed!' );
}
register_uninstall_hook( __FILE__, 'add_role_site_manager_remove_plugin' );
