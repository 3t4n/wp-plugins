<?php
/**
 * Avatar class
 *
 * @package Identicons
 */

declare(strict_types=1);

namespace Identicons;

/**
 * The Avatar class definition.
 *
 * @since 2.0.0
 */
class Avatar {

	/**
	 * Adds hooks.
	 *
	 * @since 2.0.0
	 */
	public function __construct() {
		add_filter( 'pre_get_avatar_data', array( $this, 'pre_get_avatar_data' ), 10, 2 );
	}

	/**
	 * Filters the avatar data.
	 *
	 * @since 2.0.0
	 * @param mixed[] $args The arguments.
	 * @param mixed   $id_or_email The user identifier.
	 * @return mixed[]
	 */
	public function pre_get_avatar_data( $args, $id_or_email ) {
		// Check if the default image should be used.
		if ( true === $args['force_default'] ) {
			return $args;
		}
		// Get the user option.
		$avatar_default = get_option( 'avatar_default' );
		// Check the type of the user option.
		if ( ! is_string( $avatar_default ) ) {
			return $args;
		}
		// Try to get the type from the option.
		$case = Identicon_Type::tryFrom( $avatar_default );
		if ( is_null( $case ) ) {
			return $args;
		}
		$email = new Email();
		// Get a user email from the identifier.
		$email = $email->get_email_from_id_or_email( $id_or_email );
		// Check if a user email is available.
		if ( ! is_null( $email ) ) {
			// Get a hash from the user email.
			$hash = md5( strtolower( trim( $email ) ) );
		}
		if ( is_string( $id_or_email ) ) {
			// Check if the identifier contains a hash.
			if ( str_contains( $id_or_email, '@md5.gravatar.com' ) ) {
				// Get a hash from the identifier.
				list( $hash ) = explode( '@', $id_or_email );
			}
		}
		if ( isset( $hash ) ) {
			// Check if a Gravatar image is available.
			$gravatar = new Gravatar();
			if ( true === $gravatar->read( $hash ) ) {
				return $args;
			}
			// Create a new instance.
			$identicon = Factory::make( $case, $hash );
			// Set the default.
			$args['default'] = $identicon->read();
			// Check if the file doesn't exist.
			if ( null === $args['default'] ) {
				if ( true === $identicon->create() ) {
					$args['default'] = $identicon->read();
					if ( null === $args['default'] ) {
						$args['default'] = 'blank';
					}
				} else {
					$args['default'] = 'blank';
				}
			}
		} else {
			$args['default'] = 'blank';
		}
		return $args;
	}
}
