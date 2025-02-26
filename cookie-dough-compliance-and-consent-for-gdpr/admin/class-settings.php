<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/admin
 */
class Cookie_Dough_Consent_Settings {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Enqueue styles and scripts
	 */
	public function enqueue_scripts_styles() {

		wp_enqueue_style( COOKIE_DOUGH_CONSENT_TEXT_DOMAIN . '-admin-global', COOKIE_DOUGH_CONSENT_PLUGIN_URL . 'admin/css/global.css', array(), COOKIE_DOUGH_CONSENT_VERSION, 'all' );
	}
		
	/**
	 * Add settings menus
	 *
	 * @return void
	 */
	public function add_settings_menu() {

		$page_title = __( 'Cookie Dough', COOKIE_DOUGH_CONSENT_TEXT_DOMAIN );
		$page_icon	= COOKIE_DOUGH_CONSENT_PLUGIN_URL . 'admin/images/logo.webp';

		add_menu_page( $page_title, $page_title, 'manage_options', 'cookie-dough-consent-settings', array( $this, 'render_custom_settings_page' ), $page_icon );
	}

	/**
	 * Render the custom settings page
	 * 
	 * @return void
	 */
	public function render_custom_settings_page() {

		$cookies_json				= json_encode( cdc_cookie_cookiess_array() );
		$link_repeater_line 		= file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . "/admin/templates/options/components/link-repeater-line.php" );
		$cookie_settings_line		= file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/cookie-settings-line.php' );
		$cookie_item_mandatory_line	= file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'public/templates/components/cookie-step-mandatory-line.php' );
		$cookie_item_optional_line	= file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'public/templates/components/cookie-step-optional-line.php' );
		$minus_svg					= file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/minus.svg' );
		$edit_svg					= file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/edit.svg' );
		$check_svg          		= file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/toggle-check.svg' );
		$times_svg          		= file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/times.svg' );

		wp_enqueue_media();
		wp_enqueue_style( COOKIE_DOUGH_CONSENT_TEXT_DOMAIN . '-settings-style', COOKIE_DOUGH_CONSENT_PLUGIN_URL . 'public/css/admin-page-settings.min.css', array('wp-color-picker'), COOKIE_DOUGH_CONSENT_VERSION, 'all' );
		wp_enqueue_script( COOKIE_DOUGH_CONSENT_TEXT_DOMAIN . '-settings-script', COOKIE_DOUGH_CONSENT_PLUGIN_URL . 'public/js/admin-page-settings.min.js', array( 'jquery', 'wp-color-picker'), COOKIE_DOUGH_CONSENT_VERSION, true );

		wp_localize_script( COOKIE_DOUGH_CONSENT_TEXT_DOMAIN . '-settings-script', 'CDC_ADMIN_PHP_DATA', array(
			'cookies-json'					=> $cookies_json,
			'link-repeater-line'			=> $link_repeater_line,
			'cookie-settings-line'			=> $cookie_settings_line,
			'cookie-mandatory-item-line'	=> $cookie_item_mandatory_line,
			'cookie-optional-item-line'		=> $cookie_item_optional_line,
			'minus_svg'         			=> $minus_svg,
			'edit_svg'						=> $edit_svg,
			'check_svg'						=> $check_svg,
			'times_svg'						=> $times_svg
		));

		$settings_array = get_option( 'cookie-dough-consent-settings', array() );

		require_once COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/custom-settings-page.php';
	}

	/**
	 * Save the custom settings page
	 * 
	 * @return void
	 */
	public function save_custom_settigs_page() {

		if ( isset( $_POST['_cdc_admin_nonce'] ) && wp_verify_nonce( $_POST['_cdc_admin_nonce'], 'cdc_admin_custom_settings_page_action' ) ) {

			$data_to_save 			= array();

			// Sanitize & validate data
			isset( $_POST['main-befor-title'] ) 							? $data_to_save['main-befor-title'] 							= stripslashes( sanitize_text_field( $_POST['main-befor-title'] ) )								: false;
			isset( $_POST['main-title'] ) 									? $data_to_save['main-title'] 									= stripslashes( sanitize_text_field( $_POST['main-title'] ) ) 									: false;
			isset( $_POST['main-description'] )								? $data_to_save['main-description']								= stripslashes( sanitize_textarea_field( $_POST['main-description'] ) )							: false;
			isset( $_POST['main-summary'] ) 								? $data_to_save['main-summary'] 								= 'yes' 																						: $data_to_save['main-summary'] = 'no';
			isset( $_POST['main-summary-text'] )							? $data_to_save['main-summary-text']							= stripslashes( sanitize_text_field( $_POST['main-summary-text'] ) ) 							: false;
			isset( $_POST['main-important-links'] ) 						? $data_to_save['main-important-links'] 						= $this->sanitise_main_important_links( $_POST['main-important-links'] )						: $data_to_save['main-important-links'] = array( 'text'=>array(), 'link'=>array() );
			isset( $_POST['main-reject-text'] ) 							? $data_to_save['main-reject-text'] 							= stripslashes( sanitize_text_field( $_POST['main-reject-text'] ) ) 							: false;
			isset( $_POST['main-acceptall-text'] ) 							? $data_to_save['main-acceptall-text'] 							= stripslashes( sanitize_text_field( $_POST['main-acceptall-text'] ) )							: false;
			isset( $_POST['main-refuseall-text'] ) 							? $data_to_save['main-refuseall-text'] 							= stripslashes( sanitize_text_field( $_POST['main-refuseall-text'] ) )							: false;
			isset( $_POST['main-choose-text'] ) 							? $data_to_save['main-choose-text'] 							= stripslashes( sanitize_text_field( $_POST['main-choose-text'] ) )								: false;

			isset( $_POST['mandatory-show-step'] ) 							? $data_to_save['mandatory-show-step'] 							= 'yes' 																						: $data_to_save['mandatory-show-step'] = 'no';
			isset( $_POST['mandatory-step-title'] )							? $data_to_save['mandatory-step-title']							= stripslashes( sanitize_text_field( $_POST['mandatory-step-title'] ) )							: false;
			isset( $_POST['mandatory-befor-title'] )						? $data_to_save['mandatory-befor-title']						= stripslashes( sanitize_text_field( $_POST['mandatory-befor-title'] ) )						: false;
			isset( $_POST['mandatory-title'] ) 								? $data_to_save['mandatory-title'] 								= stripslashes( sanitize_text_field( $_POST['mandatory-title'] ) ) 								: false;
			isset( $_POST['mandatory-description'] ) 						? $data_to_save['mandatory-description'] 						= stripslashes( sanitize_textarea_field( $_POST['mandatory-description'] ) )					: false;
			isset( $_POST['mandatory-acceptall-text'] ) 					? $data_to_save['mandatory-acceptall-text'] 					= stripslashes( sanitize_text_field( $_POST['mandatory-acceptall-text'] ) )						: false;
			isset( $_POST['mandatory-refuseall-text'] ) 					? $data_to_save['mandatory-refuseall-text'] 					= stripslashes( sanitize_text_field( $_POST['mandatory-refuseall-text'] ) )						: false;
			isset( $_POST['mandatory-nextbtn-text'] ) 						? $data_to_save['mandatory-nextbtn-text'] 						= stripslashes( sanitize_text_field( $_POST['mandatory-nextbtn-text'] ) )						: false;

			isset( $_POST['optional-show-step'] ) 							? $data_to_save['optional-show-step'] 							= 'yes' 																						: $data_to_save['optional-show-step'] = 'no';
			isset( $_POST['optional-step-title'] )							? $data_to_save['optional-step-title']							= stripslashes( sanitize_text_field( $_POST['optional-step-title'] ) ) 							: false;
			isset( $_POST['optional-befor-title'] )							? $data_to_save['optional-befor-title']							= stripslashes( sanitize_text_field( $_POST['optional-befor-title'] ) )							: false;
			isset( $_POST['optional-title'] ) 								? $data_to_save['optional-title'] 								= stripslashes( sanitize_text_field( $_POST['optional-title'] ) )								: false;
			isset( $_POST['optional-description'] ) 						? $data_to_save['optional-description'] 						= stripslashes( sanitize_text_field( $_POST['optional-description'] ) ) 						: false;
			isset( $_POST['optional-acceptall-text'] )						? $data_to_save['optional-acceptall-text']						= stripslashes( sanitize_text_field( $_POST['optional-acceptall-text'] ) ) 						: false;
			isset( $_POST['optional-refuseall-text'] )						? $data_to_save['optional-refuseall-text']						= stripslashes( sanitize_text_field( $_POST['optional-refuseall-text'] ) ) 						: false;
			isset( $_POST['optional-confirmbtn-text'] ) 					? $data_to_save['optional-confirmbtn-text'] 					= stripslashes( sanitize_text_field( $_POST['optional-confirmbtn-text'] ) ) 					: false;

			isset( $_POST['personalization-main-image'] ) 					? $data_to_save['personalization-main-image'] 					= sanitize_url( $_POST['personalization-main-image'] )											: false;
			isset( $_POST['personalization-bg-shape'] )						? $data_to_save['personalization-bg-shape'] 					= (file_exists( $_POST['personalization-bg-shape'] ) ? stripslashes( $_POST['personalization-bg-shape'] ) : '')	: false;
			isset( $_POST['personalization-color-shape'] ) 					? $data_to_save['personalization-color-shape'] 					= sanitize_hex_color( $_POST['personalization-color-shape'] ) 									: false;
			isset( $_POST['personalization-color-action'] ) 				? $data_to_save['personalization-color-action'] 				= sanitize_hex_color( $_POST['personalization-color-action'] )  								: false;
			isset( $_POST['personalization-color-secondary-action'] ) 		? $data_to_save['personalization-color-secondary-action'] 		= sanitize_hex_color( $_POST['personalization-color-secondary-action'] )						: false;
			isset( $_POST['personalization-color-text'] ) 					? $data_to_save['personalization-color-text'] 					= sanitize_hex_color( $_POST['personalization-color-text'] ) 									: false;
			isset( $_POST['personalization-color-border'] ) 				? $data_to_save['personalization-color-border'] 				= sanitize_hex_color( $_POST['personalization-color-border'] ) 									: false;
			isset( $_POST['personalization-color-bg'] ) 					? $data_to_save['personalization-color-bg'] 					= sanitize_hex_color( $_POST['personalization-color-bg'] ) 										: false;
			isset( $_POST['personalization-modal-border-radius'] ) 			? $data_to_save['personalization-modal-border-radius'] 			= stripslashes( sanitize_text_field( $_POST['personalization-modal-border-radius'] ) )			: false;
			isset( $_POST['personalization-alignment-main-btn'] ) 			? $data_to_save['personalization-alignment-main-btn'] 			= stripslashes( sanitize_text_field( $_POST['personalization-alignment-main-btn'] ) )			: false;
			isset( $_POST['personalization-margin-horizontal-main-btn'] )	? $data_to_save['personalization-margin-horizontal-main-btn']	= stripslashes( sanitize_text_field( $_POST['personalization-margin-horizontal-main-btn'] ) )	: false;
			isset( $_POST['personalization-margin-vertical-main-btn'] ) 	? $data_to_save['personalization-margin-vertical-main-btn'] 	= stripslashes( sanitize_text_field( $_POST['personalization-margin-vertical-main-btn'] ) )		: false;
			isset( $_POST['personalization-image-main-btn'] ) 				? $data_to_save['personalization-image-main-btn'] 				= sanitize_url( $_POST['personalization-image-main-btn'] ) 						: false;
			isset( $_POST['personalization-size-main-btn'] ) 				? $data_to_save['personalization-size-main-btn'] 				= stripslashes( sanitize_text_field( $_POST['personalization-size-main-btn'] ) ) 				: false;
			isset( $_POST['personalization-border-radius-main-btn'] ) 		? $data_to_save['personalization-border-radius-main-btn'] 		= stripslashes( sanitize_text_field( $_POST['personalization-border-radius-main-btn'] ) ) 		: false;
			
			isset( $_POST['cookie-settings-main'] )							? $data_to_save['cookie-settings-main']							= $this->sanitise_cookie_settings_main( $_POST['cookie-settings-main'] )						: $data_to_save['cookie-settings-main'] = array();
			
			isset( $_POST['advanced-delay-opening'] ) 						? $data_to_save['advanced-delay-opening'] 						= stripslashes( sanitize_text_field( $_POST['advanced-delay-opening'] ) ) 						: false;
			isset( $_POST['advanced-disappears-accepted'] )					? $data_to_save['advanced-disappears-accepted']					= 'yes' 																						: $data_to_save['advanced-disappears-accepted'] = 'no';
			isset( $_POST['advanced-cookie-duration-acceptall'] )			? $data_to_save['advanced-cookie-duration-acceptall']			= stripslashes( sanitize_text_field( $_POST['advanced-cookie-duration-acceptall'] ) )			: false;
			isset( $_POST['advanced-cookie-duration-notacceptall'] )		? $data_to_save['advanced-cookie-duration-notacceptall']		= stripslashes( sanitize_text_field( $_POST['advanced-cookie-duration-notacceptall'] ) )		: false;
			isset( $_POST['advanced-handle-cache'] )						? $data_to_save['advanced-handle-cache']						= 'yes'																							: $data_to_save['advanced-handle-cache'] = 'no';
			

			// Save data
			update_option( 'cookie-dough-consent-settings', $data_to_save );
		}

	}

	/**
	 * Create new settings structer
	 */
	public function create_new_settings_structer() {

		$new_structer = get_option( 'cookie-dough-consent-settings', false );

		if ( !$new_structer ) {

			$data_to_save = array(
				'main-befor-title'                              => get_option( 'main-befor-title', cdc_cookie_default_values('main-befor-title') ),
				'main-title'                                    => get_option( 'main-title', cdc_cookie_default_values('main-title') ),
				'main-description'                              => get_option( 'main-description', cdc_cookie_default_values('main-description') ),
				'main-summary'                                  => get_option( 'main-summary', cdc_cookie_default_values('main-summary') ),
				'main-summary-text'                             => get_option( 'main-summary-text', cdc_cookie_default_values('main-summary-text') ),
				'main-important-links'                          => get_option( 'main-important-links', cdc_cookie_default_values('main-important-links') ),
				'main-reject-text'                              => get_option( 'main-reject-text', cdc_cookie_default_values('main-reject-text') ),
				'main-choose-text'                              => get_option( 'main-choose-text', cdc_cookie_default_values('main-choose-text') ),
				'main-acceptall-text'                           => get_option( 'main-acceptall-text', cdc_cookie_default_values('main-acceptall-text') ),
				'mandatory-show-step'                           => get_option( 'mandatory-show-step', cdc_cookie_default_values('mandatory-show-step') ),
				'mandatory-step-title'                          => get_option( 'mandatory-step-title', cdc_cookie_default_values('mandatory-step-title') ),
				'mandatory-befor-title'                         => get_option( 'mandatory-befor-title', cdc_cookie_default_values('mandatory-befor-title') ),
				'mandatory-title'                               => get_option( 'mandatory-title', cdc_cookie_default_values('mandatory-title') ),
				'mandatory-description'                         => get_option( 'mandatory-description', cdc_cookie_default_values('mandatory-description') ),
				'mandatory-acceptall-text'                      => get_option( 'mandatory-acceptall-text', cdc_cookie_default_values('mandatory-acceptall-text') ),
				'mandatory-refuseall-text'                      => get_option( 'mandatory-refuseall-text', cdc_cookie_default_values('mandatory-refuseall-text') ),
				'mandatory-nextbtn-text'                        => get_option( 'mandatory-nextbtn-text', cdc_cookie_default_values('mandatory-nextbtn-text') ),
				'optional-show-step'                            => get_option( 'optional-show-step', cdc_cookie_default_values('optional-show-step') ),
				'optional-step-title'                           => get_option( 'optional-step-title', cdc_cookie_default_values('optional-step-title') ),
				'optional-befor-title'                          => get_option( 'optional-befor-title', cdc_cookie_default_values('optional-befor-title') ),
				'optional-title'                                => get_option( 'optional-title', cdc_cookie_default_values('optional-title') ),
				'optional-description'                          => get_option( 'optional-description', cdc_cookie_default_values('optional-description') ),
				'optional-acceptall-text'                       => get_option( 'optional-acceptall-text', cdc_cookie_default_values('optional-acceptall-text') ),
				'optional-refuseall-text'                       => get_option( 'optional-refuseall-text', cdc_cookie_default_values('optional-refuseall-text') ),
				'optional-confirmbtn-text'                      => get_option( 'optional-confirmbtn-text', cdc_cookie_default_values('optional-confirmbtn-text') ),
				'personalization-main-image'                    => get_option( 'personalization-main-image', cdc_cookie_default_values('personalization-main-image') ),
				'personalization-bg-shape'                      => get_option( 'personalization-bg-shape', cdc_cookie_default_values('personalization-bg-shape') ),
				'personalization-color-shape'                   => get_option( 'personalization-color-shape', cdc_cookie_default_values('personalization-color-shape') ),
				'personalization-color-action'                  => get_option( 'personalization-color-action', cdc_cookie_default_values('personalization-color-action') ),
				'personalization-color-secondary-action'        => get_option( 'personalization-color-secondary-action', cdc_cookie_default_values('personalization-color-secondary-action') ),
				'personalization-color-text'                    => get_option( 'personalization-color-text', cdc_cookie_default_values('personalization-color-text') ),
				'personalization-color-border'                  => get_option( 'personalization-color-border', cdc_cookie_default_values('personalization-color-border') ),
				'personalization-color-bg'                      => get_option( 'personalization-color-bg', cdc_cookie_default_values('personalization-color-bg') ),
				'personalization-modal-border-radius'           => get_option( 'personalization-modal-border-radius', cdc_cookie_default_values('personalization-modal-border-radius') ),
				'personalization-alignment-main-btn'            => get_option( 'personalization-alignment-main-btn', cdc_cookie_default_values('personalization-alignment-main-btn') ),
				'personalization-margin-horizontal-main-btn'    => get_option( 'personalization-margin-horizontal-main-btn', cdc_cookie_default_values('personalization-margin-horizontal-main-btn') ),
				'personalization-margin-vertical-main-btn'      => get_option( 'personalization-margin-vertical-main-btn', cdc_cookie_default_values('personalization-margin-vertical-main-btn') ),
				'personalization-image-main-btn'                => get_option( 'personalization-image-main-btn', cdc_cookie_default_values('personalization-image-main-btn') ),
				'personalization-size-main-btn'                 => get_option( 'personalization-size-main-btn', cdc_cookie_default_values('personalization-size-main-btn') ),
				'personalization-border-radius-main-btn'        => get_option( 'personalization-border-radius-main-btn', cdc_cookie_default_values('personalization-border-radius-main-btn') ),
				'cookie-settings-main'                          => get_option( 'cookie-settings-main', cdc_cookie_default_values('cookie-settings-main') ),
				'advanced-delay-opening'                        => get_option( 'advanced-delay-opening', cdc_cookie_default_values('advanced-delay-opening') ),
				'advanced-disappears-accepted'                  => get_option( 'advanced-disappears-accepted', cdc_cookie_default_values('advanced-disappears-accepted') ),
				'advanced-cookie-duration-acceptall'            => get_option( 'advanced-cookie-duration-acceptall', cdc_cookie_default_values('advanced-cookie-duration-acceptall') ),
				'advanced-cookie-duration-notacceptall'         => get_option( 'advanced-cookie-duration-notacceptall', cdc_cookie_default_values('advanced-cookie-duration-notacceptall') ),
				'advanced-handle-cache'                         => get_option( 'advanced-handle-cache', cdc_cookie_default_values('advanced-handle-cache') ),
			);

			// delete all old options
			foreach ( $data_to_save as $key => $value ) {
				delete_option( $key );
			}
			
			update_option( 'cookie-dough-consent-settings', $data_to_save );
		}
	}

	/**
	 * Custom sanitizing for main important links array
	 */
	private function sanitise_main_important_links( $data ) {

		$result = array();

		if ( is_array($data) ) {

			foreach ( $data as $data_key => $data_value ) {
	
				$result[$data_key] = array(
					'text' 	=> stripslashes( sanitize_text_field($data_value['text']) ),
					'link'	=> sanitize_url($data_value['link']),
				);
			}
		}

		return $result;
	}

	/**
	 * Custom sanitizing for cookie settings array
	 */
	private function sanitise_cookie_settings_main( $data ) {

		$result = array();

		if ( is_array($data) ) {

			foreach ( $data as $data_key => $data_value ) {
			
				$result[$data_key] = array(
					'mandatory' 		=> !empty($data_value['mandatory']) ? sanitize_text_field($data_value['mandatory']) : 'no',
					'title'				=> stripslashes( sanitize_text_field( $data_value['title'] ) ),
					'id'				=> stripslashes( sanitize_text_field( $data_value['id'] ) ),
					'name'				=> stripslashes( sanitize_text_field( $data_value['name'] ) ),
					'descShort'			=> stripslashes( sanitize_text_field( $data_value['descShort'] ) ),
					'descLong'			=> stripslashes( sanitize_text_field( $data_value['descLong'] ) ),
					'domain'			=> stripslashes( sanitize_text_field( $data_value['domain'] ) ),
					'category'			=> stripslashes( sanitize_text_field( $data_value['category'] ) ),
					'policyUrl'			=> sanitize_url( $data_value['policyUrl'] ),
					'favicon'			=> sanitize_url( $data_value['favicon'] ),
					'scriptRadio'		=> stripslashes( sanitize_text_field( $data_value['scriptRadio'] ) ),
					'scriptInput'		=> stripslashes( sanitize_text_field( $data_value['scriptInput'] ) ),
					'scriptSelect'		=> stripslashes( sanitize_text_field( $data_value['scriptSelect'] ) ),
					'scriptTextarea'	=> wp_kses( stripslashes( $data_value['scriptTextarea'] ), array('script'=>array()) )
				);
			}
		}

		return $result;
	}

	/**
	 * Get the privacy policy link
	 */
	public function get_privacy_policy_link( $url ) {
		$link = '';

		if( function_exists('get_privacy_policy_url' ) ) {
			$link = get_privacy_policy_url();
		}

		return !empty($link) ? $link : $url;
	}

}