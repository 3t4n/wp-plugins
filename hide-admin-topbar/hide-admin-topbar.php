<?php
/*
Plugin Name: Hide Admin Topbar
Description: Hide admin topbar from fontend side for all the users.
Version: 1.0
Author: Dhiraj Suthar
*/


function hide_admin_topbar()
{
	add_filter( 'show_admin_bar', '__return_false' );
}
add_action('init', 'hide_admin_topbar', 10);
