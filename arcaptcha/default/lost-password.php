<?php
/**
 * Lost password hooks file.
 *
 * @package arcaptcha-wp
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    // @codeCoverageIgnoreStart
    exit;
    // @codeCoverageIgnoreEnd
}

add_action('lostpassword_form', 'arcaptcha_lost_password_display');
add_action('lostpassword_post', 'arcaptcha_lost_password_verify');
