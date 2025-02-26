<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package   Profitblue
 * @author    Profitblue
 * @license   GPL-2.0+
 * @link      https://profitblue.com
 * @copyright 2024 Profitblue
 */

// If uninstall not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// @TODO: Define uninstall functionality here