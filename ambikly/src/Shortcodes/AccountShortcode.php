<?php

namespace Ambikly\Shortcodes;

class AccountShortcode extends BaseShortcode
{
    public function __construct()
    {
        parent::__construct('ambikly_account');
    }

    public function output($args)
    {

        if (get_current_user_id() < 1) {

            ambikly_get_template('account.login');

        } else {

            wp_enqueue_style('ambikly-account-style');

            $menu_item_endpoints = ambikly_get_account_endpoints();

            $page_key = isset($_GET['page_type']) ? sanitize_text_field($_GET['page_type']) : 'dashboard';

            $current_endpoint = isset($menu_item_endpoints[$page_key]) ? $page_key : 'dashboard';

            ambikly_get_template('account.account', ['current_endpoint' => $current_endpoint]);
        }
    }
}