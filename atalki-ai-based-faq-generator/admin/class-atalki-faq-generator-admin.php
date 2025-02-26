<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://blackzoid.com/
 * @since      1.0.0
 *
 * @package    Atalki_Faq_Generator
 * @subpackage Atalki_Faq_Generator/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Atalki_Faq_Generator
 * @subpackage Atalki_Faq_Generator/admin
 * @author     BlackZoid <namaste@blackzoid.com>
 */
class Atalki_Faq_Generator_Admin {

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
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles($hook) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Atalki_Faq_Generator_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Atalki_Faq_Generator_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$hook_array = array(
			"toplevel_page_atalki-faq-generator",
			"atalki-faq-generator_page_afg-login-signup",
			"atalki-faq-generator_page_afg-content",
			"atalki-faq-generator_page_afg-faq-list",
		);
		foreach($hook_array as $hak){
			if($hak == $hook){
			wp_enqueue_style( $this->plugin_name. "bootstrap-min-style", ATALKI_FAQ_GENERATOR_PLUGIN_URL . "admin/css/vendors/bootstrap.min.css", array(), $this->version, 'all' );

			wp_enqueue_style( $this->plugin_name, ATALKI_FAQ_GENERATOR_PLUGIN_URL . 'admin/css/atalki-faq-generator-admin.css', array($this->plugin_name. "bootstrap-min-style"), $this->version, 'all' );
			}
		}
		

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($hook) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Atalki_Faq_Generator_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Atalki_Faq_Generator_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		 $hook_array = array(
			 "toplevel_page_atalki-faq-generator",
			 "atalki-faq-generator_page_afg-login-signup",
			 "atalki-faq-generator_page_afg-content",
			 "atalki-faq-generator_page_afg-faq-list",
		 );
		 foreach($hook_array as $hak){
			 if($hak == $hook){
				wp_enqueue_script( $this->plugin_name. "-bootstrap-bundle", ATALKI_FAQ_GENERATOR_PLUGIN_URL . "admin/js/vendors/bootstrap.bundle.min.js", array( 'jquery' ), $this->version, false );
				wp_enqueue_script( $this->plugin_name. "-admin", ATALKI_FAQ_GENERATOR_PLUGIN_URL . 'admin/js/atalki-faq-generator-admin.js', array( 'jquery' ), $this->version, true );
				$signup_message = "";
				$login_message = "";
				if(isset($_SESSION["signup_message"])){
					$signup_message = sanitize_text_field($_SESSION["signup_message"]);
					unset($_SESSION["signup_message"]);    
				}
				if(isset($_SESSION["login_message"])){
					$login_message = sanitize_text_field($_SESSION["login_message"]);
					unset($_SESSION["login_message"]); 
				}

				$atalki_admin_vars = array(
					"signup_message" => $signup_message,
					"login_message" => $login_message,
				);

				wp_localize_script($this->plugin_name. "-admin", "atalki_admin_vars", $atalki_admin_vars);
			 }
		 }
			
		

	}

	public function admin_menus(){
		add_menu_page(
			__('Atalki - FAQ Generator', "atalki-faq-generator"), 
			__('Atalki - FAQ Generator', "atalki-faq-generator"), 
			'manage_options', 
			'atalki-faq-generator', 
			array($this, 'atalki_faq_content_html') 
		);
		add_submenu_page(
			'atalki-faq-generator', 
			__('Login / Sign Up', "atalki-faq-generator"),
			__('Login / Sign Up', "atalki-faq-generator"),
			'manage_options', 
			'afg-login-signup', 
			array($this, 'atalki_faq_generator_html')
		);
		/* add_submenu_page(
			'atalki-faq-generator', 
			__('Generate FAQ content', "atalki-faq-generator"),
			__('Generate FAQ content', "atalki-faq-generator"),
			'manage_options', 
			'afg-content', 
			array($this, 'atalki_faq_content_html')
		); */

		add_submenu_page(
			'atalki-faq-generator', 
			__('FAQ List', "atalki-faq-generator"),
			__('FAQ List', "atalki-faq-generator"),
			'manage_options', 
			'afg-faq-list', 
			array($this, 'atalki_faq_list_html')
		);

		
		


		
	
		
	}

	public function atalki_faq_generator_html(){
		require_once(ATALKI_FAQ_GENERATOR_DIR_PATH . '/admin/partials/atalki-faq-generator-signup-login-html.php');
	}
	public function atalki_faq_content_html(){
		require_once(ATALKI_FAQ_GENERATOR_DIR_PATH . '/admin/partials/afg-link-page-html.php');
	}
	public function atalki_faq_list_html(){
		require_once(ATALKI_FAQ_GENERATOR_DIR_PATH . '/admin/partials/afg-faq-list-html.php');
	}

	public function afg_process_signup(){
		//ATALKI_FAQ_GENERATOR_BASE_API_DOMAIN
		if(isset($_POST)){
			if(isset($_POST["atalki_signup_form_nonce_field"])){
				if(wp_verify_nonce( $_POST['atalki_signup_form_nonce_field'], 'atalki_signup_form' )){
					if(
						isset($_POST["signup_email"]) && 
						!empty($_POST["signup_email"]) &&
						isset($_POST["signup_password"]) &&
						!empty($_POST["signup_password"])
						){
							$url = ATALKI_FAQ_GENERATOR_BASE_API_DOMAIN . "api/v2/register/";

							$data = array(
								"username" => sanitize_email($_POST["signup_email"]),
								"password" => sanitize_text_field($_POST["signup_password"]),
							);
							$postdata = json_encode($data);

							$args = array(
								'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
								'body'        => $postdata,
								'method'      => 'POST',
								'data_format' => 'body',

							);
							$result = wp_remote_post( $url, $args );
							// $http_code = wp_remote_retrieve_response_code( $response );
							$result = wp_remote_retrieve_body( $result );
							
							if(!empty($result)){
								$result = json_decode($result, true);
								if(isset($result["id"])){
									$_SESSION["signup_message"] = esc_html__("Registration Successfull", "atalki-faq-generator");
									wp_redirect(admin_url() . "admin.php?page=afg-login-signup");
									die;
								}else{
									$_SESSION["signup_message"] = esc_html__("Something Wrong!!!", "atalki-faq-generator");
									wp_redirect(admin_url() . "admin.php?page=afg-login-signup");
									die;
								}
							}else{
								$_SESSION["signup_message"] = esc_html__("Something Wrong!!!", "atalki-faq-generator");
								wp_redirect(admin_url() . "admin.php?page=afg-login-signup");
								die;
							}
						}else{
							$_SESSION["signup_message"] = esc_html__("Something Wrong!!!", "atalki-faq-generator");
							wp_redirect(admin_url() . "admin.php?page=afg-login-signup");
							die;
						}
				}
			}
		}
	}

	public function afg_process_login(){
		//ATALKI_FAQ_GENERATOR_BASE_API_DOMAIN
		if(isset($_POST)){
			if(isset($_POST["atalki_login_form_nonce_field"])){
				if(wp_verify_nonce( $_POST['atalki_login_form_nonce_field'], 'atalki_login_form' )){
					if(
						isset($_POST["login_username"]) && 
						!empty($_POST["login_username"]) &&
						isset($_POST["login_password"]) && 
						!empty($_POST["login_password"])
						){
							$url = ATALKI_FAQ_GENERATOR_BASE_API_DOMAIN . "api/v2/token/generate/";

							$data = array(
								"username" => sanitize_email($_POST["login_username"]),
								"password" => sanitize_text_field($_POST["login_password"]),
							);
							$postdata = json_encode($data);

							$args = array(
								'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
								'body'        => $postdata,
								'method'      => 'POST',
								'data_format' => 'body',

							);
							$result = wp_remote_post( $url, $args );
							$result = wp_remote_retrieve_body( $result );
							
							if(!empty($result)){
								$result = json_decode($result, true);
								
								if(isset($result["refresh"])){
									update_option("atalki_refresh_token", $result["refresh"]);
									update_option("atalki_access_token", $result["access"]);
									if( isset($_POST["keep_me_login"]) && $_POST["keep_me_login"] == "1" ){
										update_option("atalki_keep_me_login", 1);
									}
									$_SESSION["login_message"] = esc_html__("Login Successfull", "atalki-faq-generator");
									wp_redirect(admin_url() . "admin.php?page=afg-login-signup");
									die;
								}else if(isset($result["detail"]) && $result["detail"] == "No active account found with the given credentials"){
									$_SESSION["login_message"] = $result["detail"];
									wp_redirect(admin_url() . "admin.php?page=afg-login-signup");
									die;
								}else{
									$_SESSION["login_message"] = esc_html__("Something Wrong!!!", "atalki-faq-generator");
									wp_redirect(admin_url() . "admin.php?page=afg-login-signup");
									die;
								}
							}else{
								$_SESSION["login_message"] = esc_html__("Something Wrong!!!", "atalki-faq-generator");
								wp_redirect(admin_url() . "admin.php?page=afg-login-signup");
								die;
							}
						}else{
							$_SESSION["login_message"] = esc_html__("Something Wrong!!!", "atalki-faq-generator");
							wp_redirect(admin_url() . "admin.php?page=afg-login-signup");
							die;
						}
				}
			}
		}
	}

	public function afg_process_link_page(){
		if(isset($_POST)){
			if(isset($_POST["atalki_link_page_form_nonce_field"])){
				if(wp_verify_nonce($_POST["atalki_link_page_form_nonce_field"], "atalki_link_page_form")){
					if(isset($_POST["atalki_link_title"]) && !empty($_POST["atalki_link_title"])){
						if(isset($_POST["atalki_link_desc"]) && !empty($_POST["atalki_link_desc"])){
							if(isset($_POST["atalki_link_url"]) && !empty($_POST["atalki_link_url"])){

								$atalki_keep_me_login = get_option("atalki_keep_me_login");
								if(!empty($atalki_keep_me_login)){
									$this->afg_verify_and_refresh_token();
								}


								$url = ATALKI_FAQ_GENERATOR_BASE_API_DOMAIN . "api/v2/createdocpage/";
								$atalki_access_token = get_option("atalki_access_token");
								$authorization = "Bearer ".$atalki_access_token;

								$data = array(
									"title" => sanitize_title($_POST["atalki_link_title"]),
									"description" => sanitize_textarea_field($_POST["atalki_link_desc"]),
									"url" => esc_url_raw($_POST["atalki_link_url"]),
									"additionalurls" => array(),
									"file_image" => "",
								);
								$postdata = json_encode($data);
								
								$args = array(
									'headers'     => array(
														'Authorization' => $authorization,
														'Content-Type' => 'application/json; charset=utf-8',
														'Accept' => 'application/json',
													),
									'body'        => $postdata,
									'method'      => 'POST',
									'data_format' => 'body',
	
								);
								
								$result = wp_remote_post( $url, $args );
								$result = wp_remote_retrieve_body( $result );
								if(!empty($result)){
									$result = json_decode($result, true);
									
									if(isset($result["success"]) && $result["success"]){
										update_option("atalki_doc_id", $result["doc_id"]);
										// $_SESSION["link_submit_message"] = __("Link submission successfull", "atalki-faq-generator");
										$_SESSION["link_submit_message"] = esc_html($result["message"]);
										wp_redirect(admin_url() . "admin.php?page=atalki-faq-generator");
										die;
									}else{
										$_SESSION["link_submit_message"] = esc_html__("Something Wrong!!!", "atalki-faq-generator");
										wp_redirect(admin_url() . "admin.php?page=atalki-faq-generator");
										die;
									}
								}else{
									if(!empty($error)){
										$_SESSION["link_submit_message"] = esc_html($error, "atalki-faq-generator");
									}else{
										$_SESSION["link_submit_message"] = esc_html($error, "atalki-faq-generator");
									}
									wp_redirect(admin_url() . "admin.php?page=atalki-faq-generator");
									die;
								}


							}
						}
					}
				}
			}
		}
	}


	
	public function afg_process_recreate_page(){
		if(isset($_GET["action"]) && $_GET["action"] == "recreate_page"){
			if(isset($_GET["doc_id"]) && !empty($_GET["doc_id"])){
			
				$atalki_access_token = get_option("atalki_access_token");
				$authorization = "Bearer ".$atalki_access_token;
				$atalki_doc_id = sanitize_text_field($_GET["doc_id"]);
				$url = ATALKI_FAQ_GENERATOR_BASE_API_DOMAIN . "api/v2/deletedocpage/".$atalki_doc_id."/";

				$args = array(
					'headers'     => array(
										'Authorization' => $authorization,
										'Content-Type' => 'application/json; charset=utf-8',
									),
					// 'body'        => $postdata,
					'method'      => 'POST',
					// 'data_format' => 'body',

				);
				
				$result = wp_remote_post( $url, $args );
				$result = wp_remote_retrieve_body( $result );

				if(!empty($result)){
					$result = json_decode($result, true);
					
					if(isset($result["success"]) && $result["success"]){
						$_SESSION["recreate_message"] = ucfirst($result["message"]);
						wp_redirect(admin_url() . "admin.php?page=atalki-faq-generator");
						die;
					}
				}


			}

		}
	}

	public function afg_verify_and_refresh_token(){
		
		$atalki_access_token = get_option("atalki_access_token");
		if(!empty($atalki_access_token)){
			$url = ATALKI_FAQ_GENERATOR_BASE_API_DOMAIN . "api/v2/token/verify/";

			$data = array(
				"token" => $atalki_access_token
			);
			$postdata = json_encode($data);

			$args = array(
				'headers'     => array(
									'Content-Type' => 'application/json; charset=utf-8',
								),
				'body'        => $postdata,
				'method'      => 'POST',
				'data_format' => 'body',

			);
			
			$result = wp_remote_post( $url, $args );
			$result = wp_remote_retrieve_body( $result );
	
			if(!empty($result)){
				$result = json_decode($result, true);
				$atalki_keep_me_login = get_option("atalki_keep_me_login");
				if(isset($result["code"]) && $result["code"] == "token_not_valid" ){
					
					$atalki_refresh_token = get_option("atalki_refresh_token");
					$url = ATALKI_FAQ_GENERATOR_BASE_API_DOMAIN . "api/v2/token/refresh/";

					$data = array(
						"refresh" => $atalki_refresh_token
					);
					$postdata = json_encode($data);
			
					$args = array(
						'headers'     => array(
											'Content-Type' => 'application/json; charset=utf-8',
										),
						'body'        => $postdata,
						'method'      => 'POST',
						'data_format' => 'body',
		
					);
					
					$result = wp_remote_post( $url, $args );
					$result = wp_remote_retrieve_body( $result );



					if(!empty($result)){
						$result = json_decode($result, true);
						
						if(isset($result["access"]) && !empty($result["access"])){
							update_option("atalki_access_token", $result["access"]);
						}
					}

				}
			}

		}
	}

	public function afg_refresh_token(){
		
		$atalki_refresh_token = get_option("atalki_refresh_token");
		$url = ATALKI_FAQ_GENERATOR_BASE_API_DOMAIN . "api/v2/token/refresh/";

		$data = array(
			"refresh" => $atalki_refresh_token
		);
		$postdata = json_encode($data);

		
		$args = array(
			'headers'     => array(
								'Content-Type' => 'application/json; charset=utf-8',
							),
			'body'        => $postdata,
			'method'      => 'POST',
			'data_format' => 'body',

		);
		
		$result = wp_remote_post( $url, $args );
		$result = wp_remote_retrieve_body( $result );


		if(!empty($result)){
			$result = json_decode($result, true);
			if(isset($result["code"]) && $result["code"] == "token_not_valid"){
				return false;
			}else{
				if(isset($result["access"]) && !empty($result["access"])){
					update_option("atalki_access_token", $result["access"]);
					return true;
				}
			}
			
		}
	}

	public function afg_verify_token(){
		
		$is_expired = false;

		$atalki_access_token = get_option("atalki_access_token");
		if(!empty($atalki_access_token)){
			$url = ATALKI_FAQ_GENERATOR_BASE_API_DOMAIN . "api/v2/token/verify/";

			$data = array(
				"token" => $atalki_access_token
			);
			$postdata = json_encode($data);
	
			$args = array(
				'headers'     => array(
									'Content-Type' => 'application/json; charset=utf-8',
								),
				'body'        => $postdata,
				'method'      => 'POST',
				'data_format' => 'body',
	
			);
			
			$result = wp_remote_post( $url, $args );
			$result = wp_remote_retrieve_body( $result );
			
			if(!empty($result)){
				$result = json_decode($result, true);

				if(isset($result["code"]) && $result["code"] == "token_not_valid" ){
					$is_expired = true;
				}
			}

		}

		return $is_expired;

	}


}
