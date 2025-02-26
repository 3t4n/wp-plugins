<?php
/*
Widget Name: The Author Meta
Description: Display an author meta field.
Author: Echelon
Author URI: http://echelonso.com
*/

class EchelonSOFuncTheAuthorMeta extends SiteOrigin_Widget {
	
	function __construct() {
		
		global $acftt;
		
		parent::__construct(
			'echelonso-func-the_author_meta',
			__('The Author Meta', $acftt->plugin_text_domain()),
			array(
				'description' => __('Display an author meta field.', $acftt->plugin_text_domain()),
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
							'description' => __( 'Show an icon before the meta.' , $acftt->plugin_text_domain() ),
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
							'label' => __( 'Create Link to Author Archive', $acftt->plugin_text_domain() ),
							'default' => false,
						),
						'meta_field' => array(
							'type' => 'select',
							'label' => __( 'Meta Field', $acftt->plugin_text_domain() ),
							'default' => 'display_name',
							'description' => __( 'Which meta field to display.' , $acftt->plugin_text_domain() ),
							'options' => array(
								'display_name' => __( 'Display Name', $acftt->plugin_text_domain() ),
								'description' => __( 'Description', $acftt->plugin_text_domain() ),
								'first_name' => __( 'First Name', $acftt->plugin_text_domain() ),
								'last_name' => __( 'Last Name', $acftt->plugin_text_domain() ),
								'nickname' => __( 'Nickname', $acftt->plugin_text_domain() ),
								'user_description' => __( 'User Description', $acftt->plugin_text_domain() ),
								'user_email' => __( 'User Email', $acftt->plugin_text_domain() ),
								'user_firstname' => __( 'User Firstname', $acftt->plugin_text_domain() ),
								'user_lastname' => __( 'User Lastname', $acftt->plugin_text_domain() ),
								'user_url' => __( 'User URL', $acftt->plugin_text_domain() ),
							)
						),
						'before' => array(
							'type' => 'text',
							'label' => __( 'Text Before', $acftt->plugin_text_domain() ),
							'description' => __( 'Content to show before the meta field.', $acftt->plugin_text_domain() ),
							'default' => '',
						),
						'after' => array(
							'type' => 'text',
							'label' => __( 'Text After', $acftt->plugin_text_domain() ),
							'description' => __( 'Content to show after the meta field.' , $acftt->plugin_text_domain() ),
							'default' => '',
						),
						'html_tag' => array(
							'type' => 'select',
							'label' => __( 'HTML Tag', $acftt->plugin_text_domain() ),
							'default' => 'none',
							'description' => __( 'Wrap the ouput in a HTML tag.' , $acftt->plugin_text_domain() ),
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

siteorigin_widget_register('echelonso-func-the_author_meta', __FILE__, 'EchelonSOFuncTheAuthorMeta');
