<?php 

class AIEA_Admin_Settings {
	
	private static $_instance = null;
	
	public function __construct() {
		
		$this->init();
		
		$this->admin_init();
		
	}
		
	function init() {
		
		add_action('wp_ajax_aiea_prompt_ajax', [ $this, 'aiea_prompt' ] );
		
		add_action('wp_ajax_aiea_get_city', [ $this, 'get_city' ] );
		
		add_action('wp_ajax_aiea_weather_reset', [ $this, 'weather_reset' ] );
		
		add_action('wp_ajax_aiea_widgets_save', [ $this, 'save_widgets' ] );
		
		add_action('wp_ajax_aiea_settings_save', [ $this, 'save_settings' ] );
		
		add_action( 'admin_menu', [ $this, 'admin_menu' ] );
		
		add_action( 'admin_menu', [ $this, 'menu_label_change' ], 99 );
				
		add_action( 'admin_enqueue_scripts', [ $this, 'framework_scripts' ] );
		
		//$aiea_shortcodes = get_option('aiea_shortcodes');
		//if( empty( $aiea_shortcodes ) ) $this->default_shortcodes();
		
	}
	
	public function admin_init() {
		
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_style' ] );
		
	}
	
	public function admin_style() {
		
		wp_enqueue_style( 'aiea_wp_admin_css', AIEA_URL . 'core/admin/assets/css/admin-style.css', false, '1.0.0' );
		
	}
	
	public static function sanitize_data( $value ) {
		if( is_array( $value ) ) {
			$value = array_map( [ $this, 'sanitize_data' ], $value );
		}elseif( !empty( $value ) ) {
			return sanitize_text_field( $value );
		}
		return $value;
	}
	
	public function save_widgets() {

		if( !isset( $_POST['aiea_save_widgets'] ) || ( isset( $_POST['aiea_save_widgets'] ) && !wp_verify_nonce( $_POST['aiea_save_widgets'], 'inc-save-widgets)(*^&*&^#' ) ) ) return wp_die( "f***" );
		

		$aiea_shortcodes = $aiea_modules = $aiea_options = '';
		
		// reset existing values
		update_option( 'aiea_shortcodes', '' );
		update_option( 'aiea_modules', '' );	
		
		// save new values
		if( isset( $_POST['aiea_shortcodes'] ) ) {
			$aiea_shortcodes = array_map( [ $this, 'sanitize_data' ], (array)$_POST['aiea_shortcodes'] );
			update_option( 'aiea_shortcodes', $aiea_shortcodes );
		} 
		if( isset( $_POST['aiea_modules'] ) ) {
			$aiea_modules = array_map( [ $this, 'sanitize_data' ], (array)$_POST['aiea_modules'] );
			update_option( 'aiea_modules', $aiea_modules );
		}
		
		wp_send_json( array( 'status' => 'success' ) );
		
	}
	
	public function save_settings() {

		if( !isset( $_POST['aiea_save_settings'] ) || ( isset( $_POST['aiea_save_settings'] ) && !wp_verify_nonce( $_POST['aiea_save_settings'], 'inc-save-settings)(*^&*&^#' ) ) ) return wp_die( "f***" );
		
		$aiea_options = '';
		update_option( 'aiea_options', '' );		
		
		$aiea_options = array_map( [ $this, 'sanitize_data' ], (array)$_POST['aiea_options'] );
		update_option( 'aiea_options', $aiea_options );
		
		wp_send_json( array( 'status' => 'success' ) );
		
	}
	
	function admin_menu() {
		
		add_menu_page( 
			esc_html__( 'AI Addons', 'ai-addons' ),
			esc_html__( 'AI Addons', 'ai-addons' ),
			'manage_options',
			'ai-addons', 
			[ $this, 'aiea_dashboard' ], //'aiea_elementor_addon_admin_page',
			AIEA_URL . '/assets/images/logo-icon.svg',
			57.99
		);
		
	}
	
	public function menu_label_change() {
		
		global $submenu;
		if(isset($submenu['ai-addons'])){
			$submenu['ai-addons'][0][0] = esc_html__( 'Dashboard', 'ai-addons' );
		}
		
	}
	
	public function aiea_dashboard() {
		
		require_once ( AIEA_DIR . 'core/admin/parts/dashboard.php' );
		
	}
	
	function framework_scripts() {
		
		if( isset( $_GET['page'] ) && ( $_GET['page'] == 'ai-addons' ) ){
			wp_enqueue_style( 'ai-admin', AIEA_URL . '/core/admin/assets/css/ai-admin-page.css', array(), '1.0', 'all' );			
			wp_enqueue_style( 'bootstrap-icons', AIEA_URL . 'assets/css/front-end/bootstrap-icons.css', false, '1.0' );
			wp_enqueue_style( 'aiea-dashboard-font', AIEA_URL . '/core/admin/assets/css/dashboard-font.css', array(), '1.0', 'all' );
			wp_enqueue_style( 'aiea-dashboard', AIEA_URL . '/core/admin/assets/css/dashboard.css', array(), '1.0', 'all' );
			wp_enqueue_script( 'aiea-dashboard', AIEA_URL . 'core/admin/assets/js/dahsboard.js', array( 'jquery' ), '1.0', true );
		}
		//wp_enqueue_script( 'ai-framework-admin', AIEA_URL . 'core/admin/assets/js/ai-admin-script.js', array( 'jquery' ), '1.0', true );
		
	}
	
	function default_shortcodes(){
		
		$aiea_shortcodes = empty( $aiea_shortcodes ) ? get_option('aiea_shortcodes') : $aiea_shortcodes;
		if( empty( $aiea_shortcodes ) ){
			$shortcode_stat = aiea_addon_base()->aiea_shortcodes();
			$aiea_shortcodes = array();
			foreach( $shortcode_stat as $key => $value ){
				$shortcode_name = str_replace( "-", "_", $key );
				$aiea_shortcodes[$shortcode_name] = 'on';
			}
			update_option( 'aiea_shortcodes', $aiea_shortcodes );
		}
		
	}
	
	public function aiea_prompt() {
		if( isset( $_POST['text'] ) && !empty( $_POST['text'] ) ) {
			$question = sanitize_textarea_field( $_POST['text'] );
			
			$result = [];
			
			$api_key = aiea_addon_base()->aiea_options('openai-api');
			$aiea_model = aiea_addon_base()->aiea_options('openai-model');
			
			$custom_openai_domain = get_option( 'aiea_custom_openai_domain', 'api.openai.com');
			
			$aiea_args = array(
				"max_tokens" => 2000,
				"temperature" => 0.7,
				"top_p" => 1,
				"frequency_penalty" => 0,
				"presence_penalty" => 0
			);
			$api_url = 'https://'. $custom_openai_domain .'/v1/completions';
			
			$aiea_args['model'] = $aiea_model;
			$aiea_args['messages'] = array( array( "role" => "user", "content" => addslashes( $question ) ) );
			$api_url = 'https://'. $custom_openai_domain .'/v1/chat/completions';
			
			$openaiea_json_args = json_encode( $aiea_args );
			
			$args = array(
				'method'	=> 'POST',
				'timeout'	=> 600,
				'sslverify'	=> false,
				'headers'	=> array( 
					'Authorization' => 'Bearer '. esc_attr( $api_key ),
					'Content-Type' => 'application/json'
				),
				'body'		=> $openaiea_json_args,
			);
			$response = wp_remote_post( $api_url, $args	);			
			$server_output = json_decode( wp_remote_retrieve_body( $response ), true );

			if( isset( $server_output['error'] ) ) {
				$result['error'] = 'OpenAI error: '. $server_output['error']['message'];
			} else {
				if( isset( $server_output['choices'] ) ) {
					$choices = $server_output['choices'];
					if( !empty( $choices ) && isset( $choices[0] ) ) {
						$choices_arr = $choices[0];
						if( !empty( $choices_arr ) && isset( $choices_arr['message'] ) ) {
							$content_arr = $choices_arr['message'];
							if( !empty( $content_arr ) && is_array( $content_arr ) && isset( $content_arr['content'] ) ) {
								$result['response'] = $content_arr['content'];
							}
						}
					}
				} else {
					$result['error'] = '!Try after sometime..';
				}
			}
			
			wp_send_json( $result );
		}
		
		wp_send_json( array( 'error' => '!text should be filled out' ) );
	}
	
	public function get_city() {
		
		$result = [ 'status' => 'failed', 'city' => '' ];
		
		if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
			$ip_address = $_SERVER['HTTP_CLIENT_IP'];
		} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
			$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip_address = $_SERVER['REMOTE_ADDR'];
		}
		
		if( $ip_address == '::1' ) {
			$ip_address = $this->get_my_ip();
		}
		
		$response = wp_remote_get( 'http://www.geoplugin.net/json.gp?ip='. $ip_address,
			array(
				'timeout'     => 120,
				'httpversion' => '1.1',
				'headers' => array(
					'Accept' => 'application/json',
				)
			)
		);
		if ( ( !is_wp_error($response)) && (200 === wp_remote_retrieve_response_code( $response ) ) ) {
			$responseBody = json_decode($response['body']);
			$result = [ 'status' => 'success', 'city' => $responseBody ];
		}
		
		wp_send_json( $result );
		
	}
	
	public function get_my_ip() {
		
		$response = wp_remote_get( 'http://ipecho.net/plain',
			array(
				'timeout'     => 120,
				'httpversion' => '1.1'
			)
		);
		
		if ( ( !is_wp_error($response)) && (200 === wp_remote_retrieve_response_code( $response ) ) ) {
			return $response['body'];
		}
		
		return false;
		
	}
	
	public function weather_reset() {
		
		$api_version = isset( $_POST['version'] ) ? $_POST['version'] : '';
		$city = isset( $_POST['city'] ) ? $_POST['city'] : '';
		$api_key = aiea_addon_base()->aiea_options('open-weather-api');
		
		$api_version_key = $api_version ? str_replace( ".", "", $api_version ) : '';
		$city_slug = sanitize_title( $city );
		$transient_name = sprintf( 'aiea_weather_%s_%s_%s', $api_key, $api_version_key, $city_slug );

		delete_transient( $transient_name );
		
		wp_send_json( [ 'status' => 'success' ] );
		
	}
	
	public static function get_version() {
		
		$plugin_data = get_plugin_data( AIEA_BASE );
		return $plugin_data['Version'];
		
	}
			
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

} AIEA_Admin_Settings::instance();

function aiea_elementor_addon_admin_page(){
	
	?>
	<div class="inc-settings-tabs ai-settings-tabs">
		<div class="container">
			<div class="inc-row justify-center">
				<div class="inc-col-11 pl-0">
										
					<?php require_once ( AIEA_DIR . 'core/admin/parts/admin-dhasboard-menu.php' );	 ?>
					
					<div class="inc-tab-content">
						<div id="inc-dashboard" class="inc-tab-content-inner ai-settings-tab active">
							<div class="inc-section-header-wrap">
								<div class="inc-row">
									<div class="inc-col-3 m-0 align-self-center">										
										<h1 class="inc-section-heading m-0"><?php esc_html_e( 'Dashboard', 'ai-addons' ); ?></h1>
									</div>
									<!--<div class="inc-col-6 m-0 text-center">
										<img class="inc-admin-logo" src="<?php echo esc_url( AIEA_URL . 'assets/images/logo.png' ); ?>" alt="<?php esc_html_e( 'AI Addons', 'ai-addons' ); ?>" />
									</div> -->
									<div class="inc-col-3 m-0"></div>
								</div>	
							</div>	
							<div class="inc-banner">
								<div class="inc-row">
									<div class="inc-col-5">
										<div class="inc-banner-content">
											<h2 class="inc-banner-title"><?php esc_html_e( 'Welcome To', 'ai-addons' ); ?> <a href="#"><span class="inc-highlight-text"><?php esc_html_e( 'AI', 'ai-addons' ); ?></span></a> <?php esc_html_e( 'Addons', 'ai-addons' ); ?></h2>
											<p class="inc-banner-description"><?php esc_html_e( 'Get the best solution for Elementor users with built-in OpenAI GPT integration, 50+ widgets, 6+ modules, 200+ pre-made templates and header footer builder where intelligent technology meets seamless functionality.', 'ai-addons' ); ?></p>
											<a class="inc-admin-btn inc-animate-icon-btn" href="https://aiaddons.ai/changelog/" target="_blank"><span><?php esc_html_e( 'Changelog', 'ai-addons' ); ?></span><span class="bi bi-file-text"></span><span class="bi bi-file-text-fill"></span></a>
											
											<a class="inc-admin-btn inc-animate-icon-btn" href="https://aiaddons.ai/support/" target="_blank"><span><?php esc_html_e( 'Support', 'ai-addons' ); ?></span><span class="bi bi-person"></span><span class="bi bi-person-fill"></span></a>
										</div>
									</div>
									<div class="inc-col-7">
										<div class="icn-banner-img-wrap text-right">
											<img class="inc-banner-img-" src="<?php echo esc_url( AIEA_URL . 'core/admin/assets/img/dashboard-top.png' ); ?>" alt="AI Addons" />
										</div>
									</div>
								</div>
							</div>
							<div class="inc-tab-content-inner-section pt-50">
								<div class="inc-row justify-center">
									<div class="inc-col-5">
										<div class="inc-section-img-wrap">
											<img class="inc-section-img" src="<?php echo esc_url( AIEA_URL . 'core/admin/assets/img/documentation.png' ); ?>" alt="AI Addons" />
										</div>
									</div>
									<div class="inc-col-5 align-self-center">
										<div class="inc-section-content-wrap-1">
											<h2 class="inc-section-content-heading"><?php esc_html_e( 'Easy Documentation', 'ai-addons' ); ?></h2>
											<span class="inc-heading-divider"></span>
											<p class="inc-section-content-description"><?php esc_html_e( 'Streamline your website building process - Our easy documentation provides clear and concise instructions, making it simple for you to implement our ai features and take your website to the next level.
', 'ai-addons' ); ?></p>
											<a class="inc-admin-btn inc-animate-icon-btn" href="https://aiaddons.ai/docs/" target="_blank"><span><?php esc_html_e( 'View Documentation', 'ai-addons' ); ?></span><span class="bi bi-file-earmark-text"></span><span class="bi bi-file-earmark-text-fill"></span></a>
										</div>
									</div>
								</div>	
							</div>
							<div class="inc-tab-content-inner-section pt-100">
								<div class="inc-section-title-wrap">
									<h1 class="inc-section-title inc-section-content-heading mb-30"><?php esc_html_e( 'Our Wonderful Features', 'ai-addons' ); ?></h1>
									<span class="inc-heading-divider mx-auto"></span>
								</div>
								<div class="inc-feature-box-row">
								<div class="inc-row justify-center">
									<div class="inc-col-4">
										<div class="inc-feature-box-wrap">
											<div class="inc-feature-box-inner">
												<div class="inc-feature-flip-box">
													<div class="inc-flip-box-inner">
														<div class="inc-flip-box-front">
															<div class="inc-feature-box-content-wrap">
																<h2 class="inc-feature-box-heading"><?php esc_html_e( 'OpenAI GPT (PRO)', 'ai-addons' ); ?></h2>
																<p class="inc-feature-box-description"><?php esc_html_e( 'From personalised website making to smart automation, our AI-powered add-ons revolutionise the way you interact with technology.', 'ai-addons' ); ?></p>
															</div>
														</div>
														<div class="inc-flip-box-back">
															<div class="inc-feature-box-content-wrap">
																<h2 class="inc-feature-box-heading"><?php esc_html_e( 'OpenAI GPT (PRO)', 'ai-addons' ); ?></h2>
																<p class="inc-feature-box-description"><?php esc_html_e( 'From personalised website making to smart automation, our AI-powered add-ons revolutionise the way you interact with technology.', 'ai-addons' ); ?></p>
															</div>
														</div>
													</div>	
												</div>
											</div>
										</div>
									</div>
									<div class="inc-col-4">
										<div class="inc-feature-box-wrap">
											<div class="inc-feature-box-inner">
												<div class="inc-feature-flip-box">
													<div class="inc-flip-box-inner">
														<div class="inc-flip-box-front">
															<div class="inc-feature-box-content-wrap">
																<h2 class="inc-feature-box-heading"><?php esc_html_e( 'Widgets & Modules', 'ai-addons' ); ?></h2>
																<p class="inc-feature-box-description"><?php esc_html_e( 'AI Addons Widgets & Modules are specialised tools made to improve WordPress websites\' and Elementor functionality.', 'ai-addons' ); ?></p>
															</div>
														</div>
														<div class="inc-flip-box-back">
															<div class="inc-feature-box-content-wrap">
																<h2 class="inc-feature-box-heading"><?php esc_html_e( 'Widgets & Modules', 'ai-addons' ); ?></h2>
																<p class="inc-feature-box-description"><?php esc_html_e( 'AI Addons Widgets & Modules are specialised tools made to improve WordPress websites\' and Elementor functionality.', 'ai-addons' ); ?></p>
															</div>
														</div>
													</div>	
												</div>
											</div>
										</div>
									</div>
									<div class="inc-col-4">
										<div class="inc-feature-box-wrap">
											<div class="inc-feature-box-inner">
												<div class="inc-feature-flip-box">
													<div class="inc-flip-box-inner">
														<div class="inc-flip-box-front">
															<div class="inc-feature-box-content-wrap">
																<h2 class="inc-feature-box-heading"><?php esc_html_e( 'Templates', 'ai-addons' ); ?></h2>
																<p class="inc-feature-box-description"><?php esc_html_e( 'To assist you in creating a website with an elegant and professional look and feel, we provide an extensive collection of pre-designed templates.', 'ai-addons' ); ?></p>
															</div>
														</div>
														<div class="inc-flip-box-back">
															<div class="inc-feature-box-content-wrap">
																<h2 class="inc-feature-box-heading"><?php esc_html_e( 'Templates', 'ai-addons' ); ?></h2>
																<p class="inc-feature-box-description"><?php esc_html_e( 'To assist you in creating a website with an elegant and professional look and feel, we provide an extensive collection of pre-designed templates.', 'ai-addons' ); ?></p>
															</div>
														</div>
													</div>	
												</div>
											</div>
										</div>
									</div>
								</div>
								</div>
							</div>
						</div>
						<div id="inc-widgets" class="inc-tab-content-inner ai-settings-tab">
							<?php 
								$aiea_shortcodes = get_option('aiea_shortcodes'); 
								if( empty( $aiea_shortcodes ) ) $aiea_shortcodes = aiea_addon_base()->aiea_default_widgets();
							?>
							<div class="inc-section-header-wrap d-flex">
								<h1 class="inc-section-heading m-0"><?php esc_html_e( 'Widgets', 'ai-addons' ); ?></h1>
								<!--<img class="inc-admin-logo" src="<?php echo esc_url( AIEA_URL . 'assets/images/logo.png' ); ?>" alt="<?php esc_html_e( 'AI Addons', 'ai-addons' ); ?>" />-->
								<a class="inc-admin-btn inc-gradient-btn inc-save-changes-button inc-save-widgets m-0" href="#" data-form="ai-widgets-form"><?php esc_html_e( 'Save Changes', 'ai-addons' ); ?><span class="bi bi-gear"></span></a>
							</div>
							<div class="inc-tab-content-inner-section">
								<form id="ai-widgets-form" method="post" action="" enctype="multipart/form-data">
								
									<input type="hidden" name="aiea_shortcodes[ai-default]" value="default" />
									
									<div class="inc-fields-set d-flex pt-50">
										<h4 class="widget-modules-title"><?php esc_html_e( 'General Widgets', 'ai-addons' ); ?></h4>
										<div class="inc-chk-unchk-wrap d-flex">
											<div class="inc-checkbox path">
												<input type="checkbox" class="inc-trigger-all-shortcodes">
												<svg viewBox="0 0 21 21">
													<path d="M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186"></path>
												</svg>
											</div>
											<span><?php esc_html_e( 'Check/Uncheck All', 'ai-addons' ); ?></span>
										</div>
									</div>
									
									<?php
										
										wp_nonce_field( 'inc-save-widgets)(*^&*&^#', 'aiea_save_widgets' );
										$available_shortcodes = aiea_addon_base()->aiea_shortcodes();
										

										$hf_w = [ 'logo', 'menu', 'search', 'copyright', 'page-title', 'post-title', 'archive-title', 'site-title', 'breadcrumbs' ];
										$hf_widgets = [];
										foreach( $hf_w as $hf_widget ) {											
											$hf_widgets[$hf_widget] = $available_shortcodes[$hf_widget];
											unset( $available_shortcodes[$hf_widget] );
										}
										
										$row = 1; $cols = 4;
										foreach( $available_shortcodes as $key => $widget ){
										
											$shortcode_name = str_replace( "-", "_", $key );
											if( !empty( $aiea_shortcodes ) ){
												if( isset( $aiea_shortcodes[$shortcode_name] ) && $aiea_shortcodes[$shortcode_name] == 'on' ){
													$saved_val = 'on';
												}else{
													$saved_val = 'off';
												}
											}
										
											if( $row % $cols == 1 ) echo '<div class="inc-row">';
											
												echo '
												<div class="inc-col-3">
													<div class="inc-widget-box">
														<span class="inc-widget-heading">'. esc_html( str_replace( array( "Elementor", "Widget" ), "", $widget['title'] ) ) .'</span>
														<div class="inc-widget-operations"><a href="'. esc_url( $widget['url'] ) .'" target="_blank" class="inc-demo-links"><i class="dashicons dashicons-laptop"></i><span class="inc-view-demo">'. esc_html__( 'View Demo', 'ai-addons' ) .'</span></a>';
												
												if( $widget['pro'] == true ) {
													echo '<div class="inc-btn-lock">
													  <svg width="24" height="30" viewBox="0 0 34 40">
														<path class="lockb" d="M27 27C27 34.1797 21.1797 40 14 40C6.8203 40 1 34.1797 1 27C1 19.8203 6.8203 14 14 14C21.1797 14 27 19.8203 27 27ZM15.6298 26.5191C16.4544 25.9845 17 25.056 17 24C17 22.3431 15.6569 21 14 21C12.3431 21 11 22.3431 11 24C11 25.056 11.5456 25.9845 12.3702 26.5191L11 32H17L15.6298 26.5191Z"></path>
														<path class="lock" d="M6 21V10C6 5.58172 9.58172 2 14 2V2C18.4183 2 22 5.58172 22 10V21"></path>
														
														<path class="bling" d="M31.5 15H34.5"></path>
														
													  </svg>
													</div>';
												} else {
													echo '<div class="inc-checkbox path">
																<input type="checkbox" name="aiea_shortcodes['. esc_attr( $shortcode_name ) .']" '. ( $saved_val == 'on' ? 'checked="checked"' : '' ) .'>
																<svg viewBox="0 0 21 21">
																	<path d="M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186"></path>
																</svg>
															</div>';
												}
												
												echo '</div></div><!-- .inc-widget-box -->
												</div><!-- .col -->';
															
											if( $row % $cols == 0 ) echo '</div><!-- .row -->';
											$row++;
										}
										
										if( $row % $cols != 1 ) echo '</div><!-- .ai-row unexpceted close -->';
									?>
									
									<h4 class="widget-modules-title"><?php esc_html_e( 'Header & Footer', 'ai-addons' ); ?></h4>
									<?php
										$row = 1; $cols = 4;
										foreach( $hf_widgets as $key => $widget ){
										
											$shortcode_name = str_replace( "-", "_", $key );
											if( !empty( $aiea_shortcodes ) ){
												if( isset( $aiea_shortcodes[$shortcode_name] ) && $aiea_shortcodes[$shortcode_name] == 'on' ){
													$saved_val = 'on';
												}else{
													$saved_val = 'off';
												}
											}
										
											if( $row % $cols == 1 ) echo '<div class="inc-row">';
											
												echo '
												<div class="inc-col-3">
													<div class="inc-widget-box">
														<span class="inc-widget-heading">'. esc_html( str_replace( array( "Elementor", "Widget" ), "", $widget['title'] ) ) .'</span>
														<div class="inc-widget-operations"><a href="'. esc_url( $widget['url'] ) .'" target="_blank" class="inc-demo-links"><i class="dashicons dashicons-laptop"></i><span class="inc-view-demo">'. esc_html__( 'View Demo', 'ai-addons' ) .'</span></a>';
														
												if( $widget['pro'] == true ) {
													echo '<div class="inc-btn-lock">
													  <svg width="24" height="30" viewBox="0 0 34 40">
														<path class="lockb" d="M27 27C27 34.1797 21.1797 40 14 40C6.8203 40 1 34.1797 1 27C1 19.8203 6.8203 14 14 14C21.1797 14 27 19.8203 27 27ZM15.6298 26.5191C16.4544 25.9845 17 25.056 17 24C17 22.3431 15.6569 21 14 21C12.3431 21 11 22.3431 11 24C11 25.056 11.5456 25.9845 12.3702 26.5191L11 32H17L15.6298 26.5191Z"></path>
														<path class="lock" d="M6 21V10C6 5.58172 9.58172 2 14 2V2C18.4183 2 22 5.58172 22 10V21"></path>
														
														<path class="bling" d="M31.5 15H34.5"></path>
														
													  </svg>
													</div>';
												} else {
													echo '<div class="inc-checkbox path">
																<input type="checkbox" name="aiea_shortcodes['. esc_attr( $shortcode_name ) .']" '. ( $saved_val == 'on' ? 'checked="checked"' : '' ) .'>
																<svg viewBox="0 0 21 21">
																	<path d="M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186"></path>
																</svg>
															</div>';
												}
														
												echo '</div></div><!-- .inc-widget-box -->
												</div><!-- .col -->';
															
											if( $row % $cols == 0 ) echo '</div><!-- .row -->';
											$row++;
										}
										
										if( $row % $cols != 1 ) echo '</div><!-- .ai-row unexpceted close -->';
									?>
								</form>
							</div>
						</div>
						<div id="inc-features" class="inc-tab-content-inner ai-settings-tab">
							<div class="inc-section-header-wrap d-flex">
								<h1 class="inc-section-heading m-0">Modules</h1>
								<!--<img class="inc-admin-logo" src="<?php echo esc_url( AIEA_URL . 'assets/images/logo.png' ); ?>" alt="<?php esc_html_e( 'AI Addons', 'ai-addons' ); ?>" />-->
								<a class="inc-admin-btn inc-gradient-btn inc-save-changes-button" href="#" data-form="ai-modules-form">Save Changes<span class="bi bi-gear"></span></a>
							</div>
							
							<?php 
								$saved_modules = get_option( 'aiea_modules' );
								if( empty( $saved_modules ) ) $saved_modules = aiea_addon_base()->aiea_default_modules();
								$available_modules = aiea_addon_base()->aiea_modules();
							?>
							
							<div class="inc-tab-content-inner-section pt-50">
							
								<form id="ai-modules-form" method="post" action="" enctype="multipart/form-data">
								
									<input type="hidden" name="aiea_modules[ai-default]" value="default" />

									<div class="inc-fields-set d-flex pt-50">
										<h4 class="widget-modules-title"><?php esc_html_e( 'Modules', 'ai-addons' ); ?></h4>
										<div class="inc-chk-unchk-wrap d-flex">
											<div class="inc-checkbox path">
												<input type="checkbox" class="inc-trigger-all-modules">
												<svg viewBox="0 0 21 21">
													<path d="M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186"></path>
												</svg>
											</div>
											<span><?php esc_html_e( 'Check/Uncheck All', 'ai-addons' ); ?></span>
										</div>
									</div>									
								
									<?php 
									
										wp_nonce_field( 'inc-save-modules)(*^&*&^#', 'aiea_save_modules' );
									
										$row = 1; $cols = 4; $saved_val = 'off';
										foreach( $available_modules as $key => $widget ){
											if( !empty( $saved_modules ) ){ 
												if( isset( $saved_modules[$key] ) && $saved_modules[$key] == 'on' ){
													$saved_val = 'on';
												}else{
													$saved_val = 'off';
												}
											}
											
											if( $row % $cols == 1 ) echo '<div class="inc-row">';
											
											echo '
												<div class="inc-col-3">
													<div class="inc-widget-box">
														<span class="inc-widget-heading">'. esc_html( $widget['title'] ) .'</span>
														<div class="inc-widget-operations"><a href="'. esc_url( $widget['url'] ) .'" target="_blank" class="inc-demo-links"><i class="dashicons dashicons-laptop"></i><span class="inc-view-demo">'. esc_html__( 'View Demo', 'ai-addons' ) .'</span></a>';
													
													if( $widget['pro'] == true ) {
														echo '<div class="inc-btn-lock">
														  <svg width="24" height="30" viewBox="0 0 34 40">
															<path class="lockb" d="M27 27C27 34.1797 21.1797 40 14 40C6.8203 40 1 34.1797 1 27C1 19.8203 6.8203 14 14 14C21.1797 14 27 19.8203 27 27ZM15.6298 26.5191C16.4544 25.9845 17 25.056 17 24C17 22.3431 15.6569 21 14 21C12.3431 21 11 22.3431 11 24C11 25.056 11.5456 25.9845 12.3702 26.5191L11 32H17L15.6298 26.5191Z"></path>
															<path class="lock" d="M6 21V10C6 5.58172 9.58172 2 14 2V2C18.4183 2 22 5.58172 22 10V21"></path>
															
															<path class="bling" d="M31.5 15H34.5"></path>
															
														  </svg>
														</div>';
													} else {
														echo '<div class="inc-checkbox path">
																	<input type="checkbox" name="aiea_modules['. esc_attr( $key ) .']" '. ( $saved_val == 'on' ? 'checked="checked"' : '' ) .'>
																	<svg viewBox="0 0 21 21">
																		<path d="M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186"></path>
																	</svg>
																</div>';
													}													
														
													echo '</div></div><!-- .inc-widget-box -->
												</div><!-- .col -->';
															
											if( $row % $cols == 0 ) echo '</div><!-- .row -->';
											$row++;
										}
											
										if( $row % $cols != 1 ) echo '</div><!-- .ai-row unexpceted close -->';
									
									?>
								</form>
							</div>
						</div>
						
						<div id="inc-settings" class="inc-tab-content-inner ai-settings-tab">
							<div class="inc-section-header-wrap d-flex">
								<h1 class="inc-section-heading m-0"><?php esc_html_e( 'Settings', 'ai-addons' ); ?></h1>
								<!--<img class="inc-admin-logo" src="<?php echo esc_url( AIEA_URL . 'assets/images/logo.png' ); ?>" alt="<?php esc_html_e( 'AI Addons', 'ai-addons' ); ?>" />-->
								<a class="inc-admin-btn inc-gradient-btn inc-save-changes-button inc-save-options" href="#" data-form="ai-settings-form"><?php esc_html_e( 'Save Changes', 'ai-addons' ); ?><span class="bi bi-gear"></span></a>
							</div>
							
							<?php
							
								$aiea_options = get_option( 'aiea_options' );
								if( empty( $aiea_options ) ) $aiea_options = aiea_addon_base()->aiea_default_options();
								$mailchimp_api = isset( $aiea_options['mailchimp-api'] ) && $aiea_options['mailchimp-api'] ? $aiea_options['mailchimp-api'] : '';
								$google_api = isset( $aiea_options['google-map-api'] ) && $aiea_options['google-map-api'] ? $aiea_options['google-map-api'] : '';
								$openaiea_api = isset( $aiea_options['openai-api'] ) && $aiea_options['openai-api'] ? $aiea_options['openai-api'] : '';
								$openaiea_model = isset( $aiea_options['openai-model'] ) && $aiea_options['openai-model'] ? $aiea_options['openai-model'] : 'text-davinci-003';
							?>
							
							<form id="ai-settings-form" method="post" action="" enctype="multipart/form-data">
								<?php wp_nonce_field( 'inc-save-settings)(*^&*&^#', 'aiea_save_settings' ); ?>
								<div class="inc-tab-content-inner-section pt-50">
									<div class="inc-settings-wrap">
										<div class="inc-settings-header d-flex">										
											<label><?php esc_html_e( 'Google Map API', 'ai-addons' ); ?></label>
										</div>
										<div class="show-password-wrap">
											<input type="password" class="attr-form-control" name="aiea_options[google-map-api]" placeholder="Google map api key here.." value="<?php echo esc_attr( $google_api ); ?>" autocomplete="off">
											<span class="icon-show-password"><i class="aieaicon-eye"></i></span>
										</div>
										<div class="inc-settings-description">
											<?php esc_html_e( 'You can find or create your Google API key ', 'ai-addons' ); ?> <a href="https://console.cloud.google.com/google/maps-apis/credentials" target="_blank"><?php esc_html_e( 'here', 'ai-addons' ); ?></a> 
										</div>
									</div>
									<div class="inc-settings-wrap">
										<div class="inc-settings-header d-flex">										
											<label><?php esc_html_e( 'OpenAI API Key', 'ai-addons' ) ?></label>
										</div>
										<div class="show-password-wrap">
											<input type="password" class="attr-form-control" name="aiea_options[openai-api]" placeholder="<?php esc_html_e( 'Paste OpenAI API key here..', 'ai-addons' ) ?>" value="<?php echo esc_attr( $openaiea_api ); ?>" autocomplete="off">
											<span class="icon-show-password"><i class="aieaicon-eye"></i></span>
										</div>
										<div class="inc-settings-description">
											<?php esc_html_e( 'You can find or create your OpenAI API key ', 'ai-addons' ); ?> <a href="https://platform.openai.com/account/api-keys" target="_blank"><?php esc_html_e( 'here', 'ai-addons' ); ?></a> 
										</div>
									</div>
									<div class="inc-settings-wrap">
										<div class="inc-settings-header d-flex">										
											<label><?php esc_html_e( 'OpenAI Model', 'ai-addons' ) ?></label>
										</div>
										<?php 
											$aiea_models = [ 'text-davinci-003' => 'text-davinci-003', 'gpt-3.5-turbo' => 'gpt-3.5-turbo' ];
										?>
										<div class="inc-settings-info-wrap">
											<select name="aiea_options[openai-model]">
											<?php
											foreach( $aiea_models as $key => $value ) {
												echo '<option value="'. esc_attr( $key ) .'" '. selected( $openaiea_model, $key ) .'>'. esc_html( $value ) .'</option>';
											}
											?>
											</select>
										</div>
									</div>
								</div>
							</form>
						
						</div>
						
						<div id="inc-others" class="inc-tab-content-inner ai-settings-tab">
							<div class="inc-banner">
								<div class="inc-row">
									<div class="inc-col-5">
										<div class="inc-banner-content text-left">
											<h2 class="inc-banner-title banner-title-md"><?php esc_html_e( 'Go Pro with', 'ai-addons' ); ?> <span class="inc-highlight-text"><?php esc_html_e( 'AI', 'ai-addons' ); ?></span> <?php esc_html_e( 'Addons Pro', 'ai-addons' ); ?></h2>
											<p class="inc-banner-description"><?php esc_html_e( 'Elevate Your Website\'s Functionality with GO Pro by AI Addons Pro. Get high-quality websites in a fraction of time', 'ai-addons' ); ?></p>
											<a class="inc-admin-btn inc-gradient-btn inc-animate-icon-btn" href="https://aiaddons.ai/pricing/" target="_blank"><span><?php esc_html_e( 'Upgrade to Pro', 'ai-addons' ); ?></span><span class="bi bi-cart"></span><span class="bi bi-cart-fill"></span></a>
										</div>
									</div>
									<div class="inc-col-6">
										<div class="icn-banner-img-wrap">
											<img class="inc-banner-img" src="<?php echo esc_url( AIEA_URL . 'core/admin/assets/img/banner.jpg' ); ?>" alt="AI Addons Pro" />
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>	
				</div>
			</div> <!-- .row -->
		</div> <!-- .container -->
	</div> <!-- .inc-settings-tabs -->
	<?php
}