<?php
/**
 * @package askteammate
 * @version 1.7.2
 */
/*
Plugin Name: AskTeamMate ShapeArt
Plugin URI: https://askteammate.com/wordpress/shapeart
Description:  Adds Gutenberg block to display text inside a Shape. Create eye-catching graphics inside Gutenberg block.
Author: Meera Datey
Author URI: https://askteammate.com/
Version: 1.1
*/

if( ! defined('ABSPATH')) {
    exit;
}

function shapeart_category( $categories, $post) {

    return array_merge( $categories,
        array (
            array(
                'slug' => 'ShapeArt',
                'title' => __('ShapeArt', 'ShapeArt')
            )
        )
            );
}

function wpdocs_new_block_category( $categories ) {
    // Plugin’s block category title and slug.
    $block_category = array( 'title' => esc_html__( 'ShapeArt', 'ShapeArt' ), 'slug' => 'ShapeArt' );
    $category_slugs = wp_list_pluck( $categories, 'slug' );
    
    if ( ! in_array( $block_category['slug'], $category_slugs, true ) ) {
        $categories = array_merge(
            $categories,
            array(
                array(
                    'title' => $block_category['title'], // Required
                    'slug'  => $block_category['slug'], // Required
                ),
            )
        );
    }
 
    return $categories;
}

add_filter( 'block_categories', 'wpdocs_new_block_category' );

function shapeart_block_register() {

    wp_register_script(
        'askteammate-shapeart-editor-script', 
        plugins_url('dist/editor.js', __FILE__),
        array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components')
        );

    wp_register_style(
        'askteammate-shapeart-editor-syle', 
        plugins_url('dist/bundle.css', __FILE__),
        array('wp-edit-blocks')
        );

        wp_register_style(
            'askteammate-shapeart-frontend-syle', 
            plugins_url('dist/bundle.css', __FILE__),
            array('wp-edit-blocks')
            );
    //wp_register_style
    register_block_type(
        'askteammate/shapeart', 
        array(
            'editor_script' => 'askteammate-shapeart-editor-script',
            'editor_style' => 'askteammate-shapeart-editor-syle',
            'style' =>  'askteammate-shapeart-frontend-syle',
          

    ));

   
    // register_block_type(
    //     'askteammate/blob', 
    //     array(
    //         'editor_script' => 'askteammate-shapeart-editor-script',
    //         'editor_style' => 'askteammate-shapeart-editor-syle',
    //         'style' =>  'askteammate-shapeart-frontend-syle',
          

    // ));
}
add_action('init', 'shapeart_block_register');
