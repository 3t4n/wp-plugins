<?php
/*
Widget Name: The Excerpt
Description: Displays the current loop items excerpt.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOFuncTheExcerpt extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-the_excerpt',
			__('The Excerpt', $acftt->plugin_text_domain()),
			array(
				'description' => __('Displays the current loop items excerpt.', $acftt->plugin_text_domain()),
			),
			array(
				
			),
			array(
				'option' => array(
					'type' => 'section',
					'label' => __( 'Options' , $acftt->plugin_text_domain() ),
					'hide' => true,
					'fields' => array(
						'words' => array(
							'type' => 'number',
							'label' => __( 'Words to Show', $acftt->plugin_text_domain() ),
							'default' => 50,
						),
						'more_text' => array(
							'type' => 'text',
							'label' => __( 'Read More Text', $acftt->plugin_text_domain() ),
							'default' => '...',
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

siteorigin_widget_register('echelonso-func-the_excerpt', __FILE__, 'EchelonSOFuncTheExcerpt');
