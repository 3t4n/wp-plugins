<?php

/**
 * Guide Gender class.
 *
 * @category   Class
 * @package    WTWidgetsElementor
 * @author     WP Travel
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0-only
 * @since      1.0.0
 * php version 7.4
 */

namespace WTWE\Widgets\Travel_Guide\Single_Travel_Guide_Gender;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;


// Security Note: Blocks direct access to the plugin PHP files.
defined('ABSPATH') || exit;

/**
 * Guide Gender widget class.
 *
 * @since 1.0.0
 */
if (!class_exists('WTWE_Guide_Gender')) {
    class WTWE_Guide_Gender extends Widget_Base
    {
        public function __construct($data = array(), $args = null)
        {
            parent::__construct($data, $args);
        }

        public function get_name()
        {
            return 'wp-travel-guide-gender';
        }

        public function get_title()
        {
            return esc_html__('Guide Gender', 'wt-widgets-elementor');
        }

        public function get_icon()
        {
            return 'eicon-user-circle-o';
        }

        public function get_categories()
        {
            return array('wp-travel-guide');
        }

        protected function _register_controls()
        {
            $this->start_controls_section(
                'style_section',
                [
                    'label' => __('Style', 'wt-widgets-elementor'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            // Colors
            $this->add_control(
                'guide-gender-text-color',
                [
                    'label' => __('Color', 'wt-widgets-elementor'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#000',
                    'selectors' => [
                        '{{WRAPPER}} .wptravel-guide-gender-widget' => 'color: {{VALUE}}',
                    ],
                ]
            );

            // Responsive Typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                array(
                    'name' => 'typography',
                    'label' => esc_html__('Typography', 'wt-widgets-elementor'),
                    'selector' => '{{WRAPPER}} .wptravel-guide-gender-widget',
                    'responsive' => true, // Enable responsive settings
                )
            );
            $this->end_controls_section();
        }

        protected function render()
        {
            // Check if in editor mode, exit early if so.
            if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
                return;
            }
            $settings =  $this->get_settings_for_display();

            // Check if required plugin is active.
            if (is_plugin_active('wp-travel-pro/wp-travel-pro.php')) {
                // Call the rendering function
                $this->wptravel_widget_guide_gender_render($settings);
            }
        }

        // Function moved outside the render method to prevent redeclaration
        function wptravel_widget_guide_gender_render($settings)
        {

            $guide_data = get_user_by('login', get_the_title())->data;
            

            $guide_gender        = get_user_meta($guide_data->ID, 'gender', true);

            if ($guide_gender == '100%' || $guide_gender == '') {
                $guide_gender = __('Male', 'wt-widgets-elementor');
            } elseif ($guide_gender == '50%') {
                $guide_gender = __('Male', 'wt-widgets-elementor');
            } elseif ($guide_gender == '25%') {
                $guide_gender = __('Others', 'wt-widgets-elementor');
            }
            ?>

            <span class="wptravel-guide-gender-widget">
                <?php
                if ($guide_data) {
                    echo esc_html($guide_gender);
                } else {
                    echo esc_html__('Gender', 'wt-widgets-elementor');
                }

                ?>
            </span>
            
            <?php


        }

        protected function _content_template()
        {
            if (is_plugin_active('wp-travel-pro/wp-travel-pro.php') && \Elementor\Plugin::$instance->editor->is_edit_mode()) {
            ?>
                <span class="wptravel-guide-gender-widget">
                    <?php echo esc_html__('Guide Gender', 'wt-widgets-elementor'); ?> 
                </span>
            <?php
            } else {
                // Fallback or default behavior
            }
        }
    }
}
