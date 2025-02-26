<?php
/*
 * Plugin Name:   AlsoViewed - Display customers who viewed this also viewed
 * Version: 1.1
 * Plugin URI: http://codecanyon.net/user/abada/portfolio
 * Description: Take an action today and increase conversion. AlsoViewed is a light-weight plugin that displays the most viewed products in your store.
 * Author: Abdel-latif Ahmed Henno
 * Author URI: http://www.codecanyon.net/user/abada
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: wc-also-viewed
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Abdel-latif Ahmed Henno
 * @since 1.0.0
 */

defined('ABSPATH') or die('Plugin file cannot be accessed directly.');



define('WPCAV_PATH', dirname(__FILE__));
define('WPCAV_ROOT', plugins_url('', __FILE__));
define('WPCAV_IMAGES', WPCAV_ROOT . '/images/');
define('WPCAV_STYLES', WPCAV_ROOT . '/css/');
define('WPCAV_SCRIPTS', WPCAV_ROOT . '/js/');




 
//Check if WooCommerce is active
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
	
 
	
	/**
	 * Localisation
	 **/
	load_plugin_textdomain('wc-also-viewed', false, WPCAV_ROOT . '/languages/');
	
	require_once (WPCAV_PATH . '/modules/settings.php');
	require_once (WPCAV_PATH . '/modules/product.php');
	
	
if (!class_exists('wcalsoviewed')) {

	class Wcalsoviewed {
		 
		/**
		 * Text Domain.
		 * @var string
		 */
		protected $textdomain = 'wc-also-viewed';

		/**
		 * Current version of the plugin.
		 * @var string
		 */
		protected $version = '0.1';

		 
		/**
		 * Initiate the plugin by setting the default values and assigning any
		 * required actions and filters.
		 *
		 * @access public
		 */
		public function __construct() {
			
		 
			$WPCAV_Settings = new WPCAV_Settings($this -> textdomain, $this -> version);
			$WPCAV_Product = new  WPCAV_Product($this -> textdomain, $this -> version);
 
			  

		}

	 

	}

}
new Wcalsoviewed;

}
?>