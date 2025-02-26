<?php

namespace APG\Core;

/**
 * Class Uploader
 * @package APG\Core
 */
class Uploader {

    /**
     * @var
     */
    private $error;

    /**
     * Construct the uploader with requireing the libs from WP core
     */
    public function __construct() {
        $this->require_upload_files();
    }

    /**
     * Upload a new file to an album (please check if a user has access, before calling this feature)
     *
     * @param $post_id
     * @param $file
     * @param $nr
     *
     * @return bool
     */
    public function upload_file( $post_id, $file, $nr ) {
        if( false === current_user_can( 'edit_post', $post_id ) ) {
            $this->error = __('You are not allowed to edit posts and upload photos.', 'apg');

            return false;
        }
        if ( $_FILES[ $file ]['error'] !== UPLOAD_ERR_OK ) {
            $this->error = __('There was an upload error. Is your uploads folder writable?', 'apg');

            return false;
        }

        $attachment_id = media_handle_upload( $file, $post_id );

        if ( is_wp_error( $attachment_id ) ) {
            $this->error = $attachment_id->get_error_message();

            return false;
        }

        update_post_meta( $post_id, '_apg_photos', $nr );

        return true;
    }

    /**
     * Get the error message if we have one.
     *
     * @return mixed
     */
    public function get_error() {
        return $this->error;
    }

    /**
     * Require WP core files
     */
    private function require_upload_files() {
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );
    }

}