<?php
/*
Widget Name: The Tags
Description: Displays a linked list of tags.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOFuncTheTags extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-the_tags',
			__('The Tags', $acftt->plugin_text_domain()),
			array(
				'description' => __('Displays a linked list of tags.', $acftt->plugin_text_domain()),
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
							'description' => __( 'Show an icon before the list.' , $acftt->plugin_text_domain() ),
						)
					)
				),
				'option' => array(
					'type' => 'section',
					'label' => __( 'Options' , $acftt->plugin_text_domain() ),
					'hide' => true,
					'fields' => array(
						'before' => array(
							'type' => 'text',
							'label' => __( 'Before', $acftt->plugin_text_domain() ),
							'description' => __( 'Content to show before the list.' , $acftt->plugin_text_domain() ),
							'default' => '',
						),
						'sep' => array(
							'type' => 'text',
							'label' => __( 'Seperator', $acftt->plugin_text_domain() ),
							'description' => __( 'Character to separate the list.' , $acftt->plugin_text_domain() ),
							'default' => ', ',
						),
						'after' => array(
							'type' => 'text',
							'label' => __( 'After', $acftt->plugin_text_domain() ),
							'description' => __( 'Content to show after the list.' , $acftt->plugin_text_domain() ),
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
	
	function get_form_teaser(){
		global $acftt;
		return $acftt->form_teaser();
	}
}

siteorigin_widget_register('echelonso-func-the_tags', __FILE__, 'EchelonSOFuncTheTags');
