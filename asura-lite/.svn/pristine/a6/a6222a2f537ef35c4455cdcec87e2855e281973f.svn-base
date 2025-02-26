<?php

namespace Asura\Integration\WordPress;

class Taxonomy {

    public static function init() {
        register_taxonomy(
            'designset',
            [
                'asura_designpedia',
                'page',
                'ct_template',
                'oxy_user_library'
            ],
            [
                'show_in_menu'      => false,
                'hierarchical'      => false,
                'public'            => true,
                'show_in_rest'      => true,
                'show_ui'           => true,
                'show_admin_column' => true,
                'query_var'         => true,
                'show_ui'           => true,
                'rest'              => true,
                'rewrite'           => [ 'slug' => 'designset' ],
                'labels'            => [
                    'name'              => 'Designsets',
                    'singular_name'     => 'Designset',
                    'search_items'      => 'Search Designsets',
                    'all_items'         => 'All Designsets',
                    'parent_item'       => 'Parent Designset',
                    'parent_item_colon' => 'Parent Designset:',
                    'edit_item'         => 'Edit Designset',
                    'update_item'       => 'Update Designset',
                    'add_new_item'      => 'Add New Designset',
                    'new_item_name'     => 'New Designset Name',
                    'menu_name'         => 'Designset',
                ],
            ]
        );
    }
}
