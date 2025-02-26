<?php
    /*
        Login and Registraion Styling
        Coder : Allan Empalmado
        @Since : 1.0.0
    */
if ( ! defined( 'ABSPATH' ) ) exit;

	class AE_Admin_Login_Registration_Styling
	{

    	public function __construct( ){
    		add_action( 'admin_init', array( __CLASS__, 'setting_fields' ) , 1000);
	        add_action( 'login_enqueue_scripts', array( __CLASS__, 'ae_admin_customizer_login_enqueue' ), 1000);
			add_action( 'login_head', array( __CLASS__, 'ae_login_page_implement_customization' ), 1000);
	        add_filter( 'login_headerurl', array( __CLASS__, 'ae_admin_customizer_login_url' ), 1001 );
	        add_filter( 'login_headertitle', array( __CLASS__, 'ae_admin_customizer_login_title' ) );
    	}

		/**
		* Render Login & Registration Setting Page Sections
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		*/
    	public static function render_setting_page(){
            settings_fields( 'ae_admin_customizer_logreg_options_group' );
            do_settings_sections( 'ae-admin-customizer-logreg-settings' );
            do_settings_sections( 'ae-admin-customizer-logreg-box-settings' );
            do_settings_sections( 'ae-admin-customizer-logreg-bgimage-settings' );
            submit_button(); 
    	}


		/**
		* Setup the setting fields
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		*/
    	public static function setting_fields(){
	        register_setting(
	            'ae_admin_customizer_logreg_options_group', 
	            'ae_admin_customizer_logreg_options', 
	            array( __CLASS__, 'sanitize' )
	        );

	        add_settings_section(
	            'ae_admin_customizer_logreg_section',
	            __('Login & Registration Page', "ae-admin-customizer"),
	            array( __CLASS__, 'logreg_setting_info' ), 
	            'ae-admin-customizer-logreg-settings' 
	        );  

	        /*
	        	@since version 1.0.1
	        */
	        add_settings_field(
	            'ae_admin_edit_with_live',
	            __('Customizer', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_admin_edit_with_live_callback' ), 
	            'ae-admin-customizer-logreg-settings', 
	            'ae_admin_customizer_logreg_section'        
	        ); 


	        add_settings_field(
	            'ae_logreg_bgcolor_picker',
	            __('Background Color', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_logreg_bgcolor_picker_callback' ), 
	            'ae-admin-customizer-logreg-settings', 
	            'ae_admin_customizer_logreg_section'        
	        ); 

	        add_settings_field(
	            'ae_logreg_textcolor_picker',
	            __('Text Color', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_logreg_textcolor_picker_callback' ), 
	            'ae-admin-customizer-logreg-settings', 
	            'ae_admin_customizer_logreg_section'        
	        ); 

	        add_settings_field(
	            'ae_logreg_linkcolor_picker',
	            __('Link Color', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_logreg_linkcolor_picker_callback' ), 
	            'ae-admin-customizer-logreg-settings', 
	            'ae_admin_customizer_logreg_section'        
	        ); 

	        add_settings_field(
	            'ae_logreg_buttoncolor_picker',
	            __('Button Color', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_logreg_buttoncolor_picker_callback' ), 
	            'ae-admin-customizer-logreg-settings', 
	            'ae_admin_customizer_logreg_section'        
	        ); 

	        add_settings_section(
	            'ae_admin_customizer_logreg_box_section',
	            __('Login & Registration Box Wrapper', "ae-admin-customizer"),
	            array( __CLASS__, 'logreg_box_setting_info' ), 
	            'ae-admin-customizer-logreg-box-settings' 
	        ); 

	        add_settings_field(
	            'ae_logreg_boxcolor_picker',
	            __('Box Color', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_logreg_boxcolor_picker_callback' ), 
	            'ae-admin-customizer-logreg-box-settings', 
	            'ae_admin_customizer_logreg_box_section'        
	        ); 

	        add_settings_field(
	            'ae_logreg_box_border_color',
	            __('Box Border Color', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_logreg_box_border_color_callback' ), 
	            'ae-admin-customizer-logreg-box-settings', 
	            'ae_admin_customizer_logreg_box_section'        
	        ); 

	        add_settings_field(
	            'ae_logreg_box_rounded_corners',
	            __('Box Rounded Corners?', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_logreg_box_rounded_corners_callback' ), 
	            'ae-admin-customizer-logreg-box-settings', 
	            'ae_admin_customizer_logreg_box_section'        
	        ); 

	        add_settings_field(
	            'ae_logreg_box_border_radius',
	            __('Box Border Radius', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_logreg_box_border_radius_callback' ), 
	            'ae-admin-customizer-logreg-box-settings', 
	            'ae_admin_customizer_logreg_box_section'        
	        ); 

	        add_settings_field(
	            'ae_logreg_box_border_thick',
	            __('Box Border Thickness', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_logreg_box_border_thick_callback' ), 
	            'ae-admin-customizer-logreg-box-settings', 
	            'ae_admin_customizer_logreg_box_section'        
	        ); 

	        add_settings_field(
	            'ae_logreg_box_width',
	            __('Box Container Width', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_logreg_box_width_callback' ), 
	            'ae-admin-customizer-logreg-box-settings', 
	            'ae_admin_customizer_logreg_box_section'        
	        ); 

	        add_settings_section(
	            'ae_logreg_background_image_section',
	            __('Background Image Setting', "ae-admin-customizer"),
	            array( __CLASS__, 'logreg_bgimage_setting_info' ), 
	            'ae-admin-customizer-logreg-bgimage-settings' 
	        ); 

	        add_settings_field(
	            'ae_logreg_use_image_background',
	            __('Use Image as Background', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_logreg_use_image_background_callback' ), 
	            'ae-admin-customizer-logreg-bgimage-settings', 
	            'ae_logreg_background_image_section'        
	        ); 

	        add_settings_field(
	            'ae_logreg_image_background',
	            __('Background Image', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_logreg_image_background_callback' ), 
	            'ae-admin-customizer-logreg-bgimage-settings', 
	            'ae_logreg_background_image_section'        
	        ); 

	        add_settings_field(
	            'ae_logreg_image_background_blend_color',
	            __('Background Image Color Blend', "ae-admin-customizer"),
	            array( __CLASS__, 'ae_logreg_image_background_blend_color_callback' ), 
	            'ae-admin-customizer-logreg-bgimage-settings', 
	            'ae_logreg_background_image_section'        
	        ); 

    	}


		/**
		* Sanitize setting $input
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		* @param raw $input 
		* @return (array) of sanitized inputs
		*/
	    public static function sanitize( $input )
	    {
	    	$options = get_option( 'ae_admin_customizer_logreg_options' );

	    	$new_input = array();

	        if( isset( $input['ae_logreg_bgcolor_picker'] ) && !empty($input['ae_logreg_bgcolor_picker']) ){
	            
	            $logreg_bgcolor = trim( $input['ae_logreg_bgcolor_picker'] );
	            $logreg_bgcolor = strip_tags( stripslashes( $logreg_bgcolor ) );

	            if( FALSE == ae_admin_valid_hex_color( $logreg_bgcolor ) ) {
	                add_settings_error( 'ae_admin_customizer_logreg_options', 'ae_logreg_bgcolor_picker_error', 'Invalid color for Login and Registration Background', 'error' ); 
	                 
	                $new_input['ae_logreg_bgcolor_picker'] = $options['ae_logreg_bgcolor_picker'];
	            } else {
	                $new_input['ae_logreg_bgcolor_picker'] = $logreg_bgcolor;
	            }
	        }

	        if( isset( $input['ae_logreg_textcolor_picker'] ) && !empty($input['ae_logreg_textcolor_picker']) ){
	            
	            $logreg_textcolor = trim( $input['ae_logreg_textcolor_picker'] );
	            $logreg_textcolor = strip_tags( stripslashes( $logreg_textcolor ) );

	            if( FALSE == ae_admin_valid_hex_color( $logreg_textcolor ) ) {
	                add_settings_error( 'ae_admin_customizer_logreg_options', 'ae_logreg_textcolor_picker_error', 'Invalid color for Login and Registration Text Color', 'error' ); 
	                 
	                $new_input['ae_logreg_textcolor_picker'] = $options['ae_logreg_textcolor_picker'];
	            } else {
	                $new_input['ae_logreg_textcolor_picker'] = $logreg_textcolor;
	            }
	        }   

	        if( isset( $input['ae_logreg_linkcolor_picker'] ) && !empty($input['ae_logreg_linkcolor_picker']) ){
	            
	            $logreg_linkcolor = trim( $input['ae_logreg_linkcolor_picker'] );
	            $logreg_linkcolor = strip_tags( stripslashes( $logreg_linkcolor ) );

	            if( FALSE == ae_admin_valid_hex_color( $logreg_linkcolor ) ) {
	                add_settings_error( 'ae_admin_customizer_logreg_options', 'ae_logreg_linkcolor_picker_error', 'Invalid color for Login and Registration Link Color', 'error' ); 
	                 
	                $new_input['ae_logreg_linkcolor_picker'] = $options['ae_logreg_linkcolor_picker'];
	            } else {
	                $new_input['ae_logreg_linkcolor_picker'] = $logreg_linkcolor;
	            }
	        }  

	        if( isset( $input['ae_logreg_buttoncolor_picker'] ) && !empty($input['ae_logreg_buttoncolor_picker']) ){
	            
	            $logreg_buttoncolor = trim( $input['ae_logreg_buttoncolor_picker'] );
	            $logreg_buttoncolor = strip_tags( stripslashes( $logreg_buttoncolor ) );

	            if( FALSE == ae_admin_valid_hex_color( $logreg_buttoncolor ) ) {
	                add_settings_error( 'ae_admin_customizer_logreg_options', 'ae_logreg_buttoncolor_picker_error', 'Invalid color for Login and Registration Button Color', 'error' ); 
	                 
	                $new_input['ae_logreg_buttoncolor_picker'] = $options['ae_logreg_buttoncolor_picker'];
	            } else {
	                $new_input['ae_logreg_buttoncolor_picker'] = $logreg_buttoncolor;
	            }
	        } 

	        if( isset( $input['ae_logreg_boxcolor_picker'] ) && !empty($input['ae_logreg_boxcolor_picker']) ){
	            
	            $logreg_boxcolor = trim( $input['ae_logreg_boxcolor_picker'] );
	            $logreg_boxcolor = strip_tags( stripslashes( $logreg_boxcolor ) );

	            if( FALSE == ae_admin_valid_hex_color( $logreg_boxcolor ) ) {
	                add_settings_error( 'ae_admin_customizer_logreg_options', 'ae_logreg_boxcolor_picker_error', 'Invalid color for Login and Registration Box Color', 'error' ); 
	                 
	                $new_input['ae_logreg_boxcolor_picker'] = $options['ae_logreg_boxcolor_picker'];
	            } else {
	                $new_input['ae_logreg_boxcolor_picker'] = $logreg_boxcolor;
	            }
	        } 

	        if( isset( $input['ae_logreg_box_rounded_corners'] ) ){
	            $new_input['ae_logreg_box_rounded_corners'] = 1;
	        }else{
	            delete_option($option["ae_logreg_box_rounded_corners"]);
	        }

	        if( isset( $input['ae_logreg_box_border_radius'] ) ){
	            $new_input['ae_logreg_box_border_radius'] = absint(sanitize_text_field( $input['ae_logreg_box_border_radius'] ));
	        }

	        if( isset( $input['ae_logreg_box_border_color'] ) && !empty($input['ae_logreg_box_border_color']) ){
	            
	            $logreg_boxbordercolor = trim( $input['ae_logreg_box_border_color'] );
	            $logreg_boxbordercolor = strip_tags( stripslashes( $logreg_boxbordercolor ) );

	            if( FALSE == ae_admin_valid_hex_color( $logreg_boxbordercolor ) ) {
	                add_settings_error( 'ae_admin_customizer_logreg_options', 'ae_logreg_box_border_color_error', 'Invalid color for Box border color', 'error' ); 
	                 
	                $new_input['ae_logreg_box_border_color'] = $options['ae_logreg_box_border_color'];
	            } else {
	                $new_input['ae_logreg_box_border_color'] = $logreg_boxbordercolor;
	            }
	        } 

	        if( isset( $input['ae_logreg_box_border_thick'] ) ){
	            $new_input['ae_logreg_box_border_thick'] = absint(sanitize_text_field( $input['ae_logreg_box_border_thick'] ));
	        }

	        if( isset( $input['ae_logreg_box_width'] ) ){
	            $new_input['ae_logreg_box_width'] = absint(sanitize_text_field( $input['ae_logreg_box_width'] ));
	        }else{
	        	$new_input['ae_logreg_box_width'] = 320;
	        }


	        if( isset( $input['ae_logreg_use_image_background'] ) ){
	            $new_input['ae_logreg_use_image_background'] = 1;
	        }else{
	            delete_option($option["ae_logreg_use_image_background"]);
	        }

	        if( isset( $input['ae_logreg_image_background'] ) ){
	            $new_input['ae_logreg_image_background'] = sanitize_text_field( $input['ae_logreg_image_background'] );
	        }

	        if( isset( $input['ae_logreg_image_background_blend_color'] ) && !empty($input['ae_logreg_image_background_blend_color']) ){
	            
	            $ae_bg_color_blend = trim( $input['ae_logreg_image_background_blend_color'] );
	            $ae_bg_color_blend = strip_tags( stripslashes( $ae_bg_color_blend ) );

	            if( FALSE == ae_admin_valid_hex_color( $ae_bg_color_blend ) ) {
	                add_settings_error( 'ae_admin_customizer_logreg_options', 'ae_logreg_image_background_blend_color_error', 'Invalid color for Background Image Color Blend', 'error' ); 
	                 
	                $new_input['ae_logreg_image_background_blend_color'] = $options['ae_logreg_image_background_blend_color'];
	            } else {
	                $new_input['ae_logreg_image_background_blend_color'] = $ae_bg_color_blend;
	            }
	        } 

	        return $new_input;
	    }


		/**
		* Login & Registration Basic Setting Description
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		* @return string
		*/
	    public static function logreg_setting_info(){
	        echo "<p>" . __("Customize Login and Registration by setting up the colors for each elements below.", "ae-admin-customizer" ) . "</p>";
	    }

		/**
		* Login & Registration Box Setting Description
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		* @return string
		*/
	    public static function logreg_box_setting_info(){
	        echo "<p>" . __("Customize Login and Registration Box", "ae-admin-customizer" ) . "</p>";
	    }

		/**
		* Login & Registration Background Image Setting Description
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		* @return string
		*/
	    public static function logreg_bgimage_setting_info(){
	        echo "<p>" . __("Customize Login and Registration by adding a background image", "ae-admin-customizer" ) . "</p>";
	    }


		/**
		* Customizer Button linked to wordpress customizer for live preview
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		* @return html
		*/
	    public static function ae_admin_edit_with_live_callback(){
			global $wp;
			$current_url 		= admin_url("admin.php?page=ae-admin-customizer&tab=login-registration-styling");
			$customize_url 		= admin_url("customize.php");
			$login_page_url 	= wp_login_url();

			$url_with_params = $customize_url . "?return=" . urlencode($current_url) . "&url=" . urlencode($login_page_url);
	    	echo "<a href='" . $url_with_params . "' class='button button-primary button-large'><span class='dashicons dashicons-admin-appearance'></span>". __("Customize with Live Preview", "ae-admin-customizer") . "</a><br /><small><i>" . __("Use the setting below if you are having trouble using the Customizer with Live Preview", "ae-admin-customizer") . "</i></small>";
	    }

		/**
		* Basic Setting Background Color Picker
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		* @return html
		*/
	    public static function ae_logreg_bgcolor_picker_callback(){
	    	$options = get_option( 'ae_admin_customizer_logreg_options' );
	        printf(
	            '<input type="text" id="ae_logreg_bgcolor_picker" name="ae_admin_customizer_logreg_options[ae_logreg_bgcolor_picker]" value="%s" />',
	            isset( $options['ae_logreg_bgcolor_picker'] ) ? esc_attr( $options['ae_logreg_bgcolor_picker']) : ''
	        );
	    }

		/**
		* Basic Setting Text Color Picker
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		* @return html
		*/
	    public static function ae_logreg_textcolor_picker_callback(){
	    	$options = get_option( 'ae_admin_customizer_logreg_options' );
	        printf(
	            '<input type="text" id="ae_logreg_textcolor_picker" name="ae_admin_customizer_logreg_options[ae_logreg_textcolor_picker]" value="%s" />',
	            isset( $options['ae_logreg_textcolor_picker'] ) ? esc_attr( $options['ae_logreg_textcolor_picker']) : ''
	        );
	    }

		/**
		* Basic Setting Link Color Picker
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		* @return html
		*/
	    public static function ae_logreg_linkcolor_picker_callback(){
	    	$options = get_option( 'ae_admin_customizer_logreg_options' );
	        printf(
	            '<input type="text" id="ae_logreg_linkcolor_picker" name="ae_admin_customizer_logreg_options[ae_logreg_linkcolor_picker]" value="%s" />',
	            isset( $options['ae_logreg_linkcolor_picker'] ) ? esc_attr( $options['ae_logreg_linkcolor_picker']) : ''
	        );
	    }


		/**
		* Basic Setting Button Color Picker
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		* @return html
		*/
	    public static function ae_logreg_buttoncolor_picker_callback(){
	    	$options = get_option( 'ae_admin_customizer_logreg_options' );
	        printf(
	            '<input type="text" id="ae_logreg_buttoncolor_picker" name="ae_admin_customizer_logreg_options[ae_logreg_buttoncolor_picker]" value="%s" />',
	            isset( $options['ae_logreg_buttoncolor_picker'] ) ? esc_attr( $options['ae_logreg_buttoncolor_picker']) : ''
	        );
	    }

		/**
		* Box Setting Background Color Picker
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		* @return html
		*/
	    public static function ae_logreg_boxcolor_picker_callback(){
	    	$options = get_option( 'ae_admin_customizer_logreg_options' );
	        printf(
	            '<input type="text" id="ae_logreg_boxcolor_picker" name="ae_admin_customizer_logreg_options[ae_logreg_boxcolor_picker]" value="%s" />',
	            isset( $options['ae_logreg_boxcolor_picker'] ) ? esc_attr( $options['ae_logreg_boxcolor_picker']) : ''
	        );
	    }

		/**
		* Box Setting Rounded Corner Checkbox
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		* @return html
		*/
	    public static function ae_logreg_box_rounded_corners_callback(){
	    	$options = get_option( 'ae_admin_customizer_logreg_options' );
	        $checked = isset( $options['ae_logreg_box_rounded_corners'] ) && $options['ae_logreg_box_rounded_corners'] == 1 ? 'checked' : '';
	        echo "<input type='checkbox' name='ae_admin_customizer_logreg_options[ae_logreg_box_rounded_corners]' id='ae_logreg_box_rounded_corners' value='1' " . $checked . ">";
	    }

		/**
		* Box Setting Border Radius Numeric Input Field
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		* @return html
		*/
	    public static function ae_logreg_box_border_radius_callback(){
	    	$options = get_option( 'ae_admin_customizer_logreg_options' );
	        printf(
	            '<input type="number" id="ae_logreg_box_border_radius" name="ae_admin_customizer_logreg_options[ae_logreg_box_border_radius]" value="%s" /><small><i>'. __('in pixels', "ae-admin-customizer") .'</i></small>',
	            isset( $options['ae_logreg_box_border_radius'] ) ? esc_attr( $options['ae_logreg_box_border_radius']) : 5
	        );
	    }


		/**
		* Box Setting Border Color Picker
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		* @return html
		*/
	    public static function ae_logreg_box_border_color_callback(){
	    	$options = get_option( 'ae_admin_customizer_logreg_options' );
	        printf(
	            '<input type="text" id="ae_logreg_box_border_color" name="ae_admin_customizer_logreg_options[ae_logreg_box_border_color]" value="%s" />',
	            isset( $options['ae_logreg_box_border_color'] ) ? esc_attr( $options['ae_logreg_box_border_color']) : ''
	        );
	    }

		/**
		* Box Setting Border Thickness Input Field
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		* @return html
		*/
	    public static function ae_logreg_box_border_thick_callback(){
	    	$options = get_option( 'ae_admin_customizer_logreg_options' );
	        printf(
	            '<input type="number" id="ae_logreg_box_border_thick" name="ae_admin_customizer_logreg_options[ae_logreg_box_border_thick]" value="%s" /><small><i>'. __('in pixels', "ae-admin-customizer") .'</i></small>',
	            isset( $options['ae_logreg_box_border_thick'] ) ? esc_attr( $options['ae_logreg_box_border_thick']) : 5
	        );
	    }
	    
		/**
		* Box Setting Box Width Input Field
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		* @return html
		*/
	    public static function ae_logreg_box_width_callback(){
	    	$options = get_option( 'ae_admin_customizer_logreg_options' );
	        printf(
	            '<input type="number" id="ae_logreg_box_width" name="ae_admin_customizer_logreg_options[ae_logreg_box_width]" value="%s" /><small><i>'. __('in pixels', "ae-admin-customizer") .'</i></small>',
	            isset( $options['ae_logreg_box_width'] ) ? esc_attr( $options['ae_logreg_box_width']) : 320
	        );
	    }

		/**
		* Image Background Use Image as Background Checkbox
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		* @return html
		*/
	    public static function ae_logreg_use_image_background_callback(){
	    	$options = get_option( 'ae_admin_customizer_logreg_options' );
	        $checked = isset( $options['ae_logreg_use_image_background'] ) && $options['ae_logreg_use_image_background'] == 1 ? 'checked' : '';
	        echo "<input type='checkbox' name='ae_admin_customizer_logreg_options[ae_logreg_use_image_background]' id='ae_logreg_use_image_background' value='1' " . $checked . "> <small><i>(" . __("Will default to background color if no image is selected.", "ae-admin-customizer") . ")</i></small>";
	    }

		/**
		* Image Background Preview Image, Select Image Button
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		* @return html
		*/
	    public static function ae_logreg_image_background_callback(){
	    	$options = get_option( 'ae_admin_customizer_logreg_options' );

	        if(isset($options['ae_logreg_image_background']) && $options['ae_logreg_image_background'] != null && !empty($options['ae_logreg_image_background'])){
	                $background_image = $options['ae_logreg_image_background'];
	        }else{
	                $background_image = plugins_url('/assets/image/no-image.png', AE_ADMIN_CUSTOMIZER_PLUGIN__FILE__ );
	        }

	        echo "<img src='" . $background_image . "' style='max-height : 150px;background-color : #aeaeae;' id='ae_logreg_image_background_img'> <br />";
	        echo "<button type='button' class='button button-primary' value='Upload Logo' id='ae_admin_login_background_btn'>Select Background Image</button>";
	        printf(
	                '<input type="hidden" id="ae_logreg_image_background" name="ae_admin_customizer_logreg_options[ae_logreg_image_background]" value="%s" />',
	                isset( $options['ae_logreg_image_background'] ) ? esc_attr( $options['ae_logreg_image_background']) : ''
	        );
	    }


		/**
		* Image Background Blend Color Picker
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		* @return html
		*/
	    public static function ae_logreg_image_background_blend_color_callback(){
	    	$options = get_option( 'ae_admin_customizer_logreg_options' );
	        printf(
	            '<input type="text" id="ae_logreg_image_background_blend_color" name="ae_admin_customizer_logreg_options[ae_logreg_image_background_blend_color]" value="%s" />',
	            isset( $options['ae_logreg_image_background_blend_color'] ) ? esc_attr( $options['ae_logreg_image_background_blend_color']) : ''
	        );
	    }

		/**
		* Enqueue Login Customization Scripts
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		*/
	    public static function ae_admin_customizer_login_enqueue() { 
		        wp_enqueue_style( 'ae-admin-customizer-login-css', plugins_url('/assets/css/login.css', AE_ADMIN_CUSTOMIZER_PLUGIN__FILE__ ), false, '1.0.0');
		        wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Lato|Roboto', false );
	    }


		/**
		* Implement Configuration and Render the CSS
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		*/
	    public static function ae_login_page_implement_customization(){
		        $options 			= get_option( 'ae_admin_customizer_options' );
		        $ae_logreg_options 	= get_option( 'ae_admin_customizer_logreg_options' );

		        $ae_the_logo = isset($options['ae_admin_dashboard_logo']) && !empty($options['ae_admin_dashboard_logo']) ? $options['ae_admin_dashboard_logo'] : null;

		        $bg_color = isset( $ae_logreg_options["ae_logreg_bgcolor_picker"] ) && ae_admin_valid_hex_color($ae_logreg_options["ae_logreg_bgcolor_picker"] ) ? $ae_logreg_options["ae_logreg_bgcolor_picker"] : "#f1f1f1"; 

		        $use_image_bg =  isset( $ae_logreg_options["ae_logreg_use_image_background"] ) && $ae_logreg_options["ae_logreg_use_image_background"] == 1 ? true : false;

		        $background_image = isset( $ae_logreg_options["ae_logreg_image_background"] ) && !empty($ae_logreg_options["ae_logreg_image_background"]) ? $ae_logreg_options["ae_logreg_image_background"] : false;

		        $text_color = isset( $ae_logreg_options["ae_logreg_textcolor_picker"] ) && ae_admin_valid_hex_color($ae_logreg_options["ae_logreg_textcolor_picker"]) ? $ae_logreg_options["ae_logreg_textcolor_picker"] : null;

		        $link_color = isset( $ae_logreg_options["ae_logreg_linkcolor_picker"] ) && ae_admin_valid_hex_color($ae_logreg_options["ae_logreg_linkcolor_picker"]) ? $ae_logreg_options["ae_logreg_linkcolor_picker"] : null; 

		        $button_color = isset( $ae_logreg_options["ae_logreg_buttoncolor_picker"] ) && ae_admin_valid_hex_color($ae_logreg_options["ae_logreg_buttoncolor_picker"]) ? $ae_logreg_options["ae_logreg_buttoncolor_picker"] : null;

		        $box_color = isset( $ae_logreg_options["ae_logreg_boxcolor_picker"] ) && ae_admin_valid_hex_color($ae_logreg_options["ae_logreg_boxcolor_picker"]) ? $ae_logreg_options["ae_logreg_boxcolor_picker"] : null; 

		        $box_rounded =  isset( $ae_logreg_options["ae_logreg_box_rounded_corners"] ) && $ae_logreg_options["ae_logreg_box_rounded_corners"] == 1 ? true : false;

		        $box_radius = isset( $ae_logreg_options["ae_logreg_box_border_radius"] ) && !empty($ae_logreg_options["ae_logreg_box_border_radius"]) ? absint($ae_logreg_options["ae_logreg_box_border_radius"]) : 0;

		        $box_border_color = isset( $ae_logreg_options["ae_logreg_box_border_color"] ) && ae_admin_valid_hex_color($ae_logreg_options["ae_logreg_box_border_color"]) ? $ae_logreg_options["ae_logreg_box_border_color"] : null;


		        $box_border_thick = isset( $ae_logreg_options["ae_logreg_box_border_thick"] ) && !empty($ae_logreg_options["ae_logreg_box_border_thick"]) ? absint($ae_logreg_options["ae_logreg_box_border_thick"]) : 0;

		        $box_width = isset( $ae_logreg_options["ae_logreg_box_width"] ) && !empty($ae_logreg_options["ae_logreg_box_width"]) ? absint($ae_logreg_options["ae_logreg_box_width"]) : 320;


		        $blend_color = isset( $ae_logreg_options["ae_logreg_image_background_blend_color"] ) && ae_admin_valid_hex_color($ae_logreg_options["ae_logreg_image_background_blend_color"]) ? $ae_logreg_options["ae_logreg_image_background_blend_color"] : "#FFFFFF"; 

		         ?>
		            <style type="text/css">
		            <?php if($ae_the_logo != null){ ?>
		                #login h1 a, .login h1 a {
		                    background-image: url(<?php echo $ae_the_logo; ?>);
							max-width: <?php echo $box_width; ?>px !important;
						    width: 100% !important;
						    margin: 10px auto;
						    padding: 0;
						    background-size: contain;
						    background-position: center;
						    height: 100px;
		                    <?php if($link_color != null) { ?>
		                    color : <?php echo $link_color; ?> !important;
		                    <?php } ?>
		                }
		            <?php } ?>
					<?php if($link_color != null) { ?>
		                .login #backtoblog a, .login #nav a { color : <?php echo $link_color; ?> !important; }
		            <?php } ?>
		            <?php if($text_color != null) { ?>
		            	#login label,
		                #login h1,
		                #login p, #login span { color : <?php echo $text_color; ?> !important; }
		            <?php } ?>
		            <?php if($button_color != null) { ?>
		                .wp-core-ui .button-primary, .button{ background : <?php echo $button_color; ?> !important; border : none !important; box-shadow: none !important; text-shadow: none !important; transition: all 0.5s; }

		                .wp-core-ui .button-primary.active, .wp-core-ui .button-primary.active:focus,  .wp-core-ui .button-primary:hover,  .wp-core-ui .button-primary:active { opacity : 0.8 !important;}
		            <?php } ?>
		            <?php if($box_color != null) { ?>
		                .login form { background : <?php echo $box_color; ?> !important;}
		            <?php } ?>
		            <?php if($box_width != null) { ?>
		            	#login 
		            	{ 
		            		width: 100% !important;
		            		max-width : <?php echo $box_width; ?>px !important;
		            	}
		            <?php } ?>
		            <?php if($box_rounded != null && $box_radius != null) { ?>
		            	#login form{ border-radius : <?php echo $box_radius; ?>px !important;}
		            <?php } ?>
		            <?php if($box_border_color != null) { ?>
		            	#login form{ border-color : <?php echo $box_border_color; ?> !important;}
		            <?php } ?>
		            <?php if($box_border_thick != null) { ?>
		            	#login form{ border : <?php echo $box_border_thick; ?>px solid <?php echo $box_border_color; ?> !important;}
		            <?php } ?>
		            <?php if($use_image_bg && (bool) $background_image){ ?>
		                body { 
		                		background-image: url(<?php echo $background_image; ?>) !important; 
		                		background-size: cover !important; background-repeat: no-repeat !important; 
		                		background-position: center !important; 
		                		color : <?php echo $text_color; ?> !important; 
		                		background-blend-mode: multiply !important;
		                		background-color : <?php echo $blend_color; ?> !important;
		                }
		            <?php }else{ ?>
		            	<?php if($bg_color != null ){ ?>
		                     body { background:  <?php echo $bg_color; ?> !important; }
		                <?php } ?>
		           
	    			<?php } ?>
	    			 </style>
	    			 <?php

				    /**
					* Included Custom Css Customization to the rendered CSS
					* @author Allan Empalmado (AppDevPH)
					* @since : 1.0.1
					*/
	    			 $custom_css_options = get_option( 'ae_admin_customizer_custom_css' );
	    			 $css_styling = isset($custom_css_options['ae_custom_css_logreg']) && !empty($custom_css_options['ae_custom_css_logreg']) ? "<style type='text/css'>" . $custom_css_options['ae_custom_css_logreg'] . "</style>" : "";

	        		 echo $css_styling;
	    }

	    /**
		* Login Header URL 
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		*/
	    public static function ae_admin_customizer_login_url() {  return home_url(); }

	    /**
		* Login Header Title 
		* @author Allan Empalmado (AppDevPH)
		* @since : 1.0.0
		*/
	    public static function ae_admin_customizer_login_title() { return get_option( 'blogname' ); }

	}

	new AE_Admin_Login_Registration_Styling();
