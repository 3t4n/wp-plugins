<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       mhstudio.org
 * @since      1.0.0
 *
 * @package    MHS_Hubspotform
 * @subpackage MHS_Hubspotform/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    MHS_Hubspotform
 * @subpackage MHS_Hubspotform/admin
 * @author     Mayank Kapahi <mayank.capricon@gmail.com>
 */
class MHS_Hubspotform_Admin {

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
		 * defined in MHS_Hubspotform_Admin as all of the hooks are defined
		 * in that particular class.
		 *
		 * The MHS_Hubspotform_Admin will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mhs-hubspotform-admin.css', array(), $this->version, 'all' );

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
		 * defined in MHS_Hubspotform_Admin as all of the hooks are defined
		 * in that particular class.
		 *
		 * The MHS_Hubspotform_Admin will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mhs-hubspotform-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function display_admin_page(){
		add_menu_page(
			'MHS HubSpot',  //$page_title
			'MHS HubSpot', //$menu_title
			'manage_options', //$capability
			'mhs-hubspot-form-admin', //$menu_slug
			array($this,'showPage'), //$function
			'dashicons-editor-expand', //$icon_url
			'3.0' //position number on menu from top
		);
	}

	public function showPage(){
		 include( plugin_dir_path( __FILE__ ) . 'partials/mhs-hubspotform-admin-display.php' );
	}

	/**
	 * Register all related settings of this plugin
	 *
	 * @since  1.0.0
	 */
	public function register_setting() { 
		register_setting('plugin_options', 'plugin_options', 'plugin_options_validate' );
		add_settings_section('main_section', 'Main Settings',  array( $this, 'hubspot_general_options_callback'),  $this->plugin_name);
		add_settings_section('side_section', 'Sidebar Settings',  array( $this, 'hubspot_sidebar_options_callback'),  $this->plugin_name);
		add_settings_field('plugin_textarea_string', 'Hubspot Form id',array( $this, 'setting_textarea_fn'),$this->plugin_name, 'main_section',array('Hubspot Code'));
		add_settings_field('plugin_text_string', 'Trigger Class', array( $this, 'setting_string_fn'), $this->plugin_name, 'main_section',array('Trigger Class'));
		add_settings_field('plugin_text_portal', 'Portal Id', array( $this, 'setting_string_portal'), $this->plugin_name, 'main_section',array('Portal Id'));
		add_settings_field('plugin_title_string', 'Form Title',array( $this, 'setting_title_fn'),$this->plugin_name, 'main_section',array('Form Title'));
		add_settings_field('plugin_checkbox_string', 'Display Social Icons', array( $this, 'setting_string_fn_ck'), $this->plugin_name, 'side_section',array('DisplayCheckbox'));
		add_settings_field('plugin_text_facebook', 'Facebook', array( $this, 'setting_string_fn_f'), $this->plugin_name, 'side_section',array('Facebook'));
		add_settings_field('plugin_text_twitter', 'Twitter', array( $this, 'setting_string_fn_t'), $this->plugin_name, 'side_section',array('Twitter'));
		add_settings_field('plugin_text_instagram', 'Instagram', array( $this, 'setting_string_fn_i'), $this->plugin_name, 'side_section',array('Instagram'));
		add_settings_field('plugin_text_linkedin', 'Linkedin', array( $this, 'setting_string_fn_l'), $this->plugin_name, 'side_section',array('Linkedin'));
		add_settings_field('plugin_text_oc', 'Phone number', array( $this, 'setting_string_oc'), $this->plugin_name, 'side_section',array('PhoneNumber'));
	}

	/* ------------------------------------------------------------------------ *
	 * Section Callbacks
	 * ------------------------------------------------------------------------ */
	 
	public function hubspot_general_options_callback() { 
	    echo '<p>Hubspot Form</p>';
	} // end hubspot_general_options_callback

	public function hubspot_sidebar_options_callback(){
			echo '<p>Sidebar Form</p>';
	}
/* ------------------------------------------------------------------------ *
 * Field Callbacks
 * ------------------------------------------------------------------------ */
	
 	function setting_string_fn($args) {
		$options = get_option('plugin_options'); 
		echo "<input id='plugin_text_string' maxlength='10' minlength='2'  name='plugin_options[text_string]' size='40' type='text' value='{$options['text_string']}' />";
		echo '<p class="description"> Give this class/id to your button/achor to open popup when clicked on them. Use classname with dot e.g .mypopup &amp; id with # e.g #mypopup</p>';
	}

	function setting_string_portal($args){
		$options = get_option('plugin_options');
		$optionport 	= ''; 
		if(isset($options['text_portal'])){
			$optionport = $options['text_portal'];
		}
		echo "<input id='plugin_text_portal' placeholder='Enter your HubSpot Portal Id'  maxlength='10' minlength='2'  name='plugin_options[text_portal]' size='40' type='text' value='".$optionport."' />";	
		
	}

	function setting_title_fn($args){
		$options = get_option('plugin_options');
		$optiontitle	= ''; 
		if(isset($options['title_string'])){
			$optiontitle = $options['title_string'];
		}
		echo "<input id='plugin_title_string' placeholder='Enter your HubSpot Form Title'  maxlength='45' minlength='5'  name='plugin_options[title_string]' size='40' type='text' value='".$optiontitle."' />";		
	}

	function setting_string_fn_f($args) {
		$options = get_option('plugin_options');
		echo "<input id='plugin_text_facebook' placeholder='Enter Facebook URL'  name='plugin_options[text_facebook]' size='40' type='url' value='{$options['text_facebook']}' />";
	}

	function setting_string_fn_t($args) {
		$options = get_option('plugin_options');
		echo "<input id='plugin_text_twitter' placeholder='Enter Twitter URL'  name='plugin_options[text_twitter]' size='40' type='url' value='{$options['text_twitter']}' />";
	}

	function setting_string_fn_ck($args) {

		$options = get_option('plugin_options');
		$option 	= 0;
		if(isset($options['checkbox_string'])){
			$option = $options['checkbox_string'];
		}
		echo "<input id='plugin_checkbox_string' ".checked( $option, 1 , false )." name='plugin_options[checkbox_string]' type='checkbox'  value='1' />";
	}

	function setting_string_oc($args){
        $options = get_option('plugin_options');
        $opcolor='';
        if(isset($options['text_oc'])){
        $opcolor = $options['text_oc'];
        }
        echo "<input id='plugin_text_oc' pattern='^[0-9\-\+\s\(\)]*$' placeholder='Enter phone no'  name='plugin_options[text_oc]'   type='tel' value='".$opcolor."' />";
        echo '<p class="description">Enter India phone no,+91-11 262564</p>';
    }

	function setting_string_fn_l($args) {
		$options = get_option('plugin_options');
		echo "<input id='plugin_text_linkedin' placeholder='Enter Linkedin URL'  name='plugin_options[text_linkedin]' size='40' type='url' value='{$options['text_linkedin']}' />";
	}

	function setting_string_fn_i($args) {
		$options = get_option('plugin_options');
		echo "<input id='plugin_text_instagram' placeholder='Enter Instagram URL'  name='plugin_options[text_instagram]' size='40' type='url' value='{$options['text_instagram']}' />";
	}

	// TEXTAREA - Name: plugin_options[text_area]
	function setting_textarea_fn($args) {
		$options = get_option('plugin_options');
			echo "<input id='plugin_textarea_string' placeholder='Enter your HubSpot Form id' required name='plugin_options[text_area]' size='40' type='text' value='{$options['text_area']}' />";
	}
 
	
	// Validate user data for some/all of your input fields
	function plugin_options_validate($input) {
		// Check our textbox option field contains no HTML tags - if so strip them out
		$input['text_string'] =  sanitize_text_field(wp_filter_nohtml_kses($input['text_string']));	
		return $input; // return validated input
	}

    /**
	 * Plugin Settings Link on plugin page
	 *
	 * @since 		1.0.0
	 * @return 		mixed 			The settings field
	 */
	public function add_settings_link( $links ) {

		$mylinks = array(
			'<a href="' . admin_url( 'admin.php?page=mhs-hubspot-form-admin' ) . '">Settings</a>',
		);
		return array_merge( $links, $mylinks );
	}

}
