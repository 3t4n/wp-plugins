<?php

/**
 * Guide Age class.
 *
 * @category   Class
 * @package    WTWidgetsElementor
 * @author     WP Travel
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0-only
 * @since      1.0.0
 * php version 7.4
 */

namespace WTWE\Widgets\Travel_Guide\Single_Travel_Guide_Age;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;


// Security Note: Blocks direct access to the plugin PHP files.
defined('ABSPATH') || exit;

/**
 * Guide Age widget class.
 *
 * @since 1.0.0
 */
if (!class_exists('WTWE_Guide_Age')) {
    class WTWE_Guide_Age extends Widget_Base
    {
        /**
         * Class constructor.
         *
         * @param array $data Widget data.
         * @param array $args Widget arguments.
         */
        public function __construct($data = array(), $args = null)
        {
            parent::__construct($data, $args);
        }

        /**
         * Retrieve the widget name.
         *
         * @since 1.0.0
         *
         * @access public
         *
         * @return string Widget name
         */
        public function get_name()
        {
            return 'wp-travel-guide-age';
        }

        /**
         * Retrieve the widget title.
         *
         * @since 1.0.0
         *
         * @access public
         *
         * @return string Widget title
         */
        public function get_title()
        {
            return esc_html__('Guide Age', 'wt-widgets-elementor');
        }

        /**
         * Retrieve the widget icon.
         *
         * @since 1.0.0
         *
         * @access public
         *
         * @return string Widget icon
         */
        public function get_icon()
        {
            return 'eicon-number-field';
        }

        /**
         * Retrieve the list of categories the widget belongs to.
         *
         * Used to determine where to display the widget in the editor.
         *
         * Note that currently Elementor supports only one category.
         * When multiple categories passed, Elementor uses the first one.
         *
         * @since 1.0.0
         *
         * @access public
         *
         * @return array Widget categories.
         */
        public function get_categories()
        {
            return array('wp-travel-guide');
        }

        /**
         * Register the widget controls.
         *
         * Adds different input fields to allow the user to change and bookize the widget settings.
         *
         * @since 1.0.0
         *
         * @access protected
         */
        protected function _register_controls()
        {
            $this->start_controls_section(
                'style_section',
                [
                    'label' => __('Style', 'wt-widgets-elementor'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            // Color
            $this->add_control(
                'guide-age-text-color',
                [
                    'label' => __('Color', 'wt-widgets-elementor'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#000',
                    'selectors' => [
                        '{{WRAPPER}} .wptravel-guide-age-widget' => 'color: {{VALUE}}',
                    ],
                ]
                );

            // Responsive Typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                array(
                    'name' => 'typography',
                    'label' => esc_html__('Typography', 'wt-widgets-elementor'),
                    'selector' => '{{WRAPPER}} .wptravel-guide-age-widget',
                    'responsive' => true, // Enable responsive settings
                )
            );



            $this->end_controls_section();
        }

        /**
         * Render the widget output on the frontend.
         *
         * Written in PHP and used to generate the final HTML.
         *
         * @since 1.0.0
         *
         * @access protected
         */


        protected function render()
        {
            // is editor mode?
            if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
                return;
            }

            // Check if wp-travel-pro is active
            if (is_plugin_active('wp-travel-pro/wp-travel-pro.php')) {
                // Call the rendering function
                $this->wptravel_widget_guide_age_render();
            }
        }

        // Function to get and render guide age
        private function wptravel_widget_guide_age_render()
        {

            $guide_data = get_user_by('login', get_the_title())->data;
           

            // Check if guide age is null
            if (! empty($guide_data) && isset($guide_data->ID)) {
                $guide_age = get_user_meta($guide_data->ID, 'age', true);
            }

?>

            <span class="wptravel-guide-age-widget">
                <?php
                if ($guide_data) {
                    echo esc_html($guide_age);
                } else {
                    echo esc_html__('20', 'wt-widgets-elementor');
                }

                ?>
            </span>
            
            <?php

        }

        /**
         * Render the widget output on the editor.
         *
         * Written in JS and used to generate the final HTML.
         *
         * @since 1.0.0
         *
         * @access protected
         */
        protected function _content_template()
        {
            if (is_plugin_active('wp-travel-pro/wp-travel-pro.php') && \Elementor\Plugin::$instance->editor->is_edit_mode()) {
            ?>

                <span class="wptravel-guide-age-widget"><?php echo esc_html__( '000', 'wt-widgets-elementor' ); ?> </span>

<?php
            } else {
            }
        }
    }
}
