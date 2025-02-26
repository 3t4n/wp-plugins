<?php

/** 
 *   manage plugin ajax request
 */

add_action('wp_ajax_wp_ajax_user_login_signup', 'aafa_wp_ajax_user_login_signup');
add_action('wp_ajax_nopriv_wp_ajax_user_login_signup', 'aafa_wp_ajax_user_login_signup');

if (!function_exists('aafa_wp_ajax_user_login_signup')) {
    function aafa_wp_ajax_user_login_signup()
    {

        if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) {
            die('Busted!');
        }

        $last_login = date("M d Y, H:i");
        $created_at = '';


        // senitized user input
        $user_email = '';
        if (!empty($_POST['email'])) {
            $user_email = sanitize_email($_POST['email']);
        }

        // if mobile number is not empty
        $ph_num = '';
        if (!empty($_POST['phone_number'])) {
            // remove html 
            $ph_num = sanitize_text_field($_POST['phone_number']);
        }

        $user_name = str_replace('+', '', $ph_num);


        if ($user_email != '') {
            // if email is not empty the set user name based on email address
            $user_name = preg_replace('/([^@]*).*/', '$1', $user_email);
        }

        $args = array(
            'key' => 'fa_phonelogin',
            'meta_value'   => $ph_num,
        );
        $userdata = get_users($args);
        $user_id = @$userdata[0]->ID;

        if (empty($user_id)) {
            $created_at = $last_login;
            $user_id = wp_insert_user(array(
                'user_login' => $user_name,
                'user_email' => $user_email,
            ));
            update_user_meta($user_id, 'fa_phonelogin',  $ph_num);
            update_user_meta($user_id, 'fa_created_at',  $created_at);
        } else {
            $created_at = get_user_meta($user_id, 'fa_created_at', 1);
        }


        $firebaseUserID = isset($_POST['user_id']) ? $_POST['user_id'] : '';
        if (!empty($firebaseUserID)) {
            $firebaseUserID = sanitize_text_field($firebaseUserID);
            update_user_meta($user_id, 'firebase_id',  $firebaseUserID);
        }


        $redirect_page = get_option('fa_settings_config', true)['redirect_page'];
        if (!empty($redirect_page)) {
            $url = get_permalink($redirect_page);
        } else {
            $url = get_permalink($_POST['current_page']);
        }

        wp_set_current_user($user_id); // set current user
        wp_set_auth_cookie($user_id); // login user

        // may be some case created time blank then it set to last login time
        if ($created_at == '') {
            $created_at = $last_login;
        }

        $res = array(
            'success' => true,
            'url' => "$url",
            "wp_userid" => $user_id,
            "user_name" => "$user_name",
            "user_email" => "$user_email",
            "phone_num" => "$ph_num",
            "created_at" => "$created_at",
            "last_login" => "$last_login"
        );
        echo json_encode($res);
        exit();
    }
}
