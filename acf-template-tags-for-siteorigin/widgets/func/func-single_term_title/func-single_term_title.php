<?php

/*
Widget Name: Single Term Title
Description: Display the single term title.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOFuncSingleTermTitle extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-single_term_title',
			__('Single Term Title', $acftt->plugin_text_domain()),
			array(
				'description' => __('Display the single term title.', $acftt->plugin_text_domain()),
			),
			array(
				
			),
			array(
				'option' => array(
					'type' => 'section',
					'label' => __( 'Options' , $acftt->plugin_text_domain() ),
					'hide' => true,
					'fields' => array(
						'prefix' => array(
							'type' => 'text',
							'label' => __( 'Prefix', $acftt->plugin_text_domain() ),
							'default' => '',
						),
						'before`' => array(
							'type' => 'text',
							'label' => __( 'Text Before', $acftt->plugin_text_domain() ),
							'default' => '',
						),
						'after' => array(
							'type' => 'text',
							'label' => __( 'Text After', $acftt->plugin_text_domain() ),
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

siteorigin_widget_register('echelonso-func-single_term_title', __FILE__, 'EchelonSOFuncSingleTermTitle');
