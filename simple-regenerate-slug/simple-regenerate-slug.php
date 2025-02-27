<?php
/**
 * Plugin Name:       Simple Regenerate Slug
 * Description:       Regenerate Slugs From Title of Posts, Page Title, Custom Post Title
 * Plugin URI:   
 * Version:           1.3.0
 * Author:            Patel Sunny
 * Author URI:        https://vividwebsolutions.in/
 * Requires at least: 4.9.0
 * Tested up to:      6.3
 * License:           GPLv2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package SimpleRegenerateSlug
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main SimpleRegenerateSlug Class
 *
 * @class SimpleRegenerateSlug
 * @version	1.3.0
 * @since 1.3.0
 * @package	SimpleRegenerateSlug
 */
final class SimpleRegenerateSlug {

	/**
	 * Set up the plugin
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'simpleregenerateslug_setup' ), -1 );
	}

	/**
	 * Setup all the things
	 */
	public function simpleregenerateslug_setup() {
		add_filter( 'wp_insert_post_data', array( $this, 'simpleregenerateslug_update_slug'), 99, 2 );
	}

	/**
	 * Update post_name when post update.
	 */
	public function simpleregenerateslug_update_slug( $data, $postarr ) {
	    if ( ! in_array( $data['post_status'], array( 'draft', 'pending', 'auto-draft' ) ) ) {
	        $data['post_name'] = sanitize_title( $data['post_title'] );
	    }

	    return $data;
	}
	
} // End Class

/**
 * The 'main' function
 *
 * @return void
 */
function simpleregenerateslug_main() {
	new SimpleRegenerateSlug();
}

/**
 * Initialise the plugin
 */
add_action( 'plugins_loaded', 'simpleregenerateslug_main' );
