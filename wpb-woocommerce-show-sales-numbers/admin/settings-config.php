<?php

/*
    WPB WooCommerce Show Sales Numbers
    By WPBean
    
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


if ( !class_exists('wpb_wssn_settings' ) ):
class wpb_wssn_settings {

    private $settings_api;

    function __construct() {
        $this->settings_api = new WeDevs_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
        add_options_page( __( 'WooCommerce Show Sales',WPB_WSSN_TEXTDOMAIN ), __( 'WooCommerce Show Sales',WPB_WSSN_TEXTDOMAIN ), 'delete_posts', 'wpb-woocommerce-show-sales-numbers', array($this, 'wpb_wssn_plugin_page') );
    }

    function get_settings_sections() {
        $sections = array(
        	array(
                'id' => 'general_settings',
                'title' => __( 'General Settings', WPB_WSSN_TEXTDOMAIN )
            ),
            array(
                'id' => 'style_settings',
                'title' => __( 'Style Settings', WPB_WSSN_TEXTDOMAIN )
            )
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
        	'general_settings' => array(
        		array(
                    'name'    => 'wssn_type',
                    'label'   => __( 'Sales count type', WPB_WSSN_TEXTDOMAIN ),
                    'desc'    => __( 'Select sales count type, Default button style.', WPB_WSSN_TEXTDOMAIN ),
                    'type'    => 'select',
                    'default' => 'btn_style',
                    'options' => array(
                        'btn_style' 			=> __( 'Button Style', WPB_WSSN_TEXTDOMAIN ),
                        'normal_text' 			=> __( 'Normal Text', WPB_WSSN_TEXTDOMAIN ),
                    )
                ),
                array(
                    'name'  => 'wssn_disable_for_zero_sale',
                    'label' => __( 'Disable if no sale', WPB_WSSN_TEXTDOMAIN ),
                    'desc'  => __( 'Disable showing the sale count, if no sale.', WPB_WSSN_TEXTDOMAIN ),
                    'type'  => 'checkbox'
                ),
        		array(
                    'name'    => 'wssn_location',
                    'label'   => __( 'Select a placement', WPB_WSSN_TEXTDOMAIN ),
                    'desc'    => __( 'Select a placement, where the sales number will show in single product page.', WPB_WSSN_TEXTDOMAIN ),
                    'type'    => 'select',
                    'default' => 'woocommerce_single_product_summary',
                    'options' => array(
                        'woocommerce_single_product_summary' 			=> __( 'Single product summary', WPB_WSSN_TEXTDOMAIN ),
                        'woocommerce_before_main_content' 				=> __( 'Before main content', WPB_WSSN_TEXTDOMAIN ),
                        'woocommerce_after_main_content'  				=> __( 'After main content', WPB_WSSN_TEXTDOMAIN ),
                        'woocommerce_before_single_product'  			=> __( 'Before single product', WPB_WSSN_TEXTDOMAIN ),
                        'woocommerce_after_single_product'  			=> __( 'After single product', WPB_WSSN_TEXTDOMAIN ),
                        'woocommerce_before_single_product_summary'  	=> __( 'Before single product summary', WPB_WSSN_TEXTDOMAIN ),
                        'woocommerce_after_single_product_summary'  	=> __( 'After single product summary', WPB_WSSN_TEXTDOMAIN ),
                    )
                ),
                array(
                    'name'              => 'wssn_priority',
                    'label'             => __( 'Placement priority', WPB_WSSN_TEXTDOMAIN ),
                    'desc'              => __( 'WordPress hook priority, Default 30', WPB_WSSN_TEXTDOMAIN ),
                    'type'              => 'number',
                    'default'           => 30,
                    'sanitize_callback' => 'intval'
                ),
                array(
                    'name'              => 'before_sale_count',
                    'label'             => __( 'Before sale count', WPB_WSSN_TEXTDOMAIN ),
                    'desc'              => __( 'Text before sale count', WPB_WSSN_TEXTDOMAIN ),
                    'type'              => 'text',
                    'default'           => __( 'Item: ', WPB_WSSN_TEXTDOMAIN ),
                ),
                array(
                    'name'              => 'after_sale_count_singular',
                    'label'             => __( 'After sale count', WPB_WSSN_TEXTDOMAIN ),
                    'desc'              => __( 'Text after sale count. [ If count is singular ]', WPB_WSSN_TEXTDOMAIN ),
                    'type'              => 'text',
                    'default'           => __( ' Sale', WPB_WSSN_TEXTDOMAIN ),
                ),
                array(
                    'name'              => 'after_sale_count_plural',
                    'label'             => __( 'After sale count', WPB_WSSN_TEXTDOMAIN ),
                    'desc'              => __( 'Text after sale count. [ If count is plural ]', WPB_WSSN_TEXTDOMAIN ),
                    'type'              => 'text',
                    'default'           => __( ' Sales', WPB_WSSN_TEXTDOMAIN ),
                ),
        	),
			'style_settings' => array(
				array(
                    'name'    => 'wssn_color',
                    'label'   => __( 'Sale count Color', WPB_WSSN_TEXTDOMAIN ),
                    'desc'    => __( 'Default: None. Will take style form your theme.', WPB_WSSN_TEXTDOMAIN ),
                    'type'    => 'color',
                ),
                array(
                    'name'              => 'wssn_font_size',
                    'label'             => __( 'Sale count Font Size', WPB_WSSN_TEXTDOMAIN ),
                    'desc'              => __( 'Default: None. Will take style form your theme.', WPB_WSSN_TEXTDOMAIN ),
                    'type'              => 'number',
                ),
				array(
                    'name'  => 'wssn_custom_css',
                    'label' => __( 'Custom CSS', WPB_WSSN_TEXTDOMAIN ),
                    'desc'  => __( 'You can put your custom CSS code here.', WPB_WSSN_TEXTDOMAIN ),
                    'type'  => 'textarea'
                ),
			)
        );

        return $settings_fields;
    }

    function wpb_wssn_plugin_page() {
        echo '<div class="wrap">';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;

new wpb_wssn_settings();