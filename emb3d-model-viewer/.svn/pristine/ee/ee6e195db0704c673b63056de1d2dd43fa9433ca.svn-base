<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

/**
 * Elementor Editor Widget
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    Emb3D_Model_Viewer
 * @subpackage Emb3D_Model_Viewer/includes
 * @author     Netfarm S.r.l. <info@emb3d.com>
 */

class Emb3D_Model_Viewer_Widget extends Widget_Base
{
    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return Emb3D::PLUGIN_NAME;
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return Emb3D::PLUGIN_TITLE;
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return Emb3D::PLUGIN_ICON;
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
        return ['general'];
    }

    /**
     * Get default settings.
     *
     * @since 1.0.0
     * @access protected
     *
     * @return array Control default settings.
     */
    protected function get_default_settings()
    {
        return []; //  TODO: who calls it?
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Content', 'elementor'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'model',
            [
                'label' => esc_html__('Select File', 'elementor'),
                'type'  => Controls_Manager::MEDIA,
                'description' => __('Select a file from media library or upload. Supports GLB and various formats.', 'emb3d-model-viewer'),
                'media_types' => ['model'],
                'default' => [
                    'url' => ''
                ],
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__('Background Color', 'elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => 'background-color: {{VALUE}};',
                ],
                'global' => [
                    'default' => Global_Colors::COLOR_PRIMARY,
                ]
            ]
        );

        $this->add_control(
            'progress_color',
            [
                'label' => esc_html__('Progress Bar', 'elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} emb3d-viewer' => '--progress-color: {{VALUE}};',
                ],
                'global' => [
                    'default' => Global_Colors::COLOR_SECONDARY,
                ]
            ]
        );

        $this->add_control(
            'light',
            [
                'label' => esc_html__('Disable Light', 'emb3d-model-viewer'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'none',
                'default' => 'all'
            ]
        );

        $this->add_responsive_control(
            'width',
            [
                'label' => esc_html__('Width', 'elementor'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 100,
                    'unit' => '%'
                ],
                'tablet_default' => [
                    'size' => 100,
                    'unit' => '%'
                ],
                'mobile_default' => [
                    'size' => 100,
                    'unit' => '%'
                ],
                'size_units' => ['%', 'px', 'vw'],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 2000,
                    ],
                    'vw' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} emb3d-viewer' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'height',
            [
                'label' => esc_html__('Height', 'elementor'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 480,
                    'unit' => 'px'
                ],
                'tablet_default' => [
                    'size' => 480,
                    'unit' => 'px'
                ],
                'mobile_default' => [
                    'size' => 480,
                    'unit' => 'px'
                ],
                'size_units' => ['px', 'vh'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 2000,
                    ],
                    'vh' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} emb3d-viewer' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__('Alignment', 'elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute(
            'emb3d-viewer',
            [
                'class' => ['emb3d-viewer'],
                'role' => 'img',
                'arial-label' => Emb3D::PLUGIN_TITLE,
                'src' => $settings['model']['url'],
                'light' => $settings['light']
            ]
        );

        if (($registration_key = get_option(Emb3D::REGISTRATION_KEY))) {
            $this->add_render_attribute('emb3d-viewer', 'key', $registration_key);
        }

        echo '<div><emb3d-viewer ' . $this->get_render_attribute_string('emb3d-viewer') . '></emb3d-viewer></div>';
    }
}
