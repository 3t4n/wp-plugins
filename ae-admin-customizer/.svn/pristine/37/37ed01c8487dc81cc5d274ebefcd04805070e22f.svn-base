<?php
if ( ! defined( 'ABSPATH' ) ) exit;

    /**
     *  Admin Panel Styling Settings
     *  @author Allan Empalmado (AppDevPH)
     *  @since : 1.0.0
    */
	class AE_Admin_Panel_Styling
	{

    	public function __construct( ){
    		add_action( 'admin_init', array( __CLASS__, 'setting_fields' ) , 1000);
    		add_action( 'admin_head', array( __CLASS__, 'ae_admin_page_implement_customization' ), 1002);

    		//replace with topbar customization only
    		//1.0.6
    		add_action( 'wp_head', array( __CLASS__, 'ae_admin_page_implement_customization_topbar' ), 1002);
    	}

		/**
		* Render Admin Panel Styling Page
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		*/
    	public static function render_setting_page(){
            settings_fields( 'ae_admin_customizer_color_options_group' );
            do_settings_sections( 'ae-admin-customizer-topbar-settings' );
            do_settings_sections( 'ae-admin-customizer-sidebar-settings' );
            do_settings_sections( 'ae-admin-customizer-global-settings' );
            do_settings_sections( 'ae-admin-customizer-global-button-settings' );
            submit_button();
    	}

		/**
		* Admin Panel Styling Page Fields
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		*/
    	public static function setting_fields(){
	        register_setting(
	            'ae_admin_customizer_color_options_group', 
	            'ae_admin_customizer_color_options', 
	            array( __CLASS__, 'sanitize' )
	        );

	        add_settings_section(
	            'ae_admin_customizer_topbar_setting_section',
	            __('Admin Top Bar Settings', "ae-admin-customizer"),
	            array( __CLASS__, 'topbar_settings_info' ), 
	            'ae-admin-customizer-topbar-settings' 
	        );  

	        add_settings_field(
	            'ae_topbar_background_color',
	            __('Background color', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_topbar_background_color_callback' ), 
	            'ae-admin-customizer-topbar-settings', 
	            'ae_admin_customizer_topbar_setting_section'        
	        );  

	        add_settings_field(
	            'ae_topbar_menuitem_color',
	            __('Menu item text color', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_topbar_menuitem_color_callback' ), 
	            'ae-admin-customizer-topbar-settings', 
	            'ae_admin_customizer_topbar_setting_section'        
	        );  

	        add_settings_field(
	            'ae_topbar_menuitem_hover_color',
	            __('Menu item text hover color', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_topbar_menuitem_hover_color_callback' ), 
	            'ae-admin-customizer-topbar-settings', 
	            'ae_admin_customizer_topbar_setting_section'        
	        );  

	        add_settings_field(
	            'ae_topbar_menuitem_icon_color',
	            __('Menu item icon color',"ae-admin-customizer"),
	            array( __CLASS__, 'ae_topbar_menuitem_icon_color_callback' ), 
	            'ae-admin-customizer-topbar-settings', 
	            'ae_admin_customizer_topbar_setting_section'        
	        );  

	        add_settings_field(
	            'ae_topbar_menuitem_hover_bgc',
	            __('Menu item hover background color', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_topbar_menuitem_hover_bgc_callback' ), 
	            'ae-admin-customizer-topbar-settings', 
	            'ae_admin_customizer_topbar_setting_section'        
	        );  

	        //Sidebar
	        add_settings_section(
	            'ae_admin_customizer_sidebar_setting_section',
	            __('Admin Sidebar Bar Settings', "ae-admin-customizer" ),
	            array( __CLASS__, 'sidebar_settings_info' ), 
	            'ae-admin-customizer-sidebar-settings' 
	        );    

	        add_settings_field(
	            'ae_sidebar_bgc',
	            __('Background color', "ae-admin-customizer" ),
	            array( __CLASS__, 'ae_sidebar_bgc_callback' ), 
	            'ae-admin-customizer-sidebar-settings', 
	            'ae_admin_customizer_sidebar_setting_section'        
	        );  

	        add_settings_field(
	            'ae_sidebar_hover_bgc',
	            __('Parent Item Hover & Active State Background color', "ae-admin-customizer" ),
	            array( __CLASS__, 'ae_sidebar_hover_bgc_callback' ), 
	            'ae-admin-customizer-sidebar-settings', 
	            'ae_admin_customizer_sidebar_setting_section'        
	        ); 

	        add_settings_field(
	            'ae_sidebar_child_bgc',
	            __('Sub Items Background color', "ae-admin-customizer" ),
	            array( __CLASS__, 'ae_sidebar_child_bgc_callback' ), 
	            'ae-admin-customizer-sidebar-settings', 
	            'ae_admin_customizer_sidebar_setting_section'        
	        ); 

	        add_settings_field(
	            'ae_sidebar_text_color',
	            __('Menu Item Text Color', "ae-admin-customizer" ),
	            array( __CLASS__, 'ae_sidebar_text_color_callback' ), 
	            'ae-admin-customizer-sidebar-settings', 
	            'ae_admin_customizer_sidebar_setting_section'        
	        ); 

	        add_settings_field(
	            'ae_sidebar_hover_text_color',
	            __('Menu Item Hover Text Color', "ae-admin-customizer" ),
	            array( __CLASS__, 'ae_sidebar_hover_text_color_callback' ), 
	            'ae-admin-customizer-sidebar-settings', 
	            'ae_admin_customizer_sidebar_setting_section'        
	        ); 

	        add_settings_field(
	            'ae_sidebar_icon_color',
	            __( 'Menu Item Icon Color', "ae-admin-customizer" ),
	            array( __CLASS__, 'ae_sidebar_icon_color_callback' ), 
	            'ae-admin-customizer-sidebar-settings', 
	            'ae_admin_customizer_sidebar_setting_section'        
	        );  


	        //Global
	        add_settings_section(
	            'ae_admin_customizer_global_setting_section',
	            __('Admin Panel Content Text and Links', "ae-admin-customizer" ),
	            array( __CLASS__, 'global_settings_info' ), 
	            'ae-admin-customizer-global-settings' 
	        ); 

	        add_settings_field(
	            'ae_global_text_color',
	            __('Text Color', "ae-admin-customizer" ),
	            array( __CLASS__, 'ae_global_text_color_callback' ), 
	            'ae-admin-customizer-global-settings', 
	            'ae_admin_customizer_global_setting_section'        
	        ); 

	        add_settings_field(
	            'ae_global_link_color',
	            __('Link Color', "ae-admin-customizer" ),
	            array( __CLASS__, 'ae_global_link_color_callback' ), 
	            'ae-admin-customizer-global-settings', 
	            'ae_admin_customizer_global_setting_section'        
	        ); 

	        add_settings_field(
	            'ae_global_link_hover_color',
	            __('Link Hover Color', "ae-admin-customizer" ),
	            array( __CLASS__, 'ae_global_link_hover_color_callback' ), 
	            'ae-admin-customizer-global-settings', 
	            'ae_admin_customizer_global_setting_section'        
	        ); 

	        //Global Button Settings
	        add_settings_section(
	            'ae_admin_customizer_global_button_setting_section',
	            __('Button Styling', "ae-admin-customizer" ),
	            array( __CLASS__, 'global_button_settings_info' ), 
	            'ae-admin-customizer-global-button-settings' 
	        ); 

	        add_settings_field(
	            'ae_global_default_button_color',
	            __('Default Button Color', "ae-admin-customizer" ),
	            array( __CLASS__, 'ae_global_default_button_color_callback' ), 
	            'ae-admin-customizer-global-button-settings', 
	            'ae_admin_customizer_global_button_setting_section'        
	        );  

	        add_settings_field(
	            'ae_global_default_button_hover_color',
	            __('Default Button Hover Color', "ae-admin-customizer" ),
	            array( __CLASS__, 'ae_global_default_button_hover_color_callback' ), 
	            'ae-admin-customizer-global-button-settings', 
	            'ae_admin_customizer_global_button_setting_section'         
	        );  

	        add_settings_field(
	            'ae_global_default_button_text_color',
	            __('Default Button Text Color', "ae-admin-customizer" ),
	            array( __CLASS__, 'ae_global_default_button_text_color_callback' ), 
	            'ae-admin-customizer-global-button-settings', 
	            'ae_admin_customizer_global_button_setting_section'        
	        );  

	        add_settings_field(
	            'ae_global_default_button_text_hover_color',
	            __('Default Button Text Hover Color', "ae-admin-customizer" ),
	            array( __CLASS__, 'ae_global_default_button_text_hover_color_callback' ), 
	            'ae-admin-customizer-global-button-settings', 
	            'ae_admin_customizer_global_button_setting_section'       
	        ); 

	        add_settings_field(
	            'ae_global_primary_button_color',
	            __('Primary Button Color', "ae-admin-customizer" ),
	            array( __CLASS__, 'ae_global_primary_button_color_callback' ), 
	            'ae-admin-customizer-global-button-settings', 
	            'ae_admin_customizer_global_button_setting_section'        
	        );  

	        add_settings_field(
	            'ae_global_primary_button_hover_color',
	            __('Primary Button Hover Color', "ae-admin-customizer" ),
	            array( __CLASS__, 'ae_global_primary_button_hover_color_callback' ), 
	            'ae-admin-customizer-global-button-settings', 
	            'ae_admin_customizer_global_button_setting_section'         
	        );  

	        add_settings_field(
	            'ae_global_primary_button_text_color',
	            __('Primary Button Text Color', "ae-admin-customizer" ),
	            array( __CLASS__, 'ae_global_primary_button_text_color_callback' ), 
	            'ae-admin-customizer-global-button-settings', 
	            'ae_admin_customizer_global_button_setting_section'        
	        );  

	        add_settings_field(
	            'ae_global_primary_button_text_hover_color',
	            __('Primary Button Text Hover Color', "ae-admin-customizer" ),
	            array( __CLASS__, 'ae_global_primary_button_text_hover_color_callback' ), 
	            'ae-admin-customizer-global-button-settings', 
	            'ae_admin_customizer_global_button_setting_section'       
	        );     	

	    }


		/**
		* Sanitize Input Fields
		* @author Allan Empalmado (AppDevPH)
		* @param $input Object
		* @return array
		* @since : 1.0.0
		*/
	    public static function sanitize( $input )
	    {
	    	$options = get_option( 'ae_admin_customizer_color_options' );

	    	$new_input = array();


	        if( isset( $input['ae_topbar_background_color'] )  && !empty($input['ae_topbar_background_color'])  ){
	            
	            $topbar_bgc = trim( $input['ae_topbar_background_color'] );
	            $topbar_bgc = strip_tags( stripslashes( $topbar_bgc ) );

	            if( FALSE == ae_admin_valid_hex_color( $topbar_bgc ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'ae_topbar_background_color_error', 'Invalid hex color for admin top bar', 'error' ); 
	                 
	                $new_input['ae_topbar_background_color'] = $options['ae_topbar_background_color'];
	            } else {
	                $new_input['ae_topbar_background_color'] = $topbar_bgc;
	            }
	        }


	        if( isset( $input['ae_topbar_menuitem_color'] ) && !empty($input['ae_topbar_menuitem_color']) ){
	            
	            $topbar_menuitem = trim( $input['ae_topbar_menuitem_color'] );
	            $topbar_menuitem = strip_tags( stripslashes( $topbar_menuitem ) );

	            if( FALSE == ae_admin_valid_hex_color( $topbar_menuitem ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'ae_topbar_menuitem_color_error', 'Invalid hex color for top bar menu item', 'error' ); 
	                 
	                $new_input['ae_topbar_menuitem_color'] = $options['ae_topbar_menuitem_color'];
	            } else {
	                $new_input['ae_topbar_menuitem_color'] = $topbar_menuitem;
	            }
	        }

	        if( isset( $input['ae_topbar_menuitem_hover_color'] ) && !empty($input['ae_topbar_menuitem_hover_color']) ){
	            
	            $topbar_menuitem_hover = trim( $input['ae_topbar_menuitem_hover_color'] );
	            $topbar_menuitem_hover = strip_tags( stripslashes( $topbar_menuitem_hover ) );

	            if( FALSE == ae_admin_valid_hex_color( $topbar_menuitem_hover ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'topbar_menuitem_hover_color_error', 'Invalid hex color for top bar menu item hover', 'error' ); 
	                 
	                $new_input['ae_topbar_menuitem_hover_color'] = $options['ae_topbar_menuitem_hover_color'];
	            } else {
	                $new_input['ae_topbar_menuitem_hover_color'] = $topbar_menuitem_hover;
	            }
	        }

	        if( isset( $input['ae_topbar_menuitem_icon_color'] ) && !empty($input['ae_topbar_menuitem_icon_color']) ){
	            
	            $topbar_menuitem_icon = trim( $input['ae_topbar_menuitem_icon_color'] );
	            $topbar_menuitem_icon = strip_tags( stripslashes( $topbar_menuitem_icon ) );

	            if( FALSE == ae_admin_valid_hex_color( $topbar_menuitem_icon ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'topbar_menuitem_icon_color_error', 'Invalid hex color for top bar menu item icon color', 'error' ); 
	                 
	                $new_input['ae_topbar_menuitem_icon_color'] = $options['ae_topbar_menuitem_icon_color'];
	            } else {
	                $new_input['ae_topbar_menuitem_icon_color'] = $topbar_menuitem_icon;
	            }
	        }  

	        if( isset( $input['ae_topbar_menuitem_hover_bgc'] ) && !empty($input['ae_topbar_menuitem_hover_bgc'])){
	            
	            $topbar_menuitem_bgc = trim( $input['ae_topbar_menuitem_hover_bgc'] );
	            $topbar_menuitem_bgc = strip_tags( stripslashes( $topbar_menuitem_bgc ) );

	            if( FALSE == ae_admin_valid_hex_color( $topbar_menuitem_bgc ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'topbar_menuitem_hover_color_error', 'Invalid hex color for top bar menu item hover background color', 'error' ); 
	                 
	                $new_input['ae_topbar_menuitem_hover_bgc'] = $options['ae_topbar_menuitem_hover_bgc'];
	            } else {
	                $new_input['ae_topbar_menuitem_hover_bgc'] = $topbar_menuitem_bgc;
	            }
	        }  


	        /*
	        	Sidebar
	        */
	        if( isset( $input['ae_sidebar_bgc'] ) && !empty($input['ae_sidebar_bgc']) ){
	            
	            $sidebar_bgc = trim( $input['ae_sidebar_bgc'] );
	            $sidebar_bgc = strip_tags( stripslashes( $sidebar_bgc ) );

	            if( FALSE == ae_admin_valid_hex_color( $sidebar_bgc ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'ae_sidebar_bgc_error', 'Invalid hex color for sidebar background color', 'error' ); 
	                 
	                $new_input['ae_sidebar_bgc'] = $options['ae_sidebar_bgc'];
	            } else {
	                $new_input['ae_sidebar_bgc'] = $sidebar_bgc;
	            }
	        }  


	        if( isset( $input['ae_sidebar_child_bgc'] )  && !empty($input['ae_sidebar_child_bgc']) ){
	            
	            $child_bgc = trim( $input['ae_sidebar_child_bgc'] );
	            $child_bgc = strip_tags( stripslashes( $child_bgc ) );

	            if( FALSE == ae_admin_valid_hex_color( $child_bgc ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'ae_sidebar_child_bgc_error', 'Invalid hex color for sidebar sub items background color', 'error' ); 
	                 
	                $new_input['ae_sidebar_child_bgc'] = $options['ae_sidebar_child_bgc'];
	            } else {
	                $new_input['ae_sidebar_child_bgc'] = $child_bgc;
	            }
	        }  


	        if( isset( $input['ae_sidebar_hover_bgc'] )  && !empty($input['ae_sidebar_hover_bgc']) ){
	            
	            $menu_hover_bgc = trim( $input['ae_sidebar_hover_bgc'] );
	            $menu_hover_bgc = strip_tags( stripslashes( $menu_hover_bgc ) );

	            if( FALSE == ae_admin_valid_hex_color( $menu_hover_bgc ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'ae_sidebar_hover_bgc_error', 'Invalid hex color for sidebar menu item hover background color', 'error' ); 
	                $new_input['ae_sidebar_hover_bgc'] = $options['ae_sidebar_hover_bgc'];
	            } else {
	                $new_input['ae_sidebar_hover_bgc'] = $menu_hover_bgc;
	            }
	        }  

	        if( isset( $input['ae_sidebar_text_color'] )  && !empty($input['ae_sidebar_text_color']) ){
	            
	            $menu_text_color = trim( $input['ae_sidebar_text_color'] );
	            $menu_text_color = strip_tags( stripslashes( $menu_text_color ) );

	            if( FALSE == ae_admin_valid_hex_color( $menu_text_color ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'ae_sidebar_text_color_error', 'Invalid hex color for sidebar menu item text color', 'error' ); 
	                $new_input['ae_sidebar_text_color'] = $options['ae_sidebar_text_color'];
	            } else {
	                $new_input['ae_sidebar_text_color'] = $menu_text_color;
	            }
	        }  


	        if( isset( $input['ae_sidebar_hover_text_color'] )  && !empty($input['ae_sidebar_hover_text_color']) ){
	            
	            $menu_htext_color = trim( $input['ae_sidebar_hover_text_color'] );
	            $menu_htext_color = strip_tags( stripslashes( $menu_htext_color ) );

	            if( FALSE == ae_admin_valid_hex_color( $menu_htext_color ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'ae_sidebar_hover_text_color_error', 'Invalid hex color for sidebar menu item hover text color', 'error' ); 
	                $new_input['ae_sidebar_hover_text_color'] = $options['ae_sidebar_hover_text_color'];
	            } else {
	                $new_input['ae_sidebar_hover_text_color'] = $menu_htext_color;
	            }
	        }  

	        if( isset( $input['ae_sidebar_icon_color'] )  && !empty($input['ae_sidebar_icon_color']) ){
	            
	            $menu_icon_color = trim( $input['ae_sidebar_icon_color'] );
	            $menu_icon_color = strip_tags( stripslashes( $menu_icon_color ) );

	            if( FALSE == ae_admin_valid_hex_color( $menu_icon_color ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'ae_sidebar_hover_text_color_error', 'Invalid hex color for sidebar icon color', 'error' ); 
	                $new_input['ae_sidebar_icon_color'] = $options['ae_sidebar_icon_color'];
	            } else {
	                $new_input['ae_sidebar_icon_color'] = $menu_icon_color;
	            }
	        }  


	        /*
	        	Global Colors
	        */

	        if( isset( $input['ae_global_text_color'] )  && !empty($input['ae_global_text_color']) ){
	            
	            $gcolor = trim( $input['ae_global_text_color'] );
	            $gcolor = strip_tags( stripslashes( $gcolor ) );

	            if( FALSE == ae_admin_valid_hex_color( $gcolor ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'ae_global_text_color_error', 'Invalid hex color for global text color', 'error' ); 
	                $new_input['ae_global_text_color'] = $options['ae_global_text_color'];
	            } else {
	                $new_input['ae_global_text_color'] = $gcolor;
	            }
	        }  


	        if( isset( $input['ae_global_link_color'] )  && !empty($input['ae_global_link_color']) ){
	            
	            $gcolor = trim( $input['ae_global_link_color'] );
	            $gcolor = strip_tags( stripslashes( $gcolor ) );

	            if( FALSE == ae_admin_valid_hex_color( $gcolor ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'ae_global_link_color_error', 'Invalid hex color for global link color', 'error' ); 
	                $new_input['ae_global_link_color'] = $options['ae_global_link_color'];
	            } else {
	                $new_input['ae_global_link_color'] = $gcolor;
	            }
	        }  

	        if( isset( $input['ae_global_link_hover_color'] )  && !empty($input['ae_global_link_hover_color']) ){
	            
	            $gcolor = trim( $input['ae_global_link_hover_color'] );
	            $gcolor = strip_tags( stripslashes( $gcolor ) );

	            if( FALSE == ae_admin_valid_hex_color( $gcolor ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'ae_global_link_hover_color_error', 'Invalid hex color for global link hover color', 'error' ); 
	                $new_input['ae_global_link_hover_color'] = $options['ae_global_link_hover_color'];
	            } else {
	                $new_input['ae_global_link_hover_color'] = $gcolor;
	            }
	        }  


	        if( isset( $input['ae_global_default_button_color'] )  && !empty($input['ae_global_default_button_color']) ){
	            
	            $gcolor = trim( $input['ae_global_default_button_color'] );
	            $gcolor = strip_tags( stripslashes( $gcolor ) );

	            if( FALSE == ae_admin_valid_hex_color( $gcolor ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'ae_global_default_button_color_error', 'Invalid hex color for global default button color', 'error' ); 
	                $new_input['ae_global_default_button_color'] = $options['ae_global_default_button_color'];
	            } else {
	                $new_input['ae_global_default_button_color'] = $gcolor;
	            }
	        }  

	        if( isset( $input['ae_global_default_button_hover_color'] )  && !empty($input['ae_global_default_button_hover_color']) ){
	            
	            $gcolor = trim( $input['ae_global_default_button_hover_color'] );
	            $gcolor = strip_tags( stripslashes( $gcolor ) );

	            if( FALSE == ae_admin_valid_hex_color( $gcolor ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'ae_global_default_button_hover_color_error', 'Invalid hex color for global default button hover color', 'error' ); 
	                $new_input['ae_global_default_button_hover_color'] = $options['ae_global_default_button_hover_color'];
	            } else {
	                $new_input['ae_global_default_button_hover_color'] = $gcolor;
	            }
	        }  

	        if( isset( $input['ae_global_default_button_text_color'] )  && !empty($input['ae_global_default_button_text_color']) ){
	            
	            $gcolor = trim( $input['ae_global_default_button_text_color'] );
	            $gcolor = strip_tags( stripslashes( $gcolor ) );

	            if( FALSE == ae_admin_valid_hex_color( $gcolor ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'ae_global_default_button_text_color_error', 'Invalid hex color for global default button text color', 'error' ); 
	                $new_input['ae_global_default_button_text_color'] = $options['ae_global_default_button_text_color'];
	            } else {
	                $new_input['ae_global_default_button_text_color'] = $gcolor;
	            }
	        }  

	        if( isset( $input['ae_global_default_button_text_hover_color'] )  && !empty($input['ae_global_default_button_text_hover_color']) ){
	            
	            $gcolor = trim( $input['ae_global_default_button_text_hover_color'] );
	            $gcolor = strip_tags( stripslashes( $gcolor ) );

	            if( FALSE == ae_admin_valid_hex_color( $gcolor ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'ae_global_default_button_text_hover_color_error', 'Invalid hex color for global default button text hover color', 'error' ); 
	                $new_input['ae_global_default_button_text_hover_color'] = $options['ae_global_default_button_text_hover_color'];
	            } else {
	                $new_input['ae_global_default_button_text_hover_color'] = $gcolor;
	            }
	        }  


	        if( isset( $input['ae_global_primary_button_color'] )  && !empty($input['ae_global_primary_button_color']) ){
	            
	            $gcolor = trim( $input['ae_global_primary_button_color'] );
	            $gcolor = strip_tags( stripslashes( $gcolor ) );

	            if( FALSE == ae_admin_valid_hex_color( $gcolor ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'ae_global_primary_button_color_error', 'Invalid hex color for global primary button color', 'error' ); 
	                $new_input['ae_global_primary_button_color'] = $options['ae_global_primary_button_color'];
	            } else {
	                $new_input['ae_global_primary_button_color'] = $gcolor;
	            }
	        }  


	        if( isset( $input['ae_global_primary_button_hover_color'] )  && !empty($input['ae_global_primary_button_hover_color']) ){
	            
	            $gcolor = trim( $input['ae_global_primary_button_hover_color'] );
	            $gcolor = strip_tags( stripslashes( $gcolor ) );

	            if( FALSE == ae_admin_valid_hex_color( $gcolor ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'ae_global_primary_button_hover_color_error', 'Invalid hex color for global primary button hover color', 'error' ); 
	                $new_input['ae_global_primary_button_hover_color'] = $options['ae_global_primary_button_hover_color'];
	            } else {
	                $new_input['ae_global_primary_button_hover_color'] = $gcolor;
	            }
	        }  


	        if( isset( $input['ae_global_primary_button_text_color'] )  && !empty($input['ae_global_primary_button_text_color']) ){
	            
	            $gcolor = trim( $input['ae_global_primary_button_text_color'] );
	            $gcolor = strip_tags( stripslashes( $gcolor ) );

	            if( FALSE == ae_admin_valid_hex_color( $gcolor ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'ae_global_primary_button_text_color_error', 'Invalid hex color for global primary button text color', 'error' ); 
	                $new_input['ae_global_primary_button_text_color'] = $options['ae_global_primary_button_text_color'];
	            } else {
	                $new_input['ae_global_primary_button_text_color'] = $gcolor;
	            }
	        }  

	        if( isset( $input['ae_global_primary_button_text_hover_color'] )  && !empty($input['ae_global_primary_button_text_hover_color']) ){
	            
	            $gcolor = trim( $input['ae_global_primary_button_text_hover_color'] );
	            $gcolor = strip_tags( stripslashes( $gcolor ) );

	            if( FALSE == ae_admin_valid_hex_color( $gcolor ) ) {
	                add_settings_error( 'ae_admin_customizer_color_options', 'ae_global_primary_button_text_hover_color_error', 'Invalid hex color for global primary button text hover color', 'error' ); 
	                $new_input['ae_global_primary_button_text_hover_color'] = $options['ae_global_primary_button_text_hover_color'];
	            } else {
	                $new_input['ae_global_primary_button_text_hover_color'] = $gcolor;
	            }
	        }  

	        return $new_input;

	    }


		/**
		* Admin Panel Styling Section Description
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.0
		*/
	    public static function topbar_settings_info(){
	        echo "<p>" . __("Customize your admin top bar navigation.", "ae-admin-customizer" ) ."</p>";
	    }


		/**
		* Admin Panel Styling Background color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.0
		*/
	    public static function ae_topbar_background_color_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_topbar_background_color" name="ae_admin_customizer_color_options[ae_topbar_background_color]" value="%s" />',
	            isset( $options['ae_topbar_background_color'] ) ? esc_attr( $options['ae_topbar_background_color']) : ''
	        );	
	    }

		/**
		* Admin Panel Styling Menu Item color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.0
		*/
	    public static function ae_topbar_menuitem_color_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_topbar_menuitem_color" name="ae_admin_customizer_color_options[ae_topbar_menuitem_color]" value="%s" />',
	            isset( $options['ae_topbar_menuitem_color'] ) ? esc_attr( $options['ae_topbar_menuitem_color']) : ''
	        );
	    }


		/**
		* Admin Panel Styling Menu Item Hover color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.0
		*/
	    public static function ae_topbar_menuitem_hover_color_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_topbar_menuitem_hover_color" name="ae_admin_customizer_color_options[ae_topbar_menuitem_hover_color]" value="%s" />',
	            isset( $options['ae_topbar_menuitem_hover_color'] ) ? esc_attr( $options['ae_topbar_menuitem_hover_color']) : ''
	        );
	    }


		/**
		* Admin Panel Styling Menu Item Icon color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.0
		*/
	    public static function ae_topbar_menuitem_icon_color_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_topbar_menuitem_icon_color" name="ae_admin_customizer_color_options[ae_topbar_menuitem_icon_color]" value="%s" />',
	            isset( $options['ae_topbar_menuitem_icon_color'] ) ? esc_attr( $options['ae_topbar_menuitem_icon_color']) : ''
	        );	    	
	    }

		/**
		* Admin Panel Styling Menu Item Hover Backgound color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.0
		*/
	    public static function ae_topbar_menuitem_hover_bgc_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_topbar_menuitem_hover_bgc" name="ae_admin_customizer_color_options[ae_topbar_menuitem_hover_bgc]" value="%s" />',
	            isset( $options['ae_topbar_menuitem_hover_bgc'] ) ? esc_attr( $options['ae_topbar_menuitem_hover_bgc']) : ''
	        );	 
	    }


		/**
		* Admin Panel Styling Sidebar Section Description
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.0
		*/
  	    public static function sidebar_settings_info(){
	        echo "<p>" . __( "Customize your admin sidebar navigation.", "ae-admin-customizer" ) . "</p>";
	    }


		/**
		* Admin Panel Styling Sidebar Background Color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.0
		*/
	    public static function ae_sidebar_bgc_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_sidebar_bgc" name="ae_admin_customizer_color_options[ae_sidebar_bgc]" value="%s" />',
	            isset( $options['ae_sidebar_bgc'] ) ? esc_attr( $options['ae_sidebar_bgc']) : ''
	        );	 
	    }

		/**
		* Admin Panel Styling Sidebar Item Hover Background Color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.0
		*/
	    public static function ae_sidebar_hover_bgc_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_sidebar_hover_bgc" name="ae_admin_customizer_color_options[ae_sidebar_hover_bgc]" value="%s" />',
	            isset( $options['ae_sidebar_hover_bgc'] ) ? esc_attr( $options['ae_sidebar_hover_bgc']) : ''
	        );	 
	    }

		/**
		* Admin Panel Styling Sidebar Item Child Background Color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.0
		*/
	    public static function ae_sidebar_child_bgc_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_sidebar_child_bgc" name="ae_admin_customizer_color_options[ae_sidebar_child_bgc]" value="%s" />',
	            isset( $options['ae_sidebar_child_bgc'] ) ? esc_attr( $options['ae_sidebar_child_bgc']) : ''
	        );	 
	    }

		/**
		* Admin Panel Styling Sidebar Item Text Color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.0
		*/
	    public static function ae_sidebar_text_color_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_sidebar_text_color" name="ae_admin_customizer_color_options[ae_sidebar_text_color]" value="%s" />',
	            isset( $options['ae_sidebar_text_color'] ) ? esc_attr( $options['ae_sidebar_text_color']) : ''
	        );	 
	    }

		/**
		* Admin Panel Styling Sidebar Item Hover Text Color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.0
		*/
	    public static function ae_sidebar_hover_text_color_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_sidebar_hover_text_color" name="ae_admin_customizer_color_options[ae_sidebar_hover_text_color]" value="%s" />',
	            isset( $options['ae_sidebar_hover_text_color'] ) ? esc_attr( $options['ae_sidebar_hover_text_color']) : ''
	        );	

	    }

		/**
		* Admin Panel Styling Sidebar Item Icon Color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.0
		*/
	    public static function ae_sidebar_icon_color_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_sidebar_icon_color" name="ae_admin_customizer_color_options[ae_sidebar_icon_color]" value="%s" />',
	            isset( $options['ae_sidebar_icon_color'] ) ? esc_attr( $options['ae_sidebar_icon_color']) : ''
	        );	
	    }



		/**
		* Admin Panel Global Styling Section Description
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.3
		*/
	    public static function global_settings_info(){
	        echo "<p>" . __("Admin Panel Global Styling Settings.", "ae-admin-customizer" ) ."</p>";
	    }


		/**
		* Admin Panel Global Styling Text Color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.3
		*/
	    public static function ae_global_text_color_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_global_text_color" name="ae_admin_customizer_color_options[ae_global_text_color]" value="%s" />',
	            isset( $options['ae_global_text_color'] ) ? esc_attr( $options['ae_global_text_color']) : ''
	        );
	    }

		/**
		* Admin Panel Global Styling Link Color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.3
		*/
	    public static function ae_global_link_color_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_global_link_color" name="ae_admin_customizer_color_options[ae_global_link_color]" value="%s" />',
	            isset( $options['ae_global_link_color'] ) ? esc_attr( $options['ae_global_link_color']) : ''
	        );
	    }

		/**
		* Admin Panel Global Styling Link Hover Color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.3
		*/
	    public static function ae_global_link_hover_color_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_global_link_hover_color" name="ae_admin_customizer_color_options[ae_global_link_hover_color]" value="%s" />',
	            isset( $options['ae_global_link_hover_color'] ) ? esc_attr( $options['ae_global_link_hover_color']) : ''
	        );
	    }

		/**
		* Admin Panel Global Button Styling Section Description
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.3
		*/
	    public static function global_button_settings_info(){
	        echo "<p>" . __("Customize Wordpress default buttons globally.", "ae-admin-customizer" ) ."</p>";
	    }



		/**
		* Admin Panel Global Styling Default Button Color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.3
		*/
	    public static function ae_global_default_button_color_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_global_default_button_color" name="ae_admin_customizer_color_options[ae_global_default_button_color]" value="%s" />',
	            isset( $options['ae_global_default_button_color'] ) ? esc_attr( $options['ae_global_default_button_color']) : ''
	        );
	    }


		/**
		* Admin Panel Global Styling Default Button Hover Color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.3
		*/
	    public static function ae_global_default_button_hover_color_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_global_default_button_hover_color" name="ae_admin_customizer_color_options[ae_global_default_button_hover_color]" value="%s" />',
	            isset( $options['ae_global_default_button_hover_color'] ) ? esc_attr( $options['ae_global_default_button_hover_color']) : ''
	        );
	    }

		/**
		* Admin Panel Global Styling Default Button Text Color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.3
		*/
	    public static function ae_global_default_button_text_color_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_global_default_button_text_color" name="ae_admin_customizer_color_options[ae_global_default_button_text_color]" value="%s" />',
	            isset( $options['ae_global_default_button_text_color'] ) ? esc_attr( $options['ae_global_default_button_text_color']) : ''
	        );
	    }

		/**
		* Admin Panel Global Styling Default Button Text Hover Color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.3
		*/
	    public static function ae_global_default_button_text_hover_color_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_global_default_button_text_hover_color" name="ae_admin_customizer_color_options[ae_global_default_button_text_hover_color]" value="%s" />',
	            isset( $options['ae_global_default_button_text_hover_color'] ) ? esc_attr( $options['ae_global_default_button_text_hover_color']) : ''
	        );
	    }

	    

		/**
		* Admin Panel Global Styling Primary Button Color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.3
		*/
	    public static function ae_global_primary_button_color_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_global_primary_button_color" name="ae_admin_customizer_color_options[ae_global_primary_button_color]" value="%s" />',
	            isset( $options['ae_global_primary_button_color'] ) ? esc_attr( $options['ae_global_primary_button_color']) : ''
	        );
	    }


		/**
		* Admin Panel Global Styling Primary Button Hover Color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.3
		*/
	    public static function ae_global_primary_button_hover_color_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_global_primary_button_hover_color" name="ae_admin_customizer_color_options[ae_global_primary_button_hover_color]" value="%s" />',
	            isset( $options['ae_global_primary_button_hover_color'] ) ? esc_attr( $options['ae_global_primary_button_hover_color']) : ''
	        );
	    }

		/**
		* Admin Panel Global Styling Primary Button Text Color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.3
		*/
	    public static function ae_global_primary_button_text_color_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_global_primary_button_text_color" name="ae_admin_customizer_color_options[ae_global_primary_button_text_color]" value="%s" />',
	            isset( $options['ae_global_primary_button_text_color'] ) ? esc_attr( $options['ae_global_primary_button_text_color']) : ''
	        );
	    }

		/**
		* Admin Panel Global Styling Primary Button Text Hover Color picker
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.3
		*/
	    public static function ae_global_primary_button_text_hover_color_callback(){
	    	$options = get_option( 'ae_admin_customizer_color_options' );
	        printf(
	            '<input type="text" id="ae_global_primary_button_text_hover_color" name="ae_admin_customizer_color_options[ae_global_primary_button_text_hover_color]" value="%s" />',
	            isset( $options['ae_global_primary_button_text_hover_color'] ) ? esc_attr( $options['ae_global_primary_button_text_hover_color']) : ''
	        );
	    }

		/**
		* Render the admin panel saved styling to Admin Page Html
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.0
		*/
	    public static function ae_admin_page_implement_customization(){
	    	//Bail out since admin bar is not showing
	    	//1.0.6
	    	if(!is_admin_bar_showing()){
	    		return;
	    	}

	    	$options 						= get_option( 'ae_admin_customizer_color_options' );

	    	//sidebar
	    	$sidebar_bgc 					= isset($options["ae_sidebar_bgc"]) ? $options["ae_sidebar_bgc"] : null;
	    	$sidebar_child_bgc 				= isset($options["ae_sidebar_child_bgc"]) ? $options["ae_sidebar_child_bgc"] : null;
	    	$sidebar_hover_bgc 				= isset($options["ae_sidebar_hover_bgc"]) ? $options["ae_sidebar_hover_bgc"] : null;
	    	$sidebar_text_color 				= isset($options["ae_sidebar_text_color"]) ? $options["ae_sidebar_text_color"] : null;
	    	$sidebar_htext_color 				= isset($options["ae_sidebar_hover_text_color"]) ? $options["ae_sidebar_hover_text_color"] : null;
	    	$sidebar_icon_color 				= isset($options["ae_sidebar_icon_color"]) ? $options["ae_sidebar_icon_color"] : null;

	    	//Global since : 1.0.3
	    	$global_text_color 			= isset($options["ae_global_text_color"]) ? $options["ae_global_text_color"] : null;
	    	$global_link_color 			= isset($options["ae_global_link_color"]) ? $options["ae_global_link_color"] : null;
	    	$global_link_hover_color 	= isset($options["ae_global_link_hover_color"]) ? $options["ae_global_link_hover_color"] : null;
	    	$global_default_btn_color 	= isset($options["ae_global_default_button_color"]) ? $options["ae_global_default_button_color"] : null;
	    	$global_default_btn_hover_color 	= isset($options["ae_global_default_button_hover_color"]) ? $options["ae_global_default_button_hover_color"] : null;

	    	$global_default_btn_txt_color 	= isset($options["ae_global_default_button_text_color"]) ? $options["ae_global_default_button_text_color"] : null;
	    	$global_default_btn_txt_hover_color 	= isset($options["ae_global_default_button_text_hover_color"]) ? $options["ae_global_default_button_text_hover_color"] : null;
	    	
	    	$global_primary_btn_color 	= isset($options["ae_global_primary_button_color"]) ? $options["ae_global_primary_button_color"] : null;
	    	$global_primary_btn_hover_color 	= isset($options["ae_global_primary_button_hover_color"]) ? $options["ae_global_primary_button_hover_color"] : null;

	    	$global_primary_btn_txt_color 	= isset($options["ae_global_primary_button_text_color"]) ? $options["ae_global_primary_button_text_color"] : null;
	    	$global_primary_btn_txt_hover_color 	= isset($options["ae_global_primary_button_text_hover_color"]) ? $options["ae_global_primary_button_text_hover_color"] : null;

	    	?>
	    		<?php self::ae_admin_page_implement_customization_topbar(); ?>
	    		<style type="text/css">
	    		<?php if($global_text_color !== null){ ?>
	    			html, body, p, h1, h2, h3, h4, table, tr, td, th { color : <?php echo $global_text_color; ?> !important;  }
	    		<?php } ?>
	    		<?php if($global_link_color !== null){ ?>
	    			a, .wp-core-ui .button-link { color : <?php echo $global_link_color; ?>;  }
	    		<?php } ?>
	    		<?php if($global_link_hover_color !== null){ ?>
	    			a:hover, .wp-core-ui .button-link:hover { color : <?php echo $global_link_hover_color; ?>;  }
	    		<?php } ?>
	    		<?php if($global_default_btn_color !== null){ ?>
	    			.wrap a.page-title-action,
	    			.wp-core-ui .button, .wp-core-ui .button-secondary { background : <?php echo $global_default_btn_color; ?>; border : none; box-shadow: none; text-shadow: none; transition: all 0.5s;  }
	    		<?php } ?>
	    		<?php if($global_default_btn_hover_color !== null){ ?>
	    			.wrap a.page-title-action:hover, .wrap a.page-title-action:active,
	    			.wp-core-ui .button:hover, .wp-core-ui .button-secondary:hover, .wp-core-ui .button:active, .wp-core-ui .button-secondary:active, .wp-core-ui .button:focus, .wp-core-ui .button-secondary:focus   { background : <?php echo $global_default_btn_hover_color; ?>; }
	    		<?php } ?>
	    		<?php if($global_default_btn_txt_color !== null){ ?>
	    			.wrap a.page-title-action span.dashicons, .wp-core-ui .button span.dashicons, .wp-core-ui .button-secondary span.dashicons,
	    			.wrap a.page-title-action, .wp-core-ui .button, .wp-core-ui .button-secondary { color : <?php echo $global_default_btn_txt_color; ?>;}
	    		<?php } ?>
	    		<?php if($global_default_btn_txt_hover_color !== null){ ?>
	    			.wrap a.page-title-action:hover span.dashicons, .wp-core-ui .button:hover span.dashicons, .wp-core-ui .button-secondary:hover span.dashicons,
	    			.wrap a.page-title-action:hover, .wp-core-ui .button:hover, .wp-core-ui .button-secondary:hover { color : <?php echo $global_default_btn_txt_hover_color; ?>; }
	    		<?php } ?>
	    		<?php if($global_primary_btn_color !== null){ ?>
	    			.wp-core-ui .button-primary { background : <?php echo $global_primary_btn_color; ?>; border : none; box-shadow: none; text-shadow: none;}
	    		<?php } ?>
	    		<?php if($global_primary_btn_hover_color !== null){ ?>
	    			.wp-core-ui .button-primary:hover, .wp-core-ui .button-primary:active,.wp-core-ui .button-primary:focus { background : <?php echo $global_primary_btn_hover_color; ?>;  }
	    		<?php } ?>
	    		<?php if($global_primary_btn_txt_color !== null){ ?>
	    			.wp-core-ui .button-primary span.dashicons,
	    			.wp-core-ui .button-primary{ color : <?php echo $global_primary_btn_txt_color; ?>;}
	    		<?php } ?>
	    		<?php if($global_primary_btn_txt_hover_color !== null){ ?>
	    			.wp-core-ui .button-primary:hover span.dashicons, .wp-core-ui .button-primary:active span.dashicons,.wp-core-ui .button-primary:focus span.dashicons,
	    			.wp-core-ui .button-primary:hover, .wp-core-ui .button-primary:active,.wp-core-ui .button-primary:focus { color : <?php echo $global_primary_btn_txt_hover_color; ?>; }
	    		<?php } ?>

				<?php if($sidebar_bgc !== null) { ?>
					#adminmenu, #adminmenuback, #adminmenuwrap { 
						background: <?php echo $sidebar_bgc; ?> !important;
					}
				<?php } ?>
				<?php if( $sidebar_child_bgc !== null ) { ?>
					#adminmenu .wp-has-current-submenu .wp-submenu, 
					#adminmenu .wp-has-current-submenu.opensub .wp-submenu, 
					#adminmenu .wp-submenu, 
					#adminmenu a.wp-has-current-submenu:focus+.wp-submenu, 
					.folded #adminmenu .wp-has-current-submenu .wp-submenu
					 { 
						background: <?php echo $sidebar_child_bgc; ?> !important;
						text-shadow: none;
					}
					#adminmenu li.wp-has-submenu.wp-not-current-submenu.opensub:hover:after {
						border-right-color : <?php echo $sidebar_child_bgc; ?> !important;
					}
				<?php } ?>
				<?php if( $sidebar_hover_bgc !== null) { ?>
					#adminmenu a:hover, 
					#adminmenu li.menu-top:hover, 
					#adminmenu li.opensub>a.menu-top, 
					#adminmenu li>a.menu-top:focus,
					#adminmenu li.current a.menu-top, 
					#adminmenu li.wp-has-current-submenu .wp-submenu .wp-submenu-head, 
					#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, 
					.folded #adminmenu li.current.menu-top{ 
						background: <?php echo $sidebar_hover_bgc; ?> !important;
						text-shadow: none;
					}
				<?php } ?>
				<?php if( $sidebar_text_color !== null) { ?>
					#adminmenu a { color : <?php echo $sidebar_text_color; ?> !important; }
				<?php } ?>
				<?php if( $sidebar_htext_color !== null) { ?>
					#adminmenu a:hover { color : <?php echo $sidebar_htext_color; ?> !important; }
				<?php } ?>
				<?php if( $sidebar_icon_color !== null) { ?>
					#adminmenu div.wp-menu-image:before { color : <?php echo $sidebar_icon_color; ?> !important; }
				<?php } ?>
				<?php
			    	$custom_css_options = get_option( 'ae_admin_customizer_custom_css' );
			        echo isset($custom_css_options['ae_custom_css_admin']) && !empty($custom_css_options['ae_custom_css_admin']) ?  $custom_css_options['ae_custom_css_admin'] : "";
				?>
	    		</style>
	    	<?php
	    }


	    public static function ae_admin_page_implement_customization_topbar(){
	    	if(!is_admin_bar_showing()){
	    		return;
	    	}

	    	$options 						= get_option( 'ae_admin_customizer_color_options' );

	    	//topbar
	    	$topbar_bgc 					= isset($options["ae_topbar_background_color"]) ? $options["ae_topbar_background_color"] : null;
	    	$topbar_menuitem_color 			= isset($options["ae_topbar_menuitem_color"]) ? $options["ae_topbar_menuitem_color"] : null;
	    	$topbar_menuitem_hover_color 	= isset($options["ae_topbar_menuitem_hover_color"]) ? $options["ae_topbar_menuitem_color"] : null;
	    	$topbar_menuitem_icon_color 	= isset($options["ae_topbar_menuitem_icon_color"]) ? $options["ae_topbar_menuitem_icon_color"] : null;
	    	$topbar_menuitem_bgc 			= isset($options["ae_topbar_menuitem_hover_bgc"]) ? $options["ae_topbar_menuitem_hover_bgc"] : null ;

	    	?>
	    		<style type="text/css">
	    		<?php if($topbar_bgc !== null) { ?>
	    			#wpadminbar { background: <?php echo $topbar_bgc; ?>; }
	    		<?php } ?>
	    		<?php if(isset($topbar_menuitem_color)) { ?>
					#wpadminbar .ab-item, #wpadminbar a.ab-item, #wpadminbar a.ab-item span,
					#wpadminbar>#wp-toolbar span.ab-label, 
					#wpadminbar>#wp-toolbar span.noticon,
					#wpadminbar .hover .ab-sub-wrapper  > ul.ab-submenu > li > a 
					{ 
						color : <?php echo $topbar_menuitem_color; ?> !important;
					}
				<?php } ?>
				<?php if( $topbar_menuitem_hover_color !== null ) { ?>
					#wpadminbar:not(.mobile)>#wp-toolbar a:focus span.ab-label, 
					#wpadminbar:not(.mobile)>#wp-toolbar li.hover span.ab-label, 
					#wpadminbar:not(.mobile)>#wp-toolbar li:hover span.ab-label,
					#wpadminbar .ab-top-menu > li > .ab-item:focus, 
					#wpadminbar.nojq .quicklinks .ab-top-menu > li > .ab-item:focus, 
					#wpadminbar .ab-top-menu > li:hover > .ab-item, 
					#wpadminbar .ab-top-menu > li.hover > .ab-item,
					#wpadminbar .ab-sub-wrapper,
					#wpadminbar ul#wp-admin-bar-root-default > li > a:hover,
					.menupop.hover > a:hover,
					#wpadminbar .hover .ab-sub-wrapper  > ul.ab-submenu > li > a:hover { 
						color : <?php echo $topbar_menuitem_hover_color; ?> !important;
					}
				<?php } ?>
				<?php if( $topbar_menuitem_icon_color !== null) { ?>
					#wpadminbar .ab-icon, 
					#wpadminbar .ab-icon:before, 
					#wpadminbar .ab-item:after, 
					#wpadminbar .ab-item:before {
						color : <?php echo $topbar_menuitem_icon_color; ?> !important;
						transition: all 0.5s;
					}
				<?php } ?>
				<?php if( $topbar_menuitem_bgc !== null ) { ?>
					#wpadminbar .ab-top-menu > li > .ab-item:focus, 
					#wpadminbar.nojq .quicklinks .ab-top-menu > li > .ab-item:focus, 
					#wpadminbar .ab-top-menu > li:hover > .ab-item, 
					#wpadminbar .ab-top-menu > li.hover > .ab-item,
					#wpadminbar .ab-sub-wrapper {
						background:  <?php echo $topbar_menuitem_bgc; ?> !important;
					}
				<?php } ?>
				</style>
	    	<?php
	    }

	}

	new AE_Admin_Panel_Styling();

