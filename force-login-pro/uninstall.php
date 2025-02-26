<?php
/**
 * Uninstall
 *
 * @package force-login-pro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Check we are Uninstalling.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

// Flush Rewrite Rules.
flush_rewrite_rules();
