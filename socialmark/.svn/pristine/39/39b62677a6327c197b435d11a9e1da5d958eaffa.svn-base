<?php
defined('ABSPATH') || exit();
function socialmark_include_script()
{

    if (!did_action('wp_enqueue_media')) {
        wp_enqueue_media();
    }

    wp_enqueue_script('socialmarkscript', SOCIALMARK_ASSETS . '/js/socialmark.js', array('jquery'), null, false);
}

add_action('admin_enqueue_scripts', 'socialmark_include_script');

function socialmark_admin_stylesheet()
{
    wp_enqueue_style('socialmarkstyle', SOCIALMARK_ASSETS . '/css/socialmark.css');
}

add_action('admin_print_styles', 'socialmark_admin_stylesheet');