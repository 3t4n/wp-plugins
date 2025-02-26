<?php
/*
Widget Name: The Date
Description: Displays the post date of the current loop item.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOFuncGetTheDate extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-get_the_date',
			__('The Date', $acftt->plugin_text_domain()),
			array(
				'description' => __('Displays the post date of the current loop item.', $acftt->plugin_text_domain()),
			),
			array(
				
			),
			array(
				'icon' => array(
					'type' => 'section',
					'label' => __( 'Icon' , $acftt->plugin_text_domain() ),
					'hide' => true,
					'fields' => array(
						'icon' => array(
							'type' => 'icon',
							'label' => __( 'Icon' , $acftt->plugin_text_domain() ),
							'description' => __( 'Show an icon before the date.' , $acftt->plugin_text_domain() ),
						)
					)
				),
				'option' => array(
					'type' => 'section',
					'label' => __( 'Options' , $acftt->plugin_text_domain() ),
					'hide' => true,
					'fields' => array(
						'before' => array(
							'label' => __( 'Before' , $acftt->plugin_text_domain() ),
							'description' => __( 'Content to show before the date.' , $acftt->plugin_text_domain() ),
							'type' => 'text',
							'default' => ''
						),
						'after' => array(
							'label' => __( 'After' , $acftt->plugin_text_domain() ),
							'description' => __( 'Content to show after the date.' , $acftt->plugin_text_domain() ),
							'type' => 'text',
							'default' => ''
						),
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

siteorigin_widget_register('echelonso-func-get_the_date', __FILE__, 'EchelonSOFuncGetTheDate');
