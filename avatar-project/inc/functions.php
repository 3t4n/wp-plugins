<?php

/**
 * Register our avatar type so it can be chosen on the admin screens.
 *
 * @param  array $avatar_defaults Array of avatar types.
 *
 * @return array                   Modified array of avatar types.
 */
function avproject_avatar_defaults( $avatar_defaults ) {

	foreach ( AVPROJECT_CONFIG as $slug => $avatar ) {
		$avatar_defaults[ $slug ] = $avatar['title'];
	}

	return array_reverse( $avatar_defaults );
}


/**
 * Check if an avatar pack exists
 *
 * @param $key
 *
 * @return bool
 */
function avproject_avatars_exist( $key ) {

	return in_array( $key, AVPROJECT_SLUGS );
}

/**
 * Get all of the avatars by key
 *
 * @param $key
 *
 * @return array
 */
function avproject_get_avatars( $key ) {

	return AVPROJECT_CONFIG[ $key ]['avatars'];
}


/**
 * Get the file extensions of an avatar pack
 *
 * @param $key
 *
 * @return mixed
 */
function avproject_get_file_extension( $key ) {

	return AVPROJECT_CONFIG[ $key ]['file_extension'];
}

/**
 * Deal with mapping an id_or_email to a hash.
 *
 * Wow. Much inspired from Wapuu Avatars.
 *
 * @param  mixed $id_or_email ID / email / hash of the requested avatar.
 *
 * @return string               Hash to use to map the wapuu.
 */
function avproject_generate_hash( $id_or_email ) {

	$email_hash = '';
	$user       = $email = false;

	// Process the user identifier.
	if ( is_numeric( $id_or_email ) ) {
		$user = get_user_by( 'id', absint( $id_or_email ) );
	}
	elseif ( is_string( $id_or_email ) ) {
		if ( strpos( $id_or_email, '@md5.gravatar.com' ) ) {
			// md5 hash
			list( $email_hash ) = explode( '@', $id_or_email );
		}
		else {
			// email address
			$email = $id_or_email;
		}
	}
	elseif ( $id_or_email instanceof WP_User ) {
		// User Object
		$user = $id_or_email;
	}
	elseif ( $id_or_email instanceof WP_Post ) {
		// Post Object
		$user = get_user_by( 'id', (int) $id_or_email->post_author );
	}
	elseif ( is_object( $id_or_email ) && isset( $id_or_email->comment_ID ) ) {
		// Comment Object
		if ( ! empty( $id_or_email->user_id ) ) {
			$user = get_user_by( 'id', (int) $id_or_email->user_id );
		}
		if ( ( ! $user || is_wp_error( $user ) ) && ! empty( $id_or_email->comment_author_email ) ) {
			$email = $id_or_email->comment_author_email;
		}
	}
	if ( ! $email_hash ) {
		if ( $user ) {
			$email = $user->user_email;
		}
		if ( $email ) {
			$email_hash = md5( strtolower( trim( $email ) ) );
		}
	}

	return $email_hash;
}


/**
 * Implements get_avatar().
 *
 * Generate a Wapuuvatar if requested.
 */
function avproject_get_avatar( $avatar, $id_or_email, $size, $av_key, $alt, $args ) {

	if ( is_admin() ) {
		$screen = get_current_screen();
		if ( is_object( $screen ) && in_array( $screen->id, array( 'dashboard', 'edit-comments' ) ) && $av_key == 'mm' ) {
			$av_key = get_option( 'avatar_default', 'mystery' );
		}
	}


	if ( ! avproject_avatars_exist( $av_key ) ) {
		return $avatar;
	}

	$generated_url = avproject_generate_avatar_url( $av_key, $id_or_email, $size );


	if ( $generated_url ) {
		$return = str_replace( $av_key, urlencode( esc_url( $generated_url ) ), $avatar );

		// DEV MODE
		$return = str_replace( 'plugins.wp', '6536d9a7.ngrok.io', $return );

		return $return;
	}

	return $avatar;
}


/**
 * Generate the Avatar URL for a specific ID or email.
 *
 * @param  mixed $id_or_email The ID / email / hash of the requested avatar.
 * @param  int   $size        The requested size.
 *
 * @return string
 */
function avproject_generate_avatar_url( $avatar_key, $id_or_email, $requested_size ) {

	// Select a size.
	$sizes         = array( 512, 256, 128, 64, 32 );
	$selected_size = max( $sizes );
	foreach ( $sizes as $choice ) {
		if ( $choice >= $requested_size ) {
			$selected_size = $choice;
		}
	}

	// Pick an avatar.
	$hash = avproject_generate_hash( $id_or_email );

	$avatars        = avproject_get_avatars( $avatar_key );
	$file_extension = avproject_get_file_extension( $avatar_key );
	$avatar         = hexdec( substr( $hash, 0, 4 ) ) % count( $avatars );


	$avatar_base = apply_filters( 'avproject_avatar', $avatars[ $avatar ], $id_or_email, $hash );
	$avatar_img  = $avatar_base . '-' . $selected_size . '.' . $file_extension;


	return AVPROJECT_AVATAR_BASE_URL . $avatar_key . '/' . $avatar_img;

}