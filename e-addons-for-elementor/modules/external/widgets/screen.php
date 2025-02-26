<?php

namespace EAddonsForElementor\Modules\External\Widgets;

use Elementor\Controls_Manager;
use EAddonsForElementor\Base\Base_Widget;
use EAddonsForElementor\Core\Utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Elementor Screen
 *
 * Elementor widget for e-addons
 *
 */
class Screen extends Base_Widget {

    public function get_name() {
        return 'e-shot';
    }

    public function get_title() {
        return __('Site ScreenShot', 'e-addons-for-elementor');
    }

    public function get_pid() {
        return 621;
    }

    public function get_description() {
        return __('Collect a ScreenShot from any site page', 'e-addons-for-elementor');
    }

    public function get_icon() {
        return 'eadd-remote-screen';
    }

    protected function _register_controls() {
        $this->start_controls_section(
                'section_screen', [
            'label' => __('ScreenShot', 'e-addons-for-elementor'),
                ]
        );

        $this->add_control(
                'url', [
            'label' => __('Page URL', 'e-addons-for-elementor'),
            'description' => __('The full URL of page to include', 'e-addons-for-elementor'),
            'type' => Controls_Manager::TEXT,
            'placeholder' => 'https://e-addons.com',
            'label_block' => true,
                ]
        );

        $this->add_control(
                'shot_width',
                [
                    'label' => __('Width', 'e-addons-for-elementor'),
                    'type' => Controls_Manager::SLIDER,
                    'default' => [
                        'size' => '600',
                        'unit' => 'px',
                    ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1920,
                            'step' => 1,
                        ],
                    ],
                    'size_units' => ['px'],
                    'condition' => [
                        'url!' => '',
                    ],
                ]
        );
        $this->add_control(
                'shot_height',
                [
                    'label' => __('Height', 'e-addons-for-elementor'),
                    'type' => Controls_Manager::SLIDER,
                    'default' => [
                        'size' => '450',
                        'unit' => 'px',
                    ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1920,
                            'step' => 1,
                        ],
                    ],
                    'size_units' => ['px'],
                    'condition' => [
                        'url!' => '',
                    ],
                ]
        );
        
        $this->add_control(
                'shot_link',
                [
                    'label' => __('Link', 'e-addons-for-elementor'),
                    'type' => Controls_Manager::URL,
                    'separator' => 'before',
                    'condition' => [
                        'url!' => '',
                    ],
                ]
        );
        $this->add_control(
                'shot_alt',
                [
                    'label' => __('Alt', 'e-addons-for-elementor'),
                    'type' => Controls_Manager::TEXT,
                    'condition' => [
                        'url!' => '',
                    ],
                ]
        );
        $this->add_control(
                'shot_caption',
                [
                    'label' => __('Caption', 'e-addons-for-elementor'),
                    'type' => Controls_Manager::TEXT,
                    'condition' => [
                        'url!' => '',
                    ],
                ]
        );
        


        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        if ($settings['url']) {
            $url = $settings['url'];

            if (filter_var($url, FILTER_VALIDATE_URL)) {

                $alt = $url;
                if (!empty($settings['shot_alt'])) {
                    $alt = $settings['shot_alt'];
                }

                $target = $rel = $custom = '';
                $display_link = false;
                if (!empty($settings['shot_link']['url'])) {
                    $link = $settings['shot_link']['url'];
                    
                    if ($settings['shot_link']['is_external']) {
                        $target = ' target="_blank"';
                    }
                    if ($settings['shot_link']['nofollow']) {
                        $rel = ' rel="nofollow"';
                    }
                    $custom = $settings['shot_link']['custom_attributes'];
                    
                    $display_link = true;
                }
                
                $content = $settings['shot_caption'];
                
                $width = $settings['shot_width']['size'];
                $height = $settings['shot_height']['size'];
                
                // Get screenshot.
                $image_uri = self::get_shot($url, $width, $height);
                
                if (!empty($image_uri)) {

                    if (!empty($content)) {
                        echo '<div class="wp-caption" style="width:' . ( intval($width) + 10 ) . 'px;">';
                    }

                    echo '<div class="site-screen-shot">';

                    if ($display_link) {
                        echo '<a href="' . esc_url($link) . '" ' . $target . $rel . ' ' . $custom . ' title="' . esc_attr($alt) . '">';
                    }

                    echo '<img src="' . esc_url($image_uri) . '" alt="' . esc_attr($alt) . '" width="' . intval($width) . '" height="' . intval($height) . '" />';

                    if ($display_link) {
                        echo '</a>';
                    }

                    echo '</div>';

                    if (!empty($content)) {
                        echo '<p class="wp-caption-text">' . wp_kses_post($content) . '</p></div>';
                    }
                }
            } else {
                if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
                    _e('The url is not valid', 'e-addons-for-elementor');
                }
            }
        } else {
            if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
                _e('Add page site url to begin', 'e-addons-for-elementor');
            }
        }
    }

    /**
     * Get Browser Screenshot
     *
     * Get a screenshot of a website using WordPress
     *
     * @param string $url Url of screenshot.
     * @param int    $width Width of screenshot.
     * @param int    $height Height of screenshot.
     * @return string
     */
    public static function get_shot($url = '', $width = 600, $height = 450) {

        // Image found.
        if ('' !== $url) {

            $query_args = array(
                'w' => intval($width),
                'h' => intval($height),
            );

            return add_query_arg($query_args, 'https://s0.wordpress.com/mshots/v1/' . rawurlencode(esc_url($url)));
        }

        return '';
    }

}
