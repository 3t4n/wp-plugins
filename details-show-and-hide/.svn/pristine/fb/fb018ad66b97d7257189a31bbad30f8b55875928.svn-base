<?php
/**
 * Plugin Name:       Details: Show and Hide
 * Description:       Details block for showing and hiding content.
 * Requires at least: 5.9
 * Tested up to:      6.2
 * Requires PHP:      5.6
 * Version:           1.0.4
 * Author:            Bob Matyas
 * Author URI:		  https://www.bobmatyas.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wp-details
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function bm_wp_details_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'bm_wp_details_init' );

/**
 * Adds deprecation notice
 */
function deprecated_plugin_notice() {
	?>    
	<div class="notice notice-warning is-dismissible">
		<p><?php _e( '<b>Notice:</b> A built-in Details block was added to WordPress in v6.3. The "Details: Show and Hide" plugin is no longer needed. Please remove the plugin.', 'wp-details' ); ?></p>
	</div>
	<?php
}

/**
 * Checks WordPress version and conditionally displays deprecation notice.
 */
function check_wp_version() {
	global $wp_version;

	if ( version_compare( $wp_version, '6.3', '>=' ) ) {
		add_action( 'admin_notices', 'deprecated_plugin_notice' );
	} else {
		return;
	}
}

add_action( 'plugins_loaded', 'check_wp_version' );


