<?php

if( function_exists('acf_add_options_page') ) {

    // AAGG Option Page
    acf_add_options_page(array(
        'page_title' 	=> 'ACF Ajax Grid Gallery',
        'menu_title'	=> 'ACF Ajax Grid Gallery',
        'menu_slug' 	=> 'aagg-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false,
        'icon_url' => 'dashicons-format-gallery',
    ));

}

if( function_exists('acf_add_local_field_group') ):

    // Include files for acf (groups & fields)
    include_once AAGG__PLUGIN_DIR . 'inc/grid-gallery-fields/field_gallery.php';
endif;