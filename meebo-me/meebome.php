<?php
/*
Plugin Name: meebo me Plugin
Version: 1.1.1
Plugin URI: http://ajaydsouza.com/wordpress/plugins/meebo-me-plugin/
Description: Display your chat widget from <a href="http://meebome.com">meebo me</a>. Add <code>&lt;?php if (function_exists('echo_meebome')) echo_meebome(); ?&gt;</code> where you want the widget to display. <a href="options-general.php?page=meebome_options">Configure...</a>
Author: Ajay D'Souza
Author URI: http://www.ajaydsouza.com/
*/

if (!defined('ABSPATH')) die("Aren't you supposed to come here via WP-Admin?");

define('MEEBOME_DIR', dirname(__FILE__));

/**********************************************************************
*					Main Function						*
*********************************************************************/
function echo_meebome() {
	$str = ald_meebome();
	echo $str;
}

function ald_meebome()
{
	$widgetid	=	get_option('meebome_widget_id');	// Widget ID generated from http://meebome.com
	$size		=	get_option('meebome_widget_size');		// Get Size setting
		
	if ($widgetid !='')		// Options have been set
	{
		if ($size == 'small') {
			$width = 160;
			$height = 250;
		}
		elseif ($size == 'regular') {
			$width = 190;
			$height = 275;
		}
		elseif ($size == 'super') {
			$width = 250;
			$height = 300;
		}
		
		$str = "<object type=\"application/x-shockwave-flash\" data=\"http://widget.meebo.com/mm.swf?" . $widgetid . "\" width=\"" . $width . "\" height=\"" . $height . "\"><param name=\"movie\" value=\"http://widget.meebo.com/mm.swf?" . $widgetid . "\" /></object><br /><small><a href=\"http://ajaydsouza.com/wordpress/plugins/meebo-me-plugin/\" title=\"Visit the meebo me Plugin for WordPress Homepage\">Powered by meebo me Plugin</a></small>";
	}
	else
	{
		$str = "<br /><a href=\"http://ajaydsouza.com/wordpress/plugins/meebo-me-plugin/\" title=\"Visit the meebo me Plugin for WordPress Homepage\">meebo me Plugin</a> not initialized. Please visit the Options Page in WP-Admin and save your Widget ID. Visit <a href=\"http://meebome.com\">meebo me</a> to create your chat widget." ;
	}
	
	return $str;
}

/* This function adds an Options page in WP Admin */
if (is_admin() || strstr($_SERVER['PHP_SELF'], 'wp-admin/')) {
	require_once(MEEBOME_DIR . "/admin.inc.php");
}

?>