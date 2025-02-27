<?php
/**
 * Plugin Name:       Total User Count Shortcode
 * Description:       Display the total amount of users in your WP with a shortcode. [total_user_count role="subscriber, author"]
 * Version:           1.1.2
 * Author:            Morgan Hvidt
 * Author URI:        https://morganhvidt.com
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Create the user count shortcode.
 */
function tusc_user_count( $atts = array() ) {

	// Attributes from shortcode.
	$atts = shortcode_atts(
		array(
			'role' => false, // Now can be a comma-separated list of roles.
		),
		$atts,
		'total_user_count'
	);

	$usercount = count_users();

	// Safety check.
	if ( empty( $usercount ) || ! is_array( $usercount ) ) {
		return false;
	}

	$total_count = 0;

	if ( ! empty( $atts['role'] ) ) {
		// Split the roles into an array.
		$roles = explode( ',', $atts['role'] );

		foreach ( $roles as $role ) {
			$role = trim( $role ); // Trim spaces from role names.
			// Sum the counts for each role.
			$total_count += isset( $usercount['avail_roles'][ $role ] ) ? $usercount['avail_roles'][ $role ] : 0;
		}

		return $total_count;
	}

	// If no role attribute is provided, return the total user count.
	$count = ! empty( $usercount['total_users'] ) ? $usercount['total_users'] : 'N/A';

	return $count;
}
// Creating a shortcode to display user count.
add_shortcode( 'total_user_count', 'tusc_user_count' );
add_shortcode( 'total-user-count', 'tusc_user_count' );
