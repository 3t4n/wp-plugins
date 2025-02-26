<?php

/**
 * Setup Credly Login table for storing user IDs.
 *
 * @since 1.0.0
 */
function credly_login_table_create()
{
	global $wpdb;

	// Create new table if it doesn't exist.
	if ( !isset( $wpdb->credly_login_ids ) ) {
		$table = $wpdb->prefix . CREDLY_LOGIN_TABLE;

		$sql = "CREATE TABLE $table (
			id int(10) NOT NULL AUTO_INCREMENT,
			wp_id bigint(20) NOT NULL,
			credly_id int(10) NOT NULL,
			PRIMARY KEY (id),
			UNIQUE KEY credly_id_unique (credly_id)
		);";
	}

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}

/**
 * Delete Credly Login table.
 *
 * @since 1.0.0
 */
function credly_login_table_delete()
{
	global $wpdb;

	$table = $wpdb->prefix . CREDLY_LOGIN_TABLE;
	$wpdb->query("DROP TABLE IF EXISTS $table");
}

/**
 * Update Credly Login table with new user creds.
 *
 * @since  1.0.0
 * @param  object 	New user object created from Credly creds
 * @param  integer 	Credly ID
 * @return boolean 	Table has been updated or not
 */
function credly_login_update_table( $user, $credly_id )
{
	global $wpdb;

	$table    = $wpdb->prefix . CREDLY_LOGIN_TABLE;
	$response = $wpdb->insert(
		$table,
		array(
			'wp_id'     => $user->ID,
			'credly_id' => $credly_id
		), 
		array(
			'%d', // integer
			'%d'  // integer
		)
	);

	return $response;
}

/**
 * Check if credly account exists in DB, and retrieve wordpress ID.
 *
 * @since  1.0.0
 * @param  integer	Credly user ID
 * @return integer 	Wordpress user ID
 */
function credly_login_query_user( $credly_id )
{
	global $wpdb;

	$table    = $wpdb->prefix . CREDLY_LOGIN_TABLE;

	$query    = "SELECT * FROM $table WHERE credly_id = $credly_id";
	$queryObj = $wpdb->get_row( $query );

	if ( !is_null( $queryObj ) ) {
		return $queryObj->wp_id;
	}

	return false;
}
