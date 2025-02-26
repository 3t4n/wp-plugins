<?php
/**
 * Divi AiO Admin
 *
 * @package     Divi AiO
 * @author      DiviPeople
 * @copyright   Copyright (c) 2019, Brainmade Labs
 * @link        https://aio.divipeople.com
 * @since       Divi AiO 1.0.0
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Customizer Sanitizes
 */
if ( ! class_exists( 'Daio_Admin' ) ) :

	class DAIO_Admin {

		/**
		 * Instance
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Module keys
		 */
		public static $daio_extensions;

		/**
		 * Default settings
		 */
    private $daio_default_settings;

   	/**
   	 * Settings
   	 */
    private $daio_settings;
		
		/**
   	 * Get Settings
   	 */
    private $daio_get_settings;

		/**
		 * Constructor
		 */
		public function __construct() {

			// self::$daio_extension_keys = DAIO_Helper::get_addons();

			add_action('admin_menu', array( $this, 'admin_menu') );
			add_action('admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts'));
			add_action('wp_ajax_save_settings_with_ajax', array( $this, 'save_settings') );
			add_filter('admin_footer_text', array( $this, 'footer_alert') );

		}

		public function admin_menu() {

    	add_menu_page(
        'Divi AiO',
        'Divi AiO',
        'manage_options',
        'divi-aio-settings',
        array( $this, 'render_settings_page'),
        '',
        100
      );

      add_submenu_page(
        'divi-aio-settings',
        'Settings',
        'Settings',
        'manage_options',
        'divi-aio-settings',
        array( $this, 'render_settings_page')
      );

    }

    /**
	 * Admin Scripts
	 */
	 	public function admin_enqueue_scripts() {

			wp_enqueue_style( 
				'daio-admin-settings', 
				DIVI_AIO_URI . 'includes/admin/assets/css/daio-admin-settings.css', 
				array(), 
				DIVI_AIO_VER 
			);

			wp_enqueue_style( 
				'daio-sweetalert2-style', 
				DIVI_AIO_URI . 'includes/admin/assets/sweetalert2/sweetalert2.min.css', 
				array(), 
				DIVI_AIO_VER 
			);

			wp_enqueue_script( 
				'divi-sweetalert2-core', 
				DIVI_AIO_URI . 'includes/admin/assets/sweetalert2/core.js', 
				array( 'jquery' ), 
				DIVI_AIO_VER, 
				true
			);

			wp_enqueue_script( 
				'divi-sweetalert2-script', 
				DIVI_AIO_URI . 'includes/admin/assets/sweetalert2/sweetalert2.min.js', 
				array( 'jquery', 'divi-sweetalert2-core' ), 
				DIVI_AIO_VER, 
				true
			);

			wp_enqueue_script( 
				'divi-aio-admin-settings', 
				DIVI_AIO_URI . 'includes/admin/assets/js/daio-admin-settings.js', 
				array( 'jquery' ), 
				DIVI_AIO_VER, 
				true 
			);
			
			wp_localize_script( 'divi-aio-admin-settings', 'daio_script_vars', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('daio'),
      ));
		}

		/**
		 * Render Admin Page
		 */
    public function render_settings_page() { 
    	echo '<div class="daio-admin-page daio-settings-panel">';
    	$this->show_forms();
			echo '</div>';
    }

    /**
     * Show Forms
     */
    public function show_forms() {
      $this->daio_get_settings = $this->get_enabled_settings();
		  echo '<form action="" method="POST" id="daio-settings" name="daio-settings">';
		  $this->show_header();
			echo '<div class="daio-settings-contents">';
		  $this->show_navigation();
			require_once DIVI_AIO_DIR . 'includes/admin/extensions.php';
			// require_once DIVI_AIO_DIR . 'includes/admin/modules.php';
			echo '</div>';
			echo '</form>';
    }

    /**
     * Show Navigations
     */
    public function show_navigation() { 
			$html  = '<div class="daio-nav-bar">';
			$html .= '<div class="daio-container">';
			$html .= '<nav class="daio-main-navigation">';
			$html .= '<a href="#extensions" class="daio-nav-tab-link link-active">Extensions</a>';
			// $html .= '<a href="#modules" class="daio-nav-tab-link">Modules</a>';
			$html .= '</nav>';
			$html .= '</div>';
			$html .= '</div>';
			echo $html;
    }

    /**
     * Show Header
     */
    public function show_header() {
    	echo '<header class="daio-header">
				<div class="daio-container daio-flex">
					<div class="daio-title">
						<img src="' . DIVI_AIO_URI . '/assets/img/logo.png">
							<span class="daio-plugin-version">1.0.0</span>
					</div>
					<div class="daio-header-right">
						<button type="submit" class="button daio-button daio-settings-save"> 
						'. __('Save settings', 'daio') . ' 
						</button>
					</div>
				</div>
			</header>';
    }

    public static function get_default_settings() {

       $default_keys = array_fill_keys( DAIO_Helper::get_extensions(), true );
       
       return $default_keys;

    }
    
    public static function get_enabled_settings() {
        
      $enabled_keys = get_option( '_daio_enabled_extensions', self::get_default_settings() );
        
      return $enabled_keys;

    }

    /**
     * Save Settings
     */
    public function save_settings() {

    	check_ajax_referer( 'daio', 'security' );

			if( isset( $_POST['fields'] ) ) {
				parse_str( $_POST['fields'], $settings );
			} else {
				return;
			}

			$this->daio_settings = array(
				'header-sections'		=> intval( $settings['header-sections'] ? 1 : 0 ),
				'blog-pro' 					=> intval( $settings['blog-pro'] ? 1 : 0 ),
				'svg-support'				=> intval( $settings['svg-support'] ? 1 : 0 ),
				'advanced-footer' 	=> intval( $settings['advanced-footer'] ? 1 : 0 ), 
				'advanced-headers' 	=> intval( $settings['advanced-headers'] ? 1 : 0 )
			);

      update_option( '_daio_enabled_extensions', $this->daio_settings );
      
      return true;

      die();

    }



    /**
     * Footer Alert
     */
    function footer_alert() {
    	echo '<p id="footer-left" class="alignleft"> Please rate <strong>DiviAiO</strong> <a class="daio-no-text-decoration" href="" target="_blank" rel="noopener noreferrer">★★★★★</a> on <a href="" target="_blank" rel="noopener noreferrer">WordPress.org</a> to help us spread the word. We really appreciate your support!	</p>';
    }

	}

endif;

Daio_Admin::get_instance();
