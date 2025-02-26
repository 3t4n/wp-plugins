<?php

/**
 * Fired when the plugin is uninstalled.
 *
 *
 * @link       http://www.wpgetty.com
 * @since      1.0.0
 *
 * @package    Add_Role_Site_Manager
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

global $wpdb;

if ( get_role('site_manager') ) {

// https://stackoverflow.com/questions/9029446/how-to-list-all-users-of-a-specific-role-on-a-page

	//Load WP API as its an external page 
//	require 'blog/wp-load.php';

	// Now have access to get_users
	// $users = get_users( 'role=site_manager' );
	$args['role'] = array( 'site_manager' );
	if ( class_exists( 'BugFu' ) ) BugFu::log( '$args = ' . json_encode( $args, JSON_UNESCAPED_UNICODE ) );
	$users = get_users( $args );
	if ( class_exists( 'BugFu' ) ) BugFu::log( '$users objects = ' . json_encode( $users, JSON_UNESCAPED_UNICODE ) );
	
	/*
	// https://wordpress.org/support/topic/display-info-of-user-with-certain-role-or-level-ini-wp-27/
	$role = "site_manager";
	$this_role = "'[[:<:]]" . $role . "[[:>:]]'";
	$query = "SELECT * FROM $wpdb->users WHERE ID = ANY (SELECT user_id FROM $wpdb->usermeta WHERE meta_key = 'wp_capabilities' AND meta_value RLIKE $this_role) ORDER BY user_nicename ASC LIMIT 10000";
	$users = $wpdb->get_results($query);
	if ( class_exists( 'BugFu' ) ) BugFu::log( '$users objects = ' . json_encode( $users, JSON_UNESCAPED_UNICODE ) );
	*/
	
    // Array of WP_User objects.
	// https://wordpress.stackexchange.com/questions/4725/how-to-change-a-users-role
	foreach ( $users as $user ) {
//		echo esc_html( $user->nickname  )
		$user->remove_role( 'site_manager' );
		$user->add_role( 'administrator' );
		if ( class_exists( 'BugFu' ) ) BugFu::log( 'user ID = ' . $user->ID );
	}

	remove_role( 'site_manager' );
	if ( class_exists( 'BugFu' ) ) BugFu::log( 'site_manager removed!' );

}
