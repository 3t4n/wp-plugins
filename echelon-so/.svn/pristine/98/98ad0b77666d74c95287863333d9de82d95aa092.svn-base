<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists('EsoFeatureLinkedWidgets') ) {

    final class EsoFeatureLinkedWidgets {

        public static function add_filters() {
            add_filter( 'siteorigin_panels_widget_style_fields', array( 'EsoFeatureLinkedWidgets', 'widget_style_fields') );
            add_filter( 'siteorigin_panels_widget_style_attributes', array( 'EsoFeatureLinkedWidgets', 'widget_style_attributes' ), 10, 2 );
        }


        /*
        * Add fields to the group
        */

        public static function widget_style_fields($fields) {

            $fields['echelonso_linked_widgets'] = array(
                'name'        => __('Widget Link', 'echelon-so'),
                'type'        => 'text',
                'group'       => 'attributes',
                'priority'    => 900,
                'description' =>__('Link to a URL, Post ID or SiteOrigin query syntax.', 'echelon-so')
            );

            return $fields;

        }

        /*
        * Output the fields to the front end
        */

        public static function widget_style_attributes( $attributes, $style ) {

            if ( !empty($style['echelonso_linked_widgets']) ) {

                if (filter_var($style['echelonso_linked_widgets'], FILTER_VALIDATE_URL) === FALSE) {

                    if ( is_numeric($style['echelonso_linked_widgets']) ) {

                        $attributes['data-echelonso_linked_widgets'] = get_permalink($style['echelonso_linked_widgets']);

                    } else {

                        $attributes['data-echelonso_linked_widgets'] = sow_esc_url($style['echelonso_linked_widgets']);

                    }

                } else {

                    $attributes['data-echelonso_linked_widgets'] = esc_url($style['echelonso_linked_widgets']);

                }
            }

            return $attributes;
        }

    } // end class

} // end class_exists
