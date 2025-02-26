<?php
/**
 * Mindloop_Disclaimer
 * 
 * Wordpress plugin that will allow the displaying of a legal disclaimer that the
 * visitor will have to accept before being able to view the site.
 *
 */
class Mindloop_Disclaimer
{

    /**
     * String that will hold the plugin directory
     * Is set by the constructor
     */
    private static $_pluginDir = '';

    /**
     * Constructor for the plugin, will set up all the hooks
     *
     * @param string $dir
     * @access public
     * @return void
     */
    public function __construct($dir)
    {
        self::$_pluginDir = $dir;
        add_shortcode( 'disclaimer', array('Mindloop_Disclaimer','shortcode') );
        add_action( 'wp_footer', array('Mindloop_Disclaimer', 'addFooterDiv'), 100 );
        add_action('admin_menu', array('Mindloop_Disclaimer', 'addAdminMenu'));
        add_action('init'      , array('Mindloop_Disclaimer', 'init'));
    }

    /**
     * Init hook
     * Will show the popup if needed
     *
     * @access public
     * @return void
     */
    public static function init()
    {
        //sidewide disclaimer should be triggered on every page
        //even if no [disclaimer] shortCode is present
        if(!is_admin() && get_option('mind_disclaimer_sidewide')) {
            self::displayPopup();  
        }
    }

    /**
     * Install hook, responsible for writing all settings to the database
     *
     * @static
     * @access public
     * @return void
     */
    public static function installation()
    {
        add_option('mind_disclaimer_sidewide', 'no');
        add_option('mind_disclaimer_text', 'We use cookies to ensure that we give you the best experience on our website. We also use cookies to ensure we show you advertising that is relevant to you. By accepting this aggreement you indicate that you are willing to receive all cookies on this website.');
        add_option('mind_disclaimer_title', 'Disclaimer');
        add_option('mind_accept_text', 'I accept the terms in the license agreement');
        add_option('mind_disclaimer_show_once', 'yes');
    }

    
    /**
     * Method that will add our administrator menu to wordpress
     *
     * @static
     * @access public
     * @return void
     */
    public static function addAdminMenu()
    {
        add_menu_page('Disclaimer Options', 
                      'Disclaimer', 
                      'administrator', 
                      'mindloop_disclaimer_settings', 
                      array('Mindloop_Disclaimer', 'admin_settings'));

    }


    /**
     * Method that is responsible for rendering the settings page
     *
     * @static
     * @access public
     * @return void
     */
    public static function admin_settings()
    {
        $sidewideProtection = (get_option('mind_disclaimer_sidewide') == 'yes') ? 'checked="checked"' : '';
        $text               =  get_option('mind_disclaimer_text');
        $title              =  get_option('mind_disclaimer_title');
        $acceptText         =  get_option('mind_accept_text', 'I accept the terms in the license agreement');
        $showOnce           = (get_option('mind_disclaimer_show_once') == 'yes') ? 'checked="checked"' : '';

        //create settings for html editor that will be used to update the disclaimer text
        $settings = array(
            'teeny' => true,
            'textarea_rows' => 15,
            'tabindex' => 1,
            'media_buttons' => false,
            'wpautop' => true,

        );
        include(self::$_pluginDir.'includes/view_admin.php');
    }

    /**
     * Method that is hooked to the [disclaimer] shortcode
     *
     * @param mixed $attributes
     * @static
     * @access public
     * @return void
     */
    public static function shortcode( $attributes )
    {
        self::displayPopup();
    }

    /**
     * Method that will enqueue all the needed js and css
     * so that the plugin can render succesfully 
     *
     * @static
     * @access public
     * @return void
     */
    public static function displayPopup()
    {
        $jsUrl  = plugins_url( 'js/popup.js'   , dirname(__FILE__) );
        $cssUrl = plugins_url( 'css/popup.css' , dirname(__FILE__) );

        $params = array('title'          => get_option('mind_disclaimer_title'),
                        'text'           => wpautop(get_option('mind_disclaimer_text')),
                        'showOnlyOnce'   => get_option('mind_disclaimer_show_once'),
                        'accept'         => get_option('mind_accept_text'),
                    );

        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'disclaimer_popup', $jsUrl,  array(), '1.0.0', true );
        wp_enqueue_style ( 'disclaimer_popup', $cssUrl, array());
        wp_localize_script( 'disclaimer_popup', 'mind_disclaimer_settings', $params );
    }

    /**
     * Method that is hooked to the footer hook, will add a div that can hold the popup
     *
     * @static
     * @access public
     * @return void
     */
    public static function addFooterDiv()
    {
        echo '<div id="mindloop_disclaimer"></div>';
    }
}
