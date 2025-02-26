<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

add_action('rankology_admin_bar_items', 'rankology_fno_admin_bar_items', 100);
function rankology_fno_admin_bar_items() {
    global $wp_admin_bar;
    $wp_admin_bar->add_menu([
        'parent'	=> 'rankology',
        'id'		   => 'rankology_custom_sub_menu_pro',
        'title'		=> __('General Settings', 'wp-rankology'),
        'href'		 => admin_url('admin.php?page=rankology-fno-page'),
    ]);
    if ('1' == rankology_get_toggle_option('bot')) {
        $wp_admin_bar->add_menu([
            'parent'	=> 'rankology',
            'id'		   => 'rankology_custom_sub_menu_bot',
            'title'		=> __('Audit', 'wp-rankology'),
            'href'		 => admin_url('admin.php?page=rankology-bot-batch'),
        ]);
    }
    if ('1' == rankology_get_toggle_option('rich-snippets')) {
        $wp_admin_bar->add_menu([
            'parent'	=> 'rankology',
            'id'		   => 'rankology_custom_sub_menu_schemas',
            'title'		=> __('Schemas', 'wp-rankology'),
            'href'		 => admin_url('edit.php?post_type=rankology_schemas'),
        ]);
    }
    if ('1' == rankology_get_toggle_option('404')) {
        $wp_admin_bar->add_menu([
            'parent'	=> 'rankology',
            'id'		   => 'rankology_custom_sub_menu_404',
            'title'		=> __('Redirections', 'wp-rankology'),
            'href'		 => admin_url('edit.php?post_type=rankology_404'),
        ]);
    }
    if ('1' == rankology_get_toggle_option('bot')) {
        $wp_admin_bar->add_menu([
            'parent'	=> 'rankology',
            'id'		   => 'rankology_custom_sub_menu_broken_links',
            'title'		=> __('Broken Links', 'wp-rankology'),
            'href'		 => admin_url('edit.php?post_type=rankology_bot'),
        ]);
    }
    $wp_admin_bar->add_menu([
        'parent'	=> 'rankology',
        'id'		   => 'rankology_custom_sub_menu_license',
        'title'		=> __('License', 'wp-rankology'),
        'href'		 => admin_url('admin.php?page=rankology-license'),
    ]);
}
