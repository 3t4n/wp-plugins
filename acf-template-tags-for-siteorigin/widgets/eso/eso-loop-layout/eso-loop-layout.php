<?php
/*
Widget Name: Loop Layout
Description: Run a loop for a reusable layout based on a posts query.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOEsoLoopLayout extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-eso-loop-layout',
			__('Loop Layout', $acftt->plugin_text_domain() ),
			array(
				'description' => __('Run a loop for a reusable layout based on a posts query.', $acftt->plugin_text_domain() ),
			),
			array(
				
			),
			array(
				'option' => array(
					'type' => 'section',
					'label' => __( 'Options' , $acftt->plugin_text_domain() ),
					'hide' => true,
					'fields' => array(
						'layout' => array(
							'type' => 'select',
							'label' => __( 'Layout', $acftt->plugin_text_domain() ),
							'default' => '0',
							'options' => $acftt->get_layout_select_options()
						),
						'posts' => array(
							'type' => 'posts',
							'label' => __('Some Posts Query', $acftt->plugin_text_domain() ),
						)
					)
				),
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

siteorigin_widget_register('echelonso-eso-loop-layout', __FILE__, 'EchelonSOEsoLoopLayout');
