<?php

/**
 * Guide Slogan class.
 *
 * @category   Class
 * @package    WTWidgetsElementor
 * @author     WP Travel
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0-only
 * @since      1.0.0
 * php version 7.4
 */

namespace WTWE\Widgets\Travel_Guide\Single_Travel_Guide_Slogan;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

// Security Note: Blocks direct access to the plugin PHP files.
defined('ABSPATH') || exit;

/**
 * Guide Slogan widget class.
 *
 * @since 1.0.0
 */
if (!class_exists('WTWE_Guide_Slogan')) {
    class WTWE_Guide_Slogan extends Widget_Base
    {
        public function __construct($data = array(), $args = null)
        {
            parent::__construct($data, $args);
        }

        public function get_name()
        {
            return 'wp-travel-guide-slogan';
        }

        public function get_title()
        {
            return esc_html__('Guide Slogan', 'wt-widgets-elementor');
        }

        public function get_icon()
        {
            return 'eicon-animation-text';
        }

        public function get_categories()
        {
            return array('wp-travel-guide');
        }

        protected function _register_controls()
        {
            // Content Section
            $this->start_controls_section(
                'content_section',
                [
                    'label' => __('Content', 'wt-widgets-elementor'),
                    'tab' => Controls_Manager::TAB_CONTENT,
                ]
            );

            // Typography Control
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'typography', // This should match the settings you want to retrieve later
                    'label' => __('Typography', 'wt-widgets-elementor'),
                    'selector' => '{{WRAPPER}} .wptravel-guide-slogan-widget',
                ]
            );

            $this->add_control(
                'font_color',
                [
                    'label' => __('Font Color', 'wt-widgets-elementor'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#000',
                    'selectors' => [
                        '{{WRAPPER}} .wptravel-guide-slogan-widget' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();
        }

        protected function render()
        {
            $attributes = $this->get_settings_for_display();

            // Check if required plugin is active.
            if (is_plugin_active('wp-travel-pro/wp-travel-pro.php')) {
                // Call the rendering function
                $this->wptravel_widget_guide_slogan_render($attributes);
            }
        }

        // Function moved outside the render method to prevent redeclaration
        private function wptravel_widget_guide_slogan_render($attributes)
        {

            $guide_data = get_user_by('login', get_the_title())->data;
            if (! empty($guide_data) && isset($guide_data->ID)) {
                $guide_slogan        = get_user_meta($guide_data->ID, 'user_slogan', true);
            }
            ?>

            <p class="wptravel-guide-slogan-widget">
                <?php
                if ($guide_data) {
                    echo esc_html($guide_slogan);
                } else {
                    echo esc_html__('This is slogan by travel guide.', 'wt-widgets-elementor');
                }

                ?>
            </p>

            <?php

        }
        protected function _content_template()
        {
            if (is_plugin_active('wp-travel-pro/wp-travel-pro.php') ) {
            ?>

                <#
                var videoCode=settings.font_color ;
                #>
                    <div>
                        <p class="wptravel-guide-slogan-widget">
                            <?php echo esc_html__( 'This is Guide Slogan', 'wt-widgets-elementor' ); ?>
                        </p>
                    </div>
    <?php
            }
        }
    }
}
