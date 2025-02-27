<?php

/*
Widget Name: E: Subnav
Description: A horizontal set of links.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/subnav/
*/

class EchelonSOEsoSubnav extends SiteOrigin_Widget {

    function __construct() {

        parent::__construct(
            'echelonso-eso-subnav',
            __('E: Subnav', 'echelon-so'),
            array(
                'description' => __('A horizontal set of links.', 'echelon-so' ),
                'help' => 'https://echelonso.com/widgets/subnav/',
                'panels_groups' => array('eso'),
            ),
            array(),
            false,
            plugin_dir_path(__FILE__)
        );
    }

    /*
    * Template Variables
    */

    function get_template_variables($instance, $args) {
        // content
        $return['links'] = !empty( $instance['links'] ) ? $instance['links'] : array();
        // modifiers
        $return['nav_class'][] = 'eso';
        (empty($instance['modifiers']['alignment'])) ?: $return['nav_class'][] = $instance['modifiers']['alignment'];
        (empty($instance['modifiers']['divider'])) ?: $return['nav_class'][] = $instance['modifiers']['divider'];

        $return['link_class'][] = 'eso';
        (empty($instance['modifiers']['link_size'])) ?: $return['link_class'][] = $instance['modifiers']['link_size'];
        (empty($instance['modifiers']['link_weight'])) ?: $return['link_class'][] = $instance['modifiers']['link_weight'];

        return $return;
    }

    /*
    * Less Variables
    */

    function get_less_variables($instance) {
        $less_vars = array();
        $less_vars['link_color'] = !empty( $instance['modifiers']['link_color'] ) ? $instance['modifiers']['link_color'] : false;
        $less_vars['link_hover_color'] = !empty( $instance['modifiers']['link_hover_color'] ) ? $instance['modifiers']['link_hover_color'] : false;
        $less_vars['divider_color'] = !empty( $instance['modifiers']['divider_color'] ) ? $instance['modifiers']['divider_color'] : false;
        return $less_vars;
    }

    /*
    * Widget Form
    */

    function get_widget_form() {

        $return['links'] = EsoWidgetFormCorePart::repeater('Links', '', 'Link', array(
            'text' => EsoWidgetFormCorePart::text('Text', 'The text to use for the link.'),
            'target' => EsoWidgetFormCorePart::text('Destination', 'Where the link goes when clicked.'),
        ));

        $return['modifiers'] = EsoWidgetFormCorePart::section('Settings', array(
            'link_color' => EsoWidgetFormCorePart::color('Link Color', 'The color for the links in the nav.', EsoWidgetFormPart::default_color('darker_grey')),
            'link_hover_color' => EsoWidgetFormCorePart::color('Link Hover Color', 'The color for the links in the nav when hovered.', EsoWidgetFormPart::default_color('dark_grey')),
            'link_weight' => EsoWidgetFormPart::uikit('font_weight', 'Link Weight'),
            'divider' => EsoWidgetFormCorePart::select('Use Divider', 'Adds a vertical divider between the links.', 'uk-subnav-divider', array(
                '0' => __('No', 'echelon-so'),
                'uk-subnav-divider' => __('Yes', 'echelon-so')
            )),
            'divider_color' => EsoWidgetFormCorePart::color('Divider Color', 'The for the link divider.', EsoWidgetFormPart::default_color('light_grey')),
            'alignment' => EsoWidgetFormPart::uikit('flex_h', 'Nav Alignment'),
        ));

        return $return;

    }

}

siteorigin_widget_register('echelonso-eso-subnav', __FILE__, 'EchelonSOEsoSubnav');
