<?php

/*
Widget Name: E: Divider
Description: Horizontal and veritcal dividers.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/divider/
*/

class EchelonSOEsoDivider extends SiteOrigin_Widget {

    function __construct() {

        parent::__construct(
            'echelonso-eso-divider',
            __('E: Divider', 'echelon-so'),
            array(
                'description' => __('Horizontal and veritcal dividers.', 'echelon-so' ),
                'help' => 'https://echelonso.com/widgets/divider/',
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
        $allowed_templates = array('default', 'small', 'vertical');
        if ( in_array($instance['divider']['template'], $allowed_templates) ) {
            return $instance['divider']['template'];
        } else {
            return 'default';
        }
    }

    /*
    * Template Variables
    */

    function get_template_variables($instance, $args) {
        $return = array();
        $return['divider_color'] = !empty($instance['divider']['divider_color']) ? $instance['divider']['divider_color'] : 'inherit';
        // icon
        $return['icon'] = !empty($instance['divider']['icon']) ? $instance['divider']['icon'] : '';
        $return['icon_styles'][] = !empty($instance['divider']['icon_color']) ? 'color: ' . $instance['divider']['icon_color'] : 'inherit';
        $return['icon_styles'][] = !empty($instance['divider']['icon_size']) ? 'font-size: ' . $instance['divider']['icon_size'] : 'inherit';

        // modifiers
        $return['divider_class'][] = 'eso';
        (empty($instance['divider']['align'])) ?: $return['divider_class'][] = $instance['divider']['align'];

        return $return;
    }

    /*
    * Widget Form
    */

    function get_widget_form() {

        $return['divider'] = EsoWidgetFormCorePart::section('Settings', array(
            'template' => EsoWidgetFormCorePart::select('Template', 'Choose which temaplte to use.', 'default', array(
                'default' => __('Large', EsoWidgetFormPart::text_domain()),
                'small' => __('Small', EsoWidgetFormPart::text_domain()),
                'vertical' => __('Vertical', EsoWidgetFormPart::text_domain()),
                'icon' => __('Icon' . EsoWidgetFormPart::prime_tag(), EsoWidgetFormPart::text_domain()),
            ), array(

            ), array(
                'callback' => 'select',
                'args' => array('template')
            )),
            'divider_color' => EsoWidgetFormCorePart::color('Color', 'Choose a color for the divider.', EsoWidgetFormPart::default_color('primary')),
            'align' => EsoWidgetFormCorePart::select('Alignment', 'How to slign the divider.', '0', array(
                '0' => __('-', 'echelon-so'),
                'uk-text-left' => __('Left', 'echelon-so'),
                'uk-text-center' => __('Center', 'echelon-so'),
                'uk-text-right' => __('Right', 'echelon-so'),
            ), array(
                'template[small]' => array('show'),
                '_else[template]' => array('hide'),
            )),
            'icon' => EsoWidgetFormCorePart::icon('Icon' . EsoWidgetFormPart::prime_tag(), 'Choose which icon to use.', '', array(
                'template[icon]' => array('show'),
                '_else[template]' => array('hide')
            )),
            'icon_color' => EsoWidgetFormCorePart::color('Icon Color' . EsoWidgetFormPart::prime_tag(), 'Choose a color for the icon.', EsoWidgetFormPart::default_color('secondary'), array(
                'template[icon]' => array('show'),
                '_else[template]' => array('hide')
            )),
            'icon_size' => EsoWidgetFormCorePart::measurement('Icon Size' . EsoWidgetFormPart::prime_tag(), 'Choose a size for the icon.', '30px', array(
                'template[icon]' => array('show'),
                '_else[template]' => array('hide'),
            )),
        ));

        return $return;

    }

    /*
    * Instance modifications
    * The form changes over time
    */

    function modify_instance( $instance )  {
        // update 2.1.0
        if ( isset($instance['modifiers']['align']) ) {
            $instance['divider']['align'] = $instance['modifiers']['align'];
            unset( $instance['modifiers']['align'] );
        }
        // end 2.1.0
        return $instance;
    }

}

siteorigin_widget_register('echelonso-eso-divider', __FILE__, 'EchelonSOEsoDivider');
