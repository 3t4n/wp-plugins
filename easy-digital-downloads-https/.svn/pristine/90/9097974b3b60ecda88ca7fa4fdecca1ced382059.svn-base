<?php
/*
Plugin Name: Easy Digital Downloads HTTPS
Plugin URI: http://takebarcelona.com/easy-digital-downloads-https/
Description: HTTPS (SSL) Switcher for Easy Digital Downloads.
Version: 0.3.1
Author: ulih
Author URI: http://takebarcelona.com/
*/

// Say goodbye
if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'EDD_HTTPS' ) ) {
	final class EDD_HTTPS {
		private static $instance;
		protected $plugtitle 			   = 'Easy Digital Downloads HTTPS';
		protected $edd_pages			   = false;
		protected $edd_https_pages	       = false;
		protected $enabled				   = false;

		/**
		 * Main Instance
		 *
		 * @since 0.1.0
		 * @static
		 * @staticvar array $instance
		 * @return the one and only instance to live in memory
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof EDD_HTTPS ) ) {
				self::$instance = new EDD_HTTPS;
				self::$instance->define_constants();
				self::$instance->load_i18n();
				self::$instance->launch_edd_https();
			}
			return self::$instance;
		}

		/**
		 * Error on object clone
		 *
		 * @since 0.1.0
		 * @access protected
		 * @return void
		 */
		public function __clone() {
			// Cloning class instance is forbidden
			_doing_it_wrong( __FUNCTION__, __( 'No way...', 'edd_https' ), '0.1.0' );
		}

		/**
		 * Prevent unserializing of the class
		 *
		 * @since 0.1.0
		 * @access protected
		 * @return void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'No way...', 'edd_https' ), '0.1.0' );
		}
		
		/**
		 * Plugin constants
		 *
		 * @access private
		 * @since 0.1.0
		 * @return void
		 */
		private function define_constants() {
			
			// Plugin version
			if ( ! defined( 'EDD_HTTPS_VERSION' ) ) {
				define( 'EDD_HTTPS_VERSION', '0.1.0' );
			}

			// Plugin Folder Path
			if ( ! defined( 'EDD_HTTPS_PLUGIN_DIR' ) ) {
				define( 'EDD_HTTPS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
			}

			// Plugin Folder URL
			if ( ! defined( 'EDD_HTTPS_PLUGIN_URL' ) ) {
				define( 'EDD_HTTPS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
			}

			// Plugin Root File
			if ( ! defined( 'EDD_HTTPS_PLUGIN_FILE' ) ) {
				define( 'EDD_HTTPS_PLUGIN_FILE', __FILE__ );
			}
		}
		
		/**
		 * Check for language files
		 *
		 * @access public
		 * @since 0.1.0
		 * @return void
		 */
		public function load_i18n() {
			// Set filter for plugin's languages directory
			$edd_https_lang_dir = dirname( plugin_basename( EDD_HTTPS_PLUGIN_FILE ) ) . '/languages/';
			$edd_https_lang_dir = apply_filters( 'edd_https_languages_directory', $edd_https_lang_dir );

			// Traditional WordPress plugin locale filter
			$locale        = apply_filters( 'plugin_locale',  get_locale(), 'edd_https' );
			$mofile        = sprintf( '%1$s-%2$s.mo', 'edd_https', $locale );

			// Setup paths to current locale file
			$mofile_local  = $edd_https_lang_dir . $mofile;
			$mofile_global = WP_LANG_DIR . '/edd_https/' . $mofile;

			if ( file_exists( $mofile_global ) ) {
				// Look in global /wp-content/languages/edd_https folder
				load_textdomain( 'edd_https', $mofile_global );
			} elseif ( file_exists( $mofile_local ) ) {
				// Look in local /wp-content/plugins/stripe-for-edd/languages/ folder
				load_textdomain( 'edd_https', $mofile_local );
			} else {
				// Load the default language files
				load_plugin_textdomain( 'edd_https', false, $edd_https_lang_dir );
			}
		}
		
		/**
		 * Launch the whole thing
		 *
		 * @access public
		 * @since 0.1.0
		 * @changed 0.3.0 support for additional page_ids
		 * @return void
		 */
		private function launch_edd_https( ) {
			global $edd_options;
			$this -> enabled = isset( $edd_options['edd_https_enable'] ) ? $edd_options['edd_https_enable'] : 0;
			$this -> edd_https_pages = isset( $edd_options['edd_https_pages'] ) ? $edd_options['edd_https_pages'] : 0;
			if ( is_admin() ) :
				add_filter('edd_settings_extensions', array($this, 'edd_https_settings'), 10);		
			elseif ( $this -> enabled ) :
				$this -> edd_pages = $this -> edd_https_get_edd_pages();
				// HTTPS urls with SSL on
				if ( is_ssl() ) :
					$filters = array( 'post_thumbnail_html', 'wp_get_attachment_url', 'wp_get_attachment_image_attributes', 'wp_get_attachment_url', 'option_stylesheet_url', 'option_template_url', 'script_loader_src', 'style_loader_src', 'template_directory_uri', 'stylesheet_directory_uri', 'site_url' );
					foreach ( $filters as $filter ) {
						add_filter( $filter, array($this, 'edd_https_html'), 1 );
					}
				endif;
				//make the thing woocommerce compatible
				add_filter( 'woocommerce_unforce_ssl_checkout', array($this, 'edd_https_woocommerce_unforce_ssl_checkout'), 1, 1 );	
				add_filter( 'plugins_url', array($this, 'edd_https_load_plugin_ssl'), 10, 3);
				add_action( 'template_redirect', array($this, 'edd_https_template_redirect'), 99 );
				add_filter( 'pre_post_link', array($this, 'edd_https_force_ssl_page'), 10, 3 );		
			endif;
		}
		
		/**
		 * Merge into extensions settings
		 *
		 * @access public
		 * @since 0.1.0
		 * @changed 0.3.0 to add support for additional pages specifying page_ids
		 * @return array settings
		 */		
		public function edd_https_settings( $settings ) {

			$https_settings = array(
				array(
					'id' => 'edd_https_header',
					'name' => '<strong>' . __( 'EDD HTTPS Enforce', 'edd_https' ) . '</strong>',
					'desc' => '',
					'type' => 'header',
					'size' => 'regular'
				),
				array(
					'id' => 'edd_https_enable',
					'name' => __( 'Enable HTTPS', 'edd_https' ),
					'desc' => __( 'Check this box if you want to load the EDD checkout page via https.', 'edd_https' ),
					'type' => 'checkbox'
				),
				array(
					'id' => 'edd_https_pages',
					'name' => __( 'Secure Pages', 'edd_https' ),
					'desc' => __( 'Secure other pages. Add page and post ids here, integers, separated by coma. Example: 10,103,244', 'edd_https' ),
					'type' => 'text',
					'size' => 'regular',
					'std'  => '',
				),
			);

			return array_merge( $settings, $https_settings );
		}

		/**
		 * Filter content
		 *
		 * @access public
		 * @since 0.1.0
		 * @return $content
		 */
		public function edd_https_html( $content )
		{
			if ( is_ssl() ) {
				if ( is_array( $content ) )
					$content = array_map( array($this, 'edd_https_html'), $content );
				else
					$content = str_replace( 'http:', 'https:', $content );
			}
			return $content;
		}

		/**
		 * WooCommerce compatibility
		 *
		 * @access public
		 * @since 0.1.0
		 * @return bool $unforce
		 */
		public function edd_https_woocommerce_unforce_ssl_checkout( $unforce ) {
			if ( !is_admin() && (is_page() || is_single()) ) :
				$template = 'page-ssl.php';	
				$page_object = get_queried_object();
				$page_id     = get_queried_object_id();			
				if ( in_array( $page_id, $this -> edd_pages, true ) || is_page_template($template) ) :
					return false;
				endif;
			endif;
			return $unforce;
		}	

		/**
		 * Assure plugin urls to be ssl
		 *
		 * @access public
		 * @since 0.1.0
		 * @modified 0.3.1
		 * @return $url
		 */
		public function edd_https_load_plugin_ssl($url, $path, $plugin) {
			if ( is_ssl() ) :
				$url = preg_replace('|^http://|', 'https://', $url);
			endif;
			return $url;
		}

		/**
		 * Template ssl redirect function
		 *
		 * @access public
		 * @since 0.1.0
		 * @handle redirect
		 * @return void
		 */
		public function edd_https_template_redirect(){
			if ( !is_admin() && (is_page() || is_single()) ) :
				$template = 'page-ssl.php';	
				$page_object = get_queried_object();
				$page_id     = get_queried_object_id();	
				if ( ( is_page_template($template) || in_array( $page_id, $this -> edd_pages, true ) ) && !is_ssl() ) :
					if ( 0 === strpos($_SERVER['REQUEST_URI'], 'http') ) {
						wp_safe_redirect(preg_replace('|^http://|', 'https://', $_SERVER['REQUEST_URI']), 301 );
						exit();
					} else {
						wp_safe_redirect('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], 301 );
						exit();
					}
				elseif ( !is_ajax() && is_ssl() && !in_array( $page_id, $this -> edd_pages, true ) && !is_page_template($template) && (!class_exists('WC_HTTPS') || get_option('woocommerce_unforce_ssl_checkout') != 'yes' ) ) :
					if ( 0 === strpos($_SERVER['REQUEST_URI'], 'https') ) {
						wp_safe_redirect(preg_replace('|^https://|', 'http://', $_SERVER['REQUEST_URI']), 301 );
						exit();
					} else {
						wp_safe_redirect('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], 301 );
						exit();
					}
				endif;
			endif;
		}

		/**
		 * Check for page template or edd page and filter permalink
		 *
		 * @access public
		 * @since 0.1.0
		 * @return $permalink
		 */
		public function edd_https_force_ssl_page( $permalink, $post, $leavename ) {
			$template = get_post_meta( $post->ID, '_wp_page_template', true );
			if ( $template == 'page-ssl.php' || in_array( $post->ID, $this -> edd_pages, true ) ) :
				return preg_replace( '|^http://|', 'https://', $permalink );				
			endif;
			return $permalink;
		}
		
		/**
		 * Get edd system pages
		 *
		 * @access private
		 * @since 0.1.0
		 * @changed 0.3.0 to allow additional pages to switch to https
		 * @return array $edd_pages
		 */		
		private function edd_https_get_edd_pages() {
			global $edd_options;
			$purchase_page_id = $edd_options["purchase_page"];
			$success_page_id = $edd_options["success_page"];
			$failure_page_id = $edd_options["failure_page"];
			$edd_pages = array();
			$edd_pages[] = (int)$purchase_page_id;
			$edd_pages[] = (int)$success_page_id;
			$edd_pages[] = (int)$failure_page_id;
			if ( $this -> edd_https_pages ) :
				$https_pages = array_map( 'trim', explode( ",", strtolower($this -> edd_https_pages) ) );
				foreach ( $https_pages as $key => $page_id ) :
					if ( $page_id && !in_array((int)$page_id, $edd_pages, true ) ) :
						$edd_pages[] = (int)$page_id;
					endif;
				endforeach;
			endif;
			return $edd_pages;
		}
	}
}

/**
 * Function that start and holds the singleton instance
 *
 * @since 0.1.0
 * @access object edd_https
 */
function EDD_SSL() {
	return EDD_HTTPS::instance();
}

function edd_ssl_init() 
{
    if (class_exists('Easy_Digital_Downloads') && !is_null(EDD()) )
    {
		EDD_SSL();
    }
}
add_action('plugins_loaded', 'edd_ssl_init', 0);
