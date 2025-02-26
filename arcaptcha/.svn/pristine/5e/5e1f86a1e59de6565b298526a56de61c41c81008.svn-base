<?php
/**
 * Lost password form file.
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
 * Display on lost password form.
 */
function arcaptcha_lost_password_display()
{
    $arcaptcha_size = get_option('arcaptcha_size');
    if ($arcaptcha_size === 'invisible') {
        arcaptcha_invisible_srcipt();
    } else {
        arcap_form_display();
    }
    wp_nonce_field('arcaptcha_lost_password', 'arcaptcha_lost_password_nonce');

}

/**
 * Verify lost password form.
 *
 * @param WP_Error $error Error.
 *
 * @return WP_Error
 */
function arcaptcha_lost_password_verify($error)
{
    $error_message = arcaptcha_get_verify_message_html('arcaptcha_lost_password_nonce', 'arcaptcha_lost_password');

    if (null !== $error_message) {
        $error->add('invalid_captcha', $error_message);
    }

    return $error;
}
