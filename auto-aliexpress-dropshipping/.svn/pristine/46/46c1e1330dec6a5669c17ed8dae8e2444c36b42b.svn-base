<?php
/**
 * Auto_Aliexpress_Admin Class
 *
 * @since  1.0.0
 * @package Auto Aliexpress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'Auto_Aliexpress_Admin' ) ) :

   class Auto_Aliexpress_Admin {

	   /**
	   * @var array
	   */
	   public $pages = array();

       /**
        * @var array
        */
       public $addons = array();

	   /**
	   * Auto_Aliexpress_Admin constructor.
	   */
	   public function __construct() {
           $this->includes();

           // Init admin pages
           add_action( 'admin_menu', array( $this, 'add_dashboard_page' ) );

           // Init Admin AJAX class
           new Auto_Aliexpress_Admin_AJAX();

		   /**
		   * Triggered when Admin is loaded
		   */
		   do_action( 'auto_aliexpress_admin_loaded' );
       }

       /**
	   * Include required files
	   *
	   * @since 1.0.0
	   */
       private function includes() {
           // Admin pages
		   require_once AUTO_ALIEXPRESS_DIR . '/admin/pages/dashboard-page.php';
           require_once AUTO_ALIEXPRESS_DIR . '/admin/pages/integrations-page.php';
		   require_once AUTO_ALIEXPRESS_DIR . '/admin/pages/welcome-page.php';


           // Admin AJAX
		   require_once AUTO_ALIEXPRESS_DIR . '/admin/classes/class-admin-ajax.php';

           // Admin Data
           require_once AUTO_ALIEXPRESS_DIR . '/admin/classes/class-admin-data.php';
	   }

	   /**
		* Add welcome page
		*
		* @since 1.0.0
		*/
		public function add_welcome_page() {
			add_action( 'admin_menu', array( $this, 'init_welcome_page' ) );
		}

		/**
		 * Initialize Logs page
		 *
		 * @since 1.0.0
		 */
		public function init_welcome_page() {
			$this->pages['auto-aliexpress-welcome'] = new Auto_Aliexpress_Welcome_Page(
				'auto-aliexpress-welcome',
				'welcome',
				__( 'Welcome', Auto_Aliexpress::DOMAIN ),
				__( 'Welcome', Auto_Aliexpress::DOMAIN ),
				'auto-aliexpress'
			);
		}

	   /**
	   * Initialize Dashboard page
	   *
	   * @since 1.0.0
	   */
	   public function add_dashboard_page() {
           $title = esc_html__( 'Auto Aliexpress', Auto_Aliexpress::DOMAIN );
           $this->pages['auto_aliexpress']           = new Auto_Aliexpress_Dashboard_Page( 'auto-aliexpress', 'dashboard', $title, $title, false, false );
		   $this->pages['auto_aliexpress-dashboard'] = new Auto_Aliexpress_Dashboard_Page( 'auto-aliexpress', 'dashboard', esc_html__( 'Auto Aliexpress Dashboard', Auto_Aliexpress::DOMAIN ), esc_html__( 'Dashboard', Auto_Aliexpress::DOMAIN ), 'auto-aliexpress' );
	   }

	   /**
		* Add Integrations page
		*
		* @since 1.0.0
		*/
	   public function add_integrations_page() {
		   add_action( 'admin_menu', array( $this, 'init_integrations_page' ) );
	   }

       /**
        * Initialize Integrations page
        *
        * @since 1.0.0
        */
       public function init_integrations_page() {
           $this->pages['auto-aliexpress-integrations'] = new Auto_Aliexpress_Integrations_Page(
               'auto-aliexpress-integrations',
               'integrations',
               esc_html__( 'Integrations', Auto_Aliexpress::DOMAIN ),
               esc_html__( 'Integrations', Auto_Aliexpress::DOMAIN ),
               'auto-aliexpress'
           );
       }


   }

endif;
