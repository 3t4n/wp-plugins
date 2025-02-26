<?php 
/**
* Plugin Name: Pre Order for WooCommerce
* Description: This plugin allows create Pre Order plugin.
* Version: 1.0
* Copyright: 2020
* Text Domain: pre-order-for-wooCommerce
* Domain Path: /languages 
*/

if (!defined('ABSPATH')) {
	exit();
}
if (!defined('POFW_PLUGIN_NAME')) {
  define('POFW_PLUGIN_NAME', 'Pre Order for WooCommerce');
}
if (!defined('POFW_PLUGIN_VERSION')) {
  define('POFW_PLUGIN_VERSION', '2.0.0');
}
if (!defined('POFW_PLUGIN_FILE')) {
  define('POFW_PLUGIN_FILE', __FILE__);
}
if (!defined('POFW_PLUGIN_DIR')) {
  define('POFW_PLUGIN_DIR',plugins_url('', __FILE__));
}
if (!defined('POFW_BASE_NAME')) {
    define('POFW_BASE_NAME', plugin_basename(POFW_PLUGIN_FILE));
}
if (!defined('POFW_DOMAIN')) {
  define('POFW_DOMAIN', 'pre-order-for-wooCommerce');
}

if (!class_exists('POFW')) {

	class POFW {

  	protected static $POFW_instance;

  	public static function POFW_instance() {
    	if (!isset(self::$POFW_instance)) {
      	self::$POFW_instance = new self();
      	self::$POFW_instance->init();
      	self::$POFW_instance->includes();
    	}
    	return self::$POFW_instance;
    }

    function __construct() {
    	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    	//check plugin activted or not
    	add_action('admin_init', array($this, 'POFW_check_plugin_state'));
  	}

  	function init() {	   
  		add_action( 'admin_notices', array($this, 'POFW_show_notice'));   	
    	add_action( 'admin_enqueue_scripts', array($this, 'POFW_load_admin_script_style'));
    	add_action( 'wp_enqueue_scripts',  array($this, 'POFW_load_script_style'));
  		add_filter( 'plugin_row_meta', array( $this, 'POFW_plugin_row_meta' ), 10, 2 );

    }		

    //Load all includes files
    function includes() {
    	include_once('includes/pofw_comman.php');
      include_once('includes/pofw_backend.php');
      include_once('includes/pofw_kit.php');
    	include_once('includes/pofw_frontend.php');
    }

    function POFW_load_admin_script_style() {
  	  wp_enqueue_style( 'pofw-backend-css', POFW_PLUGIN_DIR.'/assets/css/pofw_backend_css.css', false, '1.0' );
      wp_enqueue_script( 'pofw-backend-js', POFW_PLUGIN_DIR.'/assets/js/pofw_backend_js.js', false, '1.0' );
      wp_enqueue_script( 'jquery-ui-datepicker' );
      wp_enqueue_style( 'jquery-ui', POFW_PLUGIN_DIR.'/assets/css/jquery-ui.css', false, '1.0' );
      wp_enqueue_script('jquery');
      wp_enqueue_style( 'wp-color-picker' );
      wp_enqueue_script( 'wp-color-picker-alpha', POFW_PLUGIN_DIR . '/assets/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '1.0.0', true );
    }


    function POFW_load_script_style() {
      wp_enqueue_style( 'pofw-front-css', POFW_PLUGIN_DIR.'/assets/css/pofw_front_css.css', false, '1.0' );
    }

    function POFW_show_notice() {
    	if ( get_transient( get_current_user_id() . 'wfcerror' ) ) {

    		deactivate_plugins( plugin_basename( __FILE__ ) );

    		delete_transient( get_current_user_id() . 'wfcerror' );

    		echo '<div class="error"><p> This plugin is deactivated because it require <a href="plugin-install.php?tab=search&s=woocommerce">WooCommerce</a> plugin installed and activated.</p></div>';
    	}
  	}

    function POFW_plugin_row_meta( $links, $file ) {
      if ( POFW_BASE_NAME === $file ) {
        $row_meta = array(
            'rating'    =>  '<a href="https://xthemeshop.com/pre-order-for-woocommerce/" target="_blank">Documentation</a> | <a href="https://xthemeshop.com/contact/" target="_blank">Support</a> | <a href="https://wordpress.org/support/plugin/pre-order-for-woocommerce/reviews/?filter=5" target="_blank"><img src="'.POFW_PLUGIN_DIR.'/images/star.png" class="pofw_rating_div"></a>'
        );
        return array_merge( $links, $row_meta );
      }
      return (array) $links;
    }

    function POFW_check_plugin_state(){
  		if ( ! ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) ) {
    		set_transient( get_current_user_id() . 'wfcerror', 'message' );
  		}
  	}
	}
	add_action('plugins_loaded', array('POFW', 'POFW_instance'));  	
}


add_action( 'plugins_loaded', 'pofw_load_textdomain' );
 
function pofw_load_textdomain() {
    load_plugin_textdomain( 'pre-order-for-wooCommerce', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

function pofw_load_my_own_textdomain( $mofile, $domain ) {
    if ( 'pre-order-for-wooCommerce' === $domain && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) ) {
        $locale = apply_filters( 'plugin_locale', determine_locale(), $domain );
        $mofile = WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) . '/languages/' . $domain . '-' . $locale . '.mo';
    }
    return $mofile;
}
add_filter( 'load_textdomain_mofile', 'pofw_load_my_own_textdomain', 10, 2 );
?>