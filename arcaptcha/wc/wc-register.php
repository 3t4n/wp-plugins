<?php
/**
 * WooCommerce register form file.
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
function arcap_display_wc_register()
{
    $arcaptcha_size = get_option('arcaptcha_size');
    if ($arcaptcha_size === 'invisible') {
        arcaptcha_invisible_srcipt();
    } else {
        arcap_form_display();
    }

    wp_nonce_field('arcaptcha_wc_register', 'arcaptcha_wc_register_nonce');
}

add_action('woocommerce_register_form', 'arcap_display_wc_register', 10, 0);

/**
 * Verify register captcha.
 *
 * @param WP_Error $validation_error Validation Error.
 *
 * @return WP_Error
 */
function arcap_verify_wc_register_captcha($validation_error)
{
    $error_message = arcaptcha_get_verify_message(
        'arcaptcha_wc_register_nonce',
        'arcaptcha_wc_register'
    );

    if (null === $error_message) {
        return $validation_error;
    }

    $validation_error->add('arcaptcha_error', $error_message);

    return $validation_error;
}

add_filter('woocommerce_process_registration_errors', 'arcap_verify_wc_register_captcha');
