<?php
/*
 * Copyright (C) 2022 Geetest.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */



class GeetestActions
{
    public const GEETEST_OPTIONS = 'geetest_options';
    public const GEETEST_APP_ID = 'public_key';
    public const GEETEST_APP_KEY = 'private_key';
    public const GEETEST_SHOW_IN_LOGIN = 'show_in_login';
    public const GEETEST_SHOW_IN_REGISTER = 'show_in_registration';
    public const GEETEST_SHOW_IN_COMMENTS = 'show_in_comments';
    public const GEETEST_SHOW_IN_LOSTPASSWORD = 'show_in_lostpassword';
    public const GEETEST_SHOW_IN_WCLOGIN = 'show_in_wclogin';
    public const GEETEST_SHOW_IN_WCREGISTER = 'show_in_wcregister';
    public const GEETEST_SHOW_IN_WCLOSTPASSWORD = 'show_in_wclostpassword';
    public const GEETEST_SHOW_IN_WCCHECKOUT = 'show_in_wccheckout';
    public const GEETEST_SHOW_IN_GFORM = 'show_in_gform';
    public const GEETEST_SHOW_IN_CF7 = 'show_in_cf7';
    public const GEETEST_SHOW_IN_BBP_NEW = 'show_in_bbp_new';
    public const GEETEST_SHOW_IN_BBP_REPLY = 'show_in_bbp_reply';
    public const GEETEST_SHOW_IN_WPFORMS = 'show_in_wpforms';
    public const GEETEST_LANG = 'lang_options';
    public const GEETEST_VERSION = 'version_options';
    public const INIT_GEETEST_PUBLIC_KEY = '';
    public const INIT_GEETEST_PRIVATE_KEY = '';

    public function __construct()
    {
//        wp_register_script('gt4', 'http://static.geetest.com/v4/gt4.js', array('jquery'), '2.1', true);
//        wp_enqueue_script('gt4');
//        add_action( 'admin_enqueue_scripts', array($this, 'load_gt4_js'));
//        add_action( 'login_enqueue_scripts', array($this, 'load_gt4_js'));
//        add_action( 'wp_enqueue_scripts', array($this, 'load_gt4_js'));
//        add_action( 'comment_form_before', array($this, 'load_gt4_js'));
//        add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'load_gt4_js' ] );
//        add_action( 'elementor/init', [ $this, 'load_gt4_js' ] );
//        add_action( 'wp_footer', array($this, 'load_gt4_js'));
    }

    /**
     * 开启插件
     */
    public static function geetest_activate()
    {
        $initOptions = array(
            'activation' => false,
            self::GEETEST_APP_ID => self::INIT_GEETEST_PUBLIC_KEY,
            self::GEETEST_APP_KEY => self::INIT_GEETEST_PRIVATE_KEY,
            self::GEETEST_SHOW_IN_LOGIN => '1',
            self::GEETEST_SHOW_IN_REGISTER => '1',
            self::GEETEST_SHOW_IN_COMMENTS => '1',
            self::GEETEST_SHOW_IN_LOSTPASSWORD => '1',
            self::GEETEST_SHOW_IN_WCREGISTER => '1',
            self::GEETEST_SHOW_IN_WCLOGIN => '1',
            self::GEETEST_SHOW_IN_WCLOSTPASSWORD => '1',
            self::GEETEST_SHOW_IN_WCCHECKOUT => '1',
            self::GEETEST_SHOW_IN_GFORM => '1',
            self::GEETEST_SHOW_IN_CF7 => '1',
            self::GEETEST_SHOW_IN_BBP_NEW => '1',
            self::GEETEST_SHOW_IN_BBP_REPLY => '1',
            self::GEETEST_SHOW_IN_WPFORMS =>'1',
            self::GEETEST_LANG => 'eng',
            self::GEETEST_VERSION => 'v4',
        );
        $captchaOptions = get_option(self::GEETEST_OPTIONS);

        if (empty($captchaOptions)) {
            add_option(self::GEETEST_OPTIONS, $initOptions);
        } else {
            $captchaOptions = array_merge($initOptions, $captchaOptions);
            update_option(self::GEETEST_OPTIONS, $captchaOptions);
        }
    }

    /**
     * 禁止插件
     */
    public static function geetest_deactivate()
    {
        $captchaOptions = get_option(self::GEETEST_OPTIONS);
        if (!empty($captchaOptions) && isset($captchaOptions['activation'])) {
            $captchaOptions['activation'] = false;
            update_option(self::GEETEST_OPTIONS, $captchaOptions);
        }
    }

    /**
     * 添加提示设置信息
     */
    public function keys_missing()
    {
        return (empty(get_option('geetest_options')['public_key']) || empty(get_option('geetest_options')['private_key']));
    }

    public function create_error_notice($message, $anchor = '')
    {
        $options_url = admin_url('options-general.php?page=geetest/GeetestActions.php') . $anchor;
        $error_message = sprintf(__($message . ' <a href="%s" title="WP-GeeTest Options">Set ID and key</a>', 'geetest'), $options_url);

        echo '<div class="error"><p><strong>' . $error_message . '</strong></p></div>';
    }

    public function missing_keys_notice()
    {
        if ($this->keys_missing()) {
            $this->create_error_notice('Please fill in GeeTest ID and key!');
        }
    }

    public function load_gt4_js()
    {
        wp_register_script('Gt4', 'http://static.geetest.com/v4/gt4.js', array('jquery'), '2.1', true);
        wp_enqueue_script('Gt4');
    }

    /**
     * 登录表单增加验证码
     */
    public function geetest_captcha_login_form()
    {
        $CodeVerifyOptions = get_option(self::GEETEST_OPTIONS);
        $VersionOption = $CodeVerifyOptions[self::GEETEST_VERSION];
        $LoginNeedCode = $CodeVerifyOptions[self::GEETEST_SHOW_IN_REGISTER];
        if ($LoginNeedCode == '1') {
            if ($VersionOption == 'v4') {
                $app_key = get_option(self::GEETEST_OPTIONS)[self::GEETEST_APP_ID];
                $lang = get_option(self::GEETEST_OPTIONS)[self::GEETEST_LANG];
                echo geetest_show_captcha($app_key, $lang);
            } else {
                echo geetest_show_captcha_v3();
            }
        }
    }

    /**
     * 注册表单增加验证码
     */
    public function geetest_captcha_register_form()
    {
        $CodeVerifyOptions = get_option(self::GEETEST_OPTIONS);
        $VersionOption = $CodeVerifyOptions[self::GEETEST_VERSION];
        $RegisterNeedCode = $CodeVerifyOptions[self::GEETEST_SHOW_IN_REGISTER];
        if ($RegisterNeedCode == '1') {
            if ($VersionOption == 'v4') {
                $app_key = get_option(self::GEETEST_OPTIONS)[self::GEETEST_APP_ID];
                $lang = get_option(self::GEETEST_OPTIONS)[self::GEETEST_LANG];
                echo geetest_show_captcha($app_key, $lang);
            } else {
                echo geetest_show_captcha_v3();
            }
        }
    }

    /**
     * 找回密码增加验证码字段
     */
    public function geetest_captcha_lostpassword_form()
    {
        $CodeVerifyOptions = get_option(self::GEETEST_OPTIONS);
        $VersionOption = $CodeVerifyOptions[self::GEETEST_VERSION];
        $LostpasswordNeedCode = $CodeVerifyOptions[self::GEETEST_SHOW_IN_LOSTPASSWORD];
        if ($LostpasswordNeedCode == '1') {
            if ($VersionOption == 'v4') {
                $app_key = get_option(self::GEETEST_OPTIONS)[self::GEETEST_APP_ID];
                $lang = get_option(self::GEETEST_OPTIONS)[self::GEETEST_LANG];
                echo geetest_show_captcha($app_key, $lang);
            }
        }
    }

    /**
     * 评论表单增加验证码
     * @param $submitButton 评论按钮HTML
     * @return string
     */
    public function geetest_captcha_comment_form($submitButton)
    {
        $user = wp_get_current_user();
        // 管理员后台回复评论时无需验证
        $allowed_roles = array('editor', 'administrator', 'author');
        if (array_intersect($allowed_roles, $user->roles)) {
            return $submitButton;
        }
        $CodeVerifyOptions = get_option(self::GEETEST_OPTIONS);
        $VersionOption = $CodeVerifyOptions[self::GEETEST_VERSION];
        $CommmentsNeedCode = $CodeVerifyOptions[self::GEETEST_SHOW_IN_COMMENTS];
        if ($CommmentsNeedCode == '1') {
            if ($VersionOption == 'v4') {
                $app_key = get_option(self::GEETEST_OPTIONS)[self::GEETEST_APP_ID];
                $lang = get_option(self::GEETEST_OPTIONS)[self::GEETEST_LANG];
                $submitButton = geetest_show_captcha($app_key, $lang, $submitButton);
                return $submitButton;
            } else {
                echo geetest_show_captcha_v3($submitButton);
            }
        } else {
            return $submitButton;
        }
    }

    public function remove_filter_wp_authenticate_user($credentials)
    {
        remove_filter('wp_authenticate_user', [ $this, 'verify' ]);

        return $credentials;
    }

    /**
     * 登录时验证
     * @param $users 用户
     * @return WP_Error 验证错误
     */

    public function verify($user, $password)
    {
        $CodeVerifyOptions = get_option(self::GEETEST_OPTIONS);
        $VersionOption = $CodeVerifyOptions[self::GEETEST_VERSION];
        $show_in_login = get_option(self::GEETEST_OPTIONS)[self::GEETEST_SHOW_IN_LOGIN];
        $public_key = get_option(self::GEETEST_OPTIONS)[self::GEETEST_APP_ID];
        $private_key = get_option(self::GEETEST_OPTIONS)[self::GEETEST_APP_KEY];
        if ($show_in_login == 1 && (strlen($public_key) == 32 && strlen($private_key) == 32)) {
            if ($VersionOption == 'v4') {
                $error_message = geetest_get_verify_message(
                    'lot_number',
                    'captcha_output',
                    'pass_token',
                    'gen_time'
                );
            } else {
                $error_message = validate_geetest_v3(
                    'geetest_challenge',
                    'geetest_validate',
                    'geetest_seccode'
                );
            }
            if (null !== $error_message) {
                return new WP_Error('broke', __("The Captcha is invalid."));
            }
        }
        return $user;
    }


    /**
     * 注册时验证码验证
     * @return mixed
     */
    public function geetest_captcha_register_verify($users)
    {
        $CodeVerifyOptions = get_option(self::GEETEST_OPTIONS);
        $VersionOption = $CodeVerifyOptions[self::GEETEST_VERSION];
        $show_in_registration = get_option(self::GEETEST_OPTIONS)[self::GEETEST_SHOW_IN_REGISTER];
        if ($show_in_registration == '1') {
            if ($VersionOption == 'v4') {
                $error_message = geetest_get_verify_message(
                    'lot_number',
                    'captcha_output',
                    'pass_token',
                    'gen_time'
                );
            } else {
                $error_message = validate_geetest_v3(
                    'geetest_challenge',
                    'geetest_validate',
                    'geetest_seccode'
                );
            }

            if (null !== $error_message) {
                return new WP_Error('broke', __("The Captcha is invalid."));
            }
        }
        return $users;
    }

    /**
     * 忘记密码时验证码验证
     *
     */
    public function geetest_captcha_lostpassword_verify($error)
    {
        if (!empty($_POST)) {
            $CodeVerifyOptions = get_option(self::GEETEST_OPTIONS);
            $VersionOption = $CodeVerifyOptions[self::GEETEST_VERSION];
            $lostpasswordNeedCode = get_option(self::GEETEST_OPTIONS)[self::GEETEST_SHOW_IN_LOSTPASSWORD];
            if ($lostpasswordNeedCode == '1') {
                if ($VersionOption == 'v4') {
                    $error_message = geetest_get_verify_message(
                        'lot_number',
                        'captcha_output',
                        'pass_token',
                        'gen_time'
                    );
                }
                if (null !== $error_message) {
                    $error->add('The Captcha is invalid.', $error_message);
                }
                return $error;
            }
        }
    }


    /**
     * 评论时验证码验证
     * @param $comment 评论信息
     * @return mixed
     */
    public function geetest_captcha_comment_verify($comment)
    {
        $user = wp_get_current_user();
        // 管理员后台回复评论时无需验证
        $allowed_roles = array('editor', 'administrator', 'author');
        if (array_intersect($allowed_roles, $user->roles)) {
            return $comment;
        }
        $CodeVerifyOptions = get_option(self::GEETEST_OPTIONS);
        $VersionOption = $CodeVerifyOptions[self::GEETEST_VERSION];
        $CommentsNeedCode = get_option(self::GEETEST_OPTIONS)[self::GEETEST_SHOW_IN_COMMENTS];
        if ($CommentsNeedCode == '1') {
            if ($VersionOption == 'v4') {
                $error_message = geetest_get_verify_message(
                    'lot_number',
                    'captcha_output',
                    'pass_token',
                    'gen_time'
                );
            } else {
                $error_message = validate_geetest_v3(
                    'geetest_challenge',
                    'geetest_validate',
                    'geetest_seccode'
                );
            }
            if (null !== $error_message) {
                wp_die(
                    '<p>The Captcha is invalid.</p>',
                    __('Comment Submission Failure'),
                    array(
                        'back_link' => true,
                    )
                );
            }
        }
        return $comment;
    }


    /**
     * 设置页面数据格式化的处理
     */
    public function register_settings_group()
    {
        register_setting("geetest_options_group", 'geetest_options', array($this, 'validate_options'));
    }

    public function validate_options($input)
    {
        $validated['public_key'] = trim($input['public_key']);
        $validated['private_key'] = trim($input['private_key']);
        $validated['lang_options'] = trim($input['lang_options']);
        $validated['version_options'] = trim($input['version_options']);
        $validated['show_in_comments'] = ($input['show_in_comments'] == "1" ? "1" : "0");
        $validated['show_in_login'] = ($input['show_in_login'] == "1" ? "1" : "0");
        $validated['show_in_registration'] = ($input['show_in_registration'] == "1" ? "1" : "0");
        $validated['show_in_lostpassword'] = ($input['show_in_lostpassword'] == "1" ? "1" : "0");
        $validated['show_in_wclogin'] = ($input['show_in_wclogin'] == "1" ? "1" : "0");
        $validated['show_in_wcregister'] = ($input['show_in_wcregister'] == "1" ? "1" : "0");
        $validated['show_in_wclostpassword'] = ($input['show_in_wclostpassword'] == "1" ? "1" : "0");
        $validated['show_in_wccheckout'] = ($input['show_in_wccheckout'] == "1" ? "1" : "0");
        $validated['show_in_gform'] = ($input['show_in_gform'] == "1" ? "1" : "0");
        $validated['show_in_cf7'] = ($input['show_in_cf7'] == "1" ? "1" : "0");
        $validated['show_in_bbp_new'] = ($input['show_in_bbp_new'] == "1" ? "1" : "0");
        $validated['show_in_bbp_reply'] = ($input['show_in_bbp_reply'] == "1" ? "1" : "0");
        $validated['show_in_wpforms'] = ($input['show_in_wpforms'] == "1" ? "1" : "0");

        if ($validated['show_in_wclostpassword'] == '1' || $validated['show_in_lostpassword'] == '1') {
            $validated['show_in_wclostpassword'] = '1';
            $validated['show_in_lostpassword'] = '1';
        }
        file_put_contents(GEETEST_CAPTCHA_DIR .'/config.php', "<?php \$config_options = " .var_export($validated, true)
            . "?>");
        return $validated;
    }

    public function geetest_captcha_plugin_setting_page()
    {
        add_options_page('GeeTest', 'GeeTest', 'manage_options', __FILE__, array($this, 'show_settings_page'));
    }
    public function show_settings_page()
    {
        include(GEETEST_CAPTCHA_COMMON_DIR . "settings.php");
    }


    /**
     * 插件设置按钮
     */
    public function geetest_captcha_setting_button($links, $file)
    {
        if ($file == plugin_basename(GEETEST_CAPTCHA_DIR . '/geetest.php')) {
//            $links[] = '<a href="options-general.php?page=geetest/GeetestActions.php">Setting</a>';
            $settings_title = __('Settings for this Plugin', 'geetest');
            $settings = __('Settings', 'geetest');
            $settings_link = '<a href="options-general.php?page=geetest/GeetestActions.php" title="' . $settings_title . '">' . $settings . '</a>';
            array_unshift($links, $settings_link);
        }

        return $links;
    }

    public function geetest_captcha_load_js()
    {
        $CodeVerifyOptions = get_option(self::GEETEST_OPTIONS);
        $VersionOption = $CodeVerifyOptions[self::GEETEST_VERSION];
        if ($VersionOption == 'v4') {
            wp_register_script('Gt4', 'https://static.geetest.com/v4/gt4.js', array('jquery'), '2.1', false);
            wp_enqueue_script('Gt4');
        } else {
            wp_register_script('Gt3', 'https://static.geetest.com/static/tools/gt.js', array('jquery'), '2.1', false);
            wp_enqueue_script('Gt3');
        }

//        wp_register_script('g4init', GEETEST_JS_DIR . 'init.js', array('jquery'), '2.1', false);
//        wp_enqueue_script('g4init');
    }
}
