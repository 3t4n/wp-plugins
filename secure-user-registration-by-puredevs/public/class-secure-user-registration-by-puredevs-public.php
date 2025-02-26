<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://puredevs.com
 * @since      1.0.0
 *
 * @package    Secure_User_Registration_by_PureDevs
 * @subpackage Secure_User_Registration_by_PureDevs/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Secure_User_Registration_by_PureDevs
 * @subpackage Secure_User_Registration_by_PureDevs/public
 * @author     puredevs <admin@puredevs.com>
 */

class Pdsrw_Secure_User_Registration_by_PureDevs_Public {

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
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function pdsrw_enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Secure_User_Registration_by_PureDevs_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Secure_User_Registration_by_PureDevs_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/secure-user-registration-by-puredevs-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function pdsrw_enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Secure_User_Registration_by_PureDevs_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Secure_User_Registration_by_PureDevs_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/secure-user-registration-by-puredevs-public.js', array( 'jquery' ), $this->version, false );
		
	}
	
	/**
	 * Get User IP Address.
	 *
	 * @since    1.0.0
	 */
	public function getip(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = sanitize_text_field( wp_unslash( $_SERVER['HTTP_CLIENT_IP'] ) );
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = sanitize_text_field( wp_unslash( $_SERVER['HTTP_X_FORWARDED_FOR'] ) );
		} elseif( !empty($_SERVER['REMOTE_ADDR']) ){
			$ip = sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) );
		}
		return $ip;
	}
	
	/**
	 * Register the ecaptcha api for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function pdsrw_enqueue_recaptcha_api(){
		wp_enqueue_script( 'pdsrw-recaptcha-api', 'https://www.google.com/recaptcha/api.js', array('jquery'), $this->version, array(
			'strategy'  => 'defer',
		) );
	}
	
	/**
	 * add recaptcha script.
	 *
	 * @since    1.0.0
	 */
	public function pdsrw_add_recaptcha_scripts() {
		$_enable_captcha = get_option('pdsrw_enable_captcha');
		if( isset($_enable_captcha) && $_enable_captcha == 'yes' ){
			$this->pdsrw_enqueue_recaptcha_api();
		}
		$_enable_nonce = get_option('pdsrw_enable_nonce');
		if(isset($_enable_nonce) && $_enable_nonce == 'yes'){
			if ( ( isset($GLOBALS['pagenow']) && $GLOBALS['pagenow'] === 'wp-login.php' && ! empty( $_REQUEST['action'] ) && $_REQUEST['action'] === 'register' ) || ( ! is_user_logged_in() && in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && $GLOBALS['pagenow'] !== 'wp-login.php' && is_account_page() ) ) {
				wp_enqueue_script( 'pdsrw-reg-scripts', plugin_dir_url( __FILE__ ) . 'js/secure-user-registration-by-puredevs-reg-scripts.js', array( 'jquery' ), $this->version, true );
			}
			$ip = $this->getip();
			$nonce = wp_create_nonce( 'reg-'.$ip );
			$_reg_vars = array(
				'reg_nonce' => $nonce,
			);
			wp_localize_script( 'pdsrw-reg-scripts', 'reg_vars', $_reg_vars );
		}
	}
	
	/**
	 * add recaptcha field.
	 *
	 * @since    1.0.0
	 */
	public function pdsrw_add_register_form_recaptcha_field() {
		$_enable_captcha = get_option('pdsrw_enable_captcha');
		$_site_key = get_option('pdsrw_site_key');
		if( isset($_enable_captcha) && $_enable_captcha == 'yes' && !empty( $_site_key ) ){
			?>
			<p id="recaptcha" class="g-recaptcha" data-sitekey="<?php echo esc_attr($_site_key);?>"></p>
			<?php 
		}
		$_enable_nonce = get_option('pdsrw_enable_nonce');
		if(isset($_enable_nonce) && $_enable_nonce == 'yes'){
			?>
			<input type="hidden" id="pdsrw_validate_email_nonce" name="pdsrw_validate_email_nonce" value="" />
			<?php
		}
	}
	
	/**
	 * validate nonce field.
	 *
	 * @since    1.0.0
	 */
	public function pdsrw_register_form_validate_fields( $_user_login, $user_email, $errors ) {
		/*nonce field validation*/
		$_enable_nonce = get_option('pdsrw_enable_nonce');
		$_invalid_nonce = get_option('pdsrw_invalid_nonce');
		$_invalid_nonce = ( $_invalid_nonce ) ? $_invalid_nonce : 'Form validation error.';
		if(isset($_enable_nonce) && $_enable_nonce == 'yes'){
			if(isset($_POST['pdsrw_validate_email_nonce']) && !empty($_POST['pdsrw_validate_email_nonce'])){
				$nonce = sanitize_text_field( wp_unslash( $_POST['pdsrw_validate_email_nonce'] ) );
			}else{
				$nonce = '';
			}
			if(!empty($nonce)){
				$ip = $this->getip();
				if ( ! wp_verify_nonce( $nonce, 'reg-'.$ip ) ) {
					$errors->add( 'nonce_error', esc_html__( 'Error: ', 'secure-user-registration-by-puredevs' ) . wp_kses_post( $_invalid_nonce ) );
				}				
			}
		}
		
		/*google captcha validation*/
		$_enable_captcha = get_option('pdsrw_enable_captcha');
		$_secret_key = get_option('pdsrw_secret_key');
		if( isset($_enable_captcha) && $_enable_captcha == 'yes' && !empty( $_secret_key ) ){
			if(isset($_SERVER['REMOTE_ADDR'])){
				$remoteIP = sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) );
			}
			if(isset($_POST['g-recaptcha-response'])){
				$recaptchaResponse = sanitize_text_field( wp_unslash( $_POST['g-recaptcha-response'] ) );
			}
			$response = wp_remote_post( 'https://www.google.com/recaptcha/api/siteverify', [
				'body' => [
					'secret'   => $_secret_key,
					'response' => $recaptchaResponse,
					'remoteip' => $remoteIP
				]
			] );

			$response_code = wp_remote_retrieve_response_code( $response );
			$response_body = wp_remote_retrieve_body( $response );
			if ( $response_code == 200 ) {
				$result = json_decode( $response_body, true );
				if ( ! $result['success'] ) {
					$_captcha_error_message = get_option('pdsrw_captcha_error_message');
					$_captcha_error_message = ( $_captcha_error_message ) ? sanitize_text_field( wp_unslash( $_captcha_error_message ) ) : esc_html('Something went wrong validating the reCAPTCHA.');
					switch ( $result['error-codes'] ) {
						case 'missing-input-secret':
						case 'invalid-input-secret':
							$errors->add( 'recaptcha', esc_html__( 'Error: Invalid reCAPTCHA secret key.', 'secure-user-registration-by-puredevs' ) );
							break;

						case 'missing-input-response' :
						case 'invalid-input-response' :
							$errors->add( 'recaptcha', esc_html__( 'Error: Please check the box to prove that you are not a robot.', 'secure-user-registration-by-puredevs' ) );
							break; 
						default:
							$errors->add( 'recaptcha', esc_html__( 'Error: ', 'secure-user-registration-by-puredevs' ) . wp_kses_post($_captcha_error_message) );
							break;
					}
				}
			} else {
				$errors->add( 'recaptcha_error', esc_html__( 'Error: Unable to reach the reCAPTCHA server.', 'secure-user-registration-by-puredevs' ) );
			}
		}
		
		/*blocklist email/domain validation*/
		$_domain_block_list = get_option('pdsrw_domain_block_list');
		$_blocklist_error_message = get_option('pdsrw_blocklist_error_message');
		$_blocklist_error_message = ( $_blocklist_error_message ) ? sanitize_text_field( wp_unslash( $_blocklist_error_message ) ) : esc_html('Your email not allowed from registration! Try using another email address.');
		if(isset($_domain_block_list) && !empty($_domain_block_list)){
			$_block_domains_array = explode(',',$_domain_block_list);
			$sanitized_block_domains_array = array_map('trim', $_block_domains_array);
			$email_address_parts = explode('@',$user_email);
			$email_domain_part = end($email_address_parts);
			if(in_array($email_domain_part, $sanitized_block_domains_array) || in_array('@'.$email_domain_part, $sanitized_block_domains_array)){
				$errors->add( 'email_error', esc_html__( 'Error: ', 'secure-user-registration-by-puredevs' ) . wp_kses_post($_blocklist_error_message) );
			}
		}
	}

}
