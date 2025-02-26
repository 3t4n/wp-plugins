<?php

namespace Aims\Aims_cf7;

/**
 * The admin
 */
class Admin{
    
    function __construct(){
        // code...
        
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
        add_action( 'admin_init', [ $this, 'aims_cf7_register_plugin_settings' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'admin_asset_enqueue_script' ] );
    }


    public function admin_menu() {
        $parent_slug = 'aims-cf7-admin';
        $capability = 'manage_options';

        add_menu_page( 
            __( 'Toastr Message', 'message-toastr-contact-form-7' ), 
            __( 'Toastr Message', 'message-toastr-contact-form-7' ), 
            $capability, 
            $parent_slug, 
            [ $this, 'plugin_settings_page' ], 
            'dashicons-bell', 
            25
        );

       /* 
        add_submenu_page( 
            $parent_slug, 
            __( 'Toastr Message', 'message-toastr-contact-form-7' ), 
            __( 'Toastr Message', 'message-toastr-contact-form-7' ), 
            $capability, 
            'aims-cf7-admin', 
            [ $this, 'plugin_settings_page' ] 
        );
        */

    }


    public function plugin_settings_page(){
        
        require_once( Aims_cf7_PATH .'/includes/Settings.php');

    }


    public function admin_asset_enqueue_script( ) {

        $screen = get_current_screen();

        // var_dump( $screen );

        if( isset( $screen->base ) &&  $screen->base == 'toplevel_page_aims-cf7-admin' ){

            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_script( 'wp-color-picker');

            wp_enqueue_script( 'aims_cf7-admin-script' );
            wp_enqueue_style( 'aims_cf7-admin-style' );

        }
        
        
    }
    
    public function aims_cf7_register_plugin_settings(){    


        $args = array(
            'type' => 'string', 
            'sanitize_callback' => 'sanitize_text_field',
            'default' => NULL,
        );  

        $args_email = array(
            'type' => 'string', 
            'sanitize_callback' => 'sanitize_email',
            'default' => NULL,
        );      
        
        register_setting( 'aims-cf7-settings-group', 'aims_cf7_settings_enable', $args );
        register_setting( 'aims-cf7-settings-group', 'aims_cf7_settings_default_notice_disable', $args );
        register_setting( 'aims-cf7-settings-group', 'aims_cf7_settings_close_button', $args );
        register_setting( 'aims-cf7-settings-group', 'aims_cf7_settings_progress_bar', $args );
        register_setting( 'aims-cf7-settings-group', 'aims_cf7_settings_prevent_duplicates', $args );
        register_setting( 'aims-cf7-settings-group', 'aims_cf7_settings_success_msg_text', $args );
        register_setting( 'aims-cf7-settings-group', 'aims_cf7_settings_box_position', $args );

        register_setting( 'aims-cf7-settings-group', 'aims_cf7_settings_show_popup_timeout', $args );
        register_setting( 'aims-cf7-settings-group', 'aims_cf7_settings_custom_settings_disable', $args );
        
        register_setting( 'aims-cf7-settings-group', 'aims_cf7_settings_text_color', $args );
        register_setting( 'aims-cf7-settings-group', 'aims_cf7_settings_success_bg_color', $args );
        register_setting( 'aims-cf7-settings-group', 'aims_cf7_settings_warning_bg_color', $args );
        register_setting( 'aims-cf7-settings-group', 'aims_cf7_settings_error_bg_color', $args );

        
    }


}