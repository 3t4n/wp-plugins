<?php

/**
 * WordPress settings API demo class
 *
 * @author Sagar Paul
 */

if ( ! defined( 'ABSPATH' ) ){
    exit;
}  

if ( !class_exists('Bs_Coupon_Popup_Setting' ) ):

class Bs_Coupon_Popup_Setting {
    private $settings_api;

    /**
     * Holds the class object.
     *
     * @since 1.0
     *
     */

    public static $_instance;

    /**
     * Hold the base Object
     *
     * @since 1.0
     */

    public $base;

     /**
     * Load Construct
     *
     * @since 1.0
     *
     */

    public function __construct() {
        $this->settings_api = new Bs_Coupon_Popup_API;
        add_action( 'admin_init', array($this, 'admin_init') );

        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    public function admin_init() {

        //set the settings

        $this->settings_api->set_sections( $this->get_settings_sections() );

        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings

        $this->settings_api->admin_init();

    }



    public function admin_menu() {

        //$this->base=Bs_Ins_Shortcode_Builder::bs_get_instance();

        add_menu_page('Coupon Popup', 'Coupon Popup','manage_options','ps-coupon-popup-setting',array($this, 'bs_plugin_page'));
        //add_submenu_page('instagram-setting', 'Shortcode Builder', 'Shortcode Builder', 'manage_options', 'instagram-setting-builder', array($this->base,'builder_form'))
    }



    public function get_settings_sections() {

        $sections = array(
            array(
                'id' => 'bs_coupon_popup_basic',
                'title' => __( 'Basic Settings', 'bs_coupon_popup' ),
            ),
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    public function get_settings_fields() {
        $settings_fields = array(
             'bs_coupon_popup_basic' => array(
                array(
                    'name'    => 'bs_coupon_title',
                    'label'   => __( 'Title', 'bs_coupon_popup' ),
                    //'desc'    => __( 'Enter Your Fb Page Url', 'bs_coupon_popup' ),
                    'type'    => 'text',
                    'default' => 'Get 10% Discount For Like Our Page'
                ),
                 array(
                    'name'    => 'bs_coupon_des',
                    'label'   => __( 'Description', 'bs_coupon_popup' ),
                    //'desc'    => __( 'Enter Your Fb Page Url', 'bs_coupon_popup' ),
                    'type'    => 'text',
                    'default' => 'Click Like and get 10% discount coupon. Enter the coupon at the shopping cart page.'
                ),
                  array(
                    'name'    => 'bs_coupon_code',
                    'label'   => __( 'Cupon Code', 'bs_coupon_popup' ),
                    //'desc'    => __( 'Enter Your Fb Page Url', 'bs_coupon_popup' ),
                    'type'    => 'text',
                    'default' => 'YOUR COUPON CODE'
                ),
                
                array(
                    'name'    => 'bs_coupon_popup_pages',
                    'label'   => __( 'Show Popup', 'bs_fb_popup' ),
                    //'desc'    => __( 'Enter Your User ID', 'bs_fb_popup' ),
                    'type'    => 'radio',
                    'options'  =>  array(
                        'ps_home'=> 'HOME',
                        'ps_all_pages'=>'All PAGES'   
                        ),

                    'default' => 'ps_home'

                ),
            ),

        );
        return $settings_fields;
    }



    public function bs_plugin_page() {
        echo '<div class="wrap">';
        // Load the base class object.
        $this->base = new Bs_Coupon_Popup();
        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();
        echo '</div>';



    }
    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    public function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }
        return $pages_options;
    }

    /**
     *
     * Get Option Value
     *
     */
    public function bs_get_option( $option, $section, $default = '' ) {

        $options = get_option( $section );

        if ( isset( $options[$option] ) ) {

            return $options[$option];

        }
        return $default;

    }



    /**

     * The ultimate_portfolio Setting Object.
     *
     * @since 1.0
     *
     */

    public static function bs_get_instance(){
        if(!isset($_instance)){
            self::$_instance=new Bs_Coupon_Popup_Setting();
        }
        return self::$_instance;
    }

}

$Bs_Coupon_Popup_Setting =Bs_Coupon_Popup_Setting::bs_get_instance();

endif;