<?php
/*
Widget Name: The Posts Pagination
Description: Adds the pagination links to the page.
Author: Echelon Team
Author URI: http://echelonso.com
*/

class EchelonSOFuncThePostsPagination extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-the_posts_pagination',
			__('The Posts Pagination', $acftt->plugin_text_domain()),
			array(
				'description' => __('Adds the pagination links to the page.', $acftt->plugin_text_domain()),
			),
			array(
				
			),
			array(
				'option' => array(
					'type' => 'section',
					'label' => __( 'Options' , $acftt->plugin_text_domain() ),
					'hide' => true,
					'fields' => array(
						'mid_size' => array(
							'type' => 'number',
							'label' => __( 'Pages to Show Each Side', $acftt->plugin_text_domain() ),
							'default' => 1,
						),
						'prev_text' => array(
							'type' => 'text',
							'label' => __( 'Prev Text', $acftt->plugin_text_domain() ),
							'default' => 'Prev',
						),
						'next_text' => array(
							'type' => 'text',
							'label' => __( 'Next Text', $acftt->plugin_text_domain() ),
							'default' => 'Next',
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

siteorigin_widget_register('echelonso-func-the_posts_pagination', __FILE__, 'EchelonSOFuncThePostsPagination');
