<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

delete_option('apg_general');
delete_option('apg_post_wrap');
delete_option('apg_posts_gap');
delete_option('apg_posts_column');
delete_option('apg_post_card');
delete_option('apg_post_image');
delete_option('apg_post_header');
delete_option('apg_post_avatar');
delete_option('apg_post_content');
delete_option('apg_post_cat');
delete_option('apg_post_title');
delete_option('apg_post_excerpt');
delete_option('apg_post_more');
delete_option('apg_post_footer');
delete_option('apg_posts_p_wrap');
delete_option('apg_posts_ppn');
delete_option('apg_posts_p_numbers');
delete_option('apg_posts_p_dots');
delete_option('apg_posts_p_current');