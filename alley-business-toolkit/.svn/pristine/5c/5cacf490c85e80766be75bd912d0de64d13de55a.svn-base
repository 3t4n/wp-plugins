<?php

/**
 * Add post types
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Alley_Business_Toolkit
 * @subpackage Alley_Business_Toolkit/admin
 */

 
function abt_custom_post_product() {
    register_post_type('abt_promotion',
        array(
            'labels'      => array(
                'name'          => __('Promotions', 'alley-business-toolkit'),
                'singular_name' => __('Promotion', 'alley-business-toolkit'),
            ),
                'public'      => true,
                'show_in_menu' => 'false',
                'rewrite' => array('slug' => 'promotions' ),
                'has_archive'  => true,
                'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt')
        )
    );

    register_post_type('abt_testimonials',
        array(
            'labels'      => array(
                'name'          => __('Testimonials', 'alley-business-toolkit'),
                'singular_name' => __('Testimonial', 'alley-business-toolkit'),
            ),
                'public'      => true, 
                'show_in_menu' => 'false',
                'rewrite' => array('slug' => 'testimonials' ),
                'has_archive'  => true,
                'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt')
        )
    );

    register_post_type('abt_team',
    array(
        'labels'      => array(
            'name'          => __('Our Team', 'alley-business-toolkit'),
            'singular_name' => __('Our Team', 'alley-business-toolkit'),
        ),
            'public'      => true, 
            'show_in_menu' => 'false',
            'rewrite' => array('slug' => 'teams' ),
            'has_archive'  => true,
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt')
    )
);
    
}
add_action( 'init', 'abt_custom_post_product' );

add_action( 'init', 'create_tag_taxonomies', 0 );

//create two taxonomies, genres and tags for the post type "tag"
function create_tag_taxonomies() 
{
  // Add new taxonomy, NOT hierarchical (like tags)ss

  register_taxonomy('service_tag',
  array('abt_testimonials','abt_promotion'),array(
    'hierarchical' => false,
    'labels' => 'ss',
    'show_ui' => true,
    'query_var' => true,
   
  ));
}
?>