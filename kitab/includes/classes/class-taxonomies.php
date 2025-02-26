<?php

namespace Kitab;


class Taxonomies
{
    public function __construct()
    {
        // Register taxonomies for authors and publishers
        add_action('init', array($this, 'register_taxonomies'));
    }

    // singelton pattern
    public static function get_instance()
    {
        static $instance = null;
        if (is_null($instance)) {
            $instance = new self();
        }
        return $instance;
    }

    // Register taxonomies for authors and publishers
    public function register_taxonomies()
    {
        $post_types = get_option('kitab_general_settings')['post_type'];
        // Register taxonomy for authors
        $labels = array(
            'name' => esc_html__('Authors', 'kitab'),
            'singular_name' => esc_html__('Author', 'kitab'),
            // Add more labels as needed
        );

        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'show_in_rest' => true,
            // Add more arguments as needed
        );

        if (get_option('kitab_general_settings')['create_authors_taxonomy']) {
            if (!empty($post_types) && !taxonomy_exists('authors')) {
                register_taxonomy('authors', $post_types, $args);
            }
        }

        // Register taxonomy for publishers
        $labels = array(
            'name' => esc_html__('Publishers', 'kitab'),
            'singular_name' => esc_html__('Publisher', 'kitab'),
            // Add more labels as needed
        );

        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'show_in_rest' => true,
            // Add more arguments as needed
        );

        if (get_option('kitab_general_settings')['create_publishers_taxonomy']) {
            if (!empty($post_types) && !taxonomy_exists('publishers')) {
                register_taxonomy('publishers', $post_types, $args);
            }
        }

        // custom books category based on default_taxonomy option
        $default_taxonomy = get_option('kitab_general_settings')['default_taxonomy'];
        $labels = array(
            'name' => esc_html__('Books Categories', 'kitab'),
            'singular_name' => esc_html__('Books Category', 'kitab'),
            // Add more labels as needed
        );

        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'show_in_rest' => true,
            // Add more arguments as needed
        );

        if (!empty($post_types) && $default_taxonomy !== 'category') {
            // if taxonomy is not exist
            if (!taxonomy_exists($default_taxonomy)) {
                register_taxonomy($default_taxonomy, $post_types, $args);
            }
        }
    }
}

// Initialize the Taxonomies class

// $taxonomies = Taxonomies::get_instance();