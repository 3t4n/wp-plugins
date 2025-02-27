<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists('EsoFeatureHoverTransition') ) {

    final class EsoFeatureHoverTransition {

        public static function add_filters() {
            add_filter( 'siteorigin_panels_general_style_groups', array( 'EsoFeatureHoverTransition', 'general_style_groups') );
            add_filter( 'siteorigin_panels_general_style_fields', array( 'EsoFeatureHoverTransition', 'general_style_fields') );
        }

        /*
        * Add the Style Groups
        */

        public static function general_style_groups($groups) {

            $groups['echelonso_hover_transition_group'] = array(
                'name'     => __( 'Hover Transition' . EsoWidgetFormPart::prime_tag(), 'echelon-so' ),
                'priority' => 9040
            );

            return $groups;

        }

        /*
        * Add fields to the group
        */


        public static function general_style_fields($fields) {


            global $echelon_so_modifiers, $echelon_so;

            $fields['echelonso_hover_transition'] = array(
                'name'        => __( 'Transition', 'echelon-so' ),
                'description' => __( 'When the element is hovered this transition will be toggled on / off <span style="color: #000;">(exclusive from Child Toggle)</span>.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_hover_transition_group',
                'priority'    => 1,
                'default'     => '0',
                'options'     => EsoWidgetFormPartOptions::transition()
            );

            $fields['echelonso_hover_transition_transparent'] = array(
                'name'        => __( 'Transparent', 'echelon-so' ),
                'description' => __( 'The element will be transparent until hovered <span style="color: #000;">(exclusive from Child Toggle)</span>.', 'echelon-so' ),
                'type'        => 'checkbox',
                'group'       => 'echelonso_hover_transition_group',
                'priority'    => 2,
                'default'     => false,
            );

            $fields['echelonso_hover_transition_toggle'] = array(
                'name'        => __( 'Child Toggle', 'echelon-so' ),
                'description' => __( 'Toggle transitions on this elements children <span style="color: #000;">(exclusive from Transition & Transparent)</span>.', 'echelon-so' ),
                'type'        => 'checkbox',
                'group'       => 'echelonso_hover_transition_group',
                'priority'    => 3,
                'default'     => false,
            );

            return $fields;
        }

    }

}
