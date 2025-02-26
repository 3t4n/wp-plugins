<?php
/**
 * WooCommerce login form file.
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
function arcap_display_wc_login()
{
    $arcaptcha_size = get_option('arcaptcha_size');
    if ($arcaptcha_size === 'invisible') {
        arcaptcha_invisible_srcipt();
    } else {
        arcap_form_display();
    }
    wp_nonce_field('arcaptcha_login', 'arcaptcha_login_nonce');

}

add_action('woocommerce_login_form', 'arcap_display_wc_login', 10, 0);

/**
 * Verify login form.
 *
 * @param WP_Error $validation_error Validation error.
 *
 * @return WP_Error
 */
function arcap_verify_wc_login_captcha($validation_error)
{
    remove_filter('wp_authenticate_user', 'arcap_verify_login_captcha');

    $error_message = arcaptcha_get_verify_message(
        'arcaptcha_login_nonce',
        'arcaptcha_login'
    );

    if (null === $error_message) {
        return $validation_error;
    }

    $validation_error->add('arcaptcha_error', $error_message);

    return $validation_error;
}

add_filter('woocommerce_process_login_errors', 'arcap_verify_wc_login_captcha');
