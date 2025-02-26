<?php
/**
 * Core functions.
 *
 * @package Aithenticate
 */

/**
 * Check if the site has a valid license and email.
 *
 * @return bool
 */
function aithenticate_has_valid_license_and_email() {
	return aithenticate()->license && aithenticate_get_company_slug();
}

/**
 * Get the count of how many posts Aithenticate has been enabled on.
 *
 * @return int
 */
function aithenticate_get_enabled_posts_count() {
	$posts = get_posts(
		array(
			'numbrposts' => - 1,
			'post_type'  => 'any',
			'fields'     => 'ids',
			'meta_key'   => '_aithenticate_enabled',
			'meta_value' => true,
		)
	);

	return count( $posts );
}

/**
 * Get the license type; 10, 100 or unlimited.
 *
 * @return int|string
 */
function aithenticate_get_license_type() {
	$license = aithenticate()->license;

	if ( ! $license ) {
		return 0;
	}

	$license_type = trim( explode( ' ', $license->license_title )[1] );

	if ( is_numeric( $license_type ) ) {
		$license_type = absint( $license_type );
	}

	return $license_type;
}
