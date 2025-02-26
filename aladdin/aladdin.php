<?php
/*
Plugin Name: Aladdin
Description: Aladdin is a keyboard quick launcher for your WordPress Admin Dashboard. 
Version: 1.0
License: GPLv2 or later
Author: The CSSIgniter Team
Author URI: http://www.cssigniter.com/

==========================================================================

Copyright 2011-2015  CSSIgniter

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
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// plugin folder url
if(!defined('ALADDIN_PLUGIN_URL')) {
	define('ALADDIN_PLUGIN_URL', plugin_dir_url( __FILE__ ));
}

add_action('admin_enqueue_scripts', 'aladdin_enqueue_admin_scripts');
if( !function_exists('aladdin_enqueue_admin_scripts') ):
	function aladdin_enqueue_admin_scripts() {
		
		wp_enqueue_style('aladdin-styles', ALADDIN_PLUGIN_URL.'css/aladdin.css');
		wp_enqueue_script('aladdin-autocomplete', ALADDIN_PLUGIN_URL.'js/jquery.autocomplete.js');
		wp_enqueue_script('aladdin-admin', ALADDIN_PLUGIN_URL.'js/admin.js');

	}
endif;

add_action('admin_footer', 'aladdin_footer');
function aladdin_footer() {
	echo '<div class="aladdin-wrap"><div class="aladdin-field"><input type="text" class="aladdin-text" placeholder="Start typing" /></div></div>';
}
?>