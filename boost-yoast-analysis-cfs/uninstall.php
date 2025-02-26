<?php
/**
 * Fired when plugin will be uninstall
 * Text Domain:   boost-yoast-analysis-cfs
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option('bycfs_activated_on');
delete_option('bycfs_deactivated_on');