<?php

define( 'CREDLY_LOGIN_API_URL', 'https://api.credly.com/v0.2/' );
define( 'SAVEQUERIES', true );

/**
 * Connect with the Credly API and log in with a new or existing wordpress account.
 *
 * @since  1.0.0
 * @param  string 	Email address submitted through the form.
 * @param  string 	Password submitted through the form.
 * @return array 		Error if Credly creds are incorrect.
 */

function credly_login_api( $email, $password )
{
	// Get access token
	$access_token = credly_login_access_token( array( 'email' => $email, 'password' => $password ) );

	if ( is_null( $access_token ) ) {
		return array( 'error' => 'Please make sure your email and password are correct, and try again.' );
	}

	// Get the user's Credly ID.
	$credly_user = credly_login_get_credly_id( $access_token );

	// Look for an existing Wordpress account.
	$wp_id = credly_login_query_user( $credly_user->id );

	if ( $wp_id ) {
		// Find Wordpress user from DB.
		$user = get_userdata( $wp_id );

		// Login.
		credly_login_user_login( $user );
	} else {
		$credly_username = sanitize_title( $credly_user->display_name );
		// Create a new Wordpress user account.
		$new_wp_user = wp_insert_user( array(
			'user_login'   => $credly_username,
			'user_pass'    => wp_generate_password(),
			'display_name' => $credly_user->display_name,
			'first_name'   => $credly_user->first_name,
			'last_name'    => $credly_user->last_name,
			'user_email'   => $credly_user->email
		) );

		// Check to see if the Credly email address is already associated with a Wordpress account.
		if ( is_wp_error( $new_wp_user ) ) {
			if ( $new_wp_user->errors[ 'existing_user_email' ] ) {
				// Get user object that has this Credly email address.
				$user = get_user_by( 'email', $credly_user->email );
			} elseif ( $new_wp_user->errors[ 'existing_user_login' ] ) {
				// Get user object that already has this login name.
				$user = get_user_by( 'login', $credly_username );
			} else {
				// Display any other errors.
				$response = array( 'error' => $new_wp_user->get_error_message() );
			}
		} else {
			// Get our new user object.
			$user = get_userdata( $new_wp_user );
		}

		// Update Credly Login table with new user.
		$table_update = credly_login_update_table( $user, $credly_user->id );

		// Update Wordpreee user meta table with Credly ID.
		update_user_meta( $user->ID, 'credly_id', $credly_user->id );

		if ( $table_update ) {
			credly_login_user_login( $user );
		}
	}

	return $response;
}

/**
 * Get an access token from Credly.
 *
 * @since  1.0.0
 * @param  array 		Email and password
 * @return object 	Json response from Credly API
 */
function credly_login_access_token( $data = array() )
{
	$url = CREDLY_LOGIN_API_URL . 'authenticate';

	$response = wp_remote_retrieve_body( wp_remote_post( $url, array(
		'headers' => array(
			'Authorization' => 'Basic ' . base64_encode( $data['email'] . ':' . $data['password'] )
		),
		'body' => $data
	) ) );

	$response = json_decode( $response );

	try {
		$token = $response->data->token;
	} catch ( Exception $e ) {
		$token = null;
	}

	return $token;
}

/**
 * Get Credly account.
 *
 * @since  1.0.0
 * @param  string 	Access token provided by Credly API
 * @return integer 	Credly user object
 */
function credly_login_get_credly_id( $token )
{
	$url      = CREDLY_LOGIN_API_URL . 'me?access_token=' . $token;

	$response = wp_remote_retrieve_body( wp_remote_get( $url ) );
	$response = json_decode( $response );

	return $response->data;
}

/**
 * Log in to the site.
 *
 * @since  1.0.0
 * @param  object 	Wordpress user object.
 * @return void
 */
function credly_login_user_login( $user )
{
	wp_clear_auth_cookie();
	wp_set_auth_cookie( $user->ID, true );
	do_action( 'wp_login', $user->user_login, $user );
}
