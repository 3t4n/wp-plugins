<?php
/**
 * Auto_Aliexpress Class
 *
 * Plugin Core Class
 *
 * @since  1.0.0
 * @package Auto Aliexpress
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Auto_Aliexpress_Core' ) ) :

   class Auto_Aliexpress_Core {

       /**
       * @var Auto_Aliexpress_Admin
       */
       public $admin;

       /**
       * Store modules objects
       *
       * @var array
       */
       public $modules = array();

       /**
       * Store forms objects
       *
       * @var array
       */
       public $forms = array();

       /**
       * Store fields objects
       *
       * @var array
       */
       public $fields = array();

       /**
       * Plugin instance
       *
       * @var null
       */
       private static $instance = null;

       /**
       * Return the plugin instance
       *
       * @since 1.0.0
       * @return Auto_Aliexpress_Core
       */
       public static function get_instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

       /**
       * Auto_Aliexpress_Core constructor.
       *
       * @since 1.0
       */
       public function __construct() {
           // Include all necessary files
           $this->includes();


           if ( is_admin() ) {
              // Initialize admin core
              $this->admin = new Auto_Aliexpress_Admin();
           }

           // Get enabled modules
           $modules       = new Auto_Aliexpress_Modules();
           $this->modules = $modules->get_modules();

           // Add integrations and logs page
           if ( is_admin() ) {
            $this->admin->add_welcome_page();
           }
       }

       /**
       * Includes
       *
       * @since 1.0.0
       */
       private function includes() {
           // Library
           if ( ! class_exists( 'simple_html_dom_node' ) ){
               require_once AUTO_ALIEXPRESS_DIR . 'includes/library/simple_html_dom.php';
           }

           if (!class_exists('Requests')) {
               require_once AUTO_ALIEXPRESS_DIR . 'includes/library/Requests/Requests.php';
               Requests::register_autoloader();
           }

           require_once AUTO_ALIEXPRESS_DIR . 'includes/library/class-requests-response.php';


           // Helpers
           require_once AUTO_ALIEXPRESS_DIR . '/includes/helpers/helper-core.php';
           require_once AUTO_ALIEXPRESS_DIR . '/includes/helpers/helper-forms.php';
           require_once AUTO_ALIEXPRESS_DIR . '/includes/helpers/helper-fields.php';
           require_once AUTO_ALIEXPRESS_DIR . '/includes/helpers/helper-addons.php';
           require_once AUTO_ALIEXPRESS_DIR . '/includes/helpers/helper-http-request.php';

           // Model
           require_once AUTO_ALIEXPRESS_DIR . '/includes/model/class-base-form-model.php';
           require_once AUTO_ALIEXPRESS_DIR . '/includes/model/class-custom-form-model.php';
           require_once AUTO_ALIEXPRESS_DIR . '/includes/model/class-attachment-model.php';


           // Jobs
           require_once AUTO_ALIEXPRESS_DIR . '/includes/jobs/abstract-class-job.php';
           require_once AUTO_ALIEXPRESS_DIR . '/includes/jobs/class-aliexpress-job.php';

           // Classes
           require_once AUTO_ALIEXPRESS_DIR . '/includes/class-loader.php';
           require_once AUTO_ALIEXPRESS_DIR . '/includes/class-modules.php';
           require_once AUTO_ALIEXPRESS_DIR . '/includes/class-log.php';
           require_once AUTO_ALIEXPRESS_DIR . '/includes/class-schedule.php';


           if ( is_admin() ) {
               require_once AUTO_ALIEXPRESS_DIR . '/admin/abstracts/class-admin-page.php';
               require_once AUTO_ALIEXPRESS_DIR . '/admin/abstracts/class-admin-module.php';
               require_once AUTO_ALIEXPRESS_DIR . '/admin/classes/class-admin.php';
           }

       }

   }

endif;
