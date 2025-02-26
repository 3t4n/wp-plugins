<?php
/**
 * Plugin Name: Another simple image optimizer
 * Plugin URI: https://codeberg.org/raffaelj/wordpress-another-simple-image-optimizer
 * Description: Automatically optimize uploaded images using the Spatie image-optimizer library and binaries on your host system (jpegoptim, optipng, pngquant, cwebp, gifsicle, svgo, avifenc)
 * Author: Raffael Jesche
 * Author URI: https://www.rlj.me
 * Version: 0.3.0
 * License: MIT
 * License URI: https://codeberg.org/raffaelj/wordpress-another-simple-image-optimizer/src/branch/main/LICENSE
 */

defined('ABSPATH') or die;

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The PHP function `proc_open` is required to open processes. On some web
 * hosts, this function is disabled. In this case, the used symfony/process
 * library throws errors. These errors are catchable and error messages are
 * shown in some places. To create this incompatible state, `proc_open` has to
 * be disabled via `php.ini`, which causes incompatibilities with wp-cli, e. g.
 * when calling `wp db check`. Instead of disabling it via `php.ini`, a
 * constant is used to make UI differences testable.
 */
if (!defined('ASIO_CAN_PROC_OPEN')) {
    define('ASIO_CAN_PROC_OPEN', function_exists('proc_open'));
}

/**
 * Run image optimizer when attachment meta data is generated.
 *
 * Fires on file uploads or when using wp cli `wp media regenerate`
 */
add_filter('wp_generate_attachment_metadata', [
    'AnotherSimpleImageOptimizer',
    'hook_wp_generate_attachment_metadata'
], 10, 2);

/**
 * Helper hook to re-/store original metadata before it is overwritten with
 * `wp media regenerate` on already optimized images
 *
 * Fires multiple times before and after `wp_generate_attachment_metadata` hook
 */
add_filter('wp_update_attachment_metadata', [
    'AnotherSimpleImageOptimizer',
    'hook_wp_update_attachment_metadata'
], 10, 2);

/**
 * Prevent quality loss during resizing of jpeg or webp images with WP default
 * settings for GD or ImageMagick.
 *
 * Not enabled by default to prevent creating very large thumbnails when
 * jpegoptim is not installed.
 *
 * Usage:
 * Add `define('ASIO_RESIZE_QUALITY_JPEG', 100)` to `wp-config.php`
 */
if (defined('ASIO_RESIZE_QUALITY_JPEG') || defined('ASIO_RESIZE_QUALITY_WEBP')) {
    add_filter('wp_editor_set_quality', [
        'AnotherSimpleImageOptimizer',
        'hook_wp_editor_set_quality'
    ], 10, 2);
}

/**
 * Load admin ui logic
 */
add_action('init', function() {
    if (!is_user_logged_in()) return;
    include __DIR__ . '/admin.php';
});
