<?php
/**
 * Uninstall our add-on options
 *
 * @package Timeline Express
 *
 * @since 1.0.0
 */

// if uninstall not called from WordPress exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {

	exit;

}

$options = get_option( TIMELINE_EXPRESS_NO_ICONS_OPTION );

if ( $options ) {

	delete_option( $options );

}
