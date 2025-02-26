<?php
/**
 * Company functions.
 *
 * @package Aithenticate
 */

/**
 * Get the company slug by the author's email using the Aithenticate.org API.
 *
 * @return string
 */
function aithenticate_get_company_slug() {
	$email = get_option( 'aithenticate_license_email' );

	$transient_key = sanitize_key( 'company_slug_for_' . $email );
	$company_slug  = get_transient( $transient_key );

	if ( false !== $company_slug ) {
		return $company_slug;
	}

	$response = wp_remote_get( 'https://aithenticate.org/wp-json/aithenticate-core/v1/company/email/' . $email );

	if ( wp_remote_retrieve_response_code( $response ) === 200 ) {
		$body         = json_decode( wp_remote_retrieve_body( $response ) );
		$company_slug = $body->post_name;
	} else {
		$company_slug = '';
	}

	set_transient( $transient_key, $company_slug, DAY_IN_SECONDS );

	return $company_slug;
}
