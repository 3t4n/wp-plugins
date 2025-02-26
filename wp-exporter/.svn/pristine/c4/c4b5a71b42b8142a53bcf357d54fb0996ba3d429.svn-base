<?php
/**
	Custom Post Exporter Utility Class

	@since 0.0.5

	Copyright 2017 zourbuth.com (email: zourbuth@gmail.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

	@package Custom Post Exporter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class WP_Export_Utility
 *
 * @since 0.0.1
 */
class CP_Export_Utility {

	/**
	 * Class constructor
	 *
	 * @since 0.0.5
	 */
	public function __construct() {
		add_action( 'the_post', array( &$this, 'the_post' ), 1, 2 );
	}

	/**
	 * Export action using custom quøery
	 * Modify post object while 'get_post' inside 'setup_postdata'
	 * Put define('CP_EXPORTER_POST_STATUS', 'draft'); in wp-config.php or theme functions.php
	 *
	 * @param array  $post The array of retrieved post.
	 * @param object $wp_query The current Query object (passed by reference).
	 * @since 0.0.5
	 */
	public function the_post( $post, $wp_query ) {
		if ( isset( $wp_query->wp_exporter ) && $wp_query->wp_exporter &&
			defined( 'CP_EXPORTER_POST_STATUS' ) && isset( $GLOBALS['post'] ) ) {
				$GLOBALS['post']->post_status = esc_attr( CP_EXPORTER_POST_STATUS );
				return $GLOBALS['post'];
		}
	}
}

new CP_Export_Utility();
