<?php
/*
Widget Name: Get Avatar
Description: Display the authors avatar.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOFuncGetAvatar extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-get_avatar',
			__('Get Avatar', $acftt->plugin_text_domain()),
			array(
				'description' => __('Display the authors avatar.', $acftt->plugin_text_domain()),
			),
			array(
				
			),
			array(
				'option' => array(
					'type' => 'section',
					'label' => __( 'Options' , $acftt->plugin_text_domain() ),
					'hide' => true,
					'fields' => array(
						'size' => array(
							'type' => 'multi-measurement',
							'autofill' => true,
							'default' => '96px',
							'label' => __( 'Size' , $acftt->plugin_text_domain() ),
							'measurements' => array(
								'size' => array(
									'units' => array( 'px' ),
								)
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
	
}

siteorigin_widget_register('echelonso-func-get_avatar', __FILE__, 'EchelonSOFuncGetAvatar');
