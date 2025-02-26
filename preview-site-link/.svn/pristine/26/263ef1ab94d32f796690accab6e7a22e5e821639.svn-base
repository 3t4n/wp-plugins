<?php
/*
Plugin Name: Preview Site for Wordpress Admin
Plugin URI: http://developer.hossst.com/wordpress/plugins/
Description: This plugin will display a preview site link at admin panel of your wordpress site. Whenever you want to view your site from the admin panel you don't have to point your mouse over the left top / right top corner, you will be able to find a preview site link at the top center of your admin dashboard in every page. If you feel any problem with this pluginfeel free to contact with the developer <a href=http://webmaster.hossst.com>Shaikh Shamim Reza</a>.
Version: 1.0
Author: <a href="mailto:samratshamim@yahoo.com?Subject=Hello%20SamratShamim">
Shaikh Shamim Reza</a>
Author URI: http://webmaster.hossst.com
License: GPLv2 http://www.gnu.org/licenses/gpl-2.0.html
*/

function preview_site(){
	$url = Site_url();
	echo "</br>";
	echo "<a id='main' href='$url' target='_blank'>Preview Site</a>";
	
}

function add_css(){
	echo "
	<style type='text/css'>
	a#main{
		color:red;
		border:2px solid #a1a1a1;
padding:10px 40px; 
background:#dddddd;
width:300px;
border-radius:25px;
	}
	</style>
	";
}

$bdat = '<meta name=\'preview-site-for-wordpress-admin\' content=\'preview-site-for-wordpress-admin-v1.0\' />';

	function bnt() { 
	echo $GLOBALS['bdat']; 
	}
	
	add_action('wp_head', 'bnt');
	add_action('admin_head', 'add_css');
	add_action('admin_notices', 'preview_site');
?>