<?php

/*
Widget Name: E: Modal
Description: Overlay content on the page with Popup Modals.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/modal/
*/

class EchelonSOEsoModal extends SiteOrigin_Widget {

    function __construct() {

        parent::__construct(
            'echelonso-eso-modal',
            __('E: Modal', 'echelon-so'),
            array(
                'description' => __('Overlay content on the page with Popup Modals.', 'echelon-so' ),
                'help' => __('https://echelonso.com/widgets/modal/', 'echelon-so' ),
                'panels_groups' => array('eso'),
            ),
            array(),
            false,
            plugin_dir_path(__FILE__)
        );
    }

    /*
    * Template Name
    */

    function get_template_name($instance) {
        return 'default';
    }

    /*
    * Template Variables
    */

    function get_template_variables($instance, $args) {

        // content
        $return['content'] = !empty( $instance['modal']['content'] ) ? $instance['modal']['content'] : '';
        $return['id'] = !empty( $instance['modal']['id'] ) ? $instance['modal']['id'] : '';

        $return['video'] = '';
        if ( !empty($instance['modal']['video']) ) {
            $attachment = wp_get_attachment_url( $instance['modal']['video'] );
            if ( !empty( $attachment ) ) {
                $return['video'] = sow_esc_url($attachment);
            }
        }
        // modifiers
        $return['modal_wrap_class'] = array();
        (empty($instance['modal']['center'])) ?: $return['modal_wrap_class'][] = 'uk-flex-top';
        (empty($instance['modal']['container'])) ?: $return['modal_wrap_class'][] = $instance['modal']['container'];

        if ( $instance['modal']['template'] == 'default' ) {
            (empty($instance['modal']['full'])) ?: $return['modal_wrap_class'][] = $instance['modal']['full'];
        }

        $return['modal_class'] = array();
        (empty($instance['modal']['center'])) ?: $return['modal_class'][] = $instance['modal']['center'];

        $return['close_class'] = array();
        (empty($instance['modal']['close'])) ?: $return['close_class'][] = $instance['modal']['close'];
        (empty($instance['modal']['full'])) ?: $return['close_class'][] = 'uk-modal-close-full uk-close-large';

        if ( $instance['modal']['template'] == 'default' ) {
            $return['overflow'] = !empty( $instance['modal']['overflow'] ) ? $instance['modal']['overflow'] : '';

        }

        if ( $instance['modal']['template'] == 'video' ) {
            $return['atts'] = array();
            (empty($instance['video_settings']['controls'])) ?: $return['atts'][] = 'controls';
            (empty($instance['video_settings']['muted'])) ?: $return['atts'][] = 'muted';
            (empty($instance['video_settings']['loop'])) ?: $return['atts'][] = 'loop';
        }

        $return['overlay_color'] = !empty( $instance['appearance']['overlay'] ) ? $instance['appearance']['overlay'] : EsoWidgetFormPart::default_color('overlay');
        $return['close_icon_color'] = !empty( $instance['appearance']['close_icon'] ) ? $instance['appearance']['close_icon'] : EsoWidgetFormPart::default_color('inverse');

        return $return;
    }

    /*
    * Widget Form
    */

    function get_widget_form() {

        $return['modal'] = EsoWidgetFormCorePart::section('Settings', array(
            'template' => EsoWidgetFormCorePart::select('Template', 'Choose a template for the widget.', 'default', array(
                'default' => __('Content', EsoWidgetFormPart::text_domain()),
                'video' => __('Content & Video' . EsoWidgetFormPart::prime_tag(), EsoWidgetFormPart::text_domain()),
            ), array(

            ), array(
                'callback' => 'select',
                'args' => array( 'template' )
            )),
            'id' => EsoWidgetFormCorePart::text('Target ID', 'To display the modal you need to add an <span style="color: #000;">Attribute Key</span> and <span style="color: #000;">Attribute Value</span> to a different widget, any widget can be used to open the modal. For example, add an E: Text widget to this page, open the E: Text widget and go to <span style="color: #000;">Widget Styles > Attributes</span>, find <span style="color: #000;">Attribute Key</span> and enter <span style="color: #000;">uk-toggle</span>, find <span style="color: #000;">Attribute Value</span> and enter <span style="color: #000;">target: #your_target_id</span>. When the E: Text widget is clicked the modal will open.' . EsoWidgetFormPart::required()),
            'content' => EsoWidgetFormCorePart::builder('Content', 'Build the content of the modal'),
            'video' => EsoWidgetFormCorePart::media('Video', 'THe video will be used as the modal header.', 'Choose Video', 'Update Video', 'video', false, array(
                'template[video]' => array( 'show' ),
                '_else[template]' => array( 'hide' ),
            )),
            'center' => EsoWidgetFormCorePart::select('Center', 'Display the modal in the center of the screen instead of near the top.', '0', array(
                '0' => __('No', EsoWidgetFormPart::text_domain()),
                'uk-margin-auto-vertical' => __('Yes', EsoWidgetFormPart::text_domain()),
            )),
            'container' => EsoWidgetFormCorePart::select('Wide', 'Extend the width of the modal to make it wider.', '0', array(
                '0' => __('No', EsoWidgetFormPart::text_domain()),
                'uk-modal-container' => __('Yes', EsoWidgetFormPart::text_domain()),
            )),
            'close' => EsoWidgetFormCorePart::select('Close Position', 'Position the close icon inside or outside the modal.', '0', array(
                'uk-modal-close-default' => __('Inside', EsoWidgetFormPart::text_domain()),
                'uk-modal-close-outside' => __('Outside', EsoWidgetFormPart::text_domain()),
            )),
            'overflow' => EsoWidgetFormCorePart::select('Overflow', 'The modal content will overflow the modal instead of the screen.', '0', array(
                '0' => __('Screen', 'echelon-so'),
                'uk-overflow-auto' => __('Modal', 'echelon-so'),
            ), array(
                'template[default]' => array( 'show' ),
                '_else[template]' => array( 'hide' ),
            )),
            'full' => EsoWidgetFormCorePart::select('Full Screen', 'The modal will occupy the full width and height of the screen.', '0', array(
                '0' => __('No', 'echelon-so'),
                'uk-modal-full' => __('Yes', 'echelon-so'),
            ), array(
                'template[default]' => array( 'show' ),
                '_else[template]' => array( 'hide' ),
            )),

        ));

        $return['video_settings'] = EsoWidgetFormCorePart::section('Video Settings' .  EsoWidgetFormPart::prime_tag(), array(
            'controls' => EsoWidgetFormPart::binary('Controls', 'Show or hide the video controls.', '1', 'Show', 'Hide'),
            'muted' => EsoWidgetFormPart::binary('Muted', 'The video is muted.', '1', 'Yes', 'No'),
            'loop' => EsoWidgetFormPart::binary('Loop', 'The video play in a loop.', '1', 'Yes', 'No'),
        ), array(
            'template[video]' => array( 'show' ),
            '_else[template]' => array( 'hide' ),
        ));

        $return['appearance'] = EsoWidgetFormCorePart::section('Appearance', array(
            'close_icon' => EsoWidgetFormCorePart::color('Close Icon', 'The color to use for the close icon.', EsoWidgetFormPart::default_color('inverse')),
            'overlay' => EsoWidgetFormPart::rgba('Overlay', 'THe color for the background overlay.', EsoWidgetFormPart::default_color('overlay')),
        ));

        return $return;

    }

    /*
    * Instance modifications
    * The form changes over time
    */

    function modify_instance( $instance )  {
        // update 2.1.0
        if ( isset( $instance['modifiers']['center'] ) ) {
            $instance['modal']['center'] = $instance['modifiers']['center'];
            unset($instance['modifiers']['center']);
        }
        if ( isset( $instance['modifiers']['container'] ) ) {
            $instance['modal']['container'] = $instance['modifiers']['container'];
            unset($instance['modifiers']['container']);
        }
        if ( isset( $instance['modifiers']['close'] ) ) {
            $instance['modal']['close'] = $instance['modifiers']['close'];
            unset($instance['modifiers']['close']);
        }
        if ( isset( $instance['modifiers']['overflow'] ) ) {
            $instance['modal']['overflow'] = $instance['modifiers']['overflow'];
            unset($instance['modifiers']['overflow']);
        }
        if ( isset( $instance['modifiers']['full'] ) ) {
            $instance['modal']['full'] = $instance['modifiers']['full'];
            unset($instance['modifiers']['full']);
        }
        if ( isset( $instance['modifiers']['controls'] ) ) {
            $instance['video_settings']['controls'] = $instance['modifiers']['controls'];
            unset($instance['modifiers']['controls']);
        }
        if ( isset( $instance['modifiers']['muted'] ) ) {
            $instance['video_settings']['muted'] = $instance['modifiers']['muted'];
            unset($instance['modifiers']['muted']);
        }
        if ( isset( $instance['modifiers']['loop'] ) ) {
            $instance['video_settings']['loop'] = $instance['modifiers']['loop'];
            unset($instance['modifiers']['loop']);
        }
        // end 2.1.0
        return $instance;
    }

}

siteorigin_widget_register('echelonso-eso-modal', __FILE__, 'EchelonSOEsoModal');
