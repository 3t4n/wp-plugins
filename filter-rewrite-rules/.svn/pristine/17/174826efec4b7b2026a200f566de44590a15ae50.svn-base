<?php
/**
 * Plugin Name: Filter Rewrite Rules
 * Plugin URI: http://inpsyde.com
 * Text Domain: filterrewriterules
 * Domain Path: /languages
 * Description: Filter rewrite rules for performance problems on post/pages with permalinks
 * Version: 0.1
 * Author: Inpsyde GmbH
 * Author URI: http://inpsyde.com
 * License: GPL
*/

/**
License:
==============================================================================
Copyright 2010 Robert Windisch, Frank Bültge  (email : info@inpsyde.com)

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

Requirements:
==============================================================================
This plugin requires WordPress >= 2.8 and tested with PHP Interpreter >= 5.2.9
*/

//avoid direct calls to this file where wp core files not present
if (!function_exists ('add_action')) {
		header('Status: 403 Forbidden');
		header('HTTP/1.1 403 Forbidden');
		exit();
}

if ( !class_exists( 'filter_rewrite_rules' ) ) {
	
	class filter_rewrite_rules {
		
		function __construct() {
			
			$this->constants();
			add_action( 'admin_init', array(&$this, 'text_domain') );
			add_filter( 'page_rewrite_rules', array(&$this, 'fb_filter_rewrite_attachment') );
			add_filter( 'post_rewrite_rules', array(&$this, 'fb_filter_rewrite_attachment') );
		}
		
		function constants() {
			
			define( 'INPSYDE_FRR_BASEDIR', dirname( plugin_basename(__FILE__) ) );
			define( 'INPSYDE_FRR_TEXTDOMAIN', 'filterrewriterules' );
		}
		
		function text_domain() {
			
			load_plugin_textdomain( INPSYDE_FRR_TEXTDOMAIN, false, INPSYDE_FRR_BASEDIR . '/languages' );
		}
		
		function fb_filter_rewrite_attachment($content) {
			
			if ( !is_array($content) )
				return $content;
		
			foreach ($content as $key => $val) {
				if ( false !== strpos($val, 'attachment') )
					unset($content[$key]);
				}
		
			return $content;
		}
		
	} // end class
	
	function filter_rewrite_rules_start() {
	
		new filter_rewrite_rules();
	}
		
	add_action( 'plugins_loaded', 'filter_rewrite_rules_start' );
	
} // end class_exists
?>