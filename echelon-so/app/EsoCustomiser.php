<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists('EsoCustomiser') ) {

    final class EsoCustomiser {

        public static function customize_register($wp_customize) {

            /*
            * PANEL: Main
            */

            $wp_customize->add_panel( 'echelonso_panel_main', array(
                'title' => __( 'Echelon', 'echelon-so' ),
                'description' => __( 'Settings and options related to Echelon for SiteOrigin.', 'echelon-so'),
                'capability'    => 'edit_theme_options',
                'priority' => 5000,
            ) );

            /*
            * SECTION: functionality
            */

            $wp_customize->add_section( 'echelonso_section_functionality', array(
                'title' => __( 'Internal Functionality','echelon-so' ),
                'description' => __( 'Turn internal functionality on or off.', 'echelon-so' ),
                'panel' => 'echelonso_panel_main',
                'priority' => 5000,
            ));

            $wp_customize->add_setting( 'echelonso_options[image_sizes]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'default' => '1',
                'sanitize_callback' => 'echelonso_sanitize_select',
            ));

            $wp_customize->add_control( 'echelonso_options[image_sizes]', array(
                'type' => 'select',
                'priority' => 10,
                'section' => 'echelonso_section_functionality',
                'label' => __( 'Image Sizes' ),
                'description' => __( 'Echelon will add its own image sizes.', 'echelon-so' ),
                'choices' => array(
                    '1' => __( 'On' ),
                    '0' => __( 'Off' )
                )
            ));

            $wp_customize->add_setting( 'echelonso_options[echelon_layouts]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'default' => '1',
                'sanitize_callback' => 'echelonso_sanitize_select',
            ));

            $wp_customize->add_control( 'echelonso_options[echelon_layouts]', array(
                'type' => 'select',
                'priority' => 10,
                'section' => 'echelonso_section_functionality',
                'label' => __( 'Echelon Layouts Post Type' ),
                'description' => __( 'Echelon will add its own post type for reusable layouts.', 'echelon-so' ),
                'choices' => array(
                    '1' => __( 'On' ),
                    '0' => __( 'Off' )
                )
            ));

            /*
            * SECTION: Features
            */

            $wp_customize->add_section( 'echelonso_section_features', array(
                'title' => __( 'Panel Features','echelon-so' ),
                'description' => __( 'Turn Echelon panels features on or off.', 'echelon-so' ),
                'panel' => 'echelonso_panel_main',
                'priority' => 5100,
            ) );

            // animate
            $wp_customize->add_setting( 'echelonso_options[feature_animate]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'default' => '1',
                'sanitize_callback' => 'echelonso_sanitize_select',
            ) );

            $wp_customize->add_control( 'echelonso_options[feature_animate]', array(
                'type' => 'select',
                'priority' => 10,
                'section' => 'echelonso_section_features',
                'label' => __( 'Animate' ),
                'choices' => array(
                    '1' => __( 'On' ),
                    '0' => __( 'Off' )
                )
            ) );

            // animated gradients
            $wp_customize->add_setting( 'echelonso_options[feature_animated_gradients]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'default' => '1',
                'sanitize_callback' => 'echelonso_sanitize_select',
            ) );

            $wp_customize->add_control( 'echelonso_options[feature_animated_gradients]', array(
                'type' => 'select',
                'priority' => 20,
                'section' => 'echelonso_section_features',
                'label' => __( 'Animated Gradients' ),
                'choices' => array(
                    '1' => __( 'On' ),
                    '0' => __( 'Off' )
                )
            ) );

            // background
            $wp_customize->add_setting( 'echelonso_options[feature_background]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'default' => '1',
                'sanitize_callback' => 'echelonso_sanitize_select',
            ) );

            $wp_customize->add_control( 'echelonso_options[feature_background]', array(
                'type' => 'select',
                'priority' => 30,
                'section' => 'echelonso_section_features',
                'label' => __( 'Background' ),
                'choices' => array(
                    '1' => __( 'On' ),
                    '0' => __( 'Off' )
                )
            ) );

            // cell flex
            $wp_customize->add_setting( 'echelonso_options[feature_cell_flex]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'default' => '1',
                'sanitize_callback' => 'echelonso_sanitize_select',
            ) );

            $wp_customize->add_control( 'echelonso_options[feature_cell_flex]', array(
                'type' => 'select',
                'priority' => 50,
                'section' => 'echelonso_section_features',
                'label' => __( 'Cell Flex' ),
                'choices' => array(
                    '1' => __( 'On' ),
                    '0' => __( 'Off' )
                )
            ) );

            // custom palette
            $wp_customize->add_setting( 'echelonso_options[feature_custom_palette]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'default' => '1',
                'sanitize_callback' => 'echelonso_sanitize_select',
            ) );

            $wp_customize->add_control( 'echelonso_options[feature_custom_palette]', array(
                'type' => 'select',
                'priority' => 60,
                'section' => 'echelonso_section_features',
                'label' => __( 'Custom Palette' ),
                'choices' => array(
                    '1' => __( 'On' ),
                    '0' => __( 'Off' )
                )
            ) );

            // design
            $wp_customize->add_setting( 'echelonso_options[feature_design]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'default' => '1',
                'sanitize_callback' => 'echelonso_sanitize_select',
            ) );

            $wp_customize->add_control( 'echelonso_options[feature_design]', array(
                'type' => 'select',
                'priority' => 65,
                'section' => 'echelonso_section_features',
                'label' => __( 'Design', 'echelon-so' ),
                'choices' => array(
                    '1' => __( 'On' ),
                    '0' => __( 'Off' )
                )
            ) );

            // hover transition
            $wp_customize->add_setting( 'echelonso_options[feature_hover_transition]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'default' => '1',
                'sanitize_callback' => 'echelonso_sanitize_select',
            ) );

            $wp_customize->add_control( 'echelonso_options[feature_hover_transition]', array(
                'type' => 'select',
                'priority' => 75,
                'section' => 'echelonso_section_features',
                'label' => __( 'Hover Transition' ),
                'choices' => array(
                    '1' => __( 'On' ),
                    '0' => __( 'Off' )
                )
            ) );

            // linked widgets
            $wp_customize->add_setting( 'echelonso_options[feature_linked_widgets]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'default' => '1',
                'sanitize_callback' => 'echelonso_sanitize_select',
            ) );

            $wp_customize->add_control( 'echelonso_options[feature_linked_widgets]', array(
                'type' => 'select',
                'priority' => 80,
                'section' => 'echelonso_section_features',
                'label' => __( 'Linked Widgets' ),
                'choices' => array(
                    '1' => __( 'On' ),
                    '0' => __( 'Off' )
                )
            ) );

            // parallax
            $wp_customize->add_setting( 'echelonso_options[feature_parallax]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'default' => '1',
                'sanitize_callback' => 'echelonso_sanitize_select',
            ) );

            $wp_customize->add_control( 'echelonso_options[feature_parallax]', array(
                'type' => 'select',
                'priority' => 85,
                'section' => 'echelonso_section_features',
                'label' => __( 'Parallax' ),
                'choices' => array(
                    '1' => __( 'On' ),
                    '0' => __( 'Off' )
                )
            ) );

            // position
            $wp_customize->add_setting( 'echelonso_options[feature_position]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'default' => '1',
                'sanitize_callback' => 'echelonso_sanitize_select',
            ) );

            $wp_customize->add_control( 'echelonso_options[feature_position]', array(
                'type' => 'select',
                'priority' => 85,
                'section' => 'echelonso_section_features',
                'label' => __( 'Position', 'echelon-so' ),
                'choices' => array(
                    '1' => __( 'On' ),
                    '0' => __( 'Off' )
                )
            ) );

            // scrollspy
            $wp_customize->add_setting( 'echelonso_options[feature_scrollspy]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'default' => '1',
                'sanitize_callback' => 'echelonso_sanitize_select',
            ) );

            $wp_customize->add_control( 'echelonso_options[feature_scrollspy]', array(
                'type' => 'select',
                'priority' => 90,
                'section' => 'echelonso_section_features',
                'label' => __( 'Scrollspy', 'echelon-so' ),
                'choices' => array(
                    '1' => __( 'On' ),
                    '0' => __( 'Off' )
                )
            ) );

            // sticky
            $wp_customize->add_setting( 'echelonso_options[feature_sticky]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'default' => '1',
                'sanitize_callback' => 'echelonso_sanitize_select',
            ) );

            $wp_customize->add_control( 'echelonso_options[feature_sticky]', array(
                'type' => 'select',
                'priority' => 100,
                'section' => 'echelonso_section_features',
                'label' => __( 'Sticky' ),
                'choices' => array(
                    '1' => __( 'On' ),
                    '0' => __( 'Off' )
                )
            ) );

            // visibility
            $wp_customize->add_setting( 'echelonso_options[feature_visibility]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'default' => '1',
                'sanitize_callback' => 'echelonso_sanitize_select',
            ) );

            $wp_customize->add_control( 'echelonso_options[feature_visibility]', array(
                'type' => 'select',
                'priority' => 100,
                'section' => 'echelonso_section_features',
                'label' => __( 'Visibility' ),
                'choices' => array(
                    '1' => __( 'On' ),
                    '0' => __( 'Off' )
                )
            ) );

            /*
            * SECTION: Custom palette
            */

            $wp_customize->add_section( 'echelonso_section_custom_palette', array(
                'title' => __( 'Custom Palette Colors','echelon-so' ),
                'description' => __( 'Set custom colors for use in color picker.', 'echelon-so' ),
                'panel' => 'echelonso_panel_main',
                'priority' => 5200,
            ) );

            /*
            * CONTROL: Custom palette
            */

            $palette_colors = EsoHelpers::get_palette_colors();

            //  color 1
            $wp_customize->add_setting( 'echelonso_options[custom_palette_1]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => $palette_colors['color_1'],
            ) );

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[custom_palette_1]', array(
                    'label' => __( 'Color 1', 'echelon-so' ),
                    'section' => 'echelonso_section_custom_palette',
                    'priority' => 10
                ) )
            );

            //  color 2
            $wp_customize->add_setting( 'echelonso_options[custom_palette_2]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => $palette_colors['color_2'],
            ) );

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[custom_palette_2]', array(
                    'label' => __( 'Color 2', 'echelon-so' ),
                    'section' => 'echelonso_section_custom_palette',
                    'priority' => 20
                ) )
            );

            //  color 3
            $wp_customize->add_setting( 'echelonso_options[custom_palette_3]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => $palette_colors['color_3'],
            ) );

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[custom_palette_3]', array(
                    'label' => __( 'Color 3','echelon-so' ),
                    'section' => 'echelonso_section_custom_palette',
                    'priority' => 30
                ) )
            );

            //  color 4
            $wp_customize->add_setting( 'echelonso_options[custom_palette_4]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => $palette_colors['color_4'],
            ) );

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[custom_palette_4]', array(
                    'label' => __( 'Color 4', 'echelon-so' ),
                    'section' => 'echelonso_section_custom_palette',
                    'priority' => 40
                ) )
            );

            //  color 5
            $wp_customize->add_setting( 'echelonso_options[custom_palette_5]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => $palette_colors['color_5'],
            ) );

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[custom_palette_5]', array(
                    'label' => __( 'Color 5', 'echelon-so' ),
                    'section' => 'echelonso_section_custom_palette',
                    'priority' => 50
                ) )
            );

            //  color 6
            $wp_customize->add_setting( 'echelonso_options[custom_palette_6]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => $palette_colors['color_6'],
            ) );

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[custom_palette_6]', array(
                    'label' => __( 'Color 6' . EsoWidgetFormPart::prime_tag(), 'echelon-so'),
                    'section' => 'echelonso_section_custom_palette',
                    'priority' => 60
                ) )
            );

            //  color 7
            $wp_customize->add_setting( 'echelonso_options[custom_palette_7]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => $palette_colors['color_7'],
            ) );

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[custom_palette_7]', array(
                    'label' => __( 'Color 7' . EsoWidgetFormPart::prime_tag(), 'echelon-so' ),
                    'section' => 'echelonso_section_custom_palette',
                    'priority' => 70
                ) )
            );

            //  color 8
            $wp_customize->add_setting( 'echelonso_options[custom_palette_8]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => $palette_colors['color_8'],
            ) );

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[custom_palette_8]', array(
                    'label' => __( 'Color 8' . EsoWidgetFormPart::prime_tag(), 'echelon-so' ),
                    'section' => 'echelonso_section_custom_palette',
                    'priority' => 80
                ) )
            );

            /*
            * SECTION: Default colors
            */

            $wp_customize->add_section( 'echelonso_section_default_colors', array(
                'title' => __( 'Default Widget Colors','echelon-so' ),
                'description' => __( 'Set custom colors for widgets to use as their defualts.', 'echelon-so' ),
                'panel' => 'echelonso_panel_main',
                'priority' => 5200,
            ) );

            /*
            * CONTROL: Custom palette
            */

            //  primary
            $wp_customize->add_setting( 'echelonso_options[default_color_primary]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => EsoWidgetFormPart::get_legacy_color('global-primary-background'),
            ) );

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[default_color_primary]', array(
                    'label' => __( 'Primary', 'echelon-so' ),
                    'description' => __( 'The primasry color of your website which is almost always used in widgets.', 'echelon-so' ),
                    'section' => 'echelonso_section_default_colors',
                    'priority' => 10
                ) )
            );

            //  secondary
            $wp_customize->add_setting( 'echelonso_options[default_color_secondary]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => EsoWidgetFormPart::get_legacy_color('global-secondary-background'),
            ) );

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[default_color_secondary]', array(
                    'label' => __( 'Secondary', 'echelon-so' ),
                    'description' => __( 'The secondary color which is used rarely in widgets.', 'echelon-so' ),
                    'section' => 'echelonso_section_default_colors',
                    'priority' => 20
                ) )
            );

            //  light grey
            $wp_customize->add_setting( 'echelonso_options[default_color_light_grey]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => '#fafafa',
            ) );

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[default_color_light_grey]', array(
                    'label' => __( 'Light Grey', 'echelon-so' ),
                    'description' => __( 'A light grey (or other) color which is regularly used widgets.', 'echelon-so' ),
                    'section' => 'echelonso_section_default_colors',
                    'priority' => 60
                ) )
            );

            //  medium grey
            $wp_customize->add_setting( 'echelonso_options[default_color_medium_grey]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => '#e3e2e0',
            ) );

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[default_color_medium_grey]', array(
                    'label' => __( 'Medium Grey', 'echelon-so' ),
                    'description' => __( 'A medium grey (or other) color which is sometimes used widgets.', 'echelon-so' ),
                    'section' => 'echelonso_section_default_colors',
                    'priority' => 70
                ) )
            );

            //  dark grey
            $wp_customize->add_setting( 'echelonso_options[default_color_dark_grey]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => '#454444',
            ) );

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[default_color_dark_grey]', array(
                    'label' => __( 'Dark Grey', 'echelon-so' ),
                    'description' => __( 'A dark grey (or other) color which is sometimes used in widgets.', 'echelon-so' ),
                    'section' => 'echelonso_section_default_colors',
                    'priority' => 80
                ) )
            );

            //  darker grey
            $wp_customize->add_setting( 'echelonso_options[default_color_darker_grey]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => '#111111',
            ) );

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[default_color_darker_grey]', array(
                    'label' => __( 'Darker Grey', 'echelon-so' ),
                    'description' => __( 'The darkest grey (or other) color which is used rarely in widgets.', 'echelon-so' ),
                    'section' => 'echelonso_section_default_colors',
                    'priority' => 90
                ) )
            );

            //  inverse
            $wp_customize->add_setting( 'echelonso_options[default_color_inverse]', array(
                'type' => 'option',
                'capability' => 'manage_options',
                'sanitize_callback' => 'sanitize_hex_color',
                'default' => '#ffffff',
            ) );

            $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[default_color_inverse]', array(
                    'label' => __( 'Inverse', 'echelon-so' ),
                    'description' => __( 'This color is used when displaying colors on solid backgrounds. If your primary color is white this color should be the inverse, i.e black. Normally leaving this color as white works for most primary colors.', 'echelon-so' ),
                    'section' => 'echelonso_section_default_colors',
                    'priority' => 100
                ) )
            );
        }
    }
}
