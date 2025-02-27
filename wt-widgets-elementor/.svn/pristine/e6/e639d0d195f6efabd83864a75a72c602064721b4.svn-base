<?php

/**
 * Guide Image class.
 *
 * @category   Class
 * @package    WTWidgetsElementor
 * @author     WP Travel
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0-only
 * @since      1.0.0
 * php version 7.4
 */

namespace WTWE\Widgets\Travel_Guide\Single_Travel_Guide_Image;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined('ABSPATH') || exit;

/**
 * Guide Image widget class.
 *
 * @since 1.0.0
 */
if (!class_exists('WTWE_Guide_Image')) {
    class WTWE_Guide_Image extends Widget_Base
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
            return 'wp-travel-guide-image';
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
            return esc_html__('Guide Image', 'wt-widgets-elementor');
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
            return 'eicon-person';
        }

        /**
         * Retrieve the list of categories the widget belongs to.
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
         * Adds different input fields to allow the user to change and customize the widget settings.
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

            // Add control for image width
            $this->add_control(
                'wptravel_guide_image_width',
                [
                    'label' => __('Image Width', 'wt-widgets-elementor'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 300, // Default value
                    'placeholder' => __('Enter width', 'wt-widgets-elementor'),
                ]
            );

            // Add control for width unit
            $this->add_control(
                'wptravel_guide_image_width_unit',
                [
                    'label' => __('Width Unit', 'wt-widgets-elementor'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'px', // Default unit
                    'options' => [
                        'px' => 'px',
                        '%' => '%',
                        'rem' => 'rem',
                        'em' => 'em',
                    ],
                ]
            );

            // Add control for image height
            $this->add_control(
                'wptravel_guide_image_height',
                [
                    'label' => __('Image Height', 'wt-widgets-elementor'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 300, // Default value
                    'placeholder' => __('Enter height', 'wt-widgets-elementor'),
                ]
            );

            // Add control for height unit
            $this->add_control(
                'wptravel_guide_image_height_unit',
                [
                    'label' => __('Height Unit', 'wt-widgets-elementor'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'px', // Default unit
                    'options' => [
                        'px' => 'px',
                        '%' => '%',
                        'rem' => 'rem',
                        'em' => 'em',
                    ],
                ]
            );

            $this->end_controls_section();
        }

        /**
         * Render the widget output on the frontend.
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

            $attributes = $this->get_settings_for_display();

            // Check if wp-travel-pro is active
            if (is_plugin_active('wp-travel-pro/wp-travel-pro.php')) {
                $this->wptravel_widget_guide_image_render($attributes);
            }
        }

        /**
         * Render guide image widget output.
         *
         * @since 1.0.0
         *
         * @access protected
         */
        protected function wptravel_widget_guide_image_render($attributes)
        {
            $guide_data = get_user_by('login', get_the_title())->data;

            if ($guide_data) {
                $guide_profile_img = !empty(get_user_meta($guide_data->ID, 'profile_picture', true)) ? get_user_meta($guide_data->ID, 'profile_picture', true)['url'] : plugin_dir_url(__FILE__) . 'assets/uploads/wp-travel-placeholder.png';
            } else {
                // Fallback image when guide data is missing
                $guide_profile_img = plugin_dir_url(__FILE__) . 'assets/images/elementor-placeholder-image.png';
            }

            $image_height = !empty($attributes['wptravel_guide_image_height']) ? $attributes['wptravel_guide_image_height'] : '300';
            $image_height_unit = !empty($attributes['wptravel_guide_image_height_unit']) ? $attributes['wptravel_guide_image_height_unit'] : 'px';
            $image_width = !empty($attributes['wptravel_guide_image_width']) ? $attributes['wptravel_guide_image_width'] : '300';
            $image_width_unit = !empty($attributes['wptravel_guide_image_width_unit']) ? $attributes['wptravel_guide_image_width_unit'] : 'px';

            ?>
            <img class="wptravel-guide-image-widget" src="<?php echo esc_url($guide_profile_img); ?>" style="width: <?php echo esc_attr($image_width . $image_width_unit); ?>; height: <?php echo esc_attr($image_height . $image_height_unit); ?>; object-fit: cover;" alt="Guide Image">
            <?php
        }

        /**
         * Render the widget output in the editor.
         *
         * @since 1.0.0
         *
         * @access protected
         */
        protected function _content_template()
        { 
            if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
            ?>
             <#
                var image_height = settings.wptravel_guide_image_height ? settings.wptravel_guide_image_height : 300;
                var image_height_unit = settings.wptravel_guide_image_height_unit ? settings.wptravel_guide_image_height_unit : 'px';
                var image_width = settings.wptravel_guide_image_width ? settings.wptravel_guide_image_width : 300;
                var image_width_unit = settings.wptravel_guide_image_width_unit ? settings.wptravel_guide_image_width_unit : 'px';
                #>
                <div>
                    <img class="wptravel-guide-image-widget" src="<?php echo WTWE_PLUGIN_URL . 'assets/images/elementor-placeholder-image.png'; ?>" style="height: {{ image_height }}{{ image_height_unit }}; width: {{ image_width }}{{ image_width_unit }}; object-fit: cover;">
                </div>
            <?php
            }
        }
    }
}
