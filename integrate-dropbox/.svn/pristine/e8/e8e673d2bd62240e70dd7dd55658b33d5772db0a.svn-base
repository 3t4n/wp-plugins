<?php

namespace CodeConfig\IntegrateDropbox\MediaLibrary;

use CodeConfig\IntegrateDropbox\Ajax;
use CodeConfig\IntegrateDropbox\Helpers;

defined('ABSPATH') or exit('Access denied!');

class Importer
{
    /**
     * Singleton instance
     *
     * @var Importer|null
     */
    protected static $instance = null;

    public const CHUNK_SIZE = 5 * 1024 * 1024; // 5MB per chunk for file download

    /**
     * Constructor
     *
     * Includes required files and hooks into an action to handle
     * the import media AJAX request.
     *
     * @return void
     */
    public function __construct()
    {
        if (! function_exists('wp_generate_attachment_metadata')) {
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            include_once(ABSPATH . 'wp-admin/includes/media.php');
        }

        add_action('wp_ajax_indbox_import_media', [ $this, 'handle_import_media' ]);
    }

    /**
     * Handles the AJAX request for importing media from Dropbox.
     *
     * @uses wp_send_json_error() To send an error response if the request is unauthorized.
     * @uses wp_send_json_success() To send a success response if the request is authenticated.
     *
     * @return void
     */
    public function handle_import_media()
    {
        $nonce = sanitize_text_field($_POST['nonce'] ?? '');

        if (empty($nonce) || !wp_verify_nonce($nonce, 'indbox-nonce')) {
            wp_send_json_error(['message' => __('Unauthorized Request!', 'integrate-dropbox')], 401);
        }

        $files = Helpers::sanitization($_POST['files'] ?? []);

        if (! empty($files)) {

            foreach ($files as $file) {
                $this->download_and_save_file($file);
            }
        }

        wp_send_json_success(['status' => 'ok']);
    }

    /**
     * Downloads a file in chunks and stores it as an attachment
     *
     * @param array $file
     * @return int|false Attachment ID on success, false on failure
     */
    public function download_and_save_file($file)
    {
        $upload_dir = wp_upload_dir();

        $id         = $file['file_id'];
        $account_id = $file['account_id'];
        $name       = sanitize_file_name($file['name']);
        $extension  = $file['extension'];

        if (substr(strtolower($name), - strlen($extension)) !== strtolower($extension)) {
            $name .= '.' . $extension;
        }

        $file_path    = $upload_dir['path'] . '/' . $name;

        $download_url = Ajax::instance()->generate_download_link($id, $account_id);

        // Set up the download stream with a custom context
        $context     = stream_context_create([ 'http' => [ 'timeout' => 60 ] ]);
        $source      = fopen($download_url, 'rb', false, $context);
        $destination = fopen($file_path, 'wb');

        if (! $source || ! $destination) {
            return false;
        }

        // Read and write in chunks to avoid memory issues
        while (! feof($source)) {
            $chunk = fread($source, self::CHUNK_SIZE);
            fwrite($destination, $chunk);
        }

        fclose($source);
        fclose($destination);

        // Create and insert the attachment in WordPress
        $file_type = wp_check_filetype(basename($file_path));

        $attachment = array(
            'guid'           => $upload_dir['url'] . '/' . basename($file_path),
            'post_title'     => preg_replace('/\.[^.]+$/', '', basename($file_path)),
            'post_mime_type' => $file_type['type'],
            'post_status'    => 'inherit',
            'post_content'   => ''
        );

        $attach_id = wp_insert_attachment($attachment, $file_path);

        // Generate and update attachment metadata
        $attach_data = wp_generate_attachment_metadata($attach_id, $file_path);
        wp_update_attachment_metadata($attach_id, $attach_data);

        return $attach_id;
    }

    /**
     * Singleton instance retrieval
     *
     * @return Importer
     */
    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

}
