<?php
/*
Plugin Name: Mindvalley Insert Edit Link
Plugin URI: http://mindvalley.com
Description: Insert Admin Only Edit Link at the end for single posts & pages
Author: Mindvalley
Version: 0.2.4
*/

class MVInsertEditLink{

	function MVInsertEditLink(){
		
		add_action('wp_head', array(&$this, 'capture_original_post'));
		add_action('wp_print_styles', array(&$this, 'enqueue_stylesheet'));	
		
		$this->enqueue_scripts();
	}
	
	function enqueue_scripts(){
		wp_enqueue_script('jquery');
		$pluginURL = WP_PLUGIN_URL.'/'.str_replace( basename(__FILE__), "", plugin_basename(__FILE__));
		$myScriptUrl = $pluginURL.'script.js';
		wp_register_script('mv_inserteditlink', $myScriptUrl);
		wp_enqueue_script('mv_inserteditlink','jquery',true);
	}
	
	function capture_original_post(){
		global $wp_query,$mvInsertEditLinkPost;
		$mvInsertEditLinkPost = $wp_query->post;
		
		if( is_single() || is_page() ){
			add_filter('wp_footer', array(&$this, 'insert_edit_link'));
		}
		
	}
	
	function enqueue_stylesheet(){
		$pluginURL = WP_PLUGIN_URL.'/'.str_replace( basename(__FILE__), "", plugin_basename(__FILE__));
		$myStyleUrl = $pluginURL.'style.css';
		wp_register_style('MVinsertEditLink', $myStyleUrl);
		wp_enqueue_style( 'MVinsertEditLink');

	}

	function insert_edit_link($content){
		global $mvInsertEditLinkPost;
		
		$post = $mvInsertEditLinkPost;
		
		// Check post still exists
		if ( !$post = &get_post( $post->ID ) )
			return;
	
		// Get post edit link, returns empty if user not able to edit
		if ( !$url = get_edit_post_link( $post->ID ) )
			return;
	
		$link = 'EDIT';
		$post_type_obj = get_post_type_object( $post->post_type );
		
		echo $content . '<br /><div id="insert-edit-link" onclick="window.open(\'' . $url . '\');"><center><span class="edit-link"><a target="_blank" class="post-edit-link" href="' . $url . '" title="' . esc_attr( $post_type_obj->labels->edit_item ) . '" style="color:#fff" onclick="return false;">' . $link . '</a></center></span></div>';
	}
}

new MVInsertEditLink();