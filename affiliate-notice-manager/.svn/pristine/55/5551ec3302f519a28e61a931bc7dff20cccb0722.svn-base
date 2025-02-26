<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wppathfinder.com
 * @since      1.0.0
 *
 * @package    Affiliate_Notice_Manager
 * @subpackage Affiliate_Notice_Manager/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Affiliate_Notice_Manager
 * @subpackage Affiliate_Notice_Manager/admin
 * @author     Nira Rahman <dragwpofficial@gmail.com>
 */
class Affiliate_Notice_Manager_Admin {

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
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Affiliate_Notice_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Affiliate_Notice_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/affiliate-notice-manager-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Affiliate_Notice_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Affiliate_Notice_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/affiliate-notice-manager-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function admin_menu_pages_fn(){
		add_menu_page("Affiliate Notice Manager","Affiliate Notice Manager","manage_options","affiliate-notice-settings",array($this,"affiliate_notice_settings_fn"),"dashicons-text",80);

		add_submenu_page("affiliate-notice-settings","Settings","Settings","manage_options","affiliate-notice-settings",array($this,"affiliate_notice_settings_fn"));

		add_submenu_page("affiliate-notice-settings","Support","Support","manage_options","affiliate-notice-support",array($this,"affiliate_notice_support_fn"));
	}


	public function affiliate_notice_settings_fn(){
		
		ob_start(); // Starting Buffer
		$this->options = get_option('affiliate_manager_options');
		include_once(AFFILIATE_NOTICE_MANAGER_PATH.'admin/partials/tmpl-notice-manager-settings.php');

		echo ob_get_clean(); // Closing and cleaning contents
		
	}

	public function affiliate_notice_support_fn(){

		ob_start(); // Starting Buffer
		$this->options = get_option('affiliate_manager_options');
		include_once(AFFILIATE_NOTICE_MANAGER_PATH.'admin/partials/tmpl-affiliate-notice-manager-support.php');

		echo ob_get_clean(); // Closing and cleaning contents

	}

	public function register_setting_section_option_fn(){
		/**
		 * Register Setting of Do_settings in tmpl-notice-manager-settings.php page
		 */
		register_setting('affiliate_notice_manager_settings_field', 'affiliate_manager_options', array($this,'sanitize'));

		/**
		 * Add Section in Settings Page
		 */
		add_settings_section('affiliate_notice_manager_main_section', 'Main Settings', array($this,'affiliate_notice_manager_main_section_fn'), 'affiliate_notice_manager_setting_section');

		/**
		 * Add Prefix
		 */

		add_settings_field('affiliate_notice_manager_prefix', 'Notice Prefix', array($this,'affiliate_notice_manager_prefix_fn'), 'affiliate_notice_manager_setting_section','affiliate_notice_manager_main_section');

		/**
		 * Add Notice Textarea
		 */

		add_settings_field('affiliate_notice_manager_notice', 'Add Your Notice', array($this,'affiliate_notice_manager_notice_fn'), 'affiliate_notice_manager_setting_section','affiliate_notice_manager_main_section');

		/**
		 * Display Settings
		 */

		add_settings_field('affiliate_notice_manager_display', 'Display Notice', array($this,'affiliate_notice_manager_display_fn'), 'affiliate_notice_manager_setting_section','affiliate_notice_manager_main_section');

	}

	public function affiliate_notice_manager_main_section_fn(){
		esc_html_e("Affiliate Notice Manager Settings", 'affiliate-notice-manager'); 
	}

	/**
	 * Notice Manager Prefix Function
	 */
	public function affiliate_notice_manager_prefix_fn(){

		printf('<input type="text" id="notice_manager_prefix" placeholder="Disclosure:" name="affiliate_manager_options[notice_manager_prefix]" value="%s" >',isset($this->options['notice_manager_prefix']) ? esc_attr($this->options['notice_manager_prefix']) : ''
        );
       		
    }

	/**
	 * Notice Manager Notice Function
	 */
	public function affiliate_notice_manager_notice_fn(){
        
		printf( "<textarea id='notice_manager_your_notice' placeholder='%s' name='affiliate_manager_options[notice_manager_your_notice]' value='%s' rows='7' cols='50' type='textarea'>{$this->options['notice_manager_your_notice']}</textarea>",'Add Your Notice or Disclosure Here...',$this->options['notice_manager_your_notice']);
		
    }

	/**
	 * Notice Manager Display Function
	 */
	public function affiliate_notice_manager_display_fn(){
        
		printf(
            '<input type="checkbox" name="affiliate_manager_options[affiliate_notice_manager_notice_display]" id="affiliate_notice_manager_notice_display" value="1"'. checked(1,$this->options['affiliate_notice_manager_notice_display'],false).'/>',isset($this->options['affiliate_notice_manager_notice_display']) ? esc_attr($this->options['affiliate_notice_manager_notice_display']) : ''
        ); 
		
    }

	public function sanitize($input){

        $new_input = array();
        
        if( isset( $input['notice_manager_your_notice'] ) ){
            $new_input['notice_manager_your_notice'] = sanitize_text_field( $input['notice_manager_your_notice'] );
        }
		
		if( isset( $input['notice_manager_prefix'] ) ){
            $new_input['notice_manager_prefix'] = sanitize_text_field( $input['notice_manager_prefix'] );
        }
		
		if( isset( $input['affiliate_notice_manager_notice_display'] ) ){
            $new_input['affiliate_notice_manager_notice_display'] = absint( $input['affiliate_notice_manager_notice_display'] );
        }
		
        return $new_input;
    }

}
