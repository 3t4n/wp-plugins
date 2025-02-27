<?php

/**
 * Guide Fullname class.
 *
 * @category   Class
 * @package    WTWidgetsElementor
 * @author     WP Travel
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0-only
 * @since      1.0.0
 * php version 7.4
 */

namespace WTWE\Widgets\Travel_Guide\Single_Travel_Guide_Fullname;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;


// Security Note: Blocks direct access to the plugin PHP files.
defined('ABSPATH') || exit;

/**
 * Guide Fullname widget class.
 *
 * @since 1.0.0
 */
if (!class_exists('WTWE_Guide_Fullname')) {
    class WTWE_Guide_Fullname extends Widget_Base
    {
        public function __construct($data = array(), $args = null)
        {
            parent::__construct($data, $args);
        }

        public function get_name()
        {
            return 'wp-travel-guide-fullname';
        }

        public function get_title()
        {
            return esc_html__('Guide Fullname', 'wt-widgets-elementor');
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

            $this->start_controls_section(
                'content_section',
                [
                    'label' => __('Content', 'wt-widgets-elementor'),
                    'tab' => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'enable_guide_permalink',
                [
                    'label' => __('Enable Link', 'wt-widgets-elementor'),
                    'type'  => Controls_Manager::SWITCHER,
                    'label_on' => __('yes', 'wt-widgets-elementor'),
                    'label_off' => __('no', 'wt-widgets-elementor'),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );
            $this->end_controls_section();


            // Style Contents
            $this->start_controls_section(
                'style_section',
                [
                    'label' => __('Style', 'wt-widgets-elementor'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            // Colors
            $this->add_control(
                'guide-fullname-text-color',
                [
                    'label' => __('Color', 'wt-widgets-elementor'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#000',
                    'selectors' => [
                        '{{WRAPPER}} .wptravel-guide-fullname-widget' => 'color: {{VALUE}}',
                    ],
                ]
            );

            // Responsive Typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                array(
                    'name' => 'typography',
                    'label' => esc_html__('Typography', 'wt-widgets-elementor'),
                    'selector' => '{{WRAPPER}} .wptravel-guide-fullname-widget',
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
            $settings = $this->get_settings_for_display();


            // Check if required plugin is active.
            if (is_plugin_active('wp-travel-pro/wp-travel-pro.php')) {
                // Call the rendering function
                $this->wptravel_widget_guide_fullname_render($settings);
            }
        }

        // Function moved outside the render method to prevent redeclaration
        private function wptravel_widget_guide_fullname_render($settings)
        {

            
            $guide_data = get_user_by('login', get_the_title())->data;
            $guide_permalink = get_the_permalink(get_the_ID());
?>

            <h2 class="wptravel-guide-fullname-widget">
                <?php
                if ($guide_data && $settings['enable_guide_permalink'] === 'yes') {
                ?>
                    <a href="<?php echo esc_url($guide_permalink); ?>">
                        <?php echo esc_html($guide_data->display_name); ?>
                    </a>
                <?php
                } else {
                ?>
                    <span>
                        <?php echo esc_html($guide_data->display_name); ?>
                    </span>
                <?php
                }
                ?>
            </h2>

            <?php
        }

        protected function _content_template()
        {
            if (is_plugin_active('wp-travel-pro/wp-travel-pro.php') && \Elementor\Plugin::$instance->editor->is_edit_mode()) {
            ?>
                <h2 class="wptravel-guide-fullname-widget">
                    <span><?php echo esc_html__('Guide Full Name', 'wt-widgets-elementor'); ?></span>
                </h2>
<?php
            } else {
                // Fallback or default behavior
            }
        }
    }
}
