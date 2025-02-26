<?php

if (! function_exists('geetest_get_verify_message')) {
    /**
     * Print error message.
     *
     *
     */
    function geetest_get_verify_message($lot_number, $captcha_output, $pass_token, $gen_time)
    {
        $captcha_id = get_option('geetest_options')['public_key'];
        $private_key = get_option('geetest_options')['private_key'];
        $data['lot_number'] = sanitize_text_field($_POST['lot_number']);
        $data['captcha_output'] = sanitize_text_field($_POST['captcha_output']);
        $data['pass_token'] = sanitize_text_field($_POST['pass_token']);
        $data['gen_time'] = sanitize_text_field($_POST['gen_time']);
        $GtSdk = new GeetestLib($captcha_id, $private_key, $data);
        if (!$GtSdk->get_response()) {
            return  __('<strong>Error</strong>: The Captcha is invalid.', 'geetest');
        }
        return null;
    }
}


if (! function_exists('geetest_show_captcha')) {
    /**
     * show captcha form
     *
     *
     */
    function geetest_show_captcha($app_key, $lang, $submitButton='')
    {
        $randnum = (string)rand(100000, 999999);
        $captcha_element_id = 'embed-captcha-'.$randnum;
        $input_captcha_id = 'captcha_id_'.$randnum;
        $input_language = 'language_'.$randnum;
        $input_lot_number = 'lot_number_'.$randnum;
        $input_captcha_output = 'captcha_output_'.$randnum;
        $input_pass_token = 'pass_token_'.$randnum;
        $input_gen_time = 'gen_time_'.$randnum;

        return '<div id="'.$captcha_element_id.'" style="margin-bottom: 14px;width:300px;height: 50px"></div>
            <input type="hidden" name="captcha_id" id="'.$input_captcha_id.'" value="' . $app_key . '">
            <input type="hidden" name="language" id="'.$input_language.'" value="' . $lang . '">
            <input type="hidden" name="lot_number" id="'.$input_lot_number.'" value="">
            <input type="hidden" name="captcha_output" id="'.$input_captcha_output.'" value="">
            <input type="hidden" name="pass_token" id="'.$input_pass_token.'" value="">
            <input type="hidden" name="gen_time" id="'.$input_gen_time.'" value="">

            ' . $submitButton . '
            <script>
                var captchaId = document.getElementById("'.$input_captcha_id.'").value;
                var language = document.getElementById("'.$input_language.'").value;
                var product = "popup"
                var handlerEmbed = function (captchaObj) {
                captchaObj.appendTo("#'.$captcha_element_id.'")
                    captchaObj.onSuccess(function (e) {
                        var result = captchaObj.getValidate();
                        document.getElementById("'.$input_lot_number.'").value=result[\'lot_number\'];
                        document.getElementById("'.$input_captcha_output.'").value=result[\'captcha_output\'];
                        document.getElementById("'.$input_pass_token.'").value=result[\'pass_token\'];
                        document.getElementById("'.$input_gen_time.'").value=result[\'gen_time\'];
                    })
                };

                initGeetest4({
                captchaId:captchaId,
                    product: product,
                    language: language
                }, handlerEmbed);

            </script>';
    }
}


if (! function_exists('geetest_show_captcha_v3')) {
    /**
     * show captcha form
     *
     *
     */
    function geetest_show_captcha_v3($submitButton='')
    {
        $lang = get_option('geetest_options')['lang_options'];
        if (explode('/', $_SERVER['PHP_SELF'])[1] == 'wp-login.php' || explode('/', $_SERVER['PHP_SELF'])[1] == 'index.php'){
            $url_prefix_ssl = 'http'.'://'.$_SERVER['HTTP_HOST'];
        }else{
            $url_prefix_ssl = 'http'.'://'.$_SERVER['HTTP_HOST'].'/'.explode('/', $_SERVER['PHP_SELF'])[1];
        }

        $randnum = (string)rand(100000, 999999);
        $url = $url_prefix_ssl . '/wp-content/plugins/geetest/StartCaptchaServlet.php?t=' . $randnum;
        return '<div id="embed-captcha" style="margin-bottom: 14px;height: 50px"></div>    ' . $submitButton . '
            <script>
                var handlerEmbed = function (captchaObj) {
                    // 将验证码加到id为captcha的元素里，同时会有三个input的值：geetest_challenge, geetest_validate, geetest_seccode
                    captchaObj.appendTo("#embed-captcha");
                };
                jQuery.ajax({
                    // 获取id，challenge，success（是否启用failback）
                    url: "'. $url .'",
                    type: "get",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        // 使用initGeetest接口
                        // 参数1：配置参数
                        // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
                        initGeetest({
                            gt: data.gt,
                            challenge: data.challenge,
                            new_captcha: data.new_captcha,
                            product: "embed", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                            offline: !data.success, // 表示用户后台检测极验服务器是否宕机，一般不需要关注
                            width: \'100%\',
                            lang: "'. $lang .'"
                        }, handlerEmbed);
                    }
                });
            </script>';
    }
}


if (! function_exists('validate_geetest_v3')) {
    /**
     * 处理登录二次验证
     */
    function validate_geetest_v3($geetest_challenge, $geetest_validate, $geetest_seccode)
    {
        session_start();
        $geetest_challenge = sanitize_text_field($_POST['geetest_challenge']);
        $geetest_validate = sanitize_text_field($_POST['geetest_validate']);
        $geetest_seccode = sanitize_text_field($_POST['geetest_seccode']);
        $captcha_id = get_option('geetest_options')['public_key'];
        $private_key = get_option('geetest_options')['private_key'];

        $Gtv3 = new GeetestV3($captcha_id, $private_key);

        $data = array(
            "user_id" => $_SESSION['user_id'], # 网站用户id
            "client_type" => "web", #web:电脑上的浏览器；h5:手机上的浏览器，包括移动应用内完全内置的web_view；native：通过原生SDK植入APP应用的方式
            "ip_address" => "" # 请在此处传输用户请求验证时所携带的IP
        );

        if ($_SESSION['gtserver'] == 1) {   //服务器正常
            if (!$Gtv3->success_validate($geetest_challenge, $geetest_validate, $geetest_seccode, $data)) {
                return  __('<strong>Error</strong>: The Captcha is invalid.', 'geetest');
            }
            return null;
        }

        if ($_SESSION['gtserver'] == 0) {
            //服务器宕机,走failback模式
            if (!$Gtv3->fail_validate($geetest_challenge, $geetest_validate, $geetest_seccode, $data)) {
                return  __('<strong>Error</strong>: The Captcha is invalid.', 'geetest');
            }
            return null;
        }
    }
}
