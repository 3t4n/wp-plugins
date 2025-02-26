<?php
/**
 * Plugin Name: ITG Admin Hover Menus
 * Description: Shows on hover sub menus of recent posts, pages and custom post types.
 * Author: IT goldman
 * Author URI: https://itgoldman.com/
 * Version: 1.2.1
 */

add_action('admin_menu', 'itg_register_my_custom_submenu_pages');

function itg_register_my_custom_submenu_pages()
{

    $max_items = 10;

    /* pages as submenu */
    $args = array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'sort_column' => 'menu_order',
        'sort_order' => 'asc',
    );
    $arr = get_pages($args);
    $i = 0;
    foreach ($arr as $item) {
        $i++;
        if ($i > $max_items) {
            break;
        }
        add_submenu_page(
            'edit.php?post_type=page',
            $item->post_name,
            '• ' . $item->post_title,
            'read',
            'post.php?post=' . $item->ID . '&action=edit',
            ''
        );
    }

    /* posts as submenu */
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'post_date',
        'sort_column' => 'post_date',
        'sort_order' => 'asc',
        'posts_per_page' => $max_items,
    );
    $arr = get_posts($args);
    $i = 0;
    foreach ($arr as $item) {
        $i++;
        if ($i > $max_items) {
            break;
        }
        add_submenu_page(
            'edit.php',
            $item->post_name,
            '• ' . $item->post_title,
            'read',
            'post.php?post=' . $item->ID . '&action=edit',
            ''
        );
    }

    /* custom types  */
    $args = array(
        'public' => true,
        '_builtin' => false,
    );
    $arr_types = get_post_types($args);
    $arr_types['post'] = 'post';

    foreach ($arr_types as $post_type) {

        $args = array(
            'post_type' => $post_type,
            'post_status' => 'publish',
            'orderby' => 'post_date',
            'sort_column' => 'post_date',
            'sort_order' => 'asc',
            'posts_per_page' => $max_items,

        );
        $arr = get_posts($args);
        $i = 0;
        foreach ($arr as $item) {
            $i++;
            if ($i > $max_items) {
                break;
            }
            add_submenu_page(
                'edit.php?post_type=' . $post_type,
                $item->post_name,
                '• ' . $item->post_title,
                'read',
                'post.php?post=' . $item->ID . '&action=edit',
                ''
            );
        }
    }

}
