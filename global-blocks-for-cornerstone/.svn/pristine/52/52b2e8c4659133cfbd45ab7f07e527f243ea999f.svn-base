<?php
/**
 * Runs on Uninstall of Global Blocks
 *
 * @package   Global Blocks for Cornerstone
 * @author    Michael Bourne
 * @license   GPL3
 * @link      https://xthemetips.com
 * @since     1.1.0
 */

// Check that we should be doing this
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit; // Exit if accessed directly
}

// Delete Transients
if ( 'true' === ( $flush_it = get_transient( 'global_blocks_flush_rewrite_rules' ) ) ) {
		delete_transient( 'global_blocks_flush_rewrite_rules' );
}

// Delete Custom Post Type posts

global $wpdb;

$wpdb->query( $wpdb->prepare( 
	"
		DELETE meta FROM $wpdb->postmeta meta 
		LEFT JOIN $wpdb->posts posts 
		ON posts.ID = meta.post_id 
		WHERE posts.post_type = 'global-blocks';
	"
	)
);

$wpdb->query( $wpdb->prepare( 
	"
		DELETE FROM $wpdb->posts 
		WHERE post_type = 'global-blocks';
	"
    )
);

$plugin_options = $wpdb->get_results( "SELECT option_name FROM $wpdb->options WHERE option_name LIKE 'global_blocks_plugin_%'" );

foreach( $plugin_options as $option ) {
    delete_option( $option->option_name );
}