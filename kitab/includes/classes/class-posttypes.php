<?php

namespace Kitab;

class CustomPostType
{
    public function __construct()
    {
        // Register custom post type for books
        add_action('init', array($this, 'register_book_post_type'));
    }

    // singleton pattern
    public static function get_instance()
    {
        static $instance = null;
        if (is_null($instance)) {
            $instance = new self();
        }
        return $instance;
    }
    // Register custom post type for books
    public function register_book_post_type()
    {
        // Define labels and arguments for the custom post type
        $labels = array(
            'name' => esc_html__('Books', 'kitab'),
            'singular_name' => esc_html__('Book', 'kitab'),
            // Add more labels as needed
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'show_in_rest' => true,
            'taxonomies' => array('post_tag'),
            // Add more arguments as needed
        );

        // Check if the book post type should be created
        if (get_option('kitab_general_settings')['create_book_post_type']) {
            register_post_type('book', $args);
        }
    }
}



// Initialize the CustomPostType class
// CustomPostType::get_instance();