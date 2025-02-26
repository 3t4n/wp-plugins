<?php
/*
Plugin Name: Localhost Notify
Plugin URI: https://wordpress.org/plugins/localhost-notify/
Description: Simple plugin for developers. Adds "local |" to the start of page titles if you're working on a local WP copy.
Tags: localhost, developers, local
Version: 2.1
Author: Marcus Sykes
Author URI: http://msyk.es/

Copyright (C) 2016 Marcus Sykes

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

//If not a local server, don't register any functions or hooks
if( $_SERVER['SERVER_ADDR'] == '127.0.0.1' ){

	/**
	 * Older versions of WP use the wp_title filter, and will use this filter.
	 * @param string $title
	 * @param string $show
	 * @return string
	 */
	function localhost_notify($title='', $show=''){
		//WordPress SEO by Yoast workaround
		if( class_exists('WPSEO_Frontend') ){
			$title = WPSEO_Frontend::get_instance()->title($title, $show);
		}
		$title = "local | ".$title;
		return $title;
	}
	add_filter('admin_title', 'localhost_notify');

	/**
	 * WordPress 4.4 onwards generates titles this way, so we add to the start of the title array
	 * @param array $title
	 * @return array
	 */
	function localhost_notify_document_title_parts($title){
		//WordPress SEO by Yoast workaround
		if( class_exists('WPSEO_Frontend') ){
			$title = array(WPSEO_Frontend::get_instance()->title(''));
		}
		//add local to front of title array
		array_unshift($title, 'local');
		return $title;
	}
	
	/**
	 * Yoast's WordPress SEO fix 
	 */
	function localhost_notify_wpseo_fix(){
		global $wpseo_front;
		if( !class_exists('WPSEO_Frontend') ) return;
		remove_filter( 'pre_get_document_title', array( WPSEO_Frontend::get_instance(), 'title' ), 15 );
		remove_filter( 'wp_title', array( WPSEO_Frontend::get_instance(), 'title' ), 15, 3);
	}
	add_action('init', 'localhost_notify_wpseo_fix');
	
	/**
	 * Decides whether to call the new WP title generation method or old one
	 */
	function localhost_notify_after_setup_theme(){
		if ( function_exists('_wp_render_title_tag') && current_theme_supports('title-tag') ){
			//the new way 4.4 onwards
			add_filter('document_title_parts', 'localhost_notify_document_title_parts', 1000);
		}else{
			//the old way
			add_filter('wp_title', 'localhost_notify', 1000);
			add_filter('bloginfo', 'localhost_notify', 1, 2);
		}
	}
	add_action( 'after_setup_theme', 'localhost_notify_after_setup_theme', 100 ); //late in the game so other themes can add support
}
?>