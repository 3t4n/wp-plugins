<?php
/**
 * @package ajax-extend 
 * @version 1.0
 */
/*
Plugin Name: ajax-extend
Plugin URI: 
Description: ajax-extend' allows you call functions, a function in one plugin or a function you write or even a core wordpress function, via Ajax, in the easiest way.
Author: sunjianle
Version: 1.0
*/

add_action( "wp", "ajax_operation" );

function ajax_operation()
{
	/*
	 * ajax_extend_mark : 
	 * ajax_extend_action £º
	 */
	if(isset($_REQUEST["ajax_extend_mark"]))
	{
		$function_name = $_REQUEST["ajax_extend_action"];
		if(!function_exists($function_name))
			return;
		call_user_func($function_name);
		die();
	}
}

?>
