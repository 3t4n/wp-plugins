<?php
/**
 * Admin settings page file.
 *
 * @package arcaptcha-wp
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    // @codeCoverageIgnoreStart
    exit;
    // @codeCoverageIgnoreEnd
}

/*
 * Admin menu slug.
 */
define('ARCAPTCHA_MENU_SLUG', 'arcaptcha-options');

/**
 * Add admin options page.
 */
function arcaptcha_options_nav()
{
    add_options_page(
        __('ARCaptcha Settings', 'arcaptcha-plugin'),
        __('ARCaptcha', 'arcaptcha-plugin'),
        'manage_options',
        ARCAPTCHA_MENU_SLUG,
        'arcaptcha_options'
    );
}

add_action('admin_menu', 'arcaptcha_options_nav');

/**
 * Settings page.
 */
function arcaptcha_options()
{
    if (!current_user_can('manage_options')) {
        wp_die(
            esc_html__(
                'You do not have sufficient permissions to access this page.',
                'arcaptcha-plugin'
            ),
            'ARCaptcha'
        );
    }

    require_once ARCAPTCHA_PATH . '/backend/settings.php';
}
