<?php
/*
Plugin Name: API QRCode Generator
Version: 1.0.1
Author: Jweblog
Author URI: http://qrcode.jar.io
Plugin URI: http://qrcode.jar.io/page/wordporess-api.html
Tags: qr code, qrcode, qr code generator, qrcode generator, qr code shortcode, qrcode shortcode, barcode, scan, shortcode, image, page, links, widget, post, plugin, admin, posts, images, kaywa, visual qr code, color qr code 
Description: Plugin API Google QRCode Generator for Wordpress to insert a QR code in content blog bellow article. The qr code contains the current URL or any other text you like. | <a href="http://wordpress.org/plugins/api-qrcode-generator" target="_blank">FAQ</a> | <a href="http://qrcode.jar.io/page/api-wordpress.html" target="_blank">How to Configure</a>
License URI: http://www.gnu.org/licenses/gpl-2.0.html
License: GPLv2 or later
*/

/*

The shortcode [qrcode] within your site to generate a qr code including the URL of the current site. This plugin is offered freely by QRCode Generator API Online [qrcode.jar.io].

If you find this plugin useful, please rating this plugin on [http://wordpress.org/extend/plugins/api-qrcode-generator/]

Check website for live demo [http://yoga.jar.io/]

== Description ==

Use this QRCode Generator wordpress plugin to create a image QRCode on any site of your Wordpress installation. Use a shortcode in your posts to insert dynamic, customizable posts, pages, images, or attachments based on categories and tags. Visite http://qrcode.jar.io for more information. 


How to use:

* Use the shortcode [qrcode] within your site to generate a qr code including the URL of the current site
  
* Use the fullowing short code to generate a indivdual qr code with any text content: 
  [qrcode content="CONTENT" size="120" alt="ALT_TEXT" class="CLASS_NAME"] 
  
**********************************************************************************

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/


define('APIQR_NAME', 'API QRCode Generator');
function apiqr_settings_link($links, $file) { 
	if ( $file == plugin_basename(dirname(__FILE__)).'/wp-api-qrcode.php' ) {
	   $settings_link = '<a href="'.admin_url('options-general.php?page=apiqr-settings').'">'.__('Settings').'</a>'; 
	   array_unshift($links, $settings_link); 
	}
	return $links; 
}
add_filter("plugin_action_links", 'apiqr_settings_link', 10, 2 );
function apiqr_settings_subpage() {
	add_submenu_page( 'options-general.php', APIQR_NAME, APIQR_NAME, 'manage_options', 'apiqr-settings', 'apiqr_settings_options' ); 
}
add_action('admin_menu', 'apiqr_settings_subpage');
add_filter('plugin_row_meta',  'Register_Plugins_Links', 10, 2);
function Register_Plugins_Links ($links, $file) {
               $base = plugin_basename(__FILE__);
               if ($file == $base) {
                       $links[] = '<a href="admin.php?page=settings_plugin">' . __('Settings') . '</a>';
                       $links[] = '<a href="http://qrcode.jar.io">' . __('API') . '</a>';                     
                       $links[] = '<a href="https://profiles.wordpress.org/jweblog">' . __('Contact') . '</a>';               }
               return $links;
       }

include_once('wp-qrcode.php');?>