<?php

/*
Widget Name: E: Video
Description: Autoplay and cover based videos.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/video/
*/

class EchelonSOEsoVideo extends SiteOrigin_Widget {

    function __construct() {

        parent::__construct(
            'echelonso-eso-video',
            __('E: Video', 'echelon-so'),
            array(
                'description' => __('Autoplay and cover based videos.', 'echelon-so' ),
                'help' => 'https://echelonso.com/widgets/video/',
                'panels_groups' => array('eso'),
            ),
            array(),
            false,
            plugin_dir_path(__FILE__)
        );
    }

    /**
    * Template
    */

    function get_template_name($instance) {
        return 'default';
    }

    /*
    * Template Variables
    */

    function get_template_variables($instance, $args) {

        // content
        $return['video'] = '';
        if ( !empty($instance['video']['video']) ) {
            $attachment = wp_get_attachment_url( $instance['video']['video'] );
            if ( !empty( $attachment ) ) {
                $return['video'] = sow_esc_url($attachment);
            }
        }

        // toggle
        $return['toggle_class'] = 'vc_tog_' . uniqid(rand(1,9999));
        $return['toggle_id'] = 'vc_tog_id' . uniqid(rand(1,9999));
        $return['video_id'] = 'vc_id_' . uniqid(rand(1,9999));

        // player controls
        $return['autoplay'] = isset($instance['player']['autoplay']) ? $instance['player']['autoplay'] : 'false';
        $return['atts'][] = 'eso';
        (empty($instance['player']['controls'])) ?: $return['atts'][] = 'controls';
        (empty($instance['player']['muted'])) ?: $return['atts'][] = 'muted';
        (empty($instance['player']['loop'])) ?: $return['atts'][] = 'loop';

        // cover
        if ( $instance['video']['template'] == 'cover') {

            $return['transition'] = !empty( $instance['cover']['transition'] ) ? 'uk-transition-scale-up' : 'eso';

            $return['cover'] = '';
            if ( ! empty( $instance['cover']['image'] ) ) {
                $size = empty( $instance['cover']['image_size'] ) ? 'full' : $instance['cover']['image_size'];
                $attachment = wp_get_attachment_image_src( $instance['cover']['image'], $size );
                if ( !empty( $attachment ) ) {
                    $return['cover'] = sow_esc_url( $attachment[0] );
                }
            }

            // icon styles
            $icon_size = (!empty($instance['icon']['size'])) ? intval($instance['icon']['size']) . 'px' : '50px';
            $return['icon_styles'][] = 'eso';
            $return['icon_styles'][] = 'text-align: center';
            $return['icon_styles'][] = 'font-size: ' . $icon_size;
            $return['icon_styles'][] = 'line-height: ' . $icon_size;
            $return['icon_styles'][] = 'width: ' . $icon_size;
            $return['icon_styles'][] = 'height: ' . $icon_size;
            $return['icon_styles'][] = 'font-size: ' . $icon_size;
            (empty($instance['icon']['color'])) ?: $return['icon_styles'][] = 'color: '. $instance['icon']['color'];
            $return['icon'] = !empty( $instance['icon']['icon'] ) ? $instance['icon']['icon'] : false;

            // icon wrap class
            $return['icon_wrap_class'][] = 'eso';
            $return['icon_wrap_class'][] = (!empty($instance['icon']['position'])) ? $instance['icon']['position'] : 'uk-position-center';
            (empty($instance['icon']['position_size'])) ?: $return['icon_wrap_class'][] = $instance['icon']['position_size'];

            $return['icon_inner_class'][] = 'eso';
            (empty($instance['icon']['transition'])) ?: $return['icon_inner_class'][] = $instance['icon']['transition'];
            (empty($instance['icon']['transition_opaque'])) ?: $return['icon_inner_class'][] = $instance['icon']['transition_opaque'];

        }

        return $return;
    }

    /*
    * Widget Form
    */

    function get_widget_form() {

        $return['video'] = EsoWidgetFormCorePart::section('Settings',
        array(
            'template' => EsoWidgetFormCorePart::select('Template', 'Choose between cover and no cover videos.', 'default',
            array(
                'default' => __( 'Without Cover Image', 'echelon-so' ),
                'cover' => __( 'With Cover Image' . EsoWidgetFormPart::prime_tag(), 'echelon-so'),
            ), array(

            ), array(
                'callback' => 'select',
                'args' => array( 'template' )
            )),
            'video' => EsoWidgetFormCorePart::media('Video', 'Choose the video file to use.' . EsoWidgetFormPart::required(), 'Choose Video', 'Set Video', 'video', false),
        ));

        $return['cover'] = EsoWidgetFormCorePart::section('Cover' . EsoWidgetFormPart::prime_tag(),
        array(
            'image' => EsoWidgetFormCorePart::media('Image', 'Choose the image for the cover.' . EsoWidgetFormPart::required(), 'Choose Image', 'Set Image', 'image', false),
            'image_size' => EsoWidgetFormCorePart::image_size('Image Size', 'The image needs to be at least the size of the displayed video.' . EsoWidgetFormPart::important()),
            'transition' => EsoWidgetFormCorePart::checkbox('Scale Up', 'Add the Scale Up transition to the cover image.'),
        ), array(
            'template[cover]' => array( 'show' ),
            '_else[template]' => array( 'hide' ),
        ));

        $return['icon'] = EsoWidgetFormCorePart::section('Icon' . EsoWidgetFormPart::prime_tag(),
        array(
            'icon' => EsoWidgetFormCorePart::icon('Icon', 'The icon to use with the cover image.'),
            'color' => EsoWidgetFormPart::rgba(),
            'size' => EsoWidgetFormCorePart::slider('Size', 'How big to make the icon.', 50, 15, 300, true),
            'position' => EsoWidgetFormPart::uikit('position_corners_center'),
            'position_size' => EsoWidgetFormPart::uikit('position_size'),
            'transition' => EsoWidgetFormPart::uikit('transition'),
            'transition_opaque' => EsoWidgetFormPart::uikit('transition_opaque')
        ), array(
            'template[cover]' => array( 'show' ),
            '_else[template]' => array( 'hide' ),
        ));

        $return['player'] = EsoWidgetFormCorePart::section('Player Settings',
        array(
            'autoplay' => EsoWidgetFormCorePart::select('Autoplay', 'Should the video autoplay or play only when inview.', 'inview',
            array(
                'true' => __('True', 'echelon-so'),
                'false' => __('False', 'echelon-so'),
                'inview' => __('Inview', 'echelon-so'),
            ), array(
                'template[default]' => array( 'show' ),
                '_else[template]' => array( 'hide' ),
            )),
            'controls' => EsoWidgetFormPart::binary('Controls', 'Show or hide the video controls.', '0', 'Show', 'Hide'),
            'muted' => EsoWidgetFormPart::binary('Muted', 'Should the video be muted.', '1', 'Yes', 'No'),
            'loop' => EsoWidgetFormPart::binary('Loop', 'Should the video be loop when finished.', '1', 'Yes', 'No'),
        ));

        return $return;

    }

    /*
    * Instance modifications
    * The form changes over time
    */

    function modify_instance( $instance )  {
        // update 2.1.0
        if ( isset( $instance['video']['cover'] ) ) {
            $instance['cover']['image'] = $instance['video']['cover'];
            unset($instance['video']['cover']);
        }
        if ( isset( $instance['video']['cover_size'] ) ) {
            $instance['cover']['image_size'] = $instance['video']['cover_size'];
            unset($instance['video']['cover_size']);
        }
        if ( isset( $instance['video']['icon'] ) ) {
            $instance['icon']['icon'] = $instance['video']['icon'];
            unset($instance['video']['icon']);
        }
        if ( isset( $instance['video']['icon_color'] ) ) {
            $instance['icon']['color'] = $instance['video']['icon_color'];
            unset($instance['video']['icon_color']);
        }
        if ( isset( $instance['video']['icon_size'] ) ) {
            $instance['icon']['size'] = $instance['video']['icon_size'];
            unset($instance['video']['icon_size']);
        }
        if ( isset( $instance['modifiers']['transition'] ) ) {
            $instance['cover']['transition'] = $instance['modifiers']['transition'];
            unset($instance['modifiers']['transition']);
        }
        if ( isset( $instance['modifiers']['autoplay'] ) ) {
            $instance['player']['autoplay'] = $instance['modifiers']['autoplay'];
            unset($instance['modifiers']['autoplay']);
        }
        if ( isset( $instance['modifiers']['controls'] ) ) {
            $instance['player']['controls'] = $instance['modifiers']['controls'];
            unset($instance['modifiers']['controls']);
        }
        if ( isset( $instance['modifiers']['muted'] ) ) {
            $instance['player']['muted'] = $instance['modifiers']['muted'];
            unset($instance['modifiers']['muted']);
        }
        if ( isset( $instance['modifiers']['loop'] ) ) {
            $instance['player']['loop'] = $instance['modifiers']['loop'];
            unset($instance['modifiers']['loop']);
        }
        // end 2.1.0
        return $instance;
    }

}

siteorigin_widget_register('echelonso-eso-video', __FILE__, 'EchelonSOEsoVideo');
