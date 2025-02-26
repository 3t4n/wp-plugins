<?php
/*
Widget Name: Blog Info
Description: Displays information about the current site.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOFuncBloginfo extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-bloginfo',
			__('Blog Info', $acftt->plugin_text_domain() ),
			array(
				'description' => __('Displays information about the current site.', $acftt->plugin_text_domain() ),
			),
			array(
				
			),
			array(
				'option' => array(
					'type' => 'section',
					'label' => __( 'Options' , $acftt->plugin_text_domain() ),
					'hide' => true,
					'fields' => array(
						'show' => array(
							'type' => 'select',
							'label' => __( 'Show', $acftt->plugin_text_domain() ),
							'description' => __( 'What information to display.' , $acftt->plugin_text_domain() ),
							'default' => 'name',
							'options' => array(
								'name' => __( 'Name', $acftt->plugin_text_domain() ),
								'description' => __( 'Description', $acftt->plugin_text_domain() ),
								'url' => __( 'URL', $acftt->plugin_text_domain() ),
								'wpurl' => __( 'WP URL', $acftt->plugin_text_domain() ),
							)
						),
						'create_home_link' => array(
							'type' => 'checkbox',
							'label' => __( 'Create as Home Link', $acftt->plugin_text_domain() ),
							'description' => __( 'Create as a link to the sites home url.' , $acftt->plugin_text_domain() ),
							'default' => false
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

siteorigin_widget_register('echelonso-func-bloginfo', __FILE__, 'EchelonSOFuncBloginfo');
