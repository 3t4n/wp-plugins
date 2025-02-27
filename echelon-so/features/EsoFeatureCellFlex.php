<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists('EsoFeatureCellFlex') ) {

    final class EsoFeatureCellFlex {

        public static function add_filters() {
            add_filter( 'siteorigin_panels_cell_style_fields', array( 'EsoFeatureCellFlex', 'cell_style_fields') );
            add_filter( 'siteorigin_panels_cell_style_attributes', array( 'EsoFeatureCellFlex', 'cell_style_attributes' ), 10, 2 );
        }


        /*
        *	Cell Style Fields
        */

        public static function cell_style_fields($fields) {

            $fields['echelonso_cell_flex_h'] = array(
                'name'        => __('Flex Horizontal', 'echelon-prime'),
                'type'        => 'select',
                'group'       => 'layout',
                'priority'    => 1000,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'uk-flex-left' => __('Left', 'echelon-so'),
                    'uk-flex-center' => __('Center', 'echelon-so'),
                    'uk-flex-right' => __('Right', 'echelon-so'),
                )
            );

            $fields['echelonso_cell_flex_v'] = array(
                'name'        => __( 'Flex Vertical', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'layout',
                'priority'    => 1100,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'uk-flex-middle' => __('Middle', 'echelon-so'),
                    'uk-flex-top' => __('Top', 'echelon-so'),
                    'uk-flex-bottom' => __('Bottom', 'echelon-so'),
                )
            );

            return apply_filters('eso_cell_flex', $fields);
        }

        /*
        *	Add the Style Fields
        */

        public static function cell_style_attributes( $attributes, $style ) {

            if ( !empty($style['echelonso_cell_flex_h']) || !empty($style['echelonso_cell_flex_v'])  ) {
                $attributes['class'][] = 'uk-flex';
                $attributes['class'][] = 'uk-grid';
                $attributes['class'][] = 'uk-grid-collapse';
            }

            if ( !empty($style['echelonso_cell_flex_h']) ) {
                $attributes['class'][] = $style['echelonso_cell_flex_h'];
            }

            if ( !empty($style['echelonso_cell_flex_v']) ) {
                $attributes['class'][] = $style['echelonso_cell_flex_v'];
            }

            return $attributes;
        }

    }

}
