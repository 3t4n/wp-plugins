<?php

class GeetestWpforms
{
    private static $instance;

    private function __construct()
    {
        $this->actions();
        $this->randnum = (string)rand(100000, 999999);
        $this->captcha_element_id = 'embed-captcha-'.$this->randnum;
        $this->input_captcha_id = 'captcha_id_'.$this->randnum;
        $this->input_language = 'language_'.$this->randnum;
        $this->input_lot_number = 'lot_number_'.$this->randnum;
        $this->input_captcha_output = 'captcha_output_'.$this->randnum;
        $this->input_pass_token = 'pass_token_'.$this->randnum;
        $this->input_gen_time = 'gen_time_'.$this->randnum;
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
        if (get_option('geetest_options')['show_in_wpforms'] == '1') {
            add_filter( 'wpforms_display_submit_before', [ $this, 'geetest_wp_form' ] );
            add_action( 'wpforms_process', [ $this, 'verify' ], 10, 3 );
        }
    }

    public function verify($fields, $entry, $form_data)
    {
        $error_message = geetest_get_verify_message(
            'lot_number',
            'captcha_output',
            'pass_token',
            'gen_time'
        );
        if ( null !== $error_message ) {
            wpforms()->get( 'process' )->errors[ $form_data['id'] ]['footer'] = $error_message;
        }
    }



    public function geetest_wp_form()
    {
        $app_key = get_option('geetest_options')['public_key'];
        $lang = get_option('geetest_options')['lang_options'];
        $geetest_form = geetest_show_captcha($app_key, $lang);
        $css = '<style>
                .geetest_captcha .geetest_holder, .geetest_popup_wrap .geetest_holder {
                    position: relative !important;
                    width: 260px !important;
                    height: 50px !important;
                    -webkit-box-sizing: border-box !important;
                    box-sizing: border-box !important;
                    background-image: -webkit-gradient(linear,left top,left bottom,from(#fff),to(#f3f3f3)) !important;
                    background-image: -o-linear-gradient(top,#fff 0,#f3f3f3 100%) !important;
                    background-image: linear-gradient(180deg,#fff,#f3f3f3) !important;
                }
            </style>';
        echo $geetest_form . $css;

    }


}
