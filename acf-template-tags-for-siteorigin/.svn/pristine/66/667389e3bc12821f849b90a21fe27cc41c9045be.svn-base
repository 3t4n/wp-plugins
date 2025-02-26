<?php
/*
Widget Name: The Post
Description: Increment the internal post counter and render a layout.
Author: Echelon Team
Author URI: http://echelonso.com
*/

class EchelonSOFuncThePost extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-the_post',
			__('The Post', $acftt->plugin_text_domain()),
			array(
				'description' => __('Increment the internal post counter.', $acftt->plugin_text_domain()),
			),
			array(
				
			),
			array(
				'option' => array(
					'type' => 'section',
					'label' => __( 'Options' , $acftt->plugin_text_domain() ),
					'hide' => true,
					'fields' => array(
						'layout' => array(
							'type' => 'select',
							'label' => __( 'Layout', $acftt->plugin_text_domain() ),
							'default' => '0',
							'options' => $acftt->get_layout_select_options()
						)
					)
				),
				'background_image' => array(
					'type' => 'section',
					'label' => __( 'Background Image' , $acftt->plugin_text_domain() ),
					'hide' => true,
					'fields' => array(
						'use_post_image' => array(
							'type' => 'checkbox',
							'label' => __( 'Use Posts Image as Background', $acftt->plugin_text_domain() ),
							'default' => false,
						),
						'image_size' => array(
							'type' => 'image-size',
							'label' => __( 'Image Size', $acftt->plugin_text_domain() ),
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

siteorigin_widget_register('echelonso-func-the_post', __FILE__, 'EchelonSOFuncThePost');
