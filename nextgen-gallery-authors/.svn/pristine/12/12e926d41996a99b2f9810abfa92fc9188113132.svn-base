<?php
/*
Plugin Name: NextGEN Gallery Authors
Plugin URI: 
Description: This plugin will give to NextGEN Gallery more control over authors. With this, you can filter galleries by authors.
Version: 0.1
Author: Roberto Cantarano
Author URI: http://www.cantarano.com
*/
/*
Copyright 2011 Roberto Cantarano  (email : roberto@cantarano.com)

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

// Stop direct call
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('Non puoi accedere direttamente a questa pagina...'); }

/* ini_set('display_errors', '1');
 ini_set('error_reporting', E_ALL);*/

$rcwd_ngg_base_page = 'admin.php?page=nggallery-manage-gallery';

if (!class_exists('rcwdNggauthors')){
	class rcwdNggauthors{
		
		function init(){
			$this->vars_and_constants();
			if (!in_array($this->depends, $this->active_plugins)){
				deactivate_plugins(plugin_basename(__FILE__));
				wp_die("Questo plugin necessita l'attivazione di NEXTGEN... che non risulta essere presente.");
				return; 
			}	
			$this->load_options();		
			$this->functions();				
			register_activation_hook( $this->plugin_name, array(&$this, 'activate') );
			register_deactivation_hook( $this->plugin_name, array(&$this, 'deactivate') );
			add_action( 'plugins_loaded', array(&$this, 'start_plugin') );		
			include_once(dirname(__FILE__).'/authors/authors.php');
			if(is_admin()){
				if(isset($_GET['action']) and $_GET['action'] == 'nggauthors-remove-notice'){
					$this->nggauthors_options['remove-notice'] = true;
					update_option('nggauthors_options', $this->nggauthors_options);
				}
				if($this->nggauthors_options['nggauthors-remove-notice'] !== true){
					add_action( 'admin_notices', array(&$this, 'notice') );
				}
				require_once(dirname(__FILE__).'/authors/admin/admin.php');
				$this->rcwdNggauthorsAdmin = new rcwdNggauthorsAdmin();
			}			
		}
	
		function vars_and_constants(){
			global $wpdb;
			define('RCWDNGGAUTHORS_DIRNAME', plugin_basename( dirname(__FILE__)));
			define('RCWDNGGAUTHORS_URLPATH', trailingslashit(plugins_url('',__FILE__)));
			define('RCWDNGGAUTHORS_ALBUM_TAB', $wpdb->prefix.'ngg_album');
			define('RCWDNGGAUTHORS_GALLERY_TAB', $wpdb->prefix.'ngg_gallery');
			$this->plugin_name 		= plugin_basename(__FILE__);
			$this->depends	   		= 'nextgen-gallery/nggallery.php';
			$this->active_plugins   = get_option('active_plugins', FALSE);
		}
	
		function functions(){
			require_once(dirname(__FILE__).'/functions/functions.php');
		}
		
		function activate(){
			global $wpdb;
			if (version_compare(PHP_VERSION, '5.2.0', '<')) { 
				deactivate_plugins(plugin_basename(__FILE__));
				wp_die("Il plugin richiede una versione di PHP pari o maggiore di 5.2.0"); 
				return; 
			} 
			$active_plugins = get_option('active_plugins', FALSE);
			if (!in_array($this->depends, $this->active_plugins)){
				deactivate_plugins(plugin_basename(__FILE__));
				wp_die("Questo plugin necessita l'attivazione di NEXTGEN... che non risulta essere presente.");
				return; 
			}
			if(!current_user_can('activate_plugins')) return;	
		}

		function start_plugin(){
			load_plugin_textdomain('nggauthors', false, dirname(plugin_basename(__FILE__)).'/lang');
			nggGallery::add_capabilites('NextGEN Authors change options');
			nggGallery::add_capabilites('NextGEN Edit gallery page id');
			nggGallery::add_capabilites('NextGEN Edit gallery path');	
		}			

		function notice(){
			echo '<div id="message" class="error">'.__('<p><strong>NextGEN Gallery Authors: * * A T T E N T I O N * *</strong><br />This first release require a (little and simple) NextGen GALLERY core modification in order to work.</p><p><a href="admin.php?page=nggauthors#nggcoremod">Click here to read instructions</a> and <a href="admin.php?page=nggauthors&action=nggauthors-remove-notice">click here to remove this alert.</a></p>', 'nggauthors').'</div>';
		}
		
		function load_options(){
			$this->nggauthors_options = get_option('nggauthors_options');
		}
			
		function deactivate(){
			global $wp_roles;
			foreach($wp_roles->role_names as $role => $name){
				$wp_roles->remove_cap( $role, 'NextGEN Authors change options' );
				$wp_roles->remove_cap( $role, 'NextGEN Edit gallery page id' );
				$wp_roles->remove_cap( $role, 'NextGEN Edit gallery path' );
			}	
		}	
						
	}
}
$rcwdNggauthors = new rcwdNggauthors();
$rcwdNggauthors->init();
?>