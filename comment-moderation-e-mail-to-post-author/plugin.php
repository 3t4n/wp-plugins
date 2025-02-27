<?php
/**
 * Plugin Name: Comment Moderation/Notification Recipients
 * Plugin URI: http://status301.net/wordpress-plugins/comment-moderation-e-mail-to-post-author/
 * Description: Control who will receive new comment and moderation notifications. Light weight, simple, safe and effective. <strong>Happy with it? <em><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=ravanhagen%40gmail%2ecom&item_name=Comment%20Moderation%20Notification%20Recipients&item_number=0%2e7&no_shipping=0&tax=0&bn=PP%2dDonationsBF&charset=UTF%2d8&lc=us">Buy me a coffee...</a></em> Thanks! :)</strong>
 * Version: 0.7-beta6
 * Author: RavanH
 * Author URI: http://status301.net/
 * License: GNU General Public License v3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package Comment Moderation/Notification Recipients
 */

defined( 'WPINC' ) || die;

/* Define constants */
defined( 'COMMENT_NOTIFICATION_RECIPIENTS' ) || define( 'COMMENT_NOTIFICATION_RECIPIENTS', 'post_author_only' ); // For now: default to old plugin behavior (post author only).
defined( 'COMMENT_MODERATION_RECIPIENTS' ) || define( 'COMMENT_MODERATION_RECIPIENTS', 'wp_default' ); // Default to WP behavior (post author only).

/* Add filters */
add_filter( 'comment_moderation_recipients', array( 'CommentNotifications\\Filters', 'moderation_recipients' ), 999, 2 );
add_filter( 'comment_notification_recipients', array( 'CommentNotifications\\Filters', 'notification_recipients' ), 999, 2 );

/* Register autoloader */
spl_autoload_register(
	function ( $_class ) {
		$namespace = 'CommentNotifications\\';

		// Bail if the class is not in our namespace.
		if ( 0 !== strpos( $_class, $namespace ) ) {
			return;
		}

		// Build the filename.
		$file = realpath( __DIR__ ) . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'class-' . strtolower( str_replace( array( $namespace, '_' ), array( '', '-' ), $_class ) ) . '.php';

		// If the file exists for the class name, load it.
		if ( file_exists( $file ) ) {
			include $file;
		}
	}
);
