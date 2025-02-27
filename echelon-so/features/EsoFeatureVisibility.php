<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists('EsoFeatureVisibility') ) {

    final class EsoFeatureVisibility {

        public static function add_filters() {
            add_filter( 'siteorigin_panels_general_style_groups', array('EsoFeatureVisibility', 'general_style_groups') );
            add_filter( 'siteorigin_panels_general_style_fields', array('EsoFeatureVisibility', 'general_style_fields') );
            add_filter( 'siteorigin_panels_general_style_attributes', array('EsoFeatureVisibility', 'general_style_attributes' ), 10, 2 );
        }

        /*
        * Add the Style Groups
        */

        public static function general_style_groups($groups) {

            $groups['echelonso_visibility_group'] = array(
                'name'     => __( 'Visibility', 'echelon-so' ),
                'priority' => 9070
            );

            return $groups;
        }

        /*
        * Add fields to the group
        */


        public static function general_style_fields($fields) {


            $fields['echelonso_helper_css_show_desktop'] = array(
                'name'        => __( 'Desktop', 'echelon-so' ),
                'description' => __( 'Sizes are taken from Page Builder settings.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_visibility_group',
                'priority'    => 1,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'eso-hide-desktop' => __('Hide', 'echelon-so'),
                )
            );

            $fields['echelonso_helper_css_show_tablet'] = array(
                'name'        => __( 'Tablet', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_visibility_group',
                'priority'    => 2,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'eso-hide-tablet' => __('Hide', 'echelon-so'),
                )
            );

            $fields['echelonso_helper_css_show_mobile'] = array(
                'name'        => __( 'Mobile', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_visibility_group',
                'priority'    => 3,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'eso-hide-mobile' => __('Hide', 'echelon-so'),
                )
            );

            return $fields;

        }

        /*
        * Output the fields to the front end
        */

        public static function general_style_attributes( $attributes, $style ) {

            if ( !empty($style['echelonso_helper_css_show_desktop']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_show_desktop'];
            }

            if ( !empty($style['echelonso_helper_css_show_tablet']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_show_tablet'];
            }

            if ( !empty($style['echelonso_helper_css_show_mobile']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_show_mobile'];
            }

            return $attributes;

        }

    }

}
