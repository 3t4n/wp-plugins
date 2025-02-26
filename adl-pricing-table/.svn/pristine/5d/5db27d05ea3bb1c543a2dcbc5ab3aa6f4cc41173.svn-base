<?php

if ( ! defined('ABSPATH') ) { die("You can not access this file directly"); }
class APT_Custom_Post {
    protected $textdomain;
    protected $posts;

    public function __construct($textdomain, $type, $singular_label, $plural_label, $settings = [], $icon ='dashicons-admin-post
') {
        $this->textdomain = $textdomain;
        $this->posts = [];
        add_action('init', [$this, 'register_custom_post']);
        $this->create($type, $singular_label, $plural_label, $settings, $icon);
    }

    private function create($type, $singular_label, $plural_label, $settings, $icon) {
        $default_settings = [
            'labels' => [
                'name' => __($plural_label, $this->textdomain),
                'singular_name' => __($singular_label, $this->textdomain),
                'add_new_item' => __('Add New ' . $singular_label, $this->textdomain),
                'edit_item' => __('Edit ' . $singular_label, $this->textdomain),
                'new_item' => __('New ' . $singular_label, $this->textdomain),
                'view_item' => __('View ' . $singular_label, $this->textdomain),
                'search_items' => __('Search ' . $plural_label, $this->textdomain),
                'not_found' => __('No ' . $plural_label . ' found', $this->textdomain),
                'not_found_in_trash' => __('No ' . $plural_label . ' found in trash', $this->textdomain),
                'parent_item_colon' => __('Parent ' . $singular_label, $this->textdomain),
            ],
            'description'        => __( 'Description.', $this->textdomain ),
            'public' => false,
            'menu_position' => null,
            'publicly_queryable' => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'supports' => [
                'title',
                'editor'
            ],
            'rewrite' => [
                'slug' => sanitize_title_with_dashes($plural_label)
            ],
            'menu_icon'           => $icon,
        ];
        $this->posts[$type] = array_replace($default_settings, $settings);
    }

    public function register_custom_post() {
        foreach ($this->posts as $key => $values) {
            register_post_type($key, $values);
        }
    }


}