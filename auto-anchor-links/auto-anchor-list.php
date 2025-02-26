<?php
/*
Plugin Name: Auto Anchor List
Plugin URI: http://www.mindwiremedia.net/products/wordpress/plugins/auto-anchor-list-wordpress-plugin-home/
Description: Automatically displays and creates anchor links to H tags in page content.
Author: MindWireMedia
Version: 1.0
Author URI: http://www.mindwiremedia.net
*/

/*
Copyright 2009 MindWireMedia, All Rights Reserved (email : info@mindwiremedia.net).

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
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/
if (!class_exists('mwm_aalLoader')) {
	class mwm_aalLoader{
		
		var $version     = '1.0';
		var $options     = '';
		var $links = array();
	
		function mwm_aalLoader(){
			$this->load_options();					
			$this->define_constants();
			$this->load_dependencies();
			register_activation_hook( plugin_basename( dirname(__FILE__)).'/auto-anchor-list.php', array(&$this, 'activate') );
			register_sidebar_widget('MWM Auto Anchor List', array(&$this, 'widget'));
			
		}
		
		
		function load_options(){
			// Load the options
			$this->options = get_option('mwm_aal_options');
		}
		
		function define_constants() {
			// define URL
			define('MWMAALFOLDER', plugin_basename( dirname(__FILE__)) );
			define('MWMAAL_URLPATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
		}
		
		function load_dependencies(){
			// Load backend libraries
			if ( is_admin() ) {	
				require_once (dirname (__FILE__) . '/admin/admin.php');
				$this->mwm_aalAdminPanel = new mwm_aalAdminPanel();
				
			// Load frontend libraries							
			} else {
				if($this->options['activatePlugin']){
					require_once (dirname (__FILE__) . '/mwm-aal-class.php');
					global $mwm_aal;
				}
			}
		}
		
		
		
		function activate(){
			$options = get_option('mwm_aal_options');
			if ( empty( $options ) ){
			$mwm_aal_options['activatePlugin'] = true;
			$mwm_aal_options['activateCSS'] = true;
			$mwm_aal_options['autoDisplayInContent'] = true;
			$mwm_aal_options['displayTitle'] = "Contents";
			$mwm_aal_options['contentColumnCount'] = 2;
			$mwm_aal_options['is_home'] = true;
			$mwm_aal_options['is_single'] = true;
			$mwm_aal_options['is_page'] = true;
			$mwm_aal_options['is_category'] = true;
			$mwm_aal_options['is_tag'] = true;
			$mwm_aal_options['is_date'] = true;
			$mwm_aal_options['is_author'] = true;
			$mwm_aal_options['is_search'] = true;

			update_option('mwm_aal_options', $mwm_aal_options);
			}
		}
		
		/**
		* Show a error messages
		*/
		function show_error($message) {
			echo '<div class="wrap"><h2></h2><div class="error" id="error"><p>' . $message . '</p></div></div>' . "\n";
		}
		
		/**
		* Show a system messages
		*/
		function show_message($message) {
			echo '<div class="wrap"><h2></h2><div class="updated fade" id="message"><p>' . $message . '</p></div></div>' . "\n";
		}
		
		/**
		 * widget
		 *
		 * The sidebar widget 
		 */
		function widget($args){
			extract($args);
			//Manditory before widget junk
			echo $before_widget;
			echo '<li>';
			global $mwm_aal; $mwm_aal->output_sidebar_links();
			echo '</li>';
			//Manditory after widget junk
			echo $after_widget;
		}
		
		
	
	}
	//Start Loader
	global $mwm_aalLoader;
	$mwm_aalLoader = new mwm_aalLoader();
}