<?php

class GeetestbbPressCaptcha
{
    private static $instance;

    private function __construct()
    {
        $this->actions();
    }

    public static function init()
    {
        if (! self::$instance instanceof self) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function actions()
    {
        if (get_option('geetest_options')['show_in_bbp_new'] == '1') {
            $this->geetest_bbp_new();
        }
        if (get_option('geetest_options')['show_in_bbp_reply'] == '1') {
            $this->geetest_bbp_reply();
        }
    }

    public function geetest_bbp_new()
    {
        add_action('bbp_theme_before_topic_form_submit_wrapper', array( $this, 'geetest_bbp_new_form' ), 99);
        add_action('bbp_new_topic_pre_extras', array( $this, 'bbp_new_verify' ));
    }

    public function geetest_bbp_reply()
    {
        add_action('bbp_theme_before_reply_form_submit_wrapper', array( $this, 'geetest_bbp_new_form' ), 99);
        add_action('bbp_new_reply_pre_extras', array( $this, 'bbp_reply_verify' ), 10, 2);
    }

    public function bbp_new_verify($forum_id)
    {
        $error_message = geetest_get_verify_message(
            'lot_number',
            'captcha_output',
            'pass_token',
            'gen_time'
        );
        if (null !== $error_message) {
            $message = '<strong>' . __('ERROR', 'geetest') . '</strong>: The Captcha is invalid.';
            bbp_add_error('c4wp_error', $message);
        }
    }


    public function bbp_reply_verify($topic_id, $forum_id)
    {
        $error_message = geetest_get_verify_message(
            'lot_number',
            'captcha_output',
            'pass_token',
            'gen_time'
        );
        if (null !== $error_message) {
            $message = '<strong>' . __('ERROR', 'geetest') . '</strong>: The Captcha is invalid.';
            bbp_add_error('c4wp_error', $message);
        }
    }

    public function geetest_bbp_new_form()
    {
        $app_key = get_option('geetest_options')['public_key'];
        $lang = get_option('geetest_options')['lang_options'];
        echo geetest_show_captcha($app_key, $lang);
    }
}
