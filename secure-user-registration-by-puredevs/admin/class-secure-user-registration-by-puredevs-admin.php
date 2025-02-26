<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://puredevs.com
 * @since      1.0.0
 *
 * @package    Secure_User_Registration_by_PureDevs
 * @subpackage Secure_User_Registration_by_PureDevs/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Secure_User_Registration_by_PureDevs
 * @subpackage Secure_User_Registration_by_PureDevs/admin
 * @author     puredevs <admin@puredevs.com>
 */
class Pdsrw_Secure_User_Registration_by_PureDevs_Admin {

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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/secure-user-registration-by-puredevs-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/secure-user-registration-by-puredevs-admin.js', array( 'jquery' ), $this->version, false );
	}
	
	/**
	 * Add plugin settings page for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function pdsrw_safe_registration_settings_page() {
		
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Secure_User_Registration_by_PureDevs as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Secure_User_Registration_by_PureDevs will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		add_menu_page( esc_html__('Secure Registration', 'secure-user-registration-by-puredevs'), esc_html__('Secure Registration', 'secure-user-registration-by-puredevs'), 'manage_options', $this->plugin_name.'-settings', array($this,'pdsrw_safe_registration_admin_page_html'), 'dashicons-privacy',50 );

	}
	
	/**
	 * Create admin settings page.
	 *
	 * @since    1.0.0
	 */
	public function pdsrw_safe_registration_admin_page_html(){
		
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		
		// show message when updated
		if ( isset( $_GET['settings-updated'] ) ) {
			add_settings_error( 'pdsrw_messages', 'pdsrw_message', esc_html__( 'Settings Saved', 'secure-user-registration-by-puredevs' ), 'success' );
		}
	 
		// show error/update messages
		settings_errors( 'pdsrw_message' );
		
        ?>
		<div class="wrap" style="position:relative">
			
			<?php  
                $active_tab = isset( $_GET[ 'tab' ] ) ? sanitize_text_field( wp_unslash( $_GET[ 'tab' ] ) ) : 'settings';  
				$nav_setting_tab_active = '';
				if($active_tab == 'settings'){
					$nav_setting_tab_active = 'nav-tab-active';
				}
			?>  
			<h2 class="nav-tab-wrapper">  
				<a href="?page=<?php echo esc_attr($this->plugin_name).'-settings';?>&tab=settings" class="nav-tab <?php echo esc_attr($nav_setting_tab_active); ?>"><?php esc_html_e( 'Settings', 'secure-user-registration-by-puredevs' ); ?></a>  
			</h2>  
			 
		    <form method="post" action="options.php" class="<?php echo esc_attr($this->plugin_name); ?>_form">
		        <?php
				if( $active_tab == 'settings' ) {
					settings_fields( $this->plugin_name.'-setting' ); // $option_group( A settings group name. This must match the group name used in register_setting(), which is the page slug name on which the form is to appear. ). To display the hidden fields and handle security of your options form
					do_settings_sections( $this->plugin_name.'-setting' ); // $page The slug name of the page whose settings sections you want to output. This should match the page name used in add_settings_section(). 
				}
				submit_button();
				?>
		    </form>
			
		</div>
		<?php
    }
	
	/**
	 *  Function that fills the section with the desired content. The function should echo its output.
	 *
	 * @since    1.0.0
	 */
	public function pdsrw_safe_registration_settings_section_info() {
		echo '<p>'.esc_html_e( 'Secure Registration General Settings', 'secure-user-registration-by-puredevs' ).'</p>';
	}
	
	/**
	 *  Function that fills the section with the desired content. The function should echo its output.
	 *
	 * @since    1.0.0
	 */
	public function pdsrw_safe_registration_google_captcha_section_info() {
		echo '<p>'.esc_html_e( 'Google Captcha Settings', 'secure-user-registration-by-puredevs' ).'</p>';
	}
	
	/**
	 *  Function that fills the section with the desired content. The function should echo its output.
	 *
	 * @since    1.0.0
	 */
	public function pdsrw_safe_registration_error_messages_section_info() {
		echo '<p>'.esc_html_e( 'Messages when error occurs', 'secure-user-registration-by-puredevs' ).'</p>';
	}
	
	/**
	 * Generate option page settings sections and fields.
	 *
	 * @since    1.0.0
	 */
	public function pdsrw_safe_registration_settings_fields(){
        add_settings_section(
			$this->plugin_name.'_setting_section', // $id - String for use in the 'id' attribute of tags.
			esc_html__( 'General Settings', 'secure-user-registration-by-puredevs' ), // $title - Title of the section.
			array($this, 'pdsrw_safe_registration_settings_section_info'), // Function that fills the section with the desired content. The function should echo its output.
			$this->plugin_name.'-setting' // $page - The type of settings page on which to show the section (general, reading, writing, media etc.)
		);
		
		//$_protect_registration = $this->plugin_name.'_protect_registration';
		$pdsrw_protect_registration = 'pdsrw_protect_registration';
		$protect_options = array(
			'registrationfrm' => esc_html__( 'Protect user Registration', 'secure-user-registration-by-puredevs' ),
			'wooocommerceregistrationfrm' => esc_html__( 'Protect WooCommerce user Registration', 'secure-user-registration-by-puredevs' ),
		);
		add_settings_field( //You MUST register any options you use with add_settings_field() or they won't be saved and updated automatically. 
		    $pdsrw_protect_registration, // $id - String for use in the 'id' attribute of tags.
			esc_html__( 'Enable', 'secure-user-registration-by-puredevs' ), // Title of the field.
		    array($this, 'pdsrw_create_multi_checkbox_input'), //callback function for checkbox input
		    $this->plugin_name.'-setting', //settings page on which to show the field 
		    $this->plugin_name.'_setting_section',// The section of the settings page in which to show the box
			array( // The array of arguments to pass to the callback.
				'type'         => 'checkbox',
				"id"           => $pdsrw_protect_registration,
				"value"           => $protect_options,
				"default"           => 'registrationfrm',
            )
		);
		
		$pdsrw_enable_nonce = 'pdsrw_enable_nonce';
		add_settings_field( //You MUST register any options you use with add_settings_field() or they won't be saved and updated automatically. 
		    $pdsrw_enable_nonce, // $id - String for use in the 'id' attribute of tags.
			esc_html__( 'Enable Nonce', 'secure-user-registration-by-puredevs' ), // Title of the field.
		    array($this, 'pdsrw_create_checkbox_field'), //callback function for text input
		    $this->plugin_name.'-setting', //settings page on which to show the field 
		    $this->plugin_name.'_setting_section',// The section of the settings page in which to show the box
			array( // The array of arguments to pass to the callback.
				'type'         => 'checkbox',
				"id"           => $pdsrw_enable_nonce,
				'desc'  => esc_html__( 'Enable/Disable custom nonce field for registration form', 'secure-user-registration-by-puredevs' ),
            )
		);
		
		$pdsrw_domain_block_list = 'pdsrw_domain_block_list';
		add_settings_field( //You MUST register any options you use with add_settings_field() or they won't be saved and updated automatically. 
		    $pdsrw_domain_block_list, // $id - String for use in the 'id' attribute of tags.
			esc_html__( 'Email/Domain Blocklist', 'secure-user-registration-by-puredevs' ), // Title of the field.
		    array($this, 'pdsrw_create_input_field'), //callback function for text input
		    $this->plugin_name.'-setting', //settings page on which to show the field 
		    $this->plugin_name.'_setting_section',// The section of the settings page in which to show the box
			array( // The array of arguments to pass to the callback.
				'type'         => 'text',
				"id"           => $pdsrw_domain_block_list,
				'desc'  => esc_html__( 'Use Comma as a separator,*@example.tld to block a domain.', 'secure-user-registration-by-puredevs' ),
				'class'  => 'widefat',
            )
		);
		
		add_settings_section(
			$this->plugin_name.'_captcha_section', // $id - String for use in the 'id' attribute of tags.
			esc_html__( 'Google Captcha', 'secure-user-registration-by-puredevs' ), // $title - Title of the section.
			array($this, 'pdsrw_safe_registration_google_captcha_section_info'), // Function that fills the section with the desired content. The function should echo its output.
			$this->plugin_name.'-setting' // $page - The type of settings page on which to show the section (general, reading, writing, media etc.)
		);
		
		$pdsrw_enable_captcha = 'pdsrw_enable_captcha';
		add_settings_field( //You MUST register any options you use with add_settings_field() or they won't be saved and updated automatically. 
		    $pdsrw_enable_captcha, // $id - String for use in the 'id' attribute of tags.
			esc_html__( 'Enable Captcha', 'secure-user-registration-by-puredevs' ), // Title of the field.
		    array($this, 'pdsrw_create_checkbox_field'), //callback function for text input
		    $this->plugin_name.'-setting', //settings page on which to show the field 
		    $this->plugin_name.'_captcha_section',// The section of the settings page in which to show the box
			array( // The array of arguments to pass to the callback.
				'type'         => 'checkbox',
				"id"           => $pdsrw_enable_captcha,
				'desc'  => esc_html__( 'Enable/Disable Google Captcha field for registration form', 'secure-user-registration-by-puredevs' ),
            )
		);
		
		$pdsrw_site_key = 'pdsrw_site_key';
		add_settings_field( //You MUST register any options you use with add_settings_field() or they won't be saved and updated automatically. 
		    $pdsrw_site_key, // $id - String for use in the 'id' attribute of tags.
			esc_html__( 'Site Key', 'secure-user-registration-by-puredevs' ), // Title of the field.
		    array($this, 'pdsrw_create_input_field'), //callback function for text input
		    $this->plugin_name.'-setting', //settings page on which to show the field 
		    $this->plugin_name.'_captcha_section',// The section of the settings page in which to show the box
			array( // The array of arguments to pass to the callback.
				'type'         => 'text',
				"id"           => $pdsrw_site_key,
				'desc'  => 'Enter your Site Key here. You can get Site Key from <a href="https://developers.google.com/recaptcha" target="_blank">here</a>.',
				'class'  => 'widefat',
            )
		);
		
		$pdsrw_secret_key = 'pdsrw_secret_key';
		add_settings_field( //You MUST register any options you use with add_settings_field() or they won't be saved and updated automatically. 
		    $pdsrw_secret_key, // $id - String for use in the 'id' attribute of tags.
			esc_html__( 'Secret Key', 'secure-user-registration-by-puredevs' ), // Title of the field.
		    array($this, 'pdsrw_create_input_field'), //callback function for text input
		    $this->plugin_name.'-setting', //settings page on which to show the field 
		    $this->plugin_name.'_captcha_section',// The section of the settings page in which to show the box
			array( // The array of arguments to pass to the callback.
				'type'         => 'text',
				"id"           => $pdsrw_secret_key,
				'desc'  => 'Enter your Secret Key here. You can get Secret Key from <a href="https://developers.google.com/recaptcha" target="_blank">here</a>.',
				'class'  => 'widefat',
            )
		);
		
		add_settings_section(
			$this->plugin_name.'_error_message_section', // $id - String for use in the 'id' attribute of tags.
			esc_html__( 'Error Messages', 'secure-user-registration-by-puredevs' ), // $title - Title of the section.
			array($this, 'pdsrw_safe_registration_error_messages_section_info'), // Function that fills the section with the desired content. The function should echo its output.
			$this->plugin_name.'-setting' // $page - The type of settings page on which to show the section (general, reading, writing, media etc.)
		);
		
		$pdsrw_invalid_nonce = 'pdsrw_invalid_nonce';
		add_settings_field( //You MUST register any options you use with add_settings_field() or they won't be saved and updated automatically. 
		    $pdsrw_invalid_nonce, // $id - String for use in the 'id' attribute of tags.
			esc_html__( 'Invalid nonce error message', 'secure-user-registration-by-puredevs' ), // Title of the field.
		    array($this, 'pdsrw_create_input_field'), //callback function for text input
		    $this->plugin_name.'-setting', //settings page on which to show the field 
		    $this->plugin_name.'_error_message_section',// The section of the settings page in which to show the box
			array( // The array of arguments to pass to the callback.
				'type'         => 'text',
				"id"           => $pdsrw_invalid_nonce,
				'class'  => 'widefat',
				'default'  => esc_html__( 'Invalid nonce.', 'secure-user-registration-by-puredevs' ),
            )
		);
		
		$pdsrw_blocklist_error_message = 'pdsrw_blocklist_error_message';
		add_settings_field( //You MUST register any options you use with add_settings_field() or they won't be saved and updated automatically. 
		    $pdsrw_blocklist_error_message, // $id - String for use in the 'id' attribute of tags.
			esc_html__( 'Email/Domain blocklist error message', 'secure-user-registration-by-puredevs' ), // Title of the field.
		    array($this, 'pdsrw_create_input_field'), //callback function for text input
		    $this->plugin_name.'-setting', //settings page on which to show the field 
		    $this->plugin_name.'_error_message_section',// The section of the settings page in which to show the box
			array( // The array of arguments to pass to the callback.
				'type'         => 'text',
				"id"           => $pdsrw_blocklist_error_message,
				'class'  => 'widefat',
				'default'  => esc_html__( 'Your email not allowed from registration! Try using another email address.', 'secure-user-registration-by-puredevs' ),
            )
		);
		
		$pdsrw_captcha_error_message = 'pdsrw_captcha_error_message';
		add_settings_field( //You MUST register any options you use with add_settings_field() or they won't be saved and updated automatically. 
		    $pdsrw_captcha_error_message, // $id - String for use in the 'id' attribute of tags.
			esc_html__( 'Captcha error message', 'secure-user-registration-by-puredevs' ), // Title of the field.
		    array($this, 'pdsrw_create_input_field'), //callback function for text input
		    $this->plugin_name.'-setting', //settings page on which to show the field 
		    $this->plugin_name.'_error_message_section',// The section of the settings page in which to show the box
			array( // The array of arguments to pass to the callback.
				'type'         => 'text',
				"id"           => $pdsrw_captcha_error_message,
				'class'  => 'widefat',
				'default'  => esc_html__( 'Google captcha error! Please try again.', 'secure-user-registration-by-puredevs' ),
            )
		);
		
		register_setting( $this->plugin_name.'-setting', $pdsrw_protect_registration, array('sanitize_callback' =>  array( $this, 'pdsrw_sanitize_protect_registration_callback')));
		register_setting( $this->plugin_name.'-setting', $pdsrw_enable_nonce, array('sanitize_callback' =>  array( $this, 'pdsrw_sanitize_text_input_callback')) );
		register_setting( $this->plugin_name.'-setting', $pdsrw_domain_block_list, array('sanitize_callback' =>  array( $this, 'pdsrw_sanitize_text_input_callback')) );
		register_setting( $this->plugin_name.'-setting', $pdsrw_enable_captcha, array('sanitize_callback' =>  array( $this, 'pdsrw_sanitize_text_input_callback')) );
		register_setting( $this->plugin_name.'-setting', $pdsrw_site_key, array('sanitize_callback' =>  array( $this, 'pdsrw_sanitize_text_input_callback')) );
		register_setting( $this->plugin_name.'-setting', $pdsrw_secret_key, array('sanitize_callback' =>  array( $this, 'pdsrw_sanitize_text_input_callback')) );
		register_setting( $this->plugin_name.'-setting', $pdsrw_invalid_nonce, array('sanitize_callback' =>  array( $this, 'pdsrw_sanitize_text_input_callback')) );
		register_setting( $this->plugin_name.'-setting', $pdsrw_blocklist_error_message, array('sanitize_callback' =>  array( $this, 'pdsrw_sanitize_text_input_callback')) );
		register_setting( $this->plugin_name.'-setting', $pdsrw_captcha_error_message, array('sanitize_callback' =>  array( $this, 'pdsrw_sanitize_text_input_callback')) );
    }
	
	/**
	 * Sanitize array input.
	 *
	 * @since    1.0.0
	 */
	
	public function pdsrw_sanitize_protect_registration_callback($input) {
		if(!empty($input)){
			$input = array_map('sanitize_text_field', $input);
		}
		return $input;
	}
	
	/**
	 * Sanitize text input.
	 *
	 * @since    1.0.0
	 */
	
	public function pdsrw_sanitize_text_input_callback($input) {
		return sanitize_text_field($input);
	}
	
	/**
	 * Function that fills the field with the desired inputs as part of the larger form. Name and id of the input should match the $id given to this function. The function should echo its output.
	 *
	 * @since    1.0.0
	 */
	public function pdsrw_create_input_field($args) {

		if(isset($args["default"])) {
			$default = $args["default"];
		}else{
			$default = false;
		}
		
		echo '<input type="'  . esc_attr($args["type"]) . '" class="'  . esc_attr($args["class"]) . '" id="'  . esc_attr($args["id"]) . '" name="'  . esc_attr($args["id"]) . '" value="' . esc_attr( get_option($args["id"], $default) ) . '" />';
		if(isset($args["desc"]) && !empty($args["desc"])) {
			echo "<p class='description'>".wp_kses_post($args["desc"])."</p>";
		}
		
	}
	
	/**
	 * Function that fills the field with the desired inputs as part of the larger form. Name and id of the input should match the $id given to this function. The function should echo its output.
	 *
	 * @since    1.0.0
	 */
	public function pdsrw_create_checkbox_field($args){
		$value = (get_option($args['id'])) ? get_option($args['id']) : '';
		$html = '';
		$checked = ( isset( $value ) && $value == 'yes' ) ? 'checked="checked"' : '';
		$html .= '<input type="'  . esc_attr($args["type"]) . '" name="'  . esc_attr($args["id"]) . '" value="'.esc_attr('yes').'" '.$checked.'/>';
		if($args["desc"]) {
		    $html .= '<p class="description">'.esc_html($args["desc"]).'</p>';
		}
		echo wp_kses_post($html);
	}
	
	/**
	 * Function that fills the field with the desired inputs as part of the larger form. Name and id of the input should match the $id given to this function. The function should echo its output.
	 *
	 * @since    1.0.0
	 */
	public function pdsrw_create_multi_checkbox_input($args){
		
		if(isset($args["default"])) {
			$default = $args["default"];
		}else{
			$default = false;
		}
		
		$_options = ( $args['value'] ) ? $args['value'] : array();
		$option_val = (get_option($args['id'])) ? get_option($args['id']) : array($default);
		$html = '';
		if(!empty($_options)){
			foreach($_options as $key => $value):
				$checked = in_array($key, $option_val) ? 'checked="checked"' : '';
				$html .= '<input type="checkbox" name="'  . esc_attr($args["id"]) . '[]" value="'.esc_attr($key).'" '.$checked.'/> '.esc_html(ucfirst($value)).'&nbsp;&nbsp;<br/>';
			endforeach;
		}
		if(isset($args["desc"]) && !empty($args["desc"])) {
		    $html .= '<p class="description">'.esc_html($args["desc"]).'</p>';
		}
		
		echo wp_kses_post($html);
	}
	
	/**
	 *  Function kses allowed html tags.
	 *
	 * @since    1.0.0
	 */
	public function pdsrw_kses_allowed_html_tags() {
		global $current_screen;
		if(!empty($current_screen)){
		    $current_page = get_current_screen()->base;
			if(isset($current_page) && $current_page == 'toplevel_page_secure-user-registration-by-puredevs-settings'){
				global $allowedposttags;
				$allowed_atts = array(
					'class'      => array(),
					'type'       => array(),
					'id'         => array(),
					'style'      => array(),
					'value'      => array(),
					'name'       => array(),
					'width'      => array(),
					'height'     => array(),
					'title'      => array(),
					'checked'    => array(),
				);
				$allowedposttags['input']    = $allowed_atts;
			}
		}
	}

}
