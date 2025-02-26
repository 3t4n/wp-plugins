<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit();
}

function ecrmt_delete_plugin()
{

    $posts = get_posts(['posts_per_page' => -1, 'post_type' => 'wpcf7_contact_form', 'post_status' => 'any']);

    foreach ($posts as $post) {
        delete_post_meta($post->ID, 'ecrmt_error_message');
    }

}

ecrmt_delete_plugin();
