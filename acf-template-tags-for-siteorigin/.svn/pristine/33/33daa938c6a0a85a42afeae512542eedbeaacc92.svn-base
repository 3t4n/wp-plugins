<?php

/*
Widget Name: The Archive Description
Description: Display category, tag, term, or author description.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOFuncTheArchiveDescription extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-the_archive_description',
			__('The Archive Description', $acftt->plugin_text_domain()),
			array(
				'description' => __('Display category, tag, term, or author description.', $acftt->plugin_text_domain()),
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

siteorigin_widget_register('echelonso-func-the_archive_description', __FILE__, 'EchelonSOFuncTheArchiveDescription');
