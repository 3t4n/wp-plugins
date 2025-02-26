<?php
/*
Plugin Name: AJAX Yandex.Metrika
Author: 
Plugin URI: http://sergey-s-betke.blogs.novgaro.ru/category/it/web/wordpress/ajax-yandex-metrika
Description: yandex.metrika counter for your blog with AJAX events integration.
Version: 2.1.0
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

$ajax_yandex_metrika_cfg = array(
	'name' => '',
	'ver' => '2.1.0',
	'namespace' => 'ajax_yandex_metrika',
	'folder' => dirname(plugin_basename(__FILE__)),
	'domain' => dirname(plugin_basename(__FILE__)),
	'path' => WP_PLUGIN_DIR . '/' . dirname(plugin_basename(__FILE__)) . '/',
	'url' => WP_PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__)) . '/',
	'options' => array(),
	'options_id' => 'YandexMetrikaPP',
	'options_page_id' => 'ajax_yandex_metrika_options_page'
);

function ajax_yandex_metrika_validate_options($options) {
	if (!is_array($options)) {
		$options = array();
	};

	return $options;
}

if (is_admin()) {
	include_once('admin\admin.php');
};

add_action('init', function () {
	global $ajax_yandex_metrika_cfg;
	$pluginDIR = $ajax_yandex_metrika_cfg['path'];
	$pluginURL = $ajax_yandex_metrika_cfg['url'];

    if(!is_admin()) {
		$ajax_yandex_metrika_cfg['options'] = ajax_yandex_metrika_validate_options(
			get_option($ajax_yandex_metrika_cfg['options_id'])
		);
		$ua = $ajax_yandex_metrika_cfg['options']["uastring"];
		$script_pos = ( 'footer' == get_option('options-script-position') );

		if (($ua != "") && (!current_user_can('edit_users') || $options["admintracking"]) && !is_preview()) { 
//		if (true) { //for debug
			wp_register_script(
				'jquery.ajax.counters', 
				$pluginURL . "jquery/ajax/counters/jquery.ajax.counters.js",
				array('jquery'),
				$ajax_yandex_metrika_cfg['ver'],
				$script_pos
			);
			wp_register_script(
				'yandex.metrika', 
				'http://mc.yandex.ru/resource/watch.js',
				array(),
				$ajax_yandex_metrika_cfg['ver'],
				$script_pos
			);
			wp_register_script(
				'ajax-yandex-metrika', 
				$pluginURL . "ajax-yandex-metrika.js",
				array('jquery', 'yandex.metrika', 'jquery.ajax.counters'),
				$ajax_yandex_metrika_cfg['ver'],
				$script_pos
			);
			wp_enqueue_script('jquery.ajax.counters');
			wp_enqueue_script('yandex.metrika');
			wp_enqueue_script('ajax-yandex-metrika');

			wp_localize_script( 'ajax-yandex-metrika', 'YaMetrikaConfig', array(
				'ua' => $ua
			));	
		};
	};
});

?>