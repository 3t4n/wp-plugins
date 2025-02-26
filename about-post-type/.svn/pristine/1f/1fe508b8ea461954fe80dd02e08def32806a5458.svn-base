<?php

 if ( ! class_exists ( 'about_post_type' )){
	class about_post_type {
	
		public function __construct() {
			add_action('init',
				array($this, 'register_about_post_type'));
		}
	

		public function register_about_post_type() {
			register_post_type ('about_post_type',		
				array(
					'labels' => array (
						'name' => 'About US',
						'singular_name' => 'About US',
						'add_new_item' => __( 'Add New About US', 'about' ),
						'new_item'           => __( 'New About US', 'about' ),
						'edit_item'          => __( 'Edit About US', 'about' ),
						'view_item'          => __( 'View About US', 'about' ),
						'all_items'          => __( 'All About US', 'about' ),
						'search_items'       => __( 'Search About US', 'about' ),
						'parent_item_colon'  => __( 'Parent About US:', 'about' ),				
					),
					'public' => true,
					'supports' => array( 'title', 'editor', 'thumbnail'),
					'has_archive' => true
				) );
			}
		}
		
	new about_post_type();
}