<?php 
/**
 * @package Internals
 */
	//Function to Setup DB Tables
	function git_activate()
	{		
		global $wpdb;
		$table_prefix = $wpdb->prefix;
		$git_input_data = $table_prefix.'git_inputdata';
		$git_form_data = $table_prefix.'git_formdata';
		$git_function = $table_prefix.'git_function';
		$git_shortcode = $table_prefix.'git_shortcode';
		$git_contact_form_data = $table_prefix.'git_contact_form_data';
		$git_session = $table_prefix.'git_session';
		$git_map = $table_prefix.'git_map';

		$git_input_data_table = "CREATE TABLE IF NOT EXISTS $git_input_data(
		Input_Id BIGINT(9) NOT NULL AUTO_INCREMENT,
		Input_Data TEXT(3000) NOT NULL,
		User_IP VARCHAR(300) NOT NULL,  
		Input_Time DATETIME NOT NULL,              
		Form_Id int(9) NOT NULL,   
		Input_Type VARCHAR(300) NOT NULL,   
		Input_Status VARCHAR(30) NOT NULL,              
		Primary Key Input_Id (Input_Id)
		)ENGINE=InnoDB DEFAULT CHARSET=utf8;";

		$wpdb->query($git_input_data_table);		

		$git_form_data_table = "CREATE TABLE IF NOT EXISTS $git_form_data(
		Form_Id INT(9) NOT NULL AUTO_INCREMENT,
		Form_Name VARCHAR(100) NOT NULL,
		Form_Label VARCHAR(100) NOT NULL,
		Form_Data TEXT(3000) NOT NULL,  
		Form_Options TEXT(3000) NOT NULL,
		Mail_Subject VARCHAR(500) NOT NULL,
		Mail_Sender_Name VARCHAR(300) NOT NULL,
		Mail_Sender_Email VARCHAR(300) NOT NULL,
		User_IP VARCHAR(300) NOT NULL,              
		Form_Time DATETIME NOT NULL,   
		Form_Type VARCHAR(100) NOT NULL,   		
		Input_Ids VARCHAR(100) NOT NULL,
		Form_MailData TEXT(3000) NOT NULL,
		Mail_Copy_To_User VARCHAR(100) NOT NULL,		 
		Form_Recipient VARCHAR(1000) NOT NULL,	
		Function_Name VARCHAR(200) NOT NULL,	 
		Shortcode_Name VARCHAR(200) NOT NULL,
		Form_Status VARCHAR(30) NOT NULL,
		Primary Key Form_Id (Form_Id),
		UNIQUE (Function_Name),
		UNIQUE (Shortcode_Name)
		)ENGINE=InnoDB DEFAULT CHARSET=utf8;";
		
		$wpdb->query($git_form_data_table);		

		$git_contact_form_table = "CREATE TABLE IF NOT EXISTS $git_contact_form_data(
		ContactForm_Id INT(9) NOT NULL AUTO_INCREMENT,
		ContactForm_Data TEXT(3000) NOT NULL,	
		User_IP	 VARCHAR(100) NOT NULL,
		ContactForm_Time DATETIME NOT NULL,
		Form_Id INT(9) NOT NULL,
		ContactForm_Type VARCHAR(100) NOT NULL,	
		Form_RatingData TEXT(3000) NOT NULL,	
		ContactForm_Status VARCHAR(30) NOT NULL,
		Primary Key ContactForm_Id (ContactForm_Id)
		)ENGINE=InnoDB DEFAULT CHARSET=utf8;";

		$wpdb->query($git_contact_form_table);		

		/**
		*Include all pages for GIT
		**/
		//Including All Files			
		require_once GITPLUGIN_DIR .'/includes/uninstall.php';		
		require_once GITPLUGIN_DIR .'/includes/shortcode.php';
		require_once GITPLUGIN_DIR .'/includes/data-processing/admin/input_data_post.php';
		require_once GITPLUGIN_DIR .'/includes/data-processing/admin/input_data_get.php';	
		require_once GITPLUGIN_DIR .'/includes/data-processing/admin/forms.php';		
		require_once GITPLUGIN_DIR .'/includes/data-processing/user/forms.php';
		if(!class_exists('phpmailer'))
		{
			require_once GITPLUGIN_DIR .'/includes/data-processing/user/phpmailer.php';
			require_once GITPLUGIN_DIR .'/includes/data-processing/user/phpmailerautoload.php';;
		}

		require_once GITPLUGIN_DIR .'/includes/data-processing/user/send_contact_form_data.php';			
	}

	//Add Main Menu
	function wp_git() 
	{
		add_menu_page('Get In Touch', 'Get In Touch', 'manage_options', 'get-in-touch',
		'git_home_function', plugins_url( 'get-in-touch/img/git.png' ));

		add_submenu_page( 'get-in-touch', 'Dashboard', 'Dashboard', 'manage_options',
		'get-in-touch', 'git_home_function' );
	}
	add_action('admin_menu', 'wp_git');

	// Add Sub Menu Add Form
	add_action('admin_menu', 'git_addform');

	function git_addform() 
	{
		add_submenu_page( 'get-in-touch', 'Create Form', 'Create Form', 'manage_options',
		'create-form', 'git_add_form' ); 
	}

	// Add Sub Menu View All Form
	add_action('admin_menu', 'git_form_list');

	function git_form_list() 
	{
		add_submenu_page( 'get-in-touch', 'View Forms', 'View Forms', 'manage_options',
		'view-forms', 'git_view_forms' ); 
	}

	// Add Sub Menu View All Contact Mail Sended by User
	add_action('admin_menu', 'git_get_contact_form_list');

	function git_get_contact_form_list() 
	{
		add_submenu_page( 'get-in-touch', 'View Contact Mail', 'View Contact Mail', 'manage_options',
		'view-contact-mail', 'git_view_contact_form_submitted' ); 
	}

	// Function to Register Css And Script file	
	add_action( 'admin_footer', 'git_include_script' );
	function git_include_script() 
	{						
		if ( is_admin() ) 
		{
		 	wp_enqueue_script( 'admin-ajax-request', plugins_url( 'get-in-touch/js/git.js' ), array( 'jquery' ) );
			wp_localize_script( 'admin-ajax-request', 'AdminAjax', array( 'ajaxurl' => plugins_url( 'admin-ajax.php' ) ) );
		}				
	}	

	add_action( 'init', 'git_include_script_user' );
	function git_include_script_user()
	{
		if ( ! is_admin() ) 
		{
			wp_enqueue_script( 'user-ajax-request', plugins_url( 'get-in-touch/js/git-user.js' ), array( 'jquery' ) );
			wp_localize_script( 'user-ajax-request', 'UserAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );		
		}		
	}

	add_action( 'admin_enqueue_scripts', 'wptuts_add_color_picker' );
	function wptuts_add_color_picker( $hook ) 
	{
    	if( is_admin() ) {        
        	wp_enqueue_style( 'wp-color-picker' );             
        	wp_enqueue_script( 'custom-script-handle', plugins_url( 'get-in-touch/js/colorpicker.js'), array( 'wp-color-picker' ), false, true );
    	}
	}

	add_action( 'admin_init', 'git_include_style' );
	function git_include_style()
	{
		if ( is_admin() ) 
		{
			wp_enqueue_style( 'git-css',
				plugins_url( 'get-in-touch/css/git.css' ),
				array( 'thickbox' ), GIT_VERSION, 'all' );
		}
	}

	add_action( 'init', 'git_include_style_user' );
	function git_include_style_user()
	{
		if ( ! is_admin() ) 
		{
			wp_enqueue_style( 'git-user-css',
				plugins_url( 'get-in-touch/css/git-user.css' ),
				array( 'thickbox' ), GIT_VERSION, 'all' );
		}
	}
?>