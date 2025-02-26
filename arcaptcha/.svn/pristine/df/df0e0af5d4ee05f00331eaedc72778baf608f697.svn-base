<?php
/**
 * Comment form file.
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
 * Comment form.
 */
function arcap_wp_comment_form()
{
    $arcaptcha_size = get_option('arcaptcha_size');
    if ($arcaptcha_size === 'invisible') {
        arcaptcha_invisible_srcipt();
    } else {
        arcap_form_display();
    }
    wp_nonce_field('arcaptcha_comment_form', 'arcaptcha_comment_form_nonce');
}

add_action('comment_form_after_fields', 'arcap_wp_comment_form');

/**
 * Login comment form.
 *
 * @param string $field Field.
 *
 * @return string
 */
function arcap_wp_login_comment_form($field)
{
    if (is_user_logged_in()) {
        $output = $field;

        $output .= arcap_form();
        $output .= wp_nonce_field(
            'arcaptcha_comment_form',
            'arcaptcha_comment_form_nonce',
            true,
            false
        );

        return $output;
    }

    return $field;
}

add_filter('comment_form_field_comment', 'arcap_wp_login_comment_form', 10, 1);

/**
 * Verify comment.
 *
 * @param array $commentdata Comment data.
 *
 * @return mixed
 */
function arcap_verify_comment_captcha($commentdata)
{
    $error_message = arcaptcha_get_verify_message_html(
        'arcaptcha_comment_form_nonce',
        'arcaptcha_comment_form'
    );

    if (null === $error_message) {
        return $commentdata;
    }

    if (is_admin()) {
        return $commentdata;
    }

    wp_die(wp_kses_post($error_message), 'arcaptcha', array('back_link' => true));
}

add_filter('preprocess_comment', 'arcap_verify_comment_captcha');
