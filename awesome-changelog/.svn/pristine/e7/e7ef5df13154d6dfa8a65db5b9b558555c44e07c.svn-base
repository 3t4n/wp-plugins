<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_ac_post_meta{
	
	public function __construct(){

		add_action('add_meta_boxes', array($this, 'add_meta_boxes_function'));
		add_action('save_post', array($this, 'add_meta_boxes_save_function'));
	}
	
	public function add_meta_boxes_function($post_type) {
		
		$ac_options_select_post_type = get_option( 'ac_options_select_post_type' );
		
		


		if(empty($ac_options_select_post_type)){$post_types =  array('post');}
		else{$post_types =  $ac_options_select_post_type;}

	
		//$post_types =  $ac_options_select_post_type;
		
		//var_dump($post_types);
		
		
		if (in_array($post_type, $post_types)) {
		
			add_meta_box('changelog_metabox',
				__( 'Change Log Data Box', 'awesome-changelog' ),
				array($this, 'changelog_metabox_function'),
				$post_type,
				'normal',
				'high'
			);
				
		}
	}
	
	public function changelog_metabox_function($post) {
 
        wp_nonce_field('changelog_nonce_check', 'changelog_nonce_check_value');
		
		require_once( AC_PLUGIN_DIR . 'templates/admin/metabox-changelog.php');		
		
   	}
	
	public function add_meta_boxes_save_function($post_id){
	 
		if (!isset($_POST['changelog_nonce_check_value'])) return $post_id;
		$nonce = $_POST['changelog_nonce_check_value'];
		if (!wp_verify_nonce($nonce, 'changelog_nonce_check')) return $post_id;

		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
	 
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}

		$product_changelog = stripslashes_deep( $_POST['product_changelog'] );
		update_post_meta( $post_id, 'product_changelog', $product_changelog );
		
		
		$ac_display_automatically = sanitize_text_field( $_POST['ac_display_automatically'] );
		update_post_meta( $post_id, 'ac_display_automatically', $ac_display_automatically );
		
		$ac_display_reverse = sanitize_text_field( $_POST['ac_display_reverse'] );
		update_post_meta( $post_id, 'ac_display_reverse', $ac_display_reverse );				
		
		$ac_head_line = sanitize_text_field( $_POST['ac_head_line'] );
		update_post_meta( $post_id, 'ac_head_line', $ac_head_line );		
				
	}
	
} new class_ac_post_meta();