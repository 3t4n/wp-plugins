<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists('EsoFeatureAnimatedGradients') ) {

    final class EsoFeatureAnimatedGradients {

        public static function add_filters() {
            add_filter( 'siteorigin_panels_general_style_groups', array( 'EsoFeatureAnimatedGradients', 'general_style_groups') );
            add_filter( 'siteorigin_panels_general_style_fields', array( 'EsoFeatureAnimatedGradients', 'general_style_fields') );
            add_filter( 'siteorigin_panels_general_style_attributes', array( 'EsoFeatureAnimatedGradients', 'general_style_attributes' ), 10, 2 );
        }

        /*
        * Add the Style Groups
        */

        public static function general_style_groups($groups) {

            $groups['echelonso_gradient_states_group'] = array(
                'name'     => __( 'Animated Gradients', EsoWidgetFormPart::text_domain() ),
                'priority' => 9030
            );

            return $groups;

        }

        /*
        * Add fields to the group
        */


        public static function general_style_fields($fields) {

            $fields['echelonso_gradient_animation_direction'] = array(
                'name'        => __('Gradient Direction', EsoWidgetFormPart::text_domain()),
                'type'        => 'select',
                'group'       => 'echelonso_gradient_states_group',
                'description' => __('Choose a direction for the gradient.', EsoWidgetFormPart::text_domain()),
                'priority'    => 1,
                'options'     => array(
                    'left-right' => __('Left Right', EsoWidgetFormPart::text_domain()),
                    'top-bottom' => __('Top Bottom', EsoWidgetFormPart::text_domain()),
                )
            );

            $fields['echelonso_gradient_animation_speed'] = array(
                'name'        => __('Transition Speed', EsoWidgetFormPart::text_domain()),
                'type'        => 'text',
                'group'       => 'echelonso_gradient_states_group',
                'description' => __('Gradient transition speed in milliseconds. E.g 2000', EsoWidgetFormPart::text_domain()),
                'priority'    => 2,
            );

            // gradient 1
            $fields['echelonso_gradient_animation_1_start'] = array(
                'name'        => __('Gradient 1 Start', EsoWidgetFormPart::text_domain()),
                'type'        => 'color',
                'group'       => 'echelonso_gradient_states_group',
                'description' => __('Gradient 1 start color.', EsoWidgetFormPart::text_domain()),
                'priority'    => 101,
            );

            $fields['echelonso_gradient_animation_1_end'] = array(
                'name'        => __('Gradient 1 End', EsoWidgetFormPart::text_domain()),
                'type'        => 'color',
                'group'       => 'echelonso_gradient_states_group',
                'description' => __('Gradient 1 end color.', EsoWidgetFormPart::text_domain()),
                'priority'    => 103,
            );

            // gradient 2
            $fields['echelonso_gradient_animation_2_start'] = array(
                'name'        => __('Gradient 2 Start', EsoWidgetFormPart::text_domain()),
                'type'        => 'color',
                'group'       => 'echelonso_gradient_states_group',
                'description' => __('Gradient 2 start color.', EsoWidgetFormPart::text_domain()),
                'priority'    => 105,
            );

            $fields['echelonso_gradient_animation_2_end'] = array(
                'name'        => __('Gradient 2 End', EsoWidgetFormPart::text_domain()),
                'type'        => 'color',
                'group'       => 'echelonso_gradient_states_group',
                'description' => __('Gradient 2 end color.', EsoWidgetFormPart::text_domain()),
                'priority'    => 107,
            );

            // gradient 3
            $fields['echelonso_gradient_animation_3_start'] = array(
                'name'        => __('Gradient 3 Start', EsoWidgetFormPart::text_domain()),
                'type'        => 'color',
                'group'       => 'echelonso_gradient_states_group',
                'description' => __('Gradient 3 start color.', EsoWidgetFormPart::text_domain()),
                'priority'    => 110,
            );

            $fields['echelonso_gradient_animation_3_end'] = array(
                'name'        => __('Gradient 3 End', EsoWidgetFormPart::text_domain()),
                'type'        => 'color',
                'group'       => 'echelonso_gradient_states_group',
                'description' => __('Gradient 3 end color.', EsoWidgetFormPart::text_domain()),
                'priority'    => 111,
            );

            // gradient 4
            $fields['echelonso_gradient_animation_4_start'] = array(
                'name'        => __('Gradient 4 Start', EsoWidgetFormPart::text_domain()),
                'type'        => 'color',
                'group'       => 'echelonso_gradient_states_group',
                'description' => __('Gradient 4 start color.', EsoWidgetFormPart::text_domain()),
                'priority'    => 112,
            );

            $fields['echelonso_gradient_animation_4_end'] = array(
                'name'        => __('Gradient 4 End', EsoWidgetFormPart::text_domain()),
                'type'        => 'color',
                'group'       => 'echelonso_gradient_states_group',
                'description' => __('Gradient 4 end color.', EsoWidgetFormPart::text_domain()),
                'priority'    => 113,
            );

            return apply_filters('eso_animated_gradients', $fields);

        }

        /*
        * Output the fields to the front end
        */

        public static function general_style_attributes( $attributes, $style ) {

            if (!empty($style['echelonso_gradient_animation_1_start']) && !empty($style['echelonso_gradient_animation_1_end'])) {
                // prep the element
                $attributes['class'][] = 'eso-animated-gradient';
                $attributes['data-echelonso_animated_gradient'] = 'true';
                $id = 'ag_' . uniqid(rand(1,9999));
                $attributes['data-echelonso_animated_gradient_id'] = $id;
                // build granim data
                $args['granim'] = array();

                // check if we need to set a direction
                if (!empty($style['echelonso_gradient_animation_direction'])) {
                    $args['granim']['direction'] = esc_attr($style['echelonso_gradient_animation_direction']);
                } else {
                    $args['granim']['direction'] = 'top-bottom';
                }

                // set the speed atleast 1
                if (!empty($style['echelonso_gradient_animation_speed'])) {
                    $args['granim']['speed'] = absint($style['echelonso_gradient_animation_speed']);
                } else {
                    $args['granim']['speed'] = 0;
                }

                // performance
                $args['granim']['isPausedWhenNotInView'] = true;

                // add in the gradient states
                if ( !empty($style['echelonso_gradient_animation_1_start']) && !empty($style['echelonso_gradient_animation_1_end']) ) {
                    $args['granim']['states']['gradients'][] = array(sanitize_hex_color($style['echelonso_gradient_animation_1_start']), sanitize_hex_color($style['echelonso_gradient_animation_1_end']));
                }

                if ( !empty($style['echelonso_gradient_animation_2_start']) && !empty($style['echelonso_gradient_animation_2_end']) ) {
                    $args['granim']['states']['gradients'][] = array(sanitize_hex_color($style['echelonso_gradient_animation_2_start']), sanitize_hex_color($style['echelonso_gradient_animation_2_end']));
                }

                if ( !empty($style['echelonso_gradient_animation_3_start']) && !empty($style['echelonso_gradient_animation_3_end']) ) {
                    $args['granim']['states']['gradients'][] = array(sanitize_hex_color($style['echelonso_gradient_animation_3_start']), sanitize_hex_color($style['echelonso_gradient_animation_3_end']));
                }

                if ( !empty($style['echelonso_gradient_animation_4_start']) && !empty($style['echelonso_gradient_animation_4_end']) ) {
                    $args['granim']['states']['gradients'][] = array(sanitize_hex_color($style['echelonso_gradient_animation_4_start']), sanitize_hex_color($style['echelonso_gradient_animation_4_end']));
                }

                // add json to the element
                $attributes['data-echelonso_animated_gradient_data'] = json_encode($args['granim']);
            }

            return $attributes;

        }

    }

}
