<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package     ReduxFramework\Uninstall
 * @author      Dovy Paukstys <info@simplerain.com>
 * @since       3.0.0
 */


// If uninstall, not called from WordPress, then exit
if( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

$option_name = 'contrix_csp';

delete_option( $option_name );

// For site options in multisite
delete_site_option( $option_name ); 
