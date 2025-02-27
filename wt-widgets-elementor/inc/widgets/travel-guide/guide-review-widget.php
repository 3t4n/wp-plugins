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

namespace WTWE\Widgets\Travel_Guide\Single_Travel_Guide_Review;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined('ABSPATH') || exit;

/**
 * Guide Review widget class.
 *
 * @since 1.0.0
 */
if (!class_exists('WTWE_Guide_Review')) {
    class WTWE_Guide_Review extends Widget_Base
    {
        public function __construct($data = array(), $args = null)
        {
            parent::__construct($data, $args);
        }

        public function get_name()
        {
            return 'wp-travel-guide-review';
        }

        public function get_title()
        {
            return esc_html__('Guide Review', 'wt-widgets-elementor');
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

            $this->add_control(
                'hide_guide_review',
                [
                    'label' => __('Enable Guide Review', 'wt-widgets-elementor'),
                    'type'  => Controls_Manager::SWITCHER,
                    'label_on' => __('Hide', 'wt-widgets-elementor'),
                    'label_off' => __('Show', 'wt-widgets-elementor'),
                    'return_value' => 'yes',
                    'default' => 'yes',
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
                $this->wptravel_widget_guide_review_render($attributes);
            }
        }

        // Function moved outside the render method to prevent redeclaration
        private function wptravel_widget_guide_review_render( $attributes ) {
            $guide_data = get_user_by( 'login', get_the_title() )->data;
            $font_color = "#f9a032";
            $font_size = "16px";

            ?>
        
            <p class="wptravel-guide-review-widget wptravel-tourguide-aside-review">
                <?php if( $guide_data ) :?>
                    <?php if ( wp_travel_travel_guide_rating( get_the_ID() )['review_count'] < 1 ) : ?>
                            <span class="wp-travel-noreviews"><?php echo esc_html__( 'No review yet. Be first to give review', 'wt-widgets-elementor' ); ?></span>
                        <?php
                        else :
                            $avg_rating = wp_travel_travel_guide_rating()['avg_rating'];
                            for ( $i = 1; $i <= 5; $i++ ) {
                                $star_checked = '';
                                if ( $i <= $avg_rating ) {
                                    $star_checked = 'checked';
                                }
                                ?>
                                <span class="block fa fa-star <?php echo esc_attr( $star_checked ); ?>"></span>
                            <?php } 
                                if( $attributes['enableText'] ){
                            ?>
        
                            <span><?php echo esc_html( wp_travel_travel_guide_rating()['review_count'] ); ?><?php echo esc_html__( ' reviews', 'wt-widgets-elementor' ); ?></span>
                    <?php } endif; ?>
                    <?php else: ?>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span>
                        <?php  if( $attributes['enableText'] ){ ?>
                        <span><?php echo esc_html__( '2 reviews', 'wt-widgets-elementor' ); ?></span>
                <?php } endif; ?>
            </p>
            <style>
                .wptravel-guide-review-widget.wptravel-tourguide-aside-review span.block.checked:before{
                    font-weight: 900 !important;
                }
                .wptravel-guide-review-widget.wptravel-tourguide-aside-review span.block.checked,
                .wptravel-guide-review-widget.wptravel-tourguide-aside-review .block.fa-star{
                    color: <?php echo esc_attr( $font_color ); ?> !important;
                    font-size: <?php echo esc_attr( $font_size ); ?>;
                }
        
                .wptravel-guide-review-form-widget #wp-travel_rate a,
                .wptravel-guide-review-form-widget.wptravel-travel-guide-Review .wp-travel-average-review:before,
                .wptravel-guide-review-form-widget .wp-travel-average-review span{
                    color: <?php echo esc_attr( $font_color ); ?> !important;
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
