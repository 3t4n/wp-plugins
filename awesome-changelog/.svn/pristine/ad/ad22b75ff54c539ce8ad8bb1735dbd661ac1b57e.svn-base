<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class class_awesome_changelog_functions{
	
	public function __construct() {

		//add_action('add_meta_boxes', array($this, 'meta_boxes_question'));
		//add_action('save_post', array($this, 'meta_boxes_question_save'));

	}
	
	function changlog_status(){
		
		$logs_type['add'] = array(
						'title'=>__('Add','awesome-changelog'),
						'css'=>'background:#16A05C;',						
						
						);
						
		$logs_type['removed'] = array(
						'title'=>__('Removed','awesome-changelog'),
						'css'=>'background:#3879D9;',
						);						
						
		$logs_type['fixed'] = array(
						'title'=>__('Fixed','awesome-changelog'),
						'css'=>'background:#3879D9;',
						);						
						
		$logs_type['update'] = array(
						'title'=>__('Update','awesome-changelog'),
						'css'=>'background:#1488C4;',	
						);							
		
		return apply_filters('awesome_changelog_logs_type', $logs_type);
		
		
		}
	
	
	


	

} new class_awesome_changelog_functions();