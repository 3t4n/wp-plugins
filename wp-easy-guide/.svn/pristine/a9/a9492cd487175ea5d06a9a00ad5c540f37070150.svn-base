<?php
/**
 * WP EasyGuide Updates
 *
 * Functions for updating data.
 *
 * @package WPEG_Admin
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Update database steps structure for 1.0.1
 *
 * @return void
 */
function wpeg_update_101_steps_structure() {
	global $wpdb;

	$sql = 'ALTER TABLE `' . esc_sql( $wpdb->prefix . WPEG::$step_table ) . '` ' .
		'ADD `action` TEXT NULL DEFAULT NULL AFTER `description`,' .
		'ADD `type` VARCHAR(255) NULL DEFAULT NULL AFTER `action`;';

	$wpdb->query( $sql );// WPCS: unprepared SQL OK.
}

/**
 * Update DB version for 1.0.1
 *
 * @return void
 */
function wpeg_update_101_db_version() {
	WPEG::update_db_version( '1.0.1' );
}
