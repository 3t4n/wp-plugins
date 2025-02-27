<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! isset( $_ENV['PANTHEON_ENVIRONMENT'] ) )
	return;

/**
 * Get cookies to work on Pantheon hosting.
 * https://docs.pantheon.io/cookies#cache-varying-cookies
 */
function add_prefix() {
	return 'STYXKEY_'; 
}
add_filter('sfwc_cookie_prefix', 'add_prefix');