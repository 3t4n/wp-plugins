<?php
/**
 * WC lost password hooks file.
 *
 * @package arcaptcha-wp
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    // @codeCoverageIgnoreStart
    exit;
    // @codeCoverageIgnoreEnd
}

add_action('woocommerce_lostpassword_form', 'arcaptcha_lost_password_display', 10, 0);

if (!has_action('lostpassword_post', 'arcaptcha_lost_password_verify')) {
    add_action('lostpassword_post', 'arcaptcha_lost_password_verify');
}
