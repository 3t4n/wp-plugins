<?php
/**
 * Plugin Name: AIO Codex
 * Plugin URI: https://wordpress.org/plugins/aio-codex/
 * Description: AIO Codex plugin allows users to add content and save it as a shortcode in format [aiocodex id="123"].
 * Version: 1.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author: Finderio
 * Author URI: https://profiles.wordpress.org/wphostingfinder/
 * License: GPL-2.0-or-later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: aio-codex
 *
 * @package AIO Codex
 * @link https://wordpress.org/plugins/aio-codex/
 * @since 1.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Include required files
require_once plugin_dir_path(__FILE__) . 'builder/aiocodex-column.php';
require_once plugin_dir_path(__FILE__) . 'builder/aiocodex-editor.php';

// Register custom post type
function aiocodex_register_post_type() {
    $labels = array(
        'name'                  => _x('Create Code', 'Post Type General Name', 'aio-codex'),
        'singular_name'         => _x('Create Code', 'Post Type Singular Name', 'aio-codex'),
        'menu_name'             => __('Create Code', 'aio-codex'),
        'all_items'             => __('All Codes', 'aio-codex'),
        'add_new'               => __('Add New', 'aio-codex'),
        'add_new_item'          => __('Create Code', 'aio-codex'),
        'edit_item'             => __('Edit Code', 'aio-codex'),
        'view_item'             => __('View Code', 'aio-codex'),
        'search_items'          => __('Search Code', 'aio-codex'),
        'not_found'             => __('Not Found', 'aio-codex'),
        'not_found_in_trash'    => __('Not Found in Trash', 'aio-codex'),
    );

    $args = array(
        'label'                 => 'aiocodex',
        'description'           => 'Create and Generate your Shortcode easily.',
        'labels'                => $labels,
        'supports'              => array('title', 'editor'),
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-media-code',
        'menu_position'         => 20,
        'capability_type'       => 'post',
    );

    register_post_type('aiocodex', $args);
}
add_action('init', 'aiocodex_register_post_type');
