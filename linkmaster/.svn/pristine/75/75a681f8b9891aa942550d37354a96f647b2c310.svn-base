<?php
// Exit if uninstall.php is not called by WordPress
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}
// Verify if the current user has permission to activate plugins
if ( ! current_user_can( 'activate_plugins' ) ) {
    return;
}
// Clean up custom post meta created by the plugin
delete_post_meta_by_key( '_lmcp_custom_permalink' );
// Delete custom options used by the plugin
delete_option( 'lmcp_rewrite_rules' );
// Clear cached data
wp_cache_flush();
?>