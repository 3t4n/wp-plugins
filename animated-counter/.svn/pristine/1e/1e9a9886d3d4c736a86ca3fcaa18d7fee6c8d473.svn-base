<?php
/**
 * Plugin Name: Animated Counter
 * Description: Adds an animated counter format in the block editor toolbar to animate numbers on the frontend.
 * Version: 1.0.1
 * Author: Mahbubur Rahman
 * Author URI: https://github.com/mahbubme
 * License: GPL-2.0-or-later
 * Text Domain: animated-counter
 * Domain Path: /languages
 *
 * @package Animated_Counter
 */

defined('ABSPATH') || exit; // Prevent direct access.

define('ANIMATED_COUNTER_BUILD_DIR', trailingslashit(plugin_dir_path(__FILE__)) . 'build/');
define('ANIMATED_COUNTER_BUILD_URL', trailingslashit(plugin_dir_url(__FILE__)) . 'build/');

/**
 * Enqueue block editor assets.
 */
function animated_counter_enqueue_editor_assets(): void {
    $editor_js_path  = ANIMATED_COUNTER_BUILD_DIR . 'animated-counter.asset.php';
    $editor_css_path = ANIMATED_COUNTER_BUILD_DIR . 'editor.asset.php';

    if (file_exists($editor_js_path)) {
        $editor_js_asset = require $editor_js_path;
        wp_enqueue_script(
            'animated-counter-editor',
            ANIMATED_COUNTER_BUILD_URL . 'animated-counter.js',
            $editor_js_asset['dependencies'] ?? [],
            $editor_js_asset['version'] ?? false,
            true
        );
    }

    if (file_exists($editor_css_path)) {
        $editor_css_asset = require $editor_css_path;
        wp_enqueue_style(
            'animated-counter-editor-style',
            ANIMATED_COUNTER_BUILD_URL . 'editor.css',
            $editor_css_asset['dependencies'] ?? [],
            $editor_css_asset['version'] ?? false
        );
    }
}
add_action('enqueue_block_editor_assets', 'animated_counter_enqueue_editor_assets');

/**
 * Enqueue frontend assets.
 */
function animated_counter_enqueue_frontend_assets(): void {
    $frontend_js_path  = ANIMATED_COUNTER_BUILD_DIR . 'frontend.asset.php';
    $frontend_css_path = ANIMATED_COUNTER_BUILD_DIR . 'main.asset.php';

    if (file_exists($frontend_js_path)) {
        $frontend_js_asset = require $frontend_js_path;
        wp_enqueue_script(
            'animated-counter-frontend',
            ANIMATED_COUNTER_BUILD_URL . 'frontend.js',
            $frontend_js_asset['dependencies'] ?? [],
            $frontend_js_asset['version'] ?? false,
            true
        );
    }

    if (file_exists($frontend_css_path)) {
        $frontend_css_asset = require $frontend_css_path;
        wp_enqueue_style(
            'animated-counter-style',
            ANIMATED_COUNTER_BUILD_URL . 'main.css',
            $frontend_css_asset['dependencies'] ?? [],
            $frontend_css_asset['version'] ?? false
        );
    }
}
add_action('wp_enqueue_scripts', 'animated_counter_enqueue_frontend_assets');
