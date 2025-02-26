<?php
/*
Widget Name: The Title
Description: Displays the current loop items title.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOFuncTheTitle extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-the_title',
			__('The Title', $acftt->plugin_text_domain() ),
			array(
				'description' => __('Displays the current loop items title.', $acftt->plugin_text_domain() ),
			),
			array(
				
			),
			array(
				'option' => array(
					'type' => 'section',
					'label' => __( 'Options' , $acftt->plugin_text_domain() ),
					'hide' => true,
					'fields' => array(
						'link' => array(
							'type' => 'checkbox',
							'label' => __( 'Create Self Link', $acftt->plugin_text_domain() ),
							'description' => __( 'The title will link to the posts permalink.', $acftt->plugin_text_domain() ),
							'default' => false,
						),
						'html_tag' => array(
							'type' => 'select',
							'label' => __( 'HTML Tag', $acftt->plugin_text_domain() ),
							'default' => 'none',
							'options' => array(
								'none' => __( 'None', $acftt->plugin_text_domain() ),
								'h1' => __( 'H1', $acftt->plugin_text_domain() ),
								'h2' => __( 'H2', $acftt->plugin_text_domain() ),
								'h3' => __( 'H3', $acftt->plugin_text_domain() ),
								'h4' => __( 'H4', $acftt->plugin_text_domain() ),
								'h5' => __( 'H5', $acftt->plugin_text_domain() ),
								'h6' => __( 'H6', $acftt->plugin_text_domain() ),
								'p' => __( 'Paragraph', $acftt->plugin_text_domain() ),
							)
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

siteorigin_widget_register('echelonso-func-the_title', __FILE__, 'EchelonSOFuncTheTitle');
