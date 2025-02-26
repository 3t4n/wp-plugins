<?php

defined( 'ABSPATH' ) OR exit;

global $wpdb ;

/**
 * Hob_ac_Setup
 * 
 * @package Advanced Cookies
 * @author url: https://www.hob-france.com/
 * @author email info@hob-fr.com
 */
class Hob_ac_Setup
{
    protected static $instance;
    
    /**
     * init
     *
     * @return void
     */
    public static function init()
    {
        is_null( self::$instance ) AND self::$instance = new self;
        return self::$instance;
    }
    
    /**
     * on_activation
     *
     * @return void
     */
    public static function on_activation()
    {
        if ( ! current_user_can( 'activate_plugins' ) )
            return;

        $plugin = isset( $_REQUEST['plugin'] ) ? sanitize_text_field($_REQUEST['plugin']) : '';
        
        check_admin_referer( "activate-plugin_{$plugin}" );

        // require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        $hob_ac_settings = new Hob_ac_settings;
        $hob_ac_settings->hob_ac_options();
    }
    
    /**
     * on_deactivation
     *
     * @return void
     */
    public static function on_deactivation()
    {
        if ( ! current_user_can( 'activate_plugins' ) )
            return;
        $plugin = isset( $_REQUEST['plugin'] ) ? sanitize_text_field($_REQUEST['plugin']) : '';
        check_admin_referer( "deactivate-plugin_{$plugin}" );

        $hob_ac_settings = new Hob_ac_settings;
        $hob_ac_settings->hob_ac_delete_options();

        // require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    }

}