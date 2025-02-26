<?php
/**
 * Runs on Activation and Deactivation
 *
 * @package   Global Blocks for Cornerstone
 * @author    Michael Bourne
 * @license   GPL3
 * @link      https://xthemetips.com
 * @since     1.1.0
 */

// set a flag for hard flushing rewrite rules
function global_block_install()
{
  set_transient( 'global_blocks_flush_rewrite_rules', 'true', 0 );
  flush_rewrite_rules( true );
}
register_activation_hook( __FILE__, 'global_blocks_install' );

// flush permalinks
function global_blocks_flush_rewrite_rules_maybe() {
	if ( 'true' === ( $flush_it = get_transient( 'global_blocks_flush_rewrite_rules' ) ) ) {
		flush_rewrite_rules( true );
		// So we only run this once.
		delete_transient( 'global_blocks_flush_rewrite_rules' );
	}
}
add_action( 'admin_init', 'global_blocks_flush_rewrite_rules_maybe' );

/**
 * Deactivate plugin. Flush permalinks.
 */

function global_blocks_deactivation()
{
  // clear the permalinks to remove our post type's rules
  flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'global_blocks_deactivation' );

/**
 * Soft flush permalinks when CPT is saved
 * @since 1.0.1
 */
function global_blocks_flush_rewrite_rules() {
  flush_rewrite_rules( false );
}
add_action( 'save_post_global-blocks', 'global_blocks_flush_rewrite_rules', 10, 3 );