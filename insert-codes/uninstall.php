<?php
/**
 * Insert Codes Uninstall.
 *
 * @since 1.0.0
 * @package InsertCodes
 */

defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

/**
 * Delete options by prefix.
 *
 * @param string $prefix Prefix of the option name.
 *
 * @since 1.0.0
 * @return void
 */
function insertcodes_delete_options( $prefix ) {
	// Retrieve all options.
	$all_options = wp_load_alloptions();

	// Loop through options and delete those with the specified prefix.
	foreach ( $all_options as $option_name => $option_value ) {
		if ( strpos( $option_name, $prefix ) === 0 ) {
			delete_option( $option_name );
		}
	}
}

if ( 'yes' === get_option( 'insertcodes_delete_data' ) ) {
	$option_prefix = 'insertcodes_';

	// Delete options for the main site.
	insertcodes_delete_options( $option_prefix );

	// Delete options in a multisite network.
	if ( is_multisite() ) {
		$sites = get_sites();

		foreach ( $sites as $site ) {
			switch_to_blog( $site->blog_id );
			insertcodes_delete_options( $option_prefix );
			restore_current_blog();
		}
	}
}
