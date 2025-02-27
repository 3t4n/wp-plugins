<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists('EsoFeatureBackground') ) {

    final class EsoFeatureBackground {

        public static function add_filters() {
            add_filter( 'siteorigin_panels_general_style_groups', array('EsoFeatureBackground', 'general_style_groups') );
            add_filter( 'siteorigin_panels_general_style_fields', array('EsoFeatureBackground', 'general_style_fields') );
            add_filter( 'siteorigin_panels_general_style_attributes', array('EsoFeatureBackground', 'general_style_attributes' ), 10, 2 );
            add_action( 'admin_print_footer_scripts', array('EsoFeatureBackground', 'admin_footer_js'));
        }

        /*
        * Add the Style Groups
        */

        public static function general_style_groups($groups) {

            $groups['echelonso_background_group'] = array(
                'name'     => __( 'Background', 'echelon-so' ),
                'priority' => 9020
            );

            return $groups;
        }

        /*
        * Add fields to the group
        */


        public static function general_style_fields($fields) {

            global $echelon_so;

            $fields['echelonso_background_rgba'] = array(
                'name'        => __('Background Color', 'echelon-prime'),
                'type'        => 'text',
                'group'       => 'echelonso_background_group',
                'priority'    => 2,
                'description' => __('Set a RGBA background color.', 'echelon-so')
            );

            $fields['echelonso_helper_css_background_image'] = array(
                'name'        => __( 'Image', 'siteorigin-panels' ),
                'description' => __( 'External images are not currently supported.', 'echelon-so' ),
                'type'        => 'image',
                'group'       => 'echelonso_background_group',
                'priority'    => 10,
            );

            $fields['echelonso_helper_css_background_image_size'] = array(
                'name'        => __( 'Image Size', 'echelon-so' ),
                'description' => __( 'Use this image size instead of full.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_background_group',
                'priority'    => 15,
                'default'     => '0',
                'options'     => EsoHelpers::image_sizes()
            );


            $fields['echelonso_helper_css_background_size'] = array(
                'name'        => __( 'Size', 'echelon-so' ),
                'description' => __( 'How to size the background image.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_background_group',
                'priority'    => 30,
                'default'     => '0',
                'options'     => EsoWidgetFormPartOptions::background_size()
            );

            $fields['echelonso_helper_css_background_position'] = array(
                'name'        => __( 'Position', 'echelon-so' ),
                'description' => __( 'How to position the background image.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_background_group',
                'priority'    => 40,
                'default'     => '0',
                'options'     => EsoWidgetFormPartOptions::background_position()
            );

            $fields['echelonso_helper_css_background_repeat'] = array(
                'name'        => __( 'Repeat', 'echelon-so' ),
                'description' => __( 'Disable repeating (tile) small images.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_background_group',
                'priority'    => 50,
                'default'     => '0',
                'options'     => EsoWidgetFormPartOptions::background_repeat()
            );

            $fields['echelonso_helper_css_background_attachment'] = array(
                'name'        => __( 'Attachment', 'echelon-so' ),
                'description' => __( 'How to attach the background image.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_background_group',
                'priority'    => 60,
                'default'     => '0',
                'options'     => EsoWidgetFormPartOptions::background_attachment()
            );

            $fields['echelonso_helper_css_background_responsive'] = array(
                'name'        => __( 'Responsive', 'echelon-so' ),
                'description' => __( 'Only display background images on this screen size and up.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_background_group',
                'priority'    => 70,
                'default'     => '0',
                'options'     => EsoWidgetFormPartOptions::background_responsive()
            );

            $fields['echelonso_helper_css_background_blend'] = array(
                'name'        => __( 'Blend', 'echelon-so' ),
                'description' => __( 'How to blend the background image with the background color.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_background_group',
                'priority'    => 80,
                'default'     => '0',
                'options'     => EsoWidgetFormPartOptions::background_blend()
            );

            return $fields;

        }

        /*
        * Output the fields to the front end
        */

        public static function general_style_attributes( $attributes, $style ) {

            if ( !empty($style['echelonso_background_rgba']) ) {
                $attributes['style'] .= 'background-color: ' . $style['echelonso_background_rgba'] . ';';
            }

            if ( !empty($style['echelonso_helper_css_background_image']) ) {
                if ( !empty($style['echelonso_helper_css_background_image_size']) ) {
                    $bg_size = $style['echelonso_helper_css_background_image_size'];
                } else {
                    $bg_size = 'full';
                }
                $bg_url = wp_get_attachment_image_src( intval($style['echelonso_helper_css_background_image']), $bg_size );
                $attributes['style'] .= 'background-image: url("'.$bg_url[0].'");';
            }

            if ( !empty($style['echelonso_helper_css_background_size']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_background_size'];
            }

            if ( !empty($style['echelonso_helper_css_background_position']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_background_position'];
            }

            if ( !empty($style['echelonso_helper_css_background_repeat']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_background_repeat'];
            }

            if ( !empty($style['echelonso_helper_css_background_attachment']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_background_attachment'];
            }

            if ( !empty($style['echelonso_helper_css_background_responsive']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_background_responsive'];
            }

            if ( !empty($style['echelonso_helper_css_background_blend']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_background_blend'];
            }

            return $attributes;

        }

        /*
        * Enable RGBA JS in Admin footer
        */

        public static function admin_footer_js() {
            $palette = EsoHelpers::get_palette_colors();
            $palette = implode('|', $palette);
            ?>
            <script type="text/javascript">
            (function($) {

                $(document).ajaxComplete(function() {

                    $("[name='style[echelonso_background_rgba]']").each(function(k,v) {
                        if (!$(v).hasClass('cprgba')) {
                            $(v).addClass('cprgba').attr('data-palette', '<?php echo $palette; ?>').alphaColorPicker();
                        }
                    })

                });

            })(jQuery)
            </script>
            <?php
        }

    }

}
