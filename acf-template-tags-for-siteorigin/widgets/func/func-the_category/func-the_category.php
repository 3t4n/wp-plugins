<?php
/*
Widget Name: The Category
Description: Displays a link to the category or categories a post belongs to.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOFuncTheCategory extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-the_category',
			__('The Category', $acftt->plugin_text_domain()),
			array(
				'description' => __('Displays a link to the category or categories a post belongs to.', $acftt->plugin_text_domain()),
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

siteorigin_widget_register('echelonso-func-the_category', __FILE__, 'EchelonSOFuncTheCategory');
