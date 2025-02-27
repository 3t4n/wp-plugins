<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists('EsoFeatureDesign') ) {

    final class EsoFeatureDesign {

        public static function add_filters() {
            add_filter( 'siteorigin_panels_general_style_fields', array('EsoFeatureDesign', 'general_style_fields') );
            add_filter( 'siteorigin_panels_general_style_attributes', array( 'EsoFeatureDesign', 'general_style_attributes' ), 10, 2 );
        }

        /*
        * Add fields to the group
        */


        public static function general_style_fields($fields) {

            $fields['echelonso_helper_css_box_shadow'] = array(
                'name'        => __( 'Box Shadow', 'echelon-so' ),
                'description' => __( 'Apply a box shadow to this element.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'design',
                'priority'    => 220,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'uk-box-shadow-small' => __('Small', 'echelon-so'),
                    'uk-box-shadow-medium' => __('Medium', 'echelon-so'),
                    'uk-box-shadow-large' => __('Large', 'echelon-so'),
                    'uk-box-shadow-xlarge' => __('xLarge', 'echelon-so'),
                )
            );

            $fields['echelonso_helper_css_box_shadow_hover'] = array(
                'name'        => __( 'Box Shadow Hover', 'echelon-so' ),
                'description' => __( 'Apply a box shadow to this element when hovered.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'design',
                'priority'    => 230,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'uk-box-shadow-hover-small' => __('Small', 'echelon-so'),
                    'uk-box-shadow-hover-medium' => __('Medium', 'echelon-so'),
                    'uk-box-shadow-hover-large' => __('Large', 'echelon-so'),
                    'uk-box-shadow-hover-xlarge' => __('xLarge', 'echelon-so'),
                )
            );

            return $fields;

        }

        /*
        * Output the fields to the front end
        */

        public static function general_style_attributes( $attributes, $style ) {

            if ( !empty($style['echelonso_helper_css_box_shadow']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_box_shadow'];
            }

            if ( !empty($style['echelonso_helper_css_box_shadow_hover']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_box_shadow_hover'];
            }

            return $attributes;

        }

    }

}
