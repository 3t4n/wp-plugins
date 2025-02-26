<?php
/*
Plugin Name: Amazing service box Visual Composer Addons
Plugin URI: https://otknews.com/amazing-service-box-visual-composer-add-ons/
Description: Service box and modern Visual composer addons made by Ziauddin. You can create Amazing subscription boxes. This is by far one of the best beauty box services Visual Composer Addons.
Version: 2.0.0
Author: Ziauddin 
Author URI: https://otknews.com
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define('ASB_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define('ASB_PLUGIN_PATH',plugin_dir_path(__FILE__));
 defined( 'VERSION_ASB' ) or define( 'VERSION_ASB', '2.0.0' );
 

class Asb_addon {
	/**
	 * Core singleton class
	 * @var self - pattern realization
	 */
	private static $_instance;
	
	/**
	 * Get the instane of Amazing service box_addon
	 *
	 * @return self
	 */
	public static function getInstance() {
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}
	public function __construct() {
		
		//if ( class_exists( 'Vc_Manager') ) {
			add_action('plugins_loaded', array($this, 'pluginsLoaded'), 10);
			add_action( 'admin_enqueue_scripts', array( $this,'pt_asb_admin_css') );
			add_action( 'wp_enqueue_scripts', array( $this,'pt_asb_js_css') );
			add_filter('upload_mimes', array( $this,'pt_asb_mime_types'));
			add_action('after_setup_theme', array($this, 'addVcElementsAddon'));
			
		  /*} else {
			  
			add_action('admin_notices', array($this, '_admin_notice__error'));
			
		  }*/
		}
	
	/**
	 * Cloning disabled
	 */
	public function __clone() {
	}

	/**
		* Serialization disabled
	 */
	public function __sleep() {
	}

	/**
	 * De-serialization disabled
	 */
	public function __wakeup() {
	}
	
	function pluginsLoaded() {
		load_plugin_textdomain( 'pt_asb', false, basename( dirname( __FILE__ ) ) . '/lang' ); 
	}
	
	public function addVcElementsAddon() {
		if ( class_exists( 'Vc_Manager', false ) ) {
			require_once(ASB_PLUGIN_PATH.'vc_elements/vc_addon.php');			
		}
		 
	}
	
	/**
	 * Add Settings link in plugin's page
	 * @since 2.0.0
	 *
	 * @param $links
	 * @param $file
	 *
	 * @return array
	 */
	 public function pluginActionLinks( $links, $file ) {
	if ( plugin_basename( ASB_PLUGIN_PATH.'asb_addon.php' )== $file ) {
		$html = esc_html__( 'Settings', 'pt_asb' );
			$title = __( 'Settings asb Options', 'pt_asb' );
			$link = '<a href="admin.php?page=asb_options" title="' . esc_attr( $title ) . '">'.esc_html('Settings','pt_asb').'</a>';
       
			array_unshift( $links, $link ); 
	}
		return $links;
	}
	
	public function pt_asb_js_css() {
	
		wp_enqueue_style( 'pt_asb-style',ASB_PLUGIN_URL .'/vc_elements/css/main/asb-service-box-style.css');
		wp_enqueue_style( 'fontawasome-fonts',ASB_PLUGIN_URL .'/vc_elements/css/extra/font-awesome.min.css');
	}

	function pt_asb_admin_css() {   
		wp_enqueue_style( 'pt-asb-admin', ASB_PLUGIN_URL .'/vc_elements/css/admin/pt-asb-admin.css', array() );
		wp_enqueue_script( 'pt_plus-admin-js', ASB_PLUGIN_URL .'/vc_elements/js/admin/pt-asb-vc.js',array(),'', false );
	}
	function pt_asb_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		$mimes['svgz'] = 'image/svg+xml';
	  return $mimes;
	}
	
	/*
	 * Admin notice text
	 */
	public function _admin_notice__error() {
		echo '<div class="notice notice-error is-dismissible">';
			echo '<p>'. esc_html__( ' The OTK service box is addon for Amazing service box. It requires Visual Composer Plugins.', 'pt_asb' ) .'</p>';
		echo '</div>';
	}
}
$ThePlus_addon = new Asb_addon();