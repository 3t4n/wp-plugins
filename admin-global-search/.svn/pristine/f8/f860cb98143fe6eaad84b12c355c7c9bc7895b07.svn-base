<?php
ob_start();
/**
 * Plugin Name: Admin Global Search
 * Plugin URI: http://webplanetsoft.com/wordpress-plugins/wps-admin-global-search.zip
 * Description: Admin Global Search (Search everything inside the WP admin)

Perfect plugin to search everything inside the WP admin. You can easily search for pages, posts, custom post types, etc by a single search field provided by this plugin. Download this plugin for free and enjoy all these features.
 * Version: 1.0.0
 * Author: Web Planet Soft
 * Author URI:  http://webplanetsoft.com
 */

if ( ! defined( 'ABSPATH' ) ) {
	die("You can't access this file directly"); // disable direct access
}


class WPS_ADMIN_GLOBAL_SEARCH
{
		
	public $aParams;
	public function __construct()
	{
		global $wpdb;
		
		add_action( 'admin_footer', array($this, 'wps_admin_global_search_form'));
		
		add_action( 'wp_ajax_wps_admin_global_search_ajax', array(&$this,'wps_admin_global_search_ajax' ));
		add_action('wp_ajax_nopriv_wps_admin_global_search_ajax', array(&$this,'wps_admin_global_search_ajax'));
		
		add_action( 'admin_enqueue_scripts', array(&$this,'wps_admin_enqueue_scripts'));
		
		register_activation_hook( __FILE__, array($this,'activation_wps_plugin') );
		register_uninstall_hook( __FILE__, array($this,'uninstall_wps_plugin' ));			
	}
	
	public function wps_admin_global_search_ajax($aParams = array())		
	{
		$keyword = sanitize_text_field($_REQUEST['keyword']);
		$aParams['keyword'] = $keyword;
		$this->set_template('search',$aParams);
		exit;
	}
		
	public function set_template($aTemplate,$aOpts)
	{
		ob_start();		
		$aParams['template'] = $aTemplate;
		$aVars = $aOpts ? array_merge($aParams,$aOpts) : $aParams;
		include "template/template.php";		
		return ob_get_contents();		
		ob_get_clean();
	}
	
		
	public function wps_admin_global_search_form($aParams = array())
	{
		$this->set_template('form',$aParams);
	}	
	
	public function wps_admin_enqueue_scripts()
	{
		wp_enqueue_script('wps-admin-global-search-script', plugins_url( 'src/custom.js', __FILE__) );
		wp_enqueue_style('wps-admin-global-search-style', plugins_url( 'src/style.css', __FILE__ ) );
	}
	
	function activation_wps_plugin()
	{
		global $wpdb;		
	}
	
	function uninstall_wps_plugin()
	{
		global $wpdb;		
	}
	
}

$wpsObj = new WPS_ADMIN_GLOBAL_SEARCH;
