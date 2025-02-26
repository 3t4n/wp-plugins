<?php

/*
 * Taxonomy for the Projects custom post type
 * @package     Cott Tackle
 * Author:      iam00
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */

function cot_tackle_project_category() {

    $role_capability = 'edit_posts';

    $singular = __('Project category', 'cot-tackle');
    $plural = __('Project categories', 'cot-tackle');

    $labels = array(
        'name' => sprintf(_x('%s', 'Taxonomy %s', 'cot-tackle'), $plural, $plural),
        'singular_name' => sprintf(_x('%s', 'Taxonomy %s', 'cot-tackle'), $singular, $singular),
        'search_items' => sprintf(__('Search %s', 'cot-tackle'), $plural),
        'popular_items' => sprintf(__('Popular %s', 'cot-tackle'), $plural),
        'all_items' => sprintf(__('All %s', 'cot-tackle'), $plural),
        'parent_item' => sprintf(__('Parent %s', 'cot-tackle'), $singular),
        'parent_item_colon' => sprintf(__('Parent %s', 'cot-tackle'), $singular),
        'edit_item' => sprintf(__('Edit %s', 'cot-tackle'), $singular),
        'update_item' => sprintf(__('Update %s', 'cot-tackle'), $singular),
        'add_new_item' => sprintf(__('Add New %s', 'cot-tackle'), $singular),
        'new_item_name' => sprintf(__('New %s Name', 'cot-tackle'), $singular),
        'add_or_remove_items' => sprintf(__('Add or remove %s', 'cot-tackle'), $plural),
        'choose_from_most_used' => sprintf(__('Choose from most used %s', 'cot-tackle'), $plural),
        'menu_name' => ucwords($plural),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => false,
        'hierarchical' => true,
        'show_tagcloud' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'projects-category' ),
        'query_var' => true,
        'capabilities' => array(
            'manage_terms' => $role_capability,
            'edit_terms' => $role_capability,
            'delete_terms' => $role_capability,
            'assign_terms' => $role_capability,
        ),
    );


    register_taxonomy('projects-category', array('projects'), $args);
}

add_action('init', 'cot_tackle_project_category');
