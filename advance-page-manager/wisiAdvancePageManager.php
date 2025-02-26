<?php 
/*
	Plugin Name: Advance Page Manager
	Plugin URI: http://www.wisimedia.de
	Description: Give you a new page managment tool.
	Version: 1.1
	Author: Stefan Wisnewski
	Author URI: http://www.wisimedia.de
	License: GPL2
	
	Copyright 2012  Stefan Wisnewski  (email : phpwisnewski@googlemail.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/ 
function wisiAdvanceManagePageInjection() {
	add_option('wisipagemanager', 'wisi');
	
	$use = get_option('wisipagemanager');
	
	
	
	$i = explode('/', $_SERVER['SCRIPT_NAME']);
	$name = $i[count($i)-1];
	if ($name == 'edit.php') {
		$i = explode('&', $_SERVER['QUERY_STRING']);
		if ($i[0] == 'post_type=page') {
			
			if ($_GET['switchpagemanager'] == 'wp') {
				update_option('wisipagemanager', 'wp');
				$use = 'wp';
			}
			if ($_GET['switchpagemanager'] == 'wisi') {
				update_option('wisipagemanager', 'wisi');
				$use = 'wisi';
			}

			$url = plugins_url();
			
			if ($use == 'wp') {
				echo '<script type="text/javascript" src="'.$url.'/advance-page-manager/wisiusewp.js"></script>'."\n";
			} else {
				echo '<script type="text/javascript" src="'.$url.'/advance-page-manager/jqueryFileTree/jqueryFileTree.js"></script>'."\n";
				echo '<link type="text/css" rel="stylesheet" href="'.$url.'/advance-page-manager/jqueryFileTree/jqueryFileTree.css" media="screen" />'."\n";
				echo '<script type="text/javascript">window.wisiscripturl = "'.$url.'/advance-page-manager/";</script>'."\n";
				echo '<script type="text/javascript" src="'.$url.'/advance-page-manager/java.js"></script>'."\n";
			}
		}
	}
}
add_action('admin_head', 'wisiAdvanceManagePageInjection');
?>