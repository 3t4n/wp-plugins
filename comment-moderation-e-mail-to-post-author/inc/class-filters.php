<?php
/**
 * Plugin main filters
 *
 * @package Comment Moderation/Notification Recipients
 */

namespace CommentNotifications;

/**
 * Filter class
 *
 * @since 0.7
 */
class Filters {

	/**
	 * Filters moderation recipients
	 *
	 * @since 0.7
	 *
	 * @param array $emails     List of email addresses to notify for comment moderation.
	 * @param int   $comment_id Comment ID.
	 *
	 * @return array
	 */
	public static function moderation_recipients( $emails, $comment_id ) {

		switch ( COMMENT_MODERATION_RECIPIENTS ) {
			case 'wp_default':
				// Do nothing.
				break;

			case 'site_admin_only':
				$emails = self::notify_site_admin_only( $emails );
				break;

			case 'post_author_only':
			default:
				$emails = self::notify_post_author_only( $emails, $comment_id );
		}

		return $emails;
	}

	/**
	 * Filters moderation recipients
	 *
	 * @since 0.7
	 *
	 * @param array $emails     List of email addresses to notify for comment moderation.
	 * @param int   $comment_id Comment ID.
	 *
	 * @return array
	 */
	public static function notification_recipients( $emails, $comment_id ) {

		switch ( COMMENT_NOTIFICATION_RECIPIENTS ) {
			case 'post_author_only':
			case 'wp_default':
			default:
				// Do nothing.
				break;

			case 'site_admin_only':
				$emails = self::notify_site_admin_only( $emails );
				break;
		}

		return $emails;
	}

	/**
	 * Filters recipients: $emails includes only author e-mail,
	 * unless the authors e-mail is missing or the author has no moderator rights.
	 *
	 * @since 0.4
	 *
	 * @param array $emails     List of email addresses to notify for comment moderation.
	 * @param int   $comment_id Comment ID.
	 *
	 * @return array
	 */
	private static function notify_post_author_only( $emails, $comment_id ) {
		// Do we have multiple recipients at all?
		if ( is_array( $emails ) && count( $emails ) > 1 ) {
			// Most likely, the first element is the admin email and the second is the post author email.
			// But another filter might be responsible for additional emails so...
			$admin_email = get_option( 'admin_email' );
			$comment     = get_comment( $comment_id );
			$post        = get_post( $comment->comment_post_ID );
			$user        = get_userdata( $post->post_author );

			// Make extra sure the admin email is NOT the same as the original post author email before removing it!
			if ( ! empty( $user->user_email ) && 0 !== strcasecmp( $user->user_email, $admin_email ) ) {
				$emails = array_diff( $emails, array( $admin_email ) );
			}
		}

		return $emails;
	}

	/**
	 * Filters recipients: $emails includes only site admin e-mail,
	 * unless the admin e-mail is missing or invalid.
	 *
	 * @since 0.7
	 *
	 * @param array $emails List of email addresses to notify for comment moderation.
	 *
	 * @return array
	 */
	private static function notify_site_admin_only( $emails ) {
		$admin_email = get_option( 'admin_email' );

		// Valid admin email? Then override.
		if ( $admin_email && is_email( $admin_email ) ) {
			$emails = array( $admin_email );
		}
		// TODO create fallback option: else {}.

		return (array) $emails;
	}
}
