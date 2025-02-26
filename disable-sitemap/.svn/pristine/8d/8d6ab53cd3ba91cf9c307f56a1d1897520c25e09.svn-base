<?php 
/*
	Plugin Name: Disable Sitemap
	Plugin URI: https://wordpress.org/plugins/disable-sitemap/
	Description: Disables Wordpress Sitemap
	Tags: disable, Core Sitemaps, sitemap, seo
	Author: saeedshabani
	Author URI: https://profiles.wordpress.org/saeedshabani/
	Donate link: 
	Contributors: saeedshabani
	Requires at least: 5.5
	Tested up to: 5.5
	Stable tag: 1.0.2
	Version: 1.0.2
	Requires PHP: 5.6.20
	Text Domain: disable-sitemap
	Domain Path: /languages
	License: GPL v2 or later
*/

/*
	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 
	2 of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	with this program. If not, visit: https://www.gnu.org/licenses/
	
	Copyright 2020 Monzilla Media. All rights reserved.
*/

if (!defined('ABSPATH')) die();

if (!class_exists('DisableSitemap')) {
	
	class DisableSitemap {
		
		function __construct() {
			
			$this->define_consts();

			add_action('admin_init', array($this, 'check_version'));
			
			remove_action( 'init', 'wp_sitemaps_get_server' );
			
		}

		function define_consts (){

			if (!defined('DISABLE_SITEMAP_NAME'))    define('DISABLE_SITEMAP_NAME',    'Disable Sitemap');
			if (!defined('DISABLE_SITEMAP_REQUIRE'))    define('DISABLE_SITEMAP_REQUIRE',    '5.5');
			if (!defined('DISABLE_SITEMAP_FILE'))    define('DISABLE_SITEMAP_FILE',    plugin_basename(__FILE__));
			
		}

		function check_version() {
			
			$wp_version = get_bloginfo('version');
			
			if (isset($_GET['activate']) && $_GET['activate'] == 'true') {
				
				if (version_compare($wp_version, DISABLE_SITEMAP_REQUIRE, '<')) {
					
					if (is_plugin_active(DISABLE_SITEMAP_FILE)) {
						
						deactivate_plugins(DISABLE_SITEMAP_FILE);
						
						$msg  = '<strong>'. DISABLE_SITEMAP_NAME .'</strong> '. esc_html__('requires WordPress ', 'disable-sitemap') . DISABLE_SITEMAP_REQUIRE;
						$msg .= esc_html__(' or higher, and has been deactivated! ', 'disable-sitemap');
						$msg .= esc_html__('Please return to the', 'disable-sitemap') .' <a href="'. admin_url() .'">';
						$msg .= esc_html__('WP Admin Area', 'disable-sitemap') .'</a> '. esc_html__('to upgrade WordPress and try again.', 'disable-sitemap');
						
						wp_die($msg);
						
					}
					
				}
				
			}
			
		}
		
	}
	
	global $DisableSitemap;
	
	$DisableSitemap = new DisableSitemap(); 
	
}
