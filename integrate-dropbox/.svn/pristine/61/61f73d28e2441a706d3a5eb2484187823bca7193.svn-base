<?php

namespace CodeConfig\IntegrateDropbox\Ajax;

use CodeConfig\IntegrateDropbox\Helpers;

defined('ABSPATH') or exit('Hey, what are you doing here? You silly human!');

class MediaLibrary
{
    private static $instance;

    public function __construct()
    {
        add_action('wp_ajax_indbox_clear_dropbox_attachments', [$this, 'clear_dropbox_attachments']);
        add_action('wp_ajax_indbox_delete_media', [$this, 'delete_media']);
        add_action('wp_ajax_indbox_restore_media', [$this, 'restore_media']);
    }

    public function clear_dropbox_attachments()
    {
        $nonce = $_POST['nonce'] ? sanitize_text_field($_POST['nonce']) : null;

        if (! wp_verify_nonce($nonce, 'indbox-nonce')) {
            wp_send_json_error(['message' => 'Unauthorized Request!'], 401);
        }

        $response = Helpers::clearAllIndboxAttachments();

        if (! $response) {
            wp_send_json_error(['message' => 'Dropbox attachments not cleared!'], 401);
        }

        $response = [
            'status' => 'OK',
            'message' => 'Dropbox attachments cleared!',
            'data'  => true,
        ];

        wp_send_json_success($response);
    }

    public function delete_media()
    {
        $nonce = $_POST['nonce'] ? sanitize_text_field($_POST['nonce']) : null;

        if (! wp_verify_nonce($nonce, 'indbox-nonce')) {
            wp_send_json_error(['message' => 'Unauthorized Request!'], 401);
        }

        $id = sanitize_text_field($_POST['id'] ?? null);
        $permanently = filter_var($_POST['permanently'] ?? false, FILTER_VALIDATE_BOOLEAN);
        $dropbox = filter_var($_POST['dropbox'] ?? false, FILTER_VALIDATE_BOOLEAN);

        if (! $id) {
            wp_send_json_error(['message' => 'Invalid ID!'], 401);
        }

        $response = Helpers::deleteIndboxAttachment($id, $permanently, $dropbox);

        if (! $response) {
            wp_send_json_error(['message' => 'Dropbox attachment not deleted!'], 401);
        }

        $response = [
            'status' => 'ok',
            'message' => 'Dropbox attachment deleted!',
            'data'  => true,
        ];

        wp_send_json_success($response);

    }

    public function restore_media()
    {
        $nonce = $_POST['nonce'] ? sanitize_text_field($_POST['nonce']) : null;

        if (! wp_verify_nonce($nonce, 'indbox-nonce')) {
            wp_send_json_error(['message' => 'Unauthorized Request!'], 401);
        }

        $id = sanitize_text_field($_POST['id'] ?? null);

        if (! $id) {
            wp_send_json_error(['message' => 'Invalid ID!'], 401);
        }

        $response = Helpers::restoreIndboxAttachment($id);

        if (! $response) {
            wp_send_json_error(['message' => 'Dropbox attachment not restored!'], 401);
        }

        $response = [
            'status' => 'ok',
            'message' => 'Dropbox attachment restored!',
            'data'  => true,
        ];

        wp_send_json_success($response);
    }

    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
