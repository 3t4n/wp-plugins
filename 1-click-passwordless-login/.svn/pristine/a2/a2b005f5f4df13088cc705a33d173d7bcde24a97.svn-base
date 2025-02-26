<?php
/**
 * PasswordLess auth Token
 *
 * @package 1-click-passwordless-login
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Xclickpw_Token
 *
 * Handles token generation and validation for passwordless authentication.
 *
 * @package 1-click-passwordless-login
 */
class Xclickpw_Token {
	public const TOKEN_META_KEY  = '_xclickpw_token';
	public const EXPIRY_META_KEY = '_xclickpw_expiry';

	/**
	 * Generates a secure authentication token for a user.
	 *
	 * The token is stored as user meta along with an expiration timestamp.
	 *
	 * @param int $user_id The ID of the user.
	 * @return string The generated authentication token.
	 */
	public static function create_token( int $user_id ): string {
		$token   = bin2hex( random_bytes( 16 ) );
		$expires = time() + 15 * 60; // 15 minutes expiry.
		update_user_meta( $user_id, self::TOKEN_META_KEY, $token );
		update_user_meta( $user_id, self::EXPIRY_META_KEY, $expires );
		return $token;
	}

	/**
	 * Validates the authentication token and logs the user in if valid.
	 *
	 * Checks if the token exists and has not expired.
	 * If valid, the token is deleted after use.
	 *
	 * @param string $token The authentication token.
	 * @return int|false The user ID if valid, false otherwise.
	 */
	public static function validate_token( string $token ) {
		$users = get_users(
			array(
				'meta_key'   => self::TOKEN_META_KEY, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
				'meta_value' => $token, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
				'number'     => 1, // Fetch only one user.
				'fields'     => array( 'ID' ), // Fetch only the user ID.
			)
		);

		if ( ! empty( $users ) ) {
			$user_id = $users[0]->ID; // Get the first (and only) user ID.
		} else {
			$user_id = null; // No user found.
		}

		if ( $user_id ) {
			$expiry = get_user_meta( $user_id, self::EXPIRY_META_KEY, true );

			if ( $expiry > time() ) {
				delete_user_meta( $user_id, self::TOKEN_META_KEY );
				delete_user_meta( $user_id, self::EXPIRY_META_KEY );
				return (int) $user_id;
			}
		}

		return false;
	}
}
