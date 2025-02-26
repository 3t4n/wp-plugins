<?php

/*
Plugin Name: Anti Internet Explorer 6 Plugin
Plugin URI: http://www.timo-ernst.net/anti-internet-explorer-6-plugin-for-wordpress
Description: Plugin, that detects, if a visitor is using the old Internet Explorer 6 (or even older) and displays a message to him to download a better browser, or at least upgrade to a new version of IE.
Version: 1.4
Author: Timo Ernst
Author URI: http://www.timo-ernst.net
*/

/* Copyright (C) 2009 timo-ernst.net

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA */
 
 class Aiep {
 	
 	var $version = "1.4";

	/**
	* Outputs meta refresh tag to forward the visitor if he is using the Internet Explorer version 6 or older
	*/
	function modify_header() {
		echo '<!--[if lte IE 6]><META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://www.timo-ernst.net/stop-the-ie6"><![endif]-->
		';
	}
	
} // Another_WordPress_Meta_Plugin

if (!is_page(home)){
	$_Aiep_plugin = new Aiep();
	add_action('wp_head', array($_Aiep_plugin, 'modify_header'));
}

?>
