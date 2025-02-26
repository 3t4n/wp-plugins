<?php
/*
Plugin Name: AmberPanther Favicon for WordPress
Plugin URI: http://www.amberpanther.com/contributions/favicon-for-wordpress/
Description: AmberPanther Favicon for WordPress - A WordPress plugin developed by the AmberPanther team, designed to add a Favicon (also known as favorites icon, website icon, shortcut icon, url icon, or bookmark icon) to your WordPress powered site. The Favicon is added to the administration pages as well, not just the front pages. It supports ICO, PNG and GIF formats. It ensures cross browser functionality. The favicon files can be located in the site's root directory (detected automatically) or in a custom directory. 
Version: 1.10.3.29
Author: the AmberPanther team
Author URI: http://www.amberpanther.com
*/

/*  Copyright 2009  the AmberPanther team  ()

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along with
    this program; if not, see <http://www.gnu.org/licenses/> or write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! class_exists( 'ap_favicon_cove' ) ) {

require_once('class/ap_plugin_ambrapanthera.php');
	
class ap_favicon_cove extends ap_plugin_AmbraPanthera {
	
	var $pluginname = 'AmberPanther Favicon for WordPress';
	var $codename = 'favicon';
	var $menutitle = 'AP Favicon';
	var $version = '1.10.3.29';
	var $hook = array('ap-favicon-general-options','ap-favicon-backend-options','ap-favicon-phpinfo-options');
	var $thefile = __FILE__;
	var $theicon = '';
	var $wpurl = '';
	var $homeurl = 'http://www.amberpanther.com/contributions/favicon-for-wordpress/';
	var $demourl ='';
	var $theX = '';

	function ap_favicon_cove(){
		
	$this->theicon = WP_PLUGIN_URL .'/'. str_replace(basename( $this->thefile),"",plugin_basename($this->thefile)) .'images/paw_black_tr.png';
	$this->thepaw = WP_PLUGIN_URL .'/'. str_replace(basename( $this->thefile),"",plugin_basename($this->thefile)) .'images/paw_black_tr.png';
	$this->theX = WP_PLUGIN_URL .'/'. str_replace(basename( $this->thefile),"",plugin_basename($this->thefile)) .'images/x-missing.png';
	
	}
}
	global $ap_favC;
	$ap_favC = new ap_favicon_cove();
	$ap_favC->ap_plugin_AmbraPanthera();
}
include('options/ap_autoinclude.php');

add_action('wp_head', 'ap_favicon');
if (is_admin())
	add_action('admin_head', 'ap_favicon');

	
function ap_favicon(){
	echo ap_favicon_driver();
}
function ap_favicon_driver(){
	global $ap_favC;
	$options = $ap_favC->ap_get_option('array');
	
	if (!$options['favicon']) return;
	
	$out = '
<!-- AmberPanther Favicon for WordPress -->';
	
	if ($options['favicon']=='root'){
		$siteurl = get_bloginfo('url');
		if ($options['fav_root_ico'])
			$out .= '
<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="'.$siteurl.'/favicon.ico" />';
		if ($options['fav_root_png'])
			$out .= '
<link rel="icon" type="image/png" href="'.$siteurl.'/favicon.png" />';
		if ($options['fav_root_gif'])
			$out .= '
<link rel="icon" type="image/gif" href="'.$siteurl.'/favicon.gif" />';
	}
	
	if ($options['favicon']=='custom'){
		if ($options['fav_cust_ico'])
			$out .= '
<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="'.$options['fav_cust_ico'].'" />';
		if ($options['fav_cust_png'])
			$out .= '
<link rel="icon" type="image/png" href="'.$options['fav_cust_png'].'" />';
		if ($options['fav_cust_gif'])
			$out .= '
<link rel="icon" type="image/gif" href="'.$options['fav_cust_gif'].'" />';
	}
	$out.='
';
	return $out;
}
function ap_favicon_defaults(){
	$defaults = array();
	return $defaults;
}

?>