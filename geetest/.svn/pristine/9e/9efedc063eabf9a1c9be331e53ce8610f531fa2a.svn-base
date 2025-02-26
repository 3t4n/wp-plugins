<?php

class GeetestGformCaptcha
{
    private static $instance;

    private function __construct()
    {
//        add_action( 'wp_enqueue_scripts', array($this, 'load_gt4_js'));
//        wp_register_script('Gt4', 'http://static.geetest.com/v4/gt4.js', array('jquery'), '2.1', true);
//        wp_enqueue_script('Gt4');
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
//        add_action( 'gform_register_init_scripts', array($this, 'load_gt4_js'));
        if (get_option('geetest_options')['show_in_gform'] == '1') {
            $this->geetest_gfrom();
        }
    }


    public function load_gt4_js()
    {
        wp_register_script('Gt4', 'http://static.geetest.com/v4/gt4.js', array('jquery'), '2.1', true);
        wp_enqueue_script('Gt4');
    }

    public function geetest_gfrom()
    {
        add_action('gform_register_init_scripts', array($this, 'geetest_gform_form'));
        add_action('gform_pre_submission', array($this, 'geetest_gform_verify'));
    }



    public function geetest_gform_verify()
    {
        $VersionOption = get_option('geetest_options')['version_options'];
        if ($VersionOption == 'v4') {
            $error_message = geetest_get_verify_message(
                'lot_number',
                'captcha_output',
                'pass_token',
                'gen_time'
            );
        }else{
            $error_message = validate_geetest_v3(
                'geetest_challenge',
                'geetest_validate',
                'geetest_seccode'
            );
        }


        if (null !== $error_message) {
            wp_die(
                '<p>The Captcha is invalid.</p>',
                __('Gform Submission Failure'),
                array(
                    'back_link' => true,
                )
            );
        }
    }



    public function geetest_gform_form()
    {
        $VersionOption = get_option('geetest_options')['version_options'];
        if ($VersionOption == 'v4'){
            wp_register_script('Gt4', 'http://static.geetest.com/v4/gt4.js', array('jquery'), '2.1', false);
            wp_enqueue_script('Gt4');
            wp_register_script('g4init', GEETEST_CAPTCHA_JS_DIR . 'init.js', array('jquery'), '2.1', false);
            wp_enqueue_script('g4init');

            ?>

            <input type="hidden" name="captcha_id" id="captcha_id" value="<?php echo esc_attr(get_option('geetest_options')['public_key']); ?>">
            <input type="hidden" name="language" id="language" value="<?php echo esc_attr(get_option('geetest_options')['lang_options']); ?>">

            <?php
        }else{
            wp_register_script('Gt3', 'https://static.geetest.com/static/tools/gt.js', array('jquery'), '2.1', false);
            wp_enqueue_script('Gt3');
            wp_register_script('g3gform', GEETEST_CAPTCHA_JS_DIR . 'g3gform.js', array('jquery'), '2.1', false);
            wp_enqueue_script('g3gform');
            echo geetest_show_captcha_v3();
        }

    }
}
