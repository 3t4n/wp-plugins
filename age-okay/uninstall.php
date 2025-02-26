<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * @link       https://codealtdel.com/
 * @since      1.0.0
 *
 * @package    Age_Okay
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Remove age_okay_settings so when plugin is reinstalled it will be disabled by default
delete_option( 'age_okay_settings' );
delete_option( 'age_okay_key' );
