<?php
// Uninstall Plugin
if (!defined('ABSPATH') && !defined('WP_UNINSTALL_PLUGIN')) exit();
// for future use if options will be written to the db
//delete_option('xxxxxx');

// Delete the plugin's custom css file for the login page
$file_path = WP_PLUGIN_DIR . '/aati-wp-finetuning/assets/css/aatiwpf-custom-login.css';
if ( file_exists( $file_path ) ) {
    unlink( $file_path );
}