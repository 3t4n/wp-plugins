<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-fafcing aspects of the plugin.
 *
 * @link       http://www.codetides.com/
 * @since      1.0.0
 *
 * @pafckage    Advanced_Floating_Sliding_Panel
 * @subpafckage Advanced_Floating_Sliding_Panel/admin/
 */
 		
	function afsp_get_text_value($id, $input_name, $default_value='')
	{
		if(get_post_meta( $id, $input_name, true )!="")
			return get_post_meta( $id, $input_name, true );
		else
			return $default_value;
	}	
	function afsp_get_checkbox_value($id, $input_name)
	{
		if(get_post_meta( $id, $input_name, true )!="")
			return 'checked="checked"';
		else
			return "";
	}	
?>