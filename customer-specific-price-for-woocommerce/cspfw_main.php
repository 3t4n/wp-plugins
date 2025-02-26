<?php
/**
* Plugin Name: Customer Specific Price For Woocommerce
* Description: This plugin allows create Customer Specific Pricing For Woocommerce plugin.
* Version: 1.0
* Copyright: 2020
* Text Domain: customer-specific-pricing-for-woocommerce
* Domain Path: /languages 
*/

if (!defined('ABSPATH')) {
  die('-1');
}
if (!defined('CSPFW_PLUGIN_NAME')) {
  define('CSPFW_PLUGIN_NAME', 'Customer Specific Pricing For Woocommerce');
}
if (!defined('CSPFW_PLUGIN_VERSION')) {
  define('CSPFW_PLUGIN_VERSION', '2.0.0');
}
if (!defined('CSPFW_PLUGIN_FILE')) {
  define('CSPFW_PLUGIN_FILE', __FILE__);
}
if (!defined('CSPFW_PLUGIN_DIR')) {
  define('CSPFW_PLUGIN_DIR',plugins_url('', __FILE__));
}
if (!defined('CSPFW_BASE_NAME')) {
    define('CSPFW_BASE_NAME', plugin_basename(CSPFW_PLUGIN_FILE));
}
if (!defined('CSPFW_DOMAIN')) {
  define('CSPFW_DOMAIN', 'customer-specific-pricing-for-woocommerce');
}

if (!class_exists('CSPFW')) {

	class CSPFW {

  	protected static $CSPFW_instance;

  	public static function CSPFW_instance() {
    	if (!isset(self::$CSPFW_instance)) {
      	self::$CSPFW_instance = new self();
      	self::$CSPFW_instance->init();
      	self::$CSPFW_instance->includes();
    	}
    	return self::$CSPFW_instance;
    }

  	function __construct() {
    	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    	//check plugin activted or not
    	add_action('admin_init', array($this, 'CSPFW_check_plugin_state'));
  	}

  	function init() {
    	add_action( 'admin_notices', array($this, 'CSPFW_show_notice'));
    	add_action( 'admin_enqueue_scripts', array($this, 'CSPFW_load_admin_script_style'));
    	add_action( 'wp_enqueue_scripts',  array($this, 'CSPFW_load_script_style'));
    	add_filter( 'plugin_row_meta', array( $this, 'CSPFW_plugin_row_meta' ), 10, 2 );
    }

    //Load all includes files
    function includes() {
    	include_once('includes/cspfw_comman.php');
    	// include_once('includes/cspfw_svg.php');
    	include_once('includes/cspfw_backend.php');
    	include_once('includes/cspfw_front.php');
    }

    //Add JS and CSS on Backend
    function CSPFW_load_admin_script_style() {
    	wp_enqueue_style( 'CSPFW-admin-style', CSPFW_PLUGIN_DIR . '/assets/css/cspfw_admin_style.css', false, '1.0.0' );
      wp_enqueue_script( 'CSPFW-admin-script', CSPFW_PLUGIN_DIR . '/assets/js/cspfw_admin_script.js', array( 'jquery','select2' ) );
      wp_enqueue_script( 'jquery-ui-datepicker' );
      wp_enqueue_style( 'jquery-ui', CSPFW_PLUGIN_DIR.'/assets/css/jquery-ui.css', false, '1.0' );
      wp_enqueue_style( 'jquery-ui' );
      wp_localize_script( 'ajaxloadpost', 'ajax_postajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
      wp_enqueue_style( 'woocommerce_admin_styles-css', WP_PLUGIN_URL. '/woocommerce/assets/css/admin.css',false,'1.0',"all");
      wp_enqueue_style( 'wp-color-picker' );
      wp_enqueue_script( 'wp-color-picker-alpha', CSPFW_PLUGIN_DIR . '/assets/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '1.0.0', true );
    }


    function CSPFW_load_script_style() {
      wp_enqueue_style( 'CSPFW-front_css', CSPFW_PLUGIN_DIR . '/assets/css/cspfw_front_style.css', false, '1.0.0' );
    }

		function CSPFW_plugin_row_meta( $links, $file ) {
      if ( CSPFW_BASE_NAME === $file ) {
        $row_meta = array(
            'rating'    =>  '<a href="https://www.xeeshop.com/customer-specific-pricing-for-woocommerce/" target="_blank">Documentation</a> | <a href="https://www.xeeshop.com/support-us/?utm_source=aj_plugin&utm_medium=plugin_support&utm_campaign=aj_support&utm_content=aj_wordpress" target="_blank">Support</a> | <a href="#" target="_blank"><img src="'.CSPFW_PLUGIN_DIR.'/assets/images/star.png" class="cspfw_rating_div"></a>',
        );
        return array_merge( $links, $row_meta );
      }
      return (array) $links;
    }

  	function CSPFW_show_notice() {
    	if ( get_transient( get_current_user_id() . 'wfcerror' ) ) {

    		deactivate_plugins( plugin_basename( __FILE__ ) );

    		delete_transient( get_current_user_id() . 'wfcerror' );

    		echo '<div class="error"><p> This plugin is deactivated because it require <a href="plugin-install.php?tab=search&s=woocommerce">WooCommerce</a> plugin installed and activated.</p></div>';
    	}
  	}

  	function CSPFW_check_plugin_state(){
  		if ( ! ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) ) {
    		set_transient( get_current_user_id() . 'wfcerror', 'message' );
  		}
  	}
	}
	add_action('plugins_loaded', array('CSPFW', 'CSPFW_instance'));
}


add_action( 'plugins_loaded', 'CSPFW_load_textdomain' );
function CSPFW_load_textdomain() {
  load_plugin_textdomain( 'customer-specific-pricing-for-woocommerce', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

function CSPFW_load_my_own_textdomain( $mofile, $domain ) {
  if ( 'customer-specific-pricing-for-woocommerce' === $domain && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) ) {
    $locale = apply_filters( 'plugin_locale', determine_locale(), $domain );
    $mofile = WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) . '/languages/' . $domain . '-' . $locale . '.mo';
  }
  return $mofile;
}
add_filter( 'load_textdomain_mofile', 'CSPFW_load_my_own_textdomain', 10, 2 );
