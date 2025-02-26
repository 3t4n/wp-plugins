<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Admin Pages Class
 *
 * Handles generic Admin functionailties
 *
 * @package Subtitle
 * @since 1.1.0
 */

class Wpd_sub_title_Admin_Pages {

	public $model;

	public function __construct()	{

		global $wpd_sub_title_model;
		$this->model = $wpd_sub_title_model;
	}

	/**
	 * Add Custom Fields in meta box
	 * 
	 * Handles to add custom field
	 * with custom html in meta box
	 *
	 * @package Subtitle
	 * @since 1.1.0
	 */
	public function wpd_sub_title_addtitle( $post ) {
		
		include( WPD_SUB_TITLE_ADMIN_DIR . '/forms/wpd-sub-title-meta.php' );
	}
	
	/**
	 * Save Custom Meta
	 * 
	 * Handles to save custom meta
	 *
	 * @package Subtitle
	 * @since 1.1.0
	 */
	public function wpd_sub_title_save_meta( $post_id ) {
		
		global $post_type;
		
		$prefix = WPD_SUB_TITLE_META_PREFIX;
		
		$post_type_object = get_post_type_object( $post_type );
		
		// Check for which post type we need to add the meta box
		$pages = get_post_types();

		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )                // Check Autosave
		|| ( ! isset( $_POST['post_ID'] ) || $post_id != $_POST['post_ID'] )        // Check Revision
		|| ( ! in_array( $post_type, $pages ) )              // Check if current post type is supported.
		|| ( ! current_user_can( $post_type_object->cap->edit_post, $post_id ) ) )       // Check permission
		{
		  return $post_id;
		}
		
		// Update Custom Title
		if( isset( $_POST[ $prefix . 'title' ] ) ) {
			
			update_post_meta( $post_id, $prefix . 'title', $_POST[ $prefix . 'title' ] );
		}
		
	}
	
/**
	
	 * Adding Hooks
	 *
	 * @package Subtitle
	 * @since 1.1.0
	 */
	public function add_hooks() {
		
		// add action to add custom meta box in post and page
	
		add_action( 'edit_form_after_title', array( $this, 'wpd_sub_title_addtitle' )); 
		add_action( 'save_post', array( $this, 'wpd_sub_title_save_meta' ) );
		
	}
	
	
}
