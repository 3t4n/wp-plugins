<?php
/*
Plugin Name: Auto Login User on Register
Description: This plugin will automatically login your new user after the registration process.
Plugin URI: http://pkweb.ru/
Version: 1.0.0
Author: Penzin Konstantin
Email: penzin85@gmail.com
Author URI: http://pkweb.ru/
License: GPL2
Text Domain: auto-login-user-on-register
*/

function _new_user_auto_log_in($user_id){
  if(!is_user_logged_in()){
    $secure_cookie = is_ssl();
    $secure_cookie = apply_filters('secure_signon_cookie', $secure_cookie, array());
    global $auth_secure_cookie;
    $auth_secure_cookie = $secure_cookie;
    
    wp_set_auth_cookie($user_id, true, $secure_cookie);
    $user_info = get_userdata($user_id);
    do_action('wp_login', $user_info->user_login, $user_info);

  }
}

add_action('user_register', '_new_user_auto_log_in');