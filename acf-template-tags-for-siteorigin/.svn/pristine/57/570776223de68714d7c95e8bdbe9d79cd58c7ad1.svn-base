<?php
/*
Widget Name: The Permalink
Description: Displays the permalink for the current post.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOFuncThePermalink extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-the_permalink',
			__('The Permalink', $acftt->plugin_text_domain() ),
			array(
				'description' => __('Displays the permalink for the current post.', $acftt->plugin_text_domain() ),
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
							'description' => __('The text to use for the permalink.', $acftt->plugin_text_domain() ),
							'default' => 'Link Text',
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

siteorigin_widget_register('echelonso-func-the_permalink', __FILE__, 'EchelonSOFuncThePermalink');
