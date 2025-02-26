<?php
// If WordPress is not defined, exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

// Remove the log file
$upload_dir = wp_upload_dir();
$log_file = $upload_dir['basedir'] . '/automatik_blog-logs.txt';
if ( file_exists( $log_file ) ) {
    wp_delete_file( $log_file );
}
