<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists('EsoFeatureSticky') ) {

    final class EsoFeatureSticky {

        public static function add_filters() {
            add_filter( 'siteorigin_panels_widget_style_fields', array( 'EsoFeatureSticky', 'widget_style_fields') );
            add_filter( 'siteorigin_panels_widget_style_attributes', array( 'EsoFeatureSticky', 'widget_style_attributes' ), 10, 2 );
        }

        /*
        * Add the Style Fields
        */

        public static function widget_style_fields($fields) {

            $fields['echelonso_sticky_widget'] = array(
                'name'        => __( 'Sticky', 'echelon-so' ),
                'type'        => 'checkbox',
                'group'       => 'layout',
                'description' => __( 'Stick this widget to its parent cell. Learn more about Sticky <a target="_blank" href="https://echelonso.com/features/sticky/">here</a>.', 'echelon-so' ),
                'priority'    => 100,
                'default'     => false,
            );

            $fields['echelonso_sticky_widget_offset'] = array(
                'name'        => __( 'Sticky Offset (px)', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'layout',
                'description' => __( 'Offset the stick in pixels. E.g 100', 'echelon-so' ),
                'priority'    => 200,
            );

            return $fields;
        }

        /*
        * Add the Attributes
        */

        public static function widget_style_attributes( $attributes, $style ) {

            if ( !empty($style['echelonso_sticky_widget']) ) {

                $attributes['uk-sticky'] = 'bottom: !.panel-grid;';

                if ( !empty($style['echelonso_sticky_widget_offset'] ) ) {
                    $attributes['uk-sticky'] .= 'offset:' . intval($style['echelonso_sticky_widget_offset']) . ';';
                    $attributes['class'][] = 'uk-position-z-index';
                }

            }

            return $attributes;
        }

    }

}
