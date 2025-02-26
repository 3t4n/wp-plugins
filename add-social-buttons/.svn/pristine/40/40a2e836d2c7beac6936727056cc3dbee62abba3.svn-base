<?php

/**
 * Add CSS to Front-End
 */
function addsocialbuttons_frontend_styles()
{
    wp_enqueue_style('addsocialbuttonscss', plugins_url('../assets/css/addsocialbuttons.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'addsocialbuttons_frontend_styles');


/**
 * Add CSS in the Admin
 */
function addsocialbuttons_admin_styles($hook)
{
    global $post;

    if ($hook == 'post-new.php' || $hook == 'post.php') {
        if ($post->post_type === 'addsocialbuttons') {
            wp_enqueue_style('addsocialbuttonscss', plugins_url('../assets/css/admin-addsocialbuttons.css', __FILE__));
        }
    }
}
add_action('admin_enqueue_scripts', 'addsocialbuttons_admin_styles', 10, 1);
