<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @since      1.0.0
 *
 * @package    Static Maps Editor
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if (
	! defined( 'WP_UNINSTALL_PLUGIN' ) ||
	empty( $_REQUEST ) ||
	! isset( $_REQUEST['plugin'] ) ||
	! isset( $_REQUEST['action'] ) ||
	'static-maps-editor/static-maps-editor.php' !== $_REQUEST['plugin'] ||
	'delete-plugin' !== $_REQUEST['action'] ||
	! check_ajax_referer( 'updates', '_ajax_nonce' ) ||
	! current_user_can( 'activate_plugins' )
) {
	exit;
}
delete_option( 'static_maps_editor_uid' );
delete_option( 'static_maps_editor_menu' );
delete_option( 'static_maps_editor_size_width' );
delete_option( 'static_maps_editor_size_height' );
delete_option( 'static_maps_editor_privacy_policy_accepted' );
delete_option( 'static_maps_editor_tos_accepted' );
delete_option( 'static_maps_editor_activated_static_maps_editor' );
delete_option( 'static_maps_editor_uid_fetch_error' );
delete_option( 'static_maps_editor_uid_fetch_error_messages' );
