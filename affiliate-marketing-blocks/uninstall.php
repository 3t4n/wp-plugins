<?php
/**
 * Uninstall script for Afmb Blocks
 *
 * @package Afmb-blocks
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

// Load the main plugin file to access the cleanup method.
require_once plugin_dir_path( __FILE__ ) . 'affiliate-marketing-blocks.php';

// Call the cleanup method.
Afmb_Dynamic_Style::cleanup_files();