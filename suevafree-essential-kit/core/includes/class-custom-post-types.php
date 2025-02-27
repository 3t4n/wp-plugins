<?php

if( !class_exists( 'suevafree_cpt' ) ) {

	class suevafree_cpt {
	   
		public $post_type_name;
		public $post_type_args;
		public $post_type_supports;
	   
		public function __construct( $name, $args = array(), $supports = array() ) {
	
			$this->post_type_name = $name ;
			$this->post_type_args = $args;
			$this->post_type_supports = $supports;
	
			if ( ! post_type_exists( $this->post_type_name ) )  
				add_action( 'init', array( &$this, 'reg_cptype' ) ); 
	
		}
	
		public function reg_cptype() {
			
			$cpt_name = $this->post_type_name ;
			$cpt_args = $this->post_type_args ;
			$cpt_supports = $this->post_type_supports ;
		
			$labels = array(
				'name' => ucfirst($cpt_name), 
				'singular_name' => $cpt_name,
				'add_new' => $cpt_args['add_new'], $cpt_name, 
				'add_new_item' => $cpt_args['add_new_item'], $cpt_name, 
				'menu_name' => $cpt_args['menu_name'],
				'name_admin_bar' => $cpt_args['name_admin_bar'],
				'new_item' => $cpt_args['new_item'], 
				'edit_item' => $cpt_args['edit_item'],
				'view_item' => $cpt_args['view_item'],
				'search_items' => $cpt_args['search_items'], 
				'not_found' => $cpt_args['not_found'],
				'not_found_in_trash' => $cpt_args['not_found_in_trash'],
			);
			
			$args = array(
				'labels' => $labels,
				'public' => true, 
				'publicly_queryable' => true, 
				'show_ui' => true, 
				'query_var' => true, 
				'rewrite' => array( 'slug' => $cpt_name ),
				'capability_type' => 'post', 
				'hierarchical' => false, 
				'menu_position' => null,
				'supports' => $cpt_supports 
			);
			
			register_post_type($cpt_name, $args);
	
	   }
	
	}

}

?>