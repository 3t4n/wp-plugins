<?php 
/*
	Plugin Name: AI Addons for Elementor
	Plugin URI: http://aiaddons.ai/
	Description: Discover the most advanced Elementor addons: AI featured widgets, Header & Footer builders, Mega menu builder, layout pack, drag and drop custom controls and potent custom controls.
	Version: 2.2.1
	Author: aiwp
	Author URI: https://profiles.wordpress.org/aiwp/
	Text Domain: ai-addons
	License: GPLv2 or later
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'AIEA_BILLIONAIRE', true );

// Check pro status 
$pro_stat = get_option( 'aiea_pro_status' );
if( ( !empty( $pro_stat ) && $pro_stat == 'activated' ) || ( is_admin() && isset( $_GET['action'] ) && $_GET['action'] == 'activate' && isset( $_GET['plugin'] ) && $_GET['plugin'] == 'ai-addons-pro' ) ) return;

define( 'AIEA_BASE', __FILE__ );
define( 'AIEA_DIR', plugin_dir_path( __FILE__ ) );
define( 'AIEA_URL', plugin_dir_url( __FILE__ ) );

if( ! class_exists('AIEA_Init') ) {
	
	/*
	* Intialize and Sets up the plugin
	*/
	class AIEA_Init {
			
		/**
		 * Minimum Elementor Version
		 *
		 * @since 1.0.0
		 *
		 * @var string Minimum Elementor version required to run the plugin.
		 */
		const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

		/**
		 * Minimum PHP Version
		 *
		 * @since 1.0.0
		 *
		 * @var string Minimum PHP version required to run the plugin.
		 */
		const MINIMUM_PHP_VERSION = '5.0';
        
		/**
		 * Instance
		 *
		 * @since 1.0.0
		 *
		 * @access private
		 * @static
		 *
		 * @var AIEA_Init The single instance of the class.
		 */
		private static $_instance = null;
		
        /**
        * Sets up needed actions/filters for the plug-in to initialize.
        * @since 1.0.0
        * @access public
        * @return void
        */
        public function __construct() {
			
			register_activation_hook( __FILE__, [ $this, 'on_activation' ] );
			
			// Check elementor status
			add_action( 'plugins_loaded', array( $this, 'aiea_plugins_loaded' ) );
		
        }
		
		public function aiea_plugins_loaded(){
			
			if( ! $this->is_compatible() ) return false;				
			
			//Classic elementor addon shortcodes
            add_action( 'init', array( $this, 'init_addons' ), 20 );
						
			// Elementor init
			add_action('elementor/init', [ $this, 'add_hooks' ]);			
			
			// Plugin ajax calls
			$this->aiea_ajax_calls();
			
			// Templates library
			$this->load_library_templates();
			
			//Load text domain
            $this->load_domain();
			
			// Modules
			$this->aiea_modules();
			
		}
				
		public function is_compatible(){			
			
			// Check if Elementor installed and activated
			if ( ! did_action( 'elementor/loaded' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
				return false;
			}
			
			// Check for required Elementor version
			if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
				return false;
			}

			// Check for required PHP version
			if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
				return false;
			}
			
			return true;
			
		}
		
		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have Elementor installed or activated.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function admin_notice_missing_main_plugin() {

			if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

			$message = sprintf(
				/* translators: 1: Plugin name 2: Elementor */
				esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'ai-addons' ),
				'<strong>' . esc_html__( 'AI Addons', 'ai-addons' ) . '</strong>',
				'<a href="'. esc_url(  admin_url( 'plugin-install.php?tab=plugin-information&plugin=elementor&TB_iframe=true&width=772&height=670' ) ) .'" class="thickbox open-plugin-details-modal"><strong>' . esc_html__( 'Elementor', 'ai-addons' ) . '</strong></a>'
			);

			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required Elementor version.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function admin_notice_minimum_elementor_version() {

			if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

			$message = sprintf(
				/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'ai-addons' ),
				'<strong>' . esc_html__( 'AI Addons', 'ai-addons' ) . '</strong>',
				'<a href="'. esc_url(  admin_url( 'plugin-install.php?tab=plugin-information&plugin=elementor&TB_iframe=true&width=772&height=670' ) ) .'" class="thickbox open-plugin-details-modal"><strong>' . esc_html__( 'Elementor', 'ai-addons' ) . '</strong></a>',
				 self::MINIMUM_ELEMENTOR_VERSION
			);

			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required PHP version.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function admin_notice_minimum_php_version() {

			if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

			$message = sprintf(
				/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'ai-addons' ),
				'<strong>' . esc_html__( 'AI Addons', 'ai-addons' ) . '</strong>',
				'<strong>' . esc_html__( 'PHP', 'ai-addons' ) . '</strong>',
				 self::MINIMUM_PHP_VERSION
			);

			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

		}
		
		public function add_hooks(){

			require_once ( AIEA_DIR . 'includes/modules/section.php' );		
			
		}
		
		public function aiea_ajax_calls(){
			
			// AIEA ajax calls
			require_once ( AIEA_DIR . 'includes/class.ai-ajax-calls.php' );
			
		}
		
		public function load_library_templates(){
			
			// AIEA ajax calls
			require_once ( AIEA_DIR . 'core/admin/ai-templates-library.php' );
			
		}
		
        /**
         * Load plugin translated strings using text domain
         * @since 2.6.8
         * @access public
         * @return void
         */
        public function load_domain() {
			
			load_plugin_textdomain( 'ai-addons', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
			
        }
		
        
        /**
        * Load required file for addons integration
        * @return void
        */
        public function init_addons() {
			
			require_once ( AIEA_DIR . 'includes/ai-gateway.php' );
			
        }
		
		/**
        * set default options
        * @return void
        */
		public function on_activation() {
			
			require_once ( AIEA_DIR . 'core/admin/ai-default.php' );
			
		}
		
		/**
        * Register cpt
        * @return void
        */
		function aiea_modules() {
			
			require_once ( AIEA_DIR . 'core/modules.php' );
			
		}
        
        /**
         * Creates and returns an instance of the class
         * @since 2.6.8
         * @access public
         * return object
         */
        public static function get_instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}
    
    }
}

//Create/Call AI Addons
AIEA_Init::get_instance();	
