<?php

class GeetestContactForm7Captcha
{
    private static $instance;
    public const SHORTCODE = 'cf7-geetest-captcha';
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
        if (get_option('geetest_options')['show_in_cf7'] == '1') {
            $this->geetest_cf7_from();
        }
    }

    public function geetest_cf7_from()
    {
        add_filter('wpcf7_form_elements', [ $this, 'geetest_cf7_form' ]);
        add_shortcode('cf7-geetest-captcha', [ $this, 'geetest_cf7_shortcode' ]);
        add_filter('wpcf7_validate', [ $this, 'geetest_cf7_verify' ], 20, 2);
    }


    public function geetest_cf7_verify($result)
    {
        $error_message = geetest_get_verify_message(
            'lot_number',
            'captcha_output',
            'pass_token',
            'gen_time'
        );
        if (null !== $error_message) {
            $result->invalidate(
                [
                    'type' => 'captcha',
                    'name' => 'geetest',
                ],
                'The Captcha is invalid.'
            );
        }
        return $result;
    }

    public function geetest_cf7_shortcode($atts)
    {
        global $cf7sr;
        $cf7sr = true;
        $app_key = get_option('geetest_options')['public_key'];
        $lang = get_option('geetest_options')['lang_options'];
        return geetest_show_captcha($app_key, $lang) . '<span class="wpcf7-form-control-wrap geetest"><input type="hidden" name="geetest" value="" class="wpcf7-form-control"></span>';
    }


    public function geetest_cf7_form($form)
    {
        if ( has_shortcode( $form, self::SHORTCODE ) ) {
            return do_shortcode( $form );
        }

        $cf7_geetest_form = do_shortcode( '[' . self::SHORTCODE . ']' );
        $submit_button = '/(<(input|button) .*?type="submit")/';

        return preg_replace(
            $submit_button,
            $cf7_geetest_form . '$1',
            $form
        );
    }
}
