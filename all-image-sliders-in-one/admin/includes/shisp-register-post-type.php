<?php

// Register shisp-image-slider Post Type

add_action( 'init', 'shisp_image_slider_callback');
function shisp_image_slider_callback() {

	$shisp_post_labels = array(
		'name'                  => _x( 'Sliders', 'Post Type General Name', 'shisp-images-slider' ),
		'singular_name'         => _x( 'Slider', 'Post Type Singular Name', 'shisp-images-slider' ),
		'menu_name'             => __( 'Sliders', 'shisp-images-slider' ),
		'name_admin_bar'        => __( 'Slider', 'shisp-images-slider' ),
		'archives'              => __( 'Slider Archives', 'shisp-images-slider' ),
		'attributes'            => __( 'Slider Attributes', 'shisp-images-slider' ),
		'parent_item_colon'     => __( 'Parent Slider:', 'shisp-images-slider' ),
		'all_items'             => __( 'All Sliders', 'shisp-images-slider' ),
		'add_new_item'          => __( 'Add New Slider', 'shisp-images-slider' ),
		'add_new'               => __( 'Add New', 'shisp-images-slider' ),
		'new_item'              => __( 'New Slider', 'shisp-images-slider' ),
		'edit_item'             => __( 'Edit Slider', 'shisp-images-slider' ),
		'update_item'           => __( 'Update Slider', 'shisp-images-slider' ),
		'view_item'             => __( 'View Slider', 'shisp-images-slider' ),
		'view_items'            => __( 'View Sliders', 'shisp-images-slider' ),
		'search_items'          => __( 'Search Slider', 'shisp-images-slider' ),
		'not_found'             => __( 'Not found', 'shisp-images-slider' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'shisp-images-slider' ),
		'featured_image'        => __( 'Featured Image', 'shisp-images-slider' ),
		'set_featured_image'    => __( 'Set featured image', 'shisp-images-slider' ),
		'remove_featured_image' => __( 'Remove featured image', 'shisp-images-slider' ),
		'use_featured_image'    => __( 'Use as featured image', 'shisp-images-slider' ),
		'insert_into_item'      => __( 'Insert into slider', 'shisp-images-slider' ),
		'uploaded_to_this_item' => __( 'Uploaded to this slider', 'shisp-images-slider' ),
		'items_list'            => __( 'Sliders list', 'shisp-images-slider' ),
		'items_list_navigation' => __( 'Sliders list navigation', 'shisp-images-slider' ),
		'filter_items_list'     => __( 'Filter sliders list', 'shisp-images-slider' ),
    );
    
	$shisp_post_args = array(
		'labels' 				=> $shisp_post_labels,
        'description' 			=> __('Description', 'shisp-images-slider'),
        'public' 				=> false,
        'show_ui' 				=> true,
        'show_in_menu' 			=> true,
        'query_var' 			=> true,
        'rewrite' 				=> false,
        'capability_type' 		=> 'post',
        'has_archive' 			=> false,
        'hierarchical' 			=> false,
        'menu_position' 		=> null,
        'supports' 				=> array('title', 'excerpt'),
		'menu_icon'             => SHISP_IMG.'favicon.png',
		'register_meta_box_cb'  => 'shisp_register_metabox'
	);

	register_post_type( 'shisp-image-slider', $shisp_post_args );

	//Register shisp-sliders-subject Taxonomy

    $shisp_tax_labels = array(
        'name' 						 => _x('Subjects', 'taxonomy general name', 'shisp-images-slider'),
        'singular_name' 			 => _x('Subject', 'taxonomy singular name', 'shisp-images-slider'),
        'search_items' 				 => __('Search Subjects', 'shisp-images-slider'),
        'popular_items' 			 => __('Popular Subjects', 'shisp-images-slider'),
        'all_items'			 		 => __('All Subjects', 'shisp-images-slider'),
        'parent_item' 				 => null,
        'parent_item_colon' 		 => null,
        'edit_item' 			 	 => __('Edit Subject', 'shisp-images-slider'),
        'update_item' 				 => __('Update Subject', 'shisp-images-slider'),
        'add_new_item' 				 => __('Add New Subject', 'shisp-images-slider'),
        'new_item_name' 			 => __('New Subject Name', 'shisp-images-slider'),
        'separate_items_with_commas' => __('Separate subjects with commas', 'shisp-images-slider'),
        'add_or_remove_items' 		 => __('Add or remove subjects', 'shisp-images-slider'),
        'choose_from_most_used'      => __('Choose from the most used subjects', 'shisp-images-slider'),
        'not_found' 				 => __('No subjects found.', 'shisp-images-slider'),
        'menu_name' 				 => __('Subjects', 'shisp-images-slider'),
    );

    $shisp_tax_args = array(
        'hierarchical' 		=> false,
        'labels' 			=> $shisp_tax_labels,
        'show_ui' 			=> true,
        'show_admin_column' => true,
        'query_var' 		=> true,
        'rewrite' 			=> array('slug' => 'subject'),
    );

    register_taxonomy('shisp-sliders-subject', 'shisp-image-slider', $shisp_tax_args);

}

function shisp_register_metabox(){

    add_meta_box( 'shisp-sliders-metabox', __('Slides','shisp-images-slider'), function($post){ include (SHISP_VIEW.'shisp-sliders-metabox.php'); }, null, 'advanced', 'high' );
    add_meta_box( 'shisp-slider-setting', __('Setting','shisp-images-slider'), function($post){ include (SHISP_VIEW.'shisp-slider-setting.php'); }, null, 'advanced','low' );

}