<?php
/*
Plugin Name: Advanced Forms Processors
Plugin URI: http://www.pressbits.click
Description: Adds form processors to the Advanced Forms plugin
Version: 1.0.0
Author: PressBits
Author URI: http://www.pressbits.click
*/


require_once('acf-processors-tgmpa.php');
require_once('lib/tgmpa/class-tgm-plugin-activation.php');


add_action('af/form/settings_fields', 'afprocs_settings_fields');
add_action('af/form/submission', 'afprocs_exec_processors', 10, 3);
add_action('tgmpa_register', 'afprocs_tgmpa_register_required_plugins', 99);


function afprocs_exec_processors($form, $fields, $args)
{  	$fieldValues = get_fields($form['post_id']);
	$processors = $fieldValues['processors'];
	

	if(!empty($processors))
	{
		foreach($processors as $processor)
		{	
			switch($processor['acf_fc_layout'])
			{
				case "redirect":
					
					wp_redirect($processor['url']);
					
					exit();
					
				break;
				
				
				case "create_post":
					
					afprocs_create_post($processor['post_type'], $fields);
					
				break;
				
			}
			
		}
		
	}
	
}


function afprocs_create_post($postType, $fields)
{
	$postTitle = af_get_field('post_title');
	$postContent = af_get_field('post_content');
	
	
	if(empty($postTitle))
	{	$postTitle = uniqid();	
	}
	
	if(empty($postContent))
	{	$postContent = "";	
	}
	
	
    $postData = 
		array
		(	'post_type' => $postType,
			'post_status' => 'publish',
			'post_title' => $postTitle,
			'post_content' => $postContent,
		);
	
	
	$postId = wp_insert_post($postData);
	
	
	foreach($fields as $field)
	{	af_save_field($field['name'], $postId);
	}
	
}


function afprocs_settings_fields($settings_field_group)
{	$tabField =
		array
		(	'key' => 'field_form_processors_tab',
			'label' => '<span class="dashicons dashicons-star-filled"></span>Processors',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array ('width' => '', 'class' => '', 'id' => ''),
			'placement' => 'left',
			'endpoint' => 0
		);
                                
	
	$processorsField = array (
			'key' => 'field_form_processors',
			'label' => 'Processors',
			'name' => 'processors',
			'type' => 'flexible_content',
			'value' => NULL,
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'hide_admin' => 0,
			'layouts' => array (
				'59ffdca45db00' => array (
					'key' => '59ffdca45db00',
					'name' => 'create_post',
					'label' => 'Create Post',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_59ffdcc35db01',
							'label' => 'Post Type',
							'name' => 'post_type',
							'type' => 'posttype_select',
							'value' => NULL,
							'instructions' => 'The type of post to create',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'hide_admin' => 0,
							'default_value' => '',
							'allow_null' => 0,
							'multiple' => 0,
							'placeholder' => '',
							'disabled' => 0,
							'readonly' => 0,
						),
					),
					'min' => '',
					'max' => '',
				),
				'59deb5ec2e21a' => array (
					'key' => '59deb5ec2e21a',
					'name' => 'redirect',
					'label' => 'Redirect',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_59deb64539d86',
							'label' => 'URL',
							'name' => 'url',
							'type' => 'url',
							'value' => NULL,
							'instructions' => 'Redirect users to a URL once the form has been successfully submitted',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'hide_admin' => 0,
							'default_value' => '',
							'placeholder' => 'https://www.mysite.com/thank-you/',
						),
					),
					'min' => '',
					'max' => '',
				),
			),
			'button_label' => 'Add Processor',
			'min' => '',
			'max' => ''
		);
   	
   	
   	array_push($settings_field_group['fields'], $tabField, $processorsField);
                              
                

	return $settings_field_group;
	
}
