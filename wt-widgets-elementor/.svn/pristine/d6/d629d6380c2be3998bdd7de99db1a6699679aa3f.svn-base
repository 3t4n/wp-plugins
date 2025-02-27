<?php

/**
 * Guide Join Year class.
 *
 * @category   Class
 * @package    WTWidgetsElementor
 * @author     WP Travel
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0-only
 * @since      1.0.0
 * php version 7.4
 */

namespace WTWE\Widgets\Travel_Guide\Single_Travel_Guide_Join_Year;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

// Security Note: Blocks direct access to the plugin PHP files.
defined('ABSPATH') || exit;

/**
 * Guide Join Year widget class.
 *
 * @since 1.0.0
 */
if (!class_exists('WTWE_Guide_Join_Year')) {
    class WTWE_Guide_Join_Year extends Widget_Base
    {
        public function __construct($data = array(), $args = null)
        {
            parent::__construct($data, $args);
        }

        public function get_name()
        {
            return 'wp-travel-guide-join-year';
        }

        public function get_title()
        {
            return esc_html__('Guide Join Year', 'wt-widgets-elementor');
        }

        public function get_icon()
        {
            return 'eicon-calendar';
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
                'guide-join-year-text-color',
                [
                    'label' => __('Color', 'wt-widgets-elementor'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#000',
                    'selectors' => [
                        '{{WRAPPER}} .wptravel-guide-join-year-widget' => 'color: {{VALUE}}',
                    ],
                ]
            );

            // Responsive Typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                array(
                    'name' => 'typography',
                    'label' => esc_html__('Typography', 'wt-widgets-elementor'),
                    'selector' => '{{WRAPPER}} .wptravel-guide-join-year-widget',
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

            


            // Check if required plugin is active.
            if (is_plugin_active('wp-travel-pro/wp-travel-pro.php')) {
                // Call the rendering function
                $this->wptravel_widget_guide_join_year_render();
            }
        }

        // Function moved outside the render method to prevent redeclaration
        private function wptravel_widget_guide_join_year_render( ) {
            $guide_data = get_user_by( 'login', get_the_title() )->data;
            
        
            if ( ! empty( $guide_data ) && isset( $guide_data->ID ) ) {
                $guide_join_year        = get_user_meta( $guide_data->ID, 'join_year', true );
            }
            ?>
        
            <span class="wptravel-guide-join-year-widget">
                <?php 
                    if( $guide_data ){ 
                        echo esc_html( $guide_join_year ); 
                    }else{
                        echo esc_html__( '2024', 'wt-widgets-elementor' );
                    }
                    
                ?>
            </span>
            
            <?php
        
        }
        protected function _content_template()
        {
            if (is_plugin_active('wp-travel-pro/wp-travel-pro.php') && \Elementor\Plugin::$instance->editor->is_edit_mode()) {
                ?>
                    <span class="wptravel-guide-join-year-widget"><?php echo esc_html__( 'Joined Year', 'wt-widgets-elementor' ); ?></span>
                <?php 
            } else {
                // Fallback or default behavior
            }
        }
    }
}
