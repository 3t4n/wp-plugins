<?php
defined('ABSPATH') or die();

if( ! class_exists('CDLZR_CPTBOX') ) {
	class CDLZR_ACC_BOX_CPTBOX {
		public static function create_cpt(){
			$labels = array(
		        'name'                => _x( 'Accordion Box', 'Accordion Box', CDLZR_PLUG_ACORD_DOM ),
		        'singular_name'       => _x( 'Accordion Box', 'Accordion Box', CDLZR_PLUG_ACORD_DOM ),
		        'menu_name'           => __( 'Accordion Box', CDLZR_PLUG_ACORD_DOM ),
		        'parent_item_colon'   => __( 'Parent Item:', CDLZR_PLUG_ACORD_DOM ),
		        'all_items'           => __( 'All Accordions Box', CDLZR_PLUG_ACORD_DOM ),
		        'view_item'           => __( 'View Accordion Box', CDLZR_PLUG_ACORD_DOM ),
		        'add_new_item'        => __( 'Add New Accordion Box', CDLZR_PLUG_ACORD_DOM ),
		        'add_new'             => __( 'Add Accordion Box', CDLZR_PLUG_ACORD_DOM ),
		        'edit_item'           => __( 'Edit Accordion Box', CDLZR_PLUG_ACORD_DOM ),
				'new_item' 			  => __( 'New Accordion Box', CDLZR_PLUG_ACORD_DOM ),
		        'update_item'         => __( 'Update Accordion Box', CDLZR_PLUG_ACORD_DOM ),
		        'search_items'        => __( 'Search Accordion Box', CDLZR_PLUG_ACORD_DOM ),
		        'not_found'           => __( 'No Accordion Box Found', CDLZR_PLUG_ACORD_DOM ),
		        'not_found_in_trash'  => __( 'No Accordion Box found in Trash', CDLZR_PLUG_ACORD_DOM ),
		    );
		    $args = array(
		        'label'               => __( 'Accordion Box', CDLZR_PLUG_ACORD_DOM ),
		        'description'         => __( 'Accordion Box', CDLZR_PLUG_ACORD_DOM ),
		        'labels'              => $labels,
		        'supports'            => array( 'title', '', '', '', '', '', '', '', '', '', ),
		        'hierarchical'        => false,
		        'public'              => false,
		        'show_ui'             => true,
		        'show_in_menu'        => false,
		        'show_in_nav_menus'   => true,
		        'show_in_admin_bar'   => true,
		        'menu_position'       => 10,
		        'menu_icon'           => esc_url(CDLZR_ACORD_URL.'assets/logo/menu.png'),
		        'can_export'          => true,
		        'has_archive'         => true,
		        'exclude_from_search' => false,
		        'publicly_queryable'  => false,
		        'capability_type'     => 'page',
		    );
			register_post_type( 'cdlzr_accrodion_box', $args );
		}
	}
}