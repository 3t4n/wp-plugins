<?php

namespace Aims\Aims_cf7;

/**
 * Installer class
 */
class Installer {

    /**
     * Run the installer
     *
     * @return void
     */
    public function run() {
        $this->add_version();
        $this->create_default_setting_option();
    }

    /**
     * Add time and version on DB
     */
    public function add_version() {
        $installed = get_option( 'aims_cf7_js_installed');

        if( ! $installed ){
            update_option('aims_cf7_js_installed', time() );
        }

        update_option('aims_cf7_js_version', Aims_cf7_VERSION);
    }

    /**
     * Create necessary database tables
     *
     * @return void
     */
    public function create_default_setting_option() {
        

        $aims_cf7_settings_enable = get_option( 'aims_cf7_settings_enable');
        if( ! $aims_cf7_settings_enable ){
            update_option('aims_cf7_settings_enable', 'on' );
        }

        $aims_cf7_settings_default_notice_disable = get_option( 'aims_cf7_settings_default_notice_disable');
        if( ! $aims_cf7_settings_default_notice_disable ){
            update_option('aims_cf7_settings_default_notice_disable', 'on' );
        }
        
        $aims_cf7_settings_close_button = get_option( 'aims_cf7_settings_close_button');
        if( ! $aims_cf7_settings_close_button ){
            update_option('aims_cf7_settings_close_button', '' );
        }
        
        $aims_cf7_settings_progress_bar = get_option( 'aims_cf7_settings_progress_bar');
        if( ! $aims_cf7_settings_progress_bar ){
            update_option('aims_cf7_settings_progress_bar', '' );
        }
        
        $aims_cf7_settings_custom_settings_disable = get_option( 'aims_cf7_settings_custom_settings_disable');
        if( ! $aims_cf7_settings_custom_settings_disable ){
            update_option('aims_cf7_settings_custom_settings_disable', '' );
        }

        $aims_cf7_settings_box_position = get_option( 'aims_cf7_settings_box_position');
        if( ! $aims_cf7_settings_box_position ){
            update_option('aims_cf7_settings_box_position', 'top-right' );
        }

        $aims_cf7_settings_show_popup_timeout = get_option( 'aims_cf7_settings_show_popup_timeout');
        if( ! $aims_cf7_settings_show_popup_timeout ){
            update_option('aims_cf7_settings_show_popup_timeout', 5 );
        }


    }

    
}