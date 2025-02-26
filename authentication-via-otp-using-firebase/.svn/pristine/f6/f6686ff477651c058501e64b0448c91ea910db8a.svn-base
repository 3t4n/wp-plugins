<?php

# make all admin form submit
$post = $_POST;
if (!empty($post)) {

    # admin firebase config form
    if ($post['formtype'] == 'fa_firebase_config') {
        $config = array();
        $config = array(
            'apiKey' => sanitize_text_field(isset($post['apiKey']) ? $post['apiKey'] : ''),
            'authDomain' => sanitize_text_field(isset($post['authDomain']) ? $post['authDomain'] : ''),
            'databaseURL' => sanitize_text_field(isset($post['databaseURL']) ? $post['databaseURL'] : ''),
            'projectId' => sanitize_text_field(isset($post['projectId']) ? $post['projectId'] : ''),
            'storageBucket' => sanitize_text_field(isset($post['storageBucket']) ? $post['storageBucket'] : ''),
            'messagingSenderId' => sanitize_text_field(isset($post['messagingSenderId']) ? $post['messagingSenderId'] : ''),
            'appId' => sanitize_text_field(isset($post['appId']) ? $post['appId'] : ''),
            'measurementId' => sanitize_text_field(isset($post['measurementId']) ? $post['measurementId'] : ''),
        );
        update_option('fa_firebase_config', $config);
    }

    # admin settings config form
    if ($post['formtype'] == 'fa_settings_config') {
        $config = array();
        $config = array(
            'email_required' => sanitize_text_field(isset($post['email_required']) ? $post['email_required'] : ''),
            'woo_account' => sanitize_text_field(isset($post['woo_account']) ? $post['woo_account'] : ''),
            'redirect_page' => sanitize_text_field(isset($post['redirect_page']) ? $post['redirect_page'] : ''),
            'login_btn_text' => sanitize_text_field(isset($post['login_btn_text']) ? $post['login_btn_text'] : ''),
            'otp_btn_text' => sanitize_text_field(isset($post['otp_btn_text']) ? $post['otp_btn_text'] : ''),
            'verify_btn_text' => sanitize_text_field(isset($post['verify_btn_text']) ? $post['verify_btn_text'] : ''),
            'resend_btn_text' => sanitize_text_field(isset($post['resend_btn_text']) ? $post['resend_btn_text'] : ''),
            'change_btn_text' => sanitize_text_field(isset($post['change_btn_text']) ? $post['change_btn_text'] : ''),
            'fa_ph_error' => sanitize_text_field(isset($post['fa_ph_error']) ? $post['fa_ph_error'] : ''),
            'fa_email_error' => sanitize_text_field(isset($post['fa_email_error']) ? $post['fa_email_error'] : ''),
            'fa_otp_sent' => sanitize_text_field(isset($post['fa_otp_sent']) ? $post['fa_otp_sent'] : ''),
            'fa_otp_fail' => sanitize_text_field(isset($post['fa_otp_fail']) ? $post['fa_otp_fail'] : ''),
            'fa_otp_verified' => sanitize_text_field(isset($post['fa_otp_verified']) ? $post['fa_otp_verified'] : ''),
            'step1_title_text' => sanitize_text_field(isset($post['step1_title_text']) ? $post['step1_title_text'] : ''),
            'step2_title_text' => sanitize_text_field(isset($post['step2_title_text']) ? $post['step2_title_text'] : ''),
        );
        update_option('fa_settings_config', $config);
    }

    # admin style config form
    if ($post['formtype'] == 'fa_style_config') {
        $config = array();
        $config = array(
            // continew with phone number 
            'fa_button' => sanitize_text_field(isset($post['fa_button']) ? $post['fa_button'] : ''),
            'fa_button_hover' => sanitize_text_field(isset($post['fa_button_hover']) ? $post['fa_button_hover'] : ''),
            'fa_button_text' => sanitize_text_field(isset($post['fa_button_text']) ? $post['fa_button_text'] : ''),
            'fa_button_text_hover' => sanitize_text_field(isset($post['fa_button_text_hover']) ? $post['fa_button_text_hover'] : ''),
            'fa_button_border' => sanitize_text_field(isset($post['fa_button_border']) ? $post['fa_button_border'] : ''),
            'fa_button_border_hover' => sanitize_text_field(isset($post['fa_button_border_hover']) ? $post['fa_button_border_hover'] : ''),
            'fa_button_shadow' => sanitize_text_field(isset($post['fa_button_shadow']) ? $post['fa_button_shadow'] : ''),
            'fa_button_shadow_hover' => sanitize_text_field(isset($post['fa_button_shadow_hover']) ? $post['fa_button_shadow_hover'] : ''),
            // model popup design
            'fa_pop_button' => sanitize_text_field(isset($post['fa_pop_button']) ? $post['fa_pop_button'] : ''),
            'fa_pop_button_hover' => sanitize_text_field(isset($post['fa_pop_button_hover']) ? $post['fa_pop_button_hover'] : ''),
            'fa_pop_button_text' => sanitize_text_field(isset($post['fa_pop_button_text']) ? $post['fa_pop_button_text'] : ''),
            'fa_pop_button_text_hover' => sanitize_text_field(isset($post['fa_pop_button_text_hover']) ? $post['fa_pop_button_text_hover'] : ''),
            'fa_pop_button_border' => sanitize_text_field(isset($post['fa_pop_button_border']) ? $post['fa_pop_button_border'] : ''),
            'fa_pop_button_border_hover' => sanitize_text_field(isset($post['fa_pop_button_border_hover']) ? $post['fa_pop_button_border_hover'] : ''),
            'fa_pop_button_shadow' => sanitize_text_field(isset($post['fa_pop_button_shadow']) ? $post['fa_pop_button_shadow'] : ''),
            'fa_pop_button_shadow_hover' => sanitize_text_field(isset($post['fa_pop_button_shadow_hover']) ? $post['fa_pop_button_shadow_hover'] : ''),
            // other model things
            'fa_popup_bg' => sanitize_text_field(isset($post['fa_popup_bg']) ? $post['fa_popup_bg'] : ''),
            'fa_popup_text' => sanitize_text_field(isset($post['fa_popup_text']) ? $post['fa_popup_text'] : ''),
            'fa_popup_error' => sanitize_text_field(isset($post['fa_popup_error']) ? $post['fa_popup_error'] : ''),
            'fa_popup_success' => sanitize_text_field(isset($post['fa_popup_success']) ? $post['fa_popup_success'] : ''),
            'fa_popup_loader' => sanitize_text_field(isset($post['fa_popup_loader']) ? $post['fa_popup_loader'] : ''),
            'fa_popup_loader_border' => sanitize_text_field(isset($post['fa_popup_loader_border']) ? $post['fa_popup_loader_border'] : ''),
        );
        update_option('fa_style_config', $config);
    }

    # admin reset style config form
    if ($post['formtype'] == 'fa_reset_style_config') {
        aafa_register_default_style();
    }
}
