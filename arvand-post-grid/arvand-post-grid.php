<?php
/**
 * Plugin Name: Arvand Post Grid
 * Version: 1.0
 * Plugin URI:
 * Description: Easily create, design and change your posts or blogs.
 * Author: Arvand Wordpress
 * Author URI:
 * Text Domain: arvand-posts
 * Domain Path: /languages/
 * Tested up to: 5.8.1
 * Requires PHP: 7.0
 */

if (!defined('ABSPATH')) {
    die;
}

define('APG_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('APG_INCLUDES_PATH', plugin_dir_path(__FILE__) . '/includes/');
define('APG_ADMIN_PATH', plugin_dir_path(__FILE__) . '/admin/');
define('APG_ADMIN_URL', plugin_dir_url(__FILE__) . '/admin/');
define('APG_PUBLIC_PATH', plugin_dir_path(__FILE__) . '/public/');
define('APG_PUBLIC_URL', plugin_dir_url(__FILE__) . '/public/');

include APG_INCLUDES_PATH . 'admin/menu-page.php';
include APG_INCLUDES_PATH . 'options.php';

function apg_load_text_domain()
{
    load_plugin_textdomain('arvand-posts', false, dirname(plugin_basename(__FILE__)) . '/languages');
}

add_action('plugins_loaded', 'apg_load_text_domain');

function apg_admin_enqueue_scripts($hook)
{
    global $general_page_hook, $options_page_hook, $information_page_hook;

    $allowed = array($general_page_hook, $options_page_hook, $information_page_hook);

    if (in_array($hook, $allowed)) {
        wp_enqueue_style('apg-admin-style', APG_ADMIN_URL . 'css/style.css');
    }
}

add_action('admin_enqueue_scripts', 'apg_admin_enqueue_scripts');

function apg_enqueue_scripts()
{
    wp_enqueue_style('apg-bootstrap-grid', APG_PUBLIC_URL . 'css/bootstrap-grid.min.css');
}

add_action('wp_enqueue_scripts', 'apg_enqueue_scripts');

function apg_add_posts_styles()
{
    include APG_PUBLIC_PATH . 'style.php';
}

add_filter('wp_head', 'apg_add_posts_styles');

function apg_number($number)
{
    $val = 0;

    if (is_numeric($number) and $number > -1) {
        $val = intval($number);
    }

    return $val;
}

function apg_posts_shortcode()
{
    ob_start();

    if (is_home() or is_page()) {
        include(APG_PUBLIC_PATH . 'posts.php');
    } else {
        include(APG_PUBLIC_PATH . 'general-posts.php');
    }

    return ob_get_clean();
}

add_shortcode('apg_posts', 'apg_posts_shortcode');

function apg_excerpt_words_limit($length)
{
    $post_excerpt = apg_excerpt_options();
    return $post_excerpt['words_limit'];
}

add_filter('excerpt_length', 'apg_excerpt_words_limit', 999);

function apg_posts_pagination($current_page, $total_pages, $prev_next = false)
{
    $ppn = apg_pagination_options('ppn');
    $ends_count = 1;
    $middle_count = 1;
    $dots = false;

    if ($prev_next and $current_page and 1 < $current_page) {
        echo '<a class="prev" href="' . esc_attr(add_query_arg('apg_pn', $current_page - 1)) . '">' . $ppn['prev_text'] . '</a>';
    }

    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
            echo '<span class="current page-numbers">' . esc_html( $i ) . '</span>';
            $dots = true;
        } else {
            if ($i <= $ends_count or ($current_page and $i >= $current_page - $middle_count and $i <= $current_page + $middle_count) or $i > $total_pages - $ends_count) {
                echo ' <a class="page-numbers" href="' . esc_attr(add_query_arg(array('apg_pn' => $i))) . '">' . $i . '</a> ';
                $dots = true;
            } elseif ($dots) {
                echo '<span class="dots page-numbers">…</span>';
                $dots = false;
            }
        }
    }

    if ($prev_next and $current_page and ($current_page < $total_pages or -1 == $total_pages)) {
        echo '<a class="next" href="' . esc_attr(add_query_arg('apg_pn', $current_page + 1)) . '">' . esc_html( $ppn['next_text'] ) . '</a>';
    }
}