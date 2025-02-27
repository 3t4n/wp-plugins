<?php
/*
Plugin Name: Disable RSS Feeds and Comments
Description: Disables all RSS and Atom feeds and comments on pages or posts in WordPress.
Version: 1.5.1
Author: Haseeb Asghar
Author URI: https://heyhaseeb.com/
*/

/**
 * Disable RSS feeds functionality.
 */
function disable_feed() {
    if (get_option('disable_rss_feeds')) {
        wp_die(
            esc_html__('No feed available, please visit the', 'disable-rss-comments') .
            ' <a href="' . esc_url(home_url('/')) . '">' .
            esc_html__('homepage', 'disable-rss-comments') . '</a>!'
        );
    }
}

/**
 * Disable comments based on settings.
 */
function disable_comments($open, $post_id) {
    $disable_comments_on_pages = get_option('disable_comments_on_pages');
    $disable_comments_on_posts = get_option('disable_comments_on_posts');
    $post = get_post($post_id);

    if (($disable_comments_on_pages && $post->post_type === 'page') || ($disable_comments_on_posts && $post->post_type === 'post')) {
        $open = false;
    }

    return $open;
}

/**
 * Add admin menu for plugin settings.
 */
function disable_rss_feeds_and_comments_admin_menu() {
    add_options_page(
        esc_html__('Disable RSS Feeds and Comments', 'disable-rss-comments'),
        esc_html__('Disable RSS & Comments', 'disable-rss-comments'),
        'manage_options',
        'disable-rss-feeds-and-comments',
        'disable_rss_feeds_and_comments_admin_options'
    );
}

/**
 * Admin options page output.
 */
function disable_rss_feeds_and_comments_admin_options() {
    if (!current_user_can('manage_options')) {
        wp_die(esc_html__('You do not have sufficient permissions to access this page.', 'disable-rss-comments'));
    }

    echo '<div class="wrap">';
    echo '<h1>' . esc_html__('Disable RSS Feeds and Comments', 'disable-rss-comments') . '</h1>';
    echo '<form method="post" action="options.php">';
    settings_fields('disable_rss_feeds_and_comments_options');
    do_settings_sections('disable-rss-feeds-and-comments');
    submit_button();
    echo '</form>';
    echo '</div>';
}

/**
 * Initialize plugin settings.
 */
function disable_rss_feeds_and_comments_settings_init() {
    register_setting('disable_rss_feeds_and_comments_options', 'disable_rss_feeds', 'sanitize_text_field');
    register_setting('disable_rss_feeds_and_comments_options', 'disable_comments_on_pages', 'sanitize_text_field');
    register_setting('disable_rss_feeds_and_comments_options', 'disable_comments_on_posts', 'sanitize_text_field');

    add_settings_section(
        'disable_rss_feeds_and_comments_section',
        esc_html__('Settings', 'disable-rss-comments'),
        '__return_null',
        'disable-rss-feeds-and-comments'
    );

    add_settings_field(
        'disable_rss_feeds',
        esc_html__('Disable RSS Feeds', 'disable-rss-comments'),
        'disable_rss_feeds_cb',
        'disable-rss-feeds-and-comments',
        'disable_rss_feeds_and_comments_section'
    );

    add_settings_field(
        'disable_comments_on_pages',
        esc_html__('Disable Comments on Pages', 'disable-rss-comments'),
        'disable_comments_on_pages_cb',
        'disable-rss-feeds-and-comments',
        'disable_rss_feeds_and_comments_section'
    );

    add_settings_field(
        'disable_comments_on_posts',
        esc_html__('Disable Comments on Posts', 'disable-rss-comments'),
        'disable_comments_on_posts_cb',
        'disable-rss-feeds-and-comments',
        'disable_rss_feeds_and_comments_section'
    );
}

/**
 * Callback for RSS feeds checkbox.
 */
function disable_rss_feeds_cb() {
    $disable_rss_feeds = get_option('disable_rss_feeds');
    echo '<input name="disable_rss_feeds" id="disable_rss_feeds" type="checkbox" value="1" ' . checked(1, $disable_rss_feeds, false) . ' />';
}

/**
 * Callback for disabling comments on pages checkbox.
 */
function disable_comments_on_pages_cb() {
    $disable_comments_on_pages = get_option('disable_comments_on_pages');
    echo '<input name="disable_comments_on_pages" id="disable_comments_on_pages" type="checkbox" value="1" ' . checked(1, $disable_comments_on_pages, false) . ' />';
}

/**
 * Callback for disabling comments on posts checkbox.
 */
function disable_comments_on_posts_cb() {
    $disable_comments_on_posts = get_option('disable_comments_on_posts');
    echo '<input name="disable_comments_on_posts" id="disable_comments_on_posts" type="checkbox" value="1" ' . checked(1, $disable_comments_on_posts, false) . ' />';
}

/**
 * Set default plugin options on activation.
 */
function disable_rss_feeds_and_comments_activate() {
    add_option('disable_rss_feeds', 0);
    add_option('disable_comments_on_pages', 0);
    add_option('disable_comments_on_posts', 0);
}

register_activation_hook(__FILE__, 'disable_rss_feeds_and_comments_activate');

/**
 * Hooks for disabling feeds and comments.
 */
add_action('do_feed', 'disable_feed', 1);
add_action('do_feed_rdf', 'disable_feed', 1);
add_action('do_feed_rss', 'disable_feed', 1);
add_action('do_feed_rss2', 'disable_feed', 1);
add_action('do_feed_atom', 'disable_feed', 1);
add_action('admin_menu', 'disable_rss_feeds_and_comments_admin_menu');
add_action('admin_init', 'disable_rss_feeds_and_comments_settings_init');
add_filter('comments_open', 'disable_comments', 10, 2);
