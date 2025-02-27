<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists( 'ncmwcp1802_woocommerce_upsell_settings' ) ) {
    class ncmwcp1802_woocommerce_upsell_settings {

        public function __construct () {
            add_filter( 'woocommerce_settings_tabs_array', array( $this, 'add_settings_tab' ), 50, 1 );
            add_action( 'woocommerce_settings_tabs_upsell_settings', array( $this, 'settings_tab' ) );
            add_action( 'woocommerce_update_options_upsell_settings', array( $this, 'update_settings' ) );
            add_filter( 'plugin_action_links_'.NCMWCP1802_BASENAME, array( $this, 'add_settings_link' ) );        
            add_action( 'admin_enqueue_scripts', array( $this, 'upsell_scripts' ) );        
        }

        function add_settings_link( $links ) {
            $links[] = '<a href="' .
            esc_url( admin_url( 'admin.php?page=wc-settings&tab=upsell_settings' ) ) .
                '">' . esc_html( __( 'Settings' ) ) . '</a>';
            return $links;
        }

		public function upsell_scripts() {
            wp_enqueue_script( 'upsell_scripts', NCMWCP1802_URL.'/admin/js/script.js', array ( 'jquery' ), "1.0.0", true);
        }        

        /*Add a new settings tab to the WooCommerce settings tabs array.*/
        public function add_settings_tab( $tabs ) {
            $tabs['upsell_settings'] = esc_html( __( 'UpSell', 'woo-upsell' ) );
            return $tabs;
        }

        /*Uses the WooCommerce admin fields API to output settings via the woocommerce_admin_fields() function.*/
        public function settings_tab() {
            woocommerce_admin_fields( self::get_settings() );
        }

        /*Uses the WooCommerce options API to save settings via the woocommerce_update_options() function.*/
        public function update_settings() {
            woocommerce_update_options( self::get_settings() );
        }

        /*Get all the settings for this plugin for @see woocommerce_admin_fields() function.*/
        public function get_settings() {
            $settings = array(
                'section_title' => array(
                    'name'     => esc_html( __( 'Upsell settings', 'woo-upsell' ) ),
                    'type'     => 'title',
                    'desc'     => '',
                    'id'       => 'ncmwcp1802_upsell_settings_section_title'
                ),
                'type' => array(
                    'name' => esc_html( __( 'Display style', 'ncmwcp1802'  ) ),
                    'type' => 'select',
                    'options' => array(
                        'checkbox' => esc_html( __( 'Checkbox', 'woo-upsell' ) ),
                        'button' => esc_html( __( 'Add to cart button', 'woo-upsell' ) )    					      
    				),
                    'desc' => esc_html( __( 'Select a defualt display style', 'woo-upsell' ) ),
                    'desc_tip' => true,
                    'id'   => 'ncmwcp1802_upsell_settings_type'
                ),
                'title' => array(
                    'name' => esc_html( __( 'Upsell title', 'woo-upsell' ) ),
                    'type' => 'text',
                    'placeholder' => esc_html( __( 'We recommend', 'woo-upsell' ) ),
                    'desc' => esc_html( __( 'The title is shown before the UpSell products', 'woo-upsell' ) ),
                    'desc_tip' => true,
                    'id'   => 'ncmwcp1802_upsell_settings_title'
                ),
                'subtitle' => array(
                    'name' => esc_html( __( 'Subtitel', 'woo-upsell' ) ),
                    'type' => 'text',
                    'desc' => esc_html( __( 'The subtitle is shown after the UpSell title', 'woo-upsell' ) ),
                    'desc_tip' => true,
                    'id'   => 'ncmwcp1802_upsell_settings_subtitle'
                ),
                'section_end' => array(
                     'type' => 'sectionend',
                     'id' => 'ncmwcp1802_upsell_settings_section_end'
                )
            );
            return apply_filters( 'wc_upsell_settings_settings', $settings );
        }
    }
}