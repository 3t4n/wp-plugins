<?php
/**
 * "Comment Moderation E-mail only to Author" old main file upgrade
 *
 * This is the old plugin main file.
 * Keep this for backward upgrade compatibility.
 *
 * @package Comment Moderation/Notification Recipients
 */

defined( 'WPINC' ) || die;

$old = 'comment-moderation-to-author.php'; // Change this (just the file name, no path).
$new = 'plugin.php'; // Change this.

// Change the active plugin settings to make WP start using the new one.
$active_plugins = (array) get_option( 'active_plugins', array() );

$old_plugin_array = array( basename( __DIR__ ) . '/' . $old );
$active_plugins   = array_diff( $active_plugins, $old_plugin_array );

$new_plugin = basename( __DIR__ ) . '/' . $new;
if ( ! in_array( $new_plugin, $active_plugins, true ) ) {
	$active_plugins[] = $new_plugin;

	include_once __DIR__ . '/' . $new;
}

// Update active plugins and never come back here.
update_option( 'active_plugins', $active_plugins );
