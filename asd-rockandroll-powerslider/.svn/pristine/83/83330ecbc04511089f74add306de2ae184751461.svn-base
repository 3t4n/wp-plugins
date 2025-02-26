<?php
/**
 * Defines the PowerSlider class.
 *
 * @package        WordPress
 * @subpackage     ASD_RockAndRoll_PowerSlider
 * Description:    Defines class ASD_RockAndRoll_PowerSlider
 * Author:         Michael H Fahey
 * Author URI:     https://artisansitedesigns.com/staff/michael-h-fahey/
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '' );
}

if ( ! class_exists( 'PowerSlider' ) ) {
	/** ----------------------------------------------------------------------
	 *  class PowerSlider
	 *  custom post type that defines the actual slider
	 * -------------------------------------------------------------------- */
	class PowerSlider extends ASD_Custom_Unpost_1_201811241 {

		/** ----------------------------------------------------------------------
		 *
		 *  @var $customargs defines the custom post type
		 * -------------------------------------------------------------------- */
		private $customargs = array(
			'label'               => 'PowerSliders',
			'description'         => 'PowerSliders',
			'labels'              => array(
				'name'               => 'PowerSliders',
				'singular_name'      => 'PowerSlider',
				'menu_name'          => 'PowerSliders',
				'parent_item_colon'  => 'Parent PowerSlider:',
				'all_items'          => 'All PowerSliders',
				'view_item'          => 'View PowerSlider',
				'add_new_item'       => 'Add New PowerSlider',
				'add_new'            => 'Add New',
				'edit_item'          => 'Edit PowerSlider',
				'update_item'        => 'Update PowerSlider',
				'search_items'       => 'Search PowerSliders',
				'not_found'          => 'PowerSlider Not Found',
				'not_found_in_trash' => 'PowerSlider Not Found In Trash',
			),
			'menu_icon'           => 'dashicons-images-alt2',
			'supports'            => array( 'title' ),
			'rewrite'             => array( 'slug' => 'powerslider' ),
			'taxonomies'          => array(),
			'heirarchical'        => false,
			'public'              => true,
			'has_archive'         => false,
			'capability_type'     => 'page',
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => true,
			'show_admin_column'   => true,
			'can_export'          => true,
			'menu_position'       => 31,
		);

		/** ----------------------------------------------------------------------
		 *
		 *  @var $slider_meta defines the custom post type meta
		 * -------------------------------------------------------------------- */
		private $slider_meta = array(
			'title'  => 'PowerSlider Settings',
			'fields' => array(

				array(
					'id'            => 'autoplay',
					'label'         => 'Auto Play',
					'type'          => 'select',
					'options'       => array(
						'true'  => 'true',
						'false' => 'false',
					),
					'default_value' => 'true',
				),

				array(
					'id'            => 'autoplay_speed',
					'default_value' => '3000',
					'label'         => 'Auto Play Speed',
					'type'          => 'text',
				),

				array(
					'id'            => 'arrows',
					'label'         => 'Arrows',
					'type'          => 'select',
					'options'       => array(
						'true'  => 'true',
						'false' => 'false',
					),
					'default_value' => 'true',
				),

				array(
					'id'            => 'dots',
					'label'         => 'Dots',
					'type'          => 'select',
					'options'       => array(
						'true'  => 'true',
						'false' => 'false',
					),
					'default_value' => 'true',
				),

				array(
					'id'            => 'draggable',
					'label'         => 'Draggable',
					'type'          => 'select',
					'options'       => array(
						'true'  => 'true',
						'false' => 'false',
					),
					'default_value' => 'true',
				),

				array(
					'id'            => 'fade',
					'label'         => 'Fade',
					'type'          => 'select',
					'options'       => array(
						'true'  => 'true',
						'false' => 'false',
					),
					'default_value' => 'false',
				),

				array(
					'id'            => 'pauseonfocus',
					'label'         => 'Pause on Focus',
					'type'          => 'select',
					'options'       => array(
						'true'  => 'true',
						'false' => 'false',
					),
					'default_value' => 'true',
				),

				array(
					'id'            => 'pauseonhover',
					'label'         => 'Pause on Hover',
					'type'          => 'select',
					'options'       => array(
						'true'  => 'true',
						'false' => 'false',
					),
					'default_value' => 'false',
				),

				array(
					'id'            => 'pauseondotshover',
					'label'         => 'Pause on Dots Hover',
					'type'          => 'select',
					'options'       => array(
						'true'  => 'true',
						'false' => 'false',
					),
					'default_value' => 'false',
				),

				array(
					'id'            => 'slidestoshow',
					'default_value' => '1',
					'label'         => 'Slides To Show',
					'type'          => 'text',
				),

				array(
					'id'            => 'slidestoscroll',
					'default_value' => '1',
					'label'         => 'Slides To Scroll',
					'type'          => 'text',
				),

				array(
					'id'            => 'speed',
					'default_value' => '300',
					'label'         => 'Slide (transition) Speed',
					'type'          => 'text',
				),

				array(
					'id'            => 'swipe',
					'label'         => 'Swipe',
					'type'          => 'select',
					'options'       => array(
						'true'  => 'true',
						'false' => 'false',
					),
					'default_value' => 'true',
				),

				array(
					'id'            => 'swipetoslide',
					'label'         => 'Swipe to Slide',
					'type'          => 'select',
					'options'       => array(
						'true'  => 'true',
						'false' => 'false',
					),
					'default_value' => 'true',
				),

				array(
					'id'            => 'touchmove',
					'label'         => 'Touch Move',
					'type'          => 'select',
					'options'       => array(
						'true'  => 'true',
						'false' => 'false',
					),
					'default_value' => 'true',
				),

				array(
					'id'            => 'infinite',
					'label'         => 'Infinite',
					'type'          => 'select',
					'options'       => array(
						'true'  => 'true',
						'false' => 'false',
					),
					'default_value' => 'true',
				),

				array(
					'id'            => 'vertical',
					'label'         => 'Vertical',
					'type'          => 'select',
					'options'       => array(
						'true'  => 'true',
						'false' => 'false',
					),
					'default_value' => 'false',
				),

				array(
					'id'            => 'centermode',
					'label'         => 'Center Mode',
					'type'          => 'select',
					'options'       => array(
						'true'  => 'true',
						'false' => 'false',
					),
					'default_value' => 'false',
				),

				array(
					'id'            => 'centerpadding',
					'default_value' => '60px',
					'label'         => 'Center Padding',
					'type'          => 'text',
				),

				array(
					'id'            => 'script',
					'default_value' => '',
					'label'         => 'Slider Script',
					'type'          => 'textarea',
				),

				array(
					'id'            => 'style',
					'default_value' => '',
					'label'         => 'Slider Style(CSS)',
					'type'          => 'textarea',
				),

			),
		);

		/** ----------------------------------------------------------------------
		 *  constructor
		 *  calls the parent constructor, sets up post meta,
		 *  hooks the shortcode helper function to the admin_init action
		 * -------------------------------------------------------------------- */
		public function __construct() {
			global $asd_cpt_dashboard_display_options;

			if ( get_option( 'asd_rockandroll_powerslider_display' ) === $asd_cpt_dashboard_display_options[2] ) {
				$this->customargs['show_in_menu'] = 0;
			}

			parent::__construct( 'powerslider', $this->customargs );
			$meta_section = register_cuztom_meta_box( 'slider_settings', $this->custom_type_name, $this->slider_meta );

			add_action( 'admin_init', array( &$this, 'shortcode_helper_add_meta' ) );
		}

		/** ----------------------------------------------------------------------
		 *  function shortcode_helper_add_meta()
		 *  adds the meta box in the Dashboard
		 * -------------------------------------------------------------------- */
		public function shortcode_helper_add_meta() {
			if ( is_admin() ) {
				add_meta_box( 'powerslider-shortcode-helpers', 'Shortcode Examples', array( &$this, 'asd_shortcode_helpers' ), 'powerslider', 'side', 'low' );
			}
		}

		/** ----------------------------------------------------------------------
		 *  function asd_shortcode_helpers()
		 *  callback that actually draws the post meta box
		 * -------------------------------------------------------------------- */
		public function asd_shortcode_helpers() {
			global $post;
			echo '<code>';
			if ( $post->post_name ) {
				echo '[insert_powerslider powersliderslug="' . esc_attr( $post->post_name ) . '" powerslidegroups="my-powerslide-group"]</br></br>';
			}
			if ( $post->ID ) {
				echo '[insert_powerslider powersliderid="' . esc_attr( $post->ID ) . '" category="my-category" ]</br></br>';
			}
			if ( $post->post_name ) {
				echo '[insert_powerslider powersliderslug="' . esc_attr( $post->post_name ) . '" ids="2334,2337" ]</br></br>';
				echo '[insert_powerslider powersliderslug="' . esc_attr( $post->post_name ) . '" image_ids="2345,2367" ]</br></br>';
				echo '[insert_powerslider powerslidername="' . esc_attr( $post->post_title ) . '" product_cat="my-woo-product-group" ]</br></br>';
			}
			echo '</code>';
		}


	}

}

