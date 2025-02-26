<?php
/*
Plugin Name: OS HTML5 Shortcodes
Plugin URI: http://offshorent.com/blog/extensions/os-html5-shortcodes
Description: Include HTML codes uch as ad codes, javascript, video embedding, etc to your pages, posts or custom post type easily using shortcodes.
Version: 1.3
Author: Offshorent Solutions Pvt Ltd. | Jinesh.P.V
Author URI: http://offshorent.com/
Requires at least: 4.3
Tested up to: 4.7.4
License: GPL2
/*  Copyright 2016-2019  OS HTML5 Shortcodes - Offshorent Softwares Pvt Ltd  ( email: jinesh@offshorent.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'osHTML5Shortcodes' ) ) :
    
    /**
    * Main osHTML5Shortcodes Class
    *
    * @class osHTML5Shortcodes
    * @version	1.3
    */

	    final class osHTML5Shortcodes {
	    
		/**
		* @var string
		* @since	1.3
		*/
		 
		public $version = '1.3';
		
		/**
		* @var osHTML5Shortcodes The single instance of the class
		* @since 1.3
		*/
		
		protected static $_instance = null;

		/**
		* Main osHTML5Shortcodes Instance
		*
		* Ensures only one instance of osHTML5Shortcodes is loaded or can be loaded.
		*
		* @since 1.3
		* @static
		* @see OSBX()
		* @return osHTML5Shortcodes - Main instance
		*/
		 
		public static function init_instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
		}

		/**
		* Cloning is forbidden.
		*
		* @since 1.3
		*/

		public function __clone() {
            _doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '1.3' );
		}

		/**
		* Unserializing instances of this class is forbidden.
		*
		* @since 1.3
		*/
		 
		public function __wakeup() {
            _doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '1.3' );
		}
	        
		/**
		* Get the plugin url.
		*
		* @since 1.3
		*/

		public function plugin_url() {
            return untrailingslashit( plugins_url( '/', __FILE__ ) );
		}

		/**
		* Get the plugin path.
		*
		* @since 1.3
		*/

		public function plugin_path() {
            return untrailingslashit( plugin_dir_path( __FILE__ ) );
		}

		/**
		* Get Ajax URL.
		*
		* @since 1.3
		*/

		public function ajax_url() {
            return admin_url( 'admin-ajax.php', 'relative' );
		}
	        
		/**
		* osHTML5Shortcodes Constructor.
		* @access public
		* @return osHTML5Shortcodes
		* @since 1.3
		*/
		 
		public function __construct() {
			
            register_activation_hook( __FILE__, array( &$this, 'oshtml5_install' ) );
			
            // Define constants
            self::oshtml5_constants();

            // Include required files
            self::oshtml5_admin_includes();

            // Action Hooks
            add_action( 'init', array( $this, 'oshtml5_init' ), 0 );
            add_action( 'admin_init', array( $this, 'oshtml5_admin_init' ) );
			add_action( 'parse_request', array( $this, 'oshtml5_parse_request' ) );
			
            // Filter Hooks
			add_filter( 'query_vars', array( $this, 'oshtml5_query_vars' ) );
			add_filter( 'widget_text', 'do_shortcode', 11 );
		
            // Shortcode Hooks
            add_shortcode( 'oshtml5', array( $this, 'oshtml5_shortcode' ) );           
		}
	        
		/**
		* Install osHTML5Shortcodes
		* @since 1.3
		*/
		 
		public function oshtml5_install (){
			
            // Flush rules after install
            flush_rewrite_rules();

            // Redirect to welcome screen
            set_transient( '_oshtml5_activation_redirect', 1, 60 * 60 );
		}
	        
		/**
		* Define osHTML5Shortcodes Constants
		* @since 1.3
		*/
		 
		private function oshtml5_constants() {
			
			define( 'OSHTML5_PLUGIN_FILE', __FILE__ );
			define( 'OSHTML5_PLUGIN_BASENAME', plugin_basename( dirname( __FILE__ ) ) );
			define( 'OSHTML5_PLUGIN_URL', plugins_url() . '/' . OSHTML5_PLUGIN_BASENAME );
			define( 'OSHTML5_VERSION', $this->version );
			define( 'OSHTML5_TEXT_DOMAIN', 'oshtml5-shortcodes' );		
		}
	        
		/**
		* includes admin defaults files
		*
		* @since 1.3
		*/
		 
		private function oshtml5_admin_includes() { 
			
            include_once( 'includes/admin/oshtml5-about.php' );
            include_once( 'includes/admin/oshtml5-widget.php' );
            include_once( 'includes/admin/oshtml5-post-types.php' );
            include_once( 'includes/admin/oshtml5-tinymce.php' );
		}
	        
		/**
		* Init osHTML5Shortcodes when WordPress Initialises.
		* @since 1.3
		*/
		 
		public function oshtml5_init() {
	            
            self::oshtml5_do_output_buffer();
		}
	        
		/**
		* Clean all output buffers
		*
		* @since  1.3
		*/
		 
		public function oshtml5_do_output_buffer() {
	            
            ob_start( array( &$this, "oshtml5_do_output_buffer_callback" ) );
		}

		/**
		* Callback function
		*
		* @since  1.3
		*/
		 
		public function oshtml5_do_output_buffer_callback( $buffer ){
            return $buffer;
		}
		
		/**
		* Clean all output buffers
		*
		* @since  1.3
		*/
		 
		public function oshtml5_flush_ob_end(){
            ob_end_flush();
		}
	        
		/**
		* Admin init osHTML5Shortcodes when WordPress Initialises.
		* @since  1.3
		*/
		 
		public function oshtml5_admin_init() {
				
            self::oshtml5_admin_styles_scrips();
		}
	        
		/**
		* Admin side style and javascript hook for osHTML5Shortcodes
		*
		* @since  1.3
		*/
		 
		public function oshtml5_admin_styles_scrips() {
			        
			wp_enqueue_style( 'os-admin-style', plugins_url( 'css/admin/style-min.css', __FILE__ ) );
		}
		
		/**
		* Filter hook for oshtml5_query_vars
		*
		* @since  1.3
		*/
	
		function oshtml5_query_vars( $vars ) { 
					
			$vars[] = 'oshtml5';
			return $vars;
		}

		/**
		* Action hook for oshtml5_query_vars
		*
		* @since  1.3
		*/
		
		function oshtml5_parse_request( $wp ) { 

			if ( array_key_exists( 'oshtml5', $wp->query_vars ) && $wp->query_vars['oshtml5'] == 'editor_plugin_js' ) {
				require( dirname( __FILE__ ) . '/includes/admin/oshtml5-editor.php' );
				die;
			}
		}

 		/**
		* Shortcode function for os-pricing-table
		*
		* @since  1.3
		*/
		 
		public function oshtml5_shortcode( $atts ) {

			ob_start();

			// Extract oshtml5_shortcode shortcode

			$atts = shortcode_atts(
					array(
						'id' => '2'
					), $atts );
			$post_id = $atts['id'];
			$html5_content = get_post( $post_id ) ; 
			
			if( !empty( $html5_content->post_content ) ) {
				return apply_filters( 'the_content', $html5_content->post_content );
			} else {
				return '';
			}
		}	
	}   
endif;

/**
 * Returns the main instance of osHTML5Shortcodes to prevent the need to use globals.
 *
 * @since  1.3
 * @return osHTML5Shortcodes
 */
 
return new osHTML5Shortcodes;