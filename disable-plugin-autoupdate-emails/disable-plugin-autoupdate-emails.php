<?php

/*
 * Plugin Name: Disable Plugin Autoupdate Emails
 * Description: Getting too many "plugin updated" or "theme updated" emails since WordPress 5.5? This turns them off.
 * Version: 1.1.3
 * Author: Shaun Simmons
 * Author URI: https://github.com/simshaun
 * License: GPL2
 */

function faf_disable_auto_update_email() {
	return false;
}

function faf_maybe_allow_auto_update_email( $true, $update_results = null ) {
	if ( is_array( $update_results ) ) {
		foreach ( $update_results as $update_result ) {
			if ( true !== $update_result->result ) {
				return $true;
			}
		}
	}

	return false;
}

// WordPress 5.5.0 — Blanket disable regardless of success/failure.
add_filter( 'auto_plugin_update_send_email', 'faf_disable_auto_update_email', 10, 1 );
add_filter( 'auto_theme_update_send_email', 'faf_disable_auto_update_email', 10, 1 );

// WordPress 5.5.1 — Disable if there were no failures.
// @see https://core.trac.wordpress.org/changeset/48889
add_filter( 'auto_plugin_update_send_email', 'faf_maybe_allow_auto_update_email', 10, 2 );
add_filter( 'auto_theme_update_send_email', 'faf_maybe_allow_auto_update_email', 10, 2 );
