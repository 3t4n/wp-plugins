<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * @link       http://pressfore.com
 * @since      1.0.0
 *
 * @package    Pressfore Preloaders
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

pressfore_preloaders_clean();

function pressfore_preloaders_clean()
{
    $option = 'pf_loaders';

    delete_option( $option );
}