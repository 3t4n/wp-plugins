<?php
/*
Widget Name: The Search Query
Description: Displays the search query for the current request, if a search was made.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOFuncTheSearchQuery extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-the_search_query',
			__('The Search Query', $acftt->plugin_text_domain() ),
			array(
				'description' => __('Displays the search query for the current request, if a search was made.', $acftt->plugin_text_domain() ),
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

siteorigin_widget_register('echelonso-func-the_search_query', __FILE__, 'EchelonSOFuncTheSearchQuery');
