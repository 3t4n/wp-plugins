<?php
/*
Widget Name: Comments Link
Description: Displays a link to the current post's comments.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOFuncCommentslink extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-comments_link',
			__('Comments Link', $acftt->plugin_text_domain() ),
			array(
				'description' => __('Displays a link to the current posts comments.', $acftt->plugin_text_domain() ),
			),
			array(
				
			),
			array(
				'option' => array(
					'type' => 'section',
					'label' => __( 'Options' , $acftt->plugin_text_domain() ),
					'hide' => true,
					'fields' => array(
						'link_text' => array(
							'type' => 'text',
							'label' => __( 'Link Text', $acftt->plugin_text_domain() ),
							'description' => __( 'The text to use for the link.' , $acftt->plugin_text_domain() ),
							'default' => 'Comments',
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

siteorigin_widget_register('echelonso-func-comments_link', __FILE__, 'EchelonSOFuncCommentsLink');
