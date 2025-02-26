<?php
/**
 * Adminbar Link Comments to Pending.
 *
 * @package     WordPress\Plugins\Adminbar Link Comments to Pending
 * @author      Juliette Reinders Folmer <wpplugins_nospam@adviesenzo.nl>
 * @link        https://github.com/jrfnl/WP-adminbar-comments-to-pending
 * @version     1.0.1
 *
 * @copyright   2013-2018 Juliette Reinders Folmer
 * @license     http://creativecommons.org/licenses/GPL/2.0/ GNU General Public License, version 2 or higher
 *
 * @wordpress-plugin
 * Plugin Name: Adminbar Link Comments to Pending
 * Plugin URI:  http://wordpress.org/plugins/adminbar-link-comments-to-pending/
 * Description: Changes the link from the Adminbar comments bubble to go straight to the 'Pending' comments queue.
 * Version:     1.0.1
 * Author:      Juliette Reinders Folmer
 * Author URI:  http://www.adviesenzo.nl/
 * Copyright:   2013-2018 Juliette Reinders Folmer
 */

// Avoid direct calls to this file.
if ( ! function_exists( 'add_action' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

if ( ! function_exists( 'adminbar_comments_link_to_pending' ) ) {
	/**
	 * Change the comments link in the admin bar to go straight to the moderation queue.
	 *
	 * @param object $wp_admin_bar The admin bar object. Gets passed by reference.
	 */
	function adminbar_comments_link_to_pending( $wp_admin_bar ) {

		$node = $wp_admin_bar->get_node( 'comments' );

		// Check if the comments node exists.
		if ( $node ) {
			$args       = $node;
			$args->href = admin_url( 'edit-comments.php?comment_status=moderated' );
			$wp_admin_bar->add_node( $args );
		}
	}
	add_action( 'admin_bar_menu', 'adminbar_comments_link_to_pending', 1000 );
}
