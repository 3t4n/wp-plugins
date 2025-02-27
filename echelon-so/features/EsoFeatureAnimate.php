<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists('EsoFeatureAnimate') ) {

    final class EsoFeatureAnimate {

        public static function add_filters() {
            add_filter( 'siteorigin_panels_widget_style_groups', array( 'EsoFeatureAnimate', 'widget_style_groups') );
            add_filter( 'siteorigin_panels_widget_style_fields', array('EsoFeatureAnimate', 'widget_style_fields') );
            add_filter( 'siteorigin_panels_widget_style_attributes', array( 'EsoFeatureAnimate', 'widget_style_attributes' ), 10, 2 );
            add_filter( 'siteorigin_panels_row_style_groups', array( 'EsoFeatureAnimate', 'row_style_groups') );
            add_filter( 'siteorigin_panels_row_style_fields', array( 'EsoFeatureAnimate', 'row_style_fields') );
            add_filter( 'siteorigin_panels_cell_style_groups', array( 'EsoFeatureAnimate', 'row_style_groups') );
            add_filter( 'siteorigin_panels_cell_style_fields', array( 'EsoFeatureAnimate', 'row_style_fields') );
        }

        /*
        * Add the Style Groups
        */

        public static function widget_style_groups($groups) {

            $groups['echelonso_animate_group'] = array(
                'name'     => __( 'Animate', EsoWidgetFormPart::text_domain() ),
                'priority' => 9000
            );

            return $groups;

        }

        public static function row_style_groups($groups) {

            $groups['echelonso_animate_group'] = array(
                'name'     => __( 'Animate' . EsoWidgetFormPart::prime_tag(), EsoWidgetFormPart::text_domain() ),
                'priority' => 9000
            );

            return $groups;

        }

        /*
        * Add fields to the group
        */


        public static function widget_style_fields($fields) {

            $fields['echelonso_animate_effect'] = array(
                'name'        => __( 'Effect', EsoWidgetFormPart::text_domain() ),
                'description' => __( 'Choose the entrance animation for this widget.', EsoWidgetFormPart::text_domain() ),
                'type'        => 'select',
                'group'       => 'echelonso_animate_group',
                'priority'    => 100,
                'default'     => '0',
                'options'     => EsoWidgetFormPartOptions::animation()
            );

            $fields['echelonso_animate_effect_origin'] = array(
                'name'        => __( 'Origin', EsoWidgetFormPart::text_domain() ),
                'description' => __( 'Adjust the effect origin from the default (Center).', EsoWidgetFormPart::text_domain() ),
                'type'        => 'select',
                'group'       => 'echelonso_animate_group',
                'priority'    => 200,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', EsoWidgetFormPart::text_domain()),
                    'uk-transform-origin-top-left' => __('Top Left', EsoWidgetFormPart::text_domain()),
                    'uk-transform-origin-top-center' => __('Top Center', EsoWidgetFormPart::text_domain()),
                    'uk-transform-origin-top-right' => __('Top Right', EsoWidgetFormPart::text_domain()),
                    'uk-transform-origin-center-left' => __('Center Left', EsoWidgetFormPart::text_domain()),
                    'uk-transform-origin-center-right' => __('Center Right', EsoWidgetFormPart::text_domain()),
                    'uk-transform-origin-bottom-left' => __('Bottom Left', EsoWidgetFormPart::text_domain()),
                    'uk-transform-origin-bottom-center' => __('Bottom Center', EsoWidgetFormPart::text_domain()),
                    'uk-transform-origin-bottom-right' => __('Bottom Right', EsoWidgetFormPart::text_domain())
                )
            );

            $fields['echelonso_animate_offset'] = array(
                'name'        => __( 'Offset (px)', EsoWidgetFormPart::text_domain() ),
                'description' => __( 'How far from the bottom of the screen before the animation triggers. E.g 300.', EsoWidgetFormPart::text_domain()),
                'type'        => 'text',
                'group'       => 'echelonso_animate_group',
                'priority'    => 300,
                'default'     => '',
            );

            return $fields;
        }

        public static function row_style_fields($fields) {

            $fields['echelonso_animate_effect'] = array(
                'name'        => __( 'Effect', EsoWidgetFormPart::text_domain() ),
                'description' => __( 'Choose the effect for each widget in the row or cell.', EsoWidgetFormPart::text_domain() ),
                'type'        => 'select',
                'group'       => 'echelonso_animate_group',
                'priority'    => 100,
                'default'     => '0',
                'options'     => EsoWidgetFormPartOptions::animation()
            );

            $fields['echelonso_animate_effect_origin'] = array(
                'name'        => __( 'Origin', EsoWidgetFormPart::text_domain() ),
                'description' => __( 'Adjust the effect origin from the default (Center).', EsoWidgetFormPart::text_domain() ),
                'type'        => 'select',
                'group'       => 'echelonso_animate_group',
                'priority'    => 200,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', EsoWidgetFormPart::text_domain()),
                    'uk-transform-origin-top-left' => __('Top Left', EsoWidgetFormPart::text_domain()),
                    'uk-transform-origin-top-center' => __('Top Center', EsoWidgetFormPart::text_domain()),
                    'uk-transform-origin-top-right' => __('Top Right', EsoWidgetFormPart::text_domain()),
                    'uk-transform-origin-center-left' => __('Center Left', EsoWidgetFormPart::text_domain()),
                    'uk-transform-origin-center-right' => __('Center Right', EsoWidgetFormPart::text_domain()),
                    'uk-transform-origin-bottom-left' => __('Bottom Left', EsoWidgetFormPart::text_domain()),
                    'uk-transform-origin-bottom-center' => __('Bottom Center', EsoWidgetFormPart::text_domain()),
                    'uk-transform-origin-bottom-right' => __('Bottom Right', EsoWidgetFormPart::text_domain())
                )
            );

            $fields['echelonso_animate_offset'] = array(
                'name'        => __( 'Offset (px)', EsoWidgetFormPart::text_domain() ),
                'description' => __( 'How far from the bottom of the screen before the animation triggers. E.g 300.', EsoWidgetFormPart::text_domain()),
                'type'        => 'text',
                'group'       => 'echelonso_animate_group',
                'priority'    => 300,
                'default'     => '',
            );

            $fields['echelonso_animate_delay'] = array(
                'name'        => __( 'Delay', EsoWidgetFormPart::text_domain() ),
                'description' => __( 'The time in milliseconds between each animation. E.g 500.', EsoWidgetFormPart::text_domain()),
                'type'        => 'text',
                'group'       => 'echelonso_animate_group',
                'priority'    => 350,
                'default'     => '',
            );

            $fields['echelonso_animate_hover_toggle'] = array(
                'name'        => __( 'Hover Toggle', EsoWidgetFormPart::text_domain() ),
                'description' => __( 'Toggle animations on the rows widgets when hovered.', EsoWidgetFormPart::text_domain()),
                'type'        => 'checkbox',
                'group'       => 'echelonso_animate_group',
                'priority'    => 400,
                'default'     => '',
            );

            return $fields;
        }

        /*
        * Add the Attributes
        */

        public static function widget_style_attributes( $attributes, $style ) {

            if ( !empty($style['echelonso_animate_effect']) ) {

                $attributes['tabindex'] = '0';
                $attributes['class'][] = 'eso-animate-hidden-widget';

                $attributes['uk-scrollspy'] = 'cls: eso-animate-visible-widget ' . $style['echelonso_animate_effect'] . ';';

                if ( !empty($style['echelonso_animate_offset'] ) ) {
                    $attributes['uk-scrollspy'] .= 'offset-top: -' . absint($style['echelonso_animate_offset']) . '; delay: 10;';
                }

            }

            return $attributes;
        }

    }

}
