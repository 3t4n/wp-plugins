<?php
/**
 * Core functions.
 *
 * @package Aithenticate
 */

defined( 'ABSPATH' ) || exit;

require_once aithenticate()->plugin_path() . 'includes/aithenticate-company-functions.php';
require_once aithenticate()->plugin_path() . 'includes/aithenticate-license-functions.php';

/**
 * Get the supported post types.
 *
 * @return array
 */
function aithenticate_get_supported_post_types() {
	$post_types = array(
		get_post_type_object( 'post' ),
		get_post_type_object( 'page' ),
	);

	return $post_types;
}

/**
 * Get post types that are always considered AI content.
 *
 * @return array
 */
function aithenticate_get_fixed_ai_post_types() {
	$post_types = get_option( 'aithenticate_fixed_ai_post_types' );

	if ( ! is_array( $post_types ) ) {
		$post_types = array();
	}

	return $post_types;
}
