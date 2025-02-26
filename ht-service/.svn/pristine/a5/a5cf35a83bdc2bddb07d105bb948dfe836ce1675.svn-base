<?php

namespace Elementor;

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit();

/**
 * Elementor category
 */
function htservice_elementor_init(){
    Plugin::instance()->elements_manager->add_category(
        'htservice',
        [
            'title'  => 'HT Service',
            'icon' => 'font'
        ],
        1
    );
}
add_action('elementor/init','Elementor\htservice_elementor_init');

// Service Category
function htservice_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'htservice_category',
        'hide_empty' => true,
    ));
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->slug ] = $term->name;
        }
        return $options;
    }
}
