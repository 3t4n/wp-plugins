<?php
// Exit if accessed directly 
if ( ! defined( 'ABSPATH' ) ) exit; 

// Number of Comments
function flexitype_lite_comments_count()
{
    $comments_number = get_comments_number();
    if ($comments_number == 0) {
        echo esc_html__('Comment', 'flexitype-lite') . ' (0)';
    } elseif ($comments_number == 1) {
        echo esc_html__('Comment', 'flexitype-lite') . ' (1)';
    } else {
        echo esc_html__('Comments', 'flexitype-lite') . ' (' . $comments_number . ')'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
    }
}


// Post Category
function flexitype_lite_categories()
{
    $options = array();
    $post_categories_terms = get_terms(
        array(
            'taxonomy' => 'category',
            'hide_empty' => true,
        )
    );

    if (!empty($post_categories_terms) && !is_wp_error($post_categories_terms)) {
        foreach ($post_categories_terms as $term) {
            $options[$term->slug] = $term->name;
        }
    }

    return $options;
}

// Portfolio Category
function flexitype_lite_portfolio_catego()
{
    $options = array();
    $portfolio_categories_terms = get_terms(
        array(
            'taxonomy' => 'portfolio_category',
            'hide_empty' => true,
        )
    );

    if (!empty($portfolio_categories_terms) && !is_wp_error($portfolio_categories_terms)) {
        foreach ($portfolio_categories_terms as $term) {
            $options[$term->slug] = $term->name;
        }
    }

    return $options;
}

// Display Menu
function flexitype_lite_nav_menu()
{
    $menu_list = get_terms(
        array(
            'taxonomy' => 'nav_menu',
            'hide_empty' => true,
        )
    );
    $options = [];
    if (!empty($menu_list) && !is_wp_error($menu_list)) {
        foreach ($menu_list as $menu) {
            $options[$menu->term_id] = $menu->name;
        }
        return $options;
    }
}


// Display Template Builders 
function flexitype_lite_template()
{

    $template_list = array(
        'post_type' => 'flexitype_builder',
        'posts_per_page' => -1,
    );

    $templates = get_posts($template_list);

    $options = [];

    if (!empty($templates) && !is_wp_error($templates)) {
        foreach ($templates as $template) {
            $options[$template->ID] = $template->post_title;
        }
        return $options;
    }
}
// Helper function to get authors list for select control
 function flexitype_lite_authors() {
    $authors = get_users();
    $options = [];
    foreach ( $authors as $author ) {
        $options[ $author->ID ] = $author->display_name;
    }
    return $options;
}

// get all post type

function flexitype_lite_post_types_list() {
    $post_types = get_post_types( [ 'public' => true ], 'objects' );
    $post_types = array_column( $post_types, 'label', 'name' );

    $ingore = [
        'elementor_library' => '',
        'attachment' => '',
        'flexitype_builder' => '',
        'e-landing-page' => '',
        'flexitype-hf' => '',
    ];

    $post_types = array_diff_key( $post_types, $ingore );

    $post_types = array_merge( $post_types);

    return $post_types;
}