<?php
/**
* Plugin Name: Add Gift Wrapper For Woocommerce
* Description: This plugin allows create Add Gift Wrapper plugin.
* Version: 1.0
* Copyright: 2020
* Text Domain: add-gift-wrapper-for-woocommerce
* Domain Path: /languages 
*/


if (!defined('ABSPATH')) {
  die('-1');
}
if (!defined('OCGW_PLUGIN_NAME')) {
  define('OCGW_PLUGIN_NAME', 'Add Gift Wrapper For Woocommerce');
}
if (!defined('OCGW_PLUGIN_VERSION')) {
  define('OCGW_PLUGIN_VERSION', '1.0.0');
}
if (!defined('OCGW_PLUGIN_FILE')) {
  define('OCGW_PLUGIN_FILE', __FILE__);
}
if (!defined('OCGW_PLUGIN_DIR')) {
  define('OCGW_PLUGIN_DIR',plugins_url('', __FILE__));
}
if (!defined('OCGW_DOMAIN')) {
  define('OCGW_DOMAIN', 'add-gift-wrapper-for-woocommerce');
}
if (!defined('OCGW_BASE_NAME')) {
  define('OCGW_BASE_NAME', plugin_basename(OCGW_PLUGIN_FILE));
}

if (!class_exists('OCGW')) {

	class OCGW {

    protected static $OCGW_instance;
    /**
   	* Constructor.
   	*
   	* @version 3.2.3
   	*/
    
    function __construct() {
      include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
      //check plugin activted or not
      add_action('admin_init', array($this, 'OCGW_check_plugin_state'));
    }
    

    function OCGW_check_plugin_state() {
    	if ( ! ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) ) {
      	set_transient( get_current_user_id() . 'ocgwerror', 'message' );
    	}
    }


    function init() {
    	add_action( 'admin_notices', array($this, 'OCGW_show_notice'));
    	add_action( 'admin_enqueue_scripts', array($this, 'OCGW_load_admin'));
    	add_action( 'wp_enqueue_scripts',  array($this, 'OCGW_load_front'));
    	add_filter( 'plugin_row_meta', array( $this, 'OCGW_plugin_row_meta' ), 10, 2 );
    }


    function OCGW_plugin_row_meta( $links, $file ) {
        if ( OCGW_BASE_NAME === $file ) {
          $row_meta = array(
            'rating'    =>  '<a href="https://xthemeshop.com/add-gift-wrapper-for-woocommerce/" target="_blank">Documentation</a> | <a href="https://xthemeshop.com/contact/" target="_blank">Support</a> | <a href="https://wordpress.org/support/plugin/add-gift-wrapper-for-woocommerce/reviews/?filter=5" target="_blank"><img src="'.OCGW_PLUGIN_DIR.'/includes/images/star.png" class="ocgw_rating_div"></a>',
        );

        return array_merge( $links, $row_meta );
      }
      return (array) $links;
  	}


    function OCGW_show_notice() {

      if ( get_transient( get_current_user_id() . 'ocgwerror' ) ) {

      	deactivate_plugins( plugin_basename( __FILE__ ) );

      	delete_transient( get_current_user_id() . 'ocgwerror' );

      	echo '<div class="error"><p> This plugin is deactivated because it require <a href="plugin-install.php?tab=search&s=woocommerce">WooCommerce</a> plugin installed and activated.</p></div>';
      }

    }
    //Add JS and CSS on Backend
    function OCGW_load_admin() {

    	wp_enqueue_style( 'OCGW_admin_style', OCGW_PLUGIN_DIR . '/includes/css/gw_admin_style.css', false, '1.0.0' );
    	wp_enqueue_script( 'OCGW_admin_script', OCGW_PLUGIN_DIR . '/includes/js/gw_admin_script.js', array( 'jquery', 'select2') );
    	wp_localize_script( 'ajaxloadpost', 'ajax_postajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    	wp_enqueue_style( 'woocommerce_admin_styles-css', WP_PLUGIN_URL. '/woocommerce/assets/css/admin.css',false,'1.0',"all");
    	wp_enqueue_style( 'wp-color-picker' );
    	wp_enqueue_script( 'wp-color-picker-alpha', OCGW_PLUGIN_DIR . '/includes/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '1.0.0', true );

    }

    function OCGW_load_front() {

      	global $ocgw_comman;
      	
  	    wp_enqueue_style('OCGW_front_style', OCGW_PLUGIN_DIR . '/includes/css/gw_front_style.css', false, '1.0.0');
  	    wp_enqueue_style('OCGW_owl-min', OCGW_PLUGIN_DIR . '/includes/js/owlcarousel/assets/owl.carousel.min.css');
        wp_enqueue_style('OCGW_owl-theme', OCGW_PLUGIN_DIR . '/includes/js/owlcarousel/assets/owl.theme.default.min.css');
        wp_enqueue_script('OCGW_owl', OCGW_PLUGIN_DIR . '/includes/js/owlcarousel/owl.carousel.js' );
        wp_enqueue_script('OCGW_front_script', OCGW_PLUGIN_DIR . '/includes/js/gw_front_script.js',array( 'jquery'));
       	wp_localize_script('OCGW_front_script', 'OCGWWdata',
            array(
              'ocgw_ajax_url' => admin_url('admin-ajax.php'),
             
            )
        );

    }
    //Load all includes files

    function includes() {
      
    	include_once('admin/gift-wrapper-comman.php');
	    include_once('admin/gift-wrapper-backend.php');
	    include_once('front/gift-wrapper-frontend.php');

    }

    //Plugin Rating
    public static function OCGW_do_activation() {
    	set_transient('gift-wrapper-first-rating', true, MONTH_IN_SECONDS);
    }

    public static function OCGW_instance() {
    	if (!isset(self::$OCGW_instance)) {
      	self::$OCGW_instance = new self();
      	self::$OCGW_instance->init();
      	self::$OCGW_instance->includes();
    	}
    	return self::$OCGW_instance;
    }
	}
	add_action('plugins_loaded', array('OCGW', 'OCGW_instance'));
	register_activation_hook(OCGW_PLUGIN_FILE, array('OCGW', 'OCGW_do_activation'));
}

add_action( 'plugins_loaded', 'OCGW_load_textdomain' );
function OCGW_load_textdomain() {
    load_plugin_textdomain( 'add-gift-wrapper-for-woocommerce', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}
function OCGW_load_my_own_textdomain( $mofile, $domain ) {
    if ( 'add-gift-wrapper-for-woocommerce' === $domain && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) ) {
        $locale = apply_filters( 'plugin_locale', determine_locale(), $domain );
        $mofile = WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) . '/languages/' . $domain . '-' . $locale . '.mo';
    }
    return $mofile;
}
add_filter( 'load_textdomain_mofile', 'OCGW_load_my_own_textdomain', 10, 2 );