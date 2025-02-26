<?php

namespace AdBlockGuard;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Gutenberg_Panel
{
    public static function register_panel()
    {
        //if (Settings_Check::is_posts_guard_enabled()) {
            add_action('enqueue_block_editor_assets', [__CLASS__, 'enqueue_scripts']);
        //}
    }

    public static function enqueue_scripts()
    {
        wp_enqueue_script(
            'ad-block-guard-gutenberg',
            '',
            ['wp-plugins', 'wp-edit-post', 'wp-element', 'wp-components', 'wp-data', 'wp-api'],
            ADBLOCKGUARD_VERSION,
            true
        );
    }
}

Gutenberg_Panel::register_panel();
