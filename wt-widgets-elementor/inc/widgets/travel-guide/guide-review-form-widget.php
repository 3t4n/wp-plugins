<?php

/**
 * Guide Review class.
 *
 * @category   Class
 * @package    WTWidgetsElementor
 * @author     WP Travel
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0-only
 * @since      1.0.0
 * php version 7.4
 */

namespace WTWE\Widgets\Travel_Guide\Single_Travel_Guide_Review_Form;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined('ABSPATH') || exit;

/**
 * Guide Review widget class.
 *
 * @since 1.0.0
 */
if (!class_exists('WTWE_Guide_Review_Form')) {
    class WTWE_Guide_Review_Form extends Widget_Base
    {
        public function __construct($data = array(), $args = null)
        {
            parent::__construct($data, $args);
        }

        public function get_name()
        {
            return 'wp-travel-guide-review-form';
        }

        public function get_title()
        {
            return esc_html__('Guide Review Form', 'wt-widgets-elementor');
        }

        public function get_icon()
        {
            return 'eicon-review';
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

    
            $this->end_controls_section();
        }

        protected function render()
        {
            // Check if in editor mode, exit early if so.
            if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
                return;
            }
            $attributes = $this->get_settings_for_display();
            // Check if required plugin is active.
            if (is_plugin_active('wp-travel-pro/wp-travel-pro.php')) {
                // Call the rendering function
                $this->wptravel_widget_guide_review_form_render( $attributes );
            }
        }

        // Function moved outside the render method to prevent redeclaration
        private function wptravel_widget_guide_review_form_render( $attributes ) {
            
            if ( ! empty( $guide_data ) && isset( $guide_data->ID ) ) {
                $guide_data = get_user_by( 'login', get_the_title() )->data;
            }
            $font_color = "#000";

            ?>
        
            <div class="wptravel-guide-review-form-widget wptravel-travel-guide-Review" id="wptravel-travel-guide-Review">
                <h3 class="section-title"> <?php echo esc_html__( 'RECENT REVIEW', 'wp-travel-pro' ); ?></h3>
                <?php comments_template(); ?>
            </div>
        
            <style>
                .wptravel-guide-review-form-widget .comment-reply-link,
                .wptravel-guide-review-form-widget #reply-title,
                .wptravel-guide-review-form-widget .section-title,
                .wptravel-guide-review-form-widget{
                    color: <?php echo esc_attr( $font_color ); ?> !important;
                }
        
                .wptravel-guide-review-form-widget textarea#comment{
                    display: block;
                }
        
                #wptravel-travel-guide-Review.wptravel-guide-review-form-widget .form-submit input {
                    color: var(--wp--preset--color--bright);
                    background-color: var(--wp--preset--color--primary);
                }
            </style>
            <?php
        
            
        }
        
        
        protected function _content_template()
        {
            if (is_plugin_active('wp-travel-pro/wp-travel-pro.php') && \Elementor\Plugin::$instance->editor->is_edit_mode()) {
                // Add editor-specific rendering if necessary
            } else {
                // Fallback or default behavior
            }
        }
    }
}
