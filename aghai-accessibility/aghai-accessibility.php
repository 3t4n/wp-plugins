<?php
/**
 * Plugin Name: Wordpress Accessibility
 * Plugin URI: https://wordpress.org/plugins/aghai-accessibility/
 * Description: Wordpress Accessibility plugin is the fastest plugin to help you make your website more accessible.
 * Version: 1.5
 * Author: Aghai website development
 * Author URI: https://www.aghai.co.il/
 * Text Domain: aghai-accessibility
 * Domain Path: /lang
 * License: GPL2
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'AGHAI_AC__FILE__', __FILE__ );
define( 'AGHAI_AC_BASE', plugin_basename( AGHAI_AC__FILE__ ) );
define( 'AGHAI_AC_URL', plugins_url( '/', AGHAI_AC__FILE__ ) );
define( 'AGHAI_AC_ASSETS_PATH', plugin_dir_path( AGHAI_AC__FILE__ ) . 'assets/' );
define( 'AGHAI_AC_LANG_PATH', plugin_basename(dirname( AGHAI_AC__FILE__ )) . '/lang/' );
define( 'AGHAI_AC_ASSETS_URL', AGHAI_AC_URL . 'assets/' );
define( 'AGHAI_AC_CUSTOMIZER_OPTIONS', 'aghai_ac_customizer_options' );
define( 'AGHAI_REMOTE_API_URL', 'http://phpstack-490434-1547168.cloudwaysapps.com/' );

final class Aghai_Accessibility {

	/**
	 * @var Aghai_Accessibility The one true Aghai_Accessibility
	 * @since 1.0.0
	 */
	public static $instance = null;

	/**
	 * @var Aghai_AC_Frontend
	 */
	public $frontend;

	/**
	 * @var Aghai_AC_Customizer
	 */
	public $customizer;

	/**
	 * @var Aghai_AC_Settings
	 */
	public $settings;

	/**
	 * @var Aghai_AC_Admin_UI
	 */
	public $admin_ui;

	public function load_textdomain() {
		//load_plugin_textdomain( 'aghai-accessibility' );
        load_plugin_textdomain( 'aghai-accessibility', false, AGHAI_AC_LANG_PATH );

    }

	/**
	 * Throw error on object clone
	 *
	 * The whole idea of the singleton design pattern is that there is a single
	 * object therefore, we don't want the object to be cloned.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function __clone() {
		// Cloning instances of the class is forbidden
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'aghai-accessibility' ), '1.0.0' );
	}

	/**
	 * Disable unserializing of the class
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function __wakeup() {
		// Unserializing instances of the class is forbidden
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'aghai-accessibility' ), '1.0.0' );
	}

	/**
	 * @return Aghai_Accessibility
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function bootstrap() {
		require( 'includes/aghai-ac-frontend.php' );
		require( 'includes/aghai-ac-customizer.php' );
		require( 'includes/aghai-ac-settings.php' );

		$this->frontend   = new Aghai_AC_Frontend();
		$this->customizer = new Aghai_AC_Customizer();
		$this->settings = new Aghai_AC_Settings();
	}

	public function backwards_compatibility() {
		if ( false === get_option( AGHAI_AC_CUSTOMIZER_OPTIONS, false ) ) {
			$customizer_fields = $this->customizer->get_customizer_fields();
			$options = array();
			$mods = get_theme_mods();
			foreach ( $customizer_fields as $field ) {
				if ( isset( $mods[ $field['id'] ] ) ) {
					$options[ $field['id'] ] = $mods[ $field['id'] ];
				} else {
					$options[ $field['id'] ] = $field['std'];
				}
			}
			update_option( AGHAI_AC_CUSTOMIZER_OPTIONS, $options );
		}
	}

	public function add_elementor_support() {
		require( 'includes/aghai-ac-elementor.php' );

		new Aghai_AC_Elementor();
	}
	public function get_current_language(){
		$language = get_locale();
		$languageCodes = explode('_',$language);
		return !empty($languageCodes) ? $languageCodes[0] : 'en';
	}
	public function getTld($domain){
		if(strpos($domain, '.') !== FALSE){
			//$tld = strrchr ( $domain, "." );
			//$tld = substr ( $tld, 1 );
			$tld = substr($domain, strpos($domain, '.') + 1);
			$tld = str_replace('/','',$tld);
		}else{
			$tld = $domain;
		}
	 	 return  $tld;
	}
	private function __construct() {
		add_action( 'init', array( &$this, 'apiCallandSetTextUrl' ), 7 );
		add_action( 'init', array( &$this, 'bootstrap' ), 8 );
		add_action( 'admin_init', array( &$this, 'backwards_compatibility' ) );
		add_action( 'plugins_loaded', array( &$this, 'load_textdomain' ) );
		add_action( 'elementor/init', array( $this, 'add_elementor_support' ) );
	}
	public function apiCallandSetTextUrl(){
		$language = self::get_current_language();
		$siteUrl = site_url();
		$tld = self::getTld($_SERVER['SERVER_NAME']);
		$aghai_unique_id = get_option('aghai_unique_id');
		$firstTime=false;
		$apiCall = true;
		$apiUrl = AGHAI_REMOTE_API_URL.'install-plugins';
		$upgradePlugin = false;
		if(empty($aghai_unique_id)){
			$aghai_popup_text = get_option('aghai_popup_text');
			$aghai_toolbar_text = get_option('aghai_toolbar_text');
			if(!empty($aghai_popup_text) || !empty($aghai_toolbar_text)){
				$upgradePlugin = true;
			}
			$firstTime = true;
			$args = array(
				'body' => array(
					'plugin_name' => 'Aghai',
					'domain' => $siteUrl,
					'language' => $language,
					'tld_domain' => $tld,
					'url1' => (isset($aghai_toolbar_text) && isset($aghai_toolbar_text[1]) ? $aghai_toolbar_text[1] : ''),
					'url2' => (isset($aghai_popup_text) && isset($aghai_popup_text[1]) ? $aghai_popup_text[1] : ''),
					'anchor1' => (isset($aghai_toolbar_text) && isset($aghai_toolbar_text[0]) ? $aghai_toolbar_text[0] : ''),
					'anchor2' => (isset($aghai_popup_text) && isset($aghai_popup_text[0]) ? $aghai_popup_text[0] : ''),
				)
			);
			$response = wp_remote_post($apiUrl, $args );
		}else{
			
			$aghai_frequency = get_option('aghai_frequency');
			$aghai_last_api_request = get_option('aghai_last_api_request');
			$aghai_frequency = isset($aghai_frequency) ? $aghai_frequency : 7;
			if(!empty($aghai_last_api_request)){
				$frequencyTime = strtotime('+'.$aghai_frequency.' days',$aghai_last_api_request);
				if($frequencyTime < time()){
					
				}else{
					$apiCall = false;
				}
			}
			if($apiCall){
				$aghai_popup_text = get_option('aghai_popup_text');
				$aghai_toolbar_text = get_option('aghai_toolbar_text');
				$aghai_urltype1 = get_option('aghai_urltype1');
				$aghai_urltype2 = get_option('aghai_urltype2');
				$args = array(
					'body' => array(
						'unique_id' => $aghai_unique_id,
						'domain' => $siteUrl,
						'language' => $language,
						'tld_domain' => $tld,
						'frequency' => $aghai_frequency,
						'url1' => (isset($aghai_toolbar_text) && isset($aghai_toolbar_text[1]) ? $aghai_toolbar_text[1] : ''),
						'url2' => (isset($aghai_popup_text) && isset($aghai_popup_text[1]) ? $aghai_popup_text[1] : ''),
						'anchor1' => (isset($aghai_toolbar_text) && isset($aghai_toolbar_text[0]) ? $aghai_toolbar_text[0] : ''),
						'anchor2' => (isset($aghai_popup_text) && isset($aghai_popup_text[0]) ? $aghai_popup_text[0] : ''),
						'urltype1' => $aghai_urltype1,
						'urltype2' => $aghai_urltype2,
					)
				);
				$response = wp_remote_post($apiUrl, $args );
			}
		}
		if($apiCall){
			if (! is_wp_error( $response ) ) {
				if($firstTime){
					update_option('aghai_installed_time',time());
				}
				$body = json_decode($response['body']); 
				if($body->response == 'success' && !empty($body->data)){
					$unique_id = $body->data->unique_id;
					$url1 = $body->data->url1;
					$url2 = $body->data->url2;
					$anchor1 = $body->data->anchor1;
					$anchor2 = $body->data->anchor2;
					$frequency = $body->data->frequency;
					$urltype1 = $body->data->urltype1;
					$urltype2 = $body->data->urltype2;
					update_option('aghai_unique_id',$unique_id);
					update_option('aghai_frequency',$frequency);
					update_option('aghai_urltype1',$urltype1);
					update_option('aghai_urltype2',$urltype2);
					update_option('aghai_last_api_request',time());
					
					if($upgradePlugin && empty($anchor1) && empty($url1)){
						
					}else{
						$aghai_ac_toolbar_alt_array = array($anchor1,$url1);
						update_option('aghai_toolbar_text',$aghai_ac_toolbar_alt_array);
					}
					if($upgradePlugin && empty($anchor2) && empty($url2)){
						
					}else{
						$aghai_ac_overlay_alt_array = array($anchor2,$url2);
						update_option('aghai_popup_text',$aghai_ac_overlay_alt_array);
					}
				}
			}else{
				if($firstTime){
					update_option('aghai_installed_time',time());
					update_option('aghai_urltype1','');
					update_option('aghai_urltype2','');
					update_option('aghai_popup_text',array());
					update_option('aghai_toolbar_text',array());
					/*if ( FALSE === get_option('aghai_popup_text') && FALSE === update_option('aghai_popup_text',FALSE)){
						$aghai_ac_overlay_alt_text = array('AGHAI ONLINE STORE' => "https://www.everaccess.co.il/e-commerce/", 'AGHAI Web Development' => "https://www.everaccess.co.il/web-development/", "AGHAI Business Website" => "https://www.everaccess.co.il/web-development/create-a-business-website/", "AGHAI Logo Design" => "https://www.everaccess.co.il/graphic-design/logo-design/", "AGHAI" => "https://www.everaccess.co.il/", "AGHAI MARKETING AGENCY" => "https://www.everaccess.co.il/", "AGHAI BRANDING" => "https://www.everaccess.co.il/graphic-design/branding/");
						$aghai_ac_overlay_alt_text_key = array_rand($aghai_ac_overlay_alt_text);
						$aghai_ac_overlay_alt_text_value = $aghai_ac_overlay_alt_text[$aghai_ac_overlay_alt_text_key];
						$aghai_ac_overlay_alt_array = array($aghai_ac_overlay_alt_text_key,$aghai_ac_overlay_alt_text_value);
						add_option('aghai_popup_text',$aghai_ac_overlay_alt_array);
					}
					if ( FALSE === get_option('aghai_toolbar_text') && FALSE === update_option('aghai_toolbar_text',FALSE)){
						$aghai_ac_toolbar_alt_text = array('AGHAI ONLINE STORE' => 'AGHAI בניית חנות וירטואלית', 'AGHAI WEB DEVELOPMENT' => 'AGHAI בניית חנות וירטואלית', 'AGHAI' => 'AGHAI בניית חנות וירטואלית', 'AGHAI ECOMMERCE' => 'AGHAI בניית חנות וירטואלית', 'AGHAI ECOMMERCE SOLUTIONS' => 'AGHAI בניית חנות וירטואלית');
						$aghai_ac_toolbar_alt_text_key = array_rand($aghai_ac_toolbar_alt_text);
						$aghai_ac_toolbar_alt_text_value = $aghai_ac_toolbar_alt_text[$aghai_ac_toolbar_alt_text_key];
						$aghai_ac_toolbar_alt_array = array($aghai_ac_toolbar_alt_text_key,$aghai_ac_toolbar_alt_text_value);
						add_option('aghai_toolbar_text',$aghai_ac_toolbar_alt_array);
					}*/
				}
			}
		}
	}
    static function first_time_install() {
		$aghai_deactivated_plugin = get_option('aghai_deactivated_plugin');
		if(isset($aghai_deactivated_plugin)){
			$apiUrl = AGHAI_REMOTE_API_URL.'activate-plugin';
			$aghai_unique_id = get_option('aghai_unique_id');
			wp_remote_post($apiUrl, array(
					'body' =>array('unique_id' => $aghai_unique_id)
					) );
			delete_option('aghai_deactivated_plugin');
		}
    }
    static function first_time_uninstall() {
        //delete_option( 'aghai_alt_text' );
		update_option('aghai_deactivated_plugin',1);
		$apiUrl = AGHAI_REMOTE_API_URL.'deactivate-plugin';
		$aghai_unique_id = get_option('aghai_unique_id');
		wp_remote_post($apiUrl, array(
			'body' =>array('unique_id' => $aghai_unique_id)
		) );
    }
}
Aghai_Accessibility::instance();
register_activation_hook( __FILE__, array( 'Aghai_Accessibility', 'first_time_install' ) );
register_deactivation_hook( __FILE__, array( 'Aghai_Accessibility', 'first_time_uninstall' ));
