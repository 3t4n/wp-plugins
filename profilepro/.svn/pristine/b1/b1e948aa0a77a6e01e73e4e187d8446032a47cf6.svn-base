<?php
/*
Plugin Name: ProfilePro
Plugin URI:http://wpuserplus.com
Description:The easiest way to create beautiful user profiles with WordPress 
Version: 1.3
Author:wpuser

*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

if( !class_exists( 'PROFILEPRO' ) ){
	
	class PROFILEPRO{
		
		function __construct(){
			
			$this->profilepro_define_constants();
			$this->profilepro_include_files();
			$this->load_language();
                        register_deactivation_hook( __FILE__, array($this,'profilepro_deactivate'));


		}
		function profilepro_deactivate()
{


            error_log("in the deactivation");
      $pages = get_option('profilepro_pages');
		
		/* Rebuild */
		
		
			// delete existing pages for userpro
			if (isset($pages) && is_array($pages)){
				foreach( $pages as $page_id ) {
					wp_delete_post( $page_id, true );
				}
			
			
			// delete from DB
			delete_option('profilepro_pages');
		
		}



}

		public function profilepro_define_constants(){
			
			if( !defined( 'PROFILEPRO_URL' ) ){
				define( 'PROFILEPRO_URL', plugin_dir_url( __FILE__ ) );
			}	
			if( !defined( 'PROFILEPRO_PATH' ) ){
				define( 'PROFILEPRO_PATH', plugin_dir_path( __FILE__ ) );
			}
			if( !defined( 'PROFILEPRO_PLUGIN_SLUG' ) ){
				define( 'PROFILEPRO_PLUGIN_SLUG' , 'profilepro' );
			}	
			if ( !defined( 'PROFILEPRO_ADMIN_PAGE' ) ) {
				$profilepro =  'toplevel_page_';
				define( 'PROFILEPRO_ADMIN_PAGE', $profilepro . PROFILEPRO_PLUGIN_SLUG );
			}
		}
		
		
		public function profilepro_include_files(){
			
			if (is_admin()){
				foreach (glob(PROFILEPRO_PATH . 'admin/*.php') as $filename) { include $filename; }
			}
			foreach (glob(PROFILEPRO_PATH . 'functions/*.php') as $filename) { require_once $filename; }
			$this->api =  new PROFILEPROApi();
			$this->field_functions = new PROFILEPROFieldFunctions();
		}
		
		public function load_language(){
			load_plugin_textdomain('profilepro', false, dirname(plugin_basename(__FILE__)) . '/languages');
		}
		
		
	}
	
	$profilepro = new PROFILEPRO();
}
