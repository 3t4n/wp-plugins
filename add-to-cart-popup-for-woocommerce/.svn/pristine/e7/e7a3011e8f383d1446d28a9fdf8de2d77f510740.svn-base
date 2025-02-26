<?php
/**
* Plugin Name: Add To Cart Popup For Woocommerce
* Description: This plugin allows create Add To Cart Popup Woocommerce plugin.
* Version: 1.0
* Copyright: 2020
* Text Domain: add-to-cart-popup-woocommerce
* Domain Path: /languages 
*/

if (!defined('ABSPATH')) {
  die('-1');
}
if (!defined('ATCPW_PLUGIN_NAME')) {
  define('ATCPW_PLUGIN_NAME', 'Add To Cart Popup Woocommerce');
}
if (!defined('ATCPW_PLUGIN_VERSION')) {
  define('ATCPW_PLUGIN_VERSION', '2.0.0');
}
if (!defined('ATCPW_PLUGIN_FILE')) {
  define('ATCPW_PLUGIN_FILE', __FILE__);
}
if (!defined('ATCPW_PLUGIN_DIR')) {
  define('ATCPW_PLUGIN_DIR',plugins_url('', __FILE__));
}
if (!defined('ATCPW_BASE_NAME')) {
    define('ATCPW_BASE_NAME', plugin_basename(ATCPW_PLUGIN_FILE));
}
if (!defined('ATCPW_DOMAIN')) {
  define('ATCPW_DOMAIN', 'add-to-cart-popup-woocommerce');
}

global $atcpw_comman;

if (!class_exists('ATCPW')) {

	class ATCPW {

  	protected static $ATCPW_instance;

  	public static function ATCPW_instance() {
    	if (!isset(self::$ATCPW_instance)) {
      	self::$ATCPW_instance = new self();
      	self::$ATCPW_instance->init();
      	self::$ATCPW_instance->includes();
    	}
    	return self::$ATCPW_instance;
    }

  	function __construct() {
    	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    	//check plugin activted or not
    	add_action('admin_init', array($this, 'ATCPW_check_plugin_state'));
  	}

  	function init() {
    	add_action( 'admin_notices', array($this, 'ATCPW_show_notice'));
    	add_action( 'admin_enqueue_scripts', array($this, 'ATCPW_load_admin_script_style'));
    	add_action( 'wp_enqueue_scripts',  array($this, 'ATCPW_load_script_style'));
    	add_filter( 'plugin_row_meta', array( $this, 'ATCPW_plugin_row_meta' ), 10, 2 );
    }

    //Load all includes files
    function includes() {
    	include_once('includes/atcpw_comman.php');
    	include_once('includes/atcpw_backend.php');
    	include_once('includes/atcpw_front.php');
    }

    //Add JS and CSS on Backend
    function ATCPW_load_admin_script_style() {
    	wp_enqueue_style( 'ATCPW-admin-style', ATCPW_PLUGIN_DIR . '/assets/css/atcpw_admin_style.css', false, '1.0.0' );
    	wp_enqueue_script( 'ATCPW-admin-script', ATCPW_PLUGIN_DIR . '/assets/js/atcpw_admin_script.js', array( 'jquery','select2' ) );
    	wp_localize_script( 'ajaxloadpost', 'ajax_postajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    	wp_enqueue_style( 'woocommerce_admin_styles-css', WP_PLUGIN_URL. '/woocommerce/assets/css/admin.css',false,'1.0',"all");
    	wp_enqueue_style( 'wp-color-picker' );
      wp_enqueue_script( 'wp-color-picker-alpha', ATCPW_PLUGIN_DIR . '/assets/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '1.0.0', true );
    }


    function ATCPW_load_script_style() {
    	global $atcpw_comman;
    	wp_enqueue_script( 'owlcarousel', ATCPW_PLUGIN_DIR . '/assets/owlcarousel/owl.carousel.js', false, '1.0.0' );
    	wp_enqueue_style( 'owlcarousel-min', ATCPW_PLUGIN_DIR . '/assets/owlcarousel/assets/owl.carousel.min.css', false, '1.0.0' );
  		wp_enqueue_style( 'owlcarousel-theme', ATCPW_PLUGIN_DIR . '/assets/owlcarousel/assets/owl.theme.default.min.css', false, '1.0.0' );
    	wp_enqueue_style( 'ATCPW-front_css', ATCPW_PLUGIN_DIR . '/assets/css/atcpw_front_style.css', false, '1.0.0' );
    	wp_enqueue_script( 'ATCPW-front_js', ATCPW_PLUGIN_DIR . '/assets/js/atcpw_front_script.js', false, '1.0.0' );
    	wp_localize_script( 'ATCPW-front_js', 'ajax_postajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    	wp_localize_script('ATCPW-front_js', 'atcpw_urls', array(
		    'pluginsUrl' => ATCPW_PLUGIN_DIR,
			));
			wp_localize_script('ATCPW-front_js', 'atcpw_popup', array(
		    'atcpw_auto_open' => $atcpw_comman['atcpw_auto_open'],
		    'atcpw_trigger_class' => $atcpw_comman['atcpw_trigger_class'],
			));
    }

		function ATCPW_plugin_row_meta( $links, $file ) {
      if ( ATCPW_BASE_NAME === $file ) {
        $row_meta = array(
            'rating'    =>  '<a href="https://xthemeshop.com/add-to-cart-popup-woocommerce/" target="_blank">Documentation</a> | <a href="https://xthemeshop.com/contact/" target="_blank">Support</a> | <a href="#" target="_blank"><img src="'.ATCPW_PLUGIN_DIR.'/assets/images/star.png" class="atcpw_rating_div"></a>',
        );
        return array_merge( $links, $row_meta );
      }
      return (array) $links;
    }

  	function ATCPW_show_notice() {
    	if ( get_transient( get_current_user_id() . 'wfcerror' ) ) {

    		deactivate_plugins( plugin_basename( __FILE__ ) );

    		delete_transient( get_current_user_id() . 'wfcerror' );

    		echo '<div class="error"><p> This plugin is deactivated because it require <a href="plugin-install.php?tab=search&s=woocommerce">WooCommerce</a> plugin installed and activated.</p></div>';
    	}
  	}

  	function ATCPW_check_plugin_state(){
  		if ( ! ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) ) {
    		set_transient( get_current_user_id() . 'wfcerror', 'message' );
  		}
  	}
	}
	add_action('plugins_loaded', array('ATCPW', 'ATCPW_instance'));
}


add_action( 'plugins_loaded', 'ATCPW_load_textdomain' );
function ATCPW_load_textdomain() {
  load_plugin_textdomain( 'add-to-cart-popup-woocommerce', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

function ATCPW_load_my_own_textdomain( $mofile, $domain ) {
  if ( 'add-to-cart-popup-woocommerce' === $domain && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) ) {
    $locale = apply_filters( 'plugin_locale', determine_locale(), $domain );
    $mofile = WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) . '/languages/' . $domain . '-' . $locale . '.mo';
  }
  return $mofile;
}
add_filter( 'load_textdomain_mofile', 'ATCPW_load_my_own_textdomain', 10, 2 );