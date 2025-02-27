<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists('EsoFeaturePosition') ) {

    final class EsoFeaturePosition {

        public static function add_filters() {
            add_filter( 'siteorigin_panels_general_style_groups', array('EsoFeaturePosition', 'general_style_groups') );
            add_filter( 'siteorigin_panels_general_style_fields', array('EsoFeaturePosition', 'general_style_fields') );
            add_filter( 'siteorigin_panels_general_style_attributes', array('EsoFeaturePosition', 'general_style_attributes' ), 10, 2 );
        }

        /*
        * Add the Style Groups
        */

        public static function general_style_groups($groups) {

            $groups['echelonso_position_group'] = array(
                'name'     => __( 'Position', 'echelon-so' ),
                'priority' => 9060
            );

            return $groups;
        }

        /*
        * Add fields to the group
        */


        public static function general_style_fields($fields) {

            $fields['echelonso_helper_css_position_relative'] = array(
                'name'        => __( 'Relative', 'echelon-so' ),
                'description' => __( 'Set Relative to position this elements children within itself <span style="color: #000;">(exlcusive from Absolute & Fixed)</span>.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_position_group',
                'priority'    => 10,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'uk-position-relative' => __('Relative', 'echelon-so'),
                )
            );

            $fields['echelonso_helper_css_position_absolute'] = array(
                'name'        => __( 'Absolute', 'echelon-so' ),
                'description' => __( 'Position this element within a Relative parent <span style="color: #000;">(exlcusive from Relative & Fixed)</span>.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_position_group',
                'priority'    => 20,
                'default'     => '0',
                'options'     => EsoWidgetFormPartOptions::position()
            );

            $fields['echelonso_helper_css_position_fixed'] = array(
                'name'        => __( 'Fixed', 'echelon-so' ),
                'description' => __( 'Position this element relative to the viewport <span style="color: #000;">(exclusive from Relative & Absolute)</span>.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_position_group',
                'priority'    => 30,
                'default'     => '0',
                'options'     => EsoWidgetFormPartOptions::position()
            );

            $fields['echelonso_helper_css_position_size'] = array(
                'name'        => __( 'Position Size', 'echelon-so' ),
                'description' => __( 'Move the position inwards away from the edge of the parent <span style="color: #000;">(requires Absolute or Fixed)</span>.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_position_group',
                'priority'    => 35,
                'default'     => '0',
                'options'     => EsoWidgetFormPartOptions::position_size()
            );

            $fields['echelonso_helper_css_position_flex_v'] = array(
                'name'        => __( 'Flex Vertical', 'echelon-so' ),
                'description' => __( 'Position the inner content vertically.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_position_group',
                'priority'    => 40,
                'default'     => '0',
                'options'     => EsoWidgetFormPartOptions::flex_v()
            );

            $fields['echelonso_helper_css_position_flex_h'] = array(
                'name'        => __( 'Flex Horizontal', 'echelon-so' ),
                'description' => __( 'Position the inner content horizontally.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_position_group',
                'priority'    => 45,
                'default'     => '0',
                'options'     => EsoWidgetFormPartOptions::flex_h()
            );

            $fields['echelonso_helper_css_translate_x'] = array(
                'name'        => __( 'Translate X', 'echelon-so' ),
                'description' => __( 'Move the element on the x-axis. E.g -100', 'echelon-so' ),
                'type'        => 'measurement',
                'group'       => 'echelonso_position_group',
                'priority'    => 50,
                'multiple'    => false
            );

            $fields['echelonso_helper_css_translate_y'] = array(
                'name'        => __( 'Translate Y', 'echelon-so' ),
                'description' => __( 'Move the element on the y-axis. E.g -100', 'echelon-so' ),
                'type'        => 'measurement',
                'group'       => 'echelonso_position_group',
                'priority'    => 50,
                'multiple'    => false
            );

            $fields['echelonso_helper_css_scale'] = array(
                'name'        => __( 'Scale (float)', 'echelon-so' ),
                'description' => __( 'Proportionally scale the element. E.g 1.1', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'echelonso_position_group',
                'priority'    => 60,
            );

            return $fields;

        }

        /*
        * Output the fields to the front end
        */

        public static function general_style_attributes( $attributes, $style ) {

            if ( !empty($style['echelonso_helper_css_position_relative']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_position_relative'];
            }

            if ( !empty($style['echelonso_helper_css_position_absolute']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_position_absolute'];
            }

            if ( !empty($style['echelonso_helper_css_position_fixed']) ) {
                $attributes['class'][] = 'uk-position-fixed';
                $attributes['class'][] = $style['echelonso_helper_css_position_fixed'];
            }

            if ( !empty($style['echelonso_helper_css_position_size']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_position_size'];
            }

            if ( !empty($style['echelonso_helper_css_position_flex_v']) || !empty($style['echelonso_helper_css_position_flex_h']) ) {
                $attributes['class'][] = 'uk-flex';
            }

            if ( !empty($style['echelonso_helper_css_position_flex_v']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_position_flex_v'];
            }

            if ( !empty($style['echelonso_helper_css_position_flex_h']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_position_flex_h'];
            }

            if ( !empty($style['echelonso_helper_css_translate_x']) || !empty($style['echelonso_helper_css_translate_y']) || !empty($style['echelonso_helper_css_scale']) ) {
                $attributes['style'] .= 'transform: ';
                if ( !empty($style['echelonso_helper_css_translate_x']) ) {
                    $attributes['style'] .= ' translateX('.$style['echelonso_helper_css_translate_x'].')';
                }
                if ( !empty($style['echelonso_helper_css_translate_y']) ) {
                    $attributes['style'] .= ' translateY('.$style['echelonso_helper_css_translate_y'].')';
                }
                if ( !empty($style['echelonso_helper_css_scale']) ) {
                    $attributes['style'] .= ' scale('.$style['echelonso_helper_css_scale'].')';
                }
                $attributes['style'] .= ';';
            }

            return $attributes;

        }

    }

}
