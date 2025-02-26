<?php
if ( ! defined( 'ABSPATH' ) ) exit;

    /**
       * General Settings
       * @author : Allan Empalmado
       * @since : 1.0.0
    */
	class AE_Admin_General_Settings
	{

    	public function __construct( ){
    		add_action( 'admin_init', array( __CLASS__, 'setting_fields' ) , 1000);

	        //Admin Logo Container 
	        add_action('admin_bar_menu', array(__CLASS__, 'ae_add_logo_topbar'), 0.5 );

	        //Footer
	        add_filter( 'update_footer', array(__CLASS__, 'ae_implement_remove_wp_footer_version'), 1000 );
	        add_filter( 'admin_footer_text', array( __CLASS__, 'ae_implement_change_wp_footer_text' ), 10 );

	        //Hide Screen readers and help tab
	        add_filter( 'contextual_help', array( __CLASS__, 'ae_implement_remove_help_tab' ), 1000, 3 );
	        add_filter('screen_options_show_screen', array( __CLASS__, 'ae_implement_remove_screen_option_tab'), 1000, 2 );

	        //Remove Welcome to wordpress widget to dashboard
	        add_action( "wp_dashboard_setup", array( __CLASS__, "ae_implement_remove_welcome_widget"), 1000 );

	        //Remove WP News
	        add_action( "wp_dashboard_setup", array(__CLASS__, "ae_implement_remove_news_widget_dashboard"), 1000 );

	        //Remove Version from scripts
	        add_filter( 'style_loader_src', array( __CLASS__, 'ae_implement_remove_version_scripts' ), 10, 2 );
	        add_filter( 'script_loader_src', array( __CLASS__, 'ae_implement_remove_version_scripts' ), 10, 2 );

	        //Remove Generator Tag
	        add_filter('the_generator',  array(__CLASS__, "ae_implement_remove_wp_generator") , 1000, 1);

    	}


		/**
		* Render General Setting Page
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		*/
    	public static function render_setting_page(){
            settings_fields( 'ae_admin_customizer_options_group' );
            do_settings_sections( 'ae-admin-customizer-general-settings' );
            submit_button();  
    	}

		/**
		* General Settings Fields
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		*/
    	public static function setting_fields(){
	  		/* General Settings */
	        register_setting(
	            'ae_admin_customizer_options_group', 
	            'ae_admin_customizer_options', 
	            array( __CLASS__, 'sanitize' )
	        );

	        add_settings_section(
	            'ae_admin_customizer_general_section',
	            __('General Settings', "ae-admin-customizer"),
	            array( __CLASS__, 'general_setting_info' ), 
	            'ae-admin-customizer-general-settings' 
	        );  

	        add_settings_field(
	            'ae_admin_dashboard_logo_btn',
	            __('Logo', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_admin_dashboard_logo_callback' ), 
	            'ae-admin-customizer-general-settings', 
	            'ae_admin_customizer_general_section'        
	        );   


	        add_settings_field(
	            'ae_admin_remove_wpversion_footer',
	            __('Remove Wordpress Version From Admin Footer', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_admin_remove_wpversion_footer_callback' ), 
	            'ae-admin-customizer-general-settings', 
	            'ae_admin_customizer_general_section'        
	        ); 

	        add_settings_field(
	            'ae_admin_remove_version_scripts',
	            __('Remove Version From Script and Stylesheets (HTML)', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_admin_remove_version_scripts_callback' ), 
	            'ae-admin-customizer-general-settings', 
	            'ae_admin_customizer_general_section'        
	        ); 

	        add_settings_field(
	            'ae_admin_remove_wp_generator',
	            __('Remove Wordpress Generator Tag (HTML/RSS)', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_admin_remove_wp_generator_callback' ), 
	            'ae-admin-customizer-general-settings', 
	            'ae_admin_customizer_general_section'        
	        ); 

	        add_settings_field(
	            'ae_admin_remove_help_tab',
	            __('Remove Help Tab From Admin Pages and Dashboard', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_admin_remove_help_tab_callback' ), 
	            'ae-admin-customizer-general-settings', 
	            'ae_admin_customizer_general_section'        
	        ); 

	        add_settings_field(
	            'ae_admin_remove_screen_option_tab',
	            __('Remove Screen Option Tab',"ae-admin-customizer"),
	            array( __CLASS__, 'ae_admin_remove_screen_option_tab_callback' ), 
	            'ae-admin-customizer-general-settings', 
	            'ae_admin_customizer_general_section'        
	        ); 

	        add_settings_field(
	            'ae_admin_remove_welcome_widget',
	            __('Remove Welcome to Wordpress Dashboard Widget',"ae-admin-customizer"),
	            array( __CLASS__, 'ae_admin_remove_welcome_widget_callback' ), 
	            'ae-admin-customizer-general-settings', 
	            'ae_admin_customizer_general_section'        
	        ); 


	        add_settings_field(
	            'ae_admin_remove_news_widget',
	            __('Remove WP News Admin Dashboard Widget',"ae-admin-customizer"),
	            array( __CLASS__, 'ae_admin_remove_news_widget_callback' ), 
	            'ae-admin-customizer-general-settings', 
	            'ae_admin_customizer_general_section'        
	        ); 


	        add_settings_field(
	            'ae_admin_footer_text', 
	            __('Left Footer Text',"ae-admin-customizer"), 
	            array( __CLASS__, 'ae_admin_footer_text_callback' ), 
	            'ae-admin-customizer-general-settings', 
	            'ae_admin_customizer_general_section'
	        );    
    	}


	    public static function sanitize( $input )
	    {

	    	$new_input = array();
	    	$options = get_option( 'ae_admin_customizer_options' );
	    	
	        if( isset( $input['ae_admin_dashboard_logo'] ) ){
	            $new_input['ae_admin_dashboard_logo'] = sanitize_text_field( $input['ae_admin_dashboard_logo'] );
	        }

	        //Remove WP Version Footer
	        if( isset( $input['ae_admin_remove_wpversion_footer'] ) ){
	            $new_input['ae_admin_remove_wpversion_footer'] = true;
	        }else {
	            delete_option($option["ae_admin_remove_wpversion_footer"]);
	        }

	        //Remove WP Version Scripts
	        if( isset( $input['ae_admin_remove_version_scripts'] ) ){
	            $new_input['ae_admin_remove_version_scripts'] = true;
	        }else {
	        	delete_option($option["ae_admin_remove_version_scripts"]);
	        }

	        //Remove WP Generator Tag
	        if( isset( $input['ae_admin_remove_wp_generator'] ) ){
	            $new_input['ae_admin_remove_wp_generator'] = true;
	        }else {
	        	delete_option($option["ae_admin_remove_wp_generator"]);
	        }


	        //Remove Help Tab
	        if( isset( $input['ae_admin_remove_help_tab'] ) ){
	            $new_input['ae_admin_remove_help_tab'] = true;
	        }else{
	        	delete_option($option["ae_admin_remove_help_tab"]);
	        }

	        //Remove Screen Option Tab
	        if( isset( $input['ae_admin_remove_screen_option_tab'] ) ){
	            $new_input['ae_admin_remove_screen_option_tab'] = true;
	        }else{
	            delete_option($option["ae_admin_remove_screen_option_tab"]);
	        }

	        //Remove Welcome Widget
	        if( isset( $input['ae_admin_remove_welcome_widget'] ) ){
	            $new_input['ae_admin_remove_welcome_widget'] = true;
	        }else{
	        	delete_option($option["ae_admin_remove_welcome_widget"]);
	        }

	        //Remove WP News Widget
	        if( isset( $input['ae_admin_remove_news_widget'] ) ){
	            $new_input['ae_admin_remove_news_widget'] = true;
	        }else{
	            delete_option($option["ae_admin_remove_news_widget"]);
	        }


	        //Custom footer text
	        if( isset( $input['ae_admin_footer_text'] ) ){
	            $new_input['ae_admin_footer_text'] =  wp_kses_post( $input['ae_admin_footer_text'] );
	        }

	        return $new_input;
	    }

	    /** 
	     * General Setting Section Info
	     */
	    public static function general_setting_info()
	    {
	        echo '<p>' . __( 'Upload logo and hide/show wordpress default stuffs.', "ae-admin-customizer" ) . '</p>';
	    }


	    /** 
	     * Admin Dashboard Logo Settings Render
	     * @Since : 1.0.0
	     */
	    public static function ae_admin_dashboard_logo_callback(){
	    		$options = get_option( 'ae_admin_customizer_options' );
	            if( self::ae_has_custom_logo() ){
	                $admin_logo = $options['ae_admin_dashboard_logo'];
	            }else{
	                $admin_logo = plugins_url('/assets/image/no-image.png', AE_ADMIN_CUSTOMIZER_PLUGIN__FILE__ );
	            }

	            echo "<img src='" . $admin_logo . "' style='max-height : 100px;background-color : #aeaeae;' id='ae_admin_dashboard_logo_img'> <br />";
	            echo "<button type='button' class='button button-primary' value='Upload Logo' id='ae_admin_dashboard_logo_btn'>Select Logo</button>";
	            printf(
	                '<input type="hidden" id="ae_admin_dashboard_logo" name="ae_admin_customizer_options[ae_admin_dashboard_logo]" value="%s" />',
	                isset( $options['ae_admin_dashboard_logo'] ) ? esc_attr( $options['ae_admin_dashboard_logo']) : ''
	            );
	        
	    }

	    /*
	        Disable Quicklinks Dropdown on Toolbar Logo
	    */
	    public static function ae_admin_remove_quicklinks_menu_callback(){
	    	$options = get_option( 'ae_admin_customizer_options' );
	        $checked = isset( $options['ae_admin_remove_quicklinks_menu'] ) && $options['ae_admin_remove_quicklinks_menu'] == 1 ? 'checked' : '';
	        echo "<input type='checkbox' name='ae_admin_customizer_options[ae_admin_remove_quicklinks_menu]' id='ae_admin_remove_quicklinks_menu' value='1' " . $checked . ">";
	    }

	    /*
	        Remove WP Version in Admin Footer
	    */
	    public static function ae_admin_remove_wpversion_footer_callback(){
	    	$options = get_option( 'ae_admin_customizer_options' );
	        $checked = isset( $options['ae_admin_remove_wpversion_footer'] ) && $options['ae_admin_remove_wpversion_footer'] == 1 ? 'checked' : '';
	        echo "<input type='checkbox' name='ae_admin_customizer_options[ae_admin_remove_wpversion_footer]' id='ae_admin_remove_wpversion_footer' value='1' " . $checked . ">";
	    }


	    /*
	        Remove Version From Scripts and Stylesheets
	    */
	    public static function ae_admin_remove_version_scripts_callback(){
	    	$options = get_option( 'ae_admin_customizer_options' );
	        $checked = isset( $options['ae_admin_remove_version_scripts'] ) && $options['ae_admin_remove_version_scripts'] == 1 ? 'checked' : '';
	        echo "<input type='checkbox' name='ae_admin_customizer_options[ae_admin_remove_version_scripts]' id='ae_admin_remove_version_scripts' value='1' " . $checked . ">";
	    }

	    /*
	        Remove WP Generator Tag
	    */
	    public static function ae_admin_remove_wp_generator_callback(){
	    	$options = get_option( 'ae_admin_customizer_options' );
	        $checked = isset( $options['ae_admin_remove_wp_generator'] ) && $options['ae_admin_remove_wp_generator'] == 1 ? 'checked' : '';
	        echo "<input type='checkbox' name='ae_admin_customizer_options[ae_admin_remove_wp_generator]' id='ae_admin_remove_wp_generator' value='1' " . $checked . ">";
	    }
	    

	    /*
	        Remove Help Tab
	    */
	    public static function ae_admin_remove_help_tab_callback(){
	    	$options = get_option( 'ae_admin_customizer_options' );
	        $checked = isset( $options['ae_admin_remove_help_tab'] ) && $options['ae_admin_remove_help_tab'] == 1 ? 'checked' : '';
	        echo "<input type='checkbox' name='ae_admin_customizer_options[ae_admin_remove_help_tab]' id='ae_admin_remove_help_tab' value='1' " . $checked . ">";
	    }



	    /*
	        Remove Screen Option Tab
	    */
	    public static function ae_admin_remove_screen_option_tab_callback(){
	    	$options = get_option( 'ae_admin_customizer_options' );
	        $checked = isset( $options['ae_admin_remove_screen_option_tab'] ) && $options['ae_admin_remove_screen_option_tab'] == 1 ? 'checked' : '';
	        echo "<input type='checkbox' name='ae_admin_customizer_options[ae_admin_remove_screen_option_tab]' id='ae_admin_remove_screen_option_tab' value='1' " . $checked . ">";
	    }

	    /*
	        Remove WP Welcome Widget
	    */
	    public static function ae_admin_remove_welcome_widget_callback(){
	    	$options = get_option( 'ae_admin_customizer_options' );
	        $checked = isset( $options['ae_admin_remove_welcome_widget'] ) && $options['ae_admin_remove_welcome_widget'] == 1 ? 'checked' : '';
	        echo "<input type='checkbox' name='ae_admin_customizer_options[ae_admin_remove_welcome_widget]' id='ae_admin_remove_welcome_widget' value='1' " . $checked . ">";
	    }

	    /*
	        Remove WP News Widget
	    */
	    public static function ae_admin_remove_news_widget_callback(){
	    	$options = get_option( 'ae_admin_customizer_options' );
	    	$temp = $options['ae_admin_remove_news_widget'];
	        $checked = isset( $options['ae_admin_remove_news_widget'] ) && $options['ae_admin_remove_news_widget'] == 1 ? 'checked' : '';
	        ?>
	        <input type='checkbox' name='ae_admin_customizer_options[ae_admin_remove_news_widget]' id='ae_admin_remove_news_widget' value='1' <?php checked($temp); ?>>
	        <?php
	    }



	    /** 
	     * Admin Footer Text
	     */
	    public static function ae_admin_footer_text_callback()
	    {
	    	$options = get_option( 'ae_admin_customizer_options' );
	        printf(
	            '<input type="text" id="ae_admin_footer_text" name="ae_admin_customizer_options[ae_admin_footer_text]" value="%s" class="widefat"/>',
	            isset( $options['ae_admin_footer_text'] ) ? esc_attr( $options['ae_admin_footer_text']) : ''
	        );
	    }



	    /* 
	        Add Parent Topbar to include the logo
	    */
	    public static function ae_add_logo_topbar($wp_admin_bar){
	        $options = get_option( 'ae_admin_customizer_options' );

	        if( self::ae_has_custom_logo() )
	        {
	            
	            $args = array(
	                'id'    => 'ae-topbar-logo',
	                'title' => '<img src="' . $options['ae_admin_dashboard_logo'] . '" class="ae-topbar-logo">',
	                'href'  => admin_url("index.php"),
	                'meta'  => array( 'class' => 'ae-admin-topbar-logo' )
	            );

	            //remove wp logo
	            add_action('admin_bar_menu', array(__CLASS__, 'remove_wp_logo_topbar'), 99999 );

	            //add the new logo node
	            $wp_admin_bar->add_node( $args );
	        }
	    }

	    public static function remove_wp_logo_topbar($wp_admin_bar){
	        $wp_admin_bar->remove_node("wp-logo");
	    }

	    //Checks if logo has been set
	    public static function ae_has_custom_logo(){
	    	$options = get_option( 'ae_admin_customizer_options' );
	        if( isset( $options['ae_admin_dashboard_logo'] ) && !empty($options['ae_admin_dashboard_logo']) )
	        {
	            return true;
	        }else{
	            return false;
	        }
	    }

		/* Footer Version */
	    public static function ae_implement_remove_wp_footer_version($ver){
	    	$options = get_option( 'ae_admin_customizer_options' );
	        if(isset($options["ae_admin_remove_wpversion_footer"])){
	            $checked = $options["ae_admin_remove_wpversion_footer"] != null && $options["ae_admin_remove_wpversion_footer"] == 1 ? true : false;

	            if ($checked){
	                return false;
	            }
	        } 

	        return $ver;
	    }

	    /* 
	    * Implement Remove Version from Scripts and Stylesheets
	    */
	    public static function ae_implement_remove_version_scripts($src){
	    	$options = get_option( 'ae_admin_customizer_options' );
	        if(isset($options["ae_admin_remove_version_scripts"])){
	            $checked = $options["ae_admin_remove_version_scripts"] != null && $options["ae_admin_remove_version_scripts"] == 1 ? true : false;

	            if ($checked){
	                $src = remove_query_arg('ver', $src);
	                return $src;
	            }
	        } 

	        return $src;
	    }

	    /*
	        Implement Remove WP Generator Tag
	    */
	    public static function ae_implement_remove_wp_generator($type){
	    	$options = get_option( 'ae_admin_customizer_options' );
	        if(isset($options["ae_admin_remove_wp_generator"])){
	            $checked = $options["ae_admin_remove_wp_generator"] != null && $options["ae_admin_remove_wp_generator"] == 1 ? true : false;

	            if ($checked){
	                return false;
	            }
	        } 
	        return $type;
	    }



	    /* 
	    * Implement Remove Help Tab
	    */
	    public static function ae_implement_remove_help_tab($old_help, $screen_id, $screen){
	    	$options = get_option( 'ae_admin_customizer_options' );
	        if(isset($options["ae_admin_remove_help_tab"])){
	            $checked = $options["ae_admin_remove_help_tab"] != null && $options["ae_admin_remove_help_tab"] == 1 ? true : false;

	            if ($checked){
	                $screen->remove_help_tabs();
	                return $old_help;
	            }
	        } 
	    }

	    /* 
	    * Implement Remove Screen Option Tab
	    */
	    public static function ae_implement_remove_screen_option_tab($display_boolean, $wp_screen_object){
	    	$options = get_option( 'ae_admin_customizer_options' );
	        if(isset($options["ae_admin_remove_screen_option_tab"])){
	            $checked = $options["ae_admin_remove_screen_option_tab"] != null && $options["ae_admin_remove_screen_option_tab"] == 1 ? true : false;

	            if ($checked){
	                return false;
	            }
	        } 

	        return $display_boolean;
	    }

	    /* 
	    * Implement Remove Welcome Widget Dashboard
	    */
	    public static function ae_implement_remove_welcome_widget(){
	    	$options = get_option( 'ae_admin_customizer_options' );
	        if(isset($options["ae_admin_remove_welcome_widget"])){
	            $checked = $options["ae_admin_remove_welcome_widget"] != null && $options["ae_admin_remove_welcome_widget"] == 1 ? true : false;

	            if ($checked){
	                remove_action('welcome_panel', 'wp_welcome_panel');
	            }
	        } 
	    }

	    /* 
	    * Implement Remove WP News Widget Dashboard
	    */
	    public static function ae_implement_remove_news_widget_dashboard(){
	    	$options = get_option( 'ae_admin_customizer_options' );
	        if(isset($options["ae_admin_remove_news_widget"])){
	            $checked = $options["ae_admin_remove_news_widget"] != null && $options["ae_admin_remove_news_widget"] == 1 ? true : false;

	            if ($checked){
	                remove_meta_box('dashboard_primary', 'dashboard', 'side');
	            }
	        } 
	    }

	    /*
	        Implement Admin Footer Text
	    */
	    public static function ae_implement_change_wp_footer_text($text){
	    	$options = get_option( 'ae_admin_customizer_options' );
	        if(isset($options["ae_admin_footer_text"]) && !empty($options["ae_admin_footer_text"])){
	            echo $options["ae_admin_footer_text"];
	        }else{
	        	echo $text;
	        }
	        
	    }



	}

	new AE_Admin_General_Settings();

