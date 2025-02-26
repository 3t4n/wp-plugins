<?php

class GeetestWooCommerceCaptcha
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
        if (get_option('geetest_options')['show_in_wclogin'] == '1') {
            $this->wc_login();
        }
        if (get_option('geetest_options')['show_in_wcregister'] == '1') {
            $this->wc_register();
        }

        if (get_option('geetest_options')['show_in_wclostpassword'] == '1') {
            $this->wc_lostPassword();
        }
        if (get_option('geetest_options')['show_in_wccheckout'] == '1') {
            $this->wc_checkout();
        }
    }

    public function wc_login()
    {
        add_action('woocommerce_login_form', [ $this, 'geetest_wc_login_form' ]);
        add_action('woocommerce_process_login_errors', [ $this, 'geetest_wc_login_verify' ]);
    }

    public function wc_lostPassword()
    {
        add_action('woocommerce_lostpassword_form', [ $this, 'geetest_wc_login_form' ]);
    }

    public function wc_checkout()
    {
        add_action('woocommerce_after_checkout_billing_form', [ $this, 'geetest_wc_login_form' ]);
        add_action('woocommerce_checkout_process', [ $this, 'geetest_wc_checkout_verify' ]);
    }

    public function wc_register()
    {
        add_action('woocommerce_register_form', [ $this, 'geetest_wc_register_form' ]);
        add_action('woocommerce_process_registration_errors', [ $this, 'geetest_wc_register_verify' ], 10, 1);
    }

    public function geetest_wc_register_verify($validation_error)
    {
        $error_message = geetest_get_verify_message(
            'lot_number',
            'captcha_output',
            'pass_token',
            'gen_time'
        );

        if (null === $error_message) {
            return $validation_error;
        }

        $validation_error->add('geetest_captcha_error', $error_message);

        return $validation_error;
    }

    public function geetest_wc_checkout_verify()
    {
        $error_message = geetest_get_verify_message(
            'lot_number',
            'captcha_output',
            'pass_token',
            'gen_time'
        );

        if (null !== $error_message) {
            wc_add_notice($error_message, 'error');
        }
    }


    public function geetest_wc_login_verify($validation_error)
    {
        $error_message = geetest_get_verify_message(
            'lot_number',
            'captcha_output',
            'pass_token',
            'gen_time'
        );

        if (null === $error_message) {
            return $validation_error;
        }
        return new WP_Error('invalid_captcha', __('The Captcha is invalid.', 'geetest'), 400);
    }



    public function geetest_wc_register_form()
    {
        $app_key = get_option('geetest_options')['public_key'];
        $lang = get_option('geetest_options')['lang_options'];

        echo geetest_show_captcha($app_key, $lang);
    }

    public function geetest_wc_login_form()
    {
        $app_key = get_option('geetest_options')['public_key'];
        $lang = get_option('geetest_options')['lang_options'];
        echo geetest_show_captcha($app_key, $lang);
    }
}
