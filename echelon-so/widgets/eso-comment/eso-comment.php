<?php

/*
Widget Name: E: Comment
Description: Comments with images, text and person info.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/comment/
*/

class EchelonSOEsoComment extends SiteOrigin_Widget {

    function __construct() {
        parent::__construct(
            'echelonso-eso-comment',
            __('E: Comment', 'echelon-so'),
            array(
                'description' => __('Comments with images, text and person info.', 'echelon-so' ),
                'help' => 'https://echelonso.com/widgets/comment/',
                'panels_groups' => array('eso')
            ),
            array(),
            false,
            plugin_dir_path(__FILE__)
        );
    }

    function get_template_name($instance) {
        $allowed_templates = array('default', 'wide');
        if ( in_array($instance['comment']['template'], $allowed_templates) ) {
            return $instance['comment']['template'];
        } else {
            return 'default';
        }
    }

    /*
    * Template Variables
    */

    function get_template_variables($instance, $args) {

        $return = array();

        // content
        $return['name'] = !empty($instance['comment']['name']) ? $instance['comment']['name'] : '';
        $return['company'] = !empty($instance['comment']['company']) ? $instance['comment']['company'] : '';
        $return['comment'] = !empty($instance['comment']['comment']) ? $instance['comment']['comment'] : '';
        $return['rating'] = absint($instance['comment']['rating']);


        // image
        if( ! empty( $instance['comment']['image'] ) ) {
            $size = empty( $instance['comment']['image_size'] ) ? 'full' : $instance['comment']['image_size'];
            $attachment = wp_get_attachment_image_src( $instance['comment']['image'], $size );
            if( !empty( $attachment ) ) {
                $return['image'] = sow_esc_url( $attachment[0] );
            } else {
                $retrun['image'] = false;
            }
        }

        $return['image_class'][] = 'eso';
        (empty($instance['comment']['image_radius'])) ?: $return['image_class'][] = $instance['comment']['image_radius'];

        $return['body_class'][] = 'eso';
        (empty($instance['body_appearance']['font_size'])) ?: $return['body_class'][] = $instance['body_appearance']['font_size'];
        (empty($instance['body_appearance']['font_weight'])) ?: $return['body_class'][] = $instance['body_appearance']['font_weight'];

        $return['name_class'][] = 'eso';
        (empty($instance['header_appearance']['font_weight'])) ?: $return['name_class'][] = $instance['header_appearance']['font_weight'];

        $return['company_class'][] = 'eso';
        (empty($instance['header_appearance']['font_weight'])) ?: $return['company_class'][] = $instance['header_appearance']['font_weight'];

        $return['icon_class'][] = 'eso';
        (empty($instance['rating_appearance']['margin_right'])) ?: $return['icon_class'][] = $instance['rating_appearance']['margin_right'];

        // icon
        $return['icon'] =  !empty($instance['rating_appearance']['icon']) ? $instance['rating_appearance']['icon'] : false;
        $return['icon_styles'][] = !empty($instance['rating_appearance']['color']) ? 'color: ' . $instance['rating_appearance']['color'] : 'inherit';
        $return['icon_styles'][] = !empty($instance['rating_appearance']['size']) ? 'font-size: ' . $instance['rating_appearance']['size'] : 'inherit';

        return $return;
    }

    /*
    * Less Variables
    */


    function get_less_variables($instance) {

        $return = array();

        if (isset($instance['header_appearance'])) {
            $return['header_color'] = !empty( $instance['header_appearance']['color'] ) ? $instance['header_appearance']['color'] : false;
            $return['divider_color'] = !empty( $instance['header_appearance']['divider_color'] ) ? $instance['header_appearance']['divider_color'] : false;
        }

        if (isset($instance['body_appearance'])) {
            $return['body_color'] = !empty( $instance['body_appearance']['color'] ) ? $instance['body_appearance']['color'] : false;
        }

        return $return;
    }

    /*
    * Widget Form
    */

    function get_widget_form() {

        $return['comment'] = EsoWidgetFormCorePart::section('Settings', array(
            'template' => EsoWidgetFormCorePart::select('Template', 'Choose a template to use.', 'default', array(
                'default' => __('Stacked', EsoWidgetFormPart::text_domain()),
                'wide' => __('Wide', EsoWidgetFormPart::text_domain()),
                'vertical' => __('Vertical' . EsoWidgetFormPart::prime_tag(), EsoWidgetFormPart::text_domain())
            ), array(

            ), array(
                'callback' => 'select',
                'args' => array('template')
            )),
            'image' => EsoWidgetFormCorePart::media(),
            'image_size' => EsoWidgetFormCorePart::image_size(),
            'image_radius' => EsoWidgetFormPart::uikit('border_radius', 'Image Border Radius'),
            'name' => EsoWidgetFormCorePart::text('Name', 'Text to appear in the name section of the comment.'),
            'company' => EsoWidgetFormCorePart::text('Company', 'Text to appear in the company section of the comment.'),
            'comment' => EsoWidgetFormCorePart::text('Comment', 'The text to use for the main body section of the comment.'),
            'rating' => EsoWidgetFormCorePart::slider('Rating', 'The number of rating icons to display.', 5, 1, 5, true),
        ));

        $return['rating_appearance'] = EsoWidgetFormCorePart::section('Rating Appearance', array(
            'icon' => EsoWidgetFormCorePart::icon(),
            'color' => EsoWidgetFormCorePart::color('Color', '', EsoWidgetFormPart::default_color('primary')),
            'size' => EsoWidgetFormCorePart::measurement('Size', 'The size for the rating icons.', '12px'),
            'margin_right' => EsoWidgetFormPart::uikit('margin_right', 'Spacing')
        ));

        $return['header_appearance'] = EsoWidgetFormCorePart::section('Header Appearance', array(
            'color' => EsoWidgetFormCorePart::color('Text Color'),
            'divider_color' => EsoWidgetFormCorePart::color('Divider Color'),
            'font_weight' => EsoWidgetFormPart::uikit('font_weight')
        ));

        $return['body_appearance'] = EsoWidgetFormCorePart::section('Body Appearance', array(
            'color' => EsoWidgetFormCorePart::color(),
            'font_size' => EsoWidgetFormPart::uikit('font_size'),
            'font_weight' => EsoWidgetFormPart::uikit('font_weight')
        ));

        return $return;

    }

    /*
    * Instance modifications
    * The form changes over time
    */

    function modify_instance( $instance )  {
        // update 2.1.0
        if ( isset($instance['comment']['rating_icon']) ) {
            $instance['rating_appearance']['icon'] = $instance['comment']['rating_icon'];
            unset($instance['comment']['rating_icon']);
        }
        if ( isset($instance['comment']['rating_color']) ) {
            $instance['rating_appearance']['color'] = $instance['comment']['rating_color'];
            unset($instance['comment']['rating_color']);
        }
        if ( isset($instance['modifiers']['icon_margin']) ) {
            $instance['rating_appearance']['margin_right'] = $instance['modifiers']['icon_margin'];
            unset($instance['modifiers']['icon_margin']);
        }
        if ( isset($instance['modifiers']['image_radius']) ) {
            $instance['comment']['image_radius'] = $instance['modifiers']['image_radius'];
            unset($instance['modifiers']['image_radius']);
        }
        if ( isset($instance['modifiers']['body_size']) ) {
            $instance['body_appearance']['font_size'] = $instance['modifiers']['body_size'];
            unset($instance['modifiers']['body_size']);
        }
        if ( isset($instance['modifiers']['body_weight']) ) {
            $instance['body_appearance']['font_weight'] = $instance['modifiers']['body_weight'];
            unset($instance['modifiers']['body_weight']);
        }
        if ( isset($instance['modifiers']['inverse']) && !empty($instance['modifiers']['inverse']) ) {
            $instance['header_appearance']['color'] = '#ffffff';
            $instance['header_appearance']['divider_color'] = '#ffffff';
            $instance['body_appearance']['color'] = '#ffffff';
            unset($instance['modifiers']['inverse']);
        }
        // end 2.1.0
        return $instance;
    }

}

siteorigin_widget_register('echelonso-eso-comment', __FILE__, 'EchelonSOEsoComment');
