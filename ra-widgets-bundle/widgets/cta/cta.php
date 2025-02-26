<?php
/*
Widget Name: RA CTA
Description: A simple CTA widget.
Author: Rotsen Mark Acob
Author URI: http://rotsenacob.com
*/

class RAWB_CTA_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'rawb-cta',
            __( 'RA CTA', 'ra-widgets-bundle' ),
            array(
                'description' => __( 'A simple CTA widget.', 'ra-widgets-bundle' ),
            ),
            array(),
            array(
                'title' => array(
                    'type' => 'text',
                    'label' => __( 'Title', 'ra-widgets-bundle' )
                ),
                'subtitle' => array(
                    'type' => 'text',
                    'label' => __( 'Subtitle', 'ra-widgets-bundle' )
                ),
                'content' => array(
                    'type' => 'textarea',
                    'label' => __( 'Content', 'ra-widgets-bundle' )
                ),
                'image' => array(
                    'type' => 'widget',
                    'class' => 'RAWB_Image_Widget',
                    'label' => __( 'Image', 'ra-widgets-bundle' )
                ),
                'button' => array(
                    'type' => 'widget',
                    'label' => __( 'Button', 'ra-widgets-bundle' ),
                    'class' => 'RAWB_Button_Widget'
                ),
                'settings' => array(
                    'type' => 'section',
                    'label' => __( 'Settings', 'ra-widgets-bundle' ),
                    'fields' => array(
                        'design' => array(
                            'type' => 'select',
                            'label' => __( 'Design', 'ra-widgets-bundle' ),
                            'options' => array(
                                'default' => __( 'Default', 'ra-widgets-bundle' )
                            ),
                            'default' => 'default'
                        ),
                        'display_image' => array(
                            'type' => 'checkbox',
                            'label' => __( 'Display Image', 'ra-widgets-bundle' ),
                            'default' => true
                        ),
                        'display_content' => array(
                            'type' => 'checkbox',
                            'label' => __( 'Display Content', 'ra-widgets-bundle' ),
                            'default' => true
                        ),
                        'display_button' => array(
                            'type' => 'checkbox',
                            'label' => __( 'Display Button', 'ra-widgets-bundle' ),
                            'default' => true
                        )
                    )
                )
            ),
            plugin_dir_path( __FILE__ ) . 'widgets/'
        );
    }

    function initialize() {
        if( !class_exists('RAWB_Button_Widget') ) {
            SiteOrigin_Widgets_Bundle::single()->include_widget( 'rawb-button' );
        }
        if( !class_exists('RAWB_Image_Widget') ) {
            SiteOrigin_Widgets_Bundle::single()->include_widget( 'rawb-image' );
        }
    }

    function get_template_variables( $instance, $args ) {
        return array(
            'title' => !empty( $instance['title'] ) ? $instance['title'] : '',
            'subtitle' => !empty( $instance['subtitle'] ) ? $instance['subtitle'] : '',
            'content' => !empty( $instance['content'] ) ? $instance['content'] : '',
            'design' => $instance['settings']['design'],
            'display_image' => $instance['settings']['display_image'],
            'display_content' => $instance['settings']['display_content'],
            'display_button' => $instance['settings']['display_button']
        );
    }

    function get_template_name( $instance ) {
        switch ( $instance['settings']['design'] ) {
            case 'default':
            default:
                return 'default';
                break;
        }
    }

    function get_style_name( $instance ) {
    	return false;
    }

    function modify_child_widget_form( $child_widget_form, $child_widget ) {
        if ( get_class( $child_widget ) == 'RAWB_Image_Widget' ) {
            unset( $child_widget_form['settings']['fields']['alignment'] );
            unset( $child_widget_form['title'] );
            unset( $child_widget_form['content'] );
            unset( $child_widget_form['template'] );
        }

        if ( get_class( $child_widget ) == 'RAWB_Button_Widget' ) {
            unset( $child_widget_form['template'] );
        }
        
		return $child_widget_form;
	}

    function modify_instance( $instance ) {

        if ( empty( $instance['title'] ) ) {
            $instance['title'] = array();
            $instance['title'] = $instance['headline'];

            unset( $instance['headline'] );
        }

        if ( empty( $instance['subtitle'] ) ) {
            $instance['subtitle'] = array();
            $instance['subtitle'] = $instance['subheadline'];

            unset( $instance['subheadline'] );
        }

        return $instance;
    }
}

siteorigin_widget_register( 'rawb-cta', __FILE__, 'RAWB_CTA_Widget' );
