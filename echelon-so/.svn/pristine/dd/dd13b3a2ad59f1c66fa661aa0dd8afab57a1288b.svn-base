<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists('EsoFeatureAttribute') ) {

    final class EsoFeatureAttribute {

        public static function add_filters() {
            add_filter( 'siteorigin_panels_general_style_fields', array( 'EsoFeatureAttribute', 'general_style_fields') );
            add_filter( 'siteorigin_panels_general_style_attributes', array( 'EsoFeatureAttribute', 'general_style_attributes' ), 10, 2 );
        }

        /**
        * Add the Style Fields
        */

        public static function general_style_fields($fields) {

            $fields['echelonso_attribute_key'] = array(
                'name'        => __( 'Attribute Key', EsoWidgetFormPart::text_domain() ),
                'description' => __( 'Adds the elements attribute key (value required).', EsoWidgetFormPart::text_domain() ),
                'type'        => 'text',
                'group'       => 'attributes',
                'priority'    => 1000,
                'default'     => ''
            );

            $fields['echelonso_attribute_value'] = array(
                'name'        => __( 'Attribute Value', EsoWidgetFormPart::text_domain() ),
                'description' => __( 'Adds the elements attribute value (key required).', EsoWidgetFormPart::text_domain() ),
                'type'        => 'text',
                'group'       => 'attributes',
                'priority'    => 1100,
                'default'     => ''
            );

            return $fields;

        }

        /**
        * Add the Attributes
        */

        public static function general_style_attributes( $attributes, $style ) {

            if ( !empty($style['echelonso_attribute_key']) && !empty($style['echelonso_attribute_value']) ) {
                $attributes[$style['echelonso_attribute_key']] = $style['echelonso_attribute_value'];
            }

            return $attributes;
        }

    }

}
