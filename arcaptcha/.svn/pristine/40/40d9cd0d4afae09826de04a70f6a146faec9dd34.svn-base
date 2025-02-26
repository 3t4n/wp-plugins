<?php

/**
 * Login form file.
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
 * Login form.
 */
function arcap_wp_login_form()
{
    $arcaptcha_size = get_option('arcaptcha_size');
    if ($arcaptcha_size === 'invisible') {
        arcaptcha_invisible_srcipt();
    } else {
        arcap_form_display();
    }
    wp_nonce_field('arcaptcha_login', 'arcaptcha_login_nonce');
}

add_filter('login_form', 'arcap_wp_login_form');

/**
 * Verify login captcha.
 *
 * @param WP_User|WP_Error $user     WP_User or WP_Error object if a previous
 *                                   callback failed authentication.
 * @param string           $password Password to check against the user.
 *
 * @return WP_User|WP_Error
 */
function arcap_verify_login_captcha($user, $password)
{
    // echo $GLOBALS['arcaptcha_is_verified_in_login'];
    // If already processed, return user object
    if (isset($GLOBALS['arcaptcha_is_verified_in_login']) && $GLOBALS['arcaptcha_is_verified_in_login'] == true) {
        return $user;
    }

    if (isset($_POST['woocommerce-login-nonce']) || isset($_POST['dig_nounce'])) {
        return $user;
    }

    $error_message = arcaptcha_get_verify_message_html(
        'arcaptcha_login_nonce',
        'arcaptcha_login'
    );

    if (null === $error_message) {
        $GLOBALS['arcaptcha_is_verified_in_login'] = true;

        return $user;
    }

    return new WP_Error(__('Invalid Captcha', 'arcaptcha-plugin'), $error_message);
}

add_filter('wp_authenticate_user', 'arcap_verify_login_captcha', 10, 2);
// add_filter('authenticate', 'arcap_verify_login_captcha', 30, 3);
