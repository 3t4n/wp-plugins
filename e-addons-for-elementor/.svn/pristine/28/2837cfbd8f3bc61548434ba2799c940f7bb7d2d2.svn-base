<?php

namespace EAddonsForElementor\Modules\External\Widgets;

use Elementor\Controls_Manager;
use EAddonsForElementor\Base\Base_Widget;
use EAddonsForElementor\Core\Utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Elementor Iframe
 *
 * Elementor widget for e-addons
 *
 */
class Iframe extends Base_Widget {

    public function get_name() {
        return 'e-iframe';
    }

    public function get_title() {
        return __('Iframe', 'e-addons-for-elementor');
    }

    public function get_pid() {
        return 617;
    }

    public function get_description() {
        return __('Display another Page Site inside your Template as Iframe', 'e-addons-for-elementor');
    }

    public function get_icon() {
        return 'eadd-remote-iframe';
    }

    protected function _register_controls() {
        $this->start_controls_section(
                'section_iframe', [
            'label' => __('Iframe', 'e-addons-for-elementor'),
                ]
        );

        $this->add_control(
                'url', [
            'label' => __('Site URL', 'e-addons-for-elementor'),
            'description' => __('The full URL of page to include', 'e-addons-for-elementor'),
            'type' => Controls_Manager::TEXT,
            'placeholder' => 'https://e-addons.com',
            'label_block' => true,
                ]
        );

        $this->add_control(
                'iframe_doc', [
            'label' => __('Use Google Document preview', 'e-addons-for-elementor'),
            'type' => Controls_Manager::SWITCHER,
            'description' => __('Render any Document like PDF, DOC, XLS and many other', 'e-addons-for-elementor'),
            'condition' => [
                'url!' => '',
            ],
                ]
        );

        $this->add_responsive_control(
                'iframe_height',
                [
                    'label' => __('Height', 'e-addons-for-elementor'),
                    'type' => Controls_Manager::SLIDER,
                    'default' => [
                        'size' => '80',
                        'unit' => 'vh',
                    ],
                    /*
                      'tablet_default' => [
                      'unit' => 'vh',
                      ],
                      'mobile_default' => [
                      'unit' => 'vh',
                      ], */
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1920,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 5,
                            'max' => 100,
                            'step' => 1,
                        ],
                        'vh' => [
                            'min' => 5,
                            'max' => 100,
                            'step' => 1,
                        ],
                    ],
                    'size_units' => ['%', 'px', 'vh'],
                    'selectors' => [
                        '{{WRAPPER}} iframe' => 'height: {{SIZE}}{{UNIT}};',
                    ],
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
                    // view as simple iframe
                    if ($settings['iframe_doc']) {
                        $url = 'https://docs.google.com/viewer?embedded=true&url=' . urlencode($url);
                    }
                    echo '<iframe src="' . $url . '" frameborder="0" width="100%" height="' . $settings['iframe_height']['size'] . '"></iframe>';
            } else {
                if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
                    _e('The url is not valid', 'e-addons-for-elementor');
                }
            }
        } else {
            if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
                _e('Add site url to begin', 'e-addons-for-elementor');
            }
        }
    }

}
