<?php
/*
Plugin Name: AgentPress Permissions 
Plugin URI: http://wordpress.org/plugins/agentpress-permissions/
Description: Enable custom capabilities for AgentPress 
Author: Nick Ciske (ThoughtRefinery)
Version: 1.0.1
Author URI: http://thoughtrefinery.com/
*/

add_filter('agentpress_listings_post_type_args','agentpress_listings_permissions');

function agentpress_listings_permissions($args){
	
	$args['capability_type'] 	= array('listing', 'listings');
	//$args['map_meta_cap'] 		= true;
	$args['capabilities'] = array(
				'publish_posts' => 'publish_listings',
				'edit_posts' => 'edit_listings',
				'edit_others_posts' => 'edit_others_listings',
				'delete_posts' => 'delete_listings',
				'delete_others_posts' => 'delete_others_listings',
				'read_private_posts' => 'read_private_listings',
				'edit_post' => 'edit_listing',
				'delete_post' => 'delete_listing',
				'read_post' => 'read_listing',
			);
	
	return $args;
	
}

function agentpress_listings_caps() {

	// Don't lock admins out
    $admins = get_role( 'administrator' );

    $admins->add_cap( 'publish_listings' ); 
    $admins->add_cap( 'edit_listings' ); 
    $admins->add_cap( 'edit_others_listings' ); 
    $admins->add_cap( 'delete_listings' ); 
    $admins->add_cap( 'delete_others_listings' ); 
    $admins->add_cap( 'read_private_listings' ); 
    $admins->add_cap( 'edit_listing' ); 
    $admins->add_cap( 'delete_listing' ); 
    $admins->add_cap( 'read_listing' ); 

	// Does our custom role exist?
    $list_man = get_role( 'listings_manager' );
    
    // Nope? Let's create it
    if( !$list_man )
    	$list_man = add_role( 'listings_manager', __( 'Listings Manager' ) );

	// Add core capabilities
    $list_man->add_cap( 'read' ); // admin access
    $list_man->add_cap( 'upload_files' ); // featured images

	// Add listings capabilities
    $list_man->add_cap( 'publish_listings' ); 
    $list_man->add_cap( 'edit_listings' ); 
    $list_man->add_cap( 'edit_others_listings' ); 
    $list_man->add_cap( 'delete_listings' ); 
    $list_man->add_cap( 'delete_others_listings' ); 
    $list_man->add_cap( 'read_private_listings' ); 
    $list_man->add_cap( 'edit_listing' ); 
    $list_man->add_cap( 'delete_listing' ); 
    $list_man->add_cap( 'read_listing' ); 

}

register_activation_hook( __FILE__, 'agentpress_listings_caps' );