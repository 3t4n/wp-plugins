<?php

namespace Aims\Aims_cf7;


/**
 * Assets handlers class
 */
class Assets {

    /**
     * Class constructor
     */
    function __construct() {

        add_action( 'wp_enqueue_scripts', [ $this, 'register_assets' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'register_assets' ] );

    }

    /**
     * All available scripts
     *
     * @return array
     */
    public function get_scripts() {

        return [
            'aims_cf7-toastr-script' => [
                'src'     => Aims_cf7_ASSETS . '/js/toastr.min.js',
                'version' => filemtime( Aims_cf7_PATH . '/assets/js/toastr.min.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'aims_cf7-frontend-script' => [
                'src'     => Aims_cf7_ASSETS . '/js/frontend.js',
                'version' => filemtime( Aims_cf7_PATH . '/assets/js/frontend.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'aims_cf7-admin-script' => [
                'src'     => Aims_cf7_ASSETS . '/js/admin.js',
                'version' => filemtime( Aims_cf7_PATH . '/assets/js/admin.js' ),
                'deps'    => [ 'jquery' ]
            ]
        ];
        
    }

    /**
     * All available styles
     *
     * @return array
     */
    public function get_styles() {

        return [
            'aims_cf7-front-style' => [
                'src'     => Aims_cf7_ASSETS . '/css/toastr.min.css',
                'version' => filemtime( Aims_cf7_PATH . '/assets/css/toastr.min.css' )
            ],
            'aims_cf7-admin-style' => [
                'src'     => Aims_cf7_ASSETS . '/css/admin.css',
                'version' => filemtime( Aims_cf7_PATH . '/assets/css/admin.css' )
            ]
        ];

    }

    /**
     * Register scripts and styles
     *
     * @return void
     */
    public function register_assets() {

        $scripts = $this->get_scripts();
        $styles  = $this->get_styles();

        foreach ( $scripts as $handle => $script ) {
            $deps = isset( $script['deps'] ) ? $script['deps'] : false;

            wp_register_script( $handle, $script['src'], $deps, $script['version'], true );
        }

        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            wp_register_style( $handle, $style['src'], $deps, $style['version'] );
        }

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