<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// global $wpdb;

delete_option( 'mbv_wpcf7_email_validator_for_contact_form_7' );

$GLOBALS['wpdb']->query('DROP TABLE IF EXISTS ' . $GLOBALS['wpdb']->prefix . 'email_validator_for_contact_form_7_log');

wp_cache_flush();