<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Prevent direct access
}

class Automatik_Blog_Logger {

    private $log_file;

    public function __construct() {
        $upload_dir = wp_upload_dir();
        $this->log_file = trailingslashit( $upload_dir['basedir'] ) . 'automatik_blog-logs.txt';

        // Removed the addition of the logs menu
        // add_action( 'admin_menu', array( $this, 'register_log_page' ) );
    }

    public function log( $message ) {
        if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
            $date    = date_i18n( 'Y-m-d H:i:s' );
            $message = "[{$date}] {$message}\n";

            // Initialize WP Filesystem
            global $wp_filesystem;
            if ( ! function_exists( 'WP_Filesystem' ) ) {
                require_once ABSPATH . '/wp-admin/includes/file.php';
            }
            WP_Filesystem();

            // Ensure the log directory exists
            $log_dir = dirname( $this->log_file );
            if ( ! $wp_filesystem->is_dir( $log_dir ) ) {
                $wp_filesystem->mkdir( $log_dir );
            }

            // Read existing content if the file exists
            if ( $wp_filesystem->exists( $this->log_file ) ) {
                $existing_content = $wp_filesystem->get_contents( $this->log_file );
                $message = $existing_content . $message;
            }

            // Write the updated content back to the log file
            $wp_filesystem->put_contents( $this->log_file, $message, FS_CHMOD_FILE );
        }
    }

    // Removed the register_log_page method and any others related to displaying logs
}