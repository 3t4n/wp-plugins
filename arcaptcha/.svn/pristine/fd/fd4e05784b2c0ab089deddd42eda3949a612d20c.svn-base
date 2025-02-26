<?php
/**
 * Register form file.
 *
 * @package arcaptcha-wp
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    // @codeCoverageIgnoreStart
    exit;
    // @codeCoverageIgnoreEnd
}

/**
 * Register form.
 */
function arcap_wp_register_form()
{
    $arcaptcha_size = get_option('arcaptcha_size');
    if ($arcaptcha_size === 'invisible') {
        arcaptcha_invisible_srcipt();
    } else {
        arcap_form_display();
    }
    wp_nonce_field('arcaptcha_registration', 'arcaptcha_registration_nonce');

}

add_filter('register_form', 'arcap_wp_register_form');

/**
 * Verify register captcha.
 *
 * @param WP_Error $errors               A WP_Error object containing any errors encountered during registration.
 * @param string   $sanitized_user_login User's username after it has been sanitized.
 * @param string   $user_email           User's email.
 *
 * @return mixed
 */
function arcap_verify_register_captcha($errors, $sanitized_user_login, $user_email)
{
    $error_message = arcaptcha_get_verify_message_html(
        'arcaptcha_registration_nonce',
        'arcaptcha_registration'
    );

    if (null === $error_message) {
        return $errors;
    }

    $errors->add('invalid_captcha', $error_message);

    return $errors;
}

add_filter('registration_errors', 'arcap_verify_register_captcha', 10, 3);
