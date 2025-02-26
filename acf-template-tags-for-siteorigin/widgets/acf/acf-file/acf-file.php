<?php
/*
Widget Name: ACF File
Description: Display an ACF File field.
Author: Echelon
*/

class EchelonSOAcfFile extends SiteOrigin_Widget {
    
    function __construct() {
        
        global $acftt;
        
        parent::__construct(
            'echelonso-acf-file',
            __('ACF File', $acftt->plugin_text_domain() ),
            array(
                'description' => __('Display an ACF File field.', $acftt->plugin_text_domain() ),
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
                        )
                    )
                ),
                'file' => array(
                    'type' => 'section',
                    'label' => __( 'File' , $acftt->plugin_text_domain() ),
                    'hide' => true,
                    'fields' => array(
                        'display_as' => array(
                            'type' => 'radio',
                            'label' => __( 'Display Email As', $acftt->plugin_text_domain() ),
                            'description' =>  __( 'How to display the file link on the page.', $acftt->plugin_text_domain() ),
                            'default' => 'raw_url',
                            'options' => array(
                                'raw_url' => __( 'Raw URL', $acftt->plugin_text_domain() ),
                                'linked_url' => __( 'Linked URL', $acftt->plugin_text_domain() ),
                                'linked_title' => __( 'Linked Title', $acftt->plugin_text_domain() ),
                                'linked_text' => __( 'Linked Text', $acftt->plugin_text_domain() ),
                            ),
                        ),
                        'linked_text' => array(
                            'type' => 'text',
                            'label' => __( 'Linked Text', $acftt->plugin_text_domain() ),
                            'description' =>  __( 'Text for the link.', $acftt->plugin_text_domain() ),
                            'default' => '',
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

siteorigin_widget_register('echelonso-acf-file', __FILE__, 'EchelonSOAcfFile');
