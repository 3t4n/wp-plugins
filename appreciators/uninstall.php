<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package   Appreciators
 * @author    Minh Lee <minh@appreciators.org>
 * @license   GPL-2.0+
 * @copyright 2015 Appreciators Clique
 */

// If uninstall not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option( 'appreciators_settings' );
