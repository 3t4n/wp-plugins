<?php
/*
Widget Name: Placeholder Image
Description: Create a placeholder.com image.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOEsoPlaceholderCom extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-eso-placeholder-com',
			__('Placeholder Image', $acftt->plugin_text_domain()),
			array(
				'description' => __('Create a placeholder.com image.', $acftt->plugin_text_domain() ),
			),
			array(
				
			),
			array(
				'option' => array(
					'type' => 'section',
					'label' => __( 'Options' , $acftt->plugin_text_domain() ),
					'hide' => true,
					'fields' => array(
						'width' => array(
							'type' => 'number',
							'label' => __( 'Width', $acftt->plugin_text_domain() ),
							'default' => '',
						),
						'height' => array(
							'type' => 'number',
							'label' => __( 'Height', $acftt->plugin_text_domain() ),
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
		return 'variation_1';
	}
	
	function get_style_name($instance) {
		return false;
	}
	
}

siteorigin_widget_register('echelonso-eso-placeholder-com', __FILE__, 'EchelonSOEsoPlaceholderCom');
