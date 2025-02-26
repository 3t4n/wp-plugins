<?php

/*
Widget Name: Comments Template
Description: Display the comments template.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOFuncCommentsTemplate extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-comments_template',
			__('Comments Template', $acftt->plugin_text_domain() ),
			array(
				'description' => __('Display the comments template.', $acftt->plugin_text_domain() ),
			),
			array(
				
			),
			array(
				
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

siteorigin_widget_register('echelonso-func-comments_template', __FILE__, 'EchelonSOFuncCommentsTemplate');
