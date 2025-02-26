<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Plugin Model Class
 *
 * Handles generic functionailties
 *
 * @package Subtitle
 * @since 1.1.0
 */

 class Wpd_sub_title_Model {
 	 	
 	//class constructor
	public function __construct()	{		

	}
		
	/**
	  * Escape Tags & Slashes
	  *
	  * Handles escapping the slashes and tags
	  *
	  * @package Subtitle
	  * @since 1.1.0
	  */
	 public function wpd_sub_title_escape_attr($data){
	  
	 	return esc_attr(stripslashes($data));
	 }
	 
	 /**
	  * Stripslashes 
 	  * 
  	  * It will strip slashes from the content
	  *
	  * @package Subtitle
	  * @since 1.1.0
	  */
	 public function wpd_sub_title_escape_slashes_deep($data = array(),$flag = false){
	 	
	 	//return stripslashes_deep($data);
	 	if($flag != true) {
			$data = $this->wpd_sub_title_nohtml_kses($data);
		}
		$data = stripslashes_deep($data);
		return $data;
	 }
	 
	/**
	 * Strip Html Tags 
	 * 
	 * It will sanitize text input (strip html tags, and escape characters)
	 * 
	 * @package Subtitle
	 * @since 1.1.0
	 */
	public function wpd_sub_title_nohtml_kses($data = array()) {
		
		if ( is_array($data) ) {
			
			$data = array_map(array($this,'wpd_sub_title_nohtml_kses'), $data);
			
		} else if ( is_string( $data ) ) {
			
			$data = wp_filter_nohtml_kses($data);
		}
		
		return $data;
	}
 }
?>