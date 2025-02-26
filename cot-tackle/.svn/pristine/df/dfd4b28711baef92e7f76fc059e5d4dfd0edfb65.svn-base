<?php

/**
 * This file registers the Projects custom post type
 *
 * @package    	Cot Tackle
 * Author:      iam00
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
/**
 * Registers a new post type project
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
if (!function_exists('cot_tackle_projects')) {

    function cot_tackle_projects() {

        $singular = __('Project', 'cot_tackle');
        $plural = __('Projects', 'cot_tackle');
        $slug = apply_filters('cot_tackle_projects_rewrite_slug', 'projects');

        $labels = array(
            'name' => $plural,
            'singular_name' => $singular,
            'menu_name' => sprintf(__('%s', 'cot_tackle'), $plural),
            'all_items' => sprintf(__('All %s', 'cot_tackle'), $plural),
            'add_new' => sprintf(__('Add New %s', 'cot_tackle'), $singular),
            'add_new_item' => sprintf(__('Add %s', 'cot_tackle'), $singular),
            'edit' => __('Edit', 'cot_tackle'),
            'edit_item' => sprintf(__('Edit %s', 'cot_tackle'), $singular),
            'new_item' => sprintf(__('New %s', 'cot_tackle'), $singular),
            'view' => sprintf(__('View %s', 'cot_tackle'), $singular),
            'view_item' => sprintf(__('View %s', 'cot_tackle'), $singular),
            'search_items' => sprintf(__('Search %s', 'cot_tackle'), $plural),
            'not_found' => sprintf(__('No %s found', 'cot_tackle'), $plural),
            'not_found_in_trash' => sprintf(__('No %s found in trash', 'cot_tackle'), $plural),
            'parent' => sprintf(__('Parent %s', 'cot_tackle'), $singular),
            'featured_image' => __('Featured Image', 'cot_tackle'),
            'set_featured_image' => __('Set featured image', 'cot_tackle'),
            'remove_featured_image' => __('Remove featured image', 'cot_tackle'),
            'use_featured_image' => __('Use as featured image', 'cot_tackle')
        );

        $args = array(
            'labels' => $labels,
            'hierarchical' => false,
            'description' => __('A post type for your projects', 'cot_tackle'),
            'taxonomies' => array('project-category'),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 26,
            'menu_icon' => 'dashicons-desktop',
            'show_in_nav_menus' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => array('slug' => $slug),
            'capability_type' => 'page',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
        );

        register_post_type('projects', $args);
    }

    add_action('init', 'cot_tackle_projects');
}