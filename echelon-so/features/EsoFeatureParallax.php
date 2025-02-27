<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists('EsoFeatureParallax') ) {

    final class EsoFeatureParallax {

        public static function add_filters() {
            add_filter( 'siteorigin_panels_general_style_groups', array('EsoFeatureParallax', 'general_style_groups') );
            add_filter( 'siteorigin_panels_general_style_fields', array('EsoFeatureParallax', 'general_style_fields') );
        }

        /*
        * Add the Style Groups
        */

        public static function general_style_groups($groups) {
            $groups['echelonso_parallax_group'] = array(
                'name'     => __( 'Parallax' . EsoWidgetFormPart::prime_tag(), 'echelon-so' ),
                'priority' => 9050
            );
            return $groups;
        }

        /*
        * Add fields to the group
        */


        public static function general_style_fields($fields) {

            $fields['echelonso_parallax_viewport'] = array(
                'name'        => __( 'Viewport', 'echelon-so' ),
                'description' => __( 'The scroll position in the viewport when to arrive at the end value. A number between 0 (bottom) - 1 (top) with 0.5 being halfway.', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 100,
            );

            $fields['echelonso_parallax_media'] = array(
                'name'        => __( 'Screen Size', 'echelon-so' ),
                'description' => __( 'Only apply Parallax above this screen size.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 100,
                'default'    => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'mobile' => __('Above Mobile', 'echelon-so'),
                    'tablet' => __('Above Tablet', 'echelon-so'),
                ),
            );

            // option 1

            $fields['echelonso_parallax_option_1'] = array(
                'name'        => __( 'Option 1', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 1000,
                'default'     => '0',
                'options'   => array(
                    '0'         => __('-', 'echelon-so'),
                    'x'         => __('Translate X (px)', 'echelon-so'),
                    'y'         => __('Translate Y (px)', 'echelon-so'),
                    'bgx'       => __('Background X (px)', 'echelon-so'),
                    'bgy'       => __('Background Y (px)', 'echelon-so'),
                    'rotate'    => __('Rotate (deg)', 'echelon-so'),
                    'scale'     => __('Scale (float)', 'echelon-so'),
                    'opacity'   => __('Opacity (float)', 'echelon-so'),
                    'blur'      => __('Blur (px)', 'echelon-so'),
                    'grayscale' => __('Greyscale (%)', 'echelon-so'),
                )
            );

            $fields['echelonso_parallax_option_1_start'] = array(
                'name'        => __( 'Option 1 Start Value', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 1100,
            );

            $fields['echelonso_parallax_option_1_end'] = array(
                'name'        => __( 'Option 1 End Value', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 1200,
            );

            // option 2

            $fields['echelonso_parallax_option_2'] = array(
                'name'        => __( 'Option 2', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 2000,
                'default'     => '0',
                'options'   => array(
                    '0'         => __('-', 'echelon-so'),
                    'x'         => __('Translate X (px)', 'echelon-so'),
                    'y'         => __('Translate Y (px)', 'echelon-so'),
                    'bgx'       => __('Background X (px)', 'echelon-so'),
                    'bgy'       => __('Background Y (px)', 'echelon-so'),
                    'rotate'    => __('Rotate (deg)', 'echelon-so'),
                    'scale'     => __('Scale (float)', 'echelon-so'),
                    'opacity'   => __('Opacity (float)', 'echelon-so'),
                    'blur'      => __('Blur (px)', 'echelon-so'),
                    'grayscale' => __('Greyscale (%)', 'echelon-so'),
                )
            );

            $fields['echelonso_parallax_option_2_start'] = array(
                'name'        => __( 'Option 2 Start Value', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 2100,
            );

            $fields['echelonso_parallax_option_2_end'] = array(
                'name'        => __( 'Option 2 End Value', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 2200,
            );

            // option 3

            $fields['echelonso_parallax_option_3'] = array(
                'name'        => __( 'Option 3', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 3000,
                'default'     => '0',
                'options'   => array(
                    '0'         => __('-', 'echelon-so'),
                    'x'         => __('Translate X (px)', 'echelon-so'),
                    'y'         => __('Translate Y (px)', 'echelon-so'),
                    'bgx'       => __('Background X (px)', 'echelon-so'),
                    'bgy'       => __('Background Y (px)', 'echelon-so'),
                    'rotate'    => __('Rotate (deg)', 'echelon-so'),
                    'scale'     => __('Scale (float)', 'echelon-so'),
                    'opacity'   => __('Opacity (float)', 'echelon-so'),
                    'blur'      => __('Blur (px)', 'echelon-so'),
                    'grayscale' => __('Greyscale (%)', 'echelon-so'),
                )
            );

            $fields['echelonso_parallax_option_3_start'] = array(
                'name'        => __( 'Option 3 Start Value', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 3100,
            );

            $fields['echelonso_parallax_option_3_end'] = array(
                'name'        => __( 'Option 3 End Value', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 3200,
            );

            return $fields;

        }

    }

}
