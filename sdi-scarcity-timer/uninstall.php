<?php
/**
 * @package sdi-scarcity
 * @version 0.1
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

/**
 * Remove plugin related contents during uninstall
 */
function sdi_delete_plugin()
{
	global $wpdb;

	$wpdb->query( sprintf( "DROP TABLE IF EXISTS %s",
		$wpdb->prefix . 'sdi_scarcity' ) );
}

sdi_delete_plugin();