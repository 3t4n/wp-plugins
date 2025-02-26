<?php

namespace Asura\Integration\WordPress;

class PostType {

    public static function init() {
        register_post_type( 'asura_designpedia', [
            'has_archive' => true,
            'public'      => true,
            'publicly_queryable' => true,
            'exclude_from_search' => true,
            'show_ui' => true,
            'show_in_menu' => 'asura',
            'query_var' => true,
            'supports' => ['title'],
            'labels' => [
                'name'          => 'Designpedia',
                'singular_name' => 'Designpedia',
            ],
        ] );
    }
}
