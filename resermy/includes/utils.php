<?php


$resermy_login_id_key    = 'resermy_login_id';
$resermy_login_token_key = 'resermy_login_token';
$resermy_store_id        = 'resermy_store_id';

function resermy_get_site_id() {
	global $resermy_login_id_key, $resermy_login_token_key;
	$rlik = get_option( $resermy_login_id_key );

	if ( is_string( $rlik ) ) {
		return $rlik;
	}

	$new_site_id = uniqid();
	add_option( $resermy_login_id_key, $new_site_id );

	return get_option( $resermy_login_id_key );
}

/* Token */

function resermy_get_login_token() {
	global $resermy_login_token_key;

	return get_option( $resermy_login_token_key );
}

function resermy_set_login_token( $token ) {
	global $resermy_login_token_key;
	update_option( $resermy_login_token_key, $token, true );
}


/* Store ID */

function resermy_get_store_id() {
	global $resermy_store_id;

	return get_option( $resermy_store_id );
}

function resermy_set_store_id( $store_id ) {
	global $resermy_store_id;
	update_option( $resermy_store_id, $store_id, true );
}

function resermy_unset_store_id() {
	global $resermy_store_id;
	delete_option( $resermy_store_id );
}