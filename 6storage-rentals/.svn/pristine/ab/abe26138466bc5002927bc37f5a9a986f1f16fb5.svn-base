<?php

namespace SixStorageOnline\Base;


class Six_Storage_SignUpControllerSixStorage extends Six_Storage_BaseController {
    
    public function Six_Storage_Signupcontroller_register()
    {        
        add_action('wp_ajax_user_sign_up', [$this, 'six_storage_signUp']);
        add_action('wp_ajax_nopriv_user_sign_up', [$this, 'six_storage_signUp']);

        add_action('wp_ajax_six_storage_submit_confirmation_code',[$this, 'six_storage_submitConfirmationCode']);
        add_action('wp_ajax_nopriv_six_storage_submit_confirmation_code',[$this, 'six_storage_submitConfirmationCode']);

        add_action('wp_ajax_six_storage_resend_confirmation_code',[$this, 'six_storage_resendConfirmationCode']);
        add_action('wp_ajax_nopriv_six_storage_resend_confirmation_code',[$this, 'six_storage_resendConfirmationCode']);

        add_shortcode('six_storage_online_sign_up', [$this, 'six_storage_signUpForm']);

    }

    public function six_storage_signUp()
    {
        $firstName = sanitize_text_field($_POST['firstName']);
        $lastName = sanitize_text_field($_POST['lastName']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $password = sanitize_text_field($_POST['password']);
        $confirmPassword = sanitize_text_field($_POST['confirmPassword']);
        $signupUserName = sanitize_text_field($_POST['signupUserName']);
        $isAjax = true;

        $url = $this->six_storage_api_url . 'user/signup';
        
        $response = wp_remote_post( esc_url_raw($url), array(
            'method'    => 'POST',
            'timeout'   => 45,
            'headers'   => $this->six_storage_http_header,
            'body'      => json_encode([
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'phoneNumber' => $phone,
                'password' => $password,
                'confirmPassword' => $confirmPassword,
                'userName' => $signupUserName
            ])
        ));
        
        if(is_wp_error($response)) {
            $error = [
                'isSuccess' => false,
                'returnMessage' => 'Something went wrong. Please contact support team.',
                'returnCode' => ''
            ];

            if(isset($isAjax) && $isAjax == true) {
                wp_send_json(json_encode($error));
                wp_die();
            }
        } else {
            $response = json_decode($response['body'], true);
            if(isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                if(array_key_exists('result', $response))
                {
                    $this->six_storage_units = $response['result'];
                } else {
                    $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                }

                if(isset($isAjax) && $isAjax == true) {
                    $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                    $message = esc_html__($message,'6storage-rentals');
                    $response['returnMessage'] = $message;
                    wp_send_json(json_encode($response));
                    wp_die();
                }
            } else {
                $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                $error = [
                    'isSuccess' => false,
                    'returnMessage' => $message,
                    'returnCode' => ""
                ];

                if(isset($isAjax) && $isAjax == true) {
                    wp_send_json(json_encode($error));
                    wp_die();
                }
            }
        }
    }

    public function six_storage_submitConfirmationCode()
    {
          
        $isAjax = true;
        
        $url = $this->six_storage_api_url . 'user/confirm/signup/';

        $confirmationusername = sanitize_text_field($_POST['confirmation_username']);
        $confirmationcode = sanitize_text_field($_POST['confirmation_code']);
        $password = sanitize_text_field($_POST['password']);

        $response = wp_remote_post(esc_url_raw($url), array(
            'method'    => 'POST',
            'timeout'   => 45,
            'headers'   => $this->six_storage_http_header,
            'body'      => json_encode([
                'userName' => $confirmationusername,
                'confirmationCode' => $confirmationcode,
                'password' => $password,
            ])
        ));

        if (is_wp_error($response)) {
            $error = [
                'isSuccess' => false,
                'returnMessage' => 'Something went wrong. Please contact support team.',
                'returnCode' => ''
            ];

            if (isset($isAjax) && $isAjax == true) {
                wp_send_json(json_encode($error));
                wp_die();
            }
        } else {
            $response = json_decode($response['body'], true);
            if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                if (isset($isAjax) && $isAjax == true) {
                        $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Vehicle information save failed. Please contact support team.';
                        $response['returnMessage'] = $message;

                        wp_send_json(json_encode($response));
                        wp_die();
                }
            } else {
                $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                $error = [
                        'isSuccess' => false,
                        'returnMessage' => $message,
                        'returnCode' => ""
                ];

                if (isset($isAjax) && $isAjax == true) {
                        wp_send_json(json_encode($error));
                        wp_die();
                }
            }
        }
    }

    public function six_storage_resendConfirmationCode()
    {
        $isAjax = true;
        
        $url = $this->six_storage_api_url . 'user/resend/confirmationcode/';

        $confirmationusername = sanitize_text_field($_POST['confirmation_username']);

        $response = wp_remote_post(esc_url_raw($url), array(
            'method'    => 'POST',
            'timeout'   => 45,
            'headers'   => $this->six_storage_http_header,
            'body'      => json_encode([
                'userName' => $confirmationusername,
            ])
        ));

        if (is_wp_error($response)) {
            $error = [
                'isSuccess' => false,
                'returnMessage' => 'Something went wrong. Please contact support team.',
                'returnCode' => ''
            ];

            if (isset($isAjax) && $isAjax == true) {
                wp_send_json(json_encode($error));
                wp_die();
            }
        } else {
            $response = json_decode($response['body'], true);
            if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {
                if (isset($isAjax) && $isAjax == true) {
                        $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Vehicle information save failed. Please contact support team.';
                        $response['returnMessage'] = $message;

                        wp_send_json(json_encode($response));
                        wp_die();
                }
            } else {
                $message = isset($response) && array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Something went wrong. Please contact support team.';
                $error = [
                        'isSuccess' => false,
                        'returnMessage' => $message,
                        'returnCode' => ""
                ];

                if (isset($isAjax) && $isAjax == true) {
                        wp_send_json(json_encode($error));
                        wp_die();
                }
            }
        }

    }

    public function six_storage_signUpForm()
    {
        ob_start();

        // enqueue all our style
        wp_enqueue_style('cc-move-in-style', $this->six_storage_plugin_url . 'assets/css/cc-move-in-style.css' ,array(), $this->six_storage_plugin_version);
        wp_enqueue_style('materialize', $this->six_storage_plugin_url . 'assets/css/materialize/materialize.css' ,array(), $this->six_storage_plugin_version);
        wp_enqueue_style('icon', $this->six_storage_plugin_url . 'assets/fonts/icon.css');
        
        require_once $this->six_storage_plugin_path . 'template/portal/sign-up.php';

        // enqueue all our scripts
        wp_enqueue_script('six-storage-sign-up.min',  $this->six_storage_plugin_url . 'assets/js/six-storage-sign-up.min.js' ,array(), $this->six_storage_plugin_version);

        //localize plugin vars
        wp_localize_script('six-storage-sign-up.min', 'wordpress_vars', $this->six_storage_getPluginvars());
        
        wp_enqueue_script('utils',  $this->six_storage_plugin_url . 'assets/js/utils.js' ,array(), $this->six_storage_plugin_version);

        return ob_get_clean();
    }
}