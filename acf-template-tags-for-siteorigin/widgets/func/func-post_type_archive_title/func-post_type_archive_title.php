<?php

/*
Widget Name: Post Type Archive Title
Description: Display the post type archive title.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOFuncPostTypeArchiveTitle extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-post_type_archive_title',
			__('Post Type Archive Title', $acftt->plugin_text_domain()),
			array(
				'description' => __('Display the post type archive title.', $acftt->plugin_text_domain()),
			),
			array(
				
			),
			array(
				'option' => array(
					'type' => 'section',
					'label' => __( 'Options' , $acftt->plugin_text_domain() ),
					'hide' => true,
					'fields' => array(
						'before' => array(
							'type' => 'text',
							'label' => __( 'Before', $acftt->plugin_text_domain() ),
							'description' => __( 'Text to show before the title.' , $acftt->plugin_text_domain() ),
							'default' => '',
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
	
}

siteorigin_widget_register('echelonso-func-post_type_archive_title', __FILE__, 'EchelonSOFuncPostTypeArchiveTitle');
