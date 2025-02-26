<?php
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Appconsent_Cmp_Sfbx
 * @subpackage Appconsent_Cmp_Sfbx/public
 * @author     Sfbx Team <dev-wp@sfbx.io>
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}
if (! class_exists('Appconsent_Cmp_Sfbx_Public')) {
	class Appconsent_Cmp_Sfbx_Public {

		/**
		 * The ID of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string    $plugin_name    The ID of this plugin.
		 */
		private $plugin_name;

		/**
		 * The version of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string    $version    The current version of this plugin.
		 */
		private $version;

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 * @param      string    $plugin_name       The name of the plugin.
		 * @param      string    $version    The version of this plugin.
		 */
		public function __construct( $plugin_name, $version ) {

			$this->plugin_name = $plugin_name;
			$this->version = $version;

		}


		/**
		 * Register the JavaScript for the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_scripts() {

			$sfbx_settings = $this->get_settings();

			if($sfbx_settings){

				wp_enqueue_script( $this->plugin_name.'tcf', plugin_dir_url( __FILE__ ) . 'js/appconsent-cmp-sfbx-tcf.js', array(), $this->version, false );
				wp_enqueue_script( $this->plugin_name.'googleads', plugin_dir_url( __FILE__ ) . 'js/appconsent-cmp-sfbx-googleads.js', array(), $this->version, false );

				
				if( $sfbx_settings['sfbx_ux'] == 'classic'){
					wp_enqueue_script( $this->plugin_name.'loader','https://cdn.appconsent.io/loader.js', array(), $this->version, true );
				}else{
					wp_enqueue_script( $this->plugin_name.'loader','https://cdn.appconsent.io/loader-clear.js', array(), $this->version, true );
				}
				wp_localize_script( $this->plugin_name.'loader', 'sfbx_config_parameters', array( 
				            'settings' => json_encode($sfbx_settings['settings']),
				        )
				    );
				wp_enqueue_script( $this->plugin_name.'init', plugin_dir_url( __FILE__ ) . 'js/appconsent-cmp-sfbx-init.js', array(), $this->version, true );

			}

		}

		/**
		* Function for get SFBX plugin settings
		*
		* @since    1.0.0
		*/
		public function get_settings(){

			$appKeyStatus 		= get_option('sfbx_appkey_valid');
			$sfbxSettings		= get_option('sfbx_settings');
			$settingsArray = array();
			if( $appKeyStatus == '1' && isset($sfbxSettings['sfbx_appkey']) && !empty($sfbxSettings['sfbx_appkey'])){
				
				$settingsArray['appKey'] = $sfbxSettings['sfbx_appkey'];

				if( isset($sfbxSettings['sfbx_targetcountries']) && !empty($sfbxSettings['sfbx_targetcountries']) && is_array( $sfbxSettings['sfbx_targetcountries'] ) ){
					$settingsArray['targetCountries'] = $sfbxSettings['sfbx_targetcountries'];
				}
				if(isset($sfbxSettings['sfbx_forcegdpr']) && $sfbxSettings['sfbx_forcegdpr'] == 'true'){
					$settingsArray['forceGDPRApplies'] = 'true';
				}
				if(isset($sfbxSettings['sfbx_debug_mode']) && $sfbxSettings['sfbx_debug_mode'] == 'true'){
					$settingsArray['debug'] = 'true';
				}

				if(isset($sfbxSettings['sfbx_pw_status']) && $sfbxSettings['sfbx_pw_status'] == 'true'){
					$settingsArray['privacyWidget'] = (object) array();

					if(isset($sfbxSettings['sfwx_pwcolor']) && !empty($sfbxSettings['sfwx_pwcolor'])){
						$settingsArray['privacyWidget']->color = $sfbxSettings['sfwx_pwcolor'];
					}else{
						$settingsArray['privacyWidget']->color = "clear";
					}

					if(isset($sfbxSettings['sfwx_pw_position']) && !empty($sfbxSettings['sfwx_pw_position'])){
						$settingsArray['privacyWidget']->position = $sfbxSettings['sfwx_pw_position'];
					}else{
						$settingsArray['privacyWidget']->position = "bottomLeft";
					}

					if(isset($sfbxSettings['sfbx_pw_label']) && !empty($sfbxSettings['sfbx_pw_label'])){
						$settingsArray['privacyWidget']->text = $sfbxSettings['sfbx_pw_label'];
					}else{
						$settingsArray['privacyWidget']->text = esc_html__("Privacy Center", "appconsent-cmp-sfbx");
					}
				}
				if( isset($sfbxSettings['sfwx_ux_temp']) && !empty($sfbxSettings['sfwx_ux_temp']) ){
					$sfwx_ux_temp = $sfbxSettings['sfwx_ux_temp'];
				}else{
					$sfwx_ux_temp = "clear";
				}
				$sfbxAllSettings = array('settings'=>$settingsArray, 'sfbx_ux'=>$sfwx_ux_temp);
				return $sfbxAllSettings;
			}else{
				return false;
			}
		}

	}
}