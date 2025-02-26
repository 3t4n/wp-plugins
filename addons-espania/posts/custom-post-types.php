<?php
/*
 * Register custom posts types and taxonomies
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Addons_Espania_Posts_Types' ) ) :

    /**
     * Class for main theme functions
     */
    class Addons_Espania_Posts_Types {

        /**
         * Return a singleton instance of the current class
         *
         * @return object
         */
        public static function factory() {
            static $instance = false;

            if ( ! $instance ) {
                $instance = new self();
                $instance->setup();
            }

            return $instance;
        }

        /**
         * Constructor
         */
        public function __construct() {}

        /**
         * Setup actions and filters for all things settings
         */
        public function setup() {

            add_action( 'init', array( $this, 'create_post_type' ), 0 );

        }

        /*
         * Register custom posts types and taxonomy
         */
        public function create_post_type() {

            /* Create Portfolio Post Type */
            register_post_type( 'portfolio',
                array(
                    'labels' => array(
                        'name' => __( 'Portfolio', 'espania' ),
                        'singular_name' => __( 'Portfolio Item', 'espania' ),
                        'add_item' => __( 'New Portfolio Item', 'espania' ),
                        'add_new_item' => __( 'Add New Portfolio Item', 'espania' ),
                        'edit_item' => __( 'Edit Portfolio Item', 'espania' )
                    ),
                    'public' => true,
                    'has_archive' => true,
                    'rewrite' => array( 'slug' => 'portfolio' ),
                    'menu_position' => 4,
                    'show_ui' => true,
                    'supports' => array( 'author', 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' )
                )
            );

            /* Create Portfolio Categories */
            $labels = array(
                'name' => __( 'Portfolio Categories', 'espania' ),
                'singular_name' => __( 'Portfolio Category', 'espania' ),
                'search_items' =>  __( 'Search Portfolio Categories','espania' ),
                'all_items' => __( 'All Portfolio Categories','espania' ),
                'parent_item' => __( 'Parent Portfolio Category','espania' ),
                'parent_item_colon' => __( 'Parent Portfolio Category:','espania' ),
                'edit_item' => __( 'Edit Portfolio Category','espania' ),
                'update_item' => __( 'Update Portfolio Category','espania' ),
                'add_new_item' => __( 'Add New Portfolio Category','espania' ),
                'new_item_name' => __( 'New Portfolio Category Name','espania' ),
                'menu_name' => __( 'Portfolio Categories','espania' ),
            );

            register_taxonomy( 'portfolio_category', array( 'portfolio' ), array(
                'hierarchical' => true,
                'labels' => $labels,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array( 'slug' => 'portfolio-category' ),
            ));

            /* Create Portfolio Tags */
            $labels = array(
                'name' => __( 'Portfolio Tags', 'espania' ),
                'singular_name' => __( 'Portfolio Tag', 'espania' ),
                'search_items' =>  __( 'Search Portfolio Tags','espania' ),
                'all_items' => __( 'All Portfolio Tags','espania' ),
                'parent_item' => __( 'Parent Portfolio Tag','espania' ),
                'parent_item_colon' => __( 'Parent Portfolio Tags:','espania' ),
                'edit_item' => __( 'Edit Portfolio Tag','espania' ),
                'update_item' => __( 'Update Portfolio Tag','espania' ),
                'add_new_item' => __( 'Add New Portfolio Tag','espania' ),
                'new_item_name' => __( 'New Portfolio Tag Name','espania' ),
                'menu_name' => __( 'Portfolio Tags','espania' ),
            );

            register_taxonomy( 'portfolio_tag', array( 'portfolio' ), array(
                'hierarchical' => false,
                'labels' => $labels,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array( 'slug' => 'portfolio-tag' ),
            ));

        }


    }

endif;

Addons_Espania_Posts_Types::factory();