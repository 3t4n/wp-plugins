<?php

namespace Ambikly\Shortcodes;

class LoginShortcode extends BaseShortcode
{
    public function __construct()
    {
        parent::__construct('ambikly_login');
    }

    public function output($args)
    {

        if (get_current_user_id() < 1) {

            ambikly_get_template('account.login');

        } else {

            echo sprintf(esc_html__('<p>You’re already logged in! Visit your %sAccount%s page to manage your profile, view orders, and update payment information.</p>', 'ambikly'), '<a href="'.esc_url(ambikly_get_account_page(true)).'">','</a>');
        }
    }
}