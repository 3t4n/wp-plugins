<?php
/*
Widget Name: The Terms
Description: Displays the terms for a post.
Author: Echelon Team
Author URI: http://echelonso.com
*/

class EchelonSOFuncTheTerms extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-the_terms',
			__('The Terms', $acftt->plugin_text_domain()),
			array(
				'description' => __('Displays the terms for a post.', $acftt->plugin_text_domain()),
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
							'type' => 'icon'
						)
					)
				),
				'option' => array(
					'type' => 'section',
					'label' => __( 'Options' , $acftt->plugin_text_domain() ),
					'hide' => true,
					'fields' => array(
						'taxonomy' => array(
							'type' => 'text',
							'label' => __( 'Taxonomy Slug', $acftt->plugin_text_domain() ),
							'default' => '',
						),
						'before' => array(
							'type' => 'text',
							'label' => __( 'Before', $acftt->plugin_text_domain() ),
							'description' => __( 'Text to show before the list.' , $acftt->plugin_text_domain() ),
							'default' => '',
						),
						'sep' => array(
							'type' => 'text',
							'label' => __( 'Seperator', $acftt->plugin_text_domain() ),
							'description' => __( 'Text to seperate list items.' , $acftt->plugin_text_domain() ),
							'default' => ', ',
						),
						'after' => array(
							'type' => 'text',
							'label' => __( 'After', $acftt->plugin_text_domain() ),
							'description' => __( 'Text to show after the list.' , $acftt->plugin_text_domain() ),
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

siteorigin_widget_register('echelonso-func-the_terms', __FILE__, 'EchelonSOFuncTheTerms');
