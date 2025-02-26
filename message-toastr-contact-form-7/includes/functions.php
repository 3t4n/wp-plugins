<?php 
defined('ABSPATH') or die("No direct script access!");

if ( ! function_exists( 'aims_cf7_load_script_style' ) ) {
    function aims_cf7_load_script_style(){
    
        $aims_cf7_settings_enable = get_option('aims_cf7_settings_enable') ? get_option('aims_cf7_settings_enable'): '';

        if( isset( $aims_cf7_settings_enable ) && $aims_cf7_settings_enable == 'on' ){

            wp_enqueue_script( 'aims_cf7-toastr-script' );
            wp_enqueue_style( 'aims_cf7-front-style' );
            wp_enqueue_script( 'aims_cf7-frontend-script' );

        }

        $aims_cf7_custom_style = "";

        $aims_cf7_settings_text_color = get_option('aims_cf7_settings_text_color') ? get_option('aims_cf7_settings_text_color'): '#fff';
        
        $aims_cf7_custom_style .= "body #toast-container .toast{color: ".$aims_cf7_settings_text_color."  !important;}";

        $aims_cf7_settings_success_bg_color = get_option('aims_cf7_settings_success_bg_color') ? get_option('aims_cf7_settings_success_bg_color'): 'green';
        
        $aims_cf7_custom_style .= "body #toast-container .toast-success{background: ".$aims_cf7_settings_success_bg_color."  !important;}";

        $aims_cf7_settings_warning_bg_color = get_option('aims_cf7_settings_warning_bg_color') ? get_option('aims_cf7_settings_warning_bg_color'): 'coral';
        
        $aims_cf7_custom_style .= "body #toast-container .toast-warning{background: ".$aims_cf7_settings_warning_bg_color."  !important;}";

        $aims_cf7_settings_error_bg_color = get_option('aims_cf7_settings_error_bg_color') ? get_option('aims_cf7_settings_error_bg_color'): 'red';
        
        $aims_cf7_custom_style .= "body #toast-container .toast-error{background: ".$aims_cf7_settings_warning_bg_color."  !important;}";


        $aims_cf7_settings_custom_settings_disable = get_option('aims_cf7_settings_custom_settings_disable') ? get_option('aims_cf7_settings_custom_settings_disable'): '';

        if( isset( $aims_cf7_settings_custom_settings_disable ) && $aims_cf7_settings_custom_settings_disable == 'on' ){

            wp_add_inline_style( 'aims_cf7-front-style', $aims_cf7_custom_style );
        }


        $dataarray =  array( 
            'ajaxurl'                       => admin_url( 'admin-ajax.php' ),
            'msg_text'                      => get_option( 'aims_cf7_settings_success_msg_text' ),
            'position'                      => get_option( 'aims_cf7_settings_box_position' ),
            'default_notice_disable'        => get_option( 'aims_cf7_settings_default_notice_disable' ),
            'close_button'                  => get_option( 'aims_cf7_settings_close_button' ),
            'progress_bar'                  => get_option( 'aims_cf7_settings_progress_bar' ),
            'prevent_duplicates'            => get_option( 'aims_cf7_settings_prevent_duplicates' ),
            'show_popup_duration'           => get_option( 'aims_cf7_settings_show_popup_duration' ),
            'hide_popup_duration'           => get_option( 'aims_cf7_settings_hide_popup_duration' ),
            'show_popup_timeout'            => get_option( 'aims_cf7_settings_show_popup_timeout' ),
        );


        wp_localize_script( 'aims_cf7-frontend-script', 'aims_cf7_msg', $dataarray);

    }
    
}
//add_action( 'wp_enqueue_scripts', 'aims_cf7_load_script_style' );