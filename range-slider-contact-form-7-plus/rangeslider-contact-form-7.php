<?php  
/**
* Plugin Name: Range Slider contact Form 7
* Description: his plugin allows create Rangeslider for Contact Form 7.
* Version: 1.0
* Author: ABS creative
* Author URI: https://www.shopiimart.com/
* License: A "GNUGPLv3" license name 
*/

if (!defined('ABSPATH')) {
    die('-1');
}
if (!defined('ESRSCF_PLUGIN_NAME')) {
    define('ESRSCF_PLUGIN_NAME', 'Range Slider Contact Form 7');
}
if (!defined('ESRSCF_PLUGIN_VERSION')) {
    define('ESRSCF_PLUGIN_VERSION', '1.0.0');
}
if (!defined('ESRSCF_PLUGIN_FILE')) {
    define('ESRSCF_PLUGIN_FILE', __FILE__);
}
if (!defined('ESRSCF_PLUGIN_DIR')) {
    define('ESRSCF_PLUGIN_DIR',plugins_url('', __FILE__));
}
if (!defined('ESRSCF_DOMAIN')) {
    define('ESRSCF_DOMAIN', 'esrscf');
}
if (!class_exists('ESRSCF')) {

	class ESRSCF {

      	protected static $ESRSCF_instance;
     	//Load all includes files
    	function ESRSCF_includes() {
      	   include_once('admin/rangeslider-cf7.php');
        }

    	function ESRSCF_init() {
            add_action( 'admin_init', array($this, 'ESRSCF_load_plugin'), 11 );
            add_action( 'wp_enqueue_scripts',  array($this, 'ESRSCF_load_script_style'));
        }

      	function ESRSCF_load_plugin() {
            if ( ! ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) ) {
            add_action( 'admin_notices', array($this,'ESRSCF_install_error') );
            }
        }

      	function ESRSCF_install_error() {
            deactivate_plugins( plugin_basename( __FILE__ ) );
                ?>
                <div class="error">
                  <p>
                    <?php _e( 'cf7 calculator plugin is deactivated because it require <a href="plugin-install.php?tab=search&s=contact+form+7">Contact Form 7</a> plugin installed and activated.', ESRSCF_DOMAIN ); ?>
                  </p>
                </div>
         <?php
      	}

        //Add JS and CSS on Frontend
        function ESRSCF_load_script_style() {
          	wp_enqueue_script( 'ESRSCF-frontside-js', ESRSCF_PLUGIN_DIR .'/assest/js/frontside.js', false, '2.0.0' );
        	wp_enqueue_script( 'jquery-ui' );
         	wp_enqueue_script( 'jquery-ui-slider' );
         	wp_enqueue_script( 'jquery-touch-punch' );
         	wp_enqueue_script( 'ESRSCF-jquery-ui-touch-punch-js', ESRSCF_PLUGIN_DIR .'/assest/js/jquery.ui.touch-punch.min.js', false, '2.0.0' );
         	wp_enqueue_style( 'ESRSCF-front-jquery-ui-css', ESRSCF_PLUGIN_DIR .'/assest/css/jquery-ui.css', false, '2.0.0' );
         	wp_enqueue_style( 'ESRSCF-front-css', ESRSCF_PLUGIN_DIR .'/assest/css/front-side.css', false, '2.0.0' );
        }

        //Plugin Rating
        public static function do_activation() {
          set_transient('esrscf-first-rating', true, MONTH_IN_SECONDS);
        }

        public static function ESRSCF_instance() {
          if (!isset(self::$ESRSCF_instance)) {
            self::$ESRSCF_instance = new self();
            self::$ESRSCF_instance->ESRSCF_init();
            self::$ESRSCF_instance->ESRSCF_includes();
          }
          return self::$ESRSCF_instance;
        }

    }

    add_action('plugins_loaded', array('ESRSCF', 'ESRSCF_instance'));

    register_activation_hook(ESRSCF_PLUGIN_FILE, array('ESRSCF', 'do_activation'));

    
}