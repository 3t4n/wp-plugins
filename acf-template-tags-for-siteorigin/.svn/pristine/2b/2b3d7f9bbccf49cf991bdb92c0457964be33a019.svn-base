<?php

/*
Widget Name: Get Search Form
Description: Get the search form.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOFuncGetSearchForm extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-get_search_form',
			__('Get Search Form', $acftt->plugin_text_domain()),
			array(
				'description' => __('Get the search form.', $acftt->plugin_text_domain()),
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

siteorigin_widget_register('echelonso-func-get_search_form', __FILE__, 'EchelonSOFuncGetSearchForm');
