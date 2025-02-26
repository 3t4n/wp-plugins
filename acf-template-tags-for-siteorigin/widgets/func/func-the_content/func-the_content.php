<?php
/*
Widget Name: The Content
Description: Displays the current loop items content (use with singles).
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOFuncTheContent extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-the_content',
			__('The Content', $acftt->plugin_text_domain()),
			array(
				'description' => __('Displays the current loop items content (use with singles).', $acftt->plugin_text_domain()),
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
	
	function get_form_teaser(){
		global $acftt;
		return $acftt->form_teaser();
	}
}

siteorigin_widget_register('echelonso-func-the_content', __FILE__, 'EchelonSOFuncTheContent');
