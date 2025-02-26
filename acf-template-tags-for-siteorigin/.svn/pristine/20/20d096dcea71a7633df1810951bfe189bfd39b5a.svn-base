<?php
/*
Widget Name: ACF Google Map
Description: Display a Google Map with Tool Tip and Icon.
Author: Echelon
*/

class EchelonSOAcfGoogleMap extends SiteOrigin_Widget {
    
    function __construct() {
        
        global $acftt;
        
        parent::__construct(
            'echelonso-acf-google-map',
            __('ACF Google Map', $acftt->plugin_text_domain() ),
            array(
                'description' => __('Display a Google Map with Tool Tip and Icon.', $acftt->plugin_text_domain() ),
            ),
            array(
                
            ),
            array(
                'field' => array(
                    'type' => 'section',
                    'label' => __( 'Field' , $acftt->plugin_text_domain() ),
                    'hide' => true,
                    'fields' => array(
                        'field' => array(
                            'type' => 'text',
                            'label' => __( 'Field Name', $acftt->plugin_text_domain() ),
                            'default' => '',
                            'description' =>  __( 'Type the name of the field you would like to display.', $acftt->plugin_text_domain() ),
                        ),
                        'source' => array(
                            'type' => 'select',
                            'label' => __( 'Where is this field sourced from?', $acftt->plugin_text_domain() ),
                            'default' => 'loop',
                            'options' => array(
                                'loop' => __( 'Current Post', $acftt->plugin_text_domain() ),
                                'queried_object' => __( 'Queried Object', $acftt->plugin_text_domain() ),
                                'post_author' => __( 'Current Posts Author', $acftt->plugin_text_domain() ),
                                'queried_object' => __( 'Taxonomy', $acftt->plugin_text_domain() ),
                                'option' => __( 'Options Page', $acftt->plugin_text_domain() ),
                            )
                        ),
                        'is_sub' => array(
                            'type' => 'checkbox',
                            'label' => __( 'Repeater Field', $acftt->plugin_text_domain() ),
                            'default' => false,
                            'description' => __( 'This field is used for a repeater.', $acftt->plugin_text_domain() )
                        ),
                        'post_object_field' => array(
                            'type' => 'text',
                            'label' => __( 'Post Object Field', $acftt->plugin_text_domain() ),
                            'default' => '',
                            'description' => __( 'Cross link to another post via a Post Object Field.', $acftt->plugin_text_domain() )
                        ),
                    )
                ),
                'map' => array(
                    'type' => 'section',
                    'label' => __( 'Google Map' , $acftt->plugin_text_domain() ),
                    'hide' => true,
                    'fields' => array(
                        'container_height' => array(
                            'type' => 'measurement',
                            'label' => __('Container Height', $acftt->plugin_text_domain()),
                            'description' => __('For the map to be visible you need to set a height on its container.', $acftt->plugin_text_domain()),
                            'multiple' => false
                        ),
                        'zoom_level' => array(
                            'type' => 'number',
                            'label' => __('Zoom Level', $acftt->plugin_text_domain()),
                            'description' => __('The starting zoom level for the map.', $acftt->plugin_text_domain()),
                            'default' => 8
                        ),
                        'marker_title' => array(
                            'type' => 'text',
                            'label' => __('Marker Title', $acftt->plugin_text_domain()),
                            'default' => '',
                            'description' => __( 'Defaults to the address.', $acftt->plugin_text_domain() )
                        ),
                        'marker_image' => array(
                            'type' => 'media',
                            'label' => __('Marker Image', $acftt->plugin_text_domain()),
                            'description' => __( 'Defaults to the Google provided marker.', $acftt->plugin_text_domain() )
                        ),
                        'info_window' => array(
                            'type' => 'tinymce',
                            'label' => __('Info Window HTML', $acftt->plugin_text_domain()),
                            'description' => __( 'Leave empty to disable the info window.', $acftt->plugin_text_domain() )
                        )
                    )
                )
            ),
            plugin_dir_path(__FILE__)
        );
    }
    
    function get_less_variables($instance) {
        return array();
    }
    
    function get_template_name($instance) {
        return 'tpl';
    }
    
    function get_style_name($instance) {
        return false;
    }
    
    function get_form_teaser(){
        global $acftt;
        return $acftt->form_teaser();
    }
}

siteorigin_widget_register('echelonso-acf-google-map', __FILE__, 'EchelonSOAcfGoogleMap');
