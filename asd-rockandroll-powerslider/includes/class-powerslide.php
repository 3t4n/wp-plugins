<?php
/**
 *
 * Defines class PowerSlide.
 *
 * @package        WordPress
 * @subpackage     ASD_RockAndRoll_PowerSlide
 * Description:    Defines class ASD_RockAndRoll_PowerSlide
 * Author:         Michael H Fahey
 * Author URI:     https://artisansitedesigns.com/staff/michael-h-fahey/
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '' );
}

if ( ! class_exists( 'PowerSlide' ) ) {
	/** ----------------------------------------------------------------------
	 *  class PowerSlide
	 *  custom post type that defines the slides
	 * -------------------------------------------------------------------- */
	class PowerSlide extends ASD_Custom_Post_1_201811241 {

		/** ----------------------------------------------------------------------
		 *
		 *  @var $customargs defines the custom post type
		 * -------------------------------------------------------------------- */
		private $customargs = array(
			'label'               => 'PowerSlides',
			'description'         => 'PowerSlides',
			'labels'              => array(
				'name'               => 'PowerSlides',
				'singular_name'      => 'PowerSlide',
				'menu_name'          => 'PowerSlides',
				'parent_item_colon'  => 'Parent PowerSlide:',
				'all_items'          => 'All PowerSlides',
				'view_item'          => 'View PowerSlide',
				'add_new_item'       => 'Add New PowerSlide',
				'add_new'            => 'Add New',
				'edit_item'          => 'Edit PowerSlide',
				'update_item'        => 'Update PowerSlide',
				'search_items'       => 'Search PowerSlides',
				'not_found'          => 'PowerSlide Not Found',
				'not_found_in_trash' => 'PowerSlide Not Found In Trash',
			),
			'menu_icon'           => 'dashicons-slides',
			'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'taxonomies'          => array( 'powerslidegroups', 'category' ),
			'rewrite'             => array( 'slug' => 'powerslide' ),
			'heirarchical'        => false,
			'public'              => true,
			'has_archive'         => false,
			'capability_type'     => 'page',
			'exclude_from_search' => false,
			'publicly_queryable'  => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => true,
			'show_admin_column'   => true,
			'can_export'          => true,
			'menu_position'       => 32,
		);

		/** ----------------------------------------------------------------------
		 *
		 *  @var $slide_meta defines the custom post type meta
		 * -------------------------------------------------------------------- */
		private $slide_meta = array(
			'title'  => 'PowerSlide Settings',
			'fields' => array(

				array(
					'id'    => 'powerslide_before_script',
					'label' => 'Before Script',
					'type'  => 'textarea',
				),

				array(
					'id'    => 'powerslide_after_script',
					'label' => 'After Script',
					'type'  => 'textarea',
				),


			),
		);

		/** ----------------------------------------------------------------------
		 *  constructor
		 *  calls the parent constructor, sets up post meta
		 * -------------------------------------------------------------------- */
		public function __construct() {
			/* check the option, and if it's not set don't show this cpt in the dashboard main meny */
			global $asd_cpt_dashboard_display_options;
			if ( get_option( 'asd_rockandroll_powerslide_display' ) === $asd_cpt_dashboard_display_options[2] ) {
				$this->customargs['show_in_menu'] = 0;
			}

			parent::__construct( 'powerslide', $this->customargs );
			$meta_section = register_cuztom_meta_box( 'slide_settings', $this->custom_type_name, $this->slide_meta );
		}

	}

}


