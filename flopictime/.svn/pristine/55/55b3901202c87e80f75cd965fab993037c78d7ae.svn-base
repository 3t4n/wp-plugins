<?php
/**
 * Register the necessary custom post types
 *
 *
 * @since      1.0.0
 * @package    Pictimewp
 * @subpackage Pictimewp/includes
 * @author     Alex G. <alexg@flothemes.com>
 */

class Flo_Pictime_custom_posts {

	/**
	 *
	 * call the methods that are registering custom post types
	 * Add bellow this a method for each custom post type
	 *
	 */
	public function flo_reg_custom_post_type(){
		// call the methods that are registering the post types
		$this->flo_reg_forms_post_type();
	}


	/**
	 *
	 * Register the Forms post type
	 *
	 */
	public function flo_reg_forms_post_type(){

		$labels = array(
			'name'               => _x( 'FloPicTime Gallery', 'post type general name', 'pictimewp' ),
			'singular_name'      => _x( 'Form', 'post type singular name', 'pictimewp' ),
			'menu_name'          => _x( 'FloPicTime Galleries', 'admin menu', 'pictimewp' ),
			'name_admin_bar'     => _x( 'Galleries', 'add new on admin bar', 'pictimewp' ),
			'add_new'            => _x( 'Add New FloPicTime Gallery', 'form', 'pictimewp' ),
			'add_new_item'       => __( 'Add New FloPicTime Gallery', 'pictimewp' ),
			'new_item'           => __( 'New FloPicTime Gallery', 'pictimewp' ),
			'edit_item'          => __( 'Edit FloPicTime Gallery', 'pictimewp' ),
			'view_item'          => __( 'View FloPicTime Gallery', 'pictimewp' ),
			'all_items'          => __( 'All FloPicTime Galleries', 'pictimewp' ),
			'search_items'       => __( 'Search FloPicTime Gallery', 'pictimewp' ),
			'parent_item_colon'  => __( 'Parent FloPicTime Galleries:', 'pictimewp' ),
			'not_found'          => __( 'No FloPicTime Galleries found.', 'pictimewp' ),
			'not_found_in_trash' => __( 'No FloPicTime Galleries found in Trash.', 'pictimewp' )
		);

		$args = array(
			'labels'             => $labels,
	        'public'             => false,
	        'exclude_from_search'=> true,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'flo_pictime_gallery' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => 56,
			'menu_icon'			 => 'dashicons-format-gallery',
			'supports'           => array( 'title',  ),
      'show_in_rest'      => true
		);

		register_post_type( 'flo_pictime_gallery', $args );
	}

}
