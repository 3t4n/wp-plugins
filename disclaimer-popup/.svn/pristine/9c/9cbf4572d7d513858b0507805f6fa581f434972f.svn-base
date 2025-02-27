<?php

// Register Custom Post Type Disclaimer Popup
function create_wpdisclaimerpopup_cpt() {

	$labels = array(
		'name' => _x( 'Disclaimer Popup', 'Post Type General Name', 'wp-disclaimer-popup' ),
		'singular_name' => _x( 'Disclaimer Popup', 'Post Type Singular Name', 'wp-disclaimer-popup' ),
		'menu_name' => _x( 'Disclaimer Popup', 'Admin Menu text', 'wp-disclaimer-popup' ),
		'name_admin_bar' => _x( 'Disclaimer Popup', 'Add New on Toolbar', 'wp-disclaimer-popup' ),
		'archives' => __( 'Disclaimer Popup Archives', 'wp-disclaimer-popup' ),
		'attributes' => __( 'Disclaimer Popup Attributes', 'wp-disclaimer-popup' ),
		'parent_item_colon' => __( 'Parent Disclaimer Popup:', 'wp-disclaimer-popup' ),
		'all_items' => __( 'All Disclaimers', 'wp-disclaimer-popup' ),
		'add_new_item' => __( 'Add Disclaimer', 'wp-disclaimer-popup' ),
		'add_new' => __( 'Add New Disclaimer', 'wp-disclaimer-popup' ),
		'new_item' => __( 'New Disclaimer', 'wp-disclaimer-popup' ),
		'edit_item' => __( 'Edit Disclaimer', 'wp-disclaimer-popup' ),
		'update_item' => __( 'Update Disclaimer', 'wp-disclaimer-popup' ),
		'view_item' => __( 'View Disclaimer', 'wp-disclaimer-popup' ),
		'view_items' => __( 'View Disclaimer', 'wp-disclaimer-popup' ),
		'search_items' => __( 'Search Disclaimer', 'wp-disclaimer-popup' ),
		'not_found' => __( 'Not found', 'wp-disclaimer-popup' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'wp-disclaimer-popup' ),
		'featured_image' => __( 'Featured Image', 'wp-disclaimer-popup' ),
		'set_featured_image' => __( 'Set featured image', 'wp-disclaimer-popup' ),
		'remove_featured_image' => __( 'Remove featured image', 'wp-disclaimer-popup' ),
		'use_featured_image' => __( 'Use as featured image', 'wp-disclaimer-popup' ),
		'insert_into_item' => __( 'Insert into Disclaimer Popup', 'wp-disclaimer-popup' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Disclaimer Popup', 'wp-disclaimer-popup' ),
		'items_list' => __( 'Disclaimer Popup list', 'wp-disclaimer-popup' ),
		'items_list_navigation' => __( 'Disclaimer Popup list navigation', 'wp-disclaimer-popup' ),
		'filter_items_list' => __( 'Filter Disclaimer Popup list', 'wp-disclaimer-popup' ),
	);
	$args = array(
		'label' => __( 'Disclaimer Popup', 'wp-disclaimer-popup' ),
		'description' => __( '', 'wp-disclaimer-popup' ),
		'labels' => $labels,
		'menu_icon' => 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDIyLjEuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxpdmVsbG9fMSIgeG1sbnM6c2VyaWY9Imh0dHA6Ly93d3cuc2VyaWYuY29tLyIKCSB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDU2Ni45IDU2Ni45IgoJIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDU2Ni45IDU2Ni45OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+Cgkuc3Qwe2ZpbGw6bm9uZTt9Cjwvc3R5bGU+CjxyZWN0IGlkPSJUYXZvbGEtZGEtZGlzZWdubzEiIHg9IjEwMjIuOSIgeT0iMjEyLjQiIHNlcmlmOmlkPSJUYXZvbGEgZGEgZGlzZWdubzEiIGNsYXNzPSJzdDAiIHdpZHRoPSI4NzguNyIgaGVpZ2h0PSI4NzguNyI+CjwvcmVjdD4KPGcgaWQ9IlRhdm9sYS1kYS1kaXNlZ25vMTEiIHNlcmlmOmlkPSJUYXZvbGEgZGEgZGlzZWdubzEiPgoJPHBhdGggZD0iTTI4My41LDM5NC40TDI4My41LDM5NC40YzEyLjMsMCwyMi4yLDkuOSwyMi4yLDIyLjJ2MGMwLDEyLjMtOS45LDIyLjItMjIuMiwyMi4yaDBjLTEyLjMsMC0yMi4yLTkuOS0yMi4yLTIyLjJ2MAoJCUMyNjEuMyw0MDQuNCwyNzEuMiwzOTQuNCwyODMuNSwzOTQuNHoiLz4KCTxwYXRoIGQ9Ik0yODMuNSwyMzkuMUwyODMuNSwyMzkuMWMxMi4zLDAsMjIuMiw5LjksMjIuMiwyMi4yVjM1MGMwLDEyLjMtOS45LDIyLjItMjIuMiwyMi4yaDBjLTEyLjMsMC0yMi4yLTkuOS0yMi4yLTIyLjJ2LTg4LjgKCQlDMjYxLjMsMjQ5LDI3MS4yLDIzOS4xLDI4My41LDIzOS4xeiIvPgoJPGc+CgkJPHBhdGggZD0iTTUzMC44LDUwOC45SDM0LjRjLTUsMC04LjEtNS40LTUuNi05LjdMMjc3LjksNjcuN2MyLjUtNC4zLDguOC00LjMsMTEuMywwbDI0OC4yLDQyOS45CgkJCUM1NDAuMiw1MDIuNyw1MzYuNiw1MDguOSw1MzAuOCw1MDguOXogTTExMi44LDQ2NC41aDM0MS40YzUuNiwwLDkuMi02LjEsNi40LTExTDI4OS45LDE1Ny45Yy0yLjktNC45LTEwLTQuOS0xMi44LDBMMTA2LjQsNDUzLjQKCQkJQzEwMy42LDQ1OC40LDEwNy4xLDQ2NC41LDExMi44LDQ2NC41eiIvPgoJPC9nPgo8L2c+Cjwvc3ZnPgo=',
		'supports' => array('title', 'editor'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => false,
		'show_in_nav_menus' => false,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
		'exclude_from_search' => true,
		'show_in_rest' => true,
		'publicly_queryable' => false,
		'capability_type' => 'post',
	);
	register_post_type( 'wp-disclaimer-popup', $args );

}
add_action( 'init', 'create_wpdisclaimerpopup_cpt', 0 );