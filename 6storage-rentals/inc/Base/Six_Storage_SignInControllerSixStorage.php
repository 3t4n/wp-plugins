<?php

namespace SixStorageOnline\Base;

class Six_Storage_SignInControllerSixStorage extends Six_Storage_BaseController
{

     public function Six_Storage_SignInController_register()
     {
          add_action('wp_ajax_six_storage_user_sign_in', [$this, 'six_storage_signIn']);
          add_action('wp_ajax_nopriv_six_storage_user_sign_in', [$this, 'six_storage_signIn']);

          add_action('wp_ajax_six_storage_submit_password_confirmation_code', [$this, 'six_storage_submitPasswordConfirmCode']);
          add_action('wp_ajax_nopriv_six_storage_submit_password_confirmation_code', [$this, 'six_storage_submitPasswordConfirmCode']);

          add_shortcode('six_storage_online_sign_in', [$this, 'six_storage_signInForm']);
     }

     public function six_storage_signIn()
     {
          global $wpdb;
          $table_prefix = $wpdb->prefix;
          session_start();
          $username = sanitize_text_field($_POST['username']);
          $password = sanitize_text_field($_POST['password']);
          $userLocationInformation = sanitize_text_field($_POST['log']);

          if ($userLocationInformation != "" || $userLocationInformation != null || !empty( $userLocationInformation)){
               $userLocationInformation = str_replace('\\', '', $userLocationInformation);
               $getdyip=$this->six_storage_getIpAddress();  /* Code to get dynamic IP */
               $userLocationInformation = json_decode($userLocationInformation);
               $userLocationInformation->ipAddress = $getdyip;
               $userLocationInformation = json_encode($userLocationInformation);
          }
          $isAjax = true;

          $url = $this->six_storage_api_url . 'user/login';

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'userName' => $username,
                    'password' => $password,
                    'logger' => json_decode($userLocationInformation)
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
               $beforereturnMsgNameTrans = $response['returnMessage'];
               $translatedreturnMsgName = esc_html__(trim($beforereturnMsgNameTrans),'6storage-rentals');
               $response['returnMessage'] = $translatedreturnMsgName;
               $_SESSION[$table_prefix . "six_storage_sessionObject"] = $response;
               if (isset($response) && array_key_exists('isSuccess', $response) && $response['isSuccess']) {

                    if (array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' && $response['returnMessage'] == "SUCCESS") {
                         $_SESSION[$table_prefix .'userid'] = $response['result']['userId'];
                    }

                    if (array_key_exists('result', $response)) {
                         $this->signIn = $response['result'];
                    } else {
                         $message = array_key_exists('returnMessage', $response) && $response['returnMessage'] != '' ? $response['returnMessage'] : 'Error code: #2 - Storage type retrival failed. Please contact support team.';
                    }

                    if (isset($isAjax) && $isAjax == true) {
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

                    if (isset($isAjax) && $isAjax == true) {
                         wp_send_json(json_encode($error));
                         wp_die();
                    }
               }
          }
     }

     public function six_storage_submitPasswordConfirmCode()
     {
          $isAjax = true;
          
          $url = $this->six_storage_api_url . '/user/confirm/password/';

          $newPassword = sanitize_text_field($_POST['newPassword']);
          $userName = sanitize_text_field($_POST['userName']);
          $confirmationcode = sanitize_text_field($_POST['confirmationCode']);

          $response = wp_remote_post(esc_url_raw($url), array(
               'method'    => 'POST',
               'timeout'   => 45,
               'headers'   => $this->six_storage_http_header,
               'body'      => json_encode([
                    'newPassword' => $newPassword,
                    'confirmationCode' => $confirmationcode,
                    'userName' => $userName,
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

     public function six_storage_signInForm()
     {
          ob_start();

          $currentHour = date('h:i');

          // enqueue all our style
          wp_enqueue_style('cc-move-in-style', $this->six_storage_plugin_url . 'assets/css/cc-move-in-style.css' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_style('materialize', $this->six_storage_plugin_url . 'assets/css/materialize/materialize.css' ,array(), $this->six_storage_plugin_version);
          wp_enqueue_style('icon', $this->six_storage_plugin_url . 'assets/fonts/icon.css');

          require_once $this->six_storage_plugin_path . 'template/portal/sign-in.php';

          // enqueue all our scripts
          wp_enqueue_script('six-storage-sign-in.min',  $this->six_storage_plugin_url . 'assets/js/six-storage-sign-in.min.js' ,array(), $this->six_storage_plugin_version);

          //localize plugin vars
          wp_localize_script('six-storage-sign-in.min', 'wordpress_vars', $this->six_storage_getPluginvars());

          return ob_get_clean();
     }
}
