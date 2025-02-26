<?php
/*
Widget Name: ACF Text
Description: Display an ACF text, text area or wysiwyg field.
Author: Echelon
*/

class EchelonSOAcfText extends SiteOrigin_Widget {
    
    function __construct() {
        
        global $acftt;
        
        parent::__construct(
            'echelonso-acf-text',
            __('ACF Text', $acftt->plugin_text_domain() ),
            array(
                'description' => __('Display an ACF text, text area or wysiwyg field.', $acftt->plugin_text_domain() ),
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
                'icon' => array(
                    'type' => 'section',
                    'label' => __( 'Icon' , $acftt->plugin_text_domain() ),
                    'hide' => true,
                    'fields' => array(
                        'icon' => array(
                            'type' => 'icon',
                            'description' => __( 'Output an icon before the field data.' , $acftt->plugin_text_domain() ),
                        )
                    )
                ),
                'option' => array(
                    'type' => 'section',
                    'label' => __( 'Options' , $acftt->plugin_text_domain() ),
                    'hide' => true,
                    'fields' => array(
                        'before' => array(
                            'type' => 'text',
                            'label' => __( 'Before', $acftt->plugin_text_domain() ),
                            'description' => __( 'Content to show before the field.', $acftt->plugin_text_domain() ),
                            'default' => ''
                        ),
                        'after' => array(
                            'type' => 'text',
                            'label' => __( 'After', $acftt->plugin_text_domain() ),
                            'description' => __( 'Content to show after the field.', $acftt->plugin_text_domain() ),
                            'default' => ''
                        ),
                        'html_tag' => array(
                            'type' => 'select',
                            'label' => __( 'HTML Tag', $acftt->plugin_text_domain() ),
                            'default' => 'none',
                            'options' => array(
                                'none' => __( 'None', $acftt->plugin_text_domain() ),
                                'h1' => __( 'H1', $acftt->plugin_text_domain() ),
                                'h2' => __( 'H2', $acftt->plugin_text_domain() ),
                                'h3' => __( 'H3', $acftt->plugin_text_domain() ),
                                'h4' => __( 'H4', $acftt->plugin_text_domain() ),
                                'h5' => __( 'H5', $acftt->plugin_text_domain() ),
                                'h6' => __( 'H6', $acftt->plugin_text_domain() ),
                                'p' => __( 'Paragraph', $acftt->plugin_text_domain() ),
                            )
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

siteorigin_widget_register('echelonso-acf-text', __FILE__, 'EchelonSOAcfText');
