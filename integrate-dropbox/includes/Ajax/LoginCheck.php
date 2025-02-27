<?php

namespace CodeConfig\IntegrateDropbox\Ajax;

defined('ABSPATH') or exit('Hey, what are you doing here? You silly human!');

use CodeConfig\IntegrateDropbox\App\API;

class LoginCheck
{
    private static $instance = null;

    public function __construct()
    {
        add_action('wp_ajax_indbox_check_login', [$this, 'indbox_login_check']);
    }

    public function indbox_login_check()
    {
        $nonce = isset($_POST['nonce']) ? sanitize_text_field($_POST['nonce']) : null;

        if (!wp_verify_nonce($nonce, 'indbox-nonce') && !wp_verify_nonce($nonce, 'wp_rest')) {
            wp_send_json_error(['message' => __('Unauthorized Request!', 'integrate-dropbox')], 401);
        }

        $force = isset($_POST['force']) ? sanitize_text_field($_POST['force']) : null;

        $current_account_info = API::get_account_info($force);

        $res = false;

        if ($current_account_info) {
            $account_id = $current_account_info->getAccountId();
            $res = !empty($account_id);
        }

        wp_send_json_success([
            'data' => $res,
            'statue' => 'success'
        ]);
    }

    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
