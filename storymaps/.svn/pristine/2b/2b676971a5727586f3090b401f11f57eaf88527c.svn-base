<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

function cp_register_storymap_slide() {
	$labels = array(
		'name'               => _x( 'Storymap Slide', 'post type general name' ),
		'singular_name'      => _x( 'Storymap Slide', 'post type singular name' ),
		'add_new'            => _x( 'Add New Storymap Slide', 'storymap-slide' ),
		'add_new_item'       => __( 'Add New Storymap Slide' ),
		'edit_item'          => __( 'Edit Storymap Slide' ),
		'new_item'           => __( 'New Storymap Slide' ),
		'all_items'          => __( 'All Storymap Slides' ),
		'view_item'          => __( 'View Storymap Slide' ),
		'search_items'       => __( 'Search Storymap Slides' ),
		'not_found'          => __( 'No Storymap Slides found' ),
		'not_found_in_trash' => __( 'No Storymap Slides found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Storymap Slides'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Storymap Slide',
		'public'        => true,
		'menu_position' => 4,
		'menu_icon' => 'dashicons-slides',
		'supports'      => array( 'title', 'editor'),
		'capability_type' => 'post',
		'has_archive'   => true,
		// 'show_in_menu' => 'edit.php?post_type=storymap',
		'taxonomies' 	=> array('slide-category'),
		'rewrite'       => array( 'slug' => 'storymap-slide' ),
	);
	register_post_type( 'storymap-slide', $args );	

}

function register_storymap_slide_taxonomy() {
    register_taxonomy(
        'slide-category',
        'slide-category',
        array(
            'labels' => array(
                'name' => 'Slide Category',
                'add_new_item' => 'Add New Slide Category',
                'new_item_name' => "New Slide Category"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => false
        )
    );
}

add_action( 'init', 'cp_register_storymap_slide' );
add_action( 'init', 'register_storymap_slide_taxonomy', 0 );

function cp_register_storymap() {
	$labels = array(
		'name'               => _x( 'Storymap', 'post type general name' ),
		'singular_name'      => _x( 'Storymap', 'post type singular name' ),
		'add_new'            => _x( 'Add New Storymap', 'storymap' ),
		'add_new_item'       => __( 'Add New Storymap' ),
		'edit_item'          => __( 'Edit Storymap' ),
		'new_item'           => __( 'New Storymap' ),
		'all_items'          => __( 'All Storymaps' ),
		'view_item'          => __( 'View Storymap' ),
		'search_items'       => __( 'Search Storymap' ),
		'not_found'          => __( 'No Storymaps found' ),
		'not_found_in_trash' => __( 'No Storymaps found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Storymaps'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Storymap',
		'public'        => true,
		'menu_position' => 4,
		'menu_icon' => 'dashicons-location-alt',
		'supports'      => array( 'title', 'editor','thumbnail','author'),
		'capability_type' => 'post',
		'has_archive'   => false,
		'taxonomies' 	=> array('category'),
		'rewrite'       => array( 'slug' => 'storymap' )
	);
	register_post_type( 'storymap', $args );	

}

add_action( 'init', 'cp_register_storymap' );

add_filter('archive_template', 'story_slide_custom_archive_template');

function story_slide_custom_archive_template($archive_template) {
	global $post;
    if ( is_archive() &&  get_post_type() == 'storymap-slide' ) {
        $archive_template = dirname(__FILE__) . '/templates/story_slide_archive_template.php';
        return $archive_template;
    }
}
?>