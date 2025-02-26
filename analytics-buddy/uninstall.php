<?php
/**
 * This file is called when plugin is deleted.
 *
 * @package ANBU
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

delete_option( 'anbu-settings' );
delete_option( 'anbu_review_message_trigger' );
?>
