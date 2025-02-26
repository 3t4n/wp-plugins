<?php
if ( ! defined( 'ABSPATH' ) ) exit;

    /**
    * Custom CSS Class 
    * @author Allan Empalmado (AppDevPH)
    * @since : 1.0.0
    */

	class AE_Admin_Custom_Css
	{

    	public function __construct( ){
    		add_action( 'admin_init', array( __CLASS__, 'setting_fields' ) , 1000);
    	}

		/**
		* Render Custom CSS Setting Page
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		*/
    	public static function render_setting_page(){
            settings_fields( 'ae_admin_customizer_custom_css_group' );
            do_settings_sections( 'ae-admin-customizer-custom-css-settings' );
            submit_button();
    	}


		/**
		* CSS Setting Page Fields
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		*/
    	public static function setting_fields(){
	        register_setting(
	            'ae_admin_customizer_custom_css_group', 
	            'ae_admin_customizer_custom_css', 
	            array( __CLASS__, 'sanitize' )
	        );

	        add_settings_section(
	            'ae_admin_customizer_custom_css_section',
	            __( 'Custom CSS', "ae-admin-customizer" ),
	            array( __CLASS__, 'custom_css_setting_info' ), 
	            'ae-admin-customizer-custom-css-settings' 
	        ); 

	        add_settings_field(
	            'ae_custom_css_admin',
	            __( 'WP Admin Custom Css', "ae-admin-customizer" ),
	            array( __CLASS__, 'ae_custom_css_admin_callback' ), 
	            'ae-admin-customizer-custom-css-settings', 
	            'ae_admin_customizer_custom_css_section'        
	        ); 

	        add_settings_field(
	            'ae_custom_css_logreg',
	            __( 'WP Login & Registration Custom Css', "ae-admin-customizer" ),
	            array( __CLASS__, 'ae_custom_css_logreg_callback' ), 
	            'ae-admin-customizer-custom-css-settings', 
	            'ae_admin_customizer_custom_css_section'        
	        ); 
    	}

		/**
		* CSS Setting Sanitized Input
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		*/
	    public static function sanitize( $input )
	    {
	    	$new_input = array();

	        if( isset( $input['ae_custom_css_logreg'] ) ){
	            $new_input['ae_custom_css_logreg'] = sanitize_text_field( $input['ae_custom_css_logreg'] );
	        }

	        if( isset( $input['ae_custom_css_admin'] ) ){
	            $new_input['ae_custom_css_admin'] = sanitize_text_field( $input['ae_custom_css_admin'] );
	        }

	        return $new_input;

	    }



		/**
		* CSS Setting Section Description
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.0
		*/
	    public static function custom_css_setting_info(){
	        echo "<p>" . __( "Enter custom css to further customize your design.", "ae-admin-customizer" ) . "</p>";
	    }

		/**
		* CSS Setting Admin Panel Custom CSS TextArea
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.0
		*/
	    public static function ae_custom_css_admin_callback(){
	    	$options = get_option( 'ae_admin_customizer_custom_css' );
	        printf(
	            '<textarea id="ae_custom_css_admin" name="ae_admin_customizer_custom_css[ae_custom_css_admin]"  class="textarea widefat" rows="8"/>%s</textarea>',
	            isset( $options['ae_custom_css_admin'] ) ? esc_attr( $options['ae_custom_css_admin']) : ''
	        );
	    }


		/**
		* CSS Setting Login and Registration Page Custom CSS Textarea
		* @author Allan Empalmado (AppDevPH)
		* @return string
		* @since : 1.0.0
		*/
	    public static function ae_custom_css_logreg_callback(){
	    	$options = get_option( 'ae_admin_customizer_custom_css' );
	        printf(
	            '<textarea id="ae_custom_css_logreg" name="ae_admin_customizer_custom_css[ae_custom_css_logreg]" class="textarea widefat" rows="8"/>%s</textarea>',
	            isset( $options['ae_custom_css_logreg'] ) ? esc_attr( $options['ae_custom_css_logreg']) : ''
	        );
	    }

	}

	new AE_Admin_Custom_Css();

