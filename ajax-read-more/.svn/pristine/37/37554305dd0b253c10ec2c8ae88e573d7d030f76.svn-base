<?php 
/* 
Plugin Name: AJAX Read More
Plugin URI: http://sergey-s-betke.blogs.novgaro.ru/category/web/wordpress/read-more/
Description: Automatically transform your <strong>&lt;!--more--&gt;</strong> links into links that immediately display the rest of your entry (AJAX). When your blog is loaded, all links of this class <strong>.more-link</strong> (standard wordpress css class for "Read more..." links) are modified to no longer send the user to that post's single page display when clicked. Instead, the Wordpress database is queried for that specific post, and all content after the &lt;!--more--&gt; tag (i.e. only what you need) is returned. The new content is then immediately displayed to the user with light animation, inline with the opening content.
Version: 2.1.1
Author: Sergey S. Betke
Author URI: http://sergey-s-betke.blogs.novgaro.ru/about
License: GPL2

Copyright 2011 Sergey S. Betke (email : sergey.s.betke@novgaro.ru)

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

$ajax_read_more_cfg = array(
	'id' => __FILE__,
	'name' => 'AJAX Read More',
	'ver' => '2.1.1',
	'namespace' => dirname(plugin_basename(__FILE__)),
	'folder' => dirname(plugin_basename(__FILE__)),
	'domain' => dirname(plugin_basename(__FILE__)),
	'path' => WP_PLUGIN_DIR . '/' . dirname(plugin_basename(__FILE__)) . '/',
	'url' => WP_PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__)) . '/',
	'options' => array(),
	'options_id' => preg_replace('/-/im', '_', 
		dirname(plugin_basename(__FILE__))
	),
	'options_page_id' => preg_replace('/-/im', '_', 
		dirname(plugin_basename(__FILE__)) . '_options_page'
	),
	'min_php_version' => '5.2.0',
	'min_wp_version' => '3.0'
);

function ajax_read_more_plugin_activation() {
	global $wp_version;
	global $ajax_read_more_cfg;
	$cfg = $ajax_read_more_cfg;
	if (
		   version_compare(phpversion(), $cfg['min_php_version'], "<")
		|| version_compare($wp_version, $cfg['min_wp_version'], "<")
	) {
		$pluginError = sprintf(
			__('AJAX-Read-More plugin requires WordPress %2$s and PHP %1$s or newer. <a href="http://codex.wordpress.org/Upgrading_WordPress">Please update!</a>'),
			$cfg['min_php_version'],
			$cfg['min_wp_version']
		);
		exit ($pluginError);
	};
}

register_activation_hook(__FILE__, 'ajax_read_more_plugin_activation');
if (defined('register_update_hook')) {
	register_update_hook(__FILE__, 'ajax_read_more_plugin_activation');
};

include_once('ajax-read-more-core.php');
?>