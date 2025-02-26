<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.innovativeroots.com/
 * @since      1.1.0
 *
 * @package    Advertising ShortCode
 * @subpackage Advertising/admin/functions
 */
 	
	function get_text_value($id, $input_name, $default_value='')
	{
		$value = get_post_meta($id, $input_name, true);
		if($value!="")			 
			// Use esc_attr to escape the value as an HTML attribute
			return $value !== '' ? esc_attr($value) : $default_value;
			//return get_post_meta( $id, $input_name, true );
		else
			return $default_value;
	}	
	function get_checkbox_value($id, $input_name)
	{
		if(get_post_meta( $id, $input_name, true )!="")
			return 'checked="checked"';
		else
			return "";
	}

?>