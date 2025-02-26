<?php

/*
Widget Name: Get Term By
Description: Display information about a Taxonomy Term.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOFuncGetTermBy extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-get_term_by',
			__('Get Term By', $acftt->plugin_text_domain()),
			array(
				'description' => __('Display information about a Taxonomy Term.', $acftt->plugin_text_domain()),
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
						'link' => array(
							'type' => 'checkbox',
							'label' => __( 'Link to term archive', $acftt->plugin_text_domain() ),
							'description' => __( 'Wrap the result in a link to the term archive.' , $acftt->plugin_text_domain() ),
							'default' => false,
						),
						'taxonomy' => array(
							'type' => 'text',
							'label' => __( 'Taxonomy Slug', $acftt->plugin_text_domain() ),
							'description' => __( 'The taxonomy slug containing the term.' , $acftt->plugin_text_domain() ),
							'default' => '',
						),
						'term' => array(
							'type' => 'text',
							'label' => __( 'Term Slug', $acftt->plugin_text_domain() ),
							'description' => __( 'Slug for the taxonomy term.' , $acftt->plugin_text_domain() ),
							'default' => '',
						),
						'display' => array(
							'type' => 'select',
							'label' => __( 'Display', $acftt->plugin_text_domain() ),
							'description' => __( 'Display which part of the term data.' , $acftt->plugin_text_domain() ),
							'default' => 'name',
							'options' => array(
								'name' => __( 'Name', $acftt->plugin_text_domain() ),
								'description' => __( 'Description', $acftt->plugin_text_domain() ),
								'count' => __( 'Count', $acftt->plugin_text_domain() ),
							)
						),
						'text_before' => array(
							'type' => 'text',
							'label' => __( 'Before', $acftt->plugin_text_domain() ),
							'description' => __( 'Content to show before the term.' , $acftt->plugin_text_domain() ),
							'default' => '',
						),
						'text_after' => array(
							'type' => 'text',
							'label' => __( 'After', $acftt->plugin_text_domain() ),
							'description' => __( 'Content to show after the term.' , $acftt->plugin_text_domain() ),
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

siteorigin_widget_register('echelonso-func-get_term_by', __FILE__, 'EchelonSOFuncGetTermBy');
