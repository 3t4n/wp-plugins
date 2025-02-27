<?php

/**
 * Trip Downloads class.
 *
 * @category   Class
 * @package    WTWidgetsElementor
 * @author     WP Travel
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0-only
 * @since      1.0.0
 * php version 7.4
 */

namespace WTWE\Widgets\Single_Page_Trip_Downloads;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use WTWE\Helper\WTWE_Helper;

// Security Note: Blocks direct access to the plugin PHP files.
defined('ABSPATH') || exit;

/**
 * Trip Tabs widget class.
 *
 * @since 1.0.0
 */
if (!class_exists('WTWE_Trip_Downloads')) {
    class WTWE_Trip_Downloads extends Widget_Base
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
            $prefixed = defined(WP_DEBUG) ? '.min' : '';
            wp_register_style('trip-downloads', plugins_url('assets/css/trip-downloads' . $prefixed . '.css', WTWE_PLUGIN_FILE), []);
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
            return 'wp-travel-trip-downloads';
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
            return esc_html__('Trip Downloads', 'wt-widgets-elementor');
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
            return 'eicon-download-button';
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
            return array('wp-travel-single');
        }

        /**
         * Enqueue styles.
         */
        public function get_style_depends()
        {
            return array('trip-downloads');
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
                'content_section',
                [
                    'label' => __('Content', 'wt-widgets-elementor'),
                    'tab' => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'hide_counter',
                [
                    'label' => __('Enable Trip Downloads', 'wt-widgets-elementor'),
                    'type'  => Controls_Manager::SWITCHER,
                    'label_on' => __('Hide', 'wt-widgets-elementor'),
                    'label_off' => __('Show', 'wt-widgets-elementor'),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
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

            $wp_travel_itinerary_tabs = function_exists('wptravel_get_frontend_tabs') ? wptravel_get_frontend_tabs() : null;
            if (!isset($wp_travel_itinerary_tabs['downloads'])) {
                return;
            }

            

            $settings = $this->get_settings_for_display();

            if (!empty(get_the_ID()) && get_the_ID() > 0 ) {
                if (is_plugin_active('wp-travel-pro/wp-travel-pro.php') && !\Elementor\Plugin::$instance->editor->is_edit_mode()) {
                    ?>
                    <div id="wptravel-trip-downloads-block"  class="wptravel-block">
                        <?php echo do_shortcode( $wp_travel_itinerary_tabs['downloads']['content'] ); // @phpcs:ignore 
                        ?>
	                </div>
                    <?php
                }
            }
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
                
            } else {
                
            }
        }
    }
}
