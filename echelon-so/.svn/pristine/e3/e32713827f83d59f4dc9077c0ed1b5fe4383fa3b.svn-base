<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists('EsoFeatureScrollspy') ) {

    final class EsoFeatureScrollspy {

        public static function add_filters() {
            add_filter( 'siteorigin_panels_general_style_groups', array('EsoFeatureScrollspy', 'general_style_groups') );
            add_filter( 'siteorigin_panels_general_style_fields', array('EsoFeatureScrollspy', 'general_style_fields') );
        }

        /*
        * Add the Style Groups
        */

        public static function general_style_groups($groups) {

            $groups['echelonso_scrollspy_group'] = array(
                'name'     => __( 'Scrollspy' . EsoWidgetFormPart::prime_tag(), 'echelon-so' ),
                'priority' => 9065
            );

            return $groups;
        }

        /*
        * Add fields to the group
        */


        public static function general_style_fields($fields) {

            $fields['echelonso_scrollspy_class'] = array(
                'name'        => __( 'Class', 'echelon-so' ),
                'description' => __( 'The classes to toggle when the element enters / leaves the viewport.', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'echelonso_scrollspy_group',
                'priority'    => 10,
            );

            $fields['echelonso_scrollspy_hidden'] = array(
                'name'        => __( 'Hidden', 'echelon-so' ),
                'description' => __( 'Hides the element while out of view.', 'echelon-so' ),
                'type'        => 'checkbox',
                'default'     => false,
                'group'       => 'echelonso_scrollspy_group',
                'priority'    => 20,
            );

            $fields['echelonso_scrollspy_offset_top'] = array(
                'name'        => __( 'Offset Top (px)', 'echelon-so' ),
                'description' => __( 'How far into the viewport before the classes are toggled. E.g -200', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'echelonso_scrollspy_group',
                'priority'    => 30,
            );

            $fields['echelonso_scrollspy_repeat'] = array(
                'name'        => __( 'Repeat', 'echelon-so' ),
                'description' => __( 'Add classes when in and remove classes when out of view.', 'echelon-so' ),
                'type'        => 'checkbox',
                'default'     => false,
                'group'       => 'echelonso_scrollspy_group',
                'priority'    => 40,
            );

            $fields['echelonso_scrollspy_delay'] = array(
                'name'        => __( 'Delay', 'echelon-so' ),
                'description' => __( 'A delay in milliseconds before the clsasses are added. E.g 1000', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'echelonso_scrollspy_group',
                'priority'    => 50,
            );

            return $fields;

        }

    }

}
