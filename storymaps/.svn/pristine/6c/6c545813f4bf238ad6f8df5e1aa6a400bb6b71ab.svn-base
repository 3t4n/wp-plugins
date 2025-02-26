<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

function cp_register_gigapixel_storymap_slide() {
	$labels = array(
		'name'               => _x( 'Gigapixel Slide', 'post type general name' ),
		'singular_name'      => _x( 'Gigapixel Slide', 'post type singular name' ),
		'add_new'            => _x( 'Add New Gigapixel Slide', 'storymap-slide' ),
		'add_new_item'       => __( 'Add New Gigapixel Slide' ),
		'edit_item'          => __( 'Edit Gigapixel Slide' ),
		'new_item'           => __( 'New Gigapixel Slide' ),
		'all_items'          => __( 'All Gigapixel Slides' ),
		'view_item'          => __( 'View Gigapixel Slide' ),
		'search_items'       => __( 'Search Gigapixel Slides' ),
		'not_found'          => __( 'No Gigapixel Slides found' ),
		'not_found_in_trash' => __( 'No Gigapixel Slides found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Gigapixel Slides'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Gigapixel Slide',
		'public'        => true,
		'menu_position' => 4,
		'menu_icon' => 'dashicons-images-alt2',
		'supports'      => array( 'title', 'editor', 'custom-fields'),
		'capability_type' => 'post',
		'has_archive'   => false,
		'show_ui'		=> true,
		'show_in_menu' 	=> 'edit.php?post_type=gigapixel-storymap',
		'rewrite'       => array( 'slug' => 'gigapixel-slide' ),
	);
	register_post_type( 'gigapixel-slide', $args );	

}

add_action( 'init', 'cp_register_gigapixel_storymap_slide' );

function cp_register_gigapixel_storymap() {
	$labels = array(
		'name'               => _x( 'Gigapixel Storymap', 'post type general name' ),
		'singular_name'      => _x( 'Gigapixel Storymap', 'post type singular name' ),
		'add_new'            => _x( 'Add New Gigapixel Storymap', 'storymap' ),
		'add_new_item'       => __( 'Add New Gigapixel Storymap' ),
		'edit_item'          => __( 'Edit Gigapixel Storymap' ),
		'new_item'           => __( 'New Gigapixel Storymap' ),
		'all_items'          => __( 'All Gigapixel Storymaps' ),
		'view_item'          => __( 'View Gigapixel Storymap' ),
		'search_items'       => __( 'Search Gigapixel Storymap' ),
		'not_found'          => __( 'No Gigapixel Storymaps found' ),
		'not_found_in_trash' => __( 'No Gigapixel Storymaps found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Gigapixel Storymaps'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Gigapixel Storymap',
		'public'        => true,
		'menu_position' => 4,
		'menu_icon' => 'dashicons-format-image',
		'supports'      => array( 'title', 'editor','thumbnail'),
		'capability_type' => 'post',
		'has_archive'   => false,
		'taxonomies' 	=> array('category'),
		'rewrite'       => array( 'slug' => 'gigapixel-storymap' ),
	);
	register_post_type( 'gigapixel-storymap', $args );	

}

add_action( 'init', 'cp_register_gigapixel_storymap' );


?>