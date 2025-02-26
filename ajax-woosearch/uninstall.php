<?php

/**
 * Trigger this file on Plugin uninstall
 *
 * @package  WooSearch
 */

/** Exit if uninstall.php is not called by WordPress. */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}
function woos_remove_data() {
	delete_option('woos_version');
	delete_option('woos_wp_design');
	delete_option('woos_setting_data');
}
woos_remove_data();