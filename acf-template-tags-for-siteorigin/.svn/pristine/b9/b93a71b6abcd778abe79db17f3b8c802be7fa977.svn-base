<?php
/*
Widget Name: ACF Image
Description: Display an ACF Image field.
Author: Echelon
*/

class EchelonSOAcfImage extends SiteOrigin_Widget {
    
    function __construct() {
        
        global $acftt;
        
        wp_enqueue_script( 'eso_lightbox2_cdn_js', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js', array('jquery'), '2.10.0' );
        wp_enqueue_style( 'eso_lightbox2_cdn_css', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css' );
        
        parent::__construct(
            'echelonso-acf-image',
            __('ACF Image', $acftt->plugin_text_domain() ),
            array(
                'description' => __('Display an ACF Image field.', $acftt->plugin_text_domain() ),
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
                'image' => array(
                    'type' => 'section',
                    'label' => __( 'Image' , $acftt->plugin_text_domain() ),
                    'hide' => true,
                    'fields' => array(
                        'size' => array(
                            'type' => 'image-size',
                            'label' => __( 'Image Size', $acftt->plugin_text_domain() ),
                            'description' => __( 'The image size to use.', $acftt->plugin_text_domain() ),
                        ),
                        'post_object_link' => array(
                            'type' => 'checkbox',
                            'label' => __( 'Link to Post Object', $acftt->plugin_text_domain() ),
                            'description' => __( 'Link the image to the associated Post Object.', $acftt->plugin_text_domain() ),
                        )
                    )
                ),
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

siteorigin_widget_register('echelonso-acf-image', __FILE__, 'EchelonSOAcfImage');
