<?php
/**********************************************************************
 *  Plugin Name: Admin Column View Selector
 *  Description:This Plugin adds the ability to change the columns on the admin Dashboard screen. 
 *  Version: 2.0.0
 *  Author: Gavin R. Nesmith
 *  License: GPLv2
 * ********************************************************************/
	function Dashbard_View_Column(){
		add_screen_option(
		'layout_columns', array(
		'max' => 4,
		'default' =>2
		));
		
	}
	add_action('admin_head-index.php','Dashbard_View_Column');
	
	?>