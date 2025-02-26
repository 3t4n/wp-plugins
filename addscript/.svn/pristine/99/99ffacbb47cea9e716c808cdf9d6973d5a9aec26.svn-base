<?php

/*
 * Admin class.
 * 
 * Method and property for admin section.
 * 
 * @since 1.0
 * 
 */

namespace Addscript;

class Admin extends \Addscript\Base {
	
	/**
     * Page title on the backend.
	 * The page title is visible when we click on menu label
	 * 
	 * @since 1.0
	 * 
     * @return string
     */
	private $_page_title = 'Addscript - Impostazioni';
	
	/**
     * Priority.
	 * Where the menu need to display
	 * 
	 * @since 1.0
	 * 
     * @return string
     */
	private $_priority_on_menu = 90;
	
	
	/**
     * Menu label on the backend.
	 * The page title is visible when we click on menu label
	 * 
	 * @since 1.0
	 * 
     * @return string
     */
	private $_menu_label = 'AddScript';
	
	/**
     * Slug for the admin
	 * 
	 * @since 1.0
	 * 
     * @return string
     */
	private $_slug;
	
	/**
     * Settings group for form
	 * 
	 * @since 1.0
	 * 
     * @return string
     */
	private $_option_group;
	
	/*
	 * Our constructor.
	 * 
	 * Accept the base_dir of the plugin (see simplestform.php)
	 * 
	 * @since 1.0
	 * 
	 */
	 
	 public function __construct($base_dir = null) {
	 	
		parent::__construct();
		
		if ( !is_null ( $base_dir ) ) {
			
			/*
			 * Call Base function to set the base dir
			 */
			
			$this->set_base_dir($base_dir);
			
		}
		
		/*
		 * Create the slug
		 * 
		 */
		
		$this->_slug = strtolower ( $this->get_plugin_name() ).'-settings';
		
		/*
		 * Create the option_group
		 * 
		 */
		
		$this->_option_group = $this->get_prefix() .'_settings_group';
		
		
		/*
		 * Initialize the backend
		 */
		
		$this->create_admin_settings_menu();
		
		/*
		 * Register the settings.
		 * See: https://codex.wordpress.org/Creating_Options_Pages
		 */
		
		$this->register_settings();
		
		/*
		 * Regiter custom post.
		 * 
		 */
		
	 }
	 
	 /**
     * Register the settings.
	 * See: https://codex.wordpress.org/Creating_Options_Pages
	 * 
	 * @since 1.0 
     */
     
     private function register_settings() {
     
	 	if ( is_admin() ) {
	 	
			add_action( 'admin_init' , array ( $this , 'callback_register_settings'));
			
		}
	 	
	 }
	 
	 /**
	  * Callback from register_settings
	  * 
	  * @since 1.0
	  * 
	  */
	  
	public function callback_register_settings() {
	  	
		// get the array with form names
		foreach ( $this->get_array_admin_key_form() as $key => $value ) {
			
			register_setting( $this->get_option_group(), $value , array ( $this , 'callback_register_settings_remove_spaces' ) );
			
		}
		
	}
	
	/**
	  * Callback from callback_register_settings
	  * Remove all spaces and blank lines
	  * 
	  * @since 1.0
	  * 
	  */
	  
	public function callback_register_settings_remove_spaces( $input ) {
		
		// New Input
		$new_input = array();
		$new_input = $input;
    	
    	// Sanitize the input actually
    	$new_input = preg_replace("/\s+/", " ", $new_input);
    	
		// Sanitize the input actually
		$new_input = str_replace(" " , "" , $new_input);
		
    	return $new_input;
		
	}
	
	 
	 /**
     * Create the page for the admin settings in backend
	 * Add also a filter to order the posts
	 * 
	 * @since 1.0
	 * 
     */
	 
	 private function create_admin_settings_menu() {
	 	
		/** Step 2 (from text above). HOOK, @FUNCTION */
		add_action( 'admin_menu' , array ( $this , 'add_admin_menu' ) );
		
	 }
	 
	 /**
	  * Add the admin menu.
	  * Called from create_admin_settings_menu
	  * 
	  * @since 1.0
	  * 
	  */
	 
	 public function add_admin_menu() {
	 	
		$page_title = __( $this->_page_title , $this->get_language_domain() );
		$menu_title = __( $this->_menu_label , $this->get_language_domain() ); // The label visible in the menu tree
		$capable_option = 'manage_options'; // permission needed
		$slug = $this->_slug;
		$function_callback = array ( $this , 'callback_load_admin_settings_page' );
		$icon = 'dashicons-admin-tools';
		$priority = $this->_priority_on_menu;
		$parent_slug = 'options-general.php';
				
		//add_menu_page( $page_title , $menu_title , $capable_option , $slug , $function_callback , $icon , $priority  );
		
		add_submenu_page(
							$parent_slug,
							$page_title,
							$menu_title,
							$capable_option,
							$slug,
							$function_callback
						);
		
	 }
	 
	 /**
	  * Callback from add_admin_menu.
	  * Called from create_admin_settings_menu
	  * 
	  * @since 1.0
	  * 
	  */
	  
	public function callback_load_admin_settings_page() {
	  	
		if ( !current_user_can( 'manage_options' ) )  {
				
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		
		}
		
		include_once ( $this->get_base_dir().'/views/admin/settings.php' );
		
	}
	
	
	/**
     * Return slug
	 * 
	 * @return string
	 * 
	 * @since 1.0
	 * 
     */
	protected function get_slug() {
		
		return $this->_slug;
		
	}
	
	/**
     * Return option group
	 * 
	 * @return string
	 * 
	 * @since 1.0
	 * 
     */
	protected function get_option_group() {
		
		return $this->_option_group;
		
	}
	
	
}	