<?php
/*
Widget Name: Count Comments
Description: Show a posts approved comments count.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOFuncWpCountComments extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-wp_count_comments',
			__('Count Comments', $acftt->plugin_text_domain() ),
			array(
				'description' => __('Show a posts approved comments count.', $acftt->plugin_text_domain() ),
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
						'before' => array(
							'type' => 'text',
							'label' => __( 'Before', $acftt->plugin_text_domain() ),
							'description' => __( 'Text to show before the count.' , $acftt->plugin_text_domain() ),
							'default' => '',
						),
						'after' => array(
							'type' => 'text',
							'label' => __( 'After', $acftt->plugin_text_domain() ),
							'description' => __( 'Text to show after the count.' , $acftt->plugin_text_domain() ),
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

siteorigin_widget_register('echelonso-func-wp_count_comments', __FILE__, 'EchelonSOFuncWpCountComments');
