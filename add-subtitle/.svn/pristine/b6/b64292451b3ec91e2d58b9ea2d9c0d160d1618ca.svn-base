<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

	/**
	* genric class functionalities
	 *
	 * @package Subtitle
	 * @since 1.0.0
	 */
class wpd_sub_title_main {
	
	public function __construct(){ 
		
	}
	
	/**
	
	 * Adding function to display title
	 *
	 * @package Subtitle
	 * @since 1.0.0
	 */

	 public function wpd_sub_title_add_content_after_header($content){
		 
		global $post;
		
	    $prefix = WPD_SUB_TITLE_META_PREFIX;
		
		$output_content = get_post_meta( $post->ID, $prefix . 'title', true );
		  
		$customcontent = '<h2 class="sub-title-primary">' . $output_content . '</h2> ';
		
		$customcontent .= $content;
		
		return $customcontent;
	
	} 
	/**
	
	 * Adding Hooks
	 *
	 * @package Subtitle
	 * @since 1.0.0
	 */
	public function add_hooks() {
		
		//add filter to append the content with custom markup
		add_filter('the_content', array($this, 'wpd_sub_title_add_content_after_header')); 
		
	}
	
}
?>