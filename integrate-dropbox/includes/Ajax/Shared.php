<?php

namespace CodeConfig\IntegrateDropbox\Ajax;

use CodeConfig\IntegrateDropbox\App\Client;

defined('ABSPATH') or exit('Hey, what are you doing here? You silly human!');

class Shared
{
    private static $instance;

    public function __construct()
    {
        add_action('wp_ajax_indbox_get_shared_link', [$this, 'get_shared_link']);
    }

    public function get_shared_link()
    {
        $nonce = sanitize_text_field($_POST['nonce'] ?? '');

        if (!wp_verify_nonce($nonce, 'indbox-nonce')) {
            wp_send_json_error(['message' => __('Unauthorized Request!', 'integrate-dropbox')], 401);
        }

        $id = sanitize_text_field($_POST['id'] ?? null);

        if (empty($id)) {
            wp_send_json_error(['message' => __('Unauthorized Request!', 'integrate-dropbox')], 401);
        }

        $entry = Client::instance()->get_entry($id);

        if (! $entry instanceof \CodeConfig\IntegrateDropbox\App\Entry) {
            wp_send_json_error(['message' => __('Unauthorized Request!', 'integrate-dropbox')], 401);
        }

        $link = Client::instance()->get_shared_link($entry, ['audience' => 'public'], true);

        if($link) {
            wp_send_json_success([
                'success' => true,
                'link' => $link,
            ]);    
        } else {
            wp_send_json_error([
                'success' => false,
                'message' => __('Something went wrong!', 'integrate-dropbox'),
            ]);
        }

    }


    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
