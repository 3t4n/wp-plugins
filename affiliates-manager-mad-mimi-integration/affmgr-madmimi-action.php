<?php

add_action('wpam_front_end_registration_form_submitted', 'wpam_do_madmimi_signup', 10, 2);

function wpam_do_madmimi_signup($model, $request) {

    $first_name = strip_tags($request['_firstName']);
    $last_name = strip_tags($request['_lastName']);
    $email = strip_tags($request['_email']);

    $madmimi_options = get_option('wpap_madmimi_integration_settings');
    $list_name = $madmimi_options['madmimi_listname'];
    $madmimi_username = $madmimi_options['madmimi_username'];
    $madmimi_api_key = $madmimi_options['madmimi_api_key'];

    WPAM_Logger::log_debug("Madmimi integration addon. After registration hook. Debug data: " . $list_name . "|" . $email . "|" . $first_name . "|" . $last_name);

    if (empty($list_name)) {//No listname saved.
        WPAM_Logger::log_debug("Error! list name is empty. Cannot perform signup.");
        return;
    }

    WPAM_Logger::log_debug("Madmimi integration - Doing list signup...");

    include_once('lib/MadMimi.class.php');
    if (!class_exists('WPAM_MadMimi')) {
        wp_affiliate_log_debug("Madmimi integration - could not load the MadMimi API class. This addon will not work!", false);
        return;
    }

    //in this array firstname and lastname are optional
    $userData = array(
        'email' => $email,
        'firstName' => $first_name,
        'lastName' => $last_name,
        'add_list' => $list_name,
    );

    $mailer = new WPAM_MadMimi($madmimi_username, $madmimi_api_key);
    $retval = $mailer->AddUser($userData, true);

    WPAM_Logger::log_debug("Madmimi signup performed.");
}