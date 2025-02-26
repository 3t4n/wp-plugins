<?php

/**
 * Aotomot Settings API Configuration
 */
/**
 * The Settings functionality of the plugin.
 *
 * @link       https://www.aotomot.com
 * @since      1.0.0
 *
 * @package    Aotomot_Gallery
 * @subpackage Aotomot_Gallery/admin
 */

/**
 * The Settings API functionality of the plugin.
 *
 *
 * @package    Aotomot_Gallery
 * @subpackage Aotomot_Gallery/admin
 * @author     Aotomot Pty Ltd. <chandra.t@aotomot.com>
 */
if ( !class_exists( 'Aotomot_Settings_API' ) ) :
    class Aotomot_Settings_API {
        private $settings_api;
        function __construct() {
            $this->settings_api = new WeDevs_Settings_API;
            add_action( 'admin_init', array( $this, 'admin_init' ) );
            add_action( 'admin_menu', array( $this, 'admin_menu' ) );
        }
        function admin_init() {
            //set the settings
            $this->settings_api->set_sections( $this->get_settings_sections() );
            $this->settings_api->set_fields( $this->get_settings_fields() );
            //initialize settings
            $this->settings_api->admin_init();
        }
        function admin_menu() {
            add_options_page( 'Aotomot Gallery', 'Aotomot Gallery', 'delete_posts', 'aotomot_gallery', array( $this, 'plugin_page' ) );
        }
        function get_settings_sections() {
            $sections = array( 
                array( 
                    'id'    => 'aotomot_basics',
                    'title' => __( 'Basic Settings', 'aotomot-gallery' )
                 ),
                array( 
                    'id'    => 'aotomot_advanced',
                    'title' => __( 'Advanced Settings', 'aotomot-gallery' )
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
                'aotomot_basics' => array( 
                    array( 
                        'name'              => 'aotg_api_key',
                        'label'             => __( 'API Key', 'aotomot-gallery' ),
                        'desc'              => __( 'Please enter your API Key from Aotomot', 'aotomot-gallery' ),
                        'placeholder'       => __( 'asaifeqwmqfkvkfvdznzyg1323msamn723i2chbfekwf244r', 'aotomot-gallery' ),
                        'type'              => 'text',
                        'default'           => '',
                        'sanitize_callback' => 'sanitize_text_field'
                     ),
                    array( 
                        'name'              => 'aotg_url',
                        'label'             => __( 'WorkSpace URL', 'aotomot-gallery' ),
                        'desc'              => __( 'Your workspace is like https://subdomain.aotomot.com', 'aotomot-gallery' ),
                        'placeholder'       => __( 'https://workspace.aotomot.com', 'aotomot-gallery' ),
                        'type'              => 'url',
                        'default'           => '',
                        'sanitize_callback' => 'esc_url_raw'
                     ),
                    array( 
                        'name'              => 'aotg_gallery_id',
                        'label'             => __( 'Gallery ID.', 'aotomot-gallery' ),
                        'desc'              => __( 'The gallery ID:1 (  default  ), 2 etc..', 'aotomot-gallery' ),
                        'placeholder'       => __( '1', 'aotomot-gallery' ),
                        'min'               => 1,
                        'step'              => 1,
                        'type'              => 'number',
                        'default'           => '1',
                        'sanitize_callback' => 'intval'
                     ),
                    array( 
                        'name'              => 'aotg_title',
                        'label'             => __( 'Gallery title', 'aotomot-gallery' ),
                        'desc'              => __( 'Please enter your gallery title.', 'aotomot-gallery' ),
                        'placeholder'       => __( 'What we\'ve been working on', 'aotomot-gallery' ),
                        'type'              => 'text',
                        'default'           => '',
                        'sanitize_callback' => 'sanitize_text_field'
                     ),
                    array( 
                        'name'              => 'aotg_total_image',
                        'label'             => __( 'Gallery image count.', 'aotomot-gallery' ),
                        'desc'              => __( 'Total number of image in a gallery.', 'aotomot-gallery' ),
                        'placeholder'       => __( '4', 'aotomot-gallery' ),
                        'min'               => 2,
                        'max'               => 100,
                        'step'              => 1,
                        'type'              => 'number',
                        'default'           => '4',
                        'sanitize_callback' => 'intval'
                     ),
                    array( 
                        'name'    => 'aotg_select_order',
                        'label'   => __( 'Gallery Order', 'aotomot-gallery' ),
                        'desc'    => __( 'Select weather to display in ascending or descending order.', 'aotomot-gallery' ),
                        'type'    => 'select',
                        'default' => 'no',
                        'options' => array( 
                            'a' => 'Ascending',
                            'd'  => 'Descending'
                         )
                     ),
                    array( 
                        'name'    => 'aotg_select_layout',
                        'label'   => __( 'Gallery Layout', 'aotomot-gallery' ),
                        'desc'    => __( 'Select weather to display full-width or normal.', 'aotomot-gallery' ),
                        'type'    => 'select',
                        'default' => 'no',
                        'options' => array( 
                            'full' => 'Fullwidth',
                            'default'  => 'Default'
                         )
                         ),
                    array( 
                        'name'    => 'aotg_grid_column',
                        'label'   => __( 'Grid Column', 'aotomot-gallery' ),
                        'desc'    => __( 'Select the different grid column from available options.', 'aotomot-gallery' ),
                        'type'    => 'select',
                        'default' => 'no',
                        'options' => array( 
                            '2' => 'Column 2',
                            '3'  => 'Column 3',
                            '4'  => 'Column 4',
                            '6'  => 'Column 6'
                         )
                     ),
                 ),
                'aotomot_advanced' => array( 
                    array( 
                        'name'    => 'aotg_grad_1',
                        'label'   => __( 'Gradient left color', 'aotomot-gallery' ),
                        'desc'    => __( 'First Color', 'aotomot-gallery' ),
                        'type'    => 'color',
                        'default' => '#e5264d'
                     ),
                    array( 
                        'name'    => 'aotg_grad_2',
                        'label'   => __( 'Gradient right Color', 'aotomot-gallery' ),
                        'desc'    => __( 'Second Color', 'aotomot-gallery' ),
                        'type'    => 'color',
                        'default' => '#ee6f38'
                     ),
                 )
             );
            return $settings_fields;
        }
        function plugin_page() {
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
                foreach ( $pages as $page ) {
                    $pages_options[$page->ID] = $page->post_title;
                }
            }
            return $pages_options;
        }
        /**
         * Get Settings option for Aotomot 
         */
        public static function aotomot_gallery_get_option( $option, $section, $default = '' ) {

            $options = get_option( $section );

            if ( isset( $options[$option] ) ) {
                return $options[$option];
            }

            return $default;
        }

    }
endif;