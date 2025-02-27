<?php

/*
Widget Name: E: Tabs
Description: Animated content switching tabs.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/tabs/
*/

class EchelonSOEsoTabs extends SiteOrigin_Widget {

    function __construct() {

        parent::__construct(
            'echelonso-eso-tabs',
            __('E: Tabs', 'echelon-so'),
            array(
                'description' => __('Animated content switching tabs.', 'echelon-so' ),
                'help' => 'https://echelonso.com/widgets/tabs/',
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
        $return['tabs_repeater'] = !empty( $instance['tabs_repeater'] ) ? $instance['tabs_repeater'] : array();

        $return['tabs_class'] = array();
        (empty($instance['tab_appearance']['flex_h'])) ?: $return['tabs_class'][] = $instance['tab_appearance']['flex_h'];

        $return['link_class'] = array();
        (empty($instance['title']['title_size'])) ?: $return['link_class'][] = $instance['title']['title_size'];
        (empty($instance['title']['title_transform'])) ?: $return['link_class'][] = $instance['title']['title_transform'];

        $return['animation_in'] = !empty( $instance['settings']['animation_in'] ) ? $instance['settings']['animation_in'] : 'uk-animation-fade';
        $return['animation_out'] = !empty( $instance['settings']['animation_out'] ) ? $instance['settings']['animation_out'] : 'uk-animation-fade';

        // icon

        if ( EsoHelpers::key_equals($instance['settings']['template'], 'icon') ) {

            if ( !isset($instance['icon_appearance']['layout'])) {
                $return['icon_layout'] = 'top';
            } else {
                $return['icon_layout'] = $instance['icon_appearance']['layout'];
            }

        }

        return $return;
    }

    /*
    * Less Variables
    */

    function get_less_variables($instance) {

        $less_vars['active_color'] = !empty($instance['tab_appearance']['active_color']) ? $instance['tab_appearance']['active_color'] : false;
        $less_vars['inactive_color'] = !empty($instance['tab_appearance']['inactive_color']) ? $instance['tab_appearance']['inactive_color'] : false;
        $less_vars['hover_color'] = !empty($instance['tab_appearance']['hover_color']) ? $instance['tab_appearance']['hover_color'] : false;

        $less_vars['title_padding'] = !empty($instance['tab_appearance']['padding']) ? $instance['tab_appearance']['padding'] : false;
        $less_vars['title_margin'] = !empty($instance['tab_appearance']['margin']) ? $instance['tab_appearance']['margin'] : false;

        $less_vars['line_color'] = !empty($instance['tab_appearance']['line_color']) ? $instance['tab_appearance']['line_color'] : false;

        $less_vars['icon_active_color'] = !empty($instance['icon_appearance']['active_color']) ? $instance['icon_appearance']['active_color'] : false;
        $less_vars['icon_inactive_color'] = !empty($instance['icon_appearance']['inactive_color']) ? $instance['icon_appearance']['inactive_color'] : false;
        $less_vars['icon_hover_color'] = !empty($instance['icon_appearance']['hover_color']) ? $instance['icon_appearance']['hover_color'] : false;
        $less_vars['icon_size'] = !empty($instance['icon_appearance']['size']) ? $instance['icon_appearance']['size'] : false;

        return $less_vars;
    }

    /*
    * Widget Form
    */

    function get_widget_form() {

        $return['tabs_repeater'] = EsoWidgetFormCorePart::repeater('Tabs & Content', '', 'Tab', array(
            'icon' => EsoWidgetFormCorePart::icon('Icon', '', '', array(
                'template[icon]' => array( 'show' ),
                '_else[template]' => array( 'hide' ),
            )),
            'title' => EsoWidgetFormCorePart::text('Title'),
            'content' => EsoWidgetFormCorePart::builder('Content'),
        ));

        $return['settings'] = EsoWidgetFormCorePart::section('Settings', array(
            'template' => EsoWidgetFormCorePart::select('Template', 'Icon template requires icons to be set in the Tabs & Content repeater above.' . EsoWidgetFormPart::important(), 'default', array(
                'default' => __('Without Icon', 'echelon-so'),
                'icon' => __('With Icon' . EsoWidgetFormPart::prime_tag(), 'echelon-so'),
            ), array(

            ), array(
                'callback' => 'select',
                'args' => array('template')
            )),
            'animation_in' => EsoWidgetFormPart::uikit('animation', 'Animation In', 'Choose the tab entrance animation.', 'uk-animation-fade'),
            'animation_out' => EsoWidgetFormPart::uikit('animation', 'Animation Out', 'Choose the tab exit animation.', 'uk-animation-fade'),
        ));

        $return['tab_appearance'] = EsoWidgetFormCorePart::section('Tab Appearance', array(
            'flex_h' => EsoWidgetFormPart::uikit('flex_h', 'Alignment'),
            'font' => EsoWidgetFormCorePart::font(),
            'active_color' => EsoWidgetFormCorePart::color('Active Color', 'Text color for the active tab.', '#000000'),
            'inactive_color' => EsoWidgetFormCorePart::color('Inactive Color', 'Text color for inactive tabs.', '#454444'),
            'hover_color' => EsoWidgetFormCorePart::color('Hover Color', 'Text color for inactive tabs hover state.', '#000000'),
            'line_color' => EsoWidgetFormCorePart::color('Line Color', 'Color for the active tab line.', '#c00f5b'),
            'padding' => EsoWidgetFormCorePart::multi_measurement('Padding', 'Internal padding for each tab.', '5px 10px 5px 10px'),
            'margin' => EsoWidgetFormCorePart::multi_measurement('Margin', 'External margin for each tab.', '0px 15px 0px 0px'),
            'font_size' => EsoWidgetFormPart::uikit('font_size'),
            'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
            'text_transform' => EsoWidgetFormPart::uikit('text_transform'),
        ));

        $return['icon_appearance'] = EsoWidgetFormCorePart::section('Icon Appearance' . EsoWidgetFormPart::prime_tag(), array(
            'layout' => EsoWidgetFormCorePart::select('Layout', '', 'top', array(
                'top' => __('Top', 'echelon-so'),
                'left' => __('Left', 'echelon-so'),
            )),
            'active_color' => EsoWidgetFormCorePart::color('Active Color', 'Icon color for the active tab.', '#c00f5b'),
            'inactive_color' => EsoWidgetFormCorePart::color('Inactive Color', 'Icon color for inactive tabs.', '#e3e2e0'),
            'hover_color' => EsoWidgetFormCorePart::color('Hover Color', 'Icon color for inactive tabs hover state.', '#454444'),
            'size' => EsoWidgetFormCorePart::measurement('Size', 'Adjust the size of the icon.', '20px'),
        ), array(
            'template[icon]' => array( 'show' ),
            '_else[template]' => array( 'hide' ),
        ));

        return $return;

    }

}

siteorigin_widget_register('echelonso-eso-tabs', __FILE__, 'EchelonSOEsoTabs');
