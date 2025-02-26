<?php
/*
Widget Name: The Post Thumbnail
Description: The Post Thumbnail.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOFuncThePostThumbnail extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-the_post_thumbnail',
			__('The Post Thumbnail', $acftt->plugin_text_domain()),
			array(
				'description' => __('Display the post thumbnail.', $acftt->plugin_text_domain()),
			),
			array(
				
			),
			array(
				'option' => array(
					'type' => 'section',
					'label' => __( 'Options' , $acftt->plugin_text_domain() ),
					'hide' => true,
					'fields' => array(
						'link' => array(
							'type' => 'checkbox',
							'label' => __( 'Create as Self Link', $acftt->plugin_text_domain() ),
							'default' => false,
							'description' => __( 'Link the image to the post it was taken from.', $acftt->plugin_text_domain() ),
						),
						'external_link' => array(
							'type' => 'link',
							'label' => __( 'Create as External Link', $acftt->plugin_text_domain() ),
							'default' => false,
							'description' => __( 'Link the image to an arbitrary URL (overrides self link above).', $acftt->plugin_text_domain() ),
						),
						'image_size' => array(
							'type' => 'image-size',
							'label' => __( 'Image Size', $acftt->plugin_text_domain() ),
							'description' => __( 'Size of the image to display.', $acftt->plugin_text_domain() ),
						)
					)
				)
			),
			plugin_dir_path(__FILE__)
		);
	}
	
	function get_less_variables($instance) {
		return array();
	}
	
	function get_template_name($instance) {
		return 'tpl';
	}
	
	function get_style_name($instance) {
		return false;
	}
	
	function get_form_teaser(){
		global $acftt;
		return $acftt->form_teaser();
	}
}

siteorigin_widget_register('echelonso-func-the_post_thumbnail', __FILE__, 'EchelonSOFuncThePostThumbnail');
